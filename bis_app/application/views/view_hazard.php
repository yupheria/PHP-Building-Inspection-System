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
                        if($this->session->userdata('access_level') <3) {
                        echo anchor('index.php/buildinginspection/inspection_complete_page/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'Complete Inspection',array('class' => 'buttonBlack'));
                        echo anchor('index.php/buildinginspection/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8),'Add Hazard',array('class' => 'buttonBlack'));
                        }?>
                </span>
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
                    <tbody>
                        <?php 
                        unset($hazards[0]);
                        if($hazards != null) :
                        
                        foreach($hazards as $hazard) :
                        ?>
                        <?php if($this->uri->segment(9) == $hazard->hid) {
                            echo "<tr class='highlight'>";
                        } else { echo '<tr>';}
                        ?>
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
                <h3>Hazard Details</h3>
                <span id="toolbar">
                    <?php
                    if($this->uri->segment(5) && $areas != null && $this->session->userdata('access_level') <3) {
                    echo anchor('index.php/buildinginspection/delete_hazard_page/'.$this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5)."/".$this->uri->segment(6)."/".$this->uri->segment(7)."/".$this->uri->segment(8)."/".$this->uri->segment(9), 'Delete', array('class' => 'buttonBlack', 'id' => 'deleteHazard'));
                    echo anchor('index.php/buildinginspection/edit_hazard_page/'.$this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5)."/".$this->uri->segment(6)."/".$this->uri->segment(7)."/".$this->uri->segment(8)."/".$this->uri->segment(9), 'Edit', array('class' => 'buttonBlack', 'id' => 'editHazard'));
                    }
                    ?>
                </span>
            </div>
            <div class="content">
                <?php foreach($hazardes as $haz):?>
                <table>  
                    <tbody>
                        <tr>
                            <td width="130px">
                                <label for="hname">Name: </label>
                            </td>
                            <td>
                                <?php echo $haz->name; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="hdate">Inspected Date: </label>
                            </td>
                            <td>
                                <?php echo date('d-m-Y',strtotime($haz->date)); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="harea">Building area: </label>
                            </td>
                            <td>
                                <?php 
                                foreach($areas as $area) {
                                    if($area->id == $haz->area)
                                    echo $area->area_name; 
                                }?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="hlevel">Hazard Level: </label>
                            </td>
                            <td>
                               <?php foreach($hazard_levels as $levels){
                                    if($levels->id == $haz->level){
                                        echo $levels->levels;
                                    }
                               } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="hstatus">Status: </label>
                            </td>
                            <td>
                                <?php foreach($status as $stats) {
                                    if($stats->id == $haz->status) {
                                        echo $stats->status;
                                    }
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="hdescription">Hazard Description: </label>
                            </td>
                            <td>
                                <?php echo $haz->description; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="hsolution">Acceptable Solutions: </label>
                            </td>
                            <td>
                                <?php echo $haz->solution; ?>
                            </td>
                        </tr>     
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <?php if($this->session->userdata('access_level')<3):?>
                            <td>
                                <label>Image: </label>
                                <?php echo form_open_multipart('index.php/buildinginspection/upload_img/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8).'/'.$this->uri->segment(9)); ?>
                                <input name="myFile" size="40" type="file" value="Select File"/>
                                <input type="submit" value="Upload" />
                            </td>
                            <?php endif;?>
                        </tr>
                        <tr>
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
            </div>
        </div>
    </div>
</div>