<!doctype html>
<html lang="en">
<title>Vehicles to unclamp</title>
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
                    <h1 class="page-title">TO CLAMP VEHICLES</h1>
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
                        @php
                            $total = isset($total) ? $total + $item->amount_paid : 0;
                        @endphp
                        @foreach ($unclampAgent->response_data as $item)
                            <tr>
                                <td>{{ $item->vehicle_reg_no }}</td>
                                <td>{{ $item->zone_code }}</td>
                                <td>{{ $item->street }}</td>
                                <td>{{ $item->duration_code }}</td>
                                <td>{{ number_format($item->amount_paid ,2) }}
                                    @php($total += $item->amount_paid)</td>
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
                <br><br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3 label label-default">
                        <h4>Total Amount : {{ number_format($total,2) }}</h4>
                    </div>
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
