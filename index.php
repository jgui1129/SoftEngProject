    <?php
       include_once("custom.php");
        include_once("header.php");
        include_once("navigation.php");
        include_once("connection.php");

      $localIP = getHostByName(php_uname('n'));
      $currTime = time()+(60 * 10);
      $sql = "SELECT * FROM visitorsip";
      $result = mysqli_query($conn,$sql);
      $count = mysqli_affected_rows($conn);
      $add =True;

      if ($count != 0) {
        while ($row = mysqli_fetch_array($result)) {
          
          if ($localIP == $row["ipaddress"]){

            $add = False;
          }
          $i = $row["ID"];

          if (time() >= $row["timer"]) {
              $sql = "DELETE FROM visitorsip WHERE ID = '$i'";
              mysqli_query($conn,$sql);
          }
          
          if ($localIP == $row["ipaddress"] && (time() >= $row["timer"])) {
            
              $sql = "INSERT into visitorsip (ipaddress,timer) VALUES('$localIP','$currTime')";
              mysqli_query($conn,$sql);
              
              $sql = "SELECT * from stats";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);

                $visit = $row['VISITS']+1;

                $sql = "UPDATE stats SET VISITS = '$visit'";
                mysqli_query($conn,$sql);
        
            }
        }

        if ($add) {
          $sql = "INSERT into visitorsip (ipaddress,timer) VALUES('$localIP','$currTime')";
          mysqli_query($conn,$sql);
          
          $sql = "SELECT * from stats";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);

            $visit = $row['VISITS']+1;

            $sql = "UPDATE stats SET VISITS = '$visit'";
            mysqli_query($conn,$sql);
          
        }

      }else {
        $sql = "INSERT into visitorsip (ipaddress,timer) VALUES('$localIP','$currTime')";
        mysqli_query($conn,$sql);
        
        $sql = "SELECT * from stats";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($result);

          $visit = $row['VISITS']+1;

          $sql = "UPDATE stats SET VISITS = '$visit'";
          mysqli_query($conn,$sql);


      } 


    
    $sql = 'SELECT * FROM homecms';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $sql2 = 'SELECT * FROM ` portfoliocms` ';
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);
    ?>
    <div class="container" id="coverphoto" style="background-image: url(<?php echo $row["maincover"];?>);">
    <h2><strong><?php echo $row["coverheader"]; ?></strong></h2> 
      <p style="width: 50%;"><?php echo $row["coverdetails"]; ?></p>
  </div>

<div class="container" id="centercontent" style="width: 70%;">
    <h2><strong><?php echo $row["headerabout"]; ?></strong></h2><br/>
<p class="" style="font-size: 15px; padding: 30px; line-height: 30px; word-wrap: break-word;"><?php echo $row["contentabout"];?></p>
<p><a href="reservation.php" class="btn btn-warning" role="button">Make A Reservation Today!</a></p>
</div>
<div class="container" id="services-peek" align="center">
<div  align="center">

  <div class="col-md-2 portfolioShowcase">
  <img src="img/cowboy.png" > 
    <h4>Theme-based Setups</h4>
  </div>

  <div class="col-md-2 portfolioShowcase">
  <img src="img/masks.png">
    <h4>Photo &amp; Video Coverage</h4>
  </div>

  <div class="col-md-2 portfolioShowcase">
  <img src="img/garlands.png">
    <h4>Fun Booths</h4>
  </div>

   <div class="col-md-2 portfolioShowcase">
   <img src="img/crown.png">
    <h4>Make It Your Own</h4>
  </div>


</div>
<a href="reservation.php" class="btn btn-warning x" role="button">See our list of Packages</a>
</div>



<div class="" id="portfolio-peek">
    <div class="title-box"><h3 id="headings">OUR PORTFOLIO</h3></div>
    <div class="row">
      <div class="container" id="thumbnails">
        <a target="_blank" href="<?php echo $row2["pimg1"]; ?>">
        <img src="<?php echo $row2["pimg1"]; ?>" alt="Forest" class="portfolio-img"></a>
        <a target="_blank" href="<?php echo $row2["pimg2"]; ?>">
        <img src="<?php echo $row2["pimg2"]; ?>" alt="Forest" class="portfolio-img"></a>
        <a target="_blank" href="<?php echo $row2["pimg3"]; ?>">
        <img src="<?php echo $row2["pimg3"]; ?>" alt="Forest" class="portfolio-img"></a>
        <a target="_blank" href="<?php echo $row2["pimg4"]; ?>">
        <img src="<?php echo $row2["pimg4"]; ?>" alt="Forest" class="portfolio-img"></a>
    </div>
    </div>
    <br>
    <p><a href="portfolio.php" class="btn btn-warning" role="button">See our Portfolio to view our awesome work!</a></p>
</div>
<div class="" id="testimonials-peek">
<div class="title-box"><h3 id="headings">SEE WHAT OUR CLIENTS ARE SAYING...</h3></div>


<div class="container">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo $row["imgclient1"]; ?>" alt="client1">
      <div class="caption">
        <h3 id="headings"><?php echo $row["nclient1"];?></h3><br/>
        <p id="paragraphs"><?php echo $row["qclient1"];?></p>
      </div>
      <p><a href="kiddie-package.php" class="btn btn-warning" role="button">See "Kiddie Parties"</a></p>
    </div>
  </div>
   <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo $row["imgclient2"]; ?>" alt="client1">
      <div class="caption">
        <h3 id="headings"><?php echo $row["nclient2"];?></h3><br/>
        <p id="paragraphs"><?php echo $row["qclient2"];?></p>
      </div>
      <p><a href="wedding-package.php" class="btn btn-warning" role="button">See "Weddings"</a></p>
    </div>
  </div>
   <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo $row["imgclient3"]; ?>" alt="client1">
      <div class="caption">
        <h3 id="headings"><?php echo $row["nclient3"];?></h3><br/>
        <p id="paragraphs"><?php echo $row["qclient3"];?></p>
      </div>
      <p><a href="debut-package.php" class="btn btn-warning" role="button">See "Debut Parties"</a></p>
    </div>
  </div>
</div>


</div>
    <?php
        include_once('info.php');
        include_once("footer.php");
    ?>