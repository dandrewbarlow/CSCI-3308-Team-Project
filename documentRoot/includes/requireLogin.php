<?php
	session_start();
	if(!isset($_SESSION['username'])){
		$_SESSION['error']="You must log in first";
		header('location: ../index.php');
	}
?>
