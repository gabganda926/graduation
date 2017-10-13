@extends('pages.admin.master')

@section('title','Top Individual Client - Queries | i-Insure')

@section('queries','active')

@section('topInd','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                TOP INDIVIDUAL CLIENT
                            </b></h2>
                        </div>
                        <div class="body">
                            <h2 align="center">List of Active Loyal Clients (Individual)</h2><br/>
                                <table class="table table-bordered table-striped dataTable js-basic-example animated lightSpeedIn active">
                                    <thead>
                                        <tr class="bg-teal">
                                            <th class="col-md-1">Image</th>
                                            <th>Name of Client</th>
                                            <th>Number of days active</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><img src="{!! '/image/'.'default-image.png' !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></td>
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
