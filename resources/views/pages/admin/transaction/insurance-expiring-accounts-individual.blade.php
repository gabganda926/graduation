@extends('pages.admin.master')

@section('title','Insurance Accounts - Transaction | i-Insure')

@section('trans','active')

@section('transIns','active')

@section('transInsInd', 'active')

@section('body')

    <script>
    function formatDate(date)
    {
      var monthNames = [
        "January", "February", "March",
        "April", "May", "June", "July",
        "August", "September", "October",
        "November", "December"
      ];
      var arr = date.split('-');

      var day = arr[2];
      var monthIndex = arr[1]-1;
      var year = arr[0];

      return monthNames[monthIndex] + ' ' + day + ', ' + year;
    }

    function formatDate2(date)
    {
      var monthNames = [
        "January", "February", "March",
        "April", "May", "June", "July",
        "August", "September", "October",
        "November", "December"
      ];
      var arr = date.split('-');

      var day = arr[2];
      var monthIndex = arr[1]-1;
      var year = parseInt(arr[0]) + 1;

      return monthNames[monthIndex] + ' ' + day + ', ' + year;
    }
    </script>

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
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('admin/transaction/insurance-individual') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('admin/transaction/insurance-individual') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Expiring Accounts (Individual)</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="phDetails" class="list-group-item active">
                                1. Individual - Expiring Accounts
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                  <input id = "datengayon" name = "datengayon" type="datetime" class="form-control" style="display: none;">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/expiring.png')}}" style="height: 50px; width: 50px;"> Expiring Accounts</h3>
                        <p style="text-align: center;">NOTE: This list updates daily.</p>
                            <ul class="header-dropdown m-r--5">
                                <li><button type="button" class="btn bg-green waves-effect right" style="position: right;" onclick="window.document.location='{{ URL::asset('admin/transaction/insurance-notification-list-individual') }}';" data-toggle="tooltip" data-placement="bottom" title="View sent notifications">
                                    <i class="material-icons">assignment_turned_in</i><span style="font-size: 15px;"></span>
                                </button></li>
                            </ul>
                            <form id = "display" action = "/admin/transaction/insurance-details-individual-expiring" method = "POST" style = "display: none;">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "id" name = "id" type="text" class="form-control">
                             </div>
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "acc_id" name = "acc_id" type="text" class="form-control">
                             </div>
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "pay_id" name = "pay_id" type="text" class="form-control">
                             </div>
                            </form>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Policy Number</th>
                                        <th>Image</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Insurance Company</th>
                                        <th>Sales Agent</th>
                                        <th>SOI</th> <!-- START OF INSURANCE -->
                                        <th>EOI</th> <!-- END OF INSURANCE -->
                                        <th class="col-md-1">Insurance Status</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($clist as $list)
                                    @foreach($client as $cli)
                                     @if($list->client_ID == $cli->client_ID)
                                      @if($list->del_flag == 0)
                                       @foreach($insaccount as $iacc)
                                        @if($cli->client_ID == $iacc->client_ID)
                                         @foreach($pInfo as $info)
                                          @if($cli->personal_info_ID == $info->pinfo_ID)
                                          @if((strtotime('today') > strtotime("+1 year", strtotime("-25 day",strtotime($iacc->inception_date)))) && (strtotime('today') < strtotime("+1 year", strtotime($iacc->inception_date)))) 
                                            <tr>
                                                <td class="pno_{{ $iacc->policy_number }}"></td>
                                                <td><img src="{!! '/image/client/'.$info->pinfo_picture !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></td>
                                                <td class="lname_{{ $iacc->policy_number }}"></td>
                                                <td class="fname_{{ $iacc->policy_number }}"></td>
                                                <td class="mname_{{ $iacc->policy_number }}">{{ $info->pinfo_middle_name }}</td>
                                                <td class="inscomp_{{ $iacc->policy_number }}">
                                                @foreach($inscomp as $icomp)
                                                 @if($icomp->comp_ID == $iacc->insurance_company)
                                                  {{$icomp->comp_name}}
                                                 @endif
                                                @endforeach
                                                </td>
                                                <td class="agent_{{ $iacc->policy_number }}">
                                            </td>                                       
                                            <td class="inc_{{ $iacc->policy_number }}"></td>
                                            <td class="end_{{ $iacc->policy_number }}"></script>
                                            </td>
                                            <td>
                                                <span class="label bg-red">expiring</span>
                                            </td>
                                            <td>
                                              @foreach($paydetails as $spay)
                                               @if($spay->account_ID == $iacc->account_ID)
                                               <button form = "display" type="submit" type="button" class="btn bg-light-blue waves-effect" data-id = "{{ $cli->client_ID }}" data-acc = "{{$iacc->account_ID}}" data-pay = "{{$spay->payment_ID}}" onclick="
                                                $('#id').val($(this).data('id')); $('#acc_id').val($(this).data('acc')); $('#pay_id').val($(this).data('pay'));" data-toggle="tooltip" data-placement="left" title="View account details."><i class="material-icons">remove_red_eye</i>
                                               </button>
                                               @endif
                                              @endforeach
                                            </td>     
                                            </tr>
                                            @endif
                                          @endif
                                         @endforeach
                                        @endif
                                       @endforeach
                                      @endif
                                     @endif
                                    @endforeach
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
        window.onload = function(){

        function formatDate3(date)
        {
          var monthNames = [
            "January", "February", "March",
            "April", "May", "June", "July",
            "August", "September", "October",
            "November", "December"
          ];
          var arr = date.split('-');

          var day = arr[2];
          var monthIndex = arr[1]-1;
          var year = arr[0];

          return monthNames[monthIndex] + ' ' + day + ', ' + year;
        }

        function formatDate2(date)
        {
          var monthNames = [
            "January", "February", "March",
            "April", "May", "June", "July",
            "August", "September", "October",
            "November", "December"
          ];
          var arr = date.split('-');

          var day = arr[2];
          var monthIndex = arr[1]-1;
          var year = parseInt(arr[0]) + 1;

          return monthNames[monthIndex] + ' ' + day + ', ' + year;
        }

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

        var today1 = new Date();
        var dd1 = today1.getDate();
        var mm1 = today1.getMonth()+1;
        var yyyy1 = today1.getFullYear();

        function parseDate(input) {
          var parts = input.match(/(\d+)/g);
          // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
          return new Date(parts[0], parts[1]-1, parts[2]); // months are 0-based
        }

        Date.prototype.addDays = function(days) {
          var dat = new Date(this.valueOf());
          dat.setDate(dat.getDate() + days);
          return dat;
        } 

        function pad (str, max) {
          str = str.toString();
          return str.length < max ? pad("0" + str, max) : str;
        }

        if(dd1<10){dd1='0'+dd1} if(mm1<10){mm1='0'+mm1} today1 = yyyy1+'-'+mm1+'-'+dd1;

        var f = new Date();
        $('#datengayon').val(today1+ " " +f.toLocaleTimeString());

        var myVar1=setInterval(function(){myTimer1()},1000);

        function myTimer1() {
            var f = new Date();
           $('#datengayon').val(today1+ " " +f.toLocaleTimeString());
        }

@foreach($clist as $list)
  @foreach($client as $cli)
   @if($list->client_ID == $cli->client_ID)
    @if($list->del_flag == 0)
     @foreach($insaccount as $iacc)
      @if($cli->client_ID == $iacc->client_ID)
       @foreach($pInfo as $info)
        @if($cli->personal_info_ID == $info->pinfo_ID)
        @if((strtotime('today') > strtotime("+1 year", strtotime("-25 day",strtotime($iacc->inception_date)))) && (strtotime('today') < strtotime("+1 year", strtotime($iacc->inception_date)))) 

                        var lapse = 0;
                        var p = 0;
                        @foreach($voucher as $vouch)
                          @if($iacc->account_ID == $vouch->cv_ID)
                          @foreach($payments as $pay)
                              @if($pay->check_voucher == $vouch->cv_ID)
                                  @foreach($paydetails as $det)
                                      @if($vouch->pay_ID == $det->payment_ID)
                                          @if($det->acccount_ID == $iacc->acccount_ID)
                                            var due = "" + '{{ $pay->due_date }}';
                                                  var now = $('#datengayon').val();

                                                  console.log("DATE NGAYON:" + $('#datengayon').val());
                                                  var incep_start = new Date('{{$iacc->inception_date}}');
                                                  var incep = new Date('{{$iacc->inception_date}}');
                                                  incep.setFullYear(incep.getFullYear() + 1);

                                                  if((parseDate(due).addDays(7).getTime() < parseDate(now).getTime()) && lapse == 0)
                                                  {
                                                    if( '{{ $pay->status }}' == 1 || '{{ $pay->status }}' == 4){
                                                      var p = 3; //lapsed
                                                      console.log(p);
                                                      var lapse=1;
                                                      console.log('{{$pay->or_number}}');
                                                    }
                                                  }

                                                  if(incep >= parseDate(now).getTime() && incep_start <= parseDate(now).getTime() && lapse == 0 && ('{{ $pay->status }}' == 0 || '{{ $pay->status }}' == 3)){
                                                        var p = 4; //active
                                                        console.log(p);
                                                        @foreach($clist as $list)
                                                            @if($iacc->client_ID == $list->client_ID)
                                                                @if($list->client_type == 1)
                                                                    var ind = 1;
                                                                @endif
                                                                @if($list->client_type == 2)
                                                                    var comp = 1;
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    }
                                          @endif
                                      @endif
                                  @endforeach
                              @endif
                          @endforeach
                          @endif
                      @endforeach
                      if(p == 4){
                            $("td.pno_{{ $iacc->policy_number }}").html('{{ $iacc->policy_number }}');
                            $("td.lname_{{ $iacc->policy_number }}").html('{{ $info->pinfo_last_name }}');
                            $("td.fname_{{ $iacc->policy_number }}").html('{{ $info->pinfo_first_name }}');
                            $("td.mname_{{ $iacc->policy_number }}").html('{{ $info->pinfo_middle_name }}');
                            $("td.cont_{{ $iacc->policy_number }}").html('{{ $info->pinfo_last_name}} {{$info->pinfo_first_name}} {{ $info->pinfo_middle_name }}');
                            @foreach($inscomp as $icomp) 
                                @if($icomp->comp_ID == $iacc->insurance_company) 
                                    $("td.inscomp_{{ $iacc->policy_number }}").html('{{$icomp->comp_name}}'); 
                                @endif
                            @endforeach
                            

                            @foreach($pInfo as $ainfo)
                             @foreach($sales as $agent)
                              @if($cli->client_sales_agent == $agent->agent_ID)
                               @if($agent->personal_info_ID == $ainfo->pinfo_ID)
                                $("td.agent_{{ $iacc->policy_number }}").html('{{ $ainfo->pinfo_last_name}} {{ $ainfo->pinfo_first_name}} {{ $ainfo->pinfo_middle_name }}');
                               @endif
                              @endif
                             @endforeach
                            @endforeach
                            var data = formatDate3('{{ $iacc->inception_date }}');
                            $("td.inc_{{ $iacc->policy_number }}").html(data);
                            var data1 = formatDate2('{{ $iacc->inception_date }}');
                            $("td.end_{{ $iacc->policy_number }}").html(data1);
                        }

        @endif
      @endif
     @endforeach
    @endif
   @endforeach
  @endif
 @endif
@endforeach
@endforeach

        };
    </script>

@endsection
