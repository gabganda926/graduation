@extends('pages.admin.master')

@section('title','Vehicle Make - Maintenance | i-Insure')

@section('queries','active')

@section('topAgent','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                TOP SALES AGENT
                            </b></h2>
                        </div>
                        <div class="body">
                            <h2 align="center">List of Sales Agent with Most Insured Clients</h2><br/>
                                <table class="table table-bordered table-striped dataTable js-basic-example animated lightSpeedIn active">
                                    <thead>
                                        <tr class="bg-teal">
                                            <th>Name of Sales Agent</th>
                                            <th class="col-md-2">Number of individual clients</th>
                                            <th class="col-md-2">Number of company clients</th>
                                            <th class="col-md-2">Total number of clients</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                      <td>Rola, Ma. Gabriella T.</td>
                                      <td>421</td>
                                      <td>12</td>
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
