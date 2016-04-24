<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>
	
	<!-- Vendor CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/bower_components/animate.css/animate.min.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css'); ?>" type="text/css" />
	
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
	<body>
	
		<?php $this->load->view('themes/admin/elements/navigation'); ?>
        
        <section id="main" data-layout="layout-1">
            <?php $this->load->view('themes/admin/elements/sidebar'); ?>
            
            <aside id="chat" class="sidebar c-overflow">
            
                <div class="chat-search">
                    <div class="fg-line">
                        <input type="text" class="form-control" placeholder="Search People">
                    </div>
                </div>

                <div class="listview">
                    <a class="lv-item" href="#">
                        <div class="media">
                            <div class="pull-left p-relative">
                                <img class="lv-img-sm" src="<?php echo base_url('assets/img/profile-pics/2.jpg'); ?>" alt="">
                                <i class="chat-status-busy"></i>
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Jonathan Morris</div>
                                <small class="lv-small">Available</small>
                            </div>
                        </div>
                    </a>

                    <a class="lv-item" href="#">
                        <div class="media">
                            <div class="pull-left">
                                <img class="lv-img-sm" src="<?php echo base_url('assets/img/profile-pics/1.jpg'); ?>" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lv-title">David Belle</div>
                                <small class="lv-small">Last seen 3 hours ago</small>
                            </div>
                        </div>
                    </a>

                    <a class="lv-item" href="#">
                        <div class="media">
                            <div class="pull-left p-relative">
                                <img class="lv-img-sm" src="<?php echo base_url('assets/img/profile-pics/3.jpg'); ?>" alt="">
                                <i class="chat-status-online"></i>
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Fredric Mitchell Jr.</div>
                                <small class="lv-small">Availble</small>
                            </div>
                        </div>
                    </a>

                    <a class="lv-item" href="#">
                        <div class="media">
                            <div class="pull-left p-relative">
                                <img class="lv-img-sm" src="<?php echo base_url('assets/img/profile-pics/4.jpg'); ?>" alt="">
                                <i class="chat-status-online"></i>
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Glenn Jecobs</div>
                                <small class="lv-small">Availble</small>
                            </div>
                        </div>
                    </a>

                    <a class="lv-item" href="#">
                        <div class="media">
                            <div class="pull-left">
                                <img class="lv-img-sm" src="<?php echo base_url('assets/img/profile-pics/5.jpg'); ?>" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Bill Phillips</div>
                                <small class="lv-small">Last seen 3 days ago</small>
                            </div>
                        </div>
                    </a>

                    <a class="lv-item" href="#">
                        <div class="media">
                            <div class="pull-left">
                                <img class="lv-img-sm" src="<?php echo base_url('assets/img/profile-pics/6.jpg'); ?>" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Wendy Mitchell</div>
                                <small class="lv-small">Last seen 2 minutes ago</small>
                            </div>
                        </div>
                    </a>
                    <a class="lv-item" href="#">
                        <div class="media">
                            <div class="pull-left p-relative">
                                <img class="lv-img-sm" src="<?php echo base_url('assets/img/profile-pics/7.jpg'); ?>" alt="">
                                <i class="chat-status-busy"></i>
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Teena Bell Ann</div>
                                <small class="lv-small">Busy</small>
                            </div>
                        </div>
                    </a>
                </div>
            </aside>
            
            
            <section id="content">
                <div class="container">
					<?php //echo $this->breadcrumb->output(); ?>
                    <?php echo $output; ?>
                </div>
            </section>
        </section>
        
        <footer id="footer">
            Copyright &copy; <?php echo date('Y');?> VM Infotech
            
            <ul class="f-menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </footer>

        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Please wait...</p>
            </div>
        </div>
        
        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>   
        <![endif]-->
        
        <!-- Javascript Libraries -->
		<input type="hidden" id="website_url" value="<?php echo website_url(); ?>">
		<script src="<?php echo base_url('assets/vendors/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendors/bower_components/flot/jquery.flot.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendors/bower_components/flot/jquery.flot.resize.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendors/bower_components/flot.curvedlines/curvedLines.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendors/sparklines/jquery.sparkline.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendors/bower_components/moment/min/moment.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendors/bower_components/Waves/dist/waves.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendors/bootstrap-growl/bootstrap-growl.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
		
		<script src="<?php echo base_url('assets/vendors/bootstrap-growl/bootstrap-growl.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/vendors/bootgrid/jquery.bootgrid.updated.min.js'); ?>"></script>
		
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="<?php echo base_url('assets/vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js'); ?>"></script>
        <![endif]-->
		
		<script src="<?php echo base_url('assets/js/flot-charts/curved-line-chart.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/flot-charts/line-chart.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/charts.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/functions.js'); ?>"></script>
		
		<script src="<?php echo base_url('assets/js/demo.js'); ?>"></script>
		
		
		<script src="<?php echo base_url('assets/js/common.js'); ?>"></script>
		
	</body>
</html>