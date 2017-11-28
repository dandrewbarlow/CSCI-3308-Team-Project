<?php
	session_start();

	// If already logged in, redirect to home page
	if (isset($_SESSION['username'])) {
		header('location: home.php');
	}

	include('includes/login.php')
?>
<!-- Login Page -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login | Pi In The Sky</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/themes/lumen.min.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>

	<div class="extra-space-sm"></div>

	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 header">
				<h1>Pi In the Sky</h1>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<?php include('includes/errors.php');?>

	<div class="extra-space-md"></div>

	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="login-form">
					<h2>Login</h2>
					<div class="extra-space-sm"></div>
					<?php include('includes/errors.php') ?>

					<form class="login" action="index.php" method="post">
						<div class="form-group">
							<label>Username</label>&nbsp;
							<input type="text" name="username" value="">
						</div>
						<div class="form-group">
							<label>Password</label>&nbsp;
							<input type="password" name="password" value="">
						</div>
						<div class="form-group">
							<button type="submit" name="login" class="btn btn-primary">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>

	<!-- Footer -->
	<div class="footer">
	    <div class="container text-muted center">
			© 2017 Pi In The Sky
	    </div>
	</div>
	<!-- End footer -->
</body>
</html>
