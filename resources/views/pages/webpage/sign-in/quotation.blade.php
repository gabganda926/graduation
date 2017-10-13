@extends('pages.webpage.webmaster')

@section('title','Quotation | i-Insure')

@section('quote','active')

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
<section>
<div class="content">
    <div class="container">
    <ol class="breadcrumb">
      <li><a href="/home">Home</a></li>
      <li class="active">Quotation</li>
    </ol>
    <div class="row">
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Vehicle Details">
                            <span class="round-tab">
                                <i class="material-icons md-48">directions_car</i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Quotation Details">
                            <span class="round-tab">
                                <i class="material-icons md-48">mode_edit</i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Client Details">
                            <span class="round-tab">
                                <i class="material-icons md-48">account_circle</i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Finish">
                            <span class="round-tab">
                                <i class="material-icons md-48">assignment</i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>


            <div class="registration_form">
                <form id="quote" name = "quote" method="POST">
                <div class="tab-content">

                <!-- STEP 1 -->
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <input id = "pa_ID" name = "pa_ID" type="text" class="form-control" style = "display: none;">
                     <input id = "tppd_ID" name = "tppd_ID" type="text" class="form-control" style = "display: none;">
                     <input id = "tpbi_ID" name = "tpbi_ID" type="text" class="form-control" style = "display: none;">
                     <input id = "vehicle_class" name = "vehicle_class" type="text" class="form-control" style = "display: none;">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <div class="step1">
                            <h3><b>Vehicle Details</b></h3><br/>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col col-xs-4">
                                    <label for="vehicle_type">Vehicle Type: </label>
                                        <select id="vehicle_type" name="vehicle_type" class="selectpicker" data-size="10" data-width="85%">
                                            <option selected value = "" >-- Select Vehicle Type --</option>
                                            @foreach($vtype as $type)
                                             @if($type->del_flag == 0)
                                              <option value="{{$type->vehicle_type_ID}}">{{$type->vehicle_type_name}}</option>
                                             @endif
                                            @endforeach
                                        </select>
                                    </div> 

                                    <div class="col-xs-4">
                                        <label for="vehicle_type_specify">If others, please specify: </label>
                                            <input type="text" id = "vehicle_type_specify" name="vehicle_type_specify" style="width: 80%; border-color: #9e9e9e">
                                    </div> 

                                    <div class="col-xs-4">
                                        <label for="plate_number">Plate Number: </label>
                                            <input type="text" id="plate_number" name="plate_number" style="width: 80%; border-color: #9e9e9e;">
                                    </div> 
                                </div>
                                
                                <div class="row">
                                    <div class="col-xs-4">
                                    <label for="vehicle_make">Make: </label>
                                        <select id="vehicle_make" name="vehicle_make" class="selectpicker" data-size="10" data-width="85%">
                                        <option selected value = "" >-- Select Vehicle Make --</option>
                                        @foreach($vmake as $make)
                                         @if($make->del_flag == 0)
                                          <option value="{{$make->vehicle_make_ID}}">{{$make->vehicle_make_name}}</option>
                                         @endif
                                        @endforeach
                                        </select>
                                    </div>

                                    <div class="col-xs-4">
                                        <label for="vehicle_make_specify">If others, please specify: </label>
                                            <input type="text" id="vehicle_make_specify" name="vehicle_make_specify" style="width: 80%; border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-4">
                                        <label for="engine_number">Engine Number: </label>
                                            <input type="text" id="engine_number" name="engine_number" style="width: 80%; border-color: #9e9e9e;">
                                    </div> 
                                </div>
                                
                                <div class="row">
                                    <div class="col-xs-4">
                                        <label for="year_model">Year Model: </label>
                                        <input type="number" id="year_model" name="year_model" min="1900" max = "2100" style="width: 80%; border-color: #9e9e9e">
                                    </div>
 
                                    <div class="col-xs-4">
                                        <!-- <label for="1">If others, please specify: </label>
                                            <input type="text" name="plate" style="width: 80%; cursor: not-allowed; border-color: #9e9e9e" disabled> -->
                                    </div>


                                    <div class="col-xs-4">
                                        <label for="chassis_number">Chassis Number: </label>
                                            <input type="text" id="chassis_number" name="chassis_number" style="width: 80%; border-color: #9e9e9e;">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-4">
                                    <label for="vehicle_model">Model: </label>
                                        <select id="vehicle_model" name="vehicle_model" class="selectpicker" data-size="10" data-width="85%">
                                        <option selected value = "" >-- Select Vehicle Model --</option>
                                        </select>
                                    </div> 

                                    <div class="col-xs-4">
                                        <label for="vehicle_type_specify">If others, please specify: </label>
                                            <input type="text" id = "vehicle_model_specify" name="vehicle_model_specify" style="width: 80%; border-color: #9e9e9e" >
                                    </div> 

                                    <div class="col-xs-4">
                                        <label for="mv_filenum">MV File Number: </label>
                                            <input type="text" id="mv_filenum" name="mv_filenum" style="width: 80%; border-color: #9e9e9e;">
                                    </div>      
                                </div>

                                <div class="row">                       
                                
                                    <div class="col-xs-4">
                                        <label for="color">Color: </label>
                                            <input type="text" id="color" name="color" style="width: 80%; border-color: #9e9e9e;">
                                    </div>

                                    <div class="col-xs-4">
                                        <label for="seat_cap">Seating Capacity: </label>
                                            <input type="text" id="seat_cap" name="seat_cap" style="width: 85%; border-color: #9e9e9e;">
                                    </div>     
                                </div>

                                <div class="row">   
                                    <div class="col-xs-6">
                                        <label for="vehicle_value">Vehicle Market Value: </label>
                                            <b><input type="text" id="vehicle_value" name="vehicle_value" style="width: 80%; border-color: #9e9e9e;"></b>
                                    </div>
                                </div>
                            </div>
                        </div><br/><br/><br/><br/><br/><br/>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step scrollToTop" id = "quote_vehicle_detail">Continue</button></li>
                        </ul>
                    </div>

                <!-- STEP 2 -->
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <div class="step2">
                            <h3><b>Quotation Details</b></h3><br/>
                            <img src="{{ URL::asset ('web/images/quote.jpg')}}" alt="" width="100%"><br/><br/>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="insurance_company">Insurance Company: </label>
                                        <select id="insurance_company" name = "insurance_company" class="selectpicker" data-size="10" data-width="100%">
                                            <option selected value = "" style="display:none;">-- Select Insurance Company --</option>
                                            @foreach($inscomp as $icomp)
                                             @if($icomp->del_flag == 0)
                                              @if($icomp->comp_type == 0)
                                               <option value = "{{$icomp->comp_ID}}">{{$icomp->comp_name}}</option>
                                              @endif
                                             @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                   <div class="modal-header" style="background-color: #263238">
                                        <p style="color: white;"><b>&nbsp;&nbsp;Your Comprehensive Insurance Policy includes these benefits </b> <button type="button" class="btn btn-info btn-sm" style="float: right;margin-right: 2%" data-toggle="modal" data-target="#editt" id = "edit">Select Coverage</button> </p>
                                   </div><br/><br/>

                                    <div style="width: 500px;height: 200px;z-index: 15;top: auto;left: 50%;margin: 0 auto;">
                                         <span class="total"><b>Own Damage/Theft</b></span>
                                         <span id = "odt"></span><br/>
                                         <span class="total"><b>Third Party Property Damage</b></span>
                                         <span id = "tppd"></span><br/>
                                         <span class="total"><b>Third Party Bodily Injury</b></span>
                                         <span id = "tpbi"></span><br/>
                                         <span class="total"><b>Personal Accident</b></span>
                                         <span id = "pa"></span><br/><br/>
                                         <span class="total"><b>Acts of Nature</b></span>
                                         <span id = "aon"></span>
                                         <div class="clearfix"></div><br/><br/>
                                    </div> 
                                </div>

                                <div class="row">
                                   <div class="modal-header" style="background-color: #263238">
                                        <p style="color: white;"><b>&nbsp;&nbsp; Your Possible Comprehensive Insurance Quotation </b></p>
                                   </div>
                                   <small>NOTE: The agency will send you a proposal quotation. This is just a possible quote price without your choice of coverage/package.</small><br/><br/><br/>

                                   <div style="width: 500px;height: 200px;z-index: 15;top: auto;left: 50%;margin: 0 auto;">
                                        <h4 style="text-align: center;color: #263238;" id = "vehicle_name"><b></b></h4>
                                        <h2 style="text-align: center;" id = "vehicle_val"><b></b></h2><br/>
                                         <span class="total"><b>Basic Premium</b></span>
                                         <span id = "basicpremium"></span><br/>
                                         <span class="total"><b>VAT</b></span>
                                         <span id = "vat"></span><br/>
                                         <span class="total"><b>Documentary Stamp Tax</b></span>
                                         <span id = "dst"></span></br/>
                                         <span class="total"><b>Local Gov't Tax</b></span>
                                         <span id = "lgt"></span><br/><br/>
                                         <span class="total"><b>Deductible</b></span>
                                         <span id = "deductible"></span>
                                         <div class="clearfix"></div>
                                   </div>
                                </div><br/><br/>

                                <div class="row">
                                   <div class="modal-header" style="background-color: #263238">
                                        <p style="color: white;"><b>&nbsp;&nbsp;Inclusions </b></p>
                                   </div><br/><br/>
                                       <div class="col-xs-12" style="margin-left: 5%">
                                         <p><b>The Insurance Quotation Includes the following: </b><br/>
                                         &nbsp;&nbsp;&nbsp;&nbsp;1. 24-hour Roadside Assistance (Specific areas only)<br/>
                                         &nbsp;&nbsp;&nbsp;&nbsp;2. Acts of God Coverage (Typhoon, Flood, Earthquake, Hurricane, Volcanic Eruption)<br/>
                                         &nbsp;&nbsp;&nbsp;&nbsp;3. Strike, Riot, Civil Commotion (SRCC) Cover<br/>
                                         &nbsp;&nbsp;&nbsp;&nbsp;4. Unnamed Passenger Personal Accident
                                         </p>
                                        </div> 
                                </div><br/><br/>

                                <div class="row">
                                   <div class="modal-header" style="background-color: #263238">
                                        <p style="color: white;"><b>&nbsp;&nbsp;Terms & Conditions </b></p>
                                   </div><br/><br/>
                                       <div class="col-xs-12" style="margin-left: 5%">
                                         <p><b>By Clicking Continue, you agree to the following: </b><br/>
                                         &nbsp;&nbsp;&nbsp;&nbsp;1. The vehicle being insured has not been involved in any vehicular accident and has not been flooded/damaged in any manner as of the time of the issuance of this policy.<br/>
                                         &nbsp;&nbsp;&nbsp;&nbsp;2. Any damages prior to the issuance of this policy shall not be compensable. This declaration is under the penalty of perjury. <br/>
                                         &nbsp;&nbsp;&nbsp;&nbsp;3. The vehicle for insurance cover is not used to carry fare-paying passengers. <br/>
                                         </p>
                                        </div> 
                                </div><br/><br/>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step scrollToTop">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step scrollToTop" id="quote_payment_details">Continue</button></li>
                        </ul>
                    </div>

                <!-- STEP 3 -->
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <div class="step3">
                            <h3><b>Client Details</b></h3><br/>
                            <div class="row">
                                    <div class="col-xs-5">
                                        <label for="1">Client Type: </label>
                                        <div class="sky_form1 col col-xs-12">
                                            <ul>
                                                <li><label class="radio left"><input name="client_type" type="radio" id="ind" value = "0" onclick="
                                                $('#individualType').show(800);
                                                $('#companyType').hide(800);"><i></i>&nbsp;&nbsp;&nbsp;&nbsp;Individual&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></li>
                                                <li><label class="radio"><input name="client_type" type="radio" id="co" value = "1" onclick="
                                                $('#companyType').show(800);
                                                $('#individualType').hide(800);"><i></i>Company</label></li><br/><br/>
                                                <div class="clearfix"></div>
                                            </ul>
                                        </div>
                                    </div>
                                </div><br/>
                    <!-- INDIVIDUAL -->
                            <div id="individualType">
                                <div class="row">
                                    <h4><b>Personal Information</b></h4><br/>
                                    <div class="col-xs-6">
                                        <label for="indi_first_name">First Name: </label>
                                            <input type="text" id="indi_first_name" name="indi_first_name" style="width: 80%; border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="indi_bday">Birthday: </label>
                                            <input type="date" id="indi_bday" name="indi_bday" style="width: 80%; border-color: #9e9e9e">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="indi_middle_name">Middle Name: </label>
                                            <input type="text" id="indi_middle_name" name="indi_middle_name" style="width: 80%; border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="indi_age">Age: </label>
                                            <input type="text" id="indi_age" name="indi_age" style="width: 80%; border-color: #9e9e9e; cursor: not-allowed;" disabled="disable">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="indi_last_name">Last Name: </label>
                                            <input type="text" id="indi_last_name" name="indi_last_name" style="width: 80%; border-color: #9e9e9e">
                                    </div>

                                    <label for="1">Gender: </label>
                                    <div class="sky_form1 col col-xs-6">
                                        <ul>
                                            <li><label class="radio left"><input type="radio" name="indi_gender" id="indi_male" value = "0" checked=""><i></i>&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></li>
                                            <li><label class="radio"><input type="radio" name="indi_gender" id="indi_female" value = "1"><i></i>Female</label></li>
                                            <div id = "gender_error"></div>
                                            <div class="clearfix"></div>
                                        </ul>
                                    </div>
                                </div><br/><br/>

                                <div class="row">
                                <h4><b>Contact Details</b></h4><br/>
                                    <div class="col-xs-6">
                                        <label for="indi_cp_1">Cellphone Number: </label>
                                            <input type="text" id="indi_cp_1" name="indi_cp_1" style="width: 80%; border-color: #9e9e9e">
                                    </div> 
                                    
                                    <div class="col-xs-6">
                                        <label for="indi_cp_2">Cellphone Number: (Alt)</label>
                                            <input type="text" id="indi_cp_2" name="indi_cp_2" style="width: 80%; border-color: #9e9e9e">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="indi_tpnum">Telephone Number: </label>
                                            <input type="text" id="indi_tpnum" name="indi_tpnum" style="width: 80%; border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="indi_email">Email: </label>
                                            <input type="text" id="indi_email" name="indi_email" style="width: 80%; border-color: #9e9e9e">
                                    </div>
                                </div>

                                <div class="row">
                                <h4><b>Sales Agent</b></h4><br/>
                                    <div class="col-xs-5">
                                        <select id="indi_sales" name="indi_sales" class="selectpicker" data-size="10" data-width="85%">
                                            <option selected value="" style="display:none;"> -- Select Sales Agent -- </option>
                                            @foreach($salesagent as $agent)
                                             @if($agent->del_flag == 0)
                                              @if($agent->sales_agent_flag == 1)
                                               <option value = "{{$agent->agent_ID}}">{{$agent->info->pinfo_last_name}}, {{$agent->info->pinfo_first_name}} {{$agent->info->pinfo_middle_name}}</option>
                                              @endif
                                             @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br/><br/>

                                <div class="row">
                                    <h4><b>Residential Address</b></h4><br/>
                                    <div class="col-xs-6">
                                        <label for="indi_blk">Blk&Lot/Bldg/Unit No.: </label>
                                            <input type="text" id="indi_blk" name="indi_blk" style="width: 80%; border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="indi_district">District: </label>
                                            <input type="text" id="indi_district" name="indi_district" style="width: 80%; border-color: #9e9e9e">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="indi_street">Street: </label>
                                            <input type="text" id="indi_street" name="indi_street" style="width: 80%; border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="indi_city">City/Municipality: </label>
                                            <input type="text" id="indi_city" name="indi_city" style="width: 80%; border-color: #9e9e9e">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="indi_subdivision">Subdivision: </label>
                                            <input type="text" id="indi_subdivision" name="indi_subdivision" style="width: 80%; border-color: #9e9e9e" >
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="indi_province">Province: </label>
                                            <input type="text" id="indi_province" name="indi_province" style="width: 80%; border-color: #9e9e9e">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="indi_barangay">Barangay: </label>
                                            <input type="text" id="indi_barangay" name="indi_barangay" style="width: 80%; border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="indi_region">Region: </label>
                                        <select id="indi_region" name="indi_region" class="selectpicker" data-size="10" data-width="80%">
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

                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="indi_zipcode">Zip Code: </label>
                                            <input type="text" id="indi_zipcode" name="indi_zipcode" style="width: 80%; border-color: #9e9e9e">
                                    </div>
                                </div>
                            </div> <!-- END -->

                    <!-- COMPANY -->
                            <div id="companyType">

                                <div class="row">
                                    <h4><b>Company Details</b></h4><br/>
                                    <div class="col-xs-8">
                                        <label for="comp_name">Company Name: </label>
                                            <input type="text" id="comp_name" name="comp_name" style="width: 80%; border-color: #9e9e9e">
                                    </div>
                                </div>
                                
                                <div class="row">
                                <h4><b>Company Contact Details</b></h4><br/>
                                    <div class="col-xs-6">
                                        <label for="comp_cpnum">Cellphone Number: </label>
                                            <input type="text" id="comp_cpnum" name="comp_cpnum" style="width: 80%; border-color: #9e9e9e">
                                    </div> 
                                    
                                    <div class="col-xs-6">
                                        <label for="comp_faxnum">Fax Number</label>
                                            <input type="text" id="comp_faxnum" name="comp_faxnum" style="width: 80%; border-color: #9e9e9e">
                                    </div>

                                    
                                    <div class="col-xs-6">
                                        <label for="comp_tpnum">Telephone Number: </label>
                                            <input type="text" id="comp_tpnum" name="comp_tpnum" style="width: 80%; border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="comp_email">Email: </label>
                                            <input type="text" id="comp_email" name="comp_email" style="width: 80%; border-color: #9e9e9e">
                                    </div>
                                </div>


                                <div class="row">
                                    <h4><b>Company Address</b></h4><br/>
                                    <div class="col-xs-6">
                                        <label for="comp_blk">Blk&Lot/Bldg/Unit No.: </label>
                                            <input type="text" id="comp_blk" name="comp_blk" style="width: 80%; border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="comp_district">District: </label>
                                            <input type="text" id="comp_district" name="comp_district" style="width: 80%; border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="comp_street">Street: </label>
                                            <input type="text" id="comp_street" name="comp_street" style="width: 80%; border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="comp_city">City/Municipality: </label>
                                            <input type="text" id="comp_city" name="comp_city" style="width: 80%; border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="comp_subdivision">Subdivision: </label>
                                            <input type="text" id="comp_subdivision" name="comp_subdivision" style="width: 80%;border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="comp_province">Province: </label>
                                            <input type="text" id="comp_province" name="comp_province" style="width: 80%;border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="comp_barangay">Barangay: </label>
                                            <input type="text" id="comp_barangay" name="comp_barangay" style="width: 80%;border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="comp_region">Region: </label>
                                        <select id="comp_region" name="comp_region" class="selectpicker" data-size="10" data-width="80%">
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

                                    <div class="col-xs-4">
                                        <label for="comp_zipcode">Zip Code: </label>
                                            <input type="text" id="comp_zipcode" name="comp_zipcode" style="width: 80%;border-color: #9e9e9e">
                                    </div>
                                </div>

                                <div class="row">
                                    <h4><b>Contact Person Information</b></h4><br/>
                                    <div class="col-xs-6">
                                        <label for="cont_first_name">First Name: </label>
                                            <input type="text" id="cont_first_name" name="cont_first_name" style="width: 80%;border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="cont_bday">Birthday: </label>
                                            <input type="date" id="cont_bday" name="cont_bday" style="width: 80%; border-color: #9e9e9e">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="cont_middle_name">Middle Name: </label>
                                            <input type="text" id="cont_middle_name" name="cont_middle_name" style="width: 80%;border-color: #9e9e9e;">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="cont_age">Age: </label>
                                            <input type="text" id="cont_age" name="cont_age" style="width: 80%;border-color: #9e9e9e;cursor: not-allowed;" disabled="disable">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="cont_last_name">Last Name: </label>
                                            <input type="text" id="cont_last_name" name="cont_last_name" style="width: 80%;border-color: #9e9e9e;">
                                    </div>

                                    <label for="1">Gender: </label>
                                    <div class="sky_form1 col col-xs-6">
                                        <ul>
                                            <li><label class="radio left"><input type="radio" name="cont_gender" id="cont_male" value = "0" checked=""><i></i>&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></li>
                                            <li><label class="radio"><input name="cont_gender" id="cont_female" value = "1" name="radio"><i></i>Female</label></li>
                                            <div class="clearfix"></div>
                                        </ul>
                                    </div>
                                </div><br/><br/>

                                <div class="row">
                                <h4><b>Contact Details</b></h4><br/>
                                    <div class="col-xs-6">
                                        <label for="cont_cp_1">Cellphone Number: </label>
                                            <input type="text" id="cont_cp_1" name="cont_cp_1" style="width: 80%;border-color: #9e9e9e;">
                                    </div> 
                                    
                                    <div class="col-xs-6">
                                        <label for="cont_cp_2">Cellphone Number: (Alt)</label>
                                            <input type="text" id="cont_cp_2" name="cont_cp_2" style="width: 80%;border-color: #9e9e9e;">
                                    </div>

                                    
                                    <div class="col-xs-6">
                                        <label for="cont_tpnum">Telephone Number: </label>
                                            <input type="text" id="cont_tpnum" name="cont_tpnum" style="width: 80%;border-color: #9e9e9e">
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="cont_email">Email: </label>
                                            <input type="text" id="cont_email" name="cont_email" style="width: 80%;border-color: #9e9e9e">
                                    </div>
                                </div>

                                <div class="row">
                                <h4><b>Sales Agent</b></h4><br/>
                                    <div class="col-xs-5">
                                        <select id="comp_sales" name="comp_sales" class="selectpicker" data-size="10" data-width="85%">
                                            <option selected value="" style="display:none;"> -- Select Sales Agent -- </option>
                                            @foreach($salesagent as $agent)
                                             @if($agent->del_flag == 0)
                                              @if($agent->sales_agent_flag == 1)
                                               <option value = "{{$agent->agent_ID}}">{{$agent->info->pinfo_last_name}}, {{$agent->info->pinfo_first_name}} {{$agent->info->pinfo_middle_name}}</option>
                                              @endif
                                             @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br/><br/>
                            </div> <!-- END OF COMPANY -->
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step  scrollToTop">Previous</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step scrollToTop" id = "quote_client_details">Continue</button></li>
                        </ul>
                    </div>

                <!-- finish -->
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <div class="step44">
                        
                                    <p style="text-align: center"><b>Terms of Service</b><p>
                                    <p class="text-justify">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce posuere nulla nisi, eu gravida est lobortis sit amet. Nulla facilisi. Duis tincidunt auctor diam, vel posuere lacus sollicitudin in. Sed finibus luctus tellus, non ornare leo aliquam a. Aliquam erat volutpat. Sed vel auctor elit. Curabitur ultricies mi id tellus tempor, a tincidunt nunc malesuada. Morbi sollicitudin, ipsum sed fringilla tincidunt, lorem quam cursus risus, sed aliquam nunc ipsum eu sem. Etiam vulputate massa justo, vel volutpat mauris accumsan at. Curabitur egestas, ante non luctus interdum, felis nisi ullamcorper felis, eget porttitor massa turpis ac dolor. <br/><br/>

                                        Proin ante sapien, rhoncus sed sagittis a, convallis ut risus. Morbi eget arcu ipsum. Suspendisse congue in diam ut euismod. Mauris accumsan sagittis pellentesque. Curabitur consequat orci urna, a rutrum sem sodales in. Morbi egestas auctor lectus, nec ullamcorper arcu semper et. Quisque non neque suscipit, lacinia sapien ut, consequat nulla. Curabitur vitae lectus ante. Integer non convallis lacus. <br/><br/>

                                        Etiam at gravida neque. Vivamus nisi erat, porttitor quis eros non, venenatis fermentum magna. Etiam arcu lorem, convallis vel sollicitudin et, dictum nec lectus. In vitae cursus libero. Sed sed commodo ipsum, in fermentum mi. Sed scelerisque felis eget dictum vulputate. Vivamus a massa ut quam varius bibendum. Nullam hendrerit ligula nec aliquet mollis. <br/><br/>

                                        Aliquam nec enim non sapien mollis ultricies at in diam. In dignissim, eros at maximus tincidunt, lacus orci accumsan libero, eu rutrum ante dolor sit amet leo. Aliquam et mi sit amet turpis tincidunt sollicitudin. Suspendisse eleifend varius aliquet. Quisque eleifend, massa a dignissim aliquam, diam mi mattis est, sed sodales lectus turpis quis urna. Morbi dapibus ante a dolor malesuada pretium. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean convallis id ipsum et ultrices. Nulla ornare, lorem sit amet consectetur volutpat, velit felis feugiat mauris, et viverra leo magna in est. Suspendisse tempor euismod euismod. Ut dictum neque a nunc consequat, vel facilisis lectus elementum. Maecenas lorem tortor, sagittis vitae risus id, vulputate auctor nibh. Duis ac dui non lectus scelerisque condimentum. Vivamus viverra maximus porta. Duis vitae vehicula magna. <br/><br/>

                                        Curabitur elit ipsum, euismod sit amet mattis dapibus, accumsan non arcu. Ut eu nisi euismod, semper massa et, viverra tellus. Etiam id dolor non orci auctor mattis. Nunc rutrum a nunc sed efficitur. Nulla ornare elit bibendum urna commodo, porta convallis nisl fermentum. Nam ac tempor elit. Nulla ut augue vitae mauris sollicitudin sagittis ac et velit.
                                    </p>

                            <div class="sky-form">
                                <label class="checkbox"><input type="checkbox" name="ta" ><i></i>I agree to&nbsp;<a class="terms" href="#"> terms of service</a> </label>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step scrollToTop">Previous</button></li>
                            <li><button type="button" id = "finish" class="btn btn-success submit scrollToTop">Finish</button></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
   </div>
