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
<<<<<<< HEAD
header('location: ../index.php')
=======
header('location: /index.php')
>>>>>>> 13199a9a7f783dc2023bd8149e10bfceffa8f24c
?>
