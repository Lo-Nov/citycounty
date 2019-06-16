<!doctype html>
<html lang="en">
<title>PAID VEHICLES</title>

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
                    <h1 class="page-title">PAID VEHICLES</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">Vehicle status</a></li>
                    <li class="active">Paid</li>
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

                                <form class="date_form_container" method="POST" action="{{ route('searchpaid') }}">
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
                            <th>Amount Paid</th>
                            <th>Payment Mode</th>
                            <th>Transaction No. </th>
                            <th>Status</th>
                            <th>Day/Time</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php
                            $total = isset($total) ? $total + $item->amountPaid : 0;
                        @endphp
                        @foreach ($paid->paginatedList as $key=>$item)
                            <tr>
                                <td>{{ strtoupper($item->vehicle_reg_no) }}</td>
                                <td>{{ $item->zone_code }}</td>
                                <td>{{ $item->street }}</td>
                                <td>{{ strtoupper($item->duration_code)  }}</td>
                                <td style="text-align: right">{{ number_format($item->amount_paid ,2)}}
                                    @php($total += $item->amount_paid)
                                </td>
                                <td>{{ $item->payment_mode }}</td>
                                <td>{{ $item->transaction_code }}</td>
                                <td> <p class="label label-success">{{ $item->status_code }}</p> </td>
                                <td>{{ date('d-m-Y g:i a', strtotime($item->query_data)) }}</td>

                            </tr>
                        @endforeach()
                        </tbody>


                        <tfooter>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;color:#000;">Total Amount: {{ number_format($total,2) }}</td>
                        </tfooter>
                    </table>
                    <br>

                    <?php
                    $pay =  $paid->pages;
                    for ($x = 1; $x <= $pay; $x++) {?>
                     <a href="{{route('pages',$x)}}" class="btn btn-default btn-xs" role="button">{{ $x }} &raquo;</a>
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
