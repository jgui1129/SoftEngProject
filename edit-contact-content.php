<?php
	include_once("header.php");
    include_once("navigation.php");
    include_once("adminsidebar.php");
    include_once('connection.php');
     include_once("custom.php");

    $sql = 'SELECT * FROM contactcms';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>
    <div id="page-content-wrapper">
    <div class="container">
    <h2 class="alert" align="center">Content Management System</h2>
    <hr/>
    <div style="text-align: center;">
        <div class="btn-group btn-group-lg center" role="group" aria-label="...">
        <a class="btn btn-default" href="edit-home-content.php" role="button">Home</a>
        <a class="btn btn-default" href="edit-about-content.php" role="button">About</a>
        <a class="btn btn-default" href="edit-portfolio-content.php" role="button">Portfolio</a>
        <a class="btn btn-default active" href="edit-contact-content.php" role="button">Contact</a>
		</div>
    </div>
    <br/><br/>
    <div class="row">
    <div class="col-sm-6">
      <div class="col-padding">
      <h2>Cover Photo</h2>
      <form method="POST" action="upload.php" enctype="multipart/form-data">
     <input type="file" name="file"><br>
     <input type="submit" name="contactcover" value="Upload" class="btn btn-info col-sm-4"><br> <br>  
    </form>
    <img src="<?php echo $row["coverphoto"]; ?>" width="500px" alt="about coverphoto">
    <br>
      </div>
    </div>
    <div class="col-sm-6">
    <br/><br/><br/>
      <div class="col-padding">
        <h3>Change Contacts</h3>
        <form class="form-horizontal" action="query.php" method="POST">
            <div class="form-group">
            <label for="newEmail" class="col-sm-3 control-label">New Email:</label>
                <div class="col-sm-5">
                    <input type="email" name="con1" value="<?php echo $row["newemail"]; ?>" class="form-control" id="newEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
            <label for="newLandline" class="col-sm-3 control-label">New Landline #:</label>
                <div class="col-sm-5">
                    <input type="number" name="con2" value="<?php echo $row["newlandline"]; ?>" class="form-control" id="newLandline" placeholder="###-####">
                </div>
            </div>
            <div class="form-group">
            <label for="newMobile" class="col-sm-3 control-label">New Mobile Phone #:</label>
                <div class="col-sm-5">
                    <input type="number" name="con3" value="<?php echo $row["newmobile"]; ?>" class="form-control" id="newMobile" placeholder="####-###-####">
                </div>
            </div>
            <div class="form-group">
            <label for="newAddress" class="col-sm-3 control-label">New Address:</label>
                <div class="col-sm-5">
                    <input type="text" name="con4" value="<?php echo $row["newaddress"]; ?>" class="form-control" id="newAddress" placeholder="Current office location">
                </div>
            </div>
            <div class="form-group">
            <div class="col-sm-offset-4 col-sm-10">
              <button type="submit" class="btn btn-success">Save Changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    </div>
</div>
<?php
	include_once("footeradmin.php");
?>