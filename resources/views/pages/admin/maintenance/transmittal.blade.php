@extends('pages.admin.master')

@section('title','Transmittal Documents - Maintenance | i-Insure')

@section('maintenance','active')

@section('m_transmit','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- ADD INST MODAL -->
            <div class="collapse fade" id="addVTypeModal" role="dialog">
                <div class="modal-dialog animated zoomInLeft active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-add">
                            <h4><br/>CREATE NEW TRANSMITTAL DOCUMENT RECORD</h4>
                        </div><br/><br/>
                        <div class="modal-body">
                            <form id="add" name = "add" action = "transmittal/submit" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "transRec" name = "transRec" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                                <label class="form-label">Document Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <textarea id = "transRec_desc" name = "transRec_desc" rows="4" class="form-control no-resize auto-growth"></textarea>
                                              <label class="form-label">Description </label>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <br/><br/><br/>
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
                                  document.getElementById('avehicle_type_name').value = '';
                                  document.getElementById('avehicle_type_desc').value = '';
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
                            <button type="button" class="btn btn-link waves-effect" data-toggle="collapse" data-target="#addVTypeModal" onclick="
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
                            <h4><br/>TRANSMITTAL DOCUMENT DETAILS
                            </h4>
                        </div><br/>
                        <button id = "Edit" style = "margin-left: 32em" type="button" class="btn btn-success btn-lg waves-effect"
                        onclick = "
                        document.getElementById('view').action = 'transmittal/update';
                        $('#Edit').prop('disabled', true);
                        $('#Delete').prop('disabled', false);
                        $('#schange').show();
                        $('#atransRec').prop('disabled', false);
                        $('#atransRec_desc').prop('disabled', false);
                        $('#schange').html('SAVE CHANGES');
                        $( '#atransRec' ).focus();
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
                        document.getElementById('view').action = 'transmittal/delete';
                        $('#Edit').prop('disabled', false);
                        $('#Delete').prop('disabled', true);
                        $('#schange').show();
                        $('#atransRec').prop('disabled', true);
                        $('#atransRec_desc').prop('disabled', true);
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
                                  <input id = "id" type="text" class="form-control" name="id" pattern="[A-Za-z'-]">
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Document Name :</small></label>
                                                <input id = "atransRec" name = "atransRec" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <label><small>Description :</small></label>
                                              <textarea id = "atransRec_desc" name = "atransRec_desc" rows="4" class="form-control no-resize auto-growth" disabled></textarea>
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
                          $('#avehicle_type_name').prop('disabled', true);
                          $('#avehicle_type_desc').prop('disabled', true);">CLOSE</button>
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
                                MAINTENANCE - TRANSMITTAL DOCUMENTS
                            </b></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <li>
                                <button id = "addbtn" form = "add" type="submit" class="btn bg-blue waves-effect" data-toggle="collapse" data-target="#addVTypeModal" onclick="$('#addbtn').hide();">
                                    <i class="material-icons">add_circle_outline</i>
                                    <span>Add Document</span>
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
                                        <th class="col-md-2">Document Name</th>
                                        <th>Description</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($transrecord as $trec)
                                   @if($trec->del_flag == 0)
                                    <tr>
                                      <td><input type="checkbox" id="{{ $trec->transRec_ID }}" data-id = "{{ $trec->transRec_ID }}" class="filled-in chk-col-red checkCheckbox"/>
                                      <label for="{{ $trec->transRec_ID }}"></label></td>
                                      <td>
                                        {{ $trec->transRec }}
                                      </td>
                                      <td>
                                        {{ $trec->transRec_desc }}
                                      </td>
                                      <td>
                                      <div class="icon-button-demo">
                                          <button type="button" class="btn bg-light-blue waves-effect" data-toggle="collapse" data-target="#largeModal"
                                          data-id = "{{ $trec->transRec_ID }}"
                                          data-name = "{{ $trec->transRec  }}"
                                          data-desc = "{{ $trec->transRec_desc  }}"

                                          data-created = '{{ \Carbon\Carbon::parse($trec->created_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($trec->created_at)->format("l, h:i:s A").")" }}'

                                          data-updated = '{{ \Carbon\Carbon::parse($trec->updated_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($trec->updated_at)->format("l, h:i:s A").")" }}'

                                          onclick= "
                                          document.getElementById('id').value = $(this).data('id');
                                          document.getElementById('atransRec').value = $(this).data('name');
                                          document.getElementById('atransRec_desc').value = $(this).data('desc');

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
                  transRec:{
                    required: true,
                    maxlength: 50
                  },
                  transRec_desc:{
                    maxlength: 100
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
                  atransRec:{
                    required: true,
                    maxlength: 50
                  },
                  atransRec_desc:{
                    maxlength: 100
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

          $('#addVTypeModal').on('hidden.bs.modal', function() {
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

          return year + '-' + monthIndex + '-' + day + ' ' + h + ':' + m + ':' + s + '.000';
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
                  url: '/admin/maintenance/transmittal/ardelete',
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
