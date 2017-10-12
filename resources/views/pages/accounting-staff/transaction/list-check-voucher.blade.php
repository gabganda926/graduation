@extends('pages.accounting-staff.master')

@section('title','Check Vouchers - Transaction | i-Insure')

@section('transList','active')

@section('transCV','active')

@section('body')
    <script>
        function numberWithCommas(x) {
            x = x + '';
            num = x.split('.');
            variable = num[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            output = variable + "." + num[1];
            if (!num[1])
            {
                output = variable;
            }
            return output;
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
                        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Check Vouchers</a></li>
                    </ol>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/view-bill.png')}}" style="height: 50px; width: 50px;"> <b> Check Vouchers </b></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-4" style = "display: none;">
                                <input id = "cvid" name = "cvid" type="text" class="form-control" readonly="true">
                            </div>
                            <div class="col-md-4" style = "display: none;">
                                 <input id = "datengayon" name = "datengayon" type="datetime" class="form-control" >
                             </div>
                        </div>
                        <div class="body">
                            <table id="ex" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>CV Number</th>
                                        <th>Policy Number</th>
                                        <th>Client</th>
                                        <th>Total Premium</th>
                                        <th>Status</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cvouch as $cv)
                                      <div style = "display:none;">
                                        {{$total = 0}}
                                        @foreach($payments as $payz)
                                         @if($payz->check_voucher == $cv->cv_ID)
                                          {{$total = $total + $payz->amount}}
                                         @endif
                                        @endforeach
                                      </div>
                                    <tr>
                                        <td>@if($cv->cv_ID >= 10)
                                                CV00{{ $cv->cv_ID }}
                                            @endif
                                            @if($cv->cv_ID < 10)
                                                CV000{{ $cv->cv_ID }}
                                            @endif
                                            @if($cv->cv_ID >= 100)
                                                CV0{{ $cv->cv_ID }}
                                            @endif
                                            @if($cv->cv_ID >= 1000)
                                                CV{{ $cv->cv_ID }}
                                            @endif
                                        </td>
                                        <td>@foreach($payDet as $pdet)
                                                @if($cv->pay_ID == $pdet->payment_ID)
                                                    @foreach($cliacc as $insacc)
                                                        @if($pdet->account_ID == $insacc->account_ID)
                                                            {{ $insacc->policy_number }}
                                        </td>
                                        <td>                @foreach($clilist as $clist)
                                                                @if($clist->client_type == 1)
                                                                @if($insacc->client_ID == $clist->client_ID)
                                                                    @foreach($client as $cli)
                                                                        @if($clist->client_ID == $cli->client_ID)
                                                                            @foreach($pInfo as $pinfo)
                                                                                @if($cli->personal_info_ID == $pinfo->pinfo_ID)
                                                                                {{ $pinfo->pinfo_last_name}}, {{$pinfo->pinfo_first_name}} {{$pinfo->pinfo_middle_name }}
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                                @endif
                                                                @if($clist->client_type == 2)
                                                                @if($insacc->client_ID == $clist->client_ID)
                                                                    @foreach($company as $comp)
                                                                        @if($clist->client_ID == $comp->comp_ID)
                                                                            {{ $comp->comp_name }}
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                                @endif
                                                            @endforeach    
                                        </td>
                                        <td>
                                         <script>
                                            var data = numberWithCommas('{{$total}}'); document.write("₱ " + data);
                                         </script>
                                        </td>
                                        <td class="statt_{{ $insacc->policy_number }}"></td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        <td>
                                            @foreach($payDet as $pdet)
                                                @if($cv->pay_ID == $pdet->payment_ID)
                                                    @foreach($cliacc as $insacc)
                                                        @if($pdet->account_ID == $insacc->account_ID)
                                                            @foreach($clilist as $clist)
                                                                @if($clist->client_type == 1)
                                                                @if($insacc->client_ID == $clist->client_ID)
                                                                    @foreach($client as $cli)
                                                                        @if($clist->client_ID == $cli->client_ID)
                                                                            @foreach($pInfo as $pinfo)
                                                                                @if($cli->personal_info_ID == $pinfo->pinfo_ID)
                                                                                <button type="button" class="btn bg-orange waves-effect" data-cv=" {{ $cv->cv_ID }} " data-pinf=" {{$pinfo->pinfo_ID}} " data-acc="{{ $insacc->account_ID }}" onclick="window.open('{{ URL ('/pdf/check-voucher/' .$cv->cv_ID. '/' .$pinfo->pinfo_ID. '/' .$insacc->account_ID) }}')" style="position: right;"  data-toggle="tooltip" data-placement="left" title="Generate PDF">
                                                                                <i class="material-icons">picture_as_pdf</i><span style="font-size: 15px;"></span>
                                                                                </button>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                                @endif
                                                                @if($clist->client_type == 2)
                                                                @if($insacc->client_ID == $clist->client_ID)
                                                                    @foreach($company as $comp)
                                                                        @if($clist->client_ID == $comp->comp_ID)
                                                                            <button type="button" id="gen" data-or=" {{ $cv->cv_ID }} " data-pinf=" {{$comp->comp_ID}} " data-acc="{{ $insacc->account_ID }}" onclick="window.open('{{ URL ('/pdf/check-voucher-comp/' .$cv->cv_ID. '/' .$comp->comp_ID. '/' .$insacc->account_ID) }}')" class="btn bg-orange waves-effect" style="position: right;" data-toggle="tooltip" data-placement="left" title="Generate Receipt">
                                                                            <i class="material-icons">picture_as_pdf</i><span style="font-size: 15px;"></span>
                                                                            </button>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                                @endif
                                                            @endforeach    
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach

                                        </td>
                                    </tr>              
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        var table = $('#details').DataTable( {
            "order": [[ 0, "desc" ]]
        } );        
        table.column( 7 ).visible( false );
        $('#details').css('width', '100%');
        
        $('#ex').DataTable( {
            "order": [[ 0, "desc" ]]
        } );
    </script>

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
        
        @foreach($clilist as $list)
         @if($list->client_type == 1)         
          @foreach($client as $cli)
           @if($list->client_ID == $cli->client_ID)
            @if($list->del_flag == 0)
             @foreach($cliacc as $iacc)
              @if($cli->client_ID == $iacc->client_ID)
               @foreach($pInfo as $info)
                @if($cli->personal_info_ID == $info->pinfo_ID)
                    var lapse = 0;
                      var p = 0;
                      var ind = 0;
                      var comp = 0;
                        @foreach($cvouch as $vouch)
                          @if($iacc->account_ID == $vouch->cv_ID)
                          @foreach($payments as $pay)
                              @if($pay->check_voucher == $vouch->cv_ID)
                                  @foreach($payDet as $det)
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
                                                        @foreach($clilist as $list)
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
          @endif
         @endforeach

         @foreach($clilist as $list2)
          @if($list2->client_type == 2)
            @foreach($company as $client)
                @if($list2->client_ID == $client->comp_ID)
                    @foreach($cliacc as $iacc)
                        @if($list2->client_ID == $iacc->client_ID)
                            var lapse = 0;
                      var p = 0;
                      var ind = 0;
                      var comp = 0;
                        @foreach($cvouch as $vouch)
                          @if($iacc->account_ID == $vouch->cv_ID)
                          @foreach($payments as $pay)
                              @if($pay->check_voucher == $vouch->cv_ID)
                                  @foreach($payDet as $det)
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
                                                        @foreach($clilist as $list3)
                                                            @if($iacc->client_ID == $list3->client_ID)
                                                                @if($list3->client_type == 1)
                                                                    var ind = 1;
                                                                @endif
                                                                @if($list3->client_type == 2)
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
         @endforeach

      };

    </script>

@endsection