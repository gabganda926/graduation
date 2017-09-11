@extends('pages.admin.master')

@section('title','Maintenance - Employee | CIMIS')

@section('maintenance','active')

@section('personnel','active')

@section('employee','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
                        <!-- ADD EMPLOYEE MODAL -->
            <div class="collapse fade" id="addEmpModal" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInLeft active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-add">
                            <h4><br/>CREATE NEW EMPLOYEE RECORD</h4>
                        </div>
                        <div class="modal-body">
                            <form id="add" name = "add" action = "employee/submit" method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div><h3><small><b>PERSONAL INFORMATION</b></small></h3></div>
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
                                        <br/><br/>
                                        <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label">First Name</label>
                                                        <input id = "cPerson_first_name" name = "cPerson_first_name" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                     <label class="form-label">Middle Name</label>
                                                        <input id = "cPerson_middle_name" name = "cPerson_middle_name" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                     <label class="form-label">Last Name</label>
                                                        <input id = "cPerson_last_name" name = "cPerson_last_name" type="text" class="form-control">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                <label><small>Gender :</small></label>
                                                    <select id = "pinfo_gender" name = "pinfo_gender" class="form-control show-tick" onchange="$('#add').valid()">
                                                  <option selected value = "" style = "display: none;">-- Gender --</option>
                                                        <option value = "0">Male</option>
                                                        <option value = "1">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Age :</small></label>
                                                        <input id = "age" name = "age" type="text" class="form-control" readonly="true"  >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                  <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Birthdate:</small></label>
                                                        <div class="form-row show-inputbtns">
                                                                <input id = "pinfo_bday" class="form-control" name = "pinfo_bday" type="date" data-date-inline-picker="false" data-date-open-on-focus="true" />
                                                        </div>
                                                    </div>
                                                  </div>
                                            </div>                     
                                        </div> <!-- end of rowclearfix -->
                                        <div class="row clearfix">
                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label class="form-label">Cellphone Number</label>
                                                        <input id = "pinfo_cpnum_1" name = "pinfo_cpnum_1" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label class="form-label">Cellphone Number (Alternate)</label>
                                                        <input id = "pinfo_cpnum_2" name = "pinfo_cpnum_2" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label class="form-label">Tel Num</label>
                                                        <input id = "pinfo_tpnum" name = "pinfo_tpnum" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label class="form-label">E-mail</label>
                                                        <input id = "pinfo_mail" name = "pinfo_mail" type="email" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                <label><small>Employee Role :</small></label>
                                                    <select id = "emp_role" name = "emp_role" class="form-control show-tick" readonly="true" onchange="$('#add').valid()">
                                                  <option selected value = "" style = "display: none;">-- Employee Role --</option>
                                                     @foreach($emprole as $role)
                                                      @if($role->del_flag == 0)
                                                      <option value = "{{$role->emp_role_ID}}">{{$role->emp_role_Name}}</option>
                                                      @endif
                                                     @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                            <div class="form-group form-float">
                                            <input type="checkbox" id="allow_sales" name = "allow_sales" class="filled-in chk-col-green"
                                                data-id=""/>
                                                <label for="allow_sales">Sales Agent</label>
                                            </div>
                                            </div>
                                        </div><br/>
                                <div><h3><small><b>SYSTEM ACCOUNT INFORMATION</b></small></h3></div>
                                <input type="checkbox" id="auto_gen" name = "auto_gen" class="filled-in chk-col-green" checked/>
                                <label for="auto_gen">Auto Generate</label>
                                <div class="row clearfix">
                                        <div class="col-md-2 form-control-label">
                                           <label for="date_created"><small>Username</small></label>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <small><input type="text" id="uname" name = "uname" class="form-control" readonly="true"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 form-control-label">
                                            <label for="last_update"><small>Password</small></label>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <small><input type="password" id="pass" name = "pass" class="form-control" readonly="true"></small>
                                                </div>
                                            <small><a id="showHide" name = "showHide">Show</a></small>
                                            </div>
                                        </div>
                                    </div><br/>
                                <h3> <small><b>RESIDENTIAL ADDRESS</b></small></h3>
                                        <br/>
                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label class="form-label">Blk&Lot/Bldg/Unit</label>
                                                        <input id = "add_blcknum" name = "add_blcknum" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label class="form-label">Street</label>
                                                        <input id = "add_street" name = "add_street" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label class="form-label">Subdivision</label>
                                                        <input id = "add_subdivision" name = "add_subdivision" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label class="form-label">Barangay</label>
                                                        <input id = "add_brngy" name = "add_brngy" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label class="form-label">District</label>
                                                        <input id = "add_district" name = "add_district" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label class="form-label">City/Municipality</label>
                                                        <input id = "add_city" name = "add_city" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label class="form-label">Province</label>
                                                        <input id = "add_province" name = "add_province" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <select id = "add_region" name = "add_region" class="form-control show-tick" data-live-search="true" onchange="$('#add').valid()">
                                                  <option selected value = "" style = "display: none;">-- Select Region --</option>
                                                        <option value = "I">Region I</option>
                                                        <option value = "II">Region II</option>
                                                        <option value = "III">Region III</option>
                                                        <option value = "IV-A">Region IV-A</option>
                                                        <option value = "IV-B">Region IV-B</option>
                                                        <option value = "V">Region V</option>
                                                        <option value = "VI">Region VI</option>
                                                        <option value = "VII">Region VII</option>
                                                        <option value = "VIII">Region VIII</option>
                                                        <option value = "IX">Region IX</option>
                                                        <option value = "X">Region X</option>
                                                        <option value = "XI">Region XI</option>
                                                        <option value = "XII">Region XII</option>
                                                        <option value = "XIII">Region XIII</option>
                                                        <option value = "ARMM">Region ARMM</option>
                                                        <option value = "CAR">Region CAR</option>
                                                        <option value = "NCR">Region NCR</option>\
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label class="form-label">Zip Code</label>
                                                        <input id = "add_zipcode" name = "add_zipcode" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <br/>
                                <br/><br/><br/>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "time" name = "time" type="text" class="form-control">
                                </div>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "allow_selected" name = "allow_selected" type="text" class="form-control">
                                </div>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button class="btn btn-primary waves-effect" type="button" onclick = "
                            $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);
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

                                    document.getElementById('emp_first_name').value = '';
                                    document.getElementById('emp_middle_name').value = '';
                                    document.getElementById('emp_last_name').value = '';
                                    document.getElementById('emp_contact').value = '';
                                    document.getElementById('emp_mail').value = '';

                                    document.getElementById('add_blcknum').value = '';
                                    document.getElementById('add_street').value = '';
                                    document.getElementById('add_subdivision').value = '';
                                    document.getElementById('add_brngy').value = '';
                                    document.getElementById('add_district').value = '';
                                    document.getElementById('add_city').value = '';
                                    document.getElementById('add_province').value = '';
                                    document.getElementById('add_region').value = '';
                                    $('#add_region').val('').change();
                                    document.getElementById('aadd_zipcode').value = '';
                                    $('#emp_type').val('').change();
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
                            <button type="button" class="btn btn-link waves-effect" data-toggle="collapse" data-target="#addEmpModal" onclick="
                            $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);
                            $('#add')[0].reset();
                            $('#addbtn').show();">CLOSE</button>    
                        </div>
                    </form>
                    </div>
                </div>
            </div>
          </div>
            <!-- #END OF MODAL -->

            <!-- VIEW EMP DETAILS MODAL -->
            <div class="collapse fade" id="largeModal" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInRight active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-view">
                            <h4><br/>EMPLOYEE DETAILS
                            </h4>
                        </div><br/>
                        <button id = "Edit" style = "margin-left: 55em" type="button" class="btn btn-success btn-lg waves-effect"
                        onclick = "
                        document.getElementById('view').action = 'employee/update';
                        $('#Edit').prop('disabled', true);
                        $('#Delete').prop('disabled', false);
                        $('#schange').show();
                        $('#apicture').show();
                        document.getElementById('aemp_role').disabled=false;
                        document.getElementById('apinfo_gender').disabled=false;
                        document.getElementById('aallow_sales').disabled=false;
                        document.getElementById('aadd_region').disabled=false;
                        document.getElementById('apinfo_bday').disabled=false;
                        $('#aadd_blcknum').prop('readonly', false);
                        $('#aadd_street').prop('readonly', false);
                        $('#aadd_subdivision').prop('readonly', false);
                        $('#aadd_brngy').prop('readonly', false);
                        $('#aadd_district').prop('readonly', false);
                        $('#aadd_city').prop('readonly', false);
                        $('#aadd_province').prop('readonly', false);
                        $('#aadd_region').prop('readonly', false);
                        $('#aadd_zipcode').prop('readonly', false);
                        $('#acPerson_first_name').prop('readonly', false);
                        $('#acPerson_middle_name').prop('readonly', false);
                        $('#acPerson_last_name').prop('readonly', false);
                        $('#apinfo_mail').prop('readonly', false);
                        $('#apinfo_cpnum_1').prop('readonly', false);
                        $('#apinfo_cpnum_2').prop('readonly', false);
                        $('#apinfo_tpnum').prop('readonly', false);
                        $('#apinfo_bday').prop('readonly', false);
                        $('#apinfo_gender').prop('readonly', false);
                        $('#apicture').prop('disabled', false);
                        $('#schange').html('Save Changes');
                        code = document.getElementById('aallow_selected').value;
                        if(code == 2)
                        {
                          $('#aallow_sales').prop('checked', true);
                        }
                        else
                        {
                          $('#aallow_sales').prop('checked', false);
                        }

                        $( '#acPerson_first_name' ).focus();

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
                        document.getElementById('view').action = 'employee/delete';
                        $('#Edit').prop('disabled', false);
                        $('#Delete').prop('disabled', true);
                        $('#schange').show();
                        $('#apicture').hide();
                        document.getElementById('aemp_role').disabled=true;
                        document.getElementById('apinfo_gender').disabled=true;
                        document.getElementById('aallow_sales').disabled=true;
                        document.getElementById('aadd_region').disabled=true;
                        document.getElementById('apinfo_bday').disabled=true;
                        $('#aadd_blcknum').prop('disabled', true);
                        $('#aadd_street').prop('disabled', true);
                        $('#aadd_subdivision').prop('disabled', true);
                        $('#aadd_brngy').prop('disabled', true);
                        $('#aadd_district').prop('disabled', true);
                        $('#aadd_city').prop('disabled', true);
                        $('#aadd_province').prop('disabled', true);
                        $('#aadd_region').prop('disabled', true);
                        $('#aadd_zipcode').prop('disabled', true);
                        $('#acPerson_first_name').prop('readonly', true);
                        $('#acPerson_middle_name').prop('readonly', true);
                        $('#acPerson_last_name').prop('readonly', true);
                        $('#apinfo_mail').prop('readonly', true);
                        $('#apinfo_cpnum_1').prop('readonly', true);
                        $('#apinfo_cpnum_2').prop('readonly', true);
                        $('#apinfo_tpnum').prop('readonly', true);
                        $('#apinfo_bday').prop('readonly', true);
                        $('#apinfo_gender').prop('readonly', true);
                        $('#apicture').prop('disabled', true);
                        $('#schange').html('Delete Record');
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
                        </button>  <br/>
                        <div class="modal-body">
                            <form id="view" name = "view" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                  <div class="col-md-1">
                                     <label for="date_created"><small><small>Date Created</small></small></label>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <div class="form-line">
                                              <small><input type="text" id="date_created" class="form-control" readonly="true"></small>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-1">
                                      <label for="last_update"><small><small>Last Update</small></small></label>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <div class="form-line">
                                              <small><input type="text" id="last_update" class="form-control" readonly="true"></small>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "aemp_id" name = "aemp_id" type="text" class="form-control">
                             </div>
                             <div class="col-md-4" style = "display: none;">
                                <input id = "pInfo_ID" name = "pInfo_ID" type="text" class="form-control">
                             </div>
                             <div class="col-md-4" style = "display: none;">
                                <input id = "aadd_id" name = "aadd_id" type="text" class="form-control">
                             </div>
                                <h3><small><b>PERSONAL INFORMATION</b></small></h3>
                                        <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div>
                                                <div class="body" align="center">
                                                    <div class="fallback">
                                                        <img id="editImg" src="{{ URL::asset('image/default-image.png') }}" alt="your image" style="height: 210px; width: 215px; border-style: solid; border-width: 2px;">
                                                    </div><br/>
                                                        <input id = "apicture" name = "apicture" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*" readonly="true">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        </div> <!-- END OF ROW CLEARFIX -->
                                        <div class="row clearfix">
                                        <br/><br/>
                                        <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>First Name:</small></label>
                                                        <input id = "acPerson_first_name" name = "acPerson_first_name" type="text" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                     <label><small>Middle Name:</small></label>
                                                        <input id = "acPerson_middle_name" name = "acPerson_middle_name" type="text" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                     <label><small>Last Name:</small></label>
                                                        <input id = "acPerson_last_name" name = "acPerson_last_name" type="text" class="form-control" readonly="true">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                <label><small>Gender :</small></label>
                                                    <select id = "apinfo_gender" name = "apinfo_gender" class="form-control show-tick" readonly="true" onchange="$('#view').valid()"> 
                                                  <option selected value = "" style = "display: none;">-- Gender --</option>
                                                        <option value = "0">Male</option>
                                                        <option value = "1">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Age :</small></label>
                                                        <input id = "aage" name = "aage" type="text" class="form-control" readonly="true"   readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                  <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Birthdate:</small></label>
                                                        <div class="form-row show-inputbtns">
                                                                <input id = "apinfo_bday" class="form-control" name = "apinfo_bday" type="date" data-date-inline-picker="false" data-date-open-on-focus="true" />
                                                        </div>
                                                    </div>
                                                  </div>
                                            </div>                    
                                        </div> <!-- end of rowclearfix -->
                                        <div class="row clearfix">
                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Cellphone Number:</small></label>
                                                        <input id = "apinfo_cpnum_1" name = "apinfo_cpnum_1" type="text" class="form-control"  readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Cellphone Number(Alternate):</small></label>
                                                        <input id = "apinfo_cpnum_2" name = "apinfo_cpnum_2" type="text" class="form-control"  readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Tel. Num.:</small></label>
                                                        <input id = "apinfo_tpnum" name = "apinfo_tpnum" type="text" class="form-control"  readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>E-mail:</small></label>
                                                        <input id = "apinfo_mail" name = "apinfo_mail" type="email" class="form-control"  readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                <label><small>Employee Role :</small></label>
                                                    <select id = "aemp_role" name = "aemp_role" class="form-control show-tick" readonly="true" onchange="$('#view').valid()">
                                                     <option selected value = "" style = "display: none;">-- Employee Role --</option>
                                                     @foreach($emprole as $role)
                                                      @if($role->del_flag == 0)
                                                       <option value = "{{$role->emp_role_ID}}">{{$role->emp_role_Name}}</option>
                                                      @else
                                                       <option style = "display: none;" value = "{{$role->emp_role_ID}}">{{$role->emp_role_Name}}</option>
                                                      @endif
                                                     @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                            <div class="form-group form-float">
                                            <input type="checkbox" id="aallow_sales" name = "aallow_sales" class="filled-in chk-col-green"
                                                data-id=""/>
                                                <label for="aallow_sales">Sales Agent</label>
                                            </div>
                                            </div>
                                        </div><br/>
                                        <div><h3><small><b>SYSTEM ACCOUNT INFORMATION</b></small></h3></div>
                                        <div class="row clearfix">
                                                <div class="col-md-2 form-control-label">
                                                   <label for="date_created"><small>Username</small></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <small><input type="text" id="auname" name = "auname" class="form-control"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 form-control-label">
                                                    <label for="last_update"><small>Password</small></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <small><input type="password" id="apass" name = "apass" class="form-control"></small>
                                                        </div>
                                                    <small><a id="ashowHide" name = "ashowHide">Show</a></small>
                                                    </div>
                                                </div>
                                            </div><br/>
                                        <h3> <small><b>RESIDENTIAL ADDRESS</b></small></h3>
                                        <br/>
                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Blk&Lot/Bldg/Unit: </small></label>
                                                        <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Street:</small></label>
                                                        <input id = "aadd_street" name = "aadd_street" type="text" class="form-control" readonly="true" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Subdivision:</small></label>
                                                        <input id = "aadd_subdivision" name = "aadd_subdivision" type="text" class="form-control"  readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Barangay:</small></label>
                                                        <input id = "aadd_brngy" name = "aadd_brngy" type="text" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>District:</small></label>
                                                        <input id = "aadd_district" name = "aadd_district" type="text" class="form-control"  readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>City/Municipality:</small></label>
                                                        <input id = "aadd_city" name = "aadd_city" type="text" class="form-control"  readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Province:</small></label>
                                                        <input id = "aadd_province" name = "aadd_province" type="text" class="form-control"  readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                <label><small>Region:</small></label>
                                                    <select id = "aadd_region" name = "aadd_region" class="form-control show-tick" data-live-search="true" readonly="true" onchange="$('#view').valid()">
                                                  <option selected value = "" style = "display: none;">-- Select Region --</option>
                                                        <option value = "I">Region I</option>
                                                        <option value = "II">Region II</option>
                                                        <option value = "III">Region III</option>
                                                        <option value = "IV-A">Region IV-A</option>
                                                        <option value = "IV-B">Region IV-B</option>
                                                        <option value = "V">Region V</option>
                                                        <option value = "VI">Region VI</option>
                                                        <option value = "VII">Region VII</option>
                                                        <option value = "VIII">Region VIII</option>
                                                        <option value = "IX">Region IX</option>
                                                        <option value = "X">Region X</option>
                                                        <option value = "XI">Region XI</option>
                                                        <option value = "XII">Region XII</option>
                                                        <option value = "XIII">Region XIII</option>
                                                        <option value = "ARMM">Region ARMM</option>
                                                        <option value = "CAR">Region CAR</option>
                                                        <option value = "NCR">Region NCR</option>\
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Zip Code:</small></label>
                                                        <input id = "aadd_zipcode" name = "aadd_zipcode" type="text" class="form-control"  readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <br/><br/><br/>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "atime" name = "atime" type="text" class="form-control">
                                </div>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "aallow_selected" name = "aallow_selected" type="text" class="form-control">
                                </div>
                        </div>
                        <div class="modal-footer js-sweetalert">
                          <button id = "schange" class="btn btn-primary waves-effect" style = "display: none;" type="button" onclick = "
                          $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);
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
                          <button type="button" class="btn btn-link waves-effect" data-toggle="collapse" data-target="#largeModal" onclick = "
                        $('#Edit').prop('disabled', false);
                        $('#Delete').prop('disabled', false);
                        $('#schange').hide();
                        $('#apicture').hide();
                        $('#aallow_sales').prop('checked', false);
                        document.getElementById('aemp_role').disabled=true;
                        document.getElementById('apinfo_gender').disabled=true;
                        document.getElementById('aallow_sales').disabled=true;
                        document.getElementById('aadd_region').disabled=true;
                        $('#aadd_blcknum').prop('disabled', true);
                        $('#aadd_street').prop('disabled', true);
                        $('#aadd_subdivision').prop('disabled', true);
                        $('#aadd_brngy').prop('disabled', true);
                        $('#aadd_district').prop('disabled', true);
                        $('#aadd_city').prop('disabled', true);
                        $('#aadd_province').prop('disabled', true);
                        $('#aadd_region').prop('disabled', true);
                        $('#aadd_zipcode').prop('disabled', true);
                        $('#acPerson_first_name').prop('readonly', true);
                        $('#acPerson_middle_name').prop('readonly', true);
                        $('#acPerson_last_name').prop('readonly', true);
                        $('#apinfo_mail').prop('readonly', true);
                        $('#apinfo_cpnum_1').prop('readonly', true);
                        $('#apinfo_cpnum_2').prop('readonly', true);
                        $('#apinfo_tpnum').prop('readonly', true);
                        $('#apinfo_bday').prop('readonly', true);
                        $('#apinfo_gender').prop('readonly', true);
                        $('#apicture').prop('disabled', true);
                        $('#schange').html('Delete Record');
                        $( '#schange' ).focus();
                        $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);
                            ">CLOSE</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
            <!-- #END OF MODAL -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                MAINTENANCE - EMPLOYEE
                            </b></h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                <button id = "addbtn" form = "add" type="submit" class="btn bg-blue waves-effect" data-toggle="collapse" data-target="#addEmpModal" onclick="
                                $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);
                                $('#addbtn').hide();">
                                    <i class="material-icons">group_add</i>
                                    <span>Add Employee</span>
                                </button>
                                </li>
                                <li>
                                  <button type="button" id = "delete_many" style = "display:none;" class="btn bg-red waves-effect">
                                      <i class="material-icons">delete</i>
                                      <span>Delete</span>
                                  </button>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable animated lightSpeedIn active">
                                <thead>
                                    <tr class="bg-blue-grey">
                                        <th class="col-md-1"></th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Employee Role</th>
                                        <th>Address</th>
                                        <th class="col-md-3">Contact Details</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($emp as $empdata)
                                    @foreach($sale as $agent)
                                    @if($agent->del_flag == 0)
                                     @if($agent->agent_ID == $empdata->emp_ID)
                                      @foreach($pnf as $pInfo)
                                        @if($agent->personal_info_ID == $pInfo->pinfo_ID)
                                         @foreach($emprole as $role)
                                          @if($empdata->emp_role_ID == $role->emp_role_ID)
                                        <tr>
                                        <td><input type="checkbox" id="{{$empdata->emp_ID}}" name = "del_check" class="filled-in chk-col-red checkCheckbox" data-id = "{{$empdata->emp_ID}}"/>
                                        <label for="{{$empdata->emp_ID}}"></label></td>
                                        <td><img src="{!! '/image/employee/'.$pInfo->pinfo_picture !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></td>
                                        <td>
                                          @if($pInfo->pinfo_middle_name == null)
                                          {{ $pInfo->pinfo_last_name.", ".$pInfo->pinfo_first_name}}
                                          @else
                                          {{ $pInfo->pinfo_last_name.", ".$pInfo->pinfo_first_name." ".$pInfo->pinfo_middle_name }}
                                          @endif
                                        </td>
                                        <td>{{ $role->emp_role_Name }}</td>
                                        <td>
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          {{ $addata->add_blcknum }}
                                          @endif
                                        @endforeach

                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          @if($addata->add_street != null)
                                          {{ $addata->add_street }},
                                          @endif
                                          @endif
                                        @endforeach

                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          @if($addata->add_subdivision != null)
                                          {{ $addata->add_subdivision }},
                                          @endif
                                          @endif
                                        @endforeach

                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          @if($addata->add_brngy != null)
                                          {{ $addata->add_brngy }},
                                          @endif
                                          @endif
                                        @endforeach

                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          @if($addata->add_district != null)
                                          {{ $addata->add_district }},
                                          @endif
                                          @endif
                                        @endforeach

                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          @if($addata->add_city != null)
                                          {{ $addata->add_city }},
                                          @endif
                                          @endif
                                        @endforeach

                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          @if($addata->add_province != null)
                                          {{ $addata->add_province }},
                                          @endif
                                          @endif
                                        @endforeach

                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          @if($addata->add_region != null)
                                          {{ 'Region '.$addata->add_region }}
                                          @endif
                                          @endif
                                        @endforeach

                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          @if($addata->add_zipcode != null)
                                          {{ 'Zipcode: '.$addata->add_zipcode }}
                                          @endif
                                          @endif
                                        @endforeach
                                      </td>
                                      <td>
                                      <ul>
                                       @foreach($pnf as $Info)
                                        @if($agent->personal_info_ID == $Info->pinfo_ID )
                                         @if($Info->pinfo_cpnum_1 != null)
                                          <li> {{ $Info->pinfo_cpnum_1 }} </li>
                                         @endif
                                        @endif
                                       @endforeach
                                       @foreach($pnf as $Info)
                                        @if($agent->personal_info_ID == $Info->pinfo_ID )
                                         @if($Info->pinfo_cpnum_2 != null)
                                          <li>{{ $Info->pinfo_cpnum_2 }}</li>
                                         @endif
                                        @endif
                                       @endforeach
                                       @foreach($pnf as $Info)
                                        @if($agent->personal_info_ID == $Info->pinfo_ID )
                                         @if($Info->pinfo_tpnum != null)
                                          <li>{{ $Info->pinfo_tpnum }}</li>
                                         @endif
                                        @endif
                                       @endforeach
                                       @foreach($pnf as $Info)
                                        @if($agent->personal_info_ID == $Info->pinfo_ID )
                                         @if($Info->pinfo_mail != null)
                                          <li>{{ $Info->pinfo_mail }}</li>
                                         @endif
                                        @endif
                                       @endforeach
                                       </ul>
                                      </td>
                                      <td> 
                                        <button type="button" class="btn bg-light-blue waves-effect" data-toggle="collapse" data-target="#largeModal"
                                        class="btn btn-success btn-xs waves-effect"
                                        data-empid='{{ $empdata->emp_ID }}'
                                        data-fname='{{ $pInfo->pinfo_first_name }}'
                                        data-mname='{{ $pInfo->pinfo_middle_name }}'
                                        data-lname='{{ $pInfo->pinfo_last_name }}'
                                        data-contact1='{{ $pInfo->pinfo_cpnum_1 }}'
                                        data-contact2='{{ $pInfo->pinfo_cpnum_2 }}'
                                        data-bday='{{ $pInfo->pinfo_age }}'
                                        data-telnum='{{ $pInfo->pinfo_tpnum }}'
                                        data-mail='{{ $pInfo->pinfo_mail }}'
                                        data-gender='{{ $pInfo->pinfo_gender }}'
                                        data-add='{{ $agent->agent_add_ID }}'
                                        data-pinfo='{{ $agent->personal_info_ID }}'
                                        data-asale='{{ $empdata->emp_sales }}'
                                        data-role='{{ $empdata->emp_role_ID }}'
                                        data-source = '{!! "/image/employee/".$pInfo->pinfo_picture !!}'

                                        data-pass='
                                        @foreach($useracc as $user)
                                          @if($user->user_ID == $empdata->emp_ID)
                                            {{ $user->user_password }}
                                          @endif
                                        @endforeach'
                                        data-uname = '
                                        @foreach($useracc as $user)
                                          @if($user->user_ID == $empdata->emp_ID)
                                            {{ $user->user_name }}
                                          @endif
                                        @endforeach'

                                        data-created = '{{ \Carbon\Carbon::parse($agent->created_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($agent->created_at)->format("l, h:i:s A").")" }}'

                                        data-updated = '{{ \Carbon\Carbon::parse($agent->updated_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($agent->updated_at)->format("l, h:i:s A").")" }}'

                                        data-lnumb='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          {{ $addata->add_blcknum }}
                                          @endif
                                        @endforeach'
                                        data-strt='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          {{ $addata->add_street }}
                                          @endif
                                        @endforeach'
                                        data-sdiv='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          {{ $addata->add_subdivision }}
                                          @endif
                                        @endforeach'
                                        data-brg='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          {{ $addata->add_brngy }}
                                          @endif
                                        @endforeach'
                                        data-distr='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          {{ $addata->add_district }}
                                          @endif
                                        @endforeach'
                                        data-city='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          {{ $addata->add_city }}
                                          @endif
                                        @endforeach'
                                        data-prov='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          {{ $addata->add_province }}
                                          @endif
                                        @endforeach'
                                        data-regn='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          {{ $addata->add_region }}
                                          @endif
                                        @endforeach'
                                        data-zip='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $agent->agent_add_ID)
                                          {{ $addata->add_zipcode }}
                                          @endif
                                        @endforeach'

                                        onclick = "

                                        document.getElementById('aemp_role').disabled=true;       
                                        document.getElementById('apinfo_gender').disabled=true;
                                        document.getElementById('aallow_sales').disabled=true;
                                        document.getElementById('aadd_region').disabled=true;

                                        var id = $(this).data('empid');
                                        var info = $(this).data('pinfo');
                                        var fname = $(this).data('fname');
                                        var mname = $(this).data('mname');
                                        var lname = $(this).data('lname');
                                        var contact1 = $(this).data('contact1');
                                        var contact2 = $(this).data('contact2');
                                        var telnum = $(this).data('telnum');
                                        var gender = $(this).data('gender');
                                        var bday = $(this).data('bday');
                                        var mail = $(this).data('mail');
                                        var pinfo = $(this).data('pinfo');
                                        var src = $(this).data('source');
                                        var role = $(this).data('role');
                                        var sale = $(this).data('asale');
                                        var name = $(this).data('uname').replace(/^\s+|\s+$/g, '');
                                        var pass = $(this).data('pass').replace(/^\s+|\s+$/g, '');
                                        var created = $(this).data('created');
                                        var updated = $(this).data('updated');

                                        var addid = $(this).data('add');
                                        var lotnum = $(this).data('lnumb').replace(/^\s+|\s+$/g, '');
                                        var strt = $(this).data('strt').replace(/^\s+|\s+$/g, '');
                                        var subdiv = $(this).data('sdiv').replace(/^\s+|\s+$/g, '');
                                        var brngy = $(this).data('brg').replace(/^\s+|\s+$/g, '');
                                        var dist = $(this).data('distr').replace(/^\s+|\s+$/g, '');
                                        var city = $(this).data('city').replace(/^\s+|\s+$/g, '');
                                        var prov = $(this).data('prov').replace(/^\s+|\s+$/g, '');
                                        var reg = $(this).data('regn').replace(/^\s+|\s+$/g, '');
                                        var zipcode = $(this).data('zip').replace(/^\s+|\s+$/g, '');

                                        document.getElementById('date_created').value = created;
                                        document.getElementById('last_update').value = updated; 

                                        document.getElementById('aemp_id').value = id;
                                        document.getElementById('pInfo_ID').value = info;
                                        document.getElementById('acPerson_first_name').value = fname;
                                        document.getElementById('acPerson_middle_name').value = mname;
                                        document.getElementById('acPerson_last_name').value = lname;
                                        document.getElementById('apinfo_cpnum_1').value = contact1;
                                        document.getElementById('apinfo_cpnum_2').value = contact2;
                                        document.getElementById('apinfo_tpnum').value = telnum;
                                        document.getElementById('apinfo_bday').value = bday;
                                        $('#apinfo_gender').val(gender).change();
                                        document.getElementById('apinfo_mail').value = mail;
                                        $('#aemp_role').val(role).change();
                                        document.getElementById('aallow_selected').value = sale;

                                        document.getElementById('auname').value = name;
                                        document.getElementById('apass').value = pass;

                                        document.getElementById('aadd_id').value = addid;
                                        document.getElementById('aadd_blcknum').value = lotnum;
                                        document.getElementById('aadd_street').value = strt;
                                        document.getElementById('aadd_subdivision').value = subdiv;
                                        document.getElementById('aadd_brngy').value = brngy;
                                        document.getElementById('aadd_district').value = dist;
                                        document.getElementById('aadd_city').value = city;
                                        document.getElementById('aadd_province').value = prov;
                                        document.getElementById('aadd_region').value = reg;
                                        document.getElementById('aadd_zipcode').value = zipcode;
                                        $('#aadd_region').val(reg).change();
                                        document.getElementById('aadd_zipcode').value = zipcode;
                                        $('#aemp_type').val($(this).data('emptype')).change();
                                        $('#ajobtitle').val($(this).data('jobtitle')).change();
                                        $('#editImg').attr('src', src);
                                        var today = new Date();
                                        bday = bday.split('-');
                                        if(bday[0] != 0)
                                        {
                                            if((today.getMonth() + 1) < bday[1])
                                            {
                                              document.getElementById('aage').value = today.getFullYear() - bday[0] - 1;
                                            }
                                            else
                                            {
                                              document.getElementById('aage').value = today.getFullYear() - bday[0];
                                            }
                                        }
                                        else
                                        {
                                            document.getElementById('aage').value = 'Invalid Input';
                                        }
                                        document.getElementById('apinfo_bday').disabled=true;
                                        $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);
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
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            <!-- #END# Exportable Table -->
    <script>
            $.validator.addMethod("minAge", function(value, element) {
                var curDate = new Date();
                var inputDate = new Date(value);
                var age = Math.abs(inputDate.getFullYear() - curDate.getFullYear());
                if((curDate.getMonth() + 1) >= inputDate.getMonth())
                {      
                    age = Math.abs(inputDate.getFullYear() - curDate.getFullYear()) - 1;
                    if((curDate.getDate()) >= inputDate.getDate())
                    {
                        age = Math.abs(inputDate.getFullYear() - curDate.getFullYear());
                    }
                }
                else
                {
                    age = Math.abs(inputDate.getFullYear() - curDate.getFullYear()) - 1;
                }
                if (age >= 18)
                    return true;
                return false;
            }, "Age Limit is 18."); 
            $.validator.addMethod("maxAge", function(value, element) {
                var curDate = new Date();
                var inputDate = new Date(value);
                var age = Math.abs(inputDate.getFullYear() - curDate.getFullYear());
                if((curDate.getMonth() + 1) >= inputDate.getMonth())
                {      
                    age = Math.abs(inputDate.getFullYear() - curDate.getFullYear()) - 1;
                    if((curDate.getDate()) >= inputDate.getDate())
                    {
                        age = Math.abs(inputDate.getFullYear() - curDate.getFullYear());
                    }
                }
                else
                {
                    age = Math.abs(inputDate.getFullYear() - curDate.getFullYear()) - 1;
                }
                if (age <= 130)
                    return true;
                return false;
            }, "Maximum age is 130."); 
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
            $.validator.addMethod("userpass", function(value, element) {
                return this.optional(element) || /^[A-Za-z0-9][A-Za-z0-9]*$/i.test(value);
             }, "This field must contain only letters and numbers.");


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
                  cPerson_first_name:{
                    required: true,
                    alpha:true,
                    maxlength: 30
                  },
                  cPerson_middle_name:{
                    alpha:true,
                    maxlength: 20
                  },
                  cPerson_last_name:{
                    required: true,
                    alpha:true,
                    maxlength: 20
                  },
                  pinfo_cpnum_1:{
                    required: true,
                    cpValidator: true
                  },
                  pinfo_cpnum_2:{
                    cpValidator: true
                  },
                  pinfo_tpnum:{
                    digits: true,
                    minlength: 7,
                    maxlength: 7
                  },
                  pinfo_mail:{
                    required: true,
                    email: true,
                    maxlength: 50
                  },
                  pinfo_bday:{
                    required: true,
                    minAge: true,
                    maxAge: true
                  },
                  pinfo_gender:{
                    required: true,
                  },
                  emp_role:{
                    required: true
                  },
                  uname:{
                    maxlength: 20,
                    minlength: 8,
                    required: true,
                    userpass: true,
                  },
                  pass:{
                    maxlength: 20,
                    minlength: 8,
                    required: true,
                    userpass: true,
                  },
                  add_blcknum:{
                      blcknumber: true,
                      maxlength: 10
                  },
                  add_street:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  add_subdivision:
                  {
                      alphanumeric: true,
                      maxlength: 50
                  },
                  add_brngy:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  add_district:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  add_city:
                  {
                      required: true,
                      alphanumeric: true,
                      maxlength: 20
                  },
                  add_province:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  add_region:
                  {
                      required: true,
                      alphanumeric: true,
                  },
                  add_zipcode:
                  {
                      digits: true,
                      maxlength: 4
                  }
                },
                // Specify validation error messages
                messages: {
                    pinfo_bday:{
                        required: "Empty or Invalid Date."
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
                  acPerson_first_name:{
                    required: true,
                    alpha:true,
                    maxlength: 30
                  },
                  acPerson_middle_name:{
                    alpha:true,
                    maxlength: 20
                  },
                  acPerson_last_name:{
                    required: true,
                    alpha:true,
                    maxlength: 20
                  },
                  apinfo_cpnum_1:{
                    required: true,
                    cpValidator: true
                  },
                  apinfo_cpnum_2:{
                    cpValidator: true
                  },
                  apinfo_tpnum:{
                    digits: true,
                    minlength: 7,
                    maxlength: 7
                  },
                  apinfo_mail:{
                    required: true,
                    email: true,
                    maxlength: 50
                  },
                  apinfo_bday:{
                    required: true,
                    minAge: true,
                    maxAge: true
                  },
                  apinfo_gender:{
                    required: true,
                  },
                  aemp_role:{
                    required: true
                  },
                  auname:{
                    maxlength: 20,
                    minlength: 8,
                    required: true,
                    userpass: true,
                  },
                  apass:{
                    maxlength: 20,
                    minlength: 8,
                    required: true,
                    userpass: true,
                  },
                  aadd_blcknum:{
                      blcknumber: true,
                      maxlength: 10
                  },
                  aadd_street:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  aadd_subdivision:
                  {
                      alphanumeric: true,
                      maxlength: 50
                  },
                  aadd_brngy:
                  {
                      alphanumeric: true,
                      maxlength: 50
                  },
                  aadd_district:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  aadd_city:
                  {
                      required: true,
                      alphanumeric: true,
                      maxlength: 20
                  },
                  aadd_province:
                  {
                      alphanumeric: true,
                      maxlength: 20
                  },
                  aadd_region:
                  {
                      required: true,
                      alphanumeric: true,
                  },
                  aadd_zipcode:
                  {
                      digits: true,
                      maxlength: 4
                  }
                },
                // Specify validation error messages
                messages: {
                    apinfo_bday:{
                        required: "Empty or Invalid Date."
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
          $('#aallow_sales').click(function(event){
            if($('#aallow_sales').is(":checked"))
                $('#aallow_selected').val('2');
            else
                $('#aallow_selected').val('0');
          });

          $('#allow_sales').click(function(event){
            if($('#allow_sales').is(":checked"))
                $('#allow_selected').val('2');
            else
                $('#allow_selected').val('0');
          });

          $('#apicture').hide();
          var autogen = 1;
          $('#auto_gen').click(function() {
            if($("#auto_gen").is(':checked'))
            {
                autogen = 1;
                var bday = document.getElementById("pinfo_bday").value.split('-');
                var verification = document.getElementById("pinfo_bday").value;
                if(!verification)
                { 
                document.getElementById("uname").value = document.getElementById("cPerson_first_name").value + document.getElementById("cPerson_last_name").value;
                document.getElementById("pass").value = document.getElementById("cPerson_first_name").value + document.getElementById("cPerson_last_name").value;
                }
                else
                {
                document.getElementById("uname").value = document.getElementById("cPerson_first_name").value + document.getElementById("cPerson_last_name").value+bday[1]+bday[2]+bday[0];
                document.getElementById("pass").value = document.getElementById("cPerson_first_name").value + document.getElementById("cPerson_last_name").value+bday[1]+bday[2]+bday[0];
                }
                $("#uname").prop('readonly', true);
                $("#pass").prop('readonly', true);
            }
            else
            {
                autogen = 0;
                 document.getElementById("uname").value = "";
                 document.getElementById("pass").value = "";
                $("#uname").prop('readonly', false);
                $("#pass").prop('readonly', false);
            }
          });
            $('#pinfo_bday').on('change textInput input', function () {
                var bday = document.getElementById("pinfo_bday").value.split('-');
                var today = new Date();
                if(bday[0] != 0)
                {
                    if((today.getMonth() + 1) >= bday[1])
                    {       
                      document.getElementById("age").value = today.getFullYear() - bday[0] - 1;
                      if((today.getDate()) >= bday[2])
                        {
                            document.getElementById("age").value = today.getFullYear() - bday[0];
                        }
                    }
                    else
                    {
                      document.getElementById("age").value = today.getFullYear() - bday[0] - 1;
                    }
                }
                else
                {
                    document.getElementById("age").value = "Invalid Input";
                }
            });
          $('#cPerson_first_name').on('change textInput input', function () {
            if(autogen == 1)
            {
              var bday = document.getElementById("pinfo_bday").value.split('-');
              var verification = document.getElementById("pinfo_bday").value;
              if(!verification)
              { 
              document.getElementById("uname").value = document.getElementById("cPerson_first_name").value + document.getElementById("cPerson_last_name").value;
              document.getElementById("pass").value = document.getElementById("cPerson_first_name").value + document.getElementById("cPerson_last_name").value;
              }
              else
              {
              document.getElementById("uname").value = document.getElementById("cPerson_first_name").value + document.getElementById("cPerson_last_name").value+bday[1]+bday[2]+bday[0];
              document.getElementById("pass").value = document.getElementById("cPerson_first_name").value + document.getElementById("cPerson_last_name").value+bday[1]+bday[2]+bday[0];
              }
            }
          });
          $('#cPerson_last_name').on('change textInput input', function () {
            if(autogen == 1)
            {
              var bday = document.getElementById("pinfo_bday").value.split('-');
              var verification = document.getElementById("pinfo_bday").value;
              if(!verification)
              { 
              document.getElementById("uname").value = document.getElementById("cPerson_first_name").value + document.getElementById("cPerson_last_name").value;
              document.getElementById("pass").value = document.getElementById("cPerson_first_name").value + document.getElementById("cPerson_last_name").value;
              }
              else
              {
              document.getElementById("uname").value = document.getElementById("cPerson_first_name").value + document.getElementById("cPerson_last_name").value+bday[1]+bday[2]+bday[0];
              document.getElementById("pass").value = document.getElementById("cPerson_first_name").value + document.getElementById("cPerson_last_name").value+bday[1]+bday[2]+bday[0];
              }
            }
          });
          $('#pinfo_bday').on('change textInput input', function () {
            if(autogen == 1)
            {
              var bday = document.getElementById("pinfo_bday").value.split('-');
              var verification = document.getElementById("pinfo_bday").value;
              if(!verification)
              { 
              document.getElementById("uname").value = document.getElementById("cPerson_first_name").value + document.getElementById("cPerson_last_name").value;
              document.getElementById("pass").value = document.getElementById("cPerson_first_name").value + document.getElementById("cPerson_last_name").value;
              }
              else
              {
              document.getElementById("uname").value = document.getElementById("cPerson_first_name").value + document.getElementById("cPerson_last_name").value+bday[1]+bday[2]+bday[0];
              document.getElementById("pass").value = document.getElementById("cPerson_first_name").value + document.getElementById("cPerson_last_name").value+bday[1]+bday[2]+bday[0];
              }
            }
          });
          $(document).ready(function() {
            $("#showHide").click(function() {
              if ($("#pass").attr("type") == "password") {
                $("#pass").attr("type", "text");
                $("#showHide").html("Hide");

              } else {
                $("#pass").attr("type", "password");
                $("#showHide").html("Show");
              }
            });
          });

          $(document).ready(function() {
            $("#ashowHide").click(function() {
              if ($("#apass").attr("type") == "password") {
                $("#apass").attr("type", "text");
                $("#ashowHide").html("Hide");

              } else {
                $("#apass").attr("type", "password");
                $("#ashowHide").html("Show");
              }
            });
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

          $('#addEmpModal').on('hidden.bs.modal', function() {
            $('#add').trigger('reset');
          });

          $('#largeModal').on('hidden.bs.modal', function() {
              $('#view').trigger('reset');
              $('#Edit').prop('disabled', false);
              $('#Delete').prop('disabled', false);
              $('#schange').hide();
              $('#aadd_blcknum').prop('disabled', true);
              $('#aadd_street').prop('disabled', true);
              $('#aadd_subdivision').prop('disabled', true);
              $('#aadd_brngy').prop('disabled', true);
              $('#aadd_district').prop('disabled', true);
              $('#aadd_city').prop('disabled', true);
              $('#aadd_province').prop('disabled', true);
              $('#aadd_region').prop('disabled', true);
              $('#aadd_zipcode').prop('disabled', true);
              $('#aemp_first_name').prop('disabled', true);
              $('#aemp_middle_name').prop('disabled', true);
              $('#aemp_last_name').prop('disabled', true);
              $('#aemp_mail').prop('disabled', true);
              $('#aemp_contact').prop('disabled', true);
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
                  url: '/admin/maintenance/employee/ardelete',
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
