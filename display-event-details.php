<?php

	include_once('connection.php');

	$id = $_GET['id'];


	$sql = "SELECT * FROM reservation WHERE ID ='$id'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);


		echo '</div>
		<div class="col-md-6 displayDetails">
		<h3 class="alert alert-success">Details of Event</h3>
		<div class="row">
		<div class="col-md-7">
				<label>Event Name: </label> '.$row["ENAME"].'<br/>	
				<label>Event Date: </label> '.$row["EDATE"].'<br/>
				<label>Date Submitted: </label> '.$row["CHARDATE"].'<br/>
				<label>Price Total: </label> P'.$row["TOTALPRICE"].'<br/>	
				<label>Status: </label> '.$row["STATUS"].'<br/>';			
		
				if ($row["STATUS"] == "DISAPPROVED") {
					echo '<label>Reasons: </label> '.$row["ADMINREMARKS"].'<br/>';
				}

		echo '</div>
		<div class="col-md-5">
		<label class="review"><a href="client-review-contract.php?id='.$row["ID"].'"><i class="fa fa-get-pocket"></i> Review Contract </a></label>
		<label class="review"><a href="client-print-summary-order.php?id='.$row["ID"].'"><i class="fa fa-get-pocket"></i> Print Summary Order </a></label>
		

		</div>
		</div>


   		<hr/>
   				  <div class="overflowDiv">	
   				  '.$row["PACKAGE"].'
                  </div><!-- overflow -->

		</div>';

?>