<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-100 altbox">
		<div class="boxin">
			<div class="header">
				<h3>Add Areas</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/buildingmanagement/view_area_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4), '&laquo; Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						echo anchor('#', 'Save &raquo;', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
						//echo anchor('#', 'Apply &raquo;', array('class' => 'buttonBlack', 'id' => 'applyButton'));
					?>
										
				</span>
			</div>
			<form class="fields add_areas_page" action="<?php echo base_url(); ?>buildingmanagement/add_areas" method="post">
				<label style="color: red;">* Mandatory</label>
                                <?php foreach($record as $row) :?>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label>Building Name:</label>
                                            </td>
                                            <td>
                                                <label><?php echo $row->buildingname; ?></label>
                                                <input type="hidden" id="buildingid" name="buildingid" value="<?php echo $this->uri->segment(4);?>" class="txt" />
                                                <input type="hidden" id="above" name="above" value="<?php echo $this->uri->segment(5);?>" class="txt" />
                                                <input type="hidden" id="site" name="site" value="<?php echo $this->uri->segment(3);?>" class="txt" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <label>Area Name *</label> 
                                            </td>
                                            <td>
                                                <input type="text" maxlength="60" id="area_name" name="area_name" value="" size="50" class="txt" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <label for="description">Description *</label> 
                                            </td>
                                            <td>
                                               <input type="text" maxlength="60" id="description" name="description" value="" size="50" class="txt" /> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                          <label for="area_level">Area Level <?php 
                                            if($this->uri->segment(5) == 1){
                                                echo " Above";
                                                $levels = $row->levels_above;
                                                $above = true;
                                            } else {
                                                echo " Below";
                                                $levels = $row->levels_below;
                                                $above = false;
                                            }
                                            $levels++;
                                            ?>*</label>   
                                            </td>
                                            <td>
                                                            <select id="area_level" name="area_level">
                                            <?php
                                               if($above) {
                                                for($i=0;$i<$levels;$i++) {
                                                   if($i != 0) {
                                                   echo "<option value=".$i.">".$i."</option>";
                                                   } else {
                                                   echo "<option value=".$i.">G</option>";    

                                                   }

                                               }
                                               } else {
                                                   for($i=1;$i<$levels;$i++) {
                                                   echo "<option value=".$i.">".$i."</option>";
                                               }
                                               }
                                            ?>
                                            </select>
                                            </td>
                                        </tr>
                                            <tr>
                                            <td>
                                                <label for="room_number">Room Number *</label>
                                            </td>
                                            <td>
                                                <input type="room_number" maxlength="60" id="room_number" name="room_number" value="" size="50" class="txt" />
                                            </td>
                                        </tr>
				<?php endforeach;?>
                                </tbody>
                                </table>
			</form>
		</div>
	</div>
</div>