 <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CIMIS</title>
    <!-- Favicon-->
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-teal">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
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
    </div>
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
            <img src="../images/logo.png" width="48" height="48" alt="Compreline" style="float:left" />
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="cimis.php"><b>COMPRELINE | INSURANCE</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green" style="float:left;">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new accounts added</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan" style="float:left;">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 payments made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red" style="float:left;">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Egai Franco</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange" style="float:left;">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Gerald</b> changed user type name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey" style="float:left;">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Ma. Gabriella</b> added user type's<br/> description</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green" style="float:left;">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Lyndan</b> updated client's <br/>cheque voucher</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple" style="float:left;">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Footer display issue
                                                <small>32%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Make new queries
                                                <small>45%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Create new dashboard
                                                <small>54%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Solve transition issue
                                                <small>65%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Generate reports
                                                <small>92%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar animated">
            <!-- User Info -->
            <div class="user-info animated bounceInLeft active">
                <div class="image">
                    <img src="../images/user.png" width="48" height="48" alt="User" /> <!--USER IMAGE -->
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ma. Gabriella Rola</div>
                    <div class="text" style="color: white;">Administrator</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>My Account</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Switch Account</a></li>
                            <!-- <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li> -->
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu animated bounceInLeft active">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="#">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">build</i>
                            <span>Maintenance</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">question_answer</i>
                                    <span>INSURANCE QUOTATION</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../admin/maintenance/sender">
                                            <i class="material-icons">person</i>
                                            <span>Sender</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../admin/maintenance/vehicle/types">
                                            <i class="material-icons">directions_car</i>
                                            <span>Vehicle Type</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <i class="material-icons">view_comfy</i>
                                            <span>Insurance Items</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="../admin/maintenance/vehicle/model">Vehicle Model</a>
                                            </li>
                                            <li>
                                                <a href="../admin/maintenance/vehicle/manufacturer">Vehicle Make</a>
                                            </li>
                                            <li>
                                                <a href="../admin/maintenance/vehicle/accessories">Vehicle Accessories</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">credit_card</i>
                                    <span>BILLING AND PAYMENT</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../admin/maintenance/installment">
                                            <i class="material-icons">dns</i>
                                            <span>Installment Type</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../admin/maintenance/bank">
                                            <i class="material-icons">account_balance</i>
                                            <span>Bank</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">view_agenda</i>
                                    <span>COMPLAINTS AND TRANSMITTAL</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../admin/maintenance/complaint/type">
                                            <i class="material-icons">subject</i>
                                            <span>Complaint Type</span></a>
                                    </li>

                                    <li>
                                        <a href="../admin/maintenance/courier">
                                            <i class="material-icons">person_outline</i>
                                            <span>Courier</span></a>
                                    </li>

                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">beenhere</i>
                                    <span>STATUS MAINTENANCE</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../admin/maintenance/category/status">
                                            <i class="material-icons">radio_button_unchecked</i>
                                            <span>Status Category</span></a>
                                    </li>
                                    
                                    <li>
                                        <a href="../admin/maintenance/status">
                                            <i class="material-icons">radio_button_unchecked</i>
                                            <span>Status</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="../admin/maintenance/policyno">
                                    <i class="material-icons">confirmation_number</i>
                                    <span>Policy Number</span></a>
                            </li>

                            <li>
                                <a href="../admin/maintenance/insurance/company.php">
                                    <i class="material-icons">business</i>
                                    <span>Insurance Company</span></a>
                            </li>
                            <li>
                                <a href="../admin/maintenance/client/type">
                                    <i class="material-icons">people_outline</i>
                                    <span>Client Type</span>
                                </a>
                            </li>
                            <li>
                                <a href="../admin/maintenance/salesagent">
                                    <i class="material-icons">perm_identity</i>
                                    <span>Sales Agent</span>
                                </a>
                            </li>
                            <li>
                                <a href="../admin/maintenance/employee">
                                    <i class="material-icons">supervisor_account</i>
                                    <span>Employee</span>
                                </a>
                            </li>
                            <li>
                                <a href="../admin/maintenance/employee/type">
                                    <i class="material-icons">person_outline</i>
                                    <span>Employee Type</span>
                                </a>
                            </li>
                        </ul>
                        <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">work</i>
                            <span>Transactions</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/transactions/admin/insurance.php">
                                    <i class="material-icons">account_balance_wallet</i>
                                    <span>Insurance Accounts</span>
                                </a>
                            </li>                    
                            <li>
                                <a href="pages/transactions/admin/claims.php">
                                    <i class="material-icons">queue</i>
                                    <span>Claims</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/transactions/admin/tally.php">
                                    <i class="material-icons">multiline_chart</i>
                                    <span>Tally</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/transactions/admin/transmittal.php">
                                    <i class="material-icons">folder_shared</i>
                                    <span>Transmittal</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/transactions/admin/complaint.php">
                                    <i class="material-icons">error_outline</i>
                                    <span>Complaint</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                        <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">library_books</i>
                            <span>Archives</span>
                        </a>
                        <ul class="ml-menu">                    
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">question_answer</i>
                                    <span>QUOTATION</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/archives/sender.php">
                                            <i class="material-icons">person</i>
                                            <span>Sender</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages/archives/vehicle type.php">
                                            <i class="material-icons">directions_car</i>
                                            <span>Vehicle Type</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <i class="material-icons">view_comfy</i>
                                            <span>Insurance Items</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="pages/archives/vehicle model.php">Vehicle Model</a>
                                            </li>
                                            <li>
                                                <a href="pages/archives/vehicle make.php">Vehicle Make</a>
                                            </li>
                                            <li>
                                                <a href="pages/archives/vehicle accessories.php">Vehicle Accessories</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">credit_card</i>
                                    <span>BILLING</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/archives/clientType.php">
                                            <i class="material-icons">people_outline</i>
                                            <span>Client Type</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages/archives/installment.php">
                                            <i class="material-icons">dns</i>
                                            <span>Installment Type</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages/archives/bank.php">
                                            <i class="material-icons">account_balance</i>
                                            <span>Bank</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">view_agenda</i>
                                    <span>COMPLAINTS AND TRANSMITTAL</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/archives/complaintType.php">
                                            <i class="material-icons">subject</i>
                                            <span>Complaint Type</span></a>
                                    </li>
                                    
                                    <li>
                                        <a href="pages/archives/courier.php">
                                            <i class="material-icons">person_outline</i>
                                            <span>Courier</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">beenhere</i>
                                    <span>STATUS MAINTENANCE</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/archives/categoryStatus.php">
                                            <i class="material-icons">radio_button_unchecked</i>
                                            <span>Status Category</span></a>
                                    </li>
                                    
                                    <li>
                                        <a href="pages/archives/courier.php">
                                            <i class="material-icons">radio_button_unchecked</i>
                                            <span>Status</span></a>
                                    </li>
                                </ul>
                            </li>
                            
                            
                            <li>
                                <a href="pages/archives/policy numbers.php">
                                    <i class="material-icons">confirmation_number</i>
                                    <span>Policy Number</span></a>
                            </li>
                            <li>
                                <a href="pages/archives/insurance company.php">
                                    <i class="material-icons">business</i>
                                    <span>Insurance Company</span></a>
                            </li>
                            <li>
                                <a href="pages/archives/salesAgent.php">
                                    <i class="material-icons">perm_identity</i>
                                    <span>Sales Agent</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/archives/employee.php">
                                    <i class="material-icons">supervisor_account</i>
                                    <span>Employee</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/archives/employeeType.php">
                                    <i class="material-icons">person_outline</i>
                                    <span>Employee Type</span>
                                </a>
                            </li>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 <a href="javascript:void(0);">CIMIS</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.4
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect animated bounceInDown active">
                        <div class="icon">
                            <i class="material-icons col-red">work</i>
                        </div>
                        <div class="content">
                            <div class="text">PENDING QUOTATIONS</div>
                            <div class="number count-to" data-from="0" data-to="36" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect animated bounceInDown">
                        <div class="icon">
                            <i class="material-icons col-red">trending_down</i>
                        </div>
                        <div class="content">
                            <div class="text">BOUNCED CHEQUES</div>
                            <div class="number count-to" data-from="0" data-to="15" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect animated bounceInDown">
                        <div class="icon">
                            <i class="material-icons col-red">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">ACTIVE ACCOUNTS</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card animated bounceInUp">
                        <div class="header">
                            <h2>TRANSMITTAL INFO</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th>Status</th>
                                            <th>Care of</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Send Documents</td>
                                            <td><span class="label bg-green">Doing</span></td>
                                            <td>Ma. Gabriella Rola</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Compile Documents</td>
                                            <td><span class="label bg-blue">To Do</span></td>
                                            <td>Gerald Bukid</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Collect Documents</td>
                                            <td><span class="label bg-light-blue">On Hold</span></td>
                                            <td>Marynel Avellaneda</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Access Client's Account</td>
                                            <td><span class="label bg-orange">Waiting Approval</span></td>
                                            <td>Roy Christian Pery</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Send Documents</td>
                                            <td>
                                                <span class="label bg-red">Suspended</span>
                                            </td>
                                            <td>Lyndan Pol Dela Cruz</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-red" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Send Documents</td>
                                            <td>
                                                <span class="label bg-red">Suspended</span>
                                            </td>
                                            <td>Egai Franco</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-red" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->

                <!-- EXPIRING ACCOUNTS -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card animated bounceInUp">
                        <div class="body bg-white">
                            <div class="font-bold m-b--35">EXPIRING ACCOUNTS</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                <small>01/23/2017</small><br/>
                                    <b>MCAR No. 052440</b>
                                    <span class="pull-right">2 days left</span>
                                </li>
                                <li>
                                <small>01/26/2017</small><br/>
                                    <b>PC1334408</b>
                                    <span class="pull-right">5 days left </span>
                                </li>
                                <li>
                                <small>01/26/2017</small><br/>
                                    <b>QC-PMM-100205456</b>
                                    <span class="pull-right">5 days left </span>
                                </li>
                                <li>
                                <small>01/26/2017</small><br/>
                                    <b>AIS-CV-2016-00003158</b>
                                    <span class="pull-right">5 days left </span>
                                </li>
                                <li>
                                <small>01/28/2017</small><br/>
                                    <b>QC-PMM-001935287</b>
                                    <span class="pull-right">7 days left </span>
                                </li>
                                <li>
                                <small>01/29/2017</small><br/>
                                    <b>PC7228396</b>
                                    <span class="pull-right">8 days left </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# EXPIRING ACCOUNTS -->
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="../plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="../plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="../plugins/flot-charts/jquery.flot.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="../plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>
