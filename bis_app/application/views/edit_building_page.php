<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-100 altbox">
		<div class="boxin">
			<div class="header">
				<h3>Edit a Building</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/buildingmanagement/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4), '&laquo; Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						echo anchor('#', 'Save &raquo;', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
						//echo anchor('#', 'Apply &raquo;', array('class' => 'buttonBlack', 'id' => 'applyButton'));
					?>
										
				</span>
			</div>
			<form class="fields edit_building_page" action="<?php echo base_url(); ?>buildingmanagement/edit_building" method="post">
                               <label style="color: red;">* Mandatory</label>
				<?php foreach($record as $row) :?>
                                <input type="hidden" id="buildingid" name="buildingid" value="<?php echo $row->id;?>" class="txt" />
				<label for="buildingname">Building Name *</label>
				<input type="text" maxlength="60" id="buildingname" name="buildingname" value="<?php echo $row->buildingname;?>" class="txt" />
				
                                <label for="description">Description *</label>
				<input type="text" maxlength="60" id="description" name="description" value="<?php echo $row->description;?>" class="txt" />
                                
                                <label for="site">Site *</label>
				<select name="site" id="site">
					<?php			
						foreach($sites as $site) {
								if($row->site == $site->id) {
								echo "<option selected value='".$site->id."'>".$site->sitename."</option>"; 
								} else {
								echo "<option value='".$site->id."'>".$site->sitename."</option>";
								}								
						}
					?>
				</select>
                                
				<label for="address_line_1">Address line 1 *</label>
				<input type="text" maxlength="60" id="address_line_1" name="address_line_1" value="<?php echo $row->address_line_1;?>" class="txt" />
                                
                                <label for="address_line_2">Address line 2</label>
				<input type="text" maxlength="60" id="address_line_2" name="address_line_2" value="<?php echo $row->address_line_2;?>" class="txt" />
				
				 <label for="suburb">Suburb *</label>
				<input type="text" maxlength="60" id="suburb" name="suburb" value="<?php echo $row->suburb;?>" class="txt" />
                                
                                <label for="city">City *</label>
				<input type="text" maxlength="60" id="city" name="city" value="<?php echo $row->city;?>" class="txt" />
                                
                                <label for="country">Country *</label>
                                <select id="country" name="country">
				<?php                              
                                foreach($countries as $country) {                                 
                                    if($country->id == $row->country) {
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
                                    if($row->levels_above == $i) {
                                    echo "<option selected value=".$i.">".$i."</option>";
                                    } else {
                                    echo "<option value=".$i.">".$i."</option>";                                          
                                    }
                                }
                                ?>
                                </select>
                                
                                <label for="levels_below">Number of Levels below Ground level *</label>
				 <select id="levels_below" name="levels_below">
                                <?php
                                for($i = 0; $i < 6; $i++) {
                                    if($row->levels_below == $i) {
                                    echo "<option selected value=".$i.">".$i."</option>";
                                    } else {
                                    echo "<option value=".$i.">".$i."</option>";                                          
                                    }
                                }
                                ?>
                                </select>
                                
                                 <label for="month_contructed">Month Constructed *</label>
				<select id="month_contructed" name="month_contructed">
                                <?php
                                foreach($months as $month) {
                                    if($month->id == $row->month_contructed) {
                                    echo "<option selected value=".$month->id.">".$month->month."</option>";
                                    } else {
                                    echo "<option value=".$month->id.">".$month->month."</option>";                                          
                                    }
                                }
                                ?>
                                </select>
                                
                                <label for="year_constructed">Year Constructed *</label>
				<select id="year_constructed" name="year_constructed">
                                <?php
                                for($i = 1815; $i < 2012; $i++) {
                                    if($row->year_constructed == $i) {
                                    echo "<option selected value=".$i.">".$i."</option>";
                                    } else {
                                    echo "<option value=".$i.">".$i."</option>";                                          
                                    }
                                }
                                ?>
                                </select>
                                
                               <label for="map">Google Map Code</label>
                               <textarea id="map" name="map" value="<?php echo $row->map;?>" > </textarea> 
                                
				<?php endforeach;?>
			</form>
		</div>
	</div>
</div>