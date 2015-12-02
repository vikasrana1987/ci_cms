<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
	<script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/main.min.css'); ?>" type="text/css" />
	<?php
			if(!empty($meta))
				foreach($meta as $name=>$content){
					echo "\n\t\t";
					?><meta name="<?php echo $name; ?>" content="<?php echo is_array($content) ? implode(", ", $content) : $content; ?>" /><?php
			 }
		?>
		<style type="text/css">

		</style>
	</head>
	<body class="hold-transition login-page">
			<?php echo $output; ?>
	
	
	</body>
</html>