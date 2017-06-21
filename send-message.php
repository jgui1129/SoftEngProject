<?php

    include_once("header.php");
    include_once("navigation.php");
    include_once("adminsidebar.php");
    include_once('connection.php');

    echo '<div data-aos="fade-right" data-aos-duration="1500">';

    echo '<div id="page-content-wrapper">';
    echo '<div class="alert alert-success" id="messagealert" style="display: none;"><h3 align="center"><i class="fa fa-thumbs-o-up"></i> Message Succesfully Sent!</h3></div>';
    if (isset($_GET['id']) && isset($_GET["cname"])){
      $id = $_GET['id'];
      $cname = $_GET['cname'];

      $sql = "SELECT * FROM registration WHERE FULLNAME = '$cname'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);
    }
?>

 <br/><br/>
 <div>          

 <div class="col-md-6" style="border-right: 2px dotted grey; padding-right: 50px;">
         
         <div class="row">
          <div class="col-md-3"></div>
           <div class="col-md-9">
              <h3 class="title"><i class="fa fa-signal" aria-hidden="true"></i>  Send Sms</h3>
           </div>
         </div> 
           
          <br/>
          <fieldset>
          <div class="form-horizontal">
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="sms">Recepient</label>
              <div class="col-md-9">
                <input id="sms" name="sms" type="text" onblur="removeMessageAlert()" placeholder="eg. 09123456789" class="form-control" value="<?php if (isset($_GET['id'])) { echo $row['PCONTACT'];}?>">
              </div>
            </div>

            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" onblur="removeMessageAlert()" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
            <label class="col-md-3 control-label" for="submit"></label>
              <div class="col-md-9">
              <button class="btn btn-primary btn-lg btn-block" onclick="sendSms()">Send SMS</button>
              </div>
            </div>  
                
            <hr/>

         <div class="row">
          <div class="col-md-3"></div>
           <div class="col-md-9">
              <h3 class="title"><i class="fa fa-share" aria-hidden="true"></i>  Send Email</h3>
           </div>
         </div> 

          <div class="form-horizontal">
          <br/>
          <fieldset>
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" onblur="removeMessageAlert()" placeholder="example@example.com" class="form-control" value="<?php if (isset($_GET['id'])) { echo $row['EMAIL'];}?>">
              </div>
            </div>


            <!-- Subject input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Subject</label>
              <div class="col-md-9">
                <input id="subject" name="subject" type="text" onblur="removeMessageAlert()" placeholder="Subject" class="form-control">
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message1" onblur="removeMessageAlert()" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
            <label class="col-md-3 control-label" for="message"></label>
              <div class="col-md-9">
              <button  class="btn btn-primary btn-lg btn-block" onclick="sendEmail()">Submit</button>
              </div>
            </div>  
                

           </fieldset>
          

              
            </div>
           </fieldset>
          </form>



 </div> <!-- col-md-6 -->

 <div class="col-md-5" style=" padding-left: 50px;">

  <div class="col-md-1">
      <i class="fa fa-search fa-2x" onclick="displayContact()"></i>  
  </div>
  <div class="col-md-8">
    <input type="text" id="displayContact" onkeyup="displayContact()" class="form-control">
  </div>
  <div class="col-md-3">
    <input type="button" value="search" class="btn btn-primary">      
  </div>
  <br/><br/>
  <div class="row">
    <div id="displayContactDiv">


      
<?php
      
    $sql = "SELECT * FROM contact";   
    $result = mysqli_query($conn,$sql);

    echo "<table class='table table-bordered table-hover table-striped'>";
    echo '<tr>
    <th>Name</th>
    <th>Phone Number</th>
    <th>Email</th>
    <th>Del</th></tr>';

    while ($row = mysqli_fetch_array($result)){

      echo '<tr>
      <td>'.$row["CNAME"].'</td>
      <td>'.$row["CNUM"].'</td>
      <td>'.$row["CEM"].'</td>
      <td><center><button class="btn-danger" onclick="deleteContact('.$row["ID"].')"><i class="fa fa-trash-o" style="color: white"></i></button></center></td>
      </tr>';
    }

    echo '</table>';
?>

    </div>


    <div id="addToContacts">
      <br/>
      <h3> <i class="fa fa-book"></i> Add Contact <small id="successAdded" style="display: none">Succeessfully added...</small></h3>
      <br/>

            <div class="form-group">
              <label class="col-md-4 control-label" for="email">Name: </label>
              <div class="col-md-8">
                <input id="contactName" type="text" placeholder="eg. nicole" class="form-control" required="required">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="email">Phone Number: </label>
              <div class="col-md-8">
                <input id="contactPhone" type="text" placeholder="eg. 09123456789" class="form-control" required="required">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="email">Email Address: </label>
              <div class="col-md-8">
                <input id="contactEmail" type="email" placeholder="example@example.com" class="form-control" required="required">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-8 control-label" for="email"></label>
              <div class="col-md-4">
                <br/>
                <input type="button" value="Add to Contacts" class="btn btn-warning" onclick="addToContacts()">
              </div>
            </div>
    </div><!-- addtoContacts -->

  </div><!-- row -->
  <br/><br/><br/>
         
 </div> <!-- col-md-6 -->   
</div> <!-- row -->



 <?php

  include_once('footeradmin.php');
 ?>