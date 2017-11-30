<?php
	session_start();

	// Check whether the user is logged in
	include('includes/requireLogin.php');
?>
<!-- Home page for a logged in user -->
<!DOCTYPE html>
<html>
<head>
	<title>Home | Pi In The Sky</title>
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
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
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
				<h1>Home Page</h1>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

	<br>
	<div class="center">
		<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong>! What's on your mind today?</p>
	</div><br><br>

	<div class="container">
		<div class="row">
			<!-- If superuser display user dashboard stuff. Otherwise pad it -->
			<?php  if ($_SESSION['superuser'] == 1) : ?>
				<div class="col-md-4">
					<div class="card card-clickable" style="width: 20rem;">
						<div class="card-body">
							<h4 class="card-title">Manage Users</h4>
							<p class="card-text">Add and delete users</p><br><br>
							<a href="allUsers.php" class="card-link"></a>
						</div>
					</div>
				</div>
			<?php endif ?>
			<?php  if ($_SESSION['superuser'] == 0) : ?>
				<div class="col-md-2"></div>
			<?php endif ?>

			<div class="col-md-4">
				<div class="card card-clickable" style="width: 20rem;">
					<div class="card-body">
						<h4 class="card-title">Manage your websites</h4>
						<p class="card-text">Check and modify the status of all of your websites. Add new websites and remove existing ones</p>
						<a href="userSites.php" class="card-link"></a>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card card-clickable" style="width: 20rem;">
					<div class="card-body">
						<h4 class="card-title">Cloud Storage</h4>
						<p class="card-text">Upload new files to the cloud. View and modify existing files.</p><br>
						<a href="storage.php" class="card-link"></a>
					</div>
				</div>
			</div>

			<!-- If not a superuser, pad it -->
			<?php  if ($_SESSION['superuser'] == 0) : ?>
				<div class="col-md-2"></div>
			<?php endif ?>
		</div>

		<div class="extra-space-sm"></div>

		<div class="row">
			<div class="col-md-4"></div>

			<div class="col-md-4">
				<div class="card card-clickable" style="width: 20rem;">
					<div class="card-body">
						<h4 class="card-title">Restart Server</h4>
						<p class="card-text">
							Restart the server<br>
							<span class="error-msg">Warning! Can disrupt other users' activities.</span>
						</p>
						<a href="includes/restart_server.php" class="card-link"></a>
					</div>
				</div>
			</div>

			<div class="col-md-4"></div>
		</div>

	</div>
	<div class="extra-space-sm"></div>

	<!-- Footer -->
	<!-- <div class="footer">
	    <div class="container text-muted center">
			© 2017 Pi In The Sky
	    </div>
	</div> -->
	<!-- End footer -->

	<script>
		$(".card-clickable").click(function() {
			window.location = $(this).find("a").attr("href");
			return false;
		});
	</script>
</body>
</html>
