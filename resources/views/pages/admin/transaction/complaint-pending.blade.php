@extends('pages.admin.master')

@section('title','Insurance Accounts - Transaction| i-Insure')

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
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('admin/transaction/complaint-online') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('admin/transaction/complaint-online') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Pending Complaints</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="pend" class="list-group-item active" onclick="
                                        $('#pending').show(800);
                                        $('#assign').hide(800);
                                        $('#pend').addClass('active');
                                        $('#ass').removeClass('active');
                                        $('body,html').animate({
                                                                    scrollTop: 0
                                                                }, 500);
                                                                return false;
                                        ">
                                Pending Complaints
                            </a>
                            <a href="javascript:void(0);" id="ass" class="list-group-item disabled">
                                Assign
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card" id="pending">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/1.png')}}" style="height: 50px; width: 50px;"><b> Pending Complaints </b></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Complaint #</th>
                                        <th>Complaint Type</th>
                                        <th class="col-md-12">Complaint Details</th>
                                        <th>Complainant</th>
                                        <th class="col-md-2">Date Received</th>
                                        <th class="col-md-1">Status</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($complaints as $comp)
                                     @if($comp->status == 0)
                                     <tr>
                                        <td>{{str_pad($comp->complaint_ID,11, "0", STR_PAD_LEFT)}}</td>
                                        <td>{{$comp->complaintType_name}}</td>
                                        <td>{{$comp->complaint}}</td>
                                        <td>{{$comp->name}}</td>
                                        <td>{{\Carbon\Carbon::parse($comp->date_sent)->format("M d,Y h:i:s")}}</td>
                                        <td><span class="label bg-blue">new</span></td>
                                        <td><button type="button" class="btn bg-blue waves-effect view" style="position: right;"  data-toggle="tooltip" data-placement="left" title="View Details" data-id = "{{$comp->complaint_ID}}">
                                            <i class="material-icons">security</i><span style="font-size: 15px;">
                                        </button>
                                        <button type="button" class="btn bg-green waves-effect" style="position: right;" data-toggle="tooltip" data-placement="left" title="Assign employee to solve this complaint" onclick="
                                        $('#ID').val('{{$comp->complaint_ID}}');
                                        $(this).parents('#pending').hide(800);
                                        $('#assign').show(800);
                                        $('#pend').removeClass('active');
                                        $('#ass').removeClass('disabled');
                                        $('#ass').addClass('active');
                                        $('body,html').animate({
                                                                    scrollTop: 0
                                                                }, 500);
                                                                return false;
                                        ">
                                            <i class="material-icons">thumb_up</i><span style="font-size: 15px;">
                                        </button>
                                        </td>
                                     </tr>
                                     @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->

                    <div class="card" id="assign">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/1.png')}}" style="height: 50px; width: 50px;"><b> Assign Employee </b></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <form id="add" name = "add" action = "complaint-pending/update" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-4" style = "display: none;">
                           <input id = "ID" name = "ID" type="text" class="form-control" pattern="[A-Za-z'-]">
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
                                <div class="col-md-12">
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
                     </form>
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
    </section>

    <form id = "view" name = "view" action="complaint-pending/view" method="GET">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-md-4" style = "display: none;">
           <input id = "view_ID" name = "ID" type="text" class="form-control" pattern="[A-Za-z'-]">
        </div>
    </form>

     <script type="text/javascript">
        window.onload = function(){
            document.getElementById("assign").style.display = 'none';
        };

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

        $('#employee').on('change', function(){
            emp_display();
        });

        $('.view').on('click', function(){
            var id = $(this).data('id');
            $('#view_ID').val(id);
            $('#view').submit();
        });
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
@endsection
