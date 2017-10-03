@extends('pages.admin.master')

@section('title','Insurance Accounts - Transaction| i-Insure')

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
    $today =  date("D M j Y"); 

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
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('admin/transaction/transmittal') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('admin/transaction/transmittal-home') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="{{ URL::asset('admin/transaction/transmittal') }}"><i class="material-icons">home</i> List of Transmittal</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Transmittal Details</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="acce" class="list-group-item active">
                                1. Transmittal Form
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
                                        Transmittal Request Details
                                    </h2>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="body">
                                                <h3> Transmittal Request Form </h3>
                                                <form>
                                                    <div class="row clearfix">
                                                        <div class="col-md-12">
                                                            <div class="form-group form-float">
                                                                <div class="form-line">
                                                                    <label><small>Name:</small></label>
                                                                    <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" readonly="true" value = "{{$details->name}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-md-6">
                                                            <div class="form-group form-float">
                                                                <div class="form-line">
                                                                    <label><small>Contact Details:</small></label>
                                                                    <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" placeholder="Telephone" readonly="true" value = "{{$details->tp_num}}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-float">
                                                                <div class="form-line">
                                                                    <label><small>-</small></label>
                                                                    <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" placeholder="Cellphone Number" readonly="true" value = "{{$details->cp_1}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row clearfix">
                                                        <div class="col-md-6">
                                                            <div class="form-group form-float">
                                                                <div class="form-line">
                                                                <label><small>-</small></label>
                                                                    <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" placeholder="Cellphone Number (Alternate)" readonly="true" value = "{{$details->cp_2}}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-float">
                                                                <div class="form-line">
                                                                <label><small>-</small></label>
                                                                    <input id = "aadd_blcknum" name = "aadd_blcknum" type="email" class="form-control" placeholder="Email" readonly="true" value = "{{$details->email}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-md-12">
                                                            <div class="form-group form-float">
                                                                <div class="form-line">
                                                                    <label><small>Address:</small></label>
                                                                    <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" readonly="true" value = "{{$details->address}}"
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-md-5">
                                                            <div class="form-group form-float">
                                                                <div class="form-line">
                                                                    <label><small>Policy Number:</small></label>
                                                                    <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" readonly="true" value = "{{$details->policy_number}}"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <div class="form-group form-float">
                                                                <div class="form-line">
                                                                    <label><small>Insurance Company:</small></label>
                                                                    <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" readonly="true" value = "{{$inscomp->comp_name}}"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix"> 
                                                        <div class="col-md-12">
                                                            <div class="form-group form-float">
                                                                <div class="form-line">
                                                                    <label><small>Documents to transmit:</small></label>
                                                                    <ul>
                                                                        @foreach($documents as $doc)
                                                                            <li>{{$doc->document}}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-md-12">
                                                            <div class="form-group form-float">
                                                                <div class="form-line">
                                                                    <label><small>Courier:</small></label>
                                                                    <input id = "emp_middle_name" name = "emp_middle_name" type="text" class="form-control" disabled value = "{{$courier->pinfo_last_name}}, {{$courier->pinfo_first_name}} {{$courier->pinfo_middle_name}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><br/><br/>
                                                    <div class="col col-md-12">
                                                        <a class="btn bg-orange btn-block waves-effect m-b-15 right" role="button" aria-expanded="false" onclick=" window.open('{{ URL::asset ('/admin/pdf/transmittal-form') }}')">
                                                            <span style="font-size: 15px;"> GENERATE PDF</span>
                                                        </a>
                                                    </div>
                                                </form>                                                
                                            </div>
                                        </div><!-- end of col-md-10 -->
                                    </div><!-- end of row -->
                                </div><!-- end of body inside body -->
                            </div><!-- end of card -->
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div> 
        </div>
    </section>
   
@endsection
