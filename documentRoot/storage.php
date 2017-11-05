<?php
session_start();

//make sure user is logged in
include('includes/requireLogin.php');
?>

<html>
<head>
	<title>Cloud Storage | Pi In The Sky</title>
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
				<a class="nav-item nav-link" href="userSites.php">Manage Websites</a>
				<a class="nav-item nav-link active" href="storage.php">Cloud Storage <span class="sr-only">(current)</span></a>
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
				<h1>Cloud Storage</h1><br>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<p>
					Here you can upload files to your server!<br>
					You can upload files from your computer, or specify a bit torrent URL for your server to download.<br>
					You can also specify if you want this file to be available to only you, or everyone.
				</p><br>
			</div>
			<div class="col-md-2"></div>
		</div>

		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 center">
				<form action="includes/storageHandler.php" method="post" enctype="multipart/form-data">
					<input type="file" name="uploadFile" id="uploadFile" /><br><br>
					<table align="center">
						<tr>
							<td>Or Specify bitTorrent URL</td>
							<td>&nbsp;&nbsp;&nbsp;</td>
							<td><input type="text" name="TorURL"></td>
						</tr>
						<tr>
							<td>Is this a private or public file?</td>
							<td>&nbsp;&nbsp;&nbsp;</td>
							<td>
								<input type="radio" name="privacy" value="private">&nbsp;&nbsp;Private
								&nbsp;&nbsp;&nbsp;
								<input type="radio" name="privacy" value="public">&nbsp;&nbsp;Public
							</td>
						</tr>
					</table><br>
					<input class="btn btn-success" type="submit" name="storage-submit" value="Upload File">
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="extra-space-sm"></div>

		<!-- Display uploaded files here -->
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<h2 style="text-align: center;">Private Files</h2>
				<?php
					$fileList = "";
					if($handle = opendir('/var/data/'.$_SESSION['username'].'/')){
						while (false != ($file = readdir($handle))){
							if($file != "." && $file != ".."){
								$deletebutton = '<form action="includes/storageDelete.php" method="post" enctype="multipart/form-data">';
								$deletebutton2='<input type="hidden" name="privateFile" value="'.$file.'"><input type="submit" value="Delete"></form>';
								$fileList .= '<a href="/data/'.$_SESSION['username'].'/'.$file.'" download>'.$file.'</a>'.$deletebutton.$deletebutton2.'<br>';
							}
						}
						closedir($handle);
					}else{
						echo "Error displaying files";
					}
				?>
				<div name="private" style="border:1px">
					<?php echo $fileList; ?>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="extra-space-sm"></div>

		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<h2 style="text-align: center;">Public Files</h2>
				<?php
					$fileList = "";
					if($handle = opendir('/var/data/public/')){
						while (false != ($file = readdir($handle))){
							if($file != "." && $file != ".."){
								$deletebutton = '<form action="includes/storageDelete.php" method="post" enctype="multipart/form-data">';
								$deletebutton2='<input type="hidden" name="publicFile" value="'.$file.'"><input type="submit" value="Delete"></form>';
								$fileList .= '<a href="/data/public/'.$file.'" download>'.$file.'</a>'.$deletebutton.$deletebutton2.'<br>';
							}
						}
						closedir($handle);
					}else{
						echo "Error displaying files";
					}
				?>
				<div name="public" style="border:1px">
					<ul><?php echo $fileList; ?></ul>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="extra-space-md"></div>

	</div>

	<!-- Footer -->
	<!-- <div class="footer">
	    <div class="container text-muted center">
			© 2017 Pi In The Sky
	    </div>
	</div> -->
	<!-- End footer -->
</body>
