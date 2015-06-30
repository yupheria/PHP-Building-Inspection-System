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
                                <form class="fields bm_company" action="<?php echo base_url(); ?>buildingmanagement" method="post">
                                
                                <select id="bmcompany" style="width: 220px">
                                    <option selected value="0">Select a Client </option>
                                    <?php 
                                    //unset($clients[0]);
                                        foreach($clients as $client) {
                                        if($this->uri->segment(3)==$client->id) {
                                        echo '<option selected value='.$client->id.'>'.$client->company.'</option>';
                                        } else {
                                        echo '<option value='.$client->id.'>'.$client->company.'</option>';    
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
                                <form class="fields bm_site" action="<?php echo base_url(); ?>buildingmanagement" method="post">
                                <select id="bmsite" style="width: 220px">
                                    <option selected value="0">Select a Site</option>
                                    <?php 
                                    unset($sitesbyclient[0]);
                                    foreach($sitesbyclient as $sites){
                                        if($this->uri->segment(4)==$sites->id) {
                                        echo '<option selected value='.$sites->id.'>'.$sites->sitename.'</option>';
                                        } else {
                                        echo '<option value='.$sites->id.'>'.$sites->sitename.'</option>';    
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
                                <form class="fields bm_building" action="<?php echo base_url(); ?>buildingmanagement" method="post">
                                <select id="bmbuilding" style="width: 220px">
                                    <option selected value="0">Select a Building</option>
                                    <?php
                                      foreach($buildings as $building){
                                        if($this->uri->segment(5)==$building->id) {
                                        echo '<option selected value='.$building->id.'>'.$building->buildingname.'</option>';
                                        } else {
                                        echo '<option value='.$building->id.'>'.$building->buildingname.'</option>';    
                                        }
                                    }  
                                    ?>
                                </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 80px">
                                <label>Location</label>
                            </td>
                            <td>
                                <form class="fields bm_above" action="<?php echo base_url(); ?>buildingmanagement" method="post">
                                <select id="bmabove" style="width: 220px">
                                    <option <?php if($this->uri->segment(6)=='g'){ echo 'selected ';}?>value="g">Ground Level</option>
                                    <option <?php if($this->uri->segment(6)=='a'){ echo 'selected ';}?>value="a">Above G Level</option>
                                    <option <?php if($this->uri->segment(6)=='b'){ echo 'selected ';}?>value="b">Below G Level</option>
                                </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 80px">
                                <label>Level</label>
                            </td>
                            <td>
                                <form class="fields bm_levels" action="<?php echo base_url(); ?>buildingmanagement" method="post">
                                <select id="bmlevels" style="width: 220px">
                                    <?php
                                      for($i=0;$i<=$levels;$i++){
                                          if($this->uri->segment(7)==$i) {
                                              if($i==0) {
                                               echo "<option selected value=".$i.">Ground</option>";   
                                              } else {
                                               echo "<option selected value=".$i.">".$i."</option>";   
                                              }
                                          } else {
                                              if($i==0) {
                                               echo "<option value=".$i.">Ground</option>";   
                                              } else {
                                               echo "<option value=".$i.">".$i."</option>";   
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
                                <label>Area</label>
                            </td>
                            <td>
                                <form class="fields bm_areas" action="<?php echo base_url(); ?>buildingmanagement" method="post">
                                <select id="bmareas" style="width: 220px">
                                    <option selected value="0">Select an Area</option>
                                    <?php
                                    foreach($areas as $area) {
                                    if($this->uri->segment(8)==$area->id) {
                                        echo "<option selected value=".$area->id.">".$area->area_name."</option>";
                                    } else {
                                        echo "<option value=".$area->id.">".$area->area_name."</option>";
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
                                     if($this->uri->segment(4)==null){
                                     echo "<tr>";
                                     echo "<td><label>Site Options</label></td>";
                                     echo "<td>".anchor('index.php/buildingmanagement/add_site_page/'.$this->uri->segment(3),'Add',array('class'=>'buttonBlack'))."</td>";    
                                     echo "</tr>";
                                     }
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
                                if($this->uri->segment(4) && $this->uri->segment(5) == null){
                                    echo "<tr>";
                                    echo "<td><label>Building Options</label></td>";
                                    echo "<td>".anchor('index.php/buildingmanagement/add_building_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'Add',array('class'=>'buttonBlack'))."</td>"; 
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
                                 echo "<td>".anchor('index.php/reports/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/2','BWoFs',array('class'=>'buttonBlack'))."</td>";
                                 echo "</tr>";
                                 if($this->uri->segment(8)){
                                     echo "<tr>";
                                 echo "<td><label>Area Options</label></td>";  
                                 echo "<td>".anchor('index.php/buildingmanagement/view_area_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8),'View',array('class'=>'buttonBlack'))."</td>";
                                 echo "<td>".anchor('index.php/buildingmanagement/add_areas_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7),'Add',array('class'=>'buttonBlack'))."</td>";
                                 echo "<td>".anchor('index.php/buildingmanagement/edit_area_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8),'Edit',array('class'=>'buttonBlack'))."</td>";
                                 
                                 echo "<td>".anchor('index.php/buildingmanagement/delete_area_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8),'Delete',array('class'=>'buttonBlack'))."</td>";
                                 echo "</tr>";
                                } else if($this->uri->segment(6)=='g' && $this->uri->segment(7)=='0'){
                                 echo "<tr>";
                                 echo "<td><label>Area Options</label></td>";
                                echo "<td>".anchor('index.php/buildingmanagement/add_areas_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/g/0','Add',array('class'=>'buttonBlack'))."</td>";
                                echo "</tr>";
                                 } else {
                                 echo "<tr>";
                                 echo "<td><label>Area Options</label></td>";  
                                 echo "<td>".anchor('index.php/buildingmanagement/add_areas_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7),'Add',array('class'=>'buttonBlack'))."</td>";
                                 echo "</tr>";    
                                 }
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
                                     if($this->uri->segment(8)){
                                          echo "<tr>";
                                         echo "<td><label>Area Options</label></td>";
                                         echo "<td>".anchor('index.php/buildingmanagement/view_area_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8),'View',array('class'=>'buttonBlack'))."</td>";
                                          echo "</tr>";
                                     }
                                 }       
                        ?>
                        
                    </tbody>
                </table> 
            </div>
        </div>
    </div>