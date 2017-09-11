@extends('pages.accounting-staff.master')

@section('title','Payment - Transaction | i-Insure')

@section('transPayment','active')

@section('transOnlinePayment','active')

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
                <div class="col-md-12">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Payment</a></li>
                    </ol>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/payment.png')}}" style="height: 50px; width: 50px;"> <b> Online Payments </b></h3>
                        <ul class="header-dropdown m-r--5">
                                <li><button type="button" class="btn bg-blue-grey waves-effect" style="position: right;" onclick="window.document.location='{{ URL::asset('/accounting-staff/transaction/payment-online-auto-reply') }}';" data-toggle="tooltip" data-placement="bottom" title="View auto-reply settings">
                                            <i class="material-icons">update</i><span style="font-size: 15px;">
                                        </button></li>
                            </ul>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th class="col-md-2">Remittance Date/Time</th>
                                        <th class="col-md-2">Policy Number</th>
                                        <th class="col-md-2">Client</th>
                                        <th>Check Number</th>
                                        <th>Amount</th>
                                        <th class="col-md-1">Deposit Slip</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>January 18, 2017 11:09:20 PM</td>
                                        <td>2014-MCAR-00</td>
                                        <td>Rola, Ma. Gabriella Tan</td>
                                        <td>23894938274</td>
                                        <td>Php 9,876.12</td>
                                        <td><button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#attachedImage">View
                                        </button></td>
                                        <td><button type="button" class="btn bg-light-blue waves-effect" onclick="window.document.location='{{ URL::asset('/accounting-staff/transaction/payment-request-details') }}';" data-toggle="tooltip" data-placement="left" title="View details"><i class="material-icons">remove_red_eye</i>
                                                        </button>
                                            <button type="button" class="btn bg-green waves-effect" onclick="window.document.location='{{ URL::asset('/accounting-staff/transaction/payment-view') }}';" style="position: right;"  data-toggle="tooltip" data-placement="left" title="Add this payment">
                                            <i class="material-icons">thumb_up</i><span style="font-size: 15px;"></span>
                                            </button>
                                            <button type="button" class="btn bg-red waves-effect" onclick="window.document.location='{{ URL::asset('') }}';" style="position: right;"  data-toggle="tooltip" data-placement="left" title="Reject">
                                            <i class="material-icons">thumb_down</i><span style="font-size: 15px;"></span>
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

        <!-- View INST MODAL-->
              <div class="modal fade" id="attachedImage" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInRight active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-view">
                            <h4><br/>DEPOSIT SLIP
                            </h4>
                        </div><br/>
                        <div class="modal-body">
                            <img src="{!! '/image/'.'default-image.png' !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:780px;height:450px;">
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