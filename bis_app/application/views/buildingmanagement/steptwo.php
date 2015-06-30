<div id="header">
	Add new building to a site
</div>
<div id="buildingwizard">
	
		
	<p>
		1. <input type="radio" name="type" value="onebuildingonlysite" /> This site has only one building
	</p>
	
	<hr class="or" /><span class="orspan">or</span><hr class="or" />
	
	<p>
		2. <input type="radio" name="type" value="exisitingsite" /> Existing site:
			<select name="siteslist" id="siteslist">
				<option value="site1">Sample site 1</option>
				<option value="site2">Sample site 2</option>
				<option value="site3">Sample site 3</option>
				<option value="site4">Sample site 4</option>
				<option value="site5">Sample site 5</option>
			</select>
	</p>
	
		<hr class="or" /><span class="orspan">or</span><hr class="or" />
	
	
	<p>
		3. <input type="radio" name="type" value="newsite" id="newsite" /> New site
	</p>
	
	<div class="hidden" id="existing_site_options">
		<label for="site_name">Site name:</label>
		<input type="text" name="site_name" value="" />
		
		<label for="address">Address:</label>
		<textarea name="address" id="address"></textarea>
		
		<label for="site_owner">Site owner:</label>
		<select name="ownerslist" id="ownerslist">
			<option value="owner1">Sample owner 1</option>
			<option value="owner2">Sample owner 2</option>
			<option value="owner3">Sample owner 3</option>
			<option value="owner4">Sample owner 4</option>
			<option value="new" id="newcontact">Create a new contact...</option>
		</select>
			<br style="clear: both;" />
		
	</div>
	
	<input type="submit" name="back" id="backStepOne" value="Back" class="nextButton buttonBlack back" />
	
	<input type="submit" name="next" id="nextStepThree" value="Next" class="nextButton buttonBlack" />
	
	<br style="clear: both;" />
	
	<p>Progress:</p>
	<div class="ui-progressbar ui-widget ui-widget-content ui-corner-all">
	   <div style="width: 33%;" class="ui-progressbar-value ui-widget-header ui-corner-left"></div>
	</div>
	
</div>
