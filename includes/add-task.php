<?php 
	include_once('../connection.php');
	$task = mysqli_real_escape_string($conn,$_POST['task']);
	$date = date('Y-m-d');
	$time = date('H:i:s');

	require("connect.php");

	mysqli_query($conn,"INSERT INTO tasks VALUES ('', '$task', '$date', '$time')");

	$query = mysqli_query($conn,"SELECT * FROM tasks WHERE task='$task' and date='$date' and time='$time'");

	while( $row = mysqli_fetch_assoc($query) ){
		$task_id = $row['id'];
		$task_name = $row['task'];
	}

	mysqli_close($conn);

	echo '<li><span>'.$task_name.'</span><img id="'.$task_id.'" class="delete-button" width="10px" src="img/close.svg" /></li>';
?>