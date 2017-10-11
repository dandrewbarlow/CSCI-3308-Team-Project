<?php
session_start();

$dbServerName = "localhost";
$dbUsername = "pi";
$dbPassword = "";
$dbName = "piServer";
$_SESSION['success'] = "";

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$message = "The message is no message";
$errors = array();

if (isset($_POST['register'])) {

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd1 = mysqli_real_escape_string($conn, $_POST['password1']);
	$pwd2 = mysqli_real_escape_string($conn, $_POST['password2']);

	// Error handlers
	// Check if inputs are empty
	if(empty($name)) {
        array_push($errors, "Please enter name.");
	}
	if(empty($email)) {
        array_push($errors, "Please enter email.");
	}
	if(empty($uid)) {
        array_push($errors, "Please enter username.");
	}
	if(empty($pwd1) || empty($pwd2)) {
        array_push($errors, "Please enter password.");
	}
	if ($pwd1 != $pwd2){
        array_push($errors, "Passwords do no match.");
	}

	if(count($errors) == 0) {
		//$pwd = md5($pwd1);

		$sql = "INSERT INTO users (user_name, user_email, user_uid, psswd)
					VALUES ('$name', '$email', '$uid', '$pwd1')";
		$result = mysqli_query($conn, $sql);

		// Redirect to home
		$message = "Successfully authenticated";
		$_SESSION['success'] = "You have created a new user";
		header('Location: home.php');
	}
}

?>
