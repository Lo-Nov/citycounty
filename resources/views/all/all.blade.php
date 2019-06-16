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
                        <li class="active"><a href="#tabitem2" data-toggle="tab"><i class="ti-money"></i>Paid<span class="badge"></span></a></li>
                        <li ><a href="#tabitem3" data-toggle="tab"> <i class="ti-car"></i>To Clamp<span class="badge element-bg-color-orange"></span></a></li>
                        <li ><a href="#tabitem4" data-toggle="tab"> <i class="ti-car"></i> Clamped<span class="badge element-bg-color-orange"></span></a></li>
                        <li ><a href="#tabitem5" data-toggle="tab"> <i class="ti-car"></i> To Unclamp<span class="badge element-bg-color-orange"></span></a></li>
                        <li ><a href="#tabitem6" data-toggle="tab"> <i class="ti-car"></i> Unclamped<span class="badge element-bg-color-orange"></span></a></li>
                       </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tabitem2">

                            <!-- FEATURED DATATABLE -->
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <ul class="bread"
                                                style="
                                            background-color: inherit;
                                            padding-left: 0;
                                            padding-right: 0;"
                                            >

                                                <form class="date_form_container" method="POST" action="{{ route('pRange') }}">
                                                    @csrf
                                                    <div class="input-daterange input-group" data-provide="datepicker">
                                                        <input type="text" class="input-sm form-control" name="fromDate" placeholder="Search From">
                                                        <span class="input-group-addon"><i class="i ti-calendar"></i></span>
                                                        <input type="text" class="input-sm form-control" name="toDate" placeholder="Search To">
                                                    </div>
                                                    <span><button type="submit" class="btn btn-sm colored-buttons">
                                       <i class="fa fa-filter"></i>Filter</button></span>
                                                </form>

                                            </ul>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    <table id="example1" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Reg. No.</th>
                                            <th>Vehicle Zone</th>
                                            <th>Street</th>
                                            <th>Duration</th>
                                            <th>Amount </th>
                                            <th>Pymt Mode</th>
                                            <th>Pymt Ref.</th>
                                            <th>Day/Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($paid->response_data as $item)
                                            <tr>
                                                <td>{{ $item->vehicle_reg_no }}</td>
                                                <td>{{ $item->zone_code }}</td>
                                                <td>{{ $item->street }}</td>
                                                <td>{{ $item->duration_code }}</td>
                                                <td style="text-align: right">{{ number_format($item->amount_paid ,2)}}</td>
                                                <td>{{ $item->payment_mode }}</td>
                                                <td>{{ $item->transaction_code }}</td>
                                                <td>{{ date('d-m-Y g:i a', strtotime($item->query_time)) }}</td>
                                            </tr>
                                        @endforeach()
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END FEATURED DATATABLE -->
                        </div>
                        <div class="tab-pane fade" id="tabitem3">

                            <!-- FEATURED DATATABLE -->
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4"></div>
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
                                                    <span><button type="submit" class="btn btn-sm btn-success">
                                       <i class="fa fa-filter"></i>Filter</button></span>
                                                </form>

                                            </ul>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    <table id="example2" class="table table-striped table-hover">
                                        <thead>
                                        <tr>

                                            <th>Reg. No.</th>
                                            <th>Vehicle Zone</th>
                                            <th>Street</th>
                                            <th>Classifications</th>
                                            <th>Agent</th>
                                            <th>Status</th>
                                            <th>Day/Time</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($unpaid->response_data as $key=>$item)
                                            <tr>

                                                <td>{{ $item->vehicle_reg_no }}</td>
                                                <td>{{ $item->zone_code }}</td>
                                                <td>{{ $item->street }}</td>
                                                <td>{{ $item->duration_code }}</td>
                                                <td>{{ $item->agent }}</td>


                                                <td>
                                <span class="label label-danger">
                                    {{ $item->status }}
                                </span>
                                                </td>
                                                <td>{{ date('d-m-Y g:i a', strtotime($item->query_time)) }}</td>
                                            </tr>
                                        @endforeach()
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END FEATURED DATATABLE -->

                        </div>
                        <div class="tab-pane fade" id="tabitem4">

                            <!-- FEATURED DATATABLE -->
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <ul class="bread"
                                                style="
                                            background-color: inherit;
                                            padding-left: 0;
                                            padding-right: 0;"
                                            >

                                                <form class="date_form_container" method="POST" action="{{ route('clampedRange') }}">
                                                    @csrf
                                                    <div class="input-daterange input-group" data-provide="datepicker">
                                                        <input type="text" class="input-sm form-control" name="fromDate" placeholder="Search From">
                                                        <span class="input-group-addon"><i class="i ti-calendar"></i></span>
                                                        <input type="text" class="input-sm form-control" name="toDate" placeholder="Search To">
                                                    </div>
                                                    <span><button type="submit" class="btn btn-sm btn-success">
                                       <i class="fa fa-filter"></i>Filter</button></span>
                                                </form>

                                            </ul>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    <table id="example3" class="table table-striped table-hover">
                                        <thead>
                                        <tr>

                                            <th>Reg. No.</th>
                                            <th>Vehicle Zone</th>
                                            <th>Street</th>
                                            <th>Duration</th>
                                            <th>Agent</th>
                                            <th>Padlock No.</th>
                                            <th>Status</th>
                                            <th>Day/Time</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($clamped->response_data as $key=>$item)
                                            <tr>

                                                <td>{{ $item->vehicle_reg_no }}</td>
                                                <td>{{ $item->zone_code }}</td>
                                                <td>{{ $item->street }}</td>
                                                <td>{{ $item->duration_code }}</td>
                                                <td>{{ $item->agent }}</td>
                                                <td>{{ $item->padlock_no }}</td>

                                                <td>
                                <span class="label label-danger">
                                    {{ $item->status }}
                                </span>
                                                </td>
                                                <td>{{ date('d-m-Y g:i a', strtotime($item->query_time)) }}</td>
                                            </tr>
                                        @endforeach()
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END FEATURED DATATABLE -->

                        </div>
                        <div class="tab-pane fade" id="tabitem5">

                            <!-- FEATURED DATATABLE -->
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <ul class="bread"
                                                style="
                                            background-color: inherit;
                                            padding-left: 0;
                                            padding-right: 0;"
                                            >

                                                <form class="date_form_container" method="POST" action="{{ route('unclampRange') }}">
                                                    @csrf
                                                    <div class="input-daterange input-group" data-provide="datepicker">
                                                        <input type="text" class="input-sm form-control" name="fromDate" placeholder="Search From">
                                                        <span class="input-group-addon"><i class="i ti-calendar"></i></span>
                                                        <input type="text" class="input-sm form-control" name="toDate" placeholder="Search To">
                                                    </div>
                                                    <span><button type="submit" class="btn btn-sm btn-success">
                                       <i class="fa fa-filter"></i>Filter</button></span>
                                                </form>

                                            </ul>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    <table id="example4" class="table table-striped table-hover">
                                        <thead>
                                        <tr>

                                            <th>Reg. No.</th>
                                            <th>Vehicle Zone</th>
                                            <th>Street</th>
                                            <th>Duration</th>
                                            <th>Amount Paid</th>
                                            <th>Agent </th>
                                            <th>Padlock No.</th>
                                            <th>Status</th>
                                            <th>Day/Time</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($due_unclamped->response_data as $key=>$item)
                                            <tr>

                                                <td>{{ $item->vehicle_reg_no }}</td>
                                                <td>{{ $item->zone_code }}</td>
                                                <td>{{ $item->street }}</td>
                                                <td>{{ $item->duration_code }}</td>
                                                <td>{{ number_format($item->amount_paid ,2)}}</td>
                                                <td>{{ $item->agent }}</td>
                                                <td>{{ $item->padlock_no }}</td>
                                                <td>
                                <span class="label label-success">
                                    {{ $item->status }}
                                </span>
                                                </td>
                                                <td>{{ date('d-m-Y g:i a', strtotime($item->query_time)) }}</td>
                                            </tr>
                                        @endforeach()
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END FEATURED DATATABLE -->

                        </div>
                        <div class="tab-pane fade" id="tabitem6">
                            <!-- FEATURED DATATABLE -->
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <ul class="bread"
                                                style="
                                            background-color: inherit;
                                            padding-left: 0;
                                            padding-right: 0;"
                                            >
                                                <form class="date_form_container" method="POST" action="{{ route('unclampedRange') }}">
                                                    @csrf
                                                    <div class="input-daterange input-group" data-provide="datepicker">
                                                        <input type="text" class="input-sm form-control" name="fromDate" placeholder="Search From">
                                                        <span class="input-group-addon"><i class="i ti-calendar"></i></span>
                                                        <input type="text" class="input-sm form-control" name="toDate" placeholder="Search To">
                                                    </div>
                                                    <span><button type="submit" class="btn btn-sm btn-success">
                                       <i class="fa fa-filter"></i>Filter</button></span>
                                                </form>

                                            </ul>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    <table id="example8" class="table table-striped table-hover">
                                        <thead>
                                        <tr>

                                            <th>Registration Number</th>
                                            <th>Vehicle Zone</th>
                                            <th>Street</th>
                                            <th>Duration</th>
                                            <th>Amount Paid</th>
                                            <th>Agent</th>
                                            <th>Padlock No.</th>

                                            <th>Status</th>
                                            <th>Day/Time</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($unclamped->response_data as $key=>$item)
                                            <tr>

                                                <td>{{ $item->vehicle_reg_no }}</td>
                                                <td>{{ $item->zone_code }}</td>
                                                <td>{{ $item->street }}</td>
                                                <td>{{ $item->duration_code }}</td>
                                                <td>{{number_format($item->amount_paid,2)  }}</td>
                                                <td>{{ $item->agent }}</td>
                                                <td>{{ $item->padlock_no }}</td>

                                                <td>
                                <span class="label label-success">
                                    {{ $item->status }}
                                </span>
                                                </td>
                                                <td>{{ date('d-m-Y g:i a', strtotime($item->query_time)) }}</td>
                                            </tr>
                                        @endforeach()
                                        </tbody>
                                    </table>
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
