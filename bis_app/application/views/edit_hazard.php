<?php
$this->load->view('navigation');
?>
<div id="container">
    <?php include('inspection_selection.php');?>
    <div class="box box-30">
        <div class="boxin">
            <div class="header">
                <h3>Hazard List</h3>
            </div>
            <div class="content" style="table-layout: fixed;">
                <table>
                    <thead>
                    <td>Level</td>
                    <td>Area</td>
                    <td>Hazard</td>
                    <?php if($this->session->userdata('access_level') <3) {
                    //echo '<td>Options</td>';
                    }?>
                    </thead>
                    <tbody>
                        <?php 
                        unset($hazards[0]);
                        if($hazards != null) :
                        
                        foreach($hazards as $hazard) :
                        ?>
                        <tr>
                            <td>
                                <?php 
                                if($hazard->above == 1) {
                                    if($hazard->area_level == 0) {
                                      echo "G";   
                                    } else {
                                      echo $hazard->area_level;  
                                    }
                                } else {
                                echo "-".$hazard->area_level;    
                                }
                                        ?>
                            </td>
                            <td style='overflow:hidden;'> 
                                <?php echo $hazard->area_name ?>
                            </td>
                            <td style='overflow:hidden;'>  
                                 <?php echo anchor('index.php/buildinginspection/view_hazard/'.$this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5)."/".$hazard->above."/".$hazard->area_level."/".$hazard->aid."/".$hazard->hid, $hazard->name); ?>
                            </td>
                            
                        </tr>
                        <?php endforeach;?>
                        <?php else: 
                         echo "<tr><td>No Hazards found</td></tr>";   
                        endif;
                         ?>
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
        
    <div class="box box-30">
        <div class="boxin">
            <div class="header">
                <h3>Edit Hazard</h3>
                <span id="toolbar">
                    <?php
                    if($this->uri->segment(5) && $areas != null && $this->session->userdata('access_level') <3) {
                    echo anchor('index.php/buildinginspection/view_hazard/'.'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8).'/'.$this->uri->segment(9), 'Back', array('class' => 'buttonBlack', 'id' => 'deleteHazard'));
                    echo anchor('index.php/buildinginspection/delete_hazard_page/'.$this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5)."/".$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8).'/'.$this->uri->segment(9), 'Delete', array('class' => 'buttonBlack', 'id' => 'deleteHazard'));
                    echo anchor('#', 'Save', array('class' => 'buttonBlack', 'id' => 'saveButton'));
                    }
                    ?>
                </span>
            </div>
            <div class="content">
                <form class="fields edit_hazard" action="<?php echo base_url(); ?>buildinginspection/edit_hazard" method="post">
                <?php foreach($hazardes as $haz):?>
                <table style="table-layout: fixed;"> 
                     <tbody>
                       <tr>
                         <td style="width: 150px;"><font color="red" size="3">*</font> Required</td>
                       </tr>
                        <tr>
                            <td style="padding-left: 18px;">
                                <label for="hname">Name: </label>
                                <input type="hidden" id="hid" value="<?php echo $this->uri->segment(9);?>"/> 
                                <input type="hidden" id="inspectcompany" value="<?php echo $this->uri->segment(3);?>"/> 
                                <input type="hidden" id="inspectsite" value="<?php echo $this->uri->segment(4);?>"/> 
                                <input type="hidden" id="inspectbuilding" value="<?php echo $this->uri->segment(5);?>"/> 
                                <input type="hidden" id="above" value="<?php echo $this->uri->segment(6);?>"/> 
                                <input type="hidden" id="level" value="<?php echo $this->uri->segment(7);?>"/> 
                            </td>
                            <td>
                                <input id="hname" maxlength="60" type="text" value="<?php echo $haz->name; ?>" class="txt" />
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 18px;">
                                <label for="hdate"> Inspected Date: </label>
                            </td>
                            <td>
                                <input class="inputDate" id="inputDate" value="<?php echo date('d-m-Y',strtotime($haz->date)); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 18px;">
                                <label for="harea"> Building area: </label>
                            </td>
                            <td>
                                <select id="harea">
                                <?php
                                foreach($areas as $area) {
                                    if($area->id == $haz->area) {
                                        echo "<option selected value=".$area->id.">".$area->area_name."</option>";
                                    } else {
                                        echo "<option value=".$area->id.">".$area->area_name."</option>";
                                    }
                                }
                                ?>
                                 </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 18px;">
                                <label for="hlevel"> Hazard Level: </label>
                            </td>
                            <td>
                               <select id="hlevel">
                                <?php
                                foreach($hazard_levels as $level) {
                                    if($level->id == $haz->level) {
                                        echo "<option selected value=".$level->id.">".$level->levels."</option>";
                                    } else {
                                        echo "<option value=".$level->id.">".$level->levels."</option>";
                                    }
                                }
                                ?>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 18px;">
                                <label for="hstatus"> Status: </label>
                            </td>
                            <td>
                                <select id="hstatus">
                                <?php
                                foreach($status as $stats) {
                                    if($stats->id == $haz->status) {
                                        echo "<option selected value=".$stats->id.">".$stats->status."</option>";
                                    } else {
                                        echo "<option value=".$stats->id.">".$stats->status."</option>";
                                    }
                                }
                                ?>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="hdescription"><font color="red" size="3">*</font> Hazard Description: </label>
                            </td>
                            <td>
                                <textarea id="hdescription"><?php echo $haz->description; ?> </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="hsolution"><font color="red" size="3">*</font> Acceptable Solutions: </label>
                            </td>
                            <td>
                                <textarea id="hsolution"><?php echo $haz->solution; ?> </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 18px;">
                                <label> Image: </label>
                            </td>
                            <td>
                                <?php if($haz->img != null) {
                                echo "<a target='_blank' href=".base_url()."/uploads/".$haz->img."><img src=".base_url()."/uploads/".$haz->img." width=300 height=200 /></a>";  
                                } else {
                                echo "No Image Available...";    
                                }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table> 
                <?php endforeach;?>
                </form>
            </div>
        </div>
    </div>
</div>