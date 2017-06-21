    <?php
        include_once("header.php");
        include_once("navigation.php");
        include_once("adminsidebar.php");
        include_once("connection.php");



        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d', time());

        $sql = "SELECT * FROM reservation WHERE STATUS = 'APPROVED'";
        $result = mysqli_query($conn,$sql);
        $count = 0;
        while ($row = mysqli_fetch_array($result)) {

                $pDate = strtotime(''.$row["EDATE"].'');
                $x = date('Y-m-d',$pDate);
                $id = $row["ID"];
                if ($date == $x) {
                  $sql = "UPDATE reservation set STATUS = 'COMPLETED' WHERE ID = '$id'";
                  mysqli_query($conn,$sql);
                  $count++;
                  $e = $row["ENAME"];
                }

        }


        ?>
        <div id="page-content-wrapper">
        <div data-aos="zoom-out-down" data-aos-duration="1500">

    <br/>    
    <div class="row">

    <?php

      if ($count > 0) {
        echo '
          <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong style="margin-left: 20px;">'.$e.'</strong> was updated it\'s status from APPROVED to "COMPLETED". 
        </div>';
      }


    ?>


     <div class="col-md-7 divider">
        <div id='calendar'></div><br/>
        <div class="row">

        <?php

            $sql = "SELECT * FROM reservation WHERE STATUS = 'APPROVED' LIMIT 5";
            $result = mysqli_query($conn,$sql);
            $count = mysqli_affected_rows($conn);
        ?>

            <div class="col-md-12"> <!-- start of table -->
            <br/>    
            <div class="col-md-6">
                <h4 class="title"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Upcoming Events <span class="badge"><?php echo $count; ?></span></h4>    
            </div>
            <div class="col-md-6 titleAlign">
                <div class="col-md-12">
                     <a href="list-of-reservations.php" class="viewList" >View complete list</a>
                </div>
            </div>    
            
            <?php
            echo '<table class="table table-striped table-bordered" style="box-shadow: 5px 5px 15px grey">
            <tr>
                <th>Event Name</th>
                <th>Date</th>
                <th>Client Name</th>
                <th>StartTime</th>
                <th>View Details</th>
                ';
            while ($row = mysqli_fetch_array($result)){
                echo '<tr>
                <td>'.$row["ENAME"].'</td>
                <td>'.$row["EDATE"].'</td>
                <td>'.$row["CNAME"].'</td> 
                <td>'.$row["STARTTIME"].'</td> 
                <td><a class="btn btn-primary btn-sm" href="reservation-event-details.php?id='.$row["ID"].'">View Details</a></td>
                </tr>';
            }    
            
            echo '</table>';
            ?>
            <!-- view details -->
            <br/>
          
            </div> <!-- end of table -->

        <?php

            $sql = "SELECT * FROM reservation WHERE STATUS = 'PENDING' LIMIT 5";
            $result = mysqli_query($conn,$sql);
            $count = mysqli_affected_rows($conn);
        ?>

            <div class="col-md-12"> <!-- start of table -->

            <div class="col-md-6">
                <h4 class="title"> <i class="fa fa-calendar-minus-o" aria-hidden="true"></i> Pending reservations <span class="badge"><?php echo $count; ?></span></h4>    
            </div>
            <div class="col-md-6 titleAlign">
                <div class="col-md-12">
                     <a href="list-of-reservations.php" class="viewList" >View complete list</a>
                </div>
            </div>    
            
       <?php
            echo '<table class="table table-striped table-bordered" style="box-shadow: 5px 5px 15px grey">
            <tr>
                <th>Event Name</th>
                <th>Date</th>
                <th>Client Name</th>
                <th>View Details</th>
                ';
            while ($row = mysqli_fetch_array($result)){
                echo '<tr>
                <td>'.$row["ENAME"].'</td>
                <td>'.$row["EDATE"].'</td>
                <td>'.$row["CNAME"].'</td> 
                <td><a class="btn btn-success btn-sm" href="reservation-event-details.php?id='.$row["ID"].'">View Details</a></td>
                </tr>';
            }    
            
            echo '</table>';
            ?>
            <!-- end of view details -->

            </div> <!-- end of table -->





        </div> <!-- row -->

        <?php

        $sql = "SELECT * FROM stats";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        ?>

     </div> <!-- col-md-7 -->
     <div class="col-md-5">
     <div class="invoice" style="padding: 10px;"><h3 align="center"><?php echo $time_one = date('l, F d, Y'); ?></h3></div>
    <h3 class="title"><i class="fa fa-line-chart" aria-hidden="true"></i>  Statistics</h3>

      <div data-aos="flip-down" data-aos-duration="1500">
        <div class="col-xs-6">
          <div style="text-align:center" class="panel panel-primary pan">
            <div class="panel-heading">
              <h1 class="panel-title"><i class="fa fa-check-square-o" aria-hidden="true"></i> Site Visits</h1>
            </div>
            <!-- end panel-heading -->
            <div class="panel-info">
                <h1><?php echo $row["VISITS"]; ?></h1>
            </div>
            <!-- end panel-body -->
          </div>
          <!-- end panel-primary -->
        </div>
      </div>  

        <?php

        $sql = "SELECT * FROM reservation WHERE STATUS = 'COMPLETED' OR STATUS = 'APPROVED' OR STATUS = 'PENDING'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_affected_rows($conn);

        ?>

      <div data-aos="flip-down" data-aos-duration="1500">
        <div class="col-xs-6">
          <div style="text-align:center" class="panel panel-primary pan">
            <div class="panel-heading">
              <h1 class="panel-title"><i class="fa fa-check-square-o" aria-hidden="true"></i> Reservations</h1>
            </div>
            <!-- end panel-heading -->
            <div class="panel-info">
                <h1> <?php echo $count; ?></h1>
            </div>
            <!-- end panel-body -->
          </div>
          <!-- end panel-primary -->
        </div>
    </div>      
        <?php

        $sql = "SELECT * FROM registration";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_affected_rows($conn);

        ?>

      <div data-aos="flip-down" data-aos-duration="1800">
        <div class="col-xs-6">
          <div style="text-align:center" class="panel panel-primary pan">
            <div class="panel-heading">
              <h1 class="panel-title"><i class="fa fa-check-square-o" aria-hidden="true"></i> Registered Users</h1>
            </div>
            <!-- end panel-heading -->
            <div class="panel-info">
                <h1> <?php echo $count; ?> </h1>
            </div>
            <!-- end panel-body -->
          </div>
          <!-- end panel-primary -->
        </div>
