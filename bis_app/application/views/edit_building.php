<?php

$this->load->view('navigation');

?>

<div id="container">
 <?php include('selection_action.php');?>

	<div class="box box-80">
		<div class="boxin">
			<div class="header">
				<h3>Edit Building</h3>
				<span id="toolbar">
				<?php 
                                        echo anchor('index.php/buildingmanagement/view_building/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5), 'Back', array('class' => 'buttonBlack'));
                                        if($this->session->userdata('access_level')<3) {
                                        echo anchor('#', 'Save', array('class' => 'buttonBlack', 'id' => 'saveButton'));    
                                        }
                                
				?>
				</span>
			</div>
		
		<div class="content clearfix">
                    <?php foreach($record as $row) :?>
                    <form class="fields edit_building" action="<?php echo base_url(); ?>buildingmanagement/edit_building" method="post">
				<table cellspacing="0" style="table-layout: fixed;" id="clientdetails">
					<thead>
						<tr>
							<!--<th class="first" class="groupid"></th>-->
							<th class="tc last" style="width:160px;">Fields</th>
							<th class="tc last">Info</th>
						</tr>
					</thead>
					<tbody>
                                            <tr>
                                            <td><font color="red" size="3">*</font> Required</td>
                                        </tr>
                                                <tr>
								<td style="padding-left: 18px;">
								Client Name:
								</td>
                                                                <td>
								<?php 
                                                                echo $companame;
                                                                ?>
								</td>
								</tr>
								
								<tr>
								<td style="padding-left: 18px;">
								Site Name:
								</td>
								<td style='overflow:hidden;'>
								<?php
                                                                foreach($sitesbyclient as $site) {
                                                                if($site->id == $this->uri->segment(4)) {
                                                                    echo $site->sitename;
                                                                }
                                                                }
                                                                ?>
                                                                <input type="hidden" id="buildingid" name="buildingid" value="<?php echo $row->id;?>" class="txt" />
                                                                <input type="hidden" id="site" name="site" value="<?php echo $this->uri->segment(4)?>" class="txt" />
                                                                <input type="hidden" id="client" name="client" value="<?php echo $this->uri->segment(3)?>" class="txt" />
								</td>
								</tr>
                                                                
                                                                <tr>
								<td>
								<font color="red" size="3">*</font> Building Name:
								</td>
								<td style='overflow:hidden;'>
								<input type="text" maxlength="60" id="buildingname" name="buildingname" value="<?php echo $row->buildingname;?>" size=35 class="txt" />
								</td>
								</tr>
                                                                
                                                                <tr>
								<td>
								<font color="red" size="3">*</font> Description:
								</td>
								<td style='overflow:hidden;'>
								<input type="text" maxlength="60" id="description" name="description" value="<?php echo $row->description;?>" size=35 class="txt" />
								</td>
								</tr>
                                                                
                                                                <tr>
								<td>
								<font color="red" size="3">*</font> Address Line 1
								</td>
								<td style='overflow:hidden;'>
								<input type="text" maxlength="60" id="address_line_1" name="address_line_1" value="<?php echo $row->address_line_1;?>" size=35 class="txt" />
								</td>
								</tr>
								
								<tr>
								<td style="padding-left: 18px;">
								Address Line 2
								</td>
								<td style='overflow:hidden;'>
								<input type="text" maxlength="60" id="address_line_2" name="address_line_2" value="<?php echo $row->address_line_2;?>" size=35 class="txt" />
								</td>
								</tr>
                                                                
                                                                <tr>
								<td>
								<font color="red" size="3">*</font> Suburb
								</td>
								<td style='overflow:hidden;'>
								<input type="text" maxlength="60" id="suburb" name="suburb" value="<?php echo $row->suburb;?>" size=35 class="txt" />
								</td>
								</tr>
                                                                
                                                                <tr>
								<td>
								<font color="red" size="3">*</font> City
								</td>
								<td style='overflow:hidden;'>
								<input type="text" maxlength="60" id="city" name="city" value="<?php echo $row->city;?>" size=35 class="txt" />
								</td>
								</tr>
                                                                
                                                                <tr>
								<td style="padding-left: 18px;">
								Country
								</td>
								<td>
								<select id="country" name="country" style="width: 100px;">
                                                                <?php                              
                                                                foreach($countries as $country) {                                 
                                                                    if($country->id == $row->country) {
                                                                    echo "<option selected value=".$country->id.">".$country->name."</option>";    
                                                                    } else {
                                                                    echo "<option value=".$country->id.">".$country->name."</option>";        
                                                                    }
                                                                }
                                                                ?>
                                                                </select>
								</td>
								</tr>
                                                                
                                                                <tr>
								<td style="padding-left: 18px;">
								Levels Above
								</td>
								<td style='overflow:hidden;'>
								<select id="levels_above" name="levels_above" style="width: 100px;">
                                                                <?php
                                                                for($i = 0; $i < 161; $i++) {
                                                                    if($row->levels_above == $i) {
                                                                    echo "<option selected value=".$i.">".$i."</option>";
                                                                    } else {
                                                                    echo "<option value=".$i.">".$i."</option>";                                          
                                                                    }
                                                                }
                                                                ?>
                                                                </select>
								</td>
								</tr>
                                                                
                                                                <tr>
								<td style="padding-left: 18px;">
								Levels Below
								</td>
								<td style='overflow:hidden;'>
								<select id="levels_below" name="levels_below" style="width: 100px;">
                                                                <?php
                                                                for($i = 0; $i < 6; $i++) {
                                                                    if($row->levels_below == $i) {
                                                                    echo "<option selected value=".$i.">".$i."</option>";
                                                                    } else {
                                                                    echo "<option value=".$i.">".$i."</option>";                                          
                                                                    }
                                                                }
                                                                ?>
                                                                </select>
								</td>
								</tr>
                                                                
                                                                <tr>
								<td style="padding-left: 18px;">
								Month Constructed
								</td>
								<td style='overflow:hidden;'>
								<select id="month_contructed" name="month_contructed" style="width: 100px;">
                                                                <?php
                                                                foreach($months as $month) {
                                                                    if($month->id == $row->month_contructed) {
                                                                    echo "<option selected value=".$month->id.">".$month->month."</option>";
                                                                    } else {
                                                                    echo "<option value=".$month->id.">".$month->month."</option>";                                          
                                                                    }
                                                                }
                                                                ?>
                                                                </select>
								</td>
								</tr>
                                                                
                                                                <tr>
								<td style="padding-left: 18px;">
								Year Constructed
								</td>
								<td style='overflow:hidden;'>
								<select id="year_constructed" name="year_constructed" style="width: 100px;">
                                                                <?php
                                                                for($i = 1815; $i < 2012; $i++) {
                                                                    if($row->year_constructed == $i) {
                                                                    echo "<option selected value=".$i.">".$i."</option>";
                                                                    } else {
                                                                    echo "<option value=".$i.">".$i."</option>";                                          
                                                                    }
                                                                }
                                                                ?>
                                                                </select>
								</td>
								</tr>
                                                                
                                                                <!--<tr>
								<td>
								&nbsp&nbsp&nbsp Google Map
								</td>
								<td style='overflow:hidden;'>
								<textarea id="map" name="map" value="<?php echo $row->map;?>" > </textarea> 
								</td>
								</tr>-->
					</tbody>
				</table>
                                </form>
                    <?php endforeach;?>
			</div>
                    </div>
	</div>
</div>
