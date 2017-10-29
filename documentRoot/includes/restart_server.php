<!-- Server Restart module -->
<?php

	// Check whether the user is logged in
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}
	// Restart server
	else {
		exec('sudo /sbin/reboot');
	}
?>
