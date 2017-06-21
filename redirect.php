<?php
	
	sleep(1);
	$access = $_GET['user'];
	if ($access == "user"){
		header("location: client-dashboard.php");
	}else {
		header("location: dashboard.php");
	}
	
?>