@extends('pages.admin.master')

@section('title', 'Manage Insurance Accounts - Transaction | i-Insure')

@section('transaction','active')

@section('tinsurance','active')

@section('body')
    <section class="content">
    <h2 style="text-align: center"> Welcome to <b style="color: orange;"> i-Insure </b></h2>
    <br/>
        <div class="container-fluid">
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h3> Insurance Accounts </h3>
                            <ul class="header-dropdown m-r--5">
                                <li><button type="button" class="btn bg-red waves-effect right" style="position: right;" onclick="window.document.location='/admin/transaction/expiring-accounts';" data-toggle="tooltip" data-placement="bottom" title="View expiring accounts">
                                    <i class="material-icons">feedback</i><span style="font-size: 15px;"></span>
                                </button></li>
                            </ul>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Insurance Company</th>
                                        <th>SOI</th> <!-- START OF INSURANCE -->
                                        <th>EOI</th> <!-- END OF INSURANCE -->
                                        <th class="col-md-1">Insurance Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr onclick="window.document.location='/admin/transaction/client-info';" style="cursor: pointer;">
                                        <th>PIC</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>FPG Insurance</td>
                                        <td>Mar-11-2017</td>
                                        <td>Mar-11-2018</td>
                                        <td><span class="label bg-orange">on payment</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
    </section>

@endsection
