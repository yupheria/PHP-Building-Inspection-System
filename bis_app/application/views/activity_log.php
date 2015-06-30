<?php

$this->load->view('navigation');

?>

<div id="container">
  <div class="box box-52">
        <div class="boxin">
            <div class="header">
                <h3>Activity Log</h3>
                <span id="toolbar">
                    <?php 
                    
                    ?>
                </span>
            </div>
            <div class="content">
                <table>
                    <thead>
                        <td>Date</td>
                        <td>User</td>
                        <td>Type</td>
                        <td>Action</td>
                        <td>Name</td>
                    </thead>
                    <tbody>
                        <?php if($notifications != null):?>
                        <?php foreach($notifications as $notify):?>
                        <tr>
                            <td><?php echo date("F j, Y, g:i a", strtotime($notify->timestamp));?></td>
                            <td><?php echo $notify->user?></td>
                            <td><?php echo $notify->type?></td>
                            <td><?php echo $notify->action?></td>
                            <td><?php 
                            $content = $notify->name;
                            $content = preg_replace('#<a.*?>(.*?)</a>#i', '\1', $content);
                            echo $content;?></td>
                        </tr>
                        <?php endforeach;?>
                        <?php endif?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
