@extends('pages.admin.master')

@section('title','Insurance Accounts - Transaction| i-Insure')

@section('trans','active')

@section('transComplaint','active')

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
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px;" data-toggle="tooltip" data-placement="bottom" title="New complaint" onclick="window.document.location='{{ URL::asset('/admin/transaction/complaint-new') }}';"><img src="{{ URL::asset ('images/icons/complaint.png')}}" style="height: 70px; width: 70px;"></button>
                            </div>

                            <div class="col-md-12">
                                <button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px;" data-toggle="tooltip" data-placement="bottom" title="View Pending Complaints" onclick="window.document.location='{{ URL::asset('/admin/transaction/complaint-pending') }}';"><img src="{{ URL::asset ('images/icons/1.png')}}" style="height: 70px; width: 70px;"></button>
                            </div>

                            <div class="col-md-12">
                                <button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px;" data-toggle="tooltip" data-placement="bottom" title="View Complaint List" onclick="window.document.location='{{ URL::asset('/admin/transaction/complaint-list') }}';"><img src="{{ URL::asset ('images/icons/list.png')}}" style="height: 70px; width: 70px;"></button>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px;" data-toggle="tooltip" data-placement="bottom" title="View closed complaints" onclick="window.document.location='{{ URL::asset('/admin/transaction/complaint-ended') }}';"><img src="{{ URL::asset ('images/icons/closed.png')}}" style="height: 70px; width: 70px;"></button>
                            </div>

                            <div class="col-md-12">
                                <button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px;" data-toggle="tooltip" data-placement="bottom" title="View auto-reply settings" onclick="window.document.location='{{ URL::asset('/admin/transaction/complaint-auto-reply') }}';"><img src="{{ URL::asset ('images/icons/settings.png')}}" style="height: 70px; width: 70px;"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/2.png')}}" style="height: 50px; width: 50px;"><b> Complaint Stats </b></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-pink">
                                            <i class="material-icons">access_time</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">PENDING</div>
                                            <div class="number">
                                                <script>
                                                    var count = 0;
                                                    @foreach($list as $li)
                                                        @if($li->status == 0)
                                                            count += 1;
                                                        @endif
                                                    @endforeach

                                                    document.write(count);
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-pink">
                                            <i class="material-icons">folder_open</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">OPEN</div>
                                            <div class="number">
                                                <script>
                                                    var count1 = 0;

                                                    @foreach($list as $li)
                                                        @if($li->status == 1)
                                                            count1 += 1;
                                                        @endif
                                                    @endforeach
                                                    
                                                    document.write(count1);
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-pink">
                                            <i class="material-icons">check</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">CLOSED</div>
                                            <div class="number">
                                                <script>
                                                    var count2 = 0;
                                                    @foreach($list as $li)
                                                        @if($li->status == 2 || $li->status==3)
                                                            count2 += 1;
                                                        @endif
                                                    @endforeach
                                                    
                                                    document.write(count2);
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-orange">
                                            <i class="material-icons">donut_small</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">TOTAL</div>
                                            <div class="number">
                                                <script>
                                                    var tot = 0;
                                                    @foreach($list as $li)
                                                        tot += 1;
                                                    @endforeach
                                                    
                                                    document.write(tot);
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                                
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-red">
                                            <i class="material-icons">priority_high</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">HIGH</div>
                                            <div class="number">
                                                <script>
                                                    var count3 = 0;

                                                    @foreach($prio as $pr)
                                                        @if($pr->status == 0)
                                                            count3 += 1;
                                                        @endif
                                                    @endforeach
                                                    
                                                    document.write(count3);
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-deep-orange">
                                            <i class="material-icons">more_horiz</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">MEDIUM</div>
                                            <div class="number">
                                                 <script>
                                                    var count4 = 0;

                                                    @foreach($prio as $pr)
                                                        @if($pr->status == 1)
                                                            count4 += 1;
                                                        @endif
                                                    @endforeach
                                                    
                                                    document.write(count4);
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-green">
                                            <i class="material-icons">arrow_downward</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">LOW</div>
                                            <div class="number">
                                                 <script>
                                                    var count5 = 0;

                                                    @foreach($prio as $pr)
                                                        @if($pr->status == 2)
                                                            count5 += 1;
                                                        @endif
                                                    @endforeach
                                                    
                                                    document.write(count5);
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </section>
@endsection