</div>
</div>
</div>
</section>

<!-- Modal -->
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
                    <select id="tppd_coverage" name="tppd_coverage" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                    <option selected value = "" style="display:none;">-- Select Coverage --</option>
                    </select>
                </div>
                <div class="col col-xs-4">
                    <label for="tppd_class">Vehicle Class: </label>
                    <select id="tppd_class" name="tppd_class" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                        <option value="1">PV</option>
                        <option value="2">CV (Light & Medium)</option>
                        <option value="3">CV(Heavy)</option>
                    </select>
                </div>
            </div><br/>

            <div class="row">
                <div class="col-xs-5">
                    <b>Third Party Bodily Injury</b>
                </div>
                <div class="col col-xs-3">
                    <label for="tpbi_coverage">Coverage: </label>
                    <select id="tpbi_coverage" name="tpbi_coverage" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                    <option selected value = "" style="display:none;">-- Select Coverage --</option>
                    </select>
                </div>
                <div class="col col-xs-4">
                    <label for="tpbi_class">Vehicle Class: </label>
                    <select id="tpbi_class" name="tpbi_class" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                        <option value="1">PV</option>
                        <option value="2">CV (Light & Medium)</option>
                        <option value="3">CV(Heavy)</option>
                    </select>
                </div>
            </div><br/>

            <div class="row">
                <div class="col-xs-5">
                    <b>Personal Accident</b>
                </div>
                <div class="col col-xs-7">
                    <label for="pa_coverage">Coverage: </label>
                    <select id="pa_coverage" name="pa_coverage" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                    <option selected value = "" style="display:none;">-- Select Coverage --</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="modal-footer">
          <div class="clearfix"><button type="button" class="btn btn-success" data-dismiss="modal" id = "premiums_save">Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" id = "premiums_close">Close</button></div>
        </div>
    </div>
    </div>
