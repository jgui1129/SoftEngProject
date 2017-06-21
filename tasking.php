
<?php
    include_once("header.php");
    include_once("navigation.php");
    include_once("adminsidebar.php");
?>

<div id="page-content-wrapper">
<div class="container">
<div class="row-lg-12">
<div class="col-lg-2">

<?php

	$display = 0;

	if (isset($_SESSION['show'])) {
		$_SESSION['show'] = $_SESSION['show'];
		}


	$fval = "";
	$sql = "SELECT DISTINCT N from tasking ORDER BY D,T DESC";
	$result = mysqli_query($conn,$sql);	
	$count = mysqli_affected_rows($conn);
	
	echo "<br/><br/><br/><br/><br/>";
	echo '<a href="display2.php" class="btn btn-primary btn-block btn-lg" style="box-shadow: 5px 5px 10px grey"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> New Task</a><br>
	<a href="del.php" style="display:none" onClick="show()" style="box-shadow: 5px 5px 10px grey" class="btn btn-danger btn-block btn-lg">Delete Task</a><br/>';
	echo '<center><h4>Saved Tasks</h4></center>';

	echo '<table>
		<tr>';
	while ($row = mysqli_fetch_array($result)) {

			echo '<td><a href="delete.php?val='.$row['N'].'"<i id="show" style="color: brown; '; 


			if (isset($_SESSION['show'])) {
			if ($_SESSION['show'] == 0) {
				echo 'display: none';
			} else {
				echo '';
				
			}

		}
			echo '" class="fa fa-times-circle fa-2x"></i></a> &nbsp;</td>';
			echo '<td><a href="display.php?val='.$row['N'].'" class="btn btn-warning btn-block taskList" style="width:120px" value='.$row['N'].'>'.$row['N'].'</a></td></tr>';
	}

	echo '</table><center>Total Saved Task: '.$count. '<center>';
	echo '</div>';

if(!isset($_SESSION["val"])) {
	$sql ="SELECT * FROM reservation WHERE STATUS ='APPROVED'";
	$result = mysqli_query($conn,$sql);
	$count = mysqli_affected_rows($conn);	

	echo '	</div>
	<div class="col-lg-9" align="center">
	<center>
	<br/><br/><br/><br/><br/>	
	<div class="invoice col-md-8 col-md-offset-2">
	<br/><br/>
	<h1>Good day admin!</h1>
	<h2>You have '.$count.' upcoming events.<br/>What\'s your plan for today?</h2><br/><br/><br/>
	</div>
	</center>	
	</div>';
}

