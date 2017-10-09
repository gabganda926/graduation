@extends('pages.admin.master')

@section('title','Insurance Accounts - Transaction| i-Insure')

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
                <form id="transmit" name = "transmit" action = "transmittal-documents/direct_transmit" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card" id="transform">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/transmit.png')}}" style="height: 50px; width: 50px;"><b> Transmit Documents </b></h3>
                        </div>
                        <div class="body">
                                <h3><br/> <small><b>Transmittal Form</b></small></h3>
                                <br/>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <label>Client: </label>
                                    <select id = "clients" name = "clients" class="form-control show-tick" data-live-search="true">
                                    <option selected value = "" style = "display: none;">-- Select Client --</option>
                                    @foreach($data as $dt)
                                     @if($dt->insurance->client->client_type == 1)
                                    <option value = "{{$dt->insure_ID}}" 
                                        data-acc_id='{{$dt->account_ID}}'
                                        data-cp1='{{$dt->insurance->client->individual->details->pinfo_cpnum_1}}'
                                        data-cp2='{{$dt->insurance->client->individual->details->pinfo_cpnum_2}}'
                                        data-tpnum='{{$dt->insurance->client->individual->details->pinfo_pinfo_tpnum}}'
                                        data-mail='{{$dt->insurance->client->individual->details->pinfo_mail}}' 
                                        data-pnum='{{$dt->insurance->policy_number}}'
                                        data-icomp_id='{{$dt->insurance->inscomp->comp_ID}}'
                                        data-icomp='{{$dt->insurance->inscomp->comp_name}}'
                                        data-address='{{$dt->insurance->client->individual->address->add_blcknum}} {{$dt->insurance->client->individual->address->add_street}} {{$dt->insurance->client->individual->address->add_subdivision}} {{$dt->insurance->client->individual->address->add_brngy}} {{$dt->insurance->client->individual->address->add_district}} {{$dt->insurance->client->individual->address->add_city}} {{$dt->insurance->client->individual->address->add_province}} {{$dt->insurance->client->individual->address->add_region}} {{$dt->insurance->client->individual->address->add_zipcode}}'>
                                        {{$dt->insurance->client->individual->details->pinfo_last_name}}, {{$dt->insurance->client->individual->details->pinfo_first_name}} {{$dt->insurance->client->individual->details->pinfo_middle_name}}
                                    </option>
                                     @elseif($dt->insurance->client->client_type == 2)
                                        <option value = "{{$dt->insure_ID}}">
                                            {{$dt->insurance->client->company->comp_name}}
                                        </option>
                                     @endif
                                    @endforeach
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
                                            <input id = "tpnum" name = "tpnum" type="text" class="form-control" placeholder="Telephone" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>-</small></label>
                                            <input id = "cpnum_1" name = "cpnum_1" type="text" class="form-control" placeholder="Cellphone Number" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>-</small></label>
                                            <input id = "cpnum_2" name = "cpnum_2" type="text" class="form-control" placeholder="Cellphone Number (Alternate)" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>-</small></label>
                                            <input id = "email" name = "email" type="email" class="form-control" placeholder="Email" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Address:</small></label>
                                            <input id = "address" name = "address" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Policy Number:</small></label>
                                            <input id = "policyno" name = "policyno" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Insurance Company: </label>
                                            <input id = "inscomp" name = "inscomp" type="text" class="form-control" readonly>
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
                                                <input id = "date_create" name = "date_create" type="text" class="form-control date" placeholder="Ex: 30/07/2016">
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
                                                <input id = "time_created" name = "time_created" type="text" class="form-control time12" placeholder="Ex: 11:59 pm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br/><br/>
                   
                            <div class="row clearfix">
                                <div class="col col-md-12">
                                    <a class="btn bg-teal btn-block waves-effect m-b-15 right" role="button" aria-expanded="false" onclick="
                                    if($('#transmit').valid())
                                    {
                                        $(this).parents('#transform').hide(800);
                                        $('#docsec').show(800);
                                        $('#tform').removeClass('active');
                                        $('#dsec').removeClass('disabled');
                                        $('#dsec').addClass('active');
                                        $('body,html').animate({
                                                                    scrollTop: 0
                                                                }, 500);
                                                                return false;
                                    }">
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
                                                                    <th class="col-md-1"><input type="checkbox" id="8" class="filled-in chk-col-green"><label for="8"></label></th>
                                                                    <th>Document</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($records as $rec)
                                                                 @if($rec->del_flag == 0)
                                                                    <tr>
                                                                        <td class="col-md-1"><input type="checkbox" id="{{$rec->transRec_ID}}" name = "record[]" class="filled-in chk-col-green records" data-name = '{{$rec->transRec}}' value = "{{$rec->transRec_ID}}"><label for="{{$rec->transRec_ID}}"></label></td>
                                                                        <td>{{$rec->transRec}}</td>
                                                                    </tr>
                                                                 @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div id = "error"></div>
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
                                        if($('#transmit').valid())
                                        {
                                            $(this).parents('#docsec').hide(800);
                                            $('#asscour').show(800);
                                            $('#dsec').removeClass('active');
                                            $('#acour').removeClass('disabled');
                                            $('#acour').addClass('active');
                                            $('body,html').animate({
                                                                        scrollTop: 0
                                                                    }, 500);
                                                                    return false;
                                        }">
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
                                    <select id = "courier" name = "courier" class="form-control show-tick" data-live-search="true">
                                    <option selected value = "" style = "display: none;">-- Select Courier --</option>
                                     @foreach($courier as $cor)
                                      @foreach($info as $Info)
                                       @if($cor->personal_info_ID == $Info->pinfo_ID)
                                        <option value = "{{$cor->courier_ID}}" data-name = "{{$Info->pinfo_last_name}}, {{$Info->pinfo_first_name}} {{$Info->pinfo_middle_name}}">{{$Info->pinfo_last_name}}, {{$Info->pinfo_first_name}} {{$Info->pinfo_middle_name}}</option>
                                       @endif
                                      @endforeach
                                     @endforeach
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
                                    if($('#transmit').valid())
                                    {
                                        $(this).parents('#asscour').hide(800);
                                        $('#summary').show(800);
                                        $('#acour').removeClass('active');
                                        $('#summ').removeClass('disabled');
                                        $('#summ').addClass('active');
                                        $('body,html').animate({
                                                                    scrollTop: 0
                                                                }, 500);
                                                                return false;
                                    }">
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
                                    <input id = "acc_ID" name = "acc_ID" type="text" class="form-control" style = "display: none;">
                                    <input id = "insurance_ID" name = "insurance_ID" type="text" class="form-control" style = "display: none;">
                                    <br/>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <label>Client: </label>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input id = "det_clients" name = "det_clients" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Contact Details:</small></label>
                                                        <input id = "det_tpnum" name = "det_tpnum" type="text" class="form-control" placeholder="Telephone" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>-</small></label>
                                                        <input id = "det_cpnum_1" name = "det_cpnum_1" type="text" class="form-control" placeholder="Cellphone Number" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>-</small></label>
                                                        <input id = "det_cpnum_2" name = "det_cpnum_2" type="text" class="form-control" placeholder="Cellphone Number (Alternate)" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                    <label><small>-</small></label>
                                                        <input id = "det_email" name = "det_email" type="email" class="form-control" placeholder="Email" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Address:</small></label>
                                                        <input id = "det_address" name = "det_address" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <label><small>Policy Number:</small></label>
                                                        <input id = "det_policyno" name = "det_policyno" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <label>Insurance Company: </label>
                                                        <input id = "det_inscomp" name = "det_inscomp" type="text" class="form-control" readonly>
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
                                                            <input type="text" id = "det_date_created" name = "det_date_created" class="form-control date" placeholder="Ex: 30/07/2016" readonly>
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
                                                            <input type="text" id = "det_time_created" name = "det_time_created" class="form-control time12" placeholder="Ex: 11:59 pm" readonly>
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
                                                        <ul id = "doc-trans">
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
                                                        <input id = "det_courier" name = "det_courier" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="divider" style="margin-bottom:5%;"></div>
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
                                    <a class="btn bg-teal btn-block waves-effect m-b-15 right" role="button" aria-expanded="false" onclick="
                                    if($('#transmit').valid())
                                    {
                                        swal({
                                          title: 'Are you sure?',
                                          type: 'warning',
                                          showCancelButton: true,
                                          confirmButtonColor: '#DD6B55',
                                          confirmButtonText: 'Continue',
                                          cancelButtonText: 'Cancel',
                                          closeOnConfirm: false,
                                          closeOnCancel: false
                                        },
                                        function(isConfirm){
                                          if (isConfirm) {
                                            $('#transmit').submit();
                                          } else {
                                              swal({
                                              title: 'Cancelled',
                                              type: 'warning',
                                              timer: 500,
                                              showConfirmButton: false
                                              });
                                          }
                                        });
                                    }
                                    ">
                                        <span style="font-size: 15px;"> FINISH</span>
                                    </a>
                                </div>
                            </div>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
        </form>
    </section>
    
    <script type="text/javascript">
        window.onload = function() {
          document.getElementById('docsec').style.display = 'none';
          document.getElementById('asscour').style.display = 'none';
          document.getElementById('summary').style.display = 'none';
        };
    </script>

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

        today = mm+'/'+dd+'/'+yyyy;
        $('#date_create').val(today);

        var myVar=setInterval(function(){myTimer()},1000);

        function myTimer() {
            var d = new Date();
            $('#time_created').val(d.toLocaleTimeString());
        }

        $("#clients").on('change textInput input', function()
        {
            $('#det_clients').val($('#clients option:selected').text().replace(/^\s+|\s+$/g, ''));
            $('#acc_ID').val($('#clients option:selected').data('acc_id'));
            $('#insurance_ID').val($('#clients option:selected').data('icomp_id'));
            $('#tpnum').val($('#clients option:selected').data('tpnum'));
            $('#cpnum_1').val($('#clients option:selected').data('cp1'));
            $('#cpnum_2').val($('#clients option:selected').data('cp2'));
            $('#email').val($('#clients option:selected').data('mail'));
            $('#det_tpnum').val($('#clients option:selected').data('tpnum'));
            $('#det_cpnum_1').val($('#clients option:selected').data('cp1'));
            $('#det_cpnum_2').val($('#clients option:selected').data('cp2'));
            $('#det_email').val($('#clients option:selected').data('mail'));
            
            $('#address').val($('#clients option:selected').data('address'));
            $('#det_address').val($('#clients option:selected').data('address'));
            $('#policyno').val($('#clients option:selected').data('pnum'));
            $('#det_policyno').val($('#clients option:selected').data('pnum'));
            $('#inscomp').val($('#clients option:selected').data('icomp'));
            $('#det_inscomp').val($('#clients option:selected').data('icomp'));


            @foreach($details as $dt)
             if('{{$dt->req_ID}}' == $(this).val())
             {

                @foreach($request as $req)
                 @if($req->req_ID == $dt->req_ID)
                  $('#date_create').val('{{\Carbon\Carbon::parse($req->date_recieved)->format("F d, Y")}}');
                  $('#time_created').val('{{\Carbon\Carbon::parse($req->date_recieved)->format("h:m:s A")}}');
                  $('#det_date_created').val('{{\Carbon\Carbon::parse($req->date_recieved)->format("F d, Y")}}');
                  $('#det_time_created').val('{{\Carbon\Carbon::parse($req->date_recieved)->format("h:m:s A")}}');
                 @endif
                @endforeach

                var counter = 0;

                @foreach($documents as $doc)
                 @if($doc->req_ID == $dt->req_ID)
                  counter++;
                  $('#docreq tbody').append('<tr><td>'+counter+'</td><td>{{$doc->document}}</td></tr>');
                 @endif
                @endforeach

             }
            @endforeach
        });

        $(".records").on('change textInput input', function()
        {
          $("#doc-trans li").remove(0);
          records = $(".records:checked").map(function ()
          {
              return $(this).data('name')
          }).get();
          $.each(records, function(key, value){
            $("#doc-trans").append('<li>'+value+'</li>');
          });
        });

        $('#courier').on('change textInput input', function(){
            $('#det_courier').val($(this).find(":selected").text());
        });
    </script>

    <script>
        jQuery.validator.setDefaults({
            errorPlacement: function(error, element) {
                if (element.attr("name") == "record[]" )  
                    $("#error").append(error)
                else 
                    error.insertAfter(element);
            }
        });

        $.validator.addMethod("record", function(value, elem, param) {
            if($(".records:checkbox:checked").length > 0){
               return true;
           }else {
               return false;
           }
        },"You must select at least one document!");    
        $.validator.addMethod("alphanumeric", function(value, element) {
            return this.optional(element) || /^[A-Za-z][A-Za-z0-9 '-.]*$/i.test(value);
         }, "This field must contain only letters, numbers, dashes, space, apostrophe or dot.");
        $.validator.addMethod("alpha", function(value, element) {
            return this.optional(element) || /^[A-Za-z][A-Za-z '-.]*$/i.test(value);
         }, "This field must contain only letters, space, dash, apostrophe or dot.");
        $.validator.addMethod("blcknumber", function(value, element) {
            return this.optional(element) || /^[A-Za-z0-9][A-Za-z0-9 '-.]*$/i.test(value);
         }, "This field must contain only letters, numbers, space, dash, apostrophe or dot.");


        // Wait for the DOM to be ready
        $(function() {
          // Initialize form validation on the registration form.
          // It has the name attribute "registration"
          $("form[name='transmit']").validate({
            // Specify validation rules
            rules: {
              // The key name on the left side is the name attribute
              // of an input field. Validation rules are defined
              // on the right side
              clients:{
                required: true,
              },
              courier:{
                required: true,
              },
              'record[]':{
                record: true,
              }
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
              form.submit();
            }
          });
        });
    </script>
@endsection
