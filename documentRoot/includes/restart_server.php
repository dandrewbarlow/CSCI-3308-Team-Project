<!-- Server Restart module -->
<?php

session_start();
include('requireLogin.php');
// Restart server
// Additional security check
if(isset($_SESSION['username']))
{
	ignore_user_abort(true);
	header('location: ../index.php');
	exec('sudo /sbin/reboot');
}
?>
