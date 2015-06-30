<?php

$this->load->view('navigation');

?>

<div id="container">

<div class="box box-25">
		<div class="boxin">
			<div class="header">
				<h3>Sites</h3>
				<span id="toolbar">
				<?php 
                                        if($this->session->userdata('access_level') <3) {
                                        if($this->uri->segment(3) && $selectedBuildings == null) {
                                        echo anchor('index.php/buildingmanagement/delete_site_page/'.$this->uri->segment(3), 'Delete', array('class' => 'buttonBlack', 'id' => 'addButton'));
                                        }
					echo anchor('index.php/buildingmanagement/add_site_page', 'Add', array('class' => 'buttonBlack', 'id' => 'addButton'));
                                        }
				?>
				</span>
			</div>
			<div class="content">
				<table cellspacing="0" style="table-layout: fixed;">
					<thead>
						<tr>
							<!--<th class="first" class="groupid"></th>-->
							<th class="tc last">Site Name</th>
							<?php if($this->session->userdata('access_level')<3) {
                                                        echo '<th class="tc last">Option</th>';
                                                        }
                                                        ?>
						</tr>
					</thead>
					<tbody>
						<?php if($sites != null) {
							foreach($sites as $site) {
								if($this->uri->segment(3)==$site->id) {
                                                                    echo "<tr class='highlight'>";
                                                                } else {
                                                                    echo "<tr>";
                                                                }
								echo "<td style='overflow:hidden;'>";
                                                                echo anchor('index.php/buildingmanagement/index/'.$site->id, $site->sitename);
								echo "</td>";
								echo "<td>";
								if($this->session->userdata('access_level') <3) {
								echo anchor('index.php/buildingmanagement/edit_site_page/'.$site->id,'Edit');
								echo "</td>";
								echo "</tr>";
                                                                }
							}
                                                        }
						?>
					</tbody>
				</table>
			</div>
	</div>
</div>

	<div class="box box-75">
		<div class="boxin">
			<div class="header">
				<h3>Buildings</h3>
				<span id="toolbar">
				<?php 
                                        if($this->uri->segment(3) && $this->session->userdata('access_level')<3) {
					echo anchor('index.php/buildingmanagement/add_building_page/'.$this->uri->segment(3), 'Add &raquo;', array('class' => 'buttonBlack', 'id' => 'addButton')); 
                                        } ?>
				</span>
			</div>
			<div class="content">
				<table cellspacing="0" style="table-layout: fixed;">
					<thead>
						<tr>
							<!--<th class="first" class="groupid"></th>-->
							<th class="tc last">Building Name</th>
							<?php if($this->session->userdata('access_level')<3) {
                                                        echo '<th class="tc last">Option</th>';
                                                        }
                                                        ?>
						</tr>
					</thead>
					<tbody>
					<?php
					if($selectedBuildings != null) {		
                                        foreach($selectedBuildings as $building) {
								if($this->uri->segment(4)==$building->id) {
                                                                    echo "<tr class='highlight'>";
                                                                } else {
                                                                    echo "<tr>";
                                                                }
								echo "<td style='overflow:hidden;'>";
                                                                echo anchor('index.php/buildingmanagement/index/'.$building->site.'/'.$building->id, $building->buildingname);
								echo "</td>";
								echo "<td>";
                                                                if ($this->session->userdata('access_level')<3) {
								echo anchor('index.php/buildingmanagement/edit_building_page/'.$building->site.'/'.$building->id, 'Edit');
                                                                } echo "</td>";
								echo "</tr>";
							}
                                        } else {
                                            echo "<tr>";
								echo "<td>";
								echo "No Buildings under this site";
								echo "</td>";							
                                        }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
</div>
