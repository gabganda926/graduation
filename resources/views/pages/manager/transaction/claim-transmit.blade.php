@extends('pages.manager.master')

@section('title','Claims - Transaction | i-Insure')

@section('transClaims','active')

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
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('/manager/transaction/claims') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('/manager/transaction/claims') }}"><i class="material-icons">home</i> Home</a></li>
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
                            <a href="javascript:void(0);" id="dsec" class="list-group-item disabled">2. Attachments</a>
                            <a href="javascript:void(0);" id="acour" class="list-group-item disabled">3. Assign Courier</a>
                            <a href="javascript:void(0);" id="summ" class="list-group-item disabled">4. Summary</a>
                        </div>
                    </div>
                </div>
                    <form id="ct" name = "ct" method="POST" action = "/manager/transaction/claim-transmit/submit" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-4" style = "display: none;">
                           <input id = "time" name = "time" type="text" class="form-control">
                        </div>
                        <div class="col-md-2" style = "display: none;">
                           <input id = "claimid" name = "claimid" type="text" class="form-control">
                        </div>
                        <div class="col-md-2" style = "display: none;">
                           <input id = "compid" name = "compid" type="text" class="form-control">
                        </div>
                        <div class="col-md-2" style = "display: none;">
                           <input id = "courid" name = "courid" type="text" class="form-control">
                        </div>
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
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Send to Insurance Company: </label>
                                            <input id = "inscomp" name = "inscomp" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Telephone Number:</small></label>
                                            <input id = "inscomp_telnum" name = "cont_telno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Fax Number:</small></label>
                                            <input id = "inscomp_fax" name = "cont_cpno_1" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Email:</small></label>
                                            <input id = "inscomp_email" name = "cont_telno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Address:</small></label>
                                            <input id = "inscomp_address" name = "address" type="text" class="form-control" readonly>
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
                            </div>

                            <h3><small><b>Client Basic Information</b></small></h3>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Client:</small></label>
                                            <input id = "client" name = "client" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="individualClient">
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Cellphone Number:</small></label>
                                                <input id = "cpno" name = "cont_cpno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Cellphone Number (Alternate):</small></label>
                                                <input id = "cpno_1" name = "cont_cpno_1" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Telephone Number:</small></label>
                                                <input id = "telno" name = "cont_telno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Email:</small></label>
                                                <input id = "email" name = "cont_email" type="email" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="companyClient">
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Telephone Number:</small></label>
                                                <input id = "comp_telnum" name = "cont_telno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Fax Number:</small></label>
                                                <input id = "comp_fax" name = "cont_cpno_1" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Email:</small></label>
                                                <input id = "comp_email" name = "cont_telno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                            </div>
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
                            </div>
                   
                            <div class="row clearfix">
                                <div class="col col-md-12">
                                    <a class="btn bg-teal btn-block waves-effect m-b-15 right" role="button" aria-expanded="false" onclick="
                                    if($('#ct').valid())
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
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/1.png')}}" style="height: 50px; width: 50px;"><b> Documents to be sent </b></h3>
                        </div>
                        <div class="body">
                                <div class="well">
                                    <div class="row clearfix">
                                        <!-- Task Info -->
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="header">
                                                    <h2>Attachments</h2>
                                                </div>
                                                <div class="body">
                                                    <div class="body table-responsive">
                                                        <table id="reqFiles" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                            <thead>
                                                                <tr>
                                                                    <th>Requirement</th>
                                                                    <th class="col-md-1">Files</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                   
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
                                        if($('#ct').valid())
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
                                                  @foreach($pinfo as $Info)
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
                                    if($('#ct').valid())
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
                                    <br/>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label>Send to Insurance Company: </label>
                                                        <input id = "summ_inscomp" name = "inscomp" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Telephone Number:</small></label>
                                                        <input id = "summ_inscomp_telnum" name = "cont_telno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Fax Number:</small></label>
                                                        <input id = "summ_inscomp_fax" name = "cont_cpno_1" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Email:</small></label>
                                                        <input id = "summ_inscomp_email" name = "cont_telno" type="text" class="form-control" pattern="[A-Za-z'-]" required disabled="disable">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label><small>Address:</small></label>
                                                        <input id = "summ_inscomp_address" name = "address" type="text" class="form-control" readonly>
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
                                                            <input id = "summ_date_create" name = "date_create" type="text" class="form-control date" placeholder="Ex: 30/07/2016">
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
                                                            <input id = "summ_time_created" name = "time_created" type="text" class="form-control time12" placeholder="Ex: 11:59 pm">
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
                                                            @foreach($cliacc as $ins)
                                                                @if($creq->account_ID == $ins->account_ID)
                                                                    @foreach($ctype as $ct)
                                                                        @if($creq->claimType_ID == $ct->claimType_ID)
                                                                            @foreach ($cfile as $req)
                                                                                @if($creq->claim_ID == $req->claim_ID)
                                                                                    @foreach($crequire as $creqs)
                                                                                        @if($req->claimReq_ID == $creqs->claimReq_ID)
                                                                                            @if($req->claimReq_picture != null || $req->claimReq_picture2 != null || $req->claimReq_picture3 != null || $req->claimReq_picture4 != null || $req->claimReq_picture5 != null)
                                                                                                <li> {{ $creqs->claimRequirement }} </li>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                            <li> Claim Request Form </li>
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
                                                        <input id = "summ_det_courier" name = "det_courier" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="divider" style="margin-bottom:5%;"></div>
                                    </div><br/><br/>
                                    
                                    
                            <div class="row clearfix">
                                <div class="col col-md-6">
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
                                <div class="col col-md-6">
                                    <a class="btn bg-teal btn-block waves-effect m-b-15 right" role="button" aria-expanded="false" onclick="
                                    document.getElementById('time').value = formatDate(new Date());
                                    document.getElementById('claimid').value = getClaimId();
                                    document.getElementById('compid').value = getCompId();
                                    document.getElementById('courid').value = getCourId();
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
                                        $('#ct').submit();
                                      } else {
                                          swal({
                                          title: 'Cancelled',
                                          type: 'warning',
                                          timer: 500,
                                          showConfirmButton: false
                                          });
                                      }
                                    });
                                    ">
                                        <span style="font-size: 15px;"> FINISH</span>
                                    </a>
                                </div>
                            </div>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </form>
            </div>
        </div>
    </section>


    <script>
        function formatDate(date)
        {
          var monthNames = [
            "January", "February", "March",
            "April", "May", "June", "July",
            "August", "September", "October",
            "November", "December"
          ];

          var day = date.getDate();
          var monthIndex = date.getMonth() + 1;
          var year = date.getFullYear();
          var h = addZero(date.getHours());
          var m = addZero(date.getMinutes());
          var s = addZero(date.getSeconds());

          return year + '-' + monthIndex + '-' + day + ' ' + h + ':' + m + ':' + s;
        }

        function addZero(i) {
                    if (i < 10) {
                        i = "0" + i;
                    }
                    return i;
                }

        function showInd(){
            $('#individualClient').show();
            $('#companyClient').hide();
        }

        function showComp(){
            $('#individualClient').hide();
            $('#companyClient').show();
        }

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
        $('#summ_date_create').val(today);

        var myVar=setInterval(function(){myTimer()},1000);

        function myTimer() {
            var d = new Date();
            $('#time_created').val(d.toLocaleTimeString());
            $('#summ_time_created').val(d.toLocaleTimeString());
        }

        function getClaimId(clid){
           clid = $('#claimid').val();
           return clid;
        } 

        function getCompId(clid1){
           clid1 = $('#compid').val();
           return clid1;
        } 

        function getCourId(clid2){
           clid2 = $('#courid').val();
           return clid2;
        } 

        $("#courier").on('change textInput input', function()
        {
            $('#summ_det_courier').val($(this).find(":selected").text());
            $('#courid').val($('#courier').val());
        });

        window.onload = function() {
              document.getElementById('docsec').style.display = 'none';
              document.getElementById('asscour').style.display = 'none';
              document.getElementById('summary').style.display = 'none';

            @foreach($cliacc as $ins)
                @if($creq->account_ID == $ins->account_ID)
                    @foreach($ctype as $ct)
                        @if($creq->claimType_ID == $ct->claimType_ID)
                            $('#claimtypez').val('{{$ct->claimType}}');
                            @foreach ($cfile as $req)
                                @if($creq->claim_ID == $req->claim_ID)
                                    @foreach($crequire as $creqs)
                                        @if($req->claimReq_ID == $creqs->claimReq_ID)
                                            @if($req->claimReq_picture != null || $req->claimReq_picture2 != null || $req->claimReq_picture3 != null || $req->claimReq_picture4 != null || $req->claimReq_picture5 != null)
                                                $('#claimid').val('{{$req->claim_ID}}');
                                                var option = '<tr><td>{{ $creqs->claimRequirement }}</td><td><input type="checkbox" id="{{ $req->claimReqFile_ID }}" class="chk-col-pink" checked disabled="disable" /><label for="{{ $req->claimReqFile_ID }}"></label></td></tr>';
                                                $('#reqFiles tbody').append(option);
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    @foreach($clist as $list)
                        @if($list->client_type == 1)
                            @if($ins->client_ID == $list->client_ID)
                                @foreach($cli as $client)
                                    @if($list->client_ID == $client->client_ID)
                                        @foreach($pinfo as $inf)
                                            @if($client->personal_info_ID == $inf->pinfo_ID)
                                                showInd();
                                                $('#client').val('{{ $inf->pinfo_last_name }}, {{ $inf->pinfo_first_name }} {{ $inf->pinfo_middle_name }}');
                                                $('#cpno').val('{{ $inf->pinfo_cpnum_1 }}');
                                                $('#cpno_1').val('{{ $inf->pinfo_cpnum_2 }}');
                                                $('#telno').val('{{ $inf->pinfo_tpnum }}');
                                                $('#email').val('{{ $inf->pinfo_mail}}');
                                                $('#policyno').val('{{ $ins->policy_number}}');

                                                @foreach($addr as $add)
                                                    @if($client->client_add_ID == $add->add_ID)
                                                        $('#address').val('{{ $add->add_blcknum}} {{ $add->add_district}} {{ $add->add_street}} {{ $add->add_city}} {{ $add->add_subdivision}} {{ $add->add_province}} {{ $add->add_brngy}} {{ $add->add_region}} {{ $add->add_zipcode}}');
                                                    @endif
                                                @endforeach

                                                @foreach($comp as $insc)
                                                    @if($ins->insurance_company == $insc->comp_ID)
                                                        $('#inscomp').val('{{$insc->comp_name}}');
                                                        $('#inscomp_telnum').val('{{$insc->comp_telnum}}');
                                                        $('#inscomp_fax').val('{{$insc->comp_faxnum}}');
                                                        $('#inscomp_email').val('{{$insc->comp_email}}');

                                                        $('#summ_inscomp').val('{{$insc->comp_name}}');
                                                        $('#summ_inscomp_telnum').val('{{$insc->comp_telnum}}');
                                                        $('#summ_inscomp_fax').val('{{$insc->comp_faxnum}}');
                                                        $('#summ_inscomp_email').val('{{$insc->comp_email}}');

                                                        $('#compid').val('{{$insc->comp_ID}}');

                                                         @foreach($addr as $add1)
                                                            @if($insc->comp_add_ID == $add1->add_ID)
                                                                $('#summ_inscomp_address').val('{{ $add1->add_blcknum}} {{ $add1->add_district}} {{ $add1->add_street}} {{ $add1->add_city}} {{ $add1->add_subdivision}} {{ $add1->add_province}} {{ $add1->add_brngy}} {{ $add1->add_region}} {{ $add1->add_zipcode}}');
                                                                $('#inscomp_address').val('{{ $add1->add_blcknum}} {{ $add1->add_district}} {{ $add1->add_street}} {{ $add1->add_city}} {{ $add1->add_subdivision}} {{ $add1->add_province}} {{ $add1->add_brngy}} {{ $add1->add_region}} {{ $add1->add_zipcode}}');
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endif

                        @if($list->client_type == 2)
                            @foreach($clist as $list)
                                @if($ins->client_ID == $list->client_ID)
                                    @foreach($comp as $client)
                                        @if($list->client_ID == $client->comp_ID)
                                            showComp();
                                            $('#client').val('{{ $client->comp_name }}');
                                            $('#comp_telnum').val('{{ $client->comp_telnum }}');
                                            $('#comp_fax').val('{{ $client->comp_faxnum }}');
                                            $('#comp_email').val('{{ $client->comp_email }}');
                                            $('#policyno').val('{{ $ins->policy_number}}');

                                            @foreach($addr as $add)
                                                @if($client->comp_add_ID == $add->add_ID)
                                                    $('#address').val('{{ $add->add_blcknum}} {{ $add->add_district}} {{ $add->add_street}} {{ $add->add_city}} {{ $add->add_subdivision}} {{ $add->add_province}} {{ $add->add_brngy}} {{ $add->add_region}} {{ $add->add_zipcode}}');
                                                @endif
                                            @endforeach

                                            @foreach($comp as $insc)
                                                @if($ins->insurance_company == $insc->comp_ID)
                                                    $('#inscomp').val('{{$insc->comp_name}}');
                                                    $('#inscomp_telnum').val('{{$insc->comp_telnum}}');
                                                    $('#inscomp_fax').val('{{$insc->comp_faxnum}}');
                                                    $('#inscomp_email').val('{{$insc->comp_email}}');

                                                    $('#summ_inscomp').val('{{$insc->comp_name}}');
                                                    $('#summ_inscomp_telnum').val('{{$insc->comp_telnum}}');
                                                    $('#summ_inscomp_fax').val('{{$insc->comp_faxnum}}');
                                                    $('#summ_inscomp_email').val('{{$insc->comp_email}}');

                                                    $('#compid').val('{{$insc->comp_ID}}');

                                                     @foreach($addr as $add1)
                                                        @if($insc->comp_add_ID == $add1->add_ID)
                                                            $('#summ_inscomp_address').val('{{ $add1->add_blcknum}} {{ $add1->add_district}} {{ $add1->add_street}} {{ $add1->add_city}} {{ $add1->add_subdivision}} {{ $add1->add_province}} {{ $add1->add_brngy}} {{ $add1->add_region}} {{ $add1->add_zipcode}}');
                                                            $('#inscomp_address').val('{{ $add1->add_blcknum}} {{ $add1->add_district}} {{ $add1->add_street}} {{ $add1->add_city}} {{ $add1->add_subdivision}} {{ $add1->add_province}} {{ $add1->add_brngy}} {{ $add1->add_region}} {{ $add1->add_zipcode}}');
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach

        };
    </script>
@endsection
