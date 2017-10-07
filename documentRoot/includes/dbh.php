<?php

session_start();

$dbServerName = "73.229.199.171";
$dbUsername = "root";
$dbPassword = "PiInTheSky";
$dbName = "piServer";

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
?>
