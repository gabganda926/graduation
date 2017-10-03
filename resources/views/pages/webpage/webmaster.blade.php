 <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon-->
    <link href="{{ URL::asset('material-design-icons-3.0.1/iconfont/material-icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ URL::asset('images/favicon.ico') }}" type="image/x-icon">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ URL::asset('web/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />   
    <link href="{{ URL::asset('web/css/step-wizard.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('web/css/input-group.css') }}" rel='stylesheet' type='text/css' />
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('web/css/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('web/css/bootstrap-select.min.css') }}">

    <!-- jQuery (necessary JavaScript plugins) -->
    <script type='text/javascript' src="{{ URL::asset('web/js/jquery-1.11.1.min.js') }}"></script>
    <!-- Custom Theme files -->
    <link href="{{ URL::asset('web/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('web/css/mail.css') }}" rel='stylesheet' type='text/css' />

    <!-- Custom Theme files -->
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Furnyish Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <link href='http://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>

    <!-- start menu -->
    <link href="{{ URL::asset('web/css/megamenu.css') }}" rel="stylesheet" type="text/css" media="all" />

    <script type="text/javascript" src="{{ URL::asset('web/js/megamenu.js') }}"></script>
    <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
    <script src="{{ URL::asset('web/js/menu_jquery.js') }}"></script>
    <script src="{{ URL::asset('web/js/simpleCart.min.js') }}"> </script>
    <script src="{{ URL::asset('web/js/responsiveslides.min.js') }}"></script>
    
    <link href="{{ URL::asset('web/css/form.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--etalage-->
    <link rel="stylesheet" href="{{ URL::asset('css/etalage.css') }}">
    <script src="{{ URL::asset('js/jquery.etalage.min.js') }}"></script>

    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
          // Slideshow 1
          $("#slider1").responsiveSlides({
             auto: true,
             nav: true,
             speed: 500,
             namespace: "callbacks",
          });
        });
      </script>

      <style type="text/css">
          .modal { background: rgba(000, 000, 000, 0.8); min-height:1000000px; }

          body { padding-top: 16%; }

          .image-preview-input {
                position: relative;
                overflow: hidden;
                margin: 0px;    
                color: #333;
                background-color: #fff;
                border-color: #ccc;    
            }
            .image-preview-input input[type=file] {
                position: absolute;
                top: 0;
                right: 0;
                margin: 0;
                padding: 0;
                font-size: 20px;
                cursor: pointer;
                opacity: 0;
                filter: alpha(opacity=0);
            }
            .image-preview-input-title {
                margin-left:2px;
            }

            input[type=text], select, input[type=email], input[type=password], input[type=date], input[type=time], textarea, input[type=number] {
                padding: 7px 15px;
                margin: 5px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            input:focus { 
                outline: none !important;
                border-color: #719ECE;
                box-shadow: 0 0 10px #719ECE;
            }
            textarea:focus { 
                outline: none !important;
                border-color: #719ECE;
                box-shadow: 0 0 10px #719ECE;
            }
      </style>
      
    <!-- Sweet Alert Css -->
    <link href="{{ URL::asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- header -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="top_bg">
        <div class="container">
            <div class="header_top-sec">
                <div class="top_right">
                    <ul>
                        <li><a href="#">help</a></li>|
                        <li><a href="contact.html">Contact</a></li>|
                        
                    </ul>
                </div>
                <div class="top_left">
                    <ul>
                        <li class="top_link"><a id = 'client_name'>Welcome!, {{Session::get('username')}}</a></li>|                  
                    </ul>
                    <div class="social">
                        <ul>
                            <li class="@yield('inbox')"><a href="/user/notifications">NOTIFICATIONS <span class="label label-info">{{Session::get('notif')}}</span></a></li>| 
                            <li><a href="/user/logout">LOG OUT</a></li>                                     
                        </ul>
                    </div>
                </div>
                    <div class="clearfix"> </div>
            </div>
        </div>
    </div><br/>
         
    <!------>
    <div class="mega_nav">
         <div class="container">
             <div class="menu_sec">
             <!-- start header menu -->
             <ul class="megamenu skyblue">
                <li><a href="/home"><img src="{{ URL::asset('web/images/weblogo.png') }}" alt=""/></a></li>
                <li class="@yield('home')"><a class="color1" href="/user/home">Home</a></li>
                <li class="@yield('quote')"><a class="color2" href="/user/quotation">Quotation</a></li>
                <li class="@yield('payment')"><a class="color7" href="/user/payment">Payment</a></li>
                <li class="@yield('claims')"><a class="color3" href="/user/claims">Claims</a></li>               
                <li class="@yield('transmittal')"><a class="color4" href="/user/transmittal">Transmittal</a></li>
                <li class="@yield('complaint')"><a class="color5" href="/user/complaint">Complaint</a></li>
                </ul>
                 <div class="clearfix"></div>
             </div>
          </div>
    </div><br/>
</nav>

@yield('body')
<section>
<div class="footer-content">
     <div class="container">
         <div class="ftr-grids">
             <div class="col-md-3 ftr-grid">
                 <h4>About Us</h4>
                 <ul>
                     <li><a href="#">Who We Are</a></li>
                     <li><a href="contact.html">Contact Us</a></li>
                     <li><a href="#">Our Sites</a></li>
                     <li><a href="#">In The News</a></li>
                     <li><a href="#">Team</a></li>               
                 </ul>
             </div>
             <div class="col-md-3 ftr-grid">
                 <h4>Customer service</h4>
                 <ul>
                     <li><a href="#">FAQ</a></li>
                     <li><a href="#">Transmittal of Documents</a></li>
                     <li><a href="#">Cancellation</a></li>
                     <li><a href="#">Claims</a></li>
                     <li><a href="#">Quotation Guides</a></li>                  
                 </ul>
             </div>
             <div class="clearfix"></div>
         </div>
     </div>
</div>
<!---->
<div class="footer">
     <div class="container">
         <div class="store">
             <ul>
                 <li class="active">OUR OFFICE LOCATOR:</li>
                 <li><a href="#">Pasig, Metro Manila</a></li>
                 <li><a href="#">|</a></li>
                 <li><a href="#">San Mateo, Rizal</a></li>
             </ul>
         </div>      
         <div class="copywrite">
             <p>Copyright © 2016 Compreline Insurance All rights reserved |</p>
         </div>          
         </div>
     </div>
</div>
<!---->
</section>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <!-- Sweet Alert Plugin Js -->
    <script src="{{ URL::asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('js/notify.js') }}"></script>
    <script>
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
    </script>

    <script>
    $(function() {
    @if (Session::has('flash_notification.message'))
        swal({
            title: "{{ Session::get('flash_notification.title') }}",
            type: "{{ Session::get('flash_notification.level') }}",
            text: "{{ Session::get('flash_notification.message') }}",
            timer: 3000
        });
    @endif
    });
    </script>

    @yield('script')
</body>

</html>
