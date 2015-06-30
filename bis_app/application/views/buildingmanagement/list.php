<?php

$this->load->view('navigation');

?>

<div id="container">

<?php $this->load->view('buildingmanagement/_sidebar'); ?>

	<div class="box box-75 altbox wizardframe">
	
			<div class="boxin">
				<div class="header">
					<h3>Building list</h3>
					<span id="toolbar">
					<?php 
						echo anchor('client/add', 'Add &raquo;', array('class' => 'buttonBlack', 'id' => 'addButton')); 
						echo anchor('#', 'Edit &raquo;', array('class' => 'buttonBlack-disabled', 'id' => 'editButton')); 
						echo anchor('#', 'Delete &raquo;', array('class' => 'buttonBlack-disabled', 'id' => 'deleteButton')); 
					?>
					</span>
				</div>
				<div class="content clearfix">
					<table cellspacing="0" id="">
						<thead>
							<tr>
								<th class="first "></th>
								<th class="tc">Building name</th>
								<th class="tc">Address</th>
								<th class="tc">Site</th>
								<th class="tc">Contact</th>
								<th class="tc last">Role</th>
							</tr>
						</thead>
							<tbody>
								<tr class="first">
									<td class="first ">
										<input type="checkbox" name="id" value="1">
									</td>
									<td class="tc">
										Washington Plaza
									</td>
									<td class="tc">
										12 Sample Street
									</td>
									<td class="tc">
										Site 1
									</td>
									<td class="tc">
										<a href="http://localhost/bis_app/client/edit/1" title="Edit">Caleb Tutty</a>
									</td>
									<td class="tc last">
										Owner
									</td>
								</tr>
								<tr class="even">
									<td class="first ">
										<input type="checkbox" name="id" value="1">
									</td>
									<td class="tc">
										Capital Planning
									</td>
									<td class="tc">
										13 Sample Street
									</td>
									<td class="tc">
										Site 2
									</td>
									<td class="tc">
										<a href="http://localhost/bis_app/client/edit/1" title="Edit">Selwyn Kenneally</a>
									</td>
									<td class="tc last">
										Owner
									</td>
								</tr>
								<tr class="">
									<td class="first ">
										<input type="checkbox" name="id" value="1">
									</td>
									<td class="tc">
										Big Town Business
									</td>
									<td class="tc">
										14 Sample Street
									</td>
									<td class="tc">
										Site 3
									</td>
									<td class="tc">
										<a href="http://localhost/bis_app/client/edit/1" title="Edit">Joe Bloggs</a>
									</td>
									<td class="tc last">
										Body Corporate
									</td>
								</tr>
								<tr class="even">
									<td class="first ">
										<input type="checkbox" name="id" value="1">
									</td>
									<td class="tc">
										Braemar Sericed Offices
									</td>
									<td class="tc">
										15 Sample Street
									</td>
									<td class="tc">
										Site 4
									</td>
									<td class="tc">
										<a href="http://localhost/bis_app/client/edit/1" title="Edit">Anne White</a>
									</td>
									<td class="tc last">
										Office Manager
									</td>
								</tr>
								<tr class="last">
									<td class="first ">
										<input type="checkbox" name="id" value="1">
									</td>
									<td class="tc">
										Grand Hotel
									</td>
									<td class="tc">
										16 Sample Street
									</td>
									<td class="tc">
										Site 5
									</td>
									<td class="tc">
										<a href="http://localhost/bis_app/client/edit/1" title="Edit">Jane Doe</a>
									</td>
									<td class="tc last">
										Receptionist
									</td>
								</tr>
							</tbody>
						</table>						
					</div>
				</div>
			</div>
		</div>
	</div>
	