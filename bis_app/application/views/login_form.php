<div id="login">
	<?php //phpinfo(); ?>
	<div id="login_message"></div>
	<?php /* 
			Login form
		*/ ?>
	<div id="login_form" class="clearfix">
		<div class="header">
			<h1>BIS Login</h1>
			<ul>
				<li><a href="http://capitalplanning.co.nz/wp-login.php?action=lostpassword" id="forgotten">Forgot Password</a></li>
				<li><a href="http://bis.capitalplanning.co.nz/index.php/login/registration_form" class="active" id="logintab">Register</a></li>
			</ul>
		</div>
		<form name="loginform" id="loginform" onsubmit="return false;">
			<div class="msg msg-info">
				<p>Please login with your Username and Password.</p>
			</div>
                        <div style="width: 330px; float:left; padding-bottom: 10px; padding-left: 5px;">
			<p> 
				<label  for="email">Username<br /> 
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
                        </div>
                        <div style="width: 330px; float:right;">
                           <p><strong>BIS - Building Inspection System.</strong> <br />
                               Designed for building inspectors, the building industry and real estate companies. <br />
<strong>BIS</strong> records and manages online warrant of fitness and inspections of commercial and industrial buildings. <br />
<ul>
<li>improve your work efficiency</li> 
<li>reduce staff workload</li> 
<li>automate the inspecting process </li> 
<li>reduce the paper work.</li>
</ul> 
                       </div>
                           
		</form>
                 
		 <?php $this->load->view('footer');?>
            
	</div>
</div>
