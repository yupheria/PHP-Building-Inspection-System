<div id="container">
	<div class="box box-100 altbox">
		<div class="boxin">
			<div class="header">
				<h3>Hazard List</h3>
				<span id="toolbar">
					<?php 
						//echo anchor('index.php/buildinginspection/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4), '&laquo; Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						//echo anchor('#', 'Delete &raquo;', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
						//echo anchor('#', 'Apply &raquo;', array('class' => 'buttonBlack', 'id' => 'applyButton'));
					?>
										
				</span>
			</div>
               <div class="content">
                <table>
                    <thead>
                    <td>Level</td>
                    <td>Area</td>
                    <td>Hazard</td>
                    <td>Hazard Level</td>
                    <td>Hazard Status</td>
                    <td>Hazard Description</td>
                    <td>Hazard Solution</td>
                    </thead>
                    <tbody>
                        <?php 
                        if($hazards != null) :
                        unset($hazards[0]);
                        foreach($hazards as $hazard) :
                        ?>
                        <tr>
                            <td>
                                <?php 
                                if($hazard->above == 1) {
                                    if($hazard->area_level == 0) {
                                      echo "G";   
                                    } else {
                                      echo $hazard->area_level;  
                                    }
                                } else {
                                echo "-".$hazard->area_level;    
                                }
                                        ?>
                            </td>
                            <td> 
                                <?php echo $hazard->area_name ?>
                            </td>
                            <td> 
                                <?php echo $hazard->name; ?>
                            </td>
                            <td> 
                                <?php foreach ($hazard_levels as $levels) { 
                                if($levels->id == $hazard->level) {
                                    echo $levels->levels;
                                } 
                                }
                                ?>
                            </td>
                            <td> 
                                <?php foreach ($status as $stats) { 
                                if($stats->id == $hazard->status) {
                                    echo $stats->status;
                                } 
                                }
                                ?>
                            </td>
                            <td> 
                                <?php echo $hazard->description; ?>
                            </td>
                            <td> 
                                <?php echo $hazard->solution; ?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php else: 
                         echo "<tr><td>No Hazards found</td></tr>";   
                        endif;
                         ?>
                    </tbody>
                </table> 
            </div>
		</div>
	</div>
</div>