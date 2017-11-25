<?php
session_start();
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
unlink('/etc/apache2/sites-available/'.$siteName.'.conf') or $_SESSION['error'] = 'Failed to delete conf file';

$sqlquery = 'DELETE FROM websites WHERE website_name="'.$siteName.'"';
mysqli_query($conn, $sqlquery) or $_SESSION['error'] = 'Failed to delete conf file';
exec('sudo apache2ctl -k graceful');

$_SESSION['success'] = 'Deleted Website';
header("location: ../userSites.php");
?>
