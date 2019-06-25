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
                                                <li class="active"><a href="#tab19" data-toggle="tab"><i class="fa fa-clock-o"></i> &nbsp; Hourly</a></li>
                                                <li><a href="#tab20" data-toggle="tab"><i class="fa fa-sun-o"></i>&nbsp;  Daily</a></li>
                                                <li><a href="#tab21" data-toggle="tab"><i class="fa fa-road"></i> &nbsp;Zones</a></li>
                                                <li><a href="#tab22" data-toggle="tab"><i class="fa fa-road"></i> Streets</a></li>
                                            </ul>
                                            <div class="panel-body tab-content">
                                                <div class="tab-pane active" id="tab19">
                                                    <table id="customers2" class="table datatable">
                                                        <thead>
                                                        <tr>
                                                            <th>Number</th>
                                                            <th>Attendant Name</th>
                                                            <th>Number of Queries</th>
                                                            <th>Date</th>
                                                            <th>Hour</th>
                                                            <th>View</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($hourly->total_queries_list as $key=> $item)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $item->agentName }}</td>
                                                                <td>{{ $item->number }}</td>
                                                                <td>{{ date('d-m-Y g:i a', strtotime($item->date)) }}</td>
                                                                <td>{{ $item->headerName }}</td>
                                                                <td>
                                                                    <a href="{{route('view',$item->headerName)}}" class="btn btn-info btn-xs" role="button">View more</a>
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
                                                            <th>Attendant Name</th>
                                                            <th>Number of Queries</th>
                                                            <th>Date</th>
                                                            <th>Hour</th>
                                                            <th>View</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($days->total_queries_list as $key=> $item1)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $item1->agentName }}</td>
                                                                <td>{{ $item1->number }}</td>
                                                                <td>{{ date('d-m-Y g:i a', strtotime($item1->date)) }}</td>
                                                                <td>{{ $item1->headerName }}</td>
                                                                <td>
                                                                    <a href="{{route('viewday',$item1->headerName)}}" class="btn btn-info btn-xs" role="button">View more</a>
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
                                                            <th>Attendant Name</th>
                                                            <th>Number of Queries</th>
                                                            <th>Date</th>
                                                            <th>Hour</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($zones->total_queries_list as $key=>$item)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $item->agentName }}</td>
                                                                <td>{{ $item->number }}</td>
                                                                <td>{{ date('d-m-Y g:i a', strtotime($item->date)) }}</td>
                                                                <td>
                                                                    <a href="{{route('viewzone',$item->headerName)}}" class="btn btn-info btn-xs" role="button">View more</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach()
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane" id="tab22">
                                                    <table id="customers2" class="table datatable">
                                                        <thead>
                                                        <tr>
                                                            <th>Number</th>
                                                            <th>Street</th>
                                                            <th>Number of Queries</th>
                                                            <th>Date</th>
                                                            <th>Attendant</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($streets->total_queries_list as $key=>$item)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $item->headerName }}</td>
                                                                <td>{{ $item->number }}</td>
                                                                <td>{{ date('d-m-Y g:i a', strtotime($item->date)) }}</td>
                                                                <td>{{ $item->agentName }} </td>
                                                                <td>
                                                                    <a href="{{route('viewstreet',$item->headerName)}}" class="btn btn-info btn-xs" role="button">View more</a>
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
@endsection