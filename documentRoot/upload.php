<?php
	session_start();

	// Check whether the user is logged in
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}

	// Includes logout module.
	include('includes/requireLogin.php');
?>
<!-- Website Upload Page -->
<!DOCTYPE html>
<html>
<head>
	<title>Website Upload | Pi In The Sky</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<div class="header">
		<h2>Website Upload<h2>
	</div>
	<div class="content">
	<p>Here you can upload files to be hosted as a new website!<br>
	You can either upload a single html document or a .zip of a website directory<br>
	If you have a domain name for your website, it will be hosted there. <br>
	Otherwise just give your site a name and it'll be hosted at "this_ip/websitename"<br>
	<br>
	If you are uploading a .zip make sure that the page you want a visitor to see first is called "index.html" or any other web accessible file extension.<br></p>
	<!-- Form -->
	<form action="includes/website_upload.php" method="post" enctype="multipart/form-data">
		<?php
			if (isset($_SESSION['username'])) {
				echo "Username: <input type=\"text\" name=\"username\" value=".$_SESSION['username']." disabled><br><br>"
			}
		?>
		<h3>Select File to Upload:</h3>
		Site name:&nbsp;&nbsp;<input type="text" name="siteName"><br><br>
		Is this a domain name?<br>
		<input type="radio" name="domain" value="true">Yes<br><br>
		<input type="file" name="siteFile" id="siteFile"><br><br>
		<input type="submit" value="Upload Website" name="upload-website">
	</form>

	<div>
</body>
</html>
