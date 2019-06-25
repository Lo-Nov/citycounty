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
                                                <li class="active"><a href="#tab19" data-toggle="tab"><i class="fa fa-road"></i> &nbsp; Street</a></li>
                                                <li><a href="#tab20" data-toggle="tab"><i class="fa fa-space-shuttle"></i>&nbsp;  Zones</a></li>
                                                <li><a href="#tab21" data-toggle="tab"><i class="fa fa-car"></i> &nbsp; Vehicle Type</a></li>
                                                <!--<li><a href="#tab22" data-toggle="tab"><i class="fa fa-calendar-o"></i> 12 Monthly</a></li>-->
                                            </ul>
                                            <div class="panel-body tab-content">
                                                <div class="tab-pane active" id="tab19">
                                                    <table id="customers2" class="table datatable">
                                                        <thead>
                                                        <tr>
                                                            <th>Number</th>
                                                            <th>Street Name</th>
                                                            <th> Vehicle Count</th>
                                                            <th>Collection</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $total = 0;
                                                        ?>
                                                        @foreach ($cStreets->collection_list as $key=> $item)
                                                            <tr>
                                                                <td>{{ $key +1 }}</td>
                                                                <td>{{ $item->par1 }}</td>
                                                                <td>{{ number_format($item->par3) }}</td>
                                                                <td>{{ number_format($item->par2,2)  }}
                                                                    <?php
                                                                    $total += $item->par2
                                                                    ?>
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
                                                            <th>Zone Name</th>
                                                            <th>Vehicle Counts</th>
                                                            <th>Collection</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $total1 =  0;
                                                        ?>
                                                        @foreach ($cZones->collection_list as $key=> $item1)
                                                            <tr>
                                                                <td>{{ $key +1 }}</td>
                                                                <td>{{ $item1->par1 }}</td>
                                                                <td>{{ number_format($item1->par3 )}}</td>
                                                                <td>{{ number_format($item1->par2,2) }}
                                                                    <?php
                                                                    $total1 += $item1->par2
                                                                    ?>
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
                                                            <th>Vehicle Type</th>
                                                            <th>Vehicle Counts</th>
                                                            <th>Collection</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $total2 =  0;
                                                        ?>
                                                        @foreach ($cVehicles->collection_list as $key=> $item1)
                                                            <tr>
                                                                <td>{{ $key +1 }}</td>
                                                                <td>{{ $item1->par1 }}</td>
                                                                <td>{{ number_format($item1->par3) }}</td>
                                                                <td>{{ number_format($item1->par2,2) }}
                                                                    <?php
                                                                    $total2 += $item1->par2
                                                                    ?>
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