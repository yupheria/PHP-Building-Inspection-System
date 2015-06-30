<div class="box box-25">
		<div class="boxin">
			<div class="header">
				<h3>Sites</h3>
				<span id="toolbar">
				<?php 
                                        if($this->session->userdata('access_level') <3 && $this->uri->segment(3)) {
					echo anchor('index.php/buildingmanagement/add_site_page/'.$this->uri->segment(3), 'Add', array('class' => 'buttonBlack', 'id' => 'addButton')); 
                                        }?>
				</span>
			</div>
			<div class="content">
				<table cellspacing="0" style="table-layout: fixed;">
					<thead>
						<tr>
							<!--<th class="first" class="groupid"></th>-->
							<th class="tc last" style="width: 180px;">Site Name</th>
							
                                                        <th class="tc last">Option</th>
                                                        
                                                       
						</tr>
					</thead>
					<tbody>
						<?php   if($this->uri->segment(3)) {
                                                        unset($sitesbyclient[0]);
							foreach($sitesbyclient as $site) {
								if($this->uri->segment(4)==$site->id) {
                                                                    echo "<tr class='highlight'>";
                                                                } else {
                                                                    echo "<tr>";
                                                                }
								echo "<td style='overflow:hidden;'>";
                                                                echo anchor('index.php/buildingmanagement/view_site/'.$this->uri->segment(3).'/'.$site->id, $site->sitename);
								echo "</td>";
								echo "<td>";
                                                                
								echo anchor('index.php/buildingmanagement/index/'.$this->uri->segment(3).'/'.$site->id,'View');
								echo "</td>";
								echo "</tr>";
                                                                
							}
                                                } else {
                                                    echo "<tr>";
                                                    echo "<td>";
                                                    echo "No sites for this Client";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
						?>
					</tbody>
				</table>
			</div>
	</div>
</div>