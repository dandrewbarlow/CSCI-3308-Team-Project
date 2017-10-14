<?php
	session_start();

	// Check if user is logged in
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}

	// Includes new user registration module
	include('includes/server.php');
?>
<!-- Webpage for registering new user -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register | Pi In The Sky</title>
		<link rel="stylesheet" href="/css/style.css">
	</head>

	<body>
		<div class="header">
			<h1>Pi In the Sky</h1>
		</div>
		<div class="extra-space"></div>

		<div class="login-form">
			<h2>Register new user</h2>

			<?php include('includes/errors.php') ?>

			<form class="login" action="register.php" method="post">
				<div class="input-group">
					<label>Name</label>&nbsp;
					<input type="text" name="name" value="">
				</div>
				<div class="input-group">
					<label>Email</label>&nbsp;
					<input type="text" name="email" value="">
				</div>
				<div class="input-group">
					<label>Username</label>&nbsp;
					<input type="text" name="username" value="">
				</div>
				<div class="input-group">
					<label>Password</label>&nbsp;
					<input type="password" name="password1" value="">
				</div>
				<div class="input-group">
					<label>Repeat Password</label>&nbsp;
					<input type="password" name="password2" value="">
				</div>
				<div class="input-group">
					<button type="submit" name="register" class="btn">Register new user</button>
				</div>
			</form>

		</div>

		<div class="footer" style="padding: 10px;">
			&copy; The Pi.in.the.Sky Team
		</div>

	</body>

</html>
