<?php

    include_once("header.php");
    include_once("navigation.php");
    include_once("adminsidebar.php");
    include_once('connection.php');

    echo '<div id="page-content-wrapper">';
    echo '<div data-aos="fade-up" data-aos-duration="1500">';
    $un = $_SESSION["username"];
	if (isset($_GET['id'])){

		$id = $_GET['id'];
		$sql = "SELECT * FROM reservation WHERE ID = '$id'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);

		echo '
	<div class="row">
		<h2 class="titleDetails"> <small>Event Name:</small> '.$row["ENAME"].'</h2>
		<div class="col-md-4">';
			
			
		$sql = "SELECT * FROM registration WHERE USERNAME = '$un'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);

			echo '<h3 class="alert alert-success">Client Details</h3>

			<div class="indentContent">
				
				<label class="labelHeader">Client Name: </label> '.$row["FULLNAME"].' <br/>
				<label class="labelHeader">Primary Contact No: </label> '.$row["PCONTACT"].' <br/>
				<label class="labelHeader">Alternative Contact No: </label>'.$row["ACONTACT"].'<br/>
				<label class="labelHeader">Email: </label> '.$row["EMAIL"].' <br/>
				<label class="labelHeader">Address: </label> '.$row["ADDRESS"].' <br/>
			</div>';


		$id = $_GET['id'];
		$sql = "SELECT * FROM reservation WHERE ID = '$id'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);


			echo '<h3 class="alert alert-success">Event Details</h3>

			<div class="indentContent">
				
				<label class="labelHeader">Event Name: </label> '.$row["ENAME"].' <br/>
				<label class="labelHeader">Date of Event (y/m/d): </label> '.$row["EDATE"].' <br/>
				<label class="labelHeader">Start Time: </label> '.$row["STARTTIME"].' <br/>
				<label class="labelHeader">Duration: </label> '.$row["EVENTDURATION"].' <br/>
				<label class="labelHeader">Venue: </label> '.$row["VENUE"].' <br/>';

				if ($row["VENUE"] == "Others"){
					echo '<label class="labelHeader">Customer\'s Choice of Venue: </label> '.$row["CUSTOMVENUE"].' <br/>';
				}


				echo '<label class="labelHeader">Other info: </label> '.$row["COMMENT"].' <br/>';
				echo '<label class="labelHeader">Status: </label> '.$row["STATUS"].' <br/>';

				if ($row["CLIENTREMARKS"] != "") {
					echo '<br><label class="labelHeader">Reason of cancellation: </label> '.$row["CLIENTREMARKS"].' <br/>';
				}

			echo '</div>
			
		</div><!-- col-md-4 -->

		<div class="col-md-5">
			<h3 class="alert alert-success">Package Details</h3>
			<div class="indentContent">
				<h3>Total Price: '.$row["TOTALPRICE"].'</h3>
				<hr/>
				'.$row["PACKAGE"].'

			</div>
		</div><!-- col-md-5 -->

		<div class="col-md-3">
			<h3 class="alert alert-success">Options <i class="fa fa-print"></i> </h3>
			<div data-aos="flip-down" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" class="fewSpace">
				<a href="print-summary-of-order.php?id='.$_GET["id"].'" class="btn btn-primary btn-block btn-lg">print summary order</a></div>
			<div data-aos="flip-down" data-aos-anchor-placement="top-bottom" data-aos-duration="1500" class="fewSpace">
				<a href="print-contract.php?id='.$_GET["id"].'" class="btn btn-primary btn-block btn-lg">print contract</a></div>
			<div data-aos="flip-down data-aos-anchor-placement="top-bottom" data-aos-duration="2000" class="fewSpace">
			<a href="send-message.php?id='.$_GET["id"].'&cname='.$row["CNAME"].'" class="btn btn-primary btn-block btn-lg">send sms/email</a></div>
			<div data-aos="flip-down" data-aos-anchor-placement="top-bottom" data-aos-duration="2500" class="fewSpace">
				<a class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#confirmDeleteModal">delete event</a>
		</div>
		</div><!-- col-md-3 -->

	</div><!-- row -->';


	echo '</div><div id="confirmDeleteModal" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">'.$row["ENAME"].'</h4>
	      </div>
	      <div class="modal-body" align="center">
	      <div id="changeContentModal">
	      <h3>Are you sure you want to delete this event?</h3>
	      <button value="'.$row["ID"].'" class="btn btn-danger btn-lg" onclick="deleteEvent(this.value)">Delete</button>
	      <button class="btn btn-warning btn-lg" data-dismiss="modal">Cancel</button>
	      </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	</div>';

	}

?>




    <?php
        include_once("footeradmin.php");
    ?>	