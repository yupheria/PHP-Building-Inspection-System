<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-100 altbox">
		<div class="boxin">
			<div class="header">
				<h3>Add a Site</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/buildingmanagement', '&laquo; Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						echo anchor('#', 'Save &raquo;', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
						//echo anchor('#', 'Apply &raquo;', array('class' => 'buttonBlack', 'id' => 'applyButton'));
					?>
										
				</span>
			</div>
			<form class="fields add_site" action="<?php echo base_url(); ?>buildingmanagement/add_site" method="post">
				<label style="color: red;">* Mandatory</label>
				<label for="sitename">Site Name *</label>   
				<input type="text" maxlength="60" id="sitename" name="sitename" value="" class="txt" />
				
				<label for="address_line_1">Address Line 1 *</label>
				<input type="text" maxlength="60" id="address_line_1" name="address_line_1" value="" class="txt" />
                                
                                <label for="address_line_2">Address Line 2</label>
				<input type="text" maxlength="60" id="address_line_2" name="address_line_2" value="" class="txt" />
                                
                                <label for="suburb">Suburb *</label>
				<input type="text" maxlength="60" id="suburb" name="suburb" value="" class="txt" />
                                
                                <label for="city">City *</label>
				<input type="text" maxlength="60" id="city" name="city" value="" class="txt" />
                                
                                <label for="country">Country *</label>
				<select name="country" id="country">
                                  <?php
                                    foreach($countries as $country){
                                        echo "<option value=".$country->id.">".$country->name."</option>";
                                    }
                                  ?>
                                </select>
				
				<label for="company">Company *</label>
				<select name="company" id="company">
					<?php
						foreach($companylist as $company) {
						echo "<option value='".$company->id."'>".$company->company."</option>";
						}
					?>
				</select>
				
			</form>
		</div>
	</div>
</div>