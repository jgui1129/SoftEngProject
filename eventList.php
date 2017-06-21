<?php


	include('connection.php');

	$ctr = 0;
	$sql = "SELECT * FROM reservation WHERE STATUS='APPROVED'";
	$result = mysqli_query($conn,$sql);
	$event_array = array();

	while ($row = mysqli_fetch_array($result)){


		$pDate = strtotime(''.$row['EDATE'].'');
		$x = date('Y-m-d',$pDate);

		if($row["PACKAGETYPE"] == "Debut Package"){
			$col = "#D81A8F";
		}else if ($row["PACKAGETYPE"] == "Wedding Package"){
			$col = "orange";
		}else {
			$col = "#ed5923";
		}

		$event_array[] = array (
			'id' => ''.$row['ID'].'',
			'title' => ''.$row['ENAME'].'',
			'start' => ''.$x.'',
			'url' => 'reservation-event-details.php?id='.$row['ID'].'',
			'color' => ''.$col.'',

			);
		$ctr++;
	}


	$sql = "SELECT * FROM addevent";
	$result = mysqli_query($conn,$sql);	
	while ($row  = mysqli_fetch_array($result)) {

		$pDate = strtotime(''.$row['EDATE'].'');
		$x = date('Y-m-d',$pDate);
		
			$col = "grey";

			$event_array[$ctr] = array (
			'id' => ''.$row['ID'].'',
			'title' => ''.$row['ENAME'].'',
			'start' => ''.$x.'',
			'url' => 'added-event-details.php?id='.$row['ID'].'',
			'color' => ''.$col.'',
			);
			$ctr++;
	}

	 echo json_encode($event_array);

	/* print_r($event_array);*/


?>
