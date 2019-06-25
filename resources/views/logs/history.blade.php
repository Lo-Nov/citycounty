@extends('layouts.app')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Vehicle History</h3>
                    </div>
                    <div class="panel-body">
                        <!-- PAGE CONTENT WRAPPER -->
                        <div class="page-content-wrap">

                            <div class="row">
                                <div class="col-md-12">

                                    <!-- START DATATABLE EXPORT -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <ul class="panel-controls panel-controls-title">
                                                <li>
                                                    <div id="reportrange" class="dtrange">
                                                        <span></span><b class="caret"></b>
                                                    </div>
                                                </li>
                                                <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
                                            </ul>
                                            <div class="btn-group">
                                                <a href="{{ route('logs') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a> &nbsp;&nbsp;
                                                <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='img/icons/csv.png' width="24"/> CSV</a></li>
                                                    <li><a href="#" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='img/icons/txt.png' width="24"/> TXT</a></li>
                                                    <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"/> Word</a></li>
                                                    <li><a href="#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                                                    <li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='img/icons/pdf.png' width="24"/> PDF</a></li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="panel-body">
                                            <table id="customers2" class="table datatable">
                                                <thead>
                                                <tr>
                                                    <th>Number</th>
                                                    <th>Description</th>
                                                 <th>Action Time</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($plate->response_data as $key=> $item)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $item->description }}</td>
                                                   <td>{{ date('d-m-Y g:i a', strtotime($item->actionTime)) }}</td>
                                                    </tr>
                                                @endforeach()

                                                </tbody>
                                            </table>

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