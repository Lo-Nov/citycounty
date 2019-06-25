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
                                            <h3 class="panel-title">Collection based on Streets, Zones and Vehicle Type</h3>
                                        </div>
                                        <div class="tabs">
                                            <ul class="nav nav-tabs">
                                                <li><a href="{{ route('byagent') }}" ><i class="fa fa-arrow-circle-o-left"></i>&nbsp;  Back</a></li>
                                                <li class="active"><a href="#tab19" data-toggle="tab"><i class="fa fa-road"></i> &nbsp; Hourly</a></li>
                                            </ul>
                                            <div class="panel-body tab-content">
                                                <div class="tab-pane active" id="tab19">
                                                    <table id="customers2" class="table datatable">
                                                        <thead>
                                                        <tr>
                                                            <th>Number</th>
                                                            <th>Reg No.</th>
                                                            <th>Street</th>
                                                            <th>Agent</th>
                                                            <th>Status</th>
                                                            <th>Date</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($moreStreets->total_queries_list as $key=> $item)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $item->vehicleRegNo }}</td>
                                                                <td>{{ $item->street }}</td>
                                                                <td>{{ $item->agentName }}</td>
                                                                <td>{{ $item->status }}</td>
                                                                <td>{{ date('d-m-Y g:i a', strtotime($item->date)) }}</td>

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
@endsection