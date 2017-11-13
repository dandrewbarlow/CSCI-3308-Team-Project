<!-- Register New User module -->
<?php
session_start();
include('requireSuperuser.php');
include('dbconnect.php');
// Check whether the 'register' button is clicked
if (isset($_POST['register'])) {

  // Retrieve form inputs via POST method
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd1 = mysqli_real_escape_string($conn, $_POST['password1']);
	$pwd2 = mysqli_real_escape_string($conn, $_POST['password2']);
    if ($_POST['superuser'] == 'true') {
        $superuser = 1;
    }
    else {
        $superuser = 0;
    }

	// HANDLE ERRORS
	// Check if inputs are empty
	if(empty($name)) {
    $_SESSION['error'] = "Please enter name.";
    header('Location: ../home.php');
    exit();
	}
	if(empty($email)) {
    $_SESSION['error'] = "Please enter email.";
    header('Location: ../home.php');
    exit();
	}
	if(empty($uid)) {
    $_SESSION['error'] = "Please enter username.";
    header('Location: ../home.php');
    exit();
	}
	if(empty($pwd1) || empty($pwd2)) {
    $_SESSION['error'] = "Please enter password.";
    header('Location: ../home.php');
    exit();
	}
	if ($pwd1 != $pwd2){
    $_SESSION['error'] = "Passwords do no match.";
    header('Location: ../home.php');
    exit();
	}

    // Check if username already exists
  if(!empty($uid)){
    $sql = "SELECT * FROM users WHERE user_uid='$uid'";
	  $result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
    if ($resultCheck >= 1){
      $_SESSION['error'] =  "Username already exists.");
      header('Location: ../home.php');
      exit();
    }
  }

    // If there are no errors, insert new row into table

	$pwd = md5($pwd1); // Encrypt password
	$sql = "INSERT INTO users (user_name, user_email, user_uid, psswd, superuser)
				VALUES ('$name', '$email', '$uid', '$pwd', '$superuser')";
	mysqli_query($conn, $sql);

	//create user storage directory
	exec('mkdir /var/data/'.$uid);

  // Redirect to home
	$_SESSION['success'] = "You have created a new user";
	header('Location: ../allUsers.php');
}

?>
