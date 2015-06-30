<?php

$this->load->view('navigation');

?>
<div id="container">
    <div class="box box-26">
        <div class="boxin">
            <div class="header">
                <h3>Report Selection</h3>
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
                        <tr>
                            <td style="width: 80px">
                                <label>Report Type</label>
                            </td>
                            <td>
                                <form class="fields search_report" action="<?php echo base_url(); ?>buildinginspection" method="post">
                                <select id="report_type" style="width: 220px">
                                    <option selected value="0">Select a Report Type</option>
                                    <?php
                                    if($this->uri->segment(3) && $this->uri->segment(4) && $this->uri->segment(5)) {
                                        foreach($report_type as $type){
                                            if($type->id == $this->uri->segment(6)){
                                            echo "<option selected value=".$type->id.">".$type->report."</option>";    
                                            } else {
                                            echo "<option value=".$type->id.">".$type->report."</option>";    
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
    <div class="box box-26">
        <div class="boxin">
            <div class="header">
                <h3>Cloud Storage</h3>
                <?php 
                if ($_POST) {
                    require 'DropboxUploader.php';
                    $third = $this->uri->segment(3) ? $this->uri->segment(3) : "0"; 
                    $fourth = $this->uri->segment(4) ? $this->uri->segment(4) : "0"; 
                    $fifth = $this->uri->segment(5) ? $this->uri->segment(5) : "0"; 
                    $sixth = $this->uri->segment(6) ? $this->uri->segment(6) : "0";  
                    try {
                        // Rename uploaded file to reflect original name
                        if ($_FILES['file']['error'] !== UPLOAD_ERR_OK)
                            throw new Exception('File was not successfully uploaded from your computer.');

                        $tmpDir = uniqid('C:\wamp\www\du'.'\tmp\DropboxUploader-');
                        if (!mkdir($tmpDir))
                            throw new Exception('Cannot create temporary directory!'.'<br />'.$tmpDir);
                        if ($_FILES['file']['name'] === "")
                            throw new Exception('File name not supplied by the browser.');

                        $tmpFile = $tmpDir.'/'.str_replace("/\0", '_', $_FILES['file']['name']);
                        if (!move_uploaded_file($_FILES['file']['tmp_name'], $tmpFile))
                            throw new Exception('Cannot rename uploaded file!');

                        // Enter your Dropbox account credentials here
                        $uploader = new DropboxUploader($dropbox_user, $dropbox_pass);
                        $uploader->upload($tmpFile, $_POST['dest']);

                        //echo 'File successfully uploaded to my Dropbox!';
                        header( 'Location:'.base_url().'index.php/reports/index/'.$third.'/'.$fourth.'/'.$fifth.'/'.$sixth.'/Upload_Success/success');
                    } catch(Exception $e) {
                        echo 'Error: ' . htmlspecialchars($e->getMessage());
                        header( 'Location:'.base_url().'index.php/reports/index/'.$third.'/'.$fourth.'/'.$fifth.'/'.$sixth.'/Upload_Failed/error');
                    }

                    // Clean up
                    if (isset($tmpFile) && file_exists($tmpFile))
                        unlink($tmpFile);

                    if (isset($tmpDir) && file_exists($tmpDir))
                        rmdir($tmpDir);
                }
                ?>             
            </div>
                <br />
                <form method="POST" enctype="multipart/form-data">
		<input type="file" name="file" /><br><br>
		<input type="submit" value="Upload the file to my Dropbox!" />
		<input style="display:none" type="text" name="dest" value="shared" />
                <br />
            </div>
    </div>
    <div class="box box-53">
        <div class="boxin">
            <div class="header">
                <h3>Report Result</h3>
                <span id="toolbar">
                    <?php
                    
                    ?>
                </span>
            </div>
            <div class="content">
                <?php if($this->uri->segment(6) == 1) :?>
                <table>
                    <thead>
                        
                       
                        <td>Date Inspected</td>
                        <td>Result</td>
                        <td>Option</td>
                    </thead>
                    <?php if($datum != null) : ?>
                    <?php foreach($datum as $inspect) :?>
                    <tbody>
                        <tr>
                           
                            <td><?php echo date('d-m-Y',strtotime($inspect->date));?></td>
                            <td><?php if($inspect->status == 0) {
                                echo "Failed";
                            } else {
                                echo "Passed <br />"; 
                            }
                            ?></td>
                            <td><?php echo anchor('index.php/reports/print_inspection/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$inspect->iid,'PDF')." ";
                            echo anchor('index.php/reports/print_inspection_word/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$inspect->iid,'Word');
                            ?></td>
                        </tr>
                    </tbody>
                    <?php endforeach;?>
                    <?php endif; ?>
                </table>
                <?php endif;?>
                
                 <?php if($this->uri->segment(6) == 2) :?>
                <table>
                    <thead>
                        <td>Date Issued</td>
                        <td>Expiry Date</td>
                        <td>Option</td>
                    </thead>
                    <?php if($datum != null) : ?>
                    <?php foreach($datum as $wofs) :?>
                    <tbody>
                        <tr>
                         
                            <td> <?php echo date('d-m-Y',strtotime($wofs->issue_date)); ?></td>
                            <td> <?php echo date('d-m-Y',strtotime($wofs->expiry_date)); ?></td>
                           
                            <td><?php echo anchor('index.php/reports/print_bwof/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$iid,'PDF')." ";
                            echo anchor('index.php/reports/print_bwof_word/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$iid,'Word');?></td>
                        </tr> 
                    </tbody>
                    <?php endforeach;?>
                    <?php endif; ?>
                </table>
                <?php endif;?>
            </div>
        </div>
    </div>
    
</div>