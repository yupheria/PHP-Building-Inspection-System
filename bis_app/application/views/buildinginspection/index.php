<?php

$this->load->view('navigation');

?>

<div id="container">

<?php $this->load->view('buildinginspection/_sidebar'); ?>

	<div class="box box-75 altbox">
		<div class="boxin">
			<div class="header">
				<h3>Building inspections</h3>
				<span id="toolbar">
				<?php 
					echo anchor('client/add', '&laquo; Back', array('class' => 'buttonBlack', 'id' => 'addButton')); 
					echo anchor('#', 'Forward &raquo;', array('class' => 'buttonBlack-disabled', 'id' => 'editButton')); 
				?>
				</span>
			</div>	
			<div class="content clearfix">
			
				<?php $this->load->view('buildinginspection/stepone'); ?>
					
			</div>
		</div>
	</div>

</div>
