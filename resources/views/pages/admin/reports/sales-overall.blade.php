@extends('pages.admin.master')

@section('title', 'Sales Report - Transaction | i-Insure')

@section('reports','active')

@section('reportSales','active')

@section('salesOverall','active')

@section('body')
	<script>
        function numberWithCommas(x) {
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

        $('#date_assign').val(yyyy+'-'+mm+'-'+dd);

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
        	<div class="card">
        		<div class="header">
                    <h1 style="text-align: center;"><b>SALES REPORT</b></h1>
                    <h4 style="text-align: center;">- By Collection of Payments -</h3>
                </div>
                <div class="body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                        <li role="presentation" class="col-md-4"><a href="#tabular" data-toggle="tab" style="text-align: center; font-size: 20px">TABULAR</a></li>
                        <li role="presentation" class="col-md-4 active"><a href="#graphical" data-toggle="tab" style="text-align: center; font-size: 20px">GRAPHICAL</a></li>
                        <li role="presentation" class="col-md-4"><a href="#pdf" data-toggle="tab" style="text-align: center; font-size: 20px">GENERATE PDF</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                    	<div role="tabpanel" class="tab-pane fade" id="tabular"> 
                    		<p>
                    			<div class="header">
                                    <div class="row clearfix">
                                    	<div class="col-md-12" style="text-align: center;">
		                                    <input name="group" type="radio" id="radio_daily" onclick="
		                                    $('#ch_daily').show(800);
		                                    $('#ch_weekly').hide(800);
		                                    $('#ch_monthly').hide(800);
		                                    $('#ch_quarterly').hide(800);
		                                    $('#ch_annually').hide(800);
		                                    $('#ch_transac').hide(800);"/>
		                                    <label for="radio_daily">Daily</label>

		                                    <input name="group" type="radio" id="radio_weekly" onclick="
		                                    $('#ch_daily').hide(800);
		                                    $('#ch_weekly').show(800);
		                                    $('#ch_monthly').hide(800);
		                                    $('#ch_quarterly').hide(800);
		                                    $('#ch_annually').hide(800);
		                                    $('#ch_transac').hide(800);" />
		                                    <label for="radio_weekly">Weekly</label>

		                                    <input name="group" type="radio" id="radio_monthly" onclick="
		                                    $('#ch_daily').hide(800);
		                                    $('#ch_weekly').hide(800);
		                                    $('#ch_monthly').show(800);
		                                    $('#ch_quarterly').hide(800);
		                                    $('#ch_annually').hide(800);
		                                    $('#ch_transac').hide(800);" />
		                                    <label for="radio_monthly">Monthly</label>

		                                    <input name="group" type="radio" id="radio_quarterly" onclick="
		                                    $('#ch_daily').hide(800);
		                                    $('#ch_weekly').hide(800);
		                                    $('#ch_monthly').hide(800);
		                                    $('#ch_quarterly').show(800);
		                                    $('#ch_annually').hide(800);
		                                    $('#ch_transac').hide(800);"  />
		                                    <label for="radio_quarterly">Quarterly</label>

		                                    <input name="group" type="radio" id="radio_annually" onclick="
		                                    $('#ch_daily').hide(800);
		                                    $('#ch_weekly').hide(800);
		                                    $('#ch_monthly').hide(800);
		                                    $('#ch_quarterly').hide(800);
		                                    $('#ch_annually').show(800);
		                                    $('#ch_transac').hide(800);"  />
		                                    <label for="radio_annually">Annually</label>

		                                    <input name="group" type="radio" id="radio_transac" onclick="
		                                    $('#ch_daily').hide(800);
		                                    $('#ch_weekly').hide(800);
		                                    $('#ch_monthly').hide(800);
		                                    $('#ch_quarterly').hide(800);
		                                    $('#ch_annually').hide(800);
		                                    $('#ch_transac').show(800);"  />
		                                    <label for="radio_transac">Transaction</label>
		                                </div>
                                    </div>
                                </div>

                                <div class="body">
                                	<div id="ch_daily">
                                		<div class="row clearfix" style="text-align: center;">
                                			<div class="col-md-4">
                                				<label>Year</label>
				                                    <select id = "daily_year" name = "daily_year" class="form-control show-tick" data-live-search="true" required>
				                                        <option value="2017">2017</option>
				                                    </select>
                                			</div>
                                			<div class="col-md-4">
                                				<label>Month</label>
				                                    <select id = "daily_monthy" name = "daily_monthy" class="form-control show-tick" data-live-search="true" required>
				                                        <option value="January">January</option>
				                                    </select>
                                			</div>
                                			<div class="col-md-4">
                                				<label>Week</label>
				                                    <select id = "daily_week" name = "daily_week" class="form-control show-tick" data-live-search="true" required>
				                                        <option value="1">Week1</option>
				                                    </select>
                                			</div>
                                		</div>
                                		<div class="body table-responsive">
				                            <table id="ex" class="table table-bordered table-striped table-hover js-basic-example dataTable">
				                                <thead>
				                                    <tr class="bg-teal">
				                                        <th>Day</th>
				                                        <th>Sum Amount</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                                	<tr>
				                                		<td><b>Total Amount</b></td>
					                                	<td><b>Php10,248.93</b></td>
				                                	</tr>
				                                	<tr>
				                                		<td>Monday<br/>07/10/18</td>
				                                		<td>Php10,248.93</td>
				                                	</tr>
				                             	</tbody>
				                            </table>
				                        </div>
                                	</div>

                                	<div id="ch_weekly">
                                		<div class="row clearfix" style="text-align: center;">
                                			<div class="col-md-6">
                                				<label>Year</label>
				                                    <select id = "weekly_year" name = "weekly_year" class="form-control show-tick" data-live-search="true" required>
				                                        <option value="2017">2017</option>
				                                    </select>
                                			</div>
                                			<div class="col-md-6">
                                				<label>Month</label>
				                                    <select id = "weekly_monthy" name = "weekly_monthy" class="form-control show-tick" data-live-search="true" required>
				                                        <option value="January">January</option>
				                                    </select>
                                			</div>
                                		</div>
                                		<div class="body table-responsive">
				                            <table id="ex" class="table table-bordered table-striped table-hover js-basic-example dataTable">
				                                <thead>
				                                    <tr class="bg-teal">
				                                        <th>Week</th>
				                                        <th>Sum Amount</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                                	<tr>
				                                		<td><b>Total Amount</b></td>
					                                	<td><b>Php10,248.93</b></td>
				                                	</tr>
				                                	<tr>
				                                		<td>Week 1<br/>07/10/18 to 07/17/18</td>
				                                		<td>Php10,248.93</td>
				                                	</tr>
				                             	</tbody>
				                            </table>
				                        </div>
                                	</div>

                                	<div id="ch_monthly">
                                		<div class="row clearfix" style="text-align: center;">
                                			<div class="col-md-4"></div>
                                			<div class="col-md-4">
                                				<label>Year</label>
				                                    <select id = "monthly_year" name = "monthly_year" class="form-control show-tick" data-live-search="true" required>
				                                        <option value="2017">2017</option>
				                                    </select>
                                			</div>
                                			<div class="col-md-4"></div>
                                		</div>
                                		<div class="body table-responsive">
				                            <table id="ex" class="table table-bordered table-striped table-hover js-basic-example dataTable">
				                                <thead>
				                                    <tr class="bg-teal">
				                                        <th>Month</th>
				                                        <th>Sum Amount</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                                	<tr>
				                                		<td><b>Total Amount</b></td>
					                                	<td><b>Php10,248.93</b></td>
				                                	</tr>
				                                	<tr>
				                                		<td>January<br/>01/01/18 to 01/31/18</td>
				                                		<td>Php10,248.93</td>
				                                	</tr>
				                             	</tbody>
				                            </table>
				                        </div>
                                	</div>

                                	<div id="ch_quarterly">
                                		<div class="row clearfix" style="text-align: center;">
                                			<div class="col-md-4"></div>
                                			<div class="col-md-4">
                                				<label>Year</label>
				                                    <select id = "quarterly_year" name = "quarterly_year" class="form-control show-tick" data-live-search="true" required>
				                                        <option value="2017">2017</option>
				                                    </select>
                                			</div>
                                			<div class="col-md-4"></div>
                                		</div>
                                		<div class="body table-responsive">
				                            <table id="ex" class="table table-bordered table-striped table-hover js-basic-example dataTable">
				                                <thead>
				                                    <tr class="bg-teal">
				                                        <th>Quarter</th>
				                                        <th>Sum Amount</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                                	<tr>
				                                		<td><b>Total Amount</b></td>
					                                	<td><b>Php10,248.93</b></td>
				                                	</tr>
				                                	<tr>
				                                		<td>1st Quarter<br/>January to April</td>
				                                		<td>Php10,248.93</td>
				                                	</tr>
				                             	</tbody>
				                            </table>
				                        </div>
                                	</div>

                                	<div id="ch_annually">
                                		<div class="body">
                                			<div class="body table-responsive">
					                            <table id="ex" class="table table-bordered table-striped table-hover js-basic-example dataTable">
					                                <thead>
					                                    <tr class="bg-teal">
					                                        <th>Year</th>
					                                        <th>Sum Amount</th>
					                                    </tr>
					                                </thead>
					                                <tbody>
					                                	<tr>
					                                		<td><b>Total Amount</b></td>
					                                		<td><b>Php10,248.93</b></td>
					                                	</tr>
					                                	<tr>
					                                		<td>2017</td>
					                                		<td>Php10,248.93</td>
					                                	</tr>
					                             	</tbody>
					                            </table>
					                        </div>
                                		</div>
                                	</div>

                                	<div id="ch_transac">
                                		<div class="body">
                                			<div class="body table-responsive">
					                            <table id="ex" class="table table-bordered table-striped table-hover js-basic-example dataTable">
					                                <thead>
					                                    <tr class="bg-teal">
					                                        <th>BOP Number</th>
					                                        <th>Policy Number</th>
					                                        <th>Client Name</th>
					                                        <th>Total Amount</th>
					                                        <th>Remittance Date</th>
					                                    </tr>
					                                </thead>
					                                <tbody>
					                                @foreach($plist as $list)
					                                    @foreach($cvouch as $vouch)
					                                    @if($list->check_voucher == $vouch->cv_ID)
					                                    @if($list->status != 1)
					                                    <tr>
					                                    <td>@if($list->payment_ID >= 10)
				                                                BOP00{{ $list->payment_ID }}
				                                            @endif
				                                            @if($list->payment_ID < 10)
				                                                BOP000{{ $list->payment_ID }}
				                                            @endif
				                                            @if($list->payment_ID >= 100)
				                                                BOP0{{ $list->payment_ID }}
				                                            @endif
				                                            @if($list->payment_ID >= 1000)
				                                                BOP{{ $list->payment_ID }}
				                                            @endif</td>
				                                         <td>
					                                        @foreach($pdet as $paydet)
					                                            @if($vouch->pay_ID == $paydet->payment_ID)
					                                                @foreach($cliacc as $insacc)
					                                                    @if($insacc->account_ID == $paydet->account_ID)
					                                                        {{ $insacc->policy_number }}
					                                                        <script> var ins_id = "ins = " +{{ $insacc->account_ID }}; console.log(ins_id); </script>
					                                                    @endif
					                                                @endforeach
					                                        </td>
					                                        <td>
					                                                @foreach($cliacc as $insacc)
					                                                    @if($insacc->account_ID == $paydet->account_ID)
					                                                        @foreach($clist as $clients)
					                                                            @if($clients->client_type == 1)
					                                                            @if($insacc->client_ID == $clients->client_ID)
					                                                                @foreach($cli as $client)
					                                                                    @if($clients->client_ID == $client->client_ID)
					                                                                        @foreach($pinfo as $pInfo)
					                                                                            @if($client->personal_info_ID == $pInfo->pinfo_ID)
					                                                                            {{ $pInfo->pinfo_last_name}}, {{$pInfo->pinfo_first_name}} {{$pInfo->pinfo_middle_name }}
					                                                                            <script> var pi_id = "pi = " + {{ $pInfo->pinfo_ID }}; console.log(pi_id); </script>
					                                                                            @endif
					                                                                        @endforeach
					                                                                    @endif
					                                                                @endforeach
					                                                            @endif
					                                                            @endif
					                                                            @if($clients->client_type == 2)
					                                                            @if($insacc->client_ID == $clients->client_ID)
					                                                                @foreach($company as $comp)
					                                                                    @if($clients->client_ID == $comp->comp_ID)
					                                                                        {{ $comp->comp_name }}
					                                                                        <script> var pi_id = "pi = " + {{ $pInfo->pinfo_ID }}; console.log(pi_id); </script>
					                                                                    @endif
					                                                                @endforeach
					                                                            @endif
					                                                            @endif
					                                                        @endforeach
					                                                    @endif
					                                                @endforeach
					                                            @endif
					                                        @endforeach
					                                    	</td>
					                                    	<td>
					                                            <script>
					                                            var data = numberWithCommas({{ $list->amount }}); document.write("₱" + data);
					                                            </script>
					                                        </td>
					                                        <td> {{ \Carbon\Carbon::parse($list->paid_date)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($list->paid_date)->format("l, h:i:s A").")" }}</td>
					                                	<!-- <tr>
					                                		<td></td>
					                                		<td></td>
					                                		<td></td>
					                                		<td><b>Total Amount</b></td>
					                                		<td><b>Php10,248.93</b></td>
					                                	</tr>
					                                	<tr>
					                                		<td>BOP0001</td>
					                                		<td>ABC-123</td>
					                                		<td>Rola, Ma. Gabriella</td>
					                                		<td>Php10,000</td>
					                                		<td>July 10, 2017</td>
					                                	</tr> -->
					                                	</tr>
					                                	@endif
					                                	@endif
					                                	@endforeach
					                                @endforeach
					                             	</tbody>
					                            </table>
			                                    <div style = "display:none;">
									                {{$total = 0}}
					                                @foreach($plist as $list)
					                                    @if($list->status != 1)
											                  {{$total = $total + $list->amount}}
					                                	@endif
					                                @endforeach
					                            </div>
			                                	<h3 style="text-align: center;"><b>Total Amount: ₱ <?php echo number_format($total, 2, '.', ','); ?></b></h3>
						                        </div>
                                		</div>
                                	</div>
                                </div>
                    		</p>
                    	</div>

                    	<div role="tabpanel" class="tab-pane fade in active" id="graphical"> 
                    		<p>
                    			<div class="header">
                                    <div class="row clearfix">
                                    	<div class="col-md-12" style="text-align: center;">
		                                    <input name="group1" type="radio" id="radio_daily1" onclick="
		                                    $('#ch_daily1').show(800);
		                                    $('#ch_weekly1').hide(800);
		                                    $('#ch_monthly1').hide(800);
		                                    $('#ch_quarterly1').hide(800);
		                                    $('#ch_annually1').hide(800);"/>
		                                    <label for="radio_daily1">Daily</label>

		                                    <input name="group1" type="radio" id="radio_weekly1" onclick="
		                                    $('#ch_daily1').hide(800);
		                                    $('#ch_weekly1').show(800);
		                                    $('#ch_monthly1').hide(800);
		                                    $('#ch_quarterly1').hide(800);
		                                    $('#ch_annually1').hide(800);" />
		                                    <label for="radio_weekly1">Weekly</label>

		                                    <input name="group1" type="radio" id="radio_monthly1" onclick="
		                                    $('#ch_daily1').hide(800);
		                                    $('#ch_weekly1').hide(800);
		                                    $('#ch_monthly1').show(800);
		                                    $('#ch_quarterly1').hide(800);
		                                    $('#ch_annually1').hide(800);" />
		                                    <label for="radio_monthly1">Monthly</label>

		                                    <input name="group1" type="radio" id="radio_quarterly1" onclick="
		                                    $('#ch_daily1').hide(800);
		                                    $('#ch_weekly1').hide(800);
		                                    $('#ch_monthly1').hide(800);
		                                    $('#ch_quarterly1').show(800);
		                                    $('#ch_annually1').hide(800);"  />
		                                    <label for="radio_quarterly1">Quarterly</label>

		                                    <input name="group1" type="radio" id="radio_annually1" onclick="
		                                    $('#ch_daily1').hide(800);
		                                    $('#ch_weekly1').hide(800);
		                                    $('#ch_monthly1').hide(800);
		                                    $('#ch_quarterly1').hide(800);
		                                    $('#ch_annually1').show(800);"  />
		                                    <label for="radio_annually1">Annually</label>
		                                </div>
                                    </div>
                                </div>
                                <div class="body">
                                	<div id="ch_daily1">
                                		<div class="row clearfix" style="text-align: center;">
                                			<div class="col-md-4">
                                				<label>Year</label>
				                                    <select id = "daily_year" name = "daily_year" class="form-control show-tick" data-live-search="true" required>
				                                        <option value="2017">2017</option>
				                                    </select>
                                			</div>
                                			<div class="col-md-4">
                                				<label>Month</label>
				                                    <select id = "daily_monthy" name = "daily_monthy" class="form-control show-tick" data-live-search="true" required>
				                                        <option value="January">January</option>
				                                    </select>
                                			</div>
                                			<div class="col-md-4">
                                				<label>Week</label>
				                                    <select id = "daily_week" name = "daily_week" class="form-control show-tick" data-live-search="true" required>
				                                        <option value="1">Week1</option>
				                                    </select>
                                			</div>
                                		</div>
                                		<canvas id="line_chart" height="150"></canvas>
                                	</div>
                                	<div id="ch_weekly1">
                                		<div class="row clearfix" style="text-align: center;">
                                			<div class="col-md-6">
                                				<label>Year</label>
				                                    <select id = "weekly_year" name = "weekly_year" class="form-control show-tick" data-live-search="true" required>
				                                        <option value="2017">2017</option>
				                                    </select>
                                			</div>
                                			<div class="col-md-6">
                                				<label>Month</label>
				                                    <select id = "weekly_monthy" name = "weekly_monthy" class="form-control show-tick" data-live-search="true" required>
				                                        <option value="January">January</option>
				                                    </select>
                                			</div>
                                		</div>
                                		<canvas id="line_chart1" height="150"></canvas>
                                	</div>
                                	<div id="ch_monthly1">
                                		<div class="row clearfix" style="text-align: center;">
                                			<div class="col-md-4"></div>
                                			<div class="col-md-4">
                                				<label>Year</label>
				                                    <select id = "monthly_year" name = "monthly_year" class="form-control show-tick" data-live-search="true" required>
				                                        <option value="2017">2017</option>
				                                    </select>
                                			</div>
                                			<div class="col-md-4"></div>
                                		</div>
                                		<canvas id="line_chart2" height="150"></canvas>
                                	</div>
                                	<div id="ch_quarterly1">
                                		<div class="row clearfix" style="text-align: center;">
                                			<div class="col-md-4"></div>
                                			<div class="col-md-4">
                                				<label>Year</label>
				                                    <select id = "quarterly_year" name = "quarterly_year" class="form-control show-tick" data-live-search="true" required>
				                                        <option value="2017">2017</option>
				                                    </select>
                                			</div>
                                			<div class="col-md-4"></div>
                                		</div>
                                		<canvas id="line_chart3" height="150"></canvas>
                                	</div>
                                	<div id="ch_annually1">
                                		<canvas id="line_chart4" height="150"></canvas>
                                	</div>
                                </div>
                    		</p>
                    	</div>

                    	<div role="tabpanel" class="tab-pane fade" id="pdf"> 
                    		<p>
                    			<div class="header">
                                    <h2 style="text-align: center;"><b>Customize Report</b></h2>
                                </div>
                                <div class="body">
                                	<div class="row clearfix" style="text-align: center;">
                                		<div class="col-md-2"></div>
                                		<div class="col-md-8">
		                                    <select id = "monthly_year" name = "monthly_year" class="form-control show-tick" data-live-search="true" required>
		                                        <option value="2017">Annually</option>
		                                        <option value="2017">Quarterly</option>
		                                        <option value="2017">Monthly</option>
		                                        <option value="2017">Weekly</option>
		                                        <option value="2017">Daily</option>
		                                    </select>
                            			</div>
                            			<div class="col-md-2"></div>
                                	</div>

                                	<div class="row clearfix" style="text-align: center;">
                                		<div class="col-md-2"></div>
                                		<div class="col-md-3">
		                                    <div class="form-group form-float">
	                                            <div class="form-line">
	                                                <input id = "frm" name = "frmy" type="date" class="form-control">
	                                            </div>
	                                        </div>
                            			</div>
                            			<div class="col-md-1"><b>to</b></div>
                            			<div class="col-md-3">
                            				<div class="form-group form-float">
	                                            <div class="form-line">
	                                                <input id = "frm" name = "frmy" type="date" class="form-control">
	                                            </div>
	                                        </div>
                            			</div>
                            			<div class="col-md-2"></div>
                                	</div>

                                	<div class="row clearfix" style="text-align: center;">
                                		<div class="col-md-2"></div>
                                		<div class="col-md-8">
		                                    <button type="button" id="geh"  class="btn btn-block bg-orange waves-effect">GENERATE PDF</button>
                            			</div>
                            			<div class="col-md-2"></div>
                                	</div>
                                </div>
                    		</p>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
    	window.onload = function (){
    		document.getElementById('ch_daily1').style.display = 'none';
    		document.getElementById('ch_weekly1').style.display = 'none';
    		document.getElementById('ch_monthly1').style.display = 'none';
    		document.getElementById('ch_quarterly1').style.display = 'none';
    		document.getElementById('ch_annually1').style.display = 'none';

    		document.getElementById('ch_daily').style.display = 'none';
    		document.getElementById('ch_weekly').style.display = 'none';
    		document.getElementById('ch_monthly').style.display = 'none';
    		document.getElementById('ch_quarterly').style.display = 'none';
    		document.getElementById('ch_annually').style.display = 'none';
    		document.getElementById('ch_transac').style.display = 'none';
    	};
    </script>
@endsection
