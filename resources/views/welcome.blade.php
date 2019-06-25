@extends('layouts.app')

@section('content')
	<!-- PAGE CONTENT WRAPPER -->
	<div class="page-content-wrap">

		<!-- START WIDGETS -->
		<div class="row">
			<div class="col-md-3">
            <?php

            $queried = $dashboard[ 'dashboard' ]->paid;
            $qandp = $dashboard[ 'dashboard' ]->paid_but_not_querried;
            $sum = $queried + $qandp;
            $tVehicles = $sum + $dashboard[ 'dashboard' ]->unpaid_general;
            ?>

			<!-- START WIDGET SLIDER -->
				<div class="widget widget-default widget-carousel">
					<div class="owl-carousel" id="owl-example">
						<div>
							<div class="widget-title">
								All Logged  Vehicles</div>
							<div class="widget-int"> {{ number_format($tVehicles) }}</div>
							<div class="widget-subtitle">Compliant Cars : <strong>{{ number_format($dashboard[ 'dashboard' ]->paid) }}</strong></div>
							<div class="widget-subtitle">Non Compliant: <strong>{{ number_format($dashboard[ 'dashboard' ]->unpaid_general) }}</strong></div>

						</div>
						<div>
							<div class="widget-title">Total paid Vehicles</div>
							<div class="widget-int">{{number_format($sum) }}</div>
							<div class="widget-subtitle">Queried : <strong>{{ number_format( $dashboard[ 'dashboard' ]->paid) }}</strong> </div>
							<div class="widget-subtitle">Not queried: <strong> {{ number_format($dashboard[ 'dashboard' ]->paid_but_not_querried) }}</strong> </div>

						</div>
						<div>
							<div class="widget-title">Enforcement</div>
							<div class="widget-int">{{ number_format($dashboard[ 'dashboard' ]->unpaid_general)  }}</div>
							<div class="widget-subtitle">Cars clamped : <strong>{{ number_format( $dashboard[ 'dashboard' ]->total_clumped) }}</strong> </div>
							<div class="widget-subtitle">Cars to clamp : <strong>{{ number_format( $dashboard[ 'dashboard' ]->unpaid) }}</strong> </div>

						</div>
						<div>
							<div class="widget-title">Car Queries</div>
							<div class="widget-int">{{ number_format($dashboard[ 'dashboard' ]->total_queries)  }}</div>
							<div class="widget-subtitle"></div>
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
						<div class="widget-int num-count">{{ number_format($dashboard[ 'dashboard' ]->total_revenue,2) }}</div>
						<div class="widget-subtitle">Today total revenue combined</div>
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
						<div class="widget-title">Off-Street revenue</div>
						<div class="widget-int num-count">{{ number_format($dashboard[ 'dashboard' ]->off_street_total_revenue,2) }}</div>
						<div class="widget-subtitle">Off street total revenue</div>
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
							{!! $dashboard['chart']->container() !!}
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
						<div class="chart-holder" id="dashboard-donut-1" style="height: 200px;"></div>
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
									<td><strong>On-Street (Daily Parking)</strong></td>
									<td><span class="label label-success">{{ number_format( $dashboard[ 'dashboard' ]->daily_parking_revenue,2)  }}</span></td>
									<td>
										<div class="">
											<div class="label label-default"  style="width: 100%;">coming soon</div>
										</div>
									</td>
								</tr>
								<tr>
									<td><strong>Off-Street (Sunken)</strong></td>
									<td><span class="label label-warning">{{ number_format($dashboard[ 'dashboard' ]->off_street,2) }}</span></td>
									<td>
										<div class="">
											<div class="label label-info"  style="width: 100%;">{{ number_format($dashboard['dashboard']->sunken_count) }}</div>
										</div>
									</td>
								</tr>
								<tr>
									<td><strong>Off-Street (High Court)</strong></td>
									<td><span class="label label-warning">{{ number_format($dashboard[ 'dashboard' ]->high_court_revenue,2) }}</span></td>
									<td>
										<div class="">
											<div class="label label-info"  style="width: 100%;">{{ number_format($dashboard['dashboard']->high_court_count) }}</div>
										</div>
									</td>
								</tr>
								<tr>
									<td><strong>Country Bus</strong></td>
									<td><span class="label label-warning">{{ number_format($dashboard[ 'dashboard' ]->country_bus_revenue,2) }}</span></td>
									<td>
										<div class="">
											<div class="label label-default"  style="width: 100%;">{{ number_format($dashboard['dashboard']->country_bus_count) }}</div>
										</div>
									</td>
								</tr>
								<tr>
									<td><strong>Seasonal (Private, PSV) </strong></td>
									<td><span class="label label-success">{{ number_format($dashboard[ 'dashboard' ]->seasonal_parking_revenue,2) }}</span></td>
									<td>
										<div class="">
											<div class="label label-default"  style="width: 100%;">coming soon</div>
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
							<h3>Car status at glance</h3>
							<span>Zones with high number of clamped and cars to be unclamped</span>
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
								<div class="col-md-6">
									<label>Zones with high number of cars to be clamped</label>
									<table id="customers2" class="table datatable">
										<thead>
										<tr>
											<th>Number</th>
											<th>Zone Name</th>
											<th>Vehicle Count</th>
										</tr>
										</thead>
										<tbody>
										@foreach ($dashboard[ 'dashboard' ]->street_to_be_clamped_data as $key=>$item)
											<tr>
												<td>{{ $key+1 }}</td>
												<td>{{ $item->street_name }}</td>
												<td>{{ $item->vehicles_count }}</td>
											</tr>
										@endforeach()

										</tbody>
									</table>
								</div>

								<div class="col-md-6">
									<label>Zones with high number of cars to be unclamped </label>
									<table id="customers2" class="table datatable">
										<thead>
										<tr>
											<th>Number</th>
											<th>Zone Name</th>
											<th>Vehicle Count</th>
										</tr>
										</thead>
										<tbody>
										@foreach ($dashboard[ 'dashboard' ]->street_to_be_unclamped_data as $key=>$item)
											<tr>
												<td>{{ $key+1 }}</td>
												<td>{{ $item->street_name }}</td>
												<td>{{ $item->vehicles_count }}</td>
											</tr>
										@endforeach()

										</tbody>
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

			<div class="col-md-4">

				<!-- START PROJECTS BLOCK -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title-box">
							<h3>NON COMPLIANT</h3>
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
									<td><strong>Clamping Fees</strong></td>
									<td><span class="label label-success">{{ number_format( $dashboard[ 'dashboard' ]->clamping_fee_revenue,2)  }}</span></td>
									<td>
										<div class="">
											<div class="label label-default"  style="width: 100%;">coming soon</div>
										</div>
									</td>
								</tr>
								<tr>
									<td><strong>Loading Zones Fees</strong></td>
									<td><span class="label label-warning">{{ number_format($dashboard[ 'dashboard' ]->loading_zones_fee_revenue,2) }}</span></td>
									<td>
										<div class="">
											<div class="label label-default"  style="width: 100%;">coming soon</div>
										</div>
									</td>
								</tr>
								<tr>
									<td><strong>Impounding TLB</strong></td>
									<td><span class="label label-warning">{{ number_format($dashboard[ 'dashboard' ]->impounding_fee_revenue,2) }}</span></td>
									<td>
										<div class="">
											<div class="label label-default"  style="width: 100%;">coming soon</div>
										</div>
									</td>
								</tr>
								<tr>
									<td><strong>Impounding  Car Park</strong></td>
									<td><span class="label label-success">{{ number_format($dashboard[ 'dashboard' ]->impounding_car_park_revenue,2) }}</span></td>
									<td>
										<div class="">
											<div class="label label-default"  style="width: 100%;">coming soon</div>
										</div>
									</td>
								</tr>
								<tr>
									<td><strong>Search Fees (PSV)</strong></td>
									<td><span class="label label-success">{{ number_format($dashboard[ 'dashboard' ]->search_fee_revenue,2) }}</span></td>
									<td>
										<div class="">
											<div class="label label-default"  style="width: 100%;">coming soon</div>
										</div>
									</td>
								</tr>

								<tr>
									<td><strong>Registration (PSV)</strong></td>
									<td><span class="label label-success">{{ number_format($dashboard[ 'dashboard' ]->registration_revenue,2) }}</span></td>
									<td>
										<div class="">
											<div class="label label-default"  style="width: 100%;">coming soon</div>
										</div>
									</td>
								</tr>

								<tr>
									<td><strong>Transfer Fee</strong></td>
									<td><span class="label label-success">{{ number_format($dashboard[ 'dashboard' ]->transfer_fee_revenue,2) }}</span></td>
									<td>
										<div class="">
											<div class="label label-default"  style="width: 100%;">coming soon</div>
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
            {label: "Private", value: 2513},
            {label: "PSV", value: 764},
            {label: "VIP", value: 311}
        ],
        colors: ['#33414E', '#1caf9a', '#FEA223'],
        resize: true
    });
    /* END Donut dashboard chart */

    /* END Bar dashboard chart */
</script>
	{!! $dashboard['chart']->script() !!}
@endsection
