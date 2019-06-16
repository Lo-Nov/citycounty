<!doctype html>
<html lang="en">
<title>Collections</title>
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
                    <h1 class="page-title"> Attendants status report</h1>
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
                        <li class="active"><a href="#tabitem1" data-toggle="tab">Vehivle Type<span class="badge"></span></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tabitem1">

                            <!-- FEATURED DATATABLE -->
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4">
                                            <ul class="bread"
                                                style="
                                            background-color: inherit;
                                            padding-left: 0;
                                            padding-right: 0;"
                                            >

                                                <form class="date_form_container" method="POST" action="{{ route('fVehicles') }}">
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

                                    <table id="example3" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Vehicle Type</th>
                                            <th>Collection</th>
                                        </tr>
                                        </thead>



                                        <tbody>
                                        @php
                                            $total = isset($total) ? $total + $item1->par2 : 0;
                                        @endphp
                                        @foreach ($vRange->collection_list as $key=> $item1)
                                            <tr>
                                                <td>{{ $key +1 }}</td>
                                                <td>{{ $item1->par1 }}</td>
                                                <td style="text-align: right">{{ number_format($item1->par2,2) }}
                                                    @php($total += $item1->par2)
                                                </td>
                                            </tr>
                                        @endforeach()
                                        </tbody>
                                    </table>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>

                                    <div class="col-md-3"></div>
                                    <div class="col-md-3 label label-default">
                                        <h4>Total Amount : {{ number_format($total,2) }}</h4>
                                    </div>
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
