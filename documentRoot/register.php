<?php
	session_start();

	// Check if user is logged in
	include('includes/requireLogin');

	// Check if user is superuser
	if($_SESSION['superuser'] != 1){
		$_SESSION['msg']="You do not have privileges";
		header('location: ../index.php');
	}

	// Includes new user registration module
	include('includes/requireSuperuser.php');
	include('includes/register_user.php');
?>
<!-- Webpage for registering new user -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register | Pi In The Sky</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/themes/lumen.min.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>

	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="home.php">Pi In The Sky</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
				<a class="nav-item nav-link" href="reset.php">Reset Password</a>
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
				<h1>Add New User</h1>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

	<div class="extra-space-sm"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 center">
				<?php include('includes/errors.php') ?>
				<form class="login" action="register.php" method="post">
					<table align="center" class="table-right-align">
						<tr>
							<td><label>Name</label>&nbsp;*&nbsp;</td>
							<td><input type="text" name="name" value=""></td>
						</tr>
						<tr>
							<td><label>Email</label>&nbsp;*&nbsp;</td>
							<td><input type="text" name="email" value=""></td>
						</tr>
						<tr>
							<td><label>Username</label>&nbsp;*&nbsp;</td>
							<td><input type="text" name="username" value=""></td>
						</tr>
						<tr>
							<td><label>Password</label>&nbsp;*&nbsp;</td>
							<td><input type="password" name="password1" value=""></td>
						</tr>
						<tr>
							<td><label>Repeat Password</label>&nbsp;*&nbsp;</td>
							<td><input type="password" name="password2" value=""></td>
						</tr>
					</table><br>
					<label>Is the new user also a superuser?</label>&nbsp;&nbsp;
					<input type="radio" name="superuser" value="true">Yes
					<br><br>
					<div class="form-group">
						<button type="submit" name="register" class="btn btn-success">Register new user</button>
					</div>
				</form><br>
				<b>* Required fields</b>
			</div>
			<div class="col-md-2"></div>
		</div>
		
	<?php include('includes/errors.php');?>
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
