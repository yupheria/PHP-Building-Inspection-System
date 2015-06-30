<?php

$this->load->view('navigation');

?>
<div id="container">
	<div class="box box-50">
		<div class="boxin">
			<div class="header">
				<h3>Add Event</h3>
				<span id="toolbar">
					<?php 
                                            if($this->session->userdata('access_level') == '0') {
                                                $user = "admin";
                                            } else {
                                                $user = "user";
                                            }
                                            echo anchor('index.php/dashboard/'.$user,'Back',array('class'=>'buttonBlack'));
                                            echo anchor('#','Save',array('class'=>'buttonBlack','id'=>'Save'));
                                        ?>					
				</span>
			</div>
			<form class="fields add_activities_page" action="<?php echo base_url(); ?>dashboard/add_activies" method="post">
				<table style="table-layout: fixed;">
                                    <tbody>
                                        <tr> 
                                            <td style="padding: 5px 8px 5px 0px;"><font color="red" size="3">*</font> Required</td>
                                        </tr>
                                        <tr>
                                            
                                            <td style="padding: 5px 8px 5px 0px;">
                                               <label for="date"> &nbsp&nbsp&nbsp Date: </label> 
                                            </td>
                                            <td style="padding: 5px 0px 5px 0px;">
                                               <input class="inputDate" id="inputDate" value="<?php echo date("d-m-Y");?>" />
                                               
                                               <input type="hidden" id="uid" value="<?php echo $this->session->userdata('access_level');?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="client"> &nbsp&nbsp&nbsp Client: </label>
                                            </td>
                                            <td style="padding: 5px 0px 5px 0px;">
                                                <select id="client" style="width: 150px;">
                                                    <option value="0"> Select Client</option>
                                                    <?php
                                                       foreach($clients as $client){
                                                           echo "<option value=".$client->id.">".$client->company."</option>";
                                                       }
                                                    ?>
                                                </select>
                                                and/or
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="building"> &nbsp&nbsp&nbsp Building: </label>
                                            </td>
                                            <td style="padding: 5px 0px 5px 0px;">
                                                 <select id="building" style="width: 150px;">
                                                    <option value="0">Select Building</option>
                                                     <?php
                                                       foreach($buildings as $building){
                                                           echo "<option value=".$building->id.">".$building->buildingname."</option>";
                                                       }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="purpose"> &nbsp&nbsp&nbsp Purpose: </label>
                                            </td>
                                            <td style="padding: 5px 0px 5px 0px;">
                                                <select id="purpose" style="width: 150px;">
                                                    <option value="4">Other</option>
                                                    <option value="1">Client Management</option>
                                                    <option value="2">Building Management</option>
                                                    <option value="3">Inspection</option>
                                                </select>   
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="act_name"><font color="red" size="3">*</font> Event: </label>
                                            </td>
                                            <td style="padding: 5px 0px 5px 0px;">
                                                <input type="text" id="act_name" class="txt"  size=50 />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 8px 5px 0px;">
                                                <label for="act_des"> &nbsp&nbsp&nbsp Note: </label>
                                            </td>
                                            <td style="padding: 5px 0px 5px 0px;">
                                                 <input type="text" id="act_des" class="txt" size=50 />
                                            </td>
                                        </tr>
                                        
                                        
                                </tbody>
                                </table>
			</form>
		</div>
	</div>
</div>