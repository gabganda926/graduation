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
                <div class="col-md-12">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Ledger</a></li>
                    </ol>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/quotation.png')}}" style="height: 50px; width: 50px;"> <b> Ledger </b></h3>
                        <ul class="header-dropdown m-r--5">
                            <li>
                                <button id = "addbtn" class="btn bg-blue waves-effect" onclick="window.document.location='{{ URL::asset('/accounting-staff/transaction/ledger-entry') }}';">
                                    <i class="material-icons">note_add</i>
                                    <span>New Entry</span>
                                </button>
                            </li>
                        </ul>

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
                            <div class="body table-responsive">
                            <table id="ex" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Ledger ID</th>
                                        <th>Entry Date</th>
                                        <th>Assured Name</th>
                                        <th>Contact</th>
                                        <th>Model Details</th>
                                        <th>Value</th>
                                        <th>Insurance Company</th>
                                        <th>Policy Number</th>
                                        <th>PR No.</th>
                                        <th>CV No.</th>
                                        <th>Agent</th>
                                        <th>Bank</th>
                                        <th>Inception Date</th>
                                        <th>Basic Premium</th>
                                        <th>Net Premium</th>
                                        <th>Income</th>
                                        <th>Commission</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ledger as $le)
                                        @foreach($cliacc as $ins)
                                                @if($le->account_ID == $ins->account_ID)
                                                    @foreach($clist as $list)
                                                        @if($ins->client_ID == $list->client_ID)
                                    <tr>
                                        <td>
                                            @if($le->payment_ID >= 10)
                                                CIS-{{ \Carbon\Carbon::parse($le->created_at)->format("Y") }}-00{{ $le->payment_ID }}
                                            @endif
                                            @if($le->payment_ID < 10)
                                                CIS-{{ \Carbon\Carbon::parse($le->created_at)->format("Y") }}-000{{ $le->payment_ID }}
                                            @endif
                                            @if($le->payment_ID >= 100)
                                                CIS-{{ \Carbon\Carbon::parse($le->created_at)->format("Y") }}-0{{ $le->payment_ID }}
                                            @endif
                                            @if($le->payment_ID >= 1000)
                                                CIS-{{ \Carbon\Carbon::parse($le->created_at)->format("Y") }}-{{ $le->payment_ID }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($le->created_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($le->created_at)->format("l, h:i:s A").")" }}
                                        </td>
                                        <td>
                                                            @if($list->client_type == 2) <!-- COMPANY -->
                                                                @foreach($comp as $client)
                                                                    @if($list->client_ID == $client->comp_ID)
                                                                        {{ $client->comp_name }}
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                            @if($list->client_type == 1) <!-- INDIVIDUAL -->
                                                                @foreach($cli as $client)
                                                                    @if($list->client_ID == $client->client_ID)
                                                                        @foreach($pinfo as $inf)
                                                                            @if($client->personal_info_ID == $inf->pinfo_ID)
                                                                                {{ $inf->pinfo_last_name }}, {{ $inf->pinfo_first_name }} {{ $inf->pinfo_middle_name }}
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                        </td>
                                        <td>
                                                            @if($list->client_type == 2) <!-- COMPANY -->
                                                                @foreach($comp as $client)
                                                                    @if($list->client_ID == $client->comp_ID)
                                                                    <ul>
                                                                        @if($client->comp_telnum != null)
                                                                            <li>{{ $client->comp_telnum }} </li>
                                                                        @endif
                                                                        @if($client->comp_faxnum != null)
                                                                            <li>{{ $client->comp_faxnum }} </li>
                                                                        @endif
                                                                        @if($client->comp_email != null)
                                                                            <li>{{ $client->comp_email }}</li>
                                                                        @endif
                                                                    </ul>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                            @if($list->client_type == 1) <!-- INDIVIDUAL -->
                                                                @foreach($cli as $client)
                                                                    @if($list->client_ID == $client->client_ID)
                                                                        @foreach($pinfo as $inf)
                                                                            @if($client->personal_info_ID == $inf->pinfo_ID)
                                                                                <ul>
                                                                                    @if($inf->pinfo_cpnum_1 != null)
                                                                                        <li>{{ $inf->pinfo_cpnum_1 }}</li>
                                                                                    @endif
                                                                                    @if($inf->pinfo_cpnum_2 != null)
                                                                                        <li>{{ $inf->pinfo_cpnum_2 }} </li>
                                                                                    @endif
                                                                                    @if($inf->pinfo_tpnum != null)
                                                                                        <li>{{ $inf->pinfo_tpnum }}</li>
                                                                                    @endif
                                                                                    @if($inf->pinfo_mail != null)
                                                                                        <li>{{ $inf->pinfo_mail }}</li>
                                                                                    @endif
                                                                                </ul>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        
                                        </td>
                                        <td>
                                            {{ $ins->vehicle_year }} {{ $ins->vehicle_make_name }} {{ $ins->vehicle_model_name }}
                                        </td>
                                        <td>
                                            <script> var data = numberWithCommas({{ $ins->vehicle_value }}); document.write("₱" + data);</script>
                                        </td>
                                        <td>
                                            @foreach($comp as $insco)
                                                @if($ins->insurance_company == $insco->comp_ID)
                                                    {{ $insco->comp_name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $ins->policy_number }}
                                        </td>
                                        <td>
                                            @foreach($ptail as $det)
                                                @if($det->account_ID == $ins->account_ID) 
                                                    @foreach($bank as $bnk)
                                                        @if($bnk->bank_ID == $det->bank_ID)
                                                            @if($det->payment_ID >= 10)
                                                                PR00{{ $det->payment_ID }}
                                                            @endif
                                                            @if($det->payment_ID < 10)
                                                                PR000{{ $det->payment_ID }}
                                                            @endif
                                                            @if($det->payment_ID >= 100)
                                                                PR0{{ $det->payment_ID }}
                                                            @endif
                                                            @if($det->payment_ID >= 1000)
                                                                PR{{ $det->payment_ID }}
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($ptail as $det)
                                                @if($det->account_ID == $ins->account_ID) 
                                                    @foreach($bank as $bnk)
                                                        @if($bnk->bank_ID == $det->bank_ID)
                                                            @if($det->payment_ID >= 10)
                                                                CV00{{ $det->payment_ID }}
                                                            @endif
                                                            @if($det->payment_ID < 10)
                                                                CV000{{ $det->payment_ID }}
                                                            @endif
                                                            @if($det->payment_ID >= 100)
                                                                CV0{{ $det->payment_ID }}
                                                            @endif
                                                            @if($det->payment_ID >= 1000)
                                                                CV{{ $det->payment_ID }}
                                                            @endif                            
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>@if($list->client_type == 2) <!-- COMPANY -->
                                                @foreach($sales as $agent)
                                                    @if($client->comp_sales_agent == $agent->agent_ID)
                                                        @foreach($pinfo as $info)
                                                            @if($agent->personal_info_ID == $info->pinfo_ID)
                                                                {{ $info->pinfo_last_name }}, {{ $info->pinfo_first_name }} {{ $info->pinfo_middle_name }}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if($list->client_type == 1) <!-- INDIVIDUAL -->
                                                @foreach($sales as $agent)
                                                    @if($client->client_sales_ID == $agent->agent_ID)
                                                        @foreach($pinfo as $info)
                                                            @if($agent->personal_info_ID == $info->pinfo_ID)
                                                                {{ $info->pinfo_last_name }}, {{ $info->pinfo_first_name }} {{ $info->pinfo_middle_name }}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @foreach($ptail as $det)
                                                @if($det->account_ID == $ins->account_ID)
                                                    @foreach($bank as $bnk)
                                                        @if($bnk->bank_ID == $det->bank_ID)
                                                            {{ $bnk->bank_name }}
                                                        @endif
                                                    @endforeach 
                                                @endif  
                                            @endforeach     
                                        </td>
                                        <td>
                                            <script>
                                                var inception = '{{ $ins->inception_date }}'.split('-');
                                                var dd = inception[2];
                                                var mm = inception[1]; 
                                                var year = parseInt(inception[0]) + 1;
                                                var yyyy = year;
                                                var iinception = inception[0]+'-'+mm+'-'+dd;
                                                var einception = yyyy+'-'+mm+'-'+dd;

                                                document.write(iinception + " to " +einception)
                                            </script>
                                        </td>
                                        <td>
                                            @foreach($ptail as $det)
                                                @if($det->account_ID == $ins->account_ID)
                                                    <script type="text/javascript">
                                                        var data1 = numberWithCommas({{ $det->basicpremium }});
                                                        document.write("₱" + data1);
                                                    </script>
                                        </td>
                                        <td>        
                                                    <script type="text/javascript">
                                                        var data2 = numberWithCommas({{ $det->total }});
                                                        document.write("₱" + data2);
                                                    </script>
                                                @endif
                                            @endforeach                         
                                        </td>
                                        <td>
                                            <script type="text/javascript">
                                                var data3 = numberWithCommas({{ $le->income }});
                                                document.write("₱" + data3);
                                            </script>
                                        </td>
                                        <td>
                                            <script type="text/javascript">
                                                var data4 = numberWithCommas({{ $le->commission }});
                                                document.write("₱" + data4);
                                            </script>
                                        </td>
                                        <td>
                                            {{ $le->remarks }}
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
                        </div>
                    </div>
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

      };

    </script>

@endsection