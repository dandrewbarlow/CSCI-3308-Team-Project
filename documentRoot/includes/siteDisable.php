<?php
session_start();
if(!isset($_SESSION['username'])){
	$_SESSION['msg']="You must log in first!";
	header("location: index.php");
}
include('requireLogin.php');
include('dbconnect.php');

$siteId = $_POST['siteID'];

unlink('/etc/apache2/sites-enabled/'.$siteName.'.conf');
$sqlquery = 'UPDATE websites SET is_enabled = 0 WHERE site_id="'.$siteId.'"';
mysqli_query($conn, $sqlquery);
exec('sudo apache2ctl -k graceful');
header("location: ../userSites.php");
?>
