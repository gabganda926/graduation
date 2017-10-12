@extends('pages.admin.master')

@section('title','Top Insurance Company - Queries | i-Insure')

@section('queries','active')

@section('topIns','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                TOP INSURANCE COMPANY
                            </b></h2>
                        </div>
                        <div class="body">
                            <h2 align="center">List of Insurance Company with Most Insured Clients</h2><br/>
                                <table id="ex" class="table table-bordered table-striped dataTable js-basic-example animated lightSpeedIn active">
                                    <thead>
                                        <tr class="bg-teal">
                                            <th>Name of Insurance Company</th>
                                            <th class="col-md-2">Number of individual clients</th>
                                            <th class="col-md-2">Number of company clients</th>
                                            <th class="col-md-2">Total number of clients</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ins as $in)
                                            @if($in->comp_ID <= 4)
                                                <tr>
                                                  <td>{{ $in->comp_name }}</td>
                                                  <td>
                                                    <script>
                                                        var count = 0;
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

                                                        document.write(count);
                                                    </script>
                                                  </td>
                                                  <td>
                                                        <script>
                                                        var count1 = 0;
                                                        @foreach($cliacc as $cli)
                                                            @if($cli->insurance_company == $in->comp_ID)
                                                                @foreach($clientlist as $list)
                                                                    @if($cli->client_ID == $list->client_ID)
                                                                        @if($list->client_type == 2)
                                                                            count1 += 1;
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach

                                                        document.write(count1);
                                                        </script>
                                                  </td>
                                                  <td><b>
                                                       <script>
                                                        var count2 = 0;
                                                        @foreach($cliacc as $cli)
                                                            @if($cli->insurance_company == $in->comp_ID)
                                                                @foreach($clientlist as $list)
                                                                    @if($cli->client_ID == $list->client_ID)
                                                                        count2 += 1;
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach

                                                        document.write(count2);
                                                        </script>
                                                  </b></td>
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
        </div>
    </section>

    <script>
        $('#ex').DataTable( {
            "order": [[ 3, "desc" ]]
        } );
    </script>
@endsection
