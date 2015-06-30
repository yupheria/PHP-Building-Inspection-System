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
                                <form class="fields cm_company" action="<?php echo base_url(); ?>clientmanagement" method="post">
                                
                                <select id="cmcompany" style="width: 220px">
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
                                <label>Contact</label>
                            </td>
                            <td>
                                <form class="fields cm_cmcontact" action="<?php echo base_url(); ?>clientmanagement" method="post">
                                
                                <select id="cmcontact" style="width: 220px">
                                    <option selected value="0">Select a Contact </option>
                                    <?php 
                                    //unset($contacts[0]);
                                        foreach($contacts as $contact) {
                                        if($this->uri->segment(4)==$contact->id) {
                                        echo '<option selected value='.$contact->id.'>'.$contact->first_name.' '.$contact->last_name.'</option>';
                                        } else {
                                        echo '<option value='.$contact->id.'>'.$contact->first_name.' '.$contact->last_name.'</option>';
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
<div class="box box-103">
        <div class="boxin">
            <div class="header">
                <h3>Actions</h3>
            </div>
            <div class="content">
                <table>
                    <tbody>
                        <?php
                        if($this->session->userdata('access_level')!='3'){
                        if($this->uri->segment(3) == null && $this->uri->segment(4) == null){
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
                                }
                           if($this->uri->segment(3) && $this->uri->segment(4)==null){ 
                               echo "<tr>";
                                echo "<td><label>Contact Options</label></td>";
                                echo "<td>".anchor('index.php/clientmanagement/add_contact/'.$this->uri->segment(3),'Add',array('class'=>'buttonBlack'))."</td>";
                                 echo "</tr>";
                           }
                          if($this->uri->segment(4)){
                                    echo "<tr>";
                                echo "<td><label>Contact Options</label></td>";
                                echo "<td>".anchor('index.php/clientmanagement/view_contact/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'View',array('class'=>'buttonBlack'))."</td>";
                                echo "<td>".anchor('index.php/clientmanagement/add_contact/'.$this->uri->segment(3),'Add',array('class'=>'buttonBlack'))."</td>";
                                echo "<td>".anchor('index.php/clientmanagement/edit_contact/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'Edit',array('class'=>'buttonBlack'))."</td>";
                                echo "<td>".anchor('index.php/clientmanagement/delete_client_page/'.$this->uri->segment(4),'Delete',array('class'=>'buttonBlack'))."</td>";
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
                                         echo "<td><label>Contact Options</label></td>"; 
                                         echo "<td>".anchor('index.php/clientmanagement/view_contact/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'View',array('class'=>'buttonBlack'))."</td>";
                                          echo "</tr>";
                                         }
                                 }
                        ?>
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
