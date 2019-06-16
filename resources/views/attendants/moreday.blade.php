<!doctype html>
<html lang="en">
<title>Attendats</title>
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

                    <!-- TABS WITH LABEL AND BADGE -->
                    <ul class="nav nav-tabs nav-tabs-right">
                        <li class="active"><a href="#tabitem1" data-toggle="tab">Daily Report<span class="badge"></span></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tabitem1">

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

                                                <form class="date_form_container" method="POST" action="{{ route('adminhourrange') }}">
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
                                            <th>Reg No.</th>
                                            <th>Street</th>
                                            <th>Agent</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>



                                        <tbody>
                                        @foreach ($moreDays->total_queries_list as $key=> $item)
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
                            <!-- END FEATURED DATATABLE -->

                        </div>
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
