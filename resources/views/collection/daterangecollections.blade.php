<!doctype html>
<html lang="en">
<title>Collections</title>
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
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tabitem1">

                            <!-- FEATURED DATATABLE -->
                            <div class="panel">
                                <div class="panel-body">
                                    <form action="{{ route('detailed') }}" method="POST">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-2">
                                                <div class="dropdown"><span>Sub County</span>
                                                    <select class="form-control" name="subcounties" id="countries">
                                                        <option value="ALL">Select Sub County</option>
                                                        @foreach($dateDetailCollections->subcounties as $key=>$value )
                                                            <option >{{ $value }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>
                                            <div class="col-md-2">
                                                <div class="dropdown">
                                                    <span>Zones</span>
                                                    <select class="form-control" name="zones" id="countries">
                                                        <option value="ALL">Select Zone</option>
                                                        @foreach($dateDetailCollections->zones as $key=>$value )
                                                            <option>{{ $value }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="dropdown">
                                                    <span>Attendant</span>
                                                    <select class="form-control" name="agents" id="countries">
                                                        <option value=0>Select Attendant</option>
                                                        @foreach($dateDetailCollections->agents as $key=>$value )

                                                            <option >{{ $value->username }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>
                                            <div class="col-md-2">
                                                <div class="dropdown">
                                                    <span>Streets</span>
                                                    <select class="form-control" name="streets" id="countries">
                                                        <option value="ALL">Select Street</option>
                                                        @foreach($dateDetailCollections->streets as $key=>$value )
                                                            <option>{{ $value }}</option>
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
                                    </ul>
                                </div>

                                <br><br>



                                <table id="example" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Registration Number</th>
                                        <th>Sub County</th>
                                        <th>Zone</th>
                                        <th>Vehicle Street</th>
                                        <th>Agent Name</th>
                                        <th>Status</th>
                                        <th>Date Queried</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($dateDetailCollections->total_queries_list as $key=> $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td> <a href="#">{{ $item->vehicle_registration_no }}</a></td>
                                            <td>
                                                {{ $item->constituency }}
                                            </td>
                                            <td>{{ $item->zone_code }}</td>
                                            <td>
                                                {{ $item->street }}
                                            </td>
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
                        <!-- END FEATURED DATATABLE -->

                    </div>
                    tabb
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
