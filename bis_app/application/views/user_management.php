<?php

$this->load->view('navigation');
?>

<div id="container">
	<div class="box box-52">
		<div class="boxin">
			<div class="header">
				<h3>User Management</h3>
				<span id="toolbar">
				<?php 
					
                                        echo anchor('index.php/usermanagement/alot_buildings', 'Allot Building', array('class' => 'buttonBlack', 'id' => 'addButton'));
                                        echo anchor('index.php/usermanagement/add/3', 'Add User', array('class' => 'buttonBlack', 'id' => 'addButton'));
					//echo anchor('#', 'Edit &raquo;', array('class' => 'buttonBlack-disabled', 'id' => 'editButton')); 
					//echo anchor('#', 'Delete &raquo;', array('class' => 'buttonBlack-disabled', 'id' => 'deleteButton')); 
				?>
				</span>
			</div>
			<div class="content">
				<table cellspacing="0" style="table-layout: fixed;">
					<thead>
						<tr>
							<!--<th class="first"></th>-->
							<th class="tc" style="width: 220px;">Username</th>
                                                        <th class="tc">Last Login</th>
							<th class="tc" style="width: 220px;">Email address</th>
							<th class="tc" style="width: 120px;">User type</th>
                                                        <th class="last" style="width: 70px;">Option</th>
						</tr>
					</thead>
					<tbody>
					<?php
					
					$i = 0;
						foreach ($userlist as $row) {
						
						echo "<tr class =\"";
							if ($i == 0) 
							{
								echo "first";
							}
							if ($i % 2) 
							{
								echo " even";
							}
						echo "\">";
						
							//echo "<td class=\"first\">";
							//echo "<input type=\"checkbox\" name=\"id\" value=\"".$row->id."\" />";
							//echo "</td>";
							
							echo "<td style='overflow:hidden;'>";
							echo "<a href=\"";
							echo base_url()."index.php/";
							echo "usermanagement/";
							echo "edit/".$row->ID."/".$row->user_url."\" title=\"Edit\" >".$row->display_name."</a>";
							echo "</td>";
							
                                                        echo "<td class=\"tc\">";
							echo date('d-m-Y',strtotime($row->last_login));
							echo "</td>";
                                                        
							echo "<td class=\"tc\">";
							echo $row->user_email;
							echo "</td>";
							
							echo "<td class=\"tc\">";
                                                        switch ($row->user_url) {
                                                            case 0: echo "Administrator";
                                                                break;
                                                            case 1: echo "User";
                                                                break;
                                                            case 2: echo "Building Manager";
                                                                break;
                                                            case 3: echo "Guest";
                                                            default: "Unkown";
                                                                break;
                                                        }
							echo "</td>";
							
                                                echo "<td class=\"last\">";
												if($row->user_url==0) {
                                                echo "Delete";
												} else {
												echo anchor('index.php/usermanagement/delete_user_page/'.$row->ID, 'Delete');
												}
						echo "</td>";
						echo "</tr>";
						
						$i++;
						}
						
						
						//print_r($userlist);
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
