<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-50 redbox">
		<div class="boxin">
			<div class="header">
				<h3>Delete Client</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/clientmanagement/view_client/'.$this->uri->segment(3), 'Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						//echo anchor('#', 'Save &raquo;', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
						echo anchor('#', 'Delete', array('class' => 'buttonBlack', 'id' => 'applyButton')); 
					?>
										
				</span>
			</div>
			<form class="fields delete_group_page" action="<?php echo base_url(); ?>usermanagement/delete_group_page" method="post">
				
				<label>Are you sure you want to delete this User?</label>
                        
                                <?php foreach($record as $row) :?>
                                <table>
                                    <tbody>
                                         <tr>
                                        <td>
                                            <input type="hidden" id="groupid" value="<?php echo $row->id; ?>"></input>
                                            Client Name: 
                                        </td>
                                        <td>
                                            <?php echo $row->company; ?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           Address Line 1: 
                                        </td>
                                        <td>
                                           <?php echo $row->address_line_1; ?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           Address Line 2: 
                                        </td>
                                        <td>
                                           <?php echo $row->address_line_2; ?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                          Suburb:   
                                        </td>
                                        <td>
                                           <?php echo $row->suburb; ?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           City:  
                                        </td>
                                        <td>
                                                    <?php 
                                        foreach($countries as $country) {
                                            if($country->id == $row->country){
                                                echo $country->name;
                                            }
                                        } ?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                          Country:  
                                        </td>
                                        <td>
                                           <?php echo $row->country; ?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           Phone: 
                                        </td>
                                        <td>
                                             <?php echo $row->phone; ?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                          Email:  
                                        </td>
                                        <td>
                                           <?php echo $row->email; ?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           Website:  
                                        </td>
                                        <td>
                                           <?php echo $row->website; ?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           Company Type: 
                                        </td>
                                        <td>
                                                   <?php 
                                        foreach($company_type as $type) {
                                            if($type->id == $row->company_type){
                                                echo $type->company_type;
                                            }
                                        }                                 
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