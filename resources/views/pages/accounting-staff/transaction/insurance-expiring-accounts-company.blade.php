@extends('pages.accounting-staff.master')

@section('title','Insurance Accounts - Transaction | i-Insure')

@section('transIns','active')

@section('transInsComp', 'active')

@section('body')

    <section class="content">
    <button type="button" class="btn bg-teal waves-effect left" style="float: left; margin-left: 15px;" onclick="window.document.location='{{ URL::asset('admin/transaction/accounting-staff/insurance-company') }}';">
        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
    </button>
    <br/>
        <div class="container-fluid">
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h3> Expiring Accounts </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <label for="days">Show accounts that will expire before: </label>
                                        <select id = "days" name = "days" class="form-control show-tick">
                                            <option selected value = "" style = "display: none;">-- Select Number of Days --</option>
                                            <option value = "10">1-10 days</option>
                                            <option value = "15">15-19 days</option>
                                            <option value = "20">20-24 days</option>
                                            <option value = "25">25 days</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Image</th>
                                        <th>Contact Person</th>
                                        <th>Insurance Company</th>
                                        <th>SOI</th> <!-- START OF INSURANCE -->
                                        <th>EOI</th> <!-- END OF INSURANCE -->
                                        <th class="col-md-1">Days left</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>COMPANY NAME</td>
                                        <td><img src="{!! '/image/'.'default-image.png' !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></th>
                                        <td>Bukid, Gerald</td>
                                        <td>FPG Insurance</td>
                                        <td>Mar-15-2017</td>
                                        <td>Mar-15-2018</td>
                                        <td>5</td>
                                        <td><button type="button" class="btn bg-light-blue waves-effect" onclick="window.document.location='{{ URL::asset('admin/transaction/accounting-staff/insurance-details-company') }}';" data-toggle="tooltip" data-placement="left" title="View account details."><i class="material-icons">remove_red_eye</i>
                                                </button></td>
                                    </tr>
                                    <tr>
                                        <td>COMPANY NAME</td>
                                        <td><img src="{!! '/image/'.'default-image.png' !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></th>
                                        <td>Rola, Ma. Gabriella Tan</td>
                                        <td>FPG Insurance</td>
                                        <td>Mar-10-2016</td>
                                        <td>Mar-10-2017</td>
                                        <td>10</td>
                                        <td><button type="button" class="btn bg-light-blue waves-effect" onclick="window.document.location='{{ URL::asset('admin/transaction/accounting-staff/insurance-details-company') }}';" data-toggle="tooltip" data-placement="left" title="View account details."><i class="material-icons">remove_red_eye</i>
                                                </button></td>
                                    </tr>
                                    <tr>
                                        <td>COMPANY NAME</td>
                                        <td><img src="{!! '/image/'.'default-image.png' !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></th>
                                        <td>Avellaneda, Marynel</td>
                                        <td>Commonwealth Insurance</td>
                                        <td>Mar-01-2016</td>
                                        <td>Mar-01-2017</td>
                                        <td>20</td>
                                        <td><button type="button" class="btn bg-light-blue waves-effect" onclick="window.document.location='{{ URL::asset('admin/transaction/accounting-staff/insurance-details-company') }}';" data-toggle="tooltip" data-placement="left" title="View account details."><i class="material-icons">remove_red_eye</i>
                                                </button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
    </section>

@endsection
