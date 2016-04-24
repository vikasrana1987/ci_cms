<!-- Login -->
<div class="lc-block toggled" id="l-login">
	<!-- Messages-->
		<?php echo $this->message->display(); ?>
	<!-- End Messages-->
	<?php $attributes=array('id'=>'login','autocomplete'=>'off','role'=>'form'); ?>
	<?php echo form_open(current_url(),$attributes); ?>
		<div class="input-group m-b-20">
			<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
			<div class="fg-line">
				 <?php echo form_input($email);?>
			</div>
		</div>
		
		<div class="input-group m-b-20">
			<span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
			<div class="fg-line">
				<?php echo form_input($password);?>
			</div>
		</div>
		
		<div class="clearfix"></div>
		
		<div class="checkbox">
			<label>
				<input type="checkbox" name="remember_me" value="1">
				<i class="input-helper"></i>
				Keep me signed in
			</label>
		</div>
		
		<button type="submit" class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></button>
		
		<ul class="login-navigation">
			<li data-block="#l-forget-password" class="bgm-orange"><a href="<?php echo website_url('auth/forgot_password'); ?>">Forgot Password?</a></li>
		</ul>
	<?php echo form_close(); ?>
</div>