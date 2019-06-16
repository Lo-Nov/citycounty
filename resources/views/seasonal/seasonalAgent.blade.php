<!doctype html>
<html lang="en">
<title>Seasonal parking</title>

<!-- Mirrored from demo.thedevelovers.com/dashboard/klorofilpro-v1.6/html/dashboard2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 17:23:47 GMT -->
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
                    <h1 class="page-title">SEASONAL PARKING VEHICLES </h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">Vehicle status</a></li>
                    <li class="active">seasonal</li>
                </ul>
            </div>
            <!-- FEATURED DATATABLE -->
            <div class="panel">
                <div class="panel-body">
                    <table id="example" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Registration Number</th>
                            <th>Duration</th>
                            <th>Date Paid</th>
                            <th>Expiry Date</th>
                            <th>Agent </th>
                            <th>Status</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($seasonalAgent->vehicle_list as $item)
                            <tr>
                                <td>{{ $item->RegistrationNo }}</td>
                                <td>{{ $item->duration }}</td>
                                <td>{{ date('d-m-Y g:i a', strtotime($item->time_of_first_query)) }}</td>
                                <td>{{ date('d-m-Y g:i a', strtotime($item->expiry_date)) }}</td>

                                <td>{{ $item->agent }}</td>
                                <td>
                                <span class="label label-success">
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
