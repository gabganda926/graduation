@extends('pages.manager.master')

@section('title','Claims | Auto Reply Settings - Transaction | i-Insure')

@section('transClaims', 'active')

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
    </h2><br/>
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
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Auto Reply Settings</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <!-- SIDE NAV -->
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                                <div class="list-group">
                                    <a href="javascript:void(0);" id="set1" class="list-group-item active" onclick=" 
                                    $('#set').show(800);
                                    $('#aSet').hide(800);
                                    $('#rSet').hide(800);
                                    $('#aSet1').removeClass('active');
                                    $('#rSet1').removeClass('active');
                                    $('#set1').addClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">
                                        1. Settings
                                    </a>
                                    <a href="javascript:void(0);" id="aSet1" class="list-group-item" onclick=" 
                                    $('#aSet').show(800);
                                    $('#rSet').hide(800);
                                    $('#set').hide(800);
                                    $('#rSet1').removeClass('active');
                                    $('#set1').removeClass('active');
                                    $('#aSet1').addClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">2. Content - When the claims request is accepted</a>
                                    <a href="javascript:void(0);" id="rSet1" class="list-group-item" onclick=" 
                                    $('#rSet').show(800);
                                    $('#aSet').hide(800);
                                    $('#set').hide(800);
                                    $('#aSet1').removeClass('active');
                                    $('#set1').removeClass('active');
                                    $('#rSet1').addClass('active');
                                    $('body,html').animate({
                                                                scrollTop: 0
                                                            }, 500);
                                                            return false;
                                    ">3. Content - When the claims request is rejected</a>
                            </div>
                    </div>
                </div>
                <!-- END SIDE NAV -->
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card" id="set">
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
                                                            <label><input type="checkbox" checked><span class="lever switch-col-pink"></span> When the claims request is accepted </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <div class="switch">
                                                            <label><input type="checkbox" checked><span class="lever switch-col-pink"></span> When the claims request is  rejected </label>
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

                    <div class="card" id="aSet">
                        <div class="body">
                            <div class="card">
                                <div class="header bg-teal">
                                    <h2>
                                        Auto-reply Settings
                                        <label><small>NOTE: Upon updating some of the record's status, the system will automatically inform the client. In this module, you can edit the message that will be sent to the client. </small></label>
                                    </h2>
                                </div>
                                <div class="body">
                                    <form class="form">
                                        <div class="row clearfix"> 
                                            <div class="col-md-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label>When the quotation is forwarded to manager:</label>
                                                        <textarea id = "vehicle_type_desc" name = "vehicle_type_desc" rows="20" class="form-control no-resize auto-growth">
Compreline Insurance Sevices
1610, 3 Marikina-Infanta Hwy, Pasig, 1610 Metro Manila


Dear Valued Customer,
        


From your Compreline Family

Contact Details:
compreline@gmail.com
(02) 576-3781
09123456789
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <button type="button" class="btn bg-teal btn-block waves-effect left" onclick="">
                                        <span style="font-size: 15px;"> SAVE CHANGES</span>
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" id="rSet">
                        <div class="body">
                            <div class="card">
                                <div class="header bg-teal">
                                    <h2>
                                        Auto-reply Settings
                                        <label><small>NOTE: Upon updating some of the record's status, the system will automatically inform the client. In this module, you can edit the message that will be sent to the client. </small></label>
                                    </h2>
                                </div>
                                <div class="body">
                                    <form class="form">
                                        <div class="row clearfix"> 
                                            <div class="col-md-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label>When the manager rejected the quotation:</label>
                                                        <textarea id = "vehicle_type_desc" name = "vehicle_type_desc" rows="20" class="form-control no-resize auto-growth">
Compreline Insurance Sevices
1610, 3 Marikina-Infanta Hwy, Pasig, 1610 Metro Manila


Dear Valued Customer,
        


From your Compreline Family

Contact Details:
compreline@gmail.com
(02) 576-3781
09123456789
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
          document.getElementById('aSet').style.display = 'none';
          document.getElementById('rSet').style.display = 'none';
        };
</script>
   
@endsection
