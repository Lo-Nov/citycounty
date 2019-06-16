<!doctype html>
<html lang="en">
<title>QUERIED VEHICLES</title>
<!-- Mirrored from demo.thedevelovers.com/dashboard/klorofilpro-v1.6/html/dashboard2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 17:23:47 GMT -->
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
                    <h1 class="page-title">ENFORCEMENT VEHICLE QUERIES </h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">Vehicle status</a></li>
                    <li class="active">Queries</li>
                </ul>
            </div>
            <!-- FEATURED DATATABLE -->
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <ul class="bread"
                                style="
                                            background-color: inherit;
                                            padding-left: 0;
                                            padding-right: 0;"
                            >

                                <form class="date_form_container" method="POST" action="{{ route('qRange') }}">
                                    @csrf
                                    <div class="input-daterange input-group" data-provide="datepicker">
                                        <input type="text" class="input-sm form-control" name="fromDate" placeholder="Search From">
                                        <span class="input-group-addon"><i class="i ti-calendar"></i></span>
                                        <input type="text" class="input-sm form-control" name="toDate" placeholder="Search To">
                                    </div>
                                    <span><button type="submit" class="btn btn-sm btn-success">
                                       <i class="fa fa-filter"></i>Filter</button></span>
                                </form>

                            </ul>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
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
                        @foreach ($queried->total_queries_list as $key=> $item)
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

                    <br>

                    <?php
                    $pay =  $queried->pages;
                    for ($x = 1; $x <= $pay; $x++) {?>
                    <a href="{{route('querypages',$x)}}" class="btn btn-default btn-xs" role="button">{{ $x }} &raquo;</a>
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
