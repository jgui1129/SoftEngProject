<?php 
include_once("header.php");
    include_once("navigation.php");
    include_once("clientsidebar.php");
    include_once('connection.php');
    include_once("custom.php");
 ?>

 <div id="page-content-wrapper">

  <h2>FAQs</h2>
<p>Welcome to OME Event Creatives,  dear client!</p>
<button class="accordion">How to <strong>Make A Reservation</strong>?</button>
<div class="panel">
  <h4>Just click on the reservation tab on the top and reserve your desired event.</h4>
</div>

<button class="accordion">Why do I need to register?</button>
<div class="panel">
  <h4>We need proof! Nah, but to be honest, we really need to authenticate if your legit with your reservation. If you are then no problem, we can all get along with our lives and help you make one wonderful event but if you're just pranking we'll need your details and to agree on our terms.</h4>
  <h4><a href="registration.php">Registration</a> is as easy as reserving so don't worry about taking up too much time.</h4>
  </div>
</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}
</script>