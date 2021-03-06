@extends('pages.accounting-staff.master')

@section('title','Insurance Accounts - Transaction | i-Insure')

@section('trans','active')

@section('transIns','active')

@section('transInsInd','active')

@section('body')

    <script>
    function formatDate(date)
    {
      var monthNames = [
        "January", "February", "March",
        "April", "May", "June", "July",
        "August", "September", "October",
        "November", "December"
      ];
      var dateonly = date.split(' ');

      var arr = dateonly[0].split('-');

      var day = arr[2];
      var monthIndex = arr[1]-1;
      var year = arr[0];

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
      var dateonly = date.split(' ');

      var arr = dateonly[0].split('-');

      var day = arr[2];
      var monthIndex = arr[1]-1;
      var year = arr[0];

      return monthNames[monthIndex] + ' ' + day + ', ' + year + ' - ' + monthNames[monthIndex] + ' ' + day + ', ' +(parseInt(year) + 1);
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
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('accounting-staff/transaction/insurance-individual') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('accounting-staff/transaction/insurance-individual') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Account Details</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="pDetails" class="list-group-item active" onclick="
                                    $('#pDetails').addClass('active');
                                    $('#pDet').show(800);
                                    $('#iDet').hide(800);
                                    $('#vDet').hide(800);
                                    $('#vDetails').removeClass('active');
                                    $('#iDetails').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                1. Personal Information
                            </a>
                            <a href="javascript:void(0);" id="vDetails" class="list-group-item" onclick="
                                    $('#vDetails').addClass('active');
                                    $('#vDet').show(800);
                                    $('#iDet').hide(800);
                                    $('#pDet').hide(800);
                                    $('#pDetails').removeClass('active');
                                    $('#iDetails').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">2. Vehicle Details</a>
                            <a href="javascript:void(0);" id="iDetails" class="list-group-item" onclick="
                                    $('#iDetails').addClass('active');
                                    $('#iDet').show(800);
                                    $('#pDet').hide(800);
                                    $('#vDet').hide(800);
                                    $('#vDetails').removeClass('active');
                                    $('#pDetails').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">3. Insurance Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card" id="pDet">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/insurance-individual.png')}}" style="height: 50px; width: 50px;"> Insurance Account Details </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <form id="add" name = "add" action = "#" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <h3><small><b>PERSONAL INFORMATION</b></small></h3>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div>
                                                <div class="body" align="center">
                                                    <div class="fallback">
                                                        <img id="Img" src="{{ URL::asset('image/default-image.png') }}" alt="your image" style="height: 210px; width: 215px; border-style: solid; border-width: 2px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div> <!-- END OF ROW CLEARFIX -->
                                    <div class="row clearfix">
                                        <br/><br/>
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label><small>Assured Name:</small></label>
                                                    <input id = "client_name" name = "client_name" type="text" class="form-control" readonly="true">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                            <label><small>Gender :</small></label>
                                                <select id = "pinfo_gender" name = "pinfo_gender" class="form-control show-tick" onchange="$('#add').valid()">
                                                <option selected value = "" style = "display: none;">-- Gender --</option>
                                                <option value = "0">Male</option>
                                                <option value = "1">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Age :</small></label>
                                                    <input id = "age" name = "age" type="text" class="form-control" readonly="true" readonly="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                              <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <label><small>Birthdate:</small></label>
                                                            <div class="form-row show-inputbtns">
                                                            <input id = "pinfo_bday" name = "pinfo_bday" type="date" data-date-inline-picker="false" data-date-open-on-focus="true" class="form-control" readonly/>
                                                            </div>
                                                        </div>
                                              </div>
                                        </div>             
                                    </div> <!-- end of rowclearfix -->
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Cellphone Number:</small></label>
                                                    <input id = "pinfo_cpnum_1" name = "pinfo_cpnum_1" type="text" class="form-control"  readonly="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Cellphone Number(Alternate):</small></label>
                                                    <input id = "pinfo_cpnum_2" name = "pinfo_cpnum_2" type="text" class="form-control"  readonly="true" value = "">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Tel. Num.:</small></label>
                                                    <input id = "pinfo_tpnum" name = "pinfo_tpnum" type="text" class="form-control"  readonly="true" value = "">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>E-mail:</small></label>
                                                    <input id = "pinfo_mail" name = "pinfo_mail" type="email" class="form-control"  readonly="true" value = "">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <h3> <small><b>RESIDENTIAL ADDRESS</b></small></h3>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Complete Address: </small></label>
                                                    <input id = "address" name = "address" type="text" class="form-control" readonly="true">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <div class="card" id="vDet">
                            <div class="header">
                            <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/insurance-individual.png')}}" style="height: 50px; width: 50px;"> Insurance Account Details </h3>
                            <div class="divider" style="margin-bottom:20px;"></div>
                            </div>
                            <div class="body">
                                <h3> <small><b>VEHICLE DETAILS</b></small></h3>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Vehicle Type:</small></label>
                                                    <input id = "vehicle_type" name = "vehicle_type" type="text" class="form-control"  readonly="true" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Vehicle Make:</small></label>
                                                    <input id = "vehicle_make" name = "apinfo_tpnum" type="text" class="form-control"  readonly="true" ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Vehicle Model:</small></label>
                                                    <input id = "vehicle_model" name = "vehicle_model" type="text" class="form-control"  readonly="true" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Market Value:</small></label>
                                                    <input id = "vehicle_model_value" name = "vehicle_model_value" type="text" class="form-control"  readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Plate Number:</small></label>
                                                    <input id = "plate_num" name = "plate_num" type="text" class="form-control"  readonly="true" value="{{$insaccount->plate_number}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Serial Chassis:</small></label>
                                                    <input id = "serial_chassis" name = "serial_chassis" type="text" class="form-control"  readonly="true" value="{{$insaccount->serial_chassis}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Motor Engine:</small></label>
                                                    <input id = "motor_engine" name = "motor_engine" type="text" class="form-control"  readonly="true" value="{{$insaccount->motor_engine}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Seating Capacity:</small></label>
                                                    <input id = "seating_capacity" name = "seating_capacity" type="text" class="form-control"  readonly="true" value="{{$insaccount->seat_capacity}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Color:</small></label>
                                                    <input id = "color" name = "color" type="text" class="form-control"  readonly="true" value="{{$insaccount->color}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" id="iDet">
                                <div class="header">
                                    <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/insurance-individual.png')}}" style="height: 50px; width: 50px;"> Insurance Account Details </h3>
                                    <div class="divider" style="margin-bottom:20px;"></div>
                                    </div>
                                    <div class="body">
                                    <h3> <small><b>INSURANCE DETAILS</b></small></h3>
                                    <div class="row clearfix">
                                        <br/><br/>
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Policy Number: </small></label>
                                                    <input id = "policy_number" name = "policy_number" type="text" class="form-control" readonly="true" value="{{ $insaccount->policy_number }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Insurance Company: </small></label>
                                                    <input id = "insurance_company" name = "insurance_company" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Date Issued: </small></label>
                                                    <input id = "date_issued" name = "date_issued" type="text" class="form-control" readonly="true">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Inception Date: </small></label>
                                                    <input id = "date_inception" name = "date_inception" type="text" class="form-control" readonly="true">
                                                </div>
                                            </div>
                                        </div>                
                                    </div> <!-- end of rowclearfix -->
                                    <h3> <small><b>PREMIUMS</b></small></h3>
                                    <div class="row clearfix">
                                        <br/><br/>
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Deductible: </small></label>
                                                    <input id = "deductible" name = "deductible" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Authorized Repair Limit: </small></label>
                                                    <input id = "arlimit" name = "arlimit" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Towing: </small></label>
                                                    <input id = "towing" name = "towing" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Bodily Injury: </small></label>
                                                    <input id = "bi" name = "bi" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Property Damage: </small></label>
                                                    <input id = "pd" name = "pd" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Personal Accident: </small></label>
                                                    <input id = "pa" name = "pa" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>                     
                                    </div> <!-- end of rowclearfix --> 

                                    <div class="row clearfix">
                                        <br/><br/>

                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Act of Nature: </small></label>
                                                    <input id = "aon" name = "aon" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div> 
                                    </div> 

                                    <div class="row clearfix">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-8" align="center">
                                            <p style="text-align: right; font-size: 25px;" id = "total"></p>
                                        </div>          
                                    </div> <!-- end of rowclearfix -->
                            </form>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        window.onload = function() {
          document.getElementById('vDet').style.display = 'none';
          document.getElementById('iDet').style.display = 'none';
        };
    </script>

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
        $(document).ready(function () {

            var inscomp = '';
            var image = '';
            var fullname = '';
            var gender = '';
            var bday = '';
            var cp1 = '';
            var cp2 = '';
            var tel = '';
            var mail = '';
            var address = '';
            var type = '';
            var make = '';
            var model = '';
            var value = '';
            var pa = '';
            var pd = '';
            var bi = '';
            var data = 0;

            @foreach($inscomp as $comp)
             @if($comp->comp_ID == $insaccount->insurance_company)
              var inscomp = '{{$comp->comp_name}}';
             @endif
            @endforeach

            @foreach($pInfo as $info)
             @if($info->pinfo_ID == $client->personal_info_ID)
             fullname = '{{ $info->pinfo_last_name.', '.$info->pinfo_first_name.' '.$info->pinfo_middle_name }}';
             gender = '{{$info->pinfo_gender}}';
             bday = '{{ $info->pinfo_age }}';
             cp1 = '{{ $info->pinfo_cpnum_1 }}';
             cp2 = '{{ $info->pinfo_cpnum_2 }}';
             tel = '{{ $info->pinfo_tpnum }}';
             mail = '{{ $info->pinfo_mail }}';
                @if(!empty($info->pinfo_picture))
                 image = '/image/client/{{$info->pinfo_picture}}';
                 $('#Img').attr('src',image);
                @endif
             @endif
            @endforeach

            @foreach($add as $address)
             @if($address->add_ID == $client->client_add_ID)
                @if(!empty($address->add_blcknum))
                 address += '{{$address->add_blcknum}}';
                @endif
                @if(!empty($address->add_street))
                 address += '{{$address->add_street.', '}}';
                @endif
                @if(!empty($address->add_subdivision))
                 address += '{{$address->add_subdivision.', '}}';
                @endif
                @if(!empty($address->add_brngy))
                 address += '{{$address->add_brngy.', '}}';
                @endif
                @if(!empty($address->add_district))
                 address += '{{$address->add_district.', '}}';
                @endif
                @if(!empty($address->add_city))
                 address += '{{$address->add_city.', '}}';
                @endif
                @if(!empty($address->add_province))
                 address += '{{$address->add_province.', '}}';
                @endif
                @if(!empty($address->add_region))
                 address += '{{'Region '.$address->add_region.', '}}';
                @endif
                @if(!empty($address->add_zipcode))
                 address += '{{$address->add_zipcode}}';
                @endif 
             @endif
            @endforeach

              type = '{{$insaccount->vehicle_type_name}}';
              make = '{{$insaccount->vehicle_make_name}}';
              model = '{{$insaccount->vehicle_year.' '.$insaccount->vehicle_model_name}}';
              value = numberWithCommas('{{$insaccount->vehicle_value}}');

              @if($paydetails->account_ID == $insaccount->account_ID)
                  pa1 = numberWithCommas('<?php $number = round($paydetails->pa_cover,2); echo number_format($number, 2, '.', ','); ?>'); 
                  pa2 = numberWithCommas('<?php $number = round($paydetails->pa_premium,2); echo number_format($number, 2, '.', ','); ?>');
                  pa = 'COVER: ₱' + pa1 + ' - PREMIUM: ₱' +pa2;
                  pd1 = numberWithCommas('<?php $number = round($paydetails->pd_cover,2); echo number_format($number, 2, '.', ','); ?>');
                  pd2 = numberWithCommas('<?php $number = round($paydetails->pd_cover,2); echo number_format($number, 2, '.', ','); ?>');
                  pd = 'COVER: ₱' + pd1 + ' - PREMIUM: ₱' +pd2;
                  bi1 = numberWithCommas('<?php $number = round($paydetails->bi_cover,2); echo number_format($number, 2, '.', ','); ?>');
                  bi2 = numberWithCommas('<?php $number = round($paydetails->bi_cover,2); echo number_format($number, 2, '.', ','); ?>');
                  bi = 'COVER: ₱' + bi1 + ' - PREMIUM: ₱' +bi2;
                  ded = numberWithCommas('<?php $number = round($paydetails->deductible,2); echo number_format($number, 2, '.', ','); ?>');
                  ar = numberWithCommas('<?php $number = round($paydetails->arl,2); echo number_format($number, 2, '.', ','); ?>');
                  aon1 = numberWithCommas('<?php $number = round($paydetails->aon_cover,2); echo number_format($number, 2, '.', ','); ?>');
                  aon2 = numberWithCommas('<?php $number1 = round($paydetails->aon_premium,2); echo number_format($number1, 2, '.', ','); ?>');
                  aonz = 'COVER: ₱ ' + aon1 + ' - PREMIUM: ₱ ' +aon2;
                  tow = numberWithCommas('<?php $number = round($paydetails->towing,2); echo number_format($number, 2, '.', ','); ?>');
                  data = numberWithCommas('<?php $number = round($paydetails->total,2); echo number_format($number, 2, '.', ','); ?>');
              @endif

            $('#insurance_company').val(inscomp);
            $('#client_name').val(fullname);
            $('#pinfo_gender').val(gender).change();
            $('#pinfo_bday').val(bday);
            $('#pinfo_cpnum_1').val(cp1);
            $('#pinfo_cpnum_2').val(cp2);
            $('#pinfo_tpnum').val(tel);
            $('#pinfo_mail').val(mail);
            $('#address').val(address);             
            $('#date_issued').val(formatDate('{{ $insaccount->created_at }}'));     
            $('#date_inception').val(formatDate2('{{ $insaccount->inception_date }}'));   
            $('#vehicle_type').val(type);     
            $('#vehicle_make').val(make);    
            $('#vehicle_model').val(model); 
            $('#vehicle_model_value').val('₱ '+value);
            $('#pa').val(pa);     
            $('#pd').val(pd);    
            $('#bi').val(bi); 
            $('#deductible').val('₱ ' + numberWithCommas(ded)); 
            $('#arlimit').val('₱ ' + numberWithCommas(ar)); 
            $('#towing').val('₱ ' + numberWithCommas(tow)); 
            $('#aon').val(aonz); 

            $('#total').html("<b>Total Net Premium: ₱ " + numberWithCommas(data) + "</b>");

            var bday = document.getElementById("pinfo_bday").value.split('-');
            var today = new Date();
            if(bday[0] != 0)
            {
                if((today.getMonth() + 1) >= bday[1])
                {       
                  document.getElementById("age").value = today.getFullYear() - bday[0] - 1;
                  if((today.getDate()) >= bday[2])
                    {
                        document.getElementById("age").value = today.getFullYear() - bday[0];
                    }
                }
                else
                {
                  document.getElementById("age").value = today.getFullYear() - bday[0] - 1;
                }
            }
            else
            {
                document.getElementById("age").value = "Invalid Input";
            } 
            
        });
    </script>

@endsection