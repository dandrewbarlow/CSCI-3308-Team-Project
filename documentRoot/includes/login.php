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

if (isset($_POST['login'])) {

	$uid = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);

	// Error handlers
	// Check if inputs are empty
	if(empty($uid) || empty($pwd)) {
		$message = "Unsuccessful";
        array_push($errors, "Please enter username and password.");
	}
	else {
		$pwd = md5($pwd); // Encrypt password
		$sql = "SELECT * FROM users WHERE user_uid='$uid' AND psswd='$pwd'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		// If username doesn't exist
		if ($resultCheck < 1) {
			$message = "Unsuccessful";
            array_push($errors, "Incorrect username or password.");
		}
		else {
			$message = "Successfully authenticated";
			$_SESSION['username'] = $uid;
			$_SESSION['success'] = "You are now logged in";
			header('Location: home.php');
		}
	}
}

?>
