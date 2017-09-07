@extends('pages.accounting-staff.master')

@section('title','Insurance Accounts - Transaction| i-Insure')

@section('trans','active')

@section('transIns','active')

@section('transInsComp','active')

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
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('accounting-staff/transaction/insurance-company') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('accounting-staff/transaction/insurance-company') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">account_circle</i> Insurance Account Details</a></li>
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
                              <h3><small><b>COMPANY CLIENT DETAILS</b></small></h3>
                                    <div class="row clearfix">
                                        <br/><br/>
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label><small>Company Name:</small></label>
                                                    <input id = "company_name" name = "company_name" type="text" class="form-control" readonly="true" value="{{$client->comp_name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                              <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Email:</small></label>
                                                    <input id = "email" name = "email" type="text" class="form-control" readonly="true" value="{{$client->comp_email}}">
                                                </div>
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Telephone Number:</small></label>
                                                    <input id = "telephone_num" name = "telephone_num" type="text" class="form-control" readonly="true" value="{{$client->comp_telnum}}" readonly="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                              <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Fax Number:</small></label>
                                                    <input id = "fax_num" name = "fax_num" type="text" class="form-control" readonly="true" value="{{$client->comp_faxnum}}">
                                                </div>
                                              </div>
                                        </div>                  
                                    </div> <!-- end of rowclearfix -->
                                <h3> <small><b>COMPANY ADDRESS</b></small></h3>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Complete Address: </small></label>
                                                    <input id = "address" name = "address" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              <h3><small><b>CONTACT PERSON</b></small></h3>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div>
                                                <div class="body" align="center">
                                                    <div class="fallback">
                                                        <img id="contact_img" src="#" alt="your image" style="height: 210px; width: 215px; border-style: solid; border-width: 2px;">
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
                                                    <label><small>Name:</small></label>
                                                    <input id = "contact_name" name = "contact_name" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                            <label><small>Gender :</small></label>
                                                <select id = "gender" name = "gender" class="form-control show-tick">
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
                                                    <input id = "age" name = "age" type="text" class="form-control" readonly="true"   readonly="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                              <div class="form-group form-float">
                                                <div class="form-line"
                                                    <label><small>Birthdate:</small></label>
                                                    <div class="form-row show-inputbtns">
                                                            <input id = "bday" name = "bday" type="date" data-date-inline-picker="false" data-date-open-on-focus="true" class="form-control" readonly />
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
                                                    <input id = "cont_cpnum" name = "cont_cpnum" type="text" class="form-control"  readonly="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Cellphone Number(Alternate):</small></label>
                                                    <input id = "cont_cpnum_2" name = "cont_cpnum_2" type="text" class="form-control"  readonly="true">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Tel. Num.:</small></label>
                                                    <input id = "cont_tpnum" name = "cont_tpnum" type="text" class="form-control"  readonly="true">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>E-mail:</small></label>
                                                    <input id = "cont_email" name = "apinfo_mail" type="email" class="form-control"  readonly="true">
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
                                                    <input id = "vehicle_value" name = "vehicle_model_value" type="text" class="form-control"  readonly="true" value="">
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
                                                    <input id = "insurance_comp" name = "insurance_company" type="text" class="form-control" readonly="true" value="">
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
                                                    <input id = "inception_date" name = "date_inception" type="text" class="form-control" readonly="true">
                                                </div>
                                            </div>
                                        </div>                
                                    </div> <!-- end of rowclearfix -->
                                    <h3> <small><b>PREMIUMS</b></small></h3>
                                    <div class="row clearfix">
                                        <br/><br/>
                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Deductible: </small></label>
                                                    <input id = "deductible" name = "deductible" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Authorized Repair Limit: </small></label>
                                                    <input id = "arl" name = "arl" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Towing: </small></label>
                                                    <input id = "towing" name = "towing" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Bodily Injury Coverage: </small></label>
                                                    <input id = "bi" name = "bi" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Premium: </small></label>
                                                    <input id = "bi_premium" name = "bi_premium" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Property Damage Coverage: </small></label>
                                                    <input id = "pd" name = "pd" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Premium: </small></label>
                                                    <input id = "pd_premium" name = "pd_premium" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Personal Accident: </small></label>
                                                    <input id = "pa" name = "pa" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>   

                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Premium: </small></label>
                                                    <input id = "pa_premium" name = "pa_premium" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>           
                                    </div> <!-- end of rowclearfix --> 

                                    <div class="row clearfix">
                                        <br/><br/>
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label><small>Own Damage/Theft Coverage: </small></label>
                                                        <input id = "odt" name = "odt" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Premium: </small></label>
                                                    <input id = "odt_premium" name = "odt_premium" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Act of Nature: </small></label>
                                                    <input id = "aon" name = "aon" type="text" class="form-control" readonly="true" value="">
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="col-md-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                <label><small>Premium: </small></label>
                                                    <input id = "aon_premium" name = "aon_premium" type="text" class="form-control" readonly="true" value="">
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

            @foreach($contact as $cont)
             @foreach($pInfo as $info)
              @if($cont->cPerson_ID == $client->comp_cperson_ID)
               @if($info->pinfo_ID == $cont->personal_info_ID)
               fullname = '{{ $info->pinfo_last_name.', '.$info->pinfo_first_name.' '.$info->pinfo_middle_name }}';
               gender = '{{$info->pinfo_gender}}';
               bday = '{{ $info->pinfo_age }}';
               cp1 = '{{ $info->pinfo_cpnum_1 }}';
               cp2 = '{{ $info->pinfo_cpnum_2 }}';
               tel = '{{ $info->pinfo_tpnum }}';
               mail = '{{ $info->pinfo_mail }}';
               image = '/image/contact_person/{{$info->pinfo_picture}}';
               @endif
              @endif
             @endforeach
            @endforeach

            @foreach($add as $address)
             @if($address->add_ID == $client->comp_add_ID)
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

            @foreach($vtype as $type)
             @if($insaccount->vehicle_type == $type->vehicle_type_ID)
              type = '{{$type->vehicle_type_name}}';
             @endif
            @endforeach

            @foreach($vmake as $make)
             @if($insaccount->vehicle_make == $make->vehicle_make_ID)
              make = '{{$make->vehicle_make_name}}';
             @endif
            @endforeach

            @foreach($vmod as $mod)
             @if($insaccount->vehicle_model == $mod->vehicle_model_ID)
              model = '{{$mod->vehicle_year.' '.$mod->vehicle_model_name}}';
              value = numberWithCommas('{{$mod->vehicle_value}}');
             @endif
            @endforeach

            @foreach($ppa as $pa)
             @if($pa->premiumPA_ID == $paydetails->personal_accident_ID)
              pa = parseInt('{{$pa->insuranceCover}}') + parseInt('{{$pa->passengerCover}}') + parseInt('{{$pa->mrCover}}');
             @endif
            @endforeach

            @foreach($pdg as $dg)
             @if($dg->premiumDG_ID == $paydetails->bodily_injury_ID)
              @if($paydetails->vehicle_class == 1)
              bi = '{{$dg->privateCar}}';
              @endif
              @if($paydetails->vehicle_class == 2)
              bi = '{{$dg->cv_Light}}';
              @endif
              @if($paydetails->vehicle_class == 3)
              bi = '{{$dg->cv_Heavy}}';
              @endif
             @endif
             @if($dg->premiumDG_ID == $paydetails->property_damage_ID)
              @if($paydetails->vehicle_class == 1)
              pd = '{{$dg->privateCar}}';
              @endif
              @if($paydetails->vehicle_class == 2)
              pd = '{{$dg->cv_Light}}';
              @endif
              @if($paydetails->vehicle_class == 3)
              pd = '{{$dg->cv_Heavy}}';
              @endif
             @endif
            @endforeach

            $('#insurance_comp').val(inscomp);
            $('#contact_img').attr('src',image);
            $('#contact_name').val(fullname);
            $('#gender').val(gender).change();
            $('#bday').val(bday);
            $('#cont_cpnum').val(cp1);
            $('#cont_cpnum_2').val(cp2);
            $('#cont_tpnum').val(tel);
            $('#cont_email').val(mail);
            $('#address').val(address);             
            $('#date_issued').val(formatDate('{{ $insaccount->created_at }}'));     
            $('#inception_date').val(formatDate2('{{ $insaccount->inception_date }}'));   
            $('#vehicle_type').val(type);     
            $('#vehicle_make').val(make);    
            $('#vehicle_model').val(model); 
            $('#vehicle_value').val('₱ '+value);
            $('#pa').val('₱ ' + numberWithCommas(pa));     
            $('#pd').val('₱ ' + numberWithCommas(pd));    
            $('#bi').val('₱ ' + numberWithCommas(bi)); 

            var bday = document.getElementById("bday").value.split('-');
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

            if($('#pa').val())
            {
                data = data + parseFloat($('#pa').val().replace(/[^0-9\.]/g,'')); 
            }
            if($('#bi').val())
            {
                data = data + parseFloat($('#bi').val().replace(/[^0-9\.]/g,'')); 
            }
            if($('#pd').val())
            {
                data = data + parseFloat($('#pd').val().replace(/[^0-9\.]/g,'')); 
            }
            
            var ins = $('#insurance_company').val();

            if(ins == 1)
                $('#deductible').val('₱ '+numberWithCommas(3100));
            if(ins == 2)
                $('#deductible').val('₱ '+numberWithCommas(1000));
            if(ins == 3)
                $('#deductible').val('₱ '+numberWithCommas(3000));
            if(ins == 4)
                $('#deductible').val('₱ '+numberWithCommas(2000));

            $('#towing').val('₱ '+numberWithCommas(100));

            $('#arl').val('₱ '+numberWithCommas(parseFloat($('#deductible').val().replace(/[^0-9\.]/g,''))+parseFloat($('#towing').val().replace(/[^0-9\.]/g,''))))

            var coverage = parseFloat($('#vehicle_model_value').val().replace(/[^0-9\.]/g,'')) * .2;

            // var grosspremium = parseFloat($('#indi_vmodel_value').val().replace(/[^0-9\.]/g,'')) * .013;

            $('#aon').val('₱ '+numberWithCommas(Math.round(coverage * 100)/100));
            $('#odt').val('₱ '+numberWithCommas(Math.round(coverage * 100)/100));

            if(ins == 1)
                $('#aon_premium').val('₱ '+numberWithCommas(coverage * 0.02));
            if(ins == 2)
            {
                $('#aon').val('₱ 0');
                $('#aon_premium').val('₱ 0');
            }
            if(ins == 3)
                $('#aon_premium').val('₱ '+numberWithCommas(coverage * 0.005));
            if(ins == 4)
                $('#aon_premium').val('₱ '+numberWithCommas(coverage * 0.005));

            var odt = parseFloat(coverage * .013);
            // Math.abs((((parseFloat($('#indi_aon').val().replace(/[^0-9\.]/g,'')) + parseFloat($('#indi_bi_premium').val().replace(/[^0-9\.]/g,'')) + parseFloat($('#indi_pd_premium').val().replace(/[^0-9\.]/g,'')) + parseFloat($('#indi_pa_premium').val().replace(/[^0-9\.]/g,''))) * 1.2470) - grosspremium) / 1.2470)

             $('#odt_premium').val('₱ '+numberWithCommas(Math.round(odt * 100)/100));

            var basicpremium = (parseFloat($('#aon_premium').val().replace(/[^0-9\.]/g,'')) + parseFloat($('#bi_premium').val().replace(/[^0-9\.]/g,'')) + parseFloat($('#pd_premium').val().replace(/[^0-9\.]/g,'')) + parseFloat($('#pa_premium').val().replace(/[^0-9\.]/g,''))) + odt;
            var vat = basicpremium * .125;
            var stamp = basicpremium * .12;
            var rounded = Math.ceil((basicpremium + vat + stamp)/100)*100;

            var lgt = rounded - (basicpremium + vat + stamp);

            var total = basicpremium + vat + stamp + lgt;
            $('#total').html("<b>Total Net Premium: ₱ " + numberWithCommas(total) + "</b>");
            
        });
    </script>

@endsection