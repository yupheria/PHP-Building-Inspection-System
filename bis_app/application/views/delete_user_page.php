<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-50 redbox">
		<div class="boxin">
			<div class="header">
				<h3>Delete User</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/usermanagement', 'Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						//echo anchor('#', 'Save &raquo;', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
						echo anchor('#', 'Delete', array('class' => 'buttonBlack', 'id' => 'applyButton')); 
					?>
										
				</span>
			</div>
			<form class="fields delete_user_page" action="<?php echo base_url(); ?>usermanagement/delete_user_page" method="post">
				
				<label>Are you sure you want to delete this User?</label>
                                <?php foreach($record as $row) :?>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="hidden" id="userid" value="<?php echo $row->ID; ?>">
                                                First Name:
                                            </td>
                                            <td>
                                                <?php echo $row->display_name; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Email:
                                            </td>
                                            <td>
                                                <?php echo $row->user_email; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               User Type: 
                                            </td>
                                            <td>
                                                 <?php                               
                                                if ($row->user_url == 0) {
                                                    echo "Administrator";
                                                } else {
                                                    echo "Standard User";
                                                };                               
                                                ?>
                                            </td>
                                        </tr>
                                </tbody>
                                </table>
                                <?php endforeach;?>
                                
			</form>
		</div>
	</div>
</div>