<?php
	session_start();

	// Check if user is logged in
	include('includes/requireLogin.php');

	//make sure user is superuser
	if($_SESSION['superuser'] != 1){
		$_SESSION['msg']="You do not have privileges";
		header('location: ../index.php');
	}

	// Includes new user registration module
	include('includes/requireSuperuser.php');
	include('includes/dbconnect.php');
?>
<!-- List of all users -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>All Users | Pi In The Sky</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
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
					<a class="nav-item nav-link active" href="#">Manage Users <span class="sr-only">(current)</span></a>
				<?php endif ?>
				<a class="nav-item nav-link" href="userSites.php">Manage Websites</a>
				<a class="nav-item nav-link" href="storage.php">Cloud Storage</a>
				<a class="nav-item nav-link" href="reset.php">Reset Password</a>
				<a class="nav-item nav-link" href="includes/logout.php">Logout</a>
			</div>
		</div>
	</nav>
	<!-- End navbar -->

	<!-- Header -->
	<div class="extra-space-sm"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 header">
				<h1>Manage Users</h1>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<!-- End header -->

	<div class="extra-space-sm"></div>
	<div class="container description">

		<a class="btn btn-primary" href="register.php">Create a new user</a><br><br><br>

		<div class="row">

			<!-- Superusers -->
			<div class="col-md-6">
				<h2>Superusers</h2><br>
				<table align="center" class="table-border">
					<tr> <th>Id</th> <th>Name</th> <th>Email</th> <th>Username</th> <th>Delete?</th> </tr>
					<?php
						$query = "SELECT * FROM users WHERE superuser = 1";
						$result = mysqli_query($conn, $query);
						while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
						   echo "<tr>";
						   echo "<td>$row[0]</td> <td>$row[1]</td> <td>$row[2]</td> <td>$row[3]</td>";
						   if ($row[3] != $_SESSION['username']) {
							   echo "<td><input type=\"submit\" class=\"btn btn-danger delete-user\" name=\"".$row[0]."\"value=\"Delete\"/></td>";
						   }
						   else {
							   echo "<td></td>";
						   }
						   echo "</tr>";
					   }
					?>
				</table>
				<div class="extra-space-sm"></div>
				<p><b>*You cannot delete yourself</b></p>
			</div>
			<!-- End superusers -->

			<!-- Normal users -->
			<div class="col-md-6">
				<h2>Normal Users</h2><br>
				<table align="center" class="table-border">
					<tr> <th>Id</th> <th>Name</th> <th>Email</th> <th>Username</th> <th>Delete?</th> </tr>
					<?php
						$query = "SELECT * FROM users WHERE superuser = 0";
						$result = mysqli_query($conn, $query);
						while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
						   echo "<tr>";
						   echo "<td>$row[0]</td> <td>$row[1]</td> <td>$row[2]</td> <td>$row[3]</td>";
						   echo "<td><input type=\"submit\" class=\"btn btn-danger delete-user\" name=\"".$row[0]."\"value=\"Delete\"/></td>";
						   echo "</tr>";
					   }
					?>
				</table>
			</div>
			<!-- End normal users -->
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
		$(document).ready(function(){
			$('.delete-user').click(function(){
				var clickBtnName = $(this).attr('name');
				var ajaxurl = './includes/userDeleteHandler.php';
				var data = {'id': clickBtnName};
				$.post(ajaxurl, data, function(response) {
					window.location.href="./allUsers.php";
				});
			});
		});
	</script>
</body>
</html>
