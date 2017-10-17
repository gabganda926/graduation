@extends('pages.webpage.webmaster')

@section('title','Claims | i-Insure')

@section('claims','active')

@section('body')
<section>
<div class="content">
    <div class="container">
        <ol class="breadcrumb">
          <li><a href="/home">Home</a></li>
          <li class="active">Claims</li>
        </ol>
        <div class="row">
            <h1><b>FILE A CLAIM ONLINE</b></h1><br/>
                <div style="float: left; width: 43%;" >
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.6420020230535!2d121.08669821407172!3d14.619458389790465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b8236cdbddf1%3A0x512e36886ed20edf!2sNutriix+%2F+Compreline+Insurance+Services!5e0!3m2!1sen!2sph!4v1501403179768" width="450" height="450" frameborder="0" style="border:0" allowfullscreen></iframe><br/><br/>

                    <div class="panel panel-default" style="background-color: #424242; width: 90%">
                        <div class="panel-heading" style="background-color: #424242; color: white">CONTACT US</div>
                        <div class="panel-body" style="background-color: #424242; color: #e0e0e0">  Askjshdkjahd. jhdkshdkjasedhsjhbdckjsdkshdkusahdkjasdahskjdcnmx shdbkjsahdkwqjd wqiudkqwjd.</div>
                        <div class="panel-footer" style="background-color: #424242; color: #e0e0e0">  
                            <i class="glyphicon glyphicon-phone-alt"></i><span>  (02) 212-0000</span><br/>
                            <i class="glyphicon glyphicon-briefcase"></i><span>  compreline@insurance.com</span>
                        </div>
                    </div>
                </div>

                <div style="float: right; width: 57%">
                    <h3><b>Online Claim Notification</b></h3><br/>
                    <label><small>Welcome to the Online Claim Notification of Compreline Insurance! Please complete the form below to facilitate the notification of your claim. Our Representative will immediately get in touch with you regarding this claim. Thank you.</small></label><br/><br/>
                <form id="add" name = "add" action = "/user/claims/send" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-4" style = "display: none;">
                    <input id = "notifby_check" name = "notifby_check" type="text" class="form-control">
                 </div>
                <div class="col-md-4" style = "display: none;">
                   <input id = "time" name = "time" type="text" class="form-control">
                </div>
                <div class="col-md-2" style = "display: none;">
                   <input id = "claimid" name = "claimid" type="text" class="form-control">
                </div>
                <div class="col-md-2" style = "display: none;">
                   <input id = "inscompid" name = "inscompid" type="text" class="form-control">
                </div>
                    <div>
                        <label><small><b>A. Policy Holder Details</b></small></label><br/>
                        <div class="col-xs-12">
                            <label><small>Insurance Company: </small></label>
                            <select id="new_inscomp" name="new_inscomp" class="selectpicker" data-width="100%">
                            @foreach($inscomp as $ins)
                                <option value="{{$ins->comp_ID}}">{{$ins->comp_name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-xs-12">
                            <br/><label><small>Policy Number: </small></label>
                            <input type="text" id="new_policyno" name="new_policyno" style="width: 100%">
                        </div><br/>
                    </div> <!-- END OF DIV DETAILS -->


                    <div>
                        <div class="col-xs-12">
                            <br/><br/>
                        </div>
                        <label><small><b>B. Details of Claim/Loss</b></small></label>
                        <div class="col-xs-12">
                            <br/><label><small>Date of Loss: </small></label>
                            <input type="date" id="new_lossDate" name="new_lossDate" style="width: 50%">
                        </div><br/>
                        <div class="col-xs-12">
                            <br/><label><small>Estimated Time of Loss: </small></label>
                            <input type="time" id="new_lossTime" name="new_lossTime" style="width: 50%">
                        </div><br/>
                        <div class="col-xs-12">
                            <br/><label><small>Claim Type: </small></label>
                            <select id="new_claimType" name="new_claimType" class="selectpicker" data-width="50%">
                                @foreach($comp as $type)
                                <option value="{{ $type->claimType_ID }}">{{ $type->claimType }}</option>
                                @endforeach
                            </select>
                        </div><br/>
                        <div class="col-xs-12">
                            <br/><label><small>Place of Loss: </small></label>
                            <input type="text" id="new_lossPlace" name="new_lossPlace" style="width: 100%">
                        </div><br/>
                        <div class="col-xs-12">
                            <br/><label><small>Brief Description of the Circumstances of Loss: </small></label>
                            <textarea id="new_descrip" name="new_descrip" style="resize: none;" rows="15" cols="80"></textarea>
                        </div>
                    </div> <!-- END OF DIV DETAILS -->

                    <div>
                        <div class="col-xs-12">
                            <br/><br/>
                        </div>
                        <label><small><b>C. Claim Notified By: </b></small></label>
                        <div class="col-xs-12">
                            <div class="sky_form1 col col-xs-12">
                                <ul>
                                    <br/><li><label class="radio left"><input type="radio" id="new_radio" name="new_radio" onclick="$('#rep').hide(600); $('#notifby_check').val('1');"><i></i>Policy holder&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></li>
                                    <li><label class="radio"><input type="radio" id="new_radio" name="new_radio" onclick="$('#rep').show(600);
                                        $('#notifby_check').val('2');"><i></i>Representative of Policy holder</label></li><br/><br/>
                                </ul>
                            </div>
                        </div>

                        <div id="rep">
                            <div class="row">
                                <div class="col-xs-12">
                                    <br/><label><small><b>If other than the policy holder, please specify the relation to policy holder.</b></small></label>
                                </div>

                                <div class="col-xs-12">
                                    <br/><label><small>Name: </small></label>
                                    <input type="text" id="new_repName" name="new_repName" style="width: 100%;">
                                </div>
                                <div class="col-xs-12">
                                    <br/><label><small>Relation to Policy holder: </small></label>
                                    <input type="text" id="new_repRel" name="new_repRel" style="width: 100%;">
                                </div>

                                <div class="col-xs-12">
                                    <br/><br/><label><small><b>Contact Details</b></small></label>
                                </div>

                                <div class="col-xs-12">
                                    <br/><label><small>Telephone: </small></label>
                                    <input type="text" id="new_repTel" name="new_repTel" style="width: 100%;">
                                </div>

                                <div class="col-xs-12">
                                    <br/><label><small>Cellphone Number: </small></label>
                                    <input type="text" id="new_repCpnum" name="new_repCpnum" style="width: 100%;">
                                </div>

                                <div class="col-xs-12">
                                    <br/><label><small>Cellphone Number (Alternate): </small></label>
                                    <input type="text" id="new_repCpnum2" name="new_repCpnum2" style="width: 100%;">
                                </div>

                                <div class="col-xs-12">
                                    <br/><label><small>Email: </small></label>
                                    <input type="email" id="new_repEmail" name="new_repEmail" style="width: 100%;">
                                </div>
                            </div>
                        </div>

                    </div> <!-- END OF DIV DETAILS -->

                    <div>
                        <div class="col-xs-12">
                            <br/><br/>
                        </div>

                        <div class="col-xs-12">
                            <br/><button type="button" class="btn btn-block btn-primary" onclick="window.open('{{ URL::asset('/claim/requirements') }}')">View claim requirements</button>
                        </div>

                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-block btn-success" onclick="
                            document.getElementById('time').value = formatDate(new Date());
                            document.getElementById('notifby_check').value = getVal();
                            document.getElementById('claimid').value = getClaimId();
                            document.getElementById('inscompid').value = getCompId();
                            ">Submit</button>
                        </div>
                    </div> <!-- END OF DIV DETAILS -->
                </form>
                </div><!-- END OF DIV FLOAT RIGHT -->

                <div class="row">
                    <div class="col-xs-12">
                            <br/><br/>
                        </div>
                </div>
        </div>

        <div class="row">
        </div>
    </div>
</div>
</section>

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

        function getVal(rc){
           rc = $('#notifby_check').val();
           return rc;
        } 

        function getClaimId(clid){
           clid = $('#claimid').val();
           return clid;
        } 

        function getCompId(cli){
           cli = $('#inscompid').val();
           return cli;
        } 

        $('#new_claimType').on('change textInput input', function () {
            $('#claimid').val($('#new_claimType').val());
        });

        $('#new_inscomp').on('change textInput input', function () {
            $('#inscompid').val($('#new_inscomp').val());
        });
</script>

<script>
//according menu

$(document).ready(function()
{
    $('#rep').hide(200);
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
  $("form[name='add']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      new_inscomp:{
        required: true,
      },
      new_policyno:{
        required: true,
      },
      new_lossDate:{
        required: true,
      },
      new_lossTime:{
        required: true,
      },
      new_claimType:{
        required: true,
      },
      new_lossPlace:{
        required: true,
      },
      new_descrip:{
        required: true,
      },
      new_repCpnum:{
        cpValidator: true
      },
      new_repCpnum2:{
        cpValidator: true
      },
      new_repTel:{
        maxlength: 7
      },
      new_repEmail:{
        email: true
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
@endsection