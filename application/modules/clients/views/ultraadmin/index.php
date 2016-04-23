<!-- /.row -->
<div class="row">
   <div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title"> <span class="fa fa-fw fa-align-justify"> </span> &nbsp;Manage Clients </h1>
			</div>
			<div class="panel-body">
				<!-- Messages-->
					<?php echo $this->message->display('message'); ?>
				<!-- End Messages-->
				
				<div class="button-group text-right">
				   <a href="<?php echo website_url('clients/add'); ?>" class="btn btn-primary">Add Client</a>
				</div>
				<br/>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="clients_listing">
						<thead>
							<tr>
								<th>ID</th>
								<th>Client ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Client Url</th>
								<th>Client Address</th>
								<th>Client Timezone</th>
								<th>Phone Number</th>
								<th>Facebook URL</th>
								<th>Twitter URL</th>
								<th>Website URL</th>
								<th>Created On</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="15" class="dataTables_empty">Loading...</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!--/.AddNewDriver button-->
				<!--<div class="table-responsive">
				   <div class="table-heading">
					  <h1 class="table-title"> <span class="fa fa-fw fa-list"> </span> &nbsp;Manage Drivers </h1>
				   </div>
				   <table class="table table-bordered table-hover">
					  <thead>
						 <tr>
							<th>Select</th>
							<th class="text-nowrap">Availability Status</th>
							<th>Status</th>
							<th>S.No</th>
							<th>Name</th>
							<th>Email</th>
							<th>Address</th>
							<th>Phone</th>
							<th class="text-nowrap">Driver License Id</th>
							<th>Photo</th>
							<th class="text-nowrap">Company Name</th>
							<th>Country</th>
							<th>State</th>
							<th>City</th>
							<th>Action</th>
						 </tr>
					  </thead>
					  <tbody>
						 <tr>
							<td class="text-center"><input type="checkbox" value="37" id="trxn_chk37" name="uniqueId[]"></td>
							<td><a title="Active"></a></td>
							<td><a title="Active"></a></td>
							<td>1</td>
							<td><a href="#">kali</a></td>
							<td>xxx@xxx.com</td>
							<td>9 capmen </td>
							<td>55454565666</td>
							<td>445566776776</td>
							<td><a href="#"> <img width="75" height="75" 1424152712="" src="http://demo.tagmytaxi.com/public/images/noimages.jpg?q="> </a></td>
							<td><a href="#"> <img width="32" height="32" src="http://demo.tagmytaxi.com/public/uploads/company/9.png"> test</a></td>
							<td>USA</td>
							<td>California</td>
							<td>San Francisco</td>
							<td class="text-center"><a href="#" class="fa fa-fw fa-edit"></a></td>
						 </tr>
						 <tr>
							<td class="text-center"><input type="checkbox" value="32" id="trxn_chk32" name="uniqueId[]"></td>
							<td><a title="Active"></a></td>
							<td><a title="Active"></a></td>
							<td>3</td>
							<td><a href="#">Peter</a></td>
							<td>hypermail.200@gmail.com</td>
							<td>test</td>
							<td>87451236982</td>
							<td>1234567890</td>
							<td><a href="#"> <img width="75" height="75" 1424152712="" src="http://demo.tagmytaxi.com/public/images/noimages.jpg?q="> </a></td>
							<td><a href="#"> <img width="32" height="32" src="http://demo.tagmytaxi.com/public/uploads/company/31.png"> Testmycompany</a></td>
							<td>India</td>
							<td>Tamil Nadu</td>
							<td>Coimbatore</td>
							<td class="text-center"><a href="#" class="fa fa-fw fa-edit"></a></td>
						 </tr>
						 <tr>
							<td class="text-center"><input type="checkbox" value="29" id="trxn_chk29" name="uniqueId[]"></td>
							<td><a class="unsuspendicon" title="Active"></a></td>
							<td><a class="unsuspendicon" title="Active"></a></td>
							<td>5</td>
							<td><a href="#">beny</a></td>
							<td>ben4716@gmail.com</td>
							<td>6318 sherwood rd</td>
							<td>4438584958</td>
							<td>c1238569</td>
							<td><a href="#"> <img width="75" height="75" 1424152712="" src="http://demo.tagmytaxi.com/public/images/noimages.jpg?q="> </a></td>
							<td><a href="#"> <img width="32" height="32" src="http://demo.tagmytaxi.com/public/uploads/company/9.png"> test</a></td>
							<td>USA</td>
							<td>California</td>
							<td>San Francisco</td>
							<td class="text-center"><a href="#" class="fa fa-fw fa-edit"></a></td>
						 </tr>
						 <tr>
							<td class="text-center"><input type="checkbox" value="24" id="trxn_chk24" name="uniqueId[]"></td>
							<td><a class="unsuspendicon" title="Active"></a></td>
							<td><a class="blockicon" title="Deactive"></a></td>
							<td>7</td>
							<td><a href="#">Dogan</a></td>
							<td>gundoganu@gmail.com</td>
							<td>wqrqew kkfkdgf</td>
							<td>6479850556</td>
							<td>54656457</td>
							<td><a href="#"> <img width="75" height="75" 1424152712="" src="http://demo.tagmytaxi.com/public/images/noimages.jpg?q="> </a></td>
							<td><a href="#"> <img width="32" height="32" src="http://demo.tagmytaxi.com/public/uploads/company/9.png"> test</a></td>
							<td>Canada</td>
							<td>ON</td>
							<td>Toronto</td>
							<td class="text-center"><a href="#" class="fa fa-fw fa-edit"></a></td>
						 </tr>
						 <tr>
							<td class="text-center"><input type="checkbox" value="22" id="trxn_chk22" name="uniqueId[]"></td>
							<td><a title="Active"></a></td>
							<td><a title="Active"></a></td>
							<td>9</td>
							<td><a href="#">Elbi</a></td>
							<td>relbirodriguez@aol.com</td>
							<td>10712 91th avenue</td>
							<td>9177331507</td>
							<td>647 328 088</td>
							<td><a href="#"> <img width="75" height="75" 1424152712="" src="http://demo.tagmytaxi.com/public/images/noimages.jpg?q="> </a></td>
							<td><a href="#"> <img width="32" height="32" src="http://demo.tagmytaxi.com/public/uploads/company/9.png"> test</a></td>
							<td>USA</td>
							<td>California</td>
							<td>San Francisco</td>
							<td class="text-center"><a href="#" class="fa fa-fw fa-edit"></a></td>
						 </tr>
					  </tbody>
				   </table>
				</div>-->
			</div>
		</div>
   </div>
</div>
<!-- /.row -->