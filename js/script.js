
    $(document).ready(function() {

      $(".slider").slider().slider("pips");
      $("eye").on("click", function () {
          if (pwShown == 0) {
              pwShown = 1;
              show();
          } else {
              pwShown = 0;
              hide();
          }
      }, false);


        $('#calendar').fullCalendar('render');

        $('#calendar').fullCalendar({
              header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
              },
              navLinks: true, // can click day/week names to navigate views
              editable: false,
              eventLimit: true, // allow "more" link when too many events 
              events:   'eventList.php',
              displayEventTime: false,
          });


        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    });

 
function getAttendee(count){

  document.getElementById("attendee1").value = count;
  document.getElementById("attendee").innerHTML = count;
  document.getElementById("attendee2").value = count;
  document.getElementById('totalPrice1').innerHTML = temp;
  var totalPrice = parseInt(document.getElementById('totalPrice').innerHTML);
  var temp = parseInt(document.getElementById('finalValue').innerHTML);


  if (count >= 100){

      var temp1 = document.getElementById('totalPrice').innerHTML = numberWithCommas((temp + (count - 100)*400).toFixed(2));

  }

}


function checkPassword(){
  var pw = $("#regpassword").val();
  var pw1 = $("#regpassword1").val();

  if (pw != pw1){
    $(".paswordMismatch").show(500);
  }else {
    $(".paswordMismatch").hide(500);
    validate($("#regpassword1"));
  }

}


  function checkIfUsernameExist(){

    var username = $("#regusername").val();

    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){

      if (xhr.readyState == 4 && xhr.status == 200){
          var x = xhr.responseText;

          if (x == "true"){
              $(".usernameExist").show(500);
          }else{
              $(".usernameExist").hide(500);
              validate($("#regusername"));
          }

      }
    }
    xhr.open("GET","ajax.php?checkIfExist="+username,true);
    xhr.send()
  }


  function checkIfEmailExist(){

    var em = $("#email").val();

    if (!validateEmail(em) || em == "") {
      $(".emailExist").html("Please enter a valid email address");
      $(".emailExist").show(500);
    }else {


    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){

      if (xhr.readyState == 4 && xhr.status == 200){
          var x = xhr.responseText;
          console.log(xhr.responseText);
          if (x == "true"){
              $(".emailExist").html("Email already exist.");
              $(".emailExist").show(500);
          }else{
              $(".emailExist").hide(500);
              validate($("#email"));
          }

      }
    }
    xhr.open("GET","ajax.php?checkIfEmailExist="+em,true);
    xhr.send()


  }
}

function toggleItem(item){

   var x = $(item); 
   x.toggleClass('remove');
   x.next().children('li').toggleClass('remove');
   x.find('span').toggleClass('item');
   customizePackage();

}

function toggleItem1(item){

   var x = $(item); 
   x.toggleClass('remove');
   x.next().children('li').toggleClass('remove');
   x.find('span').toggleClass('item1');
   customizePackage();

}

function toggleItem2(item){

   var x = $(item); 
   x.toggleClass('remove');
   x.next().children('li').toggleClass('remove');
   x.find('span').toggleClass('item2');
   customizePackage();

}

function toggleItem3(item){

   var x = $(item); 
   x.toggleClass('remove');
   x.next().children('li').toggleClass('remove');
   x.find('span').toggleClass('item3');
   customizePackage();

}

function toggleItem4(item){

   var x = $(item); 
   x.toggleClass('remove');
   x.next().children('li').toggleClass('remove');
   x.find('span').toggleClass('item4');
   customizePackage();

}

function toggleItem5(item){

   var x = $(item); 
   x.toggleClass('remove');
   x.next().children('li').toggleClass('remove');
   x.find('span').toggleClass('item5');
   customizePackage();

}


function toggleItem6(item){

   var x = $(item); 
   x.toggleClass('remove');
   x.next().children('li').toggleClass('remove');
   x.find('span').toggleClass('item6');
   customizePackage();

}

function toggleItem7(item){

   var x = $(item); 
   x.toggleClass('remove');
   x.next().children('li').toggleClass('remove');
   x.find('span').toggleClass('item7');
   customizePackage();

}

function toggleItem8(item){

   var x = $(item); 
   x.toggleClass('remove');
   x.next().children('li').toggleClass('remove');
   x.find('span').toggleClass('item8');
   customizePackage();

}

