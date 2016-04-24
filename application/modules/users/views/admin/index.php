<div class="block-header">
	<h2>Users</h2>
</div>
<div class="card">
	<div class="card-header">
		<h2>Manage Users <small>List of registered users.</small></h2>
	</div>
	<!-- Messages-->
		<?php echo $this->message->display('message'); ?>
	<!-- End Messages-->
	<table id="users_listing" class="table table-condensed table-vmiddle table-hover table-striped">
		<thead>
			<tr>
				<th data-column-id="id" data-order="desc" data-type="numeric" >ID</th>
				<th data-column-id="first_name">First Name</th>
				<th data-column-id="last_name">Last Name</th>
				<th data-column-id="email">Email</th>
				<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
			</tr>
		</thead>
	</table>
</div>