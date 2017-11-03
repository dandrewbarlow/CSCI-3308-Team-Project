<?php

include('requireSuperuser.php');
include('dbconnect.php');

$id = $_REQUEST['id'];

$queryDelete = "DELETE FROM users WHERE user_id='$id'";
mysqli_query($conn, $queryDelete);

$_SESSION['msg'] = "User successfully deleted from database. Note that they may still be logged in.";
?>
