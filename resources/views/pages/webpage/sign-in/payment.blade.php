@extends('pages.webpage.webmaster')

@section('title','Payment | i-Insure')

@section('payment','active')

@section('body')
<section>
<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}

.button1:hover {
    background-color: #4CAF50;
    color: white;
}
</style>
<script>
    function numberWithCommas(x) {
        x = (x * 100)/100; 
        x = x + '';
        num = x.split('.');
        variable = num[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        output = variable + "." + num[1];
        if (!num[1])
        {
            output = variable;
        }
        return output;
    }
</script>
<div class="content">
    <div class="container">
        <ol class="breadcrumb" style="padding-top: 0em;">
          <li><a href="/home">Home</a></li>
          <li class="active">Payment</li>
        </ol>
            <div class="row">
                <div class="col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 style="text-align: center;" id="name"><b></b></h3><br/>
                                <table class="table">
                                    <tbody>      
                                    <form id="payment" name="payment" action="/user/payment/new" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" id="pay_ID" name="pay_ID">
                                        <tr>
                                            <td>YOUR ACCOUNT POLICY NUMBER: </td>
                                            <td><b><input type="text" id = "policy_number" name="policy_number" style="width: 80%; border-color: #9e9e9e"></b></td>
                                        </tr>
                                    </form>
                                        <tr>
                                            <td>INSURANCE COMPANY: </td>
                                            <td><span id="insurance_company"><b></b></span></td>
                                        </tr>
                                        <tr>
                                            <td>INCEPTION DATE: </td>
                                            <td><span id="date_inception"><b></b></span></td>
                                        </tr>
                                        <tr>
                                            <td>END DATE: </td>
                                            <td><span id="date_end"><b></b></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 style="text-align: center;"><b> <img src="{{ URL::asset ('images/icons/quotation.png')}}" style="height: 50px; width: 50px;"> BILLING SUMMARY</b></h3><br/><br/>
                                <table class="table">
                                    <tbody>      
                                        <tr>
                                            <td style="text-align: center;">CURRENT BALANCE: </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center; font-size: 45px; color: orange;"><span id="current_balance"><b></b></span></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Due Date: <span id="due_date"></span></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Next Bill: <span id="next_bill"></span></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="col-xs-12">
                                    <center><button type="button" class="button button1" id ="pay_btn" form = "payment" onclick="
                                     $('#payment').submit();
                                    ">PAY MY BILL</button></center>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 style="text-align: center;"><b> <img src="{{ URL::asset ('images/icons/view-bill.png')}}" style="height: 50px; width: 50px;"> LIST OF BILL</b></h3><br/><br/>
                            <label style="text-align: center;">BOP Voucher No.: <span id="Vouch"></span></label><br/>
                                <table class="table" id="Bills">
                                    <thead>
                                      <tr>
                                        <th>BOP No.</th>
                                        <th>Bank</th>
                                        <th>Due Date</th>
                                        <th>Amount Due</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</section>

<script>
    $('#pay_btn').prop('disabled', true);
    $('#pay_btn').css({cursor: "not-allowed"});

    $('#policy_number').on('change textInput input', function(){
        @foreach($alist as $list)
         if('{{$list->insurance->policy_number}}' == $(this).val())
         {
             @if($list->account_ID == Session::get('accountID'))
              @if($list->insurance->payment_details->payment_status == 0)
               $('#pay_btn').prop('disabled', false);
               $('#pay_btn').css({cursor: ""});
               @if($list->insurance->client->client_type == 1)
               $('#name').html('<img src="{{ URL::asset ("images/icons/insurance-individual.png")}}" style="height: 50px; width: 50px;"> {{$list->insurance->client->individual->details->pinfo_last_name  or "error"}}, {{$list->insurance->client->individual->details->pinfo_first_name  or "error"}} {{$list->insurance->client->individual->details->pinfo_middle_name  or "error"}} ');
               @elseif($list->insurance->client->client_type == 0)
               $('#name').html('<img src="{{ URL::asset ("images/icons/insurance-company.png")}}" style="height: 50px; width: 50px;"> {{$list->insurance->client->company->comp_name or "error"}}');
               @endif
               $('#insurance_company').text('{{$list->insurance->inscomp->comp_name}}');
               $('#date_inception').text('{{\Carbon\Carbon::parse($list->insurance->inception_date)->format("F d, Y") }}');
               $('#date_end').text('{{date("F d, Y", strtotime("+1 Year", strtotime($list->insurance->inception_date)))}}');

               var total = '{{$list->insurance->payment_details->total}}';
               var counter = 0;
               var counter2 = 0;

               $('#Vouch').text('{{str_pad($list->insurance->payment_details->check_voucher->cv_ID,11, "0", STR_PAD_LEFT)}}')

               $('#Bills tbody tr').remove();

               @foreach($list->insurance->payment_details->check_voucher->payments as $pay)
                total = total - '{{$pay->amount_paid}}';
                <?php 
                $d1 = \Carbon\Carbon::parse($pay->due_date)->format("Y-m-d");
                $d2 = \Carbon\Carbon::parse($pay->paid_date)->format("Y-m-d");
                $d1 = DateTime::createFromFormat('Y-m-d', $d1);
                $d2 = DateTime::createFromFormat('Y-m-d', $d2);
                $length = $d1->diff($d2);
                ?>
                @if($pay->status == 0)
                $('#Bills tbody').append('<tr class="success"><td>{{str_pad($pay->payment_ID,5,"0",STR_PAD_LEFT)}}</td><td>{{$list->insurance->payment_details->bank->bank_name or ""}} - {{$list->insurance->payment_details->bank->address->add_city or ""}}</td><td>{{\Carbon\Carbon::parse($pay->due_date)->format("F d, Y")}}</td><td>₱ '+numberWithCommas('{{$pay->amount}}')+'</td><td>Paid</td></tr>');
                @elseif($pay->status == 1)
                $('#Bills tbody').append('<tr class="info"><td>{{str_pad($pay->payment_ID,5,"0",STR_PAD_LEFT)}}</td><td>{{$list->insurance->payment_details->bank->bank_name or ""}} - {{$list->insurance->payment_details->bank->address->add_city or ""}}</td><td>{{\Carbon\Carbon::parse($pay->due_date)->format("F d, Y")}}</td><td>₱ '+numberWithCommas('{{$pay->amount}}')+'</td><td>to be paid</td></tr>');
                @elseif($pay->status == 3)
                $('#Bills tbody').append('<tr class="danger"><td>{{str_pad($pay->payment_ID,5,"0",STR_PAD_LEFT)}}</td><td>{{$list->insurance->payment_details->bank->bank_name or ""}} - {{$list->insurance->payment_details->bank->address->add_city or ""}}</td><td>{{\Carbon\Carbon::parse($pay->due_date)->format("F d, Y")}}</td><td>₱ '+numberWithCommas('{{$pay->amount}}')+'</td><td>Delayed ({{$length->format("%d")}} day/s)</td></tr>');
                @endif
                if(counter == 1 && counter2 == 0)
                {
                    $('#next_bill').text('{{\Carbon\Carbon::parse($pay->due_date)->format("F d, Y")}}');
                    counter2 = 1;
                }
                if(counter == 0)
                {
                    @if($pay->amount_paid == "")
                        $('#due_date').text('{{\Carbon\Carbon::parse($pay->due_date)->format("F d, Y")}}');
                        $('#pay_ID').val('{{$pay->payment_ID}}');
                        counter = 1;
                    @endif                       
                }
               @endforeach
               $('#current_balance').text("₱ " + numberWithCommas(total));
               @else
                $('#insurance_company').text('');
                $('#date_inception').text('');
                $('#date_end').text('');
                $('#pay_btn').prop('disabled', true);
                $('#pay_btn').css({cursor: "not-allowed"});
              @endif
             @endif  
         }
        @endforeach
    });
</script>

<script type="text/javascript">
  $('.collapse').on('show.bs.collapse', function () {
    $('.collapse.in').each(function(){
        $(this).collapse('hide');
    });
  });
</script>

<script>
//according menu

$(document).ready(function()
{
    //Add Inactive Class To All Accordion Headers
    $('.accordion-header').toggleClass('inactive-header');
    
    //Set The Accordion Content Width
    var contentwidth = $('.accordion-header').width();
    $('.accordion-content').css({});
    
    //Open The First Accordion Section When Page Loads
    $('.accordion-header').first().toggleClass('active-header').toggleClass('inactive-header');
    $('.accordion-content').first().slideDown().toggleClass('open-content');
    
    // The Accordion Effect
    $('.accordion-header').click(function () {
        if($(this).is('.inactive-header')) {
            $('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
            $(this).toggleClass('active-header').toggleClass('inactive-header');
            $(this).next().slideToggle().toggleClass('open-content');
        }
        
        else {
            $(this).toggleClass('active-header').toggleClass('inactive-header');
            $(this).next().slideToggle().toggleClass('open-content');
        }
    });
    
    return false;
});
</script>
@endsection
