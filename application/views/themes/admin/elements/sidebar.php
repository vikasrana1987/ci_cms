<aside id="sidebar" class="sidebar c-overflow">
	<div class="profile-menu">
		<a href="#">
			<div class="profile-pic">
				<img src="<?php echo base_url('assets/img/profile-pics/1.jpg'); ?>" alt="">
			</div>

			<div class="profile-info">
				Malinda Hollaway

				<i class="zmdi zmdi-caret-down"></i>
			</div>
		</a>

		<ul class="main-menu">
			<li>
				<a href="profile-about.html"><i class="zmdi zmdi-account"></i> View Profile</a>
			</li>
			<li>
				<a href="#"><i class="zmdi zmdi-input-antenna"></i> Privacy Settings</a>
			</li>
			<li>
				<a href="#"><i class="zmdi zmdi-settings"></i> Settings</a>
			</li>
			<li>
				<a href="<?php echo website_url('auth/logout'); ?>"><i class="zmdi zmdi-time-restore"></i> Logout</a>
			</li>
		</ul>
	</div>

	<ul class="main-menu">
		<li class="active">
			<a href="index-2.html"><i class="zmdi zmdi-home"></i> Home</a>
		</li>
		<li class="sub-menu">
			<a href="#"><i class="zmdi zmdi-format-underlined"></i> Users</a>

			<ul>
				<li><a href="textual-menu.html">Groups</a></li>
				<li><a href="<?php echo website_url('users')?>">Users</a></li>
			</ul>
		</li>
	</ul>
</aside>