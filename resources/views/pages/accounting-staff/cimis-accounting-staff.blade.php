@extends('pages.accounting-staff.master')

@section('title','Dashboard | i-Insure')

@section('dashboard','active')

@section('body')
   <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect animated bounceInDown active" onclick="window.document.location='/admin/maintenance/client/individual';" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons col-red">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text">CLAIM REQUESTS</div>
                            <div class="number count-to" data-from="0" data-to="129" data-speed="15" data-fresh-interval="20">100</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect animated bounceInDown" onclick="window.document.location='/admin/maintenance/client/company';" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons col-red">announcement</i>
                        </div>
                        <div class="content">
                            <div class="text">UNOPENED COMPLAINTS</div>
                            <div class="number count-to" data-from="0" data-to="15" data-speed="15" data-fresh-interval="20">200</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect animated bounceInDown" onclick="window.document.location='/admin/maintenance/salesagent';" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons col-red">group</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL ACTIVE ACCOUNTS</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">233</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card animated bounceInUp" onclick="window.document.location='/admin/transaction/adm/transmittal';" style="cursor: pointer;">
                        <div class="header">
                            <h2>TRANSMITTAL INFO</h2>
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
                    <div class="card animated bounceInUp" onclick="window.document.location='/admin/transaction/adm/insurance-expiring-accounts';" style="cursor: pointer;">
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
    @endsection
