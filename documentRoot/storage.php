<?php
session_start();
if (!isset($_SESSION['username'])){
	$_SESSION['msg'] = "You must log in first";
	header("location: index.php");
}
include('includes/server.php');
?>

<html>
<head>
	<title>Cloud Storage | Pi In The Sky</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<div class="header">
		<h2>Cloud Storage</h2>
	</div>
	<div class="content">
		<p>Here you can upload files to your server!<br>
		You can upload files from your computer, or specify a bit torrent URL for your server to download.<br>
		You can also specify if you want this file to be available to only you, or everyone.</p>
		
		<form action="storageHandler.php" method="post" enctype="multipart/form-data">
			Select file to upload:<input type="file" name="uploadFile" id="uploadFile"><br>
			Or specify a bitTorrent URL:<input type="text" name="TorURL"><br>
			Is this a private or public file:<input type="radio" name="privacy" value="private">Private
			<input type="radio" name="privacy" value="public">Public<br>
			<input type="submit" name="storage-submit" value="Upload File">
		</form>
		<!-- Display uploaded files here -->
	</div>
</body>
