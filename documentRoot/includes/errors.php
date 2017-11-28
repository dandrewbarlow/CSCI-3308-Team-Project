<!-- Display errors that any input form has -->
<?php
	session_start();
	
	if (isset($_SESSION['error'])) {
		echo '<div class="error-msg">'.$_SESSION['error'].'</div><br>';
		unset($_SESSION['error']);
	}
	if (isset($_SESSION['success'])) {
		echo "<div class='success-msg'>".$_SESSION['success']."</div><br>";
		unset($_SESSION['success']);
	}
?>
