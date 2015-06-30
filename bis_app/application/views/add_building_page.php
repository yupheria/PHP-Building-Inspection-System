<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-100 altbox">
		<div class="boxin">
			<div class="header">
				<h3>Add a Building</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/buildingmanagement', '&laquo; Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						echo anchor('#', 'Save &raquo;', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
						//echo anchor('#', 'Apply &raquo;', array('class' => 'buttonBlack', 'id' => 'applyButton'));
					?>
										
				</span>
			</div>
			<form class="fields add_building_page" action="<?php echo base_url(); ?>buildingmanagement/add_building" method="post">
				<label style="color: red;">* Mandatory</label>
                                
				<label for="buildingname">Building Name *</label>
				<input type="text" maxlength="60" id="buildingname" name="buildingname" value="" class="txt" />
                                
                                <label for="Description">Description *</label>
				<input type="text" maxlength="60" id="description" name="description" value="" class="txt" />
                                
                                <label>Site: </label>
				
					<?php
						foreach($sites as $site) {
						if($site->id == $this->uri->segment(3)) {
                                                    echo $site->sitename;
                                                }
						}
					?>
				<input type="hidden" id="site" name="site" value="<?php echo $this->uri->segment(3)?>" class="txt" />
				<label for="address_line_1">Address line 1 *</label>
				<input type="text" maxlength="60" id="address_line_1" name="address_line_1" value="" class="txt" />
                                
                                <label for="address_line_2">Address line 2</label>
				<input type="text" maxlength="60" id="address_line_2" name="address_line_2" value="" class="txt" />
                                
                                <label for="suburb">Suburb *</label>
				<input type="text" maxlength="60" id="suburb" name="suburb" value="" class="txt" />
                                
                                <label for="city">City *</label>
				<input type="text" maxlength="60" id="city" name="city" value="" class="txt" />
                                
                                <label for="country">Country *</label>
                                <select id="country" name="country">
				<?php                              
                                foreach($countries as $country){
                                        if($country->id == 162) {
                                        echo "<option selected value=".$country->id.">".$country->name."</option>";    
                                        } else {
                                        echo "<option value=".$country->id.">".$country->name."</option>";
                                        }
                                    }
                                ?>
				</select>
                                
                                <label for="levels_above">Number of Levels above Ground level *</label>
				<select id="levels_above" name="levels_above">
                                <?php
                                for($i = 0; $i < 161; $i++) {
                                    echo "<option value=".$i.">".$i."</option>";
                                }
                                ?>
                                </select>
                                
                                <label for="levels_below">Number of Levels below Ground level *</label>
				 <select id="levels_below" name="levels_below">
                                <?php
                                for($i = 0; $i < 6; $i++) {
                                    echo "<option value=".$i.">".$i."</option>";
                                }
                                ?>
                                </select>
                                
                                 <label for="month_contructed">Month Constructed *</label>
				<select id="month_contructed" name="month_contructed">
                                <?php
                                foreach($months as $month){
                                    echo "<option value=".$month->id.">".$month->month."</option>";
                                }
                                ?>
                                </select>
                                
                                <label for="year_constructed">Year Constructed *</label>
				<select id="year_constructed" name="year_constructed">
                                <?php
                                for($i = 1815; $i < 2012; $i++) {
                                    echo "<option value=".$i.">".$i."</option>";
                                }
                                ?>
                                </select>                                                                                         
                                
                               <label for="map">Google Map Code</label>
                               <textarea id="map" name="map" value="" > </textarea> 
				
				
			</form>
		</div>
	</div>
</div>