<<<<<<< HEAD
<!-- Password Reset module -->
<?php
session_start();
include('dbconnect.php');
include('requireLogin.php');
// Check if 'reset-password' button is clicked
if (isset($_POST['reset-password'])) {

    $errors = array(); // Iniitalize error array

    // Retrieve form inputs via POST method
	$pwd_old = mysqli_real_escape_string($conn, $_POST['password_old']);
	$pwd1 = mysqli_real_escape_string($conn, $_POST['password_new1']);
	$pwd2 = mysqli_real_escape_string($conn, $_POST['password_new2']);

	// HANDLE ERRORS
	// Check if inputs are empty
	if(empty($pwd_old)) {
        array_push($errors, "Please enter your old password.");
	}
	if(empty($pwd1) || empty($pwd2)) {
        array_push($errors, "Please enter new password.");
	}
	if ($pwd1 != $pwd2){
        array_push($errors, "Passwords do no match.");
	}

	// Check if old password is correct
	if (count($errors) == 0) {
		$pwd = md5($pwd_old); // Encrypt password
		$sessionUser = $_SESSION['username'];

    //get sql query ready
		$sql = "SELECT * FROM users WHERE user_uid=? AND psswd=?";

    //Query database w/ a prepared statement
    if ($stmt = $conn->prepare($sql)) {
      $stmt->bind_param("ss", $sessionUser, $pwd);
      $stmt->execute();
    }
    //Get result from query
    $result = $stmt->get_result();


		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			array_push($errors, "Your old password is incorrect");
		}
	}

    // Check if new and old password are the same
    if($pwd_old == $pwd1){
        array_push($errors, "New password must be different than your old password.");
    }

    // If there are no errors, update the row in the database
	if(count($errors) == 0) {
		$pwd = md5($pwd1); // Encrypt password

    //Prep another sql statement for prepared execution
		$sql = "UPDATE users
				SET psswd=?
				WHERE user_uid=?";

    //Execute prepared statement
    if ($stmt = $conn->prepare($sql)) {
      $stmt->bind_param("ss", $pwd, $_SESSION['username']);
      $stmt->execute();
    }
    $results = $stmt->get_result(); //again results was not in the original, but it can't hurt to have in case


		// Redirect to home
		$_SESSION['success'] = "You have updated your password";
        $_SESSION['username'] = $sessionUser;
		header('Location: ../home.php');
	}
}

?>
=======
<!-- Password Reset module -->
<?php
session_start();
include('dbconnect.php');
include('requireLogin.php');
// Check if 'reset-password' button is clicked
if (isset($_POST['reset-password'])) {

    $errors = array(); // Iniitalize error array

    // Retrieve form inputs via POST method
	$pwd_old = mysqli_real_escape_string($conn, $_POST['password_old']);
	$pwd1 = mysqli_real_escape_string($conn, $_POST['password_new1']);
	$pwd2 = mysqli_real_escape_string($conn, $_POST['password_new2']);

	// HANDLE ERRORS
	// Check if inputs are empty
	if(empty($pwd_old)) {
        array_push($errors, "Please enter your old password.");
	}
	if(empty($pwd1) || empty($pwd2)) {
        array_push($errors, "Please enter new password.");
	}
	if ($pwd1 != $pwd2){
        array_push($errors, "Passwords do no match.");
	}

	// Check if old password is correct
	if (count($errors) == 0) {
		$pwd = md5($pwd_old); // Encrypt password
		$sessionUser = $_SESSION['username'];

    //get sql query ready
		$sql = "SELECT * FROM users WHERE user_uid=? AND psswd=?";

    //Query database w/ a prepared statement
    if ($stmt = $conn->prepare($sql)) {
      $stmt->bind_param("ss", $sessionUser, $pwd);
      $stmt->execute();
    }
    //Get result from query
    $result = $stmt->get_result();


		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			array_push($errors, "Your old password is incorrect");
		}
	}

    // Check if new and old password are the same
    if($pwd_old == $pwd1){
        array_push($errors, "New password must be different than your old password.");
    }

    // If there are no errors, update the row in the database
	if(count($errors) == 0) {
		$pwd = md5($pwd1); // Encrypt password

    //Prep another sql statement for prepared execution
		$sql = "UPDATE users
				SET psswd=?
				WHERE user_uid=?";

    //Execute prepared statement
    if ($stmt = $conn->prepare($sql)) {
      $stmt->bind_param("ss", $pwd, $_SESSION['username']);
      $stmt->execute();
    }
    $results = $stmt->get_result(); //again results was not in the original, but it can't hurt to have in case


		// Redirect to home
		$_SESSION['success'] = "You have updated your password";
        $_SESSION['username'] = $sessionUser;
		header('Location: ../home.php');
	}
}

?>
>>>>>>> 72967a7b8ceb5b8c6a02b4a4d5b6e1a9f714964b
