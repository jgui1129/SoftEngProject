    <?php
     include_once("custom.php");
        include_once("header.php");
        include_once("navigation.php");
        include_once("connection.php");
    $sql = 'SELECT * FROM contactcms';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>
<div class="page-content-wrapper">
<div class="container" id="faqbg" style="background-image: url(<?php echo $row["coverphoto"]; ?>);">
<h1 class="col-lg-3 col-lg-offset-3" id="headings">Contact Us</h1>
</div>  
  <section id="contact" style="">
            <div class="container">
                <div class="row">
                    <div class="about_our_company" style="margin-bottom: 20px;">
                        <h1 style="color:#2c2c2d;" id="headings">Write Your Message</h1>
                        <div class="titleline-icon"></div>
                        <p style="color:#2c2c2d;" id="paragraphs">Fill up and hit send for more information! OME Events is known for fast and courteous service! </p>
                    </div>
                </div>
                <div class="row">
                <div class="alert alert-success" id="messagealert" style="display: none;"><h3 align="center"><i class="fa fa-thumbs-o-up"></i> Message Succesfully Sent!</h3></div>
                    <div class="col-md-8">
                        <form name="sentMessage" id="contactForm" novalidate="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your Name *" id="subject" required="" data-validation-required-message="Please enter your name.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" id="email" required="" data-validation-required-message="Please enter your email address.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Your Message *" id="message1" required="" data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <button onclick="sendEmail()" class="btn btn-xl get btn-warning col-md-8 col-lg-offset-5">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <p style="color:#2c2c2d;" id="paragraphs">
                            <strong><i class="fa fa-map-marker"></i> Address</strong><br>
                           <?php echo $row["newaddress"]; ?>
                        </p>
                        <p style="color:#2c2c2d;" id="paragraphs"><strong><i class="fa fa-phone"></i> Phone Number / Mobile #: </strong><br>
                            <?php echo $row["newlandline"]; ?> / <?php echo $row["newmobile"]; ?></p>
                        <p style="color:#2c2c2d;" id="paragraphs">
                            <strong><i class="fa fa-envelope"></i>  Email Address</strong><br>
                            <?php echo $row["newemail"]; ?></p>
                        <p></p>
                    </div>
                </div>
            </div>
        </section>
<div class="fullwidth">
 <h2 style="position: absolute; margin:50px;" id="headings"> ABOVE ALL ELSE, MAGIC. </h2>
  <?php include 'template.php'; ?> 
</div>


<?php
	include_once("footer.php");
?>