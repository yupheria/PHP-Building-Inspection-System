<!DOCTYPE html>  

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --> 
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title><?php echo $page_title ?></title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!--  Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="shortcut icon" href="<?php echo base_url(); ?>/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo base_url(); ?>/apple-touch-icon.png">

	<!-- CSS : jQuery UI -->  
	<!-- TODO: Merge, to reduce HTTP Requests -->  
  <link rel='stylesheet' href='<?php echo base_url(); ?>css/ui-lightness/jquery-ui-1.8.4.custom.css' 	type='text/css' media='all' />
  <!-- CSS : implied media="all" -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css?v=2">
  <link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url(); ?>css/datepicker.css" />
  <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>

  <?php if(isset($gmaps)) {echo $gmaps['js'];} ?>

  <script src="<?php echo base_url(); ?>js/libs/modernizr-1.7.min.js"></script>
  <script type="text/javascript">
  	var baseurl = "<?php echo base_url(); ?>";
  </script>
   <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31706863-1']);
  _gaq.push(['_setDomainName', 'capitalplanning.co.nz']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

 </script>
 <!--<script type="text/javascript" src="https://www.dropbox.com/static/api/1/dropbox.js" id="dropboxjs" data-app-key="krte1x26egj2p2k"></script>-->
 
</head>

<body class="<?php echo $body_class ?>">

  	<?php if ($load_header) : ?>
	    <header>
			<?php 
                        $this->load->view('header'); ?>
	    </header>
	<?php endif; ?>
    
 	 <div id="main">
	<?php $this->load->view($main_content); ?>
             
        </div>
     <?php if ($load_footer) : ?>
	    <footer>
			<?php $this->load->view('footer'); ?>
	    </footer>
	<?php endif; ?>
    
  	

  <!-- Javascript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  <!--<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo base_url(); ?>js/libs/jquery-1.5.1.js"%3E%3C/script%3E'))</script>-->
  	<script src="<?php echo base_url(); ?>js/libs/jquery-ui-1.8.7.custom.min.js" 	type="text/javascript"></script>
  
  <!-- scripts concatenated and minified via ant build script-->
   
  <script src="<?php echo base_url(); ?>js/plugins.js"></script>
  <script src="<?php echo base_url(); ?>js/script.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/datepicker.js"></script>
  
  <!-- end concatenated and minified scripts-->
  
  
  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
  <![endif]-->

<?php /*
  <!-- yui profiler and profileviewer - remove for production -->
  <script src="js/profiling/yahoo-profiling.min.js"></script>
  <script src="js/profiling/config.js"></script>
  <!-- end profiling code -->
*/ ?>

  <!-- asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet 
       change the UA-XXXXX-X to be your site's ID -->
  <!--<script>
   var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
   (function(d, t) {
    var g = d.createElement(t),
        s = d.getElementsByTagName(t)[0];
    g.async = true;
    g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g, s);
   })(document, 'script');
  </script> -->
  
  <?php if ($message) : ?>
  <script type="text/javascript">
  		<?php if ($message_type == "error") : ?>
          $.notifyBar({ cls: "error", html: "<?php echo $message; ?>" });
  		<?php endif; ?>
  		<?php if ($message_type == "success") : ?>
  		$.notifyBar({ cls: "success", html: "<?php echo $message; ?>" });
  		<?php endif; ?>
   </script>
   <?php endif; ?>
</body>
</html>