</div>

<!-- CHOOSE INST MODAL -->
            <div class="modal fade" id="ugh" role="dialog" data-backdrop="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #ffab00">
                            <h3 class="modal-title">Confirmation</h3>
                        </div>
                        <div class="modal-body">
                            Applying for a quotation can only be issued for private cars. <br/><br/>

                            <input type="checkbox" name="check" required> I Confirm that my unit for the quotation is NOT used to carry any fare-paying passengers such as: <br/><br/>
                            1. Yellow-plated vehicles (Taxi and U/V Express Van)<br/>
                            2. School bus/van<br/>
                            3. Uber/Grabcar
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-block btn-primary" data-dismiss="modal">CONTINUE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- #END# ADD INST MODAL -->

<script>
    //disable
    $('#edit').prop('disabled', true);

    //vehicle-specify - type
    $('#vehicle_type').on('change', function(){
        if($(this).val() == "")
        {
            $('#vehicle_type_specify').css({cursor: ""});
            $('#vehicle_type_specify').prop('disabled',false);
        }
        else
        {
            $('#vehicle_type_specify').css({cursor: "not-allowed"});
            $('#vehicle_type_specify').prop('disabled',true);
            $('#vehicle_type_specify').val('');
        }
    });

    $('#vehicle_type_specify').on('change textInput input', function(){
        if($(this).val() == "")
        {
            $('#vehicle_type').css({cursor: ""});
            $('#vehicle_type').prop('disabled',false);
        }
        else
        {
            $('#vehicle_type').css({cursor: "not-allowed"});
            $('#vehicle_type').prop('disabled',true);
        }
    });

    //vehicle-specify - make
    $('#vehicle_make').on('change', function(){
        if($(this).val() == "")
        {
            $('#vehicle_make_specify').css({cursor: ""});
            $('#vehicle_make_specify').prop('disabled',false);
        }
        else
        {
            $('#vehicle_make_specify').css({cursor: "not-allowed"});
            $('#vehicle_make_specify').prop('disabled',true);
            $('#vehicle_make_specify').val('');
        }
    });

    $('#vehicle_make_specify').on('change textInput input', function(){
        if($(this).val() == "")
        {
            $('#vehicle_make').css({cursor: ""});
            $('#vehicle_make').prop('disabled',false);
        }
        else
        {
            $('#vehicle_make').css({cursor: "not-allowed"});
            $('#vehicle_make').prop('disabled',true);
        }
    });

    //vehicle - year model
    $('#year_model').on('change textInput input', function(){
        var newOptions = [];
        var data = 0;
        if($("#vehicle_type").val() != "")
        {
            @foreach($vmodel as $vmd)
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
              var option = '<option value="'+value.model_ID+'" data-value="'+value.model_value+'" data-name="'+value.model_name+'">'+value.model_name+'</option>';
              $('#vehicle_model:last').append(option);
            });
            $("#vehicle_model").prop("selectedIndex", -1);
            $('#vehicle_model').selectpicker('refresh');
            $('#vehicle_market_value').val("");
        }
    });

    //vehicle-specify - model
    $('#vehicle_model').on('change', function(){
        if($("#vehicle_type").val() != "" && $("#vehicle_make").val() != "")
        {
            $('#vehicle_value').val("₱ " + numberWithCommas($("#vehicle_model").find(':selected').data('value')));
        }

        if($(this).val() == "")
        {
            $('#vehicle_model_specify').css({cursor: ""});
            $('#vehicle_model_specify').prop('disabled',false);
            $('#vehicle_value').val('');
        }
        else
        {
            $('#vehicle_model_specify').css({cursor: "not-allowed"});
            $('#vehicle_model_specify').prop('disabled',true);
            $('#vehicle_model_specify').val('');
        }
    });

    $('#vehicle_model_specify').on('change textInput input', function(){
        if($(this).val() == "")
        {
            $('#vehicle_model').css({cursor: ""});
            $('#vehicle_model').prop('disabled',false);
        }
        else
        {
            $('#vehicle_model').css({cursor: "not-allowed"});
            $('#vehicle_model').prop('disabled',true);
        }
    });

    //insurance-offers
    $('#insurance_company').on('change', function(){
        if($(this).val() != "")
        {
            $('#edit').prop('disabled', false);
            $('#pa_coverage option:gt(0)').remove();
            @foreach($premiumpa as $ppa)
             @if($ppa->del_flag == 0)
              if($('#insurance_company').val() == "{{ $ppa->insurance_comp->comp_ID }}")
              {
               var option = '<option value="{{$ppa->premiumPA_ID}}" data-value="{{$ppa->mrCover + $ppa->passengerCover + $ppa->insuranceCover}}">₱ '+numberWithCommas('{{$ppa->insuranceLimit}}')+' Passenger/s: {{$ppa->passengerNum}}</option>';
               $('#pa_coverage:last').append(option);
              }
             @endif
            @endforeach
            $("#pa_coverage").prop("selectedIndex", -1);
            $('#pa_coverage').selectpicker('refresh');
    
            $('#tppd_coverage option:gt(0)').remove();
            @foreach($premiumdg as $ppd)
             @if($ppd->del_flag == 0)
              @if($ppd->damage_type == 1)
              if($('#insurance_company').val() == "{{ $ppd->insurance_comp->comp_ID }}")
              {
               var option = '<option value="{{$ppd->premiumDG_ID}}" data-pc="{{$ppd->privateCar}}" data-hv="{{$ppd->cv_Heavy}}" data-lv="{{$ppd->cv_Light}}">₱ '+numberWithCommas('{{$ppd->insuranceLimit}}')+'</option>';
               $('#tppd_coverage:last').append(option);
              }
              @endif
             @endif
            @endforeach
            $("#tppd_coverage").prop("selectedIndex", -1);
            $('#tppd_coverage').selectpicker('refresh');
    
            $('#tpbi_coverage option:gt(0)').remove();
            @foreach($premiumdg as $ppd)
             @if($ppd->del_flag == 0)
              @if($ppd->damage_type == 0)
              if($('#insurance_company').val() == "{{ $ppd->insurance_comp->comp_ID }}")
              {
               var option = '<option value="{{$ppd->premiumDG_ID}}" data-pc="{{$ppd->privateCar}}" data-hv="{{$ppd->cv_Heavy}}" data-lv="{{$ppd->cv_Light}}">₱ '+numberWithCommas('{{$ppd->insuranceLimit}}')+'</option>';
               $('#tpbi_coverage:last').append(option);
              }
              @endif
             @endif
            @endforeach
            $("#tpbi_coverage").prop("selectedIndex", -1);
            $('#tpbi_coverage').selectpicker('refresh');
        }
    });

    //vehicle class
    $('#tppd_class').on('change', function(){
        var id = $(this).val();
        var option = "";
        $('#tpbi_class option').remove();
        if(id == 1)
        {
            option = '<option selected value="1">PV</option>';
            $('#tpbi_class:last').append(option);
            option = '<option value="2">CV (Light & Medium)</option>';
            $('#tpbi_class:last').append(option);
            option = '<option value="3">CV(Heavy)</option>';
            $('#tpbi_class:last').append(option);
        }
        if(id == 2)
        {
            option = '<option value="1">PV</option>';
            $('#tpbi_class:last').append(option);
            option = '<option selected value="2">CV (Light & Medium)</option>';
            $('#tpbi_class:last').append(option);
            option = '<option value="3">CV(Heavy)</option>';
            $('#tpbi_class:last').append(option);
        }
        if(id == 3)
        {
            option = '<option value="1">PV</option>';
            $('#tpbi_class:last').append(option);
            option = '<option value="2">CV (Light & Medium)</option>';
            $('#tpbi_class:last').append(option);
            option = '<option selected value="3">CV(Heavy)</option>';
            $('#tpbi_class:last').append(option);
        }
        $('#tpbi_class').selectpicker('refresh');
    });

    $('#tpbi_class').on('change', function(){
        var id = $(this).val();
        var option = "";
        $('#tppd_class option').remove();
        if(id == 1)
        {
            option = '<option selected value="1">PV</option>';
            $('#tppd_class:last').append(option);
            option = '<option value="2">CV (Light & Medium)</option>';
            $('#tppd_class:last').append(option);
            option = '<option value="3">CV(Heavy)</option>';
            $('#tppd_class:last').append(option);
        }
        if(id == 2)
        {
            option = '<option value="1">PV</option>';
            $('#tppd_class:last').append(option);
            option = '<option selected value="2">CV (Light & Medium)</option>';
            $('#tppd_class:last').append(option);
            option = '<option value="3">CV(Heavy)</option>';
            $('#tppd_class:last').append(option);
        }
        if(id == 3)
        {
            option = '<option value="1">PV</option>';
            $('#tppd_class:last').append(option);
            option = '<option value="2">CV (Light & Medium)</option>';
            $('#tppd_class:last').append(option);
            option = '<option selected value="3">CV(Heavy)</option>';
            $('#tppd_class:last').append(option);
        }
        $('#tppd_class').selectpicker('refresh');
    });

    //computations
    function compute()
    {
        var ins = $('#insurance_company').val();

        var coverage = parseFloat($('#vehicle_value').val().replace(/[^0-9\.]/g,'')) * .2;

        var vclass = $('#tppd_class').val();

        if($('#vehicle_model option:selected').val() != "")
        {
            var vname = $('#vehicle_model option:selected').data('name');
        }
        else
        {
            var vname = $('vehicle_model_specify').val();
        }

        $('#vehicle_name').html(vname);

        if(vclass == 1)
        {
            $('#tppd').html('₱ '+numberWithCommas($('#tppd_coverage option:selected').data('pc')));
            $('#tpbi').html('₱ '+numberWithCommas($('#tpbi_coverage option:selected').data('pc')));
        }
        if(vclass == 2)
        {
            $('#tppd').html('₱ '+numberWithCommas($('#tppd_coverage option:selected').data('lv')));
            $('#tpbi').html('₱ '+numberWithCommas($('#tpbi_coverage option:selected').data('lv')));
        }
        if(vclass == 3)
        {
            $('#tppd').html('₱ '+numberWithCommas($('#tppd_coverage option:selected').data('hv')));
            $('#tpbi').html('₱ '+numberWithCommas($('#tpbi_coverage option:selected').data('hv')));
        }

        $('#pa').html('₱ '+numberWithCommas($('#pa_coverage option:selected').data('value')));

        $('#tppd_ID').val($('#tppd_coverage option:selected').val());
        $('#tpbi_ID').val($('#tpbi_coverage option:selected').val());
        $('#vehicle_class').val(vclass);
        $('#pa_ID').val($('#pa_coverage option:selected').val());

        if(ins == 1)
            $('#deductible').html('₱ '+numberWithCommas(3100));
        if(ins == 2)
            $('#deductible').html('₱ '+numberWithCommas(1000));
        if(ins == 3)
            $('#deductible').html('₱ '+numberWithCommas(3000));
        if(ins == 4)
            $('#deductible').html('₱ '+numberWithCommas(2000));

        if(ins == 1)
            $('#aon').html('₱ '+numberWithCommas(Math.round((coverage * 0.02) * 100)/100));
        if(ins == 2)
            $('#aon').html(0);
        if(ins == 3)
            $('#aon').html('₱ '+numberWithCommas(Math.round((coverage * 0.005) * 100)/100));
        if(ins == 4)
            $('#aon').html('₱ '+numberWithCommas(Math.round((coverage * 0.005) * 100)/100));

        var odt = parseFloat(coverage * .013);

         $('#odt').html('₱ '+numberWithCommas(Math.round(odt * 100)/100));

        var basicpremium = (parseFloat($('#aon').html().replace(/[^0-9\.]/g,'')) + parseFloat($('#tpbi').html().replace(/[^0-9\.]/g,'')) + parseFloat($('#tppd').html().replace(/[^0-9\.]/g,'')) + parseFloat($('#pa').html().replace(/[^0-9\.]/g,''))) + odt;
        
        var vat = basicpremium * .125;
        var stamp = basicpremium * .12;
        var rounded = Math.ceil((basicpremium + vat + stamp)/100)*100;

        var lgt = rounded - (basicpremium + vat + stamp);

        var total = basicpremium + vat + stamp + lgt;

        $('#basicpremium').html("₱ " + numberWithCommas(Math.round(basicpremium * 100)/100));
        $('#lgt').html("₱ " + numberWithCommas(Math.round(lgt * 100)/100));
        $('#vat').html("₱ " + numberWithCommas(Math.round(vat * 100)/100));
        $('#dst').html("₱ " + numberWithCommas(Math.round(stamp * 100)/100));
        $('#vehicle_val').html("₱ " + numberWithCommas(Math.round(total * 100)/100));
    }

    $('#premiums_save').on('click', function(){
        compute();
        $("#tpbi_coverage").prop("selectedIndex", -1);
        $('#tpbi_coverage').selectpicker('refresh');
        $("#tppd_coverage").prop("selectedIndex", -1);
        $('#tppd_coverage').selectpicker('refresh');
        $("#pa_coverage").prop("selectedIndex", -1);
        $('#pa_coverage').selectpicker('refresh');
    });

    $('#premiums_close').on('click', function(){
        $("#tpbi_coverage").prop("selectedIndex", -1);
        $('#tpbi_coverage').selectpicker('refresh');
        $("#tppd_coverage").prop("selectedIndex", -1);
        $('#tppd_coverage').selectpicker('refresh');
        $("#pa_coverage").prop("selectedIndex", -1);
        $('#pa_coverage').selectpicker('refresh');
    });

    $('#quote_vehicle_detail').on('click', function(){
        if($('#quote').valid())
        {
            if($('#vehicle_value').val() != "" && $('#vehicle_value').val().replace(/[^0-9\.\-]/g,'') > 0)
            {
                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);
            }
            if($('#vehicle_value').val().replace(/[^0-9\.\-]/g,'') == "")
            {
                swal({
                    title: 'Error: Invalid Vehicle Value',
                    type: 'warning',
                    timer: 1500,
                    showConfirmButton: false
                });
            }
            if($('#vehicle_value').val().replace(/[^0-9\.\-]/g,'') < 0)
            {
                swal({
                    title: 'Error: Negative or Empty Vehicle Value',
                    type: 'warning',
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        }
        else
        {
            swal({
                title: 'Error: Please fill up all required field',
                type: 'warning',
                timer: 1500,
                showConfirmButton: false
            });
        }
    });

    $('#quote_payment_details').on('click', function(){
        if($('#insurance_company').val() != "" && $('#pa_ID').val() != "" && $('#tppd_ID').val() != "" && $('#tpbi_ID').val() != "")
        {
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }
        if($('#pa_ID').val() == "")
        {
            swal({
                title: 'Error: Please Fillup all Coverage',
                type: 'warning',
                timer: 1500,
                showConfirmButton: false
            });
        }
        if($('#tppd_ID').val() == "")
        {
            swal({
                title: 'Error: Please Fillup all Coverage',
                type: 'warning',
                timer: 1500,
                showConfirmButton: false
            });
        }
        if($('#tpbi_ID').val() == "")
        {
            swal({
                title: 'Error: Please Fillup all Coverage',
                type: 'warning',
                timer: 1500,
                showConfirmButton: false
            });
        }
        if($('#insurance_company').val() == "")
        {

            swal({
                title: 'Error: Please Select an Insurance Company',
                type: 'warning',
                timer: 1500,
                showConfirmButton: false
            });
        }
    });

    $('#quote_client_details').on('click', function(){
        if($("input[name='client_type']:checked").val())
        {
            if($('#quote').valid())
            {
                if($('indi_sales').val() != "" || $('comp_sales').val() != "")
                {
                    var $active = $('.wizard .nav-tabs li.active');
                    $active.next().removeClass('disabled');
                    nextTab($active);
                }
                else
                {
                    swal({
                        title: 'Error: Please select a sales agent',
                        type: 'warning',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            }
            else
            {
                swal({
                    title: 'Error: Please fill up all required field',
                    type: 'warning',
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        }
        else
        {
            swal({
                title: 'Error: Please select a client type',
                type: 'warning',
                timer: 1500,
                showConfirmButton: false
            });
        }
    });


    $('input[name="client_type"]').on('change', function () {
        var type = $(this).val();

        if(type == 0)
            $('#quote').attr('action','/user/quotation/individual');
        else
            $('#quote').attr('action','/user/quotation/company');

        $('#quote').valid();
    });    

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
</script>

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
          vehicle_type_specify:{
            required: true
          },
          vehicle_model_specify:{
            required: true
          },
          vehicle_make_specify:{
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
          vehicle_value:{
            required: true,
            maxlength: 50
          },
          color:{
            maxlength: 50
          },
          insurance_company:{
            required: true
          },
          tppd_coverage:{
            required: true
          },
          tpbi_coverage:{
            required: true
          },
          pa_coverage:{
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
          indi_cp_1:{
            required: true,
            cpValidator: true
          },
          indi_cp_2:{
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
          indi_sales:{
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
          cont_cp_1:{
            required: true,
            cpValidator: true
          },
          cont_cp_2:{
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
          comp_sales:{
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
      document.getElementById('individualType').style.display = 'none';
      document.getElementById('companyType').style.display = 'none';
    };
</script>

<!-- <script>
    $(document).ready(function(){
        $("#ugh").modal('show');
    });

    $('#ugh').modal({backdrop: 'static', keyboard: false})  
</script> -->

<script type="text/javascript">
    $(document).ready(function(){
    //Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
    
});
</script>

<script>
    $(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
//according menu

$(document).ready(function()
{
    //Add Inactive Class To All Accordion Headers
    $('.accordion-header').toggleClass('inactive-header');
    
    //Set The Accordion Content Width
    var contentwidth = $('.accordion-header').width();
    $('.accordion-content').css({});
    
    //Open The First Accordion Section When Page Loads
    $('.accordion-header').first().toggleClass('active-header').toggleClass('inactive-header');
    $('.accordion-content').first().slideDown().toggleClass('open-content');
    
    // The Accordion Effect
    $('.accordion-header').click(function () {
        if($(this).is('.inactive-header')) {
            $('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
            $(this).toggleClass('active-header').toggleClass('inactive-header');
            $(this).next().slideToggle().toggleClass('open-content');
        }
        
        else {
            $(this).toggleClass('active-header').toggleClass('inactive-header');
            $(this).next().slideToggle().toggleClass('open-content');
        }
    });
    
    return false;
});
</script>
@endsection
