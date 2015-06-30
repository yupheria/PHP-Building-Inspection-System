<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-100 altbox">
		<div class="boxin">
			<div class="header">
				<h3>Edit a Company</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/clientmanagement/index/'.$this->uri->segment(3), '&laquo; Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						echo anchor('#', 'Save &raquo;', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
						//echo anchor('#', 'Apply &raquo;', array('class' => 'buttonBlack', 'id' => 'applyButton'));
					?>
										
				</span>
			</div>
			<?php 
				foreach($record as $row) :
			?>
			<form class="fields edit_group_page" action="<?php echo base_url(); ?>clientmanagement/edit_group_page" method="post">
				
                                <input type="hidden" id="groupid" name="groupid" value="<?php echo $row->id?>" class="txt" />
				<label style="color: red;">* Mandatory</label>
                                <label for="company">Company Name *</label>
				<input type="text" maxlength="60" id="company" name="company" value="<?php echo $row->company?>" class="txt" />
				
				<table>
                                <tbody>
                                    <tr>
                                        <td>
                                <label for="address_line_1">Address line 1 *</label>
				<input type="text" maxlength="60" name="address_line_1" id="address_line_1" value="<?php echo $row->address_line_1?>" class="txt" />
                                        </td>
                                        <td>
				<label for="address_line_2">Address line 2</label>
				<input type="text" maxlength="60" name="address_line_2" id="address_line_2" value="<?php echo $row->address_line_2?>" class="txt" />
                                        </td>
                                         <td>
				<label for="poaddress">Postal Address or PO *</label>
				<input type="text" maxlength="60" name="poaddress" id="poaddress" value="<?php echo $row->po_address?>" class="txt" />
                                        </td>
                                        <td>
				<label for="pocode">Postal Code *</label>
				<input type="text" maxlength="60" name="pocode" id="pocode" value="<?php echo $row->po_code?>" class="txt" />
                                        </td>
                                    </tr>
                                <tr>
                                    <td>
				<label for="suburb">Suburb *</label>
				<input type="text" maxlength="60" name="suburb" id="suburb" value="<?php echo $row->suburb?>" class="txt" />
                                    </td>
                                    <td> </td>
                                    <td>
                                <label for="posuburb">Postal Suburb *</label>
				<input type="text" maxlength="60" name="posuburb" id="posuburb" value="<?php echo $row->po_suburb?>" class="txt" />        
                                   </td>
                                </tr>
                                <tr>
                                    <td>
				<label for="city">City *</label>
				<input type="text" maxlength="60" name="city" id="city" value="<?php echo $row->city?>" class="txt" />
                                    </td>
                                    <td></td>
                                    <td>
                                <label for="pocity">Postal City *</label>
				<input type="text" maxlength="60" name="pocity" id="pocity" value="<?php echo $row->po_city?>" class="txt" />        
                                   </td>
                                </tr>
				</tbody>
                                </table>
				
				<label for="country">Country *</label>
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
				
				<label for="phone">Phone *</label>
				<input type="text" maxlength="60" name="phone" id="phone" value="<?php echo $row->phone?>" class="txt" />
				
				<label for="mobile">Mobile *</label>
				<input type="text" maxlength="60" name="mobile" id="mobile" value="<?php echo $row->mobile?>" class="txt" />
				
				<label for="email">Email *</label>
				<input type="text" maxlength="60" name="email" id="email" value="<?php echo $row->email?>" class="txt" />
				
				<label for="website">Website</label>
				<input type="text" maxlength="60" name="website" id="website" value="<?php echo $row->website?>" class="txt" />
				
				<label for="group_type">Company *</label>
				<select name="group_type" id="group_type">
					<?php
                                        foreach($company_type as $group) {
                                            if($group->id == $row->company_type){
                                                echo "<option selected value=".$group->id.">".$group->company_type."</option>";
                                            } else {
                                                echo "<option value=".$group->id.">".$group->company_type."</option>";
                                            }
                                        }
                                        ?>
				</select>
				
			</form>
			<?php
				endforeach;
			?>
		</div>
	</div>
</div>