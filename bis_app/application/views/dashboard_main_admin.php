<?php

$this->load->view('navigation');
//print_r($this->session->userdata); altbox for blue
?>

<div id="container">
			
    <div class="box box-52">
        <div class="boxin">
            <div class="header">
                <h3>Calendar of Events</h3>
                <span id="toolbar">
                    <?php 
                    echo anchor('index.php/dashboard/add_activities_page','Add Event',array('class'=> 'buttonBlack'));
                    ?>
                </span>
            </div>
            <div class="content">
                <table>
                     <thead>
                         <?php 
                         if($this->session->userdata('access_level') == '0') {
                             $user = "admin";
                         } else {
                             $user = "user";
                         }
                         $prevMonth = $month - 1;
                         $prevYear = $year;
                         if($prevMonth == 0) {
                             $prevMonth = 12;
                             $prevYear = $year - 1;
                         }
                         $goMonth = $month + 1;
                         $goYear = $year;
                         if($goMonth == 13){
                             $goMonth = 1;
                             $goYear = $year + 1;
                         }
                         ?>
                         
                        <td width="110px">
                        <?php 
                        echo anchor('index.php/dashboard/'.$user.'/'.$prevMonth.'/'.$prevYear,'Previous',array('class'=>'buttonBlack','style'=>'float:left;')); ?>    
                        </td>
                        <td></td>
                        <td style="text-align: center; width: 160px; vertical-align: middle;"><strong><?php echo date('F',mktime(0, 0, 0, $month, date("d"), date("Y")))."-".$year;?></strong></td>
                         <td></td>
                        <td>
                        <?php 
                        echo anchor('index.php/dashboard/'.$user.'/'.$goMonth.'/'.$goYear,'Next',array('class'=>'buttonBlack','style'=>'float:right;')); ?>    
                        </td>
                       
                    </thead>
                    <thead>
                        <td>Date</td>
                        <td>Client</td>
                        <td>Building</td>
                        <td>Purpose</td>
                        <td>Event</td>
                    </thead>
                    <tbody>
                        <?php if($activites != null): ?>
                        <?php foreach($activites as $act) :?>
                        <tr>
                            <td><?php echo date('d-m-Y',strtotime($act->date)); ?></td>
                            <?php
                            $cid = 0;
                            $sid = 0;
                            if($act->building > 0) {
                            $this->load->model('building_model');
                            $clientsiteid = $this->building_model->getClientid($act->building);
                            unset($clientsiteid[0]);
                            foreach($clientsiteid as $csid) {
                                $cid = $csid->cid;
                                $sid = $csid->sid;
                            }
                            }
                            $clientname = "";
                            if($clients != null) {
                            foreach($clients as $client){
                                if($client->id == $act->client){
                                    $clientname = $client->company;
                                }
                            }
                            }
                            $buildingname = "";
                            if($buildings != null) {
                            foreach($buildings as $build){
                                if($build->id == $act->building){
                                    $buildingname = $build->buildingname;
                                }
                            }
                            }
                            ?>
                            <td><?php if($act->client==0){echo "No Client";}else{echo anchor('index.php/clientmanagement/view_client/'.$act->client,$clientname);}?></td>
                            <td><?php if($act->building==0){echo "No Building";} else {echo anchor('index.php/buildingmanagement/view_building/'.$cid.'/'.$sid.'/'.$act->building,$buildingname);}?></td>
                            <td><?php 
                                    switch($act->purpose) {
                                        case 0: echo "No Purpose"; break;
                                        case 1: echo anchor('index.php/clientmanagement/view_client/'.$act->client,"Client Management"); break;
                                        case 2: echo anchor('index.php/buildingmanagement/view_building/'.$cid.'/'.$sid.'/'.$act->building,"Building Management"); break;
                                        case 3: echo anchor('index.php/buildinginspection/index/'.$cid.'/'.$sid.'/'.$act->building,'Inspection'); break;
                                        case 4: echo anchor('index.php/dashboard/edit_activities_page/'.$act->id,"Other"); break;
                                    }
                                    ?></td>
                            <td><?php echo anchor('index.php/dashboard/edit_activities_page/'.$act->id,$act->name)?></td>
                        </tr>
                        <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
</div>

    