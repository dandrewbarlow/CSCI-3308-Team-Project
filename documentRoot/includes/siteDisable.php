<?php
session_start();
include('requireLogin.php');
include('dbconnect.php');

$siteID = $_POST['siteID'];

unlink('/etc/apache2/sites-enabled/'.$siteID.'.conf');
$sqlquery = 'UPDATE websites SET is_enabled = 0 WHERE site_id="'.$siteID.'"';
mysqli_query($conn, $sqlquery);
exec('sudo apache2ctl -k graceful');
header("location: ../userSites.php");
?>
