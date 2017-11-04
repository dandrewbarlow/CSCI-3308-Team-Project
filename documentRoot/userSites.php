<?php
session_start();

include('includes/requireLogin.php');
include('includes/dbconnect.php');
?>
<html>
<head>
	<title>Hosted Sites | Pi In The Sky</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<div class="header">
		<h2>Website Management</h2>
	</div>
	<div class="content">
		<p>Here you can manage what websites your sever is currently hosting</p>
		<h2>Enabled Sites</h2>
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
		</table>
		<h2>Available Sites</h2>
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
		</table>
		<br><br>
		<a href="upload.php">Create a site</a>
	</div>
</body>
</html>
