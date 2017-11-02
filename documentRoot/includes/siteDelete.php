<?php
session_start();
if(!isset($_SESSION['username'])){
	$_SESSION['msg']="You must log in first!";
	header("location: index.php");
}
include('server.php');

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

$sqlquery = 'DELETE FROM websites WHERE website_name="'.$siteName.'"';
mysqli_query($conn, $sqlquery) or die("unable to remove DB row");
header("location: ../userSites.php");
?>
