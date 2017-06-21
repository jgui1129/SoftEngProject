<?php
    include_once('connection.php');
    session_start();

        if (isset($_GET["deleteFromContacts"])) {

            $id = $_GET["deleteFromContacts"];
            $sql = "DELETE FROM contact WHERE ID ='$id'";
            mysqli_query($conn,$sql);
        }


        if (isset($_GET["deleteUser"])){
            $id = $_GET["deleteUser"];
            
            $sql = "DELETE FROM registration WHERE ID = '$id'";
            mysqli_query($conn,$sql);
            header("location: list-of-users.php");   
        }


        if (isset($_GET["oldpass"]) && isset($_GET["newpass"]) && isset($_GET["newpass1"])){
            $oldpass = mysqli_real_escape_string($conn,$_GET["oldpass"]);
            $newpass = mysqli_real_escape_string($conn,$_GET["newpass"]);
            $newpass1 = mysqli_real_escape_string($conn,$_GET["newpass1"]);
            $un = $_SESSION["username"];

            $sql = "SELECT * FROM registration WHERE USERNAME = '$un' and PASSWORD = '$oldpass'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_affected_rows($conn);

            if ($row == 0){
                echo "failed";
            }else if ($newpass != $newpass1){
                echo "mismatch";
            }else {
                $sql = "UPDATE registration SET PASSWORD = '$newpass' WHERE USERNAME = '$un'";
                mysqli_query($conn,$sql);
                echo "success";
            }

        }


        if (isset($_GET["eventorganizer"]) && isset($_GET["adminUsername"])){
            $e = mysqli_real_escape_string($conn,$_GET["eventorganizer"]);
            $a = mysqli_real_escape_string($conn,$_GET["adminUsername"]);
            $un = $_SESSION["username"];

            $sql = "UPDATE eventorganizer SET organizer = '$e'";
            mysqli_query($conn,$sql);

           if ($un != $a) {

            $sql = "UPDATE registration SET USERNAME = '$a' WHERE USERNAME = '$un'";
            mysqli_query($conn,$sql);
            echo "changed";
           }


        }

        if (isset($_GET["newEmail"]) && isset($_GET["newSub"]) && isset($_GET["newMess"])) {

                $hostname = "smtp.gmail.com";
                $sender = "jgui1129.jg@gmail.com";
                $mail_password = "09192194122";
                $to = mysqli_real_escape_string($conn,$_GET["newEmail"]);
                $body = mysqli_real_escape_string($conn,$_GET["newMess"]);

                require 'PHPMailer-master/PHPMailerAutoload.php';
                $mail = new PHPMailer;
                /*$mail->SMTPDebug = 1; */
                $mail->isSMTP();
                $mail->Host = $hostname;
                $mail->SMTPAuth = true;
                $mail->Username = $sender;                
                $mail->Password = $mail_password;
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->setFrom('noreply@noreply.com', 'OME|Event Services');
                $mail->addAddress($to);
                $mail->isHTML(true);

                $mail->Subject = mysqli_real_escape_string($conn,$_GET["newSub"]);
                $mail->Body    = $body;

                $mail->send(); 

        }


        if (isset($_GET["retrieveEmail"])){
            $em = mysqli_real_escape_string($conn,$_GET["retrieveEmail"]);

            $sql = "SELECT * FROM registration WHERE EMAIL = '$em'";
            $result = mysqli_query($conn,$sql);
            if (mysqli_affected_rows($conn)>0){


                function generateRandomString($length = 10) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }

                $newPassword = generateRandomString();
                $sql = "UPDATE registration SET PASSWORD = '$newPassword' WHERE EMAIL = '$em'";
                mysqli_query($conn,$sql);
                
                $hostname = "smtp.gmail.com";
                $sender = "jgui1129.jg@gmail.com";
                $mail_password = "09192194122";
                $to = $em;
                $body = '<h3>Good day from OME | Event Services!</h3> 
                        Here is your password: <b>'.$newPassword.'</b><br/>
                        Please update your password after loggin in.<br/>
                        Thank you for using OME event services.';

                require 'PHPMailer-master/PHPMailerAutoload.php';
                $mail = new PHPMailer;
                /*$mail->SMTPDebug = 1; */
                $mail->isSMTP();
                $mail->Host = $hostname;
                $mail->SMTPAuth = true;
                $mail->Username = $sender;                
                $mail->Password = $mail_password;
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->setFrom('noreply@noreply.com', 'OME|Event Services');
                $mail->addAddress($to);
                $mail->isHTML(true);

                $mail->Subject = 'Retrieve Password | OME';
                $mail->Body    = $body;

                $mail->send(); 

            }else {
                echo "false";
            }


        }

        if (isset($_GET['completeEvent'])){
            $id = $_GET['completeEvent'];
            $sql = "UPDATE reservation SET STATUS = 'COMPLETED' WHERE ID = '$id'";
            mysqli_query($conn,$sql);
            header("location: dashboard.php");
        }


        if (isset($_GET["dissaproveId"]) && isset($_GET["remarks"]) && isset($_GET["cname"])) {
            $id = $_GET["dissaproveId"];
            $remarks = mysqli_real_escape_string($conn,$_GET["remarks"]);
            $n = $_GET["cname"];


                $sql = "UPDATE reservation SET STATUS = 'DISAPPROVED' , ADMINREMARKS = '$remarks' WHERE ID = '$id'";
                $result = mysqli_query($conn,$sql);
                if ($result) {
                    echo "success";
                }else {
                    echo "failed";
                }

            $sql = "SELECT * FROM registration WHERE FULLNAME = '$n'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
     
                $num = $row["PCONTACT"];
                $content = 'Good day '.$n.'! We are sorry to inform you that your reservation cannot be processed by our team due to '.$remarks.' We would like to hear from you again! Please stay in touch very soon.';

                include "smsGateway.php";
                $smsGateway = new SmsGateway('jgui1129.jg@gmail.com', '123456');

                $deviceID = 47781;
                $numbers = $num;
                $message = $content;
                $result = $smsGateway->sendMessageToNumber($numbers, $content, $deviceID);
                

        }


        if (isset($_GET['checkIfExist'])){
            $un = mysqli_real_escape_string($conn,$_GET['checkIfExist']);
            $sql = "SELECT * FROM registration WHERE USERNAME = '$un'";
            $result = mysqli_query($conn,$sql);
            if (mysqli_affected_rows($conn)>0){
                echo "true";
            }else{
                echo "false";
            }
        }

        if (isset($_GET['checkIfEmailExist'])){
            $em = mysqli_real_escape_string($conn,$_GET['checkIfEmailExist']);
            $sql = "SELECT * FROM registration WHERE EMAIL = '$em'";
            $result = mysqli_query($conn,$sql);
            if (mysqli_affected_rows($conn)>0){
                echo "true";
            }else{
                echo "false";
            }
        }





        if(isset($_GET['sms']) && isset($_GET['message'])){

                $num = mysqli_real_escape_string($conn,$_GET['sms']);
                $content = mysqli_real_escape_string($conn,$_GET['message']);

                include_once("smsGateway.php");
                $smsGateway = new SmsGateway('jgui1129.jg@gmail.com', '123456');
                echo "sent";

                $deviceID = 33360;
                $numbers = $num;
                $message = $content;
                $result = $smsGateway->sendMessageToNumber($numbers, $content, $deviceID);


        }


        if (isset($_GET["rname"]) && isset($_GET["rpcontact"]) && isset($_GET["racontact"]) && isset($_GET["remail"]) && isset($_GET["raddress"]) && isset($_GET["rusername"]) && isset($_GET["rpass"])) {

            $rname = mysqli_real_escape_string($conn,$_GET["rname"]);
            $rpcontact = mysqli_real_escape_string($conn,$_GET["rpcontact"]);
            $racontact = mysqli_real_escape_string($conn,$_GET["racontact"]);
            $remail = mysqli_real_escape_string($conn,$_GET["remail"]);
            $raddress = mysqli_real_escape_string($conn,$_GET["raddress"]);
            $rusername = mysqli_real_escape_string($conn,$_GET["rusername"]);
            $rpass = mysqli_real_escape_string($conn,$_GET["rpass"]);

            $sql = "INSERT INTO registration(FULLNAME,PCONTACT,ACONTACT,EMAIL,ADDRESS,USERNAME,PASSWORD,ACCESS) VALUES('$rname','$rpcontact','$racontact','$remail','$raddress','$rusername','$rpass','USER')";
            mysqli_query($conn,$sql);

        }



        if (isset($_GET['deleteReservation'])) {

            $id = $_GET['deleteReservation'];
            $sql = "DELETE FROM reservation WHERE ID = '$id'";
            mysqli_query($conn,$sql);

            echo "<h3>Deleted Successfully</h3>";
            echo '<a href="dashboard.php" class="btn btn-danger btn-lg">Back to Dashboard</a>';
        }

        if (isset($_GET['deleteAddedEvents'])) {

            $id = $_GET['deleteAddedEvents'];
            $sql = "DELETE FROM addevent WHERE ID = '$id'";
            mysqli_query($conn,$sql);

            echo "<h3>Deleted Successfully</h3>";
            echo '<a href="dashboard.php" class="btn btn-danger btn-lg">Back to Dashboard</a>';
        }
     


        if (isset($_GET['eventToCancel'])){
            $id = $_GET['eventToCancel'];
            $sql = "UPDATE reservation SET STATUS = 'CANCELLED' WHERE ID = '$id'";
            mysqli_query($conn,$sql);
            echo "<h3>Event Cancellation Successful</h3>";
            echo '<a href="client-dashboard.php" class="btn btn-danger btn-lg">View Changes</a>';
        }

        if (isset($_GET['deleteEvent'])) {
            $id = $_GET['deleteEvent'];

            $sql = "DELETE FROM addevent WHERE ID = '$id'";
            mysqli_query($conn,$sql);
            header("location: delete-event.php");
        }


        if (isset($_GET['updateName']) && isset($_GET['updateEmail']) && isset($_GET['updatepcontact']) && isset($_GET['updateacontact']) && isset($_GET['updateAddress']) ){

            $id = $_GET['id'];
            $n = mysqli_real_escape_string($conn,$_GET['updateName']);
            $em = mysqli_real_escape_string($conn,$_GET['updateEmail']);
            $p = mysqli_real_escape_string($conn,$_GET["updatepcontact"]);
            $a = mysqli_real_escape_string($conn,$_GET["updateacontact"]);
            $user = mysqli_real_escape_string($conn,$_GET['updateUsername']);
            $add = mysqli_real_escape_string($conn,$_GET['updateAddress']);

            $sql = "UPDATE registration SET FULLNAME = '$n' , EMAIL = '$em', ADDRESS = '$add', PCONTACT = '$p', ACONTACT = '$a' WHERE ID = '$id'";
            mysqli_query($conn,$sql);            

        }


        if (isset($_GET['user']) && isset($_GET['pass'])){
            $un = mysqli_real_escape_string($conn,$_GET['user']);
            $pw = mysqli_real_escape_string($conn,$_GET['pass']);
                            
            $sql = "SELECT * FROM registration WHERE USERNAME = '$un' and PASSWORD = '$pw'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            if ((mysqli_affected_rows($conn)>0) && $row["ACCESS"] == "ADMIN"){ 
                
                echo "acceptedadmin";
            
             }else if ((mysqli_affected_rows($conn)>0) && $row["ACCESS"] == "USER"){

                echo "accepteduser";

            }else{
                echo "denied";
                }
            }


        if (isset($_GET['data'])){
            $session = $_GET['data'];

            $sql = "SELECT * FROM registration WHERE USERNAME = '$session'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            $access = $row["ACCESS"];

            $_SESSION['username'] = $session;
            $_SESSION["access"] = $access;

            if(isset($_SESSION['username'])){
                echo "true";
            }else {
                echo "false";
            }

        }    


        if (isset($_GET['content'])) {

            $content = mysqli_real_escape_string($conn,$_GET['content']);


            if ($content == ""){
                $sql = "SELECT * FROM contact"; 

            }else{
                
                $sql = "SELECT * FROM contact WHERE CNAME LIKE '%$content%' or CNUM LIKE '%$content%' or CEM LIKE '%$content%'";            
            }

            $result = mysqli_query($conn,$sql);

            echo "<table class='table table-bordered table-hovered table-striped'>";
            echo '<tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Delete</th></tr>';

            while ($row = mysqli_fetch_array($result)){

                echo '<tr>
                <td>'.$row["CNAME"].'</td>
                <td>'.$row["CNUM"].'</td>
                <td>'.$row["CEM"].'</td>
                <td><center><button class="btn-danger" onclick="deleteContact('.$row["ID"].')"><i class="fa fa-trash-o" style="color: white"></i></button></center></td>
                </tr>';
            }

            echo '</table>';
        }


        if (isset($_GET['name']) && isset($_GET['phone']) && isset($_GET['email'])) {
            $name = mysqli_real_escape_string($conn,$_GET['name']);
            $phone = mysqli_real_escape_string($conn,$_GET['phone']);
            $email = mysqli_real_escape_string($conn,$_GET['email']);

            $sql = "INSERT INTO contact (CNAME,CNUM,CEM) VALUES('$name','$phone','$email')";
            mysqli_query($conn,$sql);
        }


        if (isset($_GET['displayUpcoming'])) {

            echo '<h2><span id="eventTitle">Upcoming Events</span> <small align="right"><button class="btn btn-primary" onclick="displayPending()">Pending</button> <button class="btn btn-success" onclick="displayUpcoming()">Upcoming</button>
  <button class="btn btn-primary" onclick="displayCompleted()">Completed</button> <button class="btn btn-primary" onclick="displayDissaproved()">Dissaproved</button> <button class="btn btn-primary" onclick="displayCancel()">Cancelled</button> <button class="btn btn-primary" onclick="displayAll()">All</button></small></h2>';

                echo '<table class="table table-hover table-striped">
                <tr>
                    <th>Event Type</th>
                    <th>Event Name</th>
                    <th>Client Name</th>
                    <th>Date (y/m/d)</th>
                    <th>Start Time</th>
                    <th>Details</th>
                </tr>';

                $sql = "SELECT  * FROM reservation WHERE STATUS = 'APPROVED'";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>
                    <td>'.$row["PACKAGETYPE"].'</td>
                    <td>'.$row["ENAME"].'</td>
                    <td>'.$row["CNAME"].'</td>
                    <td>'.$row["EDATE"].'</td>
                    <td>'.$row["STARTTIME"].'</td>
                    <td><a href="reservation-event-details.php?id='.$row["ID"].'"class="btn btn-info btn-sm">View Details</a></td>
                    </tr>';
                }
                echo '</table>';

        }


        if (isset($_GET['displayPending'])) {

            echo '<h2><span id="eventTitle">Pending Reservation</span> <small align="right"><button class="btn btn-success" onclick="displayPending()">Pending</button> <button class="btn btn-primary" onclick="displayUpcoming()">Upcoming</button>
  <button class="btn btn-primary" onclick="displayCompleted()">Completed</button> <button class="btn btn-primary" onclick="displayDissaproved()">Dissaproved</button> <button class="btn btn-primary" onclick="displayCancel()">Cancelled</button> <button class="btn btn-primary" onclick="displayAll()">All</button></small></h2>
                  </h2><hr/>';

                echo '<table class="table table-hover table-striped">
                <tr>
                    <th>Event Type</th>
                    <th>Event Name</th>
                    <th>Client Name</th>
                    <th>Date (y/m/d)</th>
                    <th>Details</th>
                    <th>Approve</th>
                    <th>Dissaprove</th>
                </tr>';

                $sql = "SELECT  * FROM reservation WHERE STATUS = 'PENDING'";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>
                    <td>'.$row["PACKAGETYPE"].'</td>
                    <td>'.$row["ENAME"].'</td>
                    <td>'.$row["CNAME"].'</td>
                    <td>'.$row["EDATE"].'</td>
                    <td><a href="reservation-event-details.php?id='.$row["ID"].'"class="btn btn-info btn-sm">View Details</a></td>
                    <td><a href="updateDetails.php?approve='.$row["ID"].'&cname='.$row["CNAME"].'" class="btn btn-success btn-sm"><i class="fa fa-thumbs-o-up"></i> approve</a></td>
                    <td><button data-toggle="modal" data-target="#disapproveReason" class="btn btn-danger btn-sm" value="'.$row["ID"].'*'.$row["CNAME"].'" onclick="getDataModal(this.value)"><i class="fa fa-thumbs-o-down"></i> disapprove</button></td>
                    </tr>';
                }
                echo '</table>';

        }


        if (isset($_GET['displayCompleted'])) {

            echo '<h2><span id="eventTitle">Completed Reservation</span> <small align="right"><button class="btn btn-primary" onclick="displayPending()">Pending</button> <button class="btn btn-primary" onclick="displayUpcoming()">Upcoming</button>
  <button class="btn btn-success" onclick="displayCompleted()">Completed</button> <button class="btn btn-primary" onclick="displayDissaproved()">Disapproved</button> <button class="btn btn-primary" onclick="displayCancel()">Cancelled</button> <button class="btn btn-primary" onclick="displayAll()">All</button></small></h2>
                  </h2><hr/>';

                echo '<table class="table table-hover table-striped">
                <tr>
                    <th>Event Type</th>
                    <th>Event Name</th>
                    <th>Client Name</th>
                    <th>Date (y/m/d)</th>
                    <th>Details</th>
                </tr>';

                $sql = "SELECT  * FROM reservation WHERE STATUS = 'COMPLETED'";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>
                    <td>'.$row["PACKAGETYPE"].'</td>
                    <td>'.$row["ENAME"].'</td>
                    <td>'.$row["CNAME"].'</td>
                    <td>'.$row["EDATE"].'</td>
                    <td><a href="reservation-event-details.php?id='.$row["ID"].'"class="btn btn-info btn-sm">View Details</a></td>
                    </tr>';
                }
                echo '</table>';

        }

        if (isset($_GET['displayDissaproved'])) {

            echo '<h2><span id="eventTitle">Dissaproved Reservation</span> <small align="right"><button class="btn btn-primary" onclick="displayPending()">Pending</button> <button class="btn btn-primary" onclick="displayUpcoming()">Upcoming</button>
  <button class="btn btn-primary" onclick="displayCompleted()">Completed</button> <button class="btn btn-success" onclick="displayDissaproved()">Disapproved</button> <button class="btn btn-primary" onclick="displayCancel()">Cancelled</button> <button class="btn btn-primary" onclick="displayAll()">All</button></small></h2>
                  </h2><hr/>';

                echo '<table class="table table-hover table-striped">
                <tr>
                    <th>Event Type</th>
                    <th>Event Name</th>
                    <th>Client Name</th>
                    <th>Date (y/m/d)</th>
                    <th>Details</th>
                </tr>';

                $sql = "SELECT  * FROM reservation WHERE STATUS = 'DISAPPROVED'";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>
                    <td>'.$row["PACKAGETYPE"].'</td>
                    <td>'.$row["ENAME"].'</td>
                    <td>'.$row["CNAME"].'</td>
                    <td>'.$row["EDATE"].'</td>
                    <td><a href="reservation-event-details.php?id='.$row["ID"].'"class="btn btn-info btn-sm">View Details</a></td>
                    </tr>';
                }
                echo '</table>';

        }


      if (isset($_GET['displayCancel'])) {

            echo '<h2><span id="eventTitle">Cancelled By Users</span> <small align="right"><button class="btn btn-primary" onclick="displayPending()">Pending</button> <button class="btn btn-primary" onclick="displayUpcoming()">Upcoming</button>
  <button class="btn btn-primary" onclick="displayCompleted()">Completed</button> <button class="btn btn-primary" onclick="displayDissaproved()">Disapproved</button> <button class="btn btn-success" onclick="displayCancel()">Cancelled</button> <button class="btn btn-primary" onclick="displayAll()">All</button></small></h2>
                  </h2><hr/>';

                echo '<table class="table table-hover table-striped">
                <tr>
                    <th>Status</th>
                    <th>Event Type</th>
                    <th>Event Name</th>
                    <th>Client Name</th>
                    <th>Date (y/m/d)</th>
                    <th>Details</th>
                </tr>';

                $sql = "SELECT  * FROM reservation WHERE STATUS = 'CANCELLED'";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>
                    <td>'.$row["STATUS"].'</td>
                    <td>'.$row["PACKAGETYPE"].'</td>
                    <td>'.$row["ENAME"].'</td>
                    <td>'.$row["CNAME"].'</td>
                    <td>'.$row["EDATE"].'</td>
                    <td><a href="reservation-event-details.php?id='.$row["ID"].'"class="btn btn-info btn-sm">View Details</a></td>
                    </tr>';
                }
                echo '</table>';

        }


      if (isset($_GET['displayAll'])) {

            echo '<h2><span id="eventTitle">All Reservation</span> <small align="right"><button class="btn btn-primary" onclick="displayPending()">Pending</button> <button class="btn btn-primary" onclick="displayUpcoming()">Upcoming</button>
  <button class="btn btn-primary" onclick="displayCompleted()">Completed</button> <button class="btn btn-primary" onclick="displayDissaproved()">Disapproved</button> <button class="btn btn-primary" onclick="displayCancel()">Cancelled</button> <button class="btn btn-success" onclick="displayAll()">All</button></small></h2>
                  </h2><hr/>';

                echo '<table class="table table-hover table-striped">
                <tr>
                    <th>Status</th>
                    <th>Event Type</th>
                    <th>Event Name</th>
                    <th>Client Name</th>
                    <th>Date (y/m/d)</th>
                    <th>Details</th>
                </tr>';

                $sql = "SELECT  * FROM reservation";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>
                    <td>'.$row["STATUS"].'</td>
                    <td>'.$row["PACKAGETYPE"].'</td>
                    <td>'.$row["ENAME"].'</td>
                    <td>'.$row["CNAME"].'</td>
                    <td>'.$row["EDATE"].'</td>
                    <td><a href="reservation-event-details.php?id='.$row["ID"].'"class="btn btn-info btn-sm">View Details</a></td>
                    </tr>';
                }
                echo '</table>';

        }

           
     
 ?>