<?php $module = $this->common->module(); ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?php echo base_url('assets/images'); ?>/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>Alexander Pierce</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
		<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
		</button>
	  </span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">MAIN NAVIGATION</li>
			<li class="<?php if($module=='dashboard'): echo 'active'; endif; ?>">
				<a href="<?php echo base_url('admin/dashboard')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-files-o"></i>
					<span>Users</span>
					<!--<span class="label label-primary pull-right">4</span>-->
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li class="<?php if($module=='groups'): echo 'active'; endif; ?>">
						<a href="<?php echo base_url('admin/groups')?>"><i class="fa fa-circle-o"></i> Groups</a>
					</li>
					<li class="<?php if($module=='users'): echo 'active'; endif; ?>">
						<a href="<?php echo base_url('admin/users')?>"><i class="fa fa-circle-o"></i> Users</a>
					</li>
					
				</ul>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>