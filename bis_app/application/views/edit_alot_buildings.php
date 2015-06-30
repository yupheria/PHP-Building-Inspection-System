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
                                    echo anchor('index.php/usermanagement/alot_buildings','Back',array('class'=>'buttonBlack'));
                                    echo anchor('#','Save',array('class'=>'buttonBlack','id'=>'save_allotment'));
				?>
				</span>
			</div>
			<div class="content">
				<table id="user_building" cellspacing="0" style="table-layout: fixed;">
					<thead>
						<tr>
							<th class="tc">Building_Name</th>
							<th class="tc">Assigned_User</th>
						</tr>
					</thead>
                                        <?php foreach($building as $build){
                                            $user_id = $build->user_id;
                                        }
                                        ?>  
					<tbody>
                                            <?php foreach($building as $build):?>
                                                        <tr>
                                                            <td><?php echo $build->buildingname?>
                                                                <input id="building_id" type="hidden" value="<?php echo $this->uri->segment(3)?>"/>
                                                            </td>
                                                            <td>
                                                                <select id="user_id">
                                                                    <?php foreach($users as $user):?>
                                                                        <?php if($user->ID == $user_id){?>
                                                                        <option selected value="<?php echo $user->ID?>"><?php echo $user->display_name?></option>
                                                                        <?php } else {?>
                                                                        <option value="<?php echo $user->ID?>"><?php echo $user->display_name?></option>
                                                                        <?php }?>
                                                                    <?php endforeach;?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                             <?php endforeach;?>
					</tbody>
				</table>
                                <?php //echo print_r($users)?>
			</div>
		</div>
	</div>

</div>
