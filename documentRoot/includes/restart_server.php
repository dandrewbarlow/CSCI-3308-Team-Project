<!-- Server Restart module -->
<?php

session_start();
include(requireLogin);
	// Restart server
	exec('sudo /sbin/reboot');
}

?>