function toggleItem9(item){

   var x = $(item); 
   x.toggleClass('remove');
   x.next().children('li').toggleClass('remove');
   x.find('span').toggleClass('item9');
   customizePackage();

}

function toggleItem10(item){

   var x = $(item); 
   x.toggleClass('remove');
   x.next().children('li').toggleClass('remove');
   x.find('span').toggleClass('item10');
   customizePackage();

}

function toggleItem11(item){

   var x = $(item); 
   x.toggleClass('remove');
   x.next().children('li').toggleClass('remove');
   x.find('span').toggleClass('item11');
   customizePackage();

}

function toggleItem12(item){

   var x = $(item); 
   x.toggleClass('remove');
   x.next().children('li').toggleClass('remove');
   x.find('span').toggleClass('item12');
   customizePackage();

}


function getTotal(){

    var session = $('#userLogIn').text();
    if (session == ""){
    $('#needToRegister').modal('show');
    $('#reserve2').css("display","none");

  }else{
    $('#reserve2').css("display","");
    temp = document.getElementById('totalPrice').innerHTML;
    document.getElementById('totalPrice1').innerHTML = temp;
    $("#package-name").html($("#package").html());
  }

}

   $("#btnPrint").printPreview({
                obj2print:'.invoice',
                top: 0,
                title: "OME | Ocassion Made Easy"
    });


function save(){

  $('.getItem').find('span').remove();
  $('.remove').css("display","none");
  $('#inclusion').html("");
  $('.selector').attr('onclick','').unbind('click');
  $('.getItem li').removeClass('canRemove');
  $('.getItem li').removeClass('selector');
  $('.remove').removeClass('.remove');
  var content = "";

  var x = $('.getItem').children().each(function(index){

    content = content + $(this).html();

  });

  $("#finalPriceToSave").val($('#totalPrice').text());
  $("#orderDetails").html(content);
  $("#packageType").val($("#package").text());

}


function custom(){

  var session = $('#userLogIn').text();
  if (session == ""){
    $('#needToRegister').modal('show');

  }else{

    $('span').toggleClass('showItem');
    $('.selector').toggleClass('canRemove');
    $('span').toggleClass('hidden');
    $('.selector').toggleClass('disabled');
    }
}

function kidsPackage(count){

  alert(count);

}

