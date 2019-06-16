<!doctype html>
<html lang="en">
<title>VEHICLES CLAMPED </title>
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
                    <h1 class="page-title"> CLAMPED VEHICLES</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">Vehicle status</a></li>
                    <li class="active">Clamped</li>
                </ul>
            </div>
            <!-- FEATURED DATATABLE -->
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="bread"
                                style="
                                            background-color: inherit;
                                            padding-left: 0;
                                            padding-right: 0;"
                            >

                                <form class="date_form_container" method="POST" action="{{ route('clampedRange') }}">
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
                        <div class="col-md-8">
                            <div class="col-md-10">
                                <input type="text" name="search" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <span><button class="btn btn-default"><i class="ti-search"></i> Search</button></span>
                            </div>
                        </div>
                    </div>
                    <table id="example" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Number</th>
                            <th>Registration Number</th>
                            <th>Vehicle Zone</th>
                            <th>Street</th>
                            <th>Classifications</th>
                            <th>Agent</th>
                            <th>Padlock No.</th>
                            <th>Status</th>
                            <th>Day/Time</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($clamped->paginatedList as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->vehicle_reg_no }}</td>
                                <td>{{ $item->zone_code }}</td>
                                <td>{{ $item->street }}</td>
                                <td>{{ $item->duration_code }}</td>
                                <td>{{ $item->agent }}</td>
                                <td>{{ $item->padlock_no }}</td>
                                <td>
                                <span class="label label-danger">
                                    {{ $item->status_code }}
                                </span>
                                </td>
                                <td>{{ date('d-m-Y g:i a', strtotime($item->query_data)) }}</td>
                            </tr>
                        @endforeach()
                        </tbody>
                    </table>
                    <br>

                    <?php
                    $pay =  $clamped->pages;
                    for ($x = 1; $x <= $pay; $x++) {?>
                    <a href="{{route('cpages',$x)}}" class="btn btn-default btn-xs" role="button">{{ $x }} &raquo;</a>
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
