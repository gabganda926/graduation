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
                        <li><a href="javascript:void(0);"><i class="material-icons">settings</i> Settings</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="numba" class="list-group-item active" onclick="
                                    $('#numba1').show(800); 
                                    $('#settings').hide(800);
                                    $('#cRejected').hide(800);
                                    $('#cOngoing').hide(800);
                                    $('#cForwarded').hide(800);
                                    $('#cFor').removeClass('active');
                                    $('#cRej').removeClass('active');
                                    $('#cOn').removeClass('active');
                                    $('#set').removeClass('active');
                                    $('#numba').addClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                1. Settings
                            </a>
                            <a href="javascript:void(0);" id="set" class="list-group-item" onclick=" 
                                    $('#settings').show(800);
                                    $('#cRejected').hide(800);
                                    $('#cOngoing').hide(800);
                                    $('#cForwarded').hide(800);
                                    $('#numba1').hide(800);
                                    $('#numba').removeClass('active');
                                    $('#cFor').removeClass('active');
                                    $('#cRej').removeClass('active');
                                    $('#cOn').removeClass('active');
                                    $('#set').addClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                2. Content - When the complaint is received
                            </a>
                            <a href="javascript:void(0);" id="cFor" class="list-group-item" onclick=" 
                                    $('#cForwarded').show(800);
                                    $('#numba1').hide(800);
                                    $('#cRejected').hide(800);
                                    $('#cOngoing').hide(800);
                                    $('#settings').hide(800);
                                    $('#numba').removeClass('active');
                                    $('#set').removeClass('active');
                                    $('#cRej').removeClass('active');
                                    $('#cOn').removeClass('active');
                                    $('#cFor').addClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                3. Content - When action is ongoing/complaint is assigned
                            </a>
                            <a href="javascript:void(0);" id="cRej" class="list-group-item" onclick=" 
                                    $('#cRejected').show(800);
                                    $('#numba1').hide(800);
                                    $('#settings').hide(800);
                                    $('#cOngoing').hide(800);
                                    $('#cForwarded').hide(800);
                                    $('#numba').removeClass('active');
                                    $('#cFor').removeClass('active');
                                    $('#set').removeClass('active');
                                    $('#cOn').removeClass('active');
                                    $('#cRej').addClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                4. Content - When the complaint is settled
                            </a>
                            <a href="javascript:void(0);" id="cOn" class="list-group-item" onclick=" 
                                    $('#cOngoing').show(800);
                                    $('#numba1').hide(800);
                                    $('#cRejected').hide(800);
                                    $('#settings').hide(800);
                                    $('#cForwarded').hide(800);
                                    $('#numba').removeClass('active');
                                    $('#cFor').removeClass('active');
                                    $('#cRej').removeClass('active');
                                    $('#set').removeClass('active');
                                    $('#cOn').addClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                5. Content - When the complaint is unsettled
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card" id="numba1">
                        <div class="body">
                            <div class="card">
                                <div class="header bg-teal">
                                    <h2>
                                        Auto-reply Settings
                                        <label><small>NOTE: Please check the appropriate setting to be applied </small></label>
                                    </h2>
                                </div>
                                <div class="body">
                                    <form class="form">
                                        <div class="row clearfix">
                                            <div class="col-md-7">
                                                <div class="row clearfix"> 
                                                    <div class="col-md-12">
                                                        <label>Enable the following auto-reply settings: </label>
                                                    </div>
                                                </div>

                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <div class="switch">
                                                            <label><input type="checkbox" checked><span class="lever switch-col-pink"></span> When the complaint is received </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <div class="switch">
                                                            <label><input type="checkbox" checked><span class="lever switch-col-pink"></span> When the action is ongoing/complaint is assigned </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <div class="switch">
                                                            <label><input type="checkbox" checked><span class="lever switch-col-pink"></span> When the complaint is settled </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <div class="switch">
                                                            <label><input type="checkbox" checked><span class="lever switch-col-pink"></span> When the complaint is unsettled </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="col-md-5">
                                                <div class="row clearfix"> 
                                                    <div class="col-md-12">
                                                        <label>Send to: </label>
                                                    </div>
                                                </div>

                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <div class="switch">
                                                            <label><input type="checkbox" checked><span class="lever switch-col-deep-purple"></span> Email </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <div class="switch">
                                                            <label><input type="checkbox" checked><span class="lever switch-col-deep-purple"></span> System Account </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <button type="button" class="btn bg-teal btn-block waves-effect left" onclick="">
                                        <span style="font-size: 15px;"> SAVE CHANGES</span>
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="card" id="settings">
                        <div class="body">
                            <div class="card">
                                <div class="header bg-teal">
                                    <h2>
                                        Auto-reply Settings
                                        <label><small>NOTE: Upon viewing the complaint's details, the system will automatically inform the complainant. In this module, you can edit the message that will be sent to the complainant. </small></label>
                                    </h2>
                                </div>
                                <div class="body">
                                    <form class="form">
                                        <div class="row clearfix"> 
                                            <div class="col-md-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <textarea id = "vehicle_type_desc" name = "vehicle_type_desc" rows="20" class="form-control no-resize auto-growth">
Compreline Insurance Sevices
1610, 3 Marikina-Infanta Hwy, Pasig, 1610 Metro Manila


