<?php

$dbServerName = "localhost";
$dbUsername = "pi";
$dbPassword = "";
$dbName = "piServer";
$_SESSION['success'] = "";

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
