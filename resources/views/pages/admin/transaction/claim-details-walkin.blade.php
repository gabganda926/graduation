@extends('pages.admin.master')

@section('title','Claims - Transaction | i-Insure')

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
                                    <input name="group1" type="radio" id="radio_ind" disabled="disable" onclick="
                                    $('#individualClient').show(800);
                                    $('#companyClient').hide(800);"/>
                                    <label for="radio_ind">Individual</label>
                                    <input name="group1" type="radio" id="radio_comp" disabled="disable" onclick="
                                    $('#companyClient').show(800);
                                    $('#individualClient').hide(800);" />
                                    <label for="radio_comp">Company</label>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Policy Number:</small></label>
                                            <input id = "c_pno" name = "c_pno" type="text" class="form-control" disabled>
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
                                                <input id = "fname" name = "fname" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Birthday:</small></label>
                                                <input id = "bday" name = "bday" type="date" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Middle Name:</small></label>
                                                <input id = "mname" name = "mname" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Age:</small></label>
                                                <input id = "age" name = "age" type="number" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Last Name:</small></label>
                                                <input id = "lname" name = "lname" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Gender:</small></label>
                                                <input name="groupGen" type="radio" id="male" class="with-gap"  disabled="disable"/>
                                                <label for="male">Male</label>
                                                <input name="groupGen" type="radio" id="fem" class="with-gap"  disabled="disable"/>
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
                                                <input id = "cpno" name = "cpno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Cellphone Number (Alternate):</small></label>
                                                <input id = "cpno_1" name = "cpno_1" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Telephone Number:</small></label>
                                                <input id = "telno" name = "telno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Email:</small></label>
                                                <input id = "email" name = "email" type="email" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Sales Agent:</small></label>
                                                <input id = "agent" name = "agent" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
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
                                                <input id = "blk" name = "blk" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>District:</small></label>
                                                <input id = "dist" name = "dist" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Street:</small></label>
                                                <input id = "street" name = "street" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>City/Municipality:</small></label>
                                                <input id = "city" name = "city" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Subdivision:</small></label>
                                                <input id = "subd" name = "subd" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Province:</small></label>
                                                <input id = "prov" name = "prov" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Barangay:</small></label>
                                                <input id = "brgy" name = "brgy" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Region:</small></label>
                                                <input id = "region" name = "region" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Zip Code:</small></label>
                                                <input id = "zipcode" name = "zipcode" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
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
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Company Name:</small></label>
                                                <input id = "compname" name = "compname" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Fax Number:</small></label>
                                                <input id = "comp_fax" name = "comp_fax" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Telephone Number:</small></label>
                                                <input id = "comp_telnum" name = "comp_telnum" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Email:</small></label>
                                                <input id = "comp_email" name = "comp_email" type="email" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
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
                                                <input id = "comp_blk" name = "comp_blk" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>District:</small></label>
                                                <input id = "comp_dist" name = "comp_dist" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Street:</small></label>
                                                <input id = "comp_street" name = "comp_street" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>City/Municipality:</small></label>
                                                <input id = "comp_city" name = "comp_city" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Subdivision:</small></label>
                                                <input id = "comp_subd" name = "comp_subd" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Province:</small></label>
                                                <input id = "comp_prov" name = "comp_prov" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Barangay:</small></label>
                                                <input id = "comp_brgy" name = "comp_brgy" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Region:</small></label>
                                                <input id = "comp_region" name = "comp_region" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Zip Code:</small></label>
                                                <input id = "comp_zipcode" name = "comp_zipcode" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
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
                                                <input id = "cont_fname" name = "cont_fname" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Birthday:</small></label>
                                                <input id = "cont_bday" name = "cont_bday" type="date" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Middle Name:</small></label>
                                                <input id = "cont_mname" name = "cont_mname" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Age:</small></label>
                                                <input id = "cont_age" name = "cont_age" type="number" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Last Name:</small></label>
                                                <input id = "cont_lname" name = "cont_lname" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Gender:</small></label>
                                                <input name="cont_groupGen" type="radio" id="cont_male" class="with-gap"  disabled="disable"/>
                                                <label for="cont_male">Male</label>
                                                <input name="cont_groupGen" type="radio" id="cont_fem" class="with-gap"  disabled="disable"/>
                                                <label for="cont_fem">Female</label>
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
                                                <input id = "cont_cpno" name = "cont_cpno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Cellphone Number (Alternate):</small></label>
                                                <input id = "cont_cpno_1" name = "cont_cpno_1" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Telephone Number:</small></label>
                                                <input id = "cont_telno" name = "cont_telno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Email:</small></label>
                                                <input id = "cont_email" name = "cont_email" type="email" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Sales Agent:</small></label>
                                                <input id = "comp_agent" name = "comp_agent" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
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
                                                    <input id = "date_incident" name = "date_incident" type="date" data-date-inline-picker="false" data-date-open-on-focus="true" class="form-control" disabled />
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Time of Loss:</small></label>
                                            <div class="form-row show-inputbtns">
                                                    <input id = "time_incident" name = "time_incident" type="time" data-date-inline-picker="false" data-date-open-on-focus="true" class="form-control" disabled />
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
                                            <input id = "place_incident" name = "place_incident" type="text" disabled class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                              <label><small>Brief Description of the Circumstances of Loss:</small></label>
                                              <textarea id = "desc_incident" disabled name = "desc_incident" rows="6" class="form-control no-resize auto-growth"></textarea>
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
                                    <input name="group2" type="radio" id="radio_phold" disabled onclick="
                                    $('#repp').hide(800);" />
                                    <label for="radio_11">Policyholder</label>
                                </div>
                                <div class="col-md-4">
                                    <input name="group2" type="radio" id="radio_rep" disabled onclick="
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
                                            <input id = "rep_name" name = "rep_name" disabled type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Relation to Policyholder:</small></label>
                                            <input id = "rep_rel" name = "rep_rel" disabled type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Contact Details:</small></label>
                                            <input id = "rep_telno" name = "rep_telno" disabled type="text" class="form-control" placeholder="Telephone">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>-</small></label>
                                            <input id = "rep_cpno" name = "rep_cpno" disabled type="text" class="form-control" placeholder="Cellphone Number">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>-</small></label>
                                            <input id = "rep_cpno_1" name = "rep_cpno_1" type="text" class="form-control" disabled placeholder="Cellphone Number (Alternate)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>-</small></label>
                                            <input id = "rep_email" name = "rep_email" type="email" class="form-control" disabled placeholder="Email">
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
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="claimtypez"><small>Claim Type: </small></label> <!-- AUTO GENERATED -->
                                    <small><b><input type="text" id="claimtypez" class="form-control" readonly="true" style="font-size: 20px"></b></small>
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

    <script type="text/javascript">

        function show_Ind()
        {
            $("#radio_ind").prop("checked", true);
            $("#radio_comp").prop("checked", false);
            $("#pdetNext").prop("disabled", false);
            $('#individualClient').show(800);
            $('#companyClient').hide(800);
        }

        function show_Comp()
        {
            $("#radio_ind").prop("checked", false);
            $("#radio_comp").prop("checked", true);
            $("#pdetNext").prop("disabled", false);
            $('#individualClient').hide(800);
            $('#companyClient').show(800);
        }

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

          @foreach($creq as $claims)
            @foreach($cliacc as $ins)
                @if($creq->account_ID == $ins->account_ID)
                    $('#c_pno').val('{{$ins->policy_number}}');
                    $('#date_incident').val('{{$creq->lossDate}}');
                    $('#time_incident').val('{{$creq->lossDate}}');
                    $('#place_incident').val('{{$creq->placeOfLoss}}');
                    $('#desc_incident').val('{{$creq->description}}');
                    @if($creq->notifiedByType == 1)
                        $("#radio_phold").prop("checked", true);
                        $("#radio_rep").prop("checked", false);
                    @endif
                    @if($creq->notifiedByType == 1)
                        $("#radio_phold").prop("checked", false);
                        $("#radio_rep").prop("checked", true);
                        $('#repp').show(800);
                        @foreach($cnotif as $rep)
                            @if($creq->notifierID == $rep->notifierID)
                                $('#rep_name').val('{{$rep->notifier_Name}}');
                                $('#rep_rel').val('{{$rep->notifier_Relation}}');
                                $('#rep_telno').val('{{$rep->notifier_telnum}}');
                                $('#rep_cpno').val('{{$rep->notifier_cell_1}}');
                                $('#rep_cpno_1').val('{{$rep->notifier_cell_2}}');
                                $('#rep_email').val('{{$rep->notifier_email}}');
                            @endif
                        @endforeach
                    @endif
                    @foreach($ctype as $ct)
                        @if($creq->claimType_ID == $ct->claimType_ID)
                            $('#claimtypez').val('{{$ct->claimType}}');
                        @endif
                    @endforeach
                        @foreach($clist as $list)
                            @if($list->client_type == 1)
                                @if($ins->client_ID == $list->client_ID)
                                    @foreach($cli as $client)
                                        @if($list->client_ID == $client->client_ID)
                                            @foreach($pinfo as $inf)
                                                @if($client->personal_info_ID == $inf->pinfo_ID)
                                                    show_Ind();
                                                    $('#fname').val('{{ $inf->pinfo_first_name }}');
                                                    $('#bday').val('{{ $inf->pinfo_age }}');
                                                    $('#mname').val('{{ $inf->pinfo_middle_name }}');
                                                    $('#lname').val('{{ $inf->pinfo_last_name }}');
                                                    @if($inf->pinfo_gender == 0)
                                                    $("#male").prop("checked", true);
                                                    @endif
                                                    @if($inf->pinfo_gender == 1)
                                                    $("#fem").prop("checked", true);
                                                    @endif
                                                    $('#cpno').val('{{ $inf->pinfo_cpnum_1 }}');
                                                    $('#cpno_1').val('{{ $inf->pinfo_cpnum_2 }}');
                                                    $('#telno').val('{{ $inf->pinfo_tpnum }}');
                                                    $('#email').val('{{ $inf->pinfo_mail}}');
                                                    @foreach($sales as $agent)
                                                        @if($client->client_sales_ID == $agent->agent_ID)
                                                            @foreach($pinfo as $info)
                                                                @if($agent->personal_info_ID == $info->pinfo_ID)
                                                                    $('#agent').val('{{ $info->pinfo_last_name }}' +", "+'{{ $info->pinfo_first_name }}' +" "+'{{ $info->pinfo_middle_name }}');
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                    var bday = document.getElementById('bday').value.split('-');
                                                    var today = new Date();
                                                    if(bday[0] != 0)
                                                    {
                                                        if((today.getMonth() + 1) < bday[1])
                                                        {
                                                          document.getElementById('age').value = today.getFullYear() - bday[0] - 1;
                                                        }
                                                        else
                                                        {
                                                          document.getElementById('age').value = today.getFullYear() - bday[0];
                                                        }
                                                    }
                                                    else
                                                    {
                                                        document.getElementById('age').value = 'Invalid Input';
                                                    }
                                                    @foreach($addr as $add)
                                                        @if($client->client_add_ID == $add->add_ID)
                                                            $('#blk').val('{{ $add->add_blcknum}}');
                                                            $('#dist').val('{{ $add->add_district}}');
                                                            $('#street').val('{{ $add->add_street}}');
                                                            $('#city').val('{{ $add->add_city}}');
                                                            $('#subd').val('{{ $add->add_subdivision}}');
                                                            $('#prov').val('{{ $add->add_province}}');
                                                            $('#brgy').val('{{ $add->add_brngy}}');
                                                            $('#region').val('{{ $add->add_region}}');
                                                            $('#zipcode').val('{{ $add->add_zipcode}}');
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endif
                            @if($list->client_type == 2)
                                @foreach($clist as $list)
                                    @if($ins->client_ID == $list->client_ID)
                                        @foreach($comp as $client)
                                            @if($list->client_ID == $client->comp_ID)
                                                show_Comp();
                                                $('#compname').val('{{ $client->comp_telnum }}');
                                                $('#comp_telnum').val('{{ $client->comp_name }}');
                                                $('#comp_fax').val('{{ $client->comp_faxnum }}');
                                                $('#comp_email').val('{{ $client->comp_email }}');
                                                @foreach($sales as $agent)
                                                    @if($client->comp_sales_agent == $agent->agent_ID)
                                                        @foreach($pinfo as $info)
                                                            @if($agent->personal_info_ID == $info->pinfo_ID)
                                                                $('#comp_agent').val('{{ $info->pinfo_last_name }}' +", "+'{{ $info->pinfo_first_name }}' +" "+'{{ $info->pinfo_middle_name }}');
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                @foreach($addr as $add)
                                                    @if($client->comp_add_ID == $add->add_ID)
                                                        $('#comp_blk').val('{{ $add->add_blcknum}}');
                                                        $('#comp_dist').val('{{ $add->add_district}}');
                                                        $('#comp_street').val('{{ $add->add_street}}');
                                                        $('#comp_city').val('{{ $add->add_city}}');
                                                        $('#comp_subd').val('{{ $add->add_subdivision}}');
                                                        $('#comp_prov').val('{{ $add->add_province}}');
                                                        $('#comp_brgy').val('{{ $add->add_brngy}}');
                                                        $('#comp_region').val('{{ $add->add_region}}');
                                                        $('#comp_zipcode').val('{{ $add->add_zipcode}}');
                                                    @endif
                                                @endforeach
                                                @foreach($cont as $cper)
                                                    @if($client->comp_cperson_ID == $cper->cPerson_ID)
                                                        @foreach($pinfo as $inf)
                                                            @if($cper->personal_info_ID == $inf->pinfo_ID)
                                                                $('#cont_fname').val('{{ $inf->pinfo_first_name }}');
                                                                $('#cont_bday').val('{{ $inf->pinfo_age }}');
                                                                $('#cont_mname').val('{{ $inf->pinfo_middle_name }}');
                                                                $('#cont_lname').val('{{ $inf->pinfo_last_name }}');
                                                                @if($inf->pinfo_gender == 0)
                                                                $("#cont_male").prop("checked", true);
                                                                @endif
                                                                @if($inf->pinfo_gender == 1)
                                                                $("#cont_fem").prop("checked", true);
                                                                @endif
                                                                $('#cont_cpno').val('{{ $inf->pinfo_cpnum_1 }}');
                                                                $('#cont_cpno_1').val('{{ $inf->pinfo_cpnum_2 }}');
                                                                $('#cont_telno').val('{{ $inf->pinfo_tpnum }}');
                                                                $('#cont_email').val('{{ $inf->pinfo_mail}}');
                                                                var bday = document.getElementById('cont_bday').value.split('-');
                                                                var today = new Date();
                                                                if(bday[0] != 0)
                                                                {
                                                                    if((today.getMonth() + 1) < bday[1])
                                                                    {
                                                                      document.getElementById('cont_age').value = today.getFullYear() - bday[0] - 1;
                                                                    }
                                                                    else
                                                                    {
                                                                      document.getElementById('cont_age').value = today.getFullYear() - bday[0];
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    document.getElementById('cont_age').value = 'Invalid Input';
                                                                }
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                @endif
            @endforeach
        @endforeach
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
