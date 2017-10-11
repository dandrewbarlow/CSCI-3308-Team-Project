<?php
session_start();

$dbServerName = "localhost";
$dbUsername = "pi";
$dbPassword = "";
$dbName = "piServer";
$sessionUser = $_SESSION['username'];

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

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
        $_SESSION['success'] = "Boo";
	}
	if(empty($email)) {
        array_push($errors, "Please enter email.");
        $_SESSION['success'] = "Boo2";
	}
	if(empty($uid)) {
        array_push($errors, "Please enter username.");
        $_SESSION['success'] = "Boo3";
	}
	if(empty($pwd1) || empty($pwd2)) {
        array_push($errors, "Please enter password.");
        $_SESSION['success'] = "Boo4";
	}
	if ($pwd1 != $pwd2){
        array_push($errors, "Passwords do no match.");
        $_SESSION['success'] = "Boo5";
	}
    $_SESSION['success'] = "Boo noo";

	if(count($errors) == 0) {
		//$pwd = md5($pwd1);

		$sql = "INSERT INTO users (user_name, user_email, user_uid, psswd)
					VALUES ('$name', '$email', '$uid', '$pwd1')";
		mysqli_query($conn, $sql);

		// Redirect to home
		$_SESSION['success'] = "You have created a new user";
        $_SESSION['username'] = $sessionUser;
		header('Location: home.php');
	}
}

?>
