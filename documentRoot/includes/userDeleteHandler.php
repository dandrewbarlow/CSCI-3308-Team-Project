<?php

include('requireSuperuser.php');
include('dbconnect.php');

$id = $_REQUEST['id'];

// Get username
$queryUsername = "SELECT * FROM users WHERE user_id='$id'";
$result = mysqli_query($conn, $queryUsername) or $_SESSION['error'] = 'Could not find user in database';
$row = mysqli_fetch_array($result);
$user_uid = $row['user_uid'];

// Delete from database
$queryDelete = "DELETE FROM users WHERE user_id='$id'";
mysqli_query($conn, $queryDelete) or $_SESSION['error'] = 'Could not delete from database';

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
$path = "/var/data/".$user_uid;
delete_files($path);
if (!(isset($_SESSION['error']))){
	$_SESSION['success'] = "User successfully deleted from database. Note that they may still be logged in.";
}
header('location: ../allUsers.php');
?>
