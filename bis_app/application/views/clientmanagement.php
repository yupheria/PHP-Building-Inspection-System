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
                                                if($clientgroups != null) {
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
                                                        
                                                        echo anchor('index.php/clientmanagement/index/'.$row->id,'View');		
                                                         		
							echo "</a>";
							echo "</td>";
							
						echo "</tr>";		
						$i++;
						
						}
                                                }
						
						//print_r($clientlist);
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
        <?php endif; ?>
        <?php if(false):?>
	<div class="box box-75">
		<div class="boxin">
			<div class="header">
				<h3>Contacts</h3>
				<span id="toolbar">
				<?php 
                                        if($this->uri->segment(3) && $this->session->userdata('access_level')<3){
					echo anchor('index.php/clientmanagement/add_contact/'.$this->uri->segment(3), 'Add &raquo;', array('class' => 'buttonBlack', 'id' => 'addButton')); 
                                        }//echo anchor('#', 'Edit &raquo;', array('class' => 'buttonBlack-disabled', 'id' => 'editButton')); 
					//echo anchor('#', 'Delete &raquo;', array('class' => 'buttonBlack-disabled', 'id' => 'deleteButton')); 
				?>
				</span>
			</div>
			<div class="content clearfix" style="table-layout: fixed;">
                             <?php if ($clientlist != NULL) : ?>
				<table cellspacing="0" id="clientlist">
					<thead>
						<tr>
							<!--<th class="first clientid"></th>-->
							<th class="tc last" style="width: 130px;">Name</th>
							
							
                                                        
						</tr>
					</thead>
					<tbody>
					<?php
					
					
					
						foreach ($clientlist as $row) {
						if ($this->uri->segment(4) == $row->id) {
                                                    echo "<tr class='highlight'>";
                                                } else {
                                                    echo "<tr>";
                                                }
                                                        echo "<td style='overflow:hidden;'>";
							//echo "<td class=\"tc last\">";
							echo anchor('index.php/clientmanagement/view_contact/'.$row->group_id.'/'.$row->id,$row->first_name.' '.$row->last_name);
							echo "</td>";
							
						
						echo "</tr>";
						
						$i++;
						
					}
						
						//print_r($clientlist);
					?>
					</tbody>
				</table>
                            <?php endif;?>
			</div>
		</div>
	</div>
    <?php endif; ?>
</div>

