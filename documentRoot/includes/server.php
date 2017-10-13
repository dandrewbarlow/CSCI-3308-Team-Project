<!--
	Main 'server.php'. All other modules are a part of this.

	WARNING:
	Editing this document can break the website. So take caution.
	All webpages on this website depend on these modules.
	So removing any one of these modules can cause errors on one or more webpages.
-->
<?php

// IMPORTANT
// This initializes the session
session_start();

include('dbconnect.php'); // IMPORTANT: Connects website to database

include('login.php'); // Login module
include('register-user.php'); // New user registration module
include('reset-password.php'); // Password reset module
include('logout.php'); // Logout module

?>
