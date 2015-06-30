<div id="login">
	<?php /* 
		Here, we set an empty div which we'll populate
		and add styles using the jQuery UI classes.
	*/ ?>
	<div id="login_message"></div>
	<?php /* 
			Login form
		*/ ?>
	<div id="login_form" class="clearfix">
		<div class="header">
			<h1>Target Marketing Business Registration</h1>
			<ul>
				<!--<li><a href="http://storecrm.capitalplanning.co.nz/wp-login.php?action=lostpassword" id="forgotten">Forgot Password</a></li>-->
				<!--<li><a href="#" class="active" id="logintab">login</a></li>-->
                                <!--<li><a href="#" id="register">Register</a></li>-->
			</ul>
		</div>
            <form name="bisregister" id="bisregister" onsubmit="return false;">
			<div class="msg msg-info">
				<p>Please enter your registration details here <br />
                                   <font color="red" size="3">*</font> Required
                                </p>
			</div>
                        <div style="width: 330px; float:left; padding-bottom: 10px; padding-left: 5px;">
			<p> 
				<label 	for="client_name"><font color="red" size="3">*</font>Name<br /> 
				<input 	type="text" 
						name="client_name" 
						id="client_name" 
						class="inputFields" 
						value="" 
						size="20" 
						tabindex="1" />
				</label> 
			</p> 
                        <p> 
				<label 	for="email"><font color="red" size="3">*</font>Email<br /> 
				<input 	type="text" 
						name="email" 
						id="email" 
						class="inputFields" 
						value="" 
						size="20" 
						tabindex="2" />
				</label> 
			</p>
                        <p> 
				<label 	for="company"><font color="red" size="3">*</font>Company<br /> 
				<input 	type="text" 
						name="company" 
						id="company" 
						class="inputFields" 
						value="" 
						size="20" 
						tabindex="3" />
				</label> 
			</p>
                        <p> 
				<label 	for="phone_number"><font color="red" size="3">*</font>Phone Number<br /> 
				<input 	type="text" 
						name="phone_number" 
						id="phone_number" 
						class="inputFields" 
						value="" 
						size="20" 
						tabindex="4" />
				</label> 
			</p>
                        <p> 
				<label 	for="username"><font color="red" size="3">*</font>Username<br /> 
				<input 	type="text" 
						name="username" 
						id="username" 
						class="inputFields" 
						value="" 
						size="20" 
						tabindex="5" />
				</label> 
			</p>
			<p> 
				<label 	for="user_password"><font color="red" size="3">*</font>Password <br /> 
				<input 	type="password" 
						name="user_password" 
						id="user_password" 
						class="inputFields" 
						value="" 
						size="20" 
						tabindex="6" />
				</label> 
			</p>
                        <p> 
				<label 	for="user_password1"><font color="red" size="3">*</font>Confirm Password <br /> 
				<input 	type="password" 
						name="user_password1" 
						id="user_password1" 
						class="inputFields" 
						value="" 
						size="20" 
						tabindex="7" />
				</label> 
			</p>
			<p> 
				<input type="checkbox" name="license" id="license" value="Agree">&nbsp;&nbsp;<a href="<?php echo base_url().'CP Web Licence2.docx.pdf'?>">I agree to the terms and conditions</a>
			</p>
			<p class="submit"> 
				<input 	type="button" 
						name="regtargetbuss" 
						id="regtargetbuss" 
						value="Register" 
						class="buttonLogin"
						tabindex="8" /> 
			</p>
                        </div>
                        <div style="width: 330px; float:right;">
                           <p><strong>Target Marketing Business</strong> <br />
                           Designed for business and sales people to sell more products and services. <br />
                           <strong>Target Marketing Business</strong> records and manages client and prospects, suppliers and sales records
                           </p>
                        <ul>
                        <li>automatic activities list of next calls and renewals </li>
                        <li>capitalize on every sales opportunity </li>
                        <li>sort, select and filter and get the best prospects</li>
                        <li>real time access to clients, sales and suppliers information</li>
                       </ul></div>
		</form> 
		 <?php $this->load->view('footer'); ?>
	</div>
</div>