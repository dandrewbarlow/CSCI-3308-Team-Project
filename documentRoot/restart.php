<?php
	session_start();

	// Make sure user is logged in
	if (!isset($_SESSION['username'])){
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}
	exec('sudo /sbin/reboot');
?>
