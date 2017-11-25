<?php
session_start();
include('requireLogin.php');
include('dbconnect.php');

$siteName = $_POST['siteID'];

if(symlink('/etc/apache2/sites-available/'.$siteName.'.conf','/etc/apache2/sites-enabled/'.$siteName.'.conf')){
	$sqlquery = 'UPDATE websites SET is_enabled = 1 WHERE website_name="'.$siteName.'"';
	mysqli_query($conn, $sqlquery) or $_SESSION['error'] = 'Could not remove DB entry';
	exec('sudo apache2ctl -k graceful');
}else{
	$_SESSION['error'] = "something went wrong. The site data was probably deleted improperly";
	header("location: ../userSites.php");
}

$_SESSION['success'] = 'Enabled Website';
header("location: ../userSites.php");
?>
