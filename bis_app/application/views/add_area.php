<?php

$this->load->view('navigation');

?>
<div id="container">
        <?php include('selection_action.php');?>
        <div class="box box-30">
		<div class="boxin">
			<div class="header">
				<h3>Add Area</h3>
				<span id="toolbar">
				<?php 
                                     echo anchor('index.php/buildingmanagement/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7),'Back',array('class'=>'buttonBlack'));
                                     echo anchor('#', 'Save', array('class' => 'buttonBlack', 'id' => 'saveButton')); 
                                         ?>
				</span>
			</div>
			<div class="content">
                            <form class="fields add_areas_page" action="<?php echo base_url(); ?>buildingmanagement/add_areas" method="post">
				<table cellspacing="0" style="table-layout: fixed;">
                                    <thead>
                                        <td>Field</td>
                                        <td>Info</td>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><font color="red" size="3">*</font> Required</td>
                                        </tr>
                                        <?php foreach($record as $row) :?>
                                        <tr>
                                            <td>
                                                <label><font color="red" size="3">*</font> Area Name</label>
                                                <input type="hidden" id="site" name="site" value="<?php echo $this->uri->segment(4);?>" class="txt" />
                                                <input type="hidden" id="building" name="building" value="<?php echo $this->uri->segment(5);?>" class="txt" />
                                                <input type="hidden" id="client" name="client" value="<?php echo $this->uri->segment(3);?>" class="txt" />
                                                <input type="hidden" id="above" name="above" value="<?php 
                                                if($this->uri->segment(6)=='g' || $this->uri->segment(6)=='a'){
                                                    echo '1';
                                                } else {
                                                    echo '0';
                                                }
                                                ?>" class="txt" />
                                                <input type="hidden" id="level" name="level" value="<?php echo $this->uri->segment(7);?>" class="txt" />
                                                <input type="hidden" id="above1" name="site" value="<?php echo $this->uri->segment(6);?>" class="txt" />
                 
                                            </td>
                                            <td>
                                                <input type="text" maxlength="60" id="area_name" name="area_name" value="" size="30" class="txt" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label><font color="red" size="3">*</font> Description</label>
                                            </td>
                                            <td>
                                                <input type="text" maxlength="60" id="description" name="description" value="" size="30" class="txt" /> 
                                                <input disabled="disabled" type="hidden" maxlength="60" id="area_level" name="description" value="<?php 
                                                echo $this->uri->segment(7);
                                                        ?>" size="30" class="txt" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label><font color="red" size="3">*</font> Room Number</label>
                                            </td>
                                            <td>
                                                <input type="room_number" maxlength="60" id="room_number" name="room_number" value="" size="30" class="txt" />
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
				</table>
                            </form>
			</div>
		</div>
	</div>
    
</div>