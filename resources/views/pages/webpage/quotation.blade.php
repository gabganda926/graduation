@extends('webmaster')

@section('title','Quotation | i-Insure')

@section('quote','active')

@section('body')
<section>
<div class="content">
    <div class="container">
    <ol class="breadcrumb">
      <li><a href="/home">Home</a></li>
      <li class="active">Quotation</li>
    </ol>
    <div class="row">
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Vehicle Details">
                            <span class="round-tab">
                                <i class="material-icons md-48">directions_car</i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Quotation Details">
                            <span class="round-tab">
                                <i class="material-icons md-48">mode_edit</i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Client Details">
                            <span class="round-tab">
                                <i class="material-icons md-48">account_circle</i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Finish">
                            <span class="round-tab">
                                <i class="material-icons md-48">assignment</i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="registration_form">
            <form role="form">
                <div class="tab-content">

                <!-- STEP 1 -->
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <div class="step1">
                            <h3><b>Vehicle Details</b></h3><br/>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col col-xs-6">
                                    <label for="1">Vehicle Type: </label>
                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="80%">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div> 

                                    <div class="col-xs-6">
                                        <label for="1">Plate Number: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-th"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%">
                                        </div>
                                    </div> 
                                
                                    <div class="col-xs-6">
                                    <label for="1">Year Model: </label>
                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="80%">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Engine Number: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-th"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%">
                                        </div>
                                    </div> 
                                
                                    <div class="col-xs-6">
                                    <label for="1">Make: </label>
                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="80%">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Chassis Number: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-th"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%">
                                        </div>
                                    </div>
                                
                                    <div class="col-xs-6">
                                    <label for="1">Model: </label>
                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="80%">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div> 

                                    <div class="col-xs-6">
                                        <label for="1">MV File Number: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-th"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%">
                                        </div>
                                    </div>                             
                                
                                    <div class="col-xs-6">
                                        <label for="1">Color: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-th"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%">
                                        </div>
                                    </div>
                                    
                                    <div class="sky_form1 col col-xs-6">
                                        <ul>
                                            <li><label class="radio left"><input type="radio" name="radio" checked=""><i></i>Mortgaged&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></li>
                                            <li><label class="radio"><input type="radio" name="radio"><i></i>Not Mortgaged</label></li><br/><br/>
                                            <div class="clearfix"></div>
                                        </ul>
                                    </div>
                                
                                    <div class="col-xs-5">
                                        <label for="1">Mortgagee: </label>
                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                            <option value="1">Bank1</option>
                                            <option value="2">Bank2</option>
                                            <option value="3">Bank3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><br/><br/><br/><br/><br/><br/>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step scrollToTop">Continue</button></li>
                        </ul>
                    </div>

                <!-- STEP 2 -->
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <div class="step2">
                            <h3><b>Quotation Details</b></h3><br/>
                            <img src="web/images/quote.jpg" alt="" width="100%"><br/><br/>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <label for="1">Insurance Company: </label>
                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                            <option value="1">Company1</option>
                                            <option value="2">Company2</option>
                                            <option value="3">Company3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="modal-header" style="background-color: #263238">
                                        <p style="color: white;"><b>&nbsp;&nbsp; Your Possible Comprehensive Insurance Quotation </b></p>
                                   </div>
                                   <small>NOTE: The agency will send you a proposal quotation. This is just a possible quote price without your choice of coverage/package.</small><br/><br/><br/>

                                   <div style="width: 500px;height: 200px;z-index: 15;top: auto;left: 50%;margin: 0 auto;">
                                        <h4 style="text-align: center;color: #263238;"><b>2012 A6 QUATTRO V6 A/T 3.0</b></h4>
                                        <h2 style="text-align: center;"><b>Php 69,195.33</b></h2><br/>
                                         <span class="total"><b>Basic Premium</b></span>
                                         <span>Php 35,000.00</span><br/>
                                         <span class="total"><b>VAT</b></span>
                                         <span>Php 10,000.00</span><br/>
                                         <span class="total"><b>Documentary Stamp Tax</b></span>
                                         <span>Php 10,000.00</span></br/>
                                         <span class="total"><b>Local Gov't Tax</b></span>
                                         <span>Php 145.33</span><br/><br/>
                                         <span class="total"><b>Deductible</b></span>
                                         <span>Php 14,050.00</span>
                                         <div class="clearfix"></div>
                                   </div>
                                </div><br/><br/>

                                <div class="row">
                                   <div class="modal-header" style="background-color: #263238">
                                        <p style="color: white;"><b>&nbsp;&nbsp;Your Comprehensive Insurance Policy includes these benefits </b> <button type="button" class="btn btn-info btn-sm" style="float: right;margin-right: 2%" data-toggle="modal" data-target="#editt">Edit</button> </p>
                                   </div><br/><br/>

                                    <div style="width: 500px;height: 200px;z-index: 15;top: auto;left: 50%;margin: 0 auto;">
                                         <span class="total"><b>Own Damage/Theft</b></span>
                                         <span>Php 35,000.00</span><br/>
                                         <span class="total"><b>Third Property Damage</b></span>
                                         <span>Php 10,000.00</span><br/>
                                         <span class="total"><b>Third Party Bodily Injury</b></span>
                                         <span>Php 10,000.00</span><br/>
                                         <span class="total"><b>Personal Accident</b></span>
                                         <span>Php 145.33</span><br/><br/>
                                         <span class="total"><b>Acts of Nature</b></span>
                                         <span>Php 14,050.00</span>
                                         <div class="clearfix"></div><br/><br/>
                                    </div> 
                                </div>

                                <div class="row">
                                   <div class="modal-header" style="background-color: #263238">
                                        <p style="color: white;"><b>&nbsp;&nbsp;Inclusions </b></p>
                                   </div><br/><br/>
                                       <div class="col-xs-12" style="margin-left: 5%">
                                         <p><b>The Insurance Quotation Includes the following: </b><br/>
                                         &nbsp;&nbsp;&nbsp;&nbsp;1. 24-hour Roadside Assistance (Specific areas only)<br/>
                                         &nbsp;&nbsp;&nbsp;&nbsp;2. Acts of God Coverage (Typhoon, Flood, Earthquake, Hurricane, Volcanic Eruption)<br/>
                                         &nbsp;&nbsp;&nbsp;&nbsp;3. Strike, Riot, Civil Commotion (SRCC) Cover<br/>
                                         &nbsp;&nbsp;&nbsp;&nbsp;4. Unnamed Passenger Personal Accident
                                         </p>
                                        </div> 
                                </div><br/><br/>

                                <div class="row">
                                   <div class="modal-header" style="background-color: #263238">
                                        <p style="color: white;"><b>&nbsp;&nbsp;Terms & Conditions </b></p>
                                   </div><br/><br/>
                                       <div class="col-xs-12" style="margin-left: 5%">
                                         <p><b>By Clicking Continue, you agree to the following: </b><br/>
                                         &nbsp;&nbsp;&nbsp;&nbsp;1. The vehicle being insured has not been involved in any vehicular accident and has not been flooded/damaged in any manner as of the time of the issuance of this policy.<br/>
                                         &nbsp;&nbsp;&nbsp;&nbsp;2. Any damages prior to the issuance of this policy shall not be compensable. This declaration is under the penalty of perjury. <br/>
                                         &nbsp;&nbsp;&nbsp;&nbsp;3. The vehicle for insurance cover is not used to carry fare-paying passengers. <br/>
                                         </p>
                                        </div> 
                                </div><br/><br/>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step scrollToTop">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step scrollToTop">Continue</button></li>
                        </ul>
                    </div>

                <!-- STEP 3 -->
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <div class="step3">
                            <h3><b>Client Details</b></h3><br/>
                            <div class="row">
                                    <div class="col-xs-5">
                                        <label for="1">Client Type: </label>
                                        <div class="sky_form1 col col-xs-12">
                                            <ul>
                                                <li><label class="radio left"><input type="radio" name="radio" data-toggle="collapse" data-target="#individualType"><i></i>&nbsp;&nbsp;&nbsp;&nbsp;Individual&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></li>
                                                <li><label class="radio"><input type="radio" name="radio" data-toggle="collapse" data-target="#companyType"><i></i>Company</label></li><br/><br/>
                                                <div class="clearfix"></div>
                                            </ul>
                                        </div>
                                    </div>
                                </div><br/><br/>
                    <!-- INDIVIDUAL -->
                            <div class="collapse fade" id="individualType">
                                <div class="row">
                                    <h4><b>Personal Information</b></h4><br/>
                                    <div class="col-xs-6">
                                        <label for="1">First Name: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Birthday: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="date" name="plate" style="width: 80%;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="1">Middle Name: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Age: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;" disabled="disable">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Last Name: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <label for="1">Gender: </label>
                                    <div class="sky_form1 col col-xs-6">
                                        <ul>
                                            <li><label class="radio left"><input type="radio" name="radio" checked=""><i></i>&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></li>
                                            <li><label class="radio"><input type="radio" name="radio"><i></i>Female</label></li>
                                            <div class="clearfix"></div>
                                        </ul>
                                    </div>
                                </div><br/><br/>

                                <div class="row">
                                <h4><b>Contact Details</b></h4><br/>
                                    <div class="col-xs-6">
                                        <label for="1">Cellphone Number: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-earphone"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div> 
                                    
                                    <div class="col-xs-6">
                                        <label for="1">Cellphone Number: (Alt)</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-earphone"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    
                                    <div class="col-xs-6">
                                        <label for="1">Telephone Number: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-phone-alt"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Email: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-briefcase"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <h4><b>Sales Agent</b></h4><br/>
                                    <div class="col-xs-5">
                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div><br/><br/>

                                <div class="row">
                                    <h4><b>Residential Address</b></h4><br/>
                                    <div class="col-xs-6">
                                        <label for="1">Blk&Lot/Bldg/Unit No.: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">District: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Street: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">City/Municipality: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Subdivision: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Province: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Barangay: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Region: </label>
                                        <select id="1" class="selectpicker" data-size="10" data-width="80%">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>

                                    <div class="col-xs-4">
                                        <label for="1">Zip Code: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <h4><b>Create an Account</b></h4><br/>
                                    <div class="col-xs-12">
                                        <label for="1">Username: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 50%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <label for="1">Password: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="password" name="plate" style="width: 50%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <label for="1">Re-type password: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="password" name="plate" style="width: 50%;">
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- END -->

                    <!-- COMPANY -->
                            <div class="collapse fade" id="companyType">

                                <div class="row">
                                    <h4><b>Company Details</b></h4><br/>
                                    <div class="col-xs-8">
                                        <label for="1">Company Name: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                <h4><b>Company Contact Details</b></h4><br/>
                                    <div class="col-xs-6">
                                        <label for="1">Cellphone Number: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-earphone"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div> 
                                    
                                    <div class="col-xs-6">
                                        <label for="1">Cellphone Number: (Alt)</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-earphone"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    
                                    <div class="col-xs-6">
                                        <label for="1">Telephone Number: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-phone-alt"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Email: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-briefcase"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <h4><b>Company Address</b></h4><br/>
                                    <div class="col-xs-6">
                                        <label for="1">Blk&Lot/Bldg/Unit No.: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">District: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Street: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">City/Municipality: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Subdivision: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Province: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Barangay: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Region: </label>
                                        <select id="1" class="selectpicker" data-size="10" data-width="80%">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>

                                    <div class="col-xs-4">
                                        <label for="1">Zip Code: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-home"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <h4><b>Contact Person Information</b></h4><br/>
                                    <div class="col-xs-6">
                                        <label for="1">First Name: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Birthday: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="date" name="plate" style="width: 80%;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="1">Middle Name: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Age: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;" disabled="disable">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Last Name: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <label for="1">Gender: </label>
                                    <div class="sky_form1 col col-xs-6">
                                        <ul>
                                            <li><label class="radio left"><input type="radio" name="radio" checked=""><i></i>&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></li>
                                            <li><label class="radio"><input type="radio" name="radio"><i></i>Female</label></li>
                                            <div class="clearfix"></div>
                                        </ul>
                                    </div>
                                </div><br/><br/>

                                <div class="row">
                                <h4><b>Contact Details</b></h4><br/>
                                    <div class="col-xs-6">
                                        <label for="1">Cellphone Number: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-earphone"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div> 
                                    
                                    <div class="col-xs-6">
                                        <label for="1">Cellphone Number: (Alt)</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-earphone"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    
                                    <div class="col-xs-6">
                                        <label for="1">Telephone Number: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-phone-alt"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="1">Email: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-briefcase"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 80%;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <h4><b>Sales Agent</b></h4><br/>
                                    <div class="col-xs-5">
                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div><br/><br/>

                                <div class="row">
                                    <h4><b>Create an Account</b></h4><br/>
                                    <div class="col-xs-12">
                                        <label for="1">Username: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" name="plate" style="width: 50%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <label for="1">Password: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="password" name="plate" style="width: 50%;">
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <label for="1">Re-type password: </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="password" name="plate" style="width: 50%;">
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- END OF COMPANY -->
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step  scrollToTop">Previous</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step scrollToTop">Continue</button></li>
                        </ul>
                    </div>

                <!-- finish -->
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <div class="step44">
                        
                                    <p style="text-align: center"><b>Terms of Service</b><p>
                                    <p class="text-justify">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce posuere nulla nisi, eu gravida est lobortis sit amet. Nulla facilisi. Duis tincidunt auctor diam, vel posuere lacus sollicitudin in. Sed finibus luctus tellus, non ornare leo aliquam a. Aliquam erat volutpat. Sed vel auctor elit. Curabitur ultricies mi id tellus tempor, a tincidunt nunc malesuada. Morbi sollicitudin, ipsum sed fringilla tincidunt, lorem quam cursus risus, sed aliquam nunc ipsum eu sem. Etiam vulputate massa justo, vel volutpat mauris accumsan at. Curabitur egestas, ante non luctus interdum, felis nisi ullamcorper felis, eget porttitor massa turpis ac dolor. <br/><br/>

                                        Proin ante sapien, rhoncus sed sagittis a, convallis ut risus. Morbi eget arcu ipsum. Suspendisse congue in diam ut euismod. Mauris accumsan sagittis pellentesque. Curabitur consequat orci urna, a rutrum sem sodales in. Morbi egestas auctor lectus, nec ullamcorper arcu semper et. Quisque non neque suscipit, lacinia sapien ut, consequat nulla. Curabitur vitae lectus ante. Integer non convallis lacus. <br/><br/>

                                        Etiam at gravida neque. Vivamus nisi erat, porttitor quis eros non, venenatis fermentum magna. Etiam arcu lorem, convallis vel sollicitudin et, dictum nec lectus. In vitae cursus libero. Sed sed commodo ipsum, in fermentum mi. Sed scelerisque felis eget dictum vulputate. Vivamus a massa ut quam varius bibendum. Nullam hendrerit ligula nec aliquet mollis. <br/><br/>

                                        Aliquam nec enim non sapien mollis ultricies at in diam. In dignissim, eros at maximus tincidunt, lacus orci accumsan libero, eu rutrum ante dolor sit amet leo. Aliquam et mi sit amet turpis tincidunt sollicitudin. Suspendisse eleifend varius aliquet. Quisque eleifend, massa a dignissim aliquam, diam mi mattis est, sed sodales lectus turpis quis urna. Morbi dapibus ante a dolor malesuada pretium. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean convallis id ipsum et ultrices. Nulla ornare, lorem sit amet consectetur volutpat, velit felis feugiat mauris, et viverra leo magna in est. Suspendisse tempor euismod euismod. Ut dictum neque a nunc consequat, vel facilisis lectus elementum. Maecenas lorem tortor, sagittis vitae risus id, vulputate auctor nibh. Duis ac dui non lectus scelerisque condimentum. Vivamus viverra maximus porta. Duis vitae vehicula magna. <br/><br/>

                                        Curabitur elit ipsum, euismod sit amet mattis dapibus, accumsan non arcu. Ut eu nisi euismod, semper massa et, viverra tellus. Etiam id dolor non orci auctor mattis. Nunc rutrum a nunc sed efficitur. Nulla ornare elit bibendum urna commodo, porta convallis nisl fermentum. Nam ac tempor elit. Nulla ut augue vitae mauris sollicitudin sagittis ac et velit.
                                    </p>

                            <div class="sky-form">
                                <label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>I agree to&nbsp;<a class="terms" href="#"> terms of service</a> </label>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step scrollToTop">Previous</button></li>
                            <li><button type="submit" class="btn btn-success submit scrollToTop">Finish</button></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
   </div>
