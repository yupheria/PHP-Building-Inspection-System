<?php

$this->load->view('navigation');

?>
<div id="container">
    <div class="box box-24 altbox">
        <div class="boxin">
            <div class="header">
				<h3>Reports Menu</h3>
			</div>
            <div class="content">
                <table>
                    <tbody>
                        <tr>
                            <td><?php echo anchor('index.php/reports','Building Reports');?></td>
                        </tr>
                        <tr>
                            <td><?php echo anchor('index.php/reports/client_reports','Client Reports');?></td>
                        </tr>
                        <tr>
                            <td><?php echo anchor('index.php/reports/hazard_reports','Hazards Reports');?></td>
                        </tr>
                    </tbody>    
                </table>    
            </div>
        </div>
    </div>
    
    <div class="box box-52 altbox">
        <div class="boxin">
            <div class="header">
	     <h3>Hazard Report Details</h3>
            </div>
            <div class="content">
                <table>
                    <tbody>
                    <thead>
                        <td>Detail</td>
                        <td>Value</td>
                    </thead>
                        <tr>
                            <td>Number of Registered Hazards</td><td>Value</td>
                        </tr>  
                    </tbody>   
                </table>    
            </div>
        </div>
    </div>
    
</div>