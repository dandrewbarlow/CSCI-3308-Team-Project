<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}

	if (isset($_POST['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home | Pi In The Sky</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">

		<!-- Notification Message: Appears only the first time during any session -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- Logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<div class="content">
				<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			</div>
		<?php endif ?>

	</div>

	<div class="footer">
		<form action="home.php" method="post">
			<button type="submit" name="logout" class="btn btn-danger">Logout</button>
		</form>
	</div>

</body>
</html>
