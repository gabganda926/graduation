@extends('pages.admin.master')

@section('title','Vehicle Make - Maintenance | i-Insure')

@section('queries','active')

@section('topVehicle','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                TOP INSURED VEHICLE
                            </b></h2>
                        </div>
                        <div class="body">
                            <h2 align="center">List of Vehicles with Most Insured Clients</h2><br/>
                                <table class="table table-bordered table-striped dataTable js-basic-example animated lightSpeedIn active">
                                    <thead>
                                        <tr class="bg-teal">
                                            <th>Vehicle Type</th>
                                            <th>Vehicle Make</th>
                                            <th>Vehicle Year</th>
                                            <th>Vehicle Model</th>
                                            <th>Number of Clients</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                      <td>SUV</td>
                                      <td>Wikiwiki</td>
                                      <td>2018</td>
                                      <td>Kek</td>
                                      <td><b>433</b></td>
                                    </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
@endsection
