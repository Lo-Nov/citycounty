<!doctype html>
<html lang="en">
<title>QUERIED VEHICLES</title>
<!-- Mirrored from demo.thedevelovers.com/dashboard/klorofilpro-v1.6/html/dashboard2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 17:23:47 GMT -->
@include('partial.head');
<body>
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    @include('partial.topnav');
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    @include('partial.sidebar');
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="content-heading clearfix">
                <div class="heading-left">
                    <h1 class="page-title">ENFORCEMENT VEHICLE QUERIES </h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">Vehicle status</a></li>
                    <li class="active">Queries</li>
                </ul>
            </div>
            <!-- FEATURED DATATABLE -->
            <div class="panel">
                <div class="panel-body">
                    <!-- WRAPPER -->
                    <div id="wrapper">
                        <div class="vertical-align-wrap">
                            <div class="vertical-align-middle">
                                <h1>
						<span class="clearfix title">
							<span class="number">Empty</span>
							<p>Go Back Home</p>
						</span>
                                </h1>
                                <p class="margin-bottom-30">{{ $cWaiver->message}}</p>
                                <p>
                                    <a href="javascript:history.go(-1)" class="btn btn-default"><i class="fa fa-arrow-left"></i> <span>Go Back</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END WRAPPER -->
                </div>
            </div>
            <!-- END FEATURED DATATABLE -->
        </div>

        <!-- END MAIN CONTENT -->
        <!-- RIGHT SIDEBAR -->
    @include('partial.rightsidebar')
    <!-- END RIGHT SIDEBAR -->
    </div>
    <!-- END MAIN -->
    <div class="clearfix"></div>
    <!-- FOOTER -->
@include('partial.footer')
<!-- END FOOTER -->
</div>
@include('partial.scripts');
