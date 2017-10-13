<?php

if (isset($_POST['login'])) {

    $errors = array();

	$uid = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);

	// Error handlers
	// Check if inputs are empty
	if(empty($uid) || empty($pwd)) {
        array_push($errors, "Please enter username and password.");
	}
	else {
		$pwd = md5($pwd); // Encrypt password
		$sql = "SELECT * FROM users WHERE user_uid='$uid' AND psswd='$pwd'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		// If username doesn't exist
		if ($resultCheck < 1) {
            array_push($errors, "Incorrect username or password.");
		}
		else {
			$_SESSION['username'] = $uid;
			$_SESSION['success'] = "You are now logged in";
			header('Location: home.php');
		}
	}
}

?>
