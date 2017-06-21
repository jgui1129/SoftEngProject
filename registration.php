
    <?php
        include_once("header.php");
        include_once("navigation.php");
    	include_once("connection.php");

    ?>
		<div class="container">
		<br/>
		<div class="col-sm-8">

			<h2><span class="glyphicon glyphicon-user"></span>  Registration</h2>
			<hr class="hrmargin" />
			<div class="alert alert-danger" id="regMissingAlert" style="display: none;">Some content are missing </div>
			<div class="col-sm-5">
			<div class="form-group">
			</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" required name="name" id="name"  placeholder="Enter your Name" onblur="validate(this)" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Primary Contact No.</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
									<input type="number" class="form-control" required name="pnumber" id="pnumber"  placeholder="Enter your Primary number" onblur="validate(this)" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Alternative Contact No.</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
									<input type="number" class="form-control" required name="anumber" id="anumber" placeholder="Enter an alternative contact no." onblur="validate(this)"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope-open-o" aria-hidden="true"></i></span>
									<input type="email" class="form-control" required name="email" id="email"  placeholder="Enter your email" onblur="checkIfEmailExist()" />
								</div>
								<span class="emailExist">*email already exist. try another one.</span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
									<input type="text" class="form-control" required name="address" id="address"  placeholder="Enter your address" onblur="validate(this)" />
								</div>
							</div>
						</div>

		</div>


		<div class="col-sm-5 col-sm-offset-1">
			
			<div class="form-group">
			</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" required name="regusername" id="regusername"  placeholder="Enter your Username" onblur="checkIfUsernameExist()" />
								</div>
								<span class="usernameExist">*username already exist. try another one.</span>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" required name="regpassword" id="regpassword"  placeholder="Enter your Password" onblur="validate(this)" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" required name="regpassword1" id="regpassword1"  placeholder="Enter again your Password" onblur="checkPassword()" />
								</div>
								<span class="paswordMismatch">*password mismatch.</span>								
							</div>
						</div>
						<div class="form-group">
						<small> <input type="checkbox" id="agreeTerms"> I agree on the <a href="" data-toggle="modal" data-target="#terms">terms and conditions</a> of OME.</small>	
						</div>


						<div class="form-group ">
							<button name="registerAccount" class="btn btn-primary btn-lg btn-block  login-button" onclick="registerAccount()">Register</button>
						</div>
						<br/><br/><br/>
						</div>

			</div>
			<div class="col-sm-2">

			</div>
		</div>

		<div id="terms" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">OME Terms and Agreements</h4>
		      </div>
		      <div class="modal-body">
		      	<div class="terms" align="justify">
				<h2>Terms and Conditions</h2>
				<h4>Last updated: May 04, 2017</h4>
				<hr/>
				<p>Please read these Terms and Conditions ("Terms", "Terms and Conditions") carefully before using the http://www.omeevents.com website (the "Service") operated by Occassions Made Easy ("us", "we", or "our").</p>
				<p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>
				<p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service. This Terms &amp; Conditions agreement is licensed by TermsFeed to Occassions Made Easy .</p>
				<h4>Accounts</h4>
				<p>When you create an account with us, you must provide us information that is accurate, complete, and current at all times. Failure to do so constitutes a breach of the Terms, which may result in immediate termination of your account on our Service.</p>
				<p>You are responsible for safeguarding the password that you use to access the Service and for any activities or actions under your password, whether your password is with our Service or a third-party service.</p>
				<p>You agree not to disclose your password to any third party. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</p>
				<h4>Links To Other Web Sites</h4>
				<p>Our Service may contain links to third-party web sites or services that are not owned or controlled by Occassions Made Easy .</p>
				<p>Occassions Made Easy has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Occassions Made Easy shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>
				<p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>
				<h4>Termination
				</h4>
				<p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>
				<p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability</p>.
				<p>We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>
				<p>Upon termination, your right to use the Service will immediately cease. If you wish to terminate your account, you may simply discontinue using the Service.</p>
				<p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>
				<h4>Governing Law</h4>
				<p>These Terms shall be governed and construed in accordance with the laws of Philippines, without regard to its conflict of law provisions.</p>
				<p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>
				<h4>Changes</h4>
				<p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>
				<p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>
				<h4>Contacts</h4>	
				<p>If you have any questions about these Terms, please contact us.</p>
		      </div></div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>

<?php
        
    include_once("footeradmin.php");

?>