
    <?php
     include_once("custom.php");
        include_once("header.php");
        include_once("navigation.php");
        include_once("connection.php");
        $sql = "SELECT * FROM `aboutcms` ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        ?>

<div class="container" id="abtcoverp" style="background-image: url(<?php echo $row["coverphoto"]; ?>);">
<h1 class="col-lg-3 col-lg-offset-3" id="headings">ABOUT</h1>
</div>
<div class="container" align="center">
<br/>  
<h1 class="alert"><?php echo $row["aboutheader"]; ?></h1>
<hr/>
<h4 style="font-size: 20px; padding: 30px; line-height: 50px; word-wrap: break-word;"><?php echo $row["aboutcontent"]; ?></h4>
</div>
<div class="container" id="teambg">
  <h3 class="" id=""><strong>OUR TEAM</strong></h3>
  <h4 class="col-lg-8 col-lg-offset-2" id="">Occassions Made Easy is a startup event management business.
If you are in need of hosting and resources for 
your event, we will provide you with everything you need. Be it small-scale 
or budget-friendly events, our services range from more and beyond. 
Whether it's just a small family reunion at your house or a 
"Beauty and the Beast"-inspired 18th birthday bash for 
your dalaga, OME Events will always make it fun, memorable and most of all EASY. <br/><br/><br/></h4>
  <div class="row">
  <div class="column">
    <div class="card">
      <img src="<?php echo $row["imgteam1"]; ?>" alt="staff1" style="width:50%">
      <div class="container1">
        <h2><?php echo $row["staff1"]; ?></h2>
        <p class="title"><?php echo $row["position1"]; ?></p>
        <p><?php echo $row["desc1"]; ?></p>
        <p><?php echo $row["email1"]; ?></p>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <img src="<?php echo $row["imgteam2"]; ?>" alt="staff2" style="width:50%">
      <div class="container1">
        <h2><?php echo $row["staff2"]; ?></h2>
        <p class="title"><?php echo $row["position2"]; ?></p>
        <p><?php echo $row["desc2"]; ?></p>
        <p><?php echo $row["email2"]; ?></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="<?php echo $row["imgteam3"]; ?>" alt="staff3" style="width:50%">
      <div class="container1">
        <h2><?php echo $row["staff3"]; ?></h2>
        <p class="title"><?php echo $row["position3"]; ?></p>
        <p><?php echo $row["desc3"]; ?></p>
        <p><?php echo $row["email3"]; ?></p>
      </div>
    </div>
  </div>
</div>
</div>
<div class="fullwidth">
 <h2 style="position: absolute; margin:50px;"> A BUSINESS. A FAMILY. </h2>
  <?php include 'template.php'; ?> 
</div>



<?php
  include_once("footer.php");
?>