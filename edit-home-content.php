<?php
	include_once("header.php");
    include_once("navigation.php");
    include_once("adminsidebar.php");
    include_once('connection.php');
    include_once("custom.php");

    $sql = 'SELECT * FROM homecms';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>
    <div class="page-content-wrapper">
    <div class="container">
    <h2 class="alert" align="center">Content Management System</h2>
    <hr/>
    <div style="text-align: center;">
        <div class="btn-group btn-group-lg center" role="group" aria-label="...">
        <a class="btn btn-default active" href="edit-home-content.php" role="button">Home</a>
        <a class="btn btn-default" href="edit-about-content.php" role="button">About</a>
        <a class="btn btn-default" href="edit-portfolio-content.php" role="button">Portfolio</a>
        <a class="btn btn-default" href="edit-contact-content.php" role="button">Contact</a>
		</div>
    </div>
    <br/><br/>




    <div class="col-md-12">
    
    <div class="col-sm-5 well"  style="margin-left: 30px;">
        <h3 class="alert alert-info">Main Cover</h3>
    <form method="POST" action="upload.php" enctype="multipart/form-data">
     <input type="file" name="file"><br>
     <input type="submit" name="upload" value="Upload" class="btn btn-info col-sm-4"><br> <br>  
    </form>
    <br/> 
		<img src="<?php echo $row["maincover"]; ?>" width="500px" class="img img-thumbnail">
		<br/>
    </div>


    <div class="col-sm-5 well" style="margin-left: 20px;">
    <form method="POST" action="query.php">
        <label>Header Title</label>
        <textarea rows="1" cols="30" class="form-control" name="c1" placeholder="Header Title" id="headertitle"><?php echo $row["coverheader"]; ?></textarea>
        <br>
        <label>Header details</label>
        <textarea rows="10" class="form-control" name="c2" cols="50"><?php echo $row["coverdetails"]; ?></textarea><br>
         <input type="submit" value="SAVE" class="btn btn-success btn-md col-sm-12">
    </div>
    </form>
    </div>


    

    <div class="col-md-11">

    <div class="col-sm-3 well" style="margin-left: 30px;">
    <form method="POST" action="query.php">
    <h3 class="alert alert-info">About Snippet</h3>
        <textarea rows="2" cols="30" class="form-control" name="c3" placeholder="About Snippet Header Title" id="headertitle"><?php echo $row["headerabout"]; ?></textarea>
        <br>
        <textarea rows="22" cols="35" class="form-control" name="c4" placeholder="Think of something that would engage your audience!"><?php echo $row["contentabout"]; ?></textarea><br>
        <input type="submit" value="SAVE" class="btn btn-success btn-md col-sm-12">
     </form>
    </div >
    

    <div class="col-sm-8 well" style="margin-left: 15px;">
        <h3 class="alert alert-info">Testimonials Snippet</h3>

    <div class="col-md-4">
    <img src = "<?php echo $row["imgclient1"]; ?>" class="img-responsive">
    <form method="POST" action="upload.php" style="float: left;" enctype="multipart/form-data">
     <input type="file" name="file"><br>
     <input type="submit" name="client1" value="Upload" class="btn btn-info col-sm-6"><br><br>
    </form>
    <form method="POST" action="query.php">
    <textarea rows="1" cols="30" class="form-control" name="c5" placeholder="client1"><?php echo $row["nclient1"]; ?></textarea><br>
    <textarea rows="10" cols="30" class="form-control" name="c6" placeholder="Place your client's quote here"><?php echo $row["qclient1"]; ?></textarea><br>
    <input type="submit" value="SAVE" class="btn btn-success btn-md col-sm-12">
    </form>
    </div>

  <div class="col-md-4">
  <img src = "<?php echo $row["imgclient2"]; ?>" class="img-responsive">
  <form method="POST" action="upload.php" style="float: left;" enctype="multipart/form-data">
     <input type="file" name="file"><br>
     <input type="submit" name="client2" value="Upload" class="btn btn-info col-sm-6"><br><br>
    </form>
    <form method="POST" action="query.php">
    <textarea rows="1" cols="30" class="form-control" name="c7" placeholder="client2"><?php echo $row["nclient2"]; ?></textarea><br>
    <textarea rows="10" cols="30" class="form-control" name="c8" placeholder="Place your client's quote here"><?php echo $row["qclient2"]; ?></textarea><br>
    <input type="submit" value="SAVE" class="btn btn-success btn-md col-sm-12">
    </form>
    </div>


<div class="col-md-4">
    <img src = "<?php echo $row["imgclient3"]; ?>" class="img-responsive">
    <form method="POST" action="upload.php"  style="float: left;" enctype="multipart/form-data">
     <input type="file" name="file"><br>
     <input type="submit" name="client3" value="Upload" class="btn btn-info col-sm-6"><br><br>
    </form>
    <form method="POST" action="query.php">
    <textarea rows="1" cols="30" class="form-control" name="c9" placeholder="client3"><?php echo $row["nclient3"]; ?></textarea><br>
    <textarea rows="10" cols="30" class="form-control" name="c10" placeholder="Place your client's quote here"><?php echo $row["qclient3"]; ?></textarea><br>
    <input type="submit" value="SAVE" class="btn btn-success btn-md col-sm-12">
    </form>
</div>

    </div>
    </div>
<?php
	include_once("footeradmin.php");
?>