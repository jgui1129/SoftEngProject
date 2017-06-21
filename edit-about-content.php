<?php
	include_once("header.php");
    include_once("navigation.php");
    include_once("adminsidebar.php");
    include_once('connection.php');
    include_once("custom.php");

    $sql = 'SELECT * FROM aboutcms';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>
    <div id="page-content-wrapper">
    <div class="container" align="center">
    <h2 class="alert">Content Management System</h2>
    <hr/>
    <div style="text-align: center;">
        <div class="btn-group btn-group-lg center" role="group" aria-label="...">
        <a class="btn btn-default" href="edit-home-content.php" role="button">Home</a>
        <a class="btn btn-default active" href="edit-about-content.php" role="button">About</a>
        <a class="btn btn-default" href="edit-portfolio-content.php" role="button">Portfolio</a>
        <a class="btn btn-default" href="edit-contact-content.php" role="button">Contact</a>
		</div>
    <br/><br/><br/>
    </div>
    <div class="col-md-11 well">
    <div class="col-sm-6">
      <h2>Cover Photo</h2>
      <form method="POST" action="upload.php" enctype="multipart/form-data">
     <input type="file" name="file"><br>
     <input type="submit" name="abtcover" value="Upload" class="btn btn-info col-sm-4"><br> <br>  
    </form>
    <img src="<?php echo $row["coverphoto"]; ?>" class="img img-responsive" alt="about coverphoto">
    <br>
    </div>

    <form method="POST" action="query.php">
     <div class="col-sm-6">
      <h2>About Content</h2>
        <textarea rows="1" cols="30" name="a1" class="form-control" placeholder="Header Title" id="headertitle"><?php echo $row["aboutheader"];?></textarea>
        <br>
    <textarea rows="7" class="form-control" name="a2" cols="50" placeholder="Describe the most amazing business that is OME!"><?php echo $row["aboutcontent"]; ?></textarea><br>
    <input type="submit" value="SAVE" class="btn btn-success btn-md col-sm-12">
    </div>
    </form>
   
    </div>
    <div class="row">
        <div class="col-sm-11">
            <div class="col-padding">
                <h3>Team Profiles</h3>
                <div class="row">
                  <div class="column" style="text-align: center;">
                    <div class="card">
                      <img src="<?php echo $row["imgteam1"]; ?>" alt="Staff1" style="width:50%;">
                      <div class="container1">
                      <form method="POST"  action="upload.php" enctype="multipart/form-data">
                         <input type="file"  name="file"><br>
                         <input type="submit" name="team1" value="Upload" class="btn btn-info col-sm-4"><br> <br>  
                        </form>
                         <form method="POST" action="query.php">
                        <textarea class="form-control" rows="1" cols="30" name="a3" placeholder="Staff 1" id="headertitle"><?php echo $row["staff1"]; ?></textarea><br>
                        <textarea class="form-control" rows="1" cols="30" name="a4" placeholder="What's the staff's position?"><?php echo $row["position1"]; ?></textarea><br>
                        <textarea class="form-control" rows="6" cols="30" name="a5" placeholder="Some job description of the employee..."><?php echo $row["desc1"]; ?></textarea><br>
                        <textarea class="form-control" rows="1" cols="30" name="a6" placeholder="Employee's Email"><?php echo $row["email1"]; ?></textarea><br>
                        <input type="submit" value="SAVE" class="btn btn-success btn-md col-sm-12"><br><br><br/>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="column" style="text-align: center;">
                    <div class="card">
                      <img src="<?php echo $row["imgteam2"]; ?>" alt="Staff2" style="width:50%;">
                      <div class="container1">
                      <form method="POST" action="upload.php" enctype="multipart/form-data">
                         <input type="file" name="file"><br>
                         <input type="submit" name="team2" value="Upload" class="btn btn-info col-sm-4"><br> <br>  
                        </form>
                         <form method="POST" action="query.php">
                        <textarea class="form-control" rows="1" cols="30" name="a7" placeholder="Staff 2" id="headertitle"><?php echo $row["staff2"]; ?></textarea><br>
                        <textarea class="form-control" rows="1" cols="30" name="a8" placeholder="What's the staff's position?"><?php echo $row["position2"]; ?></textarea><br>
                        <textarea class="form-control" rows="6" cols="30" name="a9" placeholder="Some job description of the employee..."><?php echo $row["desc2"]; ?></textarea><br>
                        <textarea class="form-control" rows="1" cols="30" name="a10" placeholder="Employee's Email"><?php echo $row["email2"]; ?></textarea><br>
    <input type="submit" value="SAVE" class="btn btn-success btn-md col-sm-12"><br><br><br/>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="column" style="text-align: center;">
                    <div class="card">
                      <img src="<?php echo $row["imgteam3"]; ?>" alt="Staff3" style="width:50%;">
                      <div class="container1">
                      <form method="POST" action="upload.php" enctype="multipart/form-data">
                         <input type="file" name="file"><br>
                         <input type="submit" name="team3" value="Upload" class="btn btn-info col-sm-4"><br> <br>  
                        </form>
                         <form method="POST" action="query.php">
                        <textarea class="form-control" rows="1" cols="30" name="a11" placeholder="Staff 3" id="headertitle"><?php echo $row["staff3"]; ?></textarea><br>
                        <textarea class="form-control" rows="1" cols="30" name="a12" placeholder="What's the staff's position?"><?php echo $row["position3"]; ?></textarea><br>
                        <textarea class="form-control" rows="6" cols="30" name="a13" placeholder="Some job description of the employee..."><?php echo $row["desc3"]; ?></textarea><br>
                        <textarea class="form-control" rows="1" cols="30" name="a14" placeholder="Employee's Email"><?php echo $row["email3"]; ?></textarea><br>
    <input type="submit" value="SAVE" class="btn btn-success btn-md col-sm-12"><br><br><br/>
                        </form>
                      </div>
                    </div>
                  </div>
            </div>
         </div>
         <br/>
    </div>
     </div>
</div>
  
<?php
	include_once("footeradmin.php");
?>