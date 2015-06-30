<?php

$this->load->view('navigation');

?>

<div id="container">
     <?php include('selection_action.php');?>
	
	<div class="box box-80">
		<div class="boxin">
			<div class="header">
				<h3>Building Details</h3>
				<span id="toolbar">
				<?php   if($record != null) {
                                           
					//echo anchor('index.php/buildingmanagement/edit_building_page/'.$building->id, 'Edit &raquo;', array('class' => 'buttonBlack', 'id' => 'addButton')); 
					echo anchor('index.php/buildingmanagement/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5), 'Back', array('class' => 'buttonBlack'));

                                        if($this->uri->segment(4) && $this->session->userdata('access_level')<3) {
                                        echo anchor('index.php/buildingmanagement/delete_building_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5), 'Delete', array('class' => 'buttonBlack', 'id' => 'addButton'));
                                        echo anchor('index.php/buildingmanagement/edit_building_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5), 'Edit', array('class' => 'buttonBlack', 'id' => 'addButton'));    
                                        }
					
                                        
                                }
				?>
				</span>
			</div>
		
		<div class="content clearfix">
				<table cellspacing="0" style="table-layout: fixed;" id="clientdetails">
					<thead>
						<tr>
							<!--<th class="first" class="groupid"></th>-->
							<th class="tc last" style="width:140px;">Fields</th>
							<th class="tc last">Info</th>
                                                        
						</tr>
					</thead>
					<tbody>
					<?php
					if($record != null) {		
                                        foreach($record as $building) {
								echo "<tr>";
								echo "<td>";
								echo "Name";
								echo "</td>";
								echo "<td style='overflow:hidden;'>";
								echo $building->buildingname;
								echo "</td>";
								echo "</tr>";
								
								echo "<tr>";
								echo "<td>";
								echo "Description";
								echo "</td>";
								echo "<td style='overflow:hidden;'>";
								echo $building->description;
								echo "</td>";
								echo "</tr>";
                                                                
                                                                echo "<tr>";
								echo "<td>";
								echo "Address Line 1";
								echo "</td>";
								echo "<td style='overflow:hidden;'>";
								echo $building->address_line_1;
								echo "</td>";
								echo "</tr>";
								
								echo "<tr>";
								echo "<td>";
								echo "Address Line 2";
								echo "</td>";
								echo "<td style='overflow:hidden;'>";
								echo $building->address_line_2;
								echo "</td>";
								echo "</tr>";
                                                                
                                                                echo "<tr>";
								echo "<td>";
								echo "Suburb";
								echo "</td>";
								echo "<td style='overflow:hidden;'>";
								echo $building->suburb;
								echo "</td>";
								echo "</tr>";
                                                                
                                                                echo "<tr>";
								echo "<td>";
								echo "City";
								echo "</td>";
								echo "<td style='overflow:hidden;'>";
								echo $building->city;
								echo "</td>";
								echo "</tr>";
                                                                
                                                                echo "<tr>";
								echo "<td>";
								echo "Country";
								echo "</td>";
								echo "<td>";
								foreach($countries as $country) {
                                                                    if($country->id == $building->country) {
                                                                        echo $country->name;
                                                                    }
                                                                }
								echo "</td>";
								echo "</tr>";
                                                                
                                                                echo "<tr>";
								echo "<td>";
								echo "Levels Above";
								echo "</td>";
								echo "<td>";
								echo $building->levels_above;
								echo "</td>";
                                                                
								echo "</tr>";
                                                                
                                                                 echo "<tr>";
								echo "<td>";
								echo "Levels Below";
								echo "</td>";
								echo "<td>";
								echo $building->levels_below;
								echo "</td>";
                                                                
                                                                
								echo "</tr>";
                                                                
                                                                echo "<tr>";
								echo "<td>";
								echo "Month Constructed";
								echo "</td>";
								echo "<td>";
								foreach($months as $month) {
                                                                    if($month->id == $building->month_contructed){
                                                                        echo $month->month;
                                                                    }
                                                                }
                                                               
								
                                                                echo "</td>";
								echo "</tr>";
                                                                
                                                                 echo "<tr>";
								echo "<td>";
								echo "Year Constructed";
								echo "</td>";
								echo "<td>";
								echo $building->year_constructed;
								echo "</td>";
								echo "</tr>";                                                                                                                         
                                                                $map = "";
                                                                $map = $building->map;
                                                                
							}
                                        } else {
                                                                echo "<tr>";
								echo "<td>";
								echo "No Building selected";
								echo "</td>";								
								echo "</tr>";
                                        }
						?>
					</tbody>
				</table>
                                <div style="text-align: center;">
                                <?php 
                                   echo $gmaps['html'];
                                    ?>
                                </div>
			</div>
                    </div>
	</div>
</div>
