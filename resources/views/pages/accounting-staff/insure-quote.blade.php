@extends('pages.accounting-staff.master')

@section('title','Insure Client - Transaction | i-Insure')

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
                <div class="col-md-12">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href=""><i class="material-icons">home</i> Home</a></li>
                    </ol>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                        <h3> Insure New Client </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#individualtab" data-toggle="tab"><img src="{{ URL::asset ('images/icons/insurance-individual.png')}}" style="height: 50px; width: 50px;"> INDIVIDUAL CLIENT</a></li>
                                <li role="presentation"><a href="#company" data-toggle="tab"><img src="{{ URL::asset ('images/icons/insurance-company.png')}}" style="height: 50px; width: 50px;"> COMPANY CLIENT</a></li>
                            </ul>

                             <div class="tab-content">
                            <!-- INDIVIDUAL -->
                                <div role="tabpanel" class="tab-pane fade in active" id="individualtab"> 
                                    <form id="form_client_individual" name = "form_client_individual" action = "insure-client/proceed" method="POST" enctype="multipart/form-data">

                                     <div class="col-md-4" style = "display: none;">
                                        <input id = "client_type1" name = "client_type1" type="text" class="form-control" value = '0'>
                                     </div>
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <button type="button" class="btn btn-xs bg-blue waves-effect" style="float: right;" onclick="window.document.location='{{ URL::asset('/accounting-staff/transaction/client/individual') }}';">
                                            <i class="material-icons">add</i>
                                            <span>Add new Client</span> <!-- MAG OOPEN DAPAT SA NEW TAB UNG PDF NG CV HUHU -->
                                        </button><br/><br/>
                                      <h3> <small><b>CLIENT</b></small></h3>
                                        <div class="rowclearfix">
                                            <div class="col-md-6">
                                              <div class="form-group form-float">
                                                <label><small>Assured Name :</small></label>
                                                    <select id = "client_individual" name = "client_individual" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_individual').valid()">
                                                      <option selected value = "" style = "display: none;">-- Select Client --</option>
                                                         @foreach($client as $cli)
                                                          @if($cli->del_flag == 0)
                                                          @foreach($pInfo as $info)
                                                           @if($info->pinfo_ID == $cli->personal_info_ID)
                                                           <option value = "{{$cli->client_ID}}" data-id = "{{$cli->client_sales_ID}}">{{$info->pinfo_last_name}}, {{$info->pinfo_first_name}} {{$info->pinfo_middle_name}}</option>
                                                           @endif
                                                          @endforeach
                                                          @endif
                                                         @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Sales Agent :</small></label>
                                                    <input id = "indi_agent" name = "indi_agent" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3> <small><b>INSURANCE DETAILS</b></small></h3>
                                            <div class="row clearfix">
                                                <div class="col-md-12" align="center">
                                                    <button type="button" class="btn bg-light-blue waves-effect" data-toggle="collapse" data-target="#indi_formImage">Click to attach form</button> <!-- PAG NAKA VIEW NA, Magiging "Hide attached form" yung nakalagay-->
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="collapse fade" role="dialog" id="indi_formImage" align="center">
                                                        <div class="fallback">
                                                            <img id="indi_image" src="#" alt="your image" style="height: 500px; width: 500px; border-style: solid; border-width: 2px;"><br/><br/>
                                                                <input id = "indi_picture" name = "indi_picture" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div> <!-- END OF ROW CLEARFIX -->
                                        <div class="row clearfix">
                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <label><small>Insurance Company: </small></label>
                                                        <select id = "indi_insurance_company" name = "indi_insurance_company" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_individual').valid()">
                                                        <option selected value = "" style = "display: none;">-- Select Company --</option>
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
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                <label><small>Policy Number :</small></label>
                                                <select id = "indi_policy_number" name = "indi_policy_number" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_individual').valid()">
                                                  <option selected value = "" style = "display: none;">-- Select Policy number --</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                                <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Date Issued: </small></label>
                                                        <div class="form-row show-inputbtns">
                                                            <input id = "indi_date_issued" name = "indi_date_issued" type="date" class="form-control todate" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>  
                                        </div> <!-- end of rowclearfix -->
                                        <div class="row clearfix">
                                        <br/><br/>
                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Vehicle Type:</small></label>
                                                        <select id = "indi_vtype" name = "indi_vtype" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_individual').valid()">
                                                          <option selected value = "" style = "display: none;">Select Type</option>
                                                          @foreach($vType as $vtp)
                                                           @if($vtp->del_flag == 0)
                                                            <option value = "{{ $vtp->vehicle_type_ID }}">{{ $vtp->vehicle_type_name }}</option>
                                                           @endif
                                                          @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Vehicle Make:</small></label>
                                                        <select id = "indi_vmake" name = "indi_vmake" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_individual').valid()">
                                                          <option selected value = "" style = "display: none;">Select Make</option>
                                                          @foreach($vMake as $vmk)
                                                           @if($vmk->del_flag == 0)
                                                            <option value = "{{ $vmk->vehicle_make_ID }}">{{ $vmk->vehicle_make_name }}</option>
                                                           @endif
                                                          @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Vehicle Model:</small></label>
                                                        <select id = "indi_vmodel" name = "indi_vmodel" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_individual').valid()">
                                                          <option selected value = "" style = "display: none;">Select Model</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Market Value:</small></label>
                                                        <input id = "indi_vmodel_value" name = "indi_vmodel_value" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Plate Number:</small></label>
                                                        <input id = "indi_plate_number" name = "indi_plate_number" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Serial Chassis:</small></label>
                                                        <input id = "indi_schassis" name = "indi_schassis" type="text" class="form-control"  >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Motor Engine:</small></label>
                                                        <input id = "indi_mengine" name = "indi_mengine" type="text" class="form-control"  >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>MV File Number:</small></label>
                                                        <input id = "indi_mfilenum" name = "indi_mfilenum" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Seating Capacity:</small></label>
                                                        <input id = "indi_seat_cap" name = "indi_seat_cap" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Color:</small></label>
                                                        <input id = "indi_color" name = "indi_color" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3> <small><b>PREMIUMS</b></small></h3>
                                        <div class="row clearfix">
                                            <br/><br/>
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Deductible: </small></label>
                                                        <input id = "indi_deductible" name = "indi_deductible" type="text" class="form-control"  value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Authorized Repair Limit: </small></label>
                                                        <input id = "indi_arl" name = "indi_arl" type="text" class="form-control"  value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Towing: </small></label>
                                                        <input id = "indi_towing" name = "indi_towing" type="text" class="form-control"  value="">
                                                    </div>
                                                </div>
                                            </div>                   
                                        </div> <!-- end of rowclearfix --> 

                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Writing Code: </small></label>
                                                            <input id = "indi_wc" name = "indi_wc" type="text" class="form-control"  value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Act of Nature: </small></label>
                                                        <input id = "indi_aon" name = "indi_aon" type="text" class="form-control"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end of rowclearfix -->

                                        <div class="row clearfix">
                                            <div class="col-md-5">
                                                <div class="form-group form-float">
                                                    <label><small>Bodily Injury: </small></label>
                                                        <select id = "indi_bi" name = "indi_bi" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_individual').valid()">
                                                        <option selected value = "" style = "display: none;">-- Choose Coverage --</option>
                                                        </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <label><small>Vehicle Class: </small></label>
                                                        <select id = "indi_bi_vclass" name = "indi_bi_vclass" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_individual').valid()">
                                                  <option selected value = "" style = "display: none;">-- Choose Class --</option>
                                                  <option value="1">Private Car</option>
                                                  <option value="2">Commercial Vehicle (Light & Medium)</option>
                                                  <option value="3">Commercial Vehicle (Heavy)</option>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Premium: </small></label>
                                                        <input id = "indi_bi_premium" name = "indi_bi_premium" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-md-5">
                                                <div class="form-group form-float">
                                            <label><small>Property Damage: </small></label>
                                                <select id = "indi_pd" name = "indi_pd" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_individual').valid()">
                                                <option selected value = "" style = "display: none;">-- Choose Coverage --</option>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <label><small>Vehicle Class: </small></label>
                                                        <select id = "indi_pd_vclass" name = "indi_pd_vclass" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_individual').valid()">
                                                  <option selected value = "" style = "display: none;">-- Choose Class --</option>
                                                  <option value="1">Private Car</option>
                                                  <option value="2">Commercial Vehicle (Light & Medium)</option>
                                                  <option value="3">Commercial Vehicle (Heavy)</option>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Premium: </small></label>
                                                        <input id = "indi_pd_premium" name = "indi_pd_premium" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <div class="row clearfix">
                                            <div class="col-md-5">
                                                <div class="form-group form-float">
                                                    <label><small>Personal Accident: </small></label>
                                                        <select id = "indi_pa" name = "indi_pa" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_individual').valid()">
                                                        <option selected value = "" style = "display: none;">-- Choose Coverage --</option>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Premium: </small></label>
                                                        <input id = "indi_pa_premium" name = "indi_pa_premium" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                            <div align="center">
                                                <p style="text-align: center; font-size: 3em;" id = "indi_total_net"><b></b></p><br/><br/>
                                            </div> 

                                            <button class="btn bg-orange btn-block waves-effect" type="button" onclick = "
                                            if($('#form_client_individual').valid())
                                            {
                                                $('#client_type1').val(0);
                                                $('#form_client_individual').submit();
                                            }">
                                                PROCEED TO PAYMENT DETAILS
                                            </button>
                                </form>
                                </div>
                            <!-- COMPANY-->
                                <div role="tabpanel" class="tab-pane fade" id="company"> 
                                    <form id="form_client_company" name = "form_client_company" action = "insure-client/proceed" method="POST" enctype="multipart/form-data">

                                     <div class="col-md-4" style = "display: none;">
                                        <input id = "client_type2" name = "client_type2" type="text" class="form-control" value = '1'>
                                     </div>
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <button type="button" class="btn btn-xs bg-blue waves-effect" style="float: right;" onclick="window.document.location='{{ URL::asset('/accounting-staff/transaction/client/company') }}';">
                                            <i class="material-icons">add</i>
                                            <span>Add new Client</span> <!-- MAG OOPEN DAPAT SA NEW TAB UNG PDF NG CV HUHU -->
                                        </button><br/><br/>

                                      <h3> <small><b>CLIENT</b></small></h3>
                                        <div class="rowclearfix">
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                <label><small>Company Name :</small></label>
                                                    <select id = "client_company" name = "client_company" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_company').valid()">
                                                      <option selected value = "" style = "display: none;">-- Select Company --</option>
                                                    @foreach($company as $insc)
                                                     @if($insc->del_flag == 0)
                                                      @if($insc->comp_type == 1)
                                                       <option value = "{{ $insc->comp_ID }}" data-cperson = "{{ $insc->comp_cperson_ID }}" data-agent = "{{ $insc->comp_sales_agent }}">{{ $insc->comp_name }}</option>
                                                      @endif
                                                     @endif
                                                    @endforeach
                                                    </select>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Contact Person :</small></label>
                                                    <input id = "comp_cperson" name = "comp_cperson" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Sales Agent :</small></label>
                                                    <input id = "comp_agent" name = "comp_agent" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3> <small><b>INSURANCE DETAILS</b></small></h3>
                                            <div class="row clearfix">
                                                <div class="col-md-12" align="center">
                                                    <button type="button" class="btn bg-light-blue waves-effect" data-toggle="collapse" data-target="#comp_formImage">Click to attach form</button> <!-- PAG NAKA VIEW NA, Magiging "Hide attached form" yung nakalagay-->
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="collapse fade" role="dialog" id="comp_formImage" align="center">
                                                        <div class="fallback">
                                                            <img id="comp_image" src="#" alt="your image" style="height: 500px; width: 500px; border-style: solid; border-width: 2px;"><br/><br/>
                                                                <input id = "comp_picture" name = "comp_picture" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                                        </div>
                                                    </div> 
                                                </div>
                                                
                                            </div> <!-- END OF ROW CLEARFIX -->
                                        <div class="col-md-6">
                                                <div class="form-group form-float">
                                                <label><small>Insurance Company: </small></label>
                                                    <select id = "comp_insurance_company" name = "comp_insurance_company" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_company').valid()">
                                                    <option selected value = "" style = "display: none;">-- Select Company --</option>
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
                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                <label><small>Policy Number :</small></label>
                                                <select id = "comp_policy_number" name = "comp_policy_number" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_company').valid()">
                                                  <option selected value = "" style = "display: none;">-- Select Policy number --</option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                                <div class="col-md-3">
                                                    <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Date Issued: </small></label>
                                                        <div class="form-row show-inputbtns">
                                                        <input id = "comp_date_issued" name = "comp_date_issued" type="date" class="form-control todate" readonly>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>  
                                        </div> <!-- end of rowclearfix -->
                                        <div class="row clearfix">
                                        <br/><br/>
                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Vehicle Type:</small></label>
                                                        <select id = "comp_vtype" name = "comp_vtype" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_company').valid()">
                                                          <option selected value = "" style = "display: none;">Select Type</option>
                                                          @foreach($vType as $vtp)
                                                           @if($vtp->del_flag == 0)
                                                            <option value = "{{ $vtp->vehicle_type_ID }}">{{ $vtp->vehicle_type_name }}</option>
                                                           @endif
                                                          @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Vehicle Make:</small></label>
                                                        <select id = "comp_vmake" name = "comp_vmake" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_company').valid()">
                                                          <option selected value = "" style = "display: none;">Select Make</option>
                                                          @foreach($vMake as $vmk)
                                                           @if($vmk->del_flag == 0)
                                                            <option value = "{{ $vmk->vehicle_make_ID }}">{{ $vmk->vehicle_make_name }}</option>
                                                           @endif
                                                          @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Vehicle Model:</small></label>
                                                        <select id = "comp_vmodel" name = "comp_vmodel" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_company').valid()">
                                                          <option selected value = "" style = "display: none;">Select Model</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Market Value:</small></label>
                                                        <input id = "comp_vmodel_value" name = "comp_vmodel_value" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Plate Number:</small></label>
                                                        <input id = "comp_plate_number" name = "comp_plate_number" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Serial Chassis:</small></label>
                                                        <input id = "comp_schassis" name = "comp_schassis" type="text" class="form-control"  >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Motor Engine:</small></label>
                                                        <input id = "comp_mengine" name = "comp_mengine" type="text" class="form-control"  >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>MV File Number:</small></label>
                                                        <input id = "comp_mfilenum" name = "comp_mfilenum" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Seating Capacity:</small></label>
                                                        <input id = "comp_seat_cap" name = "comp_seat_cap" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Color:</small></label>
                                                        <input id = "comp_color" name = "comp_color" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3> <small><b>PREMIUMS</b></small></h3>
                                        <div class="row clearfix">
                                            <br/><br/>
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Deductible: </small></label>
                                                        <input id = "comp_deductible" name = "comp_deductible" type="text" class="form-control"  value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Authorized Repair Limit: </small></label>
                                                        <input id = "comp_arl" name = "comp_arl" type="text" class="form-control"  value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Towing: </small></label>
                                                        <input id = "comp_towing" name = "comp_towing" type="text" class="form-control"  value="">
                                                    </div>
                                                </div>
                                            </div>                   
                                        </div> <!-- end of rowclearfix --> 

                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Writing Code: </small></label>
                                                            <input id = "comp_wc" name = "comp_wc" type="text" class="form-control"  value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Act of Nature: </small></label>
                                                        <input id = "comp_aon" name = "comp_aon" type="text" class="form-control"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end of rowclearfix -->

                                        

                                        <div class="row clearfix">
                                            <div class="col-md-5">
                                                <div class="form-group form-float">
                                                    <label><small>Bodily Injury: </small></label>
                                                        <select id = "comp_bi" name = "comp_bi" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_company').valid()">
                                                  <option selected value = "" style = "display: none;">-- Choose Coverage --</option>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <label><small>Vehicle Class: </small></label>
                                                        <select id = "comp_bi_vclass" name = "comp_bi_vclass" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_company').valid()">
                                                  <option selected value = "" style = "display: none;">-- Choose Class --</option>
                                                  <option value="1">Private Car</option>
                                                  <option value="2">Commercial Vehicle (Light & Medium)</option>
                                                  <option value="3">Commercial Vehicle (Heavy)</option>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Premium: </small></label>
                                                        <input id = "comp_bi_premium" name = "comp_bi_premium" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-md-5">
                                                <div class="form-group form-float">
                                            <label><small>Property Damage: </small></label>
                                                <select id = "comp_pd" name = "comp_pd" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_company').valid()">
                                                <option selected value = "" style = "display: none;">-- Choose Coverage --</option>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <label><small>Vehicle Class: </small></label>
                                                <select id = "comp_pd_vclass" name = "comp_pd_vclass" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_company').valid()">
                                                  <option selected value = "" style = "display: none;">-- Choose Class --</option>
                                                  <option value="1">Private Car</option>
                                                  <option value="2">Commercial Vehicle (Light & Medium)</option>
                                                  <option value="3">Commercial Vehicle (Heavy)</option>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Premium: </small></label>
                                                        <input id = "comp_pd_premium" name = "comp_pd_premium" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <div class="row clearfix">
                                            <div class="col-md-5">
                                                <div class="form-group form-float">
                                                    <label><small>Personal Accident: </small></label>
                                                        <select id="comp_pa" name = "comp_pa" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                                        <option selected value = "" style = "display: none;">-- Coverage --</option>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Premium: </small></label>
                                                        <input id = "comp_pa_premium" name = "comp_pa_premium" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div align="center" >
                                            <p style="text-align: center; font-size: 3em;" id = "comp_total_net"><b></b></p><br/><br/>
                                        </div> 

                                        <button type="button" class="btn bg-orange btn-block waves-effect" onclick = "
                                            if($('#form_client_company').valid())
                                            {
                                                $('#client_type2').val(1);
                                                $('#form_client_company').submit();
                                            }">
                                            PROCEED TO PAYMENT DETAILS
                                        </button> 
                                    </div>
                                </form>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
    </section>

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
              $("form[name='form_client_individual']").validate({
                // Specify validation rules
                rules: {
                  // The key name on the left side is the name attribute
                  // of an input field. Validation rules are defined
                  // on the right side
                  client_individual:{
                    required: true,
                  },
                  indi_insurance_company:{
                    required: true,
                  },
                  indi_policy_number:{
                    required: true,
                  },
                  indi_date_issued:{
                    required: true
                  },
                  indi_vtype:{
                    required: true,
                  },
                  indi_vmake:{
                    required: true,
                  },
                  indi_vmodel:{
                    required: true,
                  },
                  indi_plate_number:{
                    required: true,
                    maxlength: 20
                  },
                  indi_schassis:{
                    required: true,
                    maxlength: 50
                  },
                  indi_mengine:{
                    required: true,
                    maxlength: 50
                  },
                  indi_mfilenum:{
                    required: true,
                    maxlength: 50
                  },
                  indi_seat_cap:{
                    required: true,
                  },
                  indi_color:{
                    required: true,
                    maxlength: 50
                  },
                  indi_bi:{
                    required: true,
                  },
                  indi_bi_vclass:{
                    required: true,
                  },
                  indi_pd:{
                    required: true,
                  },
                  indi_pd_vclass:{
                    required: true,
                  },
                  indi_pa:{
                    required: true,
                  },
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                  form.submit();
                }
              });

              $("form[name='form_client_company']").validate({
                // Specify validation rules
                rules: {
                  // The key name on the left side is the name attribute
                  // of an input field. Validation rules are defined
                  // on the right side
                  client_company:{
                    required: true,
                  },
                  comp_insurance_company:{
                    required: true,
                  },
                  comp_policy_number:{
                    required: true,
                  },
                  comp_date_issued:{
                    required: true
                  },
                  comp_vtype:{
                    required: true,
                  },
                  comp_vmake:{
                    required: true,
                  },
                  comp_vmodel:{
                    required: true,
                  },
                  comp_plate_number:{
                    required: true,
                    maxlength: 20
                  },
                  comp_schassis:{
                    required: true,
                    maxlength: 50
                  },
                  comp_mengine:{
                    required: true,
                    maxlength: 50
                  },
                  comp_mfilenum:{
                    required: true,
                    maxlength: 50
                  },
                  comp_seat_cap:{
                    required: true,
                  },
                  comp_color:{
                    required: true,
                    maxlength: 50
                  },
                  comp_bi:{
                    required: true,
                  },
                  comp_bi_vclass:{
                    required: true,
                  },
                  comp_pd:{
                    required: true,
                  },
                  comp_pd_vclass:{
                    required: true,
                  },
                  comp_pa:{
                    required: true,
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
                
        $('#client_individual').on('change textInput input', function () {
            var agent = $(this).find(':selected').data('id');
            var salesagent = [];
            @foreach($salesA as $agent)
               @foreach($pInfo as $Info)
                @if($agent->personal_info_ID == $Info->pinfo_ID )
                 salesagent["{{ $agent->agent_ID }}"] = "{{ $Info->pinfo_last_name.', '.$Info->pinfo_first_name.' '.$Info->pinfo_middle_name }}";
                @endif
               @endforeach
            @endforeach
            $('#indi_agent').val(salesagent[agent]);
        });
                
        $('#client_company').on('change textInput input', function () {
            var agent = $(this).find(':selected').data('agent');
            var cperson = $(this).find(':selected').data('cperson');
            var salesagent = [];
            var contactperson = [];
            @foreach($salesA as $agent)
               @foreach($pInfo as $Info)
                @if($agent->personal_info_ID == $Info->pinfo_ID )
                 salesagent["{{ $agent->agent_ID }}"] = "{{ $Info->pinfo_last_name.', '.$Info->pinfo_first_name.' '.$Info->pinfo_middle_name }}";
                @endif
               @endforeach
            @endforeach
            @foreach($cperson as $cperson)
               @foreach($pInfo as $Info)
                @if($cperson->personal_info_ID == $Info->pinfo_ID )
                 contactperson["{{ $cperson->cPerson_ID }}"] = "{{ $Info->pinfo_last_name.', '.$Info->pinfo_first_name.' '.$Info->pinfo_middle_name }}";
                @endif
               @endforeach
            @endforeach
            $('#comp_agent').val(salesagent[agent]);
            $('#comp_cperson').val(contactperson[cperson]);
        });
                
        $('#indi_pa').on('change textInput input', function () {
            var id = $(this).find(':selected').val();
            var nperson = [];
            var premium = [];
            @foreach($ppa as $pa)
              nperson["{{ $pa->premiumPA_ID }}"] = "{{ $pa->passengerNum }}";
              premium["{{ $pa->premiumPA_ID }}"] = "₱ " + numberWithCommas({{ $pa->insuranceCover+$pa->passengerCover+$pa->mrCover }});
            @endforeach
            $('#indi_pa_nperson').val(nperson[id]);
            $('#indi_pa_premium').val(premium[id]);
            compute_indi();
        });
                
        $('#indi_bi').on('change textInput input', function () {
            var id = $(this).find(':selected').data('id');
            var pvpremium = [];
            var hvpremium = [];
            var lvpremium = [];
            @foreach($pdg as $bi)
              pvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->privateCar }});
              hvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Heavy }});
              lvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Light }});
            @endforeach
            if($('#indi_bi_vclass').val() == 1)
            $('#indi_bi_premium').val(pvpremium[id]);
            if($('#indi_bi_vclass').val() == 2)
            $('#indi_bi_premium').val(hvpremium[id]);
            if($('#indi_bi_vclass').val() == 3)
            $('#indi_bi_premium').val(lvpremium[id]);
            compute_indi();
        });
                
        $('#indi_bi_vclass').on('change textInput input', function () {
            var selected = $('#indi_bi_vclass').find(':selected').val();
            var option;
            $('#indi_pd_vclass option').remove();
            if(selected == 1)
            {
                option = '<option value = 1 selected>Private Car</option>' ;
                $('#indi_pd_vclass:last').append(option);
                option = '<option value = 2 >Commercial Vehicle (Light & Medium)</option>' ;
                $('#indi_pd_vclass:last').append(option);
                option = '<option value = 3 >Commercial Vehicle (Heavy)</option>' ;
                $('#indi_pd_vclass:last').append(option);
            }
            if(selected == 2)
            {
                option = '<option value = 1 >Private Car</option>' ;
                $('#indi_pd_vclass:last').append(option);
                option = '<option value = 2 selected>Commercial Vehicle (Light & Medium)</option>' ;
                $('#indi_pd_vclass:last').append(option);
                option = '<option value = 3 >Commercial Vehicle (Heavy)</option>' ;
                $('#indi_pd_vclass:last').append(option);
            }
            if(selected == 3)
            {
                option = '<option value = 1 >Private Car</option>' ;
                $('#indi_pd_vclass:last').append(option);
                option = '<option value = 2 >Commercial Vehicle (Light & Medium)</option>' ;
                $('#indi_pd_vclass:last').append(option);
                option = '<option value = 3 selected>Commercial Vehicle (Heavy)</option>' ;
                $('#indi_pd_vclass:last').append(option);
            }
            $('#indi_pd_vclass').selectpicker('refresh');

            $('#form_client_individual').valid();

            var id = $('#indi_bi').find(':selected').data('id');
            var id2 = $('#indi_pd').find(':selected').data('id');
            var pvpremium = [];
            var hvpremium = [];
            var lvpremium = [];
            @foreach($pdg as $bi)
              pvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->privateCar }});
              hvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Heavy }});
              lvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Light }});
            @endforeach
            if($(this).val() == 1)
            $('#indi_bi_premium').val(pvpremium[id]);
            if($(this).val() == 2)
            $('#indi_bi_premium').val(hvpremium[id]);
            if($(this).val() == 3)
            $('#indi_bi_premium').val(lvpremium[id]);

            if($(this).val() == 1)
            $('#indi_pd_premium').val(pvpremium[id2]);
            if($(this).val() == 2)
            $('#indi_pd_premium').val(hvpremium[id2]);
            if($(this).val() == 3)
            $('#indi_pd_premium').val(lvpremium[id2]);
            compute_indi();
        });
                
        $('#indi_pd').on('change textInput input', function () {
            var id = $(this).find(':selected').data('id');
            var pvpremium = [];
            var hvpremium = [];
            var lvpremium = [];
            @foreach($pdg as $bi)
              pvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->privateCar }});
              hvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Heavy }});
              lvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Light }});
            @endforeach
            if($('#indi_pd_vclass').val() == 1)
            $('#indi_pd_premium').val(pvpremium[id]);
            if($('#indi_pd_vclass').val() == 2)
            $('#indi_pd_premium').val(hvpremium[id]);
            if($('#indi_pd_vclass').val() == 3)
            $('#indi_pd_premium').val(lvpremium[id]);
            compute_indi();
        });
                
        $('#indi_pd_vclass').on('change textInput input', function () {
            var selected = $('#indi_pd_vclass').find(':selected').val();
            var option;
            $('#indi_bi_vclass option').remove();
            if(selected == 1)
            {
                option = '<option value = 1 selected>Private Car</option>' ;
                $('#indi_bi_vclass:last').append(option);
                option = '<option value = 2 >Commercial Vehicle (Light & Medium)</option>' ;
                $('#indi_bi_vclass:last').append(option);
                option = '<option value = 3 >Commercial Vehicle (Heavy)</option>' ;
                $('#indi_bi_vclass:last').append(option);
            }
            if(selected == 2)
            {
                option = '<option value = 1 >Private Car</option>' ;
                $('#indi_bi_vclass:last').append(option);
                option = '<option value = 2 selected>Commercial Vehicle (Light & Medium)</option>' ;
                $('#indi_bi_vclass:last').append(option);
                option = '<option value = 3 >Commercial Vehicle (Heavy)</option>' ;
                $('#indi_bi_vclass:last').append(option);
            }
            if(selected == 3)
            {
                option = '<option value = 1 >Private Car</option>' ;
                $('#indi_bi_vclass:last').append(option);
                option = '<option value = 2 >Commercial Vehicle (Light & Medium)</option>' ;
                $('#indi_bi_vclass:last').append(option);
                option = '<option value = 3 selected>Commercial Vehicle (Heavy)</option>' ;
                $('#indi_bi_vclass:last').append(option);
            }
            $('#indi_bi_vclass').selectpicker('refresh');

            $('#form_client_individual').valid();

            var id = $('#indi_pd').find(':selected').data('id');
            var id2 = $('#indi_bi').find(':selected').data('id');
            var pvpremium = [];
            var hvpremium = [];
            var lvpremium = [];
            @foreach($pdg as $bi)
              pvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->privateCar }});
              hvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Heavy }});
              lvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Light }});
            @endforeach
            if($(this).val() == 1)
            $('#indi_pd_premium').val(pvpremium[id]);
            if($(this).val() == 2)
            $('#indi_pd_premium').val(hvpremium[id]);
            if($(this).val() == 3)
            $('#indi_pd_premium').val(lvpremium[id]);

            if($(this).val() == 1)
            $('#indi_bi_premium').val(pvpremium[id2]);
            if($(this).val() == 2)
            $('#indi_bi_premium').val(hvpremium[id2]);
            if($(this).val() == 3)
            $('#indi_bi_premium').val(lvpremium[id2]);
            compute_indi();
        });
                
        $('#comp_pa').on('change textInput input', function () {
            var id = $(this).find(':selected').val();
            var nperson = [];
            var premium = [];
            @foreach($ppa as $pa)
              nperson["{{ $pa->premiumPA_ID }}"] = "{{ $pa->passengerNum }}";
              premium["{{ $pa->premiumPA_ID }}"] = "₱ " + numberWithCommas({{ $pa->insuranceCover+$pa->passengerCover+$pa->mrCover }});
            @endforeach
            $('#comp_pa_nperson').val(nperson[id]);
            $('#comp_pa_premium').val(premium[id]);
            compute_comp();
        });
                
        $('#comp_bi').on('change textInput input', function () {
            var id = $(this).find(':selected').data('id');
            var pvpremium = [];
            var hvpremium = [];
            var lvpremium = [];
            @foreach($pdg as $bi)
              pvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->privateCar }});
              hvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Heavy }});
              lvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Light }});
            @endforeach
            if($('#comp_bi_vclass').val() == 1)
            $('#comp_bi_premium').val(pvpremium[id]);
            if($('#comp_bi_vclass').val() == 2)
            $('#comp_bi_premium').val(hvpremium[id]);
            if($('#comp_bi_vclass').val() == 3)
            $('#comp_bi_premium').val(lvpremium[id]);
            compute_comp();
        });
                
        $('#comp_bi_vclass').on('change textInput input', function () {
            var selected = $('#comp_bi_vclass').find(':selected').val();
            var option;
            $('#comp_pd_vclass option').remove();
            if(selected == 1)
            {
                option = '<option value = 1 selected>Private Car</option>' ;
                $('#comp_pd_vclass:last').append(option);
                option = '<option value = 2 >Commercial Vehicle (Light & Medium)</option>' ;
                $('#comp_pd_vclass:last').append(option);
                option = '<option value = 3 >Commercial Vehicle (Heavy)</option>' ;
                $('#comp_pd_vclass:last').append(option);
            }
            if(selected == 2)
            {
                option = '<option value = 1 >Private Car</option>' ;
                $('#comp_pd_vclass:last').append(option);
                option = '<option value = 2 selected>Commercial Vehicle (Light & Medium)</option>' ;
                $('#comp_pd_vclass:last').append(option);
                option = '<option value = 3 >Commercial Vehicle (Heavy)</option>' ;
                $('#comp_pd_vclass:last').append(option);
            }
            if(selected == 3)
            {
                option = '<option value = 1 >Private Car</option>' ;
                $('#comp_pd_vclass:last').append(option);
                option = '<option value = 2 >Commercial Vehicle (Light & Medium)</option>' ;
                $('#comp_pd_vclass:last').append(option);
                option = '<option value = 3 selected>Commercial Vehicle (Heavy)</option>' ;
                $('#comp_pd_vclass:last').append(option);
            }
            $('#comp_pd_vclass').selectpicker('refresh');

            $('#form_client_company').valid();

            var id = $('#comp_bi').find(':selected').data('id');
            var id2 = $('#comp_pd').find(':selected').data('id');
            var pvpremium = [];
            var hvpremium = [];
            var lvpremium = [];
            @foreach($pdg as $bi)
              pvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->privateCar }});
              hvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Heavy }});
              lvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Light }});
            @endforeach
            if($(this).val() == 1)
            $('#comp_bi_premium').val(pvpremium[id]);
            if($(this).val() == 2)
            $('#comp_bi_premium').val(hvpremium[id]);
            if($(this).val() == 3)
            $('#comp_bi_premium').val(lvpremium[id]);

            if($(this).val() == 1)
            $('#comp_pd_premium').val(pvpremium[id2]);
            if($(this).val() == 2)
            $('#comp_pd_premium').val(hvpremium[id2]);
            if($(this).val() == 3)
            $('#comp_pd_premium').val(lvpremium[id2]);
            compute_comp();
        });
                
        $('#comp_pd').on('change textInput input', function () {
            var id = $(this).find(':selected').data('id');
            var pvpremium = [];
            var hvpremium = [];
            var lvpremium = [];
            @foreach($pdg as $bi)
              pvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->privateCar }});
              hvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Heavy }});
              lvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Light }});
            @endforeach
            if($('#comp_pd_vclass').val() == 1)
            $('#comp_pd_premium').val(pvpremium[id]);
            if($('#comp_pd_vclass').val() == 2)
            $('#comp_pd_premium').val(hvpremium[id]);
            if($('#comp_pd_vclass').val() == 3)
            $('#comp_pd_premium').val(lvpremium[id]);
            compute_comp();
        });
                
        $('#comp_pd_vclass').on('change textInput input', function () {
            var selected = $('#comp_pd_vclass').find(':selected').val();
            var option;
            $('#comp_bi_vclass option').remove();
            if(selected == 1)
            {
                option = '<option value = 1 selected>Private Car</option>' ;
                $('#comp_bi_vclass:last').append(option);
                option = '<option value = 2 >Commercial Vehicle (Light & Medium)</option>' ;
                $('#comp_bi_vclass:last').append(option);
                option = '<option value = 3 >Commercial Vehicle (Heavy)</option>' ;
                $('#comp_bi_vclass:last').append(option);
            }
            if(selected == 2)
            {
                option = '<option value = 1 >Private Car</option>' ;
                $('#comp_bi_vclass:last').append(option);
                option = '<option value = 2 selected>Commercial Vehicle (Light & Medium)</option>' ;
                $('#comp_bi_vclass:last').append(option);
                option = '<option value = 3 >Commercial Vehicle (Heavy)</option>' ;
                $('#comp_bi_vclass:last').append(option);
            }
            if(selected == 3)
            {
                option = '<option value = 1 >Private Car</option>' ;
                $('#comp_bi_vclass:last').append(option);
                option = '<option value = 2 >Commercial Vehicle (Light & Medium)</option>' ;
                $('#comp_bi_vclass:last').append(option);
                option = '<option value = 3 selected>Commercial Vehicle (Heavy)</option>' ;
                $('#comp_bi_vclass:last').append(option);
            }
            $('#comp_bi_vclass').selectpicker('refresh');

            $('#form_client_company').valid();

            var id = $('#comp_pd').find(':selected').data('id');
            var id2 = $('#comp_bi').find(':selected').data('id');
            var pvpremium = [];
            var hvpremium = [];
            var lvpremium = [];
            @foreach($pdg as $bi)
              pvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->privateCar }});
              hvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Heavy }});
              lvpremium["{{ $bi->premiumDG_ID }}"] = "₱ " + numberWithCommas({{ $bi->cv_Light }});
            @endforeach
            if($(this).val() == 1)
            $('#comp_pd_premium').val(pvpremium[id]);
            if($(this).val() == 2)
            $('#comp_pd_premium').val(hvpremium[id]);
            if($(this).val() == 3)
            $('#comp_pd_premium').val(lvpremium[id]);

            if($(this).val() == 1)
            $('#comp_bi_premium').val(pvpremium[id2]);
            if($(this).val() == 2)
            $('#comp_bi_premium').val(hvpremium[id2]);
            if($(this).val() == 3)
            $('#comp_bi_premium').val(lvpremium[id2]);
            compute_comp();
        });
                
        $('#indi_vtype').on('change textInput input', function () {
            var newOptions = [];
            var data = 0;
            if($("#indi_vmake").val() != "")
            {
                @foreach($vModel as $vmd)
                 @if($vmd->del_flag == 0)
                  if($('#indi_vtype').val() == "{{ $vmd->vehicle_type }}" && $("#indi_vmake").val() == "{{ $vmd->vehicle_make_ID }}")
                  {
                   newOptions[data] = { model_name : "{{ $vmd->vehicle_year." ".$vmd->vehicle_model_name }}", model_ID : "{{ $vmd->vehicle_model_ID }}", model_value : "{{ $vmd->vehicle_value }}" };
                   data += 1;
                  }
                 @endif
                @endforeach
                $('#indi_vmodel option:gt(0)').remove();
                $.each(newOptions, function(key,value) {
                  var option = '<option value="'+value.model_ID+'" data-value="'+value.model_value+'">'+value.model_name+'</option>';
                  $('#indi_vmodel:last').append(option);
                });
                $("#indi_vmodel").prop("selectedIndex", -1);
                $('#indi_vmodel').selectpicker('refresh');
                $('#indi_vmodel_value').val("");
            }
        });
                
        $('#indi_vmake').on('change textInput input', function () {
            var newOptions = [];
            var data = 0;
            if($("#indi_vtype").val() != "")
            {
                @foreach($vModel as $vmd)
                 @if($vmd->del_flag == 0)
                  if($('#indi_vtype').val() == "{{ $vmd->vehicle_type }}" && $("#indi_vmake").val() == "{{ $vmd->vehicle_make_ID }}")
                  {
                   newOptions[data] = { model_name : "{{ $vmd->vehicle_year." ".$vmd->vehicle_model_name }}", model_ID : "{{ $vmd->vehicle_model_ID }}", model_value : "{{ $vmd->vehicle_value }}" };
                   data += 1;
                  }
                 @endif
                @endforeach
                $('#indi_vmodel option:gt(0)').remove();
                $.each(newOptions, function(key,value) {
                  var option = '<option value="'+value.model_ID+'" data-value="'+value.model_value+'">'+value.model_name+'</option>';
                  $('#indi_vmodel:last').append(option);
                });
                $("#indi_vmodel").prop("selectedIndex", -1);
                $('#indi_vmodel').selectpicker('refresh');
                $('#indi_vmodel_value').val("");
            }
        });
                
        $('#indi_vmodel').on('change textInput input', function () {
            if($("#indi_vtype").val() != "" && $("#indi_vmake").val() != "")
            {
                $('#indi_vmodel_value').val("₱ " + numberWithCommas($("#indi_vmodel").find(':selected').data('value')));
            }
        });
                
        $('#comp_vtype').on('change textInput input', function () {
            var newOptions = [];
            var data = 0;
            if($("#comp_vmake").val() != "")
            {
                @foreach($vModel as $vmd)
                 @if($vmd->del_flag == 0)
                  if($('#comp_vtype').val() == "{{ $vmd->vehicle_type }}" && $("#comp_vmake").val() == "{{ $vmd->vehicle_make_ID }}")
                  {
                   newOptions[data] = { model_name : "{{ $vmd->vehicle_year." ".$vmd->vehicle_model_name }}", model_ID : "{{ $vmd->vehicle_model_ID }}", model_value : "{{ $vmd->vehicle_value }}" };
                   data += 1;
                  }
                 @endif
                @endforeach
                $('#comp_vmodel option:gt(0)').remove();
                $.each(newOptions, function(key,value) {
                  var option = '<option value="'+value.model_ID+'" data-value="'+value.model_value+'">'+value.model_name+'</option>';
                  $('#comp_vmodel:last').append(option);
                });
                $("#comp_vmodel").prop("selectedIndex", -1);
                $('#comp_vmodel').selectpicker('refresh');
                $('#comp_vmodel_value').val("");
            }
        });
                
        $('#comp_vmake').on('change textInput input', function () {
            var newOptions = [];
            var data = 0;
            if($("#comp_vtype").val() != "")
            {
                @foreach($vModel as $vmd)
                 @if($vmd->del_flag == 0)
                  if($('#comp_vtype').val() == "{{ $vmd->vehicle_type }}" && $("#comp_vmake").val() == "{{ $vmd->vehicle_make_ID }}")
                  {
                   newOptions[data] = { model_name : "{{ $vmd->vehicle_year." ".$vmd->vehicle_model_name }}", model_ID : "{{ $vmd->vehicle_model_ID }}", model_value : "{{ $vmd->vehicle_value }}" };
                   data += 1;
                  }
                 @endif
                @endforeach
                $('#comp_vmodel option:gt(0)').remove();
                $.each(newOptions, function(key,value) {
                  var option = '<option value="'+value.model_ID+'" data-value="'+value.model_value+'">'+value.model_name+'</option>';
                  $('#comp_vmodel:last').append(option);
                });
                $("#comp_vmodel").prop("selectedIndex", -1);
                $('#comp_vmodel').selectpicker('refresh');
                $('#comp_vmodel_value').val("");
            }
        });
                
        $('#comp_vmodel').on('change textInput input', function () {
            if($("#comp_vtype").val() != "" && $("#comp_vmake").val() != "")
            {
                $('#comp_vmodel_value').val("₱ " + numberWithCommas($("#comp_vmodel").find(':selected').data('value')));
            }
        });
                
        $('#indi_insurance_company').on('change textInput input', function () {
            var newOptions = [];
            var data = 0;
            @foreach($policy as $pnumber)
             @if($pnumber->del_flag == 0)
              @if($pnumber->policyStatus_ID == 0)
               newOptions[data] = { policy_number : "{{ $pnumber->policy_number }}"};
               data += 1;
              @endif
             @endif
            @endforeach
            $('#indi_policy_number option:gt(0)').remove();
            $.each(newOptions, function(key,value) {
              var option = '<option value="'+value.policy_number+'">'+value.policy_number+'</option>';
              $('#indi_policy_number:last').append(option);
            });
            $("#indi_policy_number").prop("selectedIndex", -1);
            $('#indi_policy_number').selectpicker('refresh');
            $('#indi_policy_number').val("");
        });
                
        $('#comp_insurance_company').on('change textInput input', function () {
            var newOptions = [];
            var data = 0;
            @foreach($policy as $pnumber)
             @if($pnumber->del_flag == 0)
              @if($pnumber->policyStatus_ID == 0)
               newOptions[data] = { policy_number : "{{ $pnumber->policy_number }}"};
               data += 1;
              @endif
             @endif
            @endforeach
            $('#comp_policy_number option:gt(0)').remove();
            $.each(newOptions, function(key,value) {
              var option = '<option value="'+value.policy_number+'">'+value.policy_number+'</option>';
              $('#comp_policy_number:last').append(option);
            });
            $("#comp_policy_number").prop("selectedIndex", -1);
            $('#comp_policy_number').selectpicker('refresh');
            $('#comp_policy_number').val("");
        });

        function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#indi_image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            }
        }

        $("#indi_picture").change(function(){
            readURL1(this);
        });

        function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#comp_image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            }
        }

        $("#comp_picture").change(function(){
            readURL2(this);
        });
                
        function compute_indi() 
        {
            var data = 0;
            if($('#indi_pa_premium').val())
            {
                data = data + parseFloat($('#indi_pa_premium').val().replace(/[^0-9\.]/g,'')); 
            }
            if($('#indi_bi_premium').val())
            {
                data = data + parseFloat($('#indi_bi_premium').val().replace(/[^0-9\.]/g,'')); 
            }
            if($('#indi_pd_premium').val())
            {
                data = data + parseFloat($('#indi_pd_premium').val().replace(/[^0-9\.]/g,'')); 
            }
            $('#indi_total_net').html("Total Net Premium: ₱ " + numberWithCommas(data));
        }
                
        function compute_comp() 
        {
            var data = 0;
            if($('#comp_pa_premium').val())
            {
                data = data + parseFloat($('#comp_pa_premium').val().replace(/[^0-9\.]/g,'')); 
            }
            if($('#comp_bi_premium').val())
            {
                data = data + parseFloat($('#comp_bi_premium').val().replace(/[^0-9\.]/g,'')); 
            }
            if($('#comp_pd_premium').val())
            {
                data = data + parseFloat($('#comp_pd_premium').val().replace(/[^0-9\.]/g,'')); 
            }
            $('#comp_total_net').html("Total Net Premium: ₱ " + numberWithCommas(data));
        }

        $('#indi_insurance_company').on('change', function(){
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
            $('#indi_pa option:gt(0)').remove();
            $.each(newOptions, function(key,value) {
              var option = '<option value="'+value.ID+'" data-value="'+value.total+'">Number of Person '+value.person+' Coverage ₱ '+numberWithCommas(value.limit)+'</option>';
              $('#indi_pa:last').append(option);
            });
            $("#indi_pa").prop("selectedIndex", -1);
            $('#indi_pa').selectpicker('refresh');
            $('#indi_pa_premium').val("");

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
            $('#indi_pd option:gt(0)').remove();
            $.each(newOptions, function(key,value) {
              var option = '<option value="'+value.ID+'" data-id="'+value.ID+'">₱ '+numberWithCommas(value.limit)+'</option>';
              $('#indi_pd:last').append(option);
            });
            $("#indi_pd").prop("selectedIndex", -1);
            $('#indi_pd').selectpicker('refresh');
            $('#indi_pd_premium').val("");

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
            $('#indi_bi option:gt(0)').remove();
            $.each(newOptions, function(key,value) {
              var option = '<option value="'+value.ID+'" data-id="'+value.ID+'">₱ '+numberWithCommas(value.limit)+'</option>';
              $('#indi_bi:last').append(option);
            });
            $("#indi_bi").prop("selectedIndex", -1);
            $('#indi_bi').selectpicker('refresh');
            $('#indi_bi_premium').val("");
        });



        $('#comp_insurance_company').on('change', function(){
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
            $('#comp_pa option:gt(0)').remove();
            $.each(newOptions, function(key,value) {
              var option = '<option value="'+value.ID+'" data-value="'+value.total+'">Number of Person '+value.person+' Coverage ₱ '+numberWithCommas(value.limit)+'</option>';
              $('#comp_pa:last').append(option);
            });
            $("#comp_pa").prop("selectedIndex", -1);
            $('#comp_pa').selectpicker('refresh');
            $('#comp_pa_premium').val("");

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
            $('#comp_pd option:gt(0)').remove();
            $.each(newOptions, function(key,value) {
              var option = '<option value="'+value.ID+'" data-id="'+value.ID+'">₱ '+numberWithCommas(value.limit)+'</option>';
              $('#comp_pd:last').append(option);
            });
            $("#comp_pd").prop("selectedIndex", -1);
            $('#comp_pd').selectpicker('refresh');
            $('#comp_pd_premium').val("");

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
            $('#comp_bi option:gt(0)').remove();
            $.each(newOptions, function(key,value) {
              var option = '<option value="'+value.ID+'" data-id="'+value.ID+'">₱ '+numberWithCommas(value.limit)+'</option>';
              $('#comp_bi:last').append(option);
            });
            $("#comp_bi").prop("selectedIndex", -1);
            $('#comp_bi').selectpicker('refresh');
            $('#comp_bi_premium').val("");
        });
    </script>

    <script>
        if('{{$type}}' == 0)
        {
            $('#client_individual').val('{{$id}}');
            $('#client_individual').selectpicker('refresh');
            $('#indi_insurance_company').val('{{$details->insurance_company}}');
            $('#indi_insurance_company').selectpicker('refresh');

            var ins = $('#indi_insurance_company').val();
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
            $('#indi_pa option:gt(0)').remove();
            $.each(newOptions, function(key,value) {
              var option = '<option value="'+value.ID+'" data-value="'+value.total+'">Number of Person '+value.person+' Coverage ₱ '+numberWithCommas(value.limit)+'</option>';
              $('#indi_pa:last').append(option);
            });
            $("#indi_pa").prop("selectedIndex", -1);
            $('#indi_pa').selectpicker('refresh');
            $('#indi_pa_premium').val("");

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
            $('#indi_pd option:gt(0)').remove();
            $.each(newOptions, function(key,value) {
              var option = '<option value="'+value.ID+'" data-id="'+value.ID+'">₱ '+numberWithCommas(value.limit)+'</option>';
              $('#indi_pd:last').append(option);
            });
            $("#indi_pd").prop("selectedIndex", -1);
            $('#indi_pd').selectpicker('refresh');
            $('#indi_pd_premium').val("");

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
            $('#indi_bi option:gt(0)').remove();
            $.each(newOptions, function(key,value) {
              var option = '<option value="'+value.ID+'" data-id="'+value.ID+'">₱ '+numberWithCommas(value.limit)+'</option>';
              $('#indi_bi:last').append(option);
            });
            $("#indi_bi").prop("selectedIndex", -1);
            $('#indi_bi').selectpicker('refresh');
            $('#indi_bi_premium').val("");

            $('#indi_bi').val('{{$details->bodily_injury_ID}}');
            $('#indi_bi').selectpicker('refresh');
            $('#indi_pd').val('{{$details->property_damage_ID}}');
            $('#indi_pd').selectpicker('refresh');
            $('#indi_pa').val('{{$details->personal_accident_ID}}');
            $('#indi_pa').selectpicker('refresh');

            var id = $('#indi_pa').find(':selected').val();
            var nperson = [];
            var premium = [];
            @foreach($ppa as $pa)
              nperson["{{ $pa->premiumPA_ID }}"] = "{{ $pa->passengerNum }}";
              premium["{{ $pa->premiumPA_ID }}"] = "₱ " + numberWithCommas({{ $pa->insuranceCover+$pa->passengerCover+$pa->mrCover }});
            @endforeach
            $('#indi_pa_nperson').val(nperson[id]);
            $('#indi_pa_premium').val(premium[id]);
            compute_indi();

        }
    </script>

@endsection