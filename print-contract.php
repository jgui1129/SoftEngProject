<?php 
	include_once("header.php");
    include_once("navigation.php");
    include_once("adminsidebar.php");
    include_once('connection.php');

    echo '<div id="page-content-wrapper">';
    $day = date('d');
    $month= date('F');
    $year = date('Y');
    
    if (isset($_GET['id'])){
    	$id = $_GET['id'];
    	$sql = "SELECT* FROM reservation WHERE ID = '$id'";
    	$result = mysqli_query($conn,$sql);
    	$row = mysqli_fetch_array($result);
    	
     echo '<div class="col-md-7 invoice">

                 <div class="row">
                 <div class="col-sm-2 logoDiv"> 
                    <img src="img/ome2.png">
                 </div>

                 <div class="col-sm-9 logoDiv">
                   <span id="companyName"> OME | Occassions Made Easy </span><br/>
                   <span>43 Inang Wika St. Malolos, Bulacan</span><br/>
                   <span>Phone No: 0935696971 <br/> Telephone No: 791-6099</span>
                 </div></div>

		<h3>Event Planner Services Agreement</h3>
		<br/>			
		<p>This agreement is made this '.$day.' day of '.$month.' , '.$year.' </p>
		<p><b> '.$row["CNAME"].' </b> (The “Client”)</p>
		<p><b>OME | Event Creatives</b> (The “Event Planner”), collectively referred to as the “Parties.”</p>

		<div class="contractContent">
			<label>The client wishes to be provided with the Packages (defined below)  by the Event Planner and the Event Planner agrees to provide the Services to the Client on the terms and conditions of this Agreement.</label>
			<br/><br/>
			<ol>
				<li>1 <b>Packages</b></li>
				<ul>
					<li>The Event Planner shall provide the package [insert package] to the client in accordance with the terms and conditions of this Agreement. (See invoice for the full details of package items).</li>
				</ul>
			</ol>

			<ol>
				<li>2 <b>Fees</b></li>
				<ul>
					<li>As consideration for the provision of the Services by the Event Planner, the fees for the provision of the Services is <b>P '.$row["TOTALPRICE"].' </b> . The Client shall not pay for the Event Planner’s out-of-pocket expenses.</li>
				</ul>
			</ol>

			<ol>
				<li>3 <b>Payment</b></li>
				<ul>
					<li>The Client agrees to pay the first installment <b>(30%-50%)</b> to the Event Planner <b>2 weeks before the event</b>.</li><br/>
					<li>The Event Planner shall invoice the Client for the Services that it has provided to the Client [after '.$row["EDATE"].' ]. The Client shall pay such invoices [upon receipt/within 30days of receipt] from the Event Planner.</li><br/>
					<li>Any charges payable under this Agreement are exclusive of any applicable taxes and such shall be payable by the Client to the Event Planner in addition to all other charges payable hereunder.</li>
				</ul>
			</ol>

			<ol>
				<li>4 <b>Warranty</b></li>
				<ul>
					<li>The Event Planner represents and warrants that it will perform the Services with reasonable skill and care.</li>
				</ul>
			</ol>

			<ol>
				<li>5 <b>Limitation of Liability</b></li>
				<ul>
					<li>Subjects to the Client’s obligation to pay the Fees to the Event Planner, either party’s liability arising directly out of its obligations under this Agreement and every applicable part of it shall be limited in aggregate to the Fees. The Event Planner assumes no liability due to the quality of items or services purchased for the Client.</li>
				</ul>
			</ol>

			<ol>
				<li>6 <b>Term and Termination</b></li>
				<ul>
					<li>This Agreement shall be effective on the date hereof and shall continue until the date of the event unless terminated sooner. If the Client terminates this agreement for any reason 10 days before the scheduled event, 30% of the total fee is to be paid to the Event Planner and the Client shall reimburse the Event Planner for all outstanding out-of-pocket expenses.</li>
				</ul>
			</ol>

			<ol>
				<li>7 <b>Relationship of the Parties</b></li>
				<ul>
					<li>The Parties acknowledge and agree that the Service performed by the Event Planner, its employees, sub-contractors, or agents shall be as an independent contractor and that nothing in this Agreement shall be deemed to constitute a partnership, joint venture, or otherwise between the parties.</li>
				</ul>
			</ol>

			<ol>
				<li>8 <b>Confidentiality</b></li>
				<ul>
					<li>Neither Party will disclose any information of the other which comes into its possession under or in relation to this Agreement and which is of a confidential nature.</li>
				</ul>
			</ol>

			<ol>
				<li>9 <b>Miscellaneous</b></li>
				<ul>
					<li>The failure of either party to enforce its right under this Agreement at any time for any period shall not be construed as a waiver of such rights.</li><br/>
					<li>If any part, term or provision of this Agreement is held to be illegal or unenforceable neither the validity nor the enforceability of the remainder of this Agreement shall be affected.</li><br/>
					<li>This Agreement constitutes the entire understanding between the Parties relating to the event and supersedes all prior representations, negotiations or understandings with respect to the event.</li><br/>
					<li>Neither Party shall be liable for failure to perform any obligation under this Agreement if the failure is caused by any circumstances beyond its reasonable control, including but not limited to acts of god, war, or industrial dispute.</li><br/>
					<li>This Agreement shall be governed by the laws of the jurisdiction in which the Client is located. Agreed by the Parties hereto:</li><br/>
				</ul>
			</ol>
			<div class="row">
			<div class="col-xs-4 col-xs-offset-2">
			<label>SIGNED BY:</label>
			<hr class="contractHR" />
			<label><b>'.$row["CNAME"].'</b></label><br/>
			 <small>(Client)</small>
				
			</div>
			<div class="col-xs-5">
			<label>SIGNED BY:</label>
			<hr class="contractHR" />';	
			$sql = "SELECT * from eventorganizer";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result);	
			$e = $row["organizer"];
			echo '<label><b>'.$e.'</b></label><br/>
			 <small>(Event Planner)</small>			
			</div>			
			</div>
		<br/><br/><br/>
		</div><!-- invoice -->

		</div>
		<div class="col-md-5">
	    	<div align="center">
	        	<br/><br/><br/>
	            	<h1><i class="fa fa-print fa-4x"></i></h1> <br/>
	            	 <button class="btn btn-primary btn-lg" id="btnPrint">Print Contract</button><br/><br/>	
	                 <a href="print-summary-of-order.php?id='.$id.'" class="btn btn-primary btn-lg">View summary of order</a>
	                </div>
                </div>


	';

    }



	
?>

<?php
	include_once('footeradmin.php')
?>