if (isset($_SESSION['val'])) {

	if ($_SESSION['val'] == '') {
		$sql = "SELECT Name from staff";
		$result = mysqli_query($conn,$sql);	
	
		$option ='<select id="txtOccupation1" name="txtOccupation1" class="form-control" required>';

		while ($row = mysqli_fetch_array($result)) {
		 	$option.='<option value="'.$row["Name"].'">'.$row["Name"];
		}
		$option.='</select>';
	echo  '
	</div>
	<div class="col-lg-9">
	<center>
	<form action="save.php" method="POST">
	<table id="myTable" width="90%">
		<br/><br/>
	 <h2>Task Name</h2> <tr><input type="text" class="form-control" name="n" required style="width: 50%; box-shadow: 5px 5px 10px grey" /><br/></tr>
		<tr>
	    <th>Program</th>
	    <th>Details</th>
	    <th>Assignment</th>
	    <th>Coordinator in-charge</th>
	    </tr>
	  
	    <tr style="padding: 30px">
	        <td>
	            <input type="text" id="txtName1" name="txtName1" class="form-control" required />
	        </td>
	        <td>
	            <input type="text" id="txtAge1" name="txtAge1"  class="form-control" required/>
	        </td>
	        <td>
	           <input type="text" id="txtGender1" name="txtGender1"  class="form-control" required/>
	        </td>
	        <td>
	        '.$option.'
	        </td>
	        <td style="margin-left: 20px" class="button-add btn btn-warning">Add</td>
	        <input type="text" id="count" name="count" style="display: none">
	    </tr>

	</table>

	<br/><br/>

	<input type="submit" value="SAVE" class="btn btn-primary btn-lg">
	</form>
	</div>
	';

	
}
	else {
	
	$val = $_SESSION['val'];

	$sql = "SELECT * from tasking WHERE N = '$val'";
	$result = mysqli_query($conn,$sql);
	$sql1 = "SELECT Name from staff";
	$result1 = mysqli_query($conn,$sql1);	
	$option1 = "";	

		while ($row1 = mysqli_fetch_array($result1)) {
		 	$option1.='<option value="'.$row1["Name"].'">'.$row1["Name"];
		}
	echo '
	<center>
	<div class="col-lg-10">
	<form action="edit.php" method="POST">

	<br/>
	<table border="0" id="myTable2" width="80%">
	<tr><th>Program</th>
	<th>Details</th>
	<th>Assignment</th>
	<th>Coordinator in-charge</th></tr>
	';

	$count = 1;

	while ($row = mysqli_fetch_array($result)) { 

		$fval = $row['N'];
		echo '
		<tr>
		<td> <input type="text" class="form-control" id="textName'.$count.'" name="txtName'.$count.'" value="'.$row['FIRST'].'"  required> </td>
		<td> <input type="text" class="form-control" id="txtAge'.$count.'" name="txtAge'.$count.'" value="'.$row['SECOND'].'"  required> </td>
		<td> <input type="text" class="form-control" id="txtGender'.$count.'" name="txtGender'.$count.'"value="'.$row['THIRD'].'" required></td>
		<td> <select id="txtOccupation'.$count.'" name="txtOccupation'.$count.'" class="form-control" required>
			<option value='.$row['FOURTH'].'>'.$row['FOURTH'].'</option>
			'.$option1.'
		</select>
		</tr>
		';
		$count++;
	} 

	echo '<div class="container"><h2 align="left"> '.$fval.' </h2></div>';

	$count = $count -1;
	echo '<input type="text" name="val" value="'.$fval.'" style="display: none">';
	echo '<input type="text" id="count2" name="count" value="'.$count.'" style="display: none">';

	echo '</table><br/>	
	<input type="button" class="button-add2 btn btn-info" value="ADD" />
	<input type="submit" class="btn btn-info" value="SAVE" />
	<a href="print.php?val='.$fval.'"><input type="button" class="btn btn-info" value="PRINT" /></a>
	<input type="text" class="form-control" name="n" value="'.$fval.'" style="display: none" /><br/>
	</div></center></form>';
	}
}
	echo '</div>';

?>
<?php 

    		$sql2 = "SELECT Name from staff";
			$result2 = mysqli_query($conn,$sql2);	
			$option2 = "";	

			while ($row = mysqli_fetch_array($result2)) {
		 		$option2.='<option value="'.$row["Name"].'">'.$row["Name"];
			}

?>
<script>

var ctr = 1;
$('#myTable').on('click', '.button-add', function () {
    ctr++;
    var txtName = "txtName" + ctr;
    var txtAge = "txtAge" + ctr;
    var txtGender = "txtGender" + ctr;
    var txtOccupation = "txtOccupation" + ctr;
    var newTr = '<tr><td><input class="form-control" type="text" id=' + txtName + ' name=' + txtName + ' required /></td><td><input class="form-control" type="text" id=' + txtAge + ' name=' + txtAge + ' required /></td><td><input class="form-control" type="text" id=' + txtGender + ' name=' + txtGender + ' required/></td><td><select id='+ txtOccupation +' name='+txtOccupation + ' class="form-control" required><?php echo $option2; ?></select></td></tr>';
    $('#myTable').append(newTr);
    $("#count").val(ctr);

});
</script>


<script>
var ctr2 = <?php echo $count; ?>;
$("input:button.button-add2").click(function () { 
    ctr2++;	
    var txtName = "txtName" + ctr2;
    var txtAge = "txtAge" + ctr2;
    var txtGender = "txtGender" + ctr2;
    var txtOccupation = "txtOccupation" + ctr2;
    var newTr = '<tr><td><input class="form-control" type="text" id=' + txtName + ' name=' + txtName + ' required /></td><td><input class="form-control" type="text" id=' + txtAge + ' name=' + txtAge + ' required /></td><td><input class="form-control" type="text" id=' + txtGender + ' name=' + txtGender + ' required/></td><td><select id='+ txtOccupation +' name='+txtOccupation + ' class="form-control" required><?php echo $option2; ?></select></td></tr>';
    $('#myTable2').append(newTr);
    $("#count2").val(ctr2);

});
 
</script>

<?php

	include_once('footeradmin.php');
?>