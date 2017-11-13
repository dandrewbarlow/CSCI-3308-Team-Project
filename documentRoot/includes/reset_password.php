<!-- Password Reset module -->
<?php
session_start();
include('dbconnect.php');
include('requireLogin.php');
// Check if 'reset-password' button is clicked
if (isset($_POST['reset-password'])) {

  // Retrieve form inputs via POST method
	$pwd_old = mysqli_real_escape_string($conn, $_POST['password_old']);
	$pwd1 = mysqli_real_escape_string($conn, $_POST['password_new1']);
	$pwd2 = mysqli_real_escape_string($conn, $_POST['password_new2']);

	// HANDLE ERRORS
	// Check if inputs are empty
	if(empty($pwd_old)) {
          $_SESSION['error'] = "Please enter your old password.";
          header('Location: ../reset.php');
          exit();
	}
	if(empty($pwd1) || empty($pwd2)) {
          $_SESSION['error'] = "Please enter new password.";
          header('Location: ../reset.php');
          exit();
	}
	if ($pwd1 != $pwd2){
        $_SESSION['error'] = "Passwords do no match.";
        header('Location: ../reset.php');
        exit();
	}

	// Check if old password is correct
	if (!(isset($_SESSION['error']))) {
		$pwd = md5($pwd_old); // Encrypt password
		$sessionUser = $_SESSION['username'];
		$sql = "SELECT * FROM users WHERE user_uid='$sessionUser' AND psswd='$pwd'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			$_SESSION['error'] = "Your old password is incorrect";
      header('Location: ../reset.php');
      exit();
		}
	}

    // Check if new and old password are the same
    if($pwd_old == $pwd1){
        $_SESSION['error'] = "New password must be different than your old password.";
        header('Location: ../reset.php');
        exit();
    }

    // If there are no errors, update the row in the database
	if(count($errors) == 0) {
		$pwd = md5($pwd1); // Encrypt password
		$sql = 'UPDATE users
				SET psswd="'.$pwd.'"
				WHERE user_uid="'.$_SESSION['username'].'"';
		mysqli_query($conn, $sql);

		// Redirect to home
		$_SESSION['success'] = "You have updated your password";
        $_SESSION['username'] = $sessionUser;
		header('Location: ../home.php');
	}
}

?>
