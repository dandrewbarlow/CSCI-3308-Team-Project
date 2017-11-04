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
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/css/bootstrap.css">
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

    <div class="footer">
        <div class="container text-muted center">
			© 2017 Pi In The Sky
        </div>
    </div>
	</body>

</html>
