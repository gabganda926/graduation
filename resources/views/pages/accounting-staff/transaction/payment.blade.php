@extends('pages.accounting-staff.master')

@section('title','Payment - Transaction| i-Insure')

@section('transPayment','active')

@section('transPaymentList','active')

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
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/view-bill.png')}}" style="height: 50px; width: 50px;"> <b> Breakdown of Payment Vouchers </b></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>BOP Voucher Number</th>
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
                                        <td>CV000{{ $cv->cv_ID }}</td>
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
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach</td>
                                        <td>
                                         <script>
                                            var data = numberWithCommas('{{$total}}'); document.write("₱ " + data);
                                         </script>
                                        </td>
                                        <td><span class="label bg-orange">on payment</td>
                                        <td><button type="button" class="btn bg-blue waves-effect" style="position: right;"  data-toggle="modal" data-target="#details">
                                            <i class="material-icons" data-toggle="tooltip" data-placement="left" title="View Breakdown">chrome_reader_mode</i><span style="font-size: 15px;">
                                        </button>
                                        <button type="button" class="btn bg-orange waves-effect" onclick="window.open('{{ URL::asset('/pdf/breakdown-payment') }}')" style="position: right;"  data-toggle="tooltip" data-placement="left" title="Generate PDF">
                                            <i class="material-icons">picture_as_pdf</i><span style="font-size: 15px;"></span>
                                            </button></td>
                                    </tr>              
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- View INST MODAL-->
              <div class="modal fade" id="details" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInRight active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-view">
                            <h4 style="text-align: center;"><img src="{{ URL::asset ('images/icons/view-bill.png')}}" style="height: 50px; width: 50px;"> <br/><br/> Breakdown of Payment </h4>
                        </div><br/>
                        <div class="modal-body">
                            <h4 >Payment Progress</h4><br/>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
                                            75%
                                        </div>
                                    </div>
                                </div>
                            </div><br/>
                            <div class="body table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>BOP No.</th>
                                            <th>Bank</th>
                                            <th>Due Date</th>
                                            <th>Amount Due</th>
                                            <th>Status</th>
                                            <th>Remittance Date/Time</th>
                                            <th class="col-md-1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>003234543</td>
                                            <td>Banco De Oro - Antipolo City</td>
                                            <td>July 13, 2017</td>
                                            <td>5, 000.00</td>
                                            <td><span class="label bg-green">paid</span></td>
                                            <td>July 13, 2017</td>
                                            <td><button type="button" class="btn bg-orange waves-effect" onclick="window.open('{{ URL::asset('/pdf/payment-receipt') }}')" style="position: right;"  data-toggle="tooltip" data-placement="left" title="Generate Receipt">
                                            <i class="material-icons">picture_as_pdf</i><span style="font-size: 15px;"></span>
                                            </button></td>
                                        </tr>
                                        <tr>
                                            <td>003234543</td>
                                            <td>Banco De Oro - Antipolo City</td>
                                            <td>August 13, 2017</td>
                                            <td>5, 000.00</td>
                                            <td><span class="label bg-red">late</span></td>
                                            <td>August 15, 2017 11:09PM</td>
                                            <td><button type="button" class="btn bg-orange waves-effect" onclick="window.open('{{ URL::asset('/pdf/payment-receipt') }}')" style="position: right;"  data-toggle="tooltip" data-placement="left" title="Generate Receipt">
                                            <i class="material-icons">picture_as_pdf</i><span style="font-size: 15px;"></span>
                                            </button></td>
                                        </tr>
                                        <tr>
                                            <td>003234543</td>
                                            <td>Banco De Oro - Antipolo City</td>
                                            <td>September 13, 2017</td>
                                            <td>5, 000.00</td>
                                            <td><span class="label bg-blue">to be paid</span></td>
                                        </tr>
                                        <tr></tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b style="color: red">15, 000.00</b></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# VIEW INST MODAL -->
    </section>

@endsection