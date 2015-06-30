<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-50">
		<div class="boxin">
			<div class="header">
				<h3>Add a user</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/usermanagement', 'Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						//echo anchor('#', 'Save &raquo;', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
						echo anchor('#', 'Apply', array('class' => 'buttonBlack', 'id' => 'applyButton')); 
					?>
										
				</span>
			</div>
			<form class="fields add_user" action="<?php echo base_url(); ?>usermanagement/add_user" method="post">
                            <table cellspacing="0" style="table-layout: fixed;">
                                     <tbody>
                                    <tr>
                                            <td style="padding: 5px 8px 5px 0px;"><font color="red" size="3">*</font> Required</td>
                                            </tr>
                                    <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="user_type">&nbsp&nbsp&nbsp User type</label>
                                            </td>
                                            <td>
                                                <select name="user_type" id="user_type">                                      
                                        <option <?php if($this->uri->segment(3)==3){echo "SELECTED ";}?>value="3">Guest</option>                
                                        <option <?php if($this->uri->segment(3)==1){echo "SELECTED ";}?>value="1">Regular user</option>	
                                        <option <?php if($this->uri->segment(3)==0){echo "SELECTED ";}?>value="0">Administrator</option>           
                                                </select>
                                            </td>
                                        </tr>
				
				
                                        <?php if($this->uri->segment(3) == '1') :?>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                               <label for="bms">Building Manager</label> 
                                            </td>
                                            <td>
                                                <select name="bms" id="bms">
                                        <?php foreach($BMs as $bm) :?>
                                        <option value="<?php echo $bm->ID?>"><?php echo $bm->display_name?></option>
                                        <?php endforeach;?>
                                            </select>
                                            </td>
                                        </tr>
                                        <?php endif;?>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="first_name"><font color="red" size="3">*</font>Username</label>
                                            </td>
                                            <td>
                                                <input type="text" maxlength="30" id="first_name" name="first_name" value="" class="txt" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                               <label for="email_address"><font color="red" size="3">*</font> Email Address</label> 
                                            </td>
                                            <td>
                                                <input type="text" maxlength="30" name="email_address" id="email_address" value="" class="txt" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="password"><font color="red" size="3">*</font> Password</label>
                                            </td>
                                            <td>
                                                <input type="password" maxlength="30" name="password" id="password" value="" class="txt" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="password2"><font color="red" size="3">*</font> Verify Password</label>
                                            </td>
                                            <td>
                                                <input type="password" maxlength="30" name="password2" id="password2" value="" class="txt" />
                                            </td>
                                        </tr>
				</tbody>
                                </table>
				 
			</form>
		</div>
	</div>
    <div class="box box-50">
		<div class="boxin">
			<div class="header">
				<h3>Description</h3>
                        </div>
                        <strong>
                        Guest - Read Only Account<br />
                        Regular User - Add/Edit/Delete except users<br />
                        Administrator - Add/Edit/Delete all records and manage users<br />
                        </strong>
                </div>
    </div>
</div>