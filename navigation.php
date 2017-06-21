<?php
    ob_start();
    if (!isset($_SESSION)){
        session_start();
    }
?>
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">OME | Made Easy</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="portfolio.php">PORTFOLIO</a></li>
                    <li><a href="reservation.php">RESERVATION</a></li>
                    <li><a href="contact.php">CONTACTS</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <?php
                        if (isset($_SESSION['username']) && isset($_SESSION["access"])){
                            
                            if ($_SESSION["access"] == "USER") {
                                echo '<li class="dropdown"><a href="client-dashboard.php">Hi <b id="userLogIn" style="text-transform: capitalize">';
                                echo  $_SESSION['username'];
                                echo ' <b class="caret"></b>'; 

                            }else {
                                echo '<li class="dropdown"><a href="dashboard.php">Hi <b id="userLogIn" style="text-transform: capitalize">';
                                echo  $_SESSION['username'];
                                echo ' <b class="caret"></b>'; 
                            }

                            echo '</b></a><ul class="dropdown-menu">';
                                if ($_SESSION["access"] == "ADMIN") {
                                    echo '<li><a href="admin-settings.php"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a></li>
                                    <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
                                    </ul>
                                </li>';                                
                                }else {

                                echo '<li><a href="client-settings.php"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a></li>
                                    <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
                                        </ul>
                                    </li>';
                                }
                        }else{
                           echo  '<li><a href="# " data-toggle="modal" data-target="#login-modal">LOG-IN</a></li>';
                        }
                    ?>
                </ul>
                 <a href="reservation.php" class="btn btn-warning navbar-btn col-md-2">RESERVE NOW</a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
                <div class="loginmodal-container" align="center">
                    <h1 class="">Login to Your Account</h1><br>
                    <p class="alert-danger alert" id="loginMessage">Username or Password is incorrect</p>
                    <input type="text" class="form-control" id="username" placeholder="Username" onkeypress="hideAlert()" />
                    <input type="password" class="form-control" id="password" placeholder="Password" onkeypress="hideAlert()" />        
                    <input type="button" class="btn btn-primary btn-lg btn-block" value="Login" onclick="login()">

                    
                    <br/>
                    <a href="registration.php" class="x">Register Here!</a> | 
                    <a href="forgot-password.php" class="x">Forgot Password</a>
                </div>
            </div>
          </div>