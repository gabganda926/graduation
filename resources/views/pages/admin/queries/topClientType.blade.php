@extends('pages.admin.master')

@section('title','Top Client Type - Queries | i-Insure')

@section('queries','active')

@section('topCli','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-align: center"><b>
                                TOP CLIENT TYPE
                            </b></h2>
                        </div>
                        <div class="body">
                            <h2 align="center">List of Client Type with Most Insured Clients</h2><br/>
                                <table id="ex" class="table table-bordered table-striped dataTable js-basic-example animated lightSpeedIn active">
                                    <thead>
                                        <tr class="bg-teal">
                                            <th>Client Type</th>
                                            <th>Total number of clients</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                              <td>Individual</td>
                                              <td>
                                                <script>
                                                    var count = 0;
                                                    @foreach($ins as $in)
                                                        @foreach($cliacc as $cli)
                                                        @if($cli->insurance_company == $in->comp_ID)
                                                            @foreach($clientlist as $list)
                                                                @if($cli->client_ID == $list->client_ID)
                                                                    @if($list->client_type == 1)
                                                                        count += 1;
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                        @endforeach
                                                    @endforeach

                                                    document.write('' +count);
                                                </script>
                                              </td>
                                            </tr>
                                            <tr>
                                                <td>Company</td>
                                              <td>
                                                    <script>
                                                    var count1 = 0;
                                                    @foreach($ins as $in1)
                                                    @foreach($cliacc as $cli)
                                                        @if($cli->insurance_company == $in1->comp_ID)
                                                            @foreach($clientlist as $list)
                                                                @if($cli->client_ID == $list->client_ID)
                                                                    @if($list->client_type == 2)
                                                                        count1 += 1;
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                    @endforeach

                                                    document.write('' +count1);
                                                    </script>
                                              </td>
                                            </tr>
                                            <tr>
                                                <td><b>Total: </b></td>
                                                <td>
                                                    <script>
                                                    var count1 = 0;
                                                    @foreach($ins as $in)
                                                        @foreach($cliacc as $cli)
                                                        @if($cli->insurance_company == $in->comp_ID)
                                                            @foreach($clientlist as $list)
                                                                @if($cli->client_ID == $list->client_ID)
                                                                    @if($list->client_type == 1)
                                                                        count1 += 1;
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                        @endforeach
                                                    @endforeach
                                                    @foreach($ins as $in1)
                                                    @foreach($cliacc as $cli)
                                                        @if($cli->insurance_company == $in1->comp_ID)
                                                            @foreach($clientlist as $list)
                                                                @if($cli->client_ID == $list->client_ID)
                                                                    @if($list->client_type == 2)
                                                                        count1 += 1;
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                    @endforeach

                                                    document.write('<b>' +count1+ '</b>');
                                                    </script>
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <script>
        $('#ex').DataTable( {
            "order": [[ 3, "desc" ]]
        } );
    </script>
@endsection
