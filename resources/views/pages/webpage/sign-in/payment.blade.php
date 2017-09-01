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
                            <h3 style="text-align: center;"><b> <img src="{{ URL::asset ('images/icons/insurance-individual.png')}}" style="height: 50px; width: 50px;"> Ma. Gabriella Tan Rola</b></h3><br/>
                                <table class="table">
                                    <tbody>      
                                        <tr>
                                            <td>YOUR ACCOUNT POLICY NUMBER: </td>
                                            <td><b>MCAR-12345</b></td>
                                        </tr>
                                        <tr>
                                            <td>INSURANCE COMPANY: </td>
                                            <td><b>FPG INSURANCE</b></td>
                                        </tr>
                                        <tr>
                                            <td>INCEPTION DATE: </td>
                                            <td><b>October 21, 2017</b></td>
                                        </tr>
                                        <tr>
                                            <td>END DATE: </td>
                                            <td><b>October 21, 2018</b></td>
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
                                            <td style="text-align: center; font-size: 45px; color: orange;"><b>PHP 10,000.80</b></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Due Date: August 21, 2017</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Next Bill: September 21, 2017</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="col-xs-12">
                                    <center><button type="button" class="button button1" onclick="window.document.location='{{ URL::asset('/user/payment/new') }}';">PAY MY BILL</button></center>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 style="text-align: center;"><b> <img src="{{ URL::asset ('images/icons/view-bill.png')}}" style="height: 50px; width: 50px;"> LIST OF BILLS</b></h3><br/><br/>
                            <label style="text-align: center;">Check Voucher No.: VOUCHER-12823u23</label><br/>
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>Check No.</th>
                                        <th>Bank</th>
                                        <th>Due Date</th>
                                        <th>Amount Due</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>      
                                      <tr class="success">
                                        <td>12232</td>
                                        <td>Banco De Oro - Antipolo City</td>
                                        <td>July 4, 2017</td>
                                        <td>Php 7,000.50</td>
                                        <td>Paid</td>
                                      </tr>
                                      <tr class="danger">
                                        <td>12233</td>
                                        <td>Banco De Oro - Antipolo City</td>
                                        <td>August 4, 2017</td>
                                        <td>Php 7,000.50</td>
                                        <td>Delayed (1 day/s)</td>
                                      </tr>
                                      <tr class="info">
                                        <td>12234</td>
                                        <td>Banco De Oro - Antipolo City</td>
                                        <td>September 4, 2017</td>
                                        <td>Php 7,000.50</td>
                                        <td>to be paid</td>
                                      </tr>
                                      <tr class="info">
                                        <td>12234</td>
                                        <td>Banco De Oro - Antipolo City</td>
                                        <td>October 4, 2017</td>
                                        <td>Php 7,000.50</td>
                                        <td>to be paid</td>
                                      </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</section>

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
