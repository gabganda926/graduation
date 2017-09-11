@extends('pages.admin.master')

@section('title','Complaint - Transaction| i-Insure')

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
                            <div class="body table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Pending</th>
                                            <th>Open</th>
                                            <th>Closed</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Service Issue</td>
                                            <td>10</td>
                                            <td>2</td>
                                            <td>25</td>
                                            <td>37</td>
                                        </tr>

                                        <tr>
                                            <td>Missed Payments</td>
                                            <td>0</td>
                                            <td>2</td>
                                            <td>25</td>
                                            <td>27</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </section>
@endsection
