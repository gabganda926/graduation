@extends('pages.admin.master')

@section('title','Complaint - Transaction | i-Insure')

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
        $('#date_recieved').val(yyyy+'-'+mm+'-'+dd);

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
            <div class="row clearfix">
            <form id="add" name = "add" action = "complaint-new/action" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                                            <input id = "date_recieved" name = "date_recieved" type="date" class="form-control" pattern="[A-Za-z'-]" readonly required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Insurance Company:</small></label>
                                            <select id = "insurance_company" name = "insurance_company" class="form-control show-tick" data-live-search="true" >
                                                  <option selected value = "" style = "display: none;">-- Select Insurance Company --</option>
                                                  @foreach($company as $icomp)
                                                    @if($icomp->comp_ID <= 4)
                                                    <option value = "{{$icomp->comp_ID}}">{{$icomp->comp_name}}</option>
                                                    @endif
                                                  @endforeach
                                                </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Policy Number:</small></label>
                                            <select id = "policy_number" name = "policy_number" class="form-control show-tick policy_number" data-live-search="true" >
                                                  <option selected value = "" style = "display: none;">-- Select Policy Number --</option>
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
                                            <input id = "name1" name = "name1" type="text" class="form-control" pattern="[A-Za-z'-]" readonly required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Cellphone Number:</small></label>
                                            <input id = "cp1" name = "cp1" type="text" class="form-control" pattern="[A-Za-z'-]" readonly required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Cellphone Number (Alternate):</small></label>
                                            <input id = "cp2" name = "cp2" type="text" class="form-control" pattern="[A-Za-z'-]" readonly required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Telephone:</small></label>
                                            <input id = "tpnum" name = "tpnum" type="text" class="form-control" pattern="[A-Za-z'-]" readonly required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Email:</small></label>
                                            <input id = "email" name = "email" type="text" class="form-control" pattern="[A-Za-z'-]" readonly required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Address:</small></label>
                                            <textarea id = "address" rowa="2" name = "address" type="text" class="form-control" readonly pattern="[A-Za-z'-]" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <div class="col-xs-12">
                                    <label><small>Complaint Type: </small></label>
                                    <select name="comp_type" class="selectpicker" data-size="10" data-width="100%"> 
                                    @foreach($ctype as $type)
                                     @if($type->del_flag == 0)
                                      <option value = "{{ $type->complaintType_ID }}">{{ $type->complaintType_name }}</option>
                                     @endif
                                    @endforeach
                                      <option value = "0">If others, please specify</option>
                                    </select>
                                </div>
                                <div class="col-xs-12" name = "spc">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small><b>If others, please specify.</b></small></label>
                                            <input type="text" name="specify" style="width: 100%" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>  
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Complaint Details:</small></label>
                                            <textarea id = "comp_details" rows="10" name = "comp_details" type="text"  class="form-control" pattern="[A-Za-z'-]" required></textarea>
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
                <!-- #END# BREAKDOWN -->
            </div>
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
              comp_details:{
                required: true,
              },
              comp_type:{
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
        if($('[name*="comp_type"]').val() == 0)
        {
            $('[name*="spc"]').show();
            $("[name*='specify']").prop('disabled', false);
        }
        else
        {
            $('[name*="spc"]').hide();
            $("[name*='specify']").prop('disabled', true);
        }

        $('[name*="comp_type"]').on('change textInput input', function(){
            if($('[name*="comp_type"]').val() == 0)
            {
                $('[name*="spc"]').show();
                $("[name*='specify']").prop('disabled', false);
            }
            else
            {
                $('[name*="spc"]').hide();
                $("[name*='specify']").prop('disabled', true);
            }
        });

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

        $('#date_recieved').val(yyyy+'-'+mm+'-'+dd);

        function client_display()
        {
            var id = $('#policy_number option:selected').data('id');
            var na = '';
            var cp = '';
            var cp1 = '';
            var tp = '';
            var em = '';
            var ad = '';

            var na_ = '';
            var cp_ = '';
            var cp1_ = '';
            var tp_ = '';
            var em_ = '';
            var ad_ = '';

            console.log(id);

            @foreach($clist as $cli)
            @if($cli->client_type == 1)
             if('{{$cli->client_ID}}' == id)
             {
                @foreach($client as $cl)
                @foreach($pInfo as $info)
                 @if($cl->personal_info_ID == $info->pinfo_ID)
                  na = "{{$info->pinfo_last_name}}, {{$info->pinfo_first_name}} {{$info->pinfo_middle_name}}";
                  cp = "{{$info->pinfo_cpnum_1}}";
                  cp1 = "{{$info->pinfo_cpnum_2}}";
                  tp = "{{$info->pinfo_tpnum}}";
                  em = "{{$info->pinfo_mail}}";
                 @endif
                @endforeach
                @foreach($address as $add)
                 @if($cli->client_add_ID == $add->add_ID)
                  ad = "{{$add->add_blcknum}} {{$add->add_street}} {{$add->add_subdivision}} {{$add->add_brngy}} {{$add->add_district}} {{$add->add_city}} {{$add->add_province}} {{$add->add_region}} {{$add->add_zipcode}}";
                 @endif
                @endforeach
                @endforeach
                        
            $('#name1').val(na);
            $('#cp1').val(cp);
            $('#cp2').val(cp1);
            $('#tpnum').val(tp);
            $('#email').val(em);
            $('#address').val(ad);
             }
             @endif
            @endforeach

            @foreach($clist as $cli1)
             @if($cli1->client_type == 2)
             if('{{$cli1->client_ID}}' == id)
             {
                @foreach($company as $info)
                 @if($cli1->client_ID == $info->comp_ID)
                  na_ = "{{$info->comp_name}}";
                  cp1_ = "N/A";
                  cp_ = "N/A";
                  tp_ = "{{$info->comp_telnum}}";
                  em_ = "{{$info->comp_email}}";

                    @foreach($address as $add)
                     @if($info->comp_add_ID == $add->add_ID)
                      ad_ = "{{$add->add_blcknum}} {{$add->add_street}} {{$add->add_subdivision}} {{$add->add_brngy}} {{$add->add_district}} {{$add->add_city}} {{$add->add_province}} {{$add->add_region}} {{$add->add_zipcode}}";
                     @endif
                    @endforeach
                 @endif
                @endforeach
            $('#name1').val(na_);
            $('#cp1').val(cp_);
            $('#cp2').val(cp1_);
            $('#tpnum').val(tp_);
            $('#email').val(em_);
            $('#address').val(ad_);
             }
             @endif
            @endforeach
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

        $('#insurance_company').on('change textInput input', function (){
            var id = $(this).val();
            $('#policy_number').find('option:not(:first)').remove();
            $('#policy_number').selectpicker('refresh');

            @foreach($policy_num as $pnum)
             if('{{$pnum->insurance_company}}' == id)
             {
                // $('#policy_number option:gt(0)').remove();
                var option = '<option value="{{$pnum->policy_number}}" data-id = "{{$pnum->client_ID}}" >{{$pnum->policy_number}}</option>';
                $('#policy_number:last').append(option);  
                $("#policy_number").prop("selectedIndex", -1);
                $('#policy_number').selectpicker('refresh');
                $('#policy_number').val("");
             }
            @endforeach
        });

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