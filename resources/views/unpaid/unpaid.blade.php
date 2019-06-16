<!doctype html>
<html lang="en">
<title>VEHICLES TO CLAMP </title>
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
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="bread"
                                style="
                                            background-color: inherit;
                                            padding-left: 0;
                                            padding-right: 0;"
                            >

                                <form class="date_form_container" method="POST" action="{{ route('clampRange') }}">
                                    @csrf
                                    <div class="input-daterange input-group" data-provide="datepicker">
                                        <input type="text" class="input-sm form-control" name="fromDate" placeholder="Search From">
                                        <span class="input-group-addon"><i class="i ti-calendar"></i></span>
                                        <input type="text" class="input-sm form-control" name="toDate" placeholder="Search To">
                                    </div>
                            </ul>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="col-md-6">
                                <input type="text" name="keyword" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <span><button class="btn btn-info"><i class="ti-search"></i> Global Search </button></span>
                            </div>
                        </div>
                        </form>

                    </div>
                    <table id="example" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Registration Number</th>
                            <th>Vehicle Zone</th>
                            <th>Street</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Day/Time</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($unpaid->paginatedList as $key=>$item)
                            <tr>
                                <td>{{ $item->vehicle_reg_no }}</td>
                                <td>{{ $item->zone_code }}</td>
                                <td>{{ $item->street }}</td>
                                <td>{{ $item->duration_code }}</td>
                                <td>{{ $item->status_code }}</td>
                                <td>{{ date('d-m-Y g:i a', strtotime($item->query_data)) }}</td>

                            </tr>
                        @endforeach()
                        </tbody>

                    </table>
                    <br>

                    <?php
                    $pay =  $unpaid->pages;
                    for ($x = 1; $x <= $pay; $x++) {?>
                    <a href="{{route('unpages',$x)}}" class="btn btn-default btn-xs" role="button">{{ $x }} &raquo;</a>
                    <?php
                    }
                    ?>
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
