<?php
include('requireLogin.php');
include('dbconnect.php')
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
		$is_private=0;
		$storageDir = $storageDir.'public/';
	}else{
		//NEED TO MAKE USER DIR ON USER REGISTRATION
		$is_private=1;
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
			$sql='INSERT INTO storage (name, username, prefix, is_private, stored_on)
						VALUES ('.$name.','.$username.','.$storageDir.','.$is_private.','.date("Y-m-d H:i:s").')';
			mysqli_query($conn, $sql);
		}else{
			die($name." file upload unsuccessful. Please go back and try again");
		}
	}
	//If torrenting file:
	if(isset($_POST['TorURL'])){
		$URL = $_POST['TorURL'];//get torrent URL
		//start torrent with transmission
		exec('cd /var/data/; nohup transmission-cli -w '.$storageDir.' "'.$URL.'" 1>/dev/null 2>/dev/null &');
	}
	// Return to storage page
	header('location: /storage.php');
}
?>
