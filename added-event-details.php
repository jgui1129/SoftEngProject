<?php

    include_once("header.php");
    include_once("navigation.php");
    include_once("adminsidebar.php");
    include_once('connection.php');

    echo '<div id="page-content-wrapper">';

	if (isset($_GET['id'])){

		$id = $_GET['id'];
		$sql = "SELECT * FROM addevent WHERE ID = '$id'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);

		echo '<div class="row">
		<h2 class="titleDetails"> '.$row["ENAME"].' <small>('.$row["EDATE"].')</small></h2>
		<div class="col-md-6">
		<h3 class="alert alert-success">Details </h3>
		<label>'.$row["DETAILS"].'</label>

		</div>
			
		<div class="col-md-3">
			<h3 class="alert alert-success">Options <i class="fa fa-print"></i> </h3>
			<input type="button" name="" value="delete event" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#confirmDeleteModal">
		</div><!-- col-md-3 -->

	</div><!-- row -->';

	echo '<div id="confirmDeleteModal" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Event Name: '.$row["ENAME"].'</h4>
	      </div>
	      <div class="modal-body" align="center">
	      <div id="changeContentModal">
	      <h3>Are you sure you want to delete this event?</h3>
	      <button value="'.$row["ID"].'" class="btn btn-danger btn-lg" onclick="deleteAddedEvent(this.value)">Delete</button>
	      <button class="btn btn-warning btn-lg" data-dismiss="modal">Cancel</button>
	      </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>';
	
	}

?>

    <?php
        include_once("footeradmin.php");
    ?>	