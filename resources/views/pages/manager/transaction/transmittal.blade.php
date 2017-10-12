@extends('pages.manager.master')

@section('title','Transmittal - Transaction| i-Insure')

@section('trans','active')

@section('transTrans','active')

@section('transRequest','active')

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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href=""><i class="material-icons">home</i> Home</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/delivery.png')}}" style="height: 50px; width: 50px;"> <b> Transmittal Requests </b></h3>
                        <p style="text-align: center;"><b>NOTE: All accepted requests will be sent back to the administrator for the transmittal of documents, while all the rejected requests will be deleted.</b></p>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Request #</th>
                                        <th>Client</th>
                                        <th>Requested Documents
                                        <th class="col-md-1">Status</th>
                                        <th class="col-md-1">Date Received</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($request as $req)
                                     @if($req->status == 6)
                                     <tr>
                                        <td>{{$req->req_ID}}</td>
                                        <td>
                                        @foreach($details as $dts)
                                         @if($dts->req_ID == $req->req_ID)
                                          {{$dts->name}}
                                         @endif
                                        @endforeach
                                        </td>
                                        <td>
                                            <ul>
                                            @foreach($documents as $doc)
                                             @if($doc->req_ID == $req->req_ID)
                                              <li>{{$doc->document}}</li>
                                             @endif
                                            @endforeach
                                            </ul>
                                        </td>
                                        <td><span class="label bg-green">new</span></td>
                                        <td>{{\Carbon\Carbon::parse($req->date_recieved)->format("M d,Y H:i:s")}}</td>
                                        <td><button type="button" class="btn bg-blue waves-effect view" style="position: right;" onclick="window.document.location='{{ URL::asset('admin/transaction/transmittal-info-request') }}';" data-toggle="tooltip" data-placement="left" title="View details" data-id = "{{$req->req_ID}}">
                                            <i class="material-icons">security</i><span style="font-size: 15px;">
                                        </button>
                                        <button type="button" class="btn bg-green waves-effect approve" style="position: right;" onclick="" data-toggle="tooltip" data-placement="left" title="Accept - Forward to Admin" data-id = "{{$req->req_ID}}">
                                            <i class="material-icons">thumb_up</i><span style="font-size: 15px;">
                                        </button>
                                        <button type="button" class="btn bg-red waves-effect disapprove" style="position: right;"  data-toggle="tooltip" data-placement="left" title="Reject" data-id = "{{$req->req_ID}}">
                                            <i class="material-icons">thumb_down</i><span style="font-size: 15px;">
                                        </button>
                                        </td>
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
    
    <form id = "view" name = "view" action="transmittal/view" method="GET">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-md-4" style = "display: none;">
           <input id = "view_ID" name = "ID" type="text" class="form-control" pattern="[A-Za-z'-]">
        </div>
    </form>
    
    <script>
        $('.approve').on('click', function(){
              $.ajax({

                  type: 'POST',
                  url: '/manager/transaction/transmittal/approve',
                  data: {ID:$(this).data('id')},
                  success:function(xhr){
                      window.location.reload();
                      $.notify('Transmittal approved', 
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

        $('.disapprove').on('click', function(){
              $.ajax({

                  type: 'POST',
                  url: '/manager/transaction/transmittal/disapprove',
                  data: {ID:$(this).data('id')},
                  success:function(xhr){
                      window.location.reload();
                      $.notify('Transmittal disapproved', 
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

        $('.view').on('click', function(){
            var id = $(this).data('id');
            $('#view_ID').val(id);
            $('#view').submit();
        });

    </script>
@endsection
