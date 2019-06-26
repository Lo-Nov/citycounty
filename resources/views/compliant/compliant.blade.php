@extends('layouts.app')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                   <div class="panel-heading">
                        <h3 class="panel-title">Compliant</h3>
                    </div>
                    <div class="panel-body">
                        <!-- PAGE CONTENT WRAPPER -->
                        <div class="page-content-wrap">

                            <div class="row">
                                <div class="col-md-12">

                                    <!-- START DATATABLE EXPORT -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <form class="date_form_container" method="POST" action="{{ route('filtercompliant') }}">
                                                @csrf
                                            <ul class="panel-controls panel-controls-title">
                                                <li class="row">
                                                    <div class="form-group d-flex">
														<label class="col-auto control-label" for="from"><i class="fa fa-calendar-o"></i> From</label>
                                                   		 <input type="text" id="from" name="fromDate" class="form-control float-left">
													</div>
                                                    <div class="ml-2 form-group d-flex">
														<label class="col-auto control-label" for="to"><i class="fa fa-calendar-o"></i> To</label>
                                                    	<input type="text" id="to" name="toDate" class="form-control">
													</div>
												</li>
                                                <li class="ml-2"><button class="btn btn-primary " type="submit" ><i class="fa fa-filter"></i> Filter</button></li>
                                            </ul>
                                            </form>
                                            <div class="btn-group">
                                                <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='img/icons/csv.png' width="24"/> CSV</a></li>
                                                    <li><a href="#" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='img/icons/txt.png' width="24"/> TXT</a></li>
                                                    <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"/> Word</a></li>
                                                    <li><a href="#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                                                    <li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='img/icons/pdf.png' width="24"/> PDF</a></li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="panel-body">
                                            <table id="customers2" class="table datatable">
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
                                                    $total = isset($total) ? $total + $item->amount_paid : 0;
                                                @endphp
                                                @foreach ($compliant->paginatedList as $key=>$item)
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


                                        </div>
                                    </div>
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
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            var dateFormat = "mm/dd/yy",
                from = $( "#from" )
                    .datepicker({
                        defaultDate: "+1w",
                        changeMonth: true,
                        numberOfMonths: 3
                    })
                    .on( "change", function() {
                        to.datepicker( "option", "minDate", getDate( this ) );
                    }),
                to = $( "#to" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 3
                })
                    .on( "change", function() {
                        from.datepicker( "option", "maxDate", getDate( this ) );
                    });

            function getDate( element ) {
                var date;
                try {
                    date = $.datepicker.parseDate( dateFormat, element.value );
                } catch( error ) {
                    date = null;
                }

                return date;
            }
        } );
    </script>
    <!--<script src="https://code.jquery.com/jquery-3.4.1.min.js"  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>-->
    <!--<script>

        $( document ).ready(function() {
            var reportdate=$("span.exact-date").text().split("-")
            var startDate = (reportdate[0])
            var endDate = (reportdate[1])

            console.log(startDate)
            console.log(endDate)

        });

        if($(".datepicker").length > 0){
            $(".datepicker").datepicker({format: 'yyyy-mm-dd'});
                $("#dp-2,#dp-3,#dp-4").datepicker();
                // Sample
        }
        if($(".datepicker").length > 0){
            $(".datepicker").datepicker({format: 'yyyy-mm-dd'});
            $("#dp-2,#dp-3,#dp-4").datepicker();
            // Sample
        }


    </script>-->
@endsection