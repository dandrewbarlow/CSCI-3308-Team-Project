<?php
	session_start();

	// Check if user is logged in
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}
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
		<link rel="stylesheet" href="/css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	</head>
	<body>
		<div class="header">
			<h1>Pi In the Sky</h1>
		</div>
		<div class="content">
			<a href="/home.php">Go back home</a><br><br>
			<h2>Superusers</h2>
			<table align="center">
				<tr> <th>Id</th> <th>Name</th> <th>Email</th> <th>Username</th> <th>Delete?</th> </tr>
				<?php
					$query = "SELECT * FROM users WHERE superuser = 1";
					$result = mysqli_query($conn, $query);
					while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
					   echo "<tr>";
					   echo "<td>$row[0]</td> <td>$row[1]</td> <td>$row[2]</td> <td>$row[3]</td>";
					   if ($row[3] != $_SESSION['username']) {
						   echo "<td><input type=\"submit\" class=\"button\" name=\"".$row[0]."\"value=\"Delete\"/></td>";
					   }
					   else {
						   echo "<td></td>";
					   }
					   echo "</tr>";
				   }
				?>
			</table>
			<p><b>*You cannot delete yourself</b></p>
			<br><br><br><br>

			<h2>Normal Users</h2>
			<table align="center">
				<tr> <th>Id</th> <th>Name</th> <th>Email</th> <th>Username</th> <th>Delete?</th> </tr>
				<?php
					$query = "SELECT * FROM users WHERE superuser = 0";
					$result = mysqli_query($conn, $query);
					while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
					   echo "<tr>";
					   echo "<td>$row[0]</td> <td>$row[1]</td> <td>$row[2]</td> <td>$row[3]</td>";
					   echo "<td><input type=\"submit\" class=\"button\" name=\"".$row[0]."\"value=\"Delete\"/></td>";
					   echo "</tr>";
				   }
				?>
			</table>

		</div>

		<script>
			$(document).ready(function(){
				$('.button').click(function(){
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
