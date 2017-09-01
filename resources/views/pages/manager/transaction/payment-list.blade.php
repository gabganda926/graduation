@extends('pages.manager.master')

@section('title','Payment - Transaction | i-Insure')

@section('transPayment','active')=

@section('body')

    <section class="content">
    <h2 style="text-align: center"> Welcome to <b style="color: orange;"> i-Insure </b><br/>
    <label><small>July 20, 2017 - Thursday</small></label><br/>
    <label><small>09:23:21 AM</small></label>
    </h2>
    <br/>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('/manager/transaction/payment-home') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('/manager/transaction/payment-home') }}"><i class="material-icons">home</i> Payment</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Payment List</a></li>
                    </ol>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/view-bill.png')}}" style="height: 50px; width: 50px;"> <b> Payments </b></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>OR No.</th>
                                        <th>Remittance Date/Time</th>
                                        <th>Policy No.</th>
                                        <th>Client</th>
                                        <th>Bank</th>
                                        <th>Check No.</th>
                                        <th>Check Voucher No.</th>
                                        <th>Amount Due</th>
                                        <th>Amount Paid</th>
                                        <th>Accounting Staff</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>OR-000001</td>
                                        <td>August 01, 2017 11:12AM</td>
                                        <td>2014-MCAR-00</td>
                                        <td>Rola, Ma. Gabriella Tan</td>
                                        <td>BDO Antipolo</td>
                                        <td>CHECK-00001</td>
                                        <td>CV-0000001</td>
                                        <td>Php 9,876.12</td>
                                        <td>Php 9,876.12</td>
                                        <td>Choi Minho</td>
                                        <td><button type="button" class="btn bg-orange waves-effect" onclick="window.open('{{ URL::asset('/pdf/payment-receipt') }}')" style="position: right;"  data-toggle="tooltip" data-placement="left" title="Generate Receipt">
                                            <i class="material-icons">picture_as_pdf</i><span style="font-size: 15px;"></span>
                                            </button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection