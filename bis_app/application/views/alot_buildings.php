<?php

$this->load->view('navigation');

?>

<div id="container">
   <div class="box box-100">
		<div class="boxin">
			<div class="header">
				<h3>Building Allotment</h3>
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
                                                        <th class="tc">Name</th>
							<th class="tc">Building Name</th>
                                                        <th class="tc">Option</th>
						</tr>
					</thead>
                                        <?php //print_r($buildings)?>
					<tbody>
                                            <?php if($buildings != null) {?>
                                            <?php foreach($buildings as $build):?>
                                                        <tr>
                                                            <td>
                                                                    <?php foreach($users as $user) :?>
                                                                    <?php if($user->ID == $build->user_id) {?>
                                                                    <?php echo $user->display_name?>
                                                                    <?php } ?>
                                                                    <?php endforeach;?>
                                                            </td>
                                                            <td><?php echo $build->buildingname?></td>
                                                            <td><?php echo anchor('index.php/usermanagement/edit_alot_buildings/'.$build->id,'Edit');?></td>
                                                        </tr>
                                            <?php endforeach;?>
                                                        <?php } else {?>
                                                            <tr><td>No Buildings added</td></tr>
                                                        <?php }?>
					</tbody>
                                        
				</table>
			</div>
		</div>
	</div>

</div>
