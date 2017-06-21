<div id="reserve" class="modal fade" role="dialog">
  <div class="modal-dialog" id="reserve2">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title" id="package-name"></h3>
      </div>

     <form action="process.php" method="POST">
     <div class="col-md-8 col-md-offset-2">
    
    <div class="form-group">
     <h3 class="alert alert-success" align="center">Event Details</h3>
     <h4 align="center">****** Total Amount: P </small><b id="totalPrice1"></b> ******</h4>
     <hr/>
     </div>

     <div class="form-group">
     <label for="ename"> Event Name: <span class="charges">*</span>  </label>
     <input type="text" name="en" class="form-control input-sm"  required maxlength="100">
     </div>

    <div class="form-group">
    <label> Date: <span class="charges">*</span> <small>(Earliest reservation: 2 weeks)</small></label>
    <div class="inner-addon right-addon">
    <i class="glyphicon glyphicon-calendar"></i>   
    <input type="text" readonly name="sdate" id="dateToReserve" class="form-control input-sm" required placeholder="Date of the Event" maxlength="10"></div>
    </div>


    <div class="form-group">
    <label> Start Time <span class="charges">*</span> </label>
    <div class="inner-addon right-addon">
    <i class="glyphicon glyphicon-time"></i>  
    <input name="timein" id="timeIn" type="text" class="time form-control input-sm" required placeholder="Start Time of the Event" maxlength="7" />
    </div></div>

    <div class="form-group">
    <label> Event duration <span class="charges">*</span> </label>
    <div class="inner-addon right-addon">
    <i class="glyphicon glyphicon-time"></i>
    <select class="form-control" id="additionalHours" name="eduration" onchange="customizePackage()">
      <option value="0">3-5 Hours (No additional Charge)</option>
      <option value="3000">5-7 Hours (additional 3000 charge)</option>
      <option value="4000">8 Hours (additional 4000 charge)</option>
      <option value="5000">9 Hours (additional 5000 charge)</option>
      <option value="6000">10 Hours (additional 6000 charge)</option>
      <option value="7000">11 Hours (additional 7000 charge)</option>
      <option value="8000">12 Hours (additional 8000 charge)</option>
      <option value="10000">12 Hours and up (additional 10,000 charge)</option>
    </select>
    </div></div>

    <div class="form-group" id="reservation-alert" style="display: none">
      <div class="alert alert-danger alert-sm"><i class="fa fa-exclamation"></i> Please select a venue.</div>
    </div>

    <div class="form-group">
    <label for="location"> Venue: <small>(additional charge for the venue is on the list)</small> <span class="charges">*</span></label>
    <select class="form-control" id="selectVenue" name="venue" onchange="displayVenueOption()">
      <option value="00">Please select venue from the list</option>
      <option value="5000">Grand Pavilion Malolos (additional 5000)</option>
      <option value="7000">MD Cruz Resort (additional 7000)</option>
      <option value="9000">Club Royal Resort (additional 9000)</option>
      <option value="10000">Prycor Pavillion Mencyland (additional 10,000)</option>
      <option value="0">Others</option>
    </select>
    </div>

    <div class="form-group" id="customVenue" style="display: none">

    <div class="form-group indentForm1">
        <div class="row">
          <div class="col-md-2"><i class="fa fa-info-circle fa-3x"></i></div>
          <div class="col-md-10"><b> Venue has no additional 5000 price but transportation will be charge based on the distance of the venue.</b></div>
        </div>
    </div>

    <div class="form-group">
    <label for="ename"> Your desired Venue: <span class="charges">*</span>  </label>
    <input type="text" class="form-control" name="cxvenue" placeholder="Enter the complete address of venue location">
    </div>


    <label>Choose the location of the venue: </label><br/>
    <input type="radio" name="venueDistance" class="venueDistance" value="0" id="default" onchange="customizePackage()" checked="checked"> Malolos (no additional charge)<br/>
    <input type="radio" name="venueDistance" class="venueDistance" value="1000" onchange="customizePackage()"> Calumpit (additional P1,000.00)<br/>
    <input type="radio" name="venueDistance" class="venueDistance" value="1200" onchange="customizePackage()"> Tabang (additional P1,200.00)<br/>
    <input type="radio" name="venueDistance" class="venueDistance" value="1400" onchange="customizePackage()"> Guiguinto (additional P1,400.00)<br/>
    <input type="radio" name="venueDistance" class="venueDistance" value="1500" onchange="customizePackage()"> Balagtas (additional P1,500.00)<br/>
    <input type="radio" name="venueDistance" class="venueDistance" value="1600" onchange="customizePackage()"> Bulakan, Bulacan (additional P1,600.00)<br/>
    <input type="radio" name="venueDistance" class="venueDistance" value="1700" onchange="customizePackage()"> Bocaue (additional P1,700.00)<br/>
    <input type="radio" name="venueDistance" class="venueDistance" value="1800" onchange="customizePackage()"> Marilao (additional P1,800.00)<br/>
    <input type="radio" name="venueDistance" class="venueDistance" value="1900" onchange="customizePackage()"> Meycauayan (additional P,900.00)<br/>
    <input type="radio" name="venueDistance" class="venueDistance" value="2500" onchange="customizePackage()"> Others (additional P2,500.00)<br/>

    </div>

     <label>Additional Instructions/Notes to the event organizer</label>
     <textarea cols="2" rows="3" class="form-control" required name="otherInfo" onkeyup="save()"></textarea>

    <textarea rows="4" id="orderDetails" name="orderDetails" class="form-control input-sm" maxlength="10000" placeholder="package details"></textarea>

    <input type="text" name="finalPrice" id="finalPriceToSave" placeholder="totalprice" class="form-control input-sm"  maxlength="200">
    <input type="text" name="packageType" id="packageType" placeholder="packageType" class="form-control input-sm"  maxlength="200">
    <br/><br/>

    <input type="submit" value="RESERVE" name="reserve" class="btn btn-warning btn-block btn-lg">
     </div>


  
      </form>

  <div class="modal-footer">
      </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div id="needToRegister" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body" align="center">
        <h3>Oopps! We need you to login/register first <br/>to reserve an event for you to make<br/> changes in the future. <br/><small>Don't worry! This wont take a minute.</small></h3><br/>
        <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#login-modal">Login</a>
        <a class="btn btn-warning btn-lg" href="registration.php">Register</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>