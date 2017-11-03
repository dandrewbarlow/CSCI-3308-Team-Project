<?php

include('requireSuperuser.php');
include('dbconnect.php');

$id = $_REQUEST['id'];

$queryDelete = "DELETE FROM users WHERE user_id='$id'";
mysqli_query($conn, $queryDelete);

// Delete all their private files
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
$path = '/var/data/'.$_SESSION['username'];
delete_files($path);

$_SESSION['msg'] = "User successfully deleted from database. Note that they may still be logged in.";
?>
