<?php

$this->load->view('navigation');

?>

<div id="container">
    <?php include('client_selection.php');?>
        <?php if(false):?>
	<div class="box box-25">
		<div class="boxin" id="groups">
			<div class="header">
			<h3>Clients</h3>
				<span id="toolbar">
				<?php 
                                       if($this->session->userdata('access_level')<3) {
					echo anchor('index.php/clientmanagement/add_client_page/', 'Add', array('class' => 'buttonBlack', 'id' => 'addButton')); 
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
							<th class="tc last" style="width: 180px;">Name</th>
							
							<th class="tc last">Option</th>                                                        
						</tr>
					</thead>
					<tbody>
					<?php
					$i = 0;
                                                
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
							echo anchor('index.php/clientmanagement/view_client/'.$row->id,$row->company);
							echo "</td>";	
							//echo "<td class=\"tc last\">";
                                                        echo "<td>";
                                                        
                                                        echo anchor('index.php/clientmanagement/index/'.$row->id,'View');		
                                                         		
							echo "</a>";
							echo "</td>";
							
						echo "</tr>";		
						$i++;
						
						}
						
						
						//print_r($clientlist);
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
        <?php endif;?>
        <?php if(false):?>
	<div class="box box-75">
		<div class="boxin">
			<div class="header">
				<h3>Contacts</h3>
				<span id="toolbar">
				<?php 
                                        if($this->uri->segment(3) && $this->session->userdata('access_level')<3){
					echo anchor('index.php/clientmanagement/add_contact/'.$this->uri->segment(3), 'Add &raquo;', array('class' => 'buttonBlack', 'id' => 'addButton')); 
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
							<th class="tc last" style="width: 130px;">Name</th>
							
							
                                                        
						</tr>
					</thead>
					<tbody>
					<?php
					
					
					if ($clientlist != NULL) 
					{
						foreach ($clientlist as $row) {
						if ($this->uri->segment(4) == $row->id) {
                                                    echo "<tr class='highlight'>";
                                                } else {
                                                    echo "<tr>";
                                                }
                                                        echo "<td style='overflow:hidden;'>";
							//echo "<td class=\"tc last\">";
							echo anchor('index.php/clientmanagement/view_contact/'.$row->group_id.'/'.$row->id,$row->first_name.' '.$row->last_name);
							echo "</td>";
							
						
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
        <?php endif;?>
        <div class="box box-80">
		<div class="boxin">
			<div class="header">
				<h3>Contact Details</h3>
				<span id="toolbar">
				<?php
                                        if($this->session->userdata('access_level')<3) {
                                        echo anchor("index.php/clientmanagement/delete_client_page/".$this->uri->segment(4), 'Delete', array('class' => 'buttonBlack', 'id' => 'addButton'));
                                        
					echo anchor("index.php/clientmanagement/edit_contact/".$this->uri->segment(3).'/'.$this->uri->segment(4), 'Edit', array('class' => 'buttonBlack', 'id' => 'addButton')); 
                                        }
				?>
				</span>
			</div>
			<div class="content clearfix" style="table-layout: fixed;">
				<table cellspacing="0" id="clientdetails">
					<thead>
						<tr>
							<!--<th class="first clientid"></th>-->
							<th class="tc last">Fields</th>
							<th>Info</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if ($record != NULL) 
					{
						foreach ($record as $row) {
						
						echo "<tr";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "Title:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							//echo $row->title;
                                                        foreach ($titles as $title){
                                                            if($title->id == $row->title)
                                                            echo $title->title;
                                                        }
							echo "</td>";
						
						echo "</tr>";
						echo "<tr";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "First name:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo $row->first_name;
							echo "</td>";				
						echo "</tr>";
						
						echo "<tr";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "Last name:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo $row->last_name;
							echo "</td>";				
						echo "</tr>";
						
						echo "<tr class=\"first";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "Address line 1:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo $row->address_line_1;
							echo "</td>";				
						echo "</tr>";
						
						echo "<tr";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "Address line 2:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo $row->address_line_2;
							echo "</td>";				
						echo "</tr>";
						
						echo "<tr";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "Suburb:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo $row->suburb;
							echo "</td>";				
						echo "</tr>";
						
						echo "<tr";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "City:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo $row->city;
							echo "</td>";				
						echo "</tr>";
                                                
                                                echo "<tr class=\"first";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "Postal Address:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo $row->po_address;
							echo "</td>";				
						echo "</tr>";
                                                
                                                echo "<tr";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "Postal Code:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo $row->po_code;
							echo "</td>";				
						echo "</tr>";
                                                
                                                echo "<tr";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "Postal Suburb:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo $row->po_suburb;
							echo "</td>";				
						echo "</tr>";
                                                
                                                echo "<tr";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "Postal City:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo $row->po_city;
							echo "</td>";				
						echo "</tr>";
						
						echo "<tr";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "Country:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							foreach($countries as $country) {
                                                            if($country->id == $row->country) {
                                                                echo $country->name;
                                                            }
                                                           
                                                        }
							echo "</td>";				
						echo "</tr>";
						
						echo "<tr class=\"first";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "Home Phone:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo $row->home_phone;
							echo "</td>";				
						echo "</tr>";
						
						echo "<tr";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "Mobile Phone:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo $row->mobile_phone;
							echo "</td>";				
						echo "</tr>";
						
						echo "<tr";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "Business Phone:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo $row->business_phone;
							echo "</td>";				
						echo "</tr>";
						
                                                echo "<tr";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "Email Address:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo $row->email_address;
							echo "</td>";				
						echo "</tr>";
                                                
						echo "<tr";
						echo "\">";
							
							echo "<td class=\"tc last\" style='width: 100px;'>";
							echo "Website:";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo $row->website;
							echo "</td>";				
						echo "</tr>";
						}
					}
					else {
						echo "<tr class=\"first even\">";
						echo "<td class=\"first clientid\" colspan=\"2\"> No contact selected</td>";
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
