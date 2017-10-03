@extends('pages.admin.master')

@section('title','Insurance Accounts - Transaction| i-Insure')

@section('trans','active')

@section('transComplaint','active')

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
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('admin/transaction/complaint-online') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('admin/transaction/complaint-online') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Pending Complaints</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="acce" class="list-group-item active">
                                Complaint List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/1.png')}}" style="height: 50px; width: 50px;"><b> Complaint List </b></h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Priority</th>
                                        <th>Complaint #</th>
                                        <th>Complaint Type</th>
                                        <th class="col-md-12">Complaint Details</th>
                                        <th>Complainant</th>
                                        <th class="col-md-2">Date Received</th>
                                        <th>Assigned to</th>
                                        <th>Date Assigned</th>
                                        <th class="col-md-1">Status</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($action as $act)
                                     @foreach($complaints as $comp)
                                      @if($act->complaint_ID == $comp->complaint_ID)
                                       @if($comp->status == 1)
                                        <tr>
                                            <td>
                                             @if($act->status == 0)
                                              High
                                             @elseif($act->status == 1)
                                              Medium
                                             @elseif($act->status == 2)
                                              Low
                                             @endif
                                            </td>
                                            <td>{{str_pad($comp->complaint_ID,11, "0", STR_PAD_LEFT)}}</td>
                                            <td>{{$comp->complaintType_name}}</td>
                                            <td>{{$comp->complaint}}</td>
                                            <td>{{$comp->name}}</td>
                                            <td>{{\Carbon\Carbon::parse($comp->date_sent)->format("M d,Y h:i:s")}}</td>
                                            <td>Jeon Jungkoook</td>
                                            <td>{{\Carbon\Carbon::parse($comp->date_updated)->format("M d,Y h:i:s")}}</td>
                                            <td><span id = "{{$comp->complaint_ID}}_status"></span>
                                                <div id = "{{$comp->complaint_ID}}_stat" style="display:none;">
                                                    <select id = "{{$comp->complaint_ID}}_cntrl" name = "days" class="form-control show-tick">
                                                    <option selected value = "" style = "display: none;">-- Select Status --</option>
                                                    <option value = "2">settled</option>
                                                    <option value = "3">unsettled</option>
                                                </select>
                                                </div>
                                                <button id="{{$comp->complaint_ID}}_save" style="display:none;" type="button" class="btn bg-green btn-block waves-effect stat_save" onclick="
                                                if($('#{{$comp->complaint_ID}}_cntrl').val() == 2)
                                                    $('#{{$comp->complaint_ID}}_status').html('<span class=\'label bg-green\'>settled</span>');
                                                if($('#{{$comp->complaint_ID}}_cntrl').val() == 3)
                                                    $('#{{$comp->complaint_ID}}_status').html('<span class=\'label bg-red\'>unsettled</span>');
                                                $('#{{$comp->complaint_ID}}_stat').hide(200);
                                                $('#{{$comp->complaint_ID}}_save').hide(200);"
                                                data-id = "{{$comp->complaint_ID}}">SAVE
                                                </button>
                                            </td>
                                            <td><button type="button" class="btn bg-blue waves-effect view" style="position: right;"  data-toggle="tooltip" data-placement="left" title="View Details" data-id = "{{$comp->complaint_ID}}">
                                                <i class="material-icons">security</i><span style="font-size: 15px;">
                                            </button>
                                            <button type="button" class="btn bg-teal waves-effect" style="position: right;" data-toggle="tooltip" data-placement="left" title="Update Status" onclick="
                                                $('#{{$comp->complaint_ID}}_stat').show(200);
                                                $('#{{$comp->complaint_ID}}_save').show(200);">
                                                <i class="material-icons">settings</i><span style="font-size: 15px;">
                                            </button>
                                            </td>
                                             <script>
                                                if('{{$comp->status}}' == 1)
                                                    $('#{{$comp->complaint_ID}}_status').html('<span class=\'label bg-orange\'>action ongoing</span>');
                                                if('{{$comp->status}}' == 2)
                                                    $('#{{$comp->complaint_ID}}_status').html('<span class=\'label bg-green\'>settled</span>');
                                                if('{{$comp->status}}' == 3)
                                                    $('#{{$comp->complaint_ID}}_status').html('<span class=\'label bg-red\'>unsettled</span>');
                                             </script>
                                        </tr>
                                       @endif
                                      @endif
                                     @endforeach
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
    
    <form id = "view" name = "view" action="complaint-list/view" method="GET">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-md-4" style = "display: none;">
           <input id = "view_ID" name = "ID" type="text" class="form-control" pattern="[A-Za-z'-]">
        </div>
    </form>

    <script>
        $('.view').on('click', function(){
            var id = $(this).data('id');
            $('#view_ID').val(id);
            $('#view').submit();
        });

        $('.stat_save').on('click', function(){
              var id = $(this).data('id');
              var status = $('#'+id+'_cntrl').val();
              $.ajax({

                  type: 'POST',
                  url: '/admin/transaction/complaint-list/update',
                  data: {ID:id,stat:status},
                  success:function(xhr){
                      window.location.reload();
                      $.notify('Process Updated', 
                        { 
                          globalPosition: 'top center',
                          autoHideDelay: 1500, 
                          className: 'success',
                        }
                      );
                  },
                    error:function(xhr, ajaxOptions, thrownError,data){
                      $.notify('There seems to be a problem.', 
                        { 
                          globalPosition: 'top center',
                          autoHideDelay: 1500, 
                          className: 'error',
                        }
                      );
                  }
              });
        });
    </script>

@endsection
