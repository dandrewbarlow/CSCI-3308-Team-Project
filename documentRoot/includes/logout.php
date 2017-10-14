<!-- Logout module -->
<?php

// Check if the 'logout' button is clicked
if (isset($_POST['logout'])) {
	// Destroy session and redirect user to 'index.php'
	session_destroy();
	unset($_SESSION['username']);
	header("location: index.php");
}

?>
