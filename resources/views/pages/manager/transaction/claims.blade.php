@extends('pages.manager.master')

@section('title','Claims - Transaction | i-Insure')

@section('transClaims','active')

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
    </h2><br/>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href=""><i class="material-icons">home</i> Home</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/view-bill.png')}}" style="height: 50px; width: 50px;"> <b> Claims Requests </b></h3>
                        <p style="text-align: center;"><b>NOTE: All accepted requests will be automatically sent to insurance company's email, while all the rejected requests will be deleted.</b></p>
                        <ul class="header-dropdown m-r--5">
                                <li><button type="button" class="btn bg-blue-grey waves-effect" style="position: right;" onclick="window.document.location='{{ URL::asset('/manager/transaction/claims-settings') }}';" data-toggle="tooltip" data-placement="bottom" title="View auto-reply settings">
                                            <i class="material-icons">update</i><span style="font-size: 15px;">
                                        </button></li>
                            </ul>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="body table-responsive">
                            <table id="ex" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Request #</th>
                                        <th>Policy Number</th>
                                        <th class="col-md-1">Representative of Policy Holder?</th>
                                        <th>Name</th>
                                        <th>Contact Details</th>
                                        <th>Sent by</th>
                                        <th>Date Received</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($creq as $claims)
                                    @if($claims->del_flag == 0)
                                    @if($claims->status == 1)
                                    <tr>
                                        <td>
                                                @if($claims->claim_ID >= 10)
                                                    CLAIM00{{ $claims->claim_ID }}
                                                @endif
                                                @if($claims->payment_ID < 10)
                                                    CLAIM000{{ $claims->claim_ID }}
                                                @endif
                                                @if($claims->payment_ID >= 100)
                                                    CLAIM0{{ $claims->claim_ID }}
                                                @endif
                                                @if($claims->payment_ID >= 1000)
                                                    CLAIM{{ $claims->claim_ID }}
                                                @endif
                                            </td>
                                            <td>
                                                @foreach ($cliacc as $ins)
                                                    @if($claims->account_ID == $ins->account_ID)
                                                        {{ $ins->policy_number }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($claims->notifiedByType == 1)
                                                    No
                                                @endif
                                                @if($claims->notifiedByType == 2)
                                                    Yes
                                                @endif
                                            </td>
                                            <td>
                                                @foreach($cnotif as $notif)
                                                    @if($claims->notifier_ID == $notif->notifier_ID)
                                                        {{ $notif->notifier_Name }} - {{ $notif->notifier_Relation }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($cnotif as $notif)
                                                    @if($claims->notifier_ID == $notif->notifier_ID)
                                                    <ul>
                                                        @if($notif->notifier_cell_1 != null)
                                                        <li>    
                                                            {{ $notif->notifier_cell_1 }}
                                                        </li>
                                                        @endif
                                                        @if($notif->notifier_cell_2 != null)
                                                        <li>    
                                                            {{ $notif->notifier_cell_2 }}
                                                        </li>
                                                        @endif
                                                        @if($notif->notifier_telnum != null)
                                                        <li>    
                                                            {{ $notif->notifier_telnum }}
                                                        </li>
                                                        @endif
                                                        @if($notif->notifier_email != null)
                                                        <li>    
                                                            {{ $notif->notifier_email }}
                                                        </li>
                                                        @endif
                                                    </ul>
                                                    @endif
                                                @endforeach
                                            </td>
                                        <td>Ma. Gabriella Tan Rola</td>
                                        <td>
                                                   {{ \Carbon\Carbon::parse($claims->updated_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($claims->updated_at)->format("l, h:i:s A").")" }}
                                            </td>
                                        <td><button type="button" class="btn bg-blue waves-effect" style="position: right;" onclick="window.document.location='{{ URL::asset('manager/transaction/claim-details') }}';" data-toggle="tooltip" data-placement="left" title="View Details">
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
                                    @endif
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div> 
        </div>
    </section>

    <script>
        $('#ex').DataTable( {
            "order": [[ 6, "desc" ]]
        } );
    </script>

@endsection
