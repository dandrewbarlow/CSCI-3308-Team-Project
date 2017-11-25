<?php
session_start();
include('requireLogin.php');
include('dbconnect.php');


$siteName = $_POST['siteID'];

unlink('/etc/apache2/sites-enabled/'.$siteName.'.conf') or $_SESSION['error'] = 'Could not remove conf file';
$sqlquery = 'UPDATE websites SET is_enabled = 0 WHERE website_name="'.$siteName.'"';
mysqli_query($conn, $sqlquery) or $_SESSION['error'] = 'Could not remove DB entry';
exec('sudo apache2ctl -k graceful') or $_SESSION['error'] = 'Could not restart apache';
if(!(isset($_SESSION['error']))){
	$_SESSION['success'] = 'Disabled Website';
}
header("location: ../userSites.php");
?>
