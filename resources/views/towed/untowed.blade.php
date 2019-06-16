<!doctype html>
<html lang="en">
<title>UNTOWED VEHICLES</title>
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
                    <h1 class="page-title">UNTOWED VEHICLES</h1>

                </div>
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">Vehicle status</a></li>
                    <li class="active">Clamped</li>
                </ul>
            </div>
            <!-- FEATURED DATATABLE -->
            <div class="panel">
                <div class="panel-body">
                    <table id="example" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Registration Number</th>
                            <th>Vehicle Zone</th>
                            <th>Street</th>
                            <th>Time Towed</th>
                            <th>Status</th>
                            <th>Agent</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($untowed->total_untowed_today_list as $item)
                            <tr>
                                <td><a href="#">{{ $item->RegistrationNo }}</a> </td>
                                <td>{{ $item->zone }}</td>
                                <td>{{ $item->street }}</td>
                                <td>{{ date('d-m-Y g:i a', strtotime($item->time_of_first_query)) }}</td>
                                <td>
                                <span class="label label-info">
                                    {{ $item->status }}
                                </span>
                                </td>
                                <td>{{ $item->fullNames }}</td>
                            </tr>
                        @endforeach()
                        </tbody>
                    </table>
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
