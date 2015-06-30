<?php

$this->load->view('navigation');

?>

<div id="container">
	<div class="box box-25">
		<div class="boxin" id="groups">
			<div class="header">
				<span id="toolbar">
				<?php 
					echo anchor('client/addgroup', 'Add &raquo;', array('class' => 'buttonBlack', 'id' => 'addButton')); 
					echo anchor('#', 'Edit &raquo;', array('class' => 'buttonBlack-disabled', 'id' => 'editButton')); 
					echo anchor('#', 'Delete &raquo;', array('class' => 'buttonBlack-disabled', 'id' => 'deleteButton')); 
				?>
				</span>
			</div>
			<div class="content">
				<table cellspacing="0">
					<thead>
						<tr>
							<th class="first" class="groupid"></th>
							<th class="tc last">Group</th>
						</tr>
					</thead>
					<tbody>
					<?php
					
					$i = 0;
						foreach ($clientgroups as $row) {
						
						echo "<tr class=\"";
							if ($i == 0) 
							{
								echo "first";
							}
							if ($i % 2) 
							{
								echo " even";
							}
						echo "\">";
						
							echo "<td class=\"first groupid\">";
							echo "<input type=\"checkbox\" name=\"id\" value=\"".$row->id."\" />";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo "<a href=\"";
							echo base_url();
							echo "client/";
							echo $row->id."\" title=\"Edit\" >".$row->group_name."</a>";
							echo "</td>";
						
						echo "</tr>";
						
						$i++;
						}
						
						
						//print_r($clientlist);
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="box box-75 altbox">
		<div class="boxin">
			<div class="header">
				<h3>Clients</h3>
				<span id="toolbar">
				<?php 
					echo anchor('client/add', 'Add &raquo;', array('class' => 'buttonBlack', 'id' => 'addButton')); 
					echo anchor('#', 'Edit &raquo;', array('class' => 'buttonBlack-disabled', 'id' => 'editButton')); 
					echo anchor('#', 'Delete &raquo;', array('class' => 'buttonBlack-disabled', 'id' => 'deleteButton')); 
				?>
				</span>
			</div>
			<div class="content clearfix">
				<table cellspacing="0" id="clientlist">
					<thead>
						<tr>
							<th class="first clientid"></th>
							<th class="tc last">Name</th>
						</tr>
					</thead>
					<tbody>
					<?php
					
					$i = 0;
					if ($clientlist != NULL) 
					{
						foreach ($clientlist as $row) {
						
						echo "<tr class=\"";
							if ($i == 0) 
							{
								echo "first";
							}
							if ($i % 2) 
							{
								echo " even";
							}
						echo "\">";
						
							echo "<td class=\"first clientid\">";
							echo "<input type=\"checkbox\" name=\"id\" value=\"".$row->id."\" />";
							echo "</td>";
							
							echo "<td class=\"tc last\">";
							echo "<a href=\"";
							echo base_url();
							echo "client/";
							echo "edit/".$row->id."\" title=\"Edit\" >".$row->first_name." ".$row->last_name."</a>";
							echo "</td>";
						
						echo "</tr>";
						
						$i++;
						}
					}
					else {
						echo "<tr class=\"first even\">";
						echo "<td class=\"first clientid\" colspan=\"2\"> There are no clients in this group</td>";
						echo "</td>";
					}
						
						//print_r($clientlist);
					?>
					</tbody>
				</table>
				<div id="clientdetails">
					<div id="header">
						Client Details
						<span id="toolbar">
								<a href="http://localhost/bis_app/client/add" class="buttonBlack" id="addButton">Add &raquo;</a>
								<a href="http://localhost/bis_app/#" class="buttonBlack-disabled" id="editButton">Edit &raquo;</a>
								<a href="http://localhost/bis_app/#" class="buttonBlack-disabled" id="deleteButton">Delete &raquo;</a>				
						</span>
					</div>
					<div id="content">
					<div id="details">
					<?php if($record) : ?>
					<?php foreach ($record as $row) : ?>
					
					<?php if($row->image_url): ?>
					
					<div id="client_image">
						<img src="<?php echo base_url()."images/clients/".$row->image_url; ?>" alt="<?php echo $row->first_name." ".$row->last_name; ?>" />					
					</div>
					<?php else : ?>
					
					<div id="client_image" class="no-photo">
						<img src="<?php echo base_url()."images/clients/no-photo.jpg"; ?>" alt="<?php echo $row->first_name." ".$row->last_name; ?>" />					
					</div>
					
					<?php endif; ?>
					
					<div id="name_group">
						<div class="client_field" id="title_field">
							<label for="title_field">Title:</label>
							<input name="title_field" id="title_field" type="text" value="<?php echo $row->title; ?>" />
						</div>
						<div class="client_field" id="first_name">
							<label for="first_name">First name:</label>
							<input name="first_name" id="first_name" type="text" value="<?php echo $row->first_name; ?>" />
						</div>
						<div class="client_field">
							<label for="last_name">Last name:</label>
							<input name="last_name" id="last_name" type="text" value="<?php echo $row->last_name; ?>" />
						</div>
					</div>
					<div class="hidden" id="extra_client_details">
						<div id="address_group">
							<label for="address_line_1">Address line 1:</label>
							<input name="address_line_1" id="address_line_1" type="text" value="<?php echo $row->address_line_1; ?>" />
							<?php if($row->address_line_2) : ?>
							<label for="address_line_2">Address line 2:</label>
							<input name="address_line_2" id="address_line_2" type="text" value="<?php echo $row->address_line_2; ?>" />
							<?php endif; ?>
							<label for="suburb">Suburb:</label>
							<input name="suburb" id="suburb" type="text" value="<?php echo $row->suburb; ?>" />
							<label for="city">city:</label>
							<input name="city" id="city" type="text" value="<?php echo $row->city; ?>" />
						</div>
						<div id="phone_group">
							<div class="client_field">						
								<label for="home_phone">Home Phone:</label>
								<input name="home_phone" id="home_phone" type="text" value="<?php echo $row->home_phone; ?>" />
							</div>
							<div class="client_field">
								<label for="mobile_phone">Mobile Phone:</label>
								<input name="mobile_phone" id="mobile_phone" type="text" value="<?php echo $row->mobile_phone; ?>" />
							</div>
							<div class="client_field">
								<label for="business_phone">Business Phone:</label>
								<input name="business_phone" id="business_phone" type="text" value="<?php echo $row->business_phone; ?>" />
							</div>
						</div>
							<label for="email_address">Email address:</label>
							<input name="email_address" id="email_address" type="text" value="<?php echo $row->email_address; ?>" />
							<label for="website">Website:</label>
							<input name="website" id="website" type="text" value="<?php echo $row->website; ?>" />
							<label for="created">Date contact added:</label>
							<input name="created" id="created" type="text" value="<?php echo $row->created; ?>" />
							<label for="last_contacted">Date of last contact:</label>
							<input name="last_contacted" id="last_contacted" type="text" value="<?php echo $row->last_contacted; ?>" />
							<label for="group_id">Group:</label>
							<input name="group_id" id="group_id" type="text" value="<?php 
								foreach ($clientgroups as $clientgroupsrow) {
								
									if($clientgroupsrow->id == $row->group_id)
									{
										echo $clientgroupsrow->group_name;
									}
								}
							 ?>" />
						</div>
						</div>
						<div id="more_client_details" class="clearfix">
							More Client Details...
						</div>
						
						<div id="notes_header">
							Notes
						</div>						 
						 <div id="client_notes">
						 
						 <?php if($notes) : ?>
						 <?php foreach($notes as $note) : ?>
						 	<div class="note">
						 	<label for="note_<?php echo $note->id; ?>_title">Title:</label>
						 	<input type="text" name="note_<?php echo $note->id; ?>_title" value="<?php echo $note->title; ?>" />
						 		
						 		
						 	<span class="createdby">Created by: <a href="<?php 
						 		echo base_url() . "usermanagement/view/".$note->userid;
						 		?>">
						 		<?php
						 		foreach ($users as $user)
						 		{
						 			if($user->id == $note->userid)
						 			{
						 				echo $user->first_name . " " . $user->last_name;
						 			}
						 		}
						 		?>
						 	</span></a>
						 	<span class="createddate">
						 		<?php 
						 		echo date("l j F Y, g:i a", strtotime($note->created)); 
						 		?>
						 	</span>
						 	
						 	<textarea id="note_text"><?php echo $note->note; ?></textarea>
						 	</div>
						 <?php endforeach; ?>
						 <?php else : ?>
						 	<p>This client does not yet have any notes stored on file.</p>
						 <?php endif; ?>
						 </div>
						 
						<?php endforeach; ?>
						<?php else : ?>
						Click 'add' to create a new client record
