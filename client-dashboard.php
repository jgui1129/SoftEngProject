<?php
     include_once("header.php");
     include_once("navigation.php");
     include_once("clientsidebar.php");
     include_once("connection.php");
     echo '<div id="page-content-wrapper">';

     if (isset($_SESSION['username'])) {

     $un = $_SESSION['username'];
     $sql = "SELECT * FROM reservation WHERE USERNAME = '$un'";
   	 $result = mysqli_query($conn,$sql);
   	 $count = mysqli_affected_rows($conn);

     echo '	<div class="row">
		<div class="col-md-5">
			<h3 class="alert alert-success">Account Details</h3>
			
			<div class="row">
				<div class="col-md-6">

				     <div class="col-xs-12">
				          <div style="text-align:center" class="panel panel-primary">
				            <div class="panel-heading">
				              <h1 class="panel-title"><i class="fa fa-check-square-o" aria-hidden="true"></i> Reservation Counts</h1>
				            </div>
				            <!-- end panel-heading -->
				            <div class="panel-info">
				                <h1>'.$count.'</h1>
				            </div>
				            <!-- end panel-body -->
				          </div>
				          <!-- end panel-primary -->
				        </div>';

	$sql = "SELECT * FROM registration WHERE USERNAME = '$un'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
			echo '</div>
				<div class="col-md-6">
				<h5><b>Name:</b> '.$row["FULLNAME"].'</h5>
				<h5><b>Email:</b> '.$row["EMAIL"].'</h5>
				<h5><b>Username:</b> '.$row["USERNAME"].'</h5>
				</div>
			</div>


			<h3 class="alert alert-success">Approved Events</h3>

			<table class="table table-hover event-list">
				<tr>
					<th>Date</th>
					<th>Event Name</th>
					<th>View Details</th>
				</tr>';

	$sql = "SELECT * FROM reservation WHERE USERNAME = '$un' AND STATUS = 'APPROVED' ORDER BY ABS( DATEDIFF( EDATE, NOW() ) )";
	$result = mysqli_query($conn,$sql);
	while ($row = mysqli_fetch_array($result)){
		echo '<tr>
		<td>'.$row["EDATE"].'</td>
		<td>'.$row["ENAME"].'</td>
		<td><button class="btn btn-default btn-sm detailsEvent" value="'.$row["ID"].'" onclick="displayDetails(this.value)"><i class="fa fa-file-o"></i> details</button></td>
		<tr>';
	}


			echo '</table>';


	echo '<h3 class="alert alert-success">Pending Reservations</h3>

			<table class="table table-hover event-list">
				<tr>
					<th>Date</th>
					<th>Event Name</th>
					<th>View Details</th>
					<th>Cancel Event</th>
				</tr>';

	$sql = "SELECT * FROM reservation WHERE USERNAME = '$un' AND STATUS = 'PENDING' ORDER BY ABS( DATEDIFF( EDATE, NOW() ) )";
	$result = mysqli_query($conn,$sql);
	while ($row = mysqli_fetch_array($result)){
		echo '<tr>
		<td>'.$row["EDATE"].'</td>
		<td>'.$row["ENAME"].'</td>
		<td><button class="btn btn-default btn-sm detailsEvent" value="'.$row["ID"].'" onclick="displayDetails(this.value)"><i class="fa fa-file-o"></i> details</button></td>
		<td><button class="btn btn-default btn-sm cancelEvent" value="'.$row["ID"].'" onclick="updateModalValue(this.value)" data-toggle="modal" data-target="#confirmDeleteModal"><i class="fa fa-file-o"></i> cancel</button></td>
		<tr>';
	}


	echo '</table>';

	if ($count == 0) {
		echo '<h4 align="center"><label>You dont have any pending reservation.</label></h4>
		<a href="reservation.php" class="btn btn-primary btn-block">RESERVE NOW!</a>';
	}


     echo '<div id="confirmDeleteModal" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title"></h4>
	      </div>
	      <div class="modal-body" align="center">
	      <div id="changeContentModal">
	      <h3>Are you sure you want to cancel this event?</h3>
	      <button value="" id="modalValue" class="btn btn-danger btn-lg" onclick="cancelEvent(this.value)">YES</button>
	      <button class="btn btn-warning btn-lg" data-dismiss="modal">NO</button>
	      </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>';




		


	echo '
			<h3 class="alert alert-success">Event History</h3>

			<table class="table table-hover event-list">
				<tr>
					<th>Date</th>
					<th>Event Name</th>
					<th>Status</th>
					<th>View Details</th>
				</tr>';

	#$sql = "SELECT * FROM reservation WHERE USERNAME = '$un' AND STATUS = 'DISAPPROVED' , STATUS = 'COMPLETED' , STATUS = 'CANCELLED' ORDER BY ABS( DATEDIFF( EDATE, NOW() ) )";
	$sql = "SELECT * FROM reservation WHERE USERNAME = '$un' AND STATUS IN('COMPLETED','CANCELLED','DISAPPROVED') ORDER BY ABS( DATEDIFF( EDATE, NOW() ) )";
	$result = mysqli_query($conn,$sql);
	while ($row = mysqli_fetch_array($result)){
		echo '<tr>
		<td>'.$row["EDATE"].'</td>
		<td>'.$row["ENAME"].'</td>
		<td>'.$row["STATUS"].'</td>
		<td><button class="btn btn-default btn-sm detailsEvent" value="'.$row["ID"].'" onclick="displayDetails(this.value)"><i class="fa fa-file-o"></i> details</button></td>
		<tr>';
	}


			echo '</table>';		


	$sql = "SELECT * FROM reservation WHERE USERNAME = '$un' and STATUS = 'APPROVED' ORDER BY ABS( DATEDIFF( EDATE, NOW() ) ) LIMIT 1";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$count = mysqli_affected_rows($conn);


	if ($count > 0) {
		echo '</div>
		<div id="displayDetails">
		<div class="col-md-6">
		<h3 class="alert alert-success">Upcoming Event</h3>
		<div class="row">
		<div class="col-md-7">
				<label>Event Name: </label> '.$row["ENAME"].'<br/>	
				<label>Event Date: </label> '.$row["EDATE"].'<br/>
				<label>Date Submitted: </label> '.$row["CHARDATE"].'<br/>
				<label>Price Total: </label> P'.$row["TOTALPRICE"].'<br/>	
				<label>Status: </label> '.$row["STATUS"].'<br/>			
		</div>
		<div class="col-md-5">
		<label class="review"><a href="client-review-contract.php?id='.$row["ID"].'"><i class="fa fa-get-pocket"></i> Review Contract </a></label>
		<label class="review"><a href="client-print-summary-order.php?id='.$row["ID"].'"><i class="fa fa-get-pocket"></i> Print Summary Order </a></label>

		</div>
		</div>


   		<hr/>
   				  <div class="overflowDiv">	
   				  '.$row["PACKAGE"].'
                  </div><!-- overflow -->

		</div>
		</div>
	</div><!-- row -->
';

	}

	 $sql = "SELECT * FROM reservation WHERE USERNAME = '$un'";
   	 $result = mysqli_query($conn,$sql);
   	 $count = mysqli_affected_rows($conn);

   	 if ($count == 0) {


		echo '</div><div id="displayDetails">
		<div class="col-md-6">
		<br/><br/><br/>
		<center>
		<img src="img/ome1.png">
		<h1 align="center">OME | Event Services</h1>
		<br/>
		<h4 align="center"><label>You dont have any pending reservation.</label></h4>
		<a href="reservation.php" class="btn btn-primary btn-lg">RESERVE NOW!</a>
		</center>


		</div></div>';

	}else {

		echo '</div><div id="displayDetails">
		<div class="col-md-6">
		<br/><br/><br/>
		<center>
		<img src="img/ome1.png">
		<h1 align="center">OME | Event Services</h1>
		<br/>
		<h4 align="center"><label>We\'re in the process of reviewing your reservation.</label></h4>
		<p style="margin: 0 25px 25px 25px;">Please give us a day or two to check if we can handle your request. We will inform you as soon as possible via phone call or text message if your reservation is approved. Thank you for patiently waiting. Have a good day!</p>
		<label>Give us a call if you need. <br/>Here\'s our number: 09069160096 <br/> Thank you! </label>
		</center>


		</div></div>';

	}

}

?>





<?php
    include_once("footeradmin.php");
?>	