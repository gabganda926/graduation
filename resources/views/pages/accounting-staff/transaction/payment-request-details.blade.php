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
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('/accounting-staff/transaction/payment-online') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('/accounting-staff/transaction/payment-online') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Payment Request Details</a></li>
                    </ol>
                </div>
            </div>
            <div class="row clearfix">
                <!-- PAYMENT DETAILS -->
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="card" style="overflow: scroll; height: 530px;">
                        <div class="header">
                            <h2>PAYMENT REQUEST DETAILS</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Client:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Policy Number:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Deposit Date:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="date" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Deposit Time:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="time" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Remittance Date:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="date" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Remittance Time:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="time" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Due Date:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="date" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Bank:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Payment for Check Number:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Amount Due:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Amount Paid:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Remarks:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" value="on time" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PAYMENT DETAILS -->
                <!-- BREAKDOWN -->
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <div class="card">
                        <div class="header">
                            <h2>DEPOSIT SLIP</h2>
                        </div>
                        <div class="body" style="overflow: scroll;">
                            <img src="{!! '/image/'.'default-image.png' !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:780px;height:450px;">
                        </div>
                    </div>
                </div>
                <!-- #END# BREAKDOWN -->
            </div>
        </div>
    </section>

@endsection