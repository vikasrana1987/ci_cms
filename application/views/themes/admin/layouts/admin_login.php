<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>
	<script src="<?php echo base_url('assets/vendors/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendors/bower_components/Waves/dist/waves.min.js'); ?>"></script>
	
	<!-- Placeholder for IE9 -->
	<!--[if IE 9 ]>
		<script src="<?php echo base_url('assets/vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js'); ?>"></script>
	<![endif]-->
	
	<script src="<?php echo base_url('assets/js/functions.js'); ?>"></script>
	
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/bower_components/animate.css/animate.min.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/app.min.1.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/app.min.2.css'); ?>" type="text/css" />
	
	<?php
		if(!empty($meta))
			foreach($meta as $name=>$content){
				echo "\n\t\t";
				?><meta name="<?php echo $name; ?>" content="<?php echo is_array($content) ? implode(", ", $content) : $content; ?>" /><?php
		}
	?>
	
	</head>
	<body class="login-content">
		<?php echo $output; ?>
	</body>
</html>