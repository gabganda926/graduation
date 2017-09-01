@extends('pages.admin.master')

@section('title', 'Notify Client - Manage Insurance Accounts - Transaction | i-Insure')

@section('body')
    <section class="content">
    <button type="button" class="btn bg-teal waves-effect left" style="float: left; margin-left: 15px;" onclick="window.document.location='/admin/transaction/insurance';">
        <i class="material-icons">backspace</i><span style="font-size: 15px;"> BACK</span>
    </button>
    <br/>
        <div class="container-fluid">
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h3> Notify Client for Renewal </h3>
                        <div class="divider" style="margin-bottom:20px;"></div>
                        </div>
                        <div class="body">
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                    <label>Choose criteria: </label>
                                        <select class="form-control show-tick" multiple="multiple">
                                            <optgroup label="Insurance Company">
                                            <option>FPG Insurance</option>
                                            <option>Standard Insurance</option>
                                            <option>People's General Insurance</option>
                                            </optgroup>
                                            <optgroup label="End of Insurance Date" data-max-options="1">
                                            <option>1-5 day/s before end of insurance</option>
                                            <option>6-10 days before end of insurance</option>
                                            <option>11-15 days before end of insurance</option>
                                            <option>16-20 days before end of insurance</option>
                                            </optgroup>
                                        </optgroup>
                                    </select>
                                    </div>
                                    <br/>
                                </div>
                                <form id="wizard_with_validation" method="POST">
                                <h3> Select Recipients </h3>
                                <fieldset>
                                <select id="optgroup" class="ms" multiple="multiple" style="height: 500px;"  required>
                                    <optgroup label="FPG Insurance">
                                        <option value="AK">Bukid, Gerald</option>
                                        <option value="HI">Rola, Na. Gabriella Tan</option>
                                    </optgroup>
                                    <optgroup label="Standard Insurance">
                                        <option value="CA">Avellaneda, Marynel</option>
                                        <option value="NV">Franco, Edgardo</option>
                                        <option value="OR">Kim, Bok Joo</option>
                                        <option value="WA">Kim, Myung Soo</option>
                                    </optgroup>
                                    <optgroup label="Commonwealth">
                                        <option value="AZ">Dela Cruz, Lyndan Pol</option>
                                        <option value="CO">Pery, Roy Christian</option>
                                        <option value="ID">Reyes, Norman Fernandez</option>
                                    </optgroup>
                                    <optgroup label="People's General Insurance">
                                        <option value="AL">No, Min Woo</option>
                                        <option value="AR">Kim, Jongin</option>
                                        <option value="IL">Park, Bo Gum</option>
                                        <option value="IA">Jeon, Jungkook</option>
                                    </optgroup>
                                </select>
                                <br/><br/>

                                <br/>
                                </fieldset>

                                <h3>Edit Notice</h3>
                                <fieldset>
                                    <textarea style="height: 500px; width: 860px; resize:none;" required>
                                                                                                                <date here>

        Dear Valued Client,

                We have seen that your account will expire soon.
                Please feel free to contact us whenever you want to renew your account.
                More power and God Bless!



        Compreline Insurance Services
        number here
        emailhere
                                    </textarea>
                                </fieldset>

                                <h3>Mode of Sending the Notice</h3>
                                <fieldset>

                                        <div class="demo-radio-button">
                                            <input name="group1" type="radio" class="with-gap radio-col-indigo" id="radio_3" />
                                            <label for="radio_3">Send via E-mail</label>
                                            <input name="group1" type="radio" id="radio_4" class="with-gap radio-col-indigo" />
                                            <label for="radio_4">Send via SMS</label>
                                            <input name="group1" type="radio" id="radio_5" class="with-gap radio-col-indigo" />
                                            <label for="radio_5">Send via Courier</label>
                                        </div><br/>

                                        <!-- VIA EMAIL -->
                                        <div class="demo-masked-input">
                                            <div class="row clearfix">
                                                <div class="col-md-6">
                                                    <b>Email Address</b>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">mail_outline</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control email" placeholder="example@example.com">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- VIA SMS -->
                                        <div class="demo-masked-input">
                                            <div class="row clearfix">
                                                <div class="col-md-6">
                                                    <b>Cellphone number</b>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">perm_phone_msg</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control mobile-phone-number" placeholder="Ex: +63 (905) 308-47-08">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- VIA COURIER -->
                                        <div class="col-md-3">
                                            <p>
                                                <b>Choose Courier: </b>
                                            </p>
                                            <select class="form-control show-tick" data-live-search="true">
                                                <option>Dela Cruz, Lyndan Pol</option>
                                                <option>Franco, Edgardo</option>
                                                <option>Pery, Roy Christian</option>
                                            </select>
                                        </div>

                                </fieldset>

                                <h3>Summary</h3>
                                <fieldset>
                                <p>
                                    <b>Criteria: </b> Criteria here
                                </p>
                                <div class="body table-responsive col-md-6">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th class="col-md-2">Client</th>
                                                <th class="col-md-2">Insurance Company</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Rola, Ma. Gabriella T.</td>
                                                <td>FPG Insurance</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                Mode of Sending Notice
                                            </h2>
                                        </div>
                                        <div class="body">
                                            Send via:
                                                    Via here
                                        </div>
                                    </div>
                                </div>
                                </fieldset>
                                </form>
                            </div>

                        </div> <!-- end of body -->
                    </div> <!-- end of card -->
                </div>
            </div>
        </div>
    </section>
@endsection
