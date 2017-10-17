@extends('pages.admin.master')

@section('title','Transmittal - Top Courier | Queries | i-Insure')

@section('queries','active')

@section('transCourier','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-align: center"><b>
                                TRANSMITTAL - TOP COURIER
                            </b></h2>
                        </div>
                        <div class="body">
                            <h2 align="center">List of Courier with Most Transmitted Documents</h2><br/>
                                <table id="ex" class="table table-bordered table-striped dataTable js-basic-example animated lightSpeedIn active">
                                    <thead>
                                        <tr class="bg-teal">
                                            <th class="col-md-4">Name of Courier</th>
                                            <th>Number of Transmitted Documents to Insurance Company</th>
                                            <th>Number of Transmitted Documents to Client</th>
                                            <th>Total Number of Transmitted Documents</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cour as $co)
                                        <tr>
                                            <td>
                                                @foreach($pinfo as $inf)
                                                    @if($inf->pinfo_ID == $co->personal_info_ID)
                                                        {{$inf->pinfo_last_name}}, {{$inf->pinfo_first_name}} {{$inf->pinfo_middle_name}}
                                                    @endif 
                                                @endforeach
                                            </td>
                                            <td>
                                                <script type="text/javascript">
                                                    var count = 0;
                                                    @foreach($claim as $cl)
                                                        @if($cl->courier_ID == $co->courier_ID)
                                                            count += 1;
                                                        @endif
                                                    @endforeach

                                                    document.write('' +count);
                                                </script>
                                            </td>
                                            <td>
                                                <script type="text/javascript">
                                                    var count = 0;
                                                    @foreach($proc as $pr)
                                                        @if($pr->courier_ID == $co->courier_ID)
                                                            count += 1;
                                                        @endif
                                                    @endforeach

                                                    document.write('' +count);
                                                </script>
                                            </td>
                                            <td>
                                                <script type="text/javascript">
                                                    var count = 0;
                                                    @foreach($claim as $cl)
                                                        @if($cl->courier_ID == $co->courier_ID)
                                                            count += 1;
                                                        @endif
                                                    @endforeach
                                                    @foreach($proc as $pr)
                                                        @if($pr->courier_ID == $co->courier_ID)
                                                            count += 1;
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
            "order": [[ 3, "desc" ]]
        } );
    </script>
@endsection
