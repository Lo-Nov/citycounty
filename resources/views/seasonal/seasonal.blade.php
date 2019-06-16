<!doctype html>
<html lang="en">
<title>Seasonal Parking</title>
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
                    <h1 class="page-title"> Attendant Daily Status Report</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">attendants</a></li>
                    <li class="active">report</li>
                </ul>
            </div>
            <!-- FEATURED DATATABLE -->
            <div class="panel">
                <div class="panel-body">

                    <!-- TABS WITH LABEL AND BADGE -->
                    <ul class="nav nav-tabs nav-tabs-right">
                        <li class="active"><a href="#tabitem1" data-toggle="tab"><i class="ti-money"></i>Hourly<span class="badge"></span></a></li>
                        <li ><a href="#tabitem2" data-toggle="tab" > <i class="ti-list-ol"></i>Monthly<span class="badge element-bg-color-orange"></span></a></li>
                        <li ><a href="#tabitem3" data-toggle="tab"> <i class="ti-car"></i>  3 Months<span class="badge element-bg-color-orange"></span></a></li>
                        <li ><a href="#tabitem4" data-toggle="tab"> <i class="ti-car"></i>  6 Months<span class="badge element-bg-color-orange"></span></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tabitem1">

                            <!-- FEATURED DATATABLE -->
                            <div class="panel">
                                <div class="panel-body">
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-4"></div>--}}
                                        {{--<div class="col-md-4">--}}
                                            {{--<ul class="bread"--}}
                                                {{--style="--}}
                                            {{--background-color: inherit;--}}
                                            {{--padding-left: 0;--}}
                                            {{--padding-right: 0;"--}}
                                            {{-->--}}

                                                {{--<form class="date_form_container" method="POST" action="{{ route('cStreetrange') }}">--}}
                                                    {{--@csrf--}}
                                                    {{--<div class="input-daterange input-group" data-provide="datepicker">--}}
                                                        {{--<input type="text" class="input-sm form-control" name="fromDate" placeholder="Search From">--}}
                                                        {{--<span class="input-group-addon"><i class="i ti-calendar"></i></span>--}}
                                                        {{--<input type="text" class="input-sm form-control" name="toDate" placeholder="Search To">--}}
                                                    {{--</div>--}}
                                                    {{--<span><button type="submit" class="btn btn-sm btn-success">--}}
                                       {{--<i class="fa fa-filter"></i>Filter</button></span>--}}
                                                {{--</form>--}}

                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-4">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <table id="example1" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Registration Number</th>
                                            <th>Duration</th>
                                            <th>Date Paid</th>
                                            <th>Amount</th>
                                            <th>Expiry Date</th>
                                            <th>Agent </th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        $total = 0;
                                        ?>
                                        @foreach ($seasonalhourly->vehicle_list as $key=>$item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->RegistrationNo }}</td>
                                                <td>{{ $item->duration }}</td>
                                                <td>{{ date('d-m-Y g:i a', strtotime($item->time_of_first_query)) }}</td>
                                                <td style="text-align: right">{{ number_format($item->amount,2) }}
                                                    <?php
                                                    $total += $item->amount
                                                    ?>
                                                </td>
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
                                        <tfooter>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align: right; color: #000;">Total Amount : {{ number_format($total,2) }}</td>
                                        </tfooter>
                                    </table>
                                </div>
                            </div>
                            <!-- END FEATURED DATATABLE -->

                        </div>
                        <div class="tab-pane fade" id="tabitem2">

                            <!-- FEATURED DATATABLE -->
                            <div class="panel">
                                <div class="panel-body">
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-4">--}}

                                        {{--</div>--}}
                                        {{--<div class="col-md-4">--}}
                                            {{--<ul class="bread"--}}
                                                {{--style="--}}
                                            {{--background-color: inherit;--}}
                                            {{--padding-left: 0;--}}
                                            {{--padding-right: 0;"--}}
                                            {{-->--}}

                                                {{--<form class="date_form_container" method="POST" action="{{ route('cZonerange') }}">--}}
                                                    {{--@csrf--}}
                                                    {{--<div class="input-daterange input-group" data-provide="datepicker">--}}
                                                        {{--<input type="text" class="input-sm form-control" name="fromDate" placeholder="Search From">--}}
                                                        {{--<span class="input-group-addon"><i class="i ti-calendar"></i></span>--}}
                                                        {{--<input type="text" class="input-sm form-control" name="toDate" placeholder="Search To">--}}
                                                    {{--</div>--}}
                                                    {{--<span><button type="submit" class="btn btn-sm btn-success">--}}
                                       {{--<i class="fa fa-filter"></i>Filter</button></span>--}}
                                                {{--</form>--}}

                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-4"></div>--}}
                                    {{--</div>--}}
                                    <table id="example2" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Registration Number</th>
                                            <th>Duration</th>
                                            <th>Date Paid</th>
                                            <th>Amount</th>
                                            <th>Expiry Date</th>
                                            <th>Agent </th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        $total = 0;
                                        ?>
                                        @foreach ($seasonalmonthly->vehicle_list as $key=>$item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->RegistrationNo }}</td>
                                                <td>{{ $item->duration }}</td>
                                                <td>{{ date('d-m-Y g:i a', strtotime($item->time_of_first_query)) }}</td>
                                                <td style="text-align: right">{{ number_format($item->amount,2) }}
                                                    <?php
                                                    $total += $item->amount
                                                    ?>
                                                </td>
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
                                        <tfooter>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align: right; color: #000;">Total Amount : {{ number_format($total,2) }}</td>
                                        </tfooter>
                                    </table>
                                </div>
                            </div>
                            <!-- END FEATURED DATATABLE -->

                        </div>
                        <div class="tab-pane fade" id="tabitem3">

                            <!-- FEATURED DATATABLE -->
                            <div class="panel">
                                <div class="panel-body">
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-4">--}}

                                        {{--</div>--}}
                                        {{--<div class="col-md-4">--}}
                                            {{--<ul class="bread"--}}
                                                {{--style="--}}
                                            {{--background-color: inherit;--}}
                                            {{--padding-left: 0;--}}
                                            {{--padding-right: 0;"--}}
                                            {{-->--}}

                                                {{--<form class="date_form_container" method="POST" action="{{ route('fVehicles') }}">--}}
                                                    {{--@csrf--}}
                                                    {{--<div class="input-daterange input-group" data-provide="datepicker">--}}
                                                        {{--<input type="text" class="input-sm form-control" name="fromDate" placeholder="Search From">--}}
                                                        {{--<span class="input-group-addon"><i class="i ti-calendar"></i></span>--}}
                                                        {{--<input type="text" class="input-sm form-control" name="toDate" placeholder="Search To">--}}
                                                    {{--</div>--}}
                                                    {{--<span><button type="submit" class="btn btn-sm btn-success">--}}
                                       {{--<i class="fa fa-filter"></i>Filter</button></span>--}}
                                                {{--</form>--}}

                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-4"></div>--}}
                                    {{--</div>--}}
                                    <table id="example" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Registration Number</th>
                                            <th>Duration</th>
                                            <th>Date Paid</th>
                                            <th>Amount</th>
                                            <th>Expiry Date</th>
                                            <th>Agent </th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        $total = 0;
                                        ?>
                                        @foreach ($seasonalmonthly3->vehicle_list as $key=>$item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->RegistrationNo }}</td>
                                                <td>{{ $item->duration }}</td>
                                                <td>{{ date('d-m-Y g:i a', strtotime($item->time_of_first_query)) }}</td>
                                                <td style="text-align: right">{{ number_format($item->amount,2) }}
                                                    <?php
                                                    $total += $item->amount
                                                    ?>
                                                </td>
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
                                        <tfooter>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align: right; color: #000;">Total Amount : {{ number_format($total,2) }}</td>
                                        </tfooter>
                                    </table>
                                </div>
                            </div>
                            <!-- END FEATURED DATATABLE -->

                        </div>

                        <div class="tab-pane fade" id="tabitem4">

                            <!-- FEATURED DATATABLE -->
                            <div class="panel">
                                <div class="panel-body">
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-4">--}}

                                        {{--</div>--}}
                                        {{--<div class="col-md-4">--}}
                                            {{--<ul class="bread"--}}
                                                {{--style="--}}
                                            {{--background-color: inherit;--}}
                                            {{--padding-left: 0;--}}
                                            {{--padding-right: 0;"--}}
                                            {{-->--}}

                                                {{--<form class="date_form_container" method="POST" action="{{ route('fVehicles') }}">--}}
                                                    {{--@csrf--}}
                                                    {{--<div class="input-daterange input-group" data-provide="datepicker">--}}
                                                        {{--<input type="text" class="input-sm form-control" name="fromDate" placeholder="Search From">--}}
                                                        {{--<span class="input-group-addon"><i class="i ti-calendar"></i></span>--}}
                                                        {{--<input type="text" class="input-sm form-control" name="toDate" placeholder="Search To">--}}
                                                    {{--</div>--}}
                                                    {{--<span><button type="submit" class="btn btn-sm btn-success">--}}
                                       {{--<i class="fa fa-filter"></i>Filter</button></span>--}}
                                                {{--</form>--}}

                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-4"></div>--}}
                                    {{--</div>--}}
                                    <table id="example" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Registration Number</th>
                                            <th>Duration</th>
                                            <th>Date Paid</th>
                                            <th>Amount</th>
                                            <th>Expiry Date</th>
                                            <th>Agent </th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        $total = 0;
                                        ?>
                                        @foreach ($seasonalmonthly6->vehicle_list as $key=>$item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->RegistrationNo }}</td>
                                                <td>{{ $item->duration }}</td>
                                                <td>{{ date('d-m-Y g:i a', strtotime($item->time_of_first_query)) }}</td>
                                                <td style="text-align: right">{{ number_format($item->amount,2) }}
                                                    <?php
                                                    $total += $item->amount
                                                    ?>
                                                </td>
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
                                        <tfooter>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align: right; color: #000;">Total Amount : {{ number_format($total,2) }}</td>
                                        </tfooter>
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
