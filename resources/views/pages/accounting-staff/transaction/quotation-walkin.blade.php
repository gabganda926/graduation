@extends('pages.accounting-staff.master')

@section('title','Quotation - Transaction | i-Insure')

@section('transQuote','active')

@section('transQuoteWalkin','active')

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
                        <li><a href="{{ URL::asset('admin/transaction/accounting-staff/payment') }}"><i class="material-icons">home</i> New Quotation</a></li>
                    </ol>
                </div>
            </div>
            <div class="row clearfix">
                <!-- QUOTATION DETAILS -->
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                                <div class="list-group">
                                    <a href="javascript:void(0);" id="vehicleDetails" class="list-group-item active">
                                        1. Vehicle Details
                                    </a>
                                    <a href="javascript:void(0);" id="quoteDetails" class="list-group-item disabled">2. Quotation Details</a>
                                    <a href="javascript:void(0);" id="clientDetails" class="list-group-item disabled">3. Client Details</a>
                                    <a href="javascript:void(0);" id="termsDetails" class="list-group-item disabled">4. Finish</a>
                                </div>
                            </div>
                </div>
                <!-- END QUOTATION DETAILS -->
                <!-- BREAKDOWN -->
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <form id="quote" name = "quote" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-4" style = "display: none;">
                     <input id = "pa_ID" name = "pa_ID" type="text" class="form-control">
                    </div>
                    <div class="col-md-4" style = "display: none;">
                     <input id = "tppd_ID" name = "tppd_ID" type="text" class="form-control">
                    </div>
                    <div class="col-md-4" style = "display: none;">
                     <input id = "tpbi_ID" name = "tpbi_ID" type="text" class="form-control">
                    </div>
                    <div class="col-md-4" style = "display: none;">
                     <input id = "vehicle_class" name = "vehicle_class" type="text" class="form-control">
                    </div>
                    <div class="card" id="vDet">
                        <div class="header">
                            <h2>VEHICLE DETAILS</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Vehicle Type:</small></label>
                                            <select id = "vehicle_type" name = "vehicle_type" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" >-- Select Vehicle Type --</option>
                                                  @foreach($vType as $vtp)
                                                   @if($vtp->del_flag == 0)
                                                    <option value = "{{ $vtp->vehicle_type_ID }}">{{ $vtp->vehicle_type_name }}</option>
                                                   @endif
                                                  @endforeach
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>If others, specify:</small></label>
                                            <input id = "specify_vehicle_type" name = "specify_vehicle_type" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Plate Number:</small></label>
                                            <input id = "plate_number" name = "plate_number" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Vehicle Make:</small></label>
                                            <select id = "vehicle_make" name = "vehicle_make" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" >-- Select Vehicle Make --</option>
                                                  @foreach($vMake as $vmk)
                                                   @if($vmk->del_flag == 0)
                                                    <option value = "{{ $vmk->vehicle_make_ID }}">{{ $vmk->vehicle_make_name }}</option>
                                                   @endif
                                                  @endforeach
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>If others, specify:</small></label>
                                            <input id = "specify_vehicle_make" name = "specify_vehicle_make" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Engine Number:</small></label>
                                            <input id = "engine_number" name = "engine_number" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-8">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Year Model:</small></label>
                                            <input id = "year_model" name = "year_model" type="number" class="form-control" min="1900" max="2099" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Chassis Number:</small></label>
                                            <input id = "chassis_number" name = "chassis_number" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Vehicle Model:</small></label>
                                            <select id = "vehicle_model" name = "vehicle_model" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "">-- Select Vehicle Model --</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>If others, specify:</small></label>
                                            <input id = "specify_vehicle_model" name = "specify_vehicle_model" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>MV File Number:</small></label>
                                            <input id = "mvfile_number" name = "mvfile_number" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Vehicle's Market Value:</small></label>
                                            <input id = "vehicle_market_value" name = "vehicle_market_value" type="text" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Seat Capacity:</small></label>
                                            <input id = "seat_capacity" name = "seat_capacity" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Color:</small></label>
                                            <input id = "color" name = "color" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <button type="button" id="next1"  class="btn btn-block bg-teal waves-effect left" onclick=" 
                                    if($('#quote').valid())
                                    {
                                        $(this).parents('#vDet').hide(800);
                                        $('#qDet').show(800);
                                        $('#vehicleDetails').removeClass('active');
                                        $('#quoteDetails').removeClass('disabled');
                                        $('#quoteDetails').addClass('active');
                                        $('body,html').animate({
                                                                    scrollTop: 0
                                                                }, 500);
                                                                return false;
                                    }
                                    ">
                                        <span style="font-size: 15px;"> NEXT</span>
                                    </button>
                                </div>
                            </div>
                        </div> <!-- END OF BODY -->
                    </div> <!-- END OF CARD -->

                    <div class="card" id="qDet">
                        <div class="header">
                            <h2>QUOTATION DETAILS</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Insurance Company:</small></label>
                                            <select id = "insurance_comp" name = "insurance_comp" class="form-control show-tick" data-live-search="true" readonly="true">
                                              <option selected value = "" style = "display: none;">-- Select Insurance Company --</option>
                                                @foreach($company as $insc)
                                                 @if($insc->del_flag == 0)
                                                  @if($insc->comp_type == 0)
                                                   <option value = "{{ $insc->comp_ID }}">{{ $insc->comp_name }}</option>
                                                  @endif
                                                 @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <h4>Comprehensive Insurance Policy Premiums <button style="float: right;" type="button" id="next1"  class="btn bg-green waves-effect left" data-toggle="modal" data-target="#editt"> EDIT</button></h4>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Own Damage/Theft:</small></label>
                                            <input id = "odt" name = "odt" type="text" class="form-control" pattern="[A-Za-z'-]" readonly >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Third Party Property Damage:</small></label>
                                            <input id = "tppd" name = "tppd" type="text" class="form-control" pattern="[A-Za-z'-]" readonly >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Third Party Bodily Injury:</small></label>
                                            <input id = "tpbi" name = "tpbi" type="text" class="form-control" pattern="[A-Za-z'-]" readonly >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Personal Accident:</small></label>
                                            <input id = "pa" name = "pa" type="text" class="form-control" pattern="[A-Za-z'-]" readonly >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Acts of Nature:</small></label>
                                            <input id = "aon" name = "aon" type="text" class="form-control" pattern="[A-Za-z'-]" readonly >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Basic Premium:</small></label>
                                            <b><input id = "basic_premium" name = "basic_premium" type="text" class="form-control" pattern="[A-Za-z'-]" readonly ></b>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Value Added Tax (VAT):</small></label>
                                            <input id = "vat" name = "vat" type="text" class="form-control" pattern="[A-Za-z'-]" readonly >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Documentary Stamp Tax (DST):</small></label>
                                            <input id = "dst" name = "dst" type="text" class="form-control" pattern="[A-Za-z'-]" readonly >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Local Government Tax:</small></label>
                                            <input id = "local_gov_tax" name = "local_gov_tax" type="text" class="form-control" pattern="[A-Za-z'-]" readonly >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Deductible:</small></label>
                                            <input id = "deductible" name = "deductible" type="text" class="form-control" pattern="[A-Za-z'-]" readonly >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Total Net Premium:</small></label>
                                            <b><input id = "total_net_premium" name = "total_net_premium" type="text" class="form-control" pattern="[A-Za-z'-]" style="font-size: 20px; color: red;" readonly ></b>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <button type="button" id="next1"  class="btn btn-block bg-blue waves-effect left" onclick=" 
                                    $(this).parents('#qDet').hide(800);
                                    $('#vDet').show(800);
                                    $('#vehicleDetails').addClass('active');
                                    $('#quoteDetails').removeClass('active');
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
                                    if($('#quote').valid())
                                    {
                                        $(this).parents('#qDet').hide(800);
                                        $('#cDet').show(800);
                                        $('#quoteDetails').removeClass('active');
                                        $('#clientDetails').removeClass('disabled');
                                        $('#clientDetails').addClass('active');
                                        $('body,html').animate({
                                                                    scrollTop: 0
                                                                }, 500);
                                                                return false;
                                    }
                                    ">
                                        <span style="font-size: 15px;"> NEXT</span>
                                    </button>
                                </div>
                            </div>
                        </div> <!-- END OF BODY -->
                    </div><!-- END OF CARD -->

                    <div class="card" id="cDet">
                        <div class="header">
                            <h2>CLIENT DETAILS</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <label><small>Client Type:</small></label>
                                </div>
                                <div class="col-md-2">
                                    <input name="client_type" type="radio" id="ind" value = "0" class="with-gap" onclick="
                                    $('#individualClient').show(800);
                                    $('#companyClient').hide(800);" />
                                    <label for="ind">Individual</label>
                                </div>
                                <div class="col-md-2">
                                    <input name="client_type" type="radio" id="co" value = "1" class="with-gap" onclick="
                                    $('#companyClient').show(800);
                                    $('#individualClient').hide(800);"/>
                                    <label for="co">Company</label>
                                </div>
                            </div>

                            <div id="individualClient">
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <label><b>Personal Information</b></label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>First Name:</small></label>
                                                <input id = "indi_first_name" name = "indi_first_name" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Birthday:</small></label>
                                                <input id = "indi_bday" name = "indi_bday" type="date" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Middle Name:</small></label>
                                                <input id = "indi_middle_name" name = "indi_middle_name" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Age:</small></label>
                                                <input id = "indi_age" name = "indi_age" type="number" class="form-control" pattern="[A-Za-z'-]" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Last Name:</small></label>
                                                <input id = "indi_last_name" name = "indi_last_name" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Gender:</small></label>
                                                <input name="indi_gender" type="radio" id="indi_male" value = "0" class="with-gap" />
                                                <label for="indi_male">Male</label>
                                                <input name="indi_gender" type="radio" id="indi_female" value = "1" class="with-gap" />
                                                <label for="indi_female">Female</label>
                                                <div id = "gender_error"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <label><b>Contact Details</b></label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Cellphone Number:</small></label>
                                                <input id = "indi_cpnum" name = "indi_cpnum" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Cellphone Number (Alternate):</small></label>
                                                <input id = "indi_cpnum_2" name = "indi_cpnum_2" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Telephone Number:</small></label>
                                                <input id = "indi_tpnum" name = "indi_tpnum" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Email:</small></label>
                                                <input id = "indi_email" name = "indi_email" type="email" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <label><b>Sales Agent</b></label>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select id = "indi_agent" name = "indi_agent" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" style = "display: none;">-- Select Sales Agent --</option>
                                                 @foreach($sales as $saleA)
                                                  @if($saleA->del_flag == 0)
                                                  @if($saleA->sales_agent_flag == 1)
                                                  @foreach($pInfo as $info)
                                                   @if($info->pinfo_ID == $saleA->personal_info_ID)
                                                   <option value = "{{$saleA->agent_ID}}">{{$info->pinfo_last_name}}, {{$info->pinfo_first_name}} {{$info->pinfo_middle_name}}</option>
                                                   @endif
                                                  @endforeach
                                                  @endif
                                                  @endif
                                                 @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <label><b>Residential Address</b></label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Blk&Lot/Bldg/Unit/No.:</small></label>
                                                <input id = "indi_blcknum" name = "indi_blcknum" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>District:</small></label>
                                                <input id = "indi_district" name = "indi_district" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Street:</small></label>
                                                <input id = "indi_street" name = "indi_street" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>City/Municipality:</small></label>
                                                <input id = "indi_city" name = "indi_city" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Subdivision:</small></label>
                                                <input id = "indi_subdivision" name = "indi_subdivision" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Province:</small></label>
                                                <input id = "indi_province" name = "indi_province" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Barangay:</small></label>
                                                <input id = "indi_barangay" name = "indi_barangay" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Region:</small></label>
                                                <select id = "indi_region" name = "indi_region" class="form-control show-tick" data-live-search="true" readonly="true">
                                                      <option selected value = "" style = "display: none;">-- Select Region --</option>
                                                        <option value = "I">Region I</option>
                                                        <option value = "II">Region II</option>
                                                        <option value = "III">Region III</option>
                                                        <option value = "IV-A">Region IV-A</option>
                                                        <option value = "IV-B">Region IV-B</option>
                                                        <option value = "V">Region V</option>
                                                        <option value = "VI">Region VI</option>
                                                        <option value = "VII">Region VII</option>
                                                        <option value = "VIII">Region VIII</option>
                                                        <option value = "IX">Region IX</option>
                                                        <option value = "X">Region X</option>
                                                        <option value = "XI">Region XI</option>
                                                        <option value = "XII">Region XII</option>
                                                        <option value = "XIII">Region XIII</option>
                                                        <option value = "ARMM">Region ARMM</option>
                                                        <option value = "CAR">Region CAR</option>
                                                        <option value = "NCR">Region NCR</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Zip Code:</small></label>
                                                <input id = "indi_zipcode" name = "indi_zipcode" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- END OF INDIVIDUAL -->

                            <div id="companyClient">
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <label><b>Company Details</b></label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Company Name:</small></label>
                                                <input id = "comp_name" name = "comp_name" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <label><b>Company Contact Details</b></label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Telephone Number:</small></label>
                                                <input id = "comp_tpnum" name = "comp_tpnum" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Fax Number:</small></label>
                                                <input id = "comp_faxnum" name = "comp_faxnum" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Email:</small></label>
                                                <input id = "comp_email" name = "comp_email" type="email" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <label><b>Company Address</b></label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Blk&Lot/Bldg/Unit/No.:</small></label>
                                                <input id = "comp_blcknum" name = "comp_blcknum" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>District:</small></label>
                                                <input id = "comp_district" name = "comp_district" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Street:</small></label>
                                                <input id = "comp_street" name = "comp_street" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>City/Municipality:</small></label>
                                                <input id = "comp_city" name = "comp_city" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Subdivision:</small></label>
                                                <input id = "comp_subdivision" name = "comp_subdivision" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Province:</small></label>
                                                <input id = "comp_province" name = "comp_province" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Barangay:</small></label>
                                                <input id = "comp_barangay" name = "comp_barangay" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Region:</small></label>
                                                <select id = "comp_region" name = "comp_region" class="form-control show-tick" data-live-search="true" readonly="true">
                                                      <option selected value = "" style = "display: none;">-- Select Region --</option>
                                                        <option value = "I">Region I</option>
                                                        <option value = "II">Region II</option>
                                                        <option value = "III">Region III</option>
                                                        <option value = "IV-A">Region IV-A</option>
                                                        <option value = "IV-B">Region IV-B</option>
                                                        <option value = "V">Region V</option>
                                                        <option value = "VI">Region VI</option>
                                                        <option value = "VII">Region VII</option>
                                                        <option value = "VIII">Region VIII</option>
                                                        <option value = "IX">Region IX</option>
                                                        <option value = "X">Region X</option>
                                                        <option value = "XI">Region XI</option>
                                                        <option value = "XII">Region XII</option>
                                                        <option value = "XIII">Region XIII</option>
                                                        <option value = "ARMM">Region ARMM</option>
                                                        <option value = "CAR">Region CAR</option>
                                                        <option value = "NCR">Region NCR</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Zip Code:</small></label>
                                                <input id = "comp_zipcode" name = "comp_zipcode" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <label><b>Contact Person Information</b></label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>First Name:</small></label>
                                                <input id = "cont_first_name" name = "cont_first_name" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Birthday:</small></label>
                                                <input id = "cont_bday" name = "cont_bday" type="date" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Middle Name:</small></label>
                                                <input id = "cont_middle_name" name = "cont_middle_name" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Age:</small></label>
                                                <input id = "cont_age" name = "cont_age" type="number" class="form-control" pattern="[A-Za-z'-]" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Last Name:</small></label>
                                                <input id = "cont_last_name" name = "cont_last_name" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Gender:</small></label>
                                                <input name="cont_gender" type="radio" id="cont_male" value = "0" class="with-gap" />
                                                <label for="cont_male">Male</label>
                                                <input name="cont_gender" type="radio" id="cont_female" value = "1" class="with-gap" />
                                                <label for="cont_female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <label><b>Contact Details</b></label>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Cellphone Number:</small></label>
                                                <input id = "cont_cpnum" name = "cont_cpnum" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Cellphone Number (Alternate):</small></label>
                                                <input id = "cont_cpnum_2" name = "cont_cpnum_2" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Telephone Number:</small></label>
                                                <input id = "cont_tpnum" name = "cont_tpnum" type="text" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Email:</small></label>
                                                <input id = "cont_email" name = "cont_email" type="email" class="form-control" pattern="[A-Za-z'-]" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <label><b>Sales Agent</b></label>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select id = "comp_agent" name = "comp_agent" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" style = "display: none;">-- Select Sales Agent --</option>
                                                 @foreach($sales as $saleA)
                                                  @if($saleA->del_flag == 0)
                                                  @if($saleA->sales_agent_flag == 1)
                                                  @foreach($pInfo as $info)
                                                   @if($info->pinfo_ID == $saleA->personal_info_ID)
                                                   <option value = "{{$saleA->agent_ID}}">{{$info->pinfo_last_name}}, {{$info->pinfo_first_name}} {{$info->pinfo_middle_name}}</option>
                                                   @endif
                                                  @endforeach
                                                  @endif
                                                  @endif
                                                 @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                            </div> <!-- END OF COMPANY -->

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <button type="button" id="next1"  class="btn btn-block bg-blue waves-effect left" onclick=" 
                                    $(this).parents('#cDet').hide(800);
                                    $('#qDet').show(800);
                                    $('#quoteDetails').addClass('active');
                                    $('#clientDetails').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                        <span style="font-size: 15px;"> PREVIOUS</span>
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" id="client_next" class="btn btn-block bg-teal waves-effect left" onclick=" 
                                    if($('input[name=client_type]:checked').val()) 
                                    {
                                        if($('#quote').valid())
                                        {
                                            $(this).parents('#cDet').hide(800);
                                            $('#tos').show(800);
                                            $('#clientDetails').removeClass('active');
                                            $('#termsDetails').removeClass('disabled');
                                            $('#termsDetails').addClass('active');
                                            $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);
                                                                    return false;
                                        }
                                    }
                                    else
                                    {
                                        swal({
                                        title: 'Please select a client type',
                                        type: 'warning',
                                        timer: 1000,
                                        showConfirmButton: false
                                        });
                                    }
                                    ">
                                        <span style="font-size: 15px;"> NEXT</span>
                                    </button>
                                </div>
                            </div>
                        </div> <!-- END OF BODY -->
                    </div><!-- END OF CARD -->

                    <div class="card" id="tos">
                        <div class="header">
                            <h2>TERMS OF SERVICE</h2>

                            <p style="text-align: center"><b>Terms of Service</b><p>
                                    <p class="text-justify">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce posuere nulla nisi, eu gravida est lobortis sit amet. Nulla facilisi. Duis tincidunt auctor diam, vel posuere lacus sollicitudin in. Sed finibus luctus tellus, non ornare leo aliquam a. Aliquam erat volutpat. Sed vel auctor elit. Curabitur ultricies mi id tellus tempor, a tincidunt nunc malesuada. Morbi sollicitudin, ipsum sed fringilla tincidunt, lorem quam cursus risus, sed aliquam nunc ipsum eu sem. Etiam vulputate massa justo, vel volutpat mauris accumsan at. Curabitur egestas, ante non luctus interdum, felis nisi ullamcorper felis, eget porttitor massa turpis ac dolor. <br/><br/>

                                        Proin ante sapien, rhoncus sed sagittis a, convallis ut risus. Morbi eget arcu ipsum. Suspendisse congue in diam ut euismod. Mauris accumsan sagittis pellentesque. Curabitur consequat orci urna, a rutrum sem sodales in. Morbi egestas auctor lectus, nec ullamcorper arcu semper et. Quisque non neque suscipit, lacinia sapien ut, consequat nulla. Curabitur vitae lectus ante. Integer non convallis lacus. <br/><br/>

                                        Etiam at gravida neque. Vivamus nisi erat, porttitor quis eros non, venenatis fermentum magna. Etiam arcu lorem, convallis vel sollicitudin et, dictum nec lectus. In vitae cursus libero. Sed sed commodo ipsum, in fermentum mi. Sed scelerisque felis eget dictum vulputate. Vivamus a massa ut quam varius bibendum. Nullam hendrerit ligula nec aliquet mollis. <br/><br/>

                                        Aliquam nec enim non sapien mollis ultricies at in diam. In dignissim, eros at maximus tincidunt, lacus orci accumsan libero, eu rutrum ante dolor sit amet leo. Aliquam et mi sit amet turpis tincidunt sollicitudin. Suspendisse eleifend varius aliquet. Quisque eleifend, massa a dignissim aliquam, diam mi mattis est, sed sodales lectus turpis quis urna. Morbi dapibus ante a dolor malesuada pretium. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean convallis id ipsum et ultrices. Nulla ornare, lorem sit amet consectetur volutpat, velit felis feugiat mauris, et viverra leo magna in est. Suspendisse tempor euismod euismod. Ut dictum neque a nunc consequat, vel facilisis lectus elementum. Maecenas lorem tortor, sagittis vitae risus id, vulputate auctor nibh. Duis ac dui non lectus scelerisque condimentum. Vivamus viverra maximus porta. Duis vitae vehicula magna. <br/><br/>

                                        Curabitur elit ipsum, euismod sit amet mattis dapibus, accumsan non arcu. Ut eu nisi euismod, semper massa et, viverra tellus. Etiam id dolor non orci auctor mattis. Nunc rutrum a nunc sed efficitur. Nulla ornare elit bibendum urna commodo, porta convallis nisl fermentum. Nam ac tempor elit. Nulla ut augue vitae mauris sollicitudin sagittis ac et velit.
                                    </p><br/><br/>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <input type="checkbox" id="terms_agreement" name="ta" class="chk-col-teal"/>
                                    <label for="terms_agreement"><b>I agree to terms of service</b></label>
                                </div>
                            </div><br/><br/>

                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <button type="button" id="next1"  class="btn btn-block bg-blue waves-effect left" onclick=" 
                                    $(this).parents('#tos').hide(800);
                                    $('#cDet').show(800);
                                    $('#clientDetails').addClass('active');
                                    $('#termsDetails').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                        <span style="font-size: 15px;"> PREVIOUS</span>
                                    </button>
                                </div>

                                <div class="col-md-4">
                                    <button type="button" id="next1" class="btn btn-block bg-orange waves-effect left"> <span style="font-size: 15px;" onclick=" window.open('{{ URL::asset ('/admin/pdf/quotation-proposal') }}')"> GENERATE PDF</span></button>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" id="finish"  class="btn btn-block bg-green waves-effect left">
                                        <span style="font-size: 15px;"> FINISH</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div><!-- END OF CARD -->
                </div>

                <!-- #END# BREAKDOWN -->
            </div>
        </div>

    <!-- CHOOSE INST MODAL -->
            <div id="editt" class="modal fade" data-backdrop="false" role="dialog">
                                        <div class="modal-dialog" role="document">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Edit Coverage</h4>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xs-5">
                                                        <b>Third Party Property Damage</b>
                                                    </div>
                                                    <div class="col col-xs-3">
                                                        <label for="tppd_coverage">Coverage: </label>
                                                        <select id="tppd_coverage" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                                        <option selected value = "" style = "display: none;">-- Coverage --</option>
                                                        </select>
                                                    </div>
                                                    <div class="col col-xs-4">
                                                        <label for="tppd_vclass">Vehicle Class: </label>
                                                        <select id="tppd_vclass" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                                          <option value="1">Private Car</option>
                                                          <option value="2">Commercial Vehicle (Light & Medium)</option>
                                                          <option value="3">Commercial Vehicle (Heavy)</option>
                                                        </select>
                                                    </div>
                                                </div><br/>

                                                <div class="row">
                                                    <div class="col-xs-5">
                                                        <b>Third Party Bodily Injury</b>
                                                    </div>
                                                    <div class="col col-xs-3">
                                                        <label for="tpbi_coverage">Coverage: </label>
                                                        <select id="tpbi_coverage" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                                        <option selected value = "" style = "display: none;">-- Coverage --</option>
                                                        </select>
                                                    </div>
                                                    <div class="col col-xs-4">
                                                        <label for="tpbi_vclass">Vehicle Class: </label>
                                                        <select id="tpbi_vclass" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                                          <option value="1">Private Car</option>
                                                          <option value="2">Commercial Vehicle (Light & Medium)</option>
                                                          <option value="3">Commercial Vehicle (Heavy)</option>
                                                        </select>
                                                    </div>
                                                </div><br/>

                                                <div class="row">
                                                    <div class="col-xs-5">
                                                        <b>Personal Accident</b>
                                                    </div>
                                                    <div class="col col-xs-7">
                                                        <label for="pa_coverage">Coverage: </label>
                                                        <select id="pa_coverage" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                                        <option selected value = "" style = "display: none;">-- Coverage --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                              <div class="clearfix"><button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
            <!-- #END# ADD INST MODAL -->
            </form>
    </section>

    <script>

            jQuery.validator.setDefaults({
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "indi_gender" )  
                        error.insertBefore(element);
                    else if(element.attr("name") == "cont_gender" )  
                        error.insertBefore(element);
                    else 
                        error.insertAfter(element);
                }
            });

            $.validator.addMethod("minAge", function(value, element) {
                var curDate = new Date();
                var inputDate = new Date(value);
                var age = Math.abs(inputDate.getFullYear() - curDate.getFullYear());
                if((curDate.getMonth() + 1) >= inputDate.getMonth())
                {      
                    age = Math.abs(inputDate.getFullYear() - curDate.getFullYear()) - 1;
                    if((curDate.getDate()) >= inputDate.getDate())
                    {
                        age = Math.abs(inputDate.getFullYear() - curDate.getFullYear());
                    }
                }
                else
                {
                    age = Math.abs(inputDate.getFullYear() - curDate.getFullYear()) - 1;
                }
                if (age >= 18)
                    return true;
                return false;
            }, "Age Limit is 18."); 
            $.validator.addMethod("maxAge", function(value, element) {
                var curDate = new Date();
                var inputDate = new Date(value);
                var age = Math.abs(inputDate.getFullYear() - curDate.getFullYear());
                if((curDate.getMonth() + 1) >= inputDate.getMonth())
                {      
                    age = Math.abs(inputDate.getFullYear() - curDate.getFullYear()) - 1;
                    if((curDate.getDate()) >= inputDate.getDate())
                    {
                        age = Math.abs(inputDate.getFullYear() - curDate.getFullYear());
                    }
                }
                else
                {
                    age = Math.abs(inputDate.getFullYear() - curDate.getFullYear()) - 1;
                }
                if (age <= 130)
                    return true;
                return false;
            }, "Maximum age is 130."); 
            $.validator.addMethod("cpValidator", function(value, element) {
                return this.optional(element) || /^((\+63)|0)\d{10}$/i.test(value);
             }, "Invalid Cellphone Format");
            $.validator.addMethod("email", function(value, element) {
                return this.optional(element) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i.test(value);
             }, "Invalid Email Address Format");
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
              $("form[name='quote']").validate({
                // Specify validation rules
                rules: {
                  // The key name on the left side is the name attribute
                  // of an input field. Validation rules are defined
                  // on the right side
                  year_model:{
                    required: true
                  },
                  specify_vehicle_type:{
                    required: true
                  },
                  specify_vehicle_model:{
                    required: true
                  },
                  specify_vehicle_make:{
                    required: true
                  },
                  plate_number:{
                    maxlength: 20
                  },
                  engine_number:{
                    maxlength: 50
                  },
                  chassis_number:{
                    maxlength: 50
                  },
                  mvfile_number:{
                    maxlength: 50
                  },
                  vehicle_market_value:{
                    required: true,
                    maxlength: 50
                  },
                  color:{
                    maxlength: 50
                  },
                  insurance_comp:{
                    required: true
                  },
                  tppd:{
                    required: true
                  },
                  tpbi:{
                    required: true
                  },
                  pa:{
                    required: true
                  },
                  comp_tpnum:{
                    required: true
                  },
                  indi_first_name:{
                    required: true,
                    alpha: true,
                    maxlength: 30
                  },
                  indi_middle_name:{
                    alpha: true,
                    maxlength: 20
                  },
                  indi_last_name:{
                    required: true,
                    alpha: true,
                    maxlength: 30
                  },
                  indi_bday:{
                    required: true,
                    minAge: true,
                    maxAge: true
                  },
                  indi_gender:{
                    required: true
                  },
                  indi_cpnum:{
                    required: true,
                    cpValidator: true
                  },
                  indi_cpnum_2:{
                    cpValidator: true
                  },
                  indi_tpnum:{
                    digits: true,
                    maxlength: 7,
                    minlength: 7
                  },
                  indi_email:{
                    required: true,
                    email: true
                  },
                  indi_agent:{
                    required: true
                  },
                  indi_region:{
                    required: true
                  },
                  indi_city:{
                    required: true
                  },
                  comp_name:{
                    required: true,
                    maxlength: 30
                  },
                  comp_tpnum:{
                    digits: true,
                    required: true,
                    maxlength: 7,
                    minlength: 7
                  },
                  comp_faxnum:{
                    digits: true,
                    maxlength: 7,
                    minlength: 7
                  },
                  comp_email:{
                    required: true,
                    email: true
                  },
                  comp_region:{
                    required: true
                  },
                  comp_city:{
                    required: true
                  },
                  cont_first_name:{
                    required: true,
                    alpha: true,
                    maxlength: 30
                  },
                  cont_middle_name:{
                    alpha: true,
                    maxlength: 20
                  },
                  cont_last_name:{
                    required: true,
                    alpha: true,
                    maxlength: 30
                  },
                  cont_bday:{
                    required: true,
                    minAge: true,
                    maxAge: true
                  },
                  cont_gender:{
                    required: true
                  },
                  cont_cpnum:{
                    required: true,
                    cpValidator: true
                  },
                  cont_cpnum_2:{
                    cpValidator: true
                  },
                  cont_tpnum:{
                    maxlength: 7,
                    minlength: 7
                  },
                  cont_email:{
                    required: true,
                    email: true
                  },
                  comp_agent:{
                    required: true
                  },
                },
                messages:
                {
                  indi_gender:
                  {
                    required:"Please select a gender"
                  },
                  cont_gender:
                  {
                    required:"Please select a gender"
                  }
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                  form.submit();
                }
              });
            });
    </script>

    <script type="text/javascript">
        window.onload = function() {
          document.getElementById('qDet').style.display = 'none';
          document.getElementById('cDet').style.display = 'none';
          document.getElementById('tos').style.display = 'none';
          document.getElementById('individualClient').style.display = 'none';
          document.getElementById('companyClient').style.display = 'none';
          $('#quote').valid();
        };
        
        $('#finish').on('click', function(){
            if($('input[name="ta"]:checked').length <= 0)
            {
                swal({
                title: 'YOU MUST AGREE TO THE TERMS OF SERVICE',
                type: 'warning',
                timer: 1000,
                showConfirmButton: false
                });
            }
            else
            {
                $('#quote').submit();
            }
        }); 

        $('#indi_bday').on('change textInput input', function () {
            var bday = document.getElementById("indi_bday").value.split('-');
            var today = new Date();
            if(bday[0] != 0)
            {
                if((today.getMonth() + 1) >= bday[1])
                {      
                  document.getElementById("indi_age").value = today.getFullYear() - bday[0] - 1;
                    if((today.getDate()) >= bday[2])
                    {
                        document.getElementById("indi_age").value = today.getFullYear() - bday[0];
                    }
                }
                else
                {
                  document.getElementById("indi_age").value = today.getFullYear() - bday[0] - 1;
                }
            }
            else
            {
                document.getElementById("indi_age").value = "Invalid Input";
            }
        });

        $('#cont_bday').on('change textInput input', function () {
            var bday = document.getElementById("cont_bday").value.split('-');
            var today = new Date();
            if(bday[0] != 0)
            {
                if((today.getMonth() + 1) >= bday[1])
                {      
                  document.getElementById("cont_age").value = today.getFullYear() - bday[0] - 1;
                    if((today.getDate()) >= bday[2])
                    {
                        document.getElementById("cont_age").value = today.getFullYear() - bday[0];
                    }
                }
                else
                {
                  document.getElementById("cont_age").value = today.getFullYear() - bday[0] - 1;
                }
            }
            else
            {
                document.getElementById("cont_age").value = "Invalid Input";
            }
        });

        $('input[name="client_type"]').on('change', function () {
            var type = $(this).val();

            if(type == 0)
                $('#quote').attr('action','/accounting-staff/transaction/quotation-walkin/individual');
            else
                $('#quote').attr('action','/accounting-staff/transaction/quotation-walkin/company');

            $('#quote').valid();
        });    

        $('#insurance_comp').on('change', function (){
            var ins = $(this).val();
            var newOptions = [];
            var data = 0;
            @foreach($ppa as $pa)
             @if($pa->del_flag == 0)
              if(ins == '{{$pa->insurance_compID}}')
                {
                   newOptions[data] = { ID : "{{ $pa->premiumPA_ID }}", limit : "{{ $pa->insuranceLimit }}", total : "{{ $pa->insuranceCover + $pa->passengerCover + $pa->mrCover }}", person : "{{$pa->passengerNum}}" };
                   data += 1;   
                }
             @endif
            @endforeach
            $('#pa_coverage option:gt(0)').remove();
            $.each(newOptions, function(key,value) {
              var option = '<option value="'+value.ID+'" data-value="'+value.total+'">Number of Person '+value.person+' Coverage ₱ '+numberWithCommas(value.limit)+'</option>';
              $('#pa_coverage:last').append(option);
            });
            $("#pa_coverage").prop("selectedIndex", -1);
            $('#pa_coverage').selectpicker('refresh');
            $('#pa').val("");

            data = 0;
            newOptions = [];

            @foreach($pdg as $dg)
             @if($dg->damage_type == 1)
              @if($pa->del_flag == 0)
                if(ins == '{{$dg->insurance_compID}}')
                {
                   newOptions[data] = { ID : "{{ $dg->premiumDG_ID }}", limit : "{{ $dg->insuranceLimit }}"};
                   data += 1;   
                }
              @endif
             @endif
            @endforeach
            $('#tppd_coverage option:gt(0)').remove();
            $.each(newOptions, function(key,value) {
              var option = '<option value="'+value.ID+'" data-id="'+value.ID+'">₱ '+numberWithCommas(value.limit)+'</option>';
              $('#tppd_coverage:last').append(option);
            });
            $("#tppd_coverage").prop("selectedIndex", -1);
            $('#tppd_coverage').selectpicker('refresh');
            $('#tppd').val("");

            data = 0;
            newOptions = [];

            @foreach($pdg as $dg)
             @if($dg->damage_type == 0)
              @if($pa->del_flag == 0)
                if(ins == '{{$dg->insurance_compID}}')
                {
                   newOptions[data] = { ID : "{{ $dg->premiumDG_ID }}", limit : "{{ $dg->insuranceLimit }}"};
                   data += 1;   
                }
              @endif
             @endif
            @endforeach
            $('#tpbi_coverage option:gt(0)').remove();
            $.each(newOptions, function(key,value) {
              var option = '<option value="'+value.ID+'" data-id="'+value.ID+'">₱ '+numberWithCommas(value.limit)+'</option>';
              $('#tpbi_coverage:last').append(option);
            });
            $("#tpbi_coverage").prop("selectedIndex", -1);
            $('#tpbi_coverage').selectpicker('refresh');
            $('#tpbi').val("");

            compute();
        });

        $('#tpbi_vclass').on('change textInput input', function () {
            var selected = $('#tpbi_vclass').find(':selected').val();
            var option;
            $('#tppd_vclass option').remove();
            if(selected == 1)
            {
                option = '<option value = 1 selected>Private Car</option>' ;
                $('#tppd_vclass:last').append(option);
                option = '<option value = 2 >Commercial Vehicle (Light & Medium)</option>' ;
                $('#tppd_vclass:last').append(option);
                option = '<option value = 3 >Commercial Vehicle (Heavy)</option>' ;
                $('#tppd_vclass:last').append(option);
            }
            if(selected == 2)
            {
                option = '<option value = 1 >Private Car</option>' ;
                $('#tppd_vclass:last').append(option);
                option = '<option value = 2 selected>Commercial Vehicle (Light & Medium)</option>' ;
                $('#tppd_vclass:last').append(option);
                option = '<option value = 3 >Commercial Vehicle (Heavy)</option>' ;
                $('#tppd_vclass:last').append(option);
            }
            if(selected == 3)
            {
                option = '<option value = 1 >Private Car</option>' ;
                $('#tppd_vclass:last').append(option);
                option = '<option value = 2 >Commercial Vehicle (Light & Medium)</option>' ;
                $('#tppd_vclass:last').append(option);
                option = '<option value = 3 selected>Commercial Vehicle (Heavy)</option>' ;
                $('#tppd_vclass:last').append(option);
            }
            $('#tppd_vclass').selectpicker('refresh');

            // $('#form_client_company').valid();

            // var id = $('#comp_bi').find(':selected').data('id');
            // var id2 = $('#comp_pd').find(':selected').data('id');
            // var pvpremium = [];
            // var hvpremium = [];
            // var lvpremium = [];
            // @foreach($pdg as $bi)
            //   pvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->privateCar }});
            //   hvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Heavy }});
            //   lvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Light }});
            // @endforeach
            // if($(this).val() == 1)
            // $('#comp_bi_premium').val(pvpremium[id]);
            // if($(this).val() == 2)
            // $('#comp_bi_premium').val(hvpremium[id]);
            // if($(this).val() == 3)
            // $('#comp_bi_premium').val(lvpremium[id]);

            // if($(this).val() == 1)
            // $('#comp_pd_premium').val(pvpremium[id2]);
            // if($(this).val() == 2)
            // $('#comp_pd_premium').val(hvpremium[id2]);
            // if($(this).val() == 3)
            // $('#comp_pd_premium').val(lvpremium[id2]);
            // compute_comp();
            compute();
        });

        $('#tppd_vclass').on('change textInput input', function () {
            var selected = $('#tppd_vclass').find(':selected').val();
            var option;
            $('#tpbi_vclass option').remove();
            if(selected == 1)
            {
                option = '<option value = 1 selected>Private Car</option>' ;
                $('#tpbi_vclass:last').append(option);
                option = '<option value = 2 >Commercial Vehicle (Light & Medium)</option>' ;
                $('#tpbi_vclass:last').append(option);
                option = '<option value = 3 >Commercial Vehicle (Heavy)</option>' ;
                $('#tpbi_vclass:last').append(option);
            }
            if(selected == 2)
            {
                option = '<option value = 1 >Private Car</option>' ;
                $('#tpbi_vclass:last').append(option);
                option = '<option value = 2 selected>Commercial Vehicle (Light & Medium)</option>' ;
                $('#tpbi_vclass:last').append(option);
                option = '<option value = 3 >Commercial Vehicle (Heavy)</option>' ;
                $('#tpbi_vclass:last').append(option);
            }
            if(selected == 3)
            {
                option = '<option value = 1 >Private Car</option>' ;
                $('#tpbi_vclass:last').append(option);
                option = '<option value = 2 >Commercial Vehicle (Light & Medium)</option>' ;
                $('#tpbi_vclass:last').append(option);
                option = '<option value = 3 selected>Commercial Vehicle (Heavy)</option>' ;
                $('#tpbi_vclass:last').append(option);
            }
            $('#tpbi_vclass').selectpicker('refresh');
            compute();
        });
                
        $('#year_model').on('change textInput input', function () {
            var newOptions = [];
            var data = 0;
            if($("#vehicle_type").val() != "")
            {
                @foreach($vModel as $vmd)
                 @if($vmd->del_flag == 0)
                  if($('#vehicle_type').val() == "{{ $vmd->vehicle_type }}" && $("#vehicle_make").val() == "{{ $vmd->vehicle_make_ID }}" && $("#year_model").val() == "{{$vmd->vehicle_year}}")
                  {
                   newOptions[data] = { model_name : "{{ $vmd->vehicle_year." - ".$vmd->vehicle_model_name }}", model_ID : "{{ $vmd->vehicle_model_ID }}", model_value : "{{ $vmd->vehicle_value }}" };
                   data += 1;
                  }
                 @endif
                @endforeach
                $('#vehicle_model option:gt(0)').remove();
                $.each(newOptions, function(key,value) {
                  var option = '<option value="'+value.model_ID+'" data-value="'+value.model_value+'">'+value.model_name+'</option>';
                  $('#vehicle_model:last').append(option);
                });
                $("#vehicle_model").prop("selectedIndex", -1);
                $('#vehicle_model').selectpicker('refresh');
                $('#vehicle_market_value').val("");
            }
        });
                
        $('#vehicle_type').on('change textInput input', function () {
            var newOptions = [];
            var data = 0;

            if($(this).val() != "")
                $('#specify_vehicle_type').prop('disabled',true);
            else
                $('#specify_vehicle_type').prop('disabled',false);

            if($("#vehicle_make").val() != "")
            {
                @foreach($vModel as $vmd)
                 @if($vmd->del_flag == 0)
                  if($('#vehicle_type').val() == "{{ $vmd->vehicle_type }}" && $("#vehicle_make").val() == "{{ $vmd->vehicle_make_ID }}" && $("#year_model").val() == "{{$vmd->vehicle_year}}")
                  {
                   newOptions[data] = { model_name : "{{ $vmd->vehicle_year." - ".$vmd->vehicle_model_name }}", model_ID : "{{ $vmd->vehicle_model_ID }}", model_value : "{{ $vmd->vehicle_value }}" };
                   data += 1;
                  }
                 @endif
                @endforeach
                $('#vehicle_model option:gt(0)').remove();
                $.each(newOptions, function(key,value) {
                  var option = '<option value="'+value.model_ID+'" data-value="'+value.model_value+'">'+value.model_name+'</option>';
                  $('#vehicle_model:last').append(option);
                });
                $("#vehicle_model").prop("selectedIndex", -1);
                $('#vehicle_model').selectpicker('refresh');
                $('#vehicle_market_value').val("");
            }
        });

        $('#specify_vehicle_type').on('change textInput input', function(){
            if($(this).val()!="")
                $('#vehicle_type').prop('disabled',true);
            else
                $('#vehicle_type').prop('disabled',false);
        });
                
        $('#vehicle_make').on('change textInput input', function () {
            var newOptions = [];
            var data = 0;

            if($(this).val()!="")
                $('#specify_vehicle_make').prop('disabled',true);
            else
                $('#specify_vehicle_make').prop('disabled',false);

            if($("#vehicle_type").val() != "")
            {
                @foreach($vModel as $vmd)
                 @if($vmd->del_flag == 0)
                  if($('#vehicle_type').val() == "{{ $vmd->vehicle_type }}" && $("#vehicle_make").val() == "{{ $vmd->vehicle_make_ID }}" && $("#year_model").val() == "{{$vmd->vehicle_year}}")
                  {
                   newOptions[data] = { model_name : "{{ $vmd->vehicle_year." - ".$vmd->vehicle_model_name }}", model_ID : "{{ $vmd->vehicle_model_ID }}", model_value : "{{ $vmd->vehicle_value }}" };
                   data += 1;
                  }
                 @endif
                @endforeach
                $('#vehicle_model option:gt(0)').remove();
                $.each(newOptions, function(key,value) {
                  var option = '<option value="'+value.model_ID+'" data-value="'+value.model_value+'">'+value.model_name+'</option>';
                  $('#vehicle_model:last').append(option);
                });
                $("#vehicle_model").prop("selectedIndex", -1);
                $('#vehicle_model').selectpicker('refresh');
                $('#vehicle_market_value').val("");
            }
        });

        $('#specify_vehicle_make').on('change textInput input', function(){
            if($(this).val()!="")
                $('#vehicle_make').prop('disabled',true);
            else
                $('#vehicle_make').prop('disabled',false);
        });
                
        $('#vehicle_model').on('change textInput input', function () {

            if($(this).val()!="")
                $('#specify_vehicle_model').prop('disabled',true);
            else
                $('#specify_vehicle_model').prop('disabled',false);

            if($("#vehicle_type").val() != "" && $("#vehicle_make").val() != "")
            {
                $('#vehicle_market_value').val("₱ " + numberWithCommas($("#vehicle_model").find(':selected').data('value')));
            }
        });

        $('#specify_vehicle_model').on('change textInput input', function(){
            if($(this).val()!="")
            {
                $('#vehicle_model').prop('disabled',true);
                $('#vehicle_market_value').val("");
            }
            else
                $('#vehicle_model').prop('disabled',false);
        });

        $('#tppd_coverage').on('change', function () {
            var id = $(this).find(':selected').data('id');
            $('#tppd_ID').val(id);
            var pvpremium = [];
            var hvpremium = [];
            var lvpremium = [];
            @foreach($pdg as $bi)
              pvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->privateCar }});
              hvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Heavy }});
              lvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Light }});
            @endforeach
            if($('#tppd_vclass').val() == 1)
            {
                $('#vehicle_class').val(1);
                $('#tppd').val(pvpremium[id]);
            }
            if($('#tppd_vclass').val() == 2)
            {
                $('#vehicle_class').val(2);
                $('#tppd').val(hvpremium[id]);
            }
            if($('#tppd_vclass').val() == 3)
            {
                $('#vehicle_class').val(3);
                $('#tppd').val(lvpremium[id]);
            }
            compute();
        }); 

        $('#tppd_vclass').on('change', function () {
            var id = $('#tppd_coverage').find(':selected').data('id');
            var pvpremium = [];
            var hvpremium = [];
            var lvpremium = [];
            @foreach($pdg as $bi)
              pvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->privateCar }});
              hvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Heavy }});
              lvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Light }});
            @endforeach
            if($('#tppd_vclass').val() == 1)
            $('#tppd').val(pvpremium[id]);
            if($('#tppd_vclass').val() == 2)
            $('#tppd').val(hvpremium[id]);
            if($('#tppd_vclass').val() == 3)
            $('#tppd').val(lvpremium[id]);
            var id = $('#tpbi_coverage').find(':selected').data('id');
            var pvpremium = [];
            var hvpremium = [];
            var lvpremium = [];
            @foreach($pdg as $bi)
              pvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->privateCar }});
              hvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Heavy }});
              lvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Light }});
            @endforeach
            if($('#tpbi_vclass').val() == 1)
            {
                $('#vehicle_class').val(1);
                $('#tpbi').val(pvpremium[id]);
            }
            if($('#tpbi_vclass').val() == 2)
            {
                $('#vehicle_class').val(2);
                $('#tpbi').val(hvpremium[id]);
            }
            if($('#tpbi_vclass').val() == 3)
            {
                $('#vehicle_class').val(3);
                $('#tpbi').val(lvpremium[id]);
            }
            compute();
        }); 

        $('#tpbi_coverage').on('change', function () {
            var id = $(this).find(':selected').data('id');
            $('#tpbi_ID').val(id);
            var pvpremium = [];
            var hvpremium = [];
            var lvpremium = [];
            @foreach($pdg as $bi)
              pvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->privateCar }});
              hvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Heavy }});
              lvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Light }});
            @endforeach
            if($('#tpbi_vclass').val() == 1)
            {
                $('#vehicle_class').val(1);
                $('#tpbi').val(pvpremium[id]);
            }
            if($('#tpbi_vclass').val() == 2)
            {
                $('#vehicle_class').val(2);
                $('#tpbi').val(hvpremium[id]);
            }
            if($('#tpbi_vclass').val() == 3)
            {
                $('#vehicle_class').val(3);
                $('#tpbi').val(lvpremium[id]);
            }
            compute();
        }); 

        $('#tpbi_vclass').on('change', function () {
            var id = $('#tpbi_coverage').find(':selected').data('id');
            var pvpremium = [];
            var hvpremium = [];
            var lvpremium = [];
            @foreach($pdg as $bi)
              pvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->privateCar }});
              hvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Heavy }});
              lvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Light }});
            @endforeach
            if($('#tpbi_vclass').val() == 1)
            {
                $('#vehicle_class').val(1);
                $('#tpbi').val(pvpremium[id]);
            }
            if($('#tpbi_vclass').val() == 2)
            {
                $('#vehicle_class').val(2);
                 $('#tpbi').val(hvpremium[id]);
            }
            if($('#tpbi_vclass').val() == 3)
            {
                $('#vehicle_class').val(3);
                $('#tpbi').val(lvpremium[id]);
            }
            var id = $('#tppd_coverage').find(':selected').data('id');
            var pvpremium = [];
            var hvpremium = [];
            var lvpremium = [];
            @foreach($pdg as $bi)
              pvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->privateCar }});
              hvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Heavy }});
              lvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Light }});
            @endforeach
            if($('#tppd_vclass').val() == 1)
            {
                $('#vehicle_class').val(1);
                $('#tppd').val(pvpremium[id]);
            }
            if($('#tppd_vclass').val() == 2)
            {
                $('#vehicle_class').val(2);
                $('#tppd').val(hvpremium[id]);
            }
            if($('#tppd_vclass').val() == 3)
            {
                $('#vehicle_class').val(3);
                $('#tppd').val(lvpremium[id]);
            }
            compute();
        }); 

        $('#pa_coverage').on('change', function (){
            var id = $(this).find(':selected').data('value');
            $('#pa_ID').val($(this).find(':selected').val());
            $('#pa').val("₱ " + numberWithCommas(id));
            compute();
        });

        $('select').on('change textInput input', function (){
            $('#quote').valid();
        });

        $('#vehicle_market_value').on('change textInput input', function() {
            compute();
        });

        function compute()
        {
            var ins = $('#insurance_comp').val();

            var coverage = parseFloat($('#vehicle_market_value').val().replace(/[^0-9\.]/g,'')) * .2;

            if(ins == 1)
                $('#deductible').val('₱ '+numberWithCommas(3100));
            if(ins == 2)
                $('#deductible').val('₱ '+numberWithCommas(1000));
            if(ins == 3)
                $('#deductible').val('₱ '+numberWithCommas(3000));
            if(ins == 4)
                $('#deductible').val('₱ '+numberWithCommas(2000));

            if(ins == 1)
                $('#aon').val('₱ '+numberWithCommas(Math.round((coverage * 0.02) * 100)/100));
            if(ins == 2)
                $('#aon').val(0);
            if(ins == 3)
                $('#aon').val('₱ '+numberWithCommas(Math.round((coverage * 0.005) * 100)/100));
            if(ins == 4)
                $('#aon').val('₱ '+numberWithCommas(Math.round((coverage * 0.005) * 100)/100));

            var odt = parseFloat(coverage * .013);

             $('#odt').val('₱ '+numberWithCommas(Math.round(odt * 100)/100));

            var basicpremium = (parseFloat($('#aon').val().replace(/[^0-9\.]/g,'')) + parseFloat($('#tpbi').val().replace(/[^0-9\.]/g,'')) + parseFloat($('#tppd').val().replace(/[^0-9\.]/g,'')) + parseFloat($('#pa').val().replace(/[^0-9\.]/g,''))) + odt;
            
            var vat = basicpremium * .125;
            var stamp = basicpremium * .12;
            var rounded = Math.ceil((basicpremium + vat + stamp)/100)*100;

            var lgt = rounded - (basicpremium + vat + stamp);

            var total = basicpremium + vat + stamp + lgt;

            $('#basic_premium').val("₱ " + numberWithCommas(Math.round(basicpremium * 100)/100));
            $('#local_gov_tax').val("₱ " + numberWithCommas(Math.round(lgt * 100)/100));
            $('#vat').val("₱ " + numberWithCommas(Math.round(vat * 100)/100));
            $('#dst').val("₱ " + numberWithCommas(Math.round(stamp * 100)/100));
            $('#total_net_premium').val("₱ " + numberWithCommas(Math.round(total * 100)/100));
        }

    </script>

@endsection