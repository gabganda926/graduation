@extends('pages.admin.master')

@section('title','Claims - Claim Type | Queries | i-Insure')

@section('queries','active')

@section('claimType','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-align: center"><b>
                                CLAIMS - CLAIM TYPE
                            </b></h2>
                        </div>
                        <div class="body">
                            <h2 align="center">List of Claim Types with Most Claim Requests</h2><br/>
                                <table id="ex" class="table table-bordered table-striped dataTable js-basic-example animated lightSpeedIn active">
                                    <thead>
                                        <tr class="bg-teal">
                                            <th>Name of Claim Type</th>
                                            <th>Total number of requests</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ctype as $ct)
                                    <tr>
                                      <td>{{ $ct->claimType }}</td>
                                      <td class="count">
                                          <script type="text/javascript">
                                              var count = 0;
                                                @foreach($creq as $cr)
                                                @if($ct->claimType_ID == $cr->claimType_ID) 
                                                    count+=1;     
                                                @endif
                                                @endforeach
                                                document.write('<b>' +count+ '</b>');
                                          </script>
                                      </td>
                                    </tr>
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
