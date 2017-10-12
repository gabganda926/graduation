@extends('pages.admin.master')

@section('title','Complaint - Transaction| i-Insure')

@section('trans','active')

@section('transComplaint','active')

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

        $('#date_assign').val(yyyy+'-'+mm+'-'+dd);

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
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('admin/transaction/complaint-online') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('admin/transaction/complaint-online') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> New Complaint</a></li>
                    </ol>
                </div>
            </div>
            <form id="add" name = "add" action = "complaint-new/action" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row clearfix">
                <!-- PAYMENT DETAILS -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>BASIC DETAILS</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Date Received:</small></label>
                                            <input id = "date_recieved" name = "date_recieved" type="date" class="form-control" pattern="[A-Za-z'-]" disabled required>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Insurance Company:</small></label>
                                            <select id = "aadd_region" name = "aadd_region" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" style = "display: none;">-- Select Insurance Company --</option>
                                                        <option value = "I">12345</option>
                                                        <option value = "II">67890</option>
                                                        <option value = "III">111111</option>
                                                </select>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Policy Number:</small></label>
                                            <select id = "policy_number" name = "policy_number" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" style = "display: none;">-- Select Policy Number --</option>
                                                  @foreach($complaints as $comp)
                                                   @if($comp->status == 0)
                                                    <option value = "{{$comp->complaint_ID}}">{{$comp->policy_number}}</option>
                                                   @endif
                                                  @endforeach
                                                </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="button" id = "next" class="btn btn-block bg-blue waves-effect left" onclick="
                                    $('#clientDet').show(500);
                                    $('#complDet').show(500);">
                                        <span style="font-size: 15px;"> NEXT</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PAYMENT DETAILS -->
                <!-- BREAKDOWN -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card" id="assign">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/1.png')}}" style="height: 50px; width: 50px;"><b> Assign Employee </b></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Assign Date:</small></label>
                                            <input id = "date_assign" name = "date_assign" type="date" class="form-control" placeholder="Telephone" readonly="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label><small>Employee:</small></label>
                                    <select id = "employee" name = "employee" class="form-control show-tick" data-live-search="true" >
                                      <option selected value = "" style = "display: none;">-- Select Employee --</option>
                                      @foreach($employees as $emp)
                                        @foreach($details as $dtails)
                                         @if($emp->emp_ID == $dtails->agent_ID)
                                          @foreach($pinfo as $info)
                                           @if($dtails->personal_info_ID == $info->pinfo_ID)
                                            <option value = "{{$emp->emp_ID}}">{{$info->pinfo_last_name}}, {{$info->pinfo_first_name}} {{$info->pinfo_middle_name}}</option>
                                           @endif
                                          @endforeach
                                         @endif
                                        @endforeach
                                      @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Cellphone Number:</small></label>
                                            <input id = "emp_cp1" name = "emp_cp1" type="text" class="form-control" placeholder="Telephone" readonly="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Cellphone Number (Alternate):</small></label>
                                            <input id = "emp_cp2" name = "emp_cp2" type="text" class="form-control" placeholder="Telephone" readonly="true">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Telephone:</small></label>
                                            <input id = "emp_tpnum" name = "emp_tpnum" type="text" class="form-control" placeholder="Telephone" readonly="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Email:</small></label>
                                            <input id = "emp_email" name = "emp_email" type="email" class="form-control" placeholder="Telephone" readonly="true">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label><small>Set Priority:</small></label>
                                    <select id = "priority" name = "priority" class="form-control show-tick" data-live-search="true" >
                                        <option value = "0">High</option>
                                        <option value = "1">Medium</option>
                                        <option value = "2">Low</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-block bg-blue waves-effect left" onclick="
                                    $('#clientDet').show(500);
                                    $('#complDet').show(500);
                                    $(this).parents('#assign').hide(500);
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                        <span style="font-size: 15px;"> PREVIOUS</span>
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" id="next1"  class="btn btn-block bg-green waves-effect left" onclick="
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
                                    }">
                                        <span style="font-size: 15px;"> SUBMIT</span>
                                    </button>
                                </div>
                            </div>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                    
                    <div class="card" id="clientDet">
                        <div class="header">
                            <h2>CLIENT DETAILS</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Name:</small></label>
                                            <input id = "name" name = "name" type="text" disabled min="1" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Cellphone Number:</small></label>
                                            <input id = "cp1" name = "cp1" type="text" disabled min="1" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Cellphone Number (Alternate):</small></label>
                                            <input id = "cp2" name = "cp2" type="text" disabled min="1" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Telephone:</small></label>
                                            <input id = "tpnum" name = "tpnum" type="text" disabled min="1" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Email:</small></label>
                                            <input id = "email" name = "email" type="text" disabled min="1" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Address:</small></label>
                                            <textarea id = "address" rowa="2" name = "address" type="text" disabled min="1" class="form-control" pattern="[A-Za-z'-]" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# BREAKDOWN -->
            </div>

            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card" id="complDet">
                        <div class="header">
                            <h2>COMPLAINT DETAILS</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Complaint Type:</small></label>
                                            <input id = "comp_type" name = "comp_type" type="text" disabled min="1" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Complaint Details:</small></label>
                                            <textarea id = "comp_details" rows="10" name = "comp_details" type="text" disabled class="form-control" pattern="[A-Za-z'-]" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-block bg-blue waves-effect left" onclick="
                                    $('#clientDet').hide(500);
                                    $(this).parents('#complDet').hide(500);
                                    $('#assign').show(500);
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

                    
                </div> <!-- END OF COL XS -->
            </div> <!-- END OF ROW -->
        </form>
        </div>
    </section>

    <script type="text/javascript">
        window.onload = function(){
            document.getElementById("clientDet").style.display = 'none';
            document.getElementById("complDet").style.display = 'none';
            document.getElementById("assign").style.display = 'none';
        };
    </script>


    <script>
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
              policy_number:{
                required: true,
              },
              employee:{
                required: true,
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
        function client_display()
        {
            var id = $('#policy_number').val();
            var date = '';
            var policy_number = '';
            var name = '';
            var cp_1 = '';
            var cp_2 = '';
            var tp_num = '';
            var email = '';
            var address = '';
            var complaintType_name = '';
            var complaint = '';

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

            $('#date_assign').val(yyyy+'-'+mm+'-'+dd);

            if(id)
            {
                @foreach($complaints as $comp)
                 if('{{$comp->complaint_ID}}' == id)
                 {
                    @if($comp->status == 0)
                    policy_number = '{{$comp->policy_number}}';
                    name = '{{$comp->name}}';
                    cp_1 = '{{$comp->cp_1}}';
                    cp_2 = '{{$comp->cp_2}}';
                    tp_num = '{{$comp->tp_num}}';
                    email = '{{$comp->email}}';
                    address = '{{$comp->address}}';
                    complaintType_name = '{{$comp->complaintType_name}}';
                    complaint = '{{$comp->complaint}}';
                    date = '{{\Carbon\Carbon::parse($comp->date_sent)->format("Y-m-d")}}';
                    @endif
                 }
                @endforeach 
                $('#name').val(name);
                $('#cp1').val(cp_1);
                $('#cp2').val(cp_2);
                $('#tpnum').val(tp_num);
                $('#email').val(email);
                $('#address').val(address);
                $('#comp_type').val(complaintType_name);
                $('#comp_details').val(complaint);
                $('#date_recieved').val(date);
            }
        }

        function emp_display()
        {
            var id = $('#employee').val();
            var cp_1 = '';
            var cp_2 = '';
            var tp_num = '';
            var email = '';

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

            $('#date_assign').val(yyyy+'-'+mm+'-'+dd);

            @foreach($employees as $emp)
             if('{{$emp->emp_ID}}' == id)
             {
              @foreach($details as $dtails)
               @if($emp->emp_ID == $dtails->agent_ID)
                @foreach($pinfo as $info)
                 @if($dtails->personal_info_ID == $info->pinfo_ID)
                  cp_1 = "{{$info->pinfo_cpnum_1}}";
                  cp_2 = "{{$info->pinfo_cpnum_2}}";
                  tp_num = "{{$info->pinfo_tpnum}}";
                  email = "{{$info->pinfo_mail}}";
                 @endif
                @endforeach
               @endif
              @endforeach
              $('#emp_cp1').val(cp_1);
              $('#emp_cp2').val(cp_2);
              $('#emp_tpnum').val(tp_num);
              $('#emp_email').val(email);
             }
            @endforeach
        }

        $('#next').prop('disabled', true);
        $('#policy_number').on('change textInput input', function(){
            if($(this).val())
            {
                $('#next').prop('disabled', false);
                client_display();
            }
        });

        $('#next').on('click', function(){
            client_display();
        });

        $('#employee').on('change', function(){
            emp_display();
        });
    </script>
@endsection