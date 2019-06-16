<!doctype html>
<html lang="en">
    <title>Enforcement Team Dashboard</title>
    @include('partial.head');

    <body>
        <!-- WRAPPER -->
        <div id="wrapper">
            <!-- NAVBAR -->
            @include('partial.topnav');
            <!-- END NAVBAR -->
            <!-- LEFT SIDEBAR -->
            @include('partial.agentSidebar');
            <!-- END LEFT SIDEBAR -->
            <!-- MAIN -->
            <div class="main">
                <!-- MAIN CONTENT -->
                <div class="main-content">
                    <div class="content-heading">
                        <p>
                            <i class="fa fa-calendar"></i>&nbsp; Today's Date: <span id="date"></span>
                        </p>
                    </div>
                    <div class="container-fluid">
                        {{--
                        <div class="row">--}} {{--
                            <a href="{{ route('paid.index') }}" class="col-md-3">--}}
                                {{--<div class="stat-card">--}}
                                    {{--<h4>To be Unclamped</h4>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--<img src="assets/img/paid.svg" alt="">--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-9">--}}
                                            {{--<h1 style="color:#31C786;">0</h1>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}} {{--
                            <a href="#" class="col-md-3">--}}
                                {{--<div class="stat-card">--}}
                                    {{--<h4>Unclamped</h4>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--<img src="assets/img/paid_not_querried.svg" alt="">--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-9">--}}
                                            {{--<h1 style="color:#0271D8;">0</h1>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}} {{--
                            <a href="#" class="col-md-3">--}}
                                {{--<div class="stat-card">--}}
                                    {{--<h4>Vehicles to Clamp</h4>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--<img src="assets/img/to_be_clamped.svg" alt="">--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-9">--}}
                                            {{--<h1 style="color:#DE0000;">0</h1>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}} {{--
                            <a href="#" class="col-md-3">--}}
                                {{--<div class="stat-card">--}}
                                    {{--<h4>Clamped Vehicles</h4>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--<img src="assets/img/clamped.svg" alt="">--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-9">--}}
                                            {{--<h1 style="color:#F6C242;">0</h1>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}} {{--
                        </div>--}}
                        <div class="row margin-bottom-30">
                            <div class="col-md-6">
                                <div class="panel">
                                    <div class="panel-body">
                                        <h5>VEHICLES TO CLAMP </h5>
                                        <div class="table-responsive">
                                            <table id="example" class="table table-condensed table-tripped table-dark">
                                                <thead>
                                                    <tr>
                                                        <th>Registration Number</th>
                                                        <th>Zone</th>
                                                        <th>Street</th>
                                                        <th>Status</th>
                                                        <th>Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($clamp_list->vehicles_to_be_clumped_list as $unclamped)
                                                    <tr>
                                                        <td>
                                                            <a href=""></a>
                                                            <p class="product-name">{{ $unclamped->RegistrationNo }}
                                                            </p>
                                                        </td>
                                                        <td>{{ $unclamped->zone }}</td>
                                                        <td>{{ $unclamped->street }}</td>
                                                        <td>
                                                            <span class="label label-danger">{{ $unclamped->status }}</span>
                                                        </td>
                                                        <td>{{ date('Y-m-d g:i a', strtotime($unclamped->time_of_first_query)) }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <p class="margin-top-30"><a href="{{ route('unclamped.index') }}" class=""></i>read more >> </a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel">
                                    <div class="panel-body">
                                        <h5>VEHICLES CLAMPED</h5>
                                        <div class="table-responsive">
                                            <table id="example1" class="table table-condensed table-tripped table-dark">
                                                <thead>
                                                    <tr>
                                                        <th>Registration Number</th>
                                                        <th>Zone </th>
                                                        <th>Street</th>
                                                        <th>Status</th>
                                                        <th>Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($clamp_list->vehicles_clumped_list as $unclamped)
                                                    <tr>
                                                        <td>
                                                            <a href=""></a>
                                                            <p class="product-name">{{ $unclamped->RegistrationNo }}
                                                            </p>
                                                        </td>
                                                        <td>{{ $unclamped->zone }}</td>
                                                        <td>{{ $unclamped->street }}</td>
                                                        <td>
                                                            <span class="label label-danger">{{ $unclamped->status }}</span>
                                                        </td>
                                                        <td>{{ date('Y-m-d g:i a', strtotime($unclamped->time_of_first_query)) }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <p class="margin-top-30"><a href="{{ route('unclamped.index') }}">read more >> </a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel">
                                    <div class="panel-body">
                                        <h5> VEHICLES TO UNCLAMP </h5>
                                        <div class="table-responsive">
                                            <table id="example2" class="table table-condensed table-tripped table-dark">
                                                <thead>
                                                    <tr>
                                                        <th>Registration Number</th>
                                                        <th> Zone </th>
                                                        <th> Street</th>
                                                        <th> Status</th>
                                                        <th>Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($clamp_list->vehicles_to_be_unclumped_list as $unclamped)
                                                    <tr>
                                                        <td>
                                                            <a href=""></a>
                                                            <p class="product-name">{{ $unclamped->RegistrationNo }}
                                                            </p>
                                                        </td>
                                                        <td>{{ $unclamped->zone }}</td>
                                                        <td>{{ $unclamped->street }}</td>
                                                        <td>
                                                            <span class="label label-success">{{ $unclamped->status }}</span>
                                                        </td>
                                                        <td>{{ date('Y-m-d g:i a', strtotime($unclamped->time_of_first_query)) }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <p class="margin-top-30"><a href="{{ route('unclamped.index') }}" class=""></i>read more >> </a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel">
                                    <div class="panel-body">
                                        <h5>VEHICLES UNCLAMPED </h5>
                                        <div class="table-responsive">
                                            <table id="example3" class="table table-condensed table-tripped table-dark">
                                                <thead>
                                                    <tr>
                                                        <th>Registration Number</th>
                                                        <th>Zone </th>
                                                        <th>Street</th>
                                                        <th>Status</th>
                                                        <th>Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($clamp_list->vehicles_unclumped_list as $unclamped)
                                                    <tr>
                                                        <td>
                                                            <a href=""></a>
                                                            <p class="product-name">{{ $unclamped->RegistrationNo }}
                                                            </p>
                                                        </td>
                                                        <td>{{ $unclamped->zone }}</td>
                                                        <td>{{ $unclamped->street }}</td>
                                                        <td>
                                                            <span class="label label-success">
                                                {{ $unclamped->status }}
                                            </span>
                                                        </td>
                                                        <td>{{ date('Y-m-d g:i a', strtotime($unclamped->time_of_first_query)) }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <p class="margin-top-30"><a href="{{ route('unclamped.index') }}">read more >> </a></p>
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
        @include('partial.scripts');
        <script>
            var month_name = function(dt) {
                mlist = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                return mlist[dt.getMonth()];
            };
            n = new Date();
            y = n.getFullYear();
            m = n.getMonth() + 1;
            m = month_name(n);
            d = n.getDate();
            document.getElementById("date").innerHTML = d + " " + m + " " + y;
        </script>
