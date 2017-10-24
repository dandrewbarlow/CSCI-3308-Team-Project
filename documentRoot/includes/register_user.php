<!-- Register New User module -->
<?php

// Check whether the 'register' button is clicked
if (isset($_POST['register'])) {

    $errors = array(); // Initialize error array

    // Retrieve form inputs via POST method
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd1 = mysqli_real_escape_string($conn, $_POST['password1']);
	$pwd2 = mysqli_real_escape_string($conn, $_POST['password2']);

	// HANDLE ERRORS
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

    // Check if username already exists
    if(!empty($uid)){
        $sql = "SELECT * FROM users WHERE user_uid='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
        if ($resultCheck >= 1){
            array_push($errors, "Username already exists.");
        }
    }

    // If there are no errors, insert new row into table
	if(count($errors) == 0) {
		$pwd = md5($pwd1); // Encrypt password
		$sql = "INSERT INTO users (user_name, user_email, user_uid, psswd)
					VALUES ('$name', '$email', '$uid', '$pwd')";
		mysqli_query($conn, $sql);

		//create user storage directory
		exec('mkdir /var/data/'.$name');

		// Redirect to home
		$_SESSION['success'] = "You have created a new user";
		header('Location: home.php');
	}
}

?>
