@extends('pages.accounting-staff.master')

@section('title','Insure Client - Transaction| i-Insure')

@section('transIns','active')

@section('transNew','active')

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
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                  <button type="button" class="btn btn-lg btn-block bg-orange waves-effect" onclick="window.document.location='{{ URL::asset('/accounting-staff/transaction/insure-client') }}';">
                                                    <span style="font-size: 15px;">CHANGE COVERAGE</span> 
                  </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('/accounting-staff/transaction/insure-client') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href=""><i class="material-icons">attach_money</i> Payment Details</a></li>
                    </ol>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="pDetails" class="list-group-item">
                                <img src="{{ URL::asset ('images/icons/payment.png')}}" style="height: 50px; width: 50px;"> <b> PAYMENT DETAILS </b>
                            </a>
                            <a href="javascript:void(0);" id="coverage" class="list-group-item active">
                                1. Review Coverage
                            </a>
                            <a href="javascript:void(0);" id="mPayment" class="list-group-item disabled">
                                2. Mode of Payment
                            </a>
                            <a href="javascript:void(0);" id="summary" class="list-group-item disabled">
                                3. Summary
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card" id="cov">
                        <div class="header">
                        <h3 style="text-align: center"><img src="{{ URL::asset ('images/icons/quotation.png')}}" style="height: 50px; width: 50px;"> Review Coverage </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <form id="form_data" name = "form_data" class = "form_data" action = '../insure-client/submit' method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "payment_type" name = "payment_type" type="text" class="form-control">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_client_ID" name = "data_client_ID" type="text" class="form-control" value = "{{$client_ID}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_insurance_company" name = "data_insurance_company" type="text" class="form-control" value = "{{$insurance_company}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_vehicle_type" name = "data_vehicle_type" type="text" class="form-control" value = "{{$vehicle_type}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_vehicle_make" name = "data_vehicle_make" type="text" class="form-control" value = "{{$vehicle_make}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_vehicle_model" name = "data_vehicle_model" type="text" class="form-control" value = "{{$vehicle_model}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_plate_number" name = "data_plate_number" type="text" class="form-control" value = "{{$plate_number}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_serial_chassis" name = "data_serial_chassis" type="text" class="form-control" value = "{{$serial_chassis}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_seat_capacity" name = "data_seat_capacity" type="text" class="form-control" value = "{{$seat_capacity}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_motor_engine" name = "data_motor_engine" type="text" class="form-control" value = "{{$motor_engine}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_mv_file_number" name = "data_mv_file_number" type="text" class="form-control" value = "{{$mv_file_number}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_color" name = "data_color" type="text" class="form-control" value = "{{$color}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_personal_accident_ID" name = "data_personal_accident_ID" type="text" class="form-control" value = "{{$personal_accident_ID}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_bodily_injury_ID" name = "data_bodily_injury_ID" type="text" class="form-control" value = "{{$bodily_injury_ID}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_bodily_injury_class" name = "data_bodily_injury_class" type="text" class="form-control" value = "{{$bodily_injury_class}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_property_damage_ID" name = "data_property_damage_ID" type="text" class="form-control" value = "{{$property_damage_ID}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_property_damage_class" name = "data_property_damage_class" type="text" class="form-control" value = "{{$property_damage_class}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_created_at" name = "data_created_at" type="text" class="form-control" value = "{{$created_at}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_form_picture" name = "data_form_picture" type="text" class="form-control" value = "{{$form_picture}}">
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_inception_date" name = "data_inception_date" type="text" class="form-control" >
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_bank_ID" name = "data_bank_ID" type="text" class="form-control" >
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_installment_ID" name = "data_installment_ID" type="text" class="form-control" >
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "data_amount" name = "data_amount" type="text" class="form-control" >
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "aon" name = "aon" type="text" class="form-control" >
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "aon_premium" name = "aon_premium" type="text" class="form-control" >
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "odt" name = "odt" type="text" class="form-control" >
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "odt_premium" name = "odt_premium" type="text" class="form-control" >
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "deductible" name = "deductible" type="text" class="form-control" >
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "towing" name = "towing" type="text" class="form-control" >
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "arl" name = "arl" type="text" class="form-control" >
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "lgt" name = "lgt" type="text" class="form-control" >
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "vat" name = "vat" type="text" class="form-control" >
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "stamp" name = "stamp" type="text" class="form-control" >
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "basic" name = "basic" type="text" class="form-control" >
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "coverage" name = "coverage" type="text" class="form-control" >
                                 </div>

                                 <div class="col-md-4" style = "display: none;">
                                    <input id = "total" name = "total" type="text" class="form-control" >
                                 </div>

                                 <script>
                                    var value;
                                    var aon;
                                    var odt;
                                    var basic;
                                    var vat;
                                    var stamp;
                                    var rounded;
                                    var lgt;
                                    var deductible;
                                    var towing;
                                    var arl;
                                    var pd = '{{ $details->indi_pd_premium }}{{ $details->comp_pd_premium }}';
                                    var bi = '{{ $details->indi_bi_premium }}{{ $details->comp_bi_premium }}';
                                    var pa = '{{ $details->indi_pa_premium }}{{ $details->comp_pa_premium }}';
                                        @foreach($vModel as $mod)
                                         @if($mod->vehicle_model_ID == $vehicle_model)
                                           value = '{{$mod->vehicle_value}}'
                                         @endif
                                        @endforeach
                                    var coverage = value * .2;
                                    var grosspremium = value * .013;

                                if('{{$insurance_company}}' == 1)
                                    deductible = 3100;
                                if('{{$insurance_company}}' == 2)
                                    deductible = 1000;
                                if('{{$insurance_company}}' == 3)
                                    deductible = 3000;
                                if('{{$insurance_company}}' == 4)
                                    deductible = 2000;

                                $('#coverage').val(coverage);
                                $('#deductible').val(deductible);

                                towing = 100;
                                arl = deductible + towing;

                                $('#towing').val(towing);
                                $('#arl').val(arl);

                                if('{{$insurance_company}}' == 1)
                                    aon = coverage * 0.02;
                                if('{{$insurance_company}}' == 2)
                                    aon = 0;
                                if('{{$insurance_company}}' == 3)
                                    aon = coverage * 0.005;
                                if('{{$insurance_company}}' == 4)
                                    aon = coverage * 0.005;

                                $('#aon').val(coverage);
                                $('#odt').val(coverage);
                                $('#aon_premium').val(aon);

                                odt = (coverage * 0.013);

                                $('#odt_premium').val(odt);

                                basic = ((aon + parseFloat(pd.replace(/[^0-9\.]/g,'')) + parseFloat(bi.replace(/[^0-9\.]/g,'')) + parseFloat(pa.replace(/[^0-9\.]/g,''))) + odt);
                                $('#basic').val(basic);

                                vat = basic * .125;
                                $('#vat').val(vat);

                                stamp = basic * .12;
                                $('#stamp').val(stamp);

                                rounded = Math.ceil((basic + vat + stamp)/100)*100;
                                lgt = rounded - (basic + vat + stamp);
                                $('#lgt').val(lgt);

                                var tot = (basic + vat + stamp + lgt);
                                $('#total').val(tot);
                                 </script>
                                <section>
                                    <div class="body table-responsive">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-6">Comprehensive Coverage</th>
                                                    <th class="col-md-3">Coverage</th>
                                                    <th class="col-md-3">Premium</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Loss and Damage (Including Theft)</td>
                                                    <td id = "lad_limit">
                                                        <script>
                                                            var data = numberWithCommas(coverage); $('#lad_limit').text("₱ " + data);
                                                        </script>
                                                    </td>
                                                    <td id = "lad_premium">
                                                        <script>
                                                            $('#lad_premium').text('₱ '+numberWithCommas(Math.round(odt * 100)/100));
                                                        </script>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Third Party Bodily Injury</td>
                                                    <td id = "tpbi_limit">
                                                        <script>

                                                            var data = numberWithCommas({{ $pbi->insuranceLimit }}); $('#tpbi_limit').text("₱ " + data);
                                                        </script>
                                                    </td>
                                                    <td id = "tpbi_premium">{{ $details->indi_bi_premium }}{{ $details->comp_bi_premium }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Third Party Property Damage</td>
                                                    <td id = "tppd_limit">
                                                        <script>
                                                            var data = numberWithCommas({{ $pdg->insuranceLimit }}); $('#tppd_limit').text("₱ " + data);
                                                        </script>
                                                    </td>
                                                    <td id = "tppd_premium">{{ $details->indi_pd_premium }}{{ $details->comp_pd_premium }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Personal Accident (3 persons - 10,000)</td>
                                                    <td id = "pa_limit">
                                                        <script>
                                                            var data = numberWithCommas({{ $ppa->insuranceLimit }}); $('#pa_limit').text("₱ " + data);
                                                        </script>
                                                    </td>
                                                    <td id = "pa_premium">{{ $details->indi_pa_premium }}{{ $details->comp_bi_premium }}</td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td>Documentary Stamps</td>
                                                    <td></td>
                                                    <td id = "ds_premium">
                                                        <script>
                                                         $('#ds_premium').text("₱ " + Math.round(stamp * 100)/100);
                                                        </script>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>VAT</td>
                                                    <td></td>
                                                    <td id = "vat_premium">
                                                        <script>
                                                         $('#vat_premium').text("₱ " + Math.round(vat * 100)/100);
                                                        </script>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Local Government Tax</td>
                                                    <td></td>
                                                    <td id = "lgt_premium">
                                                        <script>
                                                         $('#lgt_premium').text("₱ " + Math.round(lgt * 100)/100);
                                                        </script>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><b>Total Net Premium</b></td>
                                                    <td></td>
                                                    <td id = "total_premium"><b style="color: red">
                                                        <script>
                                                            var total = (basic + vat + stamp + lgt);
                                                            $('#total_premium').text("₱ " + numberWithCommas(total));
                                                        </script>
                                                    </b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br/><br/>

                                    <br/>
                                    <div class="row clearfix">
                                      <div class="col-md-6">
                                      </div>
                                      <div class="col-md-6">
                                          <button type="button" id="next1"  class="btn btn-block bg-teal waves-effect left" onclick=" 
                                          $(this).parents('#cov').hide(800);
                                          $('#mPay').show(800);
                                          $('#coverage').removeClass('active');
                                          $('#mPayment').removeClass('disabled');
                                          $('#mPayment').addClass('active');
                                          $('body,html').animate({
                                                                      scrollTop: 0
                                                                  }, 500);
                                                                  return false;
                                          ">
                                              <span style="font-size: 15px;"> NEXT</span>
                                          </button>
                                      </div>
                                  </div>
                                </section>
                              </div>
                            </div>
                        
                     <div class="card" id="mPay">
                        <div class="header">
                        <h3 style="text-align: center"><img src="{{ URL::asset ('images/icons/quotation.png')}}" style="height: 50px; width: 50px;"> Mode of Payment </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">   
                                <section>                                               
                                        <div class="demo-radio-button" style="text-align: center">
                                            <div class="btn-group btn-group-justified" role="group">
                                                <a id = "btn_cash" onclick = "cash_func();" class="btn btn-lg bg-green waves-effect" data-toggle="collapse" data-target="#cash">
                                                <i class="material-icons">attach_money</i>
                                                <span>CASH</span>
                                                </a> <!-- PAG PUMILI DITO, MAHA-HIDE UNG BUTTON. PAG KINLOSE UNG PINILI, LALABAS ULIT TONG CHOICES -->
                                            
                                                <a id = "btn_installment" onclick = "inst_func();" class="btn btn-lg bg-deep-orange waves-effect" data-toggle="collapse" data-target="#installment">
                                                <i class="material-icons">credit_card</i>
                                                <span>INSTALLMENT</span>
                                                </a>
                                            </div>
                                        </div><br/>

                                        <div class="collapse fade" id="installment" role="dialog">
                                            <div class="card">
                                                <div class="header">
                                                <a  class="btn waves-effect" data-toggle="collapse" data-target="#installment" style="float: right;">
                                                <i class="material-icons">close</i>
                                                </a>
                                                  <h1 style="text-align: center">INSTALLMENT</h1>
                                                </div>
                                                <div class="body">
                                                    <div class="row clearfix">
                                                        <div class="col-md-6">
                                                          <div class="form-group form-float">
                                                              <label><small>Bank :</small></label>
                                                                  <select id = "installment_bank" name = "installment_bank" class="form-control selectpicker show-tick" data-live-search="true" required>
                                                                    <option selected value = "" style = "display: none;">-- Select Bank --</option>
                                                                    @foreach($banko as $bank)
                                                                     @if($bank->del_flag == 0)
                                                                      @foreach($address as $add)
                                                                       @if($add->add_ID == $bank->bank_add_ID)
                                                                          <option value = "{{ $bank->bank_ID }}">{{ $bank->bank_name.' - '.$add->add_city }}</option>
                                                                       @endif
                                                                      @endforeach
                                                                     @endif
                                                                    @endforeach
                                                                  </select>
                                                          </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                          <div class="form-group form-float">
                                                              <label><small>Installment Type :</small></label>
                                                                  <select id = "installment_type" name = "installment_type" class="form-control selectpicker show-tick" data-live-search="true" required>
                                                                    <option selected value = "" style = "display: none;">-- Select Installment Type --</option>
                                                                    @foreach($instype as $iType)
                                                                     @if($iType->del_flag == 0)
                                                                      <option value = "{{ $iType->installment_ID }}">{{ "(".$iType->installment_desc.") ".$iType->installment_type}}</option>
                                                                     @endif
                                                                    @endforeach
                                                                  </select>
                                                          </div>
                                                        </div> 
                                                    </div>

                                                    <div class="row clearfix">
                                                      <div class="col-md-3">
                                                        <div class="form-group form-float">
                                                          <div class="form-line">
                                                            <label><small>Starting Date: </small></label>
                                                                <input id = "installment_date_start" name = "installment_date_start" type="date" class="form-control todate">
                                                              </div>
                                                        </div>
                                                      </div> 
                                                    </div>

                                                    <div class="body table-responsive">
                                                        <h4 style="text-align: center">Breakdown of Payment<br/><br/></h4>
                                                        <table id = "breakdown" class="table table-bordered table-striped table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-md-3">Bank</th>
                                                                    <th class="col-md-3">Due Date</th>
                                                                    <th class="col-md-2">Amount Due</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id = "body_breakdown">
                                                            </tbody>
                                                        </table>
                                                    </div><br/><br/>

                                                    <div class="row clearfix">
                                                      <div class="col-md-6">
                                                          <button type="button" id="next1"  class="btn btn-block bg-blue waves-effect left" onclick=" 
                                                          $(this).parents('#mPay').hide(800);
                                                          $('#cov').show(800);
                                                          $('#coverage').addClass('active');
                                                          $('#mPayment').removeClass('active');
                                                          $('body,html').animate({
                                                                                      scrollTop: 0
                                                                                  }, 500);
                                                                                  return false;
                                                          ">
                                                              <span style="font-size: 15px;"> PREVIOUS</span>
                                                          </button>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <button type="button" id="next1"  class="btn btn-block bg-teal waves-effect left" onclick=" 
                                                          $(this).parents('#mPay').hide(800);
                                                          $('#summ').show(800);
                                                          $('#mPayment').removeClass('active');
                                                          $('#summary').removeClass('disabled');
                                                          $('#summary').addClass('active');
                                                          $('body,html').animate({
                                                                                      scrollTop: 0
                                                                                  }, 500);
                                                                                  return false;
                                                          ">
                                                              <span style="font-size: 15px;"> NEXT</span>
                                                          </button>
                                                      </div>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="collapse fade" id="cash" role="dialog">
                                            <div class="card">
                                                <div class="header">
                                                <a class="btn waves-effect" data-toggle="collapse" data-target="#cash" style="float: right;">
                                                <i class="material-icons">close</i>
                                                </a>
                                                <h1 style="text-align: center">CASH</h1>
                                                </div>
                                                <div class="body">
                                                    <div class="body table-responsive">
                                                        <table class="table table-bordered table-striped table-hover ">
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-md-2">Date</th>
                                                                    <th class="col-md-2">Amount Due</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                    <div class="form-group form-float">
                                                                    <div class="form-line">
                                                                    <input id = "cash_date_issued" name = "cash_date_issued" type="date" class="form-control todate" >
                                                                    </div>
                                                                    </div>
                                                                    </td>
                                                                    <td id = "cash_total">
                                                                    <script>
                                                                        var total = parseFloat($('#lad_premium').text().replace(/[^0-9\.]/g,''));
                                                                        total += parseFloat($('#tppd_premium').text().replace(/[^0-9\.]/g,''));
                                                                        total += parseFloat($('#pa_premium').text().replace(/[^0-9\.]/g,''));
                                                                        total += parseFloat($('#ds_premium').text().replace(/[^0-9\.]/g,''));
                                                                        total += parseFloat($('#vat_premium').text().replace(/[^0-9\.]/g,''));
                                                                        total += parseFloat($('#lgt_premium').text().replace(/[^0-9\.]/g,''));
                                                                        $('#cash_total').text("₱ " + numberWithCommas(total));
                                                                    </script>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="row clearfix">
                                                      <div class="col-md-6">
                                                          <button type="button" id="next1"  class="btn btn-block bg-blue waves-effect left" onclick=" 
                                                          $(this).parents('#mPay').hide(800);
                                                          $('#cov').show(800);
                                                          $('#coverage').addClass('active');
                                                          $('#mPayment').removeClass('active');
                                                          $('body,html').animate({
                                                                                      scrollTop: 0
                                                                                  }, 500);
                                                                                  return false;
                                                          ">
                                                              <span style="font-size: 15px;"> PREVIOUS</span>
                                                          </button>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <button type="button" id="next1"  class="btn btn-block bg-teal waves-effect left" onclick=" 
                                                          $(this).parents('#mPay').hide(800);
                                                          $('#summ').show(800);
                                                          $('#mPayment').removeClass('active');
                                                          $('#summary').removeClass('disabled');
                                                          $('#summary').addClass('active');
                                                          $('body,html').animate({
                                                                                      scrollTop: 0
                                                                                  }, 500);
                                                                                  return false;
                                                          ">
                                                              <span style="font-size: 15px;"> NEXT</span>
                                                          </button>
                                                      </div>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                </section>
                            </div>
                          </div>

                     <div class="card" id="summ">
                        <div class="header">
                        <h3 style="text-align: center"><img src="{{ URL::asset ('images/icons/quotation.png')}}" style="height: 50px; width: 50px;"> Summary </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body"> 
                                <section>
                                <h2> <small><b>INSURANCE DETAILS</b></small></h2>
                                <div class="row clearfix">
                                        <br/><br/>
                                        <div class="col-md-5">
                                            <div class="form-group form-float">
                                                <div class="form-line focused success">
                                                    <label><small>Client Name:</small></label>
                                                    <input id = "clientname" name = "clientname" type="text" class="form-control" readonly="true" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-float">
                                                <div class="form-line focused success">
                                                <label><small>Policy Number: </small></label>
                                                    <input id = "policy_number" name = "policy_number" type="text" class="form-control" readonly="true">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line focused success">
                                                <label><small>Insurance Company: </small></label>
                                                    <input id = "insurance_company" name = "insurance_company" type="text" class="form-control" readonly="true">
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div class="row clearfix">
                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line focused success">
                                                <label><small>Date Issued: </small></label>
                                                    <input id = "date_issued" name = "date_issued" type="text" class="form-control" readonly="true" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line focused success">
                                                <label><small>Inception Date: </small></label>
                                                    <input id = "inception_date" name = "inception_date" type="text" class="form-control"  readonly="true">
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div class="row clearfix">
                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line focused success">
                                                <label><small>Vehicle Type:</small></label>
                                                    <input id = "vehicle_type" name = "vehicle_type" type="text" class="form-control"  readonly="true" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line focused success">
                                                <label><small>Vehicle Make:</small></label>
                                                    <input id = "vehicle_make" name = "vehicle_make" type="text" class="form-control"  readonly="true" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line focused success">
                                                <label><small>Vehicle Model:</small></label>
                                                    <input id = "vehicle_model" name = "vehicle_model" type="text" class="form-control"  readonly="true" >
                                                </div><br/><br/><br/>
                                            </div>
                                        </div>
                                </div>

                                <h2> <small><b>PAYMENT DETAILS</b></small></h2>
                                <div class="form-group">
                                    <input type="radio" name="payment_cash" id="payment_cash" class="with-gap">
                                    <label for="male">Cash</label>

                                    <input type="radio" name="payment_installment" id="payment_installment" class="with-gap">
                                    <label for="female" class="m-l-20">Installment</label>
                                </div>
                                
                                <div class="row clearfix">
                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line focused success">
                                                    <label><small>Bank: </small></label>
                                                        <input id = "payment_bank" name = "payment_bank" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-float">
                                                <div class="form-line focused success">
                                                    <label><small>Installment Type: </small></label>
                                                        <input id = "payment_installment_type" name = "payment_installment_type" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group form-float">
                                                <div class="form-line focused success">
                                                    <label><small>Total Net Premium: </small></label>
                                                        <input id = "payment_total_premium" name = "payment_total_premium" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </section>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <button type="button" id="next1"  class="btn btn-block bg-blue waves-effect left" onclick=" 
                                        $(this).parents('#summ').hide(800);
                                        $('#mPay').show(800);
                                        $('#mPayment').addClass('active');
                                        $('#summary').removeClass('active');
                                        $('body,html').animate({
                                                                    scrollTop: 0
                                                                }, 500);
                                                                return false;
                                        ">
                                            <span style="font-size: 15px;"> PREVIOUS</span>
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn bg-green btn-block waves-effect" type="button" onclick = "
                                          if($('#form_data').valid())
                                          {
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
                                                $('#form_data').submit();
                                              } else {
                                                  swal({
                                                  title: 'Cancelled',
                                                  type: 'warning',
                                                  timer: 500,
                                                  showConfirmButton: false
                                                  });
                                              }
                                            });
                                          }
                                          "><span style="font-size: 15px;">SUBMIT</span></button>
                                    </div>
                                </div>

                            
                                </form>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
      window.onload = function() {
          document.getElementById('mPay').style.display = 'none';
          document.getElementById('summ').style.display = 'none';
        };
    </script>

    <script>
            $.validator.addMethod("minValue", function(value, element) {
                if(value >= 100000)
                    return true;
                return false;
             }, "Minimum Value is 100,000.");
            $.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[A-Za-z][A-Za-z0-9 '-.]*$/i.test(value);
             }, "This field must contain only letters, numbers, dashes, space, apostrophe or dot.");
            $.validator.addMethod("alpha", function(value, element) {
                return this.optional(element) || /^[A-Za-z][A-Za-z '-.]*$/i.test(value);
             }, "This field must contain only letters, space, dash, apostrophe or dot.");
            $.validator.addMethod("blcknumber", function(value, element) {
                return this.optional(element) || /^[A-Za-z0-9][A-Za-z0-9 '-.]*$/i.test(value);
             }, "This field must contain only letters, numbers, space, dash, apostrophe or dot.");


        // Wait for the DOM to be ready
            $(function() {
              // Initialize form validation on the registration form.
              // It has the name attribute "registration"
              $("form[name='form_data']").validate({
                // Specify validation rules
                rules: {
                  // The key name on the left side is the name attribute
                  // of an input field. Validation rules are defined
                  // on the right side
                  installment_bank:{
                    required: function(){
                        return $('#payment_installment').is(':checked');
                    },
                  },
                  installment_type:{
                    required: function(){
                        return $('#payment_installment').is(':checked');
                    },
                  },
                  clientname:{
                    required: true,
                  },
                  policy_number:{
                    required: true
                  },
                  insurance_company:{
                    required: true,
                  },
                  date_issued:{
                    required: true,
                  },
                  inception_date:{
                    required: true,
                  },
                  vehicle_type:{
                    required: true,
                    maxlength: 20
                  },
                  vehicle_make:{
                    required: true,
                    maxlength: 50
                  },
                  vehicle_model:{
                    required: true,
                    maxlength: 50
                  },
                  payment_bank:{
                    required: true,
                    maxlength: 50
                  },
                  installment_type:{
                    required: true,
                  },
                  installment_bank:{
                    required: true,
                  },
                  payment_installment_type:{
                    required: true,
                  },
                  payment_total_premium:{
                    required: true,
                    maxlength: 50
                  },
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                  form.submit();
                }
              });
            });
    </script>
    
    <script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = yyyy+'-'+mm+'-'+dd;

    $('.todate').val(today);

    var type = {{ $type }};
    function addZero(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function formatDate(mh,dy,yr)
    {
      var monthNames = [
        "January", "February", "March",
        "April", "May", "June", "July",
        "August", "September", "October",
        "November", "December"
      ];

      if(mh < 12)
      {
        var day = dy;
        var monthIndex = mh;
        var year = yr;
      }
      else
      {
        var day = dy;
        var monthIndex = mh - 12;
        var year = yr + 1;
      }
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

    function save_inception(date)
    {
      var arr = date.split('-');

      if((arr[1] - 1) < 12)
      {
          var day = arr[2];
          var monthIndex = arr[1];
          var year = arr[0];
      }
      else
      {
          var day = arr[2];
          var monthIndex = arr[1] - 12;
          var year = parseInt(arr[0]) + 1;
      }

      $('#data_inception_date').val(year+"-"+monthIndex+"-"+day);
    }

    $('#installment').on('hidden.bs.collapse', function(){
        $('#payment_type').val(0);
        $('#btn_cash').show();
    });

    $('#cash').on('hidden.bs.collapse', function(){
        $('#payment_type').val(0);
        $('#btn_installment').show();
    });

    function cash_func()
    {
        $("#payment_cash").prop("checked", true)
        $('#payment_bank').val('None');
        $('#payment_installment_type').val('None');
        $('#payment_total_premium').val($('#total_premium').text());
        $("#payment_installment").prop("checked", false)
        $('#payment_type').val(1);
        $('#btn_installment').hide();
        $('#btn_cash').show();
        $('#data_inception_date').val($('#cash_date_issued').val());

        var inception = $('#cash_date_issued').val().split('-');
        var dd = inception[2];
        var mm = inception[1]; 
        var year = parseInt(inception[0]) + 1;
        var yyyy = year;
        var iinception = inception[0]+'-'+mm+'-'+dd;
        var einception = yyyy+'-'+mm+'-'+dd;

        $('#inception_date').val(formatDate2(iinception) + ' - ' + formatDate2(einception));
    };

    function inst_func()
    {
        $("#payment_installment").prop("checked", true)
        $('#payment_installment_type').val('');
        $("#payment_cash").prop("checked", false)
        $('#payment_type').val(2);
        $('#btn_installment').show();
        $('#btn_cash').hide();
    };

    var total = parseFloat($('#total_premium').text().replace(/[^0-9\.]/g,''));

    $('#installment_bank').on('change textInput input', function () {
    var bank = $('#installment_bank option:selected').text();
    var instype = $('#installment_type option:selected').text().replace(/[^0-9\.]/g,'');
    $('#payment_bank').val($('#installment_bank option:selected').text());
    $('#payment_installment_type').val($('#installment_type option:selected').text());
    $('#payment_total_premium').val($('#total_premium').text());
    $('#data_bank_ID').val($('#installment_bank option:selected').val());
    $('#data_installment_ID').val($('#installment_type option:selected').val());
    var start_date = $('#installment_date_start').val().split('-');
    var todate;
    var counter;
    var amount;
    if($('#installment_type').val())
    {
        $("#breakdown tr").remove();
        $('#breakdown thead').append('<tr><th class="col-md-3">Bank</th><th class="col-md-3">Due Date</th><th class="col-md-2">Amount Due</th></tr>');
        for (counter = 0; counter < instype; counter++) 
        {
            amount = Math.round(total/instype * 100) / 100;
            todate = formatDate(parseInt(parseInt(start_date[1]) + counter),parseInt(start_date[2]),parseInt(start_date[0]));
            $('#breakdown tbody').append('<tr><td>'+bank+'</td><td>'+todate+'</td><td>₱ '+numberWithCommas(amount)+'</td></tr>');
            $('#data_amount').val(amount);
        }
        $('#breakdown tbody').append('<tr><td></td><td></td><td id = "breakdown_total"><b style="color: red">₱ '+numberWithCommas(total)+'</b></td></tr>');
    }
    });

    $('#installment_type').on('change textInput input', function () {
    var bank = $('#installment_bank option:selected').text();
    var instype = $('#installment_type option:selected').text().replace(/[^0-9\.]/g,'');
    $('#payment_installment_type').val($('#installment_type option:selected').text());
    $('#payment_total_premium').val($('#total_premium').text());
    $('#data_bank_ID').val($('#installment_bank option:selected').val());
    $('#data_installment_ID').val($('#installment_type option:selected').val());
    var start_date = $('#installment_date_start').val().split('-');
    var todate;
    var counter;
    var amount;
    if($('#installment_type').val())
    {
        $("#breakdown tr").remove();
        $('#breakdown thead').append('<tr><th class="col-md-3">Bank</th><th class="col-md-3">Due Date</th><th class="col-md-2">Amount Due</th></tr>');
        for (counter = 0; counter < instype; counter++) 
        {
            amount = Math.round(total/instype * 100) / 100;
            todate = formatDate(parseInt((parseInt(start_date[1]) - 1)  + counter),parseInt(start_date[2]),parseInt(start_date[0]));
            $('#breakdown tbody').append('<tr><td>'+bank+'</td><td>'+todate+'</td><td>₱ '+numberWithCommas(amount)+'</td></tr>');
            $('#data_amount').val(amount);
            var dd = parseInt(start_date[2]);
            var mm = parseInt(parseInt(start_date[1]) + counter); 
            var year = parseInt(start_date[0]) + 1;
            var yyyy = year;
            var iinception = start_date[0]+'-'+mm+'-'+dd;
            var einception = yyyy+'-'+mm+'-'+dd;
            save_inception(iinception);
            $('#inception_date').val(formatDate2(iinception) + ' - ' + formatDate2(einception));
        }
        $('#breakdown tbody').append('<tr><td></td><td></td><td id = "breakdown_total"><b style="color: red">₱ '+numberWithCommas(total)+'</b></td></tr>');
    }
    });

    $('#installment_date_start').on('change textInput input', function () {
    var bank = $('#installment_bank option:selected').text();
    var instype = $('#installment_type option:selected').text().replace(/[^0-9\.]/g,'');
    $('#payment_installment_type').val($('#installment_type option:selected').text());
    $('#payment_total_premium').val($('#total_premium').text());
    $('#data_bank_ID').val($('#installment_bank option:selected').val());
    $('#data_installment_ID').val($('#installment_type option:selected').val());
    var start_date = $('#installment_date_start').val().split('-');
    var todate;
    var counter;
    var amount;
    if($('#installment_type').val())
    {
        $("#breakdown tr").remove();
        $('#breakdown thead').append('<tr><th class="col-md-3">Bank</th><th class="col-md-3">Due Date</th><th class="col-md-2">Amount Due</th></tr>');
        for (counter = 0; counter < instype; counter++) 
        {
            amount = Math.round(total/instype * 100) / 100;
            todate = formatDate(parseInt((parseInt(start_date[1]) - 1) + counter),parseInt(start_date[2]),parseInt(start_date[0]));
            $('#breakdown tbody').append('<tr><td>'+bank+'</td><td>'+todate+'</td><td>₱ '+numberWithCommas(amount)+'</td></tr>');
            $('#data_amount').val(amount);
            var dd = parseInt(start_date[2]);
            var mm = parseInt(parseInt(start_date[1]) + counter); 
            var year = parseInt(start_date[0]) + 1;
            var yyyy = year;
            var iinception = start_date[0]+'-'+mm+'-'+dd;
            var einception = yyyy+'-'+mm+'-'+dd;

            save_inception(iinception);
            $('#inception_date').val(formatDate2(iinception) + ' - ' + formatDate2(einception));
        }
        $('#breakdown tbody').append('<tr><td></td><td></td><td id = "breakdown_total"><b style="color: red">₱ '+numberWithCommas(total)+'</b></td></tr>');
    }
    });

    $('#cash_date_issued').on('change textInput input', function () {
        var inception = $('#cash_date_issued').val().split('-');
        $('#data_inception_date').val($('#cash_date_issued').val());
        var dd = inception[2];
        var mm = inception[1]; 
        var year = parseInt(inception[0]) + 1;
        var yyyy = year;
        var iinception = inception[0]+'-'+mm+'-'+dd;
        var einception = yyyy+'-'+mm+'-'+dd;

        $('#inception_date').val(formatDate2(iinception) + ' - ' + formatDate2(einception));
    });

    var client_list = [];
    var data = 0;

    //individual//////////////////////////////////////////////////////////
    if(type == 0 )
    {
     @foreach($client as $cli)
      @if($cli->del_flag == 0)
       @foreach($pInfo as $Info)
       @if($Info->pinfo_ID == $cli->personal_info_ID)
        client_list[{{ $cli->client_ID }}] = { client_name : "{{ $Info->pinfo_last_name.', '.$Info->pinfo_first_name.' '.$Info->pinfo_middle_name }}"};
        data += 1;
       @endif
       @endforeach
      @endif
     @endforeach

    $('#clientname').val(client_list[{{$client_ID}}].client_name);
    $('#policy_number').val('{{$details->indi_policy_number}}');

    @foreach($company as $inscomp)
     if('{{$details->indi_insurance_company}}' == '{{$inscomp->comp_ID}}')
     {
        $('#insurance_company').val('{{$inscomp->comp_name}}');
     }
    @endforeach

    $('#date_issued').val(formatDate2('{{$details->indi_date_issued}}'));

    @foreach($vType as $v_type)
     if('{{$v_type->vehicle_type_ID}}' == '{{$details->indi_vtype}}')
     {
        $('#vehicle_type').val('{{$v_type->vehicle_type_name}}');
     }
    @endforeach

    @foreach($vMake as $v_make)
     if('{{$v_make->vehicle_make_ID}}' == '{{$details->indi_vmake}}')
     {
        $('#vehicle_make').val('{{$v_make->vehicle_make_name}}');
     }
    @endforeach

    @foreach($vModel as $v_model)
     if('{{$v_model->vehicle_model_ID}}' == '{{$details->indi_vmodel}}')
     {
        $('#vehicle_model').val('{{$v_model->vehicle_year.' '.$v_model->vehicle_model_name}}');
     }
    @endforeach

    }
    //company//////////////////////////////////////////////////////////////
    if(type == 1 )
    {
     @foreach($company as $cmp)
        client_list[{{ $cmp->comp_ID }}] = { company_name : "{{ $cmp->comp_name }}"};
        data += 1;
     @endforeach

    $('#clientname').val(client_list[{{$client_ID}}].company_name);
    $('#policy_number').val('{{$details->comp_policy_number}}');

    @foreach($company as $inscomp)
     if('{{$details->comp_insurance_company}}' == '{{$inscomp->comp_ID}}')
     {
        $('#insurance_company').val('{{$inscomp->comp_name}}');
     }
    @endforeach

    $('#date_issued').val(formatDate2('{{$details->comp_date_issued}}'))

    @foreach($vType as $v_type)
     if('{{$v_type->vehicle_type_ID}}' == '{{$details->comp_vtype}}')
     {
        $('#vehicle_type').val('{{$v_type->vehicle_type_name}}');
     }
    @endforeach

    @foreach($vMake as $v_make)
     if('{{$v_make->vehicle_make_ID}}' == '{{$details->comp_vmake}}')
     {
        $('#vehicle_make').val('{{$v_make->vehicle_make_name}}');
     }
    @endforeach

    @foreach($vModel as $v_model)
     if('{{$v_model->vehicle_model_ID}}' == '{{$details->comp_vmodel}}')
     {
        $('#vehicle_model').val('{{$v_model->vehicle_year.' '.$v_model->vehicle_model_name}}');
     }
    @endforeach

    }

    </script>
@endsection