<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-100 altbox">
		<div class="boxin">
			<div class="header">
                            
				<h3>Edit Area</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/buildingmanagement/view_area_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4), '&laquo; Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						if($this->session->userdata('access_level')<3){
                                                echo anchor('#', 'Save &raquo;', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
                                                }//echo anchor('#', 'Apply &raquo;', array('class' => 'buttonBlack', 'id' => 'applyButton'));
					?>
										
				</span>
			</div>
			<form class="fields edit_areas_page" action="<?php echo base_url(); ?>buildingmanagement/edit_areas" method="post">
				<label style="color: red;">* Mandatory</label>
                                <?php foreach($record as $row) :?>                               
                                <?php foreach($building as $build): ?>
                                <label for="area_name">Building Name:</label>
                                <label> <?php echo $build->buildingname;?></label>
                                <input type="hidden" id="buildingid" name="buildingid" value="<?php echo $build->id?>" class="txt" />
                                <input type="hidden" id="above" name="above" value="<?php echo $row->above?>" class="txt" />
                                <input type="hidden" id="areaid" name="areaid" value="<?php echo $row->id?>" class="txt" />
                                <input type="hidden" id="site" name="site" value="<?php echo $this->uri->segment(3)?>" class="txt" />
                                <?php endforeach; ?>
				<label for="area_name">Area Name *</label>
				<input type="text" maxlength="60" id="area_name" name="area_name" value="<?php echo $row->area_name?>" class="txt" />
                                
                                <label for="description">Description *</label>
				<input type="text" maxlength="60" id="description" name="description" value="<?php echo $row->description?>" class="txt" />
                                
                                <label for="area_level">Area Level <?php 
                                if($row->above == 1){
                                    echo " Above";
                                    $levels = $build->levels_above;
                                    $above = true;
                                } else {
                                    echo " Below";
                                    $levels = $build->levels_below;
                                    $above = false;
                                }
                                $levels++;
                                ?>*</label>            
				<select id="area_level" name="area_level">
                                <?php
                                   if($above) {
                                    for($i=0;$i<$levels;$i++) {
                                       if($i != 0) {
                                           if($row->area_level == $i) {
                                               echo "<option selected value=".$i.">".$i."</option>";
                                           } else {
                                               echo "<option value=".$i.">".$i."</option>";
                                           }                                    
                                       } else {
                                           if($row->area_level == $i) {
                                               echo "<option selected value=".$i.">G</option>";
                                           } else {
                                               echo "<option value=".$i.">G</option>";
                                           }                                      
                                       }
                                       
                                   }
                                   } else {
                                       for($i=1;$i<$levels;$i++) {
                                           if($row->area_level == $i) {
                                           echo "<option selected value=".$i.">".$i."</option>";
                                           } else {
                                           echo "<option value=".$i.">".$i."</option>";    
                                           }
                                   }
                                   }
                                ?>
                                </select>
                                
                                 <label for="room_number">Room Number *</label>
				<input type="room_number" maxlength="60" id="room_number" name="room_number" value="<?php echo $row->room_number?>" class="txt" />
				<?php endforeach;?>
			</form>
		</div>
	</div>
</div>