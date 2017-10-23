<!-- Website Upload module -->
<?php

// If 'upload-website' button is clicked
if(isset($_POST['upload-website'])) {
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
	if(!($type == "application/zip" || $type == "text/html")) {
		//exit, report error
		die($type." Is not a valid file type. Must be either .html or .zip");
	}

	//If site name is a domain name:
	if($_POST['domain'] == 'true') {
		//check if valid domain
		$realIP = file_get_contents("http://ipecho.net/plain");
		$givenIP = gethostbyname($siteName);

		//check that domain points to server IP
		if($givenIP != $realIP) {
			die("That domain does not point to this server");
		}
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

	//soft link sites available to sites enabled
	exec('ln -s /etc/apache2/sites-available/'.$siteName.'.conf /etc/apache2/sites-enabled/'.$siteName.'.conf');

	//restart apache
	exec('sudo apache2ctl -k graceful');

}

?>
