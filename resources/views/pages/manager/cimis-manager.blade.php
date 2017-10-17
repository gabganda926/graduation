@extends('pages.manager.master')

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
                    <div class="info-box-4 hover-zoom-effect animated bounceInDown active" onclick="window.document.location='/manager/transaction/quotation';" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons col-red">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text">QUOTATION REQUESTS</div>
                            <div class="number count-to qreq" data-from="0" data-to="129" data-speed="15" data-fresh-interval="20">
                                <script type="text/javascript"> 
                                    var count=0;
                                    @foreach($qind as $qi)
                                        @foreach($qlist as $ql)
                                            @if($qi->quote_indi_ID == $ql->quote_ID)
                                                @if($ql->quote_status == 5)
                                                    count += 1;
                                                @endif
                                            @endif
                                        @endforeach
                                     @endforeach
                                     @foreach($qcomp as $qi)
                                        @foreach($qlist as $ql1)
                                            @if($qi->quote_comp_ID == $ql1->quote_ID)
                                                @if($ql1->quote_status == 5)
                                                    count1 += 1;
                                                @endif
                                            @endif
                                        @endforeach
                                     @endforeach

                                     $('.qreq').html('' + count);
                                    </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect animated bounceInDown" onclick="window.document.location='/manager/transaction/claims';" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons col-red">announcement</i>
                        </div>
                        <div class="content">
                            <div class="text">CLAIMS REQUESTS</div>
                            <div class="number count-to claimreq" data-from="0" data-to="15" data-speed="15" data-fresh-interval="20">
                                <script type="text/javascript"> 
                                    var count=0;
                                    @foreach ($creq as $claims)
                                    @if($claims->del_flag == 0)
                                    @if($claims->status == 1)
                                                    count += 1;
                                    @endif
                                    @endif
                                @endforeach

                                     $('.claimreq').html('' + count);
                                    </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect animated bounceInDown" onclick="window.document.location='/manager/transaction/transmittal';" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons col-red">group</i>
                        </div>
                        <div class="content">
                            <div class="text">TRANSMITTAL REQUESTS</div>
                            <div class="number count-to treq" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                                <script type="text/javascript"> 
                                    var count=0;
                                    @foreach($request as $req)
                                     @if($req->status == 6)
                                                    count += 1;
                                    @endif
                                @endforeach

                                     $('.treq').html('' + count);
                                    </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect animated bounceInDown" onclick="window.document.location='/manager/transaction/payment-list';" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons col-red">attach_money</i>
                        </div>
                        <div class="content">
                            <div style = "display:none;">
                                {{$total = 0}}
                                @foreach($plist as $list)
                                    @if($list->status != 1)
                                    @if($list->status != 4)
                                          {{$total = $total + $list->amount}}
                                    @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="text">TOTAL OF COLLECTED PAYMENTS</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">₱ <?php echo number_format($total, 2, '.', ','); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
