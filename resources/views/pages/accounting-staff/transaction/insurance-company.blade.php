@extends('pages.accounting-staff.master')

@section('title','Insurance Accounts - Transaction| i-Insure')

@section('trans','active')

@section('transIns','active')

@section('transInsComp', 'active')

@section('body')

    <script>
    function formatDate(date)
    {
      var monthNames = [
        "January", "February", "March",
        "April", "May", "June", "July",
        "August", "September", "October",
        "November", "December"
      ];
      var arr = date.split('-');

      var day = arr[2];
      var monthIndex = arr[1]-1;
      var year = arr[0];

      return monthNames[monthIndex] + ' ' + day + ', ' + year;
    }

    function formatDate2(date)
    {
      var monthNames = [
        "January", "February", "March",
        "April", "May", "June", "July",
        "August", "September", "October",
        "November", "December"
      ];
      var arr = date.split('-');

      var day = arr[2];
      var monthIndex = arr[1]-1;
      var year = parseInt(arr[0]) + 1;

      return monthNames[monthIndex] + ' ' + day + ', ' + year;
    }
    </script>

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
                <div class="col-md-12">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href=""><i class="material-icons">home</i> Home</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/insurance-company.png')}}" style="height: 50px; width: 50px;"> Insurance Accounts - Company Client</h3>
                        <form id = "display" action = "/accounting-staff/transaction/insurance-details-company" method = "POST" style = "display: none;">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "id" name = "id" type="text" class="form-control">
                             </div>
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "acc_id" name = "acc_id" type="text" class="form-control">
                             </div>
                              <div class="col-md-4" style = "display: none;">
                                 <input id = "pay_id" name = "pay_id" type="text" class="form-control">
                             </div>
                        </form>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Polic Number</th>
                                        <th>Company Name</th>
                                        <th>Image</th>
                                        <th>Contact Person</th>
                                        <th>Insurance Company</th>
                                        <th>Sales Agent</th>
                                        <th>SOI</th> <!-- START OF INSURANCE -->
                                        <th>EOI</th> <!-- END OF INSURANCE -->
                                        <th class="col-md-1">Insurance Status</th>
                                        <th class="col-md-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                               @foreach($clist as $list)
                                @foreach($inscomp as $ccompany)
                                 @if($list->client_ID == $ccompany->comp_ID)
                                  @if($list->del_flag == 0)
                                   @if($ccompany->comp_type == 1)
                                    @foreach($insaccount as $iacc)
                                     @if($ccompany->comp_ID == $iacc->client_ID)
                                      @foreach($contact as $cnt)
                                       @if($ccompany->comp_cperson_ID == $cnt->cPerson_ID)
                                        @foreach($pInfo as $info)
                                         @if($cnt->personal_info_ID == $info->pinfo_ID)
                                         <tr>
                                            <td>{{ $iacc->policy_number }}</td>
                                            <td>{{$ccompany->comp_name}}</td>
                                            <td><img src="{!! '/image/contact_person/'.$info->pinfo_picture !!}" onerror="this.onerror=null;this.src='/image/default-image.png';" style="border:1px solid black;width:150px;height:150px;"></th>
                                            <td>{{ $info->pinfo_last_name.", ".$info->pinfo_first_name." ".$info->pinfo_middle_name }}</td> 
                                            <td>
                                            @foreach($inscomp as $icomp)
                                             @if($icomp->comp_ID == $iacc->insurance_company)
                                              {{$icomp->comp_name}}
                                             @endif
                                            @endforeach
                                            </td>
                                            <td>
                                            @foreach($pInfo as $ainfo)
                                             @foreach($sales as $agent)
                                              @if($ccompany->comp_sales_agent == $agent->agent_ID)
                                               @if($agent->personal_info_ID == $ainfo->pinfo_ID)
                                                {{ $ainfo->pinfo_last_name.", ".$ainfo->pinfo_first_name." ".$ainfo->pinfo_middle_name }}
                                               @endif
                                              @endif
                                             @endforeach
                                            @endforeach
                                            </td>                                       
                                            <td id = 'inc_{{$iacc->account_ID}}'>
                                            <script>
                                                var data = formatDate('{{ $iacc->inception_date }}'); $('#inc_{{$iacc->account_ID}}').text(data);
                                            </script>
                                            </td>
                                            <td id = 'exp_{{$iacc->account_ID}}'>
                                            <script>
                                                var data = formatDate2('{{ $iacc->inception_date }}'); $('#exp_{{$iacc->account_ID}}').text(data);
                                            </script>
                                            </td>
                                            <td>
                                              @foreach($paydetails as $pay)
                                               @if($pay->account_ID == $iacc->account_ID)
                                                @if($pay->payment_type == 1)
                                                 <span class="label bg-green">active</span>
                                                @endif
                                                @if($pay->payment_type == 2)
                                                 <span class="label bg-orange">on payment</span>
                                                @endif
                                               @endif
                                              @endforeach
                                              @if((strtotime('today') > strtotime("+1 year", strtotime("+7 day",strtotime($iacc->inception_date)))) && (strtotime('today') < strtotime("+1 year", strtotime($iacc->inception_date)))) 
                                               <span class="label bg-red">expiring</span>
                                              @endif
                                            </td>
                                            <td>
                                              @foreach($paydetails as $spay)
                                               @if($spay->account_ID == $iacc->account_ID)
                                               <button form = "display" type="submit" type="button" class="btn bg-light-blue waves-effect" data-id = "{{ $ccompany->comp_ID }}" data-acc = "{{$iacc->account_ID}}" data-pay = "{{$pay->payment_ID}}" onclick="
                                                $('#id').val($(this).data('id')); $('#acc_id').val($(this).data('acc')); $('#pay_id').val($(this).data('pay'));" data-toggle="tooltip" data-placement="left" title="View account details."><i class="material-icons">remove_red_eye</i>
                                               </button>
                                               @endif
                                               @if((strtotime('today') > strtotime("+1 year", strtotime("+7 day",strtotime($iacc->inception_date)))) && (strtotime('today') < strtotime("+1 year", strtotime($iacc->inception_date)))) 
                                               <button type="button" class="btn bg-orange waves-effect" onclick="window.document.location='{{ URL::asset('/accounting-staff/transaction/insurance-renew-company') }}';" data-toggle="tooltip" data-placement="left" title="Renew account."><i class="material-icons">refresh</i>
                                                    </button>
                                              @endif
                                              @endforeach
                                            </td>              
                                            <!-- <span class="label bg-red">expiring</span> -->
                                            <!-- <span class="label bg-green">active</span> -->
                                         </tr>
                                         @endif
                                        @endforeach
                                       @endif
                                      @endforeach
                                     @endif
                                    @endforeach
                                   @endif
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

@endsection
