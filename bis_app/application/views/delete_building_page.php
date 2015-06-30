<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-50 redbox">
		<div class="boxin">
			<div class="header">
				<h3>Delete Building</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/buildingmanagement/view_building/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5), 'Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						echo anchor('#', 'Delete', array('class' => 'buttonBlack', 'id' => 'applyButton')); 
						//echo anchor('#', 'Apply &raquo;', array('class' => 'buttonBlack', 'id' => 'applyButton'));
					?>
										
				</span>
			</div>
			<form class="fields delete_building_page" action="<?php echo base_url(); ?>buildingmanagement/delete_building" method="post">
                            <label>Are you sure you want to delete this building?  </label>
                             <?php foreach($record as $row) :?> 
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                     <input type="hidden" id="buildingid" name="building" value="<?php echo $row->id ?>" class="txt" />
                                     <input type="hidden" id="client" name="building" value="<?php echo $this->uri->segment(3) ?>" class="txt" />
                                     <input type="hidden" id="site" name="building" value="<?php echo $this->uri->segment(4) ?>" class="txt" />
                                     Name:
                                        </td>
                                        <td>
                                      <?php echo $row->buildingname?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Description:
                                        </td>
                                        <td>
                                            <?php echo $row->description?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Site:
                                        </td>
                                        <td>
                                            <?php 
                                          foreach($sites as $site) {
                                                if($site->id == $row->site) {
                                                    echo $site->sitename;
                                                }
                                            }
                                          ?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           Address line 1: 
                                        </td>
                                        <td>
                                            <?php echo $row->address_line_1?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            Address line 2:
                                        </td>
                                        <td>
                                            <?php echo $row->address_line_2?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            Suburb:
                                        </td>
                                        <td>
                                           <?php echo $row->suburb?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                          City:  
                                        </td>
                                        <td>
                                          <?php echo $row->city?>  
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                          Country:  
                                        </td>
                                        <td>
                                                       <?php 
                                            foreach($countries as $country) {
                                                if($country->id == $row->country) {
                                                    echo $country->name;
                                                }
                                            }
                                          ?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           Levels Above: 
                                        </td>
                                        <td>
                                           <?php echo $row->levels_above?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            Levels Below:
                                        </td>
                                        <td>
                                            <?php echo $row->levels_below?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                           Month Constructed: 
                                        </td>
                                        <td>
                                                   <?php 
                                      foreach($months as $month) {
                                          if($month->id == $row->month_contructed) {
                                              echo $month->month;
                                            }
                                      }
                                              ?> 
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            Year Constructed:
                                        </td>
                                        <td>
                                            <?php echo $row->year_constructed?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            Map:
                                        </td>
                                        <td>
                                             <?php echo $row->map?>
                                        </td>
                                    </tr>
                              <?php endforeach; ?>
                                </tbody>
                              </table>
			</form>
		</div>
	</div>
</div>