<?php

	session_start();
	include_once('connection.php');
	include_once('header.php');
	include_once('admin_navigation.php');
	include_once('adminnav.php');

	echo '<div id="page-content-wrapper">';
  


	if(isset($_SESSION['em']) && $_SESSION['em'] == "Email Sent Successfully!") {
		$em = '<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '.$_SESSION['em'];
	}else {
		$em ="";
	}

?>


<br/><br/>

  <div data-aos="fade-in">  

<div class="col-lg-7"> <!-- EMAIL -->


      <div class="col-lg-12">
          <form class="form-horizontal" action="em2.php" method="post">
          <fieldset>
            
<h1 style="margin-left: 100px;"><i class="fa fa-share" aria-hidden="true"></i> Send Email</h1>
<a name="emailsent"></a>
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="example@example.com" class="form-control">
              </div>
            </div>


            <!-- Subject input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Subject</label>
              <div class="col-md-9">
                <input id="text" name="subject" type="text" placeholder="Subject" class="form-control">
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

			<h3><?php echo $em; 
			$_SESSION['em'] = "";

			?></h3>

              </div>

              <div class="col-lg-3">
              <button type="submit" class="btn btn-primary btn-lg">Submit</button>
              </div>
                
              </div>
            </div>

            <!-- Message -->

            <div class="form-group">
              <div class="col-md-9">
              </div>
            </div>


          </fieldset>
          </form>
        </div>
      
</div>


<?php
	
	include_once('footer.php');

?>