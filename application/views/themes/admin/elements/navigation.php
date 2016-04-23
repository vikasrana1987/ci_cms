<?php $module = $this->common->module(); ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header pull-left">
		<a class="navbar-brand" href=""><img src="<?php echo base_url('assets/images/dashboard_logo.png'); ?>" align="logo" class="img-responsive"></a>
	</div>
	<!-- Top Menu Items -->
	<ul class="nav navbar-right top-nav pull-right">
		<li> <a href="#">Balance KD11321.45</a>
			<li> <a href="#menu-toggle" id="menu-toggle"><i class="fa fa-expand"></i></a></li>

		</li>
		<li> <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-fw fa-external-link-square"></i></a>

		</li>
		<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li> <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a> </li>
				<li> <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a> </li>
				<li> <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a> </li>
				<li class="divider"></li>
				<li> <a href="<?php echo website_url('auth/logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a> </li>
			</ul>
		</li>
	</ul>
	<!-- Sidebar -->
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav side-nav">
			<li class="<?php if($module=='dashboard'): echo 'active'; endif; ?>"> <a href="<?php echo website_url('dashboard')?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a> </li>
			<!--<li> <a data-target="#dispatch" data-toggle="collapse" href="javascript:;"><i class="fa fa-fw fa-truck"></i> Dispatch <i class="fa fa-fw fa-caret-down"></i></a>
				<ul class="collapse" id="dispatch">
					<li>
						<a href="#"> <i class="fa fa-fw fa-plus"></i> Manage Dispatch</a>
					</li>
				</ul>
			</li>
			<li> <a href="#"><i class="fa fa-fw fa-stack-exchange"></i> Statistics</a></li>
			<li> <a href="#"><i class="fa fa-fw fa-file-excel-o"></i> Documents</a> </li>
			<li> <a data-target="#vehicle" data-toggle="collapse" href="javascript:;"><i class="fa fa-fw fa-car"></i> Vehicle <i class="fa fa-fw fa-caret-down"></i></a>
				<ul class="collapse" id="vehicle">
					<li> <a href="#"><i class="fa fa-fw fa-plus"></i> Car listing</a> </li>
				</ul>
			</li>
			<li> <a href="#"><i class="fa fa-fw fa-user"></i> Drivers</a> </li>
			<li> <a data-target="#promocode" data-toggle="collapse" href="javascript:;"><i class="fa fa-fw fa-qrcode"></i> Promo Code <i class="fa fa-fw fa-caret-down"></i></a>
				<ul class="collapse" id="promocode">
					<li> <a href="#"><i class="fa fa-fw fa-plus"></i> list</a> </li>
					<li> <a href="#"><i class="fa fa-fw fa-plus"></i> Usage</a> </li>
				</ul>
			</li>
			<li> <a href="#"><i class="fa fa-fw fa-calendar"></i> Reservation</a> </li>
			<li> <a data-target="#companylist" data-toggle="collapse" href="javascript:;"><i class="fa fa-fw fa-building-o"></i> Company List <i class="fa fa-fw fa-caret-down"></i></a>
				<ul class="collapse" id="companylist">
					<li> <a href="#"><i class="fa fa-fw fa-plus"></i> List</a> </li>
					<li> <a href="#"><i class="fa fa-fw fa-plus"></i> Restore</a> </li>
				</ul>
			</li>-->
			<li> <a data-target="#clients" data-toggle="collapse" href="javascript:;"><i class="fa fa-fw fa-user-md"></i> Clients <i class="fa fa-fw fa-caret-down"></i></a>
				<ul class="collapse" id="clients">
					<li> <a href="<?php echo website_url('clients')?>"><i class="fa fa-fw fa-plus"></i> Manage</a> </li>
				</ul>
			</li>
			<!--<li> <a data-target="#payment" data-toggle="collapse" href="javascript:;"><i class="fa fa-fw fa-credit-card"></i> Payment <i class="fa fa-fw fa-caret-down"></i></a>
				<ul class="collapse" id="payment">
					<li> <a href="#"><i class="fa fa-fw fa-plus"></i> Report</a> </li>
					<li> <a href="#"><i class="fa fa-fw fa-plus"></i> Decline Payments</a> </li>
				</ul>
			</li>
			<li> <a data-target="#trips" data-toggle="collapse" href="javascript:;"><i class="fa fa-fw fa-road"></i> Trips <i class="fa fa-fw fa-caret-down"></i></a>
				<ul class="collapse" id="trips">
					<li> <a href="#"><i class="fa fa-fw fa-plus"></i> All Trips</a> </li>
					<li> <a href="#"><i class="fa fa-fw fa-plus"></i> Current Trips</a> </li>
				</ul>
			</li>
			<li> <a data-target="#notifications" data-toggle="collapse" href="javascript:;"><i class="fa fa-fw fa-info"></i> Notifications <i class="fa fa-fw fa-caret-down"></i></a>
				<ul class="collapse" id="notifications">
					<li> <a href="#"><i class="fa fa-fw fa-plus"></i> List Notify user</a> </li>
				</ul>
			</li>
			<li> <a href="#"><i class="fa fa-fw fa-map-marker"></i> Live map</a> </li>
			<li> <a data-target="#pricing" data-toggle="collapse" href="javascript:;"><i class="fa fa-fw fa-info"></i> Pricing <i class="fa fa-fw fa-caret-down"></i></a>
				<ul class="collapse" id="pricing">
					<li> <a href="#"><i class="fa fa-fw fa-plus"></i> Base fare info & Refferal</a> </li>
				</ul>
			</li>-->
		</ul>
	</div>
</nav>