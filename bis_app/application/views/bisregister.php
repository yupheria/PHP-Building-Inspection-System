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
			<h1>Building Inspection System Registration</h1>
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
						name="regbis" 
						id="regbis" 
						value="Register" 
						class="buttonLogin"
						tabindex="8" /> 
			</p>
                        </div>
                        <div style="width: 330px; float:right;">
                           <p><strong>BIS - Building Inspection System.</strong> <br />
                               Designed for building inspectors to web enable and improve the complete inspection cycle <br />
<strong>BIS</strong> records and manages online warrant of fitness and inspections of commercial and industrial buildings. <br />
<ul>
<li>improve your work efficiency</li> 
<li>reduce staff workload</li> 
<li>automate the inspecting process </li> 
<li>reduce the paper work</li>
<li>real time access to all building and inspection information</li>
</ul>
                       </div>
		</form> 
		 <?php $this->load->view('footer'); ?>
	</div>
</div>