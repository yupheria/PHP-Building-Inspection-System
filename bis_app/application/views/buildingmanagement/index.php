<?php

$this->load->view('navigation');

?>

<div id="container">

<div class="box box-25">
	<div class="boxin" id="groups">
		<div class="header">
			<h3>View selector</h3>
		</div>
		<div class="content">
			<table cellspacing="0">
				<thead>
					<tr>
						<th class="tc last">Sites</th>
					</tr>
				</thead>
				<tbody>
					<tr class="first">
						<td><?php echo anchor('#', 'Wizard'); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

	<div class="box box-80 altbox wizardframe">
		<div class="boxin">
			<div class="header">
				<h3>Buildings</h3>
				<span id="toolbar">
				<?php 
					echo anchor('#', 'Add &raquo;', array('class' => 'buttonBlack', 'id' => 'addButton'));  
				?>
				</span>
			</div>
			<div class="content clearfix">
			
				<?php $this->load->view('buildingmanagement/stepone'); ?>
					
			</div>
		</div>
	</div>
</div>
