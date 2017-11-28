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
<?php  if (count($errors) > 0) : ?>
	<div class="error-msg">
		<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>
