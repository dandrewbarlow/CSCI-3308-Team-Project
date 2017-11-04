<?php
session_start();
if(!isset($_SESSION['username'])){
	$_SESSION['msg']="You must log in first!";
	header("location: index.php");
}
include('requireLogin.php');
include('dbconnect.php');

function delete_files($target) {
	if(is_dir($target)){
		$files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned
		foreach( $files as $file ){
			delete_files( $file );
		}
		rmdir( $target );
	 } elseif(is_file($target)) {
		unlink( $target );
	 }
}

$siteName = $_POST['siteID'];

delete_files('/var/userSites/'.$siteName.'/');
unlink('/etc/apache2/sites-available/'.$siteName.'.conf') or die("unable to delete conf file");

$sqlquery = 'DELETE FROM websites WHERE site_id="'.$siteName.'"';
mysqli_query($conn, $sqlquery) or die("unable to remove DB row");
exec('sudo apache2ctl -k graceful');
header("location: ../userSites.php");
?>
