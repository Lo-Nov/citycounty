<!doctype html>
<html lang="en">

    <head>
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
                        <div class="content-heading clearfix">
                            <div class="heading-left">
                                <h1 class="page-title">Financial Year: {{$Finance['Finance']->response_data[0]->FiscalYear }}</h1>

                            </div>
                            <ul class="breadcrumb">
                                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                <li><a href="#">Nairobi</a></li>
                                <li class="active">Portal</li>

                            </ul>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="stat-card">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <i class="ti-money" style="color: #31C786;"></i>
                                            </div>
                                            <div class="col-md-9">
                                                <h4>Budgeted Amount</h4>
                                                <h1 style="color: #31C786;">KES. {{  number_format($Finance['Finance']->response_data[0]->BudgetedAmount ,2)
                                                }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stat-card">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <i class="ti-calendar" style="color: #0271D8;"></i>
                                            </div>
                                            <div class="col-md-9">
                                                <h4>Actual Amount</h4>
                                                <h1 style="color: #0271D8;">KES. {{ number_format($Finance['Finance']->response_data[0]->ActualsToDate,2)
                                                 }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="stat-card">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="ti-calendar"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <h4>First Quarter</h4>
                                                <h3>KES. {{ number_format($Finance['Finance']->response_data[0]->FirstQuarter,2)
                                                 }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="stat-card">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="ti-calendar"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <h4>Second Quarter</h4>
                                                <h3>KES. {{ number_format($Finance['Finance']->response_data[0]->SecondQuarter ,2)

                                                }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="stat-card">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="ti-calendar"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <h4>Third Quarter</h4>
                                                <h3>KES. {{number_format
                                                ($Finance['Finance']->response_data[0]->ThirdQuarter ,2)}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="stat-card">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <i class="ti-calendar"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <h4>Fourth Quarter</h4>
                                                <h3>KES. {{number_format($Finance['Finance']->response_data[0]->FourthQuarter,2) }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <h5>MONTHLY COLLECTION  FOR :<b>{{ $Finance['Finance']->response_data[0]->AccountLevel2Description }}</b>  </h5>
                                            <div id="chartContainer" style="height: 440px; width: 100%;">
                                                {!! $Finance['chart']->container() !!}
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
            {!! $Finance['chart']->script() !!} @include('partial.scripts');
