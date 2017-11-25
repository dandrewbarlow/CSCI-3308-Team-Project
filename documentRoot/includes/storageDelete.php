<?php
session_start();
include('requireLogin.php');

if(isset($_POST['publicFile'])){
	$file = '/var/data/public/'.$_POST['publicFile'];
}else if(isset($_POST['privateFile'])){
	$file = '/var/data/'.$_SESSION['username'].'/'.$_POST['privateFile'];
}else{
	$_SESSION['error'] = "something went horribly wrong!!";
	header("location: ../storage.php");
}

unlink($file) or $_SESSION['error'] = "file could not be deleted";
if(!(isset($_SESSION['error']))){
	$_SESSION['success'] = 'Deleted Content';
}
header("location: ../storage.php");
?>
