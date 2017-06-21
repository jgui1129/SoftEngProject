<?php
    include_once("header.php");
    include_once("navigation.php");
    include_once("adminsidebar.php");
    include_once("connection.php");
    
    echo '<div id="page-content-wrapper">';



	$sql = "SELECT * from addevent ORDER BY EDATE";
	$result = mysqli_query($conn,$sql);

	echo '
	<center>
		<h1 class="alert alert-info">Delete Added Events</h1> 
	<table class="table table-striped table-hover table-bordered table-condensed" style="width: 80%">
	<tr>
	<th>NAME</th>
	<th>DATE</th>
	<th>DETAILS</th>
	<th>DELETE</th>
	</tr>

	';

	while ($row = mysqli_fetch_array($result)) {

		echo '
		<tr>
		<td>'.$row['ENAME'].'</td>
		<td>'.$row['EDATE'].'</td>
		<td>'.$row['DETAILS'].'</td>
		<td><a href="ajax.php?deleteEvent='.$row['ID'].'" class="btn btn-danger btn-block btn-sm">Delete</a></td>

		';

	}

	echo '
	</table></center>';


	include_once('footeradmin.php');

?>