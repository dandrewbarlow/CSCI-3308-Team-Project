<?php
session_start();
include('requireLogin.php');
include('dbconnect.php');

if(isset($_POST['publicFile'])){
	$filename = $_POST['publicFile'];
	$file = '/var/data/public/'.$_POST['publicFile'];
}else if(isset($_POST['privateFile'])){
	$filename = $_POST['privateFile'];
	$file = '/var/data/'.$_SESSION['username'].'/'.$_POST['privateFile'];
}else{
	die("something went horribly wrong!!");
}

unlink($file) or die("file could not be deleted");
$sql = 'DELETE FROM storage WHERE name = "'.$filename.'"';
mysqli_query($conn, $sql);
header("location: ../storage.php");
?>
