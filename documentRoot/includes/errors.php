<!-- Display errors that any input form has -->
<?php
if (isset($_SESSION['error'])){
	echo '<div id="error">'.$_SESSION['error'].'</div>';
	unset($_SESSION['error']);
}
if (isset($_SESSION['success'])){
	echo '<div id="success">'.$_SESSION['success'].'</div>';
	unset($_SESSION['success']);
}
?>
