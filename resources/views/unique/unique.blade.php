<!doctype html>
<html lang="en">
<title>All Reports</title>
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
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">report</li>
                </ul>
            </div>
            <!-- FEATURED DATATABLE -->
            <div class="panel">
                <div class="panel-body">
                    <h4>Status Report</h4>
                    <!-- TABS WITH LABEL AND BADGE -->
                    <ul class="nav nav-tabs nav-tabs-right">
                        <li class="active"><a href="#tabitem2" data-toggle="tab"><i class="ti-money"></i>History<span class="badge"></span></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tabitem2">

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
                                                <input type="text" name="keyword" class="form-control" placeholder="Plate Number">
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
                                            <th>Track</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($unique->paginatedList as $key=>$item)
                                            <tr>
                                                <td>{{ $item->vehicle_reg_no }}</td>
                                                <td>{{ $item->zone_code }}</td>
                                                <td>{{ $item->street }}</td>
                                                <td>{{ $item->duration_code }}</td>
                                                <td>{{ $item->status_code }}</td>
                                                <td>{{ date('d-m-Y g:i a', strtotime($item->query_data)) }}</td>
                                                <td>
                                                    <a href="{{route('plate',$item->vehicle_reg_no)}}" class="btn btn-info btn-xs" role="button">Track</a>
                                                </td>

                                            </tr>
                                        @endforeach()
                                        </tbody>

                                    </table>
                                    <br>

                                    <?php
                                    $pay =  $unique->pages;
                                    for ($x = 1; $x <= $pay; $x++) {?>
                                    <a href="{{route('unpages',$x)}}" class="btn btn-default btn-xs" role="button">{{ $x }} &raquo;</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- END FEATURED DATATABLE -->
                        </div>
                    </div>
                    <!-- END TABS WITH LABEL AND BADGE -->
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
