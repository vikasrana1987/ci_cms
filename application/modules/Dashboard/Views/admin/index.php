<script src="<?php echo base_url('assets/js/plugins/morris/raphael.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/morris/morris.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/morris/morris-data.js'); ?>"></script>
<div class="row panel-collapse collapse in" id="collapseExample">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-fw fa-align-justify"></i> Statistics</h3>
            </div>
            <div class="panel-body">
                <ul class="statistics">
                    <li>
                        <div class="top-info">
                            <a class="blue-square" title="TOTAL USERS" href="#"><img src="<?php echo base_url('assets/images/total-users.jpg'); ?>" align="" class="img-circle"></a> <strong>33</strong> </div>
                        <div class="progress progress-micro">
                            <div style="width: 60%;" class="bar"></div>
                        </div>
                        <span class="rapid_title">TOTAL USERS</span> </li>
                    <li>
                        <div class="top-info">
                            <a class="red-square" title="TOTAL COMPANIES" href="#"><img src="<?php echo base_url('assets/images/total-companies.jpg'); ?>" align="" class="img-circle"></a> <strong>3</strong> </div>
                        <div class="progress progress-micro">
                            <div style="width: 20%;" class="bar"></div>
                        </div>
                        <span class="rapid_title">TOTAL COMPANIES</span> </li>
                    <li>
                        <div class="top-info">
                            <a class="purple-square" title="TOTAL TAXI TYPE" href="#"><img src="<?php echo base_url('assets/images/taxi-type.jpg'); ?>" align="" class="img-circle"></a> <strong>1</strong> </div>
                        <div class="progress progress-micro">
                            <div style="width: 90%;" class="bar"></div>
                        </div>
                        <span class="rapid_title">TOTAL TAXI TYPE</span> </li>
                    <li>
                        <div class="top-info">
                            <a class="green-square" title="TOTAL DRIVERS" href="#"><img src="<?php echo base_url('assets/images/total-drivers.jpg'); ?>" align="" class="img-circle"></a> <strong>8</strong> </div>
                        <div class="progress progress-micro">
                            <div style="width: 70%;" class="bar"></div>
                        </div>
                        <span class="rapid_title">TOTAL DRIVERS</span> </li>
                    <li>
                        <div class="top-info">
                            <a class="sea-square" title="TOTAL TAXIES" href="#"><img src="<?php echo base_url('assets/images/total-taxi.jpg'); ?>" align="" class="img-circle"></a> <strong>1</strong> </div>
                        <div class="progress progress-micro">
                            <div style="width: 50%;" class="bar"></div>
                        </div>
                        <span class="rapid_title">TOTAL TAXIES</span> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-2 col-md-4 col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12 text-center"> <i class="fa fa-building-o fa-5x"></i> </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer  text-center"> Company
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-4">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12 text-center"> <i class="fa fa-male fa-5x"></i> </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer text-center"> Dispatcher
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12 text-center"> <i class="fa fa-user fa-5x"></i> </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer  text-center"> Driver
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-4">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12 text-center"> <i class="fa fa-taxi fa-5x"></i> </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer  text-center"> Taxi
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12 text-center"> <i class="fa fa-users fa-5x"></i> </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer  text-center"> Customer
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12 text-center"> <i class="fa fa-building fa-5x"></i> </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer  text-center"> City
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Line Graph Example with Tooltips</h3>
            </div>
            <div class="panel-body">
                <div class="flot-chart">
                    <div id="morris-line-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>
            </div>
            <div class="panel-body">
                <div id="morris-area-chart"></div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Donut Chart</h3>
            </div>
            <div class="panel-body">
                <div id="morris-donut-chart"></div>
                <div class="text-right"> <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a> </div>
            </div>
        </div>
    </div>

</div>
<!-- /.row -->