@extends('pages.manager.master')

@section('title','Transmittal - Transaction| i-Insure')

@section('trans','active')

@section('transTrans','active')

@section('transTransmittal','active')

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
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/delivery.png')}}" style="height: 50px; width: 50px;"> <b> List of Transmittal of Claim Requirements</b></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <form id = "display_details" action = "/manager/transaction/transmittal/list/details" method = "GET" style = "display: none;">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "transclaim_id" name = "transclaim_id" type="text" class="form-control">
                             </div>
                             <div class="col-md-4" style = "display: none;">
                                 <input id = "claim_ID" name = "claim_ID" type="text" class="form-control">
                             </div>
                        </form>
                        <form id="tc" name = "tc" method="POST" action = "/manager/transaction/transmittal/list/submit" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-md-4" style = "display: none;">
                               <input id = "time" name = "time" type="text" class="form-control">
                            </div>
                            <div class="col-md-2" style = "display: none;">
                               <input id = "claimid" name = "claimid" type="text" class="form-control">
                            </div>
                        <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Claim ID</th>
                                        <th>Insurance Company</th>
                                        <th>Documents</th>
                                        <th>Courier</th>
                                        <th class="col-md-1">Date Created</th>
                                        <th class="col-md-1">Last Update</th>
                                        <th class="col-md-1">Status</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trans as $tr)
                                        @foreach($creq as $cl)
                                            @if($tr->claim_ID == $cl->claim_ID)
                                                @foreach($comp as $inscomp)
                                                    @if($tr->inscomp_ID == $inscomp->comp_ID)
                                    <tr>
                                                        <td>
                                                            @if($tr->transmitClaim_ID >= 10)
                                                                CLAIM-{{ \Carbon\Carbon::parse($tr->created_at)->format("Y") }}-00{{ $tr->transmitClaim_ID }}
                                                            @endif
                                                            @if($tr->transmitClaim_ID < 10)
                                                                CLAIM-{{ \Carbon\Carbon::parse($tr->created_at)->format("Y") }}-000{{ $tr->transmitClaim_ID }}
                                                            @endif
                                                            @if($tr->transmitClaim_ID >= 100)
                                                                CLAIM-{{ \Carbon\Carbon::parse($tr->created_at)->format("Y") }}-0{{ $tr->transmitClaim_ID }}
                                                            @endif
                                                            @if($tr->transmitClaim_ID >= 1000)
                                                                CLAIM-{{ \Carbon\Carbon::parse($tr->created_at)->format("Y") }}-{{ $tr->transmitClaim_ID }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ $inscomp->comp_name }}
                                                        </td>
                                                        <td>
                                                            <ul>
                                                            @foreach($cfile as $fi)
                                                                @if($fi->claim_ID == $tr->claim_ID)
                                                                    @foreach($crequire as $req)
                                                                        @if($req->claimReq_ID == $fi->claimReq_ID)
                                                                            <li>{{ $req->claimRequirement }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                            <li>Claim Form</li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            @foreach($courier as $cour)
                                                                @if($cour->courier_ID == $tr->courier_ID)
                                                                    @foreach($pinfo as $inf)
                                                                        @if($inf->pinfo_ID == $cour->personal_info_ID)
                                                                            {{ $inf->pinfo_last_name }}, {{ $inf->pinfo_first_name }} {{ $inf->pinfo_middle_name }}
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            {{ \Carbon\Carbon::parse($tr->created_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($tr->created_at)->format("l, h:i:s A").")" }}
                                                        </td>
                                                        <td>
                                                            {{ \Carbon\Carbon::parse($tr->updated_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($tr->updated_at)->format("l, h:i:s A").")" }}
                                                        </td>
                                                        <td>
                                                            @if($tr->status == 0)
                                                                <span class="label bg-blue">processing</span>
                                                            @endif
                                                            @if($tr->status == 1)
                                                                <span class="label bg-green">sent</span>
                                                            @endif
                                                            @if($tr->status == 2)
                                                                <span class="label bg-red">cancelled</span>
                                                            @endif
                                                            @if($tr->status == 3)
                                                                <span class="label bg-orange">on hold</span>
                                                            @endif

                                                            <div id = "div_{{ $tr->transmitClaim_ID }}">
                                                                @if($tr->status == 0)
                                                                    <select name = "up_status" id="up_status" class="form-control show-tick">
                                                                        <option selected value = "" style = "display: none;">-- Select Status --</option>
                                                                        <option value = "2">cancelled</option>
                                                                        <option value = "3">on hold</option>
                                                                        <option value = "1">sent</option>
                                                                    </select>
                                                                @endif
                                                                @if($tr->status == 2)
                                                                    <select name = "up_status" id="up_status" class="form-control show-tick">
                                                                        <option selected value = "" style = "display: none;">-- Select Status --</option>
                                                                        <option value = "0">processing</option>
                                                                        <option value = "3">on hold</option>
                                                                        <option value = "1">sent</option>
                                                                    </select>
                                                                @endif
                                                                @if($tr->status == 3)
                                                                    <select name = "up_status" id="up_status" class="form-control show-tick">
                                                                        <option selected value = "" style = "display: none;">-- Select Status --</option>
                                                                        <option value = "0">processing</option>
                                                                        <option value = "2">cancelled</option>
                                                                        <option value = "1">sent</option>
                                                                    </select>
                                                                @endif
                                                            </div>
                                                            <button id="btn_{{ $tr->transmitClaim_ID }}" type="button" class="btn bg-green btn-block waves-effect" onclick="
                                                                            $('#claimid').val('{{ $tr->transmitClaim_ID }}');
                                                                            document.getElementById('time').value = formatDate(new Date());
                                                                            document.getElementById('claimid').value = getClaimId();
                                                                            swal({
                                                                              title: 'Are you sure?',
                                                                              type: 'warning',
                                                                              showCancelButton: true,
                                                                              confirmButtonColor: '#DD6B55',
                                                                              confirmButtonText: 'Continue',
                                                                              cancelButtonText: 'Cancel',
                                                                              closeOnConfirm: false,
                                                                              closeOnCancel: false
                                                                            },
                                                                            function(isConfirm){
                                                                              if (isConfirm) {
                                                                                $('#tc').submit();
                                                                              } else {
                                                                                  swal({
                                                                                  title: 'Cancelled',
                                                                                  type: 'warning',
                                                                                  timer: 500,
                                                                                  showConfirmButton: false
                                                                                  });
                                                                              }
                                                                            });
                                                                            $('#div_{{ $tr->transmitClaim_ID }}').hide(200);
                                                                            $('#btn_{{ $tr->transmitClaim_ID }}').hide(200);">SAVE
                                                            </button>
                                                        </td>
                                                        <td>
                                                            @if($tr->status != 1)
                                                            <button form = "display_details" type="submit" class="btn bg-blue waves-effect" style="position: right;" data-id = "{{$tr->transmitClaim_ID}}" data-claim="{{$cl->claim_ID}}" onclick="$('#transclaim_id').val($(this).data('id')); $('#claim_ID').val($(this).data('claim'));" data-toggle="tooltip" data-placement="left" title="View details">
                                                                <i class="material-icons">security</i><span style="font-size: 15px;"></span>
                                                            </button>
                                                            <button type="button" class="btn bg-teal waves-effect" style="position: right;" data-toggle="tooltip" data-placement="left" title="Update Status" onclick="
                                                            $('#div_{{ $tr->transmitClaim_ID }}').show(200);
                                                            $('#btn_{{ $tr->transmitClaim_ID }}').show(200);">
                                                                <i class="material-icons">settings</i><span style="font-size: 15px;"></span>
                                                            </button>
                                                            @endif

                                                            @if($tr->status == 1)
                                                            <button form = "display_details" type="submit" class="btn bg-blue waves-effect" style="position: right;" data-id = "{{$tr->transmitClaim_ID}}" data-claim="{{$cl->claim_ID}}" onclick="$('#transclaim_id').val($(this).data('id')); $('#claim_ID').val($(this).data('claim'));" data-toggle="tooltip" data-placement="left" title="View details">
                                                                <i class="material-icons">security</i><span style="font-size: 15px;"></span>
                                                            </button>
                                                            @endif

                                                            @if($tr->status == 0)
                                                            <button type="button" class="btn bg-orange waves-effect" data-id=" {{ $tr->transmitClaim_ID }} " onclick="window.open('{{ URL ('/pdf/transmittal-form/' .$tr->transmitClaim_ID) }}');" style="position: right;"  data-toggle="tooltip" data-placement="left" title="Generate Transmittal Form">
                                                            <i class="material-icons">picture_as_pdf</i><span style="font-size: 15px;"></span>
                                                            </button>
                                                            @endif
                                                        </td>
                                    </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div> <!-- end of body -->
                        </form>
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        window.onload = function(){

            @foreach($trans as $t)  
                document.getElementById("div_{{ $t->transmitClaim_ID }}").style.display = 'none';
                document.getElementById("btn_{{ $t->transmitClaim_ID }}").style.display = 'none';
            @endforeach
        };
    </script>

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

        function getClaimId(clid){
           clid = $('#claimid').val();
           return clid;
        } 

        $("#up_status").on('change textInput input', function()
        {
            $('#stat').val($('#up_status').val());
        });
    </script>
    
@endsection
