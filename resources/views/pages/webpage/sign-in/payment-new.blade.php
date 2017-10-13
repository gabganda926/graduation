@extends('pages.webpage.webmaster')

@section('title','Payment | i-Insure')

@section('payment','active')

@section('body')
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
<section>
<div class="content">
    <div class="container">
        <ol class="breadcrumb">
          <li><a href="/user/home">Home</a></li>
          <li><a href="/user/payment">Payment</a></li>
          <li class="active">New Payment</li>
        </ol>

        <div class="row">
            <div class="col-xs-7">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 style="text-align: center;"><b> <img src="{{ URL::asset ('images/icons/payment.png')}}" style="height: 50px; width: 50px;"> PAY MY BILL</b></h3><br/><br/>
                    <form id="add" name = "add" action = "/user/payment/new/send" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-xs-6">
                                <br/><label><small>Deposit Date: </small></label>
                                <input type="date" id="deposit_date" name="deposit_date" style="width: 95%">
                            </div>
                            <div class="col-xs-6">
                                <br/><label><small>Deposit Time: </small></label>
                                <input type="time" id="deposit_time" name="deposit_time" style="width: 95%">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <br/><label><small>Remittance Date: </small></label>
                                <input type="date" id="remittance_date" name="remittance_date" style="width: 95%" readonly>
                            </div>
                            <div class="col-xs-6">
                                <br/><label><small>Remittance Time: </small></label>
                                <input type="time" id="remittance_time" name="remittance_time" style="width: 95%" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <br/><label><small>Due Date: </small></label>
                                <input type="text" id="due_date" name="due_date" style="width: 95%" readonly>
                            </div>
                            <div class="col-xs-6">
                                <br/><label><small>Bank: </small></label>
                                <input type="text" id="bank" name="bank" style="width: 95%" readonly value="{{$account->payment_details->bank->bank_name or ''}} - {{$account->payment_details->bank->address->add_city}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <br/><label><small>Payment for Check Number: </small></label>
                                <input type="text" id="check_number" name="check_number" style="width: 95%">
                            </div>
                            <div class="col-xs-6">
                                <br/><label><small>Amount Due: </small></label>
                                <input type="text" id="amount_due" name="amount_due" style="width: 95%" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <br/><label><small>Amount Paid: </small></label>
                                <input type="number" id="amount_paid" name="amount_paid" style="width: 95%">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-5">
                                <br/><label><small>Deposit Slip (Image only): </small></label>
                                <br/>
                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                    <div class="input-group image-preview">
                                        <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                        <span class="input-group-btn">
                                            <!-- image-preview-clear button -->
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <!-- image-preview-input -->
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input id="file" name="file" type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview" style="width: 95%" /> <!-- rename it -->
                                            </div>
                                        </span>
                                    </div><!-- /input-group image-preview [TO HERE]--> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <br/><br/><button type="button" class="btn btn-block btn-success" id="sendbtn" onclick="
                                if($('#add').valid())
                                {
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
                                          $('#succ').modal('show');
                                          $('#add').submit();
                                        } else {
                                            swal({
                                            title: 'Cancelled',
                                            type: 'warning',
                                            timer: 500,
                                            showConfirmButton: false
                                            });
                                        }
                                      });
                                }
                                ">SUBMIT MY PAYMENT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <div class="col-xs-5">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 style="text-align: center;"><b> <img src="{{ URL::asset ('images/icons/view-bill.png')}}" style="height: 50px; width: 50px;"> LIST OF BILLS</b></h3><br/><br/>
                            <label style="text-align: center;">BOP Voucher No.: <span id="Vouch"></span></label><br/>
                                <div class="table-responsive">
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

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 style="text-align: center;"><b> <img src="{{ URL::asset ('images/icons/view-bill.png')}}" style="height: 50px; width: 50px;"> REMITTED PAYMENTS</b></h3><br/><br/>
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr>
                                <th>BOP No.</th>
                                <th>Bank</th>
                                <th>Due Date</th>
                                <th>Amount Due</th>
                                <th>Amount Paid</th>
                                <th>Remittance Date/Time</th>
                                <th>Deposit Slip</th>
                              </tr>
                            </thead>
                            <tbody>      
                              <tr class="success">
                                <td>12232</td>
                                <td>Banco De Oro - Antipolo City</td>
                                <td>July 4, 2017</td>
                                <td>Php 7,000.50</td>
                                <td>Php 7,000.50</td>
                                <td>July 1, 2017 11:09:10 PM</td>
                                <td><button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#viewFile">View</button></td>
                              </tr>
                            </tbody>
                          </table>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CHOOSE INST MODAL -->
            <div class="modal fade" id="viewFile" role="dialog" data-backdrop="false">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #ffab00">
                            <h3 class="modal-title">Deposit Slip</h3>
                        </div>
                        <div class="modal-body">
                            IMAGE HERE
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- #END# ADD INST MODAL -->

<!-- CHOOSE INST MODAL -->
            <div class="modal fade" id="succ" role="dialog" data-backdrop="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Success!</h3>
                        </div>
                        <div class="modal-body">
                            Your payment has been submitted! Please wait for our representative's response for your payment's confirmation after a few couple of days. (Maximum of 3-4 working days.)
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- #END# ADD INST MODAL -->
</section>

