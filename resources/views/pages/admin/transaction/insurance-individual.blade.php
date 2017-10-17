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
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/insurance-individual.png')}}" style="height: 50px; width: 50px;"> Insurance Accounts - Individual Client</h3>
                             
                            <ul class="header-dropdown m-r--5">
                                <li><button type="button" class="btn bg-red waves-effect right" style="position: right;" onclick="window.document.location='{{ URL::asset('admin/transaction/insurance-expiring-accounts-individual') }}';" data-toggle="tooltip" data-placement="bottom" title="View expiring accounts">
                                    <i class="material-icons">feedback</i><span style="font-size: 15px;"></span>
                                </button></li>
                            </ul>
                        <form id = "display" action = "/admin/transaction/insurance-details-individual" method = "POST" style = "display: none;">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "id" name = "id" type="text" class="form-control">
                                 <input id = "datengayon" name = "datengayon" type="datetime" class="form-control" >
                             </div>
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "acc_id" name = "acc_id" type="text" class="form-control">
                             </div>
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "pay_id" name = "pay_id" type="text" class="form-control">
                             </div>
                        </form>
                        <form id = "gen_indi" action = "/pdf/insurance/form/individual" method = "GET" style = "display: none;">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "id1" name = "id1" type="text" class="form-control">
                                 <input id = "datengayon1" name = "datengayon1" type="datetime" class="form-control" >
                             </div>
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "acc_id1" name = "acc_id1" type="text" class="form-control">
                             </div>
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "pay_id1" name = "pay_id1" type="text" class="form-control">
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
                                        <th class="col-md-1">Status</th>
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
                                            <tr>
                                                <td>{{ $iacc->policy_number }}</td>
                                                <td><img src="{!! '/image/client/'.$info->pinfo_picture !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></td>
                                                <td>{{ $info->pinfo_last_name }}</td>
                                                <td>{{ $info->pinfo_first_name }}</td>
                                                <td>{{ $info->pinfo_middle_name }}</td>
                                                <td>
                                                @foreach($inscomp as $icomp)
                                                 @if($icomp->comp_ID == $iacc->insurance_company)
                                                  {{$icomp->comp_name}}
                                                 @endif
                                                @endforeach
                                                </td>
                                                <td>
                                                @foreach($pInfo as $ainfo)
                                                 @foreach($sales as $agent)
                                                  @if($cli->client_sales_ID == $agent->agent_ID)
                                                   @if($agent->personal_info_ID == $ainfo->pinfo_ID)
                                                    {{ $ainfo->pinfo_last_name.", ".$ainfo->pinfo_first_name." ".$ainfo->pinfo_middle_name }}
                                                   @endif
                                                  @endif
                                                 @endforeach
                                                @endforeach
                                                </td>
                                                <td id = 'inc_{{$iacc->account_ID}}'>
                                                 <script>
                                                    var data = formatDate('{{ $iacc->inception_date }}'); $('#inc_{{$iacc->account_ID}}').text(data);
                                                 </script>
                                                </td>
                                                <td id = 'exp_{{$iacc->account_ID}}'>
                                                 <script>
                                                    var data = formatDate2('{{ $iacc->inception_date }}'); $('#exp_{{$iacc->account_ID}}').text(data);
                                                 </script>
                                                </td>
                                                <td class="statt_{{ $iacc->policy_number }}">
                                                </td>
                                                <td>
                                                  @foreach($paydetails as $bpay)
                                                   @if($bpay->account_ID == $iacc->account_ID)
                                                   <button form = "display" type="submit" class="btn bg-light-blue waves-effect" data-id = "{{ $cli->client_ID }}" data-acc = "{{$iacc->account_ID}}" data-pay = "{{$bpay->payment_ID}}" onclick="
                                                    $('#id').val($(this).data('id')); $('#acc_id').val($(this).data('acc')); $('#pay_id').val($(this).data('pay'));" data-toggle="tooltip" data-placement="left" title="View account details."><i class="material-icons">remove_red_eye</i>
                                                    </button>
                                                      <button form = "gen_indi" type="submit"  class="btn bg-orange waves-effect" style="position: right;" data-toggle="tooltip" data-placement="left" title="Generate Form" data-id = "{{ $cli->client_ID }}" data-acc = "{{$iacc->account_ID}}" data-pay = "{{$bpay->payment_ID}}" onclick="
                                                  $('#id1').val($(this).data('id')); $('#acc_id1').val($(this).data('acc')); $('#pay_id1').val($(this).data('pay'));">
                                                        <i class="material-icons">picture_as_pdf</i><span style="font-size: 15px;"></span>
                                                        </button>
                                                   @endif
                                                  @endforeach
                                                </td>
                                            </tr>
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
      window.onload = function (){

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
                  var lapse = 0;
                      var p = 0;
                      var ind = 0;
                      var comp = 0;
                        @foreach($voucher as $vouch)
                          @if($iacc->account_ID == $vouch->cv_ID)
                          @foreach($payments as $pay)
                              @if($pay->check_voucher == $vouch->cv_ID)
                                  @foreach($paydetails as $det)
                                      @if($vouch->pay_ID == $det->payment_ID)
                                          @if($det->acccount_ID == $iacc->acccount_ID)
                                                  console.log("SIGE");
                                                  var due = "" + '{{ $pay->due_date }}';
                                                  var now = $('#datengayon').val();

                                                  console.log("DATE NGAYON:" + $('#datengayon').val());
                                                  console.log(""+due);
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
                                                  @if($det->account_ID == $iacc->account_ID)
                                                  if(incep_start > parseDate(now).getTime() && lapse==0){
                                                        if('{{ $pay->status }}' == 1 || '{{ $pay->status }}' == 3 || '{{ $pay->status }}' == 0){
                                                                var p = 1; //on payment
                                                                console.log(p);
                                                        }
                                                    }
                                                  @endif
                                                  if(incep < parseDate(now).getTime() && lapse==0){
                                                      var p = 2; //expired
                                                      console.log(p);
                                                      console.log(now);
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

                      if(p == 1){
                            $("td.statt_{{ $iacc->policy_number }}").html('<span class="label bg-orange">on payment</span>');
                        }
                        else if(p == 2){
                            $("td.statt_{{ $iacc->policy_number }}").html('<span class="label bg-red">expired</span>');
                        }
                        else if(p == 3){
                            $("td.statt_{{ $iacc->policy_number }}").html('<span class="label bg-red">lapsed</span>');
                        }
                        else if(p == 4){
                            $("td.statt_{{ $iacc->policy_number }}").html('<span class="label bg-green">active</span>');
                          }
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
