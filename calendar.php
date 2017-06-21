

<?php

        include_once("header.php");
        include_once("navigation.php");
        include_once("adminsidebar.php");
        include_once("connection.php");

	echo '<div id="page-content-wrapper">';


?>

<div data-aos="zoom-out-down" data-aos-duration="1500">
<br/>	
<div class="col-md-7">
	<div id="calendar" align="center">
	</div>
</div>
<div class="col-md-3">
<br/><br/>
<a href="add.php" class="btn btn-primary btn-lg btn-block" style="box-shadow: 5px 5px 20px black">Add event</a>
<a href="delete-event.php" class="btn btn-danger btn-lg btn-block" style="box-shadow: 5px 5px 20px black">Delete Event</a>
</div>



<?php
	echo "</div>";
	include_once('footeradmin.php');
?>

