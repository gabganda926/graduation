@extends('pages.webpage.webmaster')

@section('title','Notifications | i-Insure')

@section('inbox','active')

@section('body')
<section>
<div class="content">
    <div class="container">
        <h1 style="text-align: center;"><img src="{{ URL::asset ('images/icons/delivery-list.png')}}" style="height: 50px; width: 50px;"> Notifications</h1><br/>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @foreach($notification as $notif)
                             @if($notif->account_ID == Session::get('accountID'))
                            <div id="{{$notif->notification_ID}}">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <input type="button" class="btn btn-block btn-info" value="BACK" onclick="
                                      $('#tabs').show(800);
                                      $(this).parents('#{{$notif->notification_ID}}').hide(800);
                                      ">
                                    </div>
                                    <div class="col-xs-10">
                                        <button type="button" class="btn btn-danger" style="float: right;"><span class="glyphicon glyphicon-trash"> Delete</span></button><br/><br/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-2">
                                      
                                    </div>
                                    <div class="col-xs-10"><br/><br/>

                                        <p class="message-details">
                                      {!! html_entity_decode(stripslashes($notif->content)) !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                             @endif
                            @endforeach
                            <div id="tabs">
                                <div class="mail-option">
                                     <div class="chk-all">
                                         <input type="checkbox" class="mail-checkbox mail-group-checkbox">
                                         <div class="btn-group">
                                             <a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">
                                                 All
                                             </a>
                                         </div>
                                    </div>
                                </div>
                                <table class="table table-inbox table-hover">
                                    <tbody>
                                      @foreach($notification as $notif)
                                       @if($notif->account_ID == Session::get('accountID'))
                                        <tr class="
                                        @if($notif->status == 0)
                                         unread
                                        @endif">
                                            <td class="inbox-small-cells">
                                                <input type="checkbox" id = "{{$notif->notification_ID}}" class="mail-checkbox">
                                            </td>
                                            <td class="inbox-small-cells"></i></td>
                                            <td class="view-message  dont-show">System</td>
                                            <td class="view-message"  onclick="
                                        $('#{{$notif->notification_ID}}').show(800);
                                        $(this).parents('#tabs').hide(800);
                                        "><u>{{$notif->subject}}</u></td>
                                            <td class="view-message  inbox-small-cells"></i></td>
                                            <td class="view-message  text-right">{{ \Carbon\Carbon::parse($notif->date_sent)->format("F d, Y") }} {{ "(".\Carbon\Carbon::parse($notif->date_sent)->format("h:i:s A").")" }}
                                            </td>
                                        </tr>
                                       @endif
                                      @endforeach
                                  </tbody>
                              </table>
                            </div> <!-- end of tabs -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>

<script>

  window.onload = function() {
    @foreach($notification as $notif)
       @if($notif->account_ID == Session::get('accountID'))
          document.getElementById('{{$notif->notification_ID}}').style.display = 'none';
     @endif
    @endforeach
        };

  $('.btn-success').on('click', function(){
    var id =  $(this).data('id');
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
        $.ajax({

                  type: 'POST',
                  url: '/user/notifications/approve',
                  data: {ID:id},
                  success:function(xhr){
                      window.location.reload();
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
      } else {
          swal({
          title: 'Cancelled',
          type: 'warning',
          timer: 500,
          showConfirmButton: false
          });
      }
    });

  });    



  $('.btn-danger').on('click', function(){
    var id =  $(this).data('id');
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
        $.ajax({
                  type: 'POST',
                  url: '/user/notifications/disapprove',
                  data: {ID:id},
                  success:function(xhr){
                      window.location.reload();
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
      } else {
          swal({
          title: 'Cancelled',
          type: 'warning',
          timer: 500,
          showConfirmButton: false
          });
      }
    });

  });    
</script>
@endsection