<script>

        $('#amount_paid').prop('disabled', true);
        $('#amount_paid').css({cursor: "not-allowed"});
        $('#sendbtn').prop('disabled', true);
        $('#sendbtn').css({cursor: "not-allowed"});
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();

        function parseDate(input) {
          var parts = input.match(/(\d+)/g);
          // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
          return new Date(parts[0], parts[1]-1, parts[2]); // months are 0-based
        }

        Date.prototype.addDays = function(days) {
          var dat = new Date(this.valueOf());
          dat.setDate(dat.getDate() + days);
          return dat;
        } 

        function pad (str, max) {
          str = str.toString();
          return str.length < max ? pad("0" + str, max) : str;
        }

        if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = yyyy+'-'+mm+'-'+dd;

        var myVar1=setInterval(function(){myTimer1()},1000);

        function myTimer1() {
            var f = new Date();
           $('#remittance_date').val(today);
           $('#remittance_time').val(f.toLocaleTimeString([],{hour: '2-digit', minute:'2-digit', second:'2-digit', hour12: false}));
        }


       $('#Vouch').text('{{str_pad($account->payment_details->check_voucher->cv_ID,11, "0", STR_PAD_LEFT)}}')

       $('#Bills tbody tr').remove();

       @foreach($account->payment_details->check_voucher->payments as $pay)
        <?php 
        $d1 = \Carbon\Carbon::parse($pay->due_date)->format("Y-m-d");
        $d2 = \Carbon\Carbon::parse($pay->paid_date)->format("Y-m-d");
        $d1 = DateTime::createFromFormat('Y-m-d', $d1);
        $d2 = DateTime::createFromFormat('Y-m-d', $d2);
        $length = $d1->diff($d2);
        ?>
        @if($pay->status == 0)
        $('#Bills tbody').append('<tr class="success"><td>{{str_pad($pay->payment_ID,5,"0",STR_PAD_LEFT)}}</td><td>{{$account->payment_details->bank->bank_name or ""}} - {{$account->payment_details->bank->address->add_city or ""}}</td><td>{{\Carbon\Carbon::parse($pay->due_date)->format("F d, Y")}}</td><td>₱ '+numberWithCommas('{{$pay->amount}}')+'</td><td>Paid</td></tr>');
        @elseif($pay->status == 1)
        $('#Bills tbody').append('<tr class="info"><td>{{str_pad($pay->payment_ID,5,"0",STR_PAD_LEFT)}}</td><td>{{$account->payment_details->bank->bank_name or ""}} - {{$account->payment_details->bank->address->add_city or ""}}</td><td>{{\Carbon\Carbon::parse($pay->due_date)->format("F d, Y")}}</td><td>₱ '+numberWithCommas('{{$pay->amount}}')+'</td><td>to be paid</td></tr>');
        @elseif($pay->status == 3)
        $('#Bills tbody').append('<tr class="danger"><td>{{str_pad($pay->payment_ID,5,"0",STR_PAD_LEFT)}}</td><td>{{$account->payment_details->bank->bank_name or ""}} - {{$account->payment_details->bank->address->add_city or ""}}</td><td>{{\Carbon\Carbon::parse($pay->due_date)->format("F d, Y")}}</td><td>₱ '+numberWithCommas('{{$pay->amount}}')+'</td><td>Delayed ({{$length->format("%d")}} day/s)</td></tr>');
        @endif
       @endforeach

        $('#check_number').on('change textInput input', function(){
            var num = $(this).val();
            var found = 0;
            @foreach($account->payment_details->check_voucher->payments as $pay)
             @if($pay->status == 1)
             if(num == '{{$pay->payment_ID}}')
             {
                $('#amount_due').val("₱ "+numberWithCommas("{{$pay->amount}}"));
                $('#due_date').val("{{\Carbon\Carbon::parse($pay->due_date)->format('F d, Y')}}");
                $('#amount_paid').prop('disabled', false);
                $('#amount_paid').css({cursor: ""});
                found = 1;
             }
             @endif
            @endforeach
            if(found == 0)
            {
                $('#amount_due').val("");
                $('#due_date').val("");
                $('#amount_paid').val('');
                $('#amount_paid').prop('disabled', true);
                $('#amount_paid').css({cursor: "not-allowed"});
                $('#sendbtn').prop('disabled', true);
                $('#sendbtn').css({cursor: "not-allowed"});
            }
        });

        $('#amount_paid').on('change textInput input', function(){
            if($(this).val() >= $('#amount_due').val().replace(/[^0-9\.]/g,''))
            {
                $('#sendbtn').prop('disabled', false);
                $('#sendbtn').css({cursor: ""});
                $("#amount_paid").parent().next(".validation").remove();
            }
            else
            {   $("#amount_paid").parent().next(".validation").remove();
                $('#amount_paid').parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Value must be greater or equals to the amount requred</div>");
                $('#sendbtn').prop('disabled', true);
                $('#sendbtn').css({cursor: "not-allowed"});
            }
        });
</script>

<script>

$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});

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

<script>
            $.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[A-Za-z][A-Za-z0-9 '-.]*$/i.test(value);
             }, "This field must contain only letters, numbers, dashes, space, apostrophe or dot.");
            $.validator.addMethod("alpha", function(value, element) {
                return this.optional(element) || /^[A-Za-z][A-Za-z '-.]*$/i.test(value);
             }, "This field must contain only letters, space, dash, apostrophe or dot.");
            $.validator.addMethod("blcknumber", function(value, element) {
                return this.optional(element) || /^[A-Za-z0-9][A-Za-z0-9 '-.]*$/i.test(value);
             }, "This field must contain only letters, numbers, space, dash, apostrophe or dot.");


        // Wait for the DOM to be ready
            $(function() {
              // Initialize form validation on the registration form.
              // It has the name attribute "registration"
              $("form[name='add']").validate({
                // Specify validation rules
                rules: {
                  // The key name on the left side is the name attribute
                  // of an input field. Validation rules are defined
                  // on the right side
                  deposit_date:{
                    required: true
                  },
                  amount_paid:{
                    required: true
                  },
                  file:{
                    required: true
                  }
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                  form.submit();
                }
              });
            });
    </script>
@endsection
