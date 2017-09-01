@extends('pages.admin.master')

@section('title','Transmittal - Transaction| i-Insure')

@section('trans','active')

@section('transTrans','active')

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
                                <button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px;" data-toggle="tooltip" data-placement="bottom" title="View transmittal requests" onclick="window.document.location='{{ URL::asset('/admin/transaction/transmittal-request') }}';"><img src="{{ URL::asset ('images/icons/delivery.png')}}" style="height: 70px; width: 70px;"></button>
                            </div>

                            <div class="col-md-12">
                                <button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px;" data-toggle="tooltip" data-placement="bottom" title="View list of transmittal" onclick="window.document.location='{{ URL::asset('/admin/transaction/transmittal') }}';"><img src="{{ URL::asset ('images/icons/delivery-list.png')}}" style="height: 70px; width: 70px;"></button>
                            </div>

                            <div class="col-md-12">
                                <button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px;" data-toggle="tooltip" data-placement="bottom" title="Transmit Documents" onclick="window.document.location='{{ URL::asset('/admin/transaction/transmittal-documents') }}';"><img src="{{ URL::asset ('images/icons/transmit.png')}}" style="height: 70px; width: 70px;"></button>
                            </div> 
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px;" data-toggle="tooltip" data-placement="bottom" title="View closed transmittals" onclick="window.document.location='{{ URL::asset('/admin/transaction/transmittal-ended') }}';"><img src="{{ URL::asset ('images/icons/list.png')}}" style="height: 70px; width: 70px;"></button>
                            </div>

                            <div class="col-md-12">
                                <button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px;" data-toggle="tooltip" data-placement="bottom" title="View auto-reply settings" onclick="window.document.location='{{ URL::asset('/admin/transaction/transmittal-auto-reply') }}';"><img src="{{ URL::asset ('images/icons/settings.png')}}" style="height: 70px; width: 70px;"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/2.png')}}" style="height: 50px; width: 50px;"><b> Transmittal Stats </b></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-pink">
                                            <i class="material-icons">access_time</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">PENDING</div>
                                            <div class="number">15</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-pink">
                                            <i class="material-icons">directions_bike</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">OPEN</div>
                                            <div class="number">15</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-pink">
                                            <i class="material-icons">check</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">CLOSED</div>
                                            <div class="number">15</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-orange">
                                            <i class="material-icons">donut_small</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">TOTAL</div>
                                            <div class="number">45</div>
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
