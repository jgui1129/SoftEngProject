   
    <?php
        include_once("header.php");
        include_once("navigation.php");
        include_once("sidebar.php");
    ?>
   
<div id="page-content-wrapper">
    <div class="container-fluid">
              
              <div class="row" onload="customizePackage()">
                <div class="col-md-12"><h1 id="package">Wedding Package</h1></div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <h3>Total number of attendee: <b id="attendee">100</b><b id="finalValue" style="display: none">309500</b></h3>
                    <div class="col-xs-3">
                     <input type="number" id="attendee1" onchange="getAttendee(this.value)" onkeyup="getAttendee(this.value)" value="100" class="form-control" max="500">
                     </div>
                   <div class="col-xs-9">
                  <input type="range" id="attendee2" class="form-control" max="500" min="50" 
                  onchange="getAttendee(this.value)"></div>
                  <br/><br/>
                  <p class="reminder"><i>Excess Php400 per Head for 100 up | Php350 per head 100 pax</i></p>
                </div>
                <div class="col-md-6" align="center">
                  <br/>
                  <h2>Total price: Php <b id="totalPrice">309,500.00</b></h2>
                  <button id="reservebtn" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#reserve" onclick="getTotal()">Reserve now!</button>
                  <button class="btn btn-danger btn-lg" onclick="custom()">Customize Package</button>
                </div>
              </div>
        <hr/>
              <div class="row">
                <div class="col-md-6 getItem">
                <img src="img/info.jpg" class="img-responsive img-thumbnail">
                  <h3 id="inclusion">Inclusion</h3>
                  <ul>
                  <li class="itemHeader">Food and Decoration <span class="hidden" id="itemTotal" onload="customizePackage()"></span></li>
                    <ul>
                      <li onclick="toggleItem(this)" class="selector disabled">Appetizers as your guests arrive at the venue <span class="hidden item" >3000</span></li>
                      <li onclick="toggleItem(this)" class="selector disabled">Full-Course Buffet Menu with Free Flowing Drinks <span class="hidden item">70000</span></li>
                      <li onclick="toggleItem(this)" class="selector disabled">Personalized Labels for each dish <span class="hidden item">2000</span></li>
                      <li onclick="toggleItem(this)" class="selector disabled">Complete Table Setting with Table Numbers <span class="hidden item">3000</spsan></li>
                      <ul>
                        <li>Dressed Banquet Tables with Cloth Table Napkins</li>
                        <li>Special VIP Treatment Food Service for the Presidential Table</li>
                      </ul>
                      <li onclick="toggleItem(this)" class="selector disabled">Professionally Trained Banquet Staffs in Uniform <span class="hidden item">5000</span></li>
                      <li onclick="toggleItem(this)" class="selector disabled">Pair of Doves for Dove Release Tradition <span class="hidden item">1000</span></li>
                      <li onclick="toggleItem(this)" class="selector disabled">Bottle of Wine for Wedding Toast (Premium Wines) <span class="hidden item">15000</span></li>
                      <li onclick="toggleItem(this)" class="selector disabled">Red Carpet <span class="hidden item">2000</span></li> 
                      <li onclick="toggleItem(this)" class="selector disabled">Elegant Tiffany Chairs for all guests <span class="hidden item">50000</span></li> 
                    </ul>
                  </ul>

                  <ul>
                    <li class="itemHeader">Photo and Video Coverage with Prenuptial Pictorial, Guestbook and Wedding Album (Preparation to Ceremony to Reception) <span class="hidden" id="item1Total" onload="customizePackage()"></li>
                    <ul>
                      <li onclick="toggleItem1(this)" class="selector disabled">Pre-Nuptial Pictorial Session <span class="hidden item1">10000</span> </li>
                      <li onclick="toggleItem1(this)" class="selector disabled">3 Professional Videographers w/ HD Video DSLR Video Camera <span class="hidden item1">6000</span></li>
                      <ul>
                        <li>1 Creative Videographer / Editor</li>
                        <li>1 Main Videographer</li>
                        <li>1 Second Angle Videographer</li>
                        <li>Complete with  Creative Equipments for Cinematic Shots (Glidecam, Slider, Tripod, Etc)</li>
                      </ul>
                      <li onclick="toggleItem1(this)" class="selector disabled">3 Professional Photographers w/ Digital SLR Camera <span class="hidden item1">6000</span></li>
                      <ul>
                        <li>1 Creative Photographer</li>
                        <li>1 Main Photographer</li>
                        <li>1 Second Angle Photographer</li>
                      </ul>
                       <li onclick="toggleItem1(this)" class="selector disabled">Edited DVD Mastered Video (20-30 mins Cinematic Highlights) <span class="hidden item1">3000</span></li>
                       <li onclick="toggleItem1(this)" class="selector disabled">DVD case cover Personalized layout design <span class="hidden item1">2000</span></li>
                       <li onclick="toggleItem1(this)" class="selector disabled">8x10 Magnetic Guestbook with Prenuptial Pictures <span class="hidden item1">3000</span></li>
                       <li onclick="toggleItem1(this)" class="selector disabled">8x10 40 pages Magnetic Wedding Album <span class="hidden item1">3000</span></li>
                       <li onclick="toggleItem1(this)" class="selector disabled">Couple's Growing Up AVP or Then and Now Slideshow <span class="hidden item1">1000</span></li>
                       <li onclick="toggleItem1(this)" class="selector disabled">1 Minute SAVE THE DATE Video Teaser <span class="hidden item1">3000</span></li> 
                       <li onclick="toggleItem1(this)" class="selector disabled">Same Day Edit Video or Onsite Wedding Video Highlights (3-5 mins Wedding Highlights to be played during reception) <span class="hidden item1">3000</span></li> 
                    </ul>
                  </ul>

                  <ul>
                    <li class="itemHeader">Wedding Cake, Invitation and Give-Aways  <span class="hidden" id="item2Total" onload="customizePackage()"></li>
                    <ul>
                      <li onclick="toggleItem2(this)" class="selector disabled">70 pieces Wedding Invitations <span class="hidden item2">28000</span></li>
                      <li onclick="toggleItem2(this)" class="selector disabled">4 Layer Fondant Themed - Wedding Cake with Topper <span class="hidden item2">8000</span></li>
                      <li onclick="toggleItem2(this)" class="selector disabled">10 pcs Fondant Mini-Cakes for Principal Sponsor Give-aways <span class="hidden item2">10000</span></li>
                      <li onclick="toggleItem2(this)" class="selector disabled">100 pcs Icing Cupcakes for Guest Give-aways <span class="hidden item2">5000</span></li>
                      <li onclick="toggleItem2(this)" class="selector disabled">4 Hours Photobooth with Props and STOP TIME <span class="hidden item2">2000</span></li>
                    </ul>
                  </ul>

                  <ul>
                    <li class="itemHeader">Sounds, Lights and Effects <span class="hidden" id="item3Total" onload="customizePackage()"></li>
                    <ul>
                      <li onclick="toggleItem3(this)" class="selector disabled">Soundcraft 8 channel mixer <span class="hidden item3">2000</span></li>
                      <li onclick="toggleItem3(this)" class="selector disabled">4 units SRX Dual 15 speakers <span class="hidden item3">4000</span></li>
                      <li onclick="toggleItem3(this)" class="selector disabled">2 units SM 58 or C audio Wired Vocal microphones <span class="hidden item3">1500</span></li>
                      <li onclick="toggleItem3(this)" class="selector disabled">2 Wireless Microphones <span class="hidden item3">2000</span></li>
                      <li onclick="toggleItem3(this)" class="selector disabled">Crew, Sound Technician with DJ <span class="hidden item3">5000</span></li>
                      <li onclick="toggleItem3(this)" class="selector disabled">8 LED Par Lights and other light effects <span class="hidden item3">5000</span></li>
                      <li onclick="toggleItem3(this)" class="selector disabled">upgraded mood lights <span class="hidden item3">2000</span></li>
                    </ul>
                  </ul>

                  <ul>
                    <li class="itemHeader selector disabled" onclick="toggleItem4(this)">Bridal Car <span class="hidden item4" id="item4Total">5000</li>
                    <ul>
                      <li>P 5000 - 4 Hours Bridal Car (Chrysler 300c, Vintage Jaguar, Ford Mustang) - Preparation to Church to Reception</li>
                    </ul>
                  </ul>


                  <ul>
                    <li class="itemHeader">Bridal Bouquet and Entourage Flowers <span class="hidden" id="item5Total" onload="customizePackage()"></li>
                    <ul>
                      <li onclick="toggleItem5(this)" class="selector disabled">Elegant Bouquet for Bride (Upgraded to Carnations, Gerbera, Stargazer) <span class="hidden item5">3000</span></li>
                      <li onclick="toggleItem5(this)" class="selector disabled">Corsages, Boutonnieres, Wristlets for Entourage <span class="hidden item5">3000</span></li>
                      <li onclick="toggleItem5(this)" class="selector disabled">Baskets for Flower Girls- Lose Petal <span class="hidden item5">3000</span></li>
                    </ul>
                  </ul>

                  <ul>
                    <li class="itemHeader">Hair and Makeup (Airbrush) <span class="hidden" id="item6Total" onload="customizePackage()"></li>
                    <ul>
                      <li onclick="toggleItem6(this)" class="selector disabled">Prenup Hair and Makeup (Trial) <span class="hidden item6">3000</span></li>
                      <li onclick="toggleItem6(this)" class="selector disabled">Bride and Groom (If same preparation place) <br> - Airbrush Hair and Makeup for Bride only <span class="hidden item6">4000</span></li>
                      <li onclick="toggleItem6(this)" class="selector disabled">2 additional heads (mother,maid of honor,etc) <br> - Unlimited Retouch before Reception  <span class="hidden item6">2000</span></li>
                    </ul>
                  </ul>

                  <ul>
                    <li class="itemHeader">Acoustic Band <span class="hidden" id="item7Total" onload="customizePackage()"></li>
                    <ul>
                      <li onclick="toggleItem7(this)" class="selector disabled">1 Singer / Guitarist <span class="hidden item7">3000</span></li>
                      <li onclick="toggleItem7(this)" class="selector disabled">1 Beatbox / Percussion Drums <br> - 2 sets, cocktails and eating time <span class="hidden item7">1000</span></li>
                    </ul>
                  </ul>

                  <ul>
                    <li class="itemHeader">Mobile Bar / Candy Buffet Station <span class="hidden" id="item8Total" onload="customizePackage()"></li>
                    <ul>
                      <li onclick="toggleItem8(this)" class="selector disabled">Lighted Mobile Bar <br> - 10 Choices of Cocktails / Mocktails <span class="hidden item8">8000</span></li>
                      <li onclick="toggleItem8(this)" class="selector disabled">Assorted candies and sweets for guests to enjoy <span class="hidden item8">3000</span></li>
                    </ul>
                  </ul>

                  <ul>
                    <li class="itemHeader">On the Day Coordination with Emcee <span class="hidden" id="item9Total" onload="customizePackage()"></li>
                    <ul>
                      <li onclick="toggleItem9(this)" class="selector disabled">1 Program Emcee <span class="hidden item9">2000</span></li>
                      <li onclick="toggleItem9(this)" class="selector disabled">3 Coordinators from Preparation to Ceremony to Reception <br> - 1 Bridal Assistant to assist the bride throughout the day<span class="hidden item9">4000</span></li>
                    </ul>
                  </ul>

                  <ul>
                    <li class="itemHeader">FREEBIES!!!</li>
                    <ul>
                      <li>4 Party Poppers</li>
                      <li>Upgraded sofa/couch for couple</li>
                      <li>fog machine effect</li>
                      <li>semi-event styling and venue design</li>
                      <li>ceiling swag and drapings</li>
                      <li>customized photobooth backdrop</li>
                      <li>chocolate fondue station with sweet treats</li>
                      <li>LCD projector with white screen</li>
                    </ul>
                  </ul>
                
              
                </div> <!-- col-md6-->
                
                <div class="col-md-6" align="center">
                <h2>Portfolio</h2>
                  <div class="col-sm-6">
                    <img src="img/pf/weddings/wed1.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/weddings/wed2.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/weddings/wed3.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/weddings/wed6.jpg" class="img-responsive img-thumbnail showcase">
                  </div>
                  <div class="col-sm-6">
                    <img src="img/pf/weddings/wed6.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/weddings/wed7.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/weddings/wed4.jpg" class="img-responsive img-thumbnail showcase">
                    <img src="img/pf/weddings/wed2.jpg" class="img-responsive img-thumbnail showcase">
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
