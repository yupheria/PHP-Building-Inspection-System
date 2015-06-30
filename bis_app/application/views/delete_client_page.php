<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-50 redbox">
		<div class="boxin">
			<div class="header">
				<h3>Delete Contact</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/clientmanagement/view_contact/'.$siteid.'/'.$this->uri->segment(3), 'Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						//echo anchor('#', 'Save &raquo;', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
						echo anchor('#', 'Delete', array('class' => 'buttonBlack', 'id' => 'applyButton')); 
					?>
										
				</span>
			</div>
			<form class="fields delete_client_page" action="<?php echo base_url(); ?>usermanagement/delete_client_page" method="post">
				
				<label>Are you sure you want to delete this Contact?</label>
                                <?php foreach($record as $row) :?>
                                
                                <table>
                                    <tbody>
                                         <tr>
                                        <td>
                                            <input type="hidden" id="clientid" value="<?php echo $row->id; ?>">
                                            Title:
                                        </td>
                                        <td>
                                                    <?php 
                                        foreach($titles as $title) {
                                            if($title->id == $row->title){
                                                echo $title->title;
                                            }
                                        } ?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           First Name: 
                                        </td>
                                        <td>
                                           <?php echo $row->first_name; ?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           Last Name: 
                                        </td>
                                        <td>
                                           <?php echo $row->last_name; ?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           Email: 
                                        </td>
                                        <td>
                                           <?php echo $row->email_address; ?> 
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
                                           Postal Address: 
                                        </td>
                                        <td>
                                           <?php echo $row->po_address; ?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           Postal Code: 
                                        </td>
                                        <td>
                                           <?php echo $row->po_code; ?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           Postal Suburb:  
                                        </td>
                                        <td>
                                           <?php echo $row->po_suburb; ?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           Postal City:  
                                        </td>
                                        <td>
                                           <?php echo $row->po_city; ?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           City: 
                                        </td>
                                        <td>
                                           <?php echo $row->city; ?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                          Country:  
                                        </td>
                                        <td>
                                                   <?php 
                                        foreach($countries as $country){
                                            if($country->id == $row->country){
                                                echo $country->name;
                                            }
                                        }
                                        ?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                        Home Phone:    
                                        </td>
                                        <td>
                                        <?php echo $row->home_phone; ?>    
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                          Mobile Phone:  
                                        </td>
                                        <td>
                                         <?php echo $row->mobile_phone; ?>  
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                         Business Phone:    
                                        </td>
                                        <td>
                                          <?php echo $row->business_phone; ?>  
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
                                          Company:  
                                        </td>
                                        <td>
                                           <?php echo $company; ?> 
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                                <?php endforeach;?>
                                
			</form>
		</div>
	</div>
</div>