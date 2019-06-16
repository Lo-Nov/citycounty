<!doctype html>
<html lang="en">
<title>Untowed vehicles</title>
@include('partial.head');
<body>
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    @include('partial.topnav');
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    @include('partial.agentSidebar');
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="content-heading clearfix">
                <div class="heading-left">
                    <h1 class="page-title">CLAMPED VEHICLES</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">Vehicle status</a></li>
                    <li class="active">Due Clamping</li>
                </ul>
            </div>
            <!-- FEATURED DATATABLE -->
            <div class="panel">
                <div class="panel-body">
                    <table id="example" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Registration Number</th>
                            <th>Parking Zone</th>
                            <th>Street</th>
                            <th>Duration</th>
                            <th>Parking Cost</th>
                            <th>Query Time</th>
                            <th>Status</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($untowedAgent->response_data as $item)
                            <tr>
                                <td>{{ $item->vehicle_reg_no }}</td>
                                <td>{{ $item->zone_code }}</td>
                                <td>{{ $item->street }}</td>
                                <td>{{ $item->duration_code }}</td>
                                <td>{{ $item->parking_cost }}</td>
                                <td>{{ date('d-m-Y g:i a', strtotime($item->query_time)) }}</td>
                                <td>
                                <span class="label label-danger">
                                    {{ $item->status }}
                                </span>
                                </td>

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
