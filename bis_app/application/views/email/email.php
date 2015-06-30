<!DOCTYPE html>  
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $page_title ?></title>
  <style type="text/css">
  	div#main {
  		width: 400px;
  		margin: auto;
  		font-family: "Myriad Pro", Myriad Pro, Arial;
  	}
  </style>
</head>

<body>
    
 	 <div id="main">
	<?php $this->load->view($main_content); ?>
    </div>
</body>
</html>