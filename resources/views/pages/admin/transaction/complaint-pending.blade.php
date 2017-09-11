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
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('admin/transaction/complaint-online') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('admin/transaction/complaint-online') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Pending Complaints</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="pend" class="list-group-item active" onclick="
                                        $('#pending').show(800);
                                        $('#assign').hide(800);
                                        $('#pend').addClass('active');
                                        $('#ass').removeClass('active');
                                        $('body,html').animate({
                                                                    scrollTop: 0
                                                                }, 500);
                                                                return false;
                                        ">
                                Pending Complaints
                            </a>
                            <a href="javascript:void(0);" id="ass" class="list-group-item disabled">
                                Assign
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card" id="pending">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/1.png')}}" style="height: 50px; width: 50px;"><b> Pending Complaints </b></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Complaint #</th>
                                        <th>Complaint Type</th>
                                        <th class="col-md-12">Complaint Details</th>
                                        <th>Complainant</th>
                                        <th class="col-md-2">Date Received</th>
                                        <th class="col-md-1">Status</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>COMP-10273-AB</td>
                                        <td>Service Issue</td>
                                        <td>yung ano kasi tapos inano ung ano ng ano tapos naano ung ano</td>
                                        <td>Rola, Ma. Gabriella</td>
                                        <td>March 05, 2017 (Saturday, 7:12:08PM)</td>
                                        <td><span class="label bg-blue">new</span></td>
                                        <td><button type="button" class="btn bg-blue waves-effect" onclick="window.document.location='{{ URL::asset('admin/transaction/complaint-details') }}';" style="position: right;"  data-toggle="tooltip" data-placement="left" title="View Details">
                                            <i class="material-icons">security</i><span style="font-size: 15px;">
                                        </button>
                                        <button type="button" class="btn bg-green waves-effect" style="position: right;" data-toggle="tooltip" data-placement="left" title="Assign employee to solve this complaint" onclick="
                                        $(this).parents('#pending').hide(800);
                                        $('#assign').show(800);
                                        $('#pend').removeClass('active');
                                        $('#ass').removeClass('disabled');
                                        $('#ass').addClass('active');
                                        $('body,html').animate({
                                                                    scrollTop: 0
                                                                }, 500);
                                                                return false;
                                        ">
                                            <i class="material-icons">thumb_up</i><span style="font-size: 15px;">
                                        </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->

                    <div class="card" id="assign">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/1.png')}}" style="height: 50px; width: 50px;"><b> Assign Employee </b></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Assign Date:</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" type="date" class="form-control" placeholder="Telephone" readonly="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label><small>Employee:</small></label>
                                    <select id = "vehicle_type" name = "vehicle_type" class="form-control show-tick" data-live-search="true" >
                                      <option selected value = "" style = "display: none;">-- Select Employee --</option>
                                        <option value = "asd">Asddd</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Cellphone Number:</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" placeholder="Telephone" readonly="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Cellphone Number (Alternate):</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" placeholder="Telephone" readonly="true">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Telephone:</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" placeholder="Telephone" readonly="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Email:</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" type="email" class="form-control" placeholder="Telephone" readonly="true">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label><small>Set Priority:</small></label>
                                    <select id = "vehicle_type" name = "vehicle_type" class="form-control show-tick" data-live-search="true" >
                                        <option value = "asd">High</option>
                                        <option value = "asd">Medium</option>
                                        <option value = "asd">Low</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <button type="button" id="next1"  class="btn btn-block bg-green waves-effect left">
                                        <span style="font-size: 15px;"> SUBMIT</span>
                                    </button>
                                </div>
                            </div>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
    </section>

     <script type="text/javascript">
        window.onload = function(){
            document.getElementById("assign").style.display = 'none';
        };
    </script>

@endsection