function customizePackage(){

    
    var itemTotal = document.querySelectorAll(".item");
    var item1Total = document.querySelectorAll(".item1");
    var item2Total = document.querySelectorAll(".item2");
    var item3Total = document.querySelectorAll(".item3");
    var item4Total = document.querySelectorAll(".item4");
    var item5Total = document.querySelectorAll(".item5");
    var item6Total = document.querySelectorAll(".item6");
    var item7Total = document.querySelectorAll(".item7");
    var item8Total = document.querySelectorAll(".item8");
    var item9Total = document.querySelectorAll(".item9");
    var item10Total = document.querySelectorAll(".item10");
    var item11Total = document.querySelectorAll(".item11");
    var item12Total = document.querySelectorAll(".item12");
    var total = 0; var total1 = 0; var total2 = 0; var total3 = 0; var total4 = 0; var total5 = 0;
    var total6 = 0; var total7 = 0; var total8 = 0; var total9 = 0; var total10 = 0; var total11 = 0;
    var total12 = 0;

    for(var i=0; i<itemTotal.length; i++){
        total = total + parseInt(document.querySelectorAll(".item")[i].innerHTML); 
        
    }

    for(i=0; i<item1Total.length; i++){
        total1 = total1 + parseInt(document.querySelectorAll(".item1")[i].innerHTML); 
        
    }

    for(i=0; i<item2Total.length; i++){
        total2 = total2 + parseInt(document.querySelectorAll(".item2")[i].innerHTML); 

    }

    for(i=0; i<item3Total.length; i++){
        total3 = total3 + parseInt(document.querySelectorAll(".item3")[i].innerHTML); 

    }


    for(i=0; i<item4Total.length; i++){
        if (total4 == 5000){
          total4 = 0;  
        }else{
          total4 = 5000;
        }
      
    }

    for(i=0; i<item5Total.length; i++){
        total5 = total5 + parseInt(document.querySelectorAll(".item5")[i].innerHTML); 

    }

    for(i=0; i<item6Total.length; i++){
        total6 = total6 + parseInt(document.querySelectorAll(".item6")[i].innerHTML); 

    }
    for(i=0; i<item7Total.length; i++){
        total7 = total7 + parseInt(document.querySelectorAll(".item7")[i].innerHTML); 

    }
    for(i=0; i<item8Total.length; i++){
        total8 = total8 + parseInt(document.querySelectorAll(".item8")[i].innerHTML); 

    }
    for(i=0; i<item9Total.length; i++){
        total9 = total9 + parseInt(document.querySelectorAll(".item9")[i].innerHTML); 

    }

    for(i=0; i<item10Total.length; i++){
        if (total10 == 4000){
          total10 = 0;  
        }else{
          total10 = 4000;
        }
      
    }

    for(i=0; i<item11Total.length; i++){
        if (total11 == 5500){
          total11 = 0;  
        }else{
          total11 = 5500;
        }
      
    }

    for(i=0; i<item12Total.length; i++){
        if (total12 == 10500){
          total12 = 0;  
        }else{
          total12 = 10500;
        }
      
    }

    var package = document.getElementById('package').innerHTML;
    if (package == "Debut Package"){
      
    var a = document.getElementById("itemTotal").innerHTML = total;
    var b = document.getElementById("item1Total").innerHTML = total1;
    var c = document.getElementById("item2Total").innerHTML = total2;
    var d = document.getElementById("item3Total").innerHTML = total3;
    var e = document.getElementById("item4Total").innerHTML = total4;
    var f = document.getElementById("item5Total").innerHTML = total5;

    var finalTotal = a+b+c+d+e+f;

    if (finalTotal <= 20000){
          document.getElementById("reservebtn").disabled = true;
          $("#event-modal").modal("show");
        }else{
           document.getElementById("reservebtn").disabled = false;
        }

    }else if (package == "Wedding Package"){

    var a = document.getElementById("itemTotal").innerHTML = total;
    var b = document.getElementById("item1Total").innerHTML = total1;
    var c = document.getElementById("item2Total").innerHTML = total2;
    var d = document.getElementById("item3Total").innerHTML = total3;
    var e = document.getElementById("item4Total").innerHTML = total4;
    var f = document.getElementById("item5Total").innerHTML = total5;
    var g = document.getElementById("item6Total").innerHTML = total6;
    var h = document.getElementById("item7Total").innerHTML = total7;
    var i = document.getElementById("item8Total").innerHTML = total8;
    var j = document.getElementById("item9Total").innerHTML = total9;
    var finalTotal = a+b+c+d+e+f+g+h+i+j;
      if (finalTotal <= 100000){
          document.getElementById("reservebtn").disabled = true;
          $("#event-modal").modal("show");
        }else{
           document.getElementById("reservebtn").disabled = false;
        }
    }else if(package == "Kiddie Package"){

    var a = document.getElementById("itemTotal").innerHTML = total;
    var b = document.getElementById("item10Total").innerHTML = total10;
    var c = document.getElementById("item11Total").innerHTML = total11;
    var d = document.getElementById("item12Total").innerHTML = total12;
    var finalTotal = a+b+c+d;

      if (finalTotal <= 20000){
        document.getElementById("reservebtn").disabled = true;
        $("#event-modal").modal("show");
      }else{
         document.getElementById("reservebtn").disabled = false;
      }

    }



    var count = document.getElementById("attendee1").value;
    if (count > 100){

      var sum = (count - 100)*400;
      finalTotal+=sum;
    }

    finalTotal += parseInt($("#additionalHours").val());
    finalTotal += parseInt($("#selectVenue").val());
    if ($("#selectVenue").val() == "00" || $("#selectVenue").val() == "5000") {
      
    }else {
      finalTotal += parseInt($("input[name=venueDistance]:checked").val());
    }

    document.getElementById('totalPrice').innerHTML = numberWithCommas(finalTotal.toFixed(2));
    document.getElementById('finalValue').innerHTML = finalTotal;
    document.getElementById('totalPrice1').innerHTML = numberWithCommas(finalTotal.toFixed(2));

} 


  function incorrectPassword(){
    alert("incorrectPassword");
  }

  
  var disableddates = [];

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if (xhr.readyState == 4 && xhr.status == 200) {

        disableddates = xhr.responseText;

    }
  }
  xhr.open("GET","datesUnavailable.php",true);
  xhr.send();



function DisableSpecificDates(date) {
    var string = jQuery.datepicker.formatDate('yy-m-d', date);
    return [disableddates.indexOf(string) == -1];
  }


