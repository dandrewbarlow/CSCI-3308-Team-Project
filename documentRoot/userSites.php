<?php
session_start();

include('includes/requireLogin.php');
include('includes/dbconnect.php');
?>
<html>
<head>
	<title>Hosted Sites | Pi In The Sky</title>
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
				<?php  if ($_SESSION['superuser'] == 1) : ?>
					<a class="nav-item nav-link" href="allUsers.php">Manage Users</a>
				<?php endif ?>
				<a class="nav-item nav-link active" href="#">Manage Websites <span class="sr-only">(current)</span></a>
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
				<h1>Website Management</h1>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

	<div class="description">
		<p>Manage your websites the sever is currently hosting</p><br>
		<a class="btn btn-primary" href="upload.php">Create a new website</a><br><br>
		<h2>Enabled Sites</h2><br>
		<table align="center">
		<?php
			$query = "";
			if ($_SESSION['superuser'] == 1) {
				$query .= "SELECT * FROM websites WHERE is_enabled = 1";
			}
			else {
				$username = $_SESSION['username'];
				$query .= "SELECT * FROM websites WHERE (is_enabled = 1 AND user_uid = '$username')";
			}
			$result = mysqli_query($conn, $query);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck == 0) {
				echo "There no enabled sites right now.";
			}
			else {
				$filelist = "<tr><th>Id</th><th>Website Name</th><th>Created By</th><th>Created On</th><th>Is Domain?</th><th>Disable?</th></tr>";
				while($row = mysqli_fetch_array($result)){
					$form = '<form method="post" action="includes/siteDisable.php"><input type="hidden" name="siteID" value="'.$row['website_name'].'">';
					$button = '<input type="submit" value="disable"></form>';
					$filelist .= "<tr><td>".$row['site_id'].'</td>';
					$filelist .= "<td>".$row['website_name'].'</td>';
					$filelist .= "<td>".$row['user_uid'].'</td>';
					$filelist .= "<td>".$row['created_on'].'</td>';
					$filelist .= "<td>".$row['is_domain'].'</td>';
					$filelist .= '<td>'.$form.$button.'</td></tr><br>';
				}
				echo $filelist;
			}
		?>
		</table><br><br>
		<h2>Available Sites</h2><br>
		<table align="center">
		<?php
			$query = "";
			if ($_SESSION['superuser'] == 1) {
				$query = "SELECT * FROM websites WHERE is_enabled = 0";
			}
			else {
				$username = $_SESSION['username'];
				$query = "SELECT * FROM websites WHERE (is_enabled = 0 AND user_uid='$username')";
			}
			$result = mysqli_query($conn, $query);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck == 0) {
				echo "There no other available sites right now.";
			}
			else {
				$filelist = "<tr>";
				$filelist .= "<th>Id</th><th>Website Name</th><th>Created By</th><th>Created On</th><th>Is Domain?</th><th>Enable?</th><th>Delete?</th>";
				$filelist .= "</tr>";
				while($row = mysqli_fetch_array($result)){
					$form = '<form method="post" action="includes/siteEnable.php"><input type="hidden" name="siteID" value="'.$row['website_name'].'">';
					$button = '<input type="submit" value="Enable"></form>';
					$form2 = '<form method="post" action="includes/siteDelete.php"><input type="hidden" name="siteID" value="'.$row['website_name'].'">';
					$button2 = '<input type="submit" value="Delete"></form>';
					$filelist .= "<tr><td>".$row['site_id'].'</td>';
					$filelist .= "<td>".$row['website_name'].'</td>';
					$filelist .= "<td>".$row['user_uid'].'</td>';
					$filelist .= "<td>".$row['created_on'].'</td>';
					$filelist .= "<td>".$row['is_domain'].'</td>';
					$filelist .= '<td>'.$form.$button.'</td><td>'.$form2.$button2.'</td></tr><br>';
				}
				echo $filelist;
			}
		?>
		</table><br><br>
	</div>

	<!-- Footer -->
	<!-- <div class="footer">
	    <div class="container text-muted center">
			© 2017 Pi In The Sky
	    </div>
	</div> -->
	<!-- End footer -->
</body>
</html>
