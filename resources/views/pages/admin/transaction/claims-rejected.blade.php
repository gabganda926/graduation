@extends('pages.admin.master')

@section('title','Claims Trash Bin - Transaction | i-Insure')

@section('trans','active')

@section('transClaims','active')

@section('transClaimsRejected','active')

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
              <!-- Colorful Panel Items With Icon -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/trash.png')}}" style="height: 50px; width: 50px;"> Rejected Requests Folder</h3>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                    <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-col-pink">
                                            <div class="panel-heading" role="tab" id="headingOne_17">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseOne_17" aria-expanded="false" aria-controls="collapseOne_17">
                                                        <i class="material-icons">folder_shared</i> Rejected Online Claim Requests
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_17">
                                                <div class="panel-body">
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
                                                                  <th class="col-md-1">Status</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                              @foreach ($request as $creq)
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
                                                                      @foreach($webcnotif as $notif)
                                                                          @if($creq->web_notifier_ID == $notif->web_notifier_ID)
                                                                              {{ $notif->web_notifier_Name }}, {{ $notif->web_notifier_Relation }}
                                                                          @endif
                                                                      @endforeach
                                                                  </td>
                                                                  <td><ul>
                                                                      @foreach($webcnotif as $notif)
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
                                                                  <td><span class="label bg-red">rejected</span></td>
                                                              </tr>
                                                              @endforeach
                                                          </tbody>
                                                      </table>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-col-indigo">
                                            <div class="panel-heading" role="tab" id="headingTwo_17">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseTwo_17" aria-expanded="false"
                                                       aria-controls="collapseTwo_17">
                                                        <i class="material-icons">folder_shared</i> Rejected Claim Requests
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo_17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_17">
                                                <div class="panel-body">
                                                    <div class="body table-responsive">
                                                        <table id="ex" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                            <thead>
                                                                <tr>
                                                                    <th>Request #</th>
                                                                    <th>Policy Number</th>
                                                                    <th class="col-md-1">Representative of Policy Holder?</th>
                                                                    <th>Name</th>
                                                                    <th>Contact Details</th>
                                                                    <th>Date Received</th>
                                                                    <th>Last Update</th>
                                                                    <th class="col-md-1">Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($creq1 as $claims)
                                                                    @if($claims->del_flag == 0)
                                                                <tr>
                                                                        <td>
                                                                            @if($claims->claim_ID >= 10)
                                                                                CLAIM00{{ $claims->claim_ID }}
                                                                            @endif
                                                                            @if($claims->claim_ID < 10)
                                                                                CLAIM000{{ $claims->claim_ID }}
                                                                            @endif
                                                                            @if($claims->claim_ID >= 100)
                                                                                CLAIM0{{ $claims->claim_ID }}
                                                                            @endif
                                                                            @if($claims->claim_ID >= 1000)
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
                                                                                    {{ $notif->notifier_Name }}, {{ $notif->notifier_Relation }}
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
                                                                        <td>
                                                                               {{ \Carbon\Carbon::parse($claims->created_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($claims->created_at)->format("l, h:i:s A").")" }}
                                                                        </td>
                                                                        <td>
                                                                               {{ \Carbon\Carbon::parse($claims->updated_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($claims->updated_at)->format("l, h:i:s A").")" }}
                                                                        </td>
                                                                        <td><span class="label bg-red">rejected</span></td>
                                                                </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Colorful Panel Items With Icon -->
            </div>
        </div>
    </section>

@endsection
