@extends('layouts.app')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Approve</h3>
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
                                                <li class="active"><a href="#tabitem1" data-toggle="tab">Business waiting for approval <span class="badge"></span></a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="tabitem1">

                                                    <!-- FEATURED DATATABLE -->
                                                    <div class="panel">
                                                        <div class="panel-body">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">Inspection Details</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <table class="table md-3">

                                                                    <thead>
                                                                    <tr>
                                                                        <th>Inspection Activity</th>
                                                                        <th>Client's value</th>
                                                                        <th>Inspector's Value</th>

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach ($Collections1->checkList as $key=> $inspect)
                                                                        <tr>
                                                                            <td><strong >Key {{ $key+1 }} : </strong>{{ $inspect->key }}</td>
                                                                            <td>{{ $inspect->userValue}}</td>
                                                                            <td>{{ $inspect->agentValue}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>

                                                                </table>
                                                                <form action="{{ route('statechange') }}" method="post" class="">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <input type="hidden" readonly name="business_id" class="form-control" value="{{ $inspect->identifier }}">
                                                                        <h5>Change business status</h5>
                                                                        <select class="form-control" name="status">
                                                                            <option disabled selected hidden value="">---Select Status---</option>
                                                                            <option value="APPROVED">Approved</option>
                                                                            <option value="DECLINED">Declined</option>
                                                                            <option value="REEVALUATION">Sent for Re-evaluation</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" class="summernote">
                                                                        <label for="mobile_number">Comment:</label>
                                                                        <textarea class="form-control" name="comment" rows="5" data-provide="markdown">

                                            </textarea>
                                                                    </div>


                                                                    <button type="submit" class="btn btn-success pull-right"><i class="ti-save"></i> Update Status</button>
                                                                </form>
                                                            </div>
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