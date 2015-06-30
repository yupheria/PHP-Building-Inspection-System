<div class="box box-75">
		<div class="boxin">
			<div class="header">
				<h3>Buildings</h3>
				<span id="toolbar">
				<?php 
                                        if($this->uri->segment(3) && $this->session->userdata('access_level')<3) {
					echo anchor('index.php/buildingmanagement/add_building_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4), 'Add &raquo;', array('class' => 'buttonBlack', 'id' => 'addButton')); 
                                        } ?>
				</span>
			</div>
                    
			<div class="content">
				<table cellspacing="0" style="table-layout: fixed;">
					<thead>
						<tr>
							<!--<th class="first" class="groupid"></th>-->
							<th class="tc last" style="width: 130px;">Building Name</th>
							<th class="tc last">Option</th>
                                                        
						</tr>
					</thead>
                                        <?php if($selectedBuildings != null) :?>
					<tbody>
					<?php
						
                                        foreach($selectedBuildings as $building) {
								if($this->uri->segment(5)==$building->id) {
                                                                    echo "<tr class='highlight'>";
                                                                } else {
                                                                    echo "<tr>";
                                                                }
								echo "<td style='overflow:hidden;'>";
                                                                echo anchor('index.php/buildingmanagement/view_building/'.$this->uri->segment(3).'/'.$building->site.'/'.$building->id, $building->buildingname);
								echo "</td>";
                                                                echo "<td>";
								
								echo anchor('index.php/buildingmanagement/view_levels/'.$this->uri->segment(3).'/'.$building->site.'/'.$building->id, 'View');
                                                                
                                                                echo "</td>";
								echo "</tr>";
							}
                                         
						?>
					</tbody>
                                         <?php endif;?>
				</table>
			</div>
                    
		</div>
	</div>