@extends('pages.accounting-staff.master')

@section('title','Payment - Transaction | i-Insure')

@section('transPayment','active')

@section('transNewPayment','active')

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
                <div class="col-md-12">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('/accounting-staff/transaction/payment') }}"><i class="material-icons">home</i> New Payment</a></li>
                    </ol>
                </div>
            </div>
            <div class="row clearfix">
                <!-- PAYMENT DETAILS -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card" id = "mainz">
                        <div class="header">
                            <h2>CHOOSE PAYMENT TYPE</h2>
                        </div>
                        <div class="body">
                         <form id = "payment" action = "/accounting-staff/transaction/payment-new/submit" method = "POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row clearfix">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px;" data-toggle="tooltip" data-placement="bottom" title="Pay using cash." onclick="
                                    $('#cashPay').show(800);
                                    $('#breakdown').show(800);
                                    $('#backCash').show(800);
                                    $('#checkPay').hide(800);
                                    $(this).parents('#mainz').hide(800);"><img src="{{ URL::asset ('images/icons/view-bill.png')}}" style="height: 50px; width: 50px;"> CASH</button>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px;" data-toggle="tooltip" data-placement="bottom" title="Pay using check." onclick="
                                    $('#cashPay').hide(800);
                                    $('#breakdown').show(800);
                                    $('#backCheck').show(800);
                                    $('#checkPay').show(800);
                                    $(this).parents('#mainz').hide(800);"><img src="{{ URL::asset ('images/icons/payment.png')}}" style="height: 50px; width: 50px;"> CHECK</button>
                                </div>
                            </div>
                          </div>
                    </div><!--end of card-->
                    <div id="backCheck">
                      <div class="row clearfix">
                        <div class="col-md-12">
                          <button type="button" class="btn btn-block bg-orange waves-effect left" onclick="
                            $('#mainz').show(800);
                            $('#checkPay').hide(800);
                            $('#breakdown').hide(800);
                            $(this).parents('#backCheck').hide(800);
                          "><span style="font-size: 15px;"> BACK</span>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="card" id = "checkPay">
                        <div class="header">
                            <h2>PAYMENT DETAILS - CHECK</h2>
                        </div>
                        <div class="body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Remittance Date:</small></label>
                                            <input id = "remittance_date_check" name = "remittance_date_check" type="datetime" class="form-control" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <!-- 
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Remittance Time:</small></label>
                                            <input id = "remittance_time" name = "remittance_time" type="time" class="form-control" required>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Policy Number:</small></label>
                                            <select id = "policy_number_check" name = "policy_number_check" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" style = "display: none;">-- Select Policy Number --</option>
                                                  @foreach($voucher as $vouch)
                                                   @foreach($ptail as $dtail)
                                                    @if($vouch->pay_ID == $dtail->payment_ID)
                                                    @foreach($insacc as $acc)
                                                     @if($dtail->account_ID == $acc->account_ID)
                                                    <option value = "{{$acc->policy_number}}">{{$acc->policy_number}}</option>
                                                     @endif
                                                    @endforeach
                                                    @endif
                                                   @endforeach
                                                  @endforeach
                                                </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Client:</small></label>
                                            <input id = "client_check" name = "client_check" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Bank:</small></label>
                                            <select id = "checknum_check" name = "checknum_check" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" style = "display: none;">-- Select Bank --</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Check Number:</small></label>
                                            <input id = "ch_check" name = "ch_check" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Amount:</small></label>
                                            <input id = "ch_check" name = "ch_check" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Payment for BOP Number:</small></label>
                                            <select id = "checknum_check" name = "checknum_check" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" style = "display: none;">-- Select BOP Number --</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Amount Paid:</small></label>
                                            <input id = "amount_paid" name = "amount_paid" type="number" min="1" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="col-md-12">
                                    <button type="button" class="btn btn-block bg-green waves-effect left" onclick = "
                                    $('#cashPay').hide(800);
                                    $(this).parents('#checkPay').hide(800);
                                    $('#mainz').show(800);
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
                                        $('#payment').submit();
                                      } else {
                                          swal({
                                          title: 'Cancelled',
                                          type: 'warning',
                                          timer: 500,
                                          showConfirmButton: false
                                          });
                                      }
                                    });
                                    ">
                                        <span style="font-size: 15px;"> UPDATE BOP VOUCHER</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div><!-- END OF CARD -->
                    <div id="backCash">
                      <div class="row clearfix">
                        <div class="col-md-12">
                          <button type="button" class="btn btn-block bg-orange waves-effect left" onclick="
                            $('#mainz').show(800);
                            $('#cashPay').hide(800);
                            $('#breakdown').hide(800);
                            $(this).parents('#backCash').hide(800);
                          "><span style="font-size: 15px;"> BACK</span>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="card" id="cashPay">
                        <div class="header">
                            <h2>PAYMENT DETAILS - CASH</h2>
                        </div>
                        <div class="body">
                         <form id = "payment" action = "/accounting-staff/transaction/payment-new/submit" method = "POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Remittance Date/Time:</small></label>
                                            <input id = "remittance_date" name = "remittance_date" type="datetime" class="form-control" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <!-- 
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Remittance Time:</small></label>
                                            <input id = "remittance_time" name = "remittance_time" type="time" class="form-control" required>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Policy Number:</small></label>
                                            <select id = "policy_number" name = "policy_number" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" style = "display: none;">-- Select Policy Number --</option>
                                                  @foreach($voucher as $vouch)
                                                   @foreach($ptail as $dtail)
                                                    @if($vouch->pay_ID == $dtail->payment_ID)
                                                    @foreach($insacc as $acc)
                                                     @if($dtail->account_ID == $acc->account_ID)
                                                    <option value = "{{$acc->policy_number}}">{{$acc->policy_number}}</option>
                                                     @endif
                                                    @endforeach
                                                    @endif
                                                   @endforeach
                                                  @endforeach
                                                </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Client:</small></label>
                                            <input id = "client" name = "client" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Payment for BOP Number:</small></label>
                                            <select id = "checknum" name = "checknum" class="form-control show-tick" data-live-search="true" readonly="true">
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Amount Due:</small></label>
                                            <input id = "amount_due" name = "amount_due" type="text" min="1" class="form-control" pattern="[A-Za-z'-]" required disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Amount Paid:</small></label>
                                            <input id = "amount_paid" name = "amount_paid" type="number" min="1" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Change:</small></label>
                                            <input id = "change" name = "change" type="text" min="1" class="form-control" pattern="[A-Za-z'-]" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="button" class="btn btn-block bg-green waves-effect left" id = "update" onclick = "
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
                                        $('#payment').submit();
                                      } else {
                                          swal({
                                          title: 'Cancelled',
                                          type: 'warning',
                                          timer: 500,
                                          showConfirmButton: false
                                          });
                                      }
                                    });
                                    ">
                                        <span style="font-size: 15px;"> UPDATE BOP VOUCHER</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                  </form>
                </div>
                <!-- END PAYMENT DETAILS -->
                <!-- BREAKDOWN -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card" id="breakdown">
                        <div class="header">
                            <h2>BREAKDOWN OF PAYMENT VOUCHER</h2>
                        </div>
                        <div class="body">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="vounum"><small>Bill No: </small></label> <!-- AUTO GENERATED -->
                                    <small><b><input type="text" id="billnum" class="form-control" readonly="true" style="font-size: 20px"></b></small>
                                </div>
                            </div>
                            
                            <div class="body table-responsive">
                                <table id = "checks" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>BOP No.</th>
                                            <th>Bank</th>
                                            <th>Due Date</th>
                                            <th>Amount Due</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <!-- <td>003234543</td>
                                            <td>Banco De Oro - Antipolo City</td>
                                            <td>July 13, 2017</td>
                                            <td>5, 000.00</td>
                                            <td><span class="label bg-green">paid</span></td>
                                            <td>091234567</td>
                                            <td><button type="button" class="btn bg-orange waves-effect" onclick="window.open('{{ URL::asset('/pdf/payment-receipt') }}')" style="position: right;"  data-toggle="tooltip" data-placement="left" title="Generate Receipt">
                                            <i class="material-icons">picture_as_pdf</i><span style="font-size: 15px;"></span>
                                            </button></td> -->
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# BREAKDOWN -->
            </div>
        </div>

        <form id = "gen" action = "/pdf/payment-receipt" method = "POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type = "hidden" id = "ID" name = "ID"/>
        </form>
    </section>

    <script type="text/javascript">
        window.onload = function() {
          document.getElementById('cashPay').style.display = 'none';
          document.getElementById('checkPay').style.display = 'none';
          document.getElementById('backCash').style.display = 'none';
          document.getElementById('backCheck').style.display = 'none';
          document.getElementById('breakdown').style.display = 'none';
        };
    </script>

    <script>
        $('#update').attr('disabled', true);
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();


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

        if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = yyyy+'-'+mm+'-'+dd;

        var myVar1=setInterval(function(){myTimer1()},1000);

        function myTimer1() {
            var f = new Date();
           $('#remittance_date').val(today+ " " +f.toLocaleTimeString());
        }

        var myVar2=setInterval(function(){myTimer2()},1000);

        function myTimer2() {
            var f = new Date();
           $('#remittance_date_check').val(today+ " " +f.toLocaleTimeString());
        }

        

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

        function formatDate2(date)
        {
          var monthNames = [
            "January", "February", "March",
            "April", "May", "June", "July",
            "August", "September", "October",
            "November", "December"
          ];

          var arr = date.split('-');

          if((arr[1] - 1) < 12)
          {
              var day = arr[2];
              var monthIndex = arr[1] - 1;
              var year = arr[0];
          }
          else
          {
              var day = arr[2];
              var monthIndex = arr[1] - 13;
              var year = arr[0];
          }
          return monthNames[monthIndex] + ' ' + day + ', ' + year;
        }

        $('#policy_number').on('change textInput input', function () {
            var newOptions = [];
            var data = 0;
            var bank = '';
            var client = '';

            @foreach($voucher as $vouch)
             @foreach($ptail as $dtail)
              @if($vouch->pay_ID == $dtail->payment_ID)
                @if($vouch->pay_ID >= 10)   
                  $('#billnum').val('BILL00{{$vouch->pay_ID}}');
                @endif
                @if($vouch->pay_ID < 10)
                    $('#billnum').val('BILL000{{$vouch->pay_ID}}');
                @endif
                @if($vouch->pay_ID >= 100)
                    $('#billnum').val('BILL0{{$vouch->pay_ID}}');
                @endif
                @if($vouch->pay_ID >= 1000)
                    $('#billnum').val('BILL{{$vouch->pay_ID}}');
                @endif
              @foreach($insacc as $acc)
               @if($dtail->account_ID == $acc->account_ID)
                if('{{$acc->policy_number}}' == $('#policy_number option:selected').val())
                {
                   @foreach($bank as $bnk)
                    @foreach($address as $add)
                     @if($bnk->bank_add_ID == $add->add_ID)
                      if('{{$bnk->bank_ID}}' == '{{$dtail->bank_ID}}')
                      {
                         bank = '{{$bnk->bank_name}} - {{$add->add_city}}';
                      }
                     @endif
                    @endforeach
                   @endforeach

                     @foreach($individual as $client)
                      @if($acc->client_ID == $client->client_ID)
                       @foreach($pinfo as $info)
                        @if($client->personal_info_ID == $info->pinfo_ID)
                         $('#client').val('{{$info->pinfo_last_name.", ".$info->pinfo_first_name." ".$info->pinfo_middle_name}}');
                        @endif
                       @endforeach
                      @endif
                     @endforeach

                     @foreach($company as $comp)
                      @if($acc->client_ID == $comp->comp_ID)
                       $('#client').val('{{$comp->comp_name}}');
                      @endif
                     @endforeach
                }
               @endif
              @endforeach
              @endif
             @endforeach
            @endforeach

            @foreach($voucher as $vouch)
             @foreach($ptail as $dtail)
              @if($vouch->pay_ID == $dtail->payment_ID)
              @foreach($insacc as $acc)
               @if($dtail->account_ID == $acc->account_ID)
                @foreach($payments as $pay)
                 @if($vouch->cv_ID == $pay->check_voucher)
                  @if($pay->status == 1)
                   if('{{$acc->policy_number}}' == $('#policy_number option:selected').val())
                   newOptions[data] = { check_num : "{{ $pay->payment_ID }}", due_date : "{{\Carbon\Carbon::parse($pay->due_date)->format('Y-m-d')}}", amount : "{{$pay->amount}}" };
                   data += 1; 
                  @endif
                 @endif
                @endforeach
               @endif
              @endforeach
              @endif
             @endforeach
            @endforeach

            $('#check option:gt(0)').remove();
            $.each(newOptions, function(key,value) {
              if(value)
              {
                var option = '<option value="'+value.check_num+'" data-amount="'+value.amount+'">BOP'+pad(value.check_num, 4)+'</option>';
                $('#checknum:last').append(option);
              }
            });
            $("#checknum").prop("selectedIndex", -1);
            $('#checknum').selectpicker('refresh');
            $('#checknum').val("");

            newOptions = [];
            data = 0;
            $('#checks tbody tr').remove();


            @foreach($voucher as $vouch)
             @foreach($ptail as $dtail)
              @if($vouch->pay_ID == $dtail->payment_ID)
              @foreach($insacc as $acc)
               @if($dtail->account_ID == $acc->account_ID)
                @foreach($payments as $pay)
                 @if($vouch->cv_ID == $pay->check_voucher)
                 if('{{$acc->policy_number}}' == $('#policy_number option:selected').val())
                 newOptions[data] = { checknum : "{{ $pay->payment_ID }}", due_date : "{{\Carbon\Carbon::parse($pay->due_date)->format('Y-m-d')}}", amount : "{{$pay->amount}}", status : "{{$pay->status}}" };
                 data += 1;
                 @endif
                @endforeach
               @endif
              @endforeach
              @endif
             @endforeach
            @endforeach

            var lapse = 0;
            $.each(newOptions, function(key,value) {
              if(value)
              {
              if((parseDate(value.due_date).addDays(7).getTime() < parseDate(today).getTime()) && lapse == 0 && value.status == 1)
                lapse = 1;
              if(value.status == 0)
              var option = '<tr><td>BOP'+pad(value.checknum, 4)+'</td><td>'+bank+'</td><td>'+formatDate2(value.due_date)+'</td><td>₱'+numberWithCommas(Math.round(value.amount * 100) / 100)+'</td><td><span class="label bg-green">paid</span></td></tr>';
              if(value.status == 1)
              var option = '<tr><td>BOP'+pad(value.checknum, 4)+'</td><td>'+bank+'</td><td>'+formatDate2(value.due_date)+'</td><td>₱'+numberWithCommas(Math.round(value.amount * 100) / 100)+'</td><td><span class="label bg-blue">to be paid</span></td></tr>';
              if(value.status == 3)
              var option = '<tr><td>BOP'+pad(value.checknum, 4)+'</td><td>'+bank+'</td><td>'+formatDate2(value.due_date)+'</td><td>₱'+numberWithCommas(Math.round(value.amount * 100) / 100)+'</td><td><span class="label bg-red">late</span></tr>';
              if(lapse == 1)
              {
                var option = '<tr><td>BOP'+pad(value.checknum, 4)+'</td><td>'+bank+'</td><td>'+formatDate2(value.due_date)+'</td><td>₱'+numberWithCommas(Math.round(value.amount * 100) / 100)+'</td><td><span class="label bg-red">lapse</span></tr>';
              }
                
              $('#checks tbody').append(option);
              }
            });

            $('#checknum').on('change', function(){
              var amount = parseFloat(Math.round($('#checknum option:selected').data('amount') * 100)/100);
              $('#amount_due').val('₱ ' + numberWithCommas(amount));
            });

            $('#amount_paid').on('change textInput input', function(){
              var amount_due = $('#amount_due').val().replace(/[^0-9\.]/g,'');
              var amount_paid = $(this).val()
              console.log($('#amount_paid').val());
              var change = amount_paid - amount_due;
              if(change >= 0)
              {
                $('#change').val('₱ ' + numberWithCommas(Math.round(change * 100)/100));
                $('#update').attr('disabled', false);
              }
              else
              {
                $('#change').val('Amount Paid should be Higher than the Amound Due');
                $('#update').attr('disabled', true);
              }
            });
        });
            $('.generate').on('click', function(){
              $('#ID').val($(this).data('id'));
              $('#gen').submit();
            }); 
    
    </script>
@endsection