Dear Valued Customer,
        Good Day! 

        We have received your complaint, and it is up for reviewing. We're very sorry for the inconvenience that our agency had made. We appreciate your feedback, and we will definitely use that for our better performance in the future.

        We will notify you soon regarding your complaint.

        Thank you for your patience. God Bless!


From your Compreline Family

Contact Details:
compreline@gmail.com
(02) 576-3781
09123456789
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br/><Br/><br/>
                                        <button type="button" class="btn bg-teal btn-block waves-effect left" onclick="">
                                        <span style="font-size: 15px;"> SAVE CHANGES</span>
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" id="cForwarded">
                        <div class="body">
                            <div class="card">
                                <div class="header bg-teal">
                                    <h2>
                                        Auto-reply Settings
                                        <label><small>NOTE: Upon assigning an employee for a specific complaint, the system will automatically inform the complainant through email or system account. In this module, you can edit the message that will be sent to the complainant. </small></label>
                                    </h2>
                                </div>
                                <div class="body">
                                    <form class="form">
                                        <div class="row clearfix"> 
                                            <div class="col-md-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <textarea id = "vehicle_type_desc" name = "vehicle_type_desc" rows="20" class="form-control no-resize auto-growth">
Compreline Insurance Sevices
1610, 3 Marikina-Infanta Hwy, Pasig, 1610 Metro Manila


Dear Valued Customer,
        Good Day! 

        We have received your complaint, and it is up for reviewing. We're very sorry for the inconvenience that our agency had made. We appreciate your feedback, and we will definitely use that for our better performance in the future.

        On the bright side, we have already assigned an employee to resolve your complaint. Ms. Ma. Gabriella Tan will contact you at any moment, or you can contact her at 090909090909 / gabriella926.er@gmail.com.

        Thank you for your patience. God Bless!


From your Compreline Family

Contact Details:
compreline@gmail.com
(02) 576-3781
09123456789
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br/><Br/><br/>
                                        <button type="button" class="btn bg-teal btn-block waves-effect left" onclick="">
                                        <span style="font-size: 15px;"> SAVE CHANGES</span>
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" id="cRejected">
                        <div class="body">
                            <div class="card">
                                <div class="header bg-teal">
                                    <h2>
                                        Auto-reply Settings
                                        <label><small>NOTE: Upon updating a complaint's status to settled, the system will automatically notify the client through email or system account. In this module, you can edit the message that will be sent to the complainant.  </small></label>
                                    </h2>
                                </div>
                                <div class="body">
                                    <form class="form">
                                        <div class="row clearfix"> 
                                            <div class="col-md-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label>When rejected:</label>
                                                        <textarea id = "vehicle_type_desc" name = "vehicle_type_desc" rows="20" class="form-control no-resize auto-growth">
Compreline Insurance Sevices
1610, 3 Marikina-Infanta Hwy, Pasig, 1610 Metro Manila


Dear Valued Customer,
        Good Day! 

        We have received your complaint, and we're very sorry for the inconvenience that our agency had caused you. But upon investigation, our agency have found that your complaint is not appropriate for the services we are offering. 

        We appreciate your feedback, and we will definitely use that for our better performance in the future.

        Thank you for your patience. God Bless!


From your Compreline Family

Contact Details:
compreline@gmail.com
(02) 576-3781
09123456789
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br/><br/><Br/>
                                        <button type="button" class="btn bg-teal btn-block waves-effect left" onclick="">
                                        <span style="font-size: 15px;"> SAVE CHANGES</span>
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" id="cOngoing">
                        <div class="body">
                            <div class="card">
                                <div class="header bg-teal">
                                    <h2>
                                        Auto-reply Settings
                                        <label><small>NOTE: Upon updating a complaint's status to unsettled, the system will automatically notify the client through email or system account. In this module, you can edit the message that will be sent to the complainant.  </small></label>
                                    </h2>
                                </div>
                                <div class="body">
                                    <form class="form">
                                        <div class="row clearfix"> 
                                            <div class="col-md-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label>When action is ongoing:</label>
                                                        <textarea id = "vehicle_type_desc" name = "vehicle_type_desc" rows="20" class="form-control no-resize auto-growth">
Compreline Insurance Sevices
1610, 3 Marikina-Infanta Hwy, Pasig, 1610 Metro Manila


Dear Valued Customer,
        Good Day! 

        We have received your complaint, and we're currently taking action for your complaint. If ever you have further questions, please feel free to reply to this message, or email us at compreline@gmail.com, or call our hotline (02) 576-3781 or contact us at 09123456789. 

        We're very sorry for the inconvenience that our agency had caused you.

        We appreciate your feedback, and we will definitely use that for our better performance in the future.

        Thank you for your patience. God Bless!


From your Compreline Family

Contact Details:
compreline@gmail.com
(02) 576-3781
09123456789
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br/><br/><br/>

                                    <button type="button" class="btn bg-teal btn-block waves-effect left" onclick="">
                                        <span style="font-size: 15px;"> SAVE CHANGES</span>
                                    </button>
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
    window.onload = function() {   
          document.getElementById('cRejected').style.display = 'none';
          document.getElementById('cOngoing').style.display = 'none';
          document.getElementById('cForwarded').style.display = 'none';
          document.getElementById('settings').style.display = 'none';
        };
</script>
@endsection
