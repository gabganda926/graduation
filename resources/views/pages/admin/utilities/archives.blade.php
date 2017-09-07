@extends('pages.admin.master')

@section('title','Archives - Utilities | i-Insure')

@section('utilities','active')

@section('archives','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="header">
                    <h2><b>
                        UTILITIES - ARCHIVES
                    </b></h2>
                </div>
                <div class="body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                        <li role="presentation" class="active"><a href="#client" data-toggle="tab">CLIENT</a></li>
                        <li role="presentation"><a href="#personnel" data-toggle="tab">COMPANY PERSONNEL</a></li>
                        <li role="presentation"><a href="#vehicle" data-toggle="tab">VEHICLE</a></li>
                        <li role="presentation"><a href="#insurance" data-toggle="tab">INSURANCE</a></li>
                        <li role="presentation"><a href="#premiums" data-toggle="tab">PREMIUMS</a></li>
                        <li role="presentation"><a href="#claims" data-toggle="tab">CLAIMS</a></li>
                        <li role="presentation"><a href="#bank" data-toggle="tab">BANK</a></li>
                        <li role="presentation"><a href="#complaint" data-toggle="tab">COMPLAINT</a></li>
                        <li role="presentation"><a href="#transmittal" data-toggle="tab">TRANSMITTAL DOCUMENTS</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- BANK ARCHIVE -->
                        <div role="tabpanel" class="tab-pane fade" id="bank"> 
                            <p>
                                <div class="header">
                                    <h2><b>
                                        BANK
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "bank_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th>Bank Name</th>
                                                <th>Company Address</th>
                                                <th>Contact Person</th>
                                                <th>Contact Details</th>
                                                <th class="col-md-2">Date Created</th>
                                                <th class="col-md-2">Date Deactivated</th>
                                                <th class="col-md-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										  @foreach($bank as $bnk)
											@if($bnk->del_flag == 1)
												<tr>
													<td><input type="checkbox" id="bank_{{$bnk->bank_ID}}" name = "del_check" class="filled-in chk-col-red bank_checkCheckbox"
													data-id="{{$bnk->bank_ID}}"/>
													<label for="bank_{{$bnk->bank_ID}}"></label></td>
													<td>{{ $bnk->bank_name }}</td>
													<td>
													@foreach($address as $addata)
													  @if($addata->add_ID == $bnk->bank_add_ID)
													  {{ $addata->add_blcknum }}
													  @endif
													@endforeach

													@foreach($address as $addata)
													  @if($addata->add_ID == $bnk->bank_add_ID)
													  {{ $addata->add_street }}
													  @endif
													@endforeach

													@foreach($address as $addata)
													  @if($addata->add_ID == $bnk->bank_add_ID)
													  {{ $addata->add_subdivision }}
													  @endif
													@endforeach

													@foreach($address as $addata)
													  @if($addata->add_ID == $bnk->bank_add_ID)
													  {{ $addata->add_brngy }}
													  @endif
													@endforeach

													@foreach($address as $addata)
													  @if($addata->add_ID == $bnk->bank_add_ID)
													  {{ $addata->add_district }}
													  @endif
													@endforeach

													@foreach($address as $addata)
													  @if($addata->add_ID == $bnk->bank_add_ID)
													  {{ $addata->add_city }}
													  @endif
													@endforeach

													@foreach($address as $addata)
													  @if($addata->add_ID == $bnk->bank_add_ID)
													  {{ $addata->add_province }}
													  @endif
													@endforeach

													@foreach($address as $addata)
													  @if($addata->add_ID == $bnk->bank_add_ID)
													  {{ 'Region '.$addata->add_region }}
													  @endif
													@endforeach
													</td>
													<td>
													@foreach($cperson as $cper)
													  @if($cper->cPerson_ID == $bnk->bank_cperson_ID)
													   @foreach($pinfo as $Info)
														@if($cper->personal_info_ID == $Info->pinfo_ID )
														  {{ $Info->pinfo_last_name.', ' }}
														@endif
													   @endforeach
													  @endif
													@endforeach
													@foreach($cperson as $cper)
													  @if($cper->cPerson_ID == $bnk->bank_cperson_ID)
													   @foreach($pinfo as $Info)
														@if($cper->personal_info_ID == $Info->pinfo_ID )
														  {{ $Info->pinfo_first_name.' ' }}
														@endif
													   @endforeach
													  @endif
													@endforeach
													@foreach($cperson as $cper)
													  @if($cper->cPerson_ID == $bnk->bank_cperson_ID)
													   @foreach($pinfo as $Info)
														@if($cper->personal_info_ID == $Info->pinfo_ID )
														  {{ $Info->pinfo_middle_name }}
														@endif
													   @endforeach
													  @endif
													@endforeach
													</td>
													<td>
													<ul>
													@foreach($cperson as $cper)
													  @if($cper->cPerson_ID == $bnk->bank_cperson_ID)
													   @foreach($pinfo as $Info)
														@if($cper->personal_info_ID == $Info->pinfo_ID )
														 @if($Info->pinfo_cpnum_1 != null)
														  <li> {{ $Info->pinfo_cpnum_1 }} </li>
														 @endif
														@endif
													   @endforeach
													  @endif
													@endforeach
													@foreach($cperson as $cper)
													  @if($cper->cPerson_ID == $bnk->bank_cperson_ID)
													   @foreach($pinfo as $Info)
														@if($cper->personal_info_ID == $Info->pinfo_ID )
														 @if($Info->pinfo_cpnum_2 != null)
														  <li>{{ $Info->pinfo_cpnum_2 }}</li>
														 @endif
														@endif
													   @endforeach
													  @endif
													@endforeach
													@foreach($cperson as $cper)
													  @if($cper->cPerson_ID == $bnk->bank_cperson_ID)
													   @foreach($pinfo as $Info)
														@if($cper->personal_info_ID == $Info->pinfo_ID )
														 @if($Info->pinfo_tpnum != null)
														  <li>{{ $Info->pinfo_tpnum }}</li>
														 @endif
														@endif
													   @endforeach
													  @endif
													@endforeach
													@foreach($cperson as $cper)
													  @if($cper->cPerson_ID == $bnk->bank_cperson_ID)
													   @foreach($pinfo as $Info)
														@if($cper->personal_info_ID == $Info->pinfo_ID )
														 @if($Info->pinfo_mail != null)
														  <li>{{ $Info->pinfo_mail }}</li>
														 @endif
														@endif
													   @endforeach
													  @endif
													@endforeach
													</ul>
													</td>
													<td>{{ \Carbon\Carbon::parse($bnk->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($bnk->created_at)->format('l, h:i:s A').")" }}</td>
													<td>{{ \Carbon\Carbon::parse($bnk->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($bnk->updated_at)->format('l, h:i:s A').")" }}</td>
													<td>
														<button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
														data-id = '{{$bnk->bank_ID}}'
														data-category = '0'>
															<i class="material-icons">autorenew</i>
														</button>
														<button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
															<i class="material-icons">delete_sweep</i>
														</button>
													</td>
												  </tr>
											@endif
										  @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </p>
                        </div>
                        <!-- END OF BANK ARCHIVE -->

                        <!-- CLIENT ARCHIVE -->
                        <div role="tabpanel" class="tab-pane fade in active" id="client"> 
                            <p>
                                <div class="header">
                                    <h2><b>
                                        CLIENT - INDIVIDUAL
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "ci_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Contact Details</th>
                                                <th class="col-md-2">Date Created</th>
                                                <th class="col-md-2">Date Deactivated</th>
                                                <th class="col-md-1">Actions</th>
                                            </tr>
                                        </thead>
                                            @foreach($client as $cli)
                                             @if($cli->del_flag == 1)
                                                <tr>
                                                  <td><input type="checkbox" id="ci_{{$cli->client_ID}}" class="filled-in chk-col-red ci_checkCheckbox" data-id = "{{$cli->client_ID}}"/>
                                                    <label for="ci_{{$cli->client_ID}}"></label>
                                                  </td> 
                                                   @foreach($pinfo as $Info)
                                                    @if($cli->personal_info_ID == $Info->pinfo_ID )
                                                     @if($Info->pinfo_picture == null)
                                                     <td><img src="{!! '/image/'.'default-image.png' !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></td>
                                                     @else
                                                     <td><img src="{!! '/image/'.$Info->pinfo_picture !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></td>
                                                     @endif
                                                    @endif
                                                   @endforeach
                                                  <td>
                                                   @foreach($pinfo as $Info)
                                                    @if($cli->personal_info_ID == $Info->pinfo_ID )
                                                      {{ $Info->pinfo_last_name.', ' }}
                                                    @endif
                                                   @endforeach
                                                   @foreach($pinfo as $Info)
                                                    @if($cli->personal_info_ID == $Info->pinfo_ID )
                                                      {{ $Info->pinfo_first_name.' ' }}
                                                    @endif
                                                   @endforeach
                                                   @foreach($pinfo as $Info)
                                                    @if($cli->personal_info_ID == $Info->pinfo_ID )
                                                      {{ $Info->pinfo_middle_name }}
                                                    @endif
                                                   @endforeach
                                                  </td>
                                                  <td>
                                                    @foreach($address as $addata)
                                                      @if($addata->add_ID == $cli->client_add_ID)
                                                      {{ $addata->add_blcknum }}
                                                      @endif
                                                    @endforeach

                                                    @foreach($address as $addata)
                                                      @if($addata->add_ID == $cli->client_add_ID)
                                                      {{ $addata->add_street }}
                                                      @endif
                                                    @endforeach

                                                    @foreach($address as $addata)
                                                      @if($addata->add_ID == $cli->client_add_ID)
                                                      {{ $addata->add_subdivision }}
                                                      @endif
                                                    @endforeach

                                                    @foreach($address as $addata)
                                                      @if($addata->add_ID == $cli->client_add_ID)
                                                      {{ $addata->add_brngy }}
                                                      @endif
                                                    @endforeach

                                                    @foreach($address as $addata)
                                                      @if($addata->add_ID == $cli->client_add_ID)
                                                      {{ $addata->add_district }}
                                                      @endif
                                                    @endforeach

                                                    @foreach($address as $addata)
                                                      @if($addata->add_ID == $cli->client_add_ID)
                                                      {{ $addata->add_city }}
                                                      @endif
                                                    @endforeach

                                                    @foreach($address as $addata)
                                                      @if($addata->add_ID == $cli->client_add_ID)
                                                      {{ $addata->add_province }}
                                                      @endif
                                                    @endforeach

                                                    @foreach($address as $addata)
                                                      @if($addata->add_ID == $cli->client_add_ID)
                                                      {{ 'Region '.$addata->add_region }}
                                                      @endif
                                                    @endforeach
                                                  </td>
                                                  <td>
                                                   @foreach($pinfo as $Info)
                                                    @if($cli->personal_info_ID == $Info->pinfo_ID )
                                                     @if($Info->pinfo_cpnum_1 != null)
                                                      <li> {{ $Info->pinfo_cpnum_1 }} </li>
                                                     @endif
                                                    @endif
                                                   @endforeach
                                                   @foreach($pinfo as $Info)
                                                    @if($cli->personal_info_ID == $Info->pinfo_ID )
                                                     @if($Info->pinfo_cpnum_2 != null)
                                                      <li>{{ $Info->pinfo_cpnum_2 }}</li>
                                                     @endif
                                                    @endif
                                                   @endforeach
                                                   @foreach($pinfo as $Info)
                                                    @if($cli->personal_info_ID == $Info->pinfo_ID )
                                                     @if($Info->pinfo_tpnum != null)
                                                      <li>{{ $Info->pinfo_tpnum }}</li>
                                                     @endif
                                                    @endif
                                                   @endforeach
                                                   @foreach($pinfo as $Info)
                                                    @if($cli->personal_info_ID == $Info->pinfo_ID )
                                                     @if($Info->pinfo_mail != null)
                                                      <li>{{ $Info->pinfo_mail }}</li>
                                                     @endif
                                                    @endif
                                                   @endforeach
                                                  </td>
                                                  <td>{{ \Carbon\Carbon::parse($cli->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($cli->created_at)->format('l, h:i:s A').")" }}</td>
                                                  <td>{{ \Carbon\Carbon::parse($cli->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($cli->updated_at)->format('l, h:i:s A').")" }}</td>
                                                  <td>
                                                      <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
                                                      data-id = '{{$cli->client_ID}}'
                                                      data-category = '1'>
                                                          <i class="material-icons">autorenew</i>
                                                      </button>
                                                      <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                                          <i class="material-icons">delete_sweep</i>
                                                      </button>
                                                  </td>
                                                  @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>

                                <div class="header">
                                    <h2><b>
                                        CLIENT - COMPANY
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "cc_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th>Company Name</th>
                                                <th>Company Address</th>
                                                <th>Contact Person</th>
                                                <th>Contact Details</th>
                                                <th>Image</th>
                                                <th class="col-md-2">Date Created</th>
                                                <th class="col-md-2">Date Deactivated</th>
                                                <th class="col-md-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                @foreach($company as $comp)
                                 @if($comp->del_flag == 1)
                                  @if($comp->comp_type == 1)
                                  @foreach($address as $addata)
                                   @if($addata->add_ID == $comp->comp_add_ID)
                                    @foreach($cperson as $cper)
                                     @if($cper->cPerson_ID == $comp->comp_cperson_ID)
                                      @foreach($pinfo as $Info)
                                       @if($Info->pinfo_ID == $cper->personal_info_ID)
                                        <td>
                                            <input type="checkbox" id="cc_{{$comp->comp_ID}}" class="filled-in chk-col-red cc_checkCheckbox" data-id = "{{$comp->comp_ID}}"/>
                                            <label for="cc_{{$comp->comp_ID}}"></label>
                                        </td>
                                        <td>
                                         {{ $comp->comp_name }}
                                        </td>
                                        <td>
                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_blcknum }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_street }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_subdivision }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_brngy }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_district }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_city }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_province }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ 'Region '.$addata->add_region }}
                                          @endif
                                        @endforeach
                                        </td>
                                        <td>
                                        @foreach($cperson as $cpr)
                                          @if($cpr->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pinfo as $Info)
                                            @if($cpr->personal_info_ID == $Info->pinfo_ID )
                                              {{ $Info->pinfo_last_name.', ' }}
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        @foreach($cperson as $cpr)
                                          @if($cpr->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pinfo as $Info)
                                            @if($cpr->personal_info_ID == $Info->pinfo_ID )
                                              {{ $Info->pinfo_first_name.' ' }}
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        @foreach($cperson as $cpr)
                                          @if($cpr->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pinfo as $Info)
                                            @if($cpr->personal_info_ID == $Info->pinfo_ID )
                                              {{ $Info->pinfo_middle_name }}
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        </td>
                                        <td>
                                        <ul>
                                        @foreach($cperson as $cpr)
                                          @if($cpr->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pinfo as $Info)
                                            @if($cpr->personal_info_ID == $Info->pinfo_ID )
                                             @if($Info->pinfo_cpnum_1 != null)
                                              <li> {{ $Info->pinfo_cpnum_1 }} </li>
                                             @endif
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        @foreach($cperson as $cpr)
                                          @if($cpr->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pinfo as $Info)
                                            @if($cpr->personal_info_ID == $Info->pinfo_ID )
                                             @if($Info->pinfo_cpnum_2 != null)
                                              <li>{{ $Info->pinfo_cpnum_2 }}</li>
                                             @endif
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        @foreach($cperson as $cpr)
                                          @if($cpr->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pinfo as $Info)
                                            @if($cpr->personal_info_ID == $Info->pinfo_ID )
                                             @if($Info->pinfo_tpnum != null)
                                              <li>{{ $Info->pinfo_tpnum }}</li>
                                             @endif
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        @foreach($cperson as $cpr)
                                          @if($cpr->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pinfo as $Info)
                                            @if($cpr->personal_info_ID == $Info->pinfo_ID )
                                             @if($Info->pinfo_mail != null)
                                              <li>{{ $Info->pinfo_mail }}</li>
                                             @endif
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        </ul>
                                        </td> 
                                        @foreach($cperson as $cpr)
                                          @if($cpr->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pinfo as $Info)
                                            @if($cpr->personal_info_ID == $Info->pinfo_ID )
                                            @if($Info->pinfo_picture == null)
                                            <td><img src="{!! '/image/'.'default-image.png' !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></td>
                                            @else
                                            <td><img src="{!! '/image/'.$Info->pinfo_picture !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></td>
                                            @endif
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        <td>{{ \Carbon\Carbon::parse($comp->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($cli->created_at)->format('l, h:i:s A').")" }}</td>
                                        <td>{{ \Carbon\Carbon::parse($comp->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($cli->updated_at)->format('l, h:i:s A').")" }}</td>
                                        <td>
                                            <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
                                            data-id = '{{$comp->comp_ID}}'
                                            data-category = '2'>
                                                <i class="material-icons">autorenew</i>
                                            </button>
                                            <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                                <i class="material-icons">delete_sweep</i>
                                            </button>
                                        </td>
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
                            </p>
                        </div>
                        <!-- END OF CLIENT ARCHIVE -->

                        <!-- PERSONNEL ARCHIVE -->
                        <div role="tabpanel" class="tab-pane fade" id="personnel"> 
                            <p>
                                <div class="header">
                                    <h2><b>
                                        EMPLOYEE ROLE
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "er_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th>Employee Role</th>
                                                <th>Desctiption</th>
                                                <th class="col-md-2">Date Created</th>
                                                <th class="col-md-2">Date Deactivated</th>
                                                <th class="col-md-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      @foreach($emprole as $role)
                                       @if($role->del_flag == 1)
                                          <tr>
                                              <td><input type="checkbox" id="er_{{ $role->emp_role_ID }}" name = "del_check" class="filled-in chk-col-red er_checkCheckbox" data-id = "{{ $role->emp_role_ID }}"/>
                                              <label for="er_{{ $role->emp_role_ID }}"></label></td>
                                              <td>{{ $role->emp_role_Name }}</td>
                                              <td>{{ $role->emp_role_desc }}</td>
                                            <td>{{ \Carbon\Carbon::parse($role->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($role->created_at)->format('l, h:i:s A').")" }}</td>
                                            <td>{{ \Carbon\Carbon::parse($role->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($role->updated_at)->format('l, h:i:s A').")" }}</td>
                                            <td>
                                                <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
                                                data-id = '{{$role->emp_role_ID}}'
                                                data-category = '3'>
                                                    <i class="material-icons">autorenew</i>
                                                </button>
                                                <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                                    <i class="material-icons">delete_sweep</i>
                                                </button>
                                            </td>
                                          </tr>
                                       @endif
                                      @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>

                                <div class="header">
                                    <h2><b>
                                        EMPLOYEE PROFILE
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "emp_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Employee Role</th>
                                                <th>Address</th>
                                                <th>Contact Details</th>
                                                <th class="col-md-2">Date Created</th>
                                                <th class="col-md-2">Date Deactivated</th>
                                                <th class="col-md-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                  @foreach($employee as $empdata)
                                    @if($empdata->del_flag == 1)
                                      @foreach($pinfo as $pInfo)
                                        @if($empdata->personal_info_ID == $pInfo->pinfo_ID)
                                         @foreach($emprole as $role)
                                          @if($empdata->emp_role_ID == $role->emp_role_ID)
                                        <tr>
                                        <td><input type="checkbox" id="emp_{{$empdata->emp_ID}}" name = "del_check" class="filled-in chk-col-red emp_checkCheckbox" data-id = "{{$empdata->emp_ID}}"/>
                                        <label for="emp_{{$empdata->emp_ID}}"></label></td>
                                        @if($pInfo->pinfo_picture == null)
                                        <td><img src="{!! '/image/'.'default-image.png' !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></td>
                                        @else
                                        <td><img src="{!! '/image/'.$pInfo->pinfo_picture !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></td>
                                        @endif
                                        <td>
                                          @if($pInfo->pinfo_middle_name == null)
                                          {{ $pInfo->pinfo_last_name.", ".$pInfo->pinfo_first_name}}
                                          @else
                                          {{ $pInfo->pinfo_last_name.", ".$pInfo->pinfo_first_name." ".$pInfo->pinfo_middle_name }}
                                          @endif
                                        </td>
                                        <td>{{ $role->emp_role_Name }}</td>
                                        <td>
                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $empdata->emp_add_ID)
                                          {{ $addata->add_blcknum }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $empdata->emp_add_ID)
                                          {{ $addata->add_street }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $empdata->emp_add_ID)
                                          {{ $addata->add_subdivision }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $empdata->emp_add_ID)
                                          {{ $addata->add_brngy }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $empdata->emp_add_ID)
                                          {{ $addata->add_district }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $empdata->emp_add_ID)
                                          {{ $addata->add_city }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $empdata->emp_add_ID)
                                          {{ $addata->add_province }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $empdata->emp_add_ID)
                                          {{ 'Region '.$addata->add_region }}
                                          @endif
                                        @endforeach
                                      </td>
                                      <td>
                                      <ul>
                                       @foreach($pinfo as $Info)
                                        @if($empdata->personal_info_ID == $Info->pinfo_ID )
                                         @if($Info->pinfo_cpnum_1 != null)
                                          <li> {{ $Info->pinfo_cpnum_1 }} </li>
                                         @endif
                                        @endif
                                       @endforeach
                                       @foreach($pinfo as $Info)
                                        @if($empdata->personal_info_ID == $Info->pinfo_ID )
                                         @if($Info->pinfo_cpnum_2 != null)
                                          <li>{{ $Info->pinfo_cpnum_2 }}</li>
                                         @endif
                                        @endif
                                       @endforeach
                                       @foreach($pinfo as $Info)
                                        @if($empdata->personal_info_ID == $Info->pinfo_ID )
                                         @if($Info->pinfo_tpnum != null)
                                          <li>{{ $Info->pinfo_tpnum }}</li>
                                         @endif
                                        @endif
                                       @endforeach
                                       @foreach($pinfo as $Info)
                                        @if($empdata->personal_info_ID == $Info->pinfo_ID )
                                         @if($Info->pinfo_mail != null)
                                          <li>{{ $Info->pinfo_mail }}</li>
                                         @endif
                                        @endif
                                       @endforeach
                                       </ul>
                                      </td>
                                        <td>{{ \Carbon\Carbon::parse($empdata->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($empdata->created_at)->format('l, h:i:s A').")" }}</td>
                                        <td>{{ \Carbon\Carbon::parse($empdata->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($empdata->updated_at)->format('l, h:i:s A').")" }}</td>
                                        <td>
                                            <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
                                            data-id = '{{$empdata->emp_ID}}'
                                            data-category = '4'>
                                                <i class="material-icons">autorenew</i>
                                            </button>
                                            <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                                <i class="material-icons">delete_sweep</i>
                                            </button>
                                        </td>
                                       </tr>
                                        @endif
                                       @endforeach
                                      @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>

                                <div class="header">
                                    <h2><b>
                                        SALES AGENT PROFILE
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "sa_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Contact Details</th>
                                                <th class="col-md-2">Date Created</th>
                                                <th class="col-md-2">Date Deactivated</th>
                                                <th class="col-md-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                  @foreach($salesA as $agentdata)
                                    @if($agentdata->del_flag == 1)
                                    @foreach($pinfo as $pInfo)
                                      @if($agentdata->personal_info_ID == $pInfo->pinfo_ID)
                                    <tr>
                                        <td><input type="checkbox" id="sa_{{$agentdata->agent_ID}}" class="filled-in chk-col-red sa_checkCheckbox" data-id = "{{$agentdata->agent_ID}}"/>
                                        <label for="sa_{{$agentdata->agent_ID}}"></label></td> 
                                        <td>
                                          @if($pInfo->pinfo_middle_name == null)
                                          {{ $pInfo->pinfo_last_name.", ".$pInfo->pinfo_first_name}}
                                          @else
                                          {{ $pInfo->pinfo_last_name.", ".$pInfo->pinfo_first_name." ".$pInfo->pinfo_middle_name }}
                                          @endif
                                        </td>
                                        <td>
                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ $addata->add_blcknum }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ $addata->add_street }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ $addata->add_subdivision }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ $addata->add_brngy }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ $addata->add_district }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ $addata->add_city }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ $addata->add_province }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $agentdata->agent_add_ID)
                                          {{ 'Region '.$addata->add_region }}
                                          @endif
                                        @endforeach
                                      </td>
                                      <td>
                                       @foreach($pinfo as $Info)
                                        @if($agentdata->personal_info_ID == $Info->pinfo_ID )
                                         @if($Info->pinfo_cpnum_1 != null)
                                          <li> {{ $Info->pinfo_cpnum_1 }} </li>
                                         @endif
                                        @endif
                                       @endforeach
                                       @foreach($pinfo as $Info)
                                        @if($agentdata->personal_info_ID == $Info->pinfo_ID )
                                         @if($Info->pinfo_cpnum_2 != null)
                                          <li>{{ $Info->pinfo_cpnum_2 }}</li>
                                         @endif
                                        @endif
                                       @endforeach
                                       @foreach($pinfo as $Info)
                                        @if($agentdata->personal_info_ID == $Info->pinfo_ID )
                                         @if($Info->pinfo_tpnum != null)
                                          <li>{{ $Info->pinfo_tpnum }}</li>
                                         @endif
                                        @endif
                                       @endforeach
                                       @foreach($pinfo as $Info)
                                        @if($agentdata->personal_info_ID == $Info->pinfo_ID )
                                         @if($Info->pinfo_mail != null)
                                          <li>{{ $Info->pinfo_mail }}</li>
                                         @endif
                                        @endif
                                       @endforeach
                                      </td>
                                        <td>{{ \Carbon\Carbon::parse($agentdata->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($empdata->created_at)->format('l, h:i:s A').")" }}</td>
                                        <td>{{ \Carbon\Carbon::parse($agentdata->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($empdata->updated_at)->format('l, h:i:s A').")" }}</td>
                                        <td>
                                            <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
                                            data-id = '{{$agentdata->agent_ID}}'
                                            data-category = '5'>
                                                <i class="material-icons">autorenew</i>
                                            </button>
                                            <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                                <i class="material-icons">delete_sweep</i>
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

                                <div class="header">
                                    <h2><b>
                                        COURIER PROFILE
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "cr_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th>Courier Number</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Contact Details</th>
                                                <th class="col-md-2">Date Created</th>
                                                <th class="col-md-2">Date Deactivated</th>
                                                <th class="col-md-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @foreach($courier as $cdata)
                                      @if($cdata->del_flag == 1)
                                        @foreach($pinfo as $pnfo)
                                         @if($pnfo->pinfo_ID == $cdata->personal_info_ID)
                                          @foreach($address as $add)
                                           @if($add->add_ID == $cdata->courier_add_ID)
                                            <tr>
                                                <td><input type="checkbox" id="cr_{{ $cdata->courier_ID }}" name = "del_check" class="filled-in chk-col-red cr_checkCheckbox" data-id = "{{ $cdata->courier_ID }}"/>
                                                <label for="cr_{{ $cdata->courier_ID }}"></label></td>
                                                <td>
                                                    {{$cdata->courier_ID}}
                                                </td>
                                                <td>
                                                  @if($pnfo->pinfo_middle_name == null)
                                                  {{ $pnfo->pinfo_last_name.", ".$pnfo->pinfo_first_name}}
                                                  @else
                                                  {{ $pnfo->pinfo_last_name.", ".$pnfo->pinfo_first_name." ".$pnfo->pinfo_middle_name }}
                                                  @endif
                                                </td>
                                                <td>
                                                @foreach($address as $addata)
                                                  @if($addata->add_ID == $cdata->courier_add_ID)
                                                  {{ $addata->add_blcknum }}
                                                  @endif
                                                @endforeach

                                                @foreach($address as $addata)
                                                  @if($addata->add_ID == $cdata->courier_add_ID)
                                                  {{ $addata->add_street }}
                                                  @endif
                                                @endforeach

                                                @foreach($address as $addata)
                                                  @if($addata->add_ID == $cdata->courier_add_ID)
                                                  {{ $addata->add_subdivision }}
                                                  @endif
                                                @endforeach

                                                @foreach($address as $addata)
                                                  @if($addata->add_ID == $cdata->courier_add_ID)
                                                  {{ $addata->add_brngy }}
                                                  @endif
                                                @endforeach

                                                @foreach($address as $addata)
                                                  @if($addata->add_ID == $cdata->courier_add_ID)
                                                  {{ $addata->add_district }}
                                                  @endif
                                                @endforeach

                                                @foreach($address as $addata)
                                                  @if($addata->add_ID == $cdata->courier_add_ID)
                                                  {{ $addata->add_city }}
                                                  @endif
                                                @endforeach

                                                @foreach($address as $addata)
                                                  @if($addata->add_ID == $cdata->courier_add_ID)
                                                  {{ $addata->add_province }}
                                                  @endif
                                                @endforeach

                                                @foreach($address as $addata)
                                                  @if($addata->add_ID == $cdata->courier_add_ID)
                                                  {{ 'Region '.$addata->add_region }}
                                                  @endif
                                                @endforeach
                                                </td>
                                                <td>
                                                   @foreach($pinfo as $Info)
                                                    @if($cdata->personal_info_ID == $Info->pinfo_ID )
                                                     @if($Info->pinfo_cpnum_1 != null)
                                                      <li> {{ $Info->pinfo_cpnum_1 }} </li>
                                                     @endif
                                                    @endif
                                                   @endforeach
                                                   @foreach($pinfo as $Info)
                                                    @if($cdata->personal_info_ID == $Info->pinfo_ID )
                                                     @if($Info->pinfo_cpnum_2 != null)
                                                      <li>{{ $Info->pinfo_cpnum_2 }}</li>
                                                     @endif
                                                    @endif
                                                   @endforeach
                                                   @foreach($pinfo as $Info)
                                                    @if($cdata->personal_info_ID == $Info->pinfo_ID )
                                                     @if($Info->pinfo_tpnum != null)
                                                      <li>{{ $Info->pinfo_tpnum }}</li>
                                                     @endif
                                                    @endif
                                                   @endforeach
                                                   @foreach($pinfo as $Info)
                                                    @if($cdata->personal_info_ID == $Info->pinfo_ID )
                                                     @if($Info->pinfo_mail != null)
                                                      <li>{{ $Info->pinfo_mail }}</li>
                                                     @endif
                                                    @endif
                                                   @endforeach
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($agentdata->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($empdata->created_at)->format('l, h:i:s A').")" }}</td>
                                                <td>{{ \Carbon\Carbon::parse($agentdata->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($empdata->updated_at)->format('l, h:i:s A').")" }}</td>
                                                <td>
                                                    <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
                                                    data-id = '{{$cdata->courier_ID}}'
                                                    data-category = '6'>
                                                        <i class="material-icons">autorenew</i>
                                                    </button>
                                                    <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                                        <i class="material-icons">delete_sweep</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endif
                                          @endforeach
                                         @endif
                                        @endforeach
                                      @endif
                                    @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </p>
                        </div>
                        <!-- END OF PERSONNEL ARCHIVE -->

                        <!-- VEHICLE ARCHIVE -->
                        <div role="tabpanel" class="tab-pane fade" id="vehicle"> 
                            <p>
                                <div class="header">
                                    <h2><b>
                                        VEHICLE TYPE
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "vt_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th class="col-md-2">Vehicle Type</th>
                                                <th>Description</th>
                                                <th class="col-md-2">Date Created</th>
                                                <th class="col-md-2">Date Deactivated</th>
                                                <th class="col-md-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($vType as $type)
                                            @if($type->del_flag == 1)
                                            <tr>
                                              <td><input type="checkbox" id="vt_{{ $type->vehicle_type_ID }}" class="filled-in chk-col-red vt_checkCheckbox" data-id = "{{ $type->vehicle_type_ID }}"/>
                                              <label for="vt_{{ $type->vehicle_type_ID }}"></label></td>
                                              <td>
                                                {{ $type->vehicle_type_name }}
                                              </td>
                                              <td>
                                                {{ $type->vehicle_type_desc}}
                                              </td>
                                              <td>{{ \Carbon\Carbon::parse($type->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($type->created_at)->format('l, h:i:s A').")" }}</td>
                                              <td>{{ \Carbon\Carbon::parse($type->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($type->updated_at)->format('l, h:i:s A').")" }}</td>
                                              <td>
                                                  <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
                                                  data-id = '{{$type->vehicle_type_ID}}'
                                                  data-category = '7'>
                                                      <i class="material-icons">autorenew</i>
                                                  </button>
                                                  <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                                      <i class="material-icons">delete_sweep</i>
                                                  </button>
                                              </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>

                                <div class="header">
                                    <h2><b>
                                        VEHICLE MAKE
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "vm_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th class="col-md-2">Vehicle Make</th>
                                                <th>Description</th>
                                                <th class="col-md-2">Date Created</th>
                                                <th class="col-md-2">Date Deactivated</th>
                                                <th class="col-md-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                  @foreach($vMake as $mke)
                                  @if($mke->del_flag == 1)
                                  <tr>
                                    <td><input type="checkbox" id="vm_{{ $mke->vehicle_make_ID }}" class="filled-in chk-col-red vm_checkCheckbox" data-id = "{{ $mke->vehicle_make_ID }}"/>
                                    <label for="vm_{{ $mke->vehicle_make_ID }}"></label></td>
                                    <td>
                                        {{ $mke->vehicle_make_name }}
                                    </td>
                                    <td>
                                        {{ $mke->vehicle_make_desc }}
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($mke->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($mke->created_at)->format('l, h:i:s A').")" }}</td>
                                    <td>{{ \Carbon\Carbon::parse($mke->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($mke->updated_at)->format('l, h:i:s A').")" }}</td>
                                    <td>
                                        <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
                                        data-id = '{{$mke->vehicle_make_ID}}'
                                        data-category = '8'>
                                            <i class="material-icons">autorenew</i>
                                        </button>
                                        <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                            <i class="material-icons">delete_sweep</i>
                                        </button>
                                    </td>
                                  </tr>
                                  @endif
                                  @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>

                                <div class="header">
                                    <h2><b>
                                        VEHICLE MODEL
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "vd_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th>Image</th>
                                                <th>Vehicle Model Year</th>
                                                <th>Vehicle Model Name</th>
                                                <th>Vehicle Make</th>
                                                <th>Vehicle Type</th>
                                                <th>Market Value (in PHP)</th>
                                                <th class="col-md-2">Date Created</th>
                                                <th class="col-md-2">Date Deactivated</th>
                                                <th class="col-md-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                  @foreach($vModel as $mod)
                                  @if($mod->del_flag == 1)
                                  @foreach($vMake as $mke)
                                  @if($mod->vehicle_make_ID == $mke->vehicle_make_ID)
                                  <tr>
                                    <td><input type="checkbox" id="vd_{{ $mod->vehicle_model_ID }}" class="filled-in chk-col-red vd_checkCheckbox" data-id = "{{ $mod->vehicle_model_ID }}"/>
                                    <label for="vd_{{ $mod->vehicle_model_ID }}"></label></td>
                                    <td><img src="{!! '/image/'.$mod->vehicle_picture !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></td>
                                    <td>{{ $mod->vehicle_year }}</td>
                                    <td>{{ $mod->vehicle_model_name }}</td>
                                    <td>{{ $mke->vehicle_make_name }}</td>
                                    <td>
                                    @foreach($vType as $type)
                                        @if($mod->vehicle_type == $type->vehicle_type_ID)
                                            {{ $type->vehicle_type_name }}
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>PHP {{ $mod->vehicle_value }}</td>
                                    <td>{{ \Carbon\Carbon::parse($mod->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($mod->created_at)->format('l, h:i:s A').")" }}</td>
                                    <td>{{ \Carbon\Carbon::parse($mod->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($mod->updated_at)->format('l, h:i:s A').")" }}</td>
                                    <td>
                                        <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
                                        data-id = '{{$mod->vehicle_model_ID}}'
                                        data-category = '9'>
                                            <i class="material-icons">autorenew</i>
                                        </button>
                                        <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                            <i class="material-icons">delete_sweep</i>
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

                                <!-- <div class="header">
                                    <h2><b>
                                        VEHICLE LIST
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th>Image</th>
                                                <th>Vehicle Model Year</th>
                                                <th>Vehicle Model Name</th>
                                                <th>Vehicle Make</th>
                                                <th>Vehicle Type</th>
                                                <th>Market Value (in PHP)</th>
                                                <th>Possible Total Premium</th>
                                                <th class="col-md-2">Date Created</th>
                                                <th class="col-md-2">Date Deactivated</th>
                                                <th class="col-md-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="checkbox" id="pppp" name = "del_check" class="filled-in chk-col-green checkCheckbox" data-id=""/><label for="pppp"></label></td>
                                                <td><img src="{!! '/image/'.'default-image.png' !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></td>
                                                <td>2007</td>
                                                <td>MODELMODEL</td>
                                                <td>MAKEMAKE</td>
                                                <td>SUV</td>
                                                <td>PHP 100,000.00</td>
                                                <td>PHP 40,000.00</td>
                                                <td>DATE HERE</td>
                                                <td>DATE HERE</td>
                                                <td>
                                                    <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" data-id = "">
                                                        <i class="material-icons">autorenew</i>
                                                    </button>
                                                    <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                                        <i class="material-icons">delete_sweep</i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                    </div>  -->
                            </p>
                        </div>
                        <!-- END OF VEHICLE ARCHIVE -->

                        <!-- INSURANCE ARCHIVE -->
                        <div role="tabpanel" class="tab-pane fade" id="insurance"> 
                            <p>
                                <div class="header">
                                    <h2><b>
                                        INSURANCE COMPANY
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "insc_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th>Company Name</th>
                                                <th>Address</th>
                                                <th>Contact Person</th>
                                                <th>Contact Details</th>
                                                <th class="col-md-2">Date Created</th>
                                                <th class="col-md-2">Date Deactivated</th>
                                                <th class="col-md-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                @foreach($company as $comp)
                                 @if($comp->del_flag == 1)
                                  @if($comp->comp_type == 0)
                                  @foreach($address as $addata)
                                   @if($addata->add_ID == $comp->comp_add_ID)
                                    @foreach($cperson as $cper)
                                     @if($cper->cPerson_ID == $comp->comp_cperson_ID)
                                      @foreach($pinfo as $Info)
                                       @if($Info->pinfo_ID == $cper->personal_info_ID)
                                        <td>
                                            <input type="checkbox" id="insc_{{$comp->comp_ID}}" class="filled-in chk-col-red insc_checkCheckbox" data-id = "{{$comp->comp_ID}}"/>
                                            <label for="insc_{{$comp->comp_ID}}"></label>
                                        </td>
                                        <td>
                                         {{ $comp->comp_name }}
                                        </td>
                                        <td>
                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_blcknum }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_street }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_subdivision }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_brngy }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_district }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_city }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ $addata->add_province }}
                                          @endif
                                        @endforeach

                                        @foreach($address as $addata)
                                          @if($addata->add_ID == $comp->comp_add_ID)
                                          {{ 'Region '.$addata->add_region }}
                                          @endif
                                        @endforeach
                                        </td>
                                        <td>
                                        @foreach($cperson as $cpr)
                                          @if($cpr->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pinfo as $Info)
                                            @if($cpr->personal_info_ID == $Info->pinfo_ID )
                                              {{ $Info->pinfo_last_name.', ' }}
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        @foreach($cperson as $cpr)
                                          @if($cpr->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pinfo as $Info)
                                            @if($cpr->personal_info_ID == $Info->pinfo_ID )
                                              {{ $Info->pinfo_first_name.' ' }}
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        @foreach($cperson as $cpr)
                                          @if($cpr->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pinfo as $Info)
                                            @if($cpr->personal_info_ID == $Info->pinfo_ID )
                                              {{ $Info->pinfo_middle_name }}
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        </td>
                                        <td>
                                        <ul>
                                        @foreach($cperson as $cpr)
                                          @if($cpr->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pinfo as $Info)
                                            @if($cpr->personal_info_ID == $Info->pinfo_ID )
                                             @if($Info->pinfo_cpnum_1 != null)
                                              <li> {{ $Info->pinfo_cpnum_1 }} </li>
                                             @endif
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        @foreach($cperson as $cpr)
                                          @if($cpr->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pinfo as $Info)
                                            @if($cpr->personal_info_ID == $Info->pinfo_ID )
                                             @if($Info->pinfo_cpnum_2 != null)
                                              <li>{{ $Info->pinfo_cpnum_2 }}</li>
                                             @endif
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        @foreach($cperson as $cpr)
                                          @if($cpr->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pinfo as $Info)
                                            @if($cpr->personal_info_ID == $Info->pinfo_ID )
                                             @if($Info->pinfo_tpnum != null)
                                              <li>{{ $Info->pinfo_tpnum }}</li>
                                             @endif
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        @foreach($cperson as $cpr)
                                          @if($cpr->cPerson_ID == $comp->comp_cperson_ID)
                                           @foreach($pinfo as $Info)
                                            @if($cpr->personal_info_ID == $Info->pinfo_ID )
                                             @if($Info->pinfo_mail != null)
                                              <li>{{ $Info->pinfo_mail }}</li>
                                             @endif
                                            @endif
                                           @endforeach
                                          @endif
                                        @endforeach
                                        </ul>
                                        </td> 
                                        <td>{{ \Carbon\Carbon::parse($comp->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($comp->created_at)->format('l, h:i:s A').")" }}</td>
                                        <td>{{ \Carbon\Carbon::parse($comp->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($comp->updated_at)->format('l, h:i:s A').")" }}</td>
                                        <td>
                                            <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
                                            data-id = '{{$comp->comp_ID}}'
                                            data-category = '2'>
                                                <i class="material-icons">autorenew</i>
                                            </button>
                                            <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                                <i class="material-icons">delete_sweep</i>
                                            </button>
                                        </td>
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

                                <!-- <div class="header">
                                    <h2><b>
                                        INSURANCE FORMS
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th>Bank Name</th>
                                                <th>Company Address</th>
                                                <th>Contact Person</th>
                                                <th>Contact Details</th>
                                                <th class="col-md-2">Date Created</th>
                                                <th class="col-md-2">Date Deactivated</th>
                                                <th class="col-md-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="checkbox" id="pppp" name = "del_check" class="filled-in chk-col-green checkCheckbox" data-id=""/><label for="pppp"></label></td>
                                                <td>Huehue</td>
                                                <td>huehuehueheuheuehue</td>
                                                <td>DATE HERE</td>
                                                <td>DATE HERE</td>
                                                <td>
                                                    <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" data-id = "">
                                                        <i class="material-icons">autorenew</i>
                                                    </button>
                                                    <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                                        <i class="material-icons">delete_sweep</i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div> -->

                                <div class="header">
                                    <h2><b>
                                        INSURANCE - POLICY NUMBER
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "pn_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th class="col-md-2">Date Created</th>
                                                <th class="col-md-2">Date Deactivated</th>
                                                <th class="col-md-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                  @foreach($policy as $pnumber)
                                    @if($pnumber->del_flag == 1)
                                      @foreach($company as $com)
                                        @if($pnumber->insurance_compID == $com->comp_ID)
                                          <tr>
                                              <td><input type="checkbox" id="pn_{{ $pnumber->policy_number }}" name = "del_check" class="filled-in chk-col-red pn_checkCheckbox" data-id = "{{ $pnumber->policy_number }}"/>
                                              <label for="pn_{{ $pnumber->policy_number }}"></label></td>
                                              <td>{{ $pnumber->policy_number }}</td>
                                              <td>{{ $com->comp_name }}</td>
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
                                            <td>{{ \Carbon\Carbon::parse($pnumber->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($pnumber->created_at)->format('l, h:i:s A').")" }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pnumber->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($pnumber->updated_at)->format('l, h:i:s A').")" }}</td>
                                            <td>
                                            <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
                                            data-id = '{{$pnumber->policy_number}}'
                                            data-category = '10'>
                                                <i class="material-icons">autorenew</i>
                                            </button>
                                            <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                                <i class="material-icons">delete_sweep</i>
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

                                <div class="header">
                                    <h2><b>
                                        INSURANCE - INSTALLMENT TYPES
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "ins_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th>Installment Type</th>
                                                <th>Description</th>
                                                <th class="col-md-2">Date Created</th>
                                                <th class="col-md-2">Date Deactivated</th>
                                                <th class="col-md-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                  @foreach($installment as $install)
                                  @if($install->del_flag == 1)
                                      <tr>
                                          <td><input type="checkbox" id="ins_{{ $install->installment_ID }}" name = "del_check" class="filled-in chk-col-red ins_checkCheckbox" data-id = "{{ $install->installment_ID }}"/>
                                          <label for="ins_{{ $install->installment_ID }}"></label>
                                          </td>
                                          <td>{{$install->installment_type}}</td>
                                          <td>Payment every {{ $install->installment_desc }} (number of) month/s.</td>
                                            <td>{{ \Carbon\Carbon::parse($install->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($install->created_at)->format('l, h:i:s A').")" }}</td>
                                            <td>{{ \Carbon\Carbon::parse($install->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($install->updated_at)->format('l, h:i:s A').")" }}</td>
                                            <td>
                                            <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
                                            data-id = '{{$install->installment_ID}}'
                                            data-category = '11'>
                                                <i class="material-icons">autorenew</i>
                                            </button>
                                            <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                                <i class="material-icons">delete_sweep</i>
                                            </button>
                                            </td>
                                      </tr>
                                  @endif
                                  @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </p>
                        </div>
                        <!-- END OF INSURANCE ARCHIVE -->

                        <!-- PREMIUM ARCHIVE -->
                        <div role="tabpanel" class="tab-pane fade" id="premiums"> 
                            <p>
                                <div class="header">
                                    <h2><b>
                                        AUTO PA PREMIUM
                                    </b></h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li class="dropdown">
                                                <li>
                                            <button id = "pa_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th>Insurance Cover Limit</th>
                                                <th>No. of Pass.</th>
                                                <th>Cover Price</th>
                                                <th>Passenger Cover Price</th>
                                                <th>M.R.</th>
                                                <th>Total</th>
                                                <th>Date Created</th>
                                                <th>Date Deactivated</th>
                                                <th class="col-md-1">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @foreach($ppa as $pa)
                                     @if($pa->del_flag == 1)
                                      @foreach($company as $com)
                                        @if($pa->insurance_compID == $com->comp_ID)
                                        <tr>
                                          <td><input type="checkbox" id="pa_{{ $pa->premiumPA_ID }}" name = "del_check" class="filled-in chk-col-red pa_checkCheckbox" data-id = "{{ $pa->premiumPA_ID }}"/>
                                                <label for="pa_{{ $pa->premiumPA_ID }}"></label></td>
                                          <td>{{ $com->comp_name }}</td>
                                          <td>{{ $pa->insuranceLimit }}</td>
                                          <td>{{ $pa->passengerNum }}</td>
                                          <td>{{ $pa->insuranceCover }}</td>
                                          <td>{{ $pa->passengerCover }}</td>
                                          <td>{{ $pa->mrCover }}</td>
                                          <td>{{ $pa->insuranceCover+$pa->passengerCover+$pa->mrCover }}</td>
                                          <td>{{ \Carbon\Carbon::parse($pa->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($pa->created_at)->format('l, h:i:s A').")" }}</td>
                                          <td>{{ \Carbon\Carbon::parse($pa->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($pa->updated_at)->format('l, h:i:s A').")" }}</td>
                                          <td>
                                          <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
                                          data-id = '{{$pa->premiumPA_ID}}'
                                          data-category = '13'>
                                              <i class="material-icons">autorenew</i>
                                          </button>
                                          <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                              <i class="material-icons">delete_sweep</i>
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

                                <div class="header">
                                    <h2><b>
                                        BODILY INJURY PREMIUM
                                    </b></h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li class="dropdown">
                                                <li>
                                            <button id = "bi_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th>Insurance Cover Limit</th>
                                                <th>PC</th>
                                                <th>CV (Light & Medium)</th>
                                                <th>CV (Heavy)</th>
                                                <th>MCY'S</th>
                                                <th>Date Created</th>
                                                <th>Date Deactivated</th>
                                                <th class="col-md-1">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @foreach($pdg as $bi)
                                     @if($bi->del_flag == 1)
                                      @if($bi->damage_type == 0)
                                      @foreach($company as $com)
                                        @if($bi->insurance_compID == $com->comp_ID)
                                        <tr>
                                        <td><input type="checkbox" id="bi_{{ $bi->premiumDG_ID }}" name = "del_check" class="filled-in chk-col-red bi_checkCheckbox" data-id = "{{ $bi->premiumDG_ID }}"/>
                                              <label for="bi_{{ $bi->premiumDG_ID }}"></label></td>
                                        <td>{{ $com->comp_name }}</td>
                                        <td>{{ $bi->insuranceLimit }}</td>
                                        <td>{{ $bi->privateCar }}</td>
                                        <td>{{ $bi->cv_Light }}</td>
                                        <td>{{ $bi->cv_Heavy }}</td>
                                        <td>{{ $bi->mcys }}</td>
                                        <td>{{ \Carbon\Carbon::parse($bi->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($bi->created_at)->format('l, h:i:s A').")" }}</td>
                                        <td>{{ \Carbon\Carbon::parse($bi->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($bi->updated_at)->format('l, h:i:s A').")" }}</td>
                                        <td>
                                        <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
                                        data-id = '{{$bi->premiumDG_ID}}'
                                        data-category = '14'>
                                            <i class="material-icons">autorenew</i>
                                        </button>
                                        <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                            <i class="material-icons">delete_sweep</i>
                                        </button>
                                        </td>
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

                                <div class="header">
                                    <h2><b>
                                        PROPERTY DAMAGE PREMIUM
                                    </b></h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li class="dropdown">
                                                <li>
                                            <button id = "pd_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th> Insurance Company </th>
                                                <th>Insurance Cover Limit</th>
                                                <th>PC</th>
                                                <th>CV (Light & Medium)</th>
                                                <th>CV (Heavy)</th>
                                                <th>MCY'S</th>
                                                <th>Date Created</th>
                                                <th>Date Deactivated</th>
                                                <th class="col-md-1">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @foreach($pdg as $bi)
                                     @if($bi->del_flag == 1)
                                      @if($bi->damage_type == 1)
                                      @foreach($company as $com)
                                        @if($bi->insurance_compID == $com->comp_ID)
                                        <tr>
                                        <td><input type="checkbox" id="pd_{{ $bi->premiumDG_ID }}" name = "del_check" class="filled-in chk-col-red pd_checkCheckbox" data-id = "{{ $bi->premiumDG_ID }}"/>
                                              <label for="pd_{{ $bi->premiumDG_ID }}"></label></td>
                                        <td>{{ $com->comp_name }}</td>
                                        <td>{{ $bi->insuranceLimit }}</td>
                                        <td>{{ $bi->privateCar }}</td>
                                        <td>{{ $bi->cv_Light }}</td>
                                        <td>{{ $bi->cv_Heavy }}</td>
                                        <td>{{ $bi->mcys }}</td>
                                        <td>{{ \Carbon\Carbon::parse($bi->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($bi->created_at)->format('l, h:i:s A').")" }}</td>
                                        <td>{{ \Carbon\Carbon::parse($bi->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($bi->updated_at)->format('l, h:i:s A').")" }}</td>
                                        <td>
                                        <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
                                        data-id = '{{$bi->premiumDG_ID}}'
                                        data-category = '14'>
                                            <i class="material-icons">autorenew</i>
                                        </button>
                                        <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                            <i class="material-icons">delete_sweep</i>
                                        </button>
                                        </td>
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
                            </p>
                        </div>
                        <!-- END OF PREMIUM ARCHIVE -->

                        <!-- COMPLAINT ARCHIVE -->
                        <div role="tabpanel" class="tab-pane fade" id="complaint"> 
                            <p>
                                <div class="header">
                                    <h2><b>
                                        COMPLAINT TYPE
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "ct_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th class="col-md-2">Complaint Type</th>
                                                <th>Description</th>
                                                <th class="col-md-2">Date Created</th>
                                                <th class="col-md-2">Date Deactivated</th>
                                                <th class="col-md-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($ctype as $complaint)
                                            @if($complaint->del_flag == 1)
                                                <tr>
                                                    <td><input type="checkbox" id="ct_{{ $complaint->complaintType_ID }}" name = "del_check" class="filled-in chk-col-red ct_checkCheckbox"
                                                    data-id = "{{ $complaint->complaintType_ID }}"/>
                                                    <label for="ct_{{ $complaint->complaintType_ID }}"></label></td>
                                                    <td>{{ $complaint->complaintType_name }}</td>
                                                    <td>{{ $complaint->complaintType_desc }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($complaint->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($complaint->created_at)->format('l, h:i:s A').")" }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($complaint->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($complaint->updated_at)->format('l, h:i:s A').")" }}</td>
                                                    <td>
                                                    <button type="button" class="rbutton btn bg-green waves-effect" data-toggle="tooltip" data-placement="left" title="Reactivate this sales agent" class="btn btn-success btn-xs waves-effect" 
                                                    data-id = '{{$complaint->complaintType_ID}}'
                                                    data-category = '12'>
                                                        <i class="material-icons">autorenew</i>
                                                    </button>
                                                    <button id = "Delete" type="button" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="left" title="Delete this sales agent permanently">
                                                        <i class="material-icons">delete_sweep</i>
                                                    </button>
                                                    </td>
                                                </tr>
                                            @endif
                                          @endforeach 
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </p>
                        </div>
                        <!-- END OF COMPLAINT ARCHIVE -->

                        <!-- CLAIMS ARCHIVE -->
                        <div role="tabpanel" class="tab-pane fade" id="claims"> 
                            <p>
                                <div class="header">
                                    <h2><b>
                                        CLAIM TYPE
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "ct_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                  <th class="col-md-2">Claim Type</th>
                                                  <th>Description</th>
                                                  <th class="col-md-1">Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                <td><input type="checkbox" id="aaa" class="filled-in chk-col-red checkCheckbox"/>
                                                <label for="aaa"></label></td>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                <div class="icon-button-demo">
                                                    <button type="button" class="btn bg-light-blue waves-effect" data-toggle="collapse" data-target="#largeModal"

                                                    onclick= "
                                                    document.getElementById('id').value = $(this).data('id');
                                                    document.getElementById('aclaimType').value = $(this).data('name');
                                                    document.getElementById('aclaimType_desc').value = $(this).data('desc');

                                                    document.getElementById('date_created').value = $(this).data('created');
                                                    document.getElementById('last_update').value = $(this).data('updated'); 
                                                    ">
                                                        <i class="material-icons">remove_red_eye</i>
                                                        <span>View</span>
                                                    </button>
                                                </div>
                                                </td>
                                              </tr>
                                          </tbody>
                                      </table>
                                      </div>
                                  </div>

                                  <div class="header">
                                    <h2><b>
                                        CLAIM REQUIREMENT
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "ct_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                                <th>Claim Type</th>
                                                <th class="col-md-7">Claim Requirement</th>
                                                <th class="col-md-1">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                  <tr>
                                                    <td><input type="checkbox" id="bbb" class="filled-in chk-col-red checkCheckbox"/>
                                                    <label for="bbb"></label></td>
                                                    <td>
                                                     
                                                    </td>
                                                    <td>
                                                      
                                                    </td>
                                                    <td>
                                                    <div class="icon-button-demo">
                                                        <button type="button" class="btn bg-light-blue waves-effect" data-toggle="collapse" data-target="#largeModal"
            

                                                        onclick= "
                                                        $('#id').val($(this).data('id'));
                                                        $('#aclaimReq_Type').val($(this).data('type')).change();
                                                        $('#aclaimRequirement').val($(this).data('name'));
                                
                                document.getElementById('aclaimReq_Type').disabled=true;    

                                                        document.getElementById('date_created').value = $(this).data('created');
                                                        document.getElementById('last_update').value = $(this).data('updated'); 
                                                        ">
                                                            <i class="material-icons">remove_red_eye</i>
                                                            <span>View</span>
                                                        </button>
                                                    </div>
                                                    </td>
                                                  </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                  </div>
                            </p>
                        </div>
                        <!-- END OF CLAIMS ARCHIVE -->

                        <!-- TRANSMITTAL ARCHIVE -->
                        <div role="tabpanel" class="tab-pane fade" id="transmittal"> 
                            <p>
                                <div class="header">
                                    <h2><b>
                                        TRANSMITTAL DOCUMENTS
                                    </b></h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <li>
                                            <button id = "ct_reactivate" type="button" class="btn btn-lg bg-green waves-effect" data-toggle="modal" data-target="#Reactivate">
                                                <span>Reactivate</span>
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
                                          <tr>
                                            <td><input type="checkbox" id="ppp" class="filled-in chk-col-red checkCheckbox"/>
                                            <label for="ppp"></label></td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            <div class="icon-button-demo">
                                                <button type="button" class="btn bg-light-blue waves-effect" data-toggle="collapse" data-target="#largeModal"

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
                                      </tbody>
                                  </table>
                                  </div>
                                </div>
                            </p>
                        </div>
                        <!-- END OF TRANSMITTAL ARCHIVE -->


                        <!-- View INST MODAL-->
                        <div class="modal fade" id="Reactivate" tabindex="-1" role="dialog">
                            <div class="modal-dialog animated zoomInRight active" role="document">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-add">
                                        <h4>Reactivate
                                        </h4>
                                    </div><br/>
                                        <div class="modal-body">
                                            <form id="ctype_view" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="col-md-4" style = "display: none;">
                                              <input id = "id" type="text" class="form-control" name="id" pattern="[A-Za-z'-]">
                                            </div>
                                                <h5>Are you sure you want to reactivate the selected records?</h5>
                                            </form>
                                        </div>
                                    <div class="modal-footer js-sweetalert">
                                        <button id = "reactivate_all" class="btn btn-primary waves-effect" type="button">YES</button>
                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">NO</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# VIEW INST MODAL -->

                    </div> <!-- tab content -->
                </div> <!-- body-->
            </div> <!-- card -->
        </div> <!-- container -->
    </section> 

    <script>

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
        var arcategory = "";
        var category = "";

        if ($('.bank_checkCheckbox:checked').length > 0)
        {
             $("#bank_reactivate").show();
        }
        else
        {
            $("#bank_reactivate").hide();
        }

        $(".bank_checkCheckbox").change(
          function()
          {
            if ($('.bank_checkCheckbox:checked').length > 0)
            {
                 $("#bank_reactivate").show();
            }
            else
            {
                $("#bank_reactivate").hide();
            }
           }
        );

        if ($('.ci_checkCheckbox:checked').length > 0)
        {
             $("#ci_reactivate").show();
        }
        else
        {
            $("#ci_reactivate").hide();
        }

        $(".ci_checkCheckbox").change(
          function()
          {
            if ($('.ci_checkCheckbox:checked').length > 0)
            {
                 $("#ci_reactivate").show();
            }
            else
            {
                $("#ci_reactivate").hide();
            }
           }
        );

        if ($('.cc_checkCheckbox:checked').length > 0)
        {
             $("#cc_reactivate").show();
        }
        else
        {
            $("#cc_reactivate").hide();
        }

        $(".cc_checkCheckbox").change(
          function()
          {
            if ($('.cc_checkCheckbox:checked').length > 0)
            {
                 $("#cc_reactivate").show();
            }
            else
            {
                $("#cc_reactivate").hide();
            }
           }
        );

        if ($('.er_checkCheckbox:checked').length > 0)
        {
             $("#er_reactivate").show();
        }
        else
        {
            $("#er_reactivate").hide();
        }

        $(".er_checkCheckbox").change(
          function()
          {
            if ($('.er_checkCheckbox:checked').length > 0)
            {
                 $("#er_reactivate").show();
            }
            else
            {
                $("#er_reactivate").hide();
            }
           }
        );

        if ($('.emp_checkCheckbox:checked').length > 0)
        {
             $("#emp_reactivate").show();
        }
        else
        {
            $("#emp_reactivate").hide();
        }

        $(".emp_checkCheckbox").change(
          function()
          {
            if ($('.emp_checkCheckbox:checked').length > 0)
            {
                 $("#emp_reactivate").show();
            }
            else
            {
                $("#emp_reactivate").hide();
            }
           }
        );

        if ($('.sa_checkCheckbox:checked').length > 0)
        {
             $("#sa_reactivate").show();
        }
        else
        {
            $("#sa_reactivate").hide();
        }

        $(".sa_checkCheckbox").change(
          function()
          {
            if ($('.sa_checkCheckbox:checked').length > 0)
            {
                 $("#sa_reactivate").show();
            }
            else
            {
                $("#sa_reactivate").hide();
            }
           }
        );

        if ($('.cr_checkCheckbox:checked').length > 0)
        {
             $("#cr_reactivate").show();
        }
        else
        {
            $("#cr_reactivate").hide();
        }

        $(".cr_checkCheckbox").change(
          function()
          {
            if ($('.cr_checkCheckbox:checked').length > 0)
            {
                 $("#cr_reactivate").show();
            }
            else
            {
                $("#cr_reactivate").hide();
            }
           }
        );

        if ($('.vt_checkCheckbox:checked').length > 0)
        {
             $("#vt_reactivate").show();
        }
        else
        {
            $("#vt_reactivate").hide();
        }

        $(".vt_checkCheckbox").change(
          function()
          {
            if ($('.vt_checkCheckbox:checked').length > 0)
            {
                 $("#vt_reactivate").show();
            }
            else
            {
                $("#vt_reactivate").hide();
            }
           }
        ); 

        if ($('.vm_checkCheckbox:checked').length > 0)
        {
             $("#vm_reactivate").show();
        }
        else
        {
            $("#vm_reactivate").hide();
        }

        $(".vm_checkCheckbox").change(
          function()
          {
            if ($('.vm_checkCheckbox:checked').length > 0)
            {
                 $("#vm_reactivate").show();
            }
            else
            {
                $("#vm_reactivate").hide();
            }
           }
        ); 

        if ($('.vd_checkCheckbox:checked').length > 0)
        {
             $("#vd_reactivate").show();
        }
        else
        {
            $("#vd_reactivate").hide();
        }

        $(".vd_checkCheckbox").change(
          function()
          {
            if ($('.vd_checkCheckbox:checked').length > 0)
            {
                 $("#vd_reactivate").show();
            }
            else
            {
                $("#vd_reactivate").hide();
            }
           }
        ); 

        if ($('.insc_checkCheckbox:checked').length > 0)
        {
             $("#insc_reactivate").show();
        }
        else
        {
            $("#insc_reactivate").hide();
        }

        $(".insc_checkCheckbox").change(
          function()
          {
            if ($('.insc_checkCheckbox:checked').length > 0)
            {
                 $("#insc_reactivate").show();
            }
            else
            {
                $("#insc_reactivate").hide();
            }
           }
        ); 

        if ($('.pn_checkCheckbox:checked').length > 0)
        {
             $("#pn_reactivate").show();
        }
        else
        {
            $("#pn_reactivate").hide();
        }

        $(".pn_checkCheckbox").change(
          function()
          {
            if ($('.pn_checkCheckbox:checked').length > 0)
            {
                 $("#pn_reactivate").show();
            }
            else
            {
                $("#pn_reactivate").hide();
            }
           }
        ); 

        if ($('.ins_checkCheckbox:checked').length > 0)
        {
             $("#ins_reactivate").show();
        }
        else
        {
            $("#ins_reactivate").hide();
        }

        $(".ins_checkCheckbox").change(
          function()
          {
            if ($('.ins_checkCheckbox:checked').length > 0)
            {
                 $("#ins_reactivate").show();
            }
            else
            {
                $("#ins_reactivate").hide();
            }
           }
        ); 

        if ($('.ct_checkCheckbox:checked').length > 0)
        {
             $("#ct_reactivate").show();
        }
        else
        {
            $("#ct_reactivate").hide();
        }

        $(".ct_checkCheckbox").change(
          function()
          {
            if ($('.ct_checkCheckbox:checked').length > 0)
            {
                 $("#ct_reactivate").show();
            }
            else
            {
                $("#ct_reactivate").hide();
            }
           }
        ); 

        if ($('.pa_checkCheckbox:checked').length > 0)
        {
             $("#pa_reactivate").show();
        }
        else
        {
            $("#pa_reactivate").hide();
        }

        $(".pa_checkCheckbox").change(
          function()
          {
            if ($('.pa_checkCheckbox:checked').length > 0)
            {
                 $("#pa_reactivate").show();
            }
            else
            {
                $("#pa_reactivate").hide();
            }
           }
        ); 

        if ($('.bi_checkCheckbox:checked').length > 0)
        {
             $("#bi_reactivate").show();
        }
        else
        {
            $("#bi_reactivate").hide();
        }

        $(".bi_checkCheckbox").change(
          function()
          {
            if ($('.bi_checkCheckbox:checked').length > 0)
            {
                 $("#bi_reactivate").show();
            }
            else
            {
                $("#bi_reactivate").hide();
            }
           }
        ); 

        if ($('.pd_checkCheckbox:checked').length > 0)
        {
             $("#pd_reactivate").show();
        }
        else
        {
            $("#pd_reactivate").hide();
        }

        $(".pd_checkCheckbox").change(
          function()
          {
            if ($('.pd_checkCheckbox:checked').length > 0)
            {
                 $("#pd_reactivate").show();
            }
            else
            {
                $("#pd_reactivate").hide();
            }
           }
        ); 


        $('#bank_reactivate').click(function(event){
          arcategory = "0";
          IDS = $(".bank_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#ci_reactivate').click(function(event){
          arcategory = "1";
          IDS = $(".ci_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#cc_reactivate').click(function(event){
          arcategory = "2";
          IDS = $(".cc_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#er_reactivate').click(function(event){
          arcategory = "3";
          IDS = $(".er_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#emp_reactivate').click(function(event){
          arcategory = "4";
          IDS = $(".emp_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#sa_reactivate').click(function(event){
          arcategory = "5";
          IDS = $(".sa_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#cr_reactivate').click(function(event){
          arcategory = "6";
          IDS = $(".cr_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#vt_reactivate').click(function(event){
          arcategory = "7";
          IDS = $(".vt_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#vm_reactivate').click(function(event){
          arcategory = "8";
          IDS = $(".vm_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#vd_reactivate').click(function(event){
          arcategory = "9";
          IDS = $(".vd_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#insc_reactivate').click(function(event){
          arcategory = "2";
          IDS = $(".insc_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#pn_reactivate').click(function(event){
          arcategory = "10";
          IDS = $(".pn_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#ins_reactivate').click(function(event){
          arcategory = "11";
          IDS = $(".ins_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#ct_reactivate').click(function(event){
          arcategory = "12";
          IDS = $(".ct_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#pa_reactivate').click(function(event){
          arcategory = "13";
          IDS = $(".pa_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#bi_reactivate').click(function(event){
          arcategory = "14";
          IDS = $(".bi_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });

        $('#pd_reactivate').click(function(event){
          arcategory = "14";
          IDS = $(".pd_checkCheckbox:checked").map(function ()
          {
              return $(this).data('id')
          }).get();
        });


        function archive(input)
        {
            if(input == 0)
              category = 'bank';
            if(input == 1)
              category = 'client/individual';
            if(input == 2)
              category = 'client/company';
            if(input == 3)
              category = 'employee/role';
            if(input == 4)
              category = 'employee';
            if(input == 5)
              category = 'salesagent';
            if(input == 6)
              category = 'courier';
            if(input == 7)
              category = 'vehicle/type';
            if(input == 8)
              category = 'vehicle/make';
            if(input == 9)
              category = 'vehicle/model';
            if(input == 10)
              category = 'policynumber';
            if(input == 11)
              category = 'installment';
            if(input == 12)
              category = 'complaint/type';
            if(input == 13)
              category = 'personal-accident';
            if(input == 14)
              category = 'premium-damage';

        }

        $('.rbutton').click(function(event){
              archive($(this).data('category'));
              $.ajax({

                  type: 'POST',
                  url: '/admin/utilities/archives/'+category+'/reactivate',
                  data: {id:$(this).data('id'), time:timenow},
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

        $('#reactivate_all').click(function(event){
          archive(arcategory);
          event.preventDefault();
              $.ajax({

                  type: 'POST',
                  url: '/admin/utilities/archives/'+category+'/arreactivate',
                  data: {ID:IDS, time:timenow},
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