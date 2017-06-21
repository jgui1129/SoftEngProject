<?php


$localIP = getHostByName(php_uname('n'));
//setcookie("visitor", $localIP, time() + (60 * 20));
//$currTime = time()+(60 * 10);
$currTime = time()+(60 * 10);
echo $localIP.'<br/>';

echo time().'<br><br>';
	
include_once("connection.php");
$sql = "SELECT * FROM visitorsip";
$result = mysqli_query($conn,$sql);
$count = mysqli_affected_rows($conn);
$add =True;

if ($count != 0) {
	while ($row = mysqli_fetch_array($result)) {
		
		if ($localIP == $row["ipaddress"]){

			$add = False;
		}
		$i = $row["ID"];

		if (time() >= $row["timer"]) {
				$sql = "DELETE FROM visitorsip WHERE ID = '$i'";
				mysqli_query($conn,$sql);
		}
		
		if ($localIP == $row["ipaddress"] && (time() >= $row["timer"])) {
			
				$sql = "INSERT into visitorsip (ipaddress,timer) VALUES('$localIP','$currTime')";
				mysqli_query($conn,$sql);
				
				$sql = "SELECT * from stats";
			    $result = mysqli_query($conn,$sql);
			    $row = mysqli_fetch_array($result);

			    $visit = $row['VISITS']+1;

			    $sql = "UPDATE stats SET VISITS = '$visit'";
			    mysqli_query($conn,$sql);
	
			}
	}

	if ($add) {
		$sql = "INSERT into visitorsip (ipaddress,timer) VALUES('$localIP','$currTime')";
		mysqli_query($conn,$sql);
		
		$sql = "SELECT * from stats";
	    $result = mysqli_query($conn,$sql);
	    $row = mysqli_fetch_array($result);

	    $visit = $row['VISITS']+1;

	    $sql = "UPDATE stats SET VISITS = '$visit'";
	    mysqli_query($conn,$sql);
		
	}

}else {
	$sql = "INSERT into visitorsip (ipaddress,timer) VALUES('$localIP','$currTime')";
	mysqli_query($conn,$sql);
	
	$sql = "SELECT * from stats";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    $visit = $row['VISITS']+1;

    $sql = "UPDATE stats SET VISITS = '$visit'";
    mysqli_query($conn,$sql);


}	
  	 
?>