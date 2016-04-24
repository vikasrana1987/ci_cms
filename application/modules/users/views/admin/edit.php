<!-- /.row -->
<div class="row">
   <div class="col-lg-12">
      <div class="panel panel-default">
         <div class="panel-heading">
            <h1 class="panel-title"> <span class="fa fa-fw fa-user"> </span> &nbsp;Client Information </h1>
         </div>
         <div class="panel-body">
			<!-- Messages-->
				<div class="errorContainer">
					<?php echo $this->message->display(); ?>
				</div>	
			<!-- End Messages-->
			<?php $attributes=array('id'=>'login','autocomplete'=>'off','role'=>'form','class'=>'form-horizontal','name'=>'addClientForm'); ?>
			<?php echo form_open(current_url(),$attributes); ?>
               <div class="form-group required">
					<label for="inputFirstName" class="col-lg-2 col-md-2 col-sm-4 control-label">First Name</label>
					<div class="col-lg-4 col-md-4 col-sm-8">
						 <?php echo form_input($client_first_name);?>
					</div>
				</div>
				<div class="form-group required">	
					<label for="inputLastName" class="col-lg-2 col-md-2 col-sm-4 control-label">Last Name</label>
					<div class="col-lg-4 col-md-4 col-sm-8">
						<?php echo form_input($client_last_name);?>
					</div>
				</div>
				<div class="form-group">	
					<label for="inputClientURL" class="col-lg-2 col-md-2 col-sm-4 control-label">Client URL</label>
					<div class="col-lg-4 col-md-4 col-sm-8">
						<?php echo form_input($client_url);?>
					</div>
				</div>
				<div class="form-group required">	
					<label for="inputClientAddress" class="col-lg-2 col-md-2 col-sm-4 control-label">Client Address</label>
					<div class="col-lg-4 col-md-4 col-sm-8">
						<?php echo form_textarea($client_address);?>
					</div>
				</div>
				
				<div class="form-group required">	
					<label for="inputTimezone" class="col-lg-2 col-md-2 col-sm-4 control-label">Client Timezone</label>
					<div class="col-lg-4 col-md-4 col-sm-8">
						<?php echo form_dropdown($client_timezone['name'],$client_timezone['value'],$client_timezone['selected'],$client_timezone['additional']);?>
					</div>
				</div>
				
				<div class="form-group required">	
					<label for="inputPhoneNumber" class="col-lg-2 col-md-2 col-sm-4 control-label">Phone Number</label>
					<div class="col-lg-4 col-md-4 col-sm-8">
						<?php echo form_input($client_phone_number);?>
					</div>
				</div>
				
				<div class="form-group">	
					<label for="inputFacebookURL" class="col-lg-2 col-md-2 col-sm-4 control-label">Facebook Page URL</label>
					<div class="col-lg-4 col-md-4 col-sm-8">
						<?php echo form_input($client_fb_page_url);?>
					</div>
				</div>
				
				<div class="form-group">	
					<label for="inputTwitterURL" class="col-lg-2 col-md-2 col-sm-4 control-label">Twitter Page URL</label>
					<div class="col-lg-4 col-md-4 col-sm-8">
						<?php echo form_input($client_twitter_page_url);?>
					</div>
				</div>
				
				<div class="form-group">	
					<label for="inputWebsiteURL" class="col-lg-2 col-md-2 col-sm-4 control-label">Website URL</label>
					<div class="col-lg-4 col-md-4 col-sm-8">
						<?php echo form_input($client_website_url);?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
							  <h1 class="panel-title"> <span class="fa fa-fw fa-lock"> </span> &nbsp;Account Information </h1>
							</div>
							<div class="panel-body">
								<div class="form-group required">
								  <label for="inputEmail" class="col-lg-2 col-md-2 col-sm-4 control-label">Email</label>
									<div class="col-lg-4 col-md-4 col-sm-8">
										<?php echo form_input($email);?>
									</div>
								</div>
								<?php if(isset($result) && !empty($result)):?>
									<div class="form-group">
									  <label for="inputPassword" class="col-lg-2 col-md-2 col-sm-4 control-label">Password</label>
										<div class="col-lg-4 col-md-4 col-sm-8">
											<?php echo form_input($password);?>
											<small class="text-muted">Enter password in case you want to update password</small>
										</div>
									</div>
								<?php else: ?>	
									<div class="form-group required">
									  <label for="inputPassword" class="col-lg-2 col-md-2 col-sm-4 control-label">Password</label>
										<div class="col-lg-4 col-md-4 col-sm-8">
											<?php echo form_input($password);?>
										</div>
									</div>
								<?php endif; ?>	
							</div>
						</div>
					</div>
				  </div>
				  <!-- /.row --> 
				  
				<?php echo form_input($client_country_code);?>
				<div class="form-group">	
					<label for="inputLastName" class="col-lg-2 col-md-2 col-sm-4 control-label"></label>
					<div class="col-lg-4 col-md-4 col-sm-8">
						<button type="submit" class="btn btn-primary">Submit</button>
                        <a href="<?php echo website_url('clients'); ?>" class="btn btn-primary" href="">Cancel</a>
					</div>
				</div>
           <?php echo form_close(); ?>
         </div>
      </div>
   </div>
</div>
<?php if(isset($result) && !empty($result)):?>
	<?php echo form_input($phone_number);?>
<?php endif; ?>	