<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}

	if (isset($_POST['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
	}

	include('includes/reset-password.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Reset Password | Pi In The Sky</title>
		<link rel="stylesheet" type="text/css" href="/css/style.css">
	</head>
	<body>
		<div class="header">
			<h1>Pi In the Sky</h1>
		</div>
		<div class="extra-space"></div>

		<div class="login-form">
			<h2>Reset Password</h2>
			<?php include('includes/errors.php') ?>
			<form class="login" action="reset.php" method="post">
				<div class="input-group">
					<label>Old Password</label>&nbsp;
					<input type="password" name="password_old" value="">
				</div>
				<div class="input-group">
					<label>New Password</label>&nbsp;
					<input type="password" name="password_new1" value="">
				</div>
				<div class="input-group">
					<label>Repeat New Password</label>&nbsp;
					<input type="password" name="password_new2" value="">
				</div>
				<div class="input-group">
					<button type="submit" name="reset-password" class="btn">Reset Password</button>
				</div>
			</form>
		</div>

	</body>
</html>
