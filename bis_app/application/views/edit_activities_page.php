<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-50">
		<div class="boxin">
                    <?php foreach($act as $acts) :?>
			<div class="header">
				<h3>Edit Event</h3>
				<span id="toolbar">
					<?php 
                                            if($this->session->userdata('access_level') == '0') {
                                                $user = "admin";
                                            } else if($this->session->userdata('access_level') == '1'){
                                                $user = "user";
                                            } else if($this->session->userdata('access_level') == '2'){
                                                $user = "bm";
                                            } else {
                                                $user = "guest";
                                            }
                                            echo anchor('index.php/dashboard/'.$user,'Back',array('class'=>'buttonBlack'));
                                            if ($this->session->userdata('access_level')<3) {
                                            echo anchor('index.php/dashboard/delete_activities_page/'.$this->uri->segment(3),'Delete',array('class'=>'buttonBlack'));
                                            echo anchor('#','Save',array('class'=>'buttonBlack','id'=>'Save'));
                                            }
                                        ?>					
				</span>
			</div>
                        
			<form class="fields edit_activities_page" action="<?php echo base_url(); ?>dashboard/add_activies" method="post">
                                <table>
                                    <tbody>
                                        <tr><td style="padding: 5px 8px 5px 0px;"><font color="red" size="3">*</font> Required</td></tr>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="date">&nbsp&nbsp&nbsp Date: </label>
                                            </td>
                                            <td style="padding: 5px 0px 5px 0px;">
                                                <input class="inputDate" id="inputDate" value="<?php echo date('d-m-Y',strtotime($acts->date));?>" />
                                                <input type="hidden" id="uid" value="<?php echo $this->session->userdata('access_level');?>" />
                                                <input type="hidden" id="act_id" value="<?php echo $acts->id?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="client">&nbsp&nbsp&nbsp Client: </label>
                                            </td>
                                            <td style="padding: 5px 0px 5px 0px;">
                                                <select id="client" style="width: 150px;">
                                                    <option value="0">Select Client</option>
                                                    <?php
                                                       foreach($clients as $client){
                                                           if($client->id == $acts->client) {
                                                           echo "<option selected value=".$client->id.">".$client->company."</option>";
                                                           } else {
                                                           echo "<option value=".$client->id.">".$client->company."</option>";    
                                                           }
                                                       }
                                                    ?>
                                                </select>
                                                and/or
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="building">&nbsp&nbsp&nbsp Building: </label>
                                            </td>
                                            <td style="padding: 5px 0px 5px 0px;">
                                                 <select id="building" style="width: 150px;">
                                                    <option value="0">Select Building</option>
                                                     <?php
                                                       foreach($buildings as $building){
                                                           if($building->id == $acts->building) {
                                                           echo "<option selected value=".$building->id.">".$building->buildingname."</option>";
                                                           } else {
                                                           echo "<option value=".$building->id.">".$building->buildingname."</option>";    
                                                           }
                                                       }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="purpose">&nbsp&nbsp&nbsp Purpose: </label>
                                            </td>
                                            <td style="padding: 5px 0px 5px 0px;">
                                                <select id="purpose" style="width: 150px;">
                                                    <option <?php if($acts->purpose == 0){echo "selected ";}?>value="0">Select Purpose</option>
                                                    <option <?php if($acts->purpose == 1){echo "selected ";}?>value="1">Client Management</option>
                                                    <option <?php if($acts->purpose == 2){echo "selected ";}?>value="2">Building Management</option>
                                                    <option <?php if($acts->purpose == 3){echo "selected ";}?>value="3">Inspection</option>
                                                    <option <?php if($acts->purpose == 4){echo "selected ";}?>value="4">Other</option>
                                                </select>   
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="act_name"><font color="red" size="3">*</font> Event: </label>
                                            </td>
                                            <td style="padding: 5px 0px 5px 0px;">
                                                <input type="text" id="act_name" class="txt" size="50" value="<?php echo $acts->name ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="act_des">&nbsp&nbsp&nbsp Note: </label>
                                            </td>
                                            <td style="padding: 5px 0px 5px 0px;">
                                                <input type="text" id="act_des" class="txt" size="50" value="<?php echo $acts->activities ?>"/>
                                            </td>
                                        </tr>
                                        
                                        
                                </tbody>
                                </table>
			</form>
                        <?php endforeach;?>
		</div>
	</div>
</div>