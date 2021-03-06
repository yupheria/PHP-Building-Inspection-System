<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-100 altbox">
		<div class="boxin">
			<div class="header">
				<h3>Edit a Site</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/buildingmanagement/index/'.$this->uri->segment(3), '&laquo; Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						echo anchor('index.php/buildingmanagement/edit_site', 'Save &raquo;', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
						//echo anchor('#', 'Apply &raquo;', array('class' => 'buttonBlack', 'id' => 'applyButton'));
					?>
										
				</span>
			</div>
			<form class="fields edit_site" action="<?php echo base_url(); ?>buildingmanagement/edit_site" method="post">
				<label style="color: red;">* Mandatory</label>
                                
                                <?php foreach($record as $row) :?>
                                
				<label for="sitename">Site Name *</label>
				<input type="text" maxlength="60" id="sitename" name="sitename" value="<?php echo $row->sitename; ?>" class="txt" />
				
				<label for="address_line_1">Address Line 1 *</label>
				<input type="text" maxlength="60" id="address_line_1" name="address_line_1" value="<?php echo $row->address_line_1; ?>" class="txt" />
                                
                                <label for="address_line_2">Address Line 2</label>
				<input type="text" maxlength="60" id="address_line_2" name="address_line_2" value="<?php echo $row->address_line_2; ?>" class="txt" />
                                
                                <label for="suburb">Suburb *</label>
				<input type="text" maxlength="60" id="suburb" name="suburb" value="<?php echo $row->suburb; ?>" class="txt" />
                                
                                <label for="city">City *</label>
				<input type="text" maxlength="60" id="city" name="city" value="<?php echo $row->city; ?>" class="txt" />
                                
                                <label for="country">Country *</label>
				<select name="country" id="country">
                                  <?php
                                    foreach($countries as $country){
                                        if($country->id == $row->country) {
                                        echo "<option selected value=".$country->id.">".$country->name."</option>";    
                                        } else {
                                        echo "<option value=".$country->id.">".$country->name."</option>";
                                        }
                                    }
                                  ?>
                                </select>
				
				<label for="company">Company *</label>
				<select name="company" id="company">
					<?php
						foreach($companylist as $company) {
                                                if($company->id == $row->company) {
                                                echo "<option selected value='".$company->id."'>".$company->company."</option>";
                                                } else {
						echo "<option value='".$company->id."'>".$company->company."</option>";
                                                }
						}
					?>
				</select>
                                <input type="hidden" id="siteid" name="siteid" value="<?php echo $row->id; ?>" class="txt" />
				<?php endforeach;?>
			</form>
		</div>
	</div>
</div>