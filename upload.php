<?php

  include_once("connection.php");

if (!$conn){
  echo "failed to connect";
}

                    // Process the upload 
                        if (!empty ($_POST['upload'])) {

                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                            $temp = explode(".", $_FILES["file"]["name"]);
                            $extension = end($temp);
                            if ((($_FILES["file"]["type"] == "image/gif")
                            || ($_FILES["file"]["type"] == "image/jpeg")
                            || ($_FILES["file"]["type"] == "image/jpg")
                            || ($_FILES["file"]["type"] == "image/pjpeg")
                            || ($_FILES["file"]["type"] == "image/x-png")
                            || ($_FILES["file"]["type"] == "image/png"))
                            && ($_FILES["file"]["size"] < 1000000)
                            && in_array($extension, $allowedExts))
                              {
                              if ($_FILES["file"]["error"] > 0)
                                {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                                }
                              else
                                {
                                echo "<div> Upload: " . $_FILES["file"]["name"] . "<br>";

                                //set temp dir path
                                $path = "cms/";
                                $upload_dir = $path;    

                                  move_uploaded_file($_FILES["file"]["tmp_name"], $path."main.jpg");
                                  header("location: edit-home-content.php");

                
                                  }
                                }
                              }
                            else
                              {
                              echo "Invalid file";
                              }


                        
                           if (!empty ($_POST['client1'])) {

                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                            $temp = explode(".", $_FILES["file"]["name"]);
                            $extension = end($temp);
                            if ((($_FILES["file"]["type"] == "image/gif")
                            || ($_FILES["file"]["type"] == "image/jpeg")
                            || ($_FILES["file"]["type"] == "image/jpg")
                            || ($_FILES["file"]["type"] == "image/pjpeg")
                            || ($_FILES["file"]["type"] == "image/x-png")
                            || ($_FILES["file"]["type"] == "image/png"))
                            && ($_FILES["file"]["size"] < 1000000)
                            && in_array($extension, $allowedExts))
                              {
                              if ($_FILES["file"]["error"] > 0)
                                {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                                }
                              else
                                {
                                echo "<div> Upload: " . $_FILES["file"]["name"] . "<br>";

                                //set temp dir path
                                $path = "cms/";
                                $upload_dir = $path;    

                                  move_uploaded_file($_FILES["file"]["tmp_name"], $path."client1.png");
                                  header("location: edit-home-content.php");

                
                                  }
                                }
                              }
                            else
                              {
                              echo "Invalid file";
                              }      

                            //end upolad if  

                        if (!empty ($_POST['client2'])) {

                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                            $temp = explode(".", $_FILES["file"]["name"]);
                            $extension = end($temp);
                            if ((($_FILES["file"]["type"] == "image/gif")
                            || ($_FILES["file"]["type"] == "image/jpeg")
                            || ($_FILES["file"]["type"] == "image/jpg")
                            || ($_FILES["file"]["type"] == "image/pjpeg")
                            || ($_FILES["file"]["type"] == "image/x-png")
                            || ($_FILES["file"]["type"] == "image/png"))
                            && ($_FILES["file"]["size"] < 1000000)
                            && in_array($extension, $allowedExts))
                              {
                              if ($_FILES["file"]["error"] > 0)
                                {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                                }
                              else
                                {
                                echo "<div> Upload: " . $_FILES["file"]["name"] . "<br>";

                                //set temp dir path
                                $path = "cms/";
                                $upload_dir = $path;    

                                  move_uploaded_file($_FILES["file"]["tmp_name"], $path."client2.png");
                                  header("location: edit-home-content.php");

                
                                  }
                                }
                              }
                            else
                              {
                              echo "Invalid file";
                              }      

                        if (!empty ($_POST['client3'])) {

                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                            $temp = explode(".", $_FILES["file"]["name"]);
                            $extension = end($temp);
                            if ((($_FILES["file"]["type"] == "image/gif")
                            || ($_FILES["file"]["type"] == "image/jpeg")
                            || ($_FILES["file"]["type"] == "image/jpg")
                            || ($_FILES["file"]["type"] == "image/pjpeg")
                            || ($_FILES["file"]["type"] == "image/x-png")
                            || ($_FILES["file"]["type"] == "image/png"))
                            && ($_FILES["file"]["size"] < 1000000)
                            && in_array($extension, $allowedExts))
                              {
                              if ($_FILES["file"]["error"] > 0)
                                {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                                }
                              else
                                {
                                echo "<div> Upload: " . $_FILES["file"]["name"] . "<br>";

                                //set temp dir path
                                $path = "cms/";
                                $upload_dir = $path;    

                                  move_uploaded_file($_FILES["file"]["tmp_name"], $path."client3.png");
                                  header("location: edit-home-content.php");               
                                  }
                                }
                              }
                            else
                              {
                              echo "Invalid file";
                              }

                    if (!empty ($_POST['abtcover'])) {

                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                            $temp = explode(".", $_FILES["file"]["name"]);
                            $extension = end($temp);
                            if ((($_FILES["file"]["type"] == "image/gif")
                            || ($_FILES["file"]["type"] == "image/jpeg")
                            || ($_FILES["file"]["type"] == "image/jpg")
                            || ($_FILES["file"]["type"] == "image/pjpeg")
                            || ($_FILES["file"]["type"] == "image/x-png")
                            || ($_FILES["file"]["type"] == "image/png"))
                            && ($_FILES["file"]["size"] < 1000000)
                            && in_array($extension, $allowedExts))
                              {
                              if ($_FILES["file"]["error"] > 0)
                                {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                                }
                              else
                                {
                                echo "<div> Upload: " . $_FILES["file"]["name"] . "<br>";

                                //set temp dir path
                                $path = "cms/";
                                $upload_dir = $path;    

                                  move_uploaded_file($_FILES["file"]["tmp_name"], $path."abtcover.jpg");
                                  header("location: edit-about-content.php");                
                                  }
                                }
                              }
                            else
                              {
                              echo "Invalid file";
                              }

                    if (!empty ($_POST['team1'])) {

                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                            $temp = explode(".", $_FILES["file"]["name"]);
                            $extension = end($temp);
                            if ((($_FILES["file"]["type"] == "image/gif")
                            || ($_FILES["file"]["type"] == "image/jpeg")
                            || ($_FILES["file"]["type"] == "image/jpg")
                            || ($_FILES["file"]["type"] == "image/pjpeg")
                            || ($_FILES["file"]["type"] == "image/x-png")
                            || ($_FILES["file"]["type"] == "image/png"))
                            && ($_FILES["file"]["size"] < 1000000)
                            && in_array($extension, $allowedExts))
                              {
                              if ($_FILES["file"]["error"] > 0)
                                {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                                }
                              else
                                {
                                echo "<div> Upload: " . $_FILES["file"]["name"] . "<br>";

                                //set temp dir path
                                $path = "cms/";
                                $upload_dir = $path;    

                                  move_uploaded_file($_FILES["file"]["tmp_name"], $path."t1.png");
                                  header("location: edit-about-content.php");                
                                  }
                                }
                              }
                            else
                              {
                              echo "Invalid file";
                              }
                if (!empty ($_POST['team2'])) {

                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                            $temp = explode(".", $_FILES["file"]["name"]);
                            $extension = end($temp);
                            if ((($_FILES["file"]["type"] == "image/gif")
                            || ($_FILES["file"]["type"] == "image/jpeg")
                            || ($_FILES["file"]["type"] == "image/jpg")
                            || ($_FILES["file"]["type"] == "image/pjpeg")
                            || ($_FILES["file"]["type"] == "image/x-png")
                            || ($_FILES["file"]["type"] == "image/png"))
                            && ($_FILES["file"]["size"] < 1000000)
                            && in_array($extension, $allowedExts))
                              {
                              if ($_FILES["file"]["error"] > 0)
                                {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                                }
                              else
                                {
                                echo "<div> Upload: " . $_FILES["file"]["name"] . "<br>";

                                //set temp dir path
                                $path = "cms/";
                                $upload_dir = $path;    

                                  move_uploaded_file($_FILES["file"]["tmp_name"], $path."t2.png");
                                  header("location: edit-about-content.php");                
                                  }
                                }
                              }
                            else
                              {
                              echo "Invalid file";
                              }
                if (!empty ($_POST['team3'])) {

                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                            $temp = explode(".", $_FILES["file"]["name"]);
                            $extension = end($temp);
                            if ((($_FILES["file"]["type"] == "image/gif")
                            || ($_FILES["file"]["type"] == "image/jpeg")
                            || ($_FILES["file"]["type"] == "image/jpg")
                            || ($_FILES["file"]["type"] == "image/pjpeg")
                            || ($_FILES["file"]["type"] == "image/x-png")
                            || ($_FILES["file"]["type"] == "image/png"))
                            && ($_FILES["file"]["size"] < 1000000)
                            && in_array($extension, $allowedExts))
                              {
                              if ($_FILES["file"]["error"] > 0)
                                {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                                }
                              else
                                {
                                echo "<div> Upload: " . $_FILES["file"]["name"] . "<br>";

                                //set temp dir path
                                $path = "cms/";
                                $upload_dir = $path;    

                                  move_uploaded_file($_FILES["file"]["tmp_name"], $path."t3.png");
                                  header("location: edit-about-content.php");                
                                  }
                                }
                              }
                            else
                              {
                              echo "Invalid file";
                              }

                if (!empty ($_POST['contactcover'])) {

                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                            $temp = explode(".", $_FILES["file"]["name"]);
                            $extension = end($temp);
                            if ((($_FILES["file"]["type"] == "image/gif")
                            || ($_FILES["file"]["type"] == "image/jpeg")
                            || ($_FILES["file"]["type"] == "image/jpg")
                            || ($_FILES["file"]["type"] == "image/pjpeg")
                            || ($_FILES["file"]["type"] == "image/x-png")
                            || ($_FILES["file"]["type"] == "image/png"))
                            && ($_FILES["file"]["size"] < 1000000)
                            && in_array($extension, $allowedExts))
                              {
                              if ($_FILES["file"]["error"] > 0)
                                {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                                }
                              else
                                {
                                echo "<div> Upload: " . $_FILES["file"]["name"] . "<br>";

                                //set temp dir path
                                $path = "cms/";
                                $upload_dir = $path;    

                                  move_uploaded_file($_FILES["file"]["tmp_name"], $path."contactcover.jpg");
                                  header("location: edit-contact-content.php");                
                                  }
                                }
                              }
                            else
                              {
                              echo "Invalid file";
                              }

                if (!empty ($_POST['pimg1'])) {

                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                            $temp = explode(".", $_FILES["file"]["name"]);
                            $extension = end($temp);
                            if ((($_FILES["file"]["type"] == "image/gif")
                            || ($_FILES["file"]["type"] == "image/jpeg")
                            || ($_FILES["file"]["type"] == "image/jpg")
                            || ($_FILES["file"]["type"] == "image/pjpeg")
                            || ($_FILES["file"]["type"] == "image/x-png")
                            || ($_FILES["file"]["type"] == "image/png"))
                            && ($_FILES["file"]["size"] < 1000000)
                            && in_array($extension, $allowedExts))
                              {
                              if ($_FILES["file"]["error"] > 0)
                                {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                                }
                              else
                                {
                                echo "<div> Upload: " . $_FILES["file"]["name"] . "<br>";

                                //set temp dir path
                                $path = "cms/";
                                $upload_dir = $path;    

                                  move_uploaded_file($_FILES["file"]["tmp_name"], $path."img1.jpg");
                                  header("location: edit-portfolio-content.php");                
                                  }
                                }
                              }
                            else
                              {
                              echo "Invalid file";
                              }  

              if (!empty ($_POST['pimg2'])) {

                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                            $temp = explode(".", $_FILES["file"]["name"]);
                            $extension = end($temp);
                            if ((($_FILES["file"]["type"] == "image/gif")
                            || ($_FILES["file"]["type"] == "image/jpeg")
                            || ($_FILES["file"]["type"] == "image/jpg")
                            || ($_FILES["file"]["type"] == "image/pjpeg")
                            || ($_FILES["file"]["type"] == "image/x-png")
                            || ($_FILES["file"]["type"] == "image/png"))
                            && ($_FILES["file"]["size"] < 1000000)
                            && in_array($extension, $allowedExts))
                              {
                              if ($_FILES["file"]["error"] > 0)
                                {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                                }
                              else
                                {
                                echo "<div> Upload: " . $_FILES["file"]["name"] . "<br>";

                                //set temp dir path
                                $path = "cms/";
                                $upload_dir = $path;    

                                  move_uploaded_file($_FILES["file"]["tmp_name"], $path."img2.jpg");
                                  header("location: edit-portfolio-content.php");                
                                  }
                                }
                              }
                            else
                              {
                              echo "Invalid file";
                              }  
              if (!empty ($_POST['pimg3'])) {

                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                            $temp = explode(".", $_FILES["file"]["name"]);
                            $extension = end($temp);
                            if ((($_FILES["file"]["type"] == "image/gif")
                            || ($_FILES["file"]["type"] == "image/jpeg")
                            || ($_FILES["file"]["type"] == "image/jpg")
                            || ($_FILES["file"]["type"] == "image/pjpeg")
                            || ($_FILES["file"]["type"] == "image/x-png")
                            || ($_FILES["file"]["type"] == "image/png"))
                            && ($_FILES["file"]["size"] < 1000000)
                            && in_array($extension, $allowedExts))
                              {
                              if ($_FILES["file"]["error"] > 0)
                                {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                                }
                              else
                                {
                                echo "<div> Upload: " . $_FILES["file"]["name"] . "<br>";

                                //set temp dir path
                                $path = "cms/";
                                $upload_dir = $path;    

                                  move_uploaded_file($_FILES["file"]["tmp_name"], $path."img3.jpg");
                                  header("location: edit-portfolio-content.php");                
                                  }
                                }
                              }
                            else
                              {
                              echo "Invalid file";
                              }  
              if (!empty ($_POST['pimg4'])) {

                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                            $temp = explode(".", $_FILES["file"]["name"]);
                            $extension = end($temp);
                            if ((($_FILES["file"]["type"] == "image/gif")
                            || ($_FILES["file"]["type"] == "image/jpeg")
                            || ($_FILES["file"]["type"] == "image/jpg")
                            || ($_FILES["file"]["type"] == "image/pjpeg")
                            || ($_FILES["file"]["type"] == "image/x-png")
                            || ($_FILES["file"]["type"] == "image/png"))
                            && ($_FILES["file"]["size"] < 1000000)
                            && in_array($extension, $allowedExts))
                              {
                              if ($_FILES["file"]["error"] > 0)
                                {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                                }
                              else
                                {
                                echo "<div> Upload: " . $_FILES["file"]["name"] . "<br>";

                                //set temp dir path
                                $path = "cms/";
                                $upload_dir = $path;    

                                  move_uploaded_file($_FILES["file"]["tmp_name"], $path."img4.jpg");
                                  header("location: edit-portfolio-content.php");                
                                  }
                                }
                              }
                            else
                              {
                              echo "Invalid file";
                              }  
  echo "<a href='index.php'>go back to homepage</a>";                            

                    ?>