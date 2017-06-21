
<?php 
include_once("header.php");
    include_once("navigation.php");
    include_once("adminsidebar.php");
    include_once('connection.php');
    include_once("custom.php");
 ?>
 <div id="page-content-wrapper">

  <h2>FAQs</h2>
<p>Hey there admin! To better experience your website read all these FAQs for a quick refresher or beginner's tutorial.</p>
<button class="accordion">How to use the <strong>Dashboard</strong> Feature?</button>
<div class="panel">
  <h4>The <strong>Admin dashboard</strong> displays all the necessary stuffs that you, the admin, needs to manage and monitor the overall workflow. </h4>
  <h4>Here you'll see the important tools like <strong><a href="dashboard.php">Dashboard</a></strong>, <strong>Statistics</strong>, and <strong>Event Tables.</strong></h4>
  <h4>Small but useful features include <em>To-do List</em>, <em>and <a href="send-message.php">sending SMS</a></em>.</h4>
  <h3>To put it short, its a little bit of everything our team has included for you.</h3>
</div>
<button class="accordion">How to use the <strong>Calendar</strong> Feature?</button>
<div class="panel">
  <h4>To maximize the your business' capabilities we've made sure that the calendar feature is up to date and easy to manage.</h4>
  <h4>All of the features of the calendar are: <a href="add.php">ADD</a> and <a href="delete-event.php">DELETE</a>. Based on your specifications, we've designed this feature to fit the shoe -your shoe, of course.</h4>
</div>

<button class="accordion">How to use the <strong>Tasking</strong> Feature</button>
<div class="panel">
 <h4>Based on client specifications, we made the Tasking feature more natural to you. Presets of rows are ready for you to fill up and print! It saves huuuuge amount of time compared to going back and forth in excel to word to whatever other apps.</h4>
 <h4><a href="http://localhost/SoftEng/display.php?val=asdasd asdad">Here!</a>
 This was one of your lists. Try to Add, Save or Print your task table and be amazed!</h4>
</div>

<button class="accordion">How to use the <strong>Contacts</strong> Feature</button>
<div class="panel">
  <h4>As previously seen from the <a href="dashboard.php">dashboard</a>, the <strong>Contacts</strong> feature makes it easier to navigate through your added contacts and send messages or emails to a client. You can add directly or delete if its <em>"that kind of client"</em> again. </h4>
</div>

<button class="accordion">How to use the <strong>CMS</strong> Feature</button>
<div class="panel">
  <h4>CMS stands for <strong>Content Management System</strong> which means you have control over your content! We made the <strong><a href="index.php">HOME</a></strong> Page completely CMS! Here, <a href="edithome.php">try</a> changing the cover photo to something more OME.</h4>
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
