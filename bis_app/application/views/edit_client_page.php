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
	<div class="box box-80">
		<div class="boxin">
			<div class="header">
				<h3>Edit Client</h3>
				<span id="toolbar">
				<?php
                                        echo anchor('index.php/clientmanagement/view_client/'.$this->uri->segment(3), 'Back', array('class' => 'buttonBlack'));
                                        echo anchor("index.php/clientmanagement/delete_group_page/".$this->uri->segment(3), 'Delete', array('class' => 'buttonBlack', 'id' => 'addButton'));
					echo anchor('#', 'Save', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
				?>
				</span>
			</div>
			<div class="content clearfix" style="table-layout: fixed;">
                            <form class="fields edit_group_page" action="<?php echo base_url(); ?>clientmanagement/edit_group" method="post">
                                <?php foreach($record as $row) :?>
				<table cellspacing="0" id="clientdetails" style="table-layout: fixed;">
					<thead>
						<tr>
							<!--<th class="first clientid"></th>-->
							<th class="tc last" style="width:160px;">Fields</th>
							<th>Info</th>
						</tr>
					</thead>
					<tbody>
                                            <tr>
                                            <td><font color="red" size="3">*</font> Required</td>
                                        </tr>
                                            <tr class="first" >
							 <td class="tc last" style='width: 100px;'>
<font color="red" size="3">*</font> Client Name: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" id="company" name="company" value="<?php echo $row->company?>" class="txt" />
							 <input type="hidden" id="groupid" name="groupid" value="<?php echo $row->id?>" class="txt" />
                                                         </td>			
					        </tr>
                                             <tr>
							 <td class="tc last" style='width: 100px; padding-left: 20px;'>
 Client Type: </td>
							 <td class=\"tc last\>
							 <select name="group" id="group">
                                                            <?php
                                                            foreach ($company_type as $element) :				
                                                            if($element->id == $row->company_type) {
                                                            echo	'<option selected value="';
                                                            } else {
                                                            echo	'<option value="';
                                                            }
                                                            echo	$element->id;
                                                            echo	'">';
                                                            echo	$element->company_type;
                                                            echo	'</option>';

                                                            endforeach;
                                                            ?>
                                                        </select>
							 </td>			
					        </tr>
                                                <tr class="first" >
							 <td class="tc last" style='width: 100px;'>
<font color="red" size="3">*</font> Address Line 1: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="address_line_1" id="address_line_1" value="<?php echo $row->address_line_1?>" size=40 class="txt" />
							 </td>			
					        </tr>
                                                <tr>
							 <td class="tc last" style='width: 100px; padding-left: 20px;'>
 Address Line 2: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="address_line_2" id="address_line_2" value="<?php echo $row->address_line_2?>" size=40 class="txt" />
							 </td>			
					        </tr>
                                                <tr>
							 <td class="tc last" style='width: 100px;'>
<font color="red" size="3">*</font> Suburb: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="suburb" id="suburb" value="<?php echo $row->suburb?>" size=40 class="txt" />
							 </td>			
					        </tr>
                                                <tr>
							 <td class="tc last" style='width: 100px;'>
<font color="red" size="3">*</font> City: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="city" id="city" value="<?php echo $row->city?>" size=40 class="txt" />
							 </td>			
					        </tr>
                                                <tr class="first" >
							 <td class="tc last" style='width: 100px;'>
<font color="red" size="3">*</font> Postal Address: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="poaddress" id="poaddress" value="<?php echo $row->po_address?>" size=40 class="txt" />
							 </td>			
					        </tr>
                                                <tr>
							 <td class="tc last" style='width: 100px;'>
<font color="red" size="3">*</font> Postal Code: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="pocode" id="pocode" value="<?php echo $row->po_code?>" size=40 class="txt" />
							 </td>			
					        </tr>
                                                <tr>
							 <td class="tc last" style='width: 100px;'>
<font color="red" size="3">*</font> Postal Suburb: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="posuburb" id="posuburb" value="<?php echo $row->po_suburb?>" size=40 class="txt" />
							 </td>			
					        </tr>
                                                <tr>
							 <td class="tc last" style='width: 100px;'>
<font color="red" size="3">*</font> Postal City: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="pocity" id="pocity" value="<?php echo $row->po_city?>" size=40 class="txt" /> 
							 </td>			
					        </tr>
                                                <tr>
							 <td class="tc last" style='width: 100px; padding-left: 20px;'>
 Country: </td>
							 <td class=\"tc last\>
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
                                                <tr class="first" >
							 <td class="tc last" style='width: 100px;'>
<font color="red" size="3">*</font> Buss Phone: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="phone" id="phone" value="<?php echo $row->phone?>" size=40 class="txt" />
							 </td>			
					        </tr><tr>
							 <td class="tc last" style='width: 100px;'>
<font color="red" size="3">*</font> Email: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="email" id="email" value="<?php echo $row->email?>" size=40 class="txt" />
							 </td>			
					        </tr><tr>
							 <td class="tc last" style='width: 100px; padding-left: 20px;'>
 Website: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="website" id="website" value="<?php echo $row->website?>" size=40 class="txt" />
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
