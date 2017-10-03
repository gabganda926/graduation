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
                        <li><a href="{{ URL::asset('admin/transaction/claim-request-walkin') }}"><i class="material-icons">home</i> New Quotation</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Create New Claim Request</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="phDetails" class="list-group-item active">
                                1. Policy holder Details
                            </a>
                            <a href="javascript:void(0);" id="clDetails" class="list-group-item disabled">2. Details of Claim/Loss</a>
                            <a href="javascript:void(0);" id="notifiedBy" class="list-group-item disabled">3. Claim Notified By</a>
                            <a href="javascript:void(0);" id="uploadDoc" class="list-group-item disabled">4. Upload Claim Documents/Requirements</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <input id = "datengayon" name = "datengayon" type="datetime" class="form-control" style="display: none;">
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
                                            <input id = "policyno" name = "policyno" type="text" class="form-control">
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

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <button type="button" id="pdetNext"  class="btn btn-block bg-teal waves-effect left" disabled onclick=" 
                                    $(this).parents('#phDet').hide(800);
                                    $('#clDet').show(800);
                                    $('#phDetails').removeClass('active');
                                    $('#clDetails').removeClass('disabled');
                                    $('#clDetails').addClass('active');
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

                     <div class="card" id="clDet">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/closed.png')}}" style="height: 50px; width: 50px;"> II. Details of Claim/Loss </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                        <form name = "claimrequest" id = "claimrequest" action = "/admin/transaction/claim-create-request-walkin/submit" method = "POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Date of Incident:</small></label>
                                            <div class="form-row show-inputbtns">
                                                    <input id = "date_incident" name = "date_incident" type="date" data-date-inline-picker="false" data-date-open-on-focus="true" class="form-control" />
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Time of Incident:</small></label>
                                            <div class="form-row show-inputbtns">
                                                    <input id = "time_incident" name = "time_incident" type="time" data-date-inline-picker="false" data-date-open-on-focus="true" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-11">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Place of Incident:</small></label>
                                            <input id = "place_incident" name = "place_incident" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                              <label><small>Brief Description of the Circumstances of the Incident:</small></label>
                                              <textarea id = "desc_incident" name = "desc_incident" rows="6" class="form-control no-resize auto-growth"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2" style = "display: none;">
                                   <input id = "insid" name = "insid" type="text" class="form-control">
                                </div>
                                
                            <div class="col-md-2" style = "display: none;">
                               <input id = "claimid" name = "claimid" type="text" class="form-control">
                            </div>
                            <div class="col-md-2" style = "display: none;">
                               <input id = "reqc" name = "reqc" type="text" class="form-control">
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <button type="button" id="next2"  class="btn btn-block bg-blue waves-effect left" onclick=" 
                                    $(this).parents('#clDet').hide(800);
                                    $('#phDet').show(800);
                                    $('#phDetails').addClass('active');
                                    $('#clDetails').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                        <span style="font-size: 15px;"> PREVIOUS</span>
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" id="claimDetNext"  class="btn btn-block bg-teal waves-effect left" disabled onclick=" 
                                    if($('#claimrequest').valid())
                                    {
                                    $(this).parents('#clDet').hide(800);
                                    $('#notifBy').show(800);
                                    $('#clDetails').removeClass('active');
                                    $('#notifiedBy').removeClass('disabled');
                                    $('#notifiedBy').addClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    }">
                                        <span style="font-size: 15px;"> NEXT</span>
                                    </button>
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
                                    <input name="notifby" type="radio" id="radio_pholder" class="rg" onclick="
                                    $('#repp').hide(800);" />
                                    <label for="radio_pholder">Policyholder</label>
                                </div>
                                <div class="col-md-4">
                                    <input name="notifby" type="radio" id="radio_repholder" class="rg" onclick="
                                    $('#repp').show(800);"/>
                                    <label for="radio_repholder">Representative of Policy Holder</label>
                                </div>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "notby" name = "notby" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-2" style = "display: none;">
                                   <input id = "notifby_check" name = "notifby_check" type="text" class="form-control">
                                </div>
                            </div>

                            <!-- PAG PINILI UNG REPRESENTATIVE, LALABAS TO: -->
                            <div id="repp">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Name:</small></label>
                                            <input id = "rep_name" name = "rep_name" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Relation to Policyholder:</small></label>
                                            <input id = "rep_rel" name = "rep_rel" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Contact Details:</small></label>
                                            <input id = "rep_telno" name = "rep_telno" type="text" class="form-control" placeholder="Telephone">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>-</small></label>
                                            <input id = "rep_cpno" name = "rep_cpno" type="text" class="form-control" placeholder="Cellphone Number">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>-</small></label>
                                            <input id = "rep_cpno_1" name = "rep_cpno_1" type="text" class="form-control" placeholder="Cellphone Number (Alternate)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>-</small></label>
                                            <input id = "rep_email" name = "rep_email" type="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <button type="button" id="next1"  class="btn btn-block bg-blue waves-effect left" onclick=" 
                                    $(this).parents('#notifBy').hide(800);
                                    $('#clDet').show(800);
                                    $('#clDetails').addClass('active');
                                    $('#notifiedBy').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                        <span style="font-size: 15px;"> PREVIOUS</span>
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" id="notifNext"  class="btn btn-block bg-teal waves-effect left" disabled onclick="
                                    if($('#claimrequest').valid())
                                    { 
                                    buttonAddMore();
                                    $(this).parents('#notifBy').hide(800);
                                    $('#upDoc').show(800);
                                    $('#notifiedBy').removeClass('active');
                                    $('#uploadDoc').removeClass('disabled');
                                    $('#uploadDoc').addClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    }">
                                        <span style="font-size: 15px;"> NEXT</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="card" id="upDoc">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/closed.png')}}" style="height: 50px; width: 50px;"> IV. Upload Claim Documents/Requirements </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>

                        <div class="body" id="filebod">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="claimtypez"><small>Claim Type: </small></label> <!-- AUTO GENERATED -->
                                    <small><b><input type="text" id="claimtypez" class="form-control" readonly="true" style="font-size: 20px"></b></small>
                                </div>
                            </div>
                            <div class="body table-responsive">
                                <table id="files" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th class="col-md-7">Requirement</th>
                                            <th class="col-md-5">Files</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <!--<td>Photographs of the damaged vehicle </td>
                                            <td><form class="input-append">
                                                <div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="file"/><button id="b1" class="btn add-more" type="button">+ Add more File</button><br/></div>
                                            </form></td>-->
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                            <div class="col-md-4" style = "display: none;">
                                   <input id = "time" name = "time" type="text" class="form-control">
                                </div>
                                
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <button type="button" id="next1"  class="btn btn-block bg-blue waves-effect left" onclick=" 
                                    $(this).parents('#upDoc').hide(800);
                                    $('#notifBy').show(800);
                                    $('#notifiedBy').addClass('active');
                                    $('#uploadDoc').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                        <span style="font-size: 15px;"> PREVIOUS</span>
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" id="subm" type="button"  class="btn btn-block bg-green waves-effect left" onclick = "
                                    document.getElementById('time').value = formatDate(new Date());
                                    document.getElementById('insid').value = getInsId();
                                    document.getElementById('claimid').value = getClaimId();
                                    document.getElementById('reqc').value = getReqCount();
                                    swal({
                                      title: 'Are you sure?',
                                      type: 'warning',
                                      showCancelButton: true,
                                      confirmButtonColor: '#DD6B55',
                                      confirmButtonText: 'Continue',
                                      cancelButtonText: 'Cancel',
                                      closeOnConfirm: false,
                                      closeOnCancel: false
                                    },
                                    function(isConfirm){
                                      if (isConfirm) {
                                        $('#claimrequest').submit();
                                      } else {
                                          swal({
                                          title: 'Cancelled',
                                          type: 'warning',
                                          timer: 500,
                                          showConfirmButton: false
                                          });
                                      }
                                    });
                                    ">
                                        <span style="font-size: 15px;"> SUBMIT</span>
                                    </button>
                                </div>
                            </div>
                            </form>
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
                            <form id="add" name = "add">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row clearfix">
                                    <br/><br/><label>Choose claim type first</label>
                                    <select id = "claim_type" name = "claim_type" class="form-control show-tick" data-live-search="true" required>
                                    <option selected value = "" style = "display: none;">-- Choose Claim Type --</option>
                                    @foreach($ctype as $claim)
                                        @if($claim->del_flag == 0)
                                        <option value="{{ $claim->claimType_ID }}">{{ $claim->claimType }}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                                <br/><br/><br/>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "time" name = "time" type="text" class="form-control" pattern="[A-Za-z'-]">
                                </div>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button id="continue" class="btn btn-primary btn-block waves-effect" data-dismiss="modal" disabled>CONTINUE</button>
                            <a href="{{ URL::asset('admin/transaction/claim-request-walkin') }}" id="canc" class="btn bg-orange btn-block waves-effect">CANCEL</a>
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
        };
    </script>

    <script>
        function addZero(i) {
                    if (i < 10) {
                        i = "0" + i;
                    }
                    return i;
                }

        function formatDate(date)
        {
          var monthNames = [
            "January", "February", "March",
            "April", "May", "June", "July",
            "August", "September", "October",
            "November", "December"
          ];

          var day = date.getDate();
          var monthIndex = date.getMonth() + 1;
          var year = date.getFullYear();
          var h = addZero(date.getHours());
          var m = addZero(date.getMinutes());
          var s = addZero(date.getSeconds());

          return year + '-' + monthIndex + '-' + day + ' ' + h + ':' + m + ':' + s;
        }

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();


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

        if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = yyyy+'-'+mm+'-'+dd;

        var myVar1=setInterval(function(){myTimer1()},1000);

        function myTimer1() {
            var f = new Date();
           $('#datengayon').val(today+ " " +f.toLocaleTimeString());
        }

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

        function hideAll(){
            $("#radio_ind").prop("checked", false);
            $("#radio_comp").prop("checked", false);
            $("#pdetNext").prop("disabled", true);
            $('#individualClient').hide(800);
            $('#companyClient').hide(800);
        }

        function buttonAddMore(){
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
        }

        function getInsId(inid){
           inid = $('#insid').val();
           return inid;
        }

        function getClaimId(clid){
           clid = $('#claimid').val();
           return clid;
        } 

        function getReqCount(rc){
           rc = $('#reqc').val();
           return rc;
        }            


         $('#policyno').on('change textInput input', function () {
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
                                                    if((parseDate(due).addDays(7).getTime() < parseDate(now).getTime()) && lapse == 0 && '{{ $pay->status }}' == 1){
                                                        var p = 3; //lapsed
                                                        console.log(p);
                                                        var lapse=1;
                                                        console.log('{{$pay->or_number}}');
                                                    }
                                                    @if($det->account_ID == $insacc->account_ID)
                                                    if('{{$insacc->inception_date}}' > now && lapse==0 && '{{ $pay->status }}' == 0 || '{{ $pay->status }}' == 3){
                                                                var p = 1; //on payment
                                                                console.log(p);
                                                    }
                                                    @endif
                                                    if(incep < parseDate(now).getTime() && lapse==0){
                                                        var p = 2; //expired
                                                        console.log(p);
                                                        console.log(now);
                                                    }
                                                    if(incep >= parseDate(now).getTime() && incep_start <= parseDate(now).getTime() && lapse == 0 && '{{ $pay->status }}' == 0){
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
                        }
                    @endforeach
                }
            }
         });

        var reqcount = 0;

        $('#claim_type').on('change textInput input', function () {
            $('#continue').attr('disabled', false);
            @foreach ($ctype as $type)
                @if($type->del_flag == 0)
                if('{{$type->claimType_ID}}' == $('#claim_type option:selected').val()){
                    $('#claimtypez').val('{{ $type->claimType }}');
                    $('#claimid').val('{{ $type->claimType_ID }}');
                    console.log("CLAIM ID " + $('#claimid').val());
                    @foreach ($creq as $req)
                        @if($req->del_flag == 0)
                        @if($req->claimReq_Type == $type->claimType_ID)
                            var option = '<tr><td>{{ $req->claimRequirement }}</td><td><form class="input-append"><div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="file"/><button id="b1" class="btn add-more" type="button">+ Add more File</button><br/></div></form></td></tr>';
                            $('#files tbody').append(option);
                            reqcount += 1;
                            $('#claimid').val(reqcount);
                            console.log("REQCOUNT " + $('#reqc').val());
                        @endif
                        @endif
                    @endforeach
                }
                @endif
            @endforeach
        });

        var count1 = 0;
        var count2=0;
        var count3=0;
        var count4=0;
        var comp = "";

        $('#time_incident').on('change textInput input', function () {
            if($('#date_incident').val() != comp){
                count1=1;
            }
            else if($('#date_incident').val() == comp){
                count1=0;
            }
            if($('#time_incident').val() != comp){
                count2=1;
            }
            else if($('#time_incident').val() == comp){
                count2=0;
            }
            if($('#place_incident').val() != comp){
                count3=1;
            }
            else if($('#place_incident').val() == comp){
                count3=0;
            }
            if($('#desc_incident').val() != comp){
                count4=1;
            }
            else if($('#desc_incident').val() == comp){
                count4=0;
            }

            if(count1 == 1 && count2 == 1 && count3 == 1 && count4 == 1){
                $("#claimDetNext").prop("disabled", false);
            }
            else{
                $("#claimDetNext").prop("disabled", true);
            }
        });

        $('#date_incident').on('change textInput input', function () {
            if($('#date_incident').val() != comp){
                count1=1;
            }
            else if($('#date_incident').val() == comp){
                count1=0;
            }
            if($('#time_incident').val() != comp){
                count2=1;
            }
            else if($('#time_incident').val() == comp){
                count2=0;
            }
            if($('#place_incident').val() != comp){
                count3=1;
            }
            else if($('#place_incident').val() == comp){
                count3=0;
            }
            if($('#desc_incident').val() != comp){
                count4=1;
            }
            else if($('#desc_incident').val() == comp){
                count4=0;
            }

            if(count1 == 1 && count2 == 1 && count3 == 1 && count4 == 1){
                $("#claimDetNext").prop("disabled", false);
            }
            else{
                $("#claimDetNext").prop("disabled", true);
            }
        });

        $('#place_incident').on('change textInput input', function () {
            if($('#date_incident').val() != comp){
                count1=1;
            }
            else if($('#date_incident').val() == comp){
                count1=0;
            }
            if($('#time_incident').val() != comp){
                count2=1;
            }
            else if($('#time_incident').val() == comp){
                count2=0;
            }
            if($('#place_incident').val() != comp){
                count3=1;
            }
            else if($('#place_incident').val() == comp){
                count3=0;
            }
            if($('#desc_incident').val() != comp){
                count4=1;
            }
            else if($('#desc_incident').val() == comp){
                count4=0;
            }

            if(count1 == 1 && count2 == 1 && count3 == 1 && count4 == 1){
                $("#claimDetNext").prop("disabled", false);
            }
            else{
                $("#claimDetNext").prop("disabled", true);
            }
        });

        $('#desc_incident').on('change textInput input', function () {
            if($('#date_incident').val() != comp){
                count1=1;
            }
            else if($('#date_incident').val() == comp){
                count1=0;
            }
            if($('#time_incident').val() != comp){
                count2=1;
            }
            else if($('#time_incident').val() == comp){
                count2=0;
            }
            if($('#place_incident').val() != comp){
                count3=1;
            }
            else if($('#place_incident').val() == comp){
                count3=0;
            }
            if($('#desc_incident').val() != comp){
                count4=1;
            }
            else if($('#desc_incident').val() == comp){
                count4=0;
            }

            if(count1 == 1 && count2 == 1 && count3 == 1 && count4 == 1){
                $("#claimDetNext").prop("disabled", false);
            }
            else{
                $("#claimDetNext").prop("disabled", true);
            }
        });

        var rep1 = 0;
        var rep2 = 0;
        var rep3 = 0;
        var rep4 = 0;
        var comp1 = "";

         $(".rg").change(function () {
                     
            if($('#radio_pholder').is(':checked')) {
                $("#notifNext").prop("disabled", false);
                $('#rep_name').val("");
                $('#rep_rel').val("");
                $('#rep_cpno').val("");
                $('#rep_cpno_1').val("");
                $('#rep_email').val("");
                $('#rep_telno').val("");
                $('#notifby_check').val(1);
            }
            else {
                $('#notifby_check').val(2);
                $("#notifNext").prop("disabled", true);

                $('#rep_name').on('change textInput input', function () {
                    if($('#rep_name').val() != comp1){
                        rep1=1;
                    }
                    else if($('#rep_name').val() == comp1){
                        rep1=0;
                    }

                    if($('#rep_rel').val() != comp1){
                        rep2=1;
                    }
                    else if($('#rep_rel').val() == comp1){
                        rep2=0;
                    }

                    if($('#rep_cpno').val() != comp1){
                        rep3=1;
                    }
                    else if($('#rep_cpno').val() == comp1){
                        rep3=0;
                    }

                    if($('#rep_email').val() != comp1){
                        rep4=1;
                    }
                    else if($('#rep_email').val() == comp1){
                        rep4=0;
                    }

                    if(rep1 == 1 && rep2 == 1 && rep3 == 1 && rep4 == 1){
                        $("#notifNext").prop("disabled", false);
                    }
                    else{
                        $("#notifNext").prop("disabled", true);
                    }
                });

                $('#rep_rel').on('change textInput input', function () {
                    if($('#rep_name').val() != comp1){
                        rep1=1;
                    }
                    else if($('#rep_name').val() == comp1){
                        rep1=0;
                    }

                    if($('#rep_rel').val() != comp1){
                        rep2=1;
                    }
                    else if($('#rep_rel').val() == comp1){
                        rep2=0;
                    }

                    if($('#rep_cpno').val() != comp1){
                        rep3=1;
                    }
                    else if($('#rep_cpno').val() == comp1){
                        rep3=0;
                    }

                    if($('#rep_email').val() != comp1){
                        rep4=1;
                    }
                    else if($('#rep_email').val() == comp1){
                        rep4=0;
                    }

                    if(rep1 == 1 && rep2 == 1 && rep3 == 1 && rep4 == 1){
                        $("#notifNext").prop("disabled", false);
                    }
                    else{
                        $("#notifNext").prop("disabled", true);
                    }
                });

                $('#rep_cpno').on('change textInput input', function () {
                    if($('#rep_name').val() != comp1){
                        rep1=1;
                    }
                    else if($('#rep_name').val() == comp1){
                        rep1=0;
                    }

                    if($('#rep_rel').val() != comp1){
                        rep2=1;
                    }
                    else if($('#rep_rel').val() == comp1){
                        rep2=0;
                    }

                    if($('#rep_cpno').val() != comp1){
                        rep3=1;
                    }
                    else if($('#rep_cpno').val() == comp1){
                        rep3=0;
                    }

                    if($('#rep_email').val() != comp1){
                        rep4=1;
                    }
                    else if($('#rep_email').val() == comp1){
                        rep4=0;
                    }

                    if(rep1 == 1 && rep2 == 1 && rep3 == 1 && rep4 == 1){
                        $("#notifNext").prop("disabled", false);
                    }
                    else{
                        $("#notifNext").prop("disabled", true);
                    }
                });

                $('#rep_email').on('change textInput input', function () {
                    if($('#rep_name').val() != comp1){
                        rep1=1;
                    }
                    else if($('#rep_name').val() == comp1){
                        rep1=0;
                    }

                    if($('#rep_rel').val() != comp1){
                        rep2=1;
                    }
                    else if($('#rep_rel').val() == comp1){
                        rep2=0;
                    }

                    if($('#rep_cpno').val() != comp1){
                        rep3=1;
                    }
                    else if($('#rep_cpno').val() == comp1){
                        rep3=0;
                    }

                    if($('#rep_email').val() != comp1){
                        rep4=1;
                    }
                    else if($('#rep_email').val() == comp1){
                        rep4=0;
                    }

                    if(rep1 == 1 && rep2 == 1 && rep3 == 1 && rep4 == 1){
                        $("#notifNext").prop("disabled", false);
                    }
                    else{
                        $("#notifNext").prop("disabled", true);
                    }
                });
            }
        });

        $(document).ready(function(){
            $("#ugh").modal('show');
        });

        $('#ugh').modal({backdrop: 'static', keyboard: false})  
    </script>

    <script>
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
          $("form[name='claimrequest']").validate({
            // Specify validation rules
            rules: {
              // The key name on the left side is the name attribute
              // of an input field. Validation rules are defined
              // on the right side
              date_incident:
              {
                required: true
              },
              time_incident:
              {
                required: true
              },
              place_incident:
              {
                  alphanumeric: true,
                  maxlength: 80
              },
              desc_incident:
              {
                alphanumeric: true,
                  maxlength: 7900
              },
              rep_name:
              {
                alpha: true,
                maxlength: 200
              },
              rep_rel:
              {
                alpha: true,
                maxlength: 50
              },
              rep_telno:
              {
                digits: true,
                minlength: 7,
                maxlength: 7
              },
              rep_email:
              {
                email: true,
                maxlength: 50
              },
              rep_cpno:
              {
                cpValidator: true
              },
              rep_cpno_1:
              {
                cpValidator: true
              }
            },
            // Specify validation error messages
            messages: {

            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
              form.submit();
            }
          });
        });
    </script>

@endsection
