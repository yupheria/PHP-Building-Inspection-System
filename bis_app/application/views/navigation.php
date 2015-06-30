<div id="nav">
	<div class="inner-container clearfix">	
		<ul class="menu">
			<li><a href="<?php echo base_url().'index.php'; ?>/dashboard/<?php
			if($this->session->userdata('access_level') == '0') {
				echo "admin";
			} else if($this->session->userdata('access_level') == '1') {
				echo "user";
			} else if($this->session->userdata('access_level') == '2') {
                                echo "bm";
                        } else {
                                echo "guest";
                        }
			?>" title="Dashboard" class="<?php 
                        if($this->uri->segment(1)=='dashboard') { echo 'buttonBlack'; } else { echo 'button transparent'; };
                        ?>">Events</a></li>
			<li><a href="<?php echo base_url().'index.php'; ?>/buildinginspection" title="Building Inspection" class="<?php 
                        if($this->uri->segment(1)=='buildinginspection') { echo 'buttonBlack'; } else { echo 'button transparent'; };
                        ?>">Building Inspection</a></li>
			<li><a href="<?php echo base_url().'index.php'; ?>/clientmanagement" title="Client Management" class="<?php 
                        if($this->uri->segment(1)=='clientmanagement') { echo 'buttonBlack'; } else { echo 'button transparent'; };
                        ?>">Client Management</a></li>
			<li><a href="<?php echo base_url().'index.php'; ?>/buildingmanagement" title="Building Management" class="<?php 
                        if($this->uri->segment(1)=='buildingmanagement') { echo 'buttonBlack'; } else { echo 'button transparent'; };
                        ?>">Building Management</a></li>
			<li><a href="<?php echo base_url().'index.php'; ?>/bwof" title="BWoF Management" class="<?php 
                        if($this->uri->segment(1)=='bwof') { echo 'buttonBlack'; } else { echo 'button transparent'; };
                        ?>">BWoF Management</a></li>
			<li><a href="<?php echo base_url().'index.php'; ?>/reports" title="View Reports" class="<?php 
                        if($this->uri->segment(1)=='reports') { echo 'buttonBlack'; } else { echo 'button transparent'; };
                        ?>">View Report</a></li>
		</ul>	
	</div>
</div>