@extends('pages.accounting-staff.master')

@section('title','New Client - Company | CIMIS')

@section('transIns','active')

@section('client','active')

@section('clientcompany','active')

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
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> New Client (Company)</a></li>
                    </ol>
                </div>
            </div>
                        <!-- ADD EMPLOYEE MODAL -->
            <div class="collapse fade" id="addEmpModal" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInLeft active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-add">
                            <h4 style="text-align: center;"><br/><img src="{{ URL::asset ('images/icons/insurance-individual.png')}}" style="height: 50px; width: 50px;"> ADD NEW CLIENT</h4>
                        </div>
                        <div class="modal-body">
                            <form id="add" name = "add" action = "company/submit" method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <h3> <small><b>COMPANY INFORMATION</b></small></h3><br/>
                                        <div class="col-md-4" style = "display: none;">
                                           <input id = "time" name = "time" type="text" class="form-control">
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-7">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input id = "comp_name" name = "comp_name" type="text" class="form-control">
                                                        <label class="form-label">Company Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group form-float">
                                                    <div class="form-line">

                                                        <input id = "comp_email" name = "comp_email" type="text" class="form-control">
                                                        <label class="form-label">E-mail</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">

                                                        <input id = "comp_telnum" name = "comp_telnum" type="text" class="form-control">
                                                        <label class="form-label">Telephone Number</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">

                                                        <input id = "comp_faxnum" name = "comp_faxnum" type="text" class="form-control">
                                                        <label class="form-label">Fax Number</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <select id = "comp_sales_agent" name = "comp_sales_agent" class="form-control show-tick" readonly="true" onchange="$('#add').valid()">
                                                  <option selected value = "" style = "display: none;">-- Select Sales Agent --</option>
                                                     @foreach($sales as $saleA)
                                                      @if($saleA->del_flag == 0)
                                                      @if($saleA->sales_agent_flag == 1)
                                                      @foreach($pInfo as $info)
                                                       @if($info->pinfo_ID == $saleA->personal_info_ID)
                                                       <option value = "{{$saleA->agent_ID}}">{{$info->pinfo_last_name}}, {{$info->pinfo_first_name}} {{$info->pinfo_middle_name}}</option>
                                                       @endif
                                                      @endforeach
                                                      @endif
                                                      @endif
                                                     @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br/><br/>
                                        <h3> <small><b>COMPANY ADDRESS</b></small></h3>
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
                                        <h3> <small><b>CONTACT PERSON</b></small></h3><br/>
                                        <div align="center"><h4><small><b>Personal Information</b></small></h4></div>
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
                                        
                                        </div> <!-- END OF ROW CLEARFIX -->
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
                                                                <input id = "pinfo_bday" name = "pinfo_bday" type="date" data-date-inline-picker="false" data-date-open-on-focus="true" class="form-control" />
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
                                        </div>
                                <br/><br/><br/>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button class="btn btn-primary waves-effect" type="button" onclick = "
                            document.getElementById('time').value = formatDate(new Date());
                            console.log('Time : ' + document.getElementById('time').value);
                            if($('#add').valid())
                            {
                              swal({
                                title: 'Are you sure?',
                                type: 'warning' ,
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
                            <h4 style="text-align: center;"><br/><img src="{{ URL::asset ('images/icons/insurance-individual.png')}}" style="height: 50px; width: 50px;"> CLIENT DETAILS
                            </h4>
                        </div><br/>
                        <button id = "Edit" style = "margin-left: 55em" type="button" class="btn btn-success btn-lg waves-effect"
                        onclick = "
                        document.getElementById('view').action = 'company/update';
                        document.getElementById('apinfo_bday').disabled=false;
                        $('#Edit').prop('disabled', true);
                        $('#Delete').prop('disabled', false);
                        $('#schange').show();
                        $('#apicture').show();
                        document.getElementById('apinfo_gender').disabled=false;
                        document.getElementById('acomp_sales_agent').disabled=false;
                        document.getElementById('aadd_region').disabled=false;
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
                        $('#acomp_name').prop('readonly', false);
                        $('#acomp_telnum').prop('readonly', false);
                        $('#acomp_faxnum').prop('readonly', false);
                        $('#acomp_email').prop('readonly', false);
                        $('#apicture').prop('disabled', false);
                        $('#schange').html('Save Changes');
                        $( '#acomp_name' ).focus();
                        swal({
                        title: 'You can now edit the record.',
                        type: 'info',
                        timer: 1500,
                        showConfirmButton: false
                        });
                        ">
                        <i class="material-icons">create</i>
                        <span>Edit</span>
                        </button>
                        <button id = "Delete" type="button" class="btn bg-red btn-lg waves-effect"
                        onclick = "
                        document.getElementById('view').action = 'company/delete';
                        document.getElementById('apinfo_bday').disabled=true;
                        $('#Edit').prop('disabled', false);
                        $('#Delete').prop('disabled', true);
                        $('#schange').show();
                        $('#apicture').hide();
                        document.getElementById('apinfo_gender').disabled=true;
                        document.getElementById('acomp_sales_agent').disabled=true;
                        document.getElementById('aadd_region').disabled=true;
                        $('#aadd_blcknum').prop('readonly', true);
                        $('#aadd_street').prop('readonly', true);
                        $('#aadd_subdivision').prop('readonly', true);
                        $('#aadd_brngy').prop('readonly', true);
                        $('#aadd_district').prop('readonly', true);
                        $('#aadd_city').prop('readonly', true);
                        $('#aadd_province').prop('readonly', true);
                        $('#aadd_region').prop('readonly', true);
                        $('#aadd_zipcode').prop('readonly', true);
                        $('#acPerson_first_name').prop('readonly', true);
                        $('#acPerson_middle_name').prop('readonly', true);
                        $('#acPerson_last_name').prop('readonly', true);
                        $('#apinfo_mail').prop('readonly', true);
                        $('#apinfo_cpnum_1').prop('readonly', true);
                        $('#apinfo_cpnum_2').prop('readonly', true);
                        $('#apinfo_tpnum').prop('readonly', true);
                        $('#apinfo_bday').prop('readonly', true);
                        $('#acomp_name').prop('readonly', true);
                        $('#acomp_telnum').prop('readonly', true);
                        $('#acomp_faxnum').prop('readonly', true);
                        $('#acomp_email').prop('readonly', true);
                        $('#apicture').prop('disabled', true);
                        $('#schange').html('Delete Record');
                        $( '#schange' ).focus();
                        swal({
                        title: 'You can now delete the record.',
                        type: 'info',
                        timer: 1500,
                        showConfirmButton: false
                        });
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
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <small><input type="text" id="date_created" class="form-control" readonly="true"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="last_update"><small><small>Last Update</small></small></label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <small><input type="text" id="last_update" class="form-control" readonly="true"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <h3> <small><b>COMPANY INFORMATION</b></small></h3><br/>
                                        <div class="row clearfix">
                                            <div class="col-md-4" style = "display: none;">
                                                <input id = "bnkid" name = "bnkid" type="text" class="form-control" readonly="true">
                                            </div>
                                            <div class="col-md-4" style = "display: none;">
                                               <input id = "atime" name = "atime" type="text" class="form-control">
                                            </div>
                                            <div class="col-md-4" style = "display: none;">
                                               <input id = "aaddid" name = "aaddid" type="text" class="form-control">
                                            </div>
                                            <div class="col-md-4" style = "display: none;">
                                               <input id = "apinfo_ID" name = "apinfo_ID" type="text" class="form-control">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Company Name :</small></label>
                                                        <input id = "acomp_name" name = "acomp_name" type="text" class="form-control" readonly="true">
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>E-mail:</small></label>
                                                        <input id = "acomp_email" name = "acomp_email" type="text" class="form-control" readonly="true">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Telephone Number:</small></label>
                                                        <input id = "acomp_telnum" name = "acomp_telnum" type="text" class="form-control" readonly="true">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Fax Number:</small></label>
                                                        <input id = "acomp_faxnum" name = "acomp_faxnum" type="text" class="form-control" readonly="true">
                                                     
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                <label><small>Sales Agent :</small></label>
                                                 <select id = "acomp_sales_agent" name = "acomp_sales_agent" class="form-control show-tick" readonly="true" onchange="$('#view').valid()">
                                                  <option selected value = "" style = "display: none;">-- Select Sales Agent --</option>
                                                     @foreach($sales as $saleA)
                                                      @if($saleA->sales_agent_flag == 1)
                                                      @foreach($pInfo as $info)
                                                       @if($info->pinfo_ID == $saleA->personal_info_ID)
                                                       @if($saleA->del_flag == 0)
                                                        <option value = "{{$saleA->agent_ID}}">{{$info->pinfo_last_name}}, {{$info->pinfo_first_name}} {{$info->pinfo_middle_name}}</option>
                                                       @else
                                                        <option style = "display: none;" value = "{{$saleA->agent_ID}}">{{$info->pinfo_last_name}}, {{$info->pinfo_first_name}} 
                                                       @endif
                                                      @endif
                                                      @endforeach
                                                      @endif
                                                     @endforeach
                                                 </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br/><br/>
                                        <h3> <small><b>COMPANY ADDRESS</b></small></h3>
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
                                        </div> <br/>
                                        <h3> <small><b>CONTACT PERSON</b></small></h3><br/>
                                        <div align="center"><h4><small><b>Personal Information</b></small></h4></div>
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
                                                                <input id = "apinfo_bday" name = "apinfo_bday" type="date" data-date-inline-picker="false" data-date-open-on-focus="true" class="form-control" />
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
                                        </div>
                                <br/><br/><br/>
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
                          <button type="button" class="btn btn-link waves-effect" data-toggle="collapse" data-target="#largeModal" onclick="
                          $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);
                        $('#Edit').prop('disabled', false);
                        $('#Delete').prop('disabled', false);
                        $('#schange').hide();
                        $('#apicture').hide();
                        document.getElementById('apinfo_gender').disabled=true;
                        document.getElementById('acomp_sales_agent').disabled=true;
                        document.getElementById('aadd_region').disabled=true;
                        document.getElementById('apinfo_bday').disabled=true;
                        $('#aadd_blcknum').prop('readonly', true);
                        $('#aadd_street').prop('readonly', true);
                        $('#aadd_subdivision').prop('readonly', true);
                        $('#aadd_brngy').prop('readonly', true);
                        $('#aadd_district').prop('readonly', true);
                        $('#aadd_city').prop('readonly', true);
                        $('#aadd_province').prop('readonly', true);
                        $('#aadd_region').prop('readonly', true);
                        $('#aadd_zipcode').prop('readonly', true);
                        $('#acPerson_first_name').prop('readonly', true);
                        $('#acPerson_middle_name').prop('readonly', true);
                        $('#acPerson_last_name').prop('readonly', true);
                        $('#apinfo_mail').prop('readonly', true);
                        $('#apinfo_cpnum_1').prop('readonly', true);
                        $('#apinfo_cpnum_2').prop('readonly', true);
                        $('#apinfo_tpnum').prop('readonly', true);
                        $('#apinfo_bday').prop('readonly', true);
                        $('#acomp_name').prop('readonly', true);
                        $('#acomp_telnum').prop('readonly', true);
                        $('#acomp_faxnum').prop('readonly', true);
                        $('#acomp_email').prop('readonly', true);">CLOSE</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
            <!-- #END OF MODAL -->
            <!-- Exportable Table -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/insurance-individual.png')}}" style="height: 50px; width: 50px;"><b>
                                COMPANY CLIENTS
                            </b></h3>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                <button id = "addbtn" form = "add" type="submit" class="btn bg-blue waves-effect" data-toggle="collapse" data-target="#addEmpModal"  onclick="
                                    $('#addbtn').hide();
                                    $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);">
                                    <i class="material-icons">group_add</i>
                                    <span>Add Client</span>
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
                                        <th>Company Name</th>
                                        <th>Company Address</th>
                                        <th>Contact Person</th>
                                        <th>Contact Details</th>
                                        <th>Image</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($company as $comp)
                                 @if($comp->del_flag == 0)
                                  @if($comp->comp_type == 1)
                                  @foreach($add as $address)
                                   @if($address->add_ID == $comp->comp_add_ID)
                                    @foreach($cpr as $cper)
                                     @if($cper->cPerson_ID == $comp->comp_cperson_ID)
                                      @foreach($pInfo as $Info)
                                       @if($Info->pinfo_ID == $cper->personal_info_ID)
                                       <tr>
                                        <td>
                                            <input type="checkbox" id="{{$comp->comp_ID}}" class="filled-in chk-col-red checkCheckbox" data-id = "{{$comp->comp_ID}}"/>
                                            <label for="{{$comp->comp_ID}}"></label>
                                        </td>
                                        <td>
                                         {{ $comp->comp_name }}
                                        </td>
                                        <td>
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $comp->comp_add_ID)
                                                  {{ $addata->add_blcknum }}
                                                  @endif
                                                @endforeach

                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $comp->comp_add_ID)
                                                  {{ $addata->add_street }}
                                                  @endif
                                                @endforeach

                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $comp->comp_add_ID)
                                                  {{ $addata->add_subdivision }}
                                                  @endif
                                                @endforeach

                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $comp->comp_add_ID)
                                                  {{ $addata->add_brngy }}
                                                  @endif
                                                @endforeach

                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $comp->comp_add_ID)
                                                  {{ $addata->add_district }}
                                                  @endif
                                                @endforeach

                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $comp->comp_add_ID)
                                                  {{ $addata->add_city }}
                                                  @endif
                                                @endforeach

                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $comp->comp_add_ID)
                                                  {{ $addata->add_province }}
                                                  @endif
                                                @endforeach

                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $comp->comp_add_ID)
                                                  {{ 'Region '.$addata->add_region }}
                                          @endif
                                        @endforeach
                                        </td>
                                        <td>
                                        @foreach($cpr as $cperson)
                                          @if($cperson->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pInfo as $Info)
                                            @if($cperson->personal_info_ID == $Info->pinfo_ID )
                                              {{ $Info->pinfo_last_name.', ' }}
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        @foreach($cpr as $cperson)
                                          @if($cperson->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pInfo as $Info)
                                            @if($cperson->personal_info_ID == $Info->pinfo_ID )
                                              {{ $Info->pinfo_first_name.' ' }}
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        @foreach($cpr as $cperson)
                                          @if($cperson->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pInfo as $Info)
                                            @if($cperson->personal_info_ID == $Info->pinfo_ID )
                                              {{ $Info->pinfo_middle_name }}
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        </td>
                                        <td>
                                        <ul>
                                        @foreach($cpr as $cperson)
                                          @if($cperson->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pInfo as $Info)
                                            @if($cperson->personal_info_ID == $Info->pinfo_ID )
                                             @if($Info->pinfo_cpnum_1 != null)
                                              <li> {{ $Info->pinfo_cpnum_1 }} </li>
                                             @endif
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        @foreach($cpr as $cperson)
                                          @if($cperson->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pInfo as $Info)
                                            @if($cperson->personal_info_ID == $Info->pinfo_ID )
                                             @if($Info->pinfo_cpnum_2 != null)
                                              <li>{{ $Info->pinfo_cpnum_2 }}</li>
                                             @endif
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        @foreach($cpr as $cperson)
                                          @if($cperson->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pInfo as $Info)
                                            @if($cperson->personal_info_ID == $Info->pinfo_ID )
                                             @if($Info->pinfo_tpnum != null)
                                              <li>{{ $Info->pinfo_tpnum }}</li>
                                             @endif
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        @foreach($cpr as $cperson)
                                          @if($cperson->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pInfo as $Info)
                                            @if($cperson->personal_info_ID == $Info->pinfo_ID )
                                             @if($Info->pinfo_mail != null)
                                              <li>{{ $Info->pinfo_mail }}</li>
                                             @endif
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        </ul>
                                        </td> 
                                        @foreach($cpr as $cperson)
                                          @if($cperson->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pInfo as $Info)
                                            @if($cperson->personal_info_ID == $Info->pinfo_ID )
                                            <td><img src="{!! '/image/contact_person/'.$Info->pinfo_picture !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></td>
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        <td><button type="button" class="btn bg-light-blue waves-effect" data-toggle="collapse" data-target="#largeModal"
                                        data-compid='{{ $comp->comp_ID }}'
                                        data-cname='{{ $comp->comp_name }}'
                                        data-ctelnum='{{ $comp->comp_telnum }}'
                                        data-cfaxnum='{{ $comp->comp_faxnum }}'
                                        data-cemail='{{ $comp->comp_email }}'
                                        data-csalesa='{{ $comp->comp_sales_agent }}'
                                        data-fname='{{ $Info->pinfo_first_name }}'
                                        data-mname='{{ $Info->pinfo_middle_name }}'
                                        data-lname='{{ $Info->pinfo_last_name }}'
                                        data-contact1='{{ $Info->pinfo_cpnum_1 }}'
                                        data-contact2='{{ $Info->pinfo_cpnum_2 }}'
                                        data-bday='{{ $Info->pinfo_age }}'
                                        data-telnum='{{ $Info->pinfo_tpnum }}'
                                        data-mail='{{ $Info->pinfo_mail }}'
                                        data-gender='{{ $Info->pinfo_gender }}'
                                        data-add='{{ $comp->comp_add_ID }}'
                                        data-pinfo='{{ $cper->personal_info_ID }}'
                                        data-source = '{!! "/image/contact_person/".$Info->pinfo_picture !!}'

                                        data-created = '{{ \Carbon\Carbon::parse($comp->created_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($comp->created_at)->format("l, h:i:s A").")" }}'

                                        data-updated = '{{ \Carbon\Carbon::parse($comp->updated_at)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($comp->updated_at)->format("l, h:i:s A").")" }}'

                                        data-lnumb='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_blcknum }}
                                          @endif
                                        @endforeach'
                                        data-strt='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_street }}
                                          @endif
                                        @endforeach'
                                        data-sdiv='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_subdivision }}
                                          @endif
                                        @endforeach'
                                        data-brg='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_brngy }}
                                          @endif
                                        @endforeach'
                                        data-distr='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_district }}
                                          @endif
                                        @endforeach'
                                        data-city='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_city }}
                                          @endif
                                        @endforeach'
                                        data-prov='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_province }}
                                          @endif
                                        @endforeach'
                                        data-regn='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_region }}
                                          @endif
                                        @endforeach'
                                        data-zip='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_zipcode }}
                                          @endif
                                        @endforeach'

                                        onclick = "
                                        document.getElementById('apinfo_gender').disabled=true;
                                        document.getElementById('acomp_sales_agent').disabled=true;
                                        document.getElementById('aadd_region').disabled=true;
                                        document.getElementById('apinfo_bday').disabled=true;

                                        var id = $(this).data('compid');
                                        var comp_name = $(this).data('cname');
                                        var comp_telnum = $(this).data('ctelnum');
                                        var comp_faxnum = $(this).data('cfaxnum');
                                        var comp_email = $(this).data('cemail');
                                        var comp_sales_agent = $(this).data('csalesa');
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
                                        var created = $(this).data('created');
                                        var updated = $(this).data('updated');


                                        var add = $(this).data('add');
                                        var lotnum = $(this).data('lnumb').replace(/^\s+|\s+$/g, '');
                                        var strt = $(this).data('strt').replace(/^\s+|\s+$/g, '');
                                        var subdiv = $(this).data('sdiv').replace(/^\s+|\s+$/g, '');
                                        var brngy = $(this).data('brg').replace(/^\s+|\s+$/g, '');
                                        var dist = $(this).data('distr').replace(/^\s+|\s+$/g, '');
                                        var city = $(this).data('city').replace(/^\s+|\s+$/g, '');
                                        var prov = $(this).data('prov').replace(/^\s+|\s+$/g, '');
                                        var reg = $(this).data('regn').replace(/^\s+|\s+$/g, '');
                                        var zipcode = $(this).data('zip').replace(/^\s+|\s+$/g, '');

                                        document.getElementById('acomp_name').value = comp_name;
                                        document.getElementById('acomp_faxnum').value = comp_faxnum;
                                        document.getElementById('acomp_telnum').value = comp_telnum;
                                        document.getElementById('acomp_email').value = comp_email;
                                        $('#acomp_sales_agent').val(comp_sales_agent).change();
                                        document.getElementById('bnkid').value = id;
                                        document.getElementById('acPerson_first_name').value = fname;
                                        document.getElementById('acPerson_middle_name').value = mname;
                                        document.getElementById('acPerson_last_name').value = lname;
                                        document.getElementById('apinfo_cpnum_1').value = contact1;
                                        document.getElementById('apinfo_cpnum_2').value = contact2;
                                        document.getElementById('apinfo_mail').value = mail;
                                        document.getElementById('apinfo_bday').value = bday;
                                        $('#apinfo_gender').val(gender).change();
                                        document.getElementById('aaddid').value = add;
                                        document.getElementById('apinfo_ID').value = pinfo;
                                        document.getElementById('aadd_blcknum').value = lotnum;
                                        document.getElementById('aadd_street').value = strt;
                                        document.getElementById('aadd_subdivision').value = subdiv;
                                        document.getElementById('aadd_brngy').value = brngy;
                                        document.getElementById('aadd_district').value = dist;
                                        document.getElementById('aadd_city').value = city;
                                        document.getElementById('date_created').value = created;
                                        document.getElementById('last_update').value = updated;
                                        $('#aadd_region').val(reg).change();
                                        document.getElementById('aadd_zipcode').value = zipcode;
                                        $('#editImg').attr('src', src);
                                        var bday = document.getElementById('apinfo_bday').value.split('-');
                                        var today = new Date();
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

                                        $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);
                                        ">
                                                    <i class="material-icons">remove_red_eye</i>
                                                    <span>View</span>
                                        </button></td>
                                        </tr>
                                       @endif
                                      @endforeach
                                     @endif
                                    @endforeach
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
        </section>

         <script>
                $('#apicture').hide();
                $( document ).ready(function()
                {
                  $('bank_add').validate();
                  $('bank_view').validate();

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

                  $('#addBankModal').on('hidden.bs.modal', function() {
                    $('#bank_add').trigger('reset');
                  });

                  $('#largeModal').on('hidden.bs.modal', function() {
                      $('#bank_view').trigger('reset');
                      $('#Edit').prop('disabled', false);
                      $('#Delete').prop('disabled', false);
                      $('#schange').hide();
                      $('#aadd_blcknum').prop('readonly', true);
                      $('#aadd_street').prop('readonly', true);
                      $('#aadd_subdivision').prop('readonly', true);
                      $('#aadd_brngy').prop('readonly', true);
                      $('#aadd_district').prop('readonly', true);
                      $('#aadd_city').prop('readonly', true);
                      $('#aadd_province').prop('readonly', true);
                      $('#aadd_zipcode').prop('readonly', true);
                      $('#acPerson_first_name').prop('readonly', true);
                      $('#acPerson_middle_name').prop('readonly', true);
                      $('#acPerson_last_name').prop('readonly', true);
                      $('#acPerson_email').prop('readonly', true);
                      $('#acPerson_contact').prop('readonly', true);
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

                var IDS = [0];
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
                          url: '/admin/maintenance/client/company/ardelete',
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
            </script>
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
                                  comp_name: {
                                    required: true,
                                    alpha: true,
                                    maxlength: 50
                                  },
                                  comp_telnum:
                                  {
                                    required: true,
                                    maxlength: 11
                                  },
                                  comp_email:
                                  {
                                    email: true,
                                    required: true,
                                  },
                                  comp_sales_agent:
                                  {
                                    required: true,
                                  },
                                  cPerson_first_name:
                                  {
                                    required: true,
                                    alpha: true,
                                    maxlength: 30
                                  },
                                  cPerson_middle_name:
                                  {
                                    alpha: true,
                                    maxlength: 20
                                  },
                                  cPerson_last_name:
                                  {
                                    required: true,
                                    alpha: true,
                                    maxlength: 20
                                  },
                                  pinfo_cpnum_1:
                                  {
                                    required: true,
                                    cpValidator: true
                                  },
                                  pinfo_cpnum_2:
                                  {
                                    cpValidator: true
                                  },
                                  pinfo_tpnum:
                                  {
                                    digits: true,
                                    minlength: 7,
                                    maxlength: 7
                                  },
                                  pinfo_mail:
                                  {
                                    required: true,
                                    email: true,
                                    maxlength: 50
                                  },
                                  pinfo_bday:
                                  {
                                    required: true,
                                    maxAge: true,
                                    minAge: true
                                  },
                                  pinfo_gender:
                                  {
                                    required: true,
                                  },
                                  add_blcknum:
                                  {
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
                                      maxlength: 20
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
                                      maxlength: 11
                                  },
                                  add_zipcode:
                                  {
                                      digits: true,
                                      maxlength: 4
                                  }
                                },
                                // Specify validation error messages
                                messages: {
                                    pinfo_bday:
                                    {
                                       required: "Empty or Invalid Date."
                                    }

                                },
                                // Make sure the form is submitted to the destination defined
                                // in the "action" attribute of the form when valid
                                submitHandler: function(form) {
                                  form.submit();
                                }
                              });

                              $("form[name='bank_view']").validate({
                                // Specify validation rules
                                rules: {
                                  // The key name on the left side is the name attribute
                                  // of an input field. Validation rules are defined
                                  // on the right side
                                  abank_name: {
                                    required: true,
                                    alpha: true,
                                    maxlength: 50
                                  },
                                  abank_name_alt:
                                  {
                                    required: true,
                                    maxlength: 10
                                  },
                                  acPerson_first_name:
                                  {
                                    required: true,
                                    alpha: true,
                                    maxlength: 30
                                  },
                                  acPerson_middle_name:
                                  {
                                    alpha: true,
                                    maxlength: 20
                                  },
                                  acPerson_last_name:
                                  {
                                    required: true,
                                    alpha: true,
                                    maxlength: 20
                                  },
                                  apinfo_cpnum_1:
                                  {
                                    required: true,
                                    cpValidator: true
                                  },
                                  apinfo_cpnum_2:
                                  {
                                    cpValidator: true
                                  },
                                  apinfo_tpnum:
                                  {
                                    digits: true,
                                    minlength: 7,
                                    maxlength: 7
                                  },
                                  apinfo_mail:
                                  {
                                    required: true,
                                    email: true,
                                    maxlength: 50
                                  },
                                  apinfo_bday:
                                  {
                                    required: true,
                                    maxAge: true,
                                    minAge: true
                                  },
                                  apinfo_gender:
                                  {
                                    required: true,
                                  },
                                  aadd_blcknum:
                                  {
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
                                      maxlength: 20
                                  },
                                  aadd_brngy:
                                  {
                                      alphanumeric: true,
                                      maxlength: 20
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
                                      maxlength: 11
                                  },
                                  aadd_zipcode:
                                  {
                                      digits: true,
                                      maxlength: 4
                                  }
                                },
                                // Specify validation error messages
                                messages: {
                                    pinfo_bday:
                                    {
                                       required: "Empty or Invalid Date."
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
