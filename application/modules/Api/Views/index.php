<div class="login-box">
    <div class="login-logo">
        <a href="javascript:"><b>Admin</b>istrator</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
		<!-- Messages-->
			<?php echo $this->message->display(); ?>
		<!-- End Messages-->
		<?php $attributes=array('id'=>'login','autocomplete'=>'off','role'=>'form'); ?>
        <?php echo form_open(current_url(),$attributes); ?>
            <div class="form-group has-feedback">
                <?php echo form_input($username);?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?php echo form_input($password);?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember_me" value="1"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        <?php echo form_close(); ?>

        <!--<a href="#">I forgot my password</a>
        <br>
        <a href="register.html" class="text-center">Register a new membership</a>-->

    </div>
    <!-- /.login-box-body -->
</div>

<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>