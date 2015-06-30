<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-50 redbox">
		<div class="boxin">
			<div class="header">
				<h3>Delete Site</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/buildingmanagement/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4), 'Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						echo anchor('#', 'Delete', array('class' => 'buttonBlack', 'id' => 'applyButton')); 
						//echo anchor('#', 'Apply &raquo;', array('class' => 'buttonBlack', 'id' => 'applyButton'));
					?>
										
				</span>
			</div>
			<form class="fields delete_site_page" action="<?php echo base_url(); ?>buildingmanagement/delete_site" method="post">
                                <label>Are you sure you want to delete this site?</label>
                                <?php foreach($record as $row) :?>
                                <table>
                                    <tbody>
                                         <tr>
                                        <td>
                                            <input type="hidden" id="siteid" value="<?php echo $row->id; ?>"></input> 
                                            Site Name:
                                        </td>
                                        <td>
                                            <?php echo $row->sitename;?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           Address Line 1: 
                                        </td>
                                        <td>
                                          <?php echo $row->address_line_1;?>  
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                          Address Line 2:  
                                        </td>
                                        <td>
                                            <?php echo $row->address_line_2;?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           Suburb: 
                                        </td>
                                        <td>
                                           <?php echo $row->suburb;?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           City:  
                                        </td>
                                        <td>
                                            <?php echo $row->city;?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            Country:
                                        </td>
                                        <td>
                                                        <?php
                                            foreach($countries as $country){
                                                if($country->id == $row->country) {
                                                echo $country->name;
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