 <!--Admin Sidebar -->

<?php
    
    include_once('connection.php');


    if(!isset($_SESSION["username"])){
        header("location: index.php");
    }

    $un = $_SESSION['username'];
    $sql = "SELECT * FROM registration WHERE USERNAME = '$un'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if ($row["ACCESS"] == "USER"){
        header("location: client-dashboard.php");   
    }
    
?>

 <div id="wrapper" class="toggled">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <br/>
                <li class="sidebar-brand">
                    <a href="dashboard.php">
                        <h1 style="padding-left: 20px"><i class="fa fa-user-circle fa-2x" aria-hidden="true" style="padding-left: 20px; padding-bottom: 10px"></i> <?php
                        if (isset($_SESSION['username'])){
                            echo '<li><a href="dashboard.php">Hi <b id="userLogIn" style="text-transform: capitalize">';
                            echo  $_SESSION['username'];
                            echo '</b></a></li>';
                        }else{
                           echo  '<li><a href="# " data-toggle="modal" data-target="#login-modal">LOGIN</a></li>';
                        }
                    ?></h1>
                    </a>
                </li>
                <br/><br/><br/><br>
                <li>
                     <a href="dashboard.php"><i class="fa fa-dashboard" aria-hidden="true"></i> DashBoard</a>
                </li>
                <li>
                     <a href="calendar.php"><i class="fa fa-calendar" aria-hidden="true"></i> Calendar</a>
                </li>
                <li>
                     <a href="tasking.php"><i class="fa fa-tasks" aria-hidden="true"></i> Tasking</a>
                </li>
                <li>

                <?php
                    include_once('connection.php');
                    $sql = "SELECT * FROM reservation WHERE STATUS = 'PENDING'";
                    $result = mysqli_query($conn,$sql);
                    $count = mysqli_affected_rows($conn);
                    if ($count == 0) {
                        $count = "";
                    }
                ?>    

               <li><a href="list-of-reservations.php"><i class="fa fa-check-square-o" aria-hidden="true"></i> Reservation <span class="newReservation"><?php echo $count; ?></span></a>
                <li>
                     <a href="send-message.php"><i class="fa fa-phone-square" aria-hidden="true"></i> Contacts</a>
                </li>
                <li>
                     <a href="list-of-users.php"><i class="fa fa-user" aria-hidden="true"></i> List of Users</a>
                </li>
                <li class="divider"></li>
                <li style="background-color: #072656;"><a href="edit-home-content.php"><i class="fa fa-pencil" aria-hidden="true"></i> CMS <span class="label label-info"> for website content</span> </a>
                   </li>
                </li>
                <br/>
                <?php
                        if (isset($_SESSION['username'])){
                            echo '<li>
                                <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
                                </li>';
                        }else{
                           echo  '<li><a href="# " data-toggle="modal" data-target="#login-modal">Log In</a></li>';
                        }
                    ?>
                <li>
                     <a href="help.php"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
                </li>
            </ul>

        </div>

        <!-- /#sidebar-wrapper -->
        
         <!-- Page Content -->