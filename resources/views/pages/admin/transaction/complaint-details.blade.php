@extends('pages.admin.master')

@section('title','Complaint Details - Transaction | i-Insure')

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
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Complaint Details</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="acce" class="list-group-item active">
                                1. Complaint Details
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card">
                        <div class="body">
                            <div class="card">
                                <div class="header bg-teal">
                                    <h2>
                                        Complaint Details
                                    </h2>
                                </div>
                                <div class="body">
                                    <form class="form">
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Complainant:</small></label>
                                                        <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" readonly value = "{{$complaint->name}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Contact Details:</small></label>
                                                        <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" placeholder="Telephone" readonly value = "{{$complaint->tp_num}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>-</small></label>
                                                        <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" placeholder="Cellphone Number" readonly value = "{{$complaint->cp_1}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>-</small></label>
                                                        <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" placeholder="Cellphone Number (Alternate)" readonly value = "{{$complaint->cp_2}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>-</small></label>
                                                        <input id = "aadd_blcknum" name = "aadd_blcknum" type="email" class="form-control" placeholder="Email" readonly value = "{{$complaint->email}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Address:</small></label>
                                                        <textarea id = "address" name = "address" type="text" class="form-control" readonly value="{{$complaint->address}}"/></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Policy Number:</small></label>
                                                        <input id = "aadd_blcknum" name = "aadd_blcknum" type="email" class="form-control" placeholder="Email" readonly value = "{{$complaint->policy_number}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Insurance Company:</small></label>
                                                        <input id = "aadd_blcknum" name = "aadd_blcknum" type="email" class="form-control" placeholder="Email" readonly value = "{{$inscomp}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>Complaint Type :</small></label>
                                                        <input type="text" name="asd" class="form-control" readonly value = "{{$complaint->complaintType_name}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix"> 
                                            <div class="col-md-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Complaint Details:</small></label>
                                                        <textarea id = "complaint" name = "complaint" rows="10" class="form-control no-resize auto-growth" readonly></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form> 
                                </div>
                            </div>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div> 
        </div>
    </section>

    <script>
        $('#address').val('{{$complaint->address}}');
        $('#complaint').val('{{$complaint->complaint}}');
    </script>

@endsection
