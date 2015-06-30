<?php

$this->load->view('navigation');

?>
<div id="container">
    <div class="box box-26">
        <div class="boxin">
            <div class="header">
                <h3>Selection</h3>
                <span id="toolbar">
                    <?php
                    
                    ?>
                </span>              
            </div>
            <div class="content">
                <table cellspacing="0" style="table-layout: fixed;">
                    <tbody>
                        <tr>
                            <td style="width: 80px">
                                <label>Client</label>
                            </td>
                            <td>
                                <form class="fields bwof_company" action="<?php echo base_url(); ?>bwof" method="post">
                                <select id="inspectcompany" style="width: 220px">
                                    <option selected value="0">Select a Client </option>
                                     <?php
                                     foreach($companies as $client) {
                                         if($this->uri->segment(3) ==  $client->id) {
                                         echo "<option selected value=".$client->id.">".$client->company."</option>";
                                         } else {
                                          echo "<option value=".$client->id.">".$client->company."</option>";    
                                         }
                                     }
                                     ?>
                                </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 80px">
                                <label>Site</label>
                            </td>
                            <td>
                                <form class="fields bwof_site" action="<?php echo base_url(); ?>bwof" method="post">
                                <select id="inspectsite" style="width: 220px">
                                    <option selected value="0">Select a Site</option>
                                    <?php
                                     unset($sites[0]);
                                     if($sites != null) {
                                     foreach($sites as $site) {
                                         if($this->uri->segment(4) ==  $site->id) {
                                         echo "<option selected value=".$site->id.">".$site->sitename."</option>";
                                         } else {
                                          echo "<option value=".$site->id.">".$site->sitename."</option>";    
                                         }
                                     }
                                     }
                                     ?>
                                </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 80px">
                                <label>Building</label>
                            </td>
                            <td>
                                <form class="fields bwof_building" action="<?php echo base_url(); ?>bwof" method="post">
                                <select id="inspectbuilding" style="width: 220px">
                                    <option selected value="0">Select a Building</option>
                                    <?php   
                                     if($buildings != null) {
                                     unset($buildings[0]);    
                                     foreach($buildings as $build) {
                                         if($this->uri->segment(5) ==  $build->id) {
                                         echo "<option selected value=".$build->id.">".$build->buildingname."</option>";
                                         } else {
                                          echo "<option value=".$build->id.">".$build->buildingname."</option>";    
                                         }
                                     }
                                     }
                                     ?>
                                </select>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>      
            </div>
        </div>
    </div>
    <div class="box box-102">
        <div class="boxin">
            <div class="header">
                <h3>Actions</h3>
            </div>
            <div class="content">
                <table>
                    <tbody>
                        
                                <?php
                                if($this->session->userdata('access_level')!='3') {
                        if($this->uri->segment(3)){
                            //        echo "<tr>";
                            //    echo "<td><label>Client Options</label></td>";
                            //    echo "<td>".anchor('index.php/clientmanagement/view_client/'.$this->uri->segment(3),'View Client',array('class'=>'buttonBlack'))."</td>";
                                //echo "<td>".anchor('index.php/clientmanagement/add_client_page','Add Client',array('class'=>'buttonBlack'))."</td>";
                            //    echo "<td>".anchor('index.php/clientmanagement/edit_client_page/'.$this->uri->segment(3),'Edit Client',array('class'=>'buttonBlack'))."</td>";
                            //    echo "<td>".anchor('index.php/clientmanagement/delete_group_page/'.$this->uri->segment(3),'Delete Client',array('class'=>'buttonBlack'))."</td>";
                            //        echo "</tr>";
                                }
                                if($this->uri->segment(4)){
                                     echo "<tr>";
                                echo "<td><label>Site Options</label></td>";
                                echo "<td>".anchor('index.php/buildingmanagement/view_site/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'View',array('class'=>'buttonBlack'))."</td>";  
                                echo "<td>".anchor('index.php/buildingmanagement/add_site_page/'.$this->uri->segment(3),'Add',array('class'=>'buttonBlack'))."</td>"; 
                                echo "<td>".anchor('index.php/buildingmanagement/edit_site_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'Edit',array('class'=>'buttonBlack'))."</td>"; 
                                echo "<td>".anchor('index.php/buildingmanagement/delete_site_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'Delete',array('class'=>'buttonBlack'))."</td>"; 
                                 echo "</tr>";
                                }
                                if($this->uri->segment(5)) {
                                    echo "<tr>";
                                echo "<td><label>Building Options</label></td>";
                                echo "<td>".anchor('index.php/buildingmanagement/view_building/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'View',array('class'=>'buttonBlack'))."</td>";  
                                echo "<td>".anchor('index.php/buildingmanagement/add_building_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'Add',array('class'=>'buttonBlack'))."</td>"; 
                                echo "<td>".anchor('index.php/buildingmanagement/edit_building_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'Edit',array('class'=>'buttonBlack'))."</td>"; 
                                echo "<td>".anchor('index.php/buildingmanagement/delete_building_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'Delete',array('class'=>'buttonBlack'))."</td>";
                                //echo anchor('index.php/buildinginspection/print_inspection_list/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'Print All Hazards',array('class' => 'buttonBlack'));
                                 //echo anchor('index.php/buildinginspection/print_unsolved_hazard/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'Print Unsolved Hazards',array('class' => 'buttonBlack'));
                                 //echo anchor('index.php/buildinginspection/print_inspected_hazard/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'Print Inspected Hazards',array('class' => 'buttonBlack'));
                                 echo "</tr>";
                                  echo "<tr>";
                                 echo "<td><label>Other Options</label></td>";
                                 echo "<td>".anchor('index.php/reports/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/1','Inspections',array('class'=>'buttonBlack'))."</td>";
                                 echo "<td>".anchor('index.php/reports/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/2','BWofs',array('class'=>'buttonBlack'))."</td>";
                                 echo "</tr>";
                                }
                                } else {
                                     
                                     if($this->uri->segment(3)){
                                         echo "<tr>";
                                         echo "<td><label>Client Options</label></td>";  
                                         echo "<td>".anchor('index.php/clientmanagement/view_client/'.$this->uri->segment(3),'View',array('class'=>'buttonBlack'))."</td>";
                                         echo "</tr>";
                                     }
                                     if($this->uri->segment(4)){
                                          echo "<tr>";
                                         echo "<td><label>Site Options</label></td>"; 
                                         echo "<td>".anchor('index.php/buildingmanagement/view_site/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'View',array('class'=>'buttonBlack'))."</td>";  
                                          echo "</tr>";
                                         }
                                     if($this->uri->segment(5)){
                                          echo "<tr>";
                                         echo "<td><label>Building Options</label></td>";  
                                         echo "<td>".anchor('index.php/buildingmanagement/view_building/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'View',array('class'=>'buttonBlack'))."</td>";  
                                     
                                          echo "</tr>";
                                     }
                                     
                                 }
                                
                        ?>
                            
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
    
    <div class="box box-50">
        <div class="boxin">
            <div class="header">
                <h3>Inspection Made</h3>
                <span id="toolbar">
                    <?php
                    
                    ?>
                </span>
            </div>
            <div class="content">
                <table>
                    <thead>
                    <td>Date Inspected</td>
                    <td>Result</td>
                    </thead>
                    <tbody>
                        <?php if($inspections != null) {
                        foreach($inspections as $element) : ?>
                        <tr>
                           
                            <td><?php echo date('d-m-Y',strtotime($element->date));?></td>
                            
                            <td><?php if($element->status == 0) {
                                echo "Failed";
                            } else {
                                echo "Passed <br />";
                                if($element->wof_given == 0) {
                                //echo anchor('index.php/bwof/issue_bwof/'.$element->cid.'/'.$element->sid.'/'.$element->bid,'Issue BWof',array('id' => 'issueBWof'));
                                //echo "<input type='text' id='cid' value=".$element->cid." />"; 
                                //echo "<input type='text' id='sid' value=".$element->sid." />";  
                                //echo "<input type='text' id='bid' value=".$element->bid." />"; 
                                //echo "<input type='text' id='iid' value=".$element->iid." />";
                                if($this->session->userdata('access_level')!='3'){
                                echo anchor('index.php/bwof/issue_bwof/'.$element->companyid.'/'.$element->siteid.'/'.$element->buildingid.'/'.$element->id.'/','Issue Bwof',array('id'=>'issuebwof'));
                                }
                                }
                            }
                            ?></td>
                        </tr>
                        <?php 
                        endforeach; }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="box box-51">
        <div class="boxin">
            <div class="header">
                <h3>BWoF Issued</h3>
                <span id="toolbar">
                    <?php
                    
                    ?>
                </span>
            </div>
            <div class="content">
                <table>
                    <thead>
                        <td>Date Issued</td>
                        <td>Expiry Date</td>
                    </thead>
                    <tbody>
                    <?php if($bwofs != null):?>    
                    <?php foreach($bwofs as $wofs) : ?>
                    <tr>
                        <td> <?php echo date('d-m-Y',strtotime($wofs->issue_date)); ?></td>
                         <td> <?php echo date('d-m-Y',strtotime($wofs->expiry_date)); ?></td>
                     </tr>
                     <?php endforeach; ?>
                     <?php endif;?>
                     </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
