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
                                                        if($this->session->userdata('access_level')<3) {
                                                        echo anchor('index.php/clientmanagement/index/'.$row->id,'View');		
                                                         }		
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
				<h3>Edit Contact</h3>
				<span id="toolbar">
				<?php
                                        echo anchor("index.php/clientmanagement/view_contact/".$this->uri->segment(3).'/'.$this->uri->segment(4), 'Back', array('class' => 'buttonBlack', 'id' => 'addButton'));
                                        echo anchor("index.php/clientmanagement/delete_client_page/".$this->uri->segment(4), 'Delete', array('class' => 'buttonBlack', 'id' => 'addButton'));
                                        echo anchor("#", 'Save', array('class' => 'buttonBlack', 'id' => 'saveButton'));
				?>
				</span>
			</div>
			<div class="content clearfix" style="table-layout: fixed;">
                                <form class="fields edit_contact" action="<?php echo base_url(); ?>clientmanagement/edit_contact" method="post">
                                <?php foreach($record as $row) : ?>
				<table cellspacing="0" id="clientdetails" style="table-layout: fixed;">
					<thead>
						<tr>
							<!--<th class="first clientid"></th>-->
							<th class="tc last" style="width: 140px;">Fields</th>
							<th>Info</th>
						</tr>
					</thead>
					<tbody>
                                            <tr>
                                            <td><font color="red" size="3">*</font> Required</td>
                                        </tr>
                                                <tr class="first">
                                                         <td class=\"tc last\" style='width: 100px; padding-left: 20px;'>Company:</td>
							 <td class=\"tc last\">
                                                             <label>
                                                                <?php
                                                                foreach ($clientgroups as $element) :				
                                                                if($element->id == $this->uri->segment(3)) {
                                                                echo $element->company;
                                                                }
                                                                endforeach;
                                                                ?>
                                                                 </label>
                                                             <input type="hidden" maxlength="60" name="group" id="group" value="<?php echo $this->uri->segment(3) ?>" class="txt" />
							 </td>
						    </tr>
						<tr>	
							 <td class=\"tc last\" style='width: 100px; padding-left: 20px;'>Title:</td>
							 <td class=\"tc last\">
                                                          <select name="title" id="title" value="<?php echo $row->title;?>">
                                                            <?php
                                                            foreach ($titles as $title) {
                                                                if($title->id == $row->title) {
                                                                echo "<option selected value=".$title->id.">".$title->title."</option>";
                                                                } else {
                                                                echo "<option value=".$title->id.">".$title->title."</option>";    
                                                                }
                                                                }
                                                            ?>
                                                        </select>   
							 </td>
                                                    </tr> 
                                                    <tr>
                                                         <td class=\"tc last\" style='width: 100px'><font color="red" size="3">*</font> First Name:</td>
							 <td class=\"tc last\">
                                                             <input type="text" maxlength="60" id="first_name" name="first_name" value="<?php echo $row->first_name; ?>" size=40 class="txt" />
							 </td>
						    </tr>
                                                    
                                                    <tr>
                                                         <td class=\"tc last\" style='width: 100px'><font color="red" size="3">*</font> Last Name:</td>
							 <td class=\"tc last\">
                                                             <input type="text" maxlength="60" name="last_name" id="last_name" value="<?php echo $row->last_name; ?>" size=40 class="txt" />
							 </td>
						    </tr>
                                                    
                                                    <tr class="first">
                                                         <td class=\"tc last\" style='width: 100px'><font color="red" size="3">*</font> Address Line 1:</td>
							 <td class=\"tc last\">
                                                             <input type="text" maxlength="60" name="address_line_1" id="address_line_1" value="<?php echo $row->address_line_1; ?>" size=40 class="txt" />
							 </td>
						    </tr>
                                                    
                                                    <tr>
                                                         <td class=\"tc last\" style='width: 100px; padding-left: 20px;'>Address Line 2:</td>
							 <td class=\"tc last\">
                                                             <input type="text" maxlength="60" name="address_line_2" id="address_line_2" value="<?php echo $row->address_line_2; ?>" size=40 class="txt" />
							 </td>
						    </tr>
                                                    
                                                    <tr>
                                                         <td class=\"tc last\" style='width: 100px'><font color="red" size="3">*</font> Suburb:</td>
							 <td class=\"tc last\">
                                                             <input type="text" maxlength="60" name="suburb" id="suburb" value="<?php echo $row->suburb; ?>" size=40 class="txt" />
							 </td>
						    </tr>
                                                    
                                                    <tr>
                                                         <td class=\"tc last\" style='width: 100px'><font color="red" size="3">*</font> City:</td>
							 <td class=\"tc last\">
                                                             <input type="text" maxlength="60" name="city" id="city" value="<?php echo $row->city; ?>" size=40 class="txt" />
							 </td>
						    </tr>
						
                                                    <tr class="first">
                                                         <td class=\"tc last\" style='width: 100px'><font color="red" size="3">*</font> Postal Address:</td>
							 <td class=\"tc last\">
                                                             <input type="text" maxlength="60" name="poaddress" id="poaddress" value="<?php echo $row->po_address; ?>" size=40 class="txt" />
							 </td>
						    </tr>
                                                    
                                                    <tr>
                                                         <td class=\"tc last\" style='width: 100px'><font color="red" size="3">*</font> Postal Code:</td>
							 <td class=\"tc last\">
                                                             <input type="text" maxlength="60" name="pocode" id="pocode" value="<?php echo $row->po_code; ?>" size=40 class="txt" />
							 </td>
						    </tr>
                                                    
                                                    <tr>
                                                         <td class=\"tc last\" style='width: 100px'><font color="red" size="3">*</font> Postal Suburb:</td>
							 <td class=\"tc last\">
                                                             <input type="text" maxlength="60" name="posuburb" id="posuburb" value="<?php echo $row->po_suburb; ?>" size=40 class="txt" />
							 </td>
						    </tr>
                                                    
                                                    <tr>
                                                         <td class=\"tc last\" style='width: 100px; padding-left: 20px;'>Postal City:</td>
							 <td class=\"tc last\">
                                                             <input type="text" maxlength="60" name="pocity" id="pocity" value="<?php echo $row->po_city; ?>" size=40 class="txt" />   
							 </td>
						    </tr>
                                                    
                                                    <tr>
                                                         <td class=\"tc last\" style='width: 100px; padding-left: 20px;'>Country:</td>
							 <td class=\"tc last\">
                                                             <select id="country" name="country">
                                                            <?php                              
                                                            foreach($countries as $country) {
                                                                if($country->id == $row->country) {
                                                                echo "<option selected value=".$country->id.">".$country->name."</option>";
                                                                } else {
                                                                echo "<option value=".$country->id.">".$country->name."</option>";  
                                                                }
                                                            }
                                                            ?>
                                                            </select>
							 </td>
						    </tr>
                                                    
                                                    
                                                    <tr class="first">
                                                         <td class=\"tc last\" style='width: 100px'><font color="red" size="3">*</font> Business Phone:</td>
							 <td class=\"tc last\">
                                                             <input type="text" maxlength="60" name="bussphone" id="bussphone" value="<?php echo $row->business_phone; ?>" size=40 class="txt" />
							 </td>
						    </tr>
                                                    <tr>
                                                         <td class=\"tc last\" style='width: 100px'><font color="red" size="3">*</font> Mobile:</td>
							 <td class=\"tc last\">
                                                             <input type="text" maxlength="60" name="mobile" id="mobile" value="<?php echo $row->mobile_phone; ?>" size=40 class="txt" />
							 </td>
						    </tr>
                                                    <tr >
                                                         <td class=\"tc last\" style='width: 100px'><font color="red" size="3">*</font> Phone:</td>
							 <td class=\"tc last\">
                                                             <input type="text" maxlength="60" name="phone" id="phone" value="<?php echo $row->home_phone; ?>" size=40 class="txt" />
							 </td>
						    </tr>
                                                    
                                                    <tr>
                                                         <td class=\"tc last\" style='width: 100px'><font color="red" size="3">*</font> Email:</td>
							 <td class=\"tc last\">
                                                             <input type="text" maxlength="60" name="email" id="email" value="<?php echo $row->email_address; ?>" size=40 class="txt" />
							 </td>
						    </tr>
                                                    
                                                    <tr>
                                                         <td class=\"tc last\" style='width: 100px; padding-left: 20px;'>Website:</td>
							 <td class=\"tc last\">
                                                             <input type="text" maxlength="60" name="website" id="website" value="<?php echo $row->website; ?>" size=40 class="txt" />
                                                             <input type="hidden" name="clientid" id="clientid" value="<?php echo $row->id; ?>" class="txt" />
							 </td>
						    </tr>
					</tbody>
				</table>
                                    <?php endforeach;?>
                              </form>
			</div>
		</div>
	</div>
</div>
