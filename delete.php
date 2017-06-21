
<?php
	
	session_start();
	include_once('connection.php');

	$details = $_GET['val'];
	
	$sql = "DELETE from tasking WHERE N = '$details'";
	$result = mysqli_query($conn,$sql);
	$_SESSION['show'] = 1;

	$_SESSION['val']='';
	header("Location: tasking.php");

?>