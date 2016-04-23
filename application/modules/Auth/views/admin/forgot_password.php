<div class="container">
    <!-- Page Heading -->
    <div class="row voffset-5">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2  col-sm-10 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-fw fa-lock"></i> <strong>Forgot Password</strong></div>
                <div class="panel-body">
                    <div class="col-lg-6 col-md-6 col-sm-6">
						<!-- Messages-->
							<?php echo $this->message->display(); ?>
						<!-- End Messages-->
                        <?php $attributes=array('id'=>'forgot','autocomplete'=>'off','role'=>'form'); ?>
						<?php echo form_open(current_url(),$attributes); ?>
                            <br>
                            <div class="form-group">
                                <div class="inner-addon left-addon"> <i class="glyphicon glyphicon-envelope"></i>
                                    <?php echo form_input($email);?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><strong>SUBMIT</strong></button>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1 text-center border-left">
                        <a href="#" class="text-center"><img src="<?php echo base_url('assets/images/logo.png'); ?>" lang="logo"></a>
                    </div>
                </div>
                <!--<div class="panel-footer text-center">Don`t registered? <a href="#" class="danger"><strong>Register now!</strong></a></div>-->
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>