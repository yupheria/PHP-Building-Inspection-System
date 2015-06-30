<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-100 altbox">
		<div class="boxin">
			<div class="header">
				<h3>Add a Company</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/clientmanagement', '&laquo; Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						echo anchor('#', 'Save &raquo;', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
						//echo anchor('#', 'Apply &raquo;', array('class' => 'buttonBlack', 'id' => 'applyButton'));
					?>
										
				</span>
			</div>
			<form class="fields add_group" action="<?php echo base_url(); ?>clientmanagement/add_group" method="post">
                                <label style="color: red;">* Mandatory</label>
				<label for="company">Company Name *</label>
				<input type="text" maxlength="60" id="company" name="company" value="" class="txt" />
				<table>
                                <tbody>
                                    <tr>
                                        <td>
                                <label for="address_line_1">Address line 1 *</label>
				<input type="text" maxlength="60" name="address_line_1" id="address_line_1" value="" class="txt" />
                                        </td>
                                        <td>
				<label for="address_line_2">Address line 2</label>
				<input type="text" maxlength="60" name="address_line_2" id="address_line_2" value="" class="txt" />
                                        </td>
                                         <td>
				<label for="poaddress">Postal Address or PO *</label>
				<input type="text" maxlength="60" name="poaddress" id="poaddress" value="" class="txt" />
                                        </td>
                                        <td>
				<label for="pocode">Postal Code *</label>
				<input type="text" maxlength="60" name="pocode" id="pocode" value="" class="txt" />
                                        </td>
                                    </tr>
                                <tr>
                                    <td>
				<label for="suburb">Suburb *</label>
				<input type="text" maxlength="60" name="suburb" id="suburb" value="" class="txt" />
                                    </td>
                                    <td> </td>
                                    <td>
                                <label for="posuburb">Postal Suburb *</label>
				<input type="text" maxlength="60" name="posuburb" id="posuburb" value="" class="txt" />        
                                   </td>
                                </tr>
                                <tr>
                                    <td>
				<label for="city">City *</label>
				<input type="text" maxlength="60" name="city" id="city" value="" class="txt" />
                                    </td>
                                    <td></td>
                                    <td>
                                <label for="pocity">Postal City *</label>
				<input type="text" maxlength="60" name="pocity" id="pocity" value="" class="txt" />        
                                   </td>
                                </tr>
				</tbody>
                                </table>
                                <label for="country">Country *</label>
                                <select id="country" name="country">
				<?php                              
                                foreach($countries as $country) {                                 
                                    echo "<option value=".$country->id.">".$country->name."</option>";                                   
                                }
                                ?>
				</select>
				<label for="phone">Phone *</label>
				<input type="text" maxlength="60" name="phone" id="phone" value="" class="txt" />
				
				<label for="mobile">Mobile *</label>
				<input type="text" maxlength="60" name="mobile" id="mobile" value="" class="txt" />
				
				<label for="email">Email *</label>
				<input type="text" maxlength="60" name="email" id="email" value="" class="txt" />
				
				<label for="website">Website</label>
				<input type="text" maxlength="60" name="website" id="website" value="" class="txt" />
				
				<label for="group_type">Company *</label>
				<select name="group_type" id="group_type">
					<?php
                                        foreach($company_type as $group){
                                            echo "<option value=".$group->id.">".$group->company_type."</option>";
                                        }
                                        ?>
				</select>
				
			</form>
		</div>
	</div>
</div>