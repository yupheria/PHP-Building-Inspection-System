<?php

$this->load->view('navigation');

?>
<div id="container">
    <div class="box box-27">
        <div class="boxin">
            <div class="header">
                <h3>Inspection Completion</h3>
                <span id="toolbar">
                    <?php
                    echo anchor('index.php/buildinginspection/index/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5), 'Back', array('class' => 'buttonBlack', 'id' => 'backButton')); 
                    ?>
                </span>
            </div>
            <div class="content">
               
                <form class="fields inspection_complete_page" action="<?php echo base_url(); ?>buildinginspection/inspection_complete" method="post">
                <input type="hidden" id="buildingid" value="<?php echo $buildingid;?>"/>
                <input type="hidden" id="companyid" value="<?php echo $companyid;?>"/>
                <input type="hidden" id="siteid" value="<?php echo $siteid;?>"/>
                <input type="hidden" id="user_id" value="<?php echo $this->session->userdata('user_id');?>"/>
                    <table cellspacing="0" style="table-layout: fixed;">
                    <tbody>
                    <tr> <td>
                    Agent:</td> <td>
                <?php echo " ".$this->session->userdata('display_name'); ?>
                 </td> </tr><tr><td></label>
                Building Name: </td><td><?php echo $buildingname;?></label> </td></tr> <tr> <td>
                
                Site Name: </td><td><?php echo $sitename;?></label> </td> </tr> <tr> <td>
                
                Company Name: </td><td><?php echo $companyname;?></label></td></tr><tr>
                 <td>Decision: </td>   
                    <td>

                <?php echo anchor('#', 'Pass', array('class' => 'buttonBlack', 'id' => 'Pass')); ?>
                        </td> <td>
                <?php echo anchor('#', 'Fail', array('class' => 'buttonBlack', 'id' => 'Fail')); ?>
                            </td>
                            </tr>
                
                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>
</div>
