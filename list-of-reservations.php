<?php

  include_once("header.php");
  include_once("navigation.php");
  include_once("adminsidebar.php");
  include_once("connection.php");
  echo '<div id="page-content-wrapper">';
  echo '<div data-aos="flip-up">';

?>

<div id="reservationDiv"> 
 <h2><span id="eventTitle">Pending Reservation</span> <small align="right"><button class="btn btn-success" onclick="displayPending()">Pending</button> <button class="btn btn-primary" onclick="displayUpcoming()">Upcoming</button>
  <button class="btn btn-primary" onclick="displayCompleted()">Completed</button> <button class="btn btn-primary" onclick="displayDissaproved()">Disapproved</button> <button class="btn btn-primary" onclick="displayCancel()">Cancelled</button> <button class="btn btn-primary" onclick="displayAll()">All</button></small></h2>
 <hr/>

 <?php 

  echo '<table class="table table-hover table-striped">
  <tr>
    <th>Event Type</th>
    <th>Event Name</th>
    <th>Client Name</th>
    <th>Date (y/m/d)</th>
    <th>Details</th>
    <th>Approve</th>
    <th>Dissaprove</th>
  </tr>';

  $sql = "SELECT  * FROM reservation WHERE STATUS = 'PENDING'";
  $result = mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_array($result)) {
    echo '<tr>
    <td>'.$row["PACKAGETYPE"].'</td>
    <td>'.$row["ENAME"].'</td>
    <td>'.$row["CNAME"].'</td>
    <td>'.$row["EDATE"].'</td>
    <td><a href="reservation-event-details.php?id='.$row["ID"].'"class="btn btn-info btn-sm">View Details</a></td>
    <td><a href="updateDetails.php?approve='.$row["ID"].'&cname='.$row["CNAME"].'" class="btn btn-success btn-sm"><i class="fa fa-thumbs-o-up"></i> approve</a></td>
    <td><button data-toggle="modal" data-target="#disapproveReason" class="btn btn-danger btn-sm" value="'.$row["ID"].'*'.$row["CNAME"].'" onclick="getDataModal(this.value)"><i class="fa fa-thumbs-o-down"></i> disapprove</button></td>
    </tr>';
  }
  echo '</table>';

 ?>

 </div></div>


<!-- Modal -->
<div id="disapproveReason" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Tell customer why</b></h4>
      </div>
      <div class="modal-body">
        <div id="mbody">
        <b>Tell the customer the reason for dissaproval of the reservation</b><br/><br/>
        <textarea rows="5" id="remarks" class="form-control" placeholder="eg: personal appointments, weather conflict (make it as professional as you can)"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <div id="mfoot">
        <button type="button" class="btn btn-danger" onclick="submitRemarks()">Submit & Disapprove Reservation</button>
        </div>
      </div>
    </div>

  </div>
</div>
<input type="text" id="dataToGet" style="display: none">

<?php
  include_once('footeradmin.php');
?>