$(function() {
            $( "#dateToReserve" ).datepicker({
              beforeShowDay: DisableSpecificDates,
              minDate: 14,
              dateFormat: "yy-m-d"
            });
         });

$(function() {
            $( "#dateToReserve1" ).datepicker({
              minDate: 14,
              dateFormat: "yy-m-d"
            });
         });

$(function() { 
    $('#timeIn').timepicker({
       'minTime': '6:00am',
       'maxTime': '8:00pm',
    }) });


        $(document).on('show.bs.modal', '.modal', function (event) {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        });

//to do notes

  
    add_task(); // Call the add_task function
    delete_task(); // Call the delete_task function

    function add_task() {

      $('.add-new-task').submit(function(){

        var new_task = $('.add-new-task input[name=new-task]').val();

        if(new_task != ''){

          $.post('includes/add-task.php', { task: new_task }, function( data ) {

            $('.add-new-task input[name=new-task]').val('');

            $(data).appendTo('.task-list ul').hide().fadeIn();

            delete_task();
          });
        }

        return false; // Ensure that the form does not submit twice
      });
    }

    function delete_task() {

      $('.delete-button').click(function(){

        var current_element = $(this);

        var id = $(this).attr('id');

        $.post('includes/delete-task.php', { task_id: id }, function() {

          current_element.parent().fadeOut("fast", function() { $(this).remove(); });
        });
      });
    }


  function displayContact(){

    var contactContent = $("#displayContact").val();

    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
      if (xhr.status == 200 && xhr.readyState == 4) {
          $("#displayContactDiv").html(xhr.responseText);
          $("#successAdded").hide();
      }
    }
    xhr.open("GET","ajax.php?content="+contactContent,true);
    xhr.send();

  }

  function addToContacts(){

      var contactName = $("#contactName").val();
      var contactPhone = $("#contactPhone").val();
      var contactEmail = $("#contactEmail").val();

      if (contactName == "" || contactPhone == "" || contactEmail == "" ) {

          $('#successAdded').html("Please fill all the contact fields.").attr("class","alert-danger");
          $("#successAdded").show();

      }else {

        xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
          if (xhr.status == 200 && xhr.readyState == 4) {
              
              $("#successAdded").html("Successfully added...").attr("class","alert alert-success");
              $("#successAdded").show();
              var contactName = $("#contactName").val("");
              var contactPhone = $("#contactPhone").val("");
              var contactEmail = $("#contactEmail").val("");
              displayContact();
          }
        }
        xhr.open("GET","ajax.php?name="+contactName+"&phone="+contactPhone+"&email="+contactEmail,true);
        xhr.send();      

      }

      
  }


  function setSession(){

       var username = $("#username").val();
       xhr = new XMLHttpRequest();
       xhr.open("GET","ajax.php?data="+username,true);
       xhr.send();     

  }


function showHide() {

    var pw = $("#pwd");
    if (pw.get(0).type=='password'){
      pw.get(0).type = 'text';
    }else {
      pw.get(0).type = 'password';
    }
}

function displayDetails(id) {
  
  xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){

    if (xhr.status == 200 && xhr.readyState == 4) {
        $("#displayDetails").html(xhr.responseText);
        console.log(xhr.responseText);
    }

  }
  xhr.open("GET","display-event-details.php?id="+id,true);
  xhr.send();

}

function cancelEvent(id){

  xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){

          if (xhr.status == 200 && xhr.readyState == 4) {

            $("#changeContentModal").fadeOut(500,function(){
                $(this).html(xhr.responseText);
                $("#changeContentModal").fadeIn(500);
            });
          }

  }

  xhr.open("GET","ajax.php?eventToCancel="+id,true);
  xhr.send();


}

function updateInformation(){

  var id  = $("#updateId").text();
  var name = $("#updateuserName").val();
  var pcontact = $("#updateuserpContact").val();
  var acontact = $("#updateuseraContact").val();
  var address = $("#updateuserAddress").val();
  var em = $("#updateuserEmail").val();
  var un = $("#updateuserUsername").val();
  var pw = $("#updateuserPassword").val();



  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if (xhr.status == 200 && xhr.readyState == 4) {
      alert("Successfully updated");
    }
  }
  xhr.open("GET","ajax.php?id="+id+"&updateName="+name+"&updatepcontact="+pcontact+"&updateacontact="+acontact+"&updateEmail="+em+"&updateAddress="+address);
  xhr.send();



}


