<?php

$this->load->view('navigation');

?>

<div id="container">
    <?php include('client_selection.php');?>
    <?php if(false) :?>
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
        <?php endif; ?>
	<div class="box box-80">
		<div class="boxin">
			<div class="header">
				<h3>Add Client</h3>
				<span id="toolbar">
				<?php
                                        echo anchor('index.php/clientmanagement/','Back',array('class'=>'buttonBlack'));
					echo anchor('#', 'Save', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
				?>
				</span>
			</div>
			<div class="content clearfix" style="table-layout: fixed;">
                            <form class="fields add_group" action="<?php echo base_url(); ?>clientmanagement/add_group" method="post">
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
                                            <tr class="first" >
                                                    
							 <td class="tc last" style='width: 120px;'>
<font color="red" size="3">*</font> Client Name: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" id="company" name="company" value="" size=40 class="txt" />
							 </td>			
					        </tr>
                                             <tr>
							 <td class="tc last" style='width: 120px; padding-left: 20px;'>Client Type: </td>
							 <td class=\"tc last\>
							 <select name="group_type" id="group_type">
                                                        <?php
                                                        foreach($company_type as $group){
                                                        echo "<option value=".$group->id.">".$group->company_type."</option>";
                                                         }
                                                        ?>
                                                        </select>
							 </td>			
					        </tr>
                                                <tr class="first" >
							 <td class="tc last" style='width: 120px;'>
<font color="red" size="3">*</font> Address Line 1: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="address_line_1" id="address_line_1" value="" size=40 class="txt" />
							 </td>			
					        </tr>
                                                <tr>
							 <td class="tc last" style='width: 120px; padding-left: 20px;'>Address Line 2: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="address_line_2" id="address_line_2" value="" size=40 class="txt" />
							 </td>			
					        </tr>
                                                <tr>
							 <td class="tc last" style='width: 120px;'>
<font color="red" size="3">*</font> Suburb: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="suburb" id="suburb" value="" size=40 class="txt" />
							 </td>			
					        </tr>
                                                <tr>
							 <td class="tc last" style='width: 120px;'>
<font color="red" size="3">*</font> City: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="city" id="city" value="" size=40 class="txt" />
							 </td>			
					        </tr>
                                                <tr class="first" >
							 <td class="tc last" style='width: 120px;'>
<font color="red" size="3">*</font> Postal Address: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="poaddress" id="poaddress" value="" size=40 class="txt" />
							 </td>			
					        </tr>
                                                <tr>
							 <td class="tc last" style='width: 120px;'>
<font color="red" size="3">*</font> Postal Code: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="pocode" id="pocode" value="" size=40 class="txt" />
							 </td>			
					        </tr>
                                                <tr>
							 <td class="tc last" style='width: 120px;'>
<font color="red" size="3">*</font> Postal Suburb: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="posuburb" id="posuburb" value="" size=40 class="txt" /> 
							 </td>			
					        </tr>
                                                <tr>
							 <td class="tc last" style='width: 120px;'>
<font color="red" size="3">*</font> Postal City: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="pocity" id="pocity" value="" size=40 class="txt" />
							 </td>			
					        </tr>
                                                <tr>
							 <td class="tc last" style='width: 120px; padding-left: 20px;'>Country: </td>
							 <td class=\"tc last\>
							 <select id="country" name="country">
                                                          <?php                              
                                                         foreach($countries as $country) {                                 
                                                            echo "<option value=".$country->id.">".$country->name."</option>";                                   
                                                        }
                                                        ?>
                                                        </select>
							 </td>			
					        </tr>
                                                <tr class="first" >
							 <td class="tc last" style='width: 120px;'>
<font color="red" size="3">*</font> Buss Phone: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="phone" id="phone" value="" size=40 class="txt" />
							 </td>			
					        </tr><tr>
							 <td class="tc last" style='width: 120px;'>
<font color="red" size="3">*</font> Email: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="email" id="email" value="" size=40 class="txt" />
							 </td>			
					        </tr><tr>
							 <td class="tc last" style='width: 120px; padding-left: 20px;'>Website: </td>
							 <td class=\"tc last\>
							 <input type="text" maxlength="60" name="website" id="website" value="" size=40 class="txt" />
							 </td>			
					        </tr>
					</tbody>
				</table>
                            </form>
			</div>
		</div>
	</div>
</div>
