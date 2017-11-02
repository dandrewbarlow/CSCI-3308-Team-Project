<?php
if(isset($_POST['storage-submit'])){
	session_start();
	$numErrors = 0;
	$username = $_SESSION['username'];
	$privacy = $_POST['privacy'];

	$storageDir = '/var/data/';
	
	if(!isset($privacy)){
		die("You must make your file public or private");
	}
	if($privacy == 'public'){
		$storageDir = $storageDir.'public/';
	}else{
		//NEED TO MAKE USER DIR ON USER REGISTRATION
		$storageDir = $storageDir.$username.'/';
	}
	//If uploading a file:
	if(!($_FILES['uploadFile']['name'] == "")){
		$tmpName = $_FILES['uploadFile']['tmp_name'];//get file tmp name
		$name = $_FILES['uploadFile']['name'];//get file name
		$type = $_FILES['uploadFile']['type'];//get file type 
		$size = $_FILES['uploadFile']['size'];//get file size
		
	
		//check file specifics
		//move to private or public storage
		if(move_uploaded_file($tmpName, $storageDir.$name)){
			
			//store metadata in mysql
		}else{
			die($name." file upload unsuccessful. Please go back and try again");
		}
	}
	//If torrenting file:
	if(isset($_POST['TorURL'])){
		$URL = $_POST['TorURL'];//get torrent URL
		//start torrent with transmission
		exec('transmission-cli -w '.$storageDir.' "'.$TorURL.'"');
	}
	// Return to storage page
	header('location: /storage.php');
}
?>
