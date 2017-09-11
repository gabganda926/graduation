@extends('pages.admin.master')

@section('title','Transmittal - Transaction| i-Insure')

@section('trans','active')

@section('transTrans','active')

@section('transTransmittal','active')

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
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('/admin/transaction/transmittal-home') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('/admin/transaction/transmittal-home') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> List of Transmittal</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="acce" class="list-group-item active">
                                Transmittal of Documents
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/delivery-list.png')}}" style="height: 50px; width: 50px;"><b> Transmittal of Documents </b></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Transmittal #</th>
                                        <th>Client</th>
                                        <th>Courier</th>
                                        <th class="col-md-2">Date Started</th>
                                        <th class="col-md-2">Last Update</th>
                                        <th class="col-md-1">Status</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>TR-10273-AB</th>
                                        <td>Rola, Ma. Gabriella</td>
                                        <td>Avellaneda, Marynel</td>
                                        <td>March 03, 2017 (Thursday, 3:05:10PM)</td>
                                        <td>March 05, 2017 (Saturday, 7:12:08PM)</td>
                                        <td><span class="label bg-blue">processing</span>
                                        <div id = "stats"><select name = "days" class="form-control show-tick">
                                            <option selected value = "" style = "display: none;">-- Select Status --</option>
                                            <option value = "bg-blue">processing</option>
                                            <option value = "bg-red">cancelled</option>
                                            <option value = "bg-orange">on hold</option>
                                            <option value = "bg-green">sent</option>
                                        </select></div>
                                        <button id="statsave" type="button" class="btn bg-green btn-block waves-effect" onclick="
                                        $('#stats').hide(200);
                                        $('#statsave').hide(200);">SAVE
                                        </button></td>
                                        <td><button type="button" class="btn bg-blue waves-effect" style="position: right;" onclick="window.document.location='{{ URL::asset('admin/transaction/transmittal-info-approved') }}';" data-toggle="tooltip" data-placement="left" title="View details">
                                            <i class="material-icons">security</i><span style="font-size: 15px;">
                                        </button>
                                        <button type="button" class="btn bg-teal waves-effect" style="position: right;" data-toggle="tooltip" data-placement="left" title="Update Status" onclick="
                                        $('#stats').show(200);
                                        $('#statsave').show(200);">
                                            <i class="material-icons">settings</i><span style="font-size: 15px;">
                                        </button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        window.onload = function(){
            document.getElementById("stats").style.display = 'none';
            document.getElementById("statsave").style.display = 'none';
        };
    </script>

@endsection
