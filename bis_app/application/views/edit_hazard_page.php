<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-100 altbox">
		<div class="boxin">
			<div class="header">
				<h3>Edit a Hazard</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/buildinginspection/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5), '&laquo; Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						if($this->session->userdata('access_level')<3) {
                                                echo anchor('#', 'Save &raquo;', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
                                                }
						//echo anchor('#', 'Apply &raquo;', array('class' => 'buttonBlack', 'id' => 'applyButton'));
					?>
										
				</span>
			</div>
			<form class="fields edit_hazard_page" action="<?php echo base_url(); ?>buildinginspection/edit_hazard" method="post">
                      
                            <?php foreach($hazard as $haz) :?>
                            <label style="color: red;">* Mandatory</label>
                            <input type="hidden" id="hid" value="<?php echo $this->uri->segment(6);?>"/> 
                            <input type="hidden" id="inspectcompany" value="<?php echo $this->uri->segment(3);?>"/> 
                            <input type="hidden" id="inspectsite" value="<?php echo $this->uri->segment(4);?>"/> 
                            <input type="hidden" id="inspectbuilding" value="<?php echo $this->uri->segment(5);?>"/> 
                            <label for="hname">Hazard Name: </label>
                            <input id="hname" maxlength="60" type="text" value="<?php echo $haz->name; ?>" class="txt" />
                            <label for="hdate">Inspected Date: </label>
                            <input class="inputDate" id="inputDate" value="<?php echo $haz->date; ?>">
                            <label for="harea">Building Area: </label>
                            <select id="harea">
                                <?php
                                foreach($areas as $area) {
                                    if($area->id == $haz->area) {
                                        echo "<option selected value=".$area->id.">".$area->area_name."</option>";
                                    } else {
                                        echo "<option value=".$area->id.">".$area->area_name."</option>";
                                    }
                                }
                                ?>
                            </select>
                            <label for="hlevel">Hazard Level: </label>
                            <select id="hlevel">
                                <?php
                                foreach($hazard_levels as $level) {
                                    if($level->id == $haz->level) {
                                        echo "<option selected value=".$level->id.">".$level->levels."</option>";
                                    } else {
                                        echo "<option value=".$level->id.">".$level->levels."</option>";
                                    }
                                }
                                ?>
                            </select>
                             <label for="hstatus">Hazard Status: </label>
                             <select id="hstatus">
                                <?php
                                foreach($status as $stats) {
                                    if($stats->id == $haz->status) {
                                        echo "<option selected value=".$stats->id.">".$stats->status."</option>";
                                    } else {
                                        echo "<option value=".$stats->id.">".$stats->status."</option>";
                                    }
                                }
                                ?>
                            </select>
                             <label for="hdescriptio">Hazard Description: </label>
                             <textarea id="hdescription"><?php echo $haz->description; ?> </textarea>
                             <label for="hsolution">Hazard Solution: </label>
                             <textarea id="hsolution"><?php echo $haz->solution; ?> </textarea>
                             <label>Hazard Image: </label>
                             <?php
                             $img = null;
                             if($haz->img != null) {
                                 echo "<img src=".base_url()."/uploads/".$haz->img." />";
                                 $img = $haz->img;
                             } else {
                                 echo "No Image Available";
                             }
                             ?>
                             <?php endforeach;?>
                        </form>     
			
                        <?php echo form_open_multipart('index.php/buildinginspection/upload_img/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6)); ?>
                        <input name="myFile" size="40" type="file" />
                        <input type="submit" value="Upload" />
                        
                        
		</div>
	</div>
</div>