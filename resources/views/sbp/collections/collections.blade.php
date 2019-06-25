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
                                            <h3 class="panel-title">Business status</h3>
                                        </div>
                                        <div class="tabs">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab19" data-toggle="tab"><i class="fa fa-road"></i> &nbsp; Provisional</a></li>
                                                <li><a href="#tab20" data-toggle="tab"><i class="fa fa-space-shuttle"></i>&nbsp;  Inspected</a></li>
                                                <li><a href="#tab21" data-toggle="tab"><i class="fa fa-car"></i> &nbsp; Approved</a></li>
                                                <li><a href="#tab22" data-toggle="tab"><i class="fa fa-calendar-o"></i>Declined</a></li>
                                                <li><a href="#tab23" data-toggle="tab"><i class="fa fa-calendar-o"></i>Re-evaluated</a></li>

                                            </ul>
                                            <div class="panel-body tab-content">
                                                <div class="tab-pane active" id="tab19">
                                                    <table id="customers2" class="table datatable">
                                                        <thead>
                                                        <tr>
                                                            <th>Business Name</th>
                                                            <th>Business ID</th>
                                                            <th>Date Applied</th>
                                                            <th>Payment Mode</th>
                                                            <th>Amount</th>
                                                            <th>Sub County</th>
                                                            <th>Ward</th>
                                                            <th>Mobile</th>
                                                            <th>Email</th>
                                                            <th>More</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php
                                                            $total = isset($total) ? $total + $inspect->amount : 0;
                                                        @endphp
                                                        @foreach ($Provisional->ubpInspectionsList as $inspect)
                                                            <tr>
                                                                <td> <a href="#">{{ $inspect->business_name }}</a> </td>
                                                                <td> <a href="#">{{ $inspect->business_id }}</a> </td>
                                                                <td> {{  date('d-m-Y', strtotime($inspect->date_applied))}}</td>
                                                                <td>{{ $inspect->payment_mode }}</td>
                                                                <td style="text-align: right" >{{ number_format($inspect->amount,2) }}
                                                                    @php($total += $inspect->amount)</td>
                                                                <td>{{ $inspect->subcounty }}</td>
                                                                <td>{{ $inspect->ward }}</td>
                                                                <td>{{ $inspect->mobile_number }}</td>
                                                                <td>{{ $inspect->business_email }}</td>

                                                                <td><a class="btn btn-info btn-xs" role="button" data-toggle="modal" data-target="#modal-delete-{{ $inspect->business_id }}"><i class="fa fa-eye"></i> View</a></td>
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
                                                                                        <p>BUsiness Id {{ $inspect->business_id }}</p>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <h4>Address</h4>
                                                                                        <p> Email: {{ $inspect->business_email }}</p>
                                                                                        <p> Phone: {{ $inspect->mobile_number }}</p>
                                                                                        <p>Ward: {{ $inspect->ward }}</p>
                                                                                        <p>Zone: {{ $inspect->zone }}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <div class="row">
                                                                                    <div class="col-md-4">
                                                                                        Date Applied: {{ date('d-m-Y', strtotime($inspect->date_applied)) }}
                                                                                    </div>
                                                                                    <div class="col-md-4"></div>
                                                                                    <div class="col-md-4"> <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="ti-close"></i>Close</button></div>
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
                                                <div class="tab-pane" id="tab20">
                                                    <table id="customers2" class="table datatable">
                                                        <thead>
                                                        <tr>
                                                            <th>Number</th>
                                                            <th>Business Name</th>
                                                            <th>Location</th>
                                                            <th>Date Registered</th>
                                                            <th>View</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($Inspected->response_data as $key=>$inspect)
                                                            <tr>
                                                                <td>{{ $key +1 }}</td>
                                                                <td> <a href="#">{{ $inspect->business_name }}</a> </td>
                                                                <td>{{ $inspect->location }}</td>
                                                                <td> {{ date('d-m-Y g:i a', strtotime($inspect->date_registered )) }}</td>
                                                                <td>
                                                                    <a href="{{route('test',$inspect->business_id)}}" class="btn btn-info btn-xs" role="button"><i class="ti-check-box"></i> Check</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane" id="tab21">
                                                    <table id="customers2" class="table datatable">
                                                        <thead>
                                                        <tr>
                                                            <th>Business Name</th>
                                                            <th>Date Applied</th>
                                                            <th>Date Approved</th>
                                                            <th>Approved By</th>
                                                            <th>Comment</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($Approved->ubpInspectionsList as $inspect)
                                                            <tr>
                                                                <td> <a href="#">{{ $inspect->business_name }}</a> </td>
                                                                <td> {{ date('d-m-Y g:i a', strtotime($inspect->date_applied )) }}</td>
                                                                <td>{{ date('d-m-Y g:i a', strtotime($inspect->approval_date)) }}</td>
                                                                <td>{{ $inspect->approved_by }}</td>
                                                                <td>{{ $inspect->approval_comment }}</td>
                                                                <td>
																<span class="label label-success">
																	{{ $inspect->processing_status }}
																</span>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane" id="tab22">
                                                    <table id="customers2" class="table datatable">
                                                        <thead>
                                                        <tr>
                                                            <th>Business Name</th>
                                                            <th>Date Declined</th>
                                                            <th>Date Declined</th>
                                                            <th>Cleared By</th>
                                                            <th>Review Comment</th>
                                                            <th>Status</th>
                                                            <th>Download Invoice</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($Declined->ubpInspectionsList as $inspect)
                                                            <tr>
                                                                <td> <a href="#">{{ $inspect->business_name }}</a> </td>
                                                                <td> {{  date('d-m-Y g:i a', strtotime($inspect->date_applied))}}</td>
                                                                <td>{{ date('d-m-Y g:i a', strtotime($inspect->approval_date)) }}</td>
                                                                <td>{{ $inspect->approved_by }}</td>
                                                                <td>{{ $inspect->approval_comment }}</td>
                                                                <td>
                                                                <span class="label label-danger">
                                                                    {{ $inspect->processing_status }}
                                                                </span>
                                                                </td>
                                                                <td>
                                                                    <a data-toggle="tooltip" data-placement="top"
                                                                       title="Download Invoice that will be sent to the client"
                                                                       href="{{ URL::to('print/'.$inspect->id) }}"> <i class="fa fa-download" ></i>
                                                                        Invoice
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane" id="tab23">
                                                    <table id="customers2" class="table datatable">
                                                        <thead>
                                                        <tr>
                                                            <th>Business Name</th>
                                                            <th>Date Applied</th>
                                                            <th>Date Checked</th>
                                                            <th>Checked By</th>
                                                            <th>Comment</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($Re_evaluate->ubpInspectionsList as $inspect)
                                                            <tr>
                                                                <td> <a href="#">{{ $inspect->business_name }}</a> </td>
                                                                <td>{{ date('d-m-Y g i a', strtotime($inspect->date_applied)) }}</td>
                                                                <td>{{ date('d-m-Y g i a', strtotime($inspect->approval_date)) }}</td>
                                                                <td>{{ $inspect->approved_by }}</td>
                                                                <td>{{ $inspect->approval_comment }}</td>
                                                                <td>
																<span class="label label-success">
																	{{ $inspect->processing_status }}
																</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
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
@endsection