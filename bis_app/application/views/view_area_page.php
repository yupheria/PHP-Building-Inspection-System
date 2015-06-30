<?php

$this->load->view('navigation');
?>
<div id="container">
     <?php include('selection_action.php');?>   
	<div class="box box-30">
		<div class="boxin">
                    <div class="header">
				<h3>Area Details</h3>
				<span id="toolbar">
					<?php 
                                        if($this->session->userdata('access_level')!=3) { 
                                        echo anchor('index.php/buildingmanagement/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7),'Back',array('class'=>'buttonBlack'));
					echo anchor('index.php/buildingmanagement/edit_area_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8),'Edit',array('class'=>'buttonBlack'));
                                        echo anchor('index.php/buildingmanagement/delete_area_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8),'Delete',array('class'=>'buttonBlack'));
                                        }?>					
				</span>
			</div>
			<div class="content">
                                <?php foreach($area_record as $record):?>
				<table cellspacing="0" style="table-layout: fixed;">
					<thead>
						<tr>
							<th class="tc last">Area Fields</th>
                                                        <th class="tc last">Area Details</th>
						</tr>
					</thead>
					<tbody>
                                               <tr>
                                                        <td><label>Area Name</label></td>
                                                        <td><label><?php echo $record->area_name;?></label></td>
                                               </tr> 
                                               <tr>
                                                        <td><label>Description</label></td>
                                                        <td><label><?php echo $record->description;?></label></td>
                                               </tr>   
                                               <tr>
                                                        <td><label>Area Level</label></td>
                                                        <td><label><?php echo $record->area_level;?></label></td>
                                               </tr>   
                                               <tr>
                                                        <td><label>Room Number</label></td>
                                                        <td><label><?php echo $record->room_number;?></label></td>
                                               </tr>   
                                        </tbody>
                                </table>
                            <?php endforeach; ?>
			</div>
		</div>
	</div>
</div>