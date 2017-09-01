@extends('pages.admin.master')

@section('title','Vehicle Make - Maintenance | i-Insure')

@section('queries','active')

@section('compIns','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                COMPLAINTS - INSURANCE COMPANY
                            </b></h2>
                        </div>
                        <div class="body">
                            <h2 align="center">List of Insurance with Most Complaints Reported</h2><br/>
                                <table class="table table-bordered table-striped dataTable js-basic-example animated lightSpeedIn active">
                                    <thead>
                                        <tr class="bg-teal">
                                            <th>Name of Insurance Company</th>
                                            <th class="col-md-2">Number of reports</th>
                                            <th class="col-md-1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                      <td>Commonwealth Insurance</td>
                                      <td>421</td>
                                      <td><button type="button" class="btn bg-light-blue waves-effect" data-toggle="modal" data-target="#largeModal">
                                                <i class="material-icons">remove_red_eye</i>
                                                <span>View</span>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->

    <!-- View INST MODAL-->
              <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInRight active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-view-list">
                            <h4><br/>LIST OF COMPLAINTS
                            </h4>
                        </div><br/>
                        </button>
                        <div class="modal-body">
                            <form id="vmodel_view" method="POST">
                              <table id = "view_list" class="table table-bordered table-striped table-hover dataTable js-basic-example">
                                <thead>
                                    <tr>
                                        <th>Complaint Number</th>
                                        <th>Complaint Title</th>
                                        <th>Date Sent</th>
                                        <th>Sender</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>COMP-018272</td>
                                        <td>Service is unacceptable</td>
                                        <td>May 09, 2016 (Thursday, 10:09PM)</td>
                                        <td>Rola, Ma. Gabriella Tan</td>
                                        <td><button type="button" class="btn bg-green waves-effect right" style="position: right;" onclick="window.document.location='/admin/transaction/adm/complaint-info';" data-toggle="tooltip" data-placement="bottom" title="View complaint details">
                                            <i class="material-icons">description</i><span style="font-size: 15px;"></span>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                                <br/><br/><br/>
                            </form>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# VIEW INST MODAL -->
@endsection
