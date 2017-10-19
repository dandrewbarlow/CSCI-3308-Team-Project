<?php
//If not coming from submit page:
//	go to login page
session_start();
if (!isset($_SESSION['username']))
{
	$_SESSION['msg'] = "You must log in first";
	header['location: index.php'];
}


if(isset($_POST['submit']))
{
	//get file name
	$name = $_FILES['siteFile']['name'];
	//get file tmpName
	$tmpName = $_FILES['siteFile']['tmp_name'];
	//get file type
	$type = $_FILES['siteFile']['type'];
	//get file size
	$size = $_FILES['siteFile']['size'];
	//get site name
	$siteName = $_POST['siteName'];

	
	//if type is not an allowable type:
	if(!($type == "application/zip" || $type == "text/html"))
	{
		//exit, report error
		echo $type;
		echo " is an improper File type. Must be .zip or .html";
	}


	//Upload file to new directory
	exec('mkdir /var/www/$siteName/');
	if(move_uploaded_file($_FILES['siteFile']['tmp_name'], '/var/www/$siteName/'))
	{
		if($type == "application/zip")
		{
			exec('unzip /var/www/$sitename/$name');
		}
	}
	else
	{
		exec('rmdir /var/www/$siteName/');
		echo "There was an issue uploading your file";
	}
	//while checksum fails:
	//	Upload file to new directory
	//	counter++
	//	if counter > maxTries
	//		exit, report error
		
	//If there is a domain name:
	//	check if valid domain
	//	check that domain points to server IP
	//	add entry to sites-available with domain name and document root
	//	add soft link from sites-enabled to sites-available entry
	//else:
	//	add alias to apache2.conf to ip/sitename
	//
	
	//restart apache
}
?>

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
	Otherwise just give your site a name and it'll be hosted at "this_ip/websitename"</p>
	<!-- Form -->
	<form action="websiteUpload.php" method="post" enctype="multipart/form-data">
		Select File to Upload:
		Site name:<input type="text" name="siteName"><br>
		<input type="file" name="siteFile" id="siteFile"><br>
		<input type="submit" value="Upload File" name="submit">
	</form>

	<div>
</body>
</html>