function displayUpcoming(){

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){

    if (xhr.status == 200 && xhr.readyState == 4) {

      $("#reservationDiv").fadeOut("slow",function(){
          $(this).html(xhr.responseText);
          $("#reservationDiv").fadeIn("slow");
      });

    }

  }
  xhr.open("GET","ajax.php?displayUpcoming=approved");
  xhr.send();

}

function displayPending(){

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){

    if (xhr.status == 200 && xhr.readyState == 4) {

      $("#reservationDiv").fadeOut("slow",function(){
          $(this).html(xhr.responseText);
          $("#reservationDiv").fadeIn("slow");
      });

    }

  }
  xhr.open("GET","ajax.php?displayPending=approved");
  xhr.send();

}

function displayCompleted(){

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){

    if (xhr.status == 200 && xhr.readyState == 4) {

      $("#reservationDiv").fadeOut("slow",function(){
          $(this).html(xhr.responseText);
          $("#reservationDiv").fadeIn("slow");
      });

    }

  }
  xhr.open("GET","ajax.php?displayCompleted=approved");
  xhr.send();

}

function displayDissaproved(){

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){

    if (xhr.status == 200 && xhr.readyState == 4) {

      $("#reservationDiv").fadeOut("slow",function(){
          $(this).html(xhr.responseText);
          $("#reservationDiv").fadeIn("slow");
      });

    }

  }
  xhr.open("GET","ajax.php?displayDissaproved=approved");
  xhr.send();

}


function displayAll(){

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){

    if (xhr.status == 200 && xhr.readyState == 4) {

      $("#reservationDiv").fadeOut("slow",function(){
          $(this).html(xhr.responseText);
          $("#reservationDiv").fadeIn("slow");
      });

    }

  }
  xhr.open("GET","ajax.php?displayAll=approved");
  xhr.send();

}

function displayCancel(){

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){

    if (xhr.status == 200 && xhr.readyState == 4) {

      $("#reservationDiv").fadeOut("slow",function(){
          $(this).html(xhr.responseText);
          $("#reservationDiv").fadeIn("slow");
      });

    }

  }
  xhr.open("GET","ajax.php?displayCancel=approved");
  xhr.send();

}


  function login() {

      var un = $("#username").val().toLowerCase();
      var pw = $("#password").val().toLowerCase();

       xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
          if (xhr.status == 200 && xhr.readyState == 4) {

              var response = xhr.responseText;
              if (response == "denied"){
                $("#loginMessage").show(300);
              }else if(response == "acceptedadmin"){
                setSession();
                window.location.replace("redirect.php?user=admin");
              }else{
                setSession();
                window.location.replace("redirect.php?user=user");
              }   
          }
        }
        xhr.open("GET","ajax.php?user="+un+"&pass="+pw,true);
        xhr.send();      

  } 

  function hideAlert() {
    $("#loginMessage").hide(300);
  }

  function deleteEvent(id){

    var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function(){
          if (xhr.status == 200 && xhr.readyState == 4) {

            $("#changeContentModal").fadeOut(500,function(){
                $(this).html(xhr.responseText);
                $("#changeContentModal").fadeIn(500);
            });
          }
        }
      xhr.open("GET","ajax.php?deleteReservation="+id,true);
      xhr.send();      

  }

    function deleteAddedEvent(id){

    var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function(){
          if (xhr.status == 200 && xhr.readyState == 4) {

            $("#changeContentModal").fadeOut(500,function(){
                $(this).html(xhr.responseText);
                $("#changeContentModal").fadeIn(500);
            });
          }
        }
      xhr.open("GET","ajax.php?deleteAddedEvents="+id,true);
      xhr.send();      

  }

  function updateModalValue(id){
    $("#modalValue").val(id);
  }

  function sendSms(){

      var smsNumber = $("#sms").val();
      var message = $("#message").val();
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function(){
          if (xhr.status == 200 && xhr.readyState == 4) {
            if (xhr.responseText == "sent") {
                $("#messagealert").html("Messae successfully sent!");
                $("#messagealert").show(500);
            }
          }
      xhr.open("GET","ajax.php?sms="+smsNumber+"&message="+message,true);
      xhr.send();      

  }
}
  function removeMessageAlert(){
    $("#messagealert").hide(500);
  }

  function deleteContact(x){

      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function(){
          if (xhr.status == 200 && xhr.readyState == 4) {
            displayContact();
          }
        }
      xhr.open("GET","ajax.php?deleteFromContacts="+x,true);
      xhr.send();      

  }


  function validate(val) {

    $("#regMissingAlert").hide(500);
    var x = $(val);
    console.log(x);
    if (x.val() == ""){
      x.addClass('missing');
    }else {
      x.removeClass('missing');
    }
  }

