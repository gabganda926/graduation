@extends('pages.admin.master')

@section('title','Claims - Transaction | i-Insure')

@section('trans','active')

@section('transClaims','active')

@section('transClaimsOnline','active')

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
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('admin/transaction/claim-request-online') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('admin/transaction/claim-request-online') }}"><i class="material-icons">home</i> Home</a></li>
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
                                    $('#clDetails').removeClass('active');
                                    $('#notifiedBy').removeClass('active');
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
                                    $('#phDetails').removeClass('active');
                                    $('#notifiedBy').removeClass('active');
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
                                    $('#phDetails').removeClass('active');
                                    $('#clDetails').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">3. Claim Notified By</a>
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
                                    $('#companyClient').hide(800);" disabled="disable" />
                                    <label for="radio_1">Individual</label>
                                    <input name="group1" type="radio" id="radio_2" onclick="
                                    $('#companyClient').show(800);
                                    $('#individualClient').hide(800);" disabled="disable" />
                                    <label for="radio_2">Company</label>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Policy Number:</small></label>
                                            <input id = "policyno" name = "policyno" type="text" class="form-control" readonly="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Account Status:</small></label>
                                            <input id = "acc_status" name = "acc_status" type="text" class="form-control" disabled="disable">
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
                                                    <input id = "apinfo_bday" name = "apinfo_bday" type="text" data-date-inline-picker="false" data-date-open-on-focus="true" class="form-control" readonly="true" value="{{ \Carbon\Carbon::parse($creq->web_lossDate)->format('M-d-Y') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Time of Loss:</small></label>
                                            <div class="form-row show-inputbtns">
                                                    <input id = "apinfo_bday" name = "apinfo_bday" type="text" data-date-inline-picker="false" data-date-open-on-focus="true" class="form-control" readonly="true" value="{{ \Carbon\Carbon::parse($creq->web_lossDate)->format('h:i:s A') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Claim Type:</small></label>
                                            <div class="form-row show-inputbtns">
                                                    <input id = "claim_type" name = "claim_type" type="text" data-date-inline-picker="false" data-date-open-on-focus="true" class="form-control" readonly="true"/>
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
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" readonly="true" value="{{ $creq->web_placeOfLoss }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                              <label><small>Brief Description of the Circumstances of Loss:</small></label>
                                              <textarea id = "avehicle_type_desc" name = "avehicle_type_desc" rows="6" class="form-control no-resize auto-growth" readonly="true">{{ $creq->web_description }}</textarea>
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
                                    <input name="group2" type="radio" id="radio_pholder" onclick="
                                    $('#repp').hide(800);" />
                                    <label for="radio_11">Policyholder</label>
                                </div>
                                <div class="col-md-4">
                                    <input name="group2" type="radio" id="radio_rep" onclick="
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
                                            <input id = "rep_name" name = "rep_name" type="text" class="form-control" readonly="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Relation to Policyholder:</small></label>
                                            <input id = "rep_rel" name = "rep_rel" type="text" class="form-control" readonly="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Contact Details:</small></label>
                                            <input id = "rep_telnum" name = "rep_telnum" type="text" class="form-control" placeholder="Telephone" readonly="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>-</small></label>
                                            <input id = "rep_cpno" name = "rep_cpno" type="text" class="form-control" placeholder="Cellphone Number" readonly="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input id = "datengayon" name = "datengayon" type="datetime" class="form-control" style="display: none;">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>-</small></label>
                                            <input id = "rep_cpno1" name = "rep_cpno1" type="text" class="form-control" placeholder="Cellphone Number (Alternate)" readonly="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>-</small></label>
                                            <input id = "rep_email" name = "rep_email" type="email" class="form-control" placeholder="Email" readonly="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>

    <script type="text/javascript">
        window.onload = function() {
          document.getElementById('individualClient').style.display = 'none';
          document.getElementById('companyClient').style.display = 'none';
          document.getElementById('clDet').style.display = 'none';
          document.getElementById('notifBy').style.display = 'none';
          document.getElementById('repp').style.display = 'none';

        var today1 = new Date();
        var dd1 = today1.getDate();
        var mm1 = today1.getMonth()+1;
        var yyyy1 = today1.getFullYear();

        function parseDate(input) {
          var parts = input.match(/(\d+)/g);
          // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
          return new Date(parts[0], parts[1]-1, parts[2]); // months are 0-based
        }

        Date.prototype.addDays = function(days) {
          var dat = new Date(this.valueOf());
          dat.setDate(dat.getDate() + days);
          return dat;
        } 

        function pad (str, max) {
          str = str.toString();
          return str.length < max ? pad("0" + str, max) : str;
        }

        if(dd1<10){dd1='0'+dd1} if(mm1<10){mm1='0'+mm1} today1 = yyyy1+'-'+mm1+'-'+dd1;

        var f = new Date();
        $('#datengayon').val(today1+ " " +f.toLocaleTimeString());

        var myVar1=setInterval(function(){myTimer1()},1000);

        function myTimer1() {
            var f = new Date();
           $('#datengayon').val(today1+ " " +f.toLocaleTimeString());
        }

            $('#policyno').val('{{ $creq->web_policyno }}');
            var lapse = 0;
            var p = 0;
            var ind = 0;
            var comp = 0;
            @foreach($cliacc as $insacc)
                if('{{$insacc->policy_number}}' == $('#policyno').val()){
                @foreach($clist as $list)
                    @if($insacc->account_ID == $list->client_ID)
                        @foreach($voucher as $vouch)
                            @if($insacc->account_ID == $vouch->cv_ID)
                            @foreach($payments as $pay)
                                @if($pay->check_voucher == $vouch->cv_ID)
                                    @foreach($ptail as $det)
                                        @if($vouch->pay_ID == $det->payment_ID)
                                            @if($det->acccount_ID == $insacc->acccount_ID)
                                                if('{{$insacc->policy_number}}' == $('#policyno').val()){
                                                    var due = "" + '{{ $pay->due_date }}';
                                                    var now = $('#datengayon').val();
                                                    var incep_start = new Date('{{$insacc->inception_date}}');
                                                    var incep = new Date('{{$insacc->inception_date}}');

                                                    incep.setFullYear(incep.getFullYear() + 1);
                                                    if((parseDate(due).addDays(7).getTime() < parseDate(now).getTime()) && lapse == 0 )
                                                    {
                                                        if( '{{ $pay->status }}' == 1 || '{{ $pay->status }}' == 4)
                                                        {
                                                            var p = 3; //lapsed
                                                            console.log(p);
                                                            var lapse=1;
                                                            console.log('{{$pay->or_number}}');
                                                        }
                                                    }   
                                                    @if($det->account_ID == $insacc->account_ID)
                                                    if(incep_start > parseDate(now).getTime() && lapse==0){
                                                        if('{{ $pay->status }}' == 1 || '{{ $pay->status }}' == 3 || '{{ $pay->status }}' == 0){
                                                                var p = 1; //on payment
                                                                console.log(p);
                                                        }
                                                    }
                                                    @endif
                                                    if(incep < parseDate(now).getTime() && lapse==0){
                                                        var p = 2; //expired
                                                        console.log(p);
                                                    }
                                                    if(incep >= parseDate(now).getTime() && incep_start <= parseDate(now).getTime() && lapse == 0)
                                                    {
                                                        if ('{{ $pay->status }}' == 0 || '{{ $pay->status }}' == 3)
                                                        {
                                                        var p = 4; //active
                                                        console.log(p);
                                                        @foreach($clist as $list)
                                                            @if($insacc->client_ID == $list->client_ID)
                                                                @if($list->client_type == 1)
                                                                    var ind = 1;
                                                                @endif
                                                                @if($list->client_type == 2)
                                                                    var comp = 1;
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        }
                                                    }
                                                }
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            @endif
                        @endforeach
                    @endif
                @endforeach
                }
                if('{{$insacc->policy_number}}' != $('#policyno').val()){
                    $('#acc_status').val("Account not found");
                    hideAll();
                }
            @endforeach

            if(p == 1){
                $('#acc_status').val("On payment");
                hideAll();
            }
            else if(p == 2){
                $('#acc_status').val("Expired");
                hideAll();
            }
            else if(p == 3){
                $('#acc_status').val("Lapsed");
                hideAll();
            }
            else if(p == 4){
                $('#acc_status').val("Active");
                if(ind == 1){
                    show_Ind();

                    @foreach($cliacc as $ins)
                        if('{{$ins->policy_number}}' == $('#policyno').val()){
                            console.log("POLICYNUMBER: " + '{{$ins->policy_number}}');
                            @foreach($clist as $list)
                                @if($ins->client_ID == $list->client_ID)
                                    @foreach($cli as $client)
                                        @if($list->client_ID == $client->client_ID)
                                            @foreach($pinfo as $inf)
                                                @if($client->personal_info_ID == $inf->pinfo_ID)
                                                    $('#insid').val('{{ $ins->account_ID }}');
                                                    console.log("INSURANCE ACC ID: " + $('#insid').val());
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
                            @endforeach
                        }
                    @endforeach
                }
                if(comp == 1){
                    show_Comp();
                    @foreach($cliacc as $ins)
                        if('{{$ins->policy_number}}' == $('#policyno').val()){
                            console.log("POLICYNUMBER: " + '{{$ins->policy_number}}');
                            @foreach($clist as $list)
                                @if($ins->client_ID == $list->client_ID)
                                    @foreach($comp as $client)
                                        @if($list->client_ID == $client->comp_ID)
                                            $('#insid').val('{{ $ins->account_ID }}');
                                            console.log("INSURANCE ACC ID: " + $('#insid').val());
                                            $('#compname').val('{{ $client->comp_name }}');
                                            $('#comp_telnum').val('{{ $client->comp_telnum }}');
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
                        }
                    @endforeach
                }
            }
        };
    </script>

    <script>
        function show_Ind()
        {
            $("#radio_ind").prop("checked", true);
            $("#radio_comp").prop("checked", false);
            $('#individualClient').show(800);
            $('#companyClient').hide(800);
        }

        function show_Comp()
        {
            $("#radio_ind").prop("checked", false);
            $("#radio_comp").prop("checked", true);
            $('#individualClient').hide(800);
            $('#companyClient').show(800);
        }

        function hideAll(){
            $("#radio_ind").prop("checked", false);
            $("#radio_comp").prop("checked", false);
            $('#individualClient').hide(800);
            $('#companyClient').hide(800);
        }

        $(document).ready(function(){
            @if($creq->web_notifiedByType == 1)
                $("#radio_pholder").prop("checked", true);
                $("#radio_rep").prop("checked", false);
            @endif
            @if($creq->web_notifiedByType == 2)
                $("#radio_pholder").prop("checked", false);
                $("#radio_rep").prop("checked", true);

                @foreach($cnotif as $notif)
                    @if($creq->web_notifier_ID == $notif->web_notifier_ID)
                        $('#rep_name').val('{{ $notif->web_notifier_Name }}');
                        $('#rep_email').val('{{ $notif->web_notifier_email }}');
                        $('#rep_rel').val('{{ $notif->web_notifier_Relation }}');
                        $('#rep_cpno').val('{{ $notif->web_notifier_cell_1 }}');
                        $('#rep_cpno1').val('{{ $notif->web_notifier_cell_2 }}');
                        $('#rep_telnum').val('{{ $notif->web_notifier_telnum }}');
                    @endif
                @endforeach
            @endif

            @foreach($ctype as $ct)
                @if($ct->claimType_ID == $creq->web_claimType_ID)
                    $('#claim_type').val('{{ $ct->claimType }}');
                @endif
            @endforeach
    });
    </script>

@endsection
