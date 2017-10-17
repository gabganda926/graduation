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
                            <h2 style="text-align: center"><b>
                                TOP SALES AGENT
                            </b></h2>
                        </div>
                        <div class="body">
                            <h2 align="center">List of Sales Agent with Most Insured Clients</h2><br/>
                                <table id="ex" class="table table-bordered table-striped dataTable js-basic-example animated lightSpeedIn active">
                                    <thead>
                                        <tr class="bg-teal">
                                            <th>Name of Sales Agent</th>
                                            <th class="col-md-2">Number of individual clients</th>
                                            <th class="col-md-2">Number of company clients</th>
                                            <th class="col-md-2">Total number of clients</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($agent as $agentdata)
                                          @if($agentdata->del_flag == 0)
                                            @foreach($pnf as $pInfo)
                                             @if($agentdata->personal_info_ID == $pInfo->pinfo_ID)
                                              @if($agentdata->sales_agent_flag != 0)
                                            <tr>
                                              <td>
                                                @if($pInfo->pinfo_middle_name == null)
                                                  {{ $pInfo->pinfo_last_name.", ".$pInfo->pinfo_first_name}}
                                                  @else
                                                  {{ $pInfo->pinfo_last_name.", ".$pInfo->pinfo_first_name." ".$pInfo->pinfo_middle_name }}
                                                  @endif
                                              </td>
                                              <td class="ind">
                                                <script type="text/javascript">
                                                    var count = 0;
                                                  @foreach($client as $cli)
                                                    @if($cli->del_flag == 0)
                                                        @if($agentdata->agent_ID == $cli->client_sales_ID)
                                                            count+=1;
                                                        @endif
                                                    @endif
                                                  @endforeach
                                                  document.write('' +count);
                                                </script>
                                              </td>
                                              <td class="comp">
                                                  <script type="text/javascript">
                                                    var count = 0;
                                                  @foreach($comp as $com)
                                                    @if($agentdata->agent_ID == $com->comp_sales_agent)
                                                        count+=1;
                                                    @endif
                                                  @endforeach
                                                  document.write('' +count);
                                                </script>
                                              </td>
                                              <td class="tot">
                                                  <script type="text/javascript">
                                                    var count = 0;
                                                  @foreach($comp as $com)
                                                    @if($agentdata->agent_ID == $com->comp_sales_agent)
                                                        count+=1;
                                                    @endif
                                                  @endforeach
                                                  @foreach($client as $cli)
                                                    @if($cli->del_flag == 0)
                                                        @if($agentdata->agent_ID == $cli->client_sales_ID)
                                                            count+=1;
                                                        @endif
                                                    @endif
                                                  @endforeach
                                                  document.write('<b>' +count + '</b>');
                                                </script></td>
                                            </tr>
                                            @endif
                                          @endif
                                        @endforeach
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
