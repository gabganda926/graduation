@extends('pages.accounting-staff.master')

@section('title','Ledger - Transaction | i-Insure')

@section('transLedger','active')

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
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('/accounting-staff/transaction/ledger') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="/accounting-staff/transaction/ledger"><i class="material-icons">home</i> Ledger</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">add</i> New Entry</a></li>
                    </ol>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/quotation.png')}}" style="height: 50px; width: 50px;"></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Policy Number:</small></label>
                                            <select id = "policyno" name = "policyno" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" style = "display: none;">-- Select Policy Number --</option>
                                                  @foreach($voucher as $vouch)
                                                   @foreach($ptail as $dtail)
                                                    @if($vouch->pay_ID == $dtail->payment_ID)
                                                    @foreach($cliacc as $acc)
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
                                            <label><small>Account Status:</small></label>
                                            <input id = "acc_status" name = "acc_status" type="text" class="form-control" disabled="disable">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <form name = "entry" id = "entry" action = "/accounting-staff/transaction/ledger-entry/submit" method = "POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card" id="create">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/quotation.png')}}" style="height: 50px; width: 50px;"> <b> Create new entry </b></h3>
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
                        <div class="row clearfix">
                            <div class="col-md-4" style = "display: none;">
                                <input id = "insid" name = "insid" type="text" class="form-control" readonly="true">
                            </div>
                            <div class="col-md-4" style = "display: none;">
                                <input id = "pid" name = "pid" type="text" class="form-control" readonly="true">
                            </div>
                            <div class="col-md-4" style = "display: none;">
                                 <input id = "datengayon" name = "datengayon" type="datetime" class="form-control" >
                             </div>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Client:</small></label>
                                            <input id = "client" name = "client" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                    <div class="col-md-12">
                                        <label><b>Contact Details</b></label>
                                    </div>
                                </div>

                            <div id="individualClient">
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Cellphone Number:</small></label>
                                                <input id = "cpno" name = "cont_cpno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Cellphone Number (Alternate):</small></label>
                                                <input id = "cpno_1" name = "cont_cpno_1" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Telephone Number:</small></label>
                                                <input id = "telno" name = "cont_telno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Email:</small></label>
                                                <input id = "email" name = "cont_email" type="email" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="companyClient">
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Telephone Number:</small></label>
                                                <input id = "comp_telnum" name = "cont_telno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Fax Number:</small></label>
                                                <input id = "comp_fax" name = "cont_cpno_1" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Email:</small></label>
                                                <input id = "comp_email" name = "cont_telno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <label><b>Vehicle Details</b></label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Model Year:</small></label>
                                                <input id = "model_year" name = "model_year" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Model Make:</small></label>
                                                <input id = "model_make" name = "model_make" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Model Name:</small></label>
                                                <input id = "model_name" name = "model_name" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Market Value:</small></label>
                                                <input id = "model_value" name = "model_value" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Insurance Company:</small></label>
                                                <input id = "inscomp" name = "inscomp" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Inception Date:</small></label>
                                                <input id = "incept" name = "incept" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Bank:</small></label>
                                                <input id = "bank" name = "bank" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Agent:</small></label>
                                                <input id = "agent" name = "agent" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>PR No.:</small></label>
                                                <input id = "prno" name = "prno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>CV No.:</small></label>
                                                <input id = "cvno" name = "cvno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Basic Premium:</small></label>
                                                <input id = "basic_prem" name = "basic_prem" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Net Premium:</small></label>
                                                <input id = "net_prem" name = "net_prem" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Income:</small></label>
                                                <input id = "income" name = "income" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Commission:</small></label>
                                                <input id = "commission" name = "commission" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Remarks:</small></label>
                                                <input id = "remarks" name = "remarks" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "time" name = "time" type="text" class="form-control">
                                </div>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "inc" name = "inc" type="text" class="form-control">
                                </div>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "comm" name = "comm" type="text" class="form-control">
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <button type="button" id="subm" type="button"  class="btn btn-block bg-green waves-effect left" onclick = "
                                        document.getElementById('time').value = formatDate(new Date());
                                        document.getElementById('insid').value = getInsId();
                                        document.getElementById('pid').value = getPayId();
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
                                            $('#entry').submit();
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
                                            <span style="font-size: 15px;"> SUBMIT</span>
                                        </button>
                                    </div>
                                </div>
                        </div> <!-- end of body-->
                    </div> <!-- end of card-->
                </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        // var table = $('#details').DataTable( {
        //     "order": [[ 0, "desc" ]]
        // } );        
        // table.column( 7 ).visible( false );
        // $('#details').css('width', '100%');
        
        // $('#ex').DataTable( {
        //     "order": [[ 0, "desc" ]]
        // } );

        window.onload = function (){
            document.getElementById('create').style.display = 'none';
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
           $('#datengayon').val(today+ " " +f.toLocaleTimeString());
        }

        function show_Ind()
        {
            $('#individualClient').show(800);
            $('#companyClient').hide(800);
            $('#create').show(800);
        }

        function show_Comp()
        {
            $('#individualClient').hide(800);
            $('#companyClient').show(800);
            $('#create').show(800);
        }

        function hideAll()
        {
            $('#individualClient').hide(800);
            $('#companyClient').hide(800);
            $('#create').hide(800);
        }

        function getInsId(inid){
           inid = $('#insid').val();
           return inid;
        }

        function getPayId(clid){
           clid = $('#pid').val();
           return clid;
        }

      $('#policyno').on('change textInput input', function () {
            var lapse = 0;
            var p = 0;
            var ind = 0;
            var comp = 0;
            var already = 0;
            @foreach($cliacc as $insacc)
                if('{{$insacc->policy_number}}' == $('#policyno option:selected').val()){
                @foreach($clist as $list)
                    @if($insacc->account_ID == $list->client_ID)
                        @foreach($voucher as $vouch)
                            @if($insacc->account_ID == $vouch->cv_ID)
                            @foreach($payments as $pay)
                                @if($pay->check_voucher == $vouch->cv_ID)
                                    @foreach($ptail as $det)
                                        @if($vouch->pay_ID == $det->payment_ID)
                                            @if($det->acccount_ID == $insacc->acccount_ID)
                                                if('{{$insacc->policy_number}}' == $('#policyno option:selected').val()){
                                                    var due = "" + '{{ $pay->due_date }}';
                                                    var now = $('#datengayon').val();
                                                    var incep_start = new Date('{{$insacc->inception_date}}');
                                                    var incep = new Date('{{$insacc->inception_date}}');

                                                    incep.setFullYear(incep.getFullYear() + 1);
                                                    if((parseDate(due).addDays(7).getTime() < parseDate(now).getTime()) && lapse == 0 )
                                                    {
                                                        if( '{{ $pay->status }}' == 1 || '{{ $pay->status }}' == 4)
                                                        {
                                                            var p = 3; //lapsed
                                                            console.log(p);
                                                            var lapse=1;
                                                            console.log('{{$pay->or_number}}');
                                                        }
                                                    }   
                                                    @if($det->account_ID == $insacc->account_ID)
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
                                                    }
                                                    if(incep >= parseDate(now).getTime() && incep_start <= parseDate(now).getTime() && lapse == 0)
                                                    {
                                                        if ('{{ $pay->status }}' == 0 || '{{ $pay->status }}' == 3)
                                                        {
                                                        var p = 4; //active
                                                        console.log(p);
                                                        @foreach($clist as $list)
                                                            @if($insacc->client_ID == $list->client_ID)
                                                                @if($list->client_type == 1)
                                                                    var ind = 1;
                                                                @endif
                                                                @if($list->client_type == 2)
                                                                    var comp = 1;
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        @foreach($ledger as $le)
                                                            @if($le->account_ID == $insacc->account_ID)
                                                                var already = 1;
                                                            @endif
                                                        @endforeach
                                                        }
                                                    }
                                                }
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            @endif
                        @endforeach
                    @endif
                @endforeach
                }
                if('{{$insacc->policy_number}}' != $('#policyno option:selected').val()){
                    $('#acc_status').val("Account not found");
                    hideAll();
                }
            @endforeach

            if(p == 1){
                $('#acc_status').val("On payment");
                hideAll();
            }
            else if(p == 2){
                $('#acc_status').val("Expired");
                hideAll();
            }
            else if(p == 3){
                $('#acc_status').val("Lapsed");
                hideAll();
            }
            else if(p == 4 && already == 1){
                $('#acc_status').val("Active - Already in ledger");
            }
            else if(p == 4 && already == 0){
                $('#acc_status').val("Active");
                if(ind == 1){
                    show_Ind();

                    @foreach($cliacc as $ins)
                        if('{{$ins->policy_number}}' == $('#policyno option:selected').val()){
                            console.log("POLICYNUMBER: " + '{{$ins->policy_number}}');
                            @foreach($clist as $list)
                                @if($ins->client_ID == $list->client_ID)
                                    @foreach($cli as $client)
                                        @if($list->client_ID == $client->client_ID)
                                            @foreach($pinfo as $inf)
                                                @if($client->personal_info_ID == $inf->pinfo_ID)
                                                    $('#insid').val('{{ $ins->account_ID }}');
                                                    $('#client').val('{{ $inf->pinfo_last_name }}, {{ $inf->pinfo_first_name }} {{ $inf->pinfo_middle_name }}');
                                                    $('#cpno').val('{{ $inf->pinfo_cpnum_1 }}');
                                                    $('#cpno_1').val('{{ $inf->pinfo_cpnum_2 }}');
                                                    $('#telno').val('{{ $inf->pinfo_tpnum }}');
                                                    $('#email').val('{{ $inf->pinfo_mail}}');
                                                    @foreach($sales as $agent)
                                                        @if($client->client_sales_ID == $agent->agent_ID)
                                                            @foreach($pinfo as $info)
                                                                @if($agent->personal_info_ID == $info->pinfo_ID)
                                                                    $('#agent').val('{{ $info->pinfo_last_name }}' +", "+'{{ $info->pinfo_first_name }}' +" "+'{{ $info->pinfo_middle_name }}');
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                    $('#model_year').val('{{ $ins->vehicle_year }}');
                                                    $('#model_make').val('{{ $ins->vehicle_make_name }}');
                                                    $('#model_name').val('{{ $ins->vehicle_model_name }}');
                                                    $('#model_value').val('{{ $ins->vehicle_value }}');

                                                    var inception = '{{ $ins->inception_date }}'.split('-');
                                                    var dd = inception[2];
                                                    var mm = inception[1]; 
                                                    var year = parseInt(inception[0]) + 1;
                                                    var yyyy = year;
                                                    var iinception = inception[0]+'-'+mm+'-'+dd;
                                                    var einception = yyyy+'-'+mm+'-'+dd;

                                                    $('#incept').val(iinception +' to '+ einception);

                                                    @foreach($ptail as $det)
                                                        @if($det->account_ID == $ins->account_ID)  
                                                        var data1 = numberWithCommas({{ $det->basicpremium }});
                                                        $('#basic_prem').val('₱ ' + data1);

                                                        var data2 = numberWithCommas({{ $det->total }});
                                                        $('#net_prem').val('₱ ' + data2);
                                                        var inco = parseFloat({{ $det->total }}) - parseFloat({{ $det->basicpremium }});

                                                        $('#inc').val(inco);
                                                        $('#comm').val(inco);

                                                        $('#pid').val('{{ $det->payment_ID }}');

                                                        var data3 = numberWithCommas(inco);
                                                        $('#income').val('₱ ' + data3);
                                                        $('#commission').val('₱ ' + data3);

                                                            @foreach($bank as $bnk)
                                                                @if($bnk->bank_ID == $det->bank_ID)
                                                                    $('#bank').val('{{ $bnk->bank_name }}');
                                                                    @if($det->payment_ID >= 10)
                                                                        $('#prno').val('PR00{{ $det->payment_ID }}');
                                                                        $('#cvno').val('CV00{{ $det->payment_ID }}');
                                                                    @endif
                                                                    @if($det->payment_ID < 10)
                                                                        $('#prno').val('PR000{{ $det->payment_ID }}');
                                                                        $('#cvno').val('CV000{{ $det->payment_ID }}');
                                                                    @endif
                                                                    @if($det->payment_ID >= 100)
                                                                        $('#prno').val('PR0{{ $det->payment_ID }}');
                                                                        $('#cvno').val('CV0{{ $det->payment_ID }}');
                                                                    @endif
                                                                    @if($det->payment_ID >= 1000)
                                                                        $('#prno').val('PR{{ $det->payment_ID }}');
                                                                        $('#cvno').val('CV{{ $det->payment_ID }}');
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach

                                                    @foreach($comp as $insco)
                                                        @if($ins->insurance_company == $insco->comp_ID)
                                                            $('#inscomp').val('{{ $insco->comp_name }}');
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        }
                    @endforeach
                }
                if(comp == 1){
                    show_Comp();
                    @foreach($cliacc as $ins)
                        if('{{$ins->policy_number}}' == $('#policyno option:selected').val()){
                            console.log("POLICYNUMBER: " + '{{$ins->policy_number}}');
                            @foreach($clist as $list)
                                @if($ins->client_ID == $list->client_ID)
                                    @foreach($comp as $client)
                                        @if($list->client_ID == $client->comp_ID)
                                            $('#insid').val('{{ $ins->account_ID }}');
                                            $('#client').val('{{ $client->comp_name }}');
                                            $('#comp_telnum').val('{{ $client->comp_telnum }}');
                                            $('#comp_fax').val('{{ $client->comp_faxnum }}');
                                            $('#comp_email').val('{{ $client->comp_email }}');
                                            @foreach($sales as $agent)
                                                @if($client->comp_sales_agent == $agent->agent_ID)
                                                    @foreach($pinfo as $info)
                                                        @if($agent->personal_info_ID == $info->pinfo_ID)
                                                            $('#agent').val('{{ $info->pinfo_last_name }}' +", "+'{{ $info->pinfo_first_name }}' +" "+'{{ $info->pinfo_middle_name }}');
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            $('#model_year').val('{{ $ins->vehicle_year }}');
                                            $('#model_make').val('{{ $ins->vehicle_make_name }}');
                                            $('#model_name').val('{{ $ins->vehicle_model_name }}');
                                            var mar = numberWithCommas({{ $ins->vehicle_value }});
                                            $('#model_value').val('₱ ' + mar);

                                            var inception = '{{ $ins->inception_date }}'.split('-');
                                            var dd = inception[2];
                                            var mm = inception[1]; 
                                            var year = parseInt(inception[0]) + 1;
                                            var yyyy = year;
                                            var iinception = inception[0]+'-'+mm+'-'+dd;
                                            var einception = yyyy+'-'+mm+'-'+dd;

                                            $('#incept').val(iinception +' to '+ einception);

                                            @foreach($ptail as $det)
                                                @if($det->account_ID == $ins->account_ID)  
                                                var data1 = numberWithCommas({{ $det->basicpremium }});
                                                $('#basic_prem').val('₱ ' + data1);

                                                var data2 = numberWithCommas({{ $det->total }});
                                                $('#net_prem').val('₱ ' + data2);
                                                var inco = parseFloat({{ $det->total }}) - parseFloat({{ $det->basicpremium }});

                                                $('#inc').val(inco);
                                                $('#comm').val(inco);

                                                $('#pid').val('{{ $det->payment_ID }}');

                                                var data3 = numberWithCommas(inco);
                                                $('#income').val('₱ ' + data3);
                                                $('#commission').val('₱ ' + data3);

                                                    @foreach($bank as $bnk)
                                                        @if($bnk->bank_ID == $det->bank_ID)
                                                            $('#bank').val('{{ $bnk->bank_name }}');
                                                            @if($det->payment_ID >= 10)
                                                                $('#prno').val('PR00{{ $det->payment_ID }}');
                                                                $('#cvno').val('CV00{{ $det->payment_ID }}');
                                                            @endif
                                                            @if($det->payment_ID < 10)
                                                                $('#prno').val('PR000{{ $det->payment_ID }}');
                                                                $('#cvno').val('CV000{{ $det->payment_ID }}');
                                                            @endif
                                                            @if($det->payment_ID >= 100)
                                                                $('#prno').val('PR0{{ $det->payment_ID }}');
                                                                $('#cvno').val('CV0{{ $det->payment_ID }}');
                                                            @endif
                                                            @if($det->payment_ID >= 1000)
                                                                $('#prno').val('PR{{ $det->payment_ID }}');
                                                                $('#cvno').val('CV{{ $det->payment_ID }}');
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach

                                            @foreach($comp as $insco)
                                                @if($ins->insurance_company == $insco->comp_ID)
                                                    $('#inscomp').val('{{ $insco->comp_name }}');
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        }
                    @endforeach
                }
            }
         });
    </script>

@endsection