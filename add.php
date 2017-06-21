<?php

        include_once("header.php");
        include_once("navigation.php");
        include_once("adminsidebar.php");
        include_once("connection.php");

        echo '<div id="page-content-wrapper">';

	if(isset($_POST['ename']) && isset($_POST['edate']) && isset($_POST['ecomment'])) {

		$n = mysqli_real_escape_string($conn,$_POST['ename']);
		$d = mysqli_real_escape_string($conn,$_POST['edate']);
		$comment = $_POST['ecomment'];

		$sql = "INSERT into addevent SET ENAME = '$n', EDATE = '$d', DETAILS = '$comment'";
		mysqli_query($conn,$sql);

		$_SESSION['sent'] = 'sent';

	}

?>
<form action="add.php" method="POST">
<div class="container">
<div class="col-lg-5">

<br/>
<h1>
<i class="fa fa-calendar"></i> Add Event </h1>

<?php

		if (isset($_SESSION['sent'])) {
		if ($_SESSION['sent'] == 'sent') {
echo '	<h3 class="alert alert-success" style="margin-top: 30px"> <i class="fa fa-thumbs-o-up fa-2x" aria-hidden="true"></i> Event successfully added!</h3>'; 
	}
		$_SESSION['sent'] ='';
}

?>
<br/>
<div class="row">
<div class="col-lg-2">
<strong>Name:</strong> </div>
<div class="col-lg-10">
<input type="text" class="form-control" name="ename" required><br/>
</div>
</div>

<div class="row">

<div class="col-lg-2">
<strong>Date:</strong> </div>
<div class="col-lg-10">
<input type="text" class="form-control" id="dateToReserve1" name="edate" required><br/>
</div>
</div>

<div class="row">
<div class="col-lg-2">
<strong>Details:</strong> </div>
<div class="col-lg-10">
<textarea cols="10" rows="5" class="form-control" name="ecomment" required>
</textarea><br/>
</div>
</div>

<div class="row">
<div class="col-lg-10 col-lg-offset-2">
<input type="submit" class="btn btn-warning btn-lg">
<a href="dashboard.php"><input type="button" class="btn btn-danger btn-lg" value="Back to Home"></a>
</div>
</div>
</form>


<?php 

	include_once('footeradmin.php');
?>