function registerAccount(){

    var rname = $("#name").val();
    var rpcontact = $("#pnumber").val();
    var racontact = $("#anumber").val();
    var remail = $("#email").val();
    var raddress = $("#address").val();
    var rusername = $("#regusername").val();
    var rpass = $("#regpassword").val();
    var rpass1= $("#regpassword1").val();
    var terms = $('#agreeTerms').is(':checked'); 


    if (rname == "" || rpcontact == "" || racontact == "" || remail == "" || raddress == "" || rusername == "" || rpass == "" || rpass1 == "") {


        $("#regMissingAlert").show(500);

        if (rname == ""){
          $("#name").addClass("missing");
        }else {
          $("#name").removeClass("missing");
        }

        if (rpcontact == ""){
          $("#pnumber").addClass("missing");
        }else {
          $("#pnumber").removeClass("missing");
        }

        if (racontact == ""){
          $("#anumber").addClass("missing");
        }else {
          $("#anumber").removeClass("missing");
        }


        if (remail == ""){
          $("#email").addClass("missing");
        }else {
          $("#email").removeClass("missing");
        }


        if (raddress == ""){
          $("#address").addClass("missing");
        }else {
          $("#address").removeClass("missing");
        }


        if (rusername == ""){
          $("#regusername").addClass("missing");
        }else {
          $("#regusername").removeClass("missing");
        }

        if (rpass == ""){
          $("#regpassword").addClass("missing");
        }else {
          $("#regpassword").removeClass("missing");
        }

        if (rpass1 == ""){
          $("#regpassword1").addClass("missing");
        }else {
          $("#regpassword1").removeClass("missing");
        }

     }else if (rpass != rpass1) {

        $("#regMissingAlert").html("Password mismatch.");
        $("#regMissingAlert").show(500);
        $("#regMissingAlert").delay(3000).hide(500);

  }else if (terms == false) {
        $("#regMissingAlert").removeClass("alert-danger");
        $("#regMissingAlert").addClass("alert-info");
        $("#regMissingAlert").html("You must agree the terms and agreement.");
        $("#regMissingAlert").show(500);
        $("#regMissingAlert").delay(3000).hide(500);

}else {
      
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function(){
          if (xhr.status == 200 && xhr.readyState == 4) {
                
                $("#regMissingAlert").removeClass("alert-danger");
                $("#regMissingAlert").removeClass("alert-info");
                $("#regMissingAlert").addClass("alert-success");
                $("#regMissingAlert").html("Account Successfully Registered. Click <button class='btn btn-info btn-sm' data-toggle='modal' data-target='#login-modal'>here</button> to login.");
                $("#regMissingAlert").show(500);
          }
        }
      xhr.open("GET","ajax.php?rname="+rname+"&rpcontact="+rpcontact+"&racontact="+racontact+"&remail="+remail+"&raddress="+raddress+"&rusername="+rusername+"&rpass="+rpass,true);
      xhr.send();
    
    }
}

function displayVenueOption(){

    var venue = $("#selectVenue").val();
    if (venue == "0") {
      $("#customVenue").show(500);
    }else{
      $("#customVenue").hide(500);
      $('.venueDistance').attr('checked',false);
      $('#default').attr('checked', true);
    }

    if (venue == "00"){
      $("#reservation-alert").show(500);
    }else{
      $("#reservation-alert").hide(500);
    }
    customizePackage();

}

function forgotPassword() {

  var em = $("#emailInput").val();

  if (!validateEmail(em) || em == "") {
    $("#emAlert").show(500);
  }else {

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){

    if (xhr.readyState == 1 || xhr.readyState == 2 || xhr.readyState == 3) {
      $("#emAlert").removeClass("alert-danger");
      $("#emAlert").addClass("alert-info");
      $("#emAlert").html("Sending your password. Please wait");
      $("#emAlert").show(500);
    }

    else if (xhr.status == 200 && xhr.readyState == 4) {

      if (xhr.responseText == "false"){
        $("#emAlert").removeClass("alert-info");
        $("#emAlert").addClass("alert-danger");
        $("#emAlert").html("Email not found. Either this email is not registerd or has some typo error. Please re-check your email.");
        $("#emAlert").show(500);

      }else {
        $("#emAlert").removeClass("alert-info");
        $("#emAlert").addClass("alert-success");
        $("#emAlert").html("Password was sent to your email. Please check  your email for the details. Thank you for using OME | Event Services.");
        $("#emAlert").show(500);
      }
    }

  }
  xhr.open("GET","ajax.php?retrieveEmail="+em,true);
  xhr.send();

  }
}

