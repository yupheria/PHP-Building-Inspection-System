
<div class="inner-container clearfix">
	<h1 id="logo">
		<a class="home" href="
                        <?php 
                        echo base_url()."index.php/dashboard/";
                        if($this->session->userdata('access_level') == '0') {
				echo "admin";
			} else {
				echo "user";
			}
                        ?> 
                        " title="Homepage">
			Building Inspection System <br />
                            <font style="font-size: 28px;">
                           <?php 
                           echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$this->session->userdata('client_name');
                           ?>
                            </font>
                        <br />
                            <font style="font-size: 28px;">
                        <?php
                        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Dashboard"
                        ?>
                            </font>
                        </a>
	</h1>
	<div id="userbox">
		<div class="inner">
			<strong style="font-size: 14px;"><?php
			echo $this->session->userdata('user_login');
                        if($this->session->userdata('access_level') == '0') {
				echo " Administrator &nbsp&nbsp&nbsp&nbsp";
			} else if($this->session->userdata('access_level') == '1'){
				echo " User &nbsp&nbsp&nbsp&nbsp";
			}  else {
                                echo " Guest &nbsp&nbsp&nbsp&nbsp";
                        }
			 ?></strong>
                    <input id="headerid" type="hidden" value="<?php echo $this->session->userdata('user_id')?>"/>
                    <input id="headeraccess" type="hidden" value="<?php echo $this->session->userdata('access_level')?>"/>
                    <select id="hoptions" style="font-size: 12px;">
                        <option value="0">Settings</option>
                        <option value="3">Logout</option>
                        <option value="10">---------------</option>
                        <?php if($this->session->userdata('access_level')==0) : ?>
                        <option value="1"<?php if($this->uri->segment(1)=='usermanagement'){echo 'selected';}?>>Users</option>
                        <option value="4"<?php if($this->uri->segment(2)=='alot_buildings'){echo 'selected';}?>>Allot Buildings</option>
                        <option value="6"<?php if($this->uri->segment(2)=='activity_log'){echo 'selected';}?>>Activity Log</option>
                        <?php endif;?>
                        <?php if($this->session->userdata('access_level')==1) : ?>
                        <option value="7"<?php if($this->uri->segment(2)=='alloted_buildings'){echo 'selected';}?>>Allotted Buildings</option>
                        <?php endif;?>
                        <option value="2"<?php if($this->uri->segment(2)=='edit'){echo 'selected';}?>>My Details</option>
                        <option value="5"<?php if($this->uri->segment(2)=='account_profile'){echo 'selected';}?>>Account Status</option>
                        
                    </select>
                <!--<input type="dropbox-chooser" name="selected-file" style="visibility: hidden;"/>-->
                
                <a target="_blank" id="help" href="<?php echo base_url().'BIS User Guide.pdf'?>" title="Help">Help<span class="ir"></span></a>
		<!--<a id="logout" href="<?php echo base_url(); ?>index.php/login/logout" title="Logout">Log Out<span class="ir"></span></a>-->
                   <a href="http://capitalplanning.co.nz/?page_id=378&product=BIS" target="_blank" id="support" title="Support">Support<span class="ir"></span></a> 
		</div>
                
      </div>
</div>