<?php
$this->load->view('navigation');
?>
<div id="container">
    <?php include('inspection_selection.php');?>
    
    <div class="box box-30">
        <div class="boxin">
            <div class="header">
                <h3>Hazard List</h3>
                <span id="toolbar">
                    <?php
                        if($this->session->userdata('access_level') <3 && $this->uri->segment(5)) {
                        echo anchor('index.php/buildinginspection/inspection_complete_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'Complete Inspection',array('class' => 'buttonBlack'));
                        echo anchor('index.php/buildinginspection/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8),'Add Hazard',array('class' => 'buttonBlack'));                        
                        }?>
                </span>
            </div>
            <div class="content" style="table-layout: fixed;">
                <table>
                    <thead>
                    <td class="tc last">Level</td>
                    <td class="tc last">Area</td>
                    <td class="tc last">Hazard</td>
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
    <?php if($this->uri->segment(5) && $areas != null && $this->session->userdata('access_level') <3) : ?>   
    <div class="box box-30">
        <div class="boxin">
            <div class="header">
                <h3>Add Building Hazard</h3>
                <span id="toolbar">
                    <?php
                    echo anchor('#', 'Save', array('class' => 'buttonBlack', 'id' => 'addHazard'));
                    ?>
                </span>
            </div>
            <div class="content">
                <form class="fields add_hazard" action="<?php echo base_url(); ?>buildinginspection/index/" method="post">
                <table style="table-layout: fixed;">
                    
                    <tbody>
                        <tr>
                                            <td style="width: 160px;"><font color="red" size="3">*</font> Required</td>
                                        </tr>
                        <tr>
                            <td style="padding-left: 18px;">
                                <input type="hidden" id="sid" value="<?php echo $this->uri->segment(4);?>"/>
                                <input type="hidden" id="inspectbuilding" value="<?php echo $this->uri->segment(5);?>"/>
                                <input type="hidden" id="above" value="<?php 
                                if($this->uri->segment(6)){
                                echo $this->uri->segment(6);
                                } else {
                                echo "1";    
                                }
                                ?>"/>
                                <input type="hidden" id="level" value="<?php 
                                 if($this->uri->segment(7)){
                                echo $this->uri->segment(7);
                                } else {
                                echo "0";    
                                }
                                ?>"/>
                                <label for="hname">Name: </label>
                            </td>
                            <td>
                                <input type="text" id="hname" name="hanme" value="" class="txt" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="hdate"><font color="red" size="3">*</font> Inspected Date: </label>
                            </td>
                            <td>
                                <input class="inputDate" id="inputDate" value="<?php echo date("d-m-Y");?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 18px;">
                                <label for="harea">Building Area: </label>
                            </td>
                            <td>
                                <select id="harea" style="width: 100px">
                                    <?php
                                    if($areas != null) {
                                    foreach($areas as $area) {
                                            if($area->id == $this->uri->segment(8)){
                                            echo "<option selected value=".$area->id.">".$area->area_name."</option>";    
                                            } else {
                                            echo "<option value=".$area->id.">".$area->area_name."</option>";
                                            }
                                        }
                                    } else {
                                            echo "<option value=0>No Area for building</option>";
                                    }
                                    ?>
                                    
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 18px;">
                                <label for="hlevel">Hazard Level: </label>
                            </td>
                            <td>
                                <select id="hlevel" style="width: 100px">
                                    <?php 
                                    foreach($hazard_levels as $levels) {
                                        echo "<option value=".$levels->id.">".$levels->levels."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 18px;">
                                <label for="hstatus">Status: </label>
                            </td>
                            <td>
                                <select id="hstatus" style="width: 100px">
                                    <?php 
                                    foreach($status as $stats) {
                                        echo "<option value=".$stats->id.">".$stats->status."</option>";
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
                                <input type="text" id="hdescription" name="hdescription" class="txt" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="hsolution"><font color="red" size="3">*</font> Acceptable Solutions: </label>
                            </td>
                            <td>
                                <input type="text" id="hsolution" name="hsolution" class="txt" value="" />
                            </td>
                        </tr>
                    </tbody>
                </table> 
               </form>
            </div>
        </div>
    </div>
    <?php endif;?>
    
</div>