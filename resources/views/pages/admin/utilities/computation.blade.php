@extends('pages.admin.master')

@section('title','Premium Computation Settings - Utilities | i-Insure')

@section('utilities','active')

@section('premium','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                UTILITIES - PREMIUM COMPUTATION SETTINGS
                            </b></h2>
                        </div>
                        <form name = "updateVal" id = "updateVal" action = "/admin/utilities/premium/save" method = "POST" enctype="multipart/form-data">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input id = "compid" name = "compid" type="text" class="form-control" style="display: none;">
                          <input id = "aon" name = "aon" type="text" class="form-control" style="display: none;">
                        <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-basic-example animated lightSpeedIn active">
                                <thead>
                                    <tr class="bg-blue-grey">
                                        <!-- <th class="col-md-1"></th> -->
                                        <th>Insurance Company</th>
                                        <th>Deductible (Php)</th>
                                        <th>Towing (Php)</th>
                                        <th>Acts of Nature (%)</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                          <tr>
                                              <td>FPG Insurance</td>
                                              @foreach($compu as $co)
                                              @if($co->comp_ID == 1)
                                              <td>
                                              		<div class="form-group form-float">
			                                            <div id="fpg_div1" class="form-line">
			                                                <input id = "fpg_ded" name = "fpg_ded" type="text" class="form-control" pattern="[A-Za-z'-]" readonly=" true" value="{{ $co->deductible }}" required>
			                                            </div>
			                                        </div>
                                              </td>
                                              <td>
                                              	<div class="form-group form-float">
			                                            <div id="fpg_div2" class="form-line">
			                                                <input id = "fpg_tow" name = "fpg_tow" type="text" class="form-control" pattern="[A-Za-z'-]" readonly=" true" value="{{ $co->towing }}" required>
			                                            </div>
			                                        </div>
                                              </td>
                                              <td>
                                              	<div class="form-group form-float">
			                                            <div id="fpg_div3" class="form-line">
			                                                <input id = "fpg_aon" name = "fpg_aon" type="text" class="form-control" pattern="[A-Za-z'-]" readonly=" true" value="<?php $percent = ((float)$co->aon * 100 ); echo $percent; ?>" required>
			                                            </div>
			                                        </div>
                                              </td> 
                                              @endif
                                              @endforeach                                             
                                              <td>
                                              <button type="button" id="btn_fpg_upd" class="btn bg-orange waves-effect" data-toggle="tooltip" data-placement="left" title="Update" onclick= "
                                                $('#btn_fpg_save').show(200);
                                                $('#btn_fpg_upd').hide(200);
                                                $('#fpg_ded').prop('readonly', false);
                                                $('#fpg_tow').prop('readonly', false);
                                                $('#fpg_aon').prop('readonly', false);
                                                $('#fpg_div1').addClass('focused success');
                                                $('#fpg_div2').addClass('focused success');
                                                $('#fpg_div3').addClass('focused success');
                                              ">
                                              <i class="material-icons">refresh</i>
                                              </button>
                                              <button type="button" id="btn_fpg_save" class="btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Save Changes" onclick= "
                                                $('#btn_fpg_save').hide(200);
                                                $('#btn_fpg_upd').show(200);
                                                $('#fpg_ded').prop('readonly', true);
                                                $('#fpg_tow').prop('readonly', true);
                                                $('#fpg_aon').prop('readonly', true);
                                                $('#fpg_div1').removeClass('focused success');
                                                $('#fpg_div2').removeClass('focused success');
                                                $('#fpg_div3').removeClass('focused success');
                                                $('#aon').val($('#fpg_aon').val());
                                                document.getElementById('compid').value = '1';
                                                document.getElementById('aon').value = getAon();
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
                                                    $('#updateVal').submit();
                                                  } else {
                                                      swal({
                                                      title: 'Cancelled',
                                                      type: 'warning',
                                                      timer: 500,
                                                      showConfirmButton: false
                                                      });
                                                  }
                                                });
                                                ">
                                              <i class="material-icons">done</i>
                                              </button>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>Standard Insurance</td>
                                              @foreach($compu as $co1)
                                              @if($co1->comp_ID == 3)
                                              <td>
                                              	<div class="form-group form-float">
			                                            <div id="std_div1" class="form-line">
			                                                <input id = "std_ded" name = "std_ded" type="text" class="form-control" pattern="[A-Za-z'-]" readonly=" true" value="{{ $co1->deductible }}" required>
			                                            </div>
			                                        </div>
                                              </td>
                                              <td>
                                              	<div class="form-group form-float">
			                                            <div id="std_div2" class="form-line">
			                                                <input id = "std_tow" name = "std_tow" type="text" class="form-control" pattern="[A-Za-z'-]" readonly=" true" value="{{ $co1->towing }}" required>
			                                            </div>
			                                        </div>
                                              </td>   
                                              <td>
                                              	<div class="form-group form-float">
			                                            <div id="std_div3" class="form-line">
			                                                <input id = "std_aon" name = "std_aon" type="text" class="form-control" pattern="[A-Za-z'-]" readonly=" true" value="<?php $percent = ((float)$co1->aon * 100 ); echo $percent; ?>" required>
			                                            </div>
			                                        </div>
                                              </td> 
                                              @endif
                                              @endforeach                                          
                                              <td>
                                              <button type="button" id="btn_std_upd" class="btn bg-orange waves-effect" data-toggle="tooltip" data-placement="left" title="Update" onclick= "
                                                $('#btn_std_save').show(200);
                                                $('#btn_std_upd').hide(200);
                                                $('#std_ded').prop('readonly', false);
                                                $('#std_tow').prop('readonly', false);
                                                $('#std_aon').prop('readonly', false);
                                                $('#std_div1').addClass('focused success');
                                                $('#std_div2').addClass('focused success');
                                                $('#std_div3').addClass('focused success');
                                              ">
                                              <i class="material-icons">refresh</i>
                                              </button>
                                              <button type="button" id="btn_std_save" class="btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Save Changes" onclick= "
                                                $('#btn_std_save').hide(200);
                                                $('#btn_std_upd').show(200);
                                                $('#std_ded').prop('readonly', true);
                                                $('#std_tow').prop('readonly', true);
                                                $('#std_aon').prop('readonly', true);
                                                $('#std_div1').removeClass('focused success');
                                                $('#std_div2').removeClass('focused success');
                                                $('#std_div3').removeClass('focused success');
                                                $('#aon').val($('#std_aon').val());
                                                document.getElementById('compid').value = '3';
                                                document.getElementById('aon').value = getAon();
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
                                                    $('#updateVal').submit();
                                                  } else {
                                                      swal({
                                                      title: 'Cancelled',
                                                      type: 'warning',
                                                      timer: 500,
                                                      showConfirmButton: false
                                                      });
                                                  }
                                                });
                                                ">
                                              <i class="material-icons">done</i>
                                              </button>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>People's General Insurance</td>
                                              @foreach($compu as $co2)
                                              @if($co2->comp_ID == 4)
                                              <td>
                                              	<div class="form-group form-float">
			                                            <div id="pgi_div1" class="form-line">
			                                                <input id = "pgi_ded" name = "pgi_ded" type="text" class="form-control" pattern="[A-Za-z'-]" readonly=" true" value="{{ $co2->deductible }}" required>
			                                            </div>
			                                        </div>
                                              </td>
                                              <td>
                                              	<div class="form-group form-float">
			                                            <div id="pgi_div2" class="form-line">
			                                                <input id = "pgi_tow" name = "pgi_tow" type="text" class="form-control" pattern="[A-Za-z'-]" readonly=" true" value="{{ $co2->towing }}" required>
			                                            </div>
			                                        </div>
                                              </td>   
                                              <td>
                                              	<div class="form-group form-float">
			                                            <div id="pgi_div3" class="form-line">
			                                                <input id = "pgi_aon" name = "pgi_aon" type="text" class="form-control" pattern="[A-Za-z'-]" readonly=" true" value="<?php $percent = ((float)$co2->aon * 100); echo $percent; ?>" required>
			                                            </div>
			                                        </div>
                                              </td>   
                                              @endif
                                              @endforeach                                        
                                              <td>
                                              <button type="button" id="btn_pgi_upd" class="btn bg-orange waves-effect" data-toggle="tooltip" data-placement="left" title="Update" onclick= "
                                                $('#btn_pgi_save').show(200);
                                                $('#btn_pgi_upd').hide(200);
                                                $('#pgi_ded').prop('readonly', false);
                                                $('#pgi_tow').prop('readonly', false);
                                                $('#pgi_aon').prop('readonly', false);
                                                $('#pgi_div1').addClass('focused success');
                                                $('#pgi_div2').addClass('focused success');
                                                $('#pgi_div3').addClass('focused success');
                                              ">
                                              <i class="material-icons">refresh</i>
                                              </button>
                                              <button type="button" id="btn_pgi_save" class="btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Save Changes" onclick= "
                                                $('#btn_pgi_save').hide(200);
                                                $('#btn_pgi_upd').show(200);
                                                $('#pgi_ded').prop('readonly', true);
                                                $('#pgi_tow').prop('readonly', true);
                                                $('#pgi_aon').prop('readonly', true);
                                                $('#pgi_div1').removeClass('focused success');
                                                $('#pgi_div2').removeClass('focused success');
                                                $('#pgi_div3').removeClass('focused success');
                                                $('#aon').val($('#pgi_aon').val());
                                                document.getElementById('compid').value = '4';
                                                document.getElementById('aon').value = getAon();
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
                                                    $('#updateVal').submit();
                                                  } else {
                                                      swal({
                                                      title: 'Cancelled',
                                                      type: 'warning',
                                                      timer: 500,
                                                      showConfirmButton: false
                                                      });
                                                  }
                                                });
                                                ">
                                              <i class="material-icons">done</i>
                                              </button>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>Commonwealth Insurance</td>
                                              @foreach($compu as $co3)
                                              @if($co3->comp_ID == 2)
                                              <td>
                                              	<div class="form-group form-float">
			                                            <div id="comm_div1" class="form-line">
			                                                <input id = "comm_ded" name = "comm_ded" type="text" class="form-control" pattern="[A-Za-z'-]" readonly=" true" value="{{ $co3->deductible }}" required>
			                                            </div>
			                                        </div>
                                              </td>
                                              <td>
                                              	<div class="form-group form-float">
			                                            <div id="comm_div2" class="form-line">
			                                                <input id = "comm_tow" name = "comm_tow" type="text" class="form-control" pattern="[A-Za-z'-]" readonly=" true" value="{{ $co3->towing }}" required>
			                                            </div>
			                                        </div>
                                              </td>   
                                              <td>
                                              	<div class="form-group form-float">
			                                            <div id="comm_div3" class="form-line">
			                                                <input id = "comm_aon" name = "comm_aon" type="text" class="form-control" pattern="[A-Za-z'-]" readonly=" true" value="<?php $percent = ((float)$co3->aon * 100 ); echo $percent; ?>" required>
			                                            </div>
			                                        </div>
                                              </td> 
                                              @endif
                                              @endforeach                                          
                                              <td>
                                              <button type="button" id="btn_comm_upd" class="btn bg-orange waves-effect" data-toggle="tooltip" data-placement="left" title="Update" onclick= "
                                                $('#btn_comm_save').show(200);
                                                $('#btn_comm_upd').hide(200);
                                                $('#comm_ded').prop('readonly', false);
                                                $('#comm_tow').prop('readonly', false);
                                                $('#comm_aon').prop('readonly', false);
                                                $('#comm_div1').addClass('focused success');
                                                $('#comm_div2').addClass('focused success');
                                                $('#comm_div3').addClass('focused success');
                                              ">
                                              <i class="material-icons">refresh</i>
                                              </button>
                                              <button type="button" id="btn_comm_save" class="btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Save Changes" onclick= "
                                                $('#btn_comm_save').hide(200);
                                                $('#btn_comm_upd').show(200);
                                                $('#comm_ded').prop('readonly', true);
                                                $('#comm_tow').prop('readonly', true);
                                                $('#comm_aon').prop('readonly', true);
                                                $('#comm_div1').removeClass('focused success');
                                                $('#comm_div2').removeClass('focused success');
                                                $('#comm_div3').removeClass('focused success');
                                                $('#aon').val($('#comm_aon').val());
                                                document.getElementById('compid').value = '2';
                                                document.getElementById('aon').value = getAon();
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
                                                    $('#updateVal').submit();
                                                  } else {
                                                      swal({
                                                      title: 'Cancelled',
                                                      type: 'warning',
                                                      timer: 500,
                                                      showConfirmButton: false
                                                      });
                                                  }
                                                });
                                                ">
                                              <i class="material-icons">done</i>
                                              </button>
                                              </td>
                                          </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <script>
      function getAon(a){
           var aa = $('#aon').val();
           a = aa * .01;
           return a;
        } 

      window.onload = function(){
        document.getElementById('btn_comm_save').style.display = 'none';
        document.getElementById('btn_pgi_save').style.display = 'none';
        document.getElementById('btn_std_save').style.display = 'none';
        document.getElementById('btn_fpg_save').style.display = 'none';
      };
    </script>

@endsection