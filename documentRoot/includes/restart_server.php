<!-- Server Restart module -->
<?php

session_start();
include('requireLogin.php');
	// Restart server
	exec('sudo /sbin/reboot');

?>
