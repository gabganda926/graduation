<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Maintenance - Client | CIMIS</title>
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

    <!-- Dropzone Css -->
    <link href="../../plugins/dropzone/dropzone.css" rel="stylesheet">

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
                        <a href="../../dashboard">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class = "active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">build</i>
                            <span>Maintenance</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">question_answer</i>
                                    <span>Quotation</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../maintenance/sender">
                                            <i class="material-icons">person</i>
                                            <span>Sender</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../maintenance/vehicle/types">
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
                                                <a href="../maintenance/vehicle/model">Vehicle Model</a>
                                            </li>
                                            <li>
                                                <a href="../maintenance/vehicle/make">Vehicle Make</a>
                                            </li>
                                            <li>
                                                <a href="../maintenance/vehicle/accessories">Vehicle Accessories</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="../maintenance/quote/status">
                                            <i class="material-icons">menu</i>
                                            <span>Quote Status</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li class = "active">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">credit_card</i>
                                    <span>Billing</span>
                                </a>
                                <ul class="ml-menu">
                                    <li class = "active">
                                    <a href="../maintenance/client">
                                        <i class="material-icons">group</i>
                                        <span>Client</span>
                                    </a>
                                    </li>
                                    <li>
                                        <a href="../maintenance/client/type">
                                            <i class="material-icons">people_outline</i>
                                            <span>Client Type</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../maintenance/installment/type">
                                            <i class="material-icons">dns</i>
                                            <span>Installment Type</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../maintenance/bank">
                                            <i class="material-icons">account_balance</i>
                                            <span>Bank</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../maintenance/check/status">
                                            <i class="material-icons">menu</i>
                                            <span>Cheque Status</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">view_agenda</i>
                                    <span>Complaints & Transmittal</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../maintenance/complaint/type">
                                            <i class="material-icons">subject</i>
                                            <span>Complaint Type</span></a>
                                    </li>

                                    <li>
                                        <a href="../maintenance/courier">
                                            <i class="material-icons">person_outline</i>
                                            <span>Courier</span></a>
                                    </li>
                                    <li>
                                        <a href="../maintenance/complaint/status">
                                            <i class="material-icons">menu</i>
                                            <span>Complaint Status</span></a>
                                    </li>
                                    <li>
                                        <a href="../maintenance/transmittal/status">
                                            <i class="material-icons">menu</i>
                                            <span>Transmittal Status</span></a>
                                    </li>
                                </ul>
                            </li>


                            <li>
                                <a href="../maintenance/policyno">
                                    <i class="material-icons">confirmation_number</i>
                                    <span>Policy Number</span></a>
                            </li>
                            <li>
                                <a href="../maintenance/policyno/status">
                                    <i class="material-icons">menu</i>
                                    <span>Policy Number Status</span>
                                </a>
                            </li>
                            <li>
                                <a href="../maintenance/insurance/company">
                                    <i class="material-icons">business</i>
                                    <span>Insurance Company</span></a>
                            </li>
                            <li>
                                <a href="../maintenance/salesagent">
                                    <i class="material-icons">perm_identity</i>
                                    <span>Sales Agent</span>
                                </a>
                            </li>
                            <li>
                                <a href="../maintenance/employee">
                                    <i class="material-icons">supervisor_account</i>
                                    <span>Employee</span>
                                </a>
                            </li>
                            <li>
                                <a href="../maintenance/employee/type">
                                    <i class="material-icons">person_outline</i>
                                    <span>Employee Type</span>
                                </a>
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
                        <a href="pages/queries/sales-agent.php">
                            <i class="material-icons">perm_identity</i>
                            <span>Client</span>
                        </a>
                    </li>
                    <li>
                        <a href="pages/queries/insurance-accounts.php">
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
                            <span>Client Report</span>
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
                <div class="col-lg-12 col-md-7 col-sm-7 col-xs-7">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                CLIENT
                            </b></h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#addEmpModal">
                                    <i class="material-icons">group_add</i>
                                    <span>Add Client</span>
                                </button>
                                </li>
                                <li>
                                <button type="button" id = "delete_many" style = "display:none;" class="btn bg-red waves-effect">
                                    <i class="material-icons">delete</i>
                                    <span>Delete</span>
                                </button>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable animated lightSpeedIn active">
                                <thead>
                                    <tr class="bg-blue-grey">
                                        <th class="col-md-0.10"></th>
                                        <th class="col-md-1"> Image </th>
                                        <th>Name</th>
                                        <th>Client Type</th>
                                        <th class="col-md-2">Sales Agent</th>
                                        <th>Date Created</th>
                                        <th>Last Update</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $index = 1;
                                ?>
                                    @foreach($cli as $clidata)
                                    @if($clidata->del_flag == 0)
                                    <tr>
                                        <td><input type="checkbox" id="{{ $cli->client_ID }}" name = "del_check" class="filled-in chk-col-red checkCheckbox"/>
                                        <label for="{{ $cli->client_ID }}"></label></td> <!--YUNG ID DAPAT NAG IIBA EVERY RECORD -->
                                        <td>PIC HERE</td>
                                        <td>
                                          @if($Info->pinfo_middle_name == null)
                                          {{ $Info->pinfo_first_name." ".$Info->pinfo_last_name }}
                                          @else
                                          {{ $Info->pinfo_first_name." ".$Info->pinfo_middle_name." ".$Info->pinfo_last_name }}
                                          @endif
                                        </td>
                                        <td>{{ $cli->client_type }}</td>
                                        <td>Rola, Ma. Gabriella T.</td>
                                        <td>{{ \Carbon\Carbon::parse($clidata->created_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($clidata->created_at)->format('l, h:i:s A').")" }}</td>
                                        <td>{{ \Carbon\Carbon::parse($clidata->updated_at)->format('M-d-Y') }} <br/> {{ "(".\Carbon\Carbon::parse($clidata->updated_at)->format('l, h:i:s A').")" }}</td>
                                        <td>
                                        <button type="button" class="btn bg-light-blue waves-effect" data-toggle="modal" data-target="#largeModal"
                                        class="btn btn-success btn-xs waves-effect"
                                        data-cliid='{{ $clidata->client_ID }}'
                                        data-fname='{{ $Info->pinfo_first_name }}'
                                        data-mname='{{ $Info->pinfo_middle_name }}'
                                        data-lname='{{ $Info->pinfo_last_name }}'
                                        data-contact='{{ $Info->pinfo_contact }}'
                                        data-mail='{{ $Info->pinfo_mail }}'
                                        data-add='{{ $clidata->client_add_ID }}'

                                        data-lnumb='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $clidata->client_add_ID)
                                          {{ $addata->add_blcknum }}
                                          @endif
                                        @endforeach'
                                        data-strt='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $clidata->client_add_ID)
                                          {{ $addata->add_street }}
                                          @endif
                                        @endforeach'
                                        data-sdiv='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $clidata->client_add_ID)
                                          {{ $addata->add_subdivision }}
                                          @endif
                                        @endforeach'
                                        data-brg='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $clidata->client_add_ID)
                                          {{ $addata->add_brngy }}
                                          @endif
                                        @endforeach'
                                        data-distr='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $clidata->client_add_ID)
                                          {{ $addata->add_district }}
                                          @endif
                                        @endforeach'
                                        data-city='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $clidata->client_add_ID)
                                          {{ $addata->add_city }}
                                          @endif
                                        @endforeach'
                                        data-prov='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $clidata->client_add_ID)
                                          {{ $addata->add_province }}
                                          @endif
                                        @endforeach'
                                        data-regn='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $clidata->client_add_ID)
                                          {{ $addata->add_region }}
                                          @endif
                                        @endforeach'
                                        data-zip='
                                        @foreach($add as $addata)
                                          @if($addata->add_ID == $clidata->client_add_ID)
                                          {{ $addata->add_zipcode }}
                                          @endif
                                        @endforeach'

                                        onclick = "

                                        var id = $(this).data('cliid');
                                        var addid = $(this).data('cliid');
                                        var fname = $(this).data('fname');
                                        var mname = $(this).data('mname');
                                        var lname = $(this).data('lname');
                                        var contact = $(this).data('contact');
                                        var mail = $(this).data('mail');

                                        var addid = $(this).data('add');
                                        var lotnum = $(this).data('lnumb').replace(/^\s+|\s+$/g, '');
                                        var strt = $(this).data('strt').replace(/^\s+|\s+$/g, '');
                                        var subdiv = $(this).data('sdiv').replace(/^\s+|\s+$/g, '');
                                        var brngy = $(this).data('brg').replace(/^\s+|\s+$/g, '');
                                        var dist = $(this).data('distr').replace(/^\s+|\s+$/g, '');
                                        var city = $(this).data('city').replace(/^\s+|\s+$/g, '');
                                        var prov = $(this).data('prov').replace(/^\s+|\s+$/g, '');
                                        var reg = $(this).data('regn').replace(/^\s+|\s+$/g, '');
                                        var zipcode = $(this).data('zip').replace(/^\s+|\s+$/g, '');

                                        document.getElementById('acli_id').value = id;
                                        document.getElementById('acli_first_name').value = fname;
                                        document.getElementById('acli_middle_name').value = mname;
                                        document.getElementById('acli_last_name').value = lname;
                                        document.getElementById('acli_contact').value = contact;
                                        document.getElementById('acli_mail').value = mail;

                                        document.getElementById('aadd_id').value = addid;
                                        document.getElementById('aadd_blcknum').value = lotnum;
                                        document.getElementById('aadd_street').value = strt;
                                        document.getElementById('aadd_subdivision').value = subdiv;
                                        document.getElementById('aadd_brngy').value = brngy;
                                        document.getElementById('aadd_district').value = dist;
                                        document.getElementById('aadd_city').value = city;
                                        document.getElementById('aadd_province').value = prov;
                                        document.getElementById('aadd_region').value = reg;
                                        document.getElementById('aadd_zipcode').value = zipcode;
                                        ">
                                            <i class="material-icons">remove_red_eye</i>
                                            <span>View</span>
                                        </button>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->

            <!-- VIEW EMP DETAILS MODAL -->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInRight active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-view">
                            <h4><br/>Client Details
                            </h4>
                        </div><br/>
                        <button id = "Edit" style = "margin-left: 55em" type="button" class="btn btn-success btn-lg waves-effect"
                        onclick = "
                        document.getElementById('view').action = 'client/update';
                        $('#Edit').prop('disabled', true);
                        $('#Delete').prop('disabled', false);
                        $('#schange').show();
                        $('#aadd_blcknum').prop('disabled', false);
                        $('#aadd_street').prop('disabled', false);
                        $('#aadd_subdivision').prop('disabled', false);
                        $('#aadd_brngy').prop('disabled', false);
                        $('#aadd_district').prop('disabled', false);
                        $('#aadd_city').prop('disabled', false);
                        $('#aadd_province').prop('disabled', false);
                        $('#aadd_region').prop('disabled', false);
                        $('#aadd_zipcode').prop('disabled', false);
                        $('#acli_first_name').prop('disabled', false);
                        $('#acli_middle_name').prop('disabled', false);
                        $('#acli_last_name').prop('disabled', false);
                        $('#acli_email').prop('disabled', false);
                        $('#acli_contact').prop('disabled', false);
                        $('#schange').html('DELETE RECORD');
                        ">
                        <i class="material-icons">create</i>
                        <span>Edit</span>
                        </button>
                        <button id = "Delete" type="button" class="btn bg-red btn-lg waves-effect"
                        onclick = "
                        document.getElementById('view').action = 'client/delete';
                        $('#Edit').prop('disabled', false);
                        $('#Delete').prop('disabled', true);
                        $('#schange').show();
                        $('#aadd_blcknum').prop('disabled', false);
                        $('#aadd_street').prop('disabled', false);
                        $('#aadd_subdivision').prop('disabled', false);
                        $('#aadd_brngy').prop('disabled', false);
                        $('#aadd_district').prop('disabled', false);
                        $('#aadd_city').prop('disabled', false);
                        $('#aadd_province').prop('disabled', false);
                        $('#aadd_region').prop('disabled', false);
                        $('#aadd_zipcode').prop('disabled', false);
                        $('#acli_first_name').prop('disabled', false);
                        $('#acli_middle_name').prop('disabled', false);
                        $('#acli_last_name').prop('disabled', false);
                        $('#acli_email').prop('disabled', false);
                        $('#acli_contact').prop('disabled', false);
                        $('#schange').html('DELETE RECORD');
                        ">
                            <i class="material-icons">delete_sweep</i>
                            <span>Delete</span>
                        </button>  <br/>
                        <div class="modal-body">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="card">
                                <div class="body">
                                    <form id = "view" name = "view" action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                        <div class="dz-message">
                                            <div class="drag-icon-cph">
                                                <i class="material-icons">touch_app</i>
                                            </div>
                                            <h3>Click to upload.</h3>
                                            <em>(You can also drag Client's image here.)</em>
                                        </div>
                                        <div class="fallback">
                                            <input name="file" type="file" disabled="disable">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                            <form id="view" name = "view" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "acli_id" name = "acli_id" type="text" class="form-control">
                             </div>
                                <h3><small><b>Personal Information</b></small></h3>
                                <br/>
                                <div class="row clearfix">
                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>First Name :</small></label>
                                                <input id = "acli_first_name" name = "acli_first_name" type="text" class="form-control" disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Middle Name :</small></label>
                                                <input id = "acli_middle_name" name = "acli_middle_name" type="text" class="form-control" disabled="disable" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Last Name :</small></label>
                                                <input id = "acli_last_name" name = "acli_last_name" type="text" class="form-control" disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Mobile number :</small></label>
                                                <input id = "acli_contact" name = "acli_contact" type="text" class="form-control" disabled="disable" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Telephone number :</small></label>
                                                <input id = "acli_contact" name = "acli_contact" type="text" class="form-control" disabled="disable" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Email :</small></label>
                                                <input id = "acli_mail" name = "acli_mail" type="email" class="form-control" disabled="disable" >
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Date of Birth :</small></label>
                                                <input id = "acli_dob" name = "acli_dob" type="date" class="form-control" disabled="disable">
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label><small>Age :</small></label>
                                                <input id = "acli_age" name = "acli_age" type="text" class="form-control" disabled="disable">
                                            </div>
                                        </div>
                                </div>
                                </div>

                                <h3><small><b>Basic Insurance Details</b></small></h3>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                    <label><small>Policy Number :</small></label>
                                        <select id = "acli_pno" name = "acli_pno" class="form-control show-tick" data-live-search="true" disabled>
                                          <option disabled selected value = "null">-- Select Policy Number --</option>
                                          @foreach($pnum as $number)
                                          @if($number->del_flag == 0)
                                              <option value = "{{ $number->insurance_policynumber }}">{{ $number->insurance_policynumber }}</option>
                                          @endif
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                    <label><small>Client Type :</small></label>
                                        <select id = "acli_type" name = "acli_type" class="form-control show-tick" data-live-search="true" disabled>
                                          <option disabled selected value = "null">-- Select Client Type --</option>
                                          @foreach($ctype as $type)
                                          @if($type->del_flag == 0)
                                              <option value = "{{ $type->clientType_ID }}">{{ $type->clientType_type }}</option>
                                          @endif
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                    <label><small>Sales Agent :</small></label>
                                        <select id = "acli_agent" name = "acli_agent" class="form-control show-tick" data-live-search="true" disabled>
                                          <option disabled selected value = "null">-- Select Sales Agent --</option>
                                          @foreach($sales as $agent)
                                            @if($agent->del_flag == 0)
                                              @foreach($pnf as $Info)
                                                @if($agend->agent_add_ID == $Info->pinfo_ID)
                                                  <option value = "{{ $agent->agent_ID }}">{{ $agent->pinfo_first_name." ".$agent->pinfo_last_name }}</option>
                                                @endif
                                              @endforeach
                                            @endif
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "aadd_id" name = "aadd_id" type="text" class="form-control" pattern="[A-Za-z'-]">
                               </div>
                                <br/><br/>
                                <h3> <small><b>Residential Address</b></small></h3>
                                <br/>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Blk&Lot/Bldg/Unit :</small></label>
                                                <input id = "aadd_blcknum" name = "aadd_blcknum" type="text" class="form-control" disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Street :</small></label>
                                                <input id = "aadd_street" name = "aadd_street" type="text" class="form-control"  disabled="disable" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Subdivision :</small></label>
                                                <input id = "aadd_subdivision" name = "aadd_subdivision" type="text" class="form-control"  disabled="disable" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Barangay :</small></label>
                                                <input id = "aadd_brngy" name = "aadd_brngy" type="text" class="form-control" disabled="disable" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>District :</small></label>
                                                <input id = "aadd_district" name = "aadd_district" type="text" class="form-control"  disabled="disable" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>City/Municipality :</small></label>
                                                <input id = "aadd_city" name = "aadd_city" type="text" class="form-control"   disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Province :</small></label>
                                                <input id = "aadd_province" name = "aadd_province" type="text" class="form-control"  disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Region :</small></label>
                                                <input id = "aadd_region" name = "aadd_region" type="text" class="form-control"  disabled="disable">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label><small>Zip Code :</small></label>
                                                <input id = "aadd_zipcode" name = "aadd_zipcode" type="text" class="form-control"  disabled="disable">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/><br/><br/>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "atime" name = "atime" type="text" class="form-control" pattern="[A-Za-z'-]">
                                </div>
                        </div>
                        <div class="modal-footer js-sweetalert">
                          <button id = "schange" type = "submit" class="btn btn-primary waves-effect" style = "display: none;" onclick = "document.getElementById('atime').value = formatDate(new Date());">SAVE CHANGES</button>
                          <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- #END OF MODAL -->

            <!-- ADD Client MODAL -->
            <div class="modal fade" id="addEmpModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg animated zoomInLeft active" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-add">
                            <h4><br/>Add Client</h4>
                        </div>
                        <div class="modal-body">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="card">
                                <div class="body">
                                    <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                        <div class="dz-message">
                                            <div class="drag-icon-cph">
                                                <i class="material-icons">touch_app</i>
                                            </div>
                                            <h3>Click to upload.</h3>
                                            <em>(You can also drag Client's image here.)</em>
                                        </div>
                                        <div class="fallback">
                                            <input name="file" type="file"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                            <form id="add" name = "add" action = "client/submit" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <h3><br/> <small><b>Personal Information</b></small></h3>
                                <br/>
                                <div class="row clearfix">
                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "cli_first_name" name = "cli_first_name" type="text" class="form-control">
                                                <label class="form-label">First Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "cli_middle_name" name = "cli_middle_name" type="text" class="form-control" >
                                                <label class="form-label">Middle Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "cli_last_name" name = "cli_last_name" type="text" class="form-control">
                                                <label class="form-label">Last Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "cli_contact" name = "cli_contact" type="text" class="form-control" name="number">
                                                <label class="form-label">Mobile Number</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "cli_tcontact" name = "cli_tcontact" type="text" class="form-control" name="number">
                                                <label class="form-label">Telephone Number</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "cli_mail" name = "cli_mail" type="text" class="form-control" name="email">
                                                <label class="form-label">Email</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "cli_dob" name = "cli_dob" type = "date" class="form-control">
                                                <label class="form-label">Date of birth</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "cli_age" name = "cli_age" type="text" class="form-control">
                                                <label class="form-label">Age (Automatic field)</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h3><small><b>Basic Insurance Details</b></small></h3>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <select id = "cli_pno" name = "cli_pno" class="form-control show-tick" data-live-search="true" >
                                            <option disabled selected value = "null">-- Select Policy Number --</option>
                                            @foreach($pnum as $number)
                                            @if($number->del_flag == 0)
                                                <option value = "{{ $number->insurance_policynumber }}">{{ $number->insurance_policynumber }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select id = "cli_type" name = "cli_type" class="form-control show-tick" data-live-search="true" >
                                          <option disabled selected value = "null">-- Select Client Type --</option>
                                          @foreach($ctype as $type)
                                          @if($type->del_flag == 0)
                                              <option value = "{{ $type->clientType_ID }}">{{ $type->clientType_type }}</option>
                                          @endif
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <select id = "cli_agent" name = "cli_agent" class="form-control show-tick" data-live-search="true" >
                                          <option disabled selected value = "null">-- Select Sales Agent --</option>
                                          @foreach($sales as $agent)
                                            @if($agent->del_flag == 0)
                                              @foreach($pnf as $Info)
                                                @if($agend->agent_add_ID == $Info->pinfo_ID)
                                                  <option value = "{{ $agent->agent_ID }}">{{ $agent->pinfo_first_name." ".$agent->pinfo_last_name }}</option>
                                                @endif
                                              @endforeach
                                            @endif
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br/><br/>
                                <h3> <small><b>Residential Address</b></small></h3>
                                <br/>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_blcknum" name = "add_blcknum" type="text" class="form-control">
                                                <label class="form-label">Blk&Lot/Bldg/Unit</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_street" name = "add_street" type="text" class="form-control" >
                                                <label class="form-label">Street</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_subdivision" name = "add_subdivision" type="text" class="form-control" >
                                                <label class="form-label">Subdivision</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_brngy" name = "add_brngy" type="text" class="form-control">
                                                <label class="form-label">Barangay</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_city" name = "add_city" type="text" class="form-control" >
                                                <label class="form-label">District</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_city" name = "add_city" type="text" class="form-control">
                                                <label class="form-label">City/Municipality</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_province" name = "add_province" type="text" class="form-control">
                                                <label class="form-label">Province</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_region" name = "add_region" type="text" class="form-control">
                                                <label class="form-label">Region</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id = "add_zipcode" name = "add_zipcode" type="text" class="form-control">
                                                <label class="form-label">Zip Code</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/><br/><br/>
                                <div class="col-md-4" style = "display: none;">
                                   <input id = "time" name = "time" type="text" class="form-control" pattern="[A-Za-z'-]">
                                </div>

                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button class="btn btn-primary waves-effect" type="submit" onclick = "document.getElementById('time').value = formatDate(new Date());">SUBMIT</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
          </div>
            <!-- #END OF MODAL -->
    </section>

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

    <!-- Dropzone Plugin Js -->
    <script src="../../plugins/dropzone/dropzone.js"></script>

    <script>
            $.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[A-Za-z][A-Za-z0-9 '-.]*$/i.test(value);
             }, "This field must contain only letters, numbers, dashes, space, apostrophe or dot.");
            $.validator.addMethod("alpha", function(value, element) {
                return this.optional(element) || /^[A-Za-z][A-Za-z '-.]*$/i.test(value);
             }, "This field must contain only letters, space, dash, apostrophe or dot.");
            $.validator.addMethod("blcknumber", function(value, element) {
                return this.optional(element) || /^[A-Za-z0-9][A-Za-z0-9 '-.]*$/i.test(value);
             }, "This field must contain only letters, numbers, space, dash, apostrophe or dot.");
            $.validator.addMethod("notDefault", function(value, element, arg){
                return arg != value;
             }, "Value must not equal arg.");

        // Wait for the DOM to be ready
            $(function() {
              // Initialize form validation on the registration form.
              // It has the name attribute "registration"
              $("form[name='add']").validate({
                // Specify validation rules
                rules: {
                  // The key name on the left side is the name attribute
                  // of an input field. Validation rules are defined
                  // on the right side
                  cli_first_name:{
                    required: true,
                    alpha:true
                  },
                  cli_middle_name:{
                    alpha:true
                  },
                  cli_last_name:{
                    required: true,
                    alpha:true
                  },
                  cli_contact:{
                    required: true,
                    digits: true,
                    minlength: 7,
                    maxlength: 11
                  },
                  cli_tcontact:{
                    required: true,
                    digits: true,
                    minlength: 7,
                    maxlength: 11
                  },
                  cli_mail:{
                    required: true,
                    email: true
                  },
                  cli_dob:{
                    required: true
                  },
                  cli_pno:{
                    notDefault: "null"
                  },
                  cli_type:{
                    notDefault: "null"
                  },
                  cli_agent:{
                    notDefault: "null"
                  },
                  add_blcknum:{
                      blcknumber: true,
                  },
                  add_street:
                  {
                      alphanumeric: true,
                  },
                  add_subdivision:
                  {
                      alphanumeric: true,
                  },
                  add_brngy:
                  {
                      alphanumeric: true,
                  },
                  add_district:
                  {
                      alphanumeric: true,
                  },
                  add_city:
                  {
                      alphanumeric: true,
                  },
                  add_province:
                  {
                      alphanumeric: true,
                  },
                  add_region:
                  {
                      alphanumeric: true,
                  },
                  add_zipcode:
                  {
                      digits: true,
                  }
                },
                // Specify validation error messages
                messages: {
                    cli_first_name:{
                        required: "Empty First Name"
                    },
                    cli_last_name:{
                        required: "Empty Last Name"
                    },
                    cli_contact:{
                        required: "Empty Contact Number",
                        digits: "This field is Digits only",
                        minlength: "This field requires minimum length of 7",
                        maxlength: "This field requires max length of 11"
                    },
                    add_blcknum:{
                        digits: "This field is Digits only"
                    },
                    add_zipcode:
                    {
                       digits: "This field is Digits only"
                    },
                    cli_pno:{
                       notDefault: "Please select something"
                    },
                    cli_type:{
                       notDefault: "Please select something"
                    },
                    cli_agent:{
                       notDefault: "Please select something"
                    },

                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                  form.submit();
                }
              });

              $("form[name='view']").validate({
                // Specify validation rules
                rules: {
                  // The key name on the left side is the name attribute
                  // of an input field. Validation rules are defined
                  // on the right side
                  acli_first_name:{
                    alpha: true,
                    required: true
                  },
                  acli_middle_name:
                  {
                    alpha: true
                  },
                  acli_last_name:{
                    alpha: true,
                    required: true
                  },
                  acli_contact:{
                    required: true,
                    digits: true,
                    minlength: 7,
                    maxlength: 11
                  },
                  acli_mail:{
                    required: true,
                    email: true
                  },
                  acli_tcontact:{
                    required: true,
                    digits: true,
                    minlength: 7,
                    maxlength: 11
                  },
                  acli_mail:{
                    required: true,
                    email: true
                  },
                  acli_dob:{
                    required: true
                  },
                  aadd_blcknum:{
                      blcknumber: true,
                  },
                  aadd_street:
                  {
                      alphanumeric: true,
                  },
                  aadd_subdivision:
                  {
                      alphanumeric: true,
                  },
                  aadd_brngy:
                  {
                      alphanumeric: true,
                  },
                  aadd_district:
                  {
                      alphanumeric: true,
                  },
                  aadd_city:
                  {
                      alphanumeric: true,
                  },
                  aadd_province:
                  {
                      alphanumeric: true,
                  },
                  aadd_region:
                  {
                      alphanumeric: true,
                  },
                  aadd_zipcode:
                  {
                      digits: true,
                  }
                },
                // Specify validation error messages
                messages: {
                    acli_first_name:{
                        required: "Empty First Name"
                    },
                    acli_last_name:{
                        required: "Empty Last Name"
                    },
                    acli_contact:{
                        required: "Empty Contact Number",
                        digits: "This field is Digits only",
                        minlength: "This field requires minimum length of 7",
                        maxlength: "This field requires max length of 11"
                    },
                    aadd_zipcode:
                    {
                       digits: "This field is Digits only"
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

    <script>
        $(document).ready(function()
        {
          $('add').validate();
          $('view').validate();
          if ($('.checkCheckbox:checked').length > 0)
          {
               $("#delete_many").show();
          }
          else
          {
              $("#delete_many").hide();
          }

          $(".checkCheckbox").change(
            function()
            {
              if ($('.checkCheckbox:checked').length > 0)
              {
                   $("#delete_many").show();
              }
              else
              {
                  $("#delete_many").hide();
              }
             }
          );
        });

        function addZero(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

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

        // $(function() {
        //     $('.column-id :checkbox').click(function() {
        //         var myData;
        //
        //         $("input:checkbox[name=type]:checked").each(function(){
        //               myData.push($(this).val());
        //        });
        //
        //         $.ajax("/foo/bar", {
        //             type: 'POST',
        //             data: {myData:ArrayDelete}
        //         });
        //     });
        // });

    </script>
</body>

</html>
