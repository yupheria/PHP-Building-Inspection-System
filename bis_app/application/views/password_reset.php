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
			<h1>BIS Login</h1>
			<ul>
				<li><a href="#" class="active" id="passwordreset">password reset</a></li>
				<li><a href="#" id="logintab">login</a></li>
				<li><a href="#" id="lostpasswordtab">lost password</a></li>
			</ul>
		</div>
		<form name="passwordreset" id="passwordreset" onsubmit="return false;">
			<div class="msg msg-info">
				<p>Please reset your password for <?php echo $email_address; ?>.</p>
			</div>
			<p> 
				<label 	for="password">Password<br /> 
				<input 	type="password" 
						name="password" 
						id="password" 
						class="inputFields" 
						value="" 
						size="20" 
						tabindex="2" />
				</label> 
			</p> 
			<p> 
				<label 	for="password">Password Again<br /> 
				<input 	type="password" 
						name="password" 
						id="password" 
						class="inputFields" 
						value="" 
						size="20" 
						tabindex="2" />
				</label> 
			</p> 
			<p class="submit"> 
				<input 	type="button" 
						name="btnLogin" 
						id="btnLogin" 
						value="Log In" 
						class="buttonLogin"
						tabindex="3" /> 
			</p> 
		</form> 
		<form name="loginform" id="loginform" onsubmit="return false;">
			<div class="msg msg-info">
				<p>Please login with your email address and password.</p>
			</div>
			<p> 
				<label 	for="email">Email Address<br /> 
				<input 	type="text" 
						name="email" 
						id="email" 
						class="inputFields" 
						value="" 
						size="20" 
						tabindex="1" />
				</label> 
			</p> 
			<p> 
				<label 	for="password">Password<br /> 
				<input 	type="password" 
						name="password" 
						id="password" 
						class="inputFields" 
						value="" 
						size="20" 
						tabindex="2" />
				</label> 
			</p> 
			<p class="submit"> 
				<input 	type="button" 
						name="btnLogin" 
						id="btnLogin" 
						value="Log In" 
						class="buttonLogin"
						tabindex="3" /> 
			</p> 
		</form> 
		<form name="retrievepassword" id="retrievepassword" onsubmit="return false;" class="hidden">
			<div class="msg msg-info">
				<p>Please enter your email address to reset password.<br />
				We will send a confirmation link to that address with further instructions.</p>
			</div>
			<p> 
				<label 	for="email_for_reset">Email Address<br /> 
				<input 	type="text" 
						name="email_for_reset" 
						id="email_for_reset" 
						class="inputFields" 
						value="" 
						size="20" 
						tabindex="1" />
				</label> 
			</p> 
			<p class="submit"> 
				<input 	type="button" 
						name="btnRetrievePassword" 
						id="btnRetrievePassword" 
						value="Retrieve Password" 
						class="buttonLogin"
						tabindex="3" /> 
			</p> 
		</form> 
		
	</div>
</div>