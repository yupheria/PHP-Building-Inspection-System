<?php

$this->load->view('navigation');

?>

<div id="container">
   <div class="box box-10">
		<div class="boxin">
			<div class="header">
				<h3>Account Status</h3>
				<span id="toolbar">
				<?php 
                                    //echo anchor('#','Save',array('class'=>'buttonBlack','id'=>'save_allotment'));
				?>
				</span>
			</div>
			<div class="content">
				<table id="user_building" cellspacing="0" style="table-layout: fixed;">
					<thead>
						<tr>
                                                        <th class="tc">Field</th>
                                                        <th class="tc">Info</th>
						</tr>
					</thead>
					<tbody>
                                            <tr>
                                                <td>Number of Buildings:</td><td><?php echo $buildingcount?></td>
                                                </tr><tr>
                                                <td>Number of Users:</td><td><?php echo $this->session->userdata('userscount')?></td>
                                                 </tr><tr>
                                                <td>License Expiry:</td><td><?php echo date('d-m-Y',strtotime($this->session->userdata('client_license')))?></td>
                                            </tr>
					</tbody>
                                        
				</table>
			</div>
		</div>
	</div>

</div>
