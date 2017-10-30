<?php
session_start();
if (!isset($_SESSION['username'])){
	$_SESSION['msg'] = "You must log in first";
	header('location: index.php');
}
include('includes/server.php');
function disable($site){
	exec('rm /etc/apache2/sites-enabled/'.$site.'.conf');
	$query = 'UPDATE websites SET is_enabled = 0 WHERE website_name ='.$site;
	mysqli_query($conn, $query);
}
function enable($site){

}
function remove($site){

}
?>
<html>
<head>
	<title>Cloud Storage | Pi In The Sky</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<div class="header">
		<h2>Website Management</h2>
	</div>
	<div class="content">
		<p>Here you can manage what websites your sever is currently hosting</p>
		<h2>Enabled Sites</h2>
		<?php
			$query = "SELECT website_name FROM websites WHERE is_enabled = 1";
			$result = mysqli_query($conn, $query);
			$i =0;
			while($i = mysqli_fetch_assoc($result)){
				$filelist.=$i['website_name'].'<button onclick="disable('.$i['websitename'].')">disable</button><br>';
			}
			echo $filelist;
		?>
		<h2>Available Sites</h2>
		<?php
			$query = "SELECT website_name FROM websites WHERE is_enabled = 0";
			$result = mysqli_query($conn, $query);
			$i =0;
			$filelist = "";
			while($i = mysqli_fetch_assoc($result)){
				$filelist.=$i['website_name'].'<br>';
			}
			echo $filelist;
		?>
	</div>
</body>
</html>

