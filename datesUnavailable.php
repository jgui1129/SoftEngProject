<?php

	include('connection.php');

	$sql = "SELECT EDATE FROM reservation WHERE STATUS = 'APPROVED'";
	$result = mysqli_query($conn,$sql);

	$dates = array();

	while ($row = mysqli_fetch_array($result)){
		
		array_push($dates,$row['EDATE']);
	}

	echo "[";
	
	foreach ($dates as $val) {
	
		echo '"';
		echo $val;
		echo '",';

	}

	echo "]";

?>