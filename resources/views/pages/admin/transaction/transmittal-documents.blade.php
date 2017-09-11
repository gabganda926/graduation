@extends('pages.admin.master')

@section('title','Transmittal - Transaction| i-Insure')

@section('trans','active')

@section('transTrans','active')

@section('transTransDocuments','active')

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
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Transmit Documents</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="tform" class="list-group-item active">
                                1. Transmittal Form
                            </a>
                            <a href="javascript:void(0);" id="dsec" class="list-group-item disabled">2. Document Selection</a>
                            <a href="javascript:void(0);" id="acour" class="list-group-item disabled">3. Assign Courier</a>
                            <a href="javascript:void(0);" id="summ" class="list-group-item disabled">4. Summary</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card" id="transform">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/transmit.png')}}" style="height: 50px; width: 50px;"><b> Transmit Documents </b></h3>
                        </div>
                        <div class="body">
                            <form id="" name = "" action = "" method="POST">
                                <h3><br/> <small><b>Transmittal Form</b></small></h3>
                                <br/>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <label>Client: </label>
                                    <select id = "compdrop" name = "compdrop" class="form-control show-tick" data-live-search="true">
                                            <option value = "bdo">Avellaneda, Marynel</option>
                                            <option value = "bdo">Bukid, Gerald</option>
                                            <option value = "bdo">Rola, Ma. Gabriella</option>
                                    </select>
                                    <br/>
                                    <br/>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Contact Details:</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" placeholder="Telephone" readonly="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>-</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" placeholder="Cellphone Number" readonly="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>-</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" placeholder="Cellphone Number (Alternate)" readonly="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>-</small></label>
                                            <input id = "aadd_blcknum" name = "aadd_blcknum" type="email" class="form-control" placeholder="Email" readonly="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Address:</small></label>
                                            <input id = "emp_middle_name" name = "emp_middle_name" type="text" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Policy Number:</small></label>
                                            <select id = "vehicle_type" name = "vehicle_type" class="form-control show-tick" data-live-search="true" >
                                                      <option selected value = "" style = "display: none;">---</option>
                                                    </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Insurance Company: </label>
                                            <select id = "compdrop" name = "compdrop" class="form-control show-tick" data-live-search="true">
                                                    <option value = "bdo">Commonwealth Insurance</option>
                                                    <option value = "bdo">FPG Insurance</option>
                                                    <option value = "bdo">People's General Insurance</option>
                                                    <option value = "bdo">Standard Insurance</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="demo-masked-input">
                                    <div class="col-md-6">
                                        <b>Date Created: </b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control date" placeholder="Ex: 30/07/2016">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Time</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">access_time</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control time12" placeholder="Ex: 11:59 pm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br/><br/>
                            </form>
                   
                            <div class="row clearfix">
                                <div class="col col-md-12">
                                    <a class="btn bg-teal btn-block waves-effect m-b-15 right" role="button" aria-expanded="false" onclick="
                                    $(this).parents('#transform').hide(800);
                                    $('#docsec').show(800);
                                    $('#tform').removeClass('active');
                                    $('#dsec').removeClass('disabled');
                                    $('#dsec').addClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;">
                                        <span style="font-size: 15px;"> NEXT</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" id="docsec">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/1.png')}}" style="height: 50px; width: 50px;"><b> Document Selection </b></h3>
                        </div>
                        <div class="body">
                                <div class="well">
                                    <div class="row clearfix">
                                        <!-- Task Info -->
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="header">
                                                    <h2>Client's Request</h2>
                                                </div>
                                                <div class="body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover dashboard-task-infos">
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-md-1">#</th>
                                                                    <th>Document</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Cheque Voucher (Client's Copy)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Insurance Form</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Cheque Voucher (Bank's copy)</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="header">
                                                    <h2>Select documents</h2>
                                                </div>
                                                <div class="body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover dashboard-task-infos">
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-md-1"><input type="checkbox" id="8" class="filled-in chk-col-green checkCheckbox"><label for="8"></label></th>
                                                                    <th>Document</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="col-md-1"><input type="checkbox" id="2" class="filled-in chk-col-green checkCheckbox"><label for="2"></label></td>
                                                                    <td>Cheque Voucher (Client's Copy)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-1"><input type="checkbox" id="3" class="filled-in chk-col-green checkCheckbox"><label for="3"></label></td>
                                                                    <td>Insurance Form</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-1"><input type="checkbox" id="4" class="filled-in chk-col-green checkCheckbox"><label for="4"></label></td>
                                                                    <td>Cheque Voucher (Bank's copy)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-1"><input type="checkbox" id="5" class="filled-in chk-col-green checkCheckbox"><label for="5"></label></td>
                                                                    <td>Policy Receipt</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col col-md-6">
                                        <a class="btn bg-blue btn-block waves-effect m-b-15 right" role="button" aria-expanded="false" onclick="
                                        $(this).parents('#docsec').hide(800);
                                        $('#transform').show(800);
                                        $('#tform').addClass('active');
                                        $('#dsec').removeClass('active');
                                        $('body,html').animate({
                                                                    scrollTop: 0
                                                                }, 500);
                                                                return false;">
                                            <span style="font-size: 15px;"> PREVIOUS</span>
                                        </a>
                                    </div>
                                    <div class="col col-md-6">
                                        <a class="btn bg-teal btn-block waves-effect m-b-15 right" role="button" aria-expanded="false" onclick="
                                        $(this).parents('#docsec').hide(800);
                                        $('#asscour').show(800);
                                        $('#dsec').removeClass('active');
                                        $('#acour').removeClass('disabled');
                                        $('#acour').addClass('active');
                                        $('body,html').animate({
                                                                    scrollTop: 0
                                                                }, 500);
                                                                return false;">
                                            <span style="font-size: 15px;"> NEXT</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" id="asscour">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/courier.png')}}" style="height: 50px; width: 50px;"><b> Assign Courier </b></h3>
                        </div>
                        <div class="body">
                                    <div class="well">   
                                    <br/>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <label>Choose available courier: </label>
                                                <select id = "compdrop" name = "compdrop" class="form-control show-tick" data-live-search="true">
                                                        <option value = "bdo">Dela Cruz, Lyndan Pol</option>
                                                        <option value = "bdo">Pery, Roy Christian</option>
                                                </select>
                                                <br/>
                                                <br/>
                                            </div>
                                        </div>
                                    </div><br/><br/>
                            <div class="row clearfix">
                                <div class="col col-md-6">
                                    <a class="btn bg-blue btn-block waves-effect m-b-15 right" role="button" aria-expanded="false" onclick="
                                    $(this).parents('#asscour').hide(800);
                                    $('#docsec').show(800);
                                    $('#dsec').addClass('active');
                                    $('#acour').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;">
                                        <span style="font-size: 15px;"> PREVIOUS</span>
                                    </a>
                                </div>
                                <div class="col col-md-6">
                                    <a class="btn bg-teal btn-block waves-effect m-b-15 right" role="button" aria-expanded="false" onclick="
                                    $(this).parents('#asscour').hide(800);
                                    $('#summary').show(800);
                                    $('#acour').removeClass('active');
                                    $('#summ').removeClass('disabled');
                                    $('#summ').addClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;">
                                        <span style="font-size: 15px;"> NEXT</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" id="summary">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/closed.png')}}" style="height: 50px; width: 50px;"><b> Summary </b></h3>
                        </div>
                        <div class="body">
                                    <div class="well">   
                                    <br/>
                                        <form id="" name = "" action = "" method="POST">
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <label>Client: </label>
                                                <select id = "compdrop" name = "compdrop" class="form-control show-tick" data-live-search="true">
                                                        <option value = "bdo">Avellaneda, Marynel</option>
                                                        <option value = "bdo">Bukid, Gerald</option>
                                                        <option value = "bdo">Rola, Ma. Gabriella</option>
                                                </select>
                                                <br/>
                                                <br/>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Contact Details:</small></label>
                                                        <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" placeholder="Telephone" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>-</small></label>
                                                        <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" placeholder="Cellphone Number" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>-</small></label>
                                                        <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" placeholder="Cellphone Number (Alternate)" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>-</small></label>
                                                        <input id = "aadd_blcknum" name = "aadd_blcknum" type="email" class="form-control" placeholder="Email" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Address:</small></label>
                                                        <input id = "emp_middle_name" name = "emp_middle_name" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Policy Number:</small></label>
                                                        <select id = "vehicle_type" name = "vehicle_type" class="form-control show-tick" data-live-search="true" >
                                                                  <option selected value = "" style = "display: none;">---</option>
                                                                </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label>Insurance Company: </label>
                                                        <select id = "compdrop" name = "compdrop" class="form-control show-tick" data-live-search="true">
                                                                <option value = "bdo">Commonwealth Insurance</option>
                                                                <option value = "bdo">FPG Insurance</option>
                                                                <option value = "bdo">People's General Insurance</option>
                                                                <option value = "bdo">Standard Insurance</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="demo-masked-input">
                                                <div class="col-md-6">
                                                    <b>Date Created: </b>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">date_range</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control date" placeholder="Ex: 30/07/2016">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <b>Time: </b>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">access_time</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control time12" placeholder="Ex: 11:59 pm">
                                                        </div>
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
                                                            <li>DOCU 1</li>
                                                            <li>DOCU 2</li>
                                                            <li>DOCU 3</li>
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
                                                        <input id = "emp_middle_name" name = "emp_middle_name" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="divider" style="margin-bottom:5%;"></div>
                                        </form>
                                    </div><br/><br/>
                                    
                                    
                            <div class="row clearfix">
                                <div class="col col-md-4">
                                    <a class="btn bg-blue btn-block waves-effect m-b-15 right" role="button" aria-expanded="false" onclick="
                                    $(this).parents('#summary').hide(800);
                                    $('#asscour').show(800);
                                    $('#acour').addClass('active');
                                    $('#summ').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;">
                                        <span style="font-size: 15px;"> PREVIOUS</span>
                                    </a>
                                </div>
                                <div class="col col-md-4">
                                    <a class="btn bg-orange btn-block waves-effect m-b-15 right" role="button" aria-expanded="false" onclick=" window.open('{{ URL::asset ('/pdf/transmittal-form') }}')">
                                        <span style="font-size: 15px;"> GENERATE PDF</span>
                                    </a>
                                </div>
                                <div class="col col-md-4">
                                    <a class="btn bg-teal btn-block waves-effect m-b-15 right" role="button" aria-expanded="false" onclick="">
                                        <span style="font-size: 15px;"> FINISH</span>
                                    </a>
                                </div>
                            </div>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
    </section>
    
    <script type="text/javascript">
        window.onload = function() {
          document.getElementById('docsec').style.display = 'none';
          document.getElementById('asscour').style.display = 'none';
          document.getElementById('summary').style.display = 'none';
        };
    </script>
@endsection
