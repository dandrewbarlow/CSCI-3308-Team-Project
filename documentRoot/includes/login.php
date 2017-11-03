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
        array_push($errors, "Please enter username and password.");
	}
	else {
		$pwd = md5($pwd); // Encrypt password
		$sql = "SELECT * FROM users WHERE user_uid='$uid' AND psswd='$pwd'"; // The query
		$result = mysqli_query($conn, $sql); // Send a query to the database
		$resultCheck = mysqli_num_rows($result); // Retrieve number of rows the query returned

		// If username doesn't exist
		if ($resultCheck < 1) {
            array_push($errors, "Incorrect username or password.");
    		$_SESSION['msg'] = "Please fix the errors";
            header('Location: ../index.php');
		}
        // Else set the session to the user_uid and redirect to 'home.php'
		else {
            // Get user privileges
            $row = mysqli_fetch_array($result);
            $_SESSION['superuser'] = $row['superuser'];
			$_SESSION['username'] = $uid;
			$_SESSION['msg'] = "You are now logged in";
			header('Location: home.php');
		}
	}
}

?>
