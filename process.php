<?php
header("X-XSS-Protection: 0");

  include_once("header.php");
  include_once("navigation.php");
  include_once('connection.php');

  if (isset($_POST["reserve"])) {
  if (isset($_POST['en']) && isset($_POST['sdate'])){ 


    $un = $_SESSION['username']; //username
    $en = mysqli_real_escape_string($conn,$_POST["en"]); //event name
    $sdate= mysqli_real_escape_string($conn,$_POST["sdate"]); //event DATE
    $timein= mysqli_real_escape_string($conn,$_POST["timein"]); //timein
    $eduration = mysqli_real_escape_string($conn,$_POST['eduration']);

    if ($eduration == "0"){
      $eduration = "3-5 Hours (No additional Charge)";
    }else if ($eduration == "3000") {
      $eduration = "5-7 Hours (additional 3000 charge)";
    }else if ($eduration == "4000") {
      $eduration = "8 Hours (additional 4000 charge)";
    }else if ($eduration == "5000") {
      $eduration = "9 Hours (additional 5000 charge)";
    }else if ($eduration == "6000") {
      $eduration = "10 Hours (additional 6000 charge)";
    }else if ($eduration == "7000") {
      $eduration = "11 Hours (additional 7000 charge)";
    }else if ($eduration == "8000") {
      $eduration = "12 Hours (additional 8000 charge)";
    }else {
      $eduration = "12 Hours and up (additional 10,000 charge)";
    }


    $loc = mysqli_real_escape_string($conn,$_POST["venue"]); //location

    if ($loc == "5000") {
      $loc = "Grand Pavilion Malolos";
    }else if ($loc == "7000"){
      $loc = "MD Cruz Resort";
    }else if ($loc == "9000"){
      $loc = "Club Royal Resort";
    }else if ($loc == "10000"){
      $loc = "Prycor Pavillion Mencyland";
    }else {
      $loc = "Others";
    }

    $cxvenue = mysqli_real_escape_string($conn,$_POST["cxvenue"]); 
    $declareloc =  mysqli_real_escape_string($conn,$_POST["venueDistance"]); 

    if ($declareloc == "0"){
      $declareloc = "Malolos (no additional charge)";
    }else if ($declareloc == "1000"){
      $declareloc = "Calumpit (additional P1,000.00)";
    }else if ($declareloc == "1200"){
      $declareloc = "Tabang (additional P1,200.00)";
    }else if ($declareloc == "1400"){
      $declareloc = "Guiguinto (additional P1,400.00)";
    }else if ($declareloc == "1500"){
      $declareloc = "Balagtas (additional P1,500.00)";
    }else if ($declareloc == "1600"){
      $declareloc = "Bulakan, Bulacan (additional P1,600.00)";
    }else if ($declareloc == "1700"){
      $declareloc = "Bocaue (additional P1,700.00)";
    }else if ($declareloc == "1800"){
      $declareloc = "Marilao (additional P1,800.00)";
    }else if ($declareloc == "1900"){
      $declareloc = "Meycauayan (additional P,900.00)";
    }else{
      $declareloc = "Others (additional P2,500.00)";
    }


    $otherInfo= mysqli_real_escape_string($conn,$_POST["otherInfo"]); //otherInfo
    $details = mysqli_real_escape_string($conn,$_POST["orderDetails"]); // package
    $packtype = mysqli_real_escape_string($conn,$_POST["packageType"]); // package
    $price = mysqli_real_escape_string($conn,$_POST["finalPrice"]); // package
    $time_one = date('l, F d, Y');

    if ($loc != "Others"){
      $declareloc = "";
    }
    $sql = "SELECT FULLNAME FROM registration WHERE USERNAME = '$un'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $clientname = $row["FULLNAME"];

    
    $sql = "SELECT * FROM reservation WHERE ENAME = '$en' and USERNAME = '$un' and EDATE = '$sdate'";
    mysqli_query($conn,$sql);
    if (mysqli_affected_rows($conn) ==  0){ //meron na sa database

          $sql = "INSERT into reservation (USERNAME,ENAME,CNAME,EDATE,STARTTIME,EVENTDURATION,VENUE,CUSTOMVENUE,CUSTOMLOCATION,COMMENT,PACKAGE,PACKAGETYPE,TOTALPRICE,CDATE,CHARDATE,STATUS) VALUES ('$un','$en','$clientname','$sdate','$timein','$eduration','$loc','$cxvenue','$declareloc','$otherInfo','$details','$packtype','$price',now(),'$time_one','PENDING')";

          $result = mysqli_query($conn,$sql);

$content = 'Greetings '.$clientname.'! 
This is a text from Occassions Made Easy(OME). This is to inform you that you have made a reservation on '.$sdate.'. Please wait for the confirmation text from us. Thank you for choosing OME Events.';

                $sql = "SELECT * FROM registration WHERE USERNAME = '$un'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);

                $num = $row["PCONTACT"];

                include_once("smsGateway.php");
                $smsGateway = new SmsGateway('jgui1129.jg@gmail.com', '123456');

                $deviceID = 47781;
                $numbers = $num;
                $message = $content;
                $result = $smsGateway->sendMessageToNumber($numbers, $content, $deviceID);



$content = 'Hello Admin! This is an auto-generated text from your event management system. We would like to inform you about a reservation made by '.$clientname.'.  on '.$sdate.'.Check the dashboard for complete details';

                $sql = "SELECT * FROM registration WHERE USERNAME = '$un'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);

                include_once("smsGateway.php");
                $smsGateway = new SmsGateway('jgui1129.jg@gmail.com', '123456');

                $deviceID = 47781;
                $numbers = 09356969711;
                $message = $content;
                $result = $smsGateway->sendMessageToNumber($numbers, $content, $deviceID);


    $sql = "SELECT * FROM reservation WHERE USERNAME = '$un' and ENAME = '$en'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
              if ($result){ // if else result
                echo '
                 

                 <div id="page-content-wrapper">
                  <div class="row">
                  <div class="col-sm-6" id="reserveHide">
                 <br/><br/><br/><br/><br/><br/> 
                 <center>
                     <h1> Thank you for your Reservation <i class="fa fa-smile-o" aria-hidden="true"></i> </h1>
                      <h4> Your reservation will be reviewed. <br> Our team will contact you as soon as possible. </h4>
                      <p> You can also contact us directly by giving us a text message or a call  on this <br/> number 0906-9160096. We\'re so much excited to serve you. <br> Have a good day! </p><br/> 
                      <a href="index.php"><input type="button" class="btn btn-primary btn-lg" value="BACK TO HOME"></a>
                      <input type="button" id="btnPrint" class="btn btn-warning btn-lg" value="PRINT ORDER SUMMARY">
                  </center>
                 <br/><br/>
                 </div>
                 <br/>


                 <!-- invoice -->
                 <div class="col-md-5 invoice">
                 <p align="right" style="margin-top:30px;">'.$row["CHARDATE"].'</p> 
                 <p align="right" style="margin-right: 5px; margin-top:-10px;font-size: 1.3em;"> <i class="fa fa-modx" aria-hidden="true"></i> <b>'.$row["PACKAGETYPE"].'</b></p> 
                 <div class="row">
                 <div class="col-sm-2 logoDiv"> 
                    <img src="img/ome2.png">
                 </div>

                 <div class="col-sm-9 logoDiv">
                   <span id="companyName"> OME | Occassions Made Easy </span><br/>
                   <span>43 Inang Wika St. Malolos, Bulacan</span><br/>
                   <span>Phone No: 0935696971 | Telephone No: 791-6099</span>
                 </div></div>

                 <div class="row col-sm-12 clientDetailsDiv">';

                 $sql ="SELECT * FROM registration WHERE USERNAME = '$un'";
                 $result = mysqli_query($conn,$sql);
                 $row = mysqli_fetch_array($result);

                 echo '<h3>Client Details</h3>
                 <b>Name:</b> <span class="clientDetails">'.$row["FULLNAME"].'</span> <br/>
                 <b>Phone Number:</b> <span class="clientDetails">'.$row["PCONTACT"].'</span> <br/>';

                  $sql = "SELECT * FROM reservation WHERE ENAME = '$en' and USERNAME = '$un' and EDATE = '$sdate'";
                  $result = mysqli_query($conn,$sql);
                  $row = mysqli_fetch_array($result);

                 echo '<b>Address of Event: </b> <span class="clientDetails">'.$row["VENUE"].'</span><br/>
                 <b>Time & Date: </b> <span class="clientDetails">'.$row["EDATE"].' | Start Time: '.$row["STARTTIME"].'</span><br/>
                 <b>Event Duration: </b> <span class="clientDetails">'.$row["EVENTDURATION"].'</span><br/><br/>';
                 
                 $result = mysqli_query($conn,$sql);
                 $row = mysqli_fetch_array($result);

                 echo '<h3>Package Details</h3>'.$row["PACKAGE"]. 
                          

                  '<hr id="invoceHR">
                  <h3 id="invoiceTotalPrice">Total Price: P'.$price.'</h3>
                  <hr id="invoceHR">
                  <p class="thankyou">Thank you for choosing OME Event Services.</p>
                 </div>


                 </div>
                 </div>



                 ';

              }else{

                      echo '
                 <BR><BR><BR><BR>
                 <center>
                     <h1> Oopps! Something went wrong!   <i class="fa fa-frown-o" aria-hidden="true"></i> </h1>
                      <h4> Sorry for the inconvenience. <br> Please try to reserve again.</h4>
                      <a href="index.php"><input type="button" class="btn btn-warning btn-lg" value="BACK TO HOME"></a>
                  </center>

                 <BR><BR>';

              } // if else result


    }else {



    $sql = "SELECT * FROM reservation WHERE ENAME = '$en' and USERNAME = '$un' and EDATE = '$sdate'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

      echo '
                
                 <div id="page-content-wrapper">
                  <div class="row">
                  <div class="col-sm-6" id="reserveHide">
                 <br/><br/><br/><br/><br/><br/> 
                 <center>
                     <h1> Thank you for your Reservation <i class="fa fa-smile-o" aria-hidden="true"></i> </h1>
                      <h4> Your reservation will be reviewed. <br> Our team will contact you as soon as possible. </h4>
                      <p> You can also contact us directly by giving us a text message or a call  on this <br/> number 0906-9160096. We\'re so much excited to serve you. <br> Have a good day! </p> <br/>
                      <a href="index.php"><input type="button" class="btn btn-primary btn-lg" value="BACK TO HOME"></a>
                      <input type="button" id="btnPrint" class="btn btn-warning btn-lg" value="PRINT ORDER SUMMARY">
                  </center>
                 <br/><br/>
                 </div>
                 <br/>


                 <!-- invoice -->
                 <div class="col-md-5 invoice">
                 <p align="right" style="margin-top:30px;">'.$row["CHARDATE"].'</p> 
                 <p align="right" style="margin-right: 5px; margin-top:-10px;font-size: 1.3em;"> <i class="fa fa-modx" aria-hidden="true"></i> <b>'.$row["PACKAGETYPE"].'</b></p> 
                 <div class="row">
                 <div class="col-sm-2 logoDiv"> 
                    <img src="img/ome2.png">
                 </div>

                 <div class="col-sm-9 logoDiv">
                   <span id="companyName"> OME | Occassions Made Easy </span><br/>
                   <span>43 Inang Wika St. Malolos, Bulacan</span><br/>
                   <span>Phone No: 0935696971 | Telephone No: 791-6099</span>
                 </div></div>

                 <div class="row col-sm-12 clientDetailsDiv">

                 <h3>'.$row["PACKAGETYPE"].'</h3>';  

                 $sql ="SELECT * FROM registration WHERE USERNAME = '$un'";
                 $result = mysqli_query($conn,$sql);
                 $row = mysqli_fetch_array($result);

                 echo '<h3>Client Details</h3>
                 <b>Name:</b> <span class="clientDetails">'.$row["FULLNAME"].'</span> <br/>
                 <b>Phone Number:</b> <span class="clientDetails">'.$row["PCONTACT"].'</span> <br/>';

                  $sql = "SELECT * FROM reservation WHERE ENAME = '$en' and USERNAME = '$un' and EDATE = '$sdate'";
                  $result = mysqli_query($conn,$sql);
                  $row = mysqli_fetch_array($result);

                 echo '<b>Address of Event: </b> <span class="clientDetails">'.$row["VENUE"].'</span><br/>
                 <b>Time & Date: </b> <span class="clientDetails">'.$row["EDATE"].' | Start Time: '.$row["STARTTIME"].'</span><br/>
                 <b>Event Duration: </b> <span class="clientDetails">'.$row["EVENTDURATION"].'</span><br/><br/>';

                 echo '<h3>Package Details</h3>'.$row["PACKAGE"]. 
                          

                  '<hr id="invoceHR">
                  <h3 id="invoiceTotalPrice">Total Price: P'.$price.'</h3>
                  <hr id="invoceHR">
                  <p class="thankyou">Thank you for choosing OME Event Services.</p>
                 </div>


                 </div>
                 </div>



                 ';

    }






  
  }//if isset

  }

?>


    <?php
        include_once("footer.php");
    ?>


