<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-50 redbox">
		<div class="boxin">
			<div class="header">
				<h3>Delete Area</h3>
				<span id="toolbar">
					<?php 
						echo anchor('index.php/buildingmanagement/view_area_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8), 'Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
						echo anchor('#', 'Delete', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
						//echo anchor('#', 'Apply &raquo;', array('class' => 'buttonBlack', 'id' => 'applyButton'));
					?>
										
				</span>
			</div>
			<form class="fields delete_area_page" action="<?php echo base_url(); ?>buildingmanagement/delete_area" method="post">
				<label>Are you sure you want to delete this area?</label>
                                
                                <?php foreach($record as $row) :?>
                               <input type="hidden" id="site" name="site" value="<?php echo $this->uri->segment(4);?>" class="txt" />
                                                <input type="hidden" id="building" name="building" value="<?php echo $this->uri->segment(5);?>" class="txt" />
                                                <input type="hidden" id="client" name="client" value="<?php echo $this->uri->segment(3);?>" class="txt" />
                                                <input type="hidden" id="above" name="above" value="<?php 
                                                if($this->uri->segment(6)=='g'){
                                                    echo '1';
                                                } else {
                                                    echo $this->uri->segment(6);
                                                }
                                                ?>" class="txt" />
                                                <input type="hidden" id="level" name="level" value="<?php echo $this->uri->segment(7);?>" class="txt" />
                                                <input type="hidden" id="above1" name="above1" value="<?php echo $this->uri->segment(6);?>" class="txt" />
                                                <input type="hidden" id="areaid" name="areaid" value="<?php echo $this->uri->segment(8);?>" class="txt" />
				<table>
                                    <tbody>
                                    <tr>
                                 <td><label>Area Name: </label> </td>
                                <td><label> <?php echo $row->area_name ?></label></td>
                                    </tr>
                                    <tr>
                                <td><label >Description :</label></td>
				<td><label> <?php echo $row->description ?></label></td>
                                    </tr>
                                    <tr>
                                <td><label>Area Level :</label></td>
				<td><label> <?php echo $row->area_level ?></label></td>
                                    </tr>
                                    <tr>
                               <td> <label >Above Ground Level :</label></td>
				<td><label> <?php 
                                if($row->above == 1) {
                                echo "Yes";
                                } else {
                                echo "No";    
                                }
                                ?></label></td>
                                    </tr>
                                    <tr>
                                 <td><label>Room Number :</label></td>
				<td><label> <?php echo $row->room_number ?></label></td>
                                    </tr>
                                    </tbody>
                                </table>
				<?php endforeach;?>
                                
			</form>
		</div>
	</div>
</div>