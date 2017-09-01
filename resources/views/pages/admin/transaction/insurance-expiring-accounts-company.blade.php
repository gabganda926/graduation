@extends('pages.admin.master')

@section('title','Insurance Accounts - Transaction| i-Insure')

@section('trans','active')

@section('transIns','active')

@section('transInsComp', 'active')

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
                    <button type="button" class="btn btn-block bg-deep-orange waves-effect left" onclick="window.document.location='{{ URL::asset('admin/transaction/insurance-company') }}';" >
                        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
                        <li><a href="{{ URL::asset('admin/transaction/insurance-company') }}"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Expiring Accounts (Company)</a></li>
                    </ol>
                </div>
            </div>
        <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="body">
                        <div class="list-group">
                            <a href="javascript:void(0);" id="phDetails" class="list-group-item active">
                                1. Company - Expiring Accounts
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card">
                        <div class="header">
                        <h3 style="text-align: center;"><img src="{{ URL::asset ('images/icons/expiring.png')}}" style="height: 50px; width: 50px;"> Expiring Accounts</h3>
                        <p style="text-align: center;">NOTE: This list updates daily.</p>
                            <ul class="header-dropdown m-r--5">
                                <li><button type="button" class="btn bg-green waves-effect right" style="position: right;" onclick="window.document.location='{{ URL::asset('admin/transaction/insurance-notification-list-company') }}';" data-toggle="tooltip" data-placement="bottom" title="View sent notifications">
                                    <i class="material-icons">assignment_turned_in</i><span style="font-size: 15px;"></span>
                                </button></li>
                            </ul>
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
                                         @if((strtotime('today') > strtotime("+1 year", strtotime("+7 day",strtotime($iacc->inception_date)))) && (strtotime('today') < strtotime("+1 year", strtotime($iacc->inception_date)))) 
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
                                                  @if((strtotime('today') > strtotime("+1 year", strtotime("-7 day",strtotime($iacc->inception_date)))) && (strtotime('today') < strtotime("+1 year", strtotime($iacc->inception_date)))) 
                                                   <span class="label bg-red">expiring</span>
                                                  @endif
                                                  @if((strtotime('today') > strtotime("+1 year", strtotime($iacc->inception_date)))) 
                                                   <span class="label bg-red">expired</span>
                                                  @endif
                                            </td>
                                            <td>
                                              @foreach($paydetails as $spay)
                                               @if($spay->account_ID == $iacc->account_ID)
                                               {{$spay->account_ID}}
                                               <button form = "display" type="submit" type="button" class="btn bg-light-blue waves-effect" data-id = "{{ $ccompany->comp_ID }}" data-acc = "{{$iacc->account_ID}}" data-pay = "{{$pay->payment_ID}}" onclick="
                                                $('#id').val($(this).data('id')); $('#acc_id').val($(this).data('acc')); $('#pay_id').val($(this).data('pay'));" data-toggle="tooltip" data-placement="left" title="View account details."><i class="material-icons">remove_red_eye</i>
                                               </button>
                                               @endif
                                              @endforeach
                                            </td>              
                                            <!-- <span class="label bg-red">expiring</span> -->
                                            <!-- <span class="label bg-green">active</span> -->
                                         </tr>
                                         @endif
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
