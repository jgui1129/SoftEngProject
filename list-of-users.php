<?php

  include_once("header.php");
  include_once("navigation.php");
  include_once("adminsidebar.php");
  include_once("connection.php");
  echo '<div id="page-content-wrapper">';
   echo '<div data-aos="fade-up" data-aos-duration="1500">';
  $sql = "SELECT * FROM registration";
  $result = mysqli_query($conn,$sql);
  $count = mysqli_affected_rows($conn);

  echo '<h1>List of Users <small>('.$count.')</small></h1>
  <table class="table table-hover table-striped table-bordered" >
  <tr>
    <th>Username</th>
    <th>Name</th>
    <th>Contact Number</th>
    <th>Email</th>
    <th>Address</th>
    <th>Delete</th></tr>
  ';


  while ($row = mysqli_fetch_array($result)) {
    echo '<tr>
    <td>'.$row["USERNAME"].'</td>
    <td>'.$row["FULLNAME"].'</td>
    <td>'.$row["PCONTACT"].'</td>
    <td>'.$row["EMAIL"].'</td>
    <td>'.$row["ADDRESS"].'</td>
    <td><a href="ajax.php?deleteUser='.$row["ID"].'" class="btn btn-danger btn-sm">Delete</a></td>';
  }

?>

  

<?php
  include_once('footeradmin.php');
?>