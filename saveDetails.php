<?php

	
	$conn  = mysqli_connect("localhost","root","","ome");
	// $x = mysqli_real_escape_string($conn,$_GET['details']);
	//$x = mysqli_real_escape_string($conn,$_GET['details']);
	//$sql = "INSERT INTO details (text) values ('$x')";
	//mysqli_query($conn,$sql);	
	echo $_GET['details'];


?>