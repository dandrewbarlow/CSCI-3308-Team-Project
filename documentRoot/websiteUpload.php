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
	echo $siteName;
	
	//if type is not an allowable type:
	if(!($type == "application/zip" || $type == "text/html"))
	{
		//exit, report error
		echo $type;
		echo " is an improper File type. Must be .zip or .html";
	}


	//Upload file to new directory
	exec('mkdir /var/userSites/'.escapeshellarg($siteName).'/');
	if(move_uploaded_file($_FILES['siteFile']['tmp_name'], '/var/userSites/'.$siteName.'/'.$name))
	{
		if($type == "application/zip")
		{
			exec('unzip /var/www/'.escapeshellarg($sitename).'/'.escapeshellarg($name));
		}
	}
	else
	{
		exec('rmdir /var/userSites/'.escapeshellarg($siteName).'/');
		echo "There was an issue uploading your file";
	}
	//while checksum fails:
	//	Upload file to new directory
	//	counter++
	//	if counter > maxTries
	//		exit, report error
		
	//If site name is a domain name:
	if($_POST['domain'] == 'true')
	{
		//check if valid domain
		//check that domain points to server IP
		//add entry to sites-available with domain name and document root
		//add soft link from sites-enabled to sites-available entry
	}
	else
	{
		//add directory and alias to new sites-available conf file
	}

	//soft link sites available to sites enabled
	//exec('ln -s /etc/apache2/sites-available/$siteName.conf /etc/apache2/sites-enabled/$siteName.conf')
	
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
		Is this a domain name?<br>
		<input type="radio" name="domain" value="true">Yes<br>
		<input type="file" name="siteFile" id="siteFile"><br>
		<input type="submit" value="Upload File" name="submit">
	</form>

	<div>
</body>
</html>
