<?php
	session_start();
	include_once('connection.php');
	if (isset($_GET['approve']) && isset($_GET["cname"])){
		$id = $_GET['approve'];
		$sql = "UPDATE reservation SET STATUS = 'APPROVED' WHERE ID = '$id'";
		mysqli_query($conn,$sql);
		$cname = $_GET["cname"];
		
		$sql = "SELECT * from registration WHERE FULLNAME = '$cname'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);


		 		$num = $row["PCONTACT"];
		 		$n = $row["FULLNAME"];
$content = 'Greetings again '.$n.'!
Your chosen package has been confirmed. Please wait for our call on where and when it is convenient for a business meetup. Thank you for choosing Occasions made easy! See you!';

                include "smsGateway.php";
                $smsGateway = new SmsGateway('jgui1129.jg@gmail.com', '123456');

                $deviceID = 47781;
                $numbers = $num;
                $message = $content;
                $result = $smsGateway->sendMessageToNumber($numbers, $content, $deviceID);

                header("location: list-of-reservations.php");


	}

?>