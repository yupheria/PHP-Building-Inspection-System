<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-50 redbox">
		<div class="boxin">
			<div class="header">
				<h3>Delete Hazard</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/buildinginspection/view_hazard/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8).'/'.$this->uri->segment(9), 'Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						echo anchor('#', 'Delete', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
						//echo anchor('#', 'Apply &raquo;', array('class' => 'buttonBlack', 'id' => 'applyButton'));
					?>
										
				</span>
			</div>
			<form class="fields delete_hazard_page" action="<?php echo base_url(); ?>buildinginspection/delete_hazard" method="post">
                            <?php foreach($hazard as $haz) :?>
                             <label>Are you sure you want to delete this hazard?</label>
                            <input type="hidden" id="hid" value="<?php echo $this->uri->segment(9);?>"/> 
                            <input type="hidden" id="inspectcompany" value="<?php echo $this->uri->segment(3);?>"/>
                            <input type="hidden" id="inspectsite" value="<?php echo $this->uri->segment(4);?>"/> 
                            <input type="hidden" id="inspectbuilding" value="<?php echo $this->uri->segment(5);?>"/> 
                            <input type="hidden" id="above" value="<?php echo $this->uri->segment(6);?>"/> 
                            <input type="hidden" id="level" value="<?php echo $this->uri->segment(7);?>"/> 
                            <input type="hidden" id="area" value="<?php echo $this->uri->segment(8);?>"/> 
                            <label for="hname">Hazard Name: <?php echo $haz->name; ?></label>
                            <label for="hdate">Inspected Date: <?php echo date('d-m-Y',strtotime($haz->date)); ?></label>
                            <label for="harea">Building Area:                       
                                <?php
                                foreach($areas as $area) {
                                    if($area->id == $haz->area) {
                                        echo " ".$area->area_name;
                                    } 
                                }
                                ?>
                            </label>
                            
                            <label for="hlevel">Hazard Level: 
                            
                                <?php
                                foreach($hazard_levels as $level) {
                                    if($level->id == $haz->level) {
                                        echo " ".$level->levels;
                                    }
                                }
                                ?>
                             </label>
                             <label for="hstatus">Hazard Status: 
                                <?php
                                foreach($status as $stats) {
                                    if($stats->id == $haz->status) {
                                        echo " ".$stats->status;
                                    } 
                                }
                                ?>
                             </label>
                             <label for="hdescriptio">Hazard Description: <?php echo $haz->description; ?></label>
                             <label for="hsolution">Hazard Solution: <?php echo $haz->solution; ?></label>
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
		</div>
	</div>
</div>