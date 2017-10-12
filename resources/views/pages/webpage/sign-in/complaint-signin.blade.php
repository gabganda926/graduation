@extends('pages.webpage.webmaster')

@section('title','Complaint | i-Insure')

@section('complaint','active')

@section('body')
<section>
<div class="content">
    <div class="container">
        <ol class="breadcrumb">
          <li><a href="/user/home">Home</a></li>
          <li class="active">Complaint</li>
        </ol>

        <div class="row">
            <h1><b>FILE A COMPLAINT</b></h1><br/>
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
                    <h3><b>Help & Support</b></h3><br/>
                    <label><small>Do you have any complains that we can help you with? Feel free to tell us your complain so we can perform better next time.</small></label><br/><br/>

                    <div>
                        <div class="row">
                        <form id="add" name = "add" action = "complaint/send" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-xs-12">
                                <label for="insurance_company"><small>Insurance Company: </small></label>
                                <select id="insurance_company" name = "insurance_company" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                @foreach($comp as $insc)
                                 @if($insc->del_flag == 0)
                                  @if($insc->comp_type == 0)
                                   <option value = "{{ $insc->comp_ID }}">{{ $insc->comp_name }}</option>
                                  @endif
                                 @endif
                                @endforeach
                                </select>
                            </div>
                            <div class="col-xs-12">
                                <br/><label for="1"><small>Policy Number: </small></label>
                                <input type="text" name="policy_number" style="width: 100%">
                            </div><br/>

                            <!-- AUTPMATIC NA DIDISPLAY TO -->
                            <div class="col-xs-12">
                                <br/><label><small>Name: </small></label>
                                <input type="text" name="name" style="width: 100%">
                            </div>
                            <div class="col-xs-12">
                                <br/><label><small>Cellphone Number: </small></label>
                                <input type="text" name="cp1" style="width: 100%">
                            </div>
                            <div class="col-xs-12">
                                <br/><label><small>Cellphone Number (Alternate): </small></label>
                                <input type="text" name="cp2" style="width: 100%">
                            </div>
                            <div class="col-xs-12">
                                <br/><label><small>Telephone: </small></label>
                                <input type="text" name="tpnum" style="width: 100%">
                            </div>
                            <div class="col-xs-12">
                                <br/><label><small>Email: </small></label>
                                <input type="email" name="email" style="width: 100%">
                            </div>
                            <div class="col-xs-12">
                                <br/><label for="1"><small>Address: </small></label>
                                <textarea style="resize: none;" rows="4" cols="74" name = "address"></textarea>
                            </div>
                            <!-- HANGGANG DITO -->

                            <div class="col-xs-12">
                                <br/><label for="comp_type"><small>Complaint Type: </small></label>
                                <select id="comp_type" name="comp_type" class="selectpicker" data-size="10" data-width="100%"> 
                                @foreach($ctype as $type)
                                 @if($type->del_flag == 0)
                                  <option value = "{{ $type->complaintType_ID }}">{{ $type->complaintType_name }}</option>
                                 @endif
                                @endforeach
                                  <option value = "0">If others, please specify</option>
                                </select>
                            </div>
                            <div class="col-xs-12" name = "spc">
                                <br/><label><small><b>If others, please specify.</b></small></label>
                                <input type="text" name="specify" style="width: 100%">
                            </div>

                            <div class="col-xs-12">
                                <br/><label for="1"><small>Brief Description of your Complaint: </small></label>
                                <textarea style="resize: none;" rows="15" cols="74" name="complaint"></textarea>
                            </div>

                            <div class="col-xs-12">
                                <br/><br/><button type="button" class="btn btn-block btn-success" onclick="
                                if($('#add').valid())
                                {                                    
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
                                      $('#add').submit();

                                        document.getElementById('emp_first_name').value = '';
                                        document.getElementById('emp_middle_name').value = '';
                                        document.getElementById('emp_last_name').value = '';
                                        document.getElementById('emp_contact').value = '';
                                        document.getElementById('emp_mail').value = '';
                                    } else {
                                        swal({
                                        title: 'Cancelled',
                                        type: 'warning',
                                        timer: 500,
                                        showConfirmButton: false
                                        });
                                    }
                                  });
                                }
                                ">Submit</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</section>

<script type="text/javascript">
  $('.collapse').on('show.bs.collapse', function () {
    $('.collapse.in').each(function(){
        $(this).collapse('hide');
    });
  });
</script>


<script>
//according menu

$(document).ready(function()
{
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
      insurance_company:{
        required: true,
      },
      policy_number:{
        required: true,
      },
      name:{
        required: true,
      },
      cp1:{
        required: true,
        cpValidator: true
      },
      cp2:{
        cpValidator: true
      },
      tpnum:{
        required: true,
        maxlength: 7
      },
      email:{
        required: true,
        email: true
      },
      address:{
        required: true,
      },
      specify:{
        required: true,
      },
      comp_type:{
        documents: true
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

<script>
    $(document).ready(function(){
        if($('[name*="comp_type"]').val() == 0)
        {
            console.log('asd');
            $('[name*="spc"]').show();
            $("[name*='specify']").prop('disabled', false);
        }
        else
        {
            console.log('123');
            $('[name*="spc"]').hide();
            $("[name*='specify']").prop('disabled', true);
        }

        $('[name*="comp_type"]').on('change textInput input', function(){
            if($('[name*="comp_type"]').val() == 0)
            {
                console.log('asd');
                $('[name*="spc"]').show();
                $("[name*='specify']").prop('disabled', false);
            }
            else
            {
                console.log('123');
                $('[name*="spc"]').hide();
                $("[name*='specify']").prop('disabled', true);
            }
        });
    });
</script>
@endsection
