@extends('layouts.app')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <!--   <div class="panel-heading">
                           <h3 class="panel-title">Panel Title</h3>
                       </div>-->
                    <div class="panel-body">
                        <!-- PAGE CONTENT WRAPPER -->
                        <div class="page-content-wrap">

                            <div class="row">
                                <div class="col-md-12">

                                    <!-- START DATATABLE EXPORT -->
                                    <!-- START VERTICAL TABS WITH HEADING -->
                                    <div class="panel panel-default nav-tabs-vertical">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Seasonal Parking</h3>
                                            <div class="row pull-right">
                                                <div class="col-md-12"><ul class="panel-controls panel-controls-title pull-left">
                                                        <li>
                                                            <div id="reportrange" class="dtrange">
                                                                <span class="exact-date">ozzay gnik</span><b class="caret"></b>

                                                            </div>
                                                        </li>
                                                        <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tabs">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab19" data-toggle="tab"><i class="fa fa-calendar-o"></i> Monthly</a></li>
                                                <li><a href="#tab20" data-toggle="tab"><i class="fa fa-calendar-o"></i> 3 Monthly</a></li>
                                                <li><a href="#tab21" data-toggle="tab"><i class="fa fa-calendar-o"></i> 6 Monthly</a></li>
                                            </ul>
                                            <div class="panel-body tab-content">
                                                <div class="tab-pane active" id="tab19">


                                                    <table id="customers2" class="table datatable">
                                                        <thead>
                                                        <tr>
                                                            <th>Number</th>
                                                            <th>Registration Number</th>
                                                            <th>Duration</th>
                                                            <th>Vehicle Type</th>
                                                            <th>Start Date</th>
                                                            <th>Amount</th>
                                                            <th>Transaction Code</th>
                                                            <th>Receipt Number</th>
                                                            <th>End Date</th>
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
                                                                <td>{{ $item->category }}</td>
                                                                <td>{{ date('d-m-Y g:i a', strtotime($item->time_of_first_query)) }}</td>
                                                                <td style="text-align: right">{{ number_format($item->amount,2) }}
                                                                    <?php
                                                                    $total += $item->amount
                                                                    ?>
                                                                </td>
                                                                <td>{{ $item->mpesa_transaction_code }}</td>
                                                                <td>{{ $item->receipt_no }}</td>
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
                                                <div class="tab-pane" id="tab20">
                                                    <table id="customers2" class="table datatable">
                                                        <thead>
                                                        <tr>
                                                            <th>Number</th>
                                                            <th>Registration Number</th>
                                                            <th>Duration</th>
                                                            <th>Vehicle Type</th>
                                                            <th>Start Date </th>
                                                            <th>Amount</th>
                                                            <th>Transaction Code</th>
                                                            <th>Receipt Number</th>
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
                                                                <td>{{ $item->category }}</td>
                                                                <td>{{ date('d-m-Y g:i a', strtotime($item->time_of_first_query)) }}</td>
                                                                <td style="text-align: right">{{ number_format($item->amount,2) }}
                                                                    <?php
                                                                    $total += $item->amount
                                                                    ?>
                                                                </td>
                                                                <td>{{ $item->mpesa_transaction_code }}</td>
                                                                <td>{{ $item->receipt_no }}</td>
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
                                                <div class="tab-pane" id="tab21">
                                                    <table id="customers2" class="table datatable">
                                                        <thead>
                                                        <tr>
                                                            <th>Number</th>
                                                            <th>Registration Number</th>
                                                            <th>Duration</th>
                                                            <th>Vehicle Type</th>
                                                            <th>Start Date </th>
                                                            <th>Amount</th>
                                                            <th>Transaction Code</th>
                                                            <th>Receipt Number</th>
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
                                                                <td>{{ $item->category }}</td>
                                                                <td>{{ date('d-m-Y g:i a', strtotime($item->time_of_first_query)) }}</td>
                                                                <td style="text-align: right">{{ number_format($item->amount,2) }}
                                                                    <?php
                                                                    $total += $item->amount
                                                                    ?>
                                                                </td>
                                                                <td>{{ $item->mpesa_transaction_code }}</td>
                                                                <td>{{ $item->receipt_no }}</td>
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
                                        </div>
                                    </div>
                                    <!-- END VERTICAL TABS WITH HEADING -->
                                    <!-- END DATATABLE EXPORT -->

                                </div>
                            </div>

                        </div>
                        <!-- END PAGE CONTENT WRAPPER -->
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->
    <!--<script src="https://code.jquery.com/jquery-3.4.1.min.js"  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>-->
    <!--<script>

        $( document ).ready(function() {
            var reportdate=$("span.exact-date").text();
            alert(reportdate);
        });
    </script>-->
@endsection