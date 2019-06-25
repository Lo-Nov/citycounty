@extends('layouts.app')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Vehicle Queries</h3>
                    </div>
                    <div class="panel-body">
                        <!-- PAGE CONTENT WRAPPER -->
                        <div class="page-content-wrap">

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- START DATATABLE EXPORT -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <!--  <h3 class="panel-title">Clamped </h3>-->
                                            <div class="form-group">

                                                <form class="date_form_container d-flex align-items-end" method="POST" action="{{ route('filterqueries') }}">
                                                    @csrf
                                                    <div class="col-md-2">
                                                        <label class="col-md-3 col-xs-12 control-label">Zones</label>
                                                        <div class="dropdown">
                                                            <select class="form-control" name="zones" id="countries">
                                                                <option value="ALL">Select Zone</option>
                                                                @foreach($queries->zones as $key=>$value )
                                                                    <option>{{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="dropdown">
                                                            <label class="col-md-3 col-xs-12 control-label">Attendant</label>
                                                            <select class="form-control" name="agents" id="countries">
                                                                <option value= 0 >Select Attendant</option>
                                                                @foreach($queries->agents as $key=>$value )
                                                                    <option value="{{ $value->user_id }}">{{ $value->username }}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>

                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="dropdown">
                                                            <label class="col-md-3 col-xs-12 control-label">Streets</label>
                                                            <select class="form-control" name="streets" id="countries">
                                                                <option value="ALL">Select Street</option>
                                                                @foreach($queries->streets as $key=>$value )
                                                                    <option>{{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 d-flex flex-column">
                                                        <label class="control-label p-0 m-0 ">Date range</label>
                                                            <ul class="panel-controls panel-controls-title">
                                                                <li class="d-flex">
                                                                    <label for="from" class="d-flex align-items-center m-0 mr-1"><i class="fa fa-calendar-o"></i> &nbsp; From</label>
                                                                    <input type="text" id="from" class="ml-1 mr-1 col-auto form-text form-control" name="fromDate" style="width: 110px">
                                                                    <label for="to" class="d-flex align-items-center m-0 mr-1"><i class="fa fa-calendar-o"></i> &nbsp; To</label>
                                                                    <input type="text" id="to" name="toDate" class=" form-text col-auto form-control ml-1 mr-1" style="width: 110px">
                                                                </li>
                                                            </ul>
                                                    </div>
                                                    <div class="col-md-2 push-down-0 m-0">
                                                        <div class="btn-group push-down-0">
                                                            <button class="btn  btn-primary" type="submit" ><i class="fa fa-search"></i> Search</button>
                                                        </div>
                                                    </div>
                                                </form>


                                            </div>


                                        </div>
                                        <div class="panel-body">
                                            <table id="customers2" class="table datatable">
                                                <thead>
                                                <tr>
                                                    <th>Number</th>
                                                    <th>Registration Number</th>
                                                    <th>Sub County</th>
                                                    <th>Zone</th>
                                                    <!-- <th>Vehicle Street</th> -->
                                                    <th>Agent Name</th>
                                                    <th>Status</th>
                                                    <th>Date Queried</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($queries->total_queries_list as $key=> $item)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td> <a href="#">{{ $item->vehicle_registration_no }}</a></td>
                                                        <td>
                                                            {{ $item->constituency }}
                                                        </td>
                                                        <td>{{ $item->zone_code }}</td>
                                                    <!-- <td>
                                                    {{ $item->street }}
                                                            </td> -->
                                                        <td>{{ $item->agent_name }}</td>


                                                        <td>
                                                            @if ($item->status_code=="UNPAID")
                                                                <span class="btn btn-xs btn-danger">
                                             {{ $item->status_code }}
                                        </span>
                                                            @elseif($item->status_code=="PAID")
                                                                <span class="btn btn-xs btn-success">
                                            {{$item->status_code }}
                                        </span>
                                                            @else
                                                                <span class="btn btn-xs btn-primary">
                                            {{$item->status_code }}
                                        </span>
                                                            @endif

                                                        </td>
                                                        <td>{{ date('d-m-Y g:i a', strtotime($item->last_modified)) }}</td>
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