function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}

function submitRemarks() {
  var remarks = $("#remarks").val();
  var id = $("#dataToGet").val();
  var arr = id.split('*');
  var idx = arr[0];
  var cname = arr[1];

      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function(){

          if (xhr.readyState == 1 || xhr.readyState == 2 || xhr.readyState == 3) {

                 $("#mbody").fadeOut("slow",function(){
                    $(this).html("Sending details to client. Please wait...");
                    $("#mbody").fadeIn("slow");
                });

                $("mfoot").fadeOut("slow");


          }

          else if (xhr.status == 200 && xhr.readyState == 4) {
                console.log(xhr.responseText);
                $("#mbody").fadeOut("slow",function(){
                    $(this).html("<b>Event Successfully Cancelled. Notification was also sent to the client.</b>");
                    $("#mfoot").html('<button type="button" class="btn btn-default" data-dismiss="modal" onclick="refresh()">Close</button>');
                    $("#mbody").fadeIn("slow");
                });

          }
        }
      xhr.open("GET","ajax.php?dissaproveId="+idx+"&remarks="+remarks+"&cname="+cname,true);
      xhr.send();
    
    }

function getDataModal(x){
  $("#dataToGet").val(x);
}

function refresh() {
  location.reload();
}

function updateUserPassword(){
  var oldpass = $("#currentPassword").val();
  var newpass = $("#newPassword").val();
  var newpass1 = $("#newPassword1").val();

  if (oldpass == "" || newpass == "" || newpass1 == "") {

          $(".alert").addClass("alert-danger");
          $(".alert").html("Form has some missing content");
          $(".alert").fadeIn(500);
          $(".alert").delay(3000).fadeOut(500);

  }else {

     var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function(){
          if (xhr.status == 200 && xhr.readyState == 4) {

            if (xhr.responseText == "failed"){
              $(".alert").addClass("alert-danger");
              $(".alert").html("Password incorrect");
              $(".alert").fadeIn(500);
              $(".alert").delay(3000).fadeOut(500);
            }else if (xhr.responseText == "mismatch"){
              $(".alert").addClass("alert-danger");
              $(".alert").html("Password mismatch");
              $(".alert").fadeIn(500);
              $(".alert").delay(3000).fadeOut(500);
            }else if (xhr.responseText == "success") {
              $(".alert").removeClass("alert-danger");
              $(".alert").addClass("alert-success");
              $(".alert").html("Password successfully updated.");
              $(".alert").fadeIn(500);
              $(".alert").delay(3000).fadeOut(500);
            }

          }
        }
      xhr.open("GET","ajax.php?oldpass="+oldpass+"&newpass="+newpass+"&newpass1="+newpass1,true);
      xhr.send();  
  }
}


function updateAdminInfo(){


    var eventorganizer = $("#eventorganizer").val();
    var adminUsername = $("#adminUsername").val();

         var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function(){
          if (xhr.status == 200 && xhr.readyState == 4) {

            $(".alert").removeClass("alert-danger");
            $(".alert").addClass("alert-success");
            $(".alert").html("Information successfully updated");
            $(".alert").fadeIn(500);
            $(".alert").delay(3000).fadeOut(500);

            if (xhr.responseText == "changed") {
              window.location.replace("logout.php");
            }

          }
        }
      xhr.open("GET","ajax.php?eventorganizer="+eventorganizer+"&adminUsername="+adminUsername,true);
      xhr.send(); 

  
}
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function sendEmail(){
    var em = $("#email").val();
    var sub = $("#subject").val();
    var mes = $("#message1").val();

      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function(){
          if (xhr.status == 200 && xhr.readyState == 4) {
                $("#messagealert").html("Email successfully sent!");
                $("#messagealert").show(500);

          }
        }
      xhr.open("GET","ajax.php?newEmail="+em+"&newSub="+sub+"&newMess="+mes,true);
      xhr.send(); 
}