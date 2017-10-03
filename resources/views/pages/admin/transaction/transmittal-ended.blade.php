@extends('pages.admin.master')

@section('title','Insurance Accounts - Transaction| i-Insure')

@section('trans','active')

@section('transTrans','active')

@section('body')

    <section class="content">
     <h2 style="text-align: center"> Welcome to <b style="color: orange;"> i-Insure </b><br/>
    <small><label id="demonew"></small></label><br/>
    <small><label id="demo"></label></small>
    <label></label>
        <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10) {
          dd='0'+dd
        } 

        if(mm<10) {
          mm='0'+mm
        } 

        today = mm+'/'+dd+'/'+yyyy+' - <?php 
    $today = date("D M j Y");  

    echo $today; 
    ?>';
        document.getElementById("demonew").innerHTML = today;
        var myVar=setInterval(function(){myTimer()},1000);

        function myTimer() {
            var d = new Date();
            document.getElementById("demo").innerHTML = d.toLocaleTimeString();
        }
        </script>
    </h2>
    <br/>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('admin/transaction/transmittal-home') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('admin/transaction/transmittal-home') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Closed Transmittal</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="acce" class="list-group-item active">
                                1. Transmittal
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/list.png')}}" style="height: 50px; width: 50px;"><b> Closed Transmittal </b></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Transmittal #</th>
                                        <th>Client</th>
                                        <th>Courier</th>
                                        <th class="col-md-2">Date Started</th>
                                        <th class="col-md-2">End Date</th>
                                        <th class="col-md-1">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($request as $req)
                                 @if($req->status == 5)
                                 <tr>
                                    <th>{{$req->req_ID}}</th>
                                    <td>
                                    @foreach($details as $dts)
                                     @if($dts->req_ID == $req->req_ID)
                                      {{$dts->name}}
                                     @endif
                                    @endforeach
                                    </td>
                                    <td>
                                    @foreach($process as $proc)
                                     @if($proc->request_ID == $req->req_ID)
                                      @foreach($courier as $cur)
                                       @if($cur->courier_ID == $proc->courier_ID)
                                        @foreach($pinfo as $info)
                                         @if($cur->personal_info_ID == $info->pinfo_ID)
                                          {{$info->pinfo_last_name}}, {{$info->pinfo_first_name}} {{$info->pinfo_middle_name}}
                                         @endif
                                        @endforeach
                                       @endif
                                      @endforeach
                                     @endif
                                    @endforeach
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($req->date_recieved)->format("M d,Y H:i:s")}}</td>
                                    <td>{{\Carbon\Carbon::parse($req->date_update)->format("M d,Y H:i:s")}}</td>
                                    <td><span class="label bg-green">delivered</span></td>
                                 </tr>
                                 @elseif($req->status == 2)
                                 <tr>
                                    <th>{{$req->req_ID}}</th>
                                    <td>
                                    @foreach($details as $dts)
                                     @if($dts->req_ID == $req->req_ID)
                                      {{$dts->name}}
                                     @endif
                                    @endforeach
                                    </td>
                                    <td>
                                    @foreach($process as $proc)
                                     @if($proc->request_ID == $req->req_ID)
                                      @foreach($courier as $cur)
                                       @if($cur->courier_ID == $proc->courier_ID)
                                        @foreach($pinfo as $info)
                                         @if($cur->personal_info_ID == $info->pinfo_ID)
                                          {{$info->pinfo_last_name}}, {{$info->pinfo_first_name}} {{$info->pinfo_middle_name}}
                                         @endif
                                        @endforeach
                                       @endif
                                      @endforeach
                                     @endif
                                    @endforeach
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($req->date_recieved)->format("M d,Y H:i:s")}}</td>
                                    <td>{{\Carbon\Carbon::parse($req->date_update)->format("M d,Y H:i:s")}}</td>
                                    <td><span class="label bg-red">cancelled</span></td>
                                 </tr>
                                 @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
    </section>

@endsection
