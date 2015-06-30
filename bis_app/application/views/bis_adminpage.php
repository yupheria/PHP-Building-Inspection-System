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
			<h1>BIS Administration</h1>
			<ul>
				<!--<li><a href="http://storecrm.capitalplanning.co.nz/wp-login.php?action=lostpassword" id="forgotten">Forgot Password</a></li>-->
				<!--<li><a href="#" class="active" id="logintab">login</a></li>-->
                                <!--<li><a href="#" id="register">Register</a></li>-->
			</ul>
		</div>
            <form name="bis_adminpage" id="bis_adminpage" onsubmit="return false;">
			<div class="msg msg-info">
				<p>Please put your registration details here <br />
                                   <font color="red" size="3">*</font> Required
                                </p>
			</div>
                        <div style="width: 330px; float:left; padding-bottom: 10px; padding-left: 5px;">
			<p> 
				<label 	for="username"><font color="red" size="3">*</font>Username<br /> 
				<input 	type="text" 
						name="username" 
						id="username" 
						class="inputFields" 
						value="" 
						size="20" 
						tabindex="1" />
				</label> 
			</p> 
                        <p> 
				<label 	for="password"><font color="red" size="3">*</font>Password<br /> 
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
						name="bisadmin" 
						id="bisadmin" 
						value="Login" 
						class="buttonLogin"
						tabindex="8" />
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
		 <?php $this->load->view('footer'); ?>
	</div>
</div>