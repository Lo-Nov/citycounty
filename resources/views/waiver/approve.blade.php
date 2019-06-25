@extends('layouts.app')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Vehicle  Hit Mapes</h3>
                    </div>
                    <div class="panel-body">
                        <!-- PAGE CONTENT WRAPPER -->
                        <div class="page-content-wrap">

                            <div class="row">
                                <div class="col-md-12">

                                    <!-- START DATATABLE EXPORT -->
                                    <div class="panel panel-default">
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
                                                            <form action="{{ route('postwaiver') }}" method="POST">
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