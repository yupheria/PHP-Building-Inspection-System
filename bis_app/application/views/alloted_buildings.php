<?php

$this->load->view('navigation');

?>

<div id="container">
   <div class="box box-10">
		<div class="boxin">
			<div class="header">
				<h3>Building Allotted</h3>
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
							<th class="tc">Building Name</th>
						</tr>
					</thead>
                                        <?php //print_r($buildings)?>
					<tbody>
                                            <?php if($buildings != null) {?>
                                            <?php foreach($buildings as $build):?>
                                                        <tr>
                                                            <td><?php echo $build->buildingname?></td>
                                                        </tr>
                                            <?php endforeach;?>
                                            <?php } else { ?>
                                                <tr>
                                                  <td>No Buildings Assigned to this user</td>
                                                </tr>
                                            <?php }?>
					</tbody>
                                        
				</table>
			</div>
		</div>
	</div>

</div>
