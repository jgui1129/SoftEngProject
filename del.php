

<?php

	session_start();

	if($_SESSION['show'] == 1) {

		$_SESSION['show'] = 0;	
	}else {
		$_SESSION['show'] = 1;
	}

	
	header("Location: tasking.php");
	
?>