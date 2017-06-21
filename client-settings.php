<?php
	
     include_once("header.php");
     include_once("navigation.php");
     include_once("clientsidebar.php");
     include_once("connection.php");
     echo '<div id="page-content-wrapper">';

     
     if (isset($_SESSION['username'])){

     	$un = $_SESSION['username'];
     	

	$sql = "SELECT * FROM registration WHERE USERNAME = '$un'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
			
			echo '</div>
				<div class="col-md-4 col-md-offset-1">

				<h1 class="panel-body">Users\' Info</h1>
				<span id="updateId" value="'.$row["ID"].'" style="display: none">'.$row["ID"].'</span><br/>
				<h5><b>Name:</b> '.$row["FULLNAME"].'</h5>
				<h5><b>Email:</b> '.$row["EMAIL"].'</h5>
				<h5><b>username:</b> '.$row["USERNAME"].'</h5> 
				<br/>	
				<h3>Update Password</h3>
				<hr/>
				<div class="col-md-10">
				<div class="alert" style="display:none;">Password successfully updated.</div>
				<label>Enter your current password</label>
				<input type="password" class="form-control input-sm" id="currentPassword">
				<label>Enter your new password</label>
				<input type="password" class="form-control input-sm" id="newPassword">
				<label>Retype your password</label>
				<input type="password" class="form-control  input-sm" id="newPassword1"><br/>
				<button class="btn btn-primary" onclick="updateUserPassword()">Update Password</button>
				<br/><br/><br/><br/>
				</div>
				</div>';


			echo '
			<div class="col-md-5">

				<h1 class="panel-body">Update Information</h1>
				<hr/>

			 <div class="form-group">
			     <label for="primaryContact"> Name: </label>
			     <input type="text" name="name" id="updateuserName" class="form-control" value="'.$row["FULLNAME"].'">
			      </div>


			<div class="form-group">
			     <label for="primaryContact"> Primary Contact: </label>
			     <input type="text" name="name" id="updateuserpContact" class="form-control" value="'.$row["PCONTACT"].'">
			      </div>

			<div class="form-group">
			     <label for="primaryContact"> Alternative Contact: </label>
			     <input type="text" name="name" id="updateuseraContact" class="form-control" value="'.$row["ACONTACT"].'">
			      </div>

			<div class="form-group">
			     <label for="primaryContact"> Address: </label>
			     <input type="text" name="name" id="updateuserAddress" class="form-control" value="'.$row["ADDRESS"].'">
			      </div>

			<div class="form-group">
			     <label for="primaryContact"> Email: </label>
			     <input type="text" name="name" id="updateuserEmail" class="form-control" value="'.$row["EMAIL"].'">
			      </div>

			      <input type="button" onclick="updateInformation()" value="Update Information" class="btn btn-primary"> 
			      <br/><br/><br/><br/>';		


     }
     


?>


<?php 

	include_once('footeradmin.php');
?>