</div>
</div>
</div>
</section>

<!-- Modal -->
                                    <div id="editt" class="modal fade" data-backdrop="false" role="dialog">
                                        <div class="modal-dialog" role="document">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Edit Coverage</h4>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xs-5">
                                                        <b>Third Property Damage</b>
                                                    </div>
                                                    <div class="col col-xs-3">
                                                        <label for="1">Coverage: </label>
                                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col col-xs-4">
                                                        <label for="1">Vehicle Class: </label>
                                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                                            <option value="1">PV</option>
                                                            <option value="2">CV (Light & Medium)</option>
                                                            <option value="3">CV(Heavy)</option>
                                                        </select>
                                                    </div>
                                                </div><br/>

                                                <div class="row">
                                                    <div class="col-xs-5">
                                                        <b>Third Party Bodily Injury</b>
                                                    </div>
                                                    <div class="col col-xs-3">
                                                        <label for="1">Coverage: </label>
                                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col col-xs-4">
                                                        <label for="1">Vehicle Class: </label>
                                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                                            <option value="1">PV</option>
                                                            <option value="2">CV (Light & Medium)</option>
                                                            <option value="3">CV(Heavy)</option>
                                                        </select>
                                                    </div>
                                                </div><br/>

                                                <div class="row">
                                                    <div class="col-xs-5">
                                                        <b>Personal Accident</b>
                                                    </div>
                                                    <div class="col col-xs-3">
                                                        <label for="1">Coverage: </label>
                                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col col-xs-4">
                                                        <label for="1">Number of Persons: </label>
                                                        <select id="1" class="selectpicker" data-size="10" data-live-search="true" data-width="100%">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                              <div class="clearfix"><button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

<!-- CHOOSE INST MODAL -->
            <div class="modal fade" id="ugh" role="dialog" data-backdrop="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #ffab00">
                            <h3 class="modal-title">Confirmation</h3>
                        </div>
                        <div class="modal-body">
                            Applying for a quotation can only be issued for private cars. <br/><br/>

                            <input type="checkbox" name="check" required> I Confirm that my unit for the quotation is NOT used to carry any fare-paying passengers such as: <br/><br/>
                            1. Yellow-plated vehicles (Taxi and U/V Express Van)<br/>
                            2. School bus/van<br/>
                            3. Uber/Grabcar
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-block btn-primary" data-dismiss="modal">CONTINUE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- #END# ADD INST MODAL -->

    <script>
        $(document).ready(function(){
            $("#ugh").modal('show');
        });

        $('#ugh').modal({backdrop: 'static', keyboard: false})  
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
        //Click event to scroll to top
        $('.scrollToTop').click(function(){
            $('html, body').animate({scrollTop : 0},800);
            return false;
        });
        
    });
    </script>

<script>
    $(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
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
