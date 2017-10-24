<?php
if(isset($_POST['storage-submit'])){
	//If uploading a file:
	if(isset($_FILES['uploadFile'])){
		$tmpName = $_FILES['uploadFile']['tmp_name'];//get file tmp name
		$name = $_FILES['uploadFile']['name'];//get file name
		$type = $_FILES['uploadFile']['type'];//get file type 
		$size = $_FILES['uploadFile']['size'];//get file size
		
		$numErrors = 0;
		$username = $_SESSION['username'];
		$privacy = $_POST['privacy'];

		$storageDir = '/var/data/';
		if($privacy == 'public'){
			$storageDir = $storageDir.'public/';
		}else{
			//NEED TO MAKE USER DIR ON USER REGISTRATION
			$storageDir = $storageDir.$username.'/';
		}
	
		//check file specifics
		//move to private or public storage
		if(move_uploaded_file($tmpName, $storageDir.$name)){
			
			//store metadata in mysql
		}else{
			die('file was not uploaded successfully'.$username.$storagedir);
		}
	}
	//If torrenting file:
		//get torrent URL
		//get file data from transmission?
	//start torrent with transmission
	// Return to storage page
	header('location: storage.php');
}
?>
