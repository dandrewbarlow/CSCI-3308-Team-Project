<!-- Server Restart module -->
<?php
session_start();
if(!isset($_SESSION['username'])){
	$_SESSION['msg']="YOU MUST LOG IN FIRST";
	header('location: ../index.php');
}else{
	// Restart server
	exec('sudo /sbin/reboot');
}
?>
