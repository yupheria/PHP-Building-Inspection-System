<?php

$this->load->view('navigation');

?>

<div id="container">
 <?php include('selection_action.php');?>
	
	<div class="box box-80">
		<div class="boxin">
			<div class="header">
				<h3>Site Details</h3>
				<span id="toolbar">
				<?php   if($record != null) {
                                        echo anchor('index.php/buildingmanagement/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'Back',array('class'=>'buttonBlack'));
                                        if($this->session->userdata('access_level')<3) {
                                        echo anchor('index.php/buildingmanagement/delete_site_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4), 'Delete', array('class' => 'buttonBlack', 'id' => 'addButton')); 
                                        echo anchor('index.php/buildingmanagement/edit_site_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4), 'Edit', array('class' => 'buttonBlack', 'id' => 'addButton')); 
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
							<th class="tc last" style="width:130px;">Fields</th>
							<th class="tc last">Info</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if($record != null) {		
                                        foreach($record as $site) {
								echo "<tr>";
								echo "<td>";
								echo "Client Name:";
								echo "</td>";
								echo "<td style='overflow:hidden;'>";
                                                                if($companylist != null) {
								foreach ($companylist as $comp) {
                                                                    if($comp->id == $site->company) {
                                                                        echo $comp->company;
                                                                    }
                                                                }
                                                                }
								echo "</td>";
								echo "</tr>";
								
								echo "<tr>";
								echo "<td>";
								echo "Site Name:";
								echo "</td>";
								echo "<td style='overflow:hidden;'>";
								echo $site->sitename;
								echo "</td>";
								echo "</tr>";
                                                                
                                                                echo "<tr>";
								echo "<td>";
								echo "Address Line 1";
								echo "</td>";
								echo "<td style='overflow:hidden;'>";
								echo $site->address_line_1;
								echo "</td>";
								echo "</tr>";
								
								echo "<tr>";
								echo "<td>";
								echo "Address Line 2";
								echo "</td>";
								echo "<td style='overflow:hidden;'>";
								echo $site->address_line_2;
								echo "</td>";
								echo "</tr>";
                                                                
                                                                echo "<tr>";
								echo "<td>";
								echo "Suburb";
								echo "</td>";
								echo "<td style='overflow:hidden;'>";
								echo $site->suburb;
								echo "</td>";
								echo "</tr>";
                                                                
                                                                echo "<tr>";
								echo "<td>";
								echo "City";
								echo "</td>";
								echo "<td style='overflow:hidden;'>";
								echo $site->city;
								echo "</td>";
								echo "</tr>";
                                                                
                                                                echo "<tr>";
								echo "<td>";
								echo "Country";
								echo "</td>";
								echo "<td>";
								foreach($countries as $country) {
                                                                    if($country->id == $site->country) {
                                                                        echo $country->name;
                                                                    }
                                                                }
								echo "</td>";
								echo "</tr>";
                                                                
							}
                                        } else {
                                                                echo "<tr>";
								echo "<td>";
								echo "No Site selected";
								echo "</td>";								
								echo "</tr>";
                                        }
						?>
					</tbody>
				</table>
			</div>
                    </div>
	</div>
</div>
