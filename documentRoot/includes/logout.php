<!-- Logout module -->
<?php

session_start();
// Destroy session and redirect user to 'index.php'
session_destroy();
unset($_SESSION['username']);
header("location: ../index.php");

?>
