@extends('pages.admin.master')

@section('title','Complaint - Transaction| i-Insure')

@section('transPayment','active')

@section('transNewPayment','active')

@section('body')

    <section class="content">
    <h2 style="text-align: center"> Welcome to <b style="color: orange;"> i-Insure </b><br/>
    <label><small>July 20, 2017 - Thursday</small></label><br/>
    <label><small>09:23:21 AM</small></label>
    </h2>
    <br/>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('admin/transaction/complaint-online') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('admin/transaction/complaint-online') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> New Complaint</a></li>
                    </ol>
                </div>
            </div>
            <div class="row clearfix">
                <!-- PAYMENT DETAILS -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>BASIC DETAILS</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Date Received:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="date" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Insurance Company:</small></label>
                                            <select id = "aadd_region" name = "aadd_region" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" style = "display: none;">-- Select Insurance Company --</option>
                                                        <option value = "I">12345</option>
                                                        <option value = "II">67890</option>
                                                        <option value = "III">111111</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Policy Number:</small></label>
                                            <select id = "aadd_region" name = "aadd_region" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" style = "display: none;">-- Select Policy Number --</option>
                                                        <option value = "I">12345</option>
                                                        <option value = "II">67890</option>
                                                        <option value = "III">111111</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="button" class="btn btn-block bg-blue waves-effect left" onclick="
                                    $('#clientDet').show(500);
                                    $('#complDet').show(500);">
                                        <span style="font-size: 15px;"> NEXT</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PAYMENT DETAILS -->
                <!-- BREAKDOWN -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
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
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-block bg-blue waves-effect left" onclick="
                                    $('#clientDet').show(500);
                                    $('#complDet').show(500);
                                    $(this).parents('#assign').hide(500);
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                        <span style="font-size: 15px;"> PREVIOUS</span>
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" id="next1"  class="btn btn-block bg-green waves-effect left">
                                        <span style="font-size: 15px;"> SUBMIT</span>
                                    </button>
                                </div>
                            </div>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                    
                    <div class="card" id="clientDet">
                        <div class="header">
                            <h2>CLIENT DETAILS</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Name:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" disabled="disable" min="1" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Cellphone Number:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" disabled="disable" min="1" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Cellphone Number (Alternate):</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" disabled="disable" min="1" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Telephone:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" disabled="disable" min="1" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Email:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" disabled="disable" min="1" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Address:</small></label>
                                            <textarea id = "aCLAIM_type_name" rowa="2" name = "aCLAIM_type_name" type="text" disabled="disable" min="1" class="form-control" pattern="[A-Za-z'-]" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# BREAKDOWN -->
            </div>

            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card" id="complDet">
                        <div class="header">
                            <h2>COMPLAINT DETAILS</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label><small>Complaint Type:</small></label>
                                            <select id = "aadd_region" name = "aadd_region" class="form-control show-tick" data-live-search="true" readonly="true">
                                                  <option selected value = "" style = "display: none;">-- Select Complaint Type --</option>
                                                        <option value = "I">12345</option>
                                                        <option value = "II">67890</option>
                                                        <option value = "III">111111</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>If others, specify:</small></label>
                                            <input id = "aCLAIM_type_name" name = "aCLAIM_type_name" type="text" disabled="disable" min="1" class="form-control" pattern="[A-Za-z'-]" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                        <label><small>Complaint Details:</small></label>
                                            <textarea id = "aCLAIM_type_name" rows="10" name = "aCLAIM_type_name" type="text" class="form-control" pattern="[A-Za-z'-]" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-block bg-blue waves-effect left" onclick="
                                    $('#clientDet').hide(500);
                                    $(this).parents('#complDet').hide(500);
                                    $('#assign').show(500);
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                        <span style="font-size: 15px;"> NEXT</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div> <!-- END OF COL XS -->
            </div> <!-- END OF ROW -->
        </div>
    </section>

    <script type="text/javascript">
        window.onload = function(){
            document.getElementById("clientDet").style.display = 'none';
            document.getElementById("complDet").style.display = 'none';
            document.getElementById("assign").style.display = 'none';
        };
    </script>

@endsection