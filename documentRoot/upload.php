<?php
	session_start();

	// Check whether the user is logged in
	include('includes/requireLogin.php');
?>
<!-- Website Upload Page -->
<!DOCTYPE html>
<html>
<head>
	<title>Website Upload | Pi In The Sky</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="home.php">Pi In The Sky</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="home.php">Home</a>
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
				<h1>Upload New Website</h1><br>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<p>
					Here you can upload files to be hosted as a new website!<br>
					You can either upload a single html document or a .zip of a website directory<br>
					If you have a domain name for your website, it will be hosted there. <br>
					Otherwise just give your site a name and it'll be hosted at "this_ip/websitename"<br><br>
					If you are uploading a .zip make sure that the page you want a visitor to see first is called "index.html" or any other web accessible file extension.
				</p><br>
			</div>
			<div class="col-md-2"></div>
		</div>

		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 center">
				<form action="includes/website_upload.php" method="post" enctype="multipart/form-data">
					<h4>Select File to Upload:</h4>
					<table align="center">
						<tr>
							<td>Site name</td>
							<td><input type="text" name="siteName"></td>
						</tr>
						<tr>
							<td>Is this a domain name?</td>
							<td><input type="radio" name="domain" value="true">Yes</td>
						</tr>
					</table><br>
					<label for="siteFile" class="btn btn-primary">Upload File</label>
					<input type="file" name="siteFile" id="siteFile" style="display: none;"><br><br>
					<input class="btn btn-success" type="submit" value="Upload Website" name="upload-website">
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
		<!-- Form -->

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
