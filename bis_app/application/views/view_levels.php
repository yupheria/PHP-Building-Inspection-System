<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-10 altbox">
		<div class="boxin">
			<div class="header">
				<h3>Level</h3>
				<span id="toolbar">
					<?php 
					
					?>
										
				</span>
			</div>
			<div class="content">
				<table cellspacing="0" style="table-layout: fixed;">
					
					<tbody>
                                            <?php foreach($building as $build):
                                              ?>
                                            <tr>
                                                <td>
                                                    <form class="fields bm_ab" action="<?php echo base_url(); ?>buildingmanagement" method="post">
                                                    
                                                        <select id="bm_ab">
                                                            <option selected value="0">Select a Level </option>
                                                        <option <?php if($this->uri->segment(5)==1){echo 'selected ';}?>value="1">Above Ground Level</option>
                                                        <option <?php if($this->uri->segment(5)==2){echo 'selected ';}?>value="2">Below Ground Level</option>
                                                    </select>
                                                        <input type="hidden" id="site" value="<?php echo $this->uri->segment(3)?>"/>
                                                        <input type="hidden" id="building" value="<?php echo $this->uri->segment(4)?>"/>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <form class="fields bm_lvl" action="<?php echo base_url(); ?>buildingmanagement" method="post">
                                                    <select id="bm_lvl">
                                                    <?php 
                                                    if($this->uri->segment(5)==1) {
                                                    for($i = 0; $i <= $build->levels_above; $i++) {
                                                    if($i == 0) {
                                                        if($this->uri->segment(6)==$i){
                                                       echo '<option selected value=0>G</option>';     
                                                        } else {

                                                       echo '<option value=0>G</option>'; }
                                                       }
                                                     else {
                                                         if($this->uri->segment(6)==$i){
                                                        echo '<option selected value='.$i.'>'.$i.'</option>';
                                                         } else {
                                                        echo '<option value='.$i.'>'.$i.'</option>';     
                                                         }
                                                    }
                                                    }
                                                    } else if ($this->uri->segment(5)==2){
                                                        for($i = 1; $i <= $build->levels_below; $i++) {
                                                            if($this->uri->segment(6)==$i){ 
                                                                echo '<option selected value='.$i.'>-'.$i.'</option>';;
                                                                } else {
                                                                echo '<option value='.$i.'>-'.$i.'</option>';
                                                            }
                                                    } 
                                                    } else {
                                                        echo '<option selected value=0>G</option>';
                                                    }
                                                    
                                                        ?>
                                                    <input type="hidden" id="site" value="<?php echo $this->uri->segment(3)?>"/>
                                                    <input type="hidden" id="building" value="<?php echo $this->uri->segment(4)?>"/>
                                                    <input type="hidden" id="bm_ab" value="<?php echo $this->uri->segment(5)?>"/>
                                                    </select>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php 
                                           
                                            endforeach;?>            
                                        </tbody>
                                </table>
			</div>
		</div>
	</div>
        <?php if($this->uri->segment(6)|| $this->uri->segment(6)==0):?>
        <div class="box box-75 altbox">
		<div class="boxin">
			<div class="header">
				<h3>Areas</h3>
				<span id="toolbar">
				<?php 
                                    echo anchor('index.php/buildingmanagement/add_areas_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/','Add',array('class'=>'buttonBlack'));
                                         ?>
				</span>
			</div>
			<div class="content">
				<table cellspacing="0" style="table-layout: fixed;">
                                            <thead>
                                                <td>
                                                    Area Name
                                                </td>
                                                <td>
                                                    Option
                                                </td>
                                               
                                            </thead>
                                    <?php if($areas != null): ?>
                                    <?php foreach($areas as $area):?>
					<tbody>
                                            <?php if($this->uri->segment(6)==$area->area_level) : ?>
                                            <tr>
                                                <td>                            
                                                    <?php echo anchor('index.php/buildingmanagement/view_levels/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$area->id,$area->area_name); ?>
                                                </td>
                                                <td>
                                                    <?php echo anchor('index.php/buildinginspection/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$area->id,'View Hazards');?>
                                                </td>
                                            </tr>
                                            <?php endif;?>
					</tbody>
                                     <?php endforeach;?>
                                     <?php endif;?>
				</table>
			</div>
		</div>
	</div>
        <?php endif;?>
    <?php if($this->uri->segment(7)):?>
        <div class="box box-27 altbox">
		<div class="boxin">
			<div class="header">
				<h3>Area Detail</h3>
				<span id="toolbar">
				<?php 
                                    echo anchor('index.php/buildingmanagement/delete_area_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7),'Delete',array('class'=>'buttonBlack')); 
                                    echo anchor('index.php/buildingmanagement/edit_area_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7),'Edit',array('class'=>'buttonBlack'));
                                       
                                         ?>
				</span>
			</div>
			<div class="content">
				<table cellspacing="0" style="table-layout: fixed;">
                                    <thead>
                                        <td>Field</td>
                                        <td>Info</td>
                                    </thead>
                                    <tbody>
                                        <?php foreach($sarea as $area):?>
                                        <tr>
                                            <td>
                                                <label>Area Name</label>
                                            </td>
                                            <td>
                                                <label><?php echo $area->area_name;?></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Room Number</label>
                                            </td>
                                            <td>
                                                <label><?php echo $area->room_number;?></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Description</label>
                                            </td>
                                            <td>
                                                <label><?php echo $area->description;?></label>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
				</table>
			</div>
		</div>
	</div>
    <?php endif;?>
</div>