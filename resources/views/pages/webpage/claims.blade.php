@extends('webmaster')

@section('title','Claims | i-Insure')

@section('claims','active')

@section('body')
<section>
<div class="content">
    <div class="container">
        <ol class="breadcrumb">
          <li><a href="/home">Home</a></li>
          <li class="active">Claims</li>
        </ol>
        <div class="row">
            <h1><b>FILE A CLAIM ONLINE</b></h1><br/>
                <div style="float: left; width: 43%;" >
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.6420020230535!2d121.08669821407172!3d14.619458389790465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b8236cdbddf1%3A0x512e36886ed20edf!2sNutriix+%2F+Compreline+Insurance+Services!5e0!3m2!1sen!2sph!4v1501403179768" width="450" height="450" frameborder="0" style="border:0" allowfullscreen></iframe><br/><br/>

                    <div class="panel panel-default" style="background-color: #424242; width: 90%">
                        <div class="panel-heading" style="background-color: #424242; color: white">CONTACT US</div>
                        <div class="panel-body" style="background-color: #424242; color: #e0e0e0">  Askjshdkjahd. jhdkshdkjasedhsjhbdckjsdkshdkusahdkjasdahskjdcnmx shdbkjsahdkwqjd wqiudkqwjd.</div>
                        <div class="panel-footer" style="background-color: #424242; color: #e0e0e0">  
                            <i class="glyphicon glyphicon-phone-alt"></i><span>  (02) 212-0000</span><br/>
                            <i class="glyphicon glyphicon-briefcase"></i><span>  compreline@insurance.com</span>
                        </div>
                    </div>
                </div>

                <div style="float: right; width: 57%">
                    <h3><b>Online Claim Notification</b></h3><br/>
                    <label><small>Welcome to the Online Claim Notification of Compreline Insurance! Please complete the form below to facilitate the notification of your claim. Our Representative will immediately get in touch with you regarding this claim. Thank you.</small></label><br/><br/>

                    <div>
                        <label><small><b>A. Policy Holder Details</b></small></label><br/>
                        <div class="col-xs-12">
                            <label for="1"><small>Insurance Company: </small></label>
                            <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                <option value="1">Company1</option>
                                <option value="2">Company2</option>
                                <option value="3">Company3</option>
                            </select>
                        </div>
                        <div class="col-xs-12">
                            <br/><label for="1"><small>Policy Number: </small></label>
                            <input type="text" name="plate" style="width: 100%">
                        </div><br/>
                        <div class="sky_form1 col col-xs-12">
                            <ul>
                                <br/><li><label><small>Client Type: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small></label></li>
                                <li><label class="radio left"><input type="radio" name="radio" data-toggle="collapse" data-target="#individualType"><i></i>Individual&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></li>
                                <li><label class="radio"><input type="radio" name="radio" data-toggle="collapse" data-target="#companyType"><i></i>Company</label></li><br/><br/>
                                <div class="clearfix"></div>
                            </ul>
                        </div>

                <!-- PAG PINILI YUNG INDIVIDUAL -->
                        <div class="collapse fade" id="individualType">
                            <div class="row">
                                <div class="col-xs-12">
                                    <br/><br/><label for="1"><small><b>Personal Information: </b></small></label> <br/>
                                </div>
                                    <div class="col-xs-12">
                                        <label for="1"><small>First Name: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Middle Name: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Last Name: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>
                            </div>


                            <div class="row">
                                <div class="col-xs-12">
                                <br/><br/><label for="1"><small><b>Address: </b></small></label>
                                </div>
                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>No./Building/Street: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Village/Subdivision: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Municipality/City: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Province: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                <div class="col-xs-12">
                                <br/><br/><label for="1"><small><b>Contact Details: </b></small></label> <br/>
                                </div>
                                    <div class="col-xs-12">
                                        <label for="1"><small>Cellphone Number: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Cellphone Number (Alternate): </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Telephone Number: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Email: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>
                            </div>
                        </div> <!-- END OF INDIVIDUAL ROW COLLAPSE--> 

                <!-- PAG PINILI YUNG COMPANY -->
                        <div class="collapse fade" id="companyType">
                            <div class="row">
                                <div class="col-xs-12">
                                <br/><br/><label for="1"><small><b>Company Details: </b></small></label> <br/>
                                </div>
                                    <div class="col-xs-12">
                                        <label for="1"><small>Company Name: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                <div class="col-xs-12">
                                <br/><br/><label for="1"><small><b>Company Address: </b></small></label> <br/>
                                </div>
                                    <div class="col-xs-12">
                                        <label for="1"><small>No./Building/Street: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Village/Subdivision: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Municipality/City: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Province: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                <div class="col-xs-12">
                                <br/><br/><label for="1"><small><b>Company Contact Details: </b></small></label> <br/>
                                </div>
                                    <div class="col-xs-12">
                                        <label for="1"><small>Cellphone Number: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Cellphone Number (Alternate): </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Telephone Number: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Email: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                <div class="col-xs-12">
                                <br/><br/><label for="1"><small><b>Contact Person Information: </b></small></label> <br/>
                                </div>
                                    <div class="col-xs-12">
                                        <label for="1"><small>First Name: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Middle Name: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Last Name: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                <div class="col-xs-12">
                                <br/><br/><label for="1"><small><b>Address: </b></small></label> <br/>
                                </div>
                                    <div class="col-xs-12">
                                        <label for="1"><small>No./Building/Street: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Village/Subdivision: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Municipality/City: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Province: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                <div class="col-xs-12">
                                <br/><br/><label><small><b>Contact Details: </b></small></label> <br/>
                                </div>
                                    <div class="col-xs-12">
                                        <label for="1"><small>Cellphone Number: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Cellphone Number (Alternate): </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Telephone Number: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>

                                    <div class="col-xs-12">
                                        <br/><label for="1"><small>Email: </small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 100%">
                                        </div>
                                    </div><br/>
                                </div>
                        </div> <!-- END OF COMPANY COLLAPSE -->

                    </div> <!-- END OF DIV DETAILS -->


                    <div>
                        <div class="col-xs-12">
                            <br/><br/>
                        </div>
                        <label><small><b>B. Details of Claim/Loss</b></small></label>
                        <div class="col-xs-12">
                            <br/><label for="1"><small>Date of Loss: </small></label>
                            <input type="date" name="plate" style="width: 50%">
                        </div><br/>
                        <div class="col-xs-12">
                            <br/><label for="1"><small>Estimated Time of Loss: </small></label>
                            <input type="time" name="plate" style="width: 50%">
                        </div><br/>
                        <div class="col-xs-12">
                            <br/><label for="1"><small>Place of Loss: </small></label>
                            <input type="text" name="plate" style="width: 100%">
                        </div><br/>
                        <div class="col-xs-12">
                            <br/><label for="1"><small>Brief Description of the Circumstances of Loss: </small></label>
                            <textarea style="resize: none;" rows="15" cols="80"></textarea>
                        </div>
                    </div> <!-- END OF DIV DETAILS -->

                    <div>
                        <div class="col-xs-12">
                            <br/><br/>
                        </div>
                        <label><small><b>C. Claim Notified By: </b></small></label>
                        <div class="col-xs-12">
                            <div class="sky_form1 col col-xs-12">
                                <ul>
                                    <br/><li><label class="radio left"><input type="radio" name="radio"><i></i>Policy holder&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></li>
                                    <li><label class="radio"><input type="radio" name="radio" data-toggle="collapse" data-target="#rep"><i></i>Representative of Policy holder</label></li><br/><br/>
                                    <div class="clearfix"></div>
                                </ul>
                            </div>
                        </div>

                        <div class="collapse fade" id="rep">
                            <div class="row">
                                <div class="col-xs-12">
                                    <br/><label><small><b>If other than the policy holder, please specify the relation to policy holder.</b></small></label>
                                </div>

                                <div class="col-xs-12">
                                    <br/><label><small>Name: </small></label>
                                    <input type="text" name="" style="width: 100%;">
                                </div>
                                <div class="col-xs-12">
                                    <br/><label><small>Relation to Policy holder: </small></label>
                                    <input type="text" name="" style="width: 100%;">
                                </div>

                                <div class="col-xs-12">
                                    <br/><br/><label><small><b>Contact Details</b></small></label>
                                </div>

                                <div class="col-xs-12">
                                    <br/><label><small>Telephone: </small></label>
                                    <input type="text" name="" style="width: 100%;">
                                </div>

                                <div class="col-xs-12">
                                    <br/><label><small>Cellphone Number: </small></label>
                                    <input type="text" name="" style="width: 100%;">
                                </div>

                                <div class="col-xs-12">
                                    <br/><label><small>Cellphone Number (Alternate): </small></label>
                                    <input type="text" name="" style="width: 100%;">
                                </div>

                                <div class="col-xs-12">
                                    <br/><label><small>Email: </small></label>
                                    <input type="email" name="" style="width: 100%;">
                                </div>
                            </div>
                        </div>

                    </div> <!-- END OF DIV DETAILS -->

                    <div>
                        <div class="col-xs-12">
                            <br/><br/>
                        </div>
                        <label><small><b>D. Documents</b></small></label>
                        <div class="col-xs-12">
                            <br/><label for="1"><small>Upload Claim Documents</small></label>
                        </div><br/>
                        <div class="col-xs-12">
                            <br/><input type="file" name="plate" style="width: 50%">
                        </div><br/>
                        <div class="col-xs-12">
                            <br/><a href="">Add more file + </a>
                        </div>

                        <div class="col-xs-12">
                            <br/><button type="button" class="btn btn-block btn-primary" onclick="window.open('{{ URL::asset('/claim/requirements') }}')">View claim requirements</button>
                        </div>

                        <div class="col-xs-12">
                            <button type="button" class="btn btn-block btn-success">Submit</button>
                        </div>
                    </div> <!-- END OF DIV DETAILS -->

                </div><!-- END OF DIV FLOAT RIGHT -->

                <div class="row">
                    <div class="col-xs-12">
                            <br/><br/>
                        </div>
                </div>
        </div>

        <div class="row">
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
