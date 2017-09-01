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
                        <div class="body">
                            <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>OR No.</th>
                                        <th>Remittance Date</th>
                                        <th>Policy No.</th>
                                        <th>Client</th>
                                        <th>Bank</th>
                                        <th>BOP No.</th>
                                        <th>BOP Voucher No.</th>
                                        <th>Amount Due</th>
                                        <th>Amount Paid</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($plist as $list)
                                    @foreach($cvouch as $vouch)
                                    @if($list->check_voucher == $vouch->cv_ID)
                                    @if($list->status == 0)
                                    <tr>
                                        <td>{{ $list->or_number }}</td>
                                        <td>{{ $list->paid_date }}</td>
                                        <td>
                                        @foreach($pdet as $paydet)
                                            @if($vouch->pay_ID == $paydet->payment_ID)
                                                @foreach($cliacc as $insacc)
                                                    @if($insacc->account_ID == $paydet->account_ID)
                                                        {{ $insacc->policy_number }}
                                                    @endif
                                                @endforeach
                                        </td>
                                        <td>
                                                @foreach($cliacc as $insacc)
                                                    @if($insacc->account_ID == $paydet->account_ID)
                                                        @foreach($clist as $clients)
                                                            @foreach($cli as $cname)
                                                                @foreach($pinfo as $info)
                                                                    @if($clients->client_ID == $cname->client_ID)
                                                                        @if($clients->client_ID == $cname->client_ID)
                                                                            @if($cname->personal_info_ID == $info->pinfo_ID)
                                                                                {{ $info->pinfo_last_name }}, {{ $info->pinfo_first_name }} {{ $info->pinfo_middle_name }}
                                                                            @endif
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
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
                                        <td>CN000{{ $list->payment_ID }}</td>
                                        <td>CV000{{ $list->check_voucher }}</td>
                                        <td>
                                            <script>
                                            var data = numberWithCommas({{ $list->amount }}); document.write("₱ " + data);
                                            </script>
                                        </td>
                                        <td>
                                            <script>
                                            var data = numberWithCommas({{ $list->amount }}); document.write("₱ " + data);
                                            </script>
                                        </td>
                                        <td><button type="button" class="btn bg-orange waves-effect" onclick="window.open('{{ URL::asset('/pdf/payment-receipt') }}')" style="position: right;"  data-toggle="tooltip" data-placement="left" title="Generate Receipt">
                                            <i class="material-icons">picture_as_pdf</i><span style="font-size: 15px;"></span>
                                            </button></td>
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

@endsection