<?php
	session_start();
	
	if(!isset($_SESSION['username'])){
		$_SESSION['error'] = "You must log in first";
		header('location: ../index.php');
		exit();
	}
	if($_SESSION['superuser'] != 1){
		$_SESSION['error'] = "You do not have privileges";
		header('location: ../home.php');
		exit();
	}
?>
