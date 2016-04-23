<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/simple-sidebar.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/morris.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/dataTables/dataTables.bootstrap.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/intlTelInput.css'); ?>" type="text/css" />
	
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php
		if(!empty($meta))
			foreach($meta as $name=>$content){
				echo "\n\t\t";
				?><meta name="<?php echo $name; ?>" content="<?php echo is_array($content) ? implode(", ", $content) : $content; ?>" /><?php
		}
	?>
	</head>
	<body class="hold-transition main-page">
		<div id="wrapper">
			<?php $this->load->view('themes/admin/elements/navigation'); ?>
			<div id="page-wrapper">
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="row">
						<div class="col-lg-12">
							<?php echo $this->breadcrumb->output(); ?>
						</div>
					</div>
					<!-- /.row -->
					<?php echo $output; ?>
				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- /#page-wrapper -->
		</div>
		<!-- /#wrapper --> 
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-12"> <p class="text-center"> &copy; Kimura One - All Rights Reserved <?php echo date('Y');?>. BJJ Training Journal&trade; </p>
					</div>
				</div>
			</div>
		</footer>
		<input type="hidden" id="website_url" value="<?php echo website_url(); ?>">
		<!-- /#footer --> 
		<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/ajax-loading.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/intlTelInput.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/plugins/dataTables/jquery.dataTables.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/plugins/dataTables/dataTables.bootstrap.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/plugins/validation/validate.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/plugins/bootBox/bootbox.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/validation.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/common.js'); ?>"></script>
		<!-- Menu Toggle Script --> 
	</body>
</html>