@extends('pages.accounting-staff.master')

@section('title','Renewal - Transaction | i-Insure')

@section('transIns','active')

@section('transInsInd','active')

@section('body')

    <section class="content">
    <h2 style="text-align: center"> Welcome to <b style="color: orange;"> i-Insure </b><br/>
    <label><small>July 20, 2017 - Thursday</small></label><br/>
    <label><small>09:23:21 AM</small></label>
    </h2>
    <br/>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('/accounting-staff/transaction/insurance-individual') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('/accounting-staff/transaction/insurance-individual') }}"><i class="material-icons">home</i> Insurance Accounts (Individual)</a></li>
                        <li><a href="{{ URL::asset('') }}"><i class="material-icons">fiber_new</i> Renew Account</a></li>
                    </ol>
                </div>
            </div>
            <div class="row clearfix">
                <!-- QUOTATION DETAILS -->
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                                <div class="list-group">
                                    <a href="javascript:void(0);" id="pDetails" class="list-group-item">
                                        <img src="{{ URL::asset ('images/icons/view-bill.png')}}" style="height: 50px; width: 50px;"> <b> RENEW ACCOUNT </b>
                                    </a>
                                    <a href="javascript:void(0);" id="basicDetails" class="list-group-item active">
                                        1. Basic Details
                                    </a>
                                    <a href="javascript:void(0);" id="vehicleDetails" class="list-group-item disabled">
                                        2. Vehicle Details
                                    </a>
                                    <a href="javascript:void(0);" id="quoteDetails" class="list-group-item disabled">3. Insurance Details</a>
                                    <a href="javascript:void(0);" id="paym" class="list-group-item disabled">4. Payment Details</a>
                                    <a href="javascript:void(0);" id="reviewDetails" class="list-group-item disabled">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.1 Review Coverage</a>
                                    <a href="javascript:void(0);" id="paymentDetails" class="list-group-item disabled">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.2 Mode of Payment</a>
                                    <a href="javascript:void(0);" id="fin" class="list-group-item disabled">5. Finish</a>
                                </div>
                            </div>
                </div>
                <!-- END QUOTATION DETAILS -->
                <!-- BREAKDOWN -->
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card" id="bDet">
                        <div class="header">
                        <h3 style="text-align: center"><img src="{{ URL::asset ('images/icons/quotation.png')}}" style="height: 50px; width: 50px;"> Basic Details </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                  <div class="form-group form-float">
                                    <label><small>Assured Name :</small></label>
                                        <select id = "client_individual" name = "client_individual" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_individual').valid()">
                                          <option selected value = "" style = "display: none;">-- Select Client --</option>
                                               <option value = "" data-id = ""></option>
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

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <label><small>Insurance Company: </small></label>
                                            <select id = "indi_insurance_company" name = "indi_insurance_company" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_individual').valid()">
                                            <option selected value = "" style = "display: none;">-- Select Company --</option>
                                               <option value = ""></option>
                                            </select>        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                    <label><small>Policy Number :</small></label>
                                    <select id = "indi_policy_number" name = "indi_policy_number" class="form-control show-tick" data-live-search="true" onchange="$('#form_client_individual').valid()">
                                      <option selected value = "" style = "display: none;">-- Select Policy number --</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                    <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Date Issued: </small></label>
                                            <div class="form-row show-inputbtns">
                                                <input id = "indi_date_issued" name = "indi_date_issued" type="date" class="form-control todate" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    </div>  
                            </div> <!-- end of rowclearfix --><br/><br/>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <button type="button" id="next1"  class="btn btn-block bg-teal waves-effect left" onclick=" 
                                    $(this).parents('#bDet').hide(800);
                                    $('#vDet').show(800);
                                    $('#basicDetails').removeClass('active');
                                    $('#vehicleDetails').removeClass('disabled');
                                    $('#vehicleDetails').addClass('active');
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

                    <div class="card" id="vDet">
                        <div class="header">
                        <h3 style="text-align: center"><img src="{{ URL::asset ('images/icons/quotation.png')}}" style="height: 50px; width: 50px;"> Vehicle Details </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Vehicle Type:</small></label>
                                            <select id = "aadd_region" name = "aadd_region" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" style = "display: none;">-- Select Vehicle Type --</option>
                                                        <option value = "I">12345</option>
                                                        <option value = "II">67890</option>
                                                        <option value = "III">111111</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>If others, specify:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Plate Number:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Year Model:</small></label>
                                            <select id = "aadd_region" name = "aadd_region" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" style = "display: none;">-- Select Year Model --</option>
                                                        <option value = "I">12345</option>
                                                        <option value = "II">67890</option>
                                                        <option value = "III">111111</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>If others, specify:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Engine Number:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Vehicle Make:</small></label>
                                            <select id = "aadd_region" name = "aadd_region" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" style = "display: none;">-- Select Vehicle Make --</option>
                                                        <option value = "I">12345</option>
                                                        <option value = "II">67890</option>
                                                        <option value = "III">111111</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>If others, specify:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Chassis Number:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Vehicle Model:</small></label>
                                            <select id = "aadd_region" name = "aadd_region" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" style = "display: none;">-- Select Vehicle Model --</option>
                                                        <option value = "I">12345</option>
                                                        <option value = "II">67890</option>
                                                        <option value = "III">111111</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>If others, specify:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>MV File Number:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Vehicle's Market Value:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="number" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Color:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <button type="button" id="next1"  class="btn btn-block bg-blue waves-effect left" onclick=" 
                                    $(this).parents('#vDet').hide(800);
                                    $('#bDet').show(800);
                                    $('#basicDetails').addClass('active');
                                    $('#vehicleDetails').removeClass('active');
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
                                    $(this).parents('#vDet').hide(800);
                                    $('#qDet').show(800);
                                    $('#vehicleDetails').removeClass('active');
                                    $('#quoteDetails').removeClass('disabled');
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
                        </div> <!-- END OF BODY -->
                    </div> <!-- END OF CARD -->

                    <div class="card" id="qDet">
                        <div class="header">
                        <h3 style="text-align: center"><img src="{{ URL::asset ('images/icons/quotation.png')}}" style="height: 50px; width: 50px;"> Insurance Details </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <h4>Comprehensive Insurance</h4>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Total Net Premium:</small></label>
                                            <b><input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required></b>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Basic Premium:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Value Added Tax (VAT):</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Documentary Stamp Tax (DST):</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Local Government Tax:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Deductible:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
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
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Third Property Damage:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Third Party Bodily Injury:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Personal Accident:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Acts of Nature:</small></label>
                                            <b><input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required></b>
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
                                    $(this).parents('#qDet').hide(800);
                                    $('#cDet').show(800);
                                    $('#quoteDetails').removeClass('active');
                                    $('#paym').removeClass('disabled');
                                    $('#reviewDetails').removeClass('disabled');
                                    $('#paym').addClass('active');
                                    $('#reviewDetails').addClass('active');
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
                        <h3 style="text-align: center"><img src="{{ URL::asset ('images/icons/quotation.png')}}" style="height: 50px; width: 50px;"> Review Coverage </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
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
                                                    </td>
                                                    <td id = "lad_premium"></td>
                                                </tr>

                                                <tr>
                                                    <td>Third Party Property Damage</td>
                                                    <td id = "tppd_limit">
                                                    </td>
                                                    <td id = "tppd_premium"></td>
                                                </tr>

                                                <tr>
                                                    <td>Personal Accident (3 persons - 10,000)</td>
                                                    <td id = "pa_limit">
                                                    </td>
                                                    <td id = "pa_premium"></td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td>Documentary Stamps</td>
                                                    <td></td>
                                                    <td id = "ds_premium">₱ 3,772.45</td>
                                                </tr>

                                                <tr>
                                                    <td>VAT</td>
                                                    <td></td>
                                                    <td id = "vat_premium">₱ 3,621.56</td>
                                                </tr>

                                                <tr>
                                                    <td>Local Government Tax</td>
                                                    <td></td>
                                                    <td id = "lgt_premium">₱ 60.36</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Total Net Premium</b></td>
                                                    <td></td>
                                                    <td id = "total_premium"><b style="color: red">
                                                    </b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <button type="button" id="next1"  class="btn btn-block bg-blue waves-effect left" onclick=" 
                                    $(this).parents('#cDet').hide(800);
                                    $('#qDet').show(800);
                                    $('#quoteDetails').addClass('active');
                                    $('#reviewDetails').removeClass('active');
                                    $('#paym').removeClass('active');
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
                                    $(this).parents('#cDet').hide(800);
                                    $('#mPayment').show(800);
                                    $('#reviewDetails').removeClass('active');
                                    $('#paymentDetails').removeClass('disabled');
                                    $('#paymentDetails').addClass('active');
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

                    <div class="card" id="mPayment">
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
                                                <div class="col-md-10">
                                                    <div class="form-group form-float">
                                                        <div class="form-line focused success">
                                                            <label><small>Check Voucher</small></label>
                                                            <input id = "check_voucher" name = "check_voucher" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="body">
                                                    <div class="row clearfix">
                                                        <div class="col-md-6">
                                                          <div class="form-group form-float">
                                                              <label><small>Bank :</small></label>
                                                                  <select id = "installment_bank" name = "installment_bank" class="form-control selectpicker show-tick" data-live-search="true">
                                                                    <option selected value = "" style = "display: none;">-- Select Bank --</option>
                                                                          <option value = ""></option>
                                                                  </select>
                                                          </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                          <div class="form-group form-float">
                                                              <label><small>Installment Type :</small></label>
                                                                  <select id = "installment_type" name = "installment_type" class="form-control selectpicker show-tick" data-live-search="true" >
                                                                    <option selected value = "" style = "display: none;">-- Select Installment Type --</option>
                                                                      <option value = ""></option>
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
                                                          $(this).parents('#mPayment').hide(800);
                                                            $('#cDet').show(800);
                                                            $('#paymentDetails').removeClass('active');
                                                            $('#reviewDetails').addClass('active');
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
                                                          $(this).parents('#mPayment').hide(800);
                                                          $('#tos').show(800);
                                                          $('#paymentDetails').removeClass('active');
                                                          $('#paym').removeClass('active');
                                                          $('#fin').removeClass('disabled');
                                                          $('#fin').addClass('active');
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

                    <div class="card" id="tos">
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
                                    $(this).parents('#tos').hide(800);
                                    $('#mPayment').show(800);
                                    $('#paym').addClass('active');
                                    $('#paymentDetails').addClass('active');
                                    $('#fin').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                        <span style="font-size: 15px;"> PREVIOUS</span>
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" id="next1"  class="btn btn-block bg-green waves-effect left">
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
                                                        <b>Third Property Damage</b>
                                                    </div>
                                                    <div class="col col-xs-3">
                                                        <label for="1">Coverage: </label>
                                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col col-xs-4">
                                                        <label for="1">Vehicle Class: </label>
                                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
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
                                                        <label for="1">Coverage: </label>
                                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col col-xs-4">
                                                        <label for="1">Vehicle Class: </label>
                                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
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
                                                    <div class="col col-xs-3">
                                                        <label for="1">Coverage: </label>
                                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col col-xs-4">
                                                        <label for="1">Number of Persons: </label>
                                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
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
    </section>

    <script type="text/javascript">
        window.onload = function() {
          document.getElementById('qDet').style.display = 'none';
          document.getElementById('cDet').style.display = 'none';
          document.getElementById('tos').style.display = 'none';
          document.getElementById('mPayment').style.display = 'none';
          document.getElementById('vDet').style.display = 'none';
        };
    </script>

@endsection