</div>
        <?php

        $sql = "SELECT * FROM reservation WHERE STATUS = 'COMPLETED'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_affected_rows($conn);

        ?>   

      <div data-aos="flip-down" data-aos-duration="2500">
          <div class="col-xs-6">
          <div style="text-align:center" class="panel panel-primary pan">
            <div class="panel-heading">
              <h1 class="panel-title"><i class="fa fa-check-square-o" aria-hidden="true"></i> Finished Events</h1>
            </div>
            <!-- end panel-heading -->
            <div class="panel-info">
                <h1> <?php echo $count; ?> </h1>
            </div>
            <!-- end panel-body -->
          </div>
          <!-- end panel-primary -->
        </div>
</div>
        <div class="col-md-12">
          

    <div data-aos="zoom-out-down" data-aos-duration="2500">
    <div class="wrap">
    <h3 class="title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Todo List</h3>
        <div class="task-list">
            <ul>

<?php
                $query = mysqli_query($conn,"SELECT * FROM tasks ORDER BY date ASC, time ASC");
                $numrows = mysqli_num_rows($query);

                if($numrows>0){
                    while( $row = mysqli_fetch_assoc( $query ) ){

                        $task_id = $row['id'];
                        $task_name = $row['task'];

                        echo '<li>
                                <span>'.$task_name.'</span>
                                <img id="'.$task_id.'" class="delete-button" width="10px" src="img/close.svg" />
                              </li>';
                    }
                }
?>
                
            </ul>
        </div>
        <form class="add-new-task" autocomplete="off">
            <input type="text" name="new-task" placeholder="Add a new item..." />
        </form>
    </div>
    </div>
        </div> <!-- col-md-12 -->



         <div class="col-md-12"><!-- col-md-12 -->
             
            <h3 class="title"><i class="fa fa-signal" aria-hidden="true"></i>  Send Sms</h3>

          <div class="form-horizontal">
          <br/>
          <fieldset>
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Number</label>
              <div class="col-md-9">
                <input id="sms" name="sms" type="text" placeholder="example@example.com" class="form-control">
              </div>
            </div>

    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
              <div class="col-lg-7 col-lg-offset-2">

              </div>

              <div class="col-lg-3">
              <button onclick="sendSms()" class="btn btn-primary btn-lg">Submit</button>
              </div>
                
              </div>
            </div>

            <!-- Message -->

            <div class="form-group">
              <div class="col-md-9">
              </div>
            </div>


          </fieldset>
          </div>



         </div>



     </div> <!-- col-md-5 -->
    </div>




    <?php
        include_once("footeradmin.php");
    ?>  