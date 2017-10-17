<?php
//If not coming from submit page:
//	report error, exit
//
//get file name
//get file tmpName
//get file type
//get file size
//
//if type is not an allowable type:
//	exit, report error
//
//if size > MAXFILESIZE:
//	exit, report error
//
//Upload file to new directory
//while checksum fails:
//	Upload file to new directory
//	counter++
//	if counter > maxTries
//		exit, report error
//
//If there is a domain name:
//	check if valid domain
//	check that domain points to server IP
//	add entry to sites-available with domain name and document root
//	add soft link from sites-enabled to sites-available entry
//else:
//	add alias to apache2.conf to ip/sitename
//
//restart apache
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
	<div>
</body>
</html>
