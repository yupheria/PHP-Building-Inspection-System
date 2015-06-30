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
                                <form class="fields search_company" action="<?php echo base_url(); ?>buildinginspection" method="post">
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
                                <form class="fields search_site" action="<?php echo base_url(); ?>buildinginspection" method="post">
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
                                <form class="fields search_building" action="<?php echo base_url(); ?>buildinginspection" method="post">
                                <select id="inspectbuilding" style="width: 220px">
                                    <option selected value="0">Select a Building</option>
                                    <?php   
                                     if($buildings != null) {
                                     //unset($buildings[0]);    
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
                        <tr>
                            <td>
                               <label style="width: 80px">Location</label>
                            </td>
                            <td>
                                <form class="fields search_above" action="<?php echo base_url(); ?>buildinginspection" method="post">
                                <select id="inspectabove" style="width: 220px">
                                    <option <?php if($this->uri->segment(6)==null){echo 'selected ';} ?>value="0">Ground Level</option>
                                    <option <?php if($this->uri->segment(6)==1){echo 'selected ';} ?>value="1">Above G Level</option>
                                    <option <?php if($this->uri->segment(6)==2){echo 'selected ';} ?>value="2">Below G Level</option>
                                </select>
                                </form>  
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <label style="width: 80px">Level</label>
                            </td>
                            <td>
                                <form class="fields search_levels" action="<?php echo base_url(); ?>buildinginspection" method="post">
                                <select id="inspectlevel" style="width: 220px">
                                    <option selected value="200">Select Level</option>
                                    <?php
                                   
                                    if($this->uri->segment(6)==1) {
                                    for($i=0;$i<=$levelsabove;$i++){
                                        if($this->uri->segment(7)==$i){
                                        echo "<option selected value=".$i.">".$i."</option>";    
                                        } 
                                        else {
                                        echo "<option value=".$i.">".$i."</option>";
                                        }
                                    }
                                    } else if($this->uri->segment(6)==2){
                                    for($i=1;$i<=$levelsabelow;$i++){
                                        if($this->uri->segment(7)==$i){
                                        echo "<option selected value=".$i.">-".$i."</option>";    
                                        } 
                                        else {
                                        echo "<option value=".$i.">-".$i."</option>";
                                        }
                                    }    
                                    }
                                    ?>
                                    
                                </select>
                                </form>  
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <label style="width: 80px">Area</label>
                            </td>
                            <td>
                                <form class="fields search_area" action="<?php echo base_url(); ?>buildinginspection" method="post">
                                <select id="inspectarea" style="width: 220px">
                                    <option selected value="0">Select Area</option>
                                    <?php
                                    if($areas1 != null) {
                                    foreach($areas1 as $are){
                                            if($this->uri->segment(8)==$are->id){
                                            echo "<option selected value=".$are->id.">".$are->area_name."</option>";   
                                            } else {
                                            echo "<option value=".$are->id.">".$are->area_name."</option>";       
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

    <div class="box box-101">
        <div class="boxin">
            <div class="header">
                <h3>Actions</h3>
            </div>
            <div class="content">
                <table>
                    <tbody>
                                <?php
                                if($this->session->userdata('access_level')!='3'){
                                if($this->uri->segment(3)==null){
                                    echo "<tr>";
                                 echo "<td><label>Client Options</label></td>";
                                 
                                 echo "<td>".anchor('index.php/clientmanagement/add_client_page','Add',array('class'=>'buttonBlack'))."</td>";
                                  echo "</tr>";
                                }
                                if($this->uri->segment(3)){
                                 echo "<tr>";
                                echo "<td><label>Client Options</label></td>";
                                echo "<td>".anchor('index.php/clientmanagement/view_client/'.$this->uri->segment(3),'View',array('class'=>'buttonBlack'))."</td>";
                               
                                echo "<td>".anchor('index.php/clientmanagement/add_client_page','Add',array('class'=>'buttonBlack'))."</td>";
                                echo "<td>".anchor('index.php/clientmanagement/edit_client_page/'.$this->uri->segment(3),'Edit',array('class'=>'buttonBlack'))."</td>";
                                echo "<td>".anchor('index.php/clientmanagement/delete_group_page/'.$this->uri->segment(3),'Delete',array('class'=>'buttonBlack'))."</td>";
                                    echo "</tr>";
                                     echo "</tr>";
                                     if($this->uri->segment(4)==null){
                                     echo "<tr>";
                                     echo "<td><label>Site Options</label></td>";
                                     echo "<td>".anchor('index.php/buildingmanagement/add_site_page/'.$this->uri->segment(3),'Add',array('class'=>'buttonBlack'))."</td>";    
                                     }
                                     echo "</tr>";
                                     
                                  
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
                                 echo "</tr>";
                                 echo "<tr>";
                                 echo "<td><label>Other Options</label></td>";
                                 echo "<td>".anchor('index.php/reports/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/1','Inspections',array('class'=>'buttonBlack'))."</td>";
                                 echo "<td>".anchor('index.php/reports/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/2','BWofs',array('class'=>'buttonBlack'))."</td>";
                                
                                 echo "</tr>";
                                }
                                 if($this->uri->segment(8)) {
                                     if($this->uri->segment(6)==1 && $this->uri->segment(7)==0){
                                         $above = 'g';
                                     } else if ($this->uri->segment(6)==1 && $this->uri->segment(7)>0){
                                         $above = 'a';
                                     } else {
                                         $above = 'b';
                                     }
                                      echo "<tr>";
                                echo "<td><label>Area Options</label></td>"; 
                                echo "<td>".anchor('index.php/buildingmanagement/view_area_page/'.'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$above.'/'.$this->uri->segment(7).'/'.$this->uri->segment(8).'/','View',array('class'=>'buttonBlack'))."</td>";  
                               
                                echo "<td>".anchor('index.php/buildingmanagement/add_areas_page/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/','Add',array('class'=>'buttonBlack'))."</td>"; 
                                echo "<td>".anchor('index.php/buildingmanagement/edit_area_page/'.'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$above.'/'.$this->uri->segment(7).'/'.$this->uri->segment(8).'/','Edit',array('class'=>'buttonBlack'))."</td>"; 
                                echo "<td>".anchor('index.php/buildingmanagement/delete_area_page/'.'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$above.'/'.$this->uri->segment(7).'/'.$this->uri->segment(8).'/','Delete',array('class'=>'buttonBlack'))."</td>";  
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
