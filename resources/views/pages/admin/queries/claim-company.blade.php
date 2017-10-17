@extends('pages.admin.master')

@section('title','Claims - Top Insurance Company | Queries | i-Insure')

@section('queries','active')

@section('claimCompany','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-align: center"><b>
                                CLAIMS - TOP INSURANCE COMPANY
                            </b></h2>
                        </div>
                        <div class="body">
                            <h2 align="center">List of Insurance Company with Most Claim Requests</h2><br/>
                                <table id="ex" class="table table-bordered table-striped dataTable js-basic-example animated lightSpeedIn active">
                                    <thead>
                                        <tr class="bg-teal">
                                            <th>Insurance Company</th>
                                            <th>Total number of requests</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ins as $in)
                                    @if($in->comp_ID <= 4)
                                    <tr>
                                      <td>{{ $in->comp_name }}</td>
                                      <td class="count">
                                          <script type="text/javascript">
                                              var count = 0;
                                                @foreach($creq as $cr)
                                                    @foreach($cliacc as $cli)
                                                        @if($cli->account_ID == $cr->account_ID)
                                                            @if($cli->insurance_company == $in->comp_ID)
                                                                count+=1;
                                                            @endif
                                                        @endif
                                                    @endforeach 
                                                @endforeach
                                                document.write('<b>' +count+ '</b>');
                                          </script>
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
        </div>
    </section>
    <script>
        $('#ex').DataTable( {
            "order": [[ 1, "desc" ]]
        } );
    </script>
@endsection
