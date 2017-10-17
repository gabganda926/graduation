@extends('pages.admin.master')

@section('title','Dashboard | i-Insure')

@section('dashboard','active')

@section('body')
   <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect animated bounceInDown active" onclick="window.document.location='/admin/transaction/transmittal-request';" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons col-red">account_box</i>
                        </div>
                        <div class="content">
                            <div class="text">TRANSMITTAL REQUESTS</div>
                            <div class="number count-to transreq" data-from="0" data-to="129" data-speed="15" data-fresh-interval="20">
                                <script type="text/javascript"> 
                                    var count=0;
                                    @foreach($request as $req)
                                     @if($req->status == 0)
                                        count += 1;
                                        @endif
                                     @endforeach
                                     $('.transreq').html('' + count);
                                    </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect animated bounceInDown" onclick="window.document.location='/admin/transaction/claim-request-online';" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons col-red">new_releases</i>
                        </div>
                        <div class="content">
                            <div class="text">CLAIMS REQUESTS</div>
                            <div class="number count-to claimreq" data-from="0" data-to="15" data-speed="15" data-fresh-interval="20">
                                <script type="text/javascript"> 
                                    var count=0;
                                    @foreach ($crequest as $creq)
                                        @if($creq->web_status == 0)
                                        count += 1;
                                        @endif
                                     @endforeach
                                     $('.claimreq').html('' + count);
                                    </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect animated bounceInDown" onclick="window.document.location='/admin/transaction/complaint-pending';" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons col-red">av_timer</i>
                        </div>
                        <div class="content">
                            <div class="text">PENDING COMPLAINTS</div>
                            <div class="number count-to compreq" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                                <script type="text/javascript"> 
                                    var count=0;
                                    @foreach($complaints as $comp)
                                     @if($comp->status == 0)
                                        count += 1;
                                        @endif
                                     @endforeach
                                     $('.compreq').html('' + count);
                                    </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card animated bounceInUp" style="cursor: pointer;">
                        <div class="header">
                            <h3 style="text-align: center;">INSURANCE ACCOUNTS</h3>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px;" data-toggle="tooltip" data-placement="bottom" title="View list of insurance accounts of individual clients." onclick="window.document.location='{{ URL::asset('/admin/transaction/insurance-individual') }}';"><img src="{{ URL::asset ('images/icons/insurance-individual.png')}}" style="height: 50px; width: 50px;"> INDIVIDUAL <span class="label bg-green indi">
                                    <script type="text/javascript"> 
                                    var count=0;
                                    @foreach($clist as $list)
                                    @foreach($client as $cli)
                                     @if($list->client_ID == $cli->client_ID)
                                      @if($list->del_flag == 0)
                                       @foreach($insaccount as $iacc)
                                        @if($cli->client_ID == $iacc->client_ID)
                                         @foreach($pInfo as $info)
                                          @if($cli->personal_info_ID == $info->pinfo_ID)
                                                count += 1;
                                            @endif
                                         @endforeach
                                        @endif
                                       @endforeach
                                      @endif
                                     @endif
                                    @endforeach
                                   @endforeach
                                            

                                     $('.indi').html('' + count);
                                    </script></span></button>     
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px;" data-toggle="tooltip" data-placement="bottom" title="View list of insurance accounts of company clients." onclick="window.document.location='{{ URL::asset('/admin/transaction/insurance-company') }}';"><img src="{{ URL::asset ('images/icons/insurance-company.png')}}" style="height: 50px; width: 50px;"> COMPANY <span class="label bg-green comp">
                                     <script type="text/javascript"> 
                                    var count1=0;
                                    @foreach($clist as $list)
                                    @foreach($inscomp as $ccompany)
                                     @if($list->client_ID == $ccompany->comp_ID)
                                      @if($list->del_flag == 0)
                                       @if($ccompany->comp_type == 1)
                                        @foreach($insaccount as $iacc)
                                         @if($ccompany->comp_ID == $iacc->client_ID)
                                          @foreach($contact as $cnt)
                                           @if($ccompany->comp_cperson_ID == $cnt->cPerson_ID)
                                            @foreach($pInfo as $info)
                                             @if($cnt->personal_info_ID == $info->pinfo_ID)
                                                    count1 += 1;
                                            @endif
                                        @endforeach
                                       @endif
                                      @endforeach
                                     @endif
                                    @endforeach
                                   @endif
                                  @endif
                                 @endif
                                @endforeach
                               @endforeach
                                     $('.comp').html('' + count1);
                                    </script></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>
        </div>
    </section>
    @endsection
