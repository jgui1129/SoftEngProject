<?php
	include_once("header.php");
    include_once("navigation.php");
    include_once("adminsidebar.php");
    include_once("connection.php");
     include_once("custom.php");

    $sql = 'SELECT * FROM ` portfoliocms`';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>
    <div id="page-content-wrapper">

    <h2 class="alert" align="center">Content Management System</h2>
    <hr/>
    <div style="text-align: center;">
    <div class="btn-group btn-group-lg center" role="group" aria-label="...">
        <a class="btn btn-default" href="edit-home-content.php" role="button">Home</a>
        <a class="btn btn-default" href="edit-about-content.php" role="button">About</a>
        <a class="btn btn-default active" href="edit-portfolio-content.php" role="button">Portfolio</a>
        <a class="btn btn-default" href="edit-contact-content.php" role="button">Contact</a>
		</div>
    </div>
    <br/><br/>

    <div class="col-md-12">
    <h2 style="text-align: center;">Change Image</h2><br><br>
      <div class="col-md-3 well">
          <br/>
          <form method="POST" action="upload.php" enctype="multipart/form-data">
           <input type="file" name="file"><br>
           <input type="submit" name="pimg1" value="Upload" class="btn btn-info"><br> <br>  
          </form>
          <img src="<?php echo $row["pimg1"]; ?>" width="200px" alt="event1"  class="img img-responsive">
      </div>
      <div class="col-md-3 well">
        <br/>
          <form method="POST" action="upload.php" enctype="multipart/form-data">
           <input type="file" name="file"><br>
           <input type="submit" name="pimg2" value="Upload" class="btn btn-info"><br> <br>  
          </form>
          <img src="<?php echo $row["pimg2"]; ?>" width="200px" alt="event2"  class="img img-responsive">
        </div>
        <div class="col-md-3 well">  
          <br/>
          <form method="POST" action="upload.php" enctype="multipart/form-data">
           <input type="file" name="file"><br>
           <input type="submit" name="pimg3" value="Upload" class="btn btn-info"><br> <br>  
          </form>
          <img src="<?php echo $row["pimg3"]; ?>" width="200px" alt="event3"  class="img img-responsive">
          </div>
        <div class="col-md-3 well">  
          <br/>
          <form method="POST" action="upload.php" enctype="multipart/form-data">
           <input type="file" name="file"><br>
           <input type="submit" name="pimg4" value="Upload" class="btn btn-info"><br> <br>  
          </form>
          <img src="<?php echo $row["pimg4"]; ?>" width="200px" alt="event4" class="img img-responsive">
         </div>

  </div>

    

<?php
	include_once("footeradmin.php");
?>