<!--						<label for="title">Title:</label>
						<input name="title" id="title" type="text" value="" />
						<label for="first_name">First name:</label>
						<input name="first_name" id="first_name" type="text" value="" />
						<label for="last_name">Last name:</label>
						<input name="last_name" id="last_name" type="text" value="" />
						<label for="address_line_1">Address line 1:</label>
						<input name="address_line_1" id="address_line_1" type="text" value="" />
						<label for="address_line_2">Address line 2:</label>
						<input name="address_line_2" id="address_line_2" type="text" value="" />
						<label for="suburb">Suburb:</label>
						<input name="suburb" id="suburb" type="text" value="" />
						<label for="city">city:</label>
						<input name="city" id="city" type="text" value="" />
						<label for="home_phone">Home Phone:</label>
						<input name="home_phone" id="home_phone" type="text" value="" />
						<label for="mobile_phone">Mobile Phone:</label>
						<input name="mobile_phone" id="mobile_phone" type="text" value="" />
						<label for="business_phone">Business Phone:</label>
						<input name="business_phone" id="business_phone" type="text" value="" />
						<label for="email_address">Email address:</label>
						<input name="email_address" id="email_address" type="text" value="" />
						<label for="website">Website:</label>
						<input name="website" id="website" type="text" value="" />
						<label for="created">Date contact added:</label>
						<input name="created" id="created" type="text" value="" />
						<label for="last_contacted">Date of last contact:</label>
						<input name="last_contacted" id="last_contacted" type="text" value="" />
						<label for="group_id">Group:</label>
						<input name="group_id" id="group_id" type="text" value="" />-->
						<?php endif; ?>
						

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
