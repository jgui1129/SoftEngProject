<?php 
include_once("connection.php");
if (!$conn) {
	echo "failed to connect!";
}

if (!empty ($_POST['c1']) && !empty ($_POST['c2'])) {
	$c1 = mysqli_real_escape_string($conn,$_POST["c1"]);
	$c2 = mysqli_real_escape_string($conn,$_POST["c2"]);
	$sql = "UPDATE homecms SET coverheader = '$c1', coverdetails = '$c2'";
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: edit-home-content.php");
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	
}
else{
	echo "Invalid file";
}

if (!empty ($_POST['c3']) && !empty ($_POST['c4'])) {
	$c3 = mysqli_real_escape_string($conn,$_POST["c3"]);
	$c4 = mysqli_real_escape_string($conn,$_POST["c4"]);
	$sql = "UPDATE homecms SET headerabout = '$c3', contentabout = '$c4'";
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: edit-home-content.php");
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	
}
else{
	echo "Invalid file";
}

if (!empty ($_POST['c5']) && !empty ($_POST['c6'])) {
	$c5 = mysqli_real_escape_string($conn,$_POST["c5"]);
	$c6 = mysqli_real_escape_string($conn,$_POST["c6"]);
	$sql = "UPDATE homecms SET nclient1 = '$c5', qclient1 = '$c6'";
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: edit-home-content.php");
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	
}
else{
	echo "Invalid file";
}

if (!empty ($_POST['c7']) && !empty ($_POST['c8'])) {
	$c7 = mysqli_real_escape_string($conn,$_POST["c7"]);
	$c8 = mysqli_real_escape_string($conn,$_POST["c8"]);
	$sql = "UPDATE homecms SET nclient2 = '$c7', qclient2 = '$c8'";
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: edit-home-content.php");
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	
}
else{
	echo "Invalid file";
}

if (!empty ($_POST['c9']) && !empty ($_POST['c10'])) {
	$c9 = mysqli_real_escape_string($conn,$_POST["c9"]);
	$c10 = mysqli_real_escape_string($conn,$_POST["c10"]);
	$sql = "UPDATE homecms SET nclient3 = '$c9', qclient3 = '$c10'";
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: edit-home-content.php");
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	
}
else{
	echo "Invalid file";
}

if (!empty ($_POST['a1']) && !empty ($_POST['a2'])) {
	$a1 = mysqli_real_escape_string($conn,$_POST["a1"]);
	$a2 = mysqli_real_escape_string($conn,$_POST["a2"]);
	$sql = "UPDATE aboutcms SET aboutheader = '$a1', aboutcontent = '$a2'";
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: edit-about-content.php");
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	
}
else{
	echo "Invalid file";
}
if (!empty ($_POST['a3']) && !empty ($_POST['a4']) && !empty ($_POST['a5']) && !empty ($_POST['a6'])) {
	$a3 = mysqli_real_escape_string($conn,$_POST["a3"]);
	$a4 = mysqli_real_escape_string($conn,$_POST["a4"]);
	$a5 = mysqli_real_escape_string($conn,$_POST["a5"]);
	$a6 = mysqli_real_escape_string($conn,$_POST["a6"]);
	$sql = "UPDATE aboutcms SET staff1 = '$a3', position1 = '$a4', desc1 = '$a5', email1 = '$a6'";
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: edit-about-content.php");
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	
}
else{
	echo "Invalid file";
}

if (!empty ($_POST['a7']) && !empty ($_POST['a8']) && !empty ($_POST['a9']) && !empty ($_POST['a10'])) {
	$a7 = mysqli_real_escape_string($conn,$_POST["a7"]);
	$a8 = mysqli_real_escape_string($conn,$_POST["a8"]);
	$a9 = mysqli_real_escape_string($conn,$_POST["a9"]);
	$a10 = mysqli_real_escape_string($conn,$_POST["a10"]);
	$sql = "UPDATE aboutcms SET staff2 = '$a7', position2 = '$a8', desc2 = '$a9', email2 = '$a10'";
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: edit-about-content.php");
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	
}
else{
	echo "Invalid file";
}
if (!empty ($_POST['a11']) && !empty ($_POST['a12']) && !empty ($_POST['a13']) && !empty ($_POST['a14'])) {
	$a11 = mysqli_real_escape_string($conn,$_POST["a11"]);
	$a12 = mysqli_real_escape_string($conn,$_POST["a12"]);
	$a13 = mysqli_real_escape_string($conn,$_POST["a13"]);
	$a14 = mysqli_real_escape_string($conn,$_POST["a14"]);
	$sql = "UPDATE aboutcms SET staff3 = '$a11', position3 = '$a12', desc3 = '$a13', email3 = '$a14'";
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: edit-about-content.php");
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	
}
else{
	echo "Invalid file";
}

if (!empty($_POST['con1']) && !empty($_POST['con2']) && !empty($_POST['con3']) && !empty($_POST['con4'])) {
	$con1 = mysqli_real_escape_string($conn,$_POST['con1']);
	$con2 = mysqli_real_escape_string($conn,$_POST['con2']);
	$con3 = mysqli_real_escape_string($conn,$_POST['con3']);
	$con4 = mysqli_real_escape_string($conn,$_POST['con4']);
	$sql = "UPDATE contactcms SET newemail = '$con1', newlandline = '$con2', newmobile = '$con3', newaddress = '$con4'";
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: edit-contact-content.php");
	} else {
	    echo "Error updating record: " . $conn->error;
	}
}
$conn->close();
 ?>
