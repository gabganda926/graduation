<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Maintenance - Bank | CIMIS</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="../../plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/modal.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
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
            <img src="../../images/logo.png" width="48" height="48" alt="Compreline" style="float:left" />
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
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../../images/user.png" width="48" height="48" alt="User" />
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
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="/admin/dashboard">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="header">MAINTENANCE</li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">question_answer</i>
                            <span>Quoting Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/admin/maintenance/quote/status"><span>Quote Status</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">nature_people</i>
                            <span>Client Management</span>
                        </a>
                        <ul class="ml-menu">
                             <li>
                                <a href="/admin/maintenance/client/type"><span>Client Type</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Vehicle</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="/admin/maintenance/vehicle/types">Vehicle Type</a>
                                    </li>
                                    <li>
                                        <a href="/admin/maintenance/vehicle/model">Vehicle Model</a>
                                    </li>
                                    <li>
                                        <a href="/admin/maintenance/vehicle/accessories">Vehicle Accessories</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_balance</i>
                            <span>Accounts Management/Check</span>
                        </a>
                        <ul class="ml-menu">
                                <li>
                                    <a href="/admin/maintenance/debt/status"><span>Debt Status</span></a>
                                </li>
                                <li>
                                    <a href="/admin/maintenance/check/status">
                                    <span>Check Status</span></a>
                                </li>
                                <li class="active">
                                    <a href="#">
                                    <span>Mortgagee/Bank</span></a>
                                </li>
                                <li>
                                    <a href="/admin/maintenace/payment/type"><span>Payment Type</span></a>
                                </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">library_books</i>
                            <span>Insurance Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/admin/maintenance/policyno"><span>Policy Number</span></a>
                            </li>
                            <li>
                                <a href="/admin/maintenance/insurance/company"><span>Insurance Company</span></a>
                            </li>
                            <li>
                                <a href="/admin/maintenance/installment">
                                <span>Installment type</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/maintenance/insurance/status"><span>Insurance Status</span></a>
                            </li>
                            <li>
                                <a href="/admin/maintenance/policyno/status"><span>Policy Number Status</span></a>
                            </li>
                            <li>
                                <a href="/admin/maintenance/transmittal/status"><span>Transmittal Status</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">recent_actors</i>
                            <span>Claims Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/admin/maintenance/claim/status"><span>Claim Status</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">work</i>
                            <span>Grievance Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/admin/maintenance/complaint/mode"><span>Complaint Mode</span></a>
                            </li>
                            <li>
                                <a href="/admin/maintenance/complaint/status"><span>Complaint Status</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">supervisor_account</i>
                            <span>Personnel Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/admin/maintenance/company/email"><span>Compreline's Email Address</span></a>
                            </li>
                            <li>
                                <a href="/admin/maintenance/employee">
                                <span>Employee</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>End Users</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="/admin/maintenance/user/account">User Accounts</a>
                                    </li>
                                    <li>
                                        <a href="/admin/maintenance/user/type">User Types</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="header">TRANSACTIONS</li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Underwrite</span>
                        </a>
                                                <ul class="ml-menu">
                            <li>
                                <a href="../../pages/transaction/insure-client.php">Insure Client</a>
                            </li>
                            <li>
                                <a href="../../pages/transaction/renew-client.php">Renew Client</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">payment</i>
                            <span>Payment</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../pages/transaction/breakdown.php">Create Breakdown</a>
                            </li>
                            <li>
                                <a href="../../pages/transaction/installment.php">Installment</a>
                            </li>
                            <li>
                                <a href="../../pages/transaction/tally.php">Tally</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">track_changes</i>
                            <span>Tracking</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../pages/transaction/transmit.php">Transmit documents</a>
                            </li>
                            <li>
                                <a href="../../pages/transaction/claims.php">Claims</a>
                            </li>
                        </ul>
                    </li>

                    <li class="header">QUERIES</li>

                    <li>
                        <a href="../../pages/queries/sales-agent.php">
                            <i class="material-icons">perm_identity</i>
                            <span>Sales Agent</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../pages/queries/insurance-accounts.php">
                            <i class="material-icons">account_box</i>
                            <span>Insurance Accounts</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../pages/queries/new-accounts.php">New Accounts</a>
                            </li>
                            <li>
                                <a href="../../pages/queries/active-accounts.php">Active Accounts</a>
                            </li>
                            <li>
                                <a href="../../pages/queries/renewed-accounts.php">Renewed Accounts</a>
                            </li>
                            <li>
                                <a href="../../pages/queries/expiring-accounts.php">Expiring Accounts</a>
                            </li>
                            <li>
                                <a href="../../pages/queries/expired-accounts.php">Expired Accounts</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">history</i>
                            <span>History</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../pages/queries/payments.php">Payments</a>
                            </li>
                            <li>
                                <a href="../../pages/queries/claims.php">Claims</a>
                            </li>
                            <li>
                                <a href="../../pages/queries/cheque.php">Updating of Cheque</a>
                            </li>
                            <li>
                                <a href="../../pages/queries/accounts.php">Accounts</a> <!-- Naka sort by new, renewed, expired, saka expiring -->
                            </li>
                        </ul>
                    </li>

                    <li class="header">REPORTS</li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">group</i>
                            <span>Client Report</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../pages/reports/new-clients.php">New Clients</a>
                            </li>
                            <li>
                                <a href="../../pages/reports/renewed-clients.php">Renewed Clients</a>
                            </li>
                            <li>
                                <a href="../../pages/reports/inactive-clients.php">Inactive Clients</a>
                            </li>
                            <li>
                                <a href="../../pages/reports/expiring-clients.php">Client's Expiring Accounts</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="../../pages/reports/sales-agent.php">
                            <i class="material-icons">perm_identity</i>
                            <span>Sales Agent Report</span>
                        </a>
                    </li>

                    <li>
                        <a href="../../pages/reports/insurance-company.php">
                            <i class="material-icons">compare_arrows</i>
                            <span>Insurance Company Report</span>
                        </a>
                    </li>

                    <li>
                        <a href="../../pages/reports/claims.php">
                            <i class="material-icons">donut_small</i>
                            <span>Claims Report</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assessment</i>
                            <span>Sales Report</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../pages/reports/company-sales.php">Insurance Company's Sales</a>
                            </li>
                            <li>
                                <a href="../../pages/reports/compreline-sales.php">Compreline's Sales</a>
                            </li>
                        </ul>
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
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
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

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                BANK
                            </b></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <li>
                                <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#addBankModal">
                                    <i class="material-icons">business_center</i>
                                    <span>Add Bank</span>
                                </button>
                                </li>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                          <table class="table table-bordered table-striped table-hover dataTable js-basic-example animated lightSpeedIn active">
                                <thead>
                                    <tr class="bg-blue-grey">
                                        <th class="col-md-1">#</th>
                                        <th>Bank Name</th>
                                        <th>Branch</th>
                                        <th class="col-md-1">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                  <?php
                                      $index = 1;
                                  ?>
                                  @foreach($bank as $bnk)
                                    @if($bnk->del_flag == 0)
                                      @foreach($add as $address)
                                        @if($address->add_ID == $bnk->bank_add_ID)
                                          @foreach($cpr as $cper)
                                            @if($cper->cPerson_ID == $bnk->bank_cperson_ID)
                                            <tr>
                                                <td><?php
                                                  echo $index;
                                                  $index++;
                                                  ?>
                                                </td>
                                                <td>{{ $bnk->bank_name }}</td>
                                                <td>{{ $bnk->bank_code .' '. $address->add_city .' '. 'Branch' }}</td>
                                                <td>
                                                <button type="button" class="btn bg-light-blue waves-effect" data-toggle="modal" data-target="#largeModal"
                                                data-id='{{ $bnk->bank_ID }}'
                                                data-bnkname='{{ $bnk->bank_name }}'
                                                data-bnkcode='{{ $bnk->bank_code }}'
                                                data-add='{{ $bnk->bank_add_ID }}'
                                                data-cpr='{{ $bnk->bank_cperson_ID }}'

                                                data-lnumb='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_blcknum }}
                                                  @endif
                                                @endforeach'
                                                data-strt='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_street }}
                                                  @endif
                                                @endforeach'
                                                data-sdiv='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_subdivision }}
                                                  @endif
                                                @endforeach'
                                                data-brg='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_brngy }}
                                                  @endif
                                                @endforeach'
                                                data-distr='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_district }}
                                                  @endif
                                                @endforeach'
                                                data-city='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_city }}
                                                  @endif
                                                @endforeach'
                                                data-prov='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_province }}
                                                  @endif
                                                @endforeach'
                                                data-regn='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_region }}
                                                  @endif
                                                @endforeach'
                                                data-zip='
                                                @foreach($add as $addata)
                                                  @if($addata->add_ID == $bnk->bank_add_ID)
                                                  {{ $addata->add_zipcode }}
                                                  @endif
                                                @endforeach'

                                                data-cfname='
                                                @foreach($cpr as $cperson)
                                                  @if($cperson->cPerson_ID == $bnk->bank_cperson_ID)
                                                  {{ $cperson->cPerson_first_name }}
                                                  @endif
                                                @endforeach'
                                                data-cmname='
                                                @foreach($cpr as $cperson)
                                                  @if($cperson->cPerson_ID == $bnk->bank_cperson_ID)
                                                  {{ $cperson->cPerson_middle_name }}
                                                  @endif
                                                @endforeach'
                                                data-clname='
                                                @foreach($cpr as $cperson)
                                                  @if($cperson->cPerson_ID == $bnk->bank_cperson_ID)
                                                  {{ $cperson->cPerson_last_name }}
                                                  @endif
                                                @endforeach'
                                                data-ccont='
                                                @foreach($cpr as $cperson)
                                                  @if($cperson->cPerson_ID == $bnk->bank_cperson_ID)
                                                  {{ $cperson->cPerson_contact }}
                                                  @endif
                                                @endforeach'
                                                data-cmail='
                                                @foreach($cpr as $cperson)
                                                  @if($cperson->cPerson_ID == $bnk->bank_cperson_ID)
                                                  {{ $cperson->cPerson_mail }}
                                                  @endif
                                                @endforeach'


                                                onclick = "
                                                var lnum = $(this).data('lnumb').replace(/^\s+|\s+$/g, '');
                                                var strt = $(this).data('strt').replace(/^\s+|\s+$/g, '');
                                                var divi = $(this).data('sdiv').replace(/^\s+|\s+$/g, '');
                                                var brng = $(this).data('brg').replace(/^\s+|\s+$/g, '');
                                                var dist = $(this).data('distr').replace(/^\s+|\s+$/g, '');
                                                var city = $(this).data('city').replace(/^\s+|\s+$/g, '');
                                                var prov = $(this).data('prov').replace(/^\s+|\s+$/g, '');
                                                var regn = $(this).data('regn').replace(/^\s+|\s+$/g, '');
                                                var zipc = $(this).data('zip').replace(/^\s+|\s+$/g, '');

                                                var cfname = $(this).data('cfname').replace(/^\s+|\s+$/g, '');
                                                var cmname = $(this).data('cmname').replace(/^\s+|\s+$/g, '');
                                                var clname = $(this).data('clname').replace(/^\s+|\s+$/g, '');
                                                var cmail = $(this).data('cmail').replace(/^\s+|\s+$/g, '');
                                                var ccont = $(this).data('ccont').replace(/^\s+|\s+$/g, '');

                                                document.getElementById('abnkid').value = $(this).data('id');
                                                document.getElementById('abank_name').value = $(this).data('bnkname');
                                                document.getElementById('abank_code').value = $(this).data('bnkcode');

                                                document.getElementById('cpersonID').value = $(this).data('cpr');
                                                document.getElementById('acPerson_first_name').value = cfname;
                                                document.getElementById('acPerson_middle_name').value = cmname;
                                                document.getElementById('acPerson_last_name').value = clname;
                                                document.getElementById('acPerson_email').value = cmail;
                                                document.getElementById('acPerson_contact').value = ccont;

                                                document.getElementById('aaddid').value = $(this).data('add');
                                                document.getElementById('aadd_blcknum').value = lnum;
                                                document.getElementById('aadd_street').value = strt;
                                                document.getElementById('aadd_subdivision').value = divi;
                                                document.getElementById('aadd_brngy').value = brng;
                                                document.getElementById('aadd_district').value = dist;
                                                document.getElementById('aadd_city').value = city;
                                                document.getElementById('aadd_province').value = prov;
                                                document.getElementById('aadd_region').value = regn;
                                                document.getElementById('aadd_zipcode').value = zipc;
                                                ">
                                                    <i class="material-icons">remove_red_eye</i>
                                                    <span>View</span>
                                                </button>
                                                </td>
                                            </tr>
                                            @endif
                                          @endforeach
                                        @endif
                                      @endforeach
                                    @endif
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

            <!--VIEW Bank Modal-->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInRight active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-view">
                            <h4><br/>Bank Details
                            </h4>
                        </div><br/>
                        <button id = "Edit" style = "margin-left: 55em" type="button" class="btn btn-success btn-lg waves-effect"
                        onclick = "
                        document.getElementById('bank_view').action = 'bank/update';
                        $('#Edit').prop('disabled', true);
                        $('#Delete').prop('disabled', false);
                        $('#schange').prop('disabled', false);
                        $('#aadd_blcknum').prop('disabled', false);
                        $('#aadd_street').prop('disabled', false);
                        $('#aadd_subdivision').prop('disabled', false);
                        $('#aadd_brngy').prop('disabled', false);
                        $('#aadd_district').prop('disabled', false);
                        $('#aadd_city').prop('disabled', false);
                        $('#aadd_province').prop('disabled', false);
                        $('#aadd_region').prop('disabled', false);
                        $('#aadd_zipcode').prop('disabled', false);
                        $('#acPerson_first_name').prop('disabled', false);
                        $('#acPerson_middle_name').prop('disabled', false);
                        $('#acPerson_last_name').prop('disabled', false);
                        $('#acPerson_email').prop('disabled', false);
                        $('#acPerson_contact').prop('disabled', false);
                        $('#abank_name').prop('disabled', false);
                        $('#abank_code').prop('disabled', false);
                        document.getElementById('schange').value = 'update';
                        ">
                        <i class="material-icons">create</i>
                        <span>Edit</span>
                        </button>
                        <button id = "Delete" type="button" class="btn bg-red btn-lg waves-effect"
                        onclick = "
                        document.getElementById('bank_view').action = 'bank/delete';
                        $('#Edit').prop('disabled', false);
                        $('#Delete').prop('disabled', true);
                        $('#schange').prop('disabled', false);
                        $('#aadd_blcknum').prop('disabled', false);
                        $('#aadd_street').prop('disabled', false);
                        $('#aadd_subdivision').prop('disabled', false);
                        $('#aadd_brngy').prop('disabled', false);
                        $('#aadd_district').prop('disabled', false);
                        $('#aadd_city').prop('disabled', false);
                        $('#aadd_province').prop('disabled', false);
                        $('#aadd_region').prop('disabled', false);
                        $('#aadd_zipcode').prop('disabled', false);
                        $('#acPerson_first_name').prop('disabled', false);
                        $('#acPerson_middle_name').prop('disabled', false);
                        $('#acPerson_last_name').prop('disabled', false);
                        $('#acPerson_email').prop('disabled', false);
                        $('#acPerson_contact').prop('disabled', false);
                        $('#abank_name').prop('disabled', false);
                        $('#abank_code').prop('disabled', false);
                        document.getElementById('schange').value = 'delete';
                        ">
                            <i class="material-icons">delete_sweep</i>
                            <span>Delete</span>
                        </button>  <br/>
                        <div class="modal-body">
                            <form id="bank_view" action = "" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <h3> <small><b>Basic Information</b></small></h3><br/>
                                <div class="row clearfix">
                                    <div class="col-md-4" style = "display: none;">
                                        <input id = "abnkid" name = "abnkid" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Bank Name :</small></label>
                                                <input id = "abank_name" name = "abank_name" type="text" class="form-control" pattern="[A-Za-z'-]" disabled="disable" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-8">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Bank Code :</small></label>
                                                <input id = "abank_code" name = "abank_code" type="text" class="form-control" disabled="disable" pattern="[A-Za-z'-]" required>
                                            </div>
                                          <div class="help-info">Ex.: BPI MARIKINA BR</div>
                                        </div>
                                    </div>
                                </div>
                                <h3> <small><b>Contact Person</b></small></h3><br/>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                      <div class="col-md-4" style = "display: none;">
                                          <input id = "cpersonID" name = "cpersonID" type="text" class="form-control">
                                      </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>First Name :</small></label>
                                                <input id = "acPerson_first_name" name = "acPerson_first_name" type="text" class="form-control" disabled="disable" pattern="[A-Za-z'-]" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                             <label><small>Middle Name :</small></label>
                                                <input id = "acPerson_middle_name" name = "acPerson_middle_name" type="text" class="form-control" disabled="disable" pattern="[A-Za-z'-]" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                             <label><small>Last Name :</small></label>
                                                <input id = "acPerson_last_name" name = "acPerson_last_name" type="text" class="form-control" disabled="disable" pattern="[A-Za-z'-]" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Contact Number :</small></label>
                                                <input id = "acPerson_contact" name = "acPerson_contact" type="text" class="form-control"  disabled="disable" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>E-mail :</small></label>
                                                <input id = "acPerson_email" name = "acPerson_email" type="email" class="form-control"  disabled="disable" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br/><br/>
                                <h3> <small><b>Bank Address</b></small></h3>
                                <br/>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Blk&Lot/Bldg/Unit :</small></label>
                                                <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" pattern="[A-Za-z'-]"  disabled="disable" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Street :</small></label>
                                                <input id = "aadd_street" name = "aadd_street" type="text" class="form-control" disabled="disable" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Subdivision :</small></label>
                                                <input id = "aadd_subdivision" name = "aadd_subdivision" type="text" class="form-control" disabled="disable" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Barangay :</small></label>
                                                <input id = "aadd_brngy" name = "aadd_brngy" type="text" class="form-control" pattern="[A-Za-z'-]"  disabled="disable" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>District :</small></label>
                                                <input id = "aadd_district" name = "aadd_district" type="text" class="form-control" disabled="disable"  required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>City/Municipality :</small></label>
                                                <input id = "aadd_city" name = "aadd_city" type="text" class="form-control" disabled="disable"  required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Province :</small></label>
                                                <input id = "aadd_province" name = "aadd_province" type="text" class="form-control" disabled="disable"  required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Region :</small></label>
                                                <input id = "aadd_region" name = "aadd_region" type="text" class="form-control" disabled="disable"  required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Zip Code :</small></label>
                                                <input id = "aadd_zipcode" name = "aadd_zipcode" type="text" class="form-control" disabled="disable" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style = "display: none;">
                                    <input id = "aaddid" name = "aaddid" type="text" class="form-control">
                                </div>
                              <br/><br/><br/>
                            </form>
                        </div>
                        <div class="modal-footer js-sweetalert">
                          <button id = "schange" value = "" class="btn btn-primary waves-effect" data-type="cancel" disabled="disable" onclick = "
                          if(document.getElementById('schange').value == 'update')
                          {
                            var r = confirm('Continue to Edit?');
                            if(r == true)
                            {
                              document.getElementById('bank_view').action = 'bank/update';
                              document.getElementById('bank_view').submit();
                            }
                          }
                          if(document.getElementById('schange').value == 'delete')
                          {
                            var r = confirm('Delete this record?');
                            if(r == true)
                            {
                              document.getElementById('bank_view').action = 'bank/delete';
                              document.getElementById('bank_view').submit();
                            }
                          }
                          ">SAVE CHANGES</button>
                          <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# VIEW Bank MOdal -->

            <!-- ADD BANK MODAL -->
            <div class="modal fade" id="addBankModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInLeft active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-add">
                            <h4><br/>Add Bank</h4>
                        </div> <br/>
                        <div class="modal-body">
                            <form id="bank_add" action = "bank/submit" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <h3> <small><b>Basic Information</b></small></h3><br/>
                                <div class="row clearfix">
                                    <div class="col-md-4" style = "display: none;">
                                        <input id = "bnkid" name = "bnkid" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">

                                                <input id = "bank_name" name = "bank_name" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                                <label class="form-label">Bank Name</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-8">
                                        <div class="form-group form-float">
                                            <div class="form-line">

                                                <input id = "bank_code" name = "bank_code" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                                <label class="form-label">Bank Code</label>
                                            </div>
                                          <div class="help-info">Ex.: BPI MARIKINA BR</div>
                                        </div>
                                    </div>
                                </div>
                                <h3> <small><b>Contact Person</b></small></h3><br/>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">First Name</label>
                                                <input id = "cPerson_first_name" name = "cPerson_first_name" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                             <label class="form-label">Middle Name</label>
                                                <input id = "cPerson_middle_name" name = "cPerson_middle_name" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                             <label class="form-label">Last Name</label>
                                                <input id = "cPerson_last_name" name = "cPerson_last_name" type="text" class="form-control" pattern="[A-Za-z'-]" required>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">Contact Number</label>
                                                <input id = "cPerson_contact" name = "cPerson_contact" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">E-mail</label>
                                                <input id = "cPerson_email" name = "cPerson_email" type="email" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br/><br/>
                                <h3> <small><b>Bank Address</b></small></h3>
                                <br/>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">Blk&Lot/Bldg/Unit</label>
                                                <input id = "add_blcknum" name = "add_blcknum" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">Street</label>
                                                <input id = "add_street" name = "add_street" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">Subdivision</label>
                                                <input id = "add_subdivision" name = "add_subdivision" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">Barangay</label>
                                                <input id = "add_brngy" name = "add_brngy" type="text" class="form-control" pattern="[A-Za-z'-]" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">District</label>
                                                <input id = "add_district" name = "add_district" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">City/Municipality</label>
                                                <input id = "add_city" name = "add_city" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">Province</label>
                                                <input id = "add_province" name = "add_province" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">Region</label>
                                                <input id = "add_region" name = "add_region" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">Zip Code</label>
                                                <input id = "add_zipcode" name = "add_zipcode" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div> <br/><br/><br/>
                            </form>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button class="btn btn-primary waves-effect" type="button"
                            onclick = "
                                var r = confirm('Continue to Save?');
                                if(r == true)
                                {
                                  document.getElementById('bank_add').action = 'bank/submit';
                                  document.getElementById('bank_add').submit();
                                }
                              ">SUBMIT</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END OF MODAL -->

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="../../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="../../plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="../../plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    <script src="../../js/pages/forms/form-validation.js"></script>
    <script src="../../js/pages/ui/dialogs.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="../../plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
</body>

</html>
