<?php
session_start();
if(!isset($_SESSION['username'])){
	$_SESSION['msg']="You must log in first!";
	header("location: index.php");
}
include('server.php');

if(isset($_POST['publicFile'])){
	$file = '/var/data/public/'.$_POST['publicFile'];
}else if(isset($_POST['privateFile'])){
	$file = '/var/data/'.$_SESSION['username'].'/'.$_POST['privateFile'];
}else{
	die("something went horribly wrong!!");
}

unlink($file) or die("file could not be deleted");
header("location: ../storage.php");
?>
