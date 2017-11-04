<!-- Server Restart module -->
<?php

session_start();
include('requireLogin.php');
// Restart server
// Additional security check
if(isset($_SESSION['username']))
{
	exec('sudo /sbin/reboot');
}
//if something went wrong and we're still alive, go to index
header('location: ../index.php')
?>
