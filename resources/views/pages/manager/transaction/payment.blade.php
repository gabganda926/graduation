@extends('pages.manager.master')

@section('title','Payment - Transaction| i-Insure')

@section('transPayment','active')

@section('body')

    <section class="content">
    <h2 style="text-align: center"> Welcome to <b style="color: orange;"> i-Insure </b><br/>
    <small><label id="demonew"></small></label><br/>
    <small><label id="demo"></label></small>
    <label></label>
        <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10) {
          dd='0'+dd
        } 

        if(mm<10) {
          mm='0'+mm
        } 

        today = mm+'/'+dd+'/'+yyyy+' - <?php 
    $today = date("D M j Y");  

    echo $today; 
    ?>';
        document.getElementById("demonew").innerHTML = today;
        var myVar=setInterval(function(){myTimer()},1000);

        function myTimer() {
            var d = new Date();
            document.getElementById("demo").innerHTML = d.toLocaleTimeString();
        }
        </script>
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
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Check Voucher</a></li>
                    </ol>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/payment.png')}}" style="height: 70px; width: 70px;"> Check Vouchers </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Check Voucher Number</th>
                                        <th>Policy Number</th>
                                        <th>Client</th>
                                        <th>Total Premium</th>
                                        <th>Created by</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="label bg-orange">on payment</td>
                                        <td>VOUCHER1234</td>
                                        <td>2014-MCAR-00</td>
                                        <td>Rola, Ma. Gabriella Tan</td>
                                        <td>Php 89,876.12</td>
                                        <td>No Minwoo</td>
                                        <td><button type="button" class="btn bg-blue waves-effect" style="position: right;"  data-toggle="modal" data-target="#details">
                                            <span style="font-size: 12px;"> View Breakdown
                                        </button></td>
                                    </tr>
                                    <tr>
                                        <td><span class="label bg-green">completed</td>
                                        <td>VOUCHER1234</td>
                                        <td>2014-MCAR-00</td>
                                        <td>Rola, Ma. Gabriella Tan</td>
                                        <td>Php 89,876.12</td>
                                        <td>No Minwoo</td>
                                        <td><button type="button" class="btn bg-blue waves-effect" style="position: right;"  data-toggle="modal" data-target="#details">
                                            <span style="font-size: 12px;"> View Breakdown
                                        </button></td>
                                    </tr>
                                    <tr>
                                        <td><span class="label bg-red">lapsed</td>
                                        <td>VOUCHER1234</td>
                                        <td>2014-MCAR-00</td>
                                        <td>Rola, Ma. Gabriella Tan</td>
                                        <td>Php 89,876.12</td>
                                        <td>No Minwoo</td>
                                        <td><button type="button" class="btn bg-blue waves-effect" style="position: right;"  data-toggle="modal" data-target="#details">
                                            <span style="font-size: 12px;"> View Breakdown
                                        </button></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- View INST MODAL-->
              <div class="modal fade" id="details" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInRight active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-view">
                            <h4 style="text-align: center;"><img src="{{ URL::asset ('images/icons/view-bill.png')}}" style="height: 50px; width: 50px;"> <br/><br/> Breakdown of Payment </h4>
                        </div><br/>
                        <div class="modal-body">
                            <h4 >Payment Progress</h4><br/>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
                                            75%
                                        </div>
                                    </div>
                                </div>
                            </div><br/>
                            <div class="body table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Check No.</th>
                                            <th>Bank</th>
                                            <th>Due Date</th>
                                            <th>Amount Due</th>
                                            <th>Status</th>
                                            <th>Updated by</th>
                                            <th>Date Updated</th>
                                            <th>OR Number</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>003234543</td>
                                            <td>Banco De Oro - Antipolo City</td>
                                            <td>July 13, 2017</td>
                                            <td>5, 000.00</td>
                                            <td><span class="label bg-green">paid</span></td>
                                            <td> Nam Joo Hyuk</td>
                                            <td>July 10, 2017</td>
                                            <td>091234567</td>
                                            <td><button type="button" class="btn bg-orange waves-effect" onclick="window.open('{{ URL::asset('/pdf/payment-receipt') }}')" style="position: right;"  data-toggle="tooltip" data-placement="left" title="Generate Receipt">
                                            <i class="material-icons">picture_as_pdf</i><span style="font-size: 15px;"></span>
                                            </button></td>
                                        </tr>
                                        <tr>
                                            <td>003234543</td>
                                            <td>Banco De Oro - Antipolo City</td>
                                            <td>August 13, 2017</td>
                                            <td>5, 000.00</td>
                                            <td><span class="label bg-red">late</span></td>
                                            <td>Bae Suzy</td>
                                            <td>July 10, 2017</td>
                                            <td>091234567</td>
                                            <td><button type="button" class="btn bg-orange waves-effect" onclick="window.open('{{ URL::asset('/pdf/payment-receipt') }}')" style="position: right;"  data-toggle="tooltip" data-placement="left" title="Generate Receipt">
                                            <i class="material-icons">picture_as_pdf</i><span style="font-size: 15px;"></span>
                                            </button></td>
                                        </tr>
                                        <tr>
                                            <td>003234543</td>
                                            <td>Banco De Oro - Antipolo City</td>
                                            <td>September 13, 2017</td>
                                            <td>5, 000.00</td>
                                            <td><span class="label bg-blue">to be paid</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h3 style="text-align: center;">Gross Collection: <b>Php 15,000.00</b></h3>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# VIEW INST MODAL -->
    </section>

@endsection