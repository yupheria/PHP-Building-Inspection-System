<div id="header">
	Select building contact person
</div>					
<div id="buildingwizard">
	
	<p>
		1. <input type="radio" name="type" value="existingcontact" /> Existing contact:
			<select name="contactslist" id="contactslist">
				<?php
					foreach($clientlist as $client)
					{
						echo "<option value=\"".$client['id']."\" >".$client['first_name']." ".$client['last_name']."</option>";
					}
				
				 ?>
				<option value="contact1">Sample contact 1</option>
				<option value="contact2">Sample contact 2</option>
				<option value="contact3">Sample contact 3</option>
				<option value="contact4">Sample contact 4</option>
				<option value="contact5">Sample contact 5</option>
			</select>
	</p>
			<hr class="or" /><span class="orspan">or</span><hr class="or" />
	<p>
		2. <input type="radio" name="type" value="newcontact" id="newcontact" /> Add a new contact
	</p>
	
			<hr style="width:600px; margin:auto;" />
	
	<div id="role">
		<h3>Role:</h3>
		
		
		<p>
			<input type="radio" name="role" value="owner" /> <input type="text" name="rolefield1" value="Owner" />
			<input type="radio" name="role" value="office_manager" /> <input type="text" name="rolefield2" value="Office Manager" />
			<input type="radio" name="role" value="receptionist" /> <input type="text" name="rolefield3" value="Receptionist" />
			<input type="radio" name="role" value="body_corporate" /> <input type="text" name="rolefield4" value="Body Corporate" />
			<input type="radio" name="role" value="owner" /> Add new
		</p>
		
		<input type="submit" name="back" id="backStepTwo" value="Back" class="nextButton buttonBlack" />
		
		<input type="submit" name="next" id="nextFinsh" value="Finish" class="nextButton buttonBlack" />
		
		<br style="clear: both;" />
		
		<div class="ui-progressbar ui-widget ui-widget-content ui-corner-all">
		   <div style="width: 70%;" class="ui-progressbar-value ui-widget-header ui-corner-left"></div>
		</div>
		
	</div>
</div>