@extends('pages.webpage.webmaster')

@section('title','Payment | i-Insure')

@section('payment','active')

@section('body')
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
                        <div class="row">
                            <div class="col-xs-6">
                                <br/><label><small>Deposit Date: </small></label>
                                <input type="date" name="" style="width: 95%">
                            </div>
                            <div class="col-xs-6">
                                <br/><label><small>Deposit Time: </small></label>
                                <input type="time" name="" style="width: 95%">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <br/><label><small>Remittance Date: </small></label>
                                <input type="date" name="" style="width: 95%" disabled="disable">
                            </div>
                            <div class="col-xs-6">
                                <br/><label><small>Remittance Time: </small></label>
                                <input type="time" name="" style="width: 95%" disabled="disable">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <br/><label><small>Due Date: </small></label>
                                <input type="text" name="" style="width: 95%" disabled="disable" value="August 4, 2017">
                            </div>
                            <div class="col-xs-6">
                                <br/><label><small>Bank: </small></label>
                                <input type="text" name="" style="width: 95%" disabled="disable" value="Banco De Oro - Antipolo City">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <br/><label><small>Payment for Check Number: </small></label>
                                <input type="text" name="" style="width: 95%">
                            </div>
                            <div class="col-xs-6">
                                <br/><label><small>Amount Due: </small></label>
                                <input type="text" name="" style="width: 95%" disabled="disable" value="Php 7,000.50">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <br/><label><small>Amount Paid: </small></label>
                                <input type="number" name="" style="width: 95%">
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
                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview" style="width: 95%" /> <!-- rename it -->
                                            </div>
                                        </span>
                                    </div><!-- /input-group image-preview [TO HERE]--> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <br/><br/><button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#succ">SUBMIT MY PAYMENT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-5">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 style="text-align: center;"><b> <img src="{{ URL::asset ('images/icons/view-bill.png')}}" style="height: 50px; width: 50px;"> LIST OF BILLS</b></h3><br/><br/>
                            <label style="text-align: center;">Check Voucher No.: VOUCHER-12823u23</label><br/>
                                <div class="table-responsive">
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

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 style="text-align: center;"><b> <img src="{{ URL::asset ('images/icons/view-bill.png')}}" style="height: 50px; width: 50px;"> REMITTED PAYMENTS</b></h3><br/><br/>
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr>
                                <th>Check No.</th>
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
@endsection
