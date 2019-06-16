<!doctype html>
<html lang="en">
<title>TOWED VEHICLES</title>
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
                    <h1 class="page-title">TOWED VEHICLES</h1>

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
                    <table id="example1" class="table table-striped table-hover">
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
                        @foreach ($towed->total_towed_today_list as $item)
                            <tr>
                                <td><a href="{{ URL('/test/'. $item->parked_vehicle -> RegistrationNo) }}">{{ $item->parked_vehicle -> RegistrationNo }}</a> </td>
                                <td>{{ $item->parked_vehicle ->  zone }}</td>
                                <td>{{ $item->parked_vehicle ->street }}</td>
                                <td>{{ date('d-m-Y g:i a', strtotime($item->parked_vehicle->time_of_first_query)) }}</td>
                                <td>
                                <span class="label label-info">
                                    {{ $item->parked_vehicle->status }}
                                </span>
                                </td>
                                <td>{{ $item->agent_data->fullNames }}</td>
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
