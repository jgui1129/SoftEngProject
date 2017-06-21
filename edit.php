<?php


	session_start();
	include_once('connection.php');


	 $del = $_POST['n'];
	 $sql = "DELETE from tasking WHERE N = '$del'";
	 mysqli_query($conn,$sql);


		if (isset($_POST['txtName1'])) {

			$name = mysqli_real_escape_string($conn,$_POST["n"]);

			$ctr = 1;
			$count = 1;

			if (isset($_POST['count'])) {
				$count = $_POST['count'];
			} else {
				$count = 1;
			}

			do {

				$a = mysqli_real_escape_string($conn,$_POST["txtName$ctr"]);
				$b = mysqli_real_escape_string($conn,$_POST["txtAge$ctr"]);
				$c = mysqli_real_escape_string($conn,$_POST["txtGender$ctr"]);
				$d = mysqli_real_escape_string($conn,$_POST["txtOccupation$ctr"]);
				$ctr++;	


				$sql = "INSERT into tasking (N, FIRST, SECOND, THIRD, FOURTH, D, T) VALUES('$name','$a','$b','$c','$d',now(),now())";
				mysqli_query($conn,$sql);

				$_SESSION['count'] = $ctr;

			} while ($ctr <= $count); 

			header("Location: tasking.php");

}



?>