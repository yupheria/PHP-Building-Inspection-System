<div id="container">
   <div class="box box-200">
		<div class="boxin">
			<div class="header">
				<h3>BIS Users</h3>
				<span id="toolbar">
				<?php 
                                    //echo anchor('edit_message','Edit Message',array('class'=>'buttonBlack','id'=>'edit_message'));
                                    //echo anchor('send_message','Save Message',array('class'=>'buttonBlack','id'=>'send_message'));
				?>
				</span>
			</div>
			<div class="content">
				<table id="user_building" cellspacing="0" style="table-layout: fixed;">
					<thead>
						<tr>
                                                        <th style="width: 30px;" class="tc">Register</th>
                                                        <th style="width: 20px;" class="tc">ID</th>
                                                        <th style="width: 30px;" class="tc">License</th>
                                                        <th style="width: 50px;" class="tc">Last Login</th>
                                                        <th style="width: 20px;" class="tc">Login Times</th>
                                                        <th style="width: 20px;" class="tc">Days Left</th>
                                                        <th style="width: 20px;" class="tc">Days Since Last Login</th>
                                                        <th style="width: 20px;" class="tc">Days Since Registered</th>
                                                        <th style="width: 30px;" class="tc">User Email</th>
						</tr>
					</thead>
					<tbody>
                                            <?php foreach($result->result() as $row):?>
                                            <tr>
                                                 <td><?php echo $row->{'Date Register'}?></td>
                                                 <td><?php echo $row->ID?></td>
                                                 <td><?php echo $row->{'BIS License'}?></td>
                                                 <td><?php echo $row->last_login?></td>
                                                 <td><?php echo $row->login_times?></td>
                                                 <td><?php echo $row->{'Days Left'}?></td>
                                                 <td><?php echo $row->{'Not Log Days'}?></td>
                                                 <td><?php echo $row->{'Days Register'}?></td>
                                                 <td><?php echo $row->user_email?></td>
                                            </tr>
                                            <?php endforeach;?>
					</tbody>
                                        
				</table>
			</div>
		</div>
	</div>

</div>
