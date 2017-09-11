@extends('pages.admin.master')

@section('title','Insurance Accounts - Transaction | i-Insure')

@section('trans','active')

@section('transIns','active')

@section('transInsComp','active')

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
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('admin/transaction/insurance-notification-list-company') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('admin/transaction/insurance-company') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="{{ URL::asset('admin/transaction/insurance-expiring-accounts-company') }}"><i class="material-icons">library_books</i> Expiring Accounts (company)</a></li>
                        <li><a href="{{ URL::asset('admin/transaction/insurance-notification-list-company') }}"><i class="material-icons">mail</i> Sent Notifications</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">settings</i> Settings</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="acce" class="list-group-item active" onclick="
                                    $('#acce').addClass('active');
                                    $('#acc').show(800);
                                    $('#sm').hide(800);
                                    $('#em').hide(800);
                                    $('#sy').hide(800);
                                    $('#vsms').removeClass('active');
                                    $('#vemail').removeClass('active');
                                    $('#vsys').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                1. Accessibility
                            </a>
                            <a href="javascript:void(0);" id="vsms" class="list-group-item" onclick="
                                    $('#vsms').addClass('active');
                                    $('#sm').show(800);
                                    $('#acc').hide(800);
                                    $('#em').hide(800);
                                    $('#sy').hide(800);
                                    $('#acce').removeClass('active');
                                    $('#vemail').removeClass('active');
                                    $('#vsys').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                2. Content - Via SMS
                            </a>
                            <a href="javascript:void(0);" id="vemail" class="list-group-item" onclick="
                                    $('#vemail').addClass('active');
                                    $('#em').show(800);
                                    $('#sm').hide(800);
                                    $('#acc').hide(800);
                                    $('#sy').hide(800);
                                    $('#vsms').removeClass('active');
                                    $('#acce').removeClass('active');
                                    $('#vsys').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                3. Content - Via Email
                            </a>
                            <a href="javascript:void(0);" id="vsys" class="list-group-item" onclick="
                                    $('#vsys').addClass('active');
                                    $('#sy').show(800);
                                    $('#sm').hide(800);
                                    $('#em').hide(800);
                                    $('#acc').hide(800);
                                    $('#vsms').removeClass('active');
                                    $('#vemail').removeClass('active');
                                    $('#acce').removeClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                4. Content - Via System Account
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card" id="acc">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/settings.png')}}" style="height: 50px; width: 50px;"> Settings</h3>
                        <p style="text-align: center;">Note: This system will automatically send notification to clients with expiring accounts. To automatically notify the client, please verify that internet connectivity is available.</p>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <form id="add" name = "add" action = "#" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <h3> <small><b>ACCESSIBILITY</b></small></h3>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <label for="via">Send notification via: </label>
                                            <div class="col-md-12" id="via">
                                                <div class="col-md-3">                               
                                                    <input type="checkbox" id="sms" name = "sms" class="filled-in chk-col-blue checkCheckbox"/><label for="sms">SMS</label>
                                                </div>

                                                <div class="col-md-3">
                                                    <input type="checkbox" id="email" name = "email" class="filled-in chk-col-blue checkCheckbox"/><label for="email">Email</label>
                                                </div>

                                                <div class="col-md-3">
                                                    <input type="checkbox" id="sys" name = "sys" class="filled-in chk-col-blue checkCheckbox"/><label for="sys">System Account</label>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <label for="days">Send to accounts expiring before: </label>
                                        <select id = "days" name = "days" class="form-control show-tick">
                                            <option selected value = "" style = "display: none;">-- Select Number of Days --</option>
                                            <option value = "10">1-10 days</option>
                                            <option value = "15">15-19 days</option>
                                            <option value = "20">20-24 days</option>
                                            <option value = "25">25 days</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="week">Frequency of notifying: </label>
                                        <select id = "week" name = "week" class="form-control show-tick">
                                            <option selected value = "" style = "display: none;">-- Select Frequency --</option>
                                            <option value = "0">Everyday</option>
                                            <option value = "1">Weekly</option>
                                            <option value = "2">Monthly</option>
                                        </select>
                                    </div>    
                                </div><br/><br/><br/><br/><br/>
                                <button id = "" type="" class="btn bg-blue btn-block waves-effect">
                                    <span>SAVE</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card" id="sm">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/settings.png')}}" style="height: 50px; width: 50px;"> Settings</h3>
                        <p style="text-align: center;">Note: This system will automatically send notification to clients with expiring accounts. To automatically notify the client, please verify that internet connectivity is available.</p>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <form id="add" name = "add" action = "#" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h3> <small><b>CONTENT</b></small></h3>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                 <label>Via SMS: (To Contact Person)</label>
                                                    <textarea rows="20" id = "viasms" name = "viasms" type="text" class="form-control">
                                                        DITO YUNG TEXT, DAPAT NASE-SAVE. SAMPLE LANG TO:
                                                        Dear Valued Client,

                                                                We have seen that your account will expire soon.
                                                                Please feel free to contact us whenever you want to renew your account.
                                                                More power and God Bless!



                                                        Compreline Insurance Services 
                                                        number here 
                                                        emailhere
                                                    </textarea> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button id = "" type="" class="btn bg-blue btn-block waves-effect">
                                    <span>SAVE</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card" id="em">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/settings.png')}}" style="height: 50px; width: 50px;"> Settings</h3>
                        <p style="text-align: center;">Note: This system will automatically send notification to clients with expiring accounts. To automatically notify the client, please verify that internet connectivity is available.</p>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <form id="add" name = "add" action = "#" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h3> <small><b>CONTENT</b></small></h3>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                 <label>Via E-mail: (To Company)</label>
                                                    <textarea rows="20" id = "viaemail" name = "viaemail" type="text" class="form-control">
                                                        DITO YUNG TEXT, DAPAT NASE-SAVE. SAMPLE LANG TO:
                                                        Dear Valued Client,

                                                                We have seen that your account will expire soon.
                                                                Please feel free to contact us whenever you want to renew your account.
                                                                More power and God Bless!



                                                        Compreline Insurance Services 
                                                        number here 
                                                        emailhere
                                                    </textarea> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br/><br/>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                 <label>Via E-mail: (To Contact Person)</label>
                                                    <textarea rows="20" id = "viaemail" name = "viaemail" type="text" class="form-control">
                                                        DITO YUNG TEXT, DAPAT NASE-SAVE. SAMPLE LANG TO:
                                                        Dear Valued Client,

                                                                We have seen that your account will expire soon.
                                                                Please feel free to contact us whenever you want to renew your account.
                                                                More power and God Bless!



                                                        Compreline Insurance Services 
                                                        number here 
                                                        emailhere
                                                    </textarea> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button id = "" type="" class="btn bg-blue btn-block waves-effect">
                                    <span>SAVE</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card" id="sy">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/settings.png')}}" style="height: 50px; width: 50px;"> Settings</h3>
                        <p style="text-align: center;">Note: This system will automatically send notification to clients with expiring accounts. To automatically notify the client, please verify that internet connectivity is available.</p>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <form id="add" name = "add" action = "#" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h3> <small><b>CONTENT</b></small></h3>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                 <label>Via System Account:</label>
                                                    <textarea rows="20" id = "viasys" name = "viasys" type="text" class="form-control">
                                                        DITO YUNG TEXT, DAPAT NASE-SAVE. SAMPLE LANG TO:
                                                        Dear Valued Client,

                                                                We have seen that your account will expire soon.
                                                                Please feel free to contact us whenever you want to renew your account.
                                                                More power and God Bless!



                                                        Compreline Insurance Services 
                                                        number here 
                                                        emailhere
                                                    </textarea> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "time" name = "time" type="text" class="form-control" pattern="[A-Za-z'-]">
                                </div>

                                <button id = "" type="" class="btn bg-blue btn-block waves-effect">
                                    <span>SAVE</span>
                                </button>
                            </form>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        window.onload = function() {
          document.getElementById('sm').style.display = 'none';
          document.getElementById('em').style.display = 'none';
          document.getElementById('sy').style.display = 'none';
        };
    </script>

@endsection