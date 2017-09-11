@extends('pages.admin.master')

@section('title','Policy Number - Maintenance | i-Insure')

@section('maintenance','active')

@section('insurance','active')

@section('policyno','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
          <!-- ADD INST MODAL -->
            <div class="collapse fade" id="addInstModal" role="dialog">
                <div class="modal-dialog animated zoomInLeft active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-add">
                            <h4><br/>CREATE NEW POLICY NUMBER RECORD</h4>
                        </div><br/><br/>
                        <div class="modal-body">
                            <form id="add" name = "add" action = "policyno/submit" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                      <label class="form-label">Insurance Company</label>
                                        <select id = "compdrop" name = "compdrop" class="form-control show-tick" data-live-search="true" onchange="$('#add').valid()">
                                            <option value = "" style = "display:none;">-- Select Company --</option>
                                            @foreach($clist as $list)
                                             @foreach($com as $company)
                                              @if($list->client_ID == $company->comp_ID)
                                               @if($list->del_flag == 0)
                                                @if($company->comp_type == 0)
                                                 <option value = "{{ $company->comp_ID }}">{{ $company->comp_name }}</option>
                                                @endif
                                               @endif
                                              @endif
                                             @endforeach
                                            @endforeach
                                        </select>
                                        <br/>
                                        <br/>
                                      </div>
                                    </div><br/>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Policy Number</label>
                                                <input id = "pnumbah" name = "pnumbah" type="text" class="form-control" name="name" pattern="[A-Za-z'-]" required>
                                                <label class="form-label">Policy Number</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row clearfix">

                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                        <label class="form-label">Policy Number Status</label>
                                        <select id = "statdrop" name = "statdrop" class="form-control show-tick" data-live-search="true" onchange="$('#add').valid()">
                                          <option value = "" style = "display:none;">-- Select Status --</option>
                                          <option value = "0">New</option>
                                          <option value = "1">Spoiled</option>
                                          <option value = "2">Used</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "time" name = "time" type="text" class="form-control" pattern="[A-Za-z'-]">
                                </div>
                                <br/><br/><br/>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button class="btn btn-primary waves-effect" type="button" onclick = "
                            $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);
                            document.getElementById('time').value = formatDate(new Date());
                            document.getElementById('time').value = formatDate(new Date());
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
                                  document.getElementById('pnumbah').value = '';
                                  $('#statdrop').val('').change();
                                  $('#compdrop').val('').change();
                                } else {
                                    swal({
                                    title: 'Cancelled',
                                    type: 'warning',
                                    timer: 500,
                                    showConfirmButton: false
                                    });
                                }
                              });
                            }">SUBMIT</button>
                            <button type="button" class="btn btn-link waves-effect" data-toggle="collapse" data-target="#addInstModal" onclick="
                            $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);
                            document.getElementById('time').value = formatDate(new Date());
                            $('#add')[0].reset();
                            $('#addbtn').show();">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- #END# ADD INST MODAL -->

            <!-- View INST MODAL-->
              <div class="collapse fade" id="largeModal" role="dialog">
                <div class="modal-dialog animated zoomInRight active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-view">
                            <h4><br/>Policy Number Details
                            </h4>
                        </div><br/><br/>
                        <button id = "Edit" style = "margin-left: 32em" type="button" class="btn btn-success btn-lg waves-effect"
                        onclick = "
                        document.getElementById('view').action = 'policyno/update';
                        $('#Edit').prop('disabled', true);
                        $('#Delete').prop('disabled', false);
                        $('#schange').show();
                        document.getElementById('astatdrop').disabled=false;
                        document.getElementById('acompdrop').disabled=false;
                        $('#apnumbah').prop('readonly', false);
                        $('#schange').html('SAVE CHANGES');
                          $( '#apnumbah' ).focus();
                          $.notify('You can now edit the record', 
                            { 
                              globalPosition: 'top center',
                              autoHideDelay: 1500, 
                              className: 'success',
                            }
                          );
                        ">
                        <i class="material-icons">create</i>
                        <span>Edit</span>
                        </button>
                        <button id = "Delete" type="button" class="btn bg-red btn-lg waves-effect"
                        onclick = "
                        document.getElementById('view').action = 'policyno/delete';
                        $('#Edit').prop('disabled', false);
                        $('#Delete').prop('disabled', true);
                        $('#schange').show();
                        document.getElementById('astatdrop').disabled=true;
                        document.getElementById('acompdrop').disabled=true;
                        $('#apnumbah').prop('readonly', true);
                        $('#schange').html('DELETE RECORD');
                          $( '#schange' ).focus();
                          $.notify('You can now delete the record', 
                            { 
                              globalPosition: 'top center',
                              autoHideDelay: 1500, 
                              className: 'success',
                            }
                          );
                        ">
                        <i class="material-icons">delete_sweep</i>
                        <span>Delete</span>
                        </button>
                        <div class="modal-body">
                            <form id="view" name = "view" method="POST">
                            <div class="row clearfix">
                                <div class="col-md-1">
                                   <label for="date_created"><small><small>Date Created</small></small></label>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <small><input type="text" id="date_created" class="form-control" readonly="true" style="font-size: 12px;"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label for="last_update"><small><small>Last Update</small></small></label>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <small><input type="text" id="last_update" class="form-control" readonly="true" style="font-size: 12px;"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-md-4" style = "display: none;">
                                  <input id = "pnid" type="text" class="form-control" name="pnid" pattern="[A-Za-z'-]">
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                    <label><small>Company :</small></label>
                                        <select id = "acompdrop" name = "acompdrop" class="form-control show-tick" data-live-search="true" onchange="$('#view').valid()">
                                          <option value="" style = "display:none;">-- Select Company --</option>
                                            @foreach($clist as $list)
                                             @foreach($com as $company)
                                              @if($list->client_ID == $company->comp_ID)
                                               @if($company->comp_type == 0)
                                                @if($list->del_flag == 0)
                                                  <option value = "{{ $company->comp_ID }}">{{ $company->comp_name }}</option>
                                                @else
                                                  <option value = "{{ $company->comp_ID }}" style = "display:none;">{{ $company->comp_name }}</option>
                                                @endif
                                               @endif
                                              @endif
                                             @endforeach
                                            @endforeach
                                        </select>
                                        <br/>
                                        <br/>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Policy Number :</small></label>
                                                <input id = "apnumbah" name = "apnumbah" type="text" class="form-control" pattern="[A-Za-z'-]" readonly=" true" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                    <div class="form-group form-float">
                                    <label><small>Status :</small></label>
                                        <select id = "astatdrop" name = "astatdrop" class="form-control show-tick" data-live-search="true" onchange="$('#view').valid()">
                                          <option value="" style = "display:none;">-- Select Status --</option>
                                          <option value = "0">New</option>
                                          <option value = "1">Spoiled</option>
                                          <option value = "2">Used</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <br/><br/><br/>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "atime" name = "atime" type="text" class="form-control">
                                </div>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button id = "schange" class="btn btn-primary waves-effect" style = "display: none;" type="button" onclick = "
                            $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);
                            document.getElementById('time').value = formatDate(new Date());
                            document.getElementById('atime').value = formatDate(new Date());
                            if($('#view').valid())
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
                                  $('#view').submit();
                                } else {
                                    swal({
                                    title: 'Cancelled',
                                    type: 'warning',
                                    timer: 500,
                                    showConfirmButton: false
                                    });
                                }
                              });
                            }">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-toggle="collapse" data-target="#largeModal" onclick="
                            $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);
                            document.getElementById('time').value = formatDate(new Date());
                            $('#Edit').prop('disabled', false);
                            $('#Delete').prop('disabled', false);
                            $('#schange').hide();
                            document.getElementById('astatdrop').disabled=true;
                            document.getElementById('acompdrop').disabled=true;
                            $('#apnumbah').prop('readonly', true);">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- #END# VIEW INST MODAL -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                MAINTENANCE - POLICY NUMBER
                            </b></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <li>
                                <button id = "addbtn" form = "add" type="submit" class="btn bg-blue waves-effect" data-toggle="collapse" data-target="#addInstModal" onclick="
                                $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);
                            document.getElementById('time').value = formatDate(new Date());
                                $('#addbtn').hide();">
                                    <i class="material-icons">library_add</i>
                                    <span>Add Policy Number</span>
                                </button>
                                </li>
                                <li>
                                <button type="button" id = "delete_many" style = "display:none;" class="btn bg-red waves-effect">
                                    <i class="material-icons">delete</i>
                                    <span>Delete</span>
                                </button>
                                </li>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-basic-example animated lightSpeedIn active">
                                <thead>
                                    <tr class="bg-blue-grey">
                                        <th class="col-md-1"></th>
                                        <th>Policy Number</th>
                                        <th>Company</th>
                                        <th>Status</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($pnm as $pnumber)
                                    @if($pnumber->del_flag == 0)
                                      @foreach($com as $company)
                                        @if($pnumber->insurance_compID == $company->comp_ID)
                                          <tr>
                                              <td><input type="checkbox" id="{{ $pnumber->policy_number }}" name = "del_check" class="filled-in chk-col-red checkCheckbox" data-id = "{{ $pnumber->policy_number }}"/>
                                              <label for="{{ $pnumber->policy_number }}"></label></td>
                                              <td>{{ $pnumber->policy_number }}</td>
                                              <td>{{ $company->comp_name }}</td>
                                              <td>
                                                @if($pnumber->policyStatus_ID == 0)
                                                  New
                                                @endif
                                                @if($pnumber->policyStatus_ID == 1)
                                                  Spoiled
                                                @endif
                                                @if($pnumber->policyStatus_ID == 2)
                                                  Used
                                                @endif
                                              </td>                                              
                                              <td>
                                              <button type="button" class="btn bg-light-blue waves-effect" data-toggle="collapse" data-target="#largeModal"
                                              data-pnum = "{{ $pnumber->policy_number }}"
                                              data-cmpid = "{{ $pnumber->insurance_compID }}"
                                              data-stat = "{{ $pnumber->policyStatus_ID }}"

                                              data-created = '{{ \Carbon\Carbon::parse($pnumber->created_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($pnumber->created_at)->format("l, h:i:s A").")" }}'

                                              data-updated = '{{ \Carbon\Carbon::parse($pnumber->updated_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($pnumber->updated_at)->format("l, h:i:s A").")" }}'

                                              onclick= "
                                              $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);
                            document.getElementById('time').value = formatDate(new Date());
                                             document.getElementById('astatdrop').disabled=true;
                                             document.getElementById('acompdrop').disabled=true;

                                              document.getElementById('apnumbah').value = $(this).data('pnum');
                                              document.getElementById('pnid').value = $(this).data('pnum');
                                              $('#astatdrop').val($(this).data('stat')).change();
                                              $('#acompdrop').val($(this).data('cmpid')).change();

                                              document.getElementById('date_created').value = $(this).data('created');
                                              document.getElementById('last_update').value = $(this).data('updated'); 
                                              ">

                                              <i class="material-icons">remove_red_eye</i>
                                              <span>View</span>
                                              </button>
                                              </td>
                                          </tr>
                                        @endif
                                      @endforeach
                                    @endif
                                  @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <script>
            $.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[A-Za-z0-9][A-Za-z0-9 '-.]*$/i.test(value);
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
                  pnumbah:{
                    required: true,
                    alphanumeric: true,
                    maxlength: 20
                  },
                  statdrop:{
                    required: true
                  },
                  compdrop:{
                    required: true
                  }
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                  form.submit();
                }
              });

              $("form[name='view']").validate({
                // Specify validation rules
                rules: {
                  // The key name on the left side is the name attribute
                  // of an input field. Validation rules are defined
                  // on the right side
                  apnumbah:{
                    required: true,
                    alphanumeric: true,
                    maxlength: 20
                  },
                  astatdrop:{
                    required: true
                  },
                  acompdrop:{
                    required: true
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
        $(document).ready(function()
        {
          $('add').validate();
          $('view').validate();
          if ($('.checkCheckbox:checked').length > 0)
          {
               $("#delete_many").show();
          }
          else
          {
              $("#delete_many").hide();
          }

          $(".checkCheckbox").change(
            function()
            {
              if ($('.checkCheckbox:checked').length > 0)
              {
                   $("#delete_many").show();
              }
              else
              {
                  $("#delete_many").hide();
              }
             }
          );
        });

         $(".checkCheckbox").change(
            function()
            {
              if ($('.checkCheckbox:checked').length > 0)
              {
                   $("#delete_many").show();
              }
              else
              {
                   $("#delete_many").hide();
              }
             }
          );

        $('#addInstModal').on('hidden.bs.modal', function() {
          $('#add').trigger('reset');
        })

        $('#largeModal').on('hidden.bs.modal', function() {
            $('#view').trigger('reset');
            $('#Edit').prop('disabled', false);
            $('#Delete').prop('disabled', false);
            $('#schange').hide();
            $('#apnumbah').prop('disabled', true);
        })

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

        var IDS;
        var timenow = formatDate(new Date());
        $('#delete_many').click(function(event){
          IDS = $(".checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#delete_many').click(function(event){
          event.preventDefault();
              $.ajax({

                  type: 'POST',
                  url: '/admin/maintenance/policyno/ardelete',
                  data: {asd:IDS, time:timenow},
                  success:function(xhr){
                      console.log('success');
                      console.log(xhr.responseText);
                      window.location.reload();
                  },
                    error:function(xhr, ajaxOptions, thrownError,data){
                      console.log(xhr.status);
                      console.log(xhr.responseText);
                  }
              });
          });

    </script>
@endsection
