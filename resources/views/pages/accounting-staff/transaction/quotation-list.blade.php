@extends('pages.accounting-staff.master')

@section('title','Quotation List - Transaction | i-Insure')

@section('transQuote', 'active')

@section('transQuoteList', 'active')

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
    <h2 style="text-align: center"> Welcome to <b style="color: orange;"> i-Insure </b><br/>
    <label><small>July 20, 2017 - Thursday</small></label><br/>
    <label><small>09:23:21 AM</small></label>
    </h2>
    <br/>
        <div class="container-fluid">
        <div class="row clearfix">
                <div class="col-md-12">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href=""><i class="material-icons">home</i> Home</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center"><img src="{{ URL::asset ('images/icons/1.png')}}" style="height: 50px; width: 50px;"> Quotation Proposals List</h3>
                        <ul class="header-dropdown m-r--5">
                                <li><button type="button" class="btn bg-blue-grey waves-effect" style="position: right;" onclick="window.document.location='{{ URL::asset('/accounting-staff/transaction/quotation-online-auto-reply') }}';" data-toggle="tooltip" data-placement="bottom" title="View auto-reply settings">
                                            <i class="material-icons">update</i><span style="font-size: 15px;">
                                        </button></li>
                            </ul>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        
                        <form id = "indi_display" action = "/accounting-staff/transaction/quotation-individual-details" method = "GET" style = "display: none;">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "indi_id" name = "indi_id" type="text" class="form-control">
                             </div>
                        </form>
                        
                        <form id = "comp_display" action = "/accounting-staff/transaction/quotation-company-details" method = "GET" style = "display: none;">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "comp_id" name = "comp_id" type="text" class="form-control">
                             </div>
                        </form>

                        <div class="body">
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#individualtab" data-toggle="tab"><img src="{{ URL::asset ('images/icons/insurance-individual.png')}}" style="height: 50px; width: 50px;"> INDIVIDUAL</a></li>
                                <li role="presentation"><a href="#company" data-toggle="tab"><img src="{{ URL::asset ('images/icons/insurance-company.png')}}" style="height: 50px; width: 50px;"> COMPANY</a></li>
                            </ul>

                            <div class="tab-content">
                                <!-- INDIVIDUAL -->
                                <div role="tabpanel" class="tab-pane fade in active" id="individualtab"> 
                                    <div class="body table-responsive">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th>Date Submitted</th>
                                                    <th>Last Update</th>
                                                    <th>Name</th>
                                                    <th>Contact Details</th>
                                                    <th>Unit Details</th>
                                                    <th>Total Premium</th>
                                                    <th class="col-md-1">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        @foreach($qlist as $list)
                                         @foreach($qindi as $indi)
                                          @if($list->del_flag == 0)
                                          @if($list->quote_ID == $indi->quote_indi_ID)
                                          <!-- Computation -->
                                          <div style = "display:none;">
                                            {{$total = 0}}
                                            {{$pa = 0}}
                                            {{$bi = 0}}
                                            {{$pd = 0}}
                                             @foreach($ppa as $pa)
                                              @if($pa->premiumPA_ID == $indi->personal_accident_ID)
                                               {{$total += $pa->insuranceCover+$pa->passengerCover+$pa->mrCover}}
                                               {{$pa = $pa->insuranceCover+$pa->passengerCover+$pa->mrCover}}
                                              @endif
                                             @endforeach
                                             @foreach($pdg as $dg)
                                              @if($dg->premiumDG_ID == $indi->bodily_injury_ID)
                                               @if($indi->vehicle_class == 1)
                                                {{$total += $dg->privateCar}}
                                                {{$bi = $dg->privateCar}}
                                               @endif
                                               @if($indi->vehicle_class == 2)
                                                {{$total += $dg->cv_Heavy}}
                                                {{$bi = $dg->privateCar}}
                                               @endif
                                               @if($indi->vehicle_class == 3)
                                                {{$total += $dg->cv_Light}}
                                                {{$bi = $dg->privateCar}}
                                               @endif
                                              @endif
                                             @endforeach
                                             @foreach($pdg as $dg)
                                              @if($dg->premiumDG_ID == $indi->property_damage_ID)
                                               @if($indi->vehicle_class == 1)
                                                {{$total += $dg->privateCar}}
                                                {{$pd = $dg->privateCar}}
                                               @endif
                                               @if($indi->vehicle_class == 2)
                                                {{$total += $dg->cv_Heavy }}
                                                {{$pd = $dg->cv_Heavy}}
                                               @endif
                                               @if($indi->vehicle_class == 3)
                                                {{$total += $dg->cv_Light}}
                                                {{$pd = $dg->cv_Light}}
                                               @endif
                                              @endif
                                             @endforeach
                                          </div>
                                          <!-- Computation -->
                                            <tr>
                                                <td>
                                                    @if($list->quote_status == 0)
                                                     <span class="label bg-blue">new
                                                    @elseif($list->quote_status == 1)
                                                     <span class="label bg-orange">approved - client
                                                    @elseif($list->quote_status == 2)
                                                     <span class="label bg-green">approved - manager
                                                    @elseif($list->quote_status == 3)
                                                     <span class="label bg-red">rejected - manager
                                                    @elseif($list->quote_status == 4)
                                                     <span class="label bg-red">cancelled
                                                    @elseif($list->quote_status == 5)
                                                     <span class="label bg-orange">pending - manager
                                                    @elseif($list->quote_status == 6)
                                                     <span class="label bg-orange">pending - client
                                                    @elseif($list->quote_status == 7)
                                                     <span class="label bg-red">rejected - client
                                                    @elseif($list->quote_status == 8)
                                                     <span class="label bg-green">Insured Client
                                                    @endif
                                                </td>
                                                <td>{{\Carbon\Carbon::parse($list->created_at)->format("F d, Y")}}</td>
                                                <td>{{\Carbon\Carbon::parse($list->updated_at)->format("F d, Y")}}</td>
                                                <td>{{$indi->pinfo_last_name.", ".$indi->pinfo_first_name." ".$indi->pinfo_middle_name}}</td>
                                                <td>
                                                 <ul>
                                                  @if($indi->pinfo_cpnum_1 != "")
                                                    <li>{{$indi->pinfo_cpnum_1}}</li>
                                                  @endif
                                                  @if($indi->pinfo_cpnum_2 != "")
                                                    <li>{{$indi->pinfo_cpnum_2}}</li>
                                                  @endif
                                                  @if($indi->pinfo_tpnum != "")
                                                    <li>{{$indi->pinfo_tpnum}}</li>
                                                  @endif
                                                  @if($indi->pinfo_mail != "")
                                                    <li>{{$indi->pinfo_mail}}</li>
                                                  @endif
                                                 </ul>
                                                </td>
                                                <td>
                                                 {{$indi->vehicle_year_model}}
                                                 @foreach($model as $mod)
                                                  @if($indi->vehicle_model_ID == $mod->vehicle_model_ID)
                                                   {{$mod->vehicle_model_name}}
                                                  @endif
                                                 @endforeach
                                                 {{$indi->specify_model}}
                                                </td>
                                                <td>
                                                 <script>
                                                    var data = numberWithCommas('{{$total}}'); document.write("₱ " + data);
                                                 </script>
                                                </td>
                                                <td>
                                                <button form = "indi_display" type="submit" class="btn bg-light-blue waves-effect view" data-id = "{{$indi->quote_indi_ID}}" onclick="$('#indi_id').val($(this).data('id'));" data-toggle="tooltip" data-placement="left" title="View details"><i class="material-icons">remove_red_eye</i>
                                                </button>
                                                @if($list->quote_status == 0)
                                                <button type="button" class="btn bg-green waves-effect forward_manager" data-id = "{{$indi->quote_indi_ID}}" data-toggle="tooltip" data-placement="left" title="Forward to Manager"><i class="material-icons">forward</i>
                                                </button>
                                                <button type="button" class="btn bg-red waves-effect delete" data-id = "{{$indi->quote_indi_ID}}"data-toggle="tooltip" data-placement="left" title="Delete this quotation"><i class="material-icons">delete</i>
                                                </button>
                                                @endif
                                                @if($list->quote_status == 1)
                                                <button type="button" class="btn bg-green waves-effect insure" data-id = "{{$indi->quote_indi_ID}}" data-toggle="tooltip" data-placement="left" title="Insure client"><i class="material-icons">send</i>
                                                </button>
                                                @endif
                                                @if($list->quote_status == 2)
                                                <button type="button" class="btn bg-orange waves-effect forward_client" data-id = "{{$indi->quote_indi_ID}}"data-toggle="tooltip" data-placement="left" title="Ask for client's confirmation"><i class="material-icons">question_answer</i>
                                                <button type="button" class="btn bg-red waves-effect delete" data-id = "{{$indi->quote_indi_ID}}"data-toggle="tooltip" data-placement="left" title="Delete this quotation"><i class="material-icons">delete</i>
                                                </button>
                                                </button>
                                                @endif
                                                @if($list->quote_status == 3 || $list->quote_status == 7)
                                                <button type="button" class="btn bg-red waves-effect delete" data-id = "{{$indi->quote_indi_ID}}"  data-toggle="tooltip" data-placement="left" title="Delete this quotation"><i class="material-icons">delete</i>
                                                </button>
                                                @endif
                                                @if($list->quote_status == 4)
                                                <button type="button" class="btn bg-red waves-effect delete" data-id = "{{$indi->quote_indi_ID}}" data-toggle="tooltip" data-placement="left" title="Delete this quotation"><i class="material-icons">delete</i>
                                                </button>
                                                @endif
                                                </td>
                                            </tr>
                                          @endif
                                          @endif
                                         @endforeach
                                        @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- COMPANY -->
                                <div role="tabpanel" class="tab-pane fade" id="company"> 
                                    <div class="body table-responsive">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th>Date Submitted</th>
                                                    <th>Last Update</th>
                                                    <th>Company Name</th>
                                                    <th>Contact Person</th>
                                                    <th>Contact Details</th>
                                                    <th>Unit Details</th>
                                                    <th>Total Premium</th>
                                                    <th class="col-md-1">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        @foreach($qlist as $list)
                                         @foreach($qcomp as $comp)
                                          @if($list->del_flag == 0)
                                          @if($list->quote_ID == $comp->quote_comp_ID)
                                          <!-- Computation -->
                                          <div style = "display:none;">
                                            {{$total = 0}}
                                            {{$pa = 0}}
                                            {{$bi = 0}}
                                            {{$pd = 0}}
                                             @foreach($ppa as $pa)
                                              @if($pa->premiumPA_ID == $comp->personal_accident_ID)
                                               {{$total += $pa->insuranceCover+$pa->passengerCover+$pa->mrCover}}
                                               {{$pa = $pa->insuranceCover+$pa->passengerCover+$pa->mrCover}}
                                              @endif
                                             @endforeach
                                             @foreach($pdg as $dg)
                                              @if($dg->premiumDG_ID == $comp->bodily_injury_ID)
                                               @if($comp->vehicle_class == 1)
                                                {{$total += $dg->privateCar}}
                                                {{$bi = $dg->privateCar}}
                                               @endif
                                               @if($comp->vehicle_class == 2)
                                                {{$total += $dg->cv_Heavy}}
                                                {{$bi = $dg->privateCar}}
                                               @endif
                                               @if($comp->vehicle_class == 3)
                                                {{$total += $dg->cv_Light}}
                                                {{$bi = $dg->privateCar}}
                                               @endif
                                              @endif
                                             @endforeach
                                             @foreach($pdg as $dg)
                                              @if($dg->premiumDG_ID == $comp->property_damage_ID)
                                               @if($comp->vehicle_class == 1)
                                                {{$total += $dg->privateCar}}
                                                {{$pd = $dg->privateCar}}
                                               @endif
                                               @if($comp->vehicle_class == 2)
                                                {{$total += $dg->cv_Heavy }}
                                                {{$pd = $dg->cv_Heavy}}
                                               @endif
                                               @if($comp->vehicle_class == 3)
                                                {{$total += $dg->cv_Light}}
                                                {{$pd = $dg->cv_Light}}
                                               @endif
                                              @endif
                                             @endforeach
                                          </div>
                                              <tr>
                                                <td>
                                                    @if($list->quote_status == 0)
                                                     <span class="label bg-blue">new
                                                    @elseif($list->quote_status == 1)
                                                     <span class="label bg-orange">approved - client
                                                    @elseif($list->quote_status == 2)
                                                     <span class="label bg-green">approved - manager
                                                    @elseif($list->quote_status == 3)
                                                     <span class="label bg-red">rejected - manager
                                                    @elseif($list->quote_status == 4)
                                                     <span class="label bg-red">cancelled
                                                    @elseif($list->quote_status == 5)
                                                     <span class="label bg-orange">pending - manager
                                                    @elseif($list->quote_status == 6)
                                                     <span class="label bg-orange">pending - client
                                                    @elseif($list->quote_status == 7)
                                                     <span class="label bg-red">rejected - client
                                                    @elseif($list->quote_status == 8)
                                                     <span class="label bg-green">Insured Client
                                                    @endif
                                                </td>
                                                <td>{{\Carbon\Carbon::parse($list->created_at)->format("F d, Y")}}</td>
                                                <td>{{\Carbon\Carbon::parse($list->updated_at)->format("F d, Y")}}</td>
                                                <td>{{$comp->comp_name}}</td>
                                                <td>
                                                    {{$comp->pinfo_last_name.", ".$comp->pinfo_first_name." ".$comp->pinfo_middle_name}}
                                                </td>
                                                <td>
                                                 <ul>
                                                  @if($comp->pinfo_cpnum_1 != "")
                                                    <li>{{$comp->pinfo_cpnum_1}}</li>
                                                  @endif
                                                  @if($comp->pinfo_cpnum_2 != "")
                                                    <li>{{$comp->pinfo_cpnum_2}}</li>
                                                  @endif
                                                  @if($comp->pinfo_tpnum != "")
                                                    <li>{{$comp->pinfo_tpnum}}</li>
                                                  @endif
                                                  @if($comp->pinfo_mail != "")
                                                    <li>{{$comp->pinfo_mail}}</li>
                                                  @endif
                                                 </ul>
                                                </td>
                                                <td>
                                                {{$comp->vehicle_year_model}}
                                                @foreach($model as $mod)
                                                 @if($comp->vehicle_model_ID == $mod->vehicle_model_ID)
                                                  {{$mod->vehicle_model_name}}
                                                 @endif
                                                @endforeach
                                                {{$comp->specify_model}}
                                                </td>
                                                <td>
                                                 <script>
                                                    var data = numberWithCommas('{{$total}}'); document.write("₱ " + data);
                                                 </script>
                                                </td>
                                                <td>
                                                <button form = "comp_display" type="submit" class="btn bg-light-blue waves-effect view" data-id = "{{$comp->quote_comp_ID}}"  onclick="$('#comp_id').val($(this).data('id'));" data-toggle="tooltip" data-placement="left" title="View details"><i class="material-icons">remove_red_eye</i>
                                                </button>
                                                @if($list->quote_status == 0)
                                                <button type="button" class="btn bg-green waves-effect forward_manager" data-id = "{{$comp->quote_comp_ID}}" data-toggle="tooltip" data-placement="left" title="Forward to Manager"><i class="material-icons">forward</i>
                                                </button>
                                                <button type="button" class="btn bg-red waves-effect delete" data-id = "{{$comp->quote_comp_ID}}"data-toggle="tooltip" data-placement="left" title="Delete this quotation"><i class="material-icons">delete</i>
                                                </button>
                                                @endif
                                                @if($list->quote_status == 1)
                                                <button type="button" class="btn bg-green waves-effect insure" data-id = "{{$comp->quote_comp_ID}}" data-toggle="tooltip" data-placement="left" title="Insure client"><i class="material-icons">send</i>
                                                </button>
                                                @endif
                                                @if($list->quote_status == 2)
                                                <button type="button" class="btn bg-orange waves-effect forward_client" data-id = "{{$comp->quote_comp_ID}}"data-toggle="tooltip" data-placement="left" title="Ask for client's confirmation"><i class="material-icons">question_answer</i>
                                                <button type="button" class="btn bg-red waves-effect delete" data-id = "{{$comp->quote_comp_ID}}"data-toggle="tooltip" data-placement="left" title="Delete this quotation"><i class="material-icons">delete</i>
                                                </button>
                                                </button>
                                                @endif
                                                @if($list->quote_status == 3)
                                                <button type="button" class="btn bg-red waves-effect delete" data-id = "{{$comp->quote_comp_ID}}"  data-toggle="tooltip" data-placement="left" title="Delete this quotation"><i class="material-icons">delete</i>
                                                </button>
                                                @endif
                                                @if($list->quote_status == 4)
                                                <button type="button" class="btn bg-red waves-effect delete" data-id = "{{$comp->quote_comp_ID}}" data-toggle="tooltip" data-placement="left" title="Delete this quotation"><i class="material-icons">delete</i>
                                                </button>
                                                @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @endif
                                             @endforeach
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- END OF TAB -->
                        </div>
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
    </section>
    <form id="quote" name = "quote" action = "/accounting-staff/transaction/quotation-list/insure-client" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="col-md-4" style = "display: none;">
       <input id = "ID" name = "ID" type="text" class="form-control">
      </div>
      <div class="col-md-4" style = "display: none;">
       <input id = "code" name = "code" type="text" class="form-control">
      </div>
    </form>
    <script>
        $('.forward_manager').click(function(event){
              $.ajax({

                  type: 'POST',
                  url: '/accounting-staff/transaction/quotation-list/forward-manager',
                  data: {ID:$(this).data('id')},
                  success:function(xhr){
                      window.location.reload();
                      $.notify('Record Forwarded to Manager', 
                        { 
                          globalPosition: 'top center',
                          autoHideDelay: 1500, 
                          className: 'success',
                        }
                      );
                  },
                    error:function(xhr, ajaxOptions, thrownError,data){
                      $.notify('There seems to be a problem.', 
                        { 
                          globalPosition: 'top center',
                          autoHideDelay: 1500, 
                          className: 'error',
                        }
                      );
                  }
              });
        });


        $('.forward_client').click(function(event){
              $.ajax({

                  type: 'POST',
                  url: '/accounting-staff/transaction/quotation-list/forward-client',
                  data: {ID:$(this).data('id')},
                  success:function(xhr){
                      window.location.reload();
                      $.notify('Sent Notification to Client', 
                        { 
                          globalPosition: 'top center',
                          autoHideDelay: 1500, 
                          className: 'success',
                        }
                      );
                  },
                    error:function(xhr, ajaxOptions, thrownError,data){
                      $.notify('There seems to be a problem.', 
                        { 
                          globalPosition: 'top center',
                          autoHideDelay: 1500, 
                          className: 'error',
                        }
                      );
                  }
              });
        });

        $('.insure').click(function(event){
            $('#ID').val($(this).data('id'));
            swal({
              title: 'Include Client Information?',
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
                swal({
                    title: 'Include Vehicle Information?',
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
                      $('#code').val(1);// include both
                      swal({
                        title: 'Continue? (All Details)',
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
                          $('#quote').submit();
                        } else {
                            swal({
                            title: 'Cancelled',
                            type: 'warning',
                            timer: 500,
                            showConfirmButton: false
                            });
                        }
                      });
                    } else {
                      $('#code').val(2);//client only
                      swal({
                        title: 'Continue? (Client Details only)',
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
                          $('#quote').submit();
                        } else {
                            swal({
                            title: 'Cancelled',
                            type: 'warning',
                            timer: 500,
                            showConfirmButton: false
                            });
                        }
                      });
                    }
                  });
              } 
              else {
                  swal({
                    title: 'Include Vehicle Information?',
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
                      $('#code').val(3);// vehicle only
                      swal({
                        title: 'Continue? (Vehicle Details only)',
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
                          $('#quote').submit();
                        } else {
                            swal({
                            title: 'Cancelled',
                            type: 'warning',
                            timer: 500,
                            showConfirmButton: false
                            });
                        }
                      });
                    } else {
                      $('#code').val(0);// none
                      swal({
                        title: 'Continue? (Insurance Details only)',
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
                          $('#quote').submit();
                        } else {
                            swal({
                            title: 'Cancelled',
                            type: 'warning',
                            timer: 500,
                            showConfirmButton: false
                            });
                        }
                      });
                    }
                  });
              }
            });
        });
    </script>
@endsection
