@extends('pages.admin.master')

@section('title','Tax Settings - Utilities | i-Insure')

@section('utilities','active')

@section('tax','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                UTILITIES - TAX SETTINGS
                            </b></h2>
                        </div>
                        <form name = "updateVal" id = "updateVal" action = "/admin/utilities/tax/save" method = "POST" enctype="multipart/form-data">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input id = "taxid" name = "taxid" type="text" class="form-control" style="display: none;">
                          <input id = "perc" name = "perc" type="text" class="form-control" style="display: none;">
                        <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-basic-example animated lightSpeedIn active">
                                <thead>
                                    <tr class="bg-blue-grey">
                                        <th>Tax Name</th>
                                        <th>Percentage</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                          <tr>
                                              <td>Value Added Tax (VAT)</td>
                                              @foreach($tax as $t)
                                              @if($t->tax_ID == 2)
                                              <td>
                                                <div class="form-group form-float">
                                                    <div id="vat_div" class="form-line">
                                                        <input id = "vat_perc" name = "vat_perc" type="text" class="form-control" pattern="[A-Za-z'-]" readonly=" true" value="<?php $percent = ((float)$t->percentage * 100 ); echo $percent; ?>" required>
                                                    </div>
                                                </div>
                                              </td> 
                                              @endif
                                              @endforeach                                             
                                              <td>
                                              <button type="button" id="btn_vat_upd" class="btn bg-orange waves-effect" data-toggle="tooltip" data-placement="left" title="Update" onclick= "
                                                $('#btn_vat_save').show(200);
                                                $('#btn_vat_upd').hide(200);
                                                $('#vat_perc').prop('readonly', false);
                                                $('#vat_div').addClass('focused success');
                                              ">
                                              <i class="material-icons">refresh</i>
                                              </button>
                                              <button type="button" id="btn_vat_save" class="btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Save Changes" onclick= "
                                                $('#btn_vat_save').hide(200);
                                                $('#btn_vat_upd').show(200);
                                                $('#vat_perc').prop('readonly', true);
                                                $('#vat_div').removeClass('focused success');
                                                $('#perc').val($('#vat_perc').val());
                                                document.getElementById('taxid').value = '2';
                                                document.getElementById('perc').value = getPerc();
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
                                              <td>Documentary Stamp Tax (DST)</td>
                                              @foreach($tax as $t1)
                                              @if($t1->tax_ID == 1)
                                              <td>
                                                <div class="form-group form-float">
                                                    <div id="dst_div" class="form-line">
                                                        <input id = "dst_perc" name = "dst_perc" type="text" class="form-control" pattern="[A-Za-z'-]" readonly=" true" value="<?php $percent = ((float)$t1->percentage * 100 ); echo $percent; ?>" required>
                                                    </div>
                                                </div>
                                              </td> 
                                              @endif
                                              @endforeach                                             
                                              <td>
                                              <button type="button" id="btn_dst_upd" class="btn bg-orange waves-effect" data-toggle="tooltip" data-placement="left" title="Update" onclick= "
                                                $('#btn_dst_save').show(200);
                                                $('#btn_dst_upd').hide(200);
                                                $('#dst_perc').prop('readonly', false);
                                                $('#dst_div').addClass('focused success');
                                              ">
                                              <i class="material-icons">refresh</i>
                                              </button>
                                              <button type="button" id="btn_dst_save" class="btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Save Changes" onclick= "
                                                $('#btn_dst_save').hide(200);
                                                $('#btn_dst_upd').show(200);
                                                $('#dst_perc').prop('readonly', true);
                                                $('#dst_div').removeClass('focused success');
                                                $('#perc').val($('#dst_perc').val());
                                                document.getElementById('taxid').value = '1';
                                                document.getElementById('perc').value = getPerc();
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
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <script>
      function getPerc(a){
           var aa = $('#perc').val();
           a = aa * .01;
           return a;
        } 

      window.onload = function(){
        document.getElementById('btn_vat_save').style.display = 'none';
        document.getElementById('btn_dst_save').style.display = 'none';
      };
    </script>

@endsection