<!--
	Connect the website to local database
    
	WARNING:
	Changing any variables here affects the entire website.
	So take caution.
-->
<?php

// Variables
$dbServerName = "localhost";
$dbUsername = "pi";
$dbPassword = "";
$dbName = "piServer";
$_SESSION['success'] = "";

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName); // Connect to the database

// Check for errors and echo them
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
