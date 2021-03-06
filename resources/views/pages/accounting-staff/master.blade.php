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

    <title>@yield('title')</title>
    <!--<link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">-->
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    <!-- Favicon-->
    <link rel="icon" href="{{ URL::asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('material-design-icons-3.0.1/iconfont/material-icons.css') }}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ URL::asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="{{ URL::asset('plugins/multi-select/css/multi-select.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ URL::asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ URL::asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />

     <!-- Dropzone Css -->
    <link href="{{ URL::asset('plugins/dropzone/dropzone.css') }}" rel="stylesheet">

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ URL::asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />

    <!-- Bootstrap Spinner Css 
    <link href="../../plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet"> -->

    <!-- Wait Me Css -->
    <link href="{{ URL::asset('plugins/waitme/waitMe.css') }}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{ URL::asset('plugins/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="{{ URL::asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{ URL::asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/modal.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/modal-list.css') }}" rel="stylesheet">


    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ URL::asset('css/themes/all-themes.css') }}" rel="stylesheet" />
</head>

<body class="theme-teal">
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-teal">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>-->
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
            <img src="{{ URL::asset('images/logo.png') }}" width="48" height="48" alt="Compreline" style="float:left" />
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="/accounting-staff/dashboard"><b>COMPRELINE | INSURANCE</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info" style="text-align: center;">
                <div class="image">
                    <img id="userimg" src="/image/employee/{{ Session::get('pic')}}" width="150" height="150" alt="User" />
                </div>
                <div class="info-container">
                    <script>
                        var comp = "{{ Session::get('pic')}}";
                        if(comp == "")
                        {
                            var src = "{{ URL::asset ('images/user.png') }}";
                            $('#userimg').attr('src',src);
                        }
                    </script>
                    <div class="text" style="color: white;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Session::get('fname')}} {{Session::get('mname')}} {{Session::get('lname')}}</div>
                    <div class="text" style="color: white;">Accounting Staff</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>My Account</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="/user/logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu animated bounceInLeft active">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class = "@yield('dashboard')">
                        <a href="/accounting-staff/dashboard">
                            <i class="material-icons">home</i>
                            <span>DASHBOARD</span>
                        </a>
                    </li>
                    
                    <li class = "@yield('transQuote')">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">group_work</i>
                            <span>QUOTATION</span>
                        </a>
                        <ul class="ml-menu">
                            <li class = "@yield('transQuoteWalkin')">
                                <a href="/accounting-staff/transaction/quotation-walkin">
                                    <span>Quotation - Walk in</span>
                                </a>
                            </li>
                            <li class = "@yield('transQuoteList')">
                                <a href="/accounting-staff/transaction/quotation-list">
                                    <span>List of Quotation</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class = "@yield('transIns')">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_balance_wallet</i>
                            <span>INSURANCE ACCOUNTS</span>
                        </a>
                        <ul class="ml-menu">
                            <!-- <li class = "@yield('transNew')">
                                <a href="/accounting-staff/transaction/insure-client">
                                    <span>Insure Client</span>
                                </a>
                            </li> -->
                            <li class = "@yield('transInsInd')">
                                <a href="/accounting-staff/transaction/insurance-individual">
                                    <span>Insurance Accounts - Individual</span>
                                </a>
                            </li>
                            <li class = "@yield('transInsComp')">
                                <a href="/accounting-staff/transaction/insurance-company">
                                    <span>Insurance Accounts - Company</span>
                                </a>
                            </li>
                            <li class = "@yield('clientindividual')">
                                <a href="/accounting-staff/transaction/client/individual">
                                    <span>Clients - Individual</span>
                                </a>
                            </li>
                            <li class = "@yield('clientcompany')">
                                <a href="/accounting-staff/transaction/client/company">
                                    <span>Clients - Company</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class = "@yield('transLedger')">
                        <a href="/accounting-staff/transaction/ledger">
                            <i class="material-icons">library_books</i>
                            <span>LEDGER</span>
                        </a>
                    </li>

                    <li class = "@yield('transPayment')">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">credit_card</i>
                            <span>PAYMENT</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="@yield('transOnlinePayment')">
                                <a href="/accounting-staff/transaction/payment-online">
                                    <span>Online Payment Requests</span>
                                </a>
                            </li>
                            <li class="@yield('transNewPayment')">
                                <a href="/accounting-staff/transaction/payment-new">
                                    <span>New Payment</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class = "@yield('transList')">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>LISTS</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="@yield('transPaymentList')">
                                <a href="/accounting-staff/transaction/payment">
                                    <span>List of Bills</span>
                                </a>
                            </li>
                            <li class="@yield('transListPay')">
                                <a href="/accounting-staff/transaction/payment-list">
                                    <span>List of Collection of Payments</span>
                                </a>
                            </li>
                            <li class="@yield('transPR')">
                                <a href="/accounting-staff/transaction/list-policy-receipt">
                                    <span>List of Policy Receipts</span>
                                </a>
                            </li>
                            <li class="@yield('transCV')">
                                <a href="/accounting-staff/transaction/list-check-voucher">
                                    <span>List of Check Vouchers</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->

            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 <a href="javascript:void(0);">i-Insure</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.4
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <script>
        window.onload = function(){
            var comp = "{{ Session::get('pic')}}";
            if(comp == "")
            {
                var src = "{{ URL::asset ('images/user.png') }}";
                $('#userimg').attr('src',src);
            }
        }
    </script>

    <!-- Jquery Core Js -->
    <script src="{{ URL::asset('plugins/jquery/jquery.min.js') }}"></script>       
    
    <!-- Bootstrap Core Js -->
    <script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="{{ URL::asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>

    <!-- Dropzone Plugin Js -->
    <script src="{{ URL::asset('plugins/dropzone/dropzone.js') }}"></script>

    <!-- Input Mask Plugin Js -->
    <script src="{{ URL::asset('plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>

    <!-- Multi Select Plugin Js -->
    <script src="{{ URL::asset('plugins/multi-select/js/jquery.multi-select.js') }}"></script>

    <!-- noUISlider Plugin Js -->
    <script src="{{ URL::asset('plugins/nouislider/nouislider.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ URL::asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="{{ URL::asset('plugins/jquery-validation/jquery.validate.js') }}"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="{{ URL::asset('plugins/jquery-steps/jquery.steps.js') }}"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="{{ URL::asset('plugins/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ URL::asset('plugins/node-waves/waves.js') }}"></script>

    <!-- Autosize Plugin Js -->
    <script src="{{ URL::asset('plugins/autosize/autosize.js') }}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ URL::asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ URL::asset('js/admin.js') }}"></script>
    <script src="{{ URL::asset('js/pages/ui/notifications.js') }}"></script>
    <script src="{{ URL::asset('js/pages/forms/form-wizard.js') }}"></script>
    <script src="{{ URL::asset('js/pages/ui/tooltips-popovers.js') }}"></script>
    <script src="{{ URL::asset('js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ URL::asset('js/pages/forms/form-validation.js') }}"></script>
    <script src="{{ URL::asset('js/pages/ui/dialogs.js') }}"></script>

    <!-- Notify Plugin Js -->
    <script src="{{ URL::asset('js/notify.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ URL::asset('js/demo.js') }}"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="{{ URL::asset('plugins/jquery-steps/jquery.steps.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ URL::asset('plugins/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
    <script src="{{ URL::asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <!-- Jquery Spinner Plugin Js 
    <script src="../../plugins/jquery-spinner/js/jquery.spinner.js"></script>-->

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
    $(document).ready(function(){
        $('.selectpicker').selectpicker(); 
    });
    </script>

    @yield('body')

    @yield('script')

    @include('sweet::alert')
</body>

</html>
