<!-- Login module -->
<?php
include('dbconnect.php');
// Check whether 'login' button is pressed
if (isset($_POST['login'])) {

    $errors = array(); // Initialize error array

    // Retrieve form inputs via POST method
	$uid = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);

	// HANDLE ERRORS
	// Check if inputs are empty
	if(empty($uid) || empty($pwd)) {
		$_SESSION['error'] = "Please enter username and password.";
		header('Location: ../index.php');
		exit();
	}
	else {
		$pwd = md5($pwd); // Encrypt password
		$sql = "SELECT * FROM users WHERE user_uid='$uid' AND psswd='$pwd'"; // The query
		$result = mysqli_query($conn, $sql); // Send a query to the database
		$resultCheck = mysqli_num_rows($result); // Retrieve number of rows the query returned

		// If username doesn't exist
		if ($resultCheck < 1) {
			$_SESSION['error'] = "Incorrect username or password.";
			header('Location: ../index.php');
			exit();
		}
        // Else set the session to the user_uid and redirect to 'home.php'
		else {
            // Get user privileges
            $row = mysqli_fetch_array($result);
            $_SESSION['superuser'] = $row['superuser'];
			$_SESSION['username'] = $row['user_uid'];
			$_SESSION['success'] = "You are now logged in";
			header('Location: home.php');
			exit();
		}
	}
}

?>
