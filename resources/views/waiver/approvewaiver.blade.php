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
                    <h1 class="page-title">Requested Waiver</h1>
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
                        <li class="active"><a href="#tabitem1" data-toggle="tab">Vehicle awaiting waiver <span class="badge"></span></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tabitem1">

                            <!-- FEATURED DATATABLE -->
                            <div class="panel">
                                <div class="panel-body">
                                    <form action="{{ route('postWeiver') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Registration Number</label>
                                            <input type="text" class="form-control" name="registration_number" value="{{ $regNo }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Enforcer Remarks</label>
                                            <textarea class="form-control" rows="5" readonly>{{ $desc }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Approver's Decision</label>
                                            <select name="approval_decision" class="form-control" required>
                                                <option disabled selected hidden value="">---Select decision---</option>
                                                <option value="APPROVE">APPROVE</option>
                                                <option value="DENY">DENY</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="">Approver's Remarks</label>
                                            <textarea  class="form-control" name="unclamping_reason" rows=5 cols=50 maxlength=250 required ></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save Data</button>
                                    </form>
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
