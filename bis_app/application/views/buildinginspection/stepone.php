<div id="header">
	Perform an inspection
</div>
<div id="buildingwizard">
	
	<label for="name">Select building:</label>
	<select>
		<option>Capital Planning</option>
		<option>Big Town Business</option>
	</select>
	
	
	<hr class="or" /><span class="orspan">or</span><hr class="or" />
	
	<p>
		1. <input type="radio" name="type" value="existingcontact" /> Search by contact:
			<select name="contactslist" id="contactslist">
				<option value="contact1">Sample contact 1</option>
				<option value="contact2">Sample contact 2</option>
				<option value="contact3">Sample contact 3</option>
				<option value="contact4">Sample contact 4</option>
				<option value="contact5">Sample contact 5</option>
			</select>
	</p>
	
	<input type="submit" name="next" id="nextStepTwo" value="Next" class="nextButton buttonBlack" />
	
	<br style="clear: both;" />
	
	<p>Progress:</p>
	<div class="ui-progressbar ui-widget ui-widget-content ui-corner-all">
	   <div style="width: 10%;" class="ui-progressbar-value ui-widget-header ui-corner-left"></div>
	</div>
</div>	