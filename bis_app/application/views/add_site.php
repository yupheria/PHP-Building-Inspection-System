<?php

$this->load->view('navigation');

?>

<div id="container">
     <?php include('selection_action.php');?>

	<div class="box box-80">
		<div class="boxin">
			<div class="header">
				<h3>Add Site</h3>
				<span id="toolbar">
				<?php   
                                        echo anchor('index.php/buildingmanagement/','Back',array('class'=>'buttonBlack'));
                                        if($this->session->userdata('access_level')<3) {
                                        echo anchor('#', 'Save', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
                                }
				?>
				</span>
			</div>
		
		<div class="content clearfix">
                    <form class="fields add_site" action="<?php echo base_url(); ?>buildingmanagement/add_site" method="post">
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
								<select disabled name="company" id="company">
                                                                <?php
                                                                        foreach($companylist as $company) {
                                                                            if($company->id==$this->uri->segment(3)) {
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
								<input type="text" maxlength="60" id="sitename" name="sitename" value="" size=40 class="txt" />
								</td>
								</tr>
                                                                
                                                                <tr>
								<td>
								<font color="red" size="3">*</font> Address Line 1
								</td>
								<td style='overflow:hidden;'>
								<input type="text" maxlength="60" id="address_line_1" name="address_line_1" value="" size=40 class="txt" />
								</td>
								</tr>
								
								<tr>
								<td style="padding-left: 18px;">
								Address Line 2
								</td>
								<td style='overflow:hidden;'>
								<input type="text" maxlength="60" id="address_line_2" name="address_line_2" value="" size=40 class="txt" />
								</td>
								</tr>
                                                                
                                                                <tr>
								<td>
								<font color="red" size="3">*</font> Suburb
								</td>
								<td style='overflow:hidden;'>
								<input type="text" maxlength="60" id="suburb" name="suburb" value="" size=40 class="txt" />
								</td>
								</tr>
                                                                
                                                                <tr>
								<td>
								<font color="red" size="3">*</font> City
								</td>
								<td style='overflow:hidden;'>
								<input type="text" maxlength="60" id="city" name="city" value="" size=40 class="txt" />
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
                                                                        if($country->id == 162){
                                                                        echo "<option selected value=".$country->id.">".$country->name."</option>";    
                                                                        } else {
                                                                        echo "<option value=".$country->id.">".$country->name."</option>";
                                                                        }
                                                                    }
                                                                  ?>
                                                                </select>
								</td>
								</tr>
                                                               
					</tbody>
				</table>
                        </form>
			</div>
                    </div>
	</div>
</div>
