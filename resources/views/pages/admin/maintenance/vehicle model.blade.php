@extends('pages.admin.master')

@section('title','Vehicle Model - Maintenance | i-Insure')

@section('maintenance','active')

@section('vehicle','active')

@section('vmodel','active')

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
            <div class="collapse fade" id="addVModModal" role="dialog">
                <div class="modal-dialog animated zoomInLeft active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-add">
                            <h4><br/>CREATE NEW VEHICLE MODEL RECORD</h4>
                        </div><br/><br/>
                        <div class="modal-body">
                            <form id="add" name = "add" action = "model/submit" method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div>
                                                <div class="body" align="center">
                                                    <div class="fallback">
                                                        <img id="addImg" src="{{ URL::asset('image/default-image.png') }}" alt="your image" style="height: 210px; width: 215px; border-style: solid; border-width: 2px;">
                                                    </div><br/>
                                                        <input id = "picture" name = "picture" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                        <label><small>Vehicle Type :</small></label>
                                            <select id = "vehicle_type" name = "vehicle_type" class="form-control show-tick" data-live-search="true" onchange="$('#add').valid()">
                                              <option selected value = "" style = "display: none;">-- Select Vehicle Type --</option>
                                              @foreach($type as $vtype)
                                              @if($vtype->del_flag == 0)
                                                <option value = "{{ $vtype->vehicle_type_ID }}">{{ $vtype->vehicle_type_name }}</option>
                                              @endif
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                        <label><small>Vehicle Make :</small></label>
                                            <select id = "vehicle_make" name = "vehicle_make" class="form-control show-tick" data-live-search="true" onchange="$('#add').valid()">
                                              <option selected value = "" style = "display: none;">-- Select Vehicle Make --</option>
                                              @foreach($make as $mke)
                                              @if($mke->del_flag == 0)
                                                <option value = "{{ $mke->vehicle_make_ID }}">{{ $mke->vehicle_make_name }}</option>
                                              @endif
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div><br/>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input id = "vehicle_year" name = "vehicle_year" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                                    <label class="form-label">Vehicle Model Year</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input id = "vehicle_model_name" name = "vehicle_model_name" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                                    <label class="form-label">Vehicle Model Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input id = "vehicle_value" name = "vehicle_value" type="number" min="1" class="form-control" pattern="[A-Za-z'-]" required>
                                                    <label class="form-label">Market Value (in PHP)</label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Depreciation (in %) :</small></label>
                                                <input id = "vehicle_dep" name = "vehicle_dep" type="number" min="1" class="form-control" pattern="[A-Za-z'-]" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/><br/><br/>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "time" name = "time" type="text" class="form-control" pattern="[A-Za-z'-]">
                                </div>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "dep" name = "dep" type="text" class="form-control" pattern="[A-Za-z'-]">
                                </div>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button class="btn btn-primary waves-effect" type="button" onclick = "

                            $('#dep').val($('#vehicle_dep').val());
                            document.getElementById('dep').value = getDep();
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
                                  document.getElementById('avehicle_model_name').value = '';
                                  $('#amake_name').val('').change();
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
                            <button type="button" class="btn btn-link waves-effect" data-toggle="collapse" data-target="#addVModModal" onclick="
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
                            <h4><br/>VEHICLE MODEL DETAILS
                            </h4>
                        </div><br/>
                        <button id = "Edit" style = "margin-left: 32em" type="button" class="btn btn-success btn-lg waves-effect"
                        onclick = "
                        document.getElementById('view').action = 'model/update';
                        $('#Edit').prop('disabled', true);
                        $('#Delete').prop('disabled', false);
                        $('#schange').show();
                        $('#apicture').show();
                        document.getElementById('avehicle_type').disabled=false;
                        document.getElementById('avehicle_make').disabled=false;
                        $('#avehicle_model_name').prop('disabled', false);
                        $('#avehicle_year').prop('disabled', false);
                        $('#avehicle_value').prop('disabled', false);
                        $('#avehicle_dep').prop('disabled', false);
                        $('#schange').html('SAVE CHANGES');
                          $( '#avehicle_model_name' ).focus();
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
                        document.getElementById('view').action = 'model/delete';
                        $('#Edit').prop('disabled', false);
                        $('#Delete').prop('disabled', true);
                        $('#schange').show();
                        $('#apicture').hide();
                        document.getElementById('avehicle_type').disabled=true;
                        document.getElementById('avehicle_make').disabled=true;
                        $('#avehicle_model_name').prop('disabled', true);
                        $('#avehicle_year').prop('disabled', true);
                        $('#avehicle_value').prop('disabled', true);
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
                            <form id="view" name = "view" method="POST" enctype="multipart/form-data">
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
                                  <input id = "id" type="text" class="form-control" name="id" pattern="[A-Za-z'-]">
                                </div>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "adep" name = "adep" type="text" class="form-control" pattern="[A-Za-z'-]">
                                </div>
                                <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div>
                                                <div class="body" align="center">
                                                    <div class="fallback">
                                                        <img id="editImg" src="{{ URL::asset('image/default-image.png') }}" alt="your image" style="height: 210px; width: 215px; border-style: solid; border-width: 2px;">
                                                    </div><br/>
                                                        <input id = "apicture" name = "apicture" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                                </div>
                                            </div>
                                        </div>
                                    </div><br/>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                        <label><small>Vehicle Type :</small></label>
                                            <select id = "avehicle_type" name = "avehicle_type" class="form-control show-tick" data-live-search="true" onchange="$('#view').valid()">
                                              <option selected value = "" style = "display: none;">-- Select Vehicle Type --</option>
                                              @foreach($type as $vtype)
                                              @if($vtype->del_flag == 0)
                                                <option value = "{{ $vtype->vehicle_type_ID }}">{{ $vtype->vehicle_type_name }}</option>
                                              @endif
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                        <label><small>Vehicle Make :</small></label>
                                            <select id = "avehicle_make" name = "avehicle_make" class="form-control show-tick" data-live-search="true" onchange="$('#view').valid()">
                                              <option selected value = "" style = "display: none;">-- Select Vehicle Make --</option>
                                              @foreach($make as $mke)
                                              @if($mke->del_flag == 0)
                                                <option value = "{{ $mke->vehicle_make_ID }}">{{ $mke->vehicle_make_name }}</option>
                                              @endif
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div><br/>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Vehicle Model Year :</small></label>
                                                <input id = "avehicle_year" name = "avehicle_year" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Vehicle Model Name :</small></label>
                                                <input id = "avehicle_model_name" name = "avehicle_model_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Market Value (in PHP) :</small></label>
                                                <input id = "avehicle_value" name = "avehicle_value" type="number" min="1" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Depreciation (in %) :</small></label>
                                                <input id = "avehicle_dep" name = "avehicle_dep" type="number" min="1" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                            </div>
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
                            $('#adep').val($('#avehicle_dep').val());
                            document.getElementById('adep').value = getaDep();
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
                            $('#apicture').hide();
                            document.getElementById('avehicle_type').disabled=true;
                            document.getElementById('avehicle_make').disabled=true;
                            $('#avehicle_model_name').prop('disabled', true);
                            $('#avehicle_year').prop('disabled', true);
                            $('#avehicle_value').prop('disabled', true);
                            $('#avehicle_dep').prop('disabled', true);">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                MAINTENANCE - VEHICLE MODEL
                            </b></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <li>
                                <button id = "addbtn" form = "add" type="submit" class="btn bg-blue waves-effect" data-toggle="collapse" data-target="#addVModModal" onclick="
                                $('#addbtn').hide();">
                                    <i class="material-icons">add_circle_outline</i>
                                    <span>Add Vehicle Model</span>
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
                                        <th class="col-md-1"> </th>
                                        <th>Image</th>
                                        <th>Vehicle Model Year</th>
                                        <th>Vehicle Model Name</th>
                                        <th>Vehicle Make</th>
                                        <th>Vehicle Type</th>
                                        <th>Market Value (in PHP)</th>
                                        <th>Depreciation (%) </th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($model as $mod)
                                  @if($mod->del_flag == 0)
                                  @foreach($make as $mke)
                                  @if($mod->vehicle_make_ID == $mke->vehicle_make_ID)
                                  <tr>
                                    <td><input type="checkbox" id="{{ $mod->vehicle_model_ID }}" class="filled-in chk-col-red checkCheckbox" data-id = "{{ $mod->vehicle_model_ID }}"/>
                                    <label for="{{ $mod->vehicle_model_ID }}"></label></td>
                                    <td><img src="{!! '/image/'.$mod->vehicle_picture !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></td>
                                    <td>{{ $mod->vehicle_year }}</td>
                                    <td>{{ $mod->vehicle_model_name }}</td>
                                    <td>{{ $mke->vehicle_make_name }}</td>
                                    <td>
                                    @foreach($type as $vtype)
                                        @if($mod->vehicle_type == $vtype->vehicle_type_ID)
                                            {{ $vtype->vehicle_type_name }}
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>
                                        <script>
                                            var data = numberWithCommas({{ $mod->vehicle_value }}); document.write("₱" + data);
                                        </script>
                                    </td>
                                    <td>
                                        <?php $percent = ((float)$mod->vehicle_depreciation * 100 ) . '%'; echo $percent; ?>
                                    </td>
                                    <td>
                                    <div class="icon-button-demo">
                                        <button type="button" class="btn bg-light-blue waves-effect" data-toggle="collapse" data-target="#largeModal"
                                        data-id = "{{ $mod->vehicle_model_ID }}"
                                        data-name = "{{ $mod->vehicle_model_name  }}"
                                        data-make = "{{ $mod->vehicle_make_ID }}"
                                        data-year = "{{ $mod->vehicle_year }}"
                                        data-type = "{{ $mod->vehicle_type }}"
                                        data-valu = "{{ $mod->vehicle_value }}"
                                        data-source = '{!! "/image/".$mod->vehicle_picture !!}'

                                        data-created = '{{ \Carbon\Carbon::parse($mod->created_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($mod->created_at)->format("l, h:i:s A").")" }}'

                                        data-updated = '{{ \Carbon\Carbon::parse($mod->updated_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($mod->updated_at)->format("l, h:i:s A").")" }}'
                                        onclick= "
                                        document.getElementById('avehicle_type').disabled=true;
                                        document.getElementById('avehicle_make').disabled=true;

                                        $('#editImg').attr('src', $(this).data('source'));
                                        document.getElementById('id').value = $(this).data('id');
                                        document.getElementById('avehicle_model_name').value = $(this).data('name');
                                        document.getElementById('avehicle_year').value = $(this).data('year');
                                        document.getElementById('avehicle_value').value = $(this).data('valu');
                                        $('#avehicle_type').val($(this).data('type')).change();
                                        $('#avehicle_make').val($(this).data('make')).change();

                                        document.getElementById('date_created').value = $(this).data('created');
                                        document.getElementById('last_update').value = $(this).data('updated'); 
                                        ">
                                            <i class="material-icons">remove_red_eye</i>
                                            <span>View</span>
                                        </button>
                                    </div>
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

    <script>
            $.validator.addMethod("minValue", function(value, element) {
                if(value >= 100000)
                    return true;
                return false;
             }, "Minimum Value is 100,000.");
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
                  vehicle_model_name:{
                    required: true,
                    blcknumber: true,
                    maxlength: 20
                  },
                  vehicle_type:{
                    required: true,
                  },
                  vehicle_make:{
                    required: true,
                  },
                  vehicle_year:{
                    required: true,
                    digits: true,
                    minlength: 4,
                    maxlength: 4
                  },
                  vehicle_value:{
                    required: true,
                    minValue: true
                  },
                  make_name:{
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
                  avehicle_model_name:{
                    required: true,
                    blcknumber: true,
                    maxlength: 20
                  },
                  avehicle_type:{
                    required: true,
                  },
                  avehicle_make:{
                    required: true,
                  },
                  avehicle_year:{
                    required: true,
                    digits: true,
                    minlength: 4,
                    maxlength: 4
                  },
                  avehicle_value:{
                    required: true,
                    minValue: true
                  },
                  amake_name:{
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
        function getDep(a){
           var aa = $('#dep').val();
           a = aa * .01;
           return a;
        } 

        function getaDep(a){
           var aa = $('#adep').val();
           a = aa * .01;
           return a;
        } 

        $('#apicture').hide();          
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

          $('#addVModModal').on('hidden.bs.modal', function() {
            $('#add').trigger('reset');
          })

          $('#largeModal').on('hidden.bs.modal', function() {
              $('#view').trigger('reset');
              $('#Edit').prop('disabled', false);
              $('#Delete').prop('disabled', false);
              $('#schange').hide();
              $('#avehicle_model_name').prop('disabled', true);
          })

        function addZero(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
          
        function areadURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#addImg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            }
        }

        $("#picture").change(function(){
            areadURL(this);
        });

        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#editImg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            }
        }

        $("#apicture").change(function(){
            readURL(this);
        });

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
                  url: '/admin/maintenance/vehicle/model/ardelete',
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
