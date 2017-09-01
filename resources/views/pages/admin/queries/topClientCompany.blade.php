@extends('pages.admin.master')

@section('title','Vehicle Make - Maintenance | i-Insure')

@section('queries','active')

@section('topComp','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                TOP COMPANY CLIENT
                            </b></h2>
                        </div>
                        <div class="body">
                            <h2 align="center">List of Active Loyal Clients (Company)</h2><br/>
                                <table class="table table-bordered table-striped dataTable js-basic-example animated lightSpeedIn active">
                                    <thead>
                                        <tr class="bg-teal">
                                            <th>Name of Company</th>
                                            <th>Number of days active</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                      <td>Toyota</td>
                                      <td>456 days (0 years, 0 months, 0 days)</td>
                                    </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
@endsection
