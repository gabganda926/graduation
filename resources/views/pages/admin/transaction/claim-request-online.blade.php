@extends('pages.admin.master')

@section('title','Claims - Transaction | i-Insure')

@section('trans','active')

@section('transClaims','active')

@section('transClaimsOnline','active')

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
                        <li><a href=""><i class="material-icons">home</i> Home</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/request.png')}}" style="height: 50px; width: 50px;"> Claim Requests</h3>
                        <p style="text-align: center;"><b>NOTE: All accepted requests will be automatically moved to Claim Requests List, while all the rejected requests will be moved to a folder for deleted requests.</b></p>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <form id = "claim_display" action = "/admin/transaction/claim-details-online" method = "GET" style = "display: none;">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "claim_id" name = "claim_id" type="text" class="form-control">
                             </div>
                        </form>
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
                                        <th>Last Update</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($request as $creq)
                                        @if($creq->web_status == 0)
                                    <tr>
                                        <td>
                                            @if($creq->claim_ID >= 10)
                                                CLAIM00{{ $creq->web_claim_ID }}
                                            @endif
                                            @if($creq->claim_ID < 10)
                                                CLAIM000{{ $creq->web_claim_ID }}
                                            @endif
                                            @if($creq->claim_ID >= 100)
                                                CLAIM0{{ $creq->web_claim_ID }}
                                            @endif
                                            @if($creq->claim_ID >= 1000)
                                                CLAIM{{ $creq->web_claim_ID }}
                                            @endif
                                        </td>
                                        <td>{{ $creq->web_policyno }}</td>
                                        <td>
                                            @if($creq->web_notifiedByType == 1)
                                                No
                                            @endif
                                            @if($creq->web_notifiedByType == 2)
                                                Yes
                                            @endif
                                        </td>
                                        <td>
                                            @foreach($cnotif as $notif)
                                                @if($creq->web_notifier_ID == $notif->web_notifier_ID)
                                                    {{ $notif->web_notifier_Name }}, {{ $notif->web_notifier_Relation }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td><ul>
                                            @foreach($cnotif as $notif)
                                                @if($creq->web_notifier_ID == $notif->web_notifier_ID)
                                                    @if($notif->web_notifier_cell_1 != null)
                                                    <li>    
                                                        {{ $notif->web_notifier_cell_1 }}
                                                    </li>
                                                    @endif
                                                    @if($notif->web_notifier_cell_2 != null)
                                                    <li>    
                                                        {{ $notif->web_notifier_cell_2 }}
                                                    </li>
                                                    @endif
                                                    @if($notif->web_notifier_telnum != null)
                                                    <li>    
                                                        {{ $notif->web_notifier_telnum }}
                                                    </li>
                                                    @endif
                                                    @if($notif->web_notifier_email != null)
                                                    <li>    
                                                        {{ $notif->web_notifier_email }}
                                                    </li>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </ul></td>
                                        <td>
                                               {{ \Carbon\Carbon::parse($creq->web_created_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($creq->web_created_at)->format("l, h:i:s A").")" }}
                                        </td>
                                        <td>
                                               {{ \Carbon\Carbon::parse($creq->web_updated_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($creq->web_updated_at)->format("l, h:i:s A").")" }}
                                        </td>
                                        <td><button form = "claim_display" type="submit" class="btn bg-light-blue waves-effect view" data-id = "{{$creq->web_claim_ID}}" onclick="$('#claim_id').val($(this).data('id'));" data-toggle="tooltip" data-placement="left" title="View details"><i class="material-icons">remove_red_eye</i></button>
                                            <button type="button" class="btn bg-green waves-effect forward_claim" data-id = "{{$creq->web_claim_ID}}" style="position: right;" data-toggle="tooltip" data-placement="left" title="Accept">
                                                <i class="material-icons">thumb_up</i><span style="font-size: 15px;">
                                            </button>
                                            <button type="button" class="btn bg-red waves-effect reject_request" data-id = "{{$creq->web_claim_ID}}" style="position: right;" onclick=""  data-toggle="tooltip" data-placement="left" title="Reject">
                                                <i class="material-icons">thumb_down</i><span style="font-size: 15px;">
                                            </button> 
                                            </td>
                                    </tr>
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
        <div class="col-md-4" style = "display: none;">
           <input id = "time" name = "time" type="text" class="form-control">
        </div>
    </section>

    <script>
        function addZero(i) {
                    if (i < 10) {
                        i = "0" + i;
                    }
                    return i;
                }

        function formatDate(date)
        {
          var monthNames = [
            "January", "February", "March",
            "April", "May", "June", "July",
            "August", "September", "October",
            "November", "December"
          ];

          var day = date.getDate();
          var monthIndex = date.getMonth() + 1;
          var year = date.getFullYear();
          var h = addZero(date.getHours());
          var m = addZero(date.getMinutes());
          var s = addZero(date.getSeconds());

          return year + '-' + monthIndex + '-' + day + ' ' + h + ':' + m + ':' + s;
        }

        $('.forward_claim').click(function(event){
              $.ajax({
                  type: 'POST',
                  url: '/admin/transaction/claim-request-online/forward-claim',
                  data: {ID:$(this).data('id')},
                  success:function(xhr){
                      window.location.reload();
                      $.notify('Request has been successfully accepted.', 
                        { 
                          globalPosition: 'top center',
                          autoHideDelay: 1500, 
                          className: 'success',
                        }
                      );
                  },
                    error:function(xhr, ajaxOptions, thrownError,data){
                      $.notify('Cannot accept the request because the credentials provided were invalid. Please check the request details carefully.', 
                        { 
                          globalPosition: 'top right',
                          autoHideDelay: 5000, 
                          className: 'error',
                        }
                      );
                  }
              });
        });

        $('.reject_request').click(function(event){
              $.ajax({
                  type: 'POST',
                  url: '/admin/transaction/claim-request-online/reject-request',
                  data: {ID:$(this).data('id')},
                  success:function(xhr){
                      window.location.reload();
                      $.notify('Request has been successfully rejected.', 
                        { 
                          globalPosition: 'top center',
                          autoHideDelay: 1500, 
                          className: 'success',
                        }
                      );
                  },
                    error:function(xhr, ajaxOptions, thrownError,data){
                      $.notify('There seems to be a problem.', 
                        { 
                          globalPosition: 'top center',
                          autoHideDelay: 5000, 
                          className: 'error',
                        }
                      );
                  }
              });
        });
    </script>

@endsection
