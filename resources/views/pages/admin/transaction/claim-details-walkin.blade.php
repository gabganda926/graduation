@extends('pages.admin.master')

@section('title','Claims - Transaction| i-Insure')

@section('trans','active')

@section('transClaims','active')

@section('transClaimsWalkin','active')

@section('body')

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
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('admin/transaction/claim-request-walkin') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('admin/transaction/claim-request-walkin') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Claim Request Details</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="phDetails" class="list-group-item active" onclick="
                                    $('#phDetails').addClass('active');
                                    $('#phDet').show(800);
                                    $('#clDet').hide(800);
                                    $('#notifBy').hide(800);
                                    $('#upDoc').hide(800);
                                    $('#progress').hide(800);
                                    $('#claimDoc').removeClass('active');
                                    $('#prog').removeClass('active');
                                    $('#clDetails').removeClass('active');
                                    $('#notifiedBy').removeClass('active');
                                    $('#uploadDoc').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                1. Policy holder Details
                            </a>
                            <a href="javascript:void(0);" id="clDetails" class="list-group-item" onclick="
                                    $('#clDetails').addClass('active');
                                    $('#clDet').show(800);
                                    $('#phDet').hide(800);
                                    $('#notifBy').hide(800);
                                    $('#upDoc').hide(800);
                                    $('#progress').hide(800);
                                    $('#prog').removeClass('active');
                                    $('#claimDoc').removeClass('active');
                                    $('#phDetails').removeClass('active');
                                    $('#notifiedBy').removeClass('active');
                                    $('#uploadDoc').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">2. Details of Claim/Loss</a>
                            <a href="javascript:void(0);" id="notifiedBy" class="list-group-item" onclick="
                                    $('#notifiedBy').addClass('active');
                                    $('#notifBy').show(800);
                                    $('#phDet').hide(800);
                                    $('#clDet').hide(800);
                                    $('#upDoc').hide(800);
                                    $('#progress').hide(800);
                                    $('#claimDoc').removeClass('active');
                                    $('#prog').removeClass('active');
                                    $('#phDetails').removeClass('active');
                                    $('#clDetails').removeClass('active');
                                    $('#uploadDoc').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">3. Claim Notified By</a>
                            <a href="javascript:void(0);" id="claimDoc" class="list-group-item" onclick="
                                    $('#prog').addClass('active');
                                    $('#claimDoc').addClass('active');
                                    $('#progress').show(800);
                                    $('#phDet').hide(800);
                                    $('#notifBy').hide(800);
                                    $('#clDet').hide(800);
                                    $('#upDoc').hide(800);
                                    $('#uploadDoc').removeClass('active');
                                    $('#phDetails').removeClass('active');
                                    $('#notifiedBy').removeClass('active');
                                    $('#clDetails').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">4. Claim Documents/ Requirements</a>

                            <a href="javascript:void(0);" id="prog" class="list-group-item" onclick="
                                    $('#prog').addClass('active');
                                    $('#claimDoc').addClass('active');
                                    $('#progress').show(800);
                                    $('#phDet').hide(800);
                                    $('#notifBy').hide(800);
                                    $('#clDet').hide(800);
                                    $('#upDoc').hide(800);
                                    $('#uploadDoc').removeClass('active');
                                    $('#phDetails').removeClass('active');
                                    $('#notifiedBy').removeClass('active');
                                    $('#clDetails').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.1 Progress</a>
                            <a href="javascript:void(0);" id="uploadDoc" class="list-group-item" onclick="
                                    $('#uploadDoc').addClass('active');
                                    $('#claimDoc').addClass('active');
                                    $('#upDoc').show(800);
                                    $('#phDet').hide(800);
                                    $('#notifBy').hide(800);
                                    $('#clDet').hide(800);
                                    $('#progress').hide(800);
                                    $('#prog').removeClass('active');
                                    $('#phDetails').removeClass('active');
                                    $('#notifiedBy').removeClass('active');
                                    $('#clDetails').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.2 Upload Claim Documents/Requirements</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card" id="phDet">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/closed.png')}}" style="height: 50px; width: 50px;"> I. Policy Holder Details </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <input name="group1" type="radio" id="radio_1" onclick="
                                    $('#individualClient').show(800);
                                    $('#companyClient').hide(800);"/>
                                    <label for="radio_1">Individual</label>
                                    <input name="group1" type="radio" id="radio_2" onclick="
                                    $('#companyClient').show(800);
                                    $('#individualClient').hide(800);" />
                                    <label for="radio_2">Company</label>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Policy Number:</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" disabled>
                                        </div>
                                    </div>
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
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Birthday:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="date" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Middle Name:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Age:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="number" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Last Name:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Gender:</small></label>
                                                <input name="groupGen" type="radio" id="male" disabled class="with-gap" />
                                                <label for="male">Male</label>
                                                <input name="groupGen" type="radio" id="fem" disabled class="with-gap" />
                                                <label for="fem">Female</label>
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
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Cellphone Number (Alternate):</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Telephone Number:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Email:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="email" class="form-control" pattern="[A-Za-z'-]" disabled required>
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
                                                <select id = "aadd_region" name = "aadd_region" class="form-control show-tick" data-live-search="true" readonly="true">
                                                      <option selected value = "" style = "display: none;">-- Select Sales Agent --</option>
                                                            <option value = "I">12345</option>
                                                            <option value = "II">67890</option>
                                                            <option value = "III">111111</option>
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
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>District:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Street:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>City/Municipality:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Subdivision:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Province:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Barangay:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Region:</small></label>
                                                <select id = "aadd_region" name = "aadd_region" class="form-control show-tick" data-live-search="true" readonly="true">
                                                      <option selected value = "" style = "display: none;">-- Select Region --</option>
                                                            <option value = "I">12345</option>
                                                            <option value = "II">67890</option>
                                                            <option value = "III">111111</option>
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
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
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
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
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
                                                <label><small>Cellphone Number:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Cellphone Number (Alternate):</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Telephone Number:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Email:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="email" class="form-control" pattern="[A-Za-z'-]" disabled required>
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
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>District:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Street:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>City/Municipality:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Subdivision:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Province:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Barangay:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Region:</small></label>
                                                <select id = "aadd_region" name = "aadd_region" class="form-control show-tick" data-live-search="true" readonly="true">
                                                      <option selected value = "" style = "display: none;">-- Select Region --</option>
                                                            <option value = "I">12345</option>
                                                            <option value = "II">67890</option>
                                                            <option value = "III">111111</option>
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
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
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
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Birthday:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="date" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Middle Name:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Age:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="number" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Last Name:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Gender:</small></label>
                                                <input name="groupGen" type="radio" id="male" disabled class="with-gap" />
                                                <label for="male">Male</label>
                                                <input name="groupGen" type="radio" id="fem" disabled class="with-gap" />
                                                <label for="fem">Female</label>
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
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Cellphone Number (Alternate):</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Telephone Number:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Email:</small></label>
                                                <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="email" class="form-control" pattern="[A-Za-z'-]" disabled required>
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
                                                <select id = "aadd_region" name = "aadd_region" class="form-control show-tick" data-live-search="true" readonly="true">
                                                      <option selected value = "" style = "display: none;">-- Select Sales Agent --</option>
                                                            <option value = "I">12345</option>
                                                            <option value = "II">67890</option>
                                                            <option value = "III">111111</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div> <!-- END OF COMPANY -->
                        </div>
                    </div>

                     <div class="card" id="clDet">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/closed.png')}}" style="height: 50px; width: 50px;"> II. Details of Claim/Loss </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Date of Loss:</small></label>
                                            <div class="form-row show-inputbtns">
                                                    <input id = "apinfo_bday" name = "apinfo_bday" type="date" data-date-inline-picker="false" data-date-open-on-focus="true" class="form-control" disabled />
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Time of Loss:</small></label>
                                            <div class="form-row show-inputbtns">
                                                    <input id = "apinfo_bday" name = "apinfo_bday" type="time" data-date-inline-picker="false" data-date-open-on-focus="true" class="form-control" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-11">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Place of Loss:</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" disabled class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                              <label><small>Brief Description of the Circumstances of Loss:</small></label>
                                              <textarea id = "avehicle_type_desc" disabled name = "avehicle_type_desc" rows="6" class="form-control no-resize auto-growth"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="card" id="notifBy">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/closed.png')}}" style="height: 50px; width: 50px;"> III. Claim Notified by </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <input name="group2" type="radio" id="radio_11" disabled onclick="
                                    $('#repp').hide(800);" />
                                    <label for="radio_11">Policyholder</label>
                                </div>
                                <div class="col-md-4">
                                    <input name="group2" type="radio" id="radio_21" disabled onclick="
                                    $('#repp').show(800);"/>
                                    <label for="radio_21">Representative of Policy Holder</label>
                                </div>
                            </div>

                            <!-- PAG PINILI UNG REPRESENTATIVE, LALABAS TO: -->
                            <div id="repp">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Name:</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" disabled type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Relation to Policyholder:</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" disabled type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Contact Details:</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" disabled type="text" class="form-control" placeholder="Telephone">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>-</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" disabled type="text" class="form-control" placeholder="Cellphone Number">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>-</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" disabled placeholder="Cellphone Number (Alternate)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>-</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" type="email" class="form-control" disabled placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" id="progress">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/closed.png')}}" style="height: 50px; width: 50px;"> IV. Request Progress
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body" id="reqs">
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
                                    75%
                                </div>
                            </div>
                            <div class="body table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Requirement</th>
                                            <th class="col-md-1">Files</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photographs of the damaged vehicle </td>
                                            <td><input type="checkbox" id="md_checkbox_2" class="chk-col-pink" checked disabled="disable" />
                                                <label for="md_checkbox_2"></label></td>
                                        </tr>
                                        <tr>
                                            <td>Original Car Registration & Official Receipt </td>
                                            <td><input type="checkbox" id="md_checkbox_3" class="chk-col-pink" checked disabled="disable" />
                                                <label for="md_checkbox_3"></label></td>
                                        </tr>
                                        <tr>
                                            <td>Vehicle Sales Invoice & Delivery Receipt </td>
                                            <td><input type="checkbox" id="md_checkbox_4" class="chk-col-pink" checked disabled="disable" />
                                                <label for="md_checkbox_4"></label></td>
                                        </tr>
                                        <tr>
                                            <td>Original and duplicate keys </td>
                                            <td><input type="checkbox" id="md_checkbox_5" class="chk-col-pink" disabled="disable" />
                                                <label for="md_checkbox_5"></label></td>
                                        </tr>
                                        <tr>
                                            <td>Vehicle Manual and Warranty Booklet </td>
                                            <td><input type="checkbox" id="md_checkbox_6" class="chk-col-pink" disabled="disable" />
                                                <label for="md_checkbox_6"></label></td>
                                        </tr>
                                    </tbody>
                                </table>   
                            </div>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->

                     <div class="card" id="upDoc">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/closed.png')}}" style="height: 50px; width: 50px;"> IV. Upload Claim Documents/Requirements 
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <li>
                                        <button id="upDate" type="button" class="btn bg-green waves-effect" onclick="
                                        $('#saveCh').show(200);
                                        $('#upDate').hide(200);
                                        $('#viewF').hide(200);
                                        $('#field').show(200);">
                                            <i class="material-icons">update</i>
                                            <span>Update</span>
                                        </button>
                                    </li>
                                </li>
                            </ul></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body" id="filebod">
                            <div class="body table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th class="col-md-7">Requirement</th>
                                            <th class="col-md-5">Files</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photographs of the damaged vehicle </td>
                                            <td><button id="viewF" class="btn btn-primary btn-block waves-effect" data-toggle="modal" data-target="">VIEW</button>
                                            <form class="input-append">
                                                <div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="file"/><button id="b1" class="btn add-more" type="button">+ Add more File</button><br/></div>
                                            </form></td>
                                        </tr>
                                    </tbody>
                                </table>   
                            </div>

                            <button id="saveCh" type="button" class="btn bg-green btn-block waves-effect" onclick="
                            $('#upDate').show(200);
                            $('#saveCh').hide(200);
                            $('#viewF').show(200);
                            $('#field').hide(200);">SAVE CHANGES</button>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div> 
        </div>
    </section>

    <!-- CHOOSE INST MODAL -->
            <div class="modal fade" id="ugh" role="dialog">
                <div class="modal-dialog animated zoomInLeft active" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form id="add" name = "add" action = "type/submit" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row clearfix">
                                    <br/><br/><label>Choose claim type first</label>
                                    <select id = "vehicle_type" name = "vehicle_type" class="form-control show-tick" data-live-search="true" required="">
                                    <option selected value = "" style = "display: none;">---</option>
                                    <option>Total Loss</option>
                                    <option>Carnap</option>
                                    <option>Iba pang nasa maintenance</option>
                                    </select>
                                </div>
                                <br/><br/><br/>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "time" name = "time" type="text" class="form-control" pattern="[A-Za-z'-]">
                                </div>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button class="btn btn-primary btn-block waves-effect" type="submit" data-dismiss="modal">CONTINUE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- #END# ADD INST MODAL -->

    <script type="text/javascript">
        window.onload = function() {
          document.getElementById('individualClient').style.display = 'none';
          document.getElementById('companyClient').style.display = 'none';
          document.getElementById('clDet').style.display = 'none';
          document.getElementById('notifBy').style.display = 'none';
          document.getElementById('upDoc').style.display = 'none';
          document.getElementById('repp').style.display = 'none';
          document.getElementById('saveCh').style.display = 'none';
          document.getElementById('field').style.display = 'none';
          document.getElementById('progress').style.display = 'none';
        };
    </script>

    <script>
        $(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" id="field' + next + '" name="field' + next + '" type="file">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >- Remove</button></div><div id="field"><br/>';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                $("br").remove();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });  
});
    </script>

@endsection
