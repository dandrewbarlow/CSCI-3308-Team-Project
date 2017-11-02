<?php
session_start();
if(!isset($_SESSION['username'])){
	$_SESSION['msg']="You must log in first!";
	header("location: index.php");
}
include('server.php');

$siteName = $_POST['siteID'];

if(symlink('/etc/apache2/sites-available/'.$siteName.'.conf','/etc/apache2/sites-enabled/'.$siteName.'.conf')){
	$sqlquery = 'UPDATE websites SET is_enabled = 1 WHERE website_name="'.$siteName.'"';
	mysqli_query($conn, $sqlquery);
	header("location: ../userSites.php");
}else{
	die("something went wrong. The site data was probably deleted improperly");
}
?>
