<!-- Display errors that any input form has -->
<?php
session_start();
if (isset($_SESSION['error'])){
	echo '<div id="error">'.$_SESSION['error'].'</div>';
	unset($_SESSION['error'])
} elseif (isset($_SESSION['success'])) {
	echo '<div id="success">'.$_SESSION['success'].'</div>';
	unset($_SESSION['success'])
}
?>
