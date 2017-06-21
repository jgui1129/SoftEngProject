   
    <?php
        include_once("header.php");
        include_once("navigation.php");
        include_once("sidebar.php");
    ?>
<div id="page-content-wrapper">
<div class="container-fluid">
              
              <div class="row" onload="customizePackage()">
                <div class="col-md-12"><h1 id="package">Kiddie Package</h1></div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <h3>Total number of attendee: <b id="attendee">100</b><b id="finalValue" style="display: none">46000</b></h3>
                    <div class="col-xs-3">
                     <input type="number" id="attendee1" onchange="getAttendee(this.value)" onkeyup="getAttendee(this.value)" value="100" class="form-control" max="500">
                     </div>
                   <div class="col-xs-9">
                  <input type="range" id="attendee2" class="form-control" max="500" min="50" 
                  onchange="getAttendee(this.value)"></div>
                </div>
                <div class="col-md-6" align="center">
                  <br/>
                  <h2>Total price: Php <b id="totalPrice">46,000.00</b></h2>
                  <button id="reservebtn" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#reserve" onclick="getTotal()">Reserve now!</button>
                  <a href="kiddie-package.php#customize" class="btn btn-danger btn-lg" onclick="custom()">Customize Package</a>
                </div>
              </div>
        <hr/>
              <div class="row">
                <div class="col-md-6 getItem">

                  <div class="row">
                  <div class="col-sm-5">
                  <ul>
                      <li><b>KIDS FOOD MENU</b></li>
                      <ul>
                          <li>Spaghetti</li>
                          <li>Fried Chicken</li>
                          <li>Hotdog with Mallows on stick</li>
                          <li>Brownies</li>
                          <li>Fruit Juice</li>
                      </ul>
                  </ul>
                  </div>
                  <div class="col-sm-7">
                  <ul>
                      <li><b>ADULT FOOD MENU</b></li>
                      <ul>
                          <li>Choice of Noodles or Pasta</li>
                          <li>Choice of 1 Chicken</li>
                          <li>Choice of 1 Pork</li>
                          <li>Choice of 1 Beef</li>
                          <li>Buttered Vegetables</li>
                          <li>Choice of 1 Dessert</li>
                          <li>Steamed Rice</li>
                          <li>Bottomless Iced Tea</li>
                      </ul>
                  </ul>
                  </div>
                  </div>  
                  <h3>Package inclusive of the following...</h3>
                  <ul>
                      <li>Themed tarpaulin Backdrop with celebrant's Name (8x5ft.)</li>
                      <li>Themed Entrance Tarpaulin with Celebrant's Name (5x2ft.)</li>
                      <li>Character Standees (depends on availability) or Letter Standees</li>
                      <li>10-seater Tables with floor length cover and table runner for the adults</li>
                      <li>10-seater Tables with floor length cover and table runner for the adults</li>
                      <li>Monoblock Chairs with floor length seat cover and ribbon accent following color motif for the adults</li>
                      <li>Kiddie tables with floor-length cover and kiddie chairs</li><a name="customize"></a>
                      <li>Buffet table with skirting following color motif and Balloon or Themed centerpiece.</li>
                      <li>Balloon centerpieces for the adult tables</li>
                      <li>Complete sets of dinnerware, flatware, and utensils for the adult tables</li>
                      <li>Complete sets of themed disposable plates, cups, spoon and fork for the kiddie tables</li>
                      <li>Skirted cake table and gifts table</li>
                      <li>Ice for drinks and purified drinking water</li>
                      <li>Waiters and buffet attendants in uniform</li>
                      <li>Prices are inclusive of 12% VAT</li>
                  </ul>                  


                  <br/>
                  <ul>
                  <li class="itemHeader">THEMED PARTY PACKAGE <span class="hidden" id="itemTotal" onload="customizePackage()"></span></li>
                    <ul>
                      <li onclick="toggleItem(this)" class="selector disabled">Sound System <span class="hidden item">500</span></li>
                      <li onclick="toggleItem(this)"  class="selector disabled">1 English Speaking Character Host to facilitate games, balloon twisting and kiddie magic show <span class="hidden item">1000</span></li>
                      <li onclick="toggleItem(this)"  class="selector disabled">40 pcs. Personalized Invitation <span class="hidden item">4000</span></li>
                      <li onclick="toggleItem(this)"  class="selector disabled">40 pcs. Themed Nametags <span class="hidden item">2000</spsan></li>
                      <li onclick="toggleItem(this)"  class="selector disabled">40 pcs. Themed Party Hats <span class="hidden item">2000</span></li>
                      <li onclick="toggleItem(this)"  class="selector disabled">40 pcs. Themed Backpacks with 2 pencils, stickers, sharpener, eraser, cotton candy, stationary, toys <span class="hidden item">8000</span></li>
                      <li onclick="toggleItem(this)"  class="selector disabled">Supreme Pinata with candies and confetti <span class="hidden item">1500</span></li>
                      <li onclick="toggleItem(this)"  class="selector disabled">Unlimited Glimmer Tattoo <span class="hidden item">2000</span></li>
                      <li onclick="toggleItem(this)"  class="selector disabled">1 Chocolate fountain with 5 Choices of Dippings <span class="hidden item">2000</span></li>
                      <li onclick="toggleItem(this)"  class="selector disabled">Ice cream cart or Cotton Candy cart <span class="hidden item">1000</span></li>
                      <li onclick="toggleItem(this)"  class="selector disabled">Party Manager <span class="hidden item">2000</span></li>
                    </ul>
                  </ul>

                  <h3 class="announcement" align="center">Additional P6,500 to upgrade to Full Styro Backdraft (depends on availability and location)</h3>

                  <h3>Baloon Decor Package</h3>

                  <ul>
                    <li class="item1 itemHeader selector disabled" onclick="toggleItem10(this)">Package A <span class="hidden item10" id="item10Total">4000</li>
                    <ul>
                      <li>Cake Arch</li>
                      <li>50 Floating Balloons</li>
                      <li>5 Mini-Chandelier/ 1 2-ft. Balloon Burst with 30 small Balloons inside</li>
                      <li>2 6-ft. Balloon Pillar with Spiral Balloons on Top</li>
                    </ul>
                  </ul>

                  <ul>
                    <li class="item2 itemHeader selector disabled" onclick="toggleItem11(this)">Package B <span class="hidden item11" id="item11Total">5500</li>
                    <ul>
                      <li>Entrance Arch or Cloth Swags/ Drapes</li>
                      <li>100 Floating Balloons</li>
                      <li>3 Balloon Clusters / 1 3-ft. Balloon Burst with 50 small Balloons inside</li>
                      <li>2 6-ft. Balloon Pillar with Spiral Balloons on Top</li>
                      <li>Cake arch</li>
                      <li>Pompoms / Chinese Lanterns</li>
                    </ul>
                  </ul>

                  <ul>
                    <li class="item3 itemHeader selector disabled" onclick="toggleItem12(this)">Package C <span class="hidden item12" id="item12Total">10500</li>
                    <ul>
                      <li>Cloth swags/ Drapes</li>
                      <li>100 Floating Balloons</li>
                      <li>2 6-ft. Balloon Pillar with Themed Mylar</li>
                      <li>1 3-ft. Balloon Burst with 50 small Balloons Inside</li>
                      <li>Entrance Full Arch</li>
                      <li>Cake Arch</li>
                      <li>Pompoms/ Chinese Lantern</li>
                    </ul>
                  </ul>                  
                
              
                </div> <!-- col-md6-->
                
                <div class="col-md-6" align="center">
                <h2>Portfolio</h2>
                  <div class="col-sm-6">
                    <img src="img/pf/kiddie/kid1.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/kiddie/kid2.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/kiddie/kid3.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/kiddie/kid4.jpg" class="img-responsive img-thumbnail showcase">
                  </div>
                  <div class="col-sm-6">
                    <img src="img/pf/kiddie/kid5.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/kiddie/kid6.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/kiddie/kid7.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/kiddie/kid8.jpg" class="img-responsive img-thumbnail showcase">
                  </div>

                </div>

              </div> <!-- row -->
              
            </div>
<!-- Modal -->
<div id="event-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reservation Failed!</h4>
      </div>
      <div class="modal-body">
        <p>Cannot reserve due to low cost of event package!</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>

  </div>
</div>

    <?php
        include_once('info.php');
        include_once("footeradmin.php");
    ?>