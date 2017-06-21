
<?php
    include_once("header.php");
    include_once("navigation.php");
    include_once("clientsidebar.php");
    include_once('connection.php');

    echo '<div id="page-content-wrapper">';

        if (isset($_GET['id'])){

            $un = $_SESSION["username"];
            $id = $_GET['id'];
            $sql = "SELECT * FROM reservation WHERE ID = '$id'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            $time_one = date('l, F d, Y');


    echo '
                 <!-- invoice -->
                 <div class="col-md-7 invoice">
                 <p align="right" style="margin-top:30px;">'.$time_one.'</p> 
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

                 <h3>Client Details</h3>
                 <b>Name:</b> <span class="clientDetails">'.$row["CNAME"].'</span> <br/>';
                 $n = $row["CNAME"];
                 $sql = "SELECT * FROM registration WHERE FULLNAME = '$n'";
                 $result = mysqli_query($conn,$sql);
                 $row = mysqli_fetch_array($result);

                 echo '<b>Phone Number:</b> <span class="clientDetails">'.$row["PCONTACT"].'</span> <br/>';

                 $sql = "SELECT * FROM reservation WHERE ID = '$id'";
                 $result = mysqli_query($conn,$sql);
                 $row = mysqli_fetch_array($result);

                 if ($row["VENUE"] == "Others") {
                    $row["VENUE"] = $row["CUSTOMVENUE"];
                 }

                 echo '<b>Address of Event: </b> <span class="clientDetails">'.$row["VENUE"].'</span><br/>
                 <b>Time & Date: </b> <span class="clientDetails">'.$row["EDATE"].' | Start Time: '.$row["STARTTIME"].'</span><br/>
                 <b>Event Duration: </b> <span class="clientDetails">'.$row["EVENTDURATION"].'</span><br/><br/>';

                 echo '<h3>Package Details</h3>'.$row["PACKAGE"]. 
                          

                  '<hr id="invoceHR">
                  <h3 id="invoiceTotalPrice">Total Price: P'.$row["TOTALPRICE"].'</h3>
                  <hr id="invoceHR">
                  <p class="thankyou">Thank you for choosing OME Event Services.</p>
                 </div>


                 </div>

                <div class="col-md-5">
            <div align="center">
                <br/><br/><br/>
                    <h1><i class="fa fa-print fa-4x"></i></h1> <br/>
                     <button class="btn btn-primary btn-lg" id="btnPrint">Print summary of order</button><br/><br/> 
                     <a href="print-contract.php?id='.$row["ID"].'" class="btn btn-primary btn-lg">View Contract</a>
                    </div>
                </div>

                 </div>
                 ';
        }
?>



<?php

    include_once('footeradmin.php');

?>
