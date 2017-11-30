<?php
	session_start();

	// Check if user is logged in
	include('includes/requireLogin.php');
	include('includes/reset_password.php');
?>
<!-- Webpage for resetting password -->
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password | Pi In The Sky</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/themes/lumen.min.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/themes/solarized.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="home.php">Pi In The Sky</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="true" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="home.php">Home</a>
				<?php  if ($_SESSION['superuser'] == 1) : ?>
					<a class="nav-item nav-link" href="allUsers.php">Manage Users</a>
				<?php endif ?>
				<a class="nav-item nav-link" href="userSites.php">Manage Websites</a>
				<a class="nav-item nav-link" href="storage.php">Cloud Storage</a>
				<a class="nav-item nav-link active" href="#">Reset Password <span class="sr-only">(current)</span></a>
				<a class="nav-item nav-link" href="includes/logout.php">Logout</a>
			</div>
		</div>
	</nav>
	<!-- End navbar -->

	<div class="extra-space-sm"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 header">
				<h1>Reset Password</h1>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

	<div class="extra-space-sm"></div>

	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="login-form">
					<?php include('includes/errors.php') ?>
						<form class="login" action="reset.php" method="post">
							<table class="table-right-align" align="center">
								<div class="form-group">
									<tr><td><label>Old Password</label>&nbsp;</td>
									<td><input type="password" name="password_old" value=""></td></tr>
								</div>
								<div class="form-group">
									<tr><td><label>New Password</label>&nbsp;</td>
									<td><input type="password" name="password_new1" value=""></td></tr>
								</div>
								<div class="form-group">
									<tr><td><label>Repeat New Password</label>&nbsp;</td>
									<td><input type="password" name="password_new2" value=""></td></tr>
								</div>
							</table><br>
							<div class="form-group">
								<button type="submit" name="reset-password" class="btn btn-primary">Reset Password</button>
							</div>
						</form>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
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
