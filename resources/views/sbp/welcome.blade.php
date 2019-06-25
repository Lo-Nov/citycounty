@extends('layouts.app')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <!-- START WIDGETS -->
        <div class="row">
            <div class="col-md-3">
            <!-- START WIDGET SLIDER -->
                <div class="widget widget-default widget-carousel">
                    <div class="owl-carousel" id="owl-example">
                        <div>
                            <div class="widget-title">
                               NEW APPLICATIONS</div>
                            <div class="widget-int"> {{ number_format($sbp[ 'sbp' ]->new_license_applications_count) }}</div>
                            <div class="widget-subtitle">New: <strong>{{ number_format($sbp[ 'sbp' ]->new_license_applications_count) }}</strong></div>
                        </div>

                        <div>
                            <div class="widget-title">
                                PROVISIONAL</div>
                            <div class="widget-int"> {{ number_format($sbp[ 'sbp' ]->new_provisional_licences_count) }}</div>
                            <div class="widget-subtitle">New: <strong>{{ number_format($sbp[ 'sbp' ]->new_provisional_licences_count) }}</strong></div>
                        </div>


                        <div>
                            <div class="widget-title">
                                APPROVED </div>
                            <div class="widget-int"> {{ number_format($sbp[ 'sbp' ]->new_approved_licenses_count) }}</div>
                            <div class="widget-subtitle">New: <strong>{{ number_format($sbp[ 'sbp' ]->new_approved_licenses_count) }}</strong></div>
                        </div>


                        <div>
                            <div class="widget-title">
                                DECLINED</div>
                            <div class="widget-int"> {{ number_format($sbp[ 'sbp' ]->declined_count) }}</div>
                            <div class="widget-subtitle">New: <strong>{{ number_format($sbp[ 'sbp' ]->declined_count) }}</strong></div>
                        </div>

                        <div>
                            <div class="widget-title">
                                RE-EVALUATION</div>
                            <div class="widget-int"> {{ number_format($sbp[ 'sbp' ]->reevaluation_count) }}</div>
                            <div class="widget-subtitle">New: <strong>{{ number_format($sbp[ 'sbp' ]->reevaluation_count) }}</strong></div>
                        </div>


                    </div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>
                <!-- END WIDGET SLIDER -->
            </div>
            <div class="col-md-3">

                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-default widget-item-icon" onclick="location.href='#';">
                    <div class="widget-item-left">
                        <span class="fa fa-money"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-title">Today Revenue</div>
                        <div class="widget-int num-count">{{ number_format($sbp[ 'sbp' ]->total_revenue,2) }}</div>
                        <div class="widget-subtitle">Leo</div>
                    </div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>
                <!-- END WIDGET MESSAGES -->

            </div>
            <div class="col-md-3">

                <!-- START WIDGET REGISTRED -->
                <div class="widget widget-default widget-item-icon" onclick="location.href='#';">
                    <div class="widget-item-left">
                        <span class="fa fa-money"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-title">Yesterday Revenue</div>
                        <div class="widget-int num-count">{{ number_format($sbp[ 'sbp' ]->total_revenue,2) }}</div>
                        <div class="widget-subtitle">Jana</div>
                    </div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>
                <!-- END WIDGET REGISTRED -->

            </div>
            <div class="col-md-3">

                <!-- START WIDGET CLOCK -->
                <div class="widget widget-info widget-padding-sm">
                    <div class="widget-big-int plugin-clock">00:00</div>
                    <div class="widget-subtitle plugin-date">Loading...</div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                    <div class="widget-buttons widget-c3">
                        <div class="col">
                            <a href="#"><span class="fa fa-clock-o"></span></a>
                        </div>
                        <div class="col">
                            <a href="#"><span class="fa fa-bell"></span></a>
                        </div>
                        <div class="col">
                            <a href="#"><span class="fa fa-calendar"></span></a>
                        </div>
                    </div>
                </div>
                <!-- END WIDGET CLOCK -->

            </div>
        </div>
        <!-- END WIDGETS -->

        <div class="row">
            <div class="col-md-4">

                <!-- START USERS ACTIVITY BLOCK -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title-box">
                            <h3>Revenue Collection </h3>
                            <span>Total revenue collected per stream</span>
                        </div>
                        <ul class="panel-controls" style="margin-top: 2px;">
                            <!--<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>-->
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body padding-0">
                        <div class="chart-holder" id="chartContainer" style="height: 200px;">
                            {!! $sbp['chart']->container() !!}
                        </div>
                    </div>
                </div>
                <!-- END USERS ACTIVITY BLOCK -->
            </div>
            <div class="col-md-4">

                <!-- START VISITORS BLOCK -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title-box">
                            <h3>Category revenue</h3>
                            <span>Daily category revenue</span>
                        </div>
                        <ul class="panel-controls" style="margin-top: 2px;">
                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body padding-0">
                        <div class="chart-holder" id="dashboard-donut-11" style="height: 200px;"></div>
                    </div>
                </div>
                <!-- END VISITORS BLOCK -->
            </div>
            <div class="col-md-4">
                <!-- START PROJECTS BLOCK -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title-box">
                            <h3>TOTAL EARNINGS</h3>
                            <br>
                        </div>
                        <ul class="panel-controls" style="margin-top: 2px;">
                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="50%">Revenue Stream</th>
                                    <th width="20%">Amount</th>
                                    <th width="30%">Counts</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><strong>Provisional</strong></td>
                                    <td><span class="label label-success">{{ number_format( $sbp[ 'sbp' ]->provisional_licences_revenue,2)  }}</span></td>
                                    <td>
                                        <div class="">
                                            <div class="label label-default"  style="width: 100%;"> {{ number_format($sbp[ 'sbp' ]->new_provisional_licences_count) }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Top ups</strong></td>
                                    <td><span class="label label-warning">{{ number_format( $sbp[ 'sbp' ]->declined_count,2)  }}</span></td>
                                    <td>
                                        <div class="">
                                            <div class="label label-info"  style="width: 100%;">coming soon</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Renewals</strong></td>
                                    <td><span class="label label-warning">{{ number_format($sbp[ 'sbp' ]->declined_count,2) }}</span></td>
                                    <td>
                                        <div class="">
                                            <div class="label label-info"  style="width: 100%;">coming soon</div>
                                        </div>
                                    </td>
                                </tr>



                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- END PROJECTS BLOCK -->

            </div>
        </div>

        <div class="row">
            <div class="col-md-8">

                <!-- START SALES BLOCK -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title-box">
                            <h3>Recent Receipts</h3>
                            <span>Recent business permit receipts </span>
                        </div>
                        <ul class="panel-controls panel-controls-title">
                            <li>
                                <div id="reportrange" class="dtrange">
                                    <span></span><b class="caret"></b>
                                </div>
                            </li>
                            <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
                        </ul>

                    </div>
                    <div class="panel-body">
                        <div class="row stacked">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <label>Receipts </label>
                                    <table id="customers2" class="table datatable">
                                        <thead>
                                        <tr>
                                            <th>Rcpt Number</th>
                                            <th>Payment Mode</th>
                                            <th>Amount Paid</th>
                                            <th>Date Paid</th>
                                            <th>Invoice No</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $total = isset($total) ? $total + $receipt->amount : 0;
                                        @endphp
                                        @foreach ($sbp['sbp']->ubp_receipts_list as $receipt)
                                            <tr>
                                                <td>{{ $receipt->receipt_no }}</td>
                                                <td> {{ $receipt->payment_mode }}</td>
                                                <td>{{ number_format($receipt->amount,2) }}
                                                    @php($total += $receipt->amount)
                                                </td>
                                                <td>{{ date('d-m-Y', strtotime($receipt->date)) }}</td>
                                                <td>{{ $receipt->invoice_no }}</td>
                                                <td>{{ $receipt->status }}</td>
                                                <td>{{ $receipt->link }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfooter>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align: right; color: black">Total : {{ number_format($total,2) }}</td>
                                            <td></td>

                                            <td></td>
                                        </tfooter>
                                    </table>
                                </div>
                                <!--<p><span class="fa fa-warning"></span> Data update in end of each hour. You can update it manual by pressign update button</p>-->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- END SALES BLOCK -->

            </div>
            <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-content">
                    <ul class="list-inline item-details">
                        <li><a href="http://themifycloud.com/downloads/janux-premium-responsive-bootstrap-admin-dashboard-template/">Admin templates</a></li>
                        <li><a href="http://themescloud.org">Bootstrap themes</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <!-- START DASHBOARD CHART -->
        <div class="chart-holder" id="dashboard-area-1" style="height: 200px;"></div>
        <div class="block-full-width">

        </div>
        <!-- END DASHBOARD CHART -->

    </div>
    <!-- END PAGE CONTENT WRAPPER -->
    <!-- START PLUGINS -->
    <script type="text/javascript" src="{{ asset('js/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/jquery/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <!-- END PLUGINS -->
    <!-- START THIS PAGE PLUGINS-->
    <script type='text/javascript' src='{{ asset('js/plugins/icheck/icheck.min.js') }}'></script>
    <script type="text/javascript" src="{{ asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/scrolltotop/scrolltopcontrol.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/morris/raphael-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/morris/morris.min.js') }}"></script>

    <script>
        /* Bar dashboard chart */
        Morris.Bar({
            element: 'dashboard-bar-1',
            data: [
                { y: 'Sunday', a: 75, b: 35, c: 45 },
                { y: 'Monday', a: 64, b: 26, c: 67 },
                { y: 'Tuesday', a: 78, b: 39, c: 54 },
                { y: 'Wednesday', a: 82, b: 34, c: 34 },
                { y: 'Thursday', a: 86, b: 39, c: 67 },
                { y: 'Friday', a: 94, b: 40, c: 34 },
                { y: 'Saturday', a: 96, b: 41, c: 23 }
            ],
            xkey: 'y',
            ykeys: ['a', 'b','c'],
            labels: ['Sunken', 'High Court','Country Bus'],
            barColors: ['#33414E', '#1caf9a','#fed91a'],
            gridTextSize: '10px',
            hideHover: true,
            resize: true,
            gridLineColor: '#E5E5E5'
        });

        /* Donut dashboard chart */
        Morris.Donut({
            element: 'dashboard-donut-1',
            data: [
                {label: "New", value: 2513},
                {label: "Provisional", value: 764},
                {label: "Renewals", value: 311}
            ],
            colors: ['#33414E', '#1caf9a', '#FEA223'],
            resize: true
        });
        /* END Donut dashboard chart */

        /* END Bar dashboard chart */
    </script>
    {!! $sbp['chart']->script() !!}
@endsection
