   
    <?php
        include_once("header.php");
        include_once("navigation.php");
        include_once("sidebar.php");
    ?>
<div id="page-content-wrapper">
    <div class="container-fluid">
              
              <div class="row"  onload="customizePackage()">
                <div class="col-md-12"><h1 id="package">Debut Package</h1></div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <h3>Total number of attendee: <b id="attendee">100</b> <b id="finalValue" style="display: none">100886</b></h3>
                    <div class="col-xs-3">
                     <input type="number" id="attendee1" onchange="getAttendee(this.value)" onkeyup="getAttendee(this.value)" value="100" class="form-control" max="500" min="50">
                     </div>
                   <div class="col-xs-9">
                  <input type="range" id="attendee2" class="form-control" max="500" min="50" 
                  onchange="getAttendee(this.value)"></div>
                  <br/><br/>
                  <p class="reminder"><i>Excess Php400 per Head for 100 up | Php350 per head 100 pax</i></p>
                </div>
                <div class="col-md-6" align="center">
                  <br/>
                  <h2>Total price: Php <b id="totalPrice">100,886.00</b></h2>
                  <button id="reservebtn" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#reserve" onclick="getTotal()">Reserve now!</button>
                  <button class="btn btn-danger btn-lg" onclick="custom()">Customize Package</button>

                </div>
              </div>
        <hr/>
              <div class="row">
                <div class="col-md-6 getItem">
                  <h3 id="inclusion">Inclusion</h3>
                  <ul>
                  <li class="itemHeader">Food and Decoration <span class="hidden" id="itemTotal" onload="customizePackage()"></span></li>
                    <ul>
                      <li onclick="toggleItem(this)" class="selector disabled">Appetizers as your guests arrive at the venue.<span class="hidden item" >7000</span></li>
                      <li onclick="toggleItem(this)"  class="selector disabled">Full-Course Buffet Menu with Free Flowing Drinks <span class="hidden item">50000</span></li>
                      <li onclick="toggleItem(this)"  class="selector disabled">Personalized Labels for each dish <span class="hidden item">1250</span></li>
                      <li onclick="toggleItem(this)"  class="selector disabled">Complete Table Setting with Table Numbers<span class="hidden item">7000</spsan></li>
                      <ul>
                        <li class="child">Monobloc Banquet Chairs with Seat covers and Ribbon Accents</li>
                        <li class="child">Dressed Banquet Tables with Cloth Table Napkins</li>
                        <li class="child">Professionally Trained Banquet Staffs in Uniform</li>
                      </ul>
                      <li onclick="toggleItem(this)"  class="selector disabled">18 Roses with Ribbons and 18 Candles in Glass Holders<span class="hidden item">1836</span></li>
                      <li onclick="toggleItem(this)"  class="selector disabled">Debutante's Backdrop according to theme <span class="hidden item">3000</span></li>
                      <ul>
                        <li>Red Carpet</li>
                        <li>Venue Entrance Design</li>
                      </ul>
                    </ul>
                  </ul>

                  <ul>
                    <li class="itemHeader">Birthday Cake, Invitation and Give-Aways  <span class="hidden" id="item1Total" onload="customizePackage()"></li>
                    <ul>
                      <li onclick="toggleItem1(this)"  class="selector disabled">40 pieces Invitations <span class="hidden item1">4000</span> </li>
                      <li onclick="toggleItem1(this)"  class="selector disabled">3 Layer Icing Birthday Cake <span class="hidden item1">3000</span></li>
                      <li onclick="toggleItem1(this)"  class="selector disabled">3 Hours Photo booth with Props and STOP TIME <span class="hidden item1">1500</span></li>
                    </ul>
                  </ul>

                  <ul>
                    <li class="itemHeader">Photo and Video Coverage with Pre-Debut  <span class="hidden" id="item2Total" onload="customizePackage()"></li>
                    <ul>
                      <li onclick="toggleItem2(this)" class="selector disabled">1 Professional Photographer w/ Digital SLR Camera <span class="hidden item2">2000</span></li>
                      <li onclick="toggleItem2(this)" class="selector disabled">1 Professional Videographer w/ HD DSLR Video Camera <span class="hidden item2">2000</span></li>
                      <li onclick="toggleItem2(this)" class="selector disabled">Unlimited Shots in DVD Copy <span class="hidden item2">500</span></li>
                      <li onclick="toggleItem2(this)" class="selector disabled">Edited DVD Mastered Video (20-30 mins) <span class="hidden item2">500</span></li>
                      <li onclick="toggleItem2(this)" class="selector disabled">Save the Date Video Teaser <span class="hidden item2">500</span></li>
                      <li onclick="toggleItem2(this)" class="selector disabled">Mini Coffee Table Guestbook with Pre-Debut Pictures <span class="hidden item2">1000</span></li>
                      <li onclick="toggleItem2(this)" class="selector disabled">8x10 20 pages Coffee Table Debut Album <span class="hidden item2">1000</span></li>
                      <li onclick="toggleItem2(this)" class="selector disabled">Growing up AVP <span class="hidden item2">300</span></li>
                    </ul>
                  </ul>

                  <ul>
                    <li class="itemHeader">Sounds, Lights and Effects <span class="hidden" id="item3Total" onload="customizePackage()"></li>
                    <ul>
                      <li onclick="toggleItem3(this)" class="selector disabled">Crew, Sound Technician with DJ <span class="hidden item3">2500</span></li>
                      <li onclick="toggleItem3(this)" class="selector disabled">Soundcraft 8 channel mixer <span class="hidden item3">1000</span></li>
                      <li onclick="toggleItem3(this)" class="selector disabled">3 units SRX Dual 15 speakers <span class="hidden item3">1500</span></li>
                      <li onclick="toggleItem3(this)" class="selector disabled">2 units SM 58 or C audio Wired Vocal microphones <span class="hidden item3">500</span></li>
                      <li onclick="toggleItem3(this)" class="selector disabled">4 LED Par Lights and other light effects <span class="hidden item3">2000</span></li>
                    </ul>
                  </ul>

                  <ul>
                    <li class="itemHeader selector disabled" onclick="toggleItem4(this)">Hair and Makeup <span class="hidden item4" id="item4Total">5000</li>
                    <ul>
                      <li>Debutante and Mother (If same preparation place)</li>
                      <li>Traditional Hair and Makeup</li>
                      <li>With retouch during change of outfit</li>
                    </ul>
                  </ul>


                  <ul>
                    <li class="itemHeader">On the day coordination <span class="hidden" id="item5Total" onload="customizePackage()"></li>
                    <ul>
                      <li onclick="toggleItem5(this)" class="selector disabled">2  Debut Coordinators <span class="hidden item5">1000</span></li>
                      <li onclick="toggleItem5(this)" class="selector disabled">1 Program Emcee <span class="hidden item5">1000</span></li>
                    </ul>
                  </ul>


                  <ul>
                    <li class="itemHeader">FREEBIES!!!</li>
                    <ul>
                      <li>2 Party Poppers</li>
                      <li>Fog Machine Effect</li>
                      <li>Sofa / Couch for Debutante</li>
                      <li>LCD Projector and White Screen</li>
                    </ul>
                  </ul>
                
              
                </div> <!-- col-md6-->
                
                <div class="col-md-6" align="center">
                <h2>Portfolio</h2>
                  <div class="col-sm-6">
                    <img src="img/pf/debut/debut1.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/debut/debut2.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/debut/debut3.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/debut/debut4.jpg" class="img-responsive img-thumbnail showcase">
                  </div>
                  <div class="col-sm-6">
                    <img src="img/pf/debut/debut5.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/debut/debut6.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/debut/debut7.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/debut/debut8.jpg" class="img-responsive img-thumbnail showcase">  
                  </div>

                </div>

              </div> <!-- row -->
              
            </div>
<!-- Modal -->
<div id="event-modal"  class="modal fade" role="dialog">
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