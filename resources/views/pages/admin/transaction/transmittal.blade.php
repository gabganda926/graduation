@extends('pages.admin.master')

@section('title','Transmittal - Transaction| i-Insure')

@section('trans','active')

@section('transTrans','active')

@section('transTransmittal','active')

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
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('/admin/transaction/transmittal-home') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('/admin/transaction/transmittal-home') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> List of Transmittal</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="acce" class="list-group-item active">
                                Transmittal of Documents
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/delivery-list.png')}}" style="height: 50px; width: 50px;"><b> Transmittal of Documents </b></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <form id = "display_details" action = "/admin/transaction/transmittal/view" method = "GET" style = "display: none;">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "trans_id" name = "trans_id" type="text" class="form-control">
                             </div>
                        </form>
                        <form id="tc" name = "tc" method="POST" action = "/admin/transaction/transmittal/update" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-md-4" style = "display: none;">
                               <input id = "time" name = "time" type="text" class="form-control">
                            </div>
                            <div class="col-md-2" style = "display: none;">
                               <input id = "transid" name = "transid" type="text" class="form-control">
                            </div>
                            <div class="col-md-2" style = "display: none;">
                               <input id = "statval" name = "statval" type="text" class="form-control">
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
                                        <th class="col-md-2">Last Update</th>
                                        <th class="col-md-1">Status</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($request as $req)
                                    @if($req->status == 3 || $req->status == 4)
                                    <tr>
                                        <td class="trans_{{ $req->req_ID }}"></td>
                                        <td  class="cl_{{ $req->req_ID }}"></td>
                                        <td class="cour_{{ $req->req_ID }}"></td>
                                        <td class="start_{{ $req->req_ID }}"></td>
                                        <td class="upd_{{ $req->req_ID }}"></td>
                                        <td class="stat_{{ $req->req_ID }}">
                                            @if($req->status == 3)
                                                <span class="label bg-blue">processing</span>
                                            @endif

                                            @if($req->status == 4)
                                                <span class="label bg-orange">on hold</span>
                                            @endif
                                            <div id = "div_{{ $req->req_ID }}" class = "div_{{ $req->req_ID }}">
                                                @if($req->status == 3)
                                                    <select name = "sel_{{ $req->req_ID }}" id = "sel_{{ $req->req_ID }}" class="form-control show-tick">
                                                        <option selected value = "" style = "display: none;">-- Select Status --</option>
                                                        <option value = "7">cancelled</option>
                                                        <option value = "4">on hold</option>
                                                        <option value = "5">sent</option>
                                                    </select>
                                                @endif
                                                @if($req->status == 4)
                                                    <select name = "sel_{{ $req->req_ID }}" id = "sel_{{ $req->req_ID }}" class="form-control show-tick">
                                                        <option selected value = "" style = "display: none;">-- Select Status --</option>
                                                        <option value = "3">processing</option>
                                                        <option value = "7">cancelled</option>
                                                    </select>
                                                @endif
                                            </div>
                                                <button id="btn_{{ $req->req_ID }}" type="button" class="btn bg-green btn-block waves-effect btn_{{ $req->req_ID }}" onclick="
                                                $('#transid').val('{{ $req->req_ID }}');
                                                document.getElementById('time').value = formatDate(new Date());
                                                document.getElementById('transid').value = getTransId();
                                                document.getElementById('statval').value = getStatVal();
                                                swal({
                                                  title: 'Are you sure?',
                                                  type: 'warning',
                                                  showCancelButton: true,
                                                  confirmButtonColor: '#DD6B55',
                                                  confirmButtonText: 'Continue',
                                                  cancelButtonText: 'Cancel',
                                                  closeOnConfirm: false,
                                                  closeOnCancel: false
                                                },
                                                function(isConfirm){
                                                  if (isConfirm) {
                                                    $('#tc').submit();
                                                  } else {
                                                      swal({
                                                      title: 'Cancelled',
                                                      type: 'warning',
                                                      timer: 500,
                                                      showConfirmButton: false
                                                      });
                                                  }
                                                });
                                                $('#div_{{ $req->req_ID }}').hide(200);
                                                $('#btn_{{ $req->req_ID }}').hide(200);
                                                $('#btnC_{{ $req->req_ID }}').hide(200);">SAVE
                                                </button>
                                                <button type="button" id="btnC_{{ $req->req_ID }}" class="btn btn-block waves-effect" style="position: right;" data-toggle="tooltip" data-placement="left" title="Update Status" onclick="
                                                $('#div_{{ $req->req_ID }}').hide(200);
                                                $('#btn_{{ $req->req_ID }}').hide(200);
                                                $('#btnC_{{ $req->req_ID }}').hide(200);
                                                console.log('{{ $req->req_ID }}');"><span style="font-size: 15px;">CANCEL</span>
                                                </button>
                                        </td>
                                        <td>
                                            <button form = "display_details" type="submit" class="btn bg-blue waves-effect" style="position: right;" data-id = "{{$req->req_ID}}" onclick="$('#trans_id').val($(this).data('id'));" data-toggle="tooltip" data-placement="left" title="View details">
                                                <i class="material-icons">security</i><span style="font-size: 15px;"></span>
                                            </button>

                                            @if($req->status == 3)
                                                <button type="button" id="btnS_{{ $req->req_ID }}" class="btn bg-teal waves-effect" style="position: right;" data-toggle="tooltip" data-placement="left" title="Update Status" onclick="
                                                $('#div_{{ $req->req_ID }}').show(200);
                                                $('#btn_{{ $req->req_ID }}').show(200);
                                                $('#btnC_{{ $req->req_ID }}').show(200);
                                                console.log('{{ $req->req_ID }}');">
                                                    <i class="material-icons">settings</i><span style="font-size: 15px;"></span>
                                                </button>
                                                <button type="button" class="btn bg-orange waves-effect" data-id=" {{ $req->req_ID }} " onclick="window.open('{{ URL ('/pdf/transmittal-form-pdf/' .$req->req_ID) }}');" style="position: right;"  data-toggle="tooltip" data-placement="left" title="Generate Transmittal Form">
                                                <i class="material-icons">picture_as_pdf</i><span style="font-size: 15px;"></span>
                                                </button>
                                            @endif

                                            @if($req->status == 4)
                                                <button type="button" id="btnS_{{ $req->req_ID }}" class="btn bg-teal waves-effect" style="position: right;" data-toggle="tooltip" data-placement="left" title="Update Status" onclick="
                                                $('#div_{{ $req->req_ID }}').show(200);
                                                $('#btn_{{ $req->req_ID }}').show(200);
                                                $('#btnC_{{ $req->req_ID }}').show(200);
                                                console.log('{{ $req->req_ID }}');">
                                                    <i class="material-icons">settings</i><span style="font-size: 15px;"></span>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div> <!-- end of body -->
                    </form>
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        function addZero(i) {
                    if (i < 10) {
                        i = "0" + i;
                    }
                    return i;
                }

        function formatDate(date)
        {
          var monthNames = [
            "January", "February", "March",
            "April", "May", "June", "July",
            "August", "September", "October",
            "November", "December"
          ];

          var day = date.getDate();
          var monthIndex = date.getMonth() + 1;
          var year = date.getFullYear();
          var h = addZero(date.getHours());
          var m = addZero(date.getMinutes());
          var s = addZero(date.getSeconds());

          return year + '-' + monthIndex + '-' + day + ' ' + h + ':' + m + ':' + s;
        }

        function getTransId(clid){
           clid = $('#transid').val();
           return clid;
        } 

        function getStatVal(stat){
           stat = $('#statval').val();
           return stat;
        } 

        @foreach($request as $re)
            @if($re->status == 3 || $re->status == 4)
                $('#sel_{{ $re->req_ID }}').on('change textInput input', function () {
                    var d = $('#sel_{{ $re->req_ID }} option:selected').val();
                    $('#statval').val(d);
                    console.log($('#statval').val());
                });
            @endif
        @endforeach

        window.onload = function(){

            @foreach($request as $req)
                @if($req->status == 3 || $req->status == 4)
                    document.getElementById("div_{{ $req->req_ID }}").style.display = 'none';
                    document.getElementById("btn_{{ $req->req_ID }}").style.display = 'none';
                    document.getElementById("btnC_{{ $req->req_ID }}").style.display = 'none';
                    console.log("{{ $req->req_ID }}");

                    @foreach($process as $pro)
                        @if($req->req_ID == $pro->request_ID)
                            @if($pro->process_ID >= 10)
                                $('td.trans_{{ $req->req_ID }}').html('TRANS-00{{ $pro->process_ID }}');
                            @endif
                            @if($pro->process_ID < 10)
                                $('td.trans_{{ $req->req_ID }}').html('TRANS-000{{ $pro->process_ID }}');
                            @endif
                            @if($pro->process_ID >= 100)
                                $('td.trans_{{ $req->req_ID }}').html('TRANS-0{{ $pro->process_ID }}');
                            @endif
                            @if($pro->process_ID >= 1000)
                                $('td.trans_{{ $req->req_ID }}').html('TRANS-{{ $pro->process_ID }}');
                            @endif

                            @foreach($details as  $det)
                                @if($req->req_ID == $det->req_ID)
                                    $('td.cl_{{ $req->req_ID }}').html('{{ $det->name }}');
                                @endif
                            @endforeach

                            @foreach($courier as $co)
                                @if($co->courier_ID == $pro->courier_ID)
                                    @foreach($pinfo as $inf)
                                        @if($co->personal_info_ID == $inf->pinfo_ID)
                                            $('td.cour_{{ $req->req_ID }}').html('{{ $inf->pinfo_last_name }}, {{ $inf->pinfo_first_name }} {{ $inf->pinfo_middle_name }}');
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                            $('td.start_{{ $req->req_ID }}').html('{{ \Carbon\Carbon::parse($req->date_received)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($req->date_received)->format("l, h:i:s A").")" }}');
                            $('td.upd_{{ $req->req_ID }}').html('{{ \Carbon\Carbon::parse($pro->last_update)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($pro->last_update)->format("l, h:i:s A").")" }}');
                        @endif
                    @endforeach

                @endif
            @endforeach


        };
    </script>

@endsection
