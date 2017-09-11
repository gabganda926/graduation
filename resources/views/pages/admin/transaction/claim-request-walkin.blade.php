@extends('pages.admin.master')

@section('title','Claims - Transaction | i-Insure')

@section('trans','active')

@section('transClaims','active')

@section('transClaimsWalkin','active')

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
        <div class="container-fluid">
        <div class="row clearfix">
                <div class="col-md-12">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('admin/transaction/claim-request-walkin') }}"><i class="material-icons">home</i> Home</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/request.png')}}" style="height: 50px; width: 50px;"> Claim Requests</h3>
                        <p style="text-align: center;"><b>NOTE: All accepted requests will be automatically forwarded to Manager, while all the rejected requests will be deleted.</b></p>
                        <ul class="header-dropdown m-r--5">
                            <li><button type="button" class="btn btn-xs bg-blue waves-effect" style="float: right;" onclick="window.document.location='{{ URL::asset('admin/transaction/claim-create-request-walkin') }}';">
                                            <i class="material-icons">add</i>
                                            <span>Create new request</span>
                                        </button></li>
                        </ul>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Request #</th>
                                        <th>Policy Number</th>
                                        <th class="col-md-1">Representative of Policy Holder?</th>
                                        <th>Name</th>
                                        <th>Contact Details</th>
                                        <th>Date Received</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>CLM-10273-AB</td>
                                        <td>ATQ-CPR-10938734</td>
                                        <td>Yes</td>
                                        <td>Huhu HUhu</td>
                                        <td><ul>
                                            <li>091233344</li>
                                            <li>hehe@gmail.com</li>
                                        </ul></td>
                                        <td>June 23, 2017 3:00AM</td>
                                        <td><button type="button" class="btn bg-blue waves-effect" style="position: right;" onclick="window.document.location='{{ URL::asset('admin/transaction/claim-details-walkin') }}';" data-toggle="tooltip" data-placement="left" title="View Details">
                                                <i class="material-icons">security</i><span style="font-size: 15px;">
                                            </button>
                                            <button type="button" class="btn bg-green waves-effect" style="position: right;" onclick=""  data-toggle="tooltip" data-placement="left" title="Accept">
                                                <i class="material-icons">thumb_up</i><span style="font-size: 15px;">
                                            </button>
                                            <button type="button" class="btn bg-red waves-effect" style="position: right;" onclick=""  data-toggle="tooltip" data-placement="left" title="Reject">
                                                <i class="material-icons">thumb_down</i><span style="font-size: 15px;">
                                            </button> 
                                            </td>
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
