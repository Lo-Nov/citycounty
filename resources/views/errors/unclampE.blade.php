

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
            </div>
            <!-- FEATURED DATATABLE -->
            <div class="panel">
                <div class="panel-body">
                    <!-- WRAPPER -->
                    <div id="wrapper">
                        <div class="">
                            <div class="col-md-6">
                                <h2 class="margin-bottom-30 alert alert-warning">{{ $due_unclamped->message}}</h2>
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
