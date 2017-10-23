<!--
	Main 'server.php'. All other modules are a part of this.

	WARNING:
	Editing this document can break the website. So take caution.
	All webpages on this website depend on these modules.
	So removing any one of these modules can cause errors on one or more webpages.
-->
<?php

include('dbconnect.php'); // IMPORTANT: Connects website to database

include('login.php'); // Login module
include('register_user.php'); // New user registration module
include('reset_password.php'); // Password reset module
include('logout.php'); // Logout module
include('website_upload.php'); // Website upload module

?>
