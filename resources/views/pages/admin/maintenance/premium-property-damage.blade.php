@extends('pages.admin.master')

@section('title','Property Damage Premiums - Maintenance | i-Insure')

@section('maintenance','active')

@section('premiums','active')

@section('pd','active')

@section('body')
    <script>
        function numberWithCommas(x) {
            x = x + '';
            num = x.split('.');
            variable = num[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            output = variable + "." + num[1];
            if (!num[1])
            {
                output = variable;
            }
            return output;
        }
    </script>
    <section class="content">
        <div class="container-fluid">
            <!-- ADD INST MODAL -->
            <div class="collapse fade" id="addCTypeModal"role="dialog">
                <div class="modal-dialog animated zoomInLeft active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-add">
                            <h4><br/>CREATE NEW PROPERTY DAMAGE PREMIUM RECORD</h4>
                        </div><br/><br/>
                            <div class="modal-body">
                                <form id="add" name = "add" action = "property-damage/submit" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                        <label><small>Insurance Company:</small></label>
                                        <select id = "insurance_compID" name = "insurance_compID" class="form-control show-tick" data-live-search="true" onchange="$('#add').valid()">
                                            <option value = "" style = "display:none;">-- Select Insurance Company --</option>
                                            @foreach($com as $company)
                                             @if($company->del_flag == 0)
                                              @if($company->company_type == 0)
                                                <option value = "{{ $company->comp_ID }}">{{ $company->comp_name }}</option>
                                              @endif
                                             @endif
                                            @endforeach
                                        </select>
                                        <br/>
                                        <br/>
                                        </div>
                                        </div><br/>
                                        <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input id = "insuranceLimit" name = "insuranceLimit" type="number" class="form-control" required>
                                                        <label class="form-label">Insurance Cover Limit</label>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="col-md-12">
                                            <h3><small><b>PRICES:</b></small></h3><br/>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input id = "privateCar" name = "privateCar" type="number" class="form-control" required>
                                                        <label class="form-label">For Private Car (PC):</label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input id = "cv_Light" name = "cv_Light" type="number" class="form-control" required>
                                                        <label class="form-label">For Commercial Vehicle (CV - Light & Medium):</label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input id = "cv_Heavy" name = "cv_Heavy" type="number" class="form-control" required>
                                                        <label class="form-label">For Commercial Vehicle (CV - Heavy):</label>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <br/><br/>
                                    <div class="col-md-4" style = "display: none;">
                                       <input id = "time" name = "time" type="text" class="form-control" pattern="[A-Za-z'-]">
                                    </div>
                            </div>
                        <div class="modal-footer js-sweetalert">
                            <button class="btn btn-primary waves-effect" type="button" onclick = "
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
                                <button type="button" class="btn btn-link waves-effect" data-toggle="collapse" data-target="#addCTypeModal" onclick="
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
                            <h4><br/>PROPERTY DAMAGE PREMIUM DETAILS
                            </h4>
                        </div><br/>
                        <button id = "Edit" style = "margin-left: 32em" type="button" class="btn btn-success btn-lg waves-effect"
                        onclick = "
                        document.getElementById('view').action = 'property-damage/update';
                        $('#Edit').prop('disabled', true);
                        $('#Delete').prop('disabled', false);
                        $('#schange').show();
                        document.getElementById('ainsurance_compID').disabled=false;
                        $('#ainsuranceLimit').prop('readonly', false);
                        $('#aprivateCar').prop('readonly', false);
                        $('#acv_Light').prop('readonly', false);
                        $('#acv_Heavy').prop('readonly', false);
                        $('#schange').html('SAVE CHANGES');
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
                        document.getElementById('view').action = 'property-damage/delete';
                        $('#Edit').prop('disabled', false);
                        $('#Delete').prop('disabled', true);
                        $('#schange').show();
                        document.getElementById('ainsurance_compID').disabled=true;
                        $('#ainsuranceLimit').prop('readonly', true);
                        $('#aprivateCar').prop('readonly', true);
                        $('#acv_Light').prop('readonly', true);
                        $('#acv_Heavy').prop('readonly', true);
                        $('#schange').html('DELETE RECORD');
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
                        <br/>
                            <div class="modal-body">
                              <form id = "view" name = "view" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row clearfix">
                                    <div class="col-md-1">
                                       <label for="date_created"><small><small>Date Created</small></small></label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <small><input type="text" id="date_created" class="form-control" readonly="true"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="last_update"><small><small>Last Update</small></small></label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <small><input type="text" id="last_update" class="form-control" readonly="true"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                        <div class="col-sm-6">
                                        <div class="form-group form-float">
                                        <label><small>Insurance Company:</small></label>
                                        <select id = "ainsurance_compID" name = "ainsurance_compID" class="form-control show-tick" data-live-search="true" onchange="$('#view').valid()">
                                            <option value = "" style = "display:none;">-- Select Insurance Company --</option>
                                            @foreach($com as $company)
                                             @if($company->del_flag == 0)
                                              @if($company->company_type == 0)
                                                <option value = "{{ $company->comp_ID }}">{{ $company->comp_name }}</option>
                                              @endif
                                             @endif
                                            @endforeach
                                        </select>
                                        <br/>
                                        <br/>
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Insurance Cover Limit :</small></label>
                                                        <input id = "ainsuranceLimit" name = "ainsuranceLimit" type="number" class="form-control" readonly="true" required>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-12">
                                        <h3><small><b>PRICES:</b></small></h3><br/>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                            <label><small>For Private Car (PC):</small></label>
                                                                <input id = "aprivateCar" name = "aprivateCar" type="number" rows="1" class="form-control" readonly="true">
                                                            </div>
                                                        </div>
                                                </div>

                                                <div class="col-md-6">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                            <label><small>For Commercial Vehicle (CV - Light & Medium):</small></label>
                                                                <input id = "acv_Light" name = "acv_Light" type="number" rows="1" class="form-control" readonly="true">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                            <label><small>For Commercial Vehicle (CV - Heavy):</small></label>
                                                                <input id = "acv_Heavy" name = "acv_Heavy" type="number" rows="1" class="form-control" readonly="true">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div><br/><br/><div class="col-md-4" style = "display: none;">
                               <input id = "id" name = "id" type="text" class="form-control">
                            </div>
                            <div class="col-md-4" style = "display: none;">
                               <input id = "atime" name = "atime" type="text" class="form-control">
                            </div>
                        <div class="modal-footer js-sweetalert">
                            <button id = "schange" class="btn btn-primary waves-effect" style = "display: none;" type="button" onclick = "
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
                            $('#Edit').prop('disabled', false);
                            $('#Delete').prop('disabled', false);
                            $('#schange').hide();
                            document.getElementById('ainsurance_compID').disabled=true;
                            $('#ainsuranceLimit').prop('readonly', true);
                            $('#aprivateCar').prop('readonly', true);
                            $('#acv_Light').prop('readonly', true);
                            $('#acv_Heavy').prop('readonly', true);
                            ">CLOSE</button>
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
                                MAINTENANCE - PROPERTY DAMAGE PREMIUM
                            </b></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <li>
                                <button id = "addbtn" form = "add" type="submit" class="btn bg-blue waves-effect" data-toggle="collapse" data-target="#addCTypeModal" onclick="
                                    $('#addbtn').hide();">
                                    <i class="material-icons">contacts</i>
                                    <span>Add New Premium Cover</span>
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
                                        <th>Insurance Company</th>
                                        <th class="col-md-2">Insurance Cover Limit</th>
                                        <th class="col-md-2">PC</th>
                                        <th class="col-md-2">CV (Light & Medium)</th>
                                        <th class="col-md-2">CV (Heavy)</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($pdg as $bi)
                                     @if($bi->del_flag == 0)
                                      @if($bi->damage_type == 1)
                                      @foreach($com as $company)
                                        @if($bi->insurance_compID == $company->comp_ID)
                                        <tr>
                                        <td><input type="checkbox" id="{{ $bi->premiumDG_ID }}" name = "del_check" class="filled-in chk-col-red checkCheckbox" data-id = "{{ $bi->premiumDG_ID }}"/>
                                              <label for="{{ $bi->premiumDG_ID }}"></label></td>
                                        <td>{{ $company->comp_name }}</td>
                                        <td>
                                            <script>
                                                var data = numberWithCommas({{ $bi->insuranceLimit }}); document.write("₱ " + data);
                                            </script>
                                        </td>
                                        <td>
                                            <script>
                                                var data = numberWithCommas({{ $bi->privateCar }}); document.write("₱ " + data);
                                            </script>
                                        </td>
                                        <td>
                                            <script>
                                                var data = numberWithCommas({{ $bi->cv_Light }}); document.write("₱ " + data);
                                            </script>
                                        </td>
                                        <td>
                                            <script>
                                                var data = numberWithCommas({{ $bi->cv_Heavy }}); document.write("₱ " + data);
                                            </script>
                                        </td>
                                        <td><button type="button" class="btn bg-light-blue waves-effect" data-toggle="collapse" data-target="#largeModal"
                                              data-id = "{{ $bi->premiumDG_ID }}"
                                              data-cmpid = "{{ $bi->insurance_compID }}"
                                              data-inslimit = "{{ $bi->insuranceLimit }}"
                                              data-pc = "{{ $bi->privateCar }}"
                                              data-clight = "{{ $bi->cv_Light }}"
                                              data-cheavy = "{{ $bi->cv_Heavy }}"

                                              data-created = '{{ \Carbon\Carbon::parse($bi->created_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($bi->created_at)->format("l, h:i:s A").")" }}'

                                              data-updated = '{{ \Carbon\Carbon::parse($bi->updated_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($bi->updated_at)->format("l, h:i:s A").")" }}'

                                              onclick= "
                                              document.getElementById('ainsurance_compID').disabled=true;

                                              document.getElementById('id').value = $(this).data('id');
                                              document.getElementById('ainsuranceLimit').value = $(this).data('inslimit');
                                              document.getElementById('aprivateCar').value = $(this).data('pc');
                                              document.getElementById('acv_Light').value = $(this).data('clight');
                                              document.getElementById('acv_Heavy').value = $(this).data('cheavy');
                                              $('#ainsurance_compID').val($(this).data('cmpid')).change();

                                              document.getElementById('date_created').value = $(this).data('created');
                                              document.getElementById('last_update').value = $(this).data('updated'); 
                                              ">

                                              <i class="material-icons">remove_red_eye</i>
                                              <span>View</span>
                                              </button></td>
                                              </tr>
                                    @endif
                                  @endforeach 
                                  @endif
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
                  insurance_compID:{
                    required: true
                  },
                  insuranceLimit:{
                    required: true,
                  },
                  privateCar:{
                    required: true,
                  },
                  cv_Light:{
                    required: true,
                  },
                  cv_Heavy:{
                    required: true,
                  },
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
                  ainsurance_compID:{
                    required: true
                  },
                  ainsuranceLimit:{
                    required: true,
                  },
                  aprivateCar:{
                    required: true,
                  },
                  acv_Light:{
                    required: true,
                  },
                  acv_Heavy:{
                    required: true,
                  },
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

        $('#addCTypeModal').on('hidden.bs.modal', function() {
            $('#add').trigger('reset');
        });

        $('#largeModal').on('hidden.bs.modal', function() {
            $('#view').trigger('reset');
            $('#Edit').prop('disabled', false);
            $('#Delete').prop('disabled', false);
            $('#schange').hide();
        });

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
                  url: '/admin/maintenance/property-damage/ardelete',
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
