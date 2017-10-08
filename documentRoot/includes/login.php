<?php
session_start();

$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "PiInTheSky";
$dbName = "piServer";

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    echo '<script>console.log("Failed to connect")</script>';
}

$message = "";

if (isset($_POST['login'])) {

	$uid = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);

	// Error handlers
	// Check if inputs are empty
	if(empty($uid) || empty($pwd)) {
		$message = "Unsuccessful";
        echo '<script>console.log("Empty inputs")</script>';
		header("Location: index.php?login=empty");
		exit();
	}
	else {
		//$pwd = md5($pwd);
		$sql = "SELECT * FROM users WHERE user_uid='$uid' and psswd='$pwd'";
		$result = mysql_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		// If username doesn't exist
		if ($resultCheck < 1) {
			$message = "Unsuccessful";
			header("Location: index.php?login=error");
            echo '<script>console.log("Wrong inputs")</script>';
			exit();
		}
		else {
			$message = "Successfully authenticated";
			$_SESSION['username'] = $uid;
			$_SESSION['success'] = "You are now logged in";

            echo '<script>console.log("Success. Should redirect")</script>';
			header('Location: home.php');
		}
	}
}
else {
	header("Location: ../index.php?login=error");
	exit();
}

?>
