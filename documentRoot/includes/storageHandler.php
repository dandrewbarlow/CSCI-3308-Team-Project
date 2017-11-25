<?php
include('requireLogin.php');
if(isset($_POST['storage-submit'])){
	session_start();
	$username = $_SESSION['username'];
	$privacy = $_POST['privacy'];

	$storageDir = '/var/data/';

	if(!isset($privacy)){
		$_SESSION['error'] = "You must make your file public or private";
		header('location: /storage.php');
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
			$_SESSION['error'] = $name." file upload unsuccessful. Please try again";
			header('location: /storage.php');
		}
	}
	// Return to storage page

	$_SESSION['success'] = 'Uploaded file';

	header('location: /storage.php');
}
?>
