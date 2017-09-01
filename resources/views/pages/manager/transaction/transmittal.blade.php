@extends('pages.manager.master')

@section('title','Transmittal - Transaction| i-Insure')

@section('trans','active')

@section('transTrans','active')

@section('transTransRequest','active')

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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href=""><i class="material-icons">home</i> Home</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/delivery.png')}}" style="height: 50px; width: 50px;"> <b> Transmittal Requests </b></h3>
                        <p style="text-align: center;"><b>NOTE: All accepted requests will be sent back to the administrator for the transmittal of documents, while all the rejected requests will be deleted.</b></p>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Request #</th>
                                        <th>Client</th>
                                        <th>Requested Documents
                                        <th class="col-md-1">Status</th>
                                        <th class="col-md-1">Date Received</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- MAGKAIBA UNG ACTION DPENDE SA STATUS. DALAWA LANG UNG STATUS, NEW SAKA TO DO -->
                                    <tr>
                                        <td>87897-10273-AB</td>
                                        <td>Rola, Ma. Gabriella</td>
                                        <td><ul>
                                            <li>Copy of Insurance Form</li>
                                            <li>Cheque Voucher</li>
                                            </ul></td>
                                        <td><span class="label bg-green">new</span></td>
                                        <td>March 20, 2017 (Monday, 3:05:10PM)</td>
                                        <td><button type="button" class="btn bg-blue waves-effect" style="position: right;" onclick="window.document.location='{{ URL::asset('manager/transaction/transmittal-details') }}';" data-toggle="tooltip" data-placement="left" title="View details">
                                            <i class="material-icons">security</i><span style="font-size: 15px;">
                                        </button>
                                        <button type="button" class="btn bg-green waves-effect" style="position: right;" onclick="" data-toggle="tooltip" data-placement="left" title="Accept">
                                            <i class="material-icons">thumb_up</i><span style="font-size: 15px;">
                                        </button>
                                        <button type="button" class="btn bg-red waves-effect" style="position: right;"  data-toggle="tooltip" data-placement="left" title="Reject">
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
