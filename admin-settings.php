<?php
	
     include_once("header.php");
     include_once("navigation.php");
     include_once("adminsidebar.php");
     include_once("connection.php");
     echo '<div id="page-content-wrapper">';
     $sql ="SELECT * FROM eventorganizer";
     $result = mysqli_query($conn,$sql);
     $row = mysqli_fetch_array($result);
     $organizer = $row["organizer"];
?>


	<div class="row">
	<div class="col-md-12">
		<div class="alert" align="center" style="display:none;">Password successfully updated.</div>
	</div></div>

	<div class="col-md-4 col-md-offset-1">
	<br/>
	<h1 class="panel-body">Admin Settings</h1>
	<br/>
	<label>Current Event Organizer</label>
	<input type="text" name="" class="form-control" value="<?php echo $organizer; ?>" id="eventorganizer"><br/>
	<label>Update Username</label>
	<input type="text" name="" class="form-control " value="<?php echo $_SESSION["username"]; ?>" id="adminUsername"><br/>
	<button class="btn btn-primary" onclick="updateAdminInfo()">Update Information</button>
	</div>
	<div class="col-md-4 col-md-offset-1">
				<br/>
				<h3 class="panel-body">Update Password</h3>
				<hr/>
				<label>Enter your current password</label>
				<input type="password" class="form-control input-sm" id="currentPassword">
				<label>Enter your new password</label>
				<input type="password" class="form-control input-sm" id="newPassword">
				<label>Retype your password</label>
				<input type="password" class="form-control  input-sm" id="newPassword1"><br/>
				<button class="btn btn-primary" onclick="updateUserPassword()">Update Password</button>
	</div>

<?php 
	include_once('footeradmin.php');
?>

