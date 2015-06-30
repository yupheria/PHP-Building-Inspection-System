<?php

$this->load->view('navigation');

?>

<div id="container">
 <?php include('selection_action.php');?>
	
	<div class="box box-80">
		<div class="boxin">
			<div class="header">
				<h3>Edit Site</h3>
				<span id="toolbar">
				<?php   
                                        echo anchor('index.php/buildingmanagement/view_site/'.$this->uri->segment(3).'/'.$this->uri->segment(4), 'Back', array('class' => 'buttonBlack'));  
                                        if($this->session->userdata('access_level')<3) {
                                        echo anchor('index.php/buildingmanagement/delete_site_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4), 'Delete', array('class' => 'buttonBlack', 'id' => 'addButton')); 
                                        echo anchor('#', 'Save', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
                                }
				?>
				</span>
			</div>
		
		<div class="content clearfix">
                    <?php foreach($record as $row) :?>
                    <form class="fields edit_site" action="<?php echo base_url(); ?>buildingmanagement/edit_site" method="post">
				<table cellspacing="0" style="table-layout: fixed;" id="clientdetails">
					<thead>
						<tr>
							<!--<th class="first" class="groupid"></th>-->
							<th class="tc last" style="width:140px;">Fields</th>
							<th class="tc last">Info</th>
						</tr>
					</thead>
					<tbody>
                                            <tr>
                                            <td><font color="red" size="3">*</font> Required</td>
                                        </tr>
								<tr>
								<td style="padding-left: 18px;">
								Client Name:
								</td>
                                                                <td>
								<select name="company" id="company">
                                                                <?php
                                                                        foreach($companylist as $company) {
                                                                        if($company->id == $row->company) {
                                                                        echo "<option selected value='".$company->id."'>".$company->company."</option>";
                                                                        } else {
                                                                        echo "<option value='".$company->id."'>".$company->company."</option>";
                                                                        }
                                                                        }
                                                                ?>
                                                                </select>
								</td>
								</tr>
								
								<tr>
								<td>
								<font color="red" size="3">*</font> Site Name:
								</td>
								<td style='overflow:hidden;'>
								<input type="text" maxlength="60" id="sitename" name="sitename" value="<?php echo $row->sitename; ?>" size=40 class="txt" />
								</td>
								</tr>
                                                                
                                                                <tr>
								<td>
								<font color="red" size="3">*</font> Address Line 1
								</td>
								<td style='overflow:hidden;'>
								<input type="text" maxlength="60" id="address_line_1" name="address_line_1" value="<?php echo $row->address_line_1; ?>" size=40 class="txt" />
								</td>
								</tr>
								
								<tr>
								<td style="padding-left: 18px;">
								Address Line 2
								</td>
								<td style='overflow:hidden;'>
								<input type="text" maxlength="60" id="address_line_2" name="address_line_2" value="<?php echo $row->address_line_2; ?>" size=40 class="txt" />
								</td>
								</tr>
                                                                
                                                                <tr>
								<td>
								<font color="red" size="3">*</font> Suburb
								</td>
								<td style='overflow:hidden;'>
								<input type="text" maxlength="60" id="suburb" name="suburb" value="<?php echo $row->suburb; ?>" size=40 class="txt" />
								</td>
								</tr>
                                                                
                                                                <tr>
								<td>
								<font color="red" size="3">*</font> City
								</td>
								<td style='overflow:hidden;'>
								<input type="text" maxlength="60" id="city" name="city" value="<?php echo $row->city; ?>" size=40 class="txt" />
								</td>
								</tr>
                                                                
                                                                <tr>
								<td style="padding-left: 18px;">
								Country
								</td>
								<td>
								<select name="country" id="country">
                                                                  <?php
                                                                    foreach($countries as $country){
                                                                        if($country->id == $row->country) {
                                                                        echo "<option selected value=".$country->id.">".$country->name."</option>";    
                                                                        } else {
                                                                        echo "<option value=".$country->id.">".$country->name."</option>";
                                                                        }
                                                                    }
                                                                  ?>
                                                                </select>
                                                                <input type="hidden" id="siteid" name="siteid" value="<?php echo $row->id; ?>" class="txt" />
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
