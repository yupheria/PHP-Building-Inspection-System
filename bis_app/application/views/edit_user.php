<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-50">
		<div class="boxin">
			<div class="header">
				<h3>Edit User Details</h3>
				<span id="toolbar">
					<?php 
					if($this->session->userdata('access_level')=='0') {	
                                        echo anchor('index.php/usermanagement', 'Back', array('class' => 'buttonBlack', 'id' => 'backButton'));  }
						//echo anchor('#', 'Save &raquo;', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
						echo anchor('#', 'Save', array('class' => 'buttonBlack', 'id' => 'applyButton')); 
					?>
										
				</span>
			</div>
			<form class="fields edit_user" action="<?php echo base_url(); ?>usermanagement/edit_user" method="post">
                                <?php foreach($record as $row) :?>
                                <table cellspacing="0" style="table-layout: fixed;">
                                    <tbody>
                                         
                                    <tr>
                                            <td style="padding: 5px 8px 5px 0px;"><font color="red" size="3">*</font> Required</td>
                                        </tr>
                                        <?php if($this->session->userdata('access_level')=='0') {	?>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                               <label for="user_type">&nbsp&nbsp&nbsp User type</label> 
                                            </td>
                                            <td>
                                                <select name="user_type" id="user_type">
                                                <option value="0" <?php if($this->uri->segment(4)=="0"){echo "selected"; } ?> >Administrator</option>
                                                <option value="1" <?php if($this->uri->segment(4)=="1"){echo "selected"; } ?>  >Regular user</option>
                                                <option value="3" <?php if($this->uri->segment(4)=="3"){echo "selected"; } ?>  >Guest</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <?php } endforeach; ?>
                                        
                                        <?php if($this->session->userdata('access_level')=='0' && $this->uri->segment(4)=='1') : ?>
                                                <tr>
                                                    <td style="padding: 5px 8px 5px 0px;">
                                                    <label for="bms">Building Manager</label> 
                                                    </td>
                                                    <td>
                                                    <select name="bms" id="bms">
                                                    <?php foreach($BMs as $bm) :?>
                                                    <option <?php if($row->meta_value==$bm->ID){echo 'selected';}?> value="<?php echo $bm->ID?>"><?php echo $bm->display_name?></option>
                                                    <?php endforeach;?>
                                                     </select>    
                                                    </td>
                                                </tr>
                                        <?php endif;?>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" id="user_id" name="user_id" />
                                                <label for="first_name"><font color="red" size="3">*</font>Username</label>
                                            </td>
                                            <td>
                                                <input type="text" maxlength="60" id="first_name" name="first_name" value="<?php echo $row->display_name; ?>" class="txt" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="email_address"><font color="red" size="3">*</font> Email Address</label>
                                            </td>
                                            <td>
                                               <input type="text" maxlength="60" name="email_address" id="email_address" value="<?php echo $row->user_email; ?>" class="txt" /> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="password"><font color="red" size="3">*</font> New Password</label>
                                            </td>
                                            <td>
                                                <input type="password" maxlength="60" name="password" id="password" value="" class="txt" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="password2"><font color="red" size="3">*</font> Verify Password</label>
                                            </td>
                                            <td>
                                                <input type="password" maxlength="60" name="password2" id="password2" value="" class="txt" />
                                            </td>
                                        </tr>
                                       
                                </tbody>
                                </table>
			</form>
		</div>
	</div>
    <?php if($this->session->userdata('user_id')==$this->uri->segment(3)):?>
	<div class="box box-50 box">
		<div class="boxin">
			<div class="header">
				<h3>Dropbox Settings</h3>
                                <span id="toolbar">
					<?php 
					echo anchor('#', 'Save', array('class' => 'buttonBlack', 'id' => 'saveDropbox')); 
					?>		
				</span>
			</div>
			<form class="fields edit_user" action="#" method="post">
				<table cellspacing="0" style="table-layout: fixed;">
                                    <?php foreach($record as $row): ?>
                                    <tbody>
                                        <tr><td style="padding: 5px 8px 5px 0px;">
                                               <label for="dropbox_user">Dropbox Email</label> 
                                            </td>
                                            <td style="padding: 5px 8px 5px 0px;">
                                               <input type="text" maxlength="60" name="dropbox_user" id="dropbox_user" value="<?php echo $row->dropbox_user?>" class="txt" /> 
                                            </td>
                                        </tr>
                                        <tr><td style="padding: 5px 8px 5px 0px;">
                                               <label for="dropbox_pass">Dropbox Password</label> 
                                            </td>
                                            <td style="padding: 5px 8px 5px 0px;">
                                               <input type="password" maxlength="60" name="dropbox_pass" id="dropbox_pass" value="<?php echo $row->dropbox_pass?>" class="txt" /> 
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach; ?>
                                </table>
			</form>
		</div>
	</div>
        <div class="box box-50 box">
		<div class="boxin">
			<div class="header">
				<h3>SkyDrive Settings</h3>
                                <span id="toolbar">
					<?php 
					echo anchor('#', 'Save', array('class' => 'buttonBlack', 'id' => 'saveSkydrive')); 
					?>		
				</span>
			</div>
			<form class="fields edit_user" action="#" method="post">
				<table cellspacing="0" style="table-layout: fixed;">
                                    <?php foreach($record as $row): ?>
                                    <tbody>
                                        <tr><td style="padding: 5px 8px 5px 0px;">
                                               <label for="skydrive_user">SkyDrive Email</label> 
                                            </td>
                                            <td style="padding: 5px 8px 5px 0px;">
                                               <input type="text" maxlength="60" name="skydrive_user" id="skydrive_user" value="<?php echo $row->skydrive_user?>" class="txt" /> 
                                            </td>
                                        </tr>
                                        <tr><td style="padding: 5px 8px 5px 0px;">
                                               <label for="skydrive_pass">SkyDrive Password</label> 
                                            </td>
                                            <td style="padding: 5px 8px 5px 0px;">
                                               <input type="password" maxlength="60" name="skydrive_pass" id="skydrive_pass" value="<?php echo $row->skydrive_pass?>" class="txt" /> 
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach; ?>
                                </table>
			</form>
		</div>
	</div>
    <?php endif;?>
</div>