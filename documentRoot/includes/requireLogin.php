<?php
if(!isset($_SESSION['username'])){
	$_SESSION['msg']="You must log in first";
	header('location: ../index.php');
}
?>
