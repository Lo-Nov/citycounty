@extends('layouts.app')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
             <div class="panel-heading">
                             <h3 class="panel-title">Non-Compliant</h3>
                       </div>
                    <div class="panel-body">
                        <!-- PAGE CONTENT WRAPPER -->
                        <div class="page-content-wrap">

                            <div class="row">
                                <div class="col-md-12">

                                    <!-- START DATATABLE EXPORT -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <form class="date_form_container" method="POST" action="{{ route('filternoncompliant') }}">
                                                @csrf
                                                <ul class="panel-controls panel-controls-title">
                                                    <li>
                                                        <label for="from"><i class="fa fa-calendar-o"></i> From</label>
                                                        <input type="text" id="from" name="fromDate">
                                                        <label for="to"><i class="fa fa-calendar-o"></i> To</label>
                                                        <input type="text" id="to" name="toDate" class="">
                                                    </li>&nbsp;&nbsp;&nbsp;
                                                    <li><button class="" type="submit" ><i class="fa fa-filter"></i> Filter</button></li>
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
                                                    <th>Day/Time</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($noncompliant->paginatedList as $key=>$item)
                                                    <tr>
                                                        <td>{{ $item->vehicle_reg_no }}</td>
                                                        <td>{{ $item->zone_code }}</td>
                                                        <td>{{ $item->street }}</td>
                                                        <td>{{ date('d-m-Y g:i a', strtotime($item->query_data)) }}</td>
                                                    </tr>
                                                @endforeach()

                                                </tbody>
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
@endsection