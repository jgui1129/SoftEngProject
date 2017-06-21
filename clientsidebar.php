 <!--Admin Sidebar -->

<?php 
    if(!isset($_SESSION["username"])){
        header("location: index.php");
    }
?>

 <div id="wrapper" class="toggled">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <br/>
                <li class="sidebar-brand">
                    <a href="client-dashboard.php">
                        <h1 style="padding-left: 20px"><i class="fa fa-user-circle fa-2x" aria-hidden="true" style="padding-left: 20px; padding-bottom: 10px"></i> <?php
                        if (isset($_SESSION['username'])){
                            echo '<li><a href="client-dashboard.php">Hi <b id="userLogIn" style="text-transform: capitalize">';
                            echo  $_SESSION['username'];
                            echo '</b></a></li>';
                        }else{
                           echo  '<li><a href="# " data-toggle="modal" data-target="#login-modal">LOGIN</a></li>';
                        }
                    ?></h1>
                    </a>
                </li>
                <br/><br/><br/><br/><br/><br/>

                <li>
                     <a href="client-settings.php"><i class="fa fa-gear" aria-hidden="true"></i> Settings</a>
                </li>
                <?php
                        if (isset($_SESSION['username'])){
                            echo '<li>
                                <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
                                </li>';
                        }else{
                           echo  '<li><a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Log In</a></li>';
                        }
                    ?>
                <li>
                     <a href="help-client.php"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
                </li>
            </ul>

        </div>

        <!-- /#sidebar-wrapper -->
        
         <!-- Page Content -->