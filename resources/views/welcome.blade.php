<!doctype html>
<html lang="en">

<head>
	<meta name="csrf_token" value="{{ csrf_token() }}">
	<title>Dashboard</title>
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
				<div class="main-content">

					<?php

					$queried = $clamp_list[ 'clamp_list' ]->paid;
					$qandp = $clamp_list[ 'clamp_list' ]->paid_but_not_querried;
					$sum = $queried + $qandp;

					$tVehicles = $sum + $clamp_list[ 'clamp_list' ]->unpaid_general;

					?>
					<div class="container-fluid">
						<div class="row colored-row">
							<div class="col-md-12">
								<div>
									<span class="selected-date col-6">
										<span class="mr-3 font-weight-bold pri-txt ">today:</span>
									<span id="date" class="text-capitalize"></span></span>
									
									<ul class="breadcrumb col-6">
										<form class="date_form_container" method="POST" action="{{ route('daterange') }}">
											@csrf
											<div class="input-daterange input-group" data-provide="datepicker">
												<input type="text" class="input-sm form-control" name="fromDate" placeholder="Search From">
												<span class="input-group-addon"><i class="i ti-calendar"></i></span>
												<input type="text" class="input-sm form-control" name="toDate" placeholder="Search To">
											</div>
											<span><button type="submit" class="btn btn-sm colored-buttons">
                                       <i class="fa fa-filter"></i>Filter</button></span>
										



										</form>

									</ul>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class=" colored-card animate pri-grad rad6 mb-3">
									<video autoplay class="_29k-0LRf vid-bg" poster="https://elements-assets.envato.com/static/free-video-dashboard-compressed.jpg" loop="" preload="true" __idm_id__="1057308673">
										<source src="../public/assets/img/free-video-dashboard-compressed.mp4" type="video/mp4">
									</video>
									<div class="blacker-bg"></div>
									<p class="text-uppercase mb-3 cell-tittle">overall</p>
									<div>
										<div class="numbers mb-3">
											<span class="value the-number">{{ $tVehicles }} </span>
											<div class="more-colored-info">
												<span class="additional-week text-capitalize opacity-white">All logged vehicles</span>
											</div>
										</div>
										<div class="numbers mb-3">
											<span class="the-number">{{$sum}}</span>
											<span class="additional-week text-capitalize opacity-white">total paid</span>
										</div>
										<div class="numbers mb-3">
											<span class="the-number">{{$clamp_list['clamp_list']->unpaid_general }}</span>
											<span class="additional-week text-capitalize opacity-white">total unpaid</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="colored-card animate pri-grad rad6 mb-3">
									<p class="text-uppercase mb-3 cell-tittle">total paid</p>
									<div class="numbers mb-3">
										<span class="value the-number">{{ $sum }} </span>
										<div class="more-colored-info">
											<span class="additional-week text-capitalize opacity-white">total paid</span>
										</div>
									</div>
									<div class="numbers mb-3">
										<span class="the-number">{{$clamp_list['clamp_list']->paid }}</span>
										<span class="additional-week text-capitalize opacity-white">queried</span>
									</div>
									<div class="numbers mb-3">
										<span class="the-number">{{$clamp_list['clamp_list']->paid_but_not_querried }}</span>
										<span class="additional-week text-capitalize opacity-white">not queried</span>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="colored-card animate sec-grad rad6 mb-3">
									<p class="text-uppercase mb-3 cell-tittle">enforcement</p>
									<div class="numbers mb-3">
										<span class="value the-number">{{ $clamp_list['clamp_list']->unpaid_general }} </span>
										<div class="more-colored-info">
											<span class="additional-week text-capitalize opacity-white">total unpaid</span>
										</div>
									</div>

									<div class="numbers mb-3">
										<span class="value the-number">{{ $clamp_list['clamp_list']->total_clumped }} </span>
										<div class="more-colored-info">
											<span class="additional-week text-capitalize opacity-white">clamped</span>
										</div>
									</div>
									<div class="numbers mb-3">
										<span class="value the-number">{{  $clamp_list['clamp_list']->unpaid }} </span>
										<div class="more-colored-info">
											<span class="additional-week text-capitalize opacity-white">to be clamped</span>
										</div>
									</div>

								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="colored-card animate pri-grad rad6 mb-3">
									<p class="text-uppercase mb-3 cell-tittle">vehicle queries</p>
									<div class="numbers mb-3">
										<span class="value the-number">{{ $clamp_list['clamp_list']->total_queries }} </span>
										<div class="more-colored-info">
											<span class="additional-week text-capitalize opacity-white">recorded  vehicles</span>
										</div>
									</div>

									
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-9">
								<div class="panel">
									<div class="panel-body">
										<h3 class="panel-title mb-3 font-weight-bold pri-txt" style="font-weight: 400;"><span id="date2"></span> Graphical Rates</h3>
										<br><br><br><br>
										<div id="chartContainer" style="height: 420px; width: 100%;">
											{!! $clamp_list['chart']->container() !!}
										</div>
									</div>
								</div>
							</div>
							{{--<div class="col-md-2"></div>--}}

							<div class="col-md-3">
								<div class="col-md-12">
									<div class="panel ">
										<div class="panel-heading">
											<h3 class="panel-title mb-3 font-weight-bold pri-txt">Total Parking Earnings</h3>
										</div>
										<div class="panel-body no-padding">
											<ul class="list-unstyled list-widget-vertical" id="last-campaign-metric">
												<li class="colored-card animate pri-grad rad6 mb-3 p-15px vid-bg">
													<video id="video" autoplay class="_29k-0LRf vid-bg" poster="https://elements-assets.envato.com/static/free-video-dashboard-compressed.jpg" loop="" preload="true" __idm_id__="1057308673">
														<source src="../public/assets/img/free-video-dashboard-compressed.mp4" type="video/mp4">
													</video>
													<div class="blacker-bg"></div>
													<div class="animate">

														<div class="right">
															<p class="title mb-3 cell-tittle justify-flex-flex-end">Total Earnings</p>
															<div class="numbers justify-flex-flex-end ">
																<div class="more-colored-info">
																	<span class="additional-week text-capitalize opacity-white">KES</span>
																</div>
																<span class="value the-number ml-3 title-24">{{number_format($clamp_list['clamp_list']->total_revenue,2)}}</span>
															</div>
														</div>
													</div>
												</li>
												<li class="colored-card animate rad6 mb-3 p-15px sec-grad">
													<div class="animate">
														<div class="right">
															<p class="title mb-3 cell-tittle justify-flex-flex-end">daily parking</p>
															<div class="numbers justify-flex-flex-end">
																<div class="more-colored-info">
																	<span class="additional-week text-capitalize opacity-white">KES</span>
																</div>
																<span class="value the-number ml-3 title-24">{{number_format(
                                                        $clamp_list['clamp_list']->parking_revenue,2)}}</span>

															</div>


														</div>
													</div>
												</li>
												<li class="colored-card animate rad6 mb-3 p-15px pri-grad">
													<div class="animate">
														<div class="right">
															<p class="title mb-3 cell-tittle justify-flex-flex-end">seasonal parking</p>
															<div class="numbers justify-flex-flex-end">
																<div class="more-colored-info">
																	<span class="additional-week text-capitalize opacity-white">KES</span>
																</div>
																<span class="value the-number ml-3 title-24">{{number_format(
                                                        $clamp_list['clamp_list']->seasonal_parking_revenue,2)}}</span>

															</div>


														</div>
													</div>
												</li>
												<li class="colored-card animate rad6 mb-3 p-15px sec-grad">
													<div class="animate">
														<div class="right">
															<p class="title mb-3 cell-tittle justify-flex-flex-end">clamping</p>
															<div class="numbers justify-flex-flex-end">
																<div class="more-colored-info">
																	<span class="additional-week text-capitalize opacity-white">KES</span>
																</div>
																<span class="value the-number ml-3 title-24">{{number_format(
                                                        $clamp_list['clamp_list']->clamping_revenue,2)}}</span>

															</div>


														</div>
													</div>													
												</li>
												<li class="colored-card animate rad6 mb-3 p-15px pri-grad">
													<div class="animate">
														<div class="right">
															<p class="title mb-3 cell-tittle justify-flex-flex-end">towing</p>
															<div class="numbers justify-flex-flex-end">
																<div class="more-colored-info">
																	<span class="additional-week text-capitalize opacity-white">KES</span>
																</div>
																<span class="value the-number ml-3 title-24">{{number_format(
                                                        $clamp_list['clamp_list']->towing_revenue,2)}}</span>

															</div>


														</div>
													</div>	
													
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							
								
							</div>
						</div>
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
			{!! $clamp_list['chart']->script() !!}
			<script>
				setInterval( function () {
					$( '#totalQueried' ).load( "{{$clamp_list['clamp_list']->total_queries }}" ).fadeIn( "slow" );
				}, 1000 );
				var month_name = function ( dt ) {
					mlist = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];
					return mlist[ dt.getMonth() ];
				};
				n = new Date();
				y = n.getFullYear();
				m = n.getMonth() + 1;
				m = month_name( n );
				d = n.getDate();
				document.getElementById( "date" ).innerHTML = d + " " + m + " " + y;
			</script>
			<script>
				
				setInterval( function () {
					$( '#totalQueried' ).load( "{{$clamp_list['clamp_list']->total_queries }}" ).fadeIn( "slow" );
				}, 1000 );
				var month_name = function ( dt ) {
					mlist = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];
					return mlist[ dt.getMonth() ];
				};
				n = new Date();
				y = n.getFullYear();
				m = n.getMonth() + 1;
				m = month_name( n );
				d = n.getDate();
				document.getElementById( "date1" ).innerHTML = d + " " + m + " " + y;
			</script>
			<script>
				setInterval( function () {
					$( '#totalQueried' ).load( "{{$clamp_list['clamp_list']->total_queries }}" ).fadeIn( "slow" );
				}, 1000 );
				var month_name = function ( dt ) {
					mlist = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];
					return mlist[ dt.getMonth() ];
				};
				n = new Date();
				y = n.getFullYear();
				m = n.getMonth() + 1;
				m = month_name( n );
				d = n.getDate();
				document.getElementById( "date2" ).innerHTML = d + " " + m + " " + y;
			</script>
			@include('partial.scripts');
	</body>

</html>