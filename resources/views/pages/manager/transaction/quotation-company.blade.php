@extends('pages.manager.master')

@section('title','Quotation Details - Transaction| i-Insure')

@section('transQuote', 'active')

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
    <label><small>July 20, 2017 - Thursday</small></label><br/>
    <label><small>09:23:21 AM</small></label>
    </h2>
    <br/>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('/manager/transaction/quotation') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('/manager/transaction/quotation') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Quotation Details (Company)</a></li>
                    </ol>
                </div>
            </div>
            <div class="row clearfix">
                <!-- QUOTATION DETAILS -->
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                                <div class="list-group">
                                    <a href="javascript:void(0);" id="requests" class="list-group-item active" onclick=" 
                                    $('#reqs').show(800);
                                    $('#det').hide(800);
                                    $('#qDet').hide(800);
                                    $('#cDet').hide(800);
                                    $('#details').removeClass('active');
                                    $('#requests').addClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                        <b> <img src="{{ URL::asset ('images/icons/quotation.png')}}" style="height: 50px; width: 50px;"> Quotation Requests </b>
                                    </a>
                                    <a href="javascript:void(0);" id="details" class="list-group-item disabled">Quotation Details</a>
                                </div>
                            </div>
                </div>
                <!-- END QUOTATION DETAILS -->
                <!-- BREAKDOWN -->
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card" id="reqs">
                        <div class="body">
                            <div class="row clearfix">
                              <div class="body table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Date Received</th>
                                            <th>Unit Details</th>
                                            <th>Total Premium</th>
                                            <th>Insurance Company</th>
                                            <th>Sales Agent</th>
                                            <th>Forwarded by</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($qlist as $list)
                                         @foreach($qcomp as $comp)
                                          @if($list->quote_status == 5)
                                          @if($list->quote_ID == $comp->quote_comp_ID)
                                          <!-- Computation -->
                                          <div style = "display:none;">
                                            {{$total = 0}}
                                            {{$pa = 0}}
                                            {{$bi = 0}}
                                            {{$pd = 0}}
                                             @foreach($ppa as $pa)
                                              @if($pa->premiumPA_ID == $comp->personal_accident_ID)
                                               {{$total += $pa->insuranceCover+$pa->passengerCover+$pa->mrCover}}
                                               {{$pa = $pa->insuranceCover+$pa->passengerCover+$pa->mrCover}}
                                              @endif
                                             @endforeach
                                             @foreach($pdg as $dg)
                                              @if($dg->premiumDG_ID == $comp->bodily_injury_ID)
                                               @if($comp->vehicle_class == 1)
                                                {{$total += $dg->privateCar}}
                                                {{$bi = $dg->privateCar}}
                                               @endif
                                               @if($comp->vehicle_class == 2)
                                                {{$total += $dg->cv_Heavy}}
                                                {{$bi = $dg->privateCar}}
                                               @endif
                                               @if($comp->vehicle_class == 3)
                                                {{$total += $dg->cv_Light}}
                                                {{$bi = $dg->privateCar}}
                                               @endif
                                              @endif
                                             @endforeach
                                             @foreach($pdg as $dg)
                                              @if($dg->premiumDG_ID == $comp->property_damage_ID)
                                               @if($comp->vehicle_class == 1)
                                                {{$total += $dg->privateCar}}
                                                {{$pd = $dg->privateCar}}
                                               @endif
                                               @if($comp->vehicle_class == 2)
                                                {{$total += $dg->cv_Heavy }}
                                                {{$pd = $dg->cv_Heavy}}
                                               @endif
                                               @if($comp->vehicle_class == 3)
                                                {{$total += $dg->cv_Light}}
                                                {{$pd = $dg->cv_Light}}
                                               @endif
                                              @endif
                                             @endforeach
                                          </div>
                                          <!-- Computation -->

                                            <tr>  
                                                <td>{{\Carbon\Carbon::parse($list->created_at)->format("F d, Y")}}</td>
                                                <td>{{$comp->vehicle_year_model}}
                                                @foreach($model as $mod)
                                                 @if($comp->vehicle_model_ID == $mod->vehicle_model_ID)
                                                  {{$mod->vehicle_model_name}}
                                                 @endif
                                                @endforeach
                                                {{$comp->specify_model}}
                                                </td>
                                                <td>
                                                 <script>
                                                    var data = numberWithCommas('{{$total}}'); document.write("₱ " + data);
                                                 </script>
                                                </td>
                                                <td>
                                                @foreach($insco as $ins)
                                                 @if($ins->comp_ID == $comp->insurance_company)
                                                  {{$ins->comp_name}}
                                                 @endif
                                                @endforeach
                                                </td>
                                                <td>
                                                @foreach($agent as $sagent)
                                                 @if($sagent->agent_ID == $comp->sales_agent)
                                                  @foreach($pinfo as $info)
                                                   @if($info->pinfo_ID == $sagent->personal_info_ID)
                                                    {{$info->pinfo_last_name.", ".$info->pinfo_first_name." ".$info->pinfo_middle_name}}
                                                   @endif
                                                  @endforeach
                                                 @endif
                                                @endforeach
                                                </td>
                                                <td>
                                                 @foreach($pinfo as $inf)
                                                   @if($inf->pinfo_ID == $list->employee_info_ID)
                                                    {{$inf->pinfo_last_name.", ".$inf->pinfo_first_name." ".$inf->pinfo_middle_name}}
                                                   @endif
                                                  @endforeach
                                                </td>
                                                <td><button type="button" class="btn bg-light-blue waves-effect" data-toggle="tooltip" data-placement="left" title="View details" onclick="
                                                $('#vehicle_type').val('{{$comp->vehicle_type_ID}}');
                                                $('#vehicle_type').selectpicker('refresh');
                                                $('#vehicle_make').val('{{$comp->vehicle_make_ID}}');
                                                $('#vehicle_make').selectpicker('refresh');
                                                $('#vehicle_model').val('{{$comp->vehicle_model_ID}}');
                                                $('#vehicle_model').selectpicker('refresh');
                                                $('#specify_vehicle_type').val('{{$comp->specify_type}}');
                                                $('#specify_vehicle_make').val('{{$comp->specify_make}}');
                                                $('#year_model').val('{{$comp->vehicle_year_model}}');
                                                $('#specify_vehicle_model').val('{{$comp->specify_model}}');
                                                $('#vehicle_market_value').val('₱ ' + numberWithCommas('{{$comp->vehicle_value}}'));
                                                $('#color').val('{{$comp->color}}');
                                                $('#plate_number').val('{{$comp->plate_number}}');
                                                $('#engine_number').val('{{$comp->motor_engine}}');
                                                $('#chassis_number').val('{{$comp->serial_chassis}}');
                                                $('#mvfile_number').val('{{$comp->mv_file_number}}');
                                                $('#insurance_comp').val('{{$comp->insurance_company}}');
                                                $('#insurance_comp').selectpicker('refresh');
                                                $('#tppd').val('₱ ' + numberWithCommas('{{$pd}}'));
                                                $('#tpbi').val('₱ ' + numberWithCommas('{{$bi}}'));
                                                $('#pa').val('₱ ' + numberWithCommas('{{$pa}}'));
                                                $('#comp_name').val('{{$comp->comp_name}}');
                                                $('#comp_telnum').val('{{$comp->comp_telnum}}');
                                                $('#comp_faxnum').val('{{$comp->comp_faxnum}}');
                                                $('#comp_email').val('{{$comp->comp_email}}');
                                                $('#cont_first_name').val('{{$comp->pinfo_first_name}}');
                                                $('#cont_middle_name').val('{{$comp->pinfo_middle_name}}');
                                                $('#cont_last_name').val('{{$comp->pinfo_last_name}}');
                                                $('#cont_bday').val('{{$comp->pinfo_age}}');

                                                var bday = document.getElementById('cont_bday').value.split('-');
                                                var today = new Date();
                                                if(bday[0] != 0)
                                                {
                                                    if((today.getMonth() + 1) >= bday[1])
                                                    {      
                                                      document.getElementById('cont_age').value = today.getFullYear() - bday[0] - 1;
                                                        if((today.getDate()) >= bday[2])
                                                        {
                                                            document.getElementById('cont_age').value = today.getFullYear() - bday[0];
                                                        }
                                                    }
                                                    else
                                                    {
                                                      document.getElementById('cont_age').value = today.getFullYear() - bday[0] - 1;
                                                    }
                                                }
                                                else
                                                {
                                                    document.getElementById('cont_age').value = 'Invalid Input';
                                                }

                                                $('#cont_cpnum').val('{{$comp->pinfo_cpnum_1}}');
                                                $('#cont_cpnum_2').val('{{$comp->pinfo_cpnum_2}}');
                                                $('#cont_tpnum').val('{{$comp->pinfo_tpnum}}');
                                                $('#cont_email').val('{{$comp->pinfo_mail}}');
                                                $('#comp_agent').val('{{$comp->sales_agent}}');
                                                $('#comp_agent').selectpicker('refresh');
                                                if('{{$comp->pinfo_gender}}' == 0)
                                                    $('#cont_male').prop('checked',true);
                                                if('{{$comp->pinfo_gender}}' == 1)
                                                    $('#cont_female').prop('checked',true);
                                                $('#comp_blcknum').val('{{$comp->add_blcknum}}');
                                                $('#comp_street').val('{{$comp->add_street}}');
                                                $('#comp_subdivision').val('{{$comp->add_subdivision}}');
                                                $('#comp_barangay').val('{{$comp->add_brngy}}');
                                                $('#comp_district').val('{{$comp->add_district}}');
                                                $('#comp_city').val('{{$comp->add_city}}');
                                                $('#comp_province').val('{{$comp->add_province}}');
                                                $('#comp_region').val('{{$comp->add_region}}');
                                                $('#comp_region').selectpicker('refresh');
                                                $('#comp_zipcode').val('{{$comp->add_zipcode}}');

                                                $(this).parents('#reqs').hide(800);
                                                $('#det').show(800);
                                                $('#details').removeClass('disabled');
                                                $('#details').addClass('active');
                                                $('#requests').removeClass('active');
                                                $('body,html').animate({
                                                                    scrollTop: 0
                                                                }, 500);
                                                                return false;
                                                "><i class="material-icons">remove_red_eye</i>
                                                </button>
                                                <button type="button" class="btn bg-green waves-effect approve" data-id = "{{$comp->quote_comp_ID}}" data-toggle="tooltip" data-placement="left" title="Approve"><i class="material-icons">thumb_up</i>
                                                </button>
                                                <button type="button" class="btn bg-red waves-effect disapprove" data-id = "{{$comp->quote_comp_ID}}" onclick="openModal();" data-toggle="tooltip" data-placement="left" title="Reject"><i class="material-icons">thumb_down</i>
                                                </button></td>
                                            </tr>
                                          @endif
                                          @endif
                                         @endforeach
                                        @endforeach
                                        <!-- <tr>  
                                            <td>August 17, 2017</td>
                                            <td>2012 A6 QUATTRO V6 A/T 3.0</td>
                                            <td>Php 40,000.00</td>
                                            <td>FPG Insurance</td>
                                            <td>Jeon, Jungkook</td>
                                            <td>Rola, Ma. Gabriella</td>
                                            <td><button type="button" class="btn bg-light-blue waves-effect" data-toggle="tooltip" data-placement="left" title="View details" onclick="
                                            $(this).parents('#reqs').hide(800);
                                            $('#det').show(800);
                                            $('#details').removeClass('disabled');
                                            $('#details').addClass('active');
                                            $('#requests').removeClass('active');
                                            $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                            "><i class="material-icons">remove_red_eye</i>
                                                        </button>
                                                        <button type="button" class="btn bg-green waves-effect" onclick="window.document.location='{{ URL::asset('') }}';" data-toggle="tooltip" data-placement="left" title="Approve"><i class="material-icons">thumb_up</i>
                                                        </button>
                                                        <button type="button" class="btn bg-red waves-effect" onclick="openModal()" data-toggle="tooltip" data-placement="left" title="Reject"><i class="material-icons">thumb_down</i>
                                                        </button></td>
                                        </tr> -->
                                    </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                    </div> <!-- END OF CARD -->

                    <div class="card" id="det">
                        <div class="header">
                            <h2>VEHICLE DETAILS</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Vehicle Type:</small></label>
                                            <select id = "vehicle_type" name = "vehicle_type" class="form-control show-tick" data-live-search="true" disabled>
                                                  <option selected value = "" >-- Select Vehicle Type --</option>
                                                  @foreach($type as $vtp)
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
                                            <input id = "specify_vehicle_type" name = "specify_vehicle_type" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Plate Number:</small></label>
                                            <input id = "plate_number" name = "plate_number" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Vehicle Make:</small></label>
                                            <select id = "vehicle_make" name = "vehicle_make" class="form-control show-tick" data-live-search="true" disabled>
                                                  <option selected value = "" >-- Select Vehicle Make --</option>
                                                  @foreach($make as $vmk)
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
                                            <input id = "specify_vehicle_make" name = "specify_vehicle_make" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Engine Number:</small></label>
                                            <input id = "engine_number" name = "engine_number" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-8">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Year Model:</small></label>
                                            <input id = "year_model" name = "year_model" type="number" class="form-control" min="1900" max="2099" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Chassis Number:</small></label>
                                            <input id = "chassis_number" name = "chassis_number" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Vehicle Model:</small></label>
                                            <select id = "vehicle_model" name = "vehicle_model" class="form-control show-tick" data-live-search="true" disabled>
                                                  <option selected value = "">-- Select Vehicle Model --</option>
                                                  @foreach($model as $mod)
                                                   @if($mod->del_flag == 0)
                                                    <option value = "{{ $mod->vehicle_model_ID }}">{{ $vmk->vehicle_model_name }}</option>
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
                                            <input id = "specify_vehicle_model" name = "specify_vehicle_model" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>MV File Number:</small></label>
                                            <input id = "mvfile_number" name = "mvfile_number" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Vehicle's Market Value:</small></label>
                                            <input id = "vehicle_market_value" name = "vehicle_market_value" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Color:</small></label>
                                            <input id = "color" name = "color" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <button type="button" id="next1"  class="btn btn-block bg-teal waves-effect left" onclick=" 
                                    $(this).parents('#det').hide(800);
                                    $('#qDet').show(800);
                                    $('#vehicleDetails').removeClass('active');
                                    $('#quoteDetails').addClass('active');
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
                                            <select id = "insurance_comp" name = "insurance_comp" class="form-control show-tick" data-live-search="true" disabled>
                                              <option selected value = "" style = "display: none;">-- Select Insurance Company --</option>
                                                @foreach($insco as $insc)
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
                                    <h4>Possible Comprehensive Insurance Quotation</h4>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Total Net Premium:</small></label>
                                            <b><input id = "total_net_premium" name = "total_net_premium" type="text" class="form-control" readonly></b>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Basic Premium:</small></label>
                                            <input id = "basic_premium" name = "basic_premium" type="text" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Value Added Tax (VAT):</small></label>
                                            <input id = "vat" name = "vat" type="text" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Documentary Stamp Tax (DST):</small></label>
                                            <input id = "dst" name = "dst" type="text" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Local Government Tax:</small></label>
                                            <input id = "local_gov_tax" name = "local_gov_tax" type="text" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Deductible:</small></label>
                                            <input id = "deductible" name = "deductible" type="text" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <h4>Comprehensive Insurance Policy Benefits <button style="float: right;" type="button" id="next1"  class="btn bg-green waves-effect left" data-toggle="modal" data-target="#editt"> EDIT</button></h4>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Own Damage/Theft:</small></label>
                                            <input id = "odt" name = "odt" type="text" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Third Party Property Damage:</small></label>
                                            <input id = "tppd" name = "tppd" type="text" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Third Party Bodily Injury:</small></label>
                                            <input id = "tpbi" name = "tpbi" type="text" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Personal Accident:</small></label>
                                            <input id = "pa" name = "pa" type="text" class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Acts of Nature:</small></label>
                                            <b><input id = "aon" name = "aon" type="text" class="form-control" readonly ></b>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <button type="button" id="next1"  class="btn btn-block bg-blue waves-effect left" onclick=" 
                                    $(this).parents('#qDet').hide(800);
                                    $('#det').show(800);
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
                                    <button type="button" id="next1"  class="btn btn-block bg-teal waves-effect left" onclick=" 
                                    $(this).parents('#qDet').hide(800);
                                    $('#cDet').show(800);
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
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
                                    <label><small><b>COMPANY</b></small></label>
                                </div>
                            </div>

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
                                                <input id = "comp_name" name = "comp_name" type="text" class="form-control" readonly >
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
                                                <input id = "comp_tpnum" name = "comp_tpnum" type="text" class="form-control" readonly >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Fax Number:</small></label>
                                                <input id = "comp_faxnum" name = "comp_faxnum" type="text" class="form-control" readonly >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Email:</small></label>
                                                <input id = "comp_email" name = "comp_email" type="email" class="form-control" readonly >
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
                                                <input id = "comp_blcknum" name = "comp_blcknum" type="text" class="form-control" readonly >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>District:</small></label>
                                                <input id = "comp_district" name = "comp_district" type="text" class="form-control" readonly >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Street:</small></label>
                                                <input id = "comp_street" name = "comp_street" type="text" class="form-control" readonly >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>City/Municipality:</small></label>
                                                <input id = "comp_city" name = "comp_city" type="text" class="form-control" readonly >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Subdivision:</small></label>
                                                <input id = "comp_subdivision" name = "comp_subdivision" type="text" class="form-control" readonly >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Province:</small></label>
                                                <input id = "comp_province" name = "comp_province" type="text" class="form-control" readonly >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Barangay:</small></label>
                                                <input id = "comp_barangay" name = "comp_barangay" type="text" class="form-control" readonly >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Region:</small></label>
                                                <select id = "comp_region" name = "comp_region" class="form-control show-tick" data-live-search="true" disabled>
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
                                                <input id = "comp_zipcode" name = "comp_zipcode" type="text" class="form-control" readonly >
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
                                                <input id = "cont_first_name" name = "cont_first_name" type="text" class="form-control" readonly >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Birthday:</small></label>
                                                <input id = "cont_bday" name = "cont_bday" type="date" class="form-control" readonly >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Middle Name:</small></label>
                                                <input id = "cont_middle_name" name = "cont_middle_name" type="text" class="form-control" readonly >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Age:</small></label>
                                                <input id = "cont_age" name = "cont_age" type="number" class="form-control" readonly readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Last Name:</small></label>
                                                <input id = "cont_last_name" name = "cont_last_name" type="text" class="form-control" readonly >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Gender:</small></label>
                                                <input name="cont_gender" type="radio" id="cont_male" value = "0" class="with-gap" disabled/>
                                                <label for="cont_male">Male</label>
                                                <input name="cont_gender" type="radio" id="cont_female" value = "1" class="with-gap" disabled/>
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
                                                <input id = "cont_cpnum" name = "cont_cpnum" type="text" class="form-control" readonly >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Cellphone Number (Alternate):</small></label>
                                                <input id = "cont_cpnum_2" name = "cont_cpnum_2" type="text" class="form-control" readonly >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Telephone Number:</small></label>
                                                <input id = "cont_tpnum" name = "cont_tpnum" type="text" class="form-control" readonly >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Email:</small></label>
                                                <input id = "cont_email" name = "cont_email" type="email" class="form-control" readonly >
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
                                                <select id = "comp_agent" name = "comp_agent" class="form-control show-tick" data-live-search="true" disabled>
                                                  <option selected value = "" style = "display: none;">-- Select Sales Agent --</option>
                                                 @foreach($agent as $saleA)
                                                  @if($saleA->del_flag == 0)
                                                  @if($saleA->sales_agent_flag == 1)
                                                  @foreach($pinfo as $info)
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
                                </div> <!-- END OF COMPANY -->
                            
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <button type="button" id="next1"  class="btn btn-block bg-blue waves-effect left" onclick=" 
                                    $(this).parents('#cDet').hide(800);
                                    $('#qDet').show(800);
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                        <span style="font-size: 15px;"> PREVIOUS</span>
                                    </button>
                                </div>
                                <!--<div class="col-md-6">
                                    <button type="button" id="next1"  class="btn btn-block bg-teal waves-effect left" onclick=" 
                                    $(this).parents('#cDet').hide(800);
                                    $('#tos').show(800);
                                    $('#clientDetails').removeClass('active');
                                    $('#termsDetails').addClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                        <span style="font-size: 15px;"> NEXT</span>
                                    </button>
                                </div>
                            </div>
                        </div> <!-- END OF BODY -->
                    </div><!-- END OF CARD -->
                </div>
                <!-- #END# BREAKDOWN -->
            </div>
        </div>

        <!-- CHOOSE INST MODAL -->
            <div class="modal fade" id="ugh" role="dialog">
                <div class="modal-dialog animated zoomInLeft active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-view">
                            <h4><br/>REASON</h4>
                        </div>
              <form id = "quote_note" action = "/manager/transaction/quotation-company/disapprove" method = "POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-4" style = "display: none;">
                           <input id = "id" name = "id" type="text" class="form-control">
                       </div>
                        <div class="modal-body">
                            <div class="row clearfix">
                              <div class="col-md-12">
                                  <div class="form-group form-float">
                                      <div class="form-line focused error">
                                          <label>Please state the reason why this quotation should be rejected: (required)</label>
                                          <textarea id = "note" name = "note" rows="10" class="form-control no-resize auto-growth" required></textarea>
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <div class="row clearfix">
                              <div class="col-md-6">
                                <button class="btn bg-green btn-block waves-effect" type="submit">SUBMIT</button>
                              </div>
                              <div class="col-md-6">
                                <button class="btn btn-block waves-effect" data-dismiss="modal">CLOSE</button>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
              </form>
            </div>
            <!-- #END# ADD INST MODAL -->
    </section>

    <script type="text/javascript">
        window.onload = function() {
          document.getElementById('det').style.display = 'none';
          document.getElementById('qDet').style.display = 'none';
          document.getElementById('cDet').style.display = 'none';
        };

        function openModal(){
            $('#ugh').modal();
        } 
    </script>

    <script>
        $('.approve').click(function(event){
              $.ajax({

                  type: 'POST',
                  url: '/manager/transaction/quotation-company/approve',
                  data: {ID:$(this).data('id')},
                  success:function(xhr){
                      console.log('success');
                      console.log(xhr.responseText);
                      window.location.reload();
                  },
                    error:function(xhr, ajaxOptions, thrownError,data){
                      console.log(xhr.status);
                      console.log(xhr.responseText);
                  }
              });
        });

        $('.disapprove').click(function(event){
          $('#id').val($(this).data('id'));
        });
    </script>
@endsection