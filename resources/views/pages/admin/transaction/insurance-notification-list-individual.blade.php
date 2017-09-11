@extends('pages.admin.master')

@section('title','Insurance Accounts - Transaction | i-Insure')

@section('trans','active')

@section('transIns','active')

@section('transInsInd','active')

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
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('admin/transaction/insurance-expiring-accounts-individual') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('admin/transaction/insurance-individual') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="{{ URL::asset('admin/transaction/insurance-expiring-accounts-individual') }}"><i class="material-icons">library_books</i> Expiring Accounts (Individual)</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">mail</i> Sent Notifications</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="phDetails" class="list-group-item active">
                                1. Sent Notifications
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/sent.png')}}" style="height: 50px; width: 50px;"> Sent Notifications</h3>
                            <ul class="header-dropdown m-r--5">
                                <li><button type="button" class="btn bg-gray waves-effect right" style="position: right;" onclick="window.document.location='{{ URL::asset('admin/transaction/insurance-settings-individual') }}';" data-toggle="tooltip" data-placement="bottom" title="Settings">
                                    <i class="material-icons">settings</i><span style="font-size: 15px;"></span>
                                </button></li>
                                <li><button type="button" class="btn bg-red waves-effect right" style="position: right;" data-toggle="tooltip" data-placement="bottom" title="Delete the record/s.">
                                    <i class="material-icons">delete</i><span style="font-size: 15px;"></span>
                                </button></li>
                            </ul>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th class="col-md-1"><input type="checkbox" id="sms" name = "sms" class="filled-in chk-col-red checkCheckbox"/><label for="sms"></label></th>
                                        <th>Client</th>
                                        <th>Insurance Company</th>
                                        <th>Contact Details</th>
                                        <th>Date Sent</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" id="1" name = "1" class="filled-in chk-col-red checkCheckbox"/><label for="1"></label></td>
                                        <td>Rola, Ma. Gabriella Tan</td>
                                        <td>FPG Insurance</td>
                                        <td><ul>
                                            <li>HEHE</li>
                                            <li>HUHU</li>
                                            <li>HAHA</li>
                                        </ul></td>
                                        <td>Mar-11-2017</td>
                                        <td><button type="button" class="btn bg-light-blue waves-effect" onclick="window.document.location='{{ URL::asset('admin/transaction/insurance-details-individual') }}';" data-toggle="tooltip" data-placement="left" title="View account details."><i class="material-icons">remove_red_eye</i>
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