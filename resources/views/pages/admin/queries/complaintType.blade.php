@extends('pages.admin.master')

@section('title','Complaints - Complaint Status | Queries | i-Insure')

@section('queries','active')

@section('compType','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-align: center"><b>
                                COMPLAINTS - COMPLAINT STATUS
                            </b></h2>
                        </div>
                        <div class="body">
                            <h2 align="center">List of Complaint Status with Most Issues Reported</h2><br/>
                                <table id="ex" class="table table-bordered table-striped dataTable js-basic-example animated lightSpeedIn active">
                                    <thead>
                                        <tr class="bg-teal">
                                            <th>Name of Complaint Status</th>
                                            <th class="col-md-2">Number of reports</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                      <td>High</td>
                                      <td>
                                          <script type="text/javascript">
                                            var count = 0;
                                              @foreach($complaints as $c)
                                                  @if($c->status ==0)
                                                    count+=1;
                                                  @endif
                                              @endforeach

                                              document.write('<b>' +count+ '</b>');
                                          </script>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Medium</td>
                                      <td>
                                          <script type="text/javascript">
                                            var count = 0;
                                              @foreach($complaints as $c)
                                                  @if($c->status ==1)
                                                    count+=1;
                                                  @endif
                                              @endforeach

                                              document.write('<b>' +count+ '</b>');
                                          </script>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Low</td>
                                      <td>
                                          <script type="text/javascript">
                                            var count = 0;
                                              @foreach($complaints as $c)
                                                  @if($c->status ==2)
                                                    count+=1;
                                                  @endif
                                              @endforeach

                                              document.write('<b>' +count+ '</b>');
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
            "order": [[ 1, "desc" ]]
        } );
    </script>
@endsection
