@extends('pages.accounting-staff.master')

@section('title','Payment - Transaction | i-Insure')

@section('transPayment','active')

@section('transListPay','active')

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
                        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Payment</a></li>
                    </ol>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/view-bill.png')}}" style="height: 50px; width: 50px;"> <b> Payments </b></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <form id = "display" action = "/pdf/payment-receipt" method = "POST" style = "display: none;">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "or" name = "or" type="text" class="form-control">
                             </div>
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "acc_id" name = "acc_id" type="text" class="form-control">
                             </div>
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "info_id" name = "info_id" type="text" class="form-control">
                             </div>
                        </form>
                        <div class="body">
                            <div class="table-responsive">
                            <table id="ex" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Remittance Date</th>
                                        <th class="col-md-1">OR No.</th>
                                        <th class="col-md-1">Policy No.</th>
                                        <th>Client</th>
                                        <th>Bank</th>
                                        <th>BOP No.</th>
                                        <th>Bill No.</th>
                                        <th>Amount Due</th>
                                        <th>Amount Paid</th>
                                        <th>Change</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($plist as $list)
                                    @foreach($cvouch as $vouch)
                                    @if($list->check_voucher == $vouch->cv_ID)
                                    @if($list->status != 1)
                                    <tr>

                                        <td> {{ \Carbon\Carbon::parse($list->paid_date)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($list->paid_date)->format("l, h:i:s A").")" }}</td>
                                        <td>{{ $list->or_number }} <script> var ornum = ""+ {{ $list->or_number }}; console.log(ornum); </script></td>
                                        <td>
                                        @foreach($pdet as $paydet)
                                            @if($vouch->pay_ID == $paydet->payment_ID)
                                                @foreach($cliacc as $insacc)
                                                    @if($insacc->account_ID == $paydet->account_ID)
                                                        {{ $insacc->policy_number }}
                                                        <script> var ins_id = "ins = " +{{ $insacc->account_ID }}; console.log(ins_id); </script>
                                                    @endif
                                                @endforeach
                                        </td>
                                        <td>
                                                @foreach($cliacc as $insacc)
                                                    @if($insacc->account_ID == $paydet->account_ID)
                                                        @foreach($clist as $clients)
                                                            @if($clients->client_type == 1)
                                                            @if($insacc->client_ID == $clients->client_ID)
                                                                @foreach($cli as $client)
                                                                    @if($clients->client_ID == $client->client_ID)
                                                                        @foreach($pinfo as $pInfo)
                                                                            @if($client->personal_info_ID == $pInfo->pinfo_ID)
                                                                            {{ $pInfo->pinfo_last_name}}, {{$pInfo->pinfo_first_name}} {{$pInfo->pinfo_middle_name }}
                                                                            <script> var pi_id = "pi = " + {{ $pInfo->pinfo_ID }}; console.log(pi_id); </script>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                            @endif
                                                            @if($clients->client_type == 2)
                                                            @if($insacc->client_ID == $clients->client_ID)
                                                                @foreach($company as $comp)
                                                                    @if($clients->client_ID == $comp->comp_ID)
                                                                        {{ $comp->comp_name }}
                                                                        <script> var pi_id = "pi = " + {{ $pInfo->pinfo_ID }}; console.log(pi_id); </script>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach</td>
                                        <td>    @foreach($bank as $bnk)
                                                    @foreach($addr as $address)
                                                        @if($paydet->bank_ID == $bnk->bank_ID)
                                                            @if($bnk->bank_add_ID == $address->add_ID)
                                                                {{ $bnk->bank_name_alt }} {{ $address->add_city }}
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        @endforeach</td>
                                        <td>@if($list->payment_ID >= 10)
                                                BOP00{{ $list->payment_ID }}
                                            @endif
                                            @if($list->payment_ID < 10)
                                                BOP000{{ $list->payment_ID }}
                                            @endif
                                            @if($list->payment_ID >= 100)
                                                BOP0{{ $list->payment_ID }}
                                            @endif
                                            @if($list->payment_ID >= 1000)
                                                BOP{{ $list->payment_ID }}
                                            @endif</td>
                                        <td>@if($list->check_voucher >= 10)
                                                BILL00{{ $list->check_voucher }}
                                            @endif
                                            @if($list->check_voucher < 10)
                                                BILL000{{ $list->check_voucher }}
                                            @endif
                                            @if($list->check_voucher >= 100)
                                                BILL0{{ $list->check_voucher }}
                                            @endif
                                            @if($list->check_voucher >= 1000)
                                                BILL{{ $list->check_voucher }}
                                            @endif</td>
                                        <td>
                                            <script>
                                            var data = numberWithCommas({{ $list->amount }}); document.write("₱" + data);
                                            </script>
                                        </td>
                                        <td>
                                            <script>
                                            var data = numberWithCommas({{ $list->amount_paid }}); document.write("₱" + data);
                                            </script>
                                        </td>
                                        <td>
                                            ₱<?php $number = round($list->amount_paid,2) - round($list->amount,2); echo number_format($number, 2, '.', ','); ?>
                                        </td>
                                        <td>
                                    @foreach($pdet as $paydet)
                                        @if($vouch->pay_ID == $paydet->payment_ID)
                                        @foreach($cliacc as $insacc)
                                            @if($insacc->account_ID == $paydet->account_ID)
                                            @if($insacc->account_ID == $paydet->account_ID)
                                                @foreach($clist as $clients)
                                                    @if($clients->client_type == 1)
                                                    @if($insacc->client_ID == $clients->client_ID)
                                                        @foreach($cli as $client)
                                                            @if($clients->client_ID == $client->client_ID)
                                                                @foreach($pinfo as $pInfo)
                                                                    @if($client->personal_info_ID == $pInfo->pinfo_ID)
                                                                    <button type="button" id="gen" data-or=" {{ $list->or_number }} " data-pinf=" {{$pInfo->pinfo_ID}} " data-acc="{{ $insacc->account_ID }}" onclick="window.open('{{ URL ('/pdf/payment-receipt/' .$list->or_number. '/' .$pInfo->pinfo_ID. '/' .$insacc->account_ID) }}')" class="btn bg-orange waves-effect" style="position: right;" data-toggle="tooltip" data-placement="left" title="Generate Receipt">
                                            <i class="material-icons">picture_as_pdf</i><span style="font-size: 15px;"></span>
                                            </button>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    @endif
                                                    @if($clients->client_type == 2)
                                                    @if($insacc->client_ID == $clients->client_ID)
                                                        @foreach($company as $comp)
                                                            @if($clients->client_ID == $comp->comp_ID)
                                                                <button type="button" id="gen" data-or=" {{ $list->or_number }} " data-pinf=" {{$pInfo->pinfoID}} " data-acc="{{ $insacc->account_ID }}" onclick="window.open('{{ URL ('/pdf/payment-receipt-comp/' .$list->or_number. '/' .$comp->comp_ID. '/' .$insacc->account_ID) }}')" class="btn bg-orange waves-effect" style="position: right;" data-toggle="tooltip" data-placement="left" title="Generate Receipt">
                                            <i class="material-icons">picture_as_pdf</i><span style="font-size: 15px;"></span>
                                            </button>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                            @endif
                                        @endforeach
                                    @endif
                                    @endforeach
                                        </td>
                                    </tr>
                                    @endif
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
        $('#ex').DataTable( {
            "order": [[ 0, "desc" ]]
        } );
    </script>

@endsection