<!-- Forgot Password -->
<div class="lc-block toggled" id="l-forget-password">
	<p class="text-left">Forgot Password</p>
	<!-- Messages-->
		<?php echo $this->message->display(); ?>
	<!-- End Messages-->
	<?php $attributes=array('id'=>'forgot','autocomplete'=>'off','role'=>'form'); ?>
	<?php echo form_open(current_url(),$attributes); ?>
		<div class="input-group m-b-20">
			<span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
			<div class="fg-line">
				<?php echo form_input($email);?>
			</div>
		</div>
		
		<button type="submit" class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></button>
		
		<ul class="login-navigation">
			<li data-block="#l-login" class="bgm-green"><a href="<?php echo website_url('auth'); ?>">Login<a/></li>
		</ul>
	<?php echo form_close(); ?>	
</div>