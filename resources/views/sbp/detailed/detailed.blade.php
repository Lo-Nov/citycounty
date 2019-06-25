@extends('layouts.app')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Detaileds</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home2">
                                    <form action="{{ route('sbpdetails') }}" method="POST">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-2">
                                                <div class="dropdown"><span>Sub County</span>
                                                    <select class="form-control select-basic" name="subcounties" id="countries">
                                                        <option value="ALL">Select Sub County</option>
                                                        @foreach($detailsCollections->sub_counties as $key=>$value )
                                                            <option >{{ $value }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>
                                            <div class="col-md-2">
                                                <div class="dropdown">
                                                    <span>Wards</span>
                                                    <select class="form-control select-basic" name="ward" id="countries">
                                                        <option value="ALL">Select Ward</option>
                                                        @foreach($detailsCollections->wards as $key=>$value )
                                                            <option>{{ $value }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="dropdown">
                                                    <span>Approver</span>
                                                    <select class="form-control select-basic" name="approver" id="countries">
                                                        <option value=0>Select Approver</option>
                                                        @foreach($detailsCollections->approval_agents as $key=>$value )

                                                            <option value="{{ $value->user_id }}">{{ $value->username }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-2">
                                                <div class="dropdown">
                                                    <span>Inspector</span>
                                                    <select class="form-control select-basic" name="inspector" id="countries">
                                                        <option value=0>Select Inspector</option>
                                                        @foreach($detailsCollections->inspection_agents as $key=>$value )

                                                            <option value="{{ $value->user_id }}">{{ $value->username }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>

                                            <div class="col-md-3">
                                                <ul class="bread">
                                                    <span> Select Date</span>
                                                    <div class="input-daterange input-group" data-provide="datepicker">
                                                        <input type="text" class="input-sm form-control" name="fromDate" placeholder="Search From">
                                                        <span class="input-group-addon"><i class="i ti-calendar"></i></span>
                                                        <input type="text" class="input-sm form-control" name="toDate" placeholder="Search To">
                                                    </div>

                                                </ul>

                                            </div>
                                            <div class="col-md-1">
                                                <span style="color: transparent"> Date</span>
                                                <button type="submit" class="btn btn-sm btn-success pull-right">
                                                    <i class="fa fa-filter"></i>Search
                                                </button>
                                            </div>
                                        </div>
                                        <span>

                                        </span>
                                    </form>
                                    <table id="customers2" class="table datatable">
                                        <thead>
                                        <tr>
                                            <th>Business Name</th>
                                            <th>Sub County</th>
                                            <th>Ward</th>
                                            <th>Date Applied</th>
                                            <th>Business Status</th>
                                            <th>More</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($detailsCollections->sbp_detailed_report as $inspect)
                                            <tr>
                                                <td> <a href="#">{{ $inspect->business_name }}</a> </td>
                                                <td>{{ $inspect->subcounty }}</td>
                                                <td>{{ $inspect->ward }}</td>
                                                <td> {{  date('d-m-Y g:i a', strtotime($inspect->date_applied))}}</td>
                                                <td>
                                                    <span class="label label-success">
                                                        {{ $inspect->processing_status }}
                                                    </span>
                                                </td>



                                                <td>
                                                    <a class="btn btn-info btn-xs" role="button" data-toggle="modal"
                                                       data-target="#modal-delete-{{ $inspect->business_id }}"><i class="fa fa-eye"></i>
                                                        View</a>
                                                </td>
                                                <div class="modal fade" id="modal-delete-{{ $inspect->business_id }}" tabIndex="-1">

                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">{{ $inspect->business_name }}</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h4>Business</h4>
                                                                        <p><strong>Business Id:</strong>{{ $inspect->business_id }}</p>
                                                                        <p><strong>Inspected by :</strong> {{ $inspect->inspected_by }}</p>
                                                                        <p><strong>Approved by :</strong> {{ $inspect->approved_by }}</p>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h4>Address</h4>
                                                                        <p><strong> Email: </strong>{{ $inspect->business_email }}</p>
                                                                        <p> <strong>Phone:</strong> {{ $inspect->mobile_number }}</p>
                                                                        <p><strong>Ward:</strong> {{ $inspect->ward }}</p>
                                                                        <p><strong>Zone:</strong>{{ $inspect->zone }}</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h4>Inspection Comment</h4>
                                                                        <p>{{ $inspect->inspection_comment }}</p>


                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h4>Approval Comment</h4>
                                                                        <p>{{ $inspect->approval_comment }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        Date Applied: {{date('d-m-Y', strtotime($inspect->date_applied)) }}
                                                                    </div>
                                                                    <div class="col-md-4">

                                                                    </div>
                                                                    <div class="col-md-4">         Approval Date: {{date('d-m-Y', strtotime($inspect->approval_date)) }}</div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END TABS WITH ICONS -->
                        </div>
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