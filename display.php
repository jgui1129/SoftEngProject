
<?php

	session_start();
	include_once('connection.php');
	$_SESSION['val'] = mysqli_real_escape_string($conn,$_GET['val']);
	header("Location: tasking.php");

?>