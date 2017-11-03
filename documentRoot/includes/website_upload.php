<!-- Website Upload module -->
<?php
session_start();
include('requireLogin.php');
include('dbconnect.php');
// If 'upload-website' button is clicked
if(isset($_POST['upload-website'])) {

	$name = $_FILES['siteFile']['name']; // get file name
	$tmpName = $_FILES['siteFile']['tmp_name']; // get file tmpName
	$type = $_FILES['siteFile']['type']; // get file type
	$size = $_FILES['siteFile']['size']; // get file size

	$numErrors = 0;
	$username = $_SESSION['username']; // get user who created website
	$siteName = $_POST['siteName']; // get site name
	$isEnabled = 1; // enable it by default
	$srcPath = '/var/userSites/'.$siteName.'/'; // source path

	//if type is not an allowable type, exit and report error
	if(!($type == "application/zip" || $type == "text/html")) {
		$numErrors++;
		die($type." Is not a valid file type. Must be either .html or .zip");
	}

	//If site name is a domain name:
	if($_POST['domain'] == 'true') {
		$isDomain = 1; // store boolean value

		//check if valid domain
		$realIP = file_get_contents("http://ipecho.net/plain");
		$givenIP = gethostbyname($siteName);

		//check that domain points to server IP
		if($givenIP != $realIP) {
			$numErrors++;
			die("That domain does not point to this server");
		}
	}
	else {
		$isDomain = 0; // store boolean value
	}

	//while checksum fails:
	//	Upload file to new directory
	//	counter++
	//	if counter > maxTries
	//		exit, report error

	//FALUIRES SHOULD NOT OCCUR AFTER THIS POINT
	//DO ALL ERROR CHECKING ABOVE HERE

	//create directory
	exec('mkdir /var/userSites/'.escapeshellarg($siteName).'/');
	//Upload file to new directory
	if(move_uploaded_file($_FILES['siteFile']['tmp_name'], '/var/userSites/'.$siteName.'/'.$name)) {
		//unzip zipped files
		if($type == "application/zip") {
			$zip = new ZipArchive;
			if($zip->open('/var/userSites/'.$siteName.'/'.$name)) {
				$zip->extractTo('/var/userSites/'.$siteName.'/');
				$zip->close();
			}
			else {
				$numErrors++;
				echo 'unzip failed';
			}
		}
		else {
			//If just one file, make it the index file
			exec('mv /var/userSites/'.$siteName.'/'.$name.' /var/userSites/'.$siteName.'/index.html');
		}
	}
	else {
		//if something went wrong, remove the directory
		exec('rmdir /var/userSites/'.escapeshellarg($siteName).'/');
		echo "There was an issue uploading your file";
	}

	//If site name is a domain name:
	if($_POST['domain'] == 'true') {
		//add entry to sites-available with domain name and document root
		$confFile = fopen('/etc/apache2/sites-available/'.$siteName.'.conf','w');
		fwrite($confFile,"<VirtualHost *:80>\n");
		fwrite($confFile,"  ServerName ".$siteName);
		fwrite($confFile,"\n");
		fwrite($confFile,"  ServerAlias www.".$siteName);
		fwrite($confFile,"\n");
		fwrite($confFile,"  DocumentRoot /var/userSites/".$siteName."/");
		fwrite($confFile,"\n");
		fwrite($confFile,"  ErrorLog /var/log/apache2/".$siteName."_error.log");
		fwrite($confFile,"\n");
		fwrite($confFile,"  <Directory />");
		fwrite($confFile,"\n");
		fwrite($confFile,"    Require all granted");
		fwrite($confFile,"\n");
		fwrite($confFile,"  </Directory>");
		fwrite($confFile,"\n");
		fwrite($confFile,"</VirtualHost>");
		fclose($confFile);
	}
	else {
		//add directory and alias to new sites-available conf file
		$confFile = fopen('/etc/apache2/sites-available/'.$siteName.'.conf','w');
		fwrite($confFile,'Alias /'.$siteName.' "/var/userSites/'.$siteName.'/"');
		fwrite($confFile,"\n");
		fwrite($confFile,'<Directory /var/userSites/'.$siteName.'/>');
		fwrite($confFile,"\n");
		fwrite($confFile,'  Require all granted');
		fwrite($confFile,"\n");
		fwrite($confFile,'</Directory>');
		fwrite($confFile,"\n");
		fclose($confFile);
	}

	// If we encountered no errors, insert new entry into database
	if ($numErrors == 0){
		$date = date("Y-m-d H:i:s");
		$username = $_SESSION['username'];
		$sql = "INSERT INTO websites (user_uid, created_on, website_name, is_domain, is_enabled, src_path)
					VALUES ('$username', '$date', '$siteName', '$isDomain', '$isEnabled', '$srcPath')";
		mysqli_query($conn, $sql);
	}

	//soft link sites available to sites enabled
	exec('ln -s /etc/apache2/sites-available/'.$siteName.'.conf /etc/apache2/sites-enabled/'.$siteName.'.conf');

	//restart apache
	exec('sudo apache2ctl -k graceful');
	header('location: ../userSites.php');

}

?>
