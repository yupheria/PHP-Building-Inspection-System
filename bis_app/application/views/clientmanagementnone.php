<?php

$this->load->view('navigation');

?>

<div id="container">
	<div class="box box-25">
		<div class="boxin" id="groups">
			<div class="header">
			<h3>Companies</h3>
				<span id="toolbar">
				<?php 
                                        if($this->session->userdata('access_level')<3) {
                                        if ($clientlist == NULL && $this->uri->segment(3)) {
                                        echo anchor('index.php/clientmanagement/delete_group_page/'.$this->uri->segment(3), 'Delete', array('class' => 'buttonBlack', 'id' => 'addButton'));                                  
                                        }
					echo anchor('index.php/clientmanagement/add_group_page', 'Add', array('class' => 'buttonBlack', 'id' => 'addButton')); 
                                       }//echo anchor('#', 'Edit &raquo;', array('class' => 'buttonBlack-disabled', 'id' => 'editButton')); 
					//echo anchor('#', 'Delete &raquo;', array('class' => 'buttonBlack-disabled', 'id' => 'deleteButton')); 
				?>
				</span>
			</div>
			<div class="content">
				<table cellspacing="0" style="table-layout: fixed;">
					<thead>
						<tr>
							<!--<th class="first" class="groupid"></th>-->
							<th class="tc last">Name</th>
                                                        <?php if($this->session->userdata('access_level')<3) {
							echo '<th class="tc last">Option</th>';
                                                        } ?>
						</tr>
					</thead>
					<tbody>
					<?php
					$i = 0;
					if($clientgroups != null) {
						foreach ($clientgroups as $row) {
                                                if ($this->uri->segment(3) == $row->id) {
                                                    echo "<tr class='highlight'>";
                                                } else {
                                                    echo "<tr>";
                                                }
						
						//echo "<tr class=\"";
					//		if ($i == 0) 
					//		{
					///			echo "first";
					//		} 
					//		if ($i % 2) 
					//		{
					//			echo "even";
					//		} 
                                          //              
					//	echo "\">";
						
							//echo "<td class=\"first groupid\">";
							//echo "<input type=\"checkbox\" name=\"id\" value=\"".$row->id."\" />";
							//echo "</td>";
							echo "<td style='overflow:hidden;'>";
							//echo "<td class=\"tc last\">";
							echo anchor('index.php/clientmanagement/index/'.$row->id,$row->company);
							echo "</td>";	
							//echo "<td class=\"tc last\">";
                                                        echo "<td>";
                                                         if($this->session->userdata('access_level')<3) {
                                                        echo anchor('index.php/clientmanagement/edit_group_page/'.$row->id,'Edit');		
                                                         }
                                                         echo "</a>";
							echo "</td>";
							
						echo "</tr>";		
						$i++;
						
						}
						
                                        }
						//print_r($clientlist);
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="box box-75">
		<div class="boxin">
			<div class="header">
				<h3>Contacts</h3>
				<span id="toolbar">
				<?php 
                                        if($this->uri->segment(3) && $this->session->userdata('access_level')<3){
					echo anchor('index.php/clientmanagement/add_client_page/'.$this->uri->segment(3), 'Add &raquo;', array('class' => 'buttonBlack', 'id' => 'addButton')); 
                                        }//echo anchor('#', 'Edit &raquo;', array('class' => 'buttonBlack-disabled', 'id' => 'editButton')); 
					//echo anchor('#', 'Delete &raquo;', array('class' => 'buttonBlack-disabled', 'id' => 'deleteButton')); 
				?>
				</span>
			</div>
			<div class="content clearfix" style="table-layout: fixed;">
				<table cellspacing="0" id="clientlist">
					<thead>
						<tr>
							<!--<th class="first clientid"></th>-->
							<th class="tc last">Name</th>
							<?php if($this->session->userdata('access_level')<3) {
							echo '<th class="tc last">Option</th>';
                                                        } ?>
						</tr>
					</thead>
					<tbody>
					<?php
					
					$i = 0;
					if ($clientlist != NULL) 
					{
						foreach ($clientlist as $row) {
						if ($this->uri->segment(4) == $row->id) {
                                                    echo "<tr class='highlight'>";
                                                } else {
                                                    echo "<tr>";
                                                }
						//echo "<tr class=\"";
						//	if ($i == 0) 
					//		{
					//			echo "first";
					//		}
					//		if ($i % 2) 
					//		{
					//			echo " even";
					//		}
					//	echo "\">";
						
							//echo "<td class=\"first clientid\">";
							//echo "<input type=\"checkbox\" name=\"id\" value=\"".$row->id."\" />";
							//echo "</td>";
							$string = "index.php/clientmanagement/edit_client_page/".$row->group_id."/";
							//if($record != NULL) {
							//foreach($record as $row) {
								$string = $string.$row->id;
							//}
							//} else {
							//	$string = $string."1";
							//}
                                                       echo "<td style='overflow:hidden;'>";
							//echo "<td class=\"tc last\">";
							echo anchor('index.php/clientmanagement/index/'.$row->group_id.'/'.$row->id,$row->first_name.' '.$row->last_name);
							echo "</td>";
							echo "<td>";
                                                        if($this->session->userdata('access_level')<3) {
							echo anchor('index.php/clientmanagement/edit_client_page/'.$row->group_id.'/'.$row->id,'Edit');
                                                        } echo "</td>";
						
						echo "</tr>";
						
						$i++;
						}
					}
					else {
						echo "<tr class=\"first even\">";
						echo "<td class=\"first clientid\" colspan=\"2\"> There are no clients in this group</td>";
						echo "</td>";
					}
						
						//print_r($clientlist);
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	
</div>
