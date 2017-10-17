@extends('pages.admin.master')

@section('title', 'Sales Report - Transaction | i-Insure')

@section('reports','active')

@section('reportSales','active')

@section('salesIns','active')

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
                    <h4 style="text-align: center;">- By Insurance Company -</h3>
                </div>
                <div class="body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                        <li role="presentation" class="col-md-4"><a href="#tabular" data-toggle="tab" style="text-align: center; font-size: 20px">TABULAR</a></li>
                        <li role="presentation" class="col-md-4 active"><a href="#graphical" data-toggle="tab" style="text-align: center; font-size: 20px">GRAPHICAL</a></li>
                        <li role="presentation" class="col-md-4"><a href="#pdf" data-toggle="tab" style="text-align: center; font-size: 20px">GENERATE PDF</a></li>
                    </ul>

                    <form id = "gen_pdf" action = "/pdf/reports/sales/by/company" method = "GET" style = "display: none;">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="col-md-4" style = "display: none;">
                             <input id = "date_end" name = "date_end" type="text" class="form-control">
                         </div>
                          <div class="col-md-4" style = "display: none;">
                             <input id = "date_start" name = "date_start" type="text" class="form-control">
                         </div>
                         <div class="col-md-4" style = "display: none;">
                             <input id = "inscomp" name = "inscomp" type="text" class="form-control">
                         </div>
                    </form>

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
		                                    $('#ch_overall').hide(800)"/>
		                                    <label for="radio_daily">Daily</label>

		                                    <input name="group" type="radio" id="radio_weekly" onclick="
		                                    $('#ch_daily').hide(800);
		                                    $('#ch_weekly').show(800);
		                                    $('#ch_monthly').hide(800);
		                                    $('#ch_quarterly').hide(800);
		                                    $('#ch_annually').hide(800);
		                                    $('#ch_overall').hide(800)" />
		                                    <label for="radio_weekly">Weekly</label>

		                                    <input name="group" type="radio" id="radio_monthly" onclick="
		                                    $('#ch_daily').hide(800);
		                                    $('#ch_weekly').hide(800);
		                                    $('#ch_monthly').show(800);
		                                    $('#ch_quarterly').hide(800);
		                                    $('#ch_annually').hide(800);
		                                    $('#ch_overall').hide(800)" />
		                                    <label for="radio_monthly">Monthly</label>

		                                    <input name="group" type="radio" id="radio_quarterly" onclick="
		                                    $('#ch_daily').hide(800);
		                                    $('#ch_weekly').hide(800);
		                                    $('#ch_monthly').hide(800);
		                                    $('#ch_quarterly').show(800);
		                                    $('#ch_annually').hide(800);
		                                    $('#ch_overall').hide(800)"  />
		                                    <label for="radio_quarterly">Quarterly</label>

		                                    <input name="group" type="radio" id="radio_annually" onclick="
		                                    $('#ch_daily').hide(800);
		                                    $('#ch_weekly').hide(800);
		                                    $('#ch_monthly').hide(800);
		                                    $('#ch_quarterly').hide(800);
		                                    $('#ch_annually').show(800);
		                                    $('#ch_overall').hide(800);"  />
		                                    <label for="radio_annually">Annually</label>

		                                    <input name="group" type="radio" id="radio_overall" onclick="
		                                    $('#ch_daily').hide(800);
		                                    $('#ch_weekly').hide(800);
		                                    $('#ch_monthly').hide(800);
		                                    $('#ch_quarterly').hide(800);
		                                    $('#ch_annually').hide(800);
		                                    $('#ch_overall').show(800);"  />
		                                    <label for="radio_overall">Overall</label>
		                                </div>
                                    </div>
                                </div>

                                <div class="body">
                                	<div id="ch_daily">
                                		<div class="row clearfix" style="text-align: center;">
	                                		<div class="col-md-4">
                                				<div class="form-group form-float">
			                                        <div class="form-line">
			                                        <label><small>Start Date:</small></label>
			                                            <input id = "ch_d_startdate" name = "daily_start" type="date" class="form-control" required>
			                                        </div>
			                                    </div>
                                			</div>
                                			<div class="col-md-4">
                                				<div class="form-group form-float">
			                                        <div class="form-line">
			                                        <label><small>End Date:</small></label>
			                                            <input id = "ch_d_enddate" name = "daily_end" type="date" class="form-control" required>
			                                        </div>
			                                    </div>
                                			</div>
	                            			<div class="col-md-4">
	                            				<div class="form-group form-float">
			                                        <label><small>Insurance Company:</small></label>
				                                        <select id = "ch_d_inscomp" name = "ch_d_inscomp" class="form-control show-tick" data-live-search="true" required>
				                                            <option value = "" style = "display:none;">-- Select Company --</option>
				                                             @foreach($company as $com)
				                                                @if($com->comp_type == 0)
				                                                @if($com->comp_ID < 5)
				                                                 <option value = "{{ $com->comp_name}}">{{ $com->comp_name }}</option>
				                                                 @endif
				                                                @endif
				                                             @endforeach
				                                        </select>
				                                        <br/>
				                                        <br/>
			                                        </div>
	                            			</div>
	                                	</div>
                                		<div class="body table-responsive">
				                            <table id="tb_daily" class="table table-bordered table-striped table-hover js-basic-example dataTable">
				                                <thead>
				                                    <tr class="bg-teal">
				                                        <th>Day</th>
				                                        <th>Total Amount of Collected Payment</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                             	</tbody>
				                            </table>
				                        </div>
                                	</div>

                                	<div id="ch_weekly">
                                		<div class="row clearfix" style="text-align: center;">
	                                		<div class="col-md-4">
                                			</div>
	                            			<div class="col-md-4">
	                            				<div class="form-group form-float">
			                                        <label><small>Insurance Company:</small></label>
				                                        <select id = "ch_w_inscomp" name = "ch_w_inscomp" class="form-control show-tick" data-live-search="true" required >
				                                            <option value = "" style = "display:none;">-- Select Company --</option>
				                                             @foreach($company as $com)
				                                                @if($com->comp_type == 0)
				                                                @if($com->comp_ID < 5)
				                                                 <option value = "{{ $com->comp_name }}">{{ $com->comp_name }}</option>
				                                                 @endif
				                                                @endif
				                                             @endforeach
				                                        </select>
				                                        <br/>
				                                        <br/>
			                                        </div>
	                            			</div>
                                			<div class="col-md-4">
                                			</div>
	                                	</div>
                                		<div class="body table-responsive">
				                            <table id="tb_weekly" class="table table-bordered table-striped table-hover js-basic-example dataTable">
				                                <thead>
				                                    <tr class="bg-teal">
				                                        <th>Week</th>
				                                        <th>Total Amount of Collected Payment</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                             	</tbody>
				                            </table>
				                            <br/>
				                        </div>
                                	</div>

                                	<div id="ch_monthly">
                                		<div class="row clearfix" style="text-align: center;">
	                                		<div class="col-md-4">
                                			</div>
	                            			<div class="col-md-4">
	                            				<div class="form-group form-float">
			                                        <label><small>Insurance Company:</small></label>
				                                        <select id = "ch_m_inscomp" name = "ch_m_inscomp" class="form-control show-tick" data-live-search="true" required>
				                                            <option value = "" style = "display:none;">-- Select Company --</option>
				                                             @foreach($company as $com)
				                                                @if($com->comp_type == 0)
				                                                @if($com->comp_ID < 5)
				                                                 <option value = "{{ $com->comp_name }}">{{ $com->comp_name }}</option>
				                                                 @endif
				                                                @endif
				                                             @endforeach
				                                        </select>
				                                        <br/>
				                                        <br/>
			                                        </div>
	                            			</div>
                                			<div class="col-md-4">
                                			</div>
	                                	</div>
                                		<div class="body table-responsive">
				                            <table id="tb_monthly" class="table table-bordered table-striped table-hover js-basic-example dataTable">
				                                <thead>
				                                    <tr class="bg-teal">
				                                        <th>Month</th>
				                                        <th>Total Amount of Collected Payment</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                             	</tbody>
				                            </table>
				                            <br/>
				                        </div>
                                	</div>

                                	<div id="ch_quarterly">
                                		<div class="row clearfix" style="text-align: center;">
	                                		<div class="col-md-4">
                                			</div>
	                            			<div class="col-md-4">
	                            				<div class="form-group form-float">
			                                        <label><small>Insurance Company:</small></label>
				                                        <select id = "ch_q_inscomp" name = "ch_q_inscomp" class="form-control show-tick" data-live-search="true" required>
				                                            <option value = "" style = "display:none;">-- Select Company --</option>
				                                             @foreach($company as $com)
				                                                @if($com->comp_type == 0)
				                                                @if($com->comp_ID < 5)
				                                                 <option value = "{{ $com->comp_name }}">{{ $com->comp_name }}</option>
				                                                 @endif
				                                                @endif
				                                             @endforeach
				                                        </select>
				                                        <br/>
				                                        <br/>
			                                        </div>
	                            			</div>
                                			<div class="col-md-4">
                                			</div>
	                                	</div>
                                		<div class="body table-responsive">
				                            <table id="tb_quarter" class="table table-bordered table-striped table-hover js-basic-example dataTable">
				                                <thead>
				                                    <tr class="bg-teal">
				                                        <th>Quarter</th>
				                                        <th>Total Amount of Collected Payment</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                                	
				                             	</tbody>
				                            </table><br/>
				                        </div>
                                	</div>

                                	<div id="ch_annually">
                                		<div class="row clearfix" style="text-align: center;">
	                                		<div class="col-md-4">
                                			</div>
	                            			<div class="col-md-4">
	                            				<div class="form-group form-float">
			                                        <label><small>Insurance Company:</small></label>
				                                        <select id = "ch_a_inscomp" name = "ch_a_inscomp" class="form-control show-tick" data-live-search="true" required>
				                                            <option value = "" style = "display:none;">-- Select Company --</option>
				                                             @foreach($company as $com)
				                                                @if($com->comp_type == 0)
				                                                @if($com->comp_ID < 5)
				                                                 <option value = "{{ $com->comp_name }}">{{ $com->comp_name }}</option>
				                                                 @endif
				                                                @endif
				                                             @endforeach
				                                        </select>
				                                        <br/>
				                                        <br/>
			                                        </div>
	                            			</div>
                                			<div class="col-md-4">
                                			</div>
	                                	</div>
                                		<div class="body">
                                			<div class="body table-responsive">
					                            <table id="tb_annual" class="table table-bordered table-striped table-hover js-basic-example dataTable">
					                                <thead>
					                                    <tr class="bg-teal">
					                                        <th>Year</th>
					                                        <th>Total Amount of Collected Payment</th>
					                                    </tr>
					                                </thead>
					                                <tbody>
					                             	</tbody>
					                            </table><br/>
					                        </div>
                                		</div>
                                	</div>

                                	<div id="ch_overall">
                                		<div class="body">
                                			<div class="body table-responsive">
					                            <table id="tb_overall" class="table table-bordered table-striped table-hover js-basic-example dataTable">
					                                <thead>
					                                    <tr class="bg-teal">
					                                        <th>Insurance Company</th>
					                                        <th>Total Amount of Collected Payment</th>
					                                    </tr>
					                                </thead>
					                                <tbody>
					                                	@foreach($overall as $ov)
					                                	<tr>
					                                		<td>{{ $ov->Company }}</td>
					                                		<td><b>₱<?php echo number_format($ov->Amount, 2, '.', ','); ?>
					                                		 </b></td>
					                                	</tr>
					                                	@endforeach
					                                	<tr>
					                                		<td><b>TOTAL :</b></td>
					                                		<td>
					                                			<script type="text/javascript">
					                                				var count=0;
						                                			@foreach($overall as $ov1)
						                                				count += {{$ov1->Amount}};
						                                			@endforeach

						                                			document.write('<b>' +numberWithCommas(count) +'</b>');
					                                			</script>
					                                		</td>
					                                	</tr>
					                             	</tbody>
					                            </table><br/>
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
		                                    $('#ch_annually1').hide(800);
		                                    $('#ch_overall1').hide(800);"/>
		                                    <label for="radio_daily1">Daily</label>

		                                    <input name="group1" type="radio" id="radio_weekly1" onclick="
		                                    $('#ch_daily1').hide(800);
		                                    $('#ch_weekly1').show(800);
		                                    $('#ch_monthly1').hide(800);
		                                    $('#ch_quarterly1').hide(800);
		                                    $('#ch_annually1').hide(800);
		                                    $('#ch_overall1').hide(800);" />
		                                    <label for="radio_weekly1">Weekly</label>

		                                    <input name="group1" type="radio" id="radio_monthly1" onclick="
		                                    $('#ch_daily1').hide(800);
		                                    $('#ch_weekly1').hide(800);
		                                    $('#ch_monthly1').show(800);
		                                    $('#ch_quarterly1').hide(800);
		                                    $('#ch_annually1').hide(800);
		                                    $('#ch_overall1').hide(800);" />
		                                    <label for="radio_monthly1">Monthly</label>

		                                    <input name="group1" type="radio" id="radio_quarterly1" onclick="
		                                    $('#ch_daily1').hide(800);
		                                    $('#ch_weekly1').hide(800);
		                                    $('#ch_monthly1').hide(800);
		                                    $('#ch_quarterly1').show(800);
		                                    $('#ch_annually1').hide(800);
		                                    $('#ch_overall1').hide(800);"  />
		                                    <label for="radio_quarterly1">Quarterly</label>

		                                    <input name="group1" type="radio" id="radio_annually1" onclick="
		                                    $('#ch_daily1').hide(800);
		                                    $('#ch_weekly1').hide(800);
		                                    $('#ch_monthly1').hide(800);
		                                    $('#ch_quarterly1').hide(800);
		                                    $('#ch_annually1').show(800);
		                                    $('#ch_overall1').hide(800);"  />
		                                    <label for="radio_annually1">Annually</label>

		                                    <input name="group1" type="radio" id="radio_overall1" onclick="
		                                    $('#ch_daily1').hide(800);
		                                    $('#ch_weekly1').hide(800);
		                                    $('#ch_monthly1').hide(800);
		                                    $('#ch_quarterly1').hide(800);
		                                    $('#ch_annually1').hide(800);
		                                    $('#ch_overall1').show(800);"  />
		                                    <label for="radio_overall1">Overall</label>
		                                </div>
                                    </div>
                                </div>
                                <div class="body">
                                	<div id="ch_daily1">
                                		<div class="row clearfix" style="text-align: center;">
                                			<div class="col-md-4">
                                				<div class="form-group form-float">
			                                        <div class="form-line">
			                                        <label><small>Start Date:</small></label>
			                                            <input id = "daily_start" name = "daily_start" type="date" class="form-control" required>
			                                        </div>
			                                    </div>
                                			</div>
                                			<div class="col-md-4">
                                				<div class="form-group form-float">
			                                        <div class="form-line">
			                                        <label><small>End Date:</small></label>
			                                            <input id = "daily_end" name = "daily_end" type="date" class="form-control" required>
			                                        </div>
			                                    </div>
                                			</div>
                                			<div class="col-md-4">
	                            				<div class="form-group form-float">
			                                        <label><small>Insurance Company:</small></label>
				                                        <select id = "daily_comp" name = "daily_comp" class="form-control show-tick" data-live-search="true" required>
				                                            <option value = "" style = "display:none;">-- Select Company --</option>
				                                             @foreach($company as $com)
				                                                @if($com->comp_type == 0)
				                                                @if($com->comp_ID < 5)
				                                                 <option value = "{{ $com->comp_name }}">{{ $com->comp_name }}</option>
				                                                 @endif
				                                                @endif
				                                             @endforeach
				                                        </select>
				                                        <br/>
				                                        <br/>
			                                        </div>
	                            			</div>
                                		</div>
                                		<canvas id="line_chart" height="150"></canvas>
                                	</div>
                                	<div id="ch_weekly1">
                                		<div class="row clearfix" style="text-align: center;">
                                			<div class="col-md-4">
                                			</div>
                                			<div class="col-md-4">
	                            				<div class="form-group form-float">
			                                        <label><small>Insurance Company:</small></label>
				                                        <select id = "weekly_comp" name = "daily_comp" class="form-control show-tick" data-live-search="true" required>
				                                            <option value = "" style = "display:none;">-- Select Company --</option>
				                                             @foreach($company as $com)
				                                                @if($com->comp_type == 0)
				                                                @if($com->comp_ID < 5)
				                                                 <option value = "{{ $com->comp_name }}">{{ $com->comp_name }}</option>
				                                                 @endif
				                                                @endif
				                                             @endforeach
				                                        </select>
				                                        <br/>
				                                        <br/>
			                                        </div>
	                            			</div>
                                			<div class="col-md-4">
                                			</div>
                                		</div>
                                		<canvas id="line_chart1" height="150"></canvas>
                                	</div>
                                	<div id="ch_monthly1">
                                		<div class="row clearfix" style="text-align: center;">
                                			<div class="col-md-4">
                                			</div>
                                			<div class="col-md-4">
	                            				<div class="form-group form-float">
			                                        <label><small>Insurance Company:</small></label>
				                                        <select id = "monthly_comp" name = "daily_comp" class="form-control show-tick" data-live-search="true" required>
				                                            <option value = "" style = "display:none;">-- Select Company --</option>
				                                             @foreach($company as $com)
				                                                @if($com->comp_type == 0)
				                                                @if($com->comp_ID < 5)
				                                                 <option value = "{{ $com->comp_name }}">{{ $com->comp_name }}</option>
				                                                 @endif
				                                                @endif
				                                             @endforeach
				                                        </select>
				                                        <br/>
				                                        <br/>
			                                        </div>
	                            			</div>
                                			<div class="col-md-4">
                                			</div>
                                		</div>
                                		<canvas id="line_chart2" height="150"></canvas>
                                	</div>
                                	<div id="ch_quarterly1">
                                		<div class="row clearfix" style="text-align: center;">
                                			<div class="col-md-4">
                                			</div>
                                			<div class="col-md-4">
	                            				<div class="form-group form-float">
			                                        <label><small>Insurance Company:</small></label>
				                                        <select id = "quarterly_comp" name = "daily_comp" class="form-control show-tick" data-live-search="true" required>
				                                            <option value = "" style = "display:none;">-- Select Company --</option>
				                                             @foreach($company as $com)
				                                                @if($com->comp_type == 0)
				                                                @if($com->comp_ID < 5)
				                                                 <option value = "{{ $com->comp_name }}">{{ $com->comp_name }}</option>
				                                                 @endif
				                                                @endif
				                                             @endforeach
				                                        </select>
				                                        <br/>
				                                        <br/>
			                                        </div>
	                            			</div>
                                			<div class="col-md-4">
                                			</div>
                                		</div>
                                		<canvas id="line_chart3" height="150"></canvas>
                                	</div>
                                	<div id="ch_annually1">
                                		<div class="row clearfix" style="text-align: center;">
                                			<div class="col-md-4">
                                			</div>
                                			<div class="col-md-4">
	                            				<div class="form-group form-float">
			                                        <label><small>Insurance Company:</small></label>
				                                        <select id = "anually_comp" name = "anually_comp" class="form-control show-tick" data-live-search="true" required>
				                                            <option value = "" style = "display:none;">-- Select Company --</option>
				                                             @foreach($company as $com)
				                                                @if($com->comp_type == 0)
				                                                @if($com->comp_ID < 5)
				                                                 <option value = "{{ $com->comp_name }}">{{ $com->comp_name }}</option>
				                                                 @endif
				                                                @endif
				                                             @endforeach
				                                        </select>
				                                        <br/>
				                                        <br/>
			                                        </div>
	                            			</div>
                                			<div class="col-md-4">
                                			</div>
                                		</div>
                                		<canvas id="line_chart4" height="150"></canvas>
                                	</div>
                                	<div id="ch_overall1">
                                		<canvas id="pie_chart" height="150"></canvas>
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
                                		<div class="col-md-3">
		                                    <div class="form-group form-float">
	                                            <div class="form-line">
	                                                <input id = "startdate" name = "startdate" type="date" class="form-control">
	                                            </div>
	                                        </div>
                            			</div>
                            			<div class="col-md-1"><b>to</b></div>
                            			<div class="col-md-3">
                            				<div class="form-group form-float">
	                                            <div class="form-line">
	                                                <input id = "enddate" name = "enddate" type="date" class="form-control">
	                                            </div>
	                                        </div>
                            			</div>
                            			<div class="col-md-2"></div>
                                	</div>
                                	<div class="row clearfix">
                                		<div class="col-md-2"></div>
                                		<div class="col-md-7">
	                            				<div class="form-group form-float">
			                                        <label><small>Insurance Company:</small></label>
				                                        <select id = "icomp" name = "icomp" class="form-control show-tick" data-live-search="true" required>
				                                            <option value = "" style = "display:none;">-- Select Company --</option>
				                                             @foreach($company as $com)
				                                                @if($com->comp_type == 0)
				                                                @if($com->comp_ID < 5)
				                                                 <option value = "{{ $com->comp_ID }}">{{ $com->comp_name }}</option>
				                                                 @endif
				                                                @endif
				                                             @endforeach
				                                        </select>
				                                        <br/>
				                                        <br/>
			                                        </div>
	                            			</div>
	                            			<div class="col-md-2"></div>
                                	</div>

                                	<div class="row clearfix" style="text-align: center;">
                                		<div class="col-md-2"></div>
                                		<div class="col-md-8">
		                                    <button form="gen_pdf" type="submit" id="gen" name="gen"  class="btn btn-block bg-orange waves-effect"  onclick="$('#date_start').val($('#startdate').val()); $('#date_end').val($('#enddate').val()); $('#inscomp').val($('#icomp').val());">GENERATE PDF</button>
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

    <!-- Chart Plugins Js -->
    <script src="{{ URL::asset ('plugins/chartjs/Chart.bundle.js')}}"></script>

    <script type="text/javascript">
    	window.onload = function (){
    		document.getElementById('ch_daily1').style.display = 'none';
    		document.getElementById('ch_weekly1').style.display = 'none';
    		document.getElementById('ch_monthly1').style.display = 'none';
    		document.getElementById('ch_quarterly1').style.display = 'none';
    		document.getElementById('ch_annually1').style.display = 'none';
    		document.getElementById('ch_overall1').style.display = 'none';

    		document.getElementById('ch_daily').style.display = 'none';
    		document.getElementById('ch_weekly').style.display = 'none';
    		document.getElementById('ch_monthly').style.display = 'none';
    		document.getElementById('ch_quarterly').style.display = 'none';
    		document.getElementById('ch_annually').style.display = 'none';
    		document.getElementById('ch_overall').style.display = 'none';
    	};
    </script>

    <script>
    	$(function () {
		    new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));
		    new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
		    new Chart(document.getElementById("line_chart1").getContext("2d"), getChartJs('line1'));
		    new Chart(document.getElementById("line_chart2").getContext("2d"), getChartJs('line2'));
		    new Chart(document.getElementById("line_chart3").getContext("2d"), getChartJs('line3'));
		    new Chart(document.getElementById("line_chart4").getContext("2d"), getChartJs('line4'));
		});

		$('#daily_start').on('change', function(){
			new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
		});

		$('#daily_end').on('change', function(){
			new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
		});

		$('#daily_comp').on('change', function(){
			new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
		});

		$('#weekly_comp').on('change', function(){
			new Chart(document.getElementById("line_chart1").getContext("2d"), getChartJs('line1'));
		});

		$('#monthly_comp').on('change', function(){
			new Chart(document.getElementById("line_chart2").getContext("2d"), getChartJs('line2'));
		});

		$('#quarterly_comp').on('change', function(){
			new Chart(document.getElementById("line_chart3").getContext("2d"), getChartJs('line3'));
		});

		$('#anually_comp').on('change', function(){
			new Chart(document.getElementById("line_chart4").getContext("2d"), getChartJs('line4'));
		});

		$('#ch_d_startdate').on('change', function(){
			$("#tb_daily td").parent().remove();
			var st = '';
			var en = '';
			var total = 0;
			var additional = '';
			st = $('#ch_d_startdate').val();
		    en = $('#ch_d_enddate').val()  + ' 23:59:59.000';
		    cm = $('#ch_d_inscomp').val();
			@foreach($day as $l)
		    	if('{{$l->Day}}' >= st && '{{$l->Day}}' <= en && '{{ $l->Company }}' == cm)
		    	{
	    			var data = numberWithCommas({{ $l->Amount }});
			    	var option = '<tr><td>{{ \Carbon\Carbon::parse($l->Day)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($l->Day)->format("l, h:i:s A").")" }}</td><td><b>₱' + data + '</b></td></tr>'
			    	$('#tb_daily tbody').append(option);

			    	total += {{ $l->Amount }}
		    	}
		    @endforeach
		    var total1 = numberWithCommas(total);
		    var additional = '<tr><td>Total Amount: </td><td><b>₱' + total1 + '</b></td></tr>'
		    $('#tb_daily tbody').append(additional);
		});

		$('#ch_d_enddate').on('change', function(){
			$("#tb_daily td").parent().remove();
			var st = '';
			var en = '';
			var total = 0;
			var additional = '';
			st = $('#ch_d_startdate').val();
		    en = $('#ch_d_enddate').val()  + ' 23:59:59.000';
		    cm = $('#ch_d_inscomp').val();
			@foreach($day as $l)
		    	if('{{$l->Day}}' >= st && '{{$l->Day}}' <= en && '{{ $l->Company }}' == cm)
		    	{
	    			var data = numberWithCommas({{ $l->Amount }});
			    	var option = '<tr><td>{{ \Carbon\Carbon::parse($l->Day)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($l->Day)->format("l, h:i:s A").")" }}</td><td><b>₱' + data + '</b></td></tr>'
			    	$('#tb_daily tbody').append(option);

			    	total += {{ $l->Amount }}
		    	}
		    @endforeach
		    var total1 = numberWithCommas(total);
		    var additional = '<tr><td>Total Amount: </td><td><b>₱' + total1 + '</b></td></tr>'
		    $('#tb_daily tbody').append(additional);
		});

		$('#ch_d_inscomp').on('change', function(){
			$("#tb_daily td").parent().remove();
			var st = '';
			var en = '';
			var total = 0;
			var additional = '';
			st = $('#ch_d_startdate').val();
		    en = $('#ch_d_enddate').val()  + ' 23:59:59.000';
		    cm = $('#ch_d_inscomp').val();
			@foreach($day as $l)
		    	if('{{$l->Day}}' >= st && '{{$l->Day}}' <= en && '{{ $l->Company }}' == cm)
		    	{
	    			var data = numberWithCommas({{ $l->Amount }});
			    	var option = '<tr><td>{{ \Carbon\Carbon::parse($l->Day)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($l->Day)->format("l, h:i:s A").")" }}</td><td><b>₱' + data + '</b></td></tr>'
			    	$('#tb_daily tbody').append(option);

			    	total += {{ $l->Amount }}
		    	}
		    @endforeach
		    var total1 = numberWithCommas(total);
		    var additional = '<tr><td>Total Amount: </td><td><b>₱' + total1 + '</b></td></tr>'
		    $('#tb_daily tbody').append(additional);
		});

		$('#ch_w_inscomp').on('change', function(){
			$("#tb_weekly td").parent().remove();
			var st = '';
			var en = '';
			var total = 0;
			var additional = '';
		    cm = $('#ch_w_inscomp').val();
			@foreach($week as $l)
		    	if('{{ $l->Company }}' == cm)
		    	{
	    			var data = numberWithCommas({{ $l->Amount }});
			    	var option = '<tr><td>{{ $l->Week }}</td><td><b>₱' + data + '</b></td></tr>'
			    	$('#tb_weekly tbody').append(option);

			    	total += {{ $l->Amount }}
		    	}
		    @endforeach
		    var total1 = numberWithCommas(total);
		    var additional = '<tr><td>Total Amount: </td><td><b>₱' + total1 + '</b></td></tr>'
		    $('#tb_weekly tbody').append(additional);
		});

		$('#ch_m_inscomp').on('change', function(){
			$("#tb_monthly td").parent().remove();
			var st = '';
			var en = '';
			var total = 0;
			var additional = '';
		    cm = $('#ch_m_inscomp').val();
			@foreach($month as $l)
		    	if('{{ $l->Company }}' == cm)
		    	{
	    			var data = numberWithCommas({{ $l->Amount }});
			    	var option = '<tr><td>{{ $l->Month }}</td><td><b>₱' + data + '</b></td></tr>'
			    	$('#tb_monthly tbody').append(option);

			    	total += {{ $l->Amount }}
		    	}
		    @endforeach
		    var total1 = numberWithCommas(total);
		    var additional = '<tr><td>Total Amount: </td><td><b>₱' + total1 + '</b></td></tr>'
		    $('#tb_monthly tbody').append(additional);
		});

		$('#ch_q_inscomp').on('change', function(){
			$("#tb_quarter td").parent().remove();
			var st = '';
			var en = '';
			var total = 0;
			var additional = '';
		    cm = $('#ch_q_inscomp').val();
			@foreach($quar as $l)
		    	if('{{ $l->Company }}' == cm)
		    	{
	    			var data = numberWithCommas({{ $l->Amount }});
			    	var option = '<tr><td>{{ $l->Quarter }}</td><td><b>₱' + data + '</b></td></tr>'
			    	$('#tb_quarter tbody').append(option);

			    	total += {{ $l->Amount }}
		    	}
		    @endforeach
		    var total1 = numberWithCommas(total);
		    var additional = '<tr><td>Total Amount: </td><td><b>₱' + total1 + '</b></td></tr>'
		    $('#tb_quarter tbody').append(additional);
		});

		$('#ch_a_inscomp').on('change', function(){
			$("#tb_annual td").parent().remove();
			var st = '';
			var en = '';
			var total = 0;
			var additional = '';
		    cm = $('#ch_a_inscomp').val();
			@foreach($year as $l)
		    	if('{{ $l->Company }}' == cm)
		    	{
	    			var data = numberWithCommas({{ $l->Amount }});
			    	var option = '<tr><td>{{ $l->Year }}</td><td><b>₱' + data + '</b></td></tr>'
			    	$('#tb_annual tbody').append(option);

			    	total += {{ $l->Amount }}
		    	}
		    @endforeach
		    var total1 = numberWithCommas(total);
		    var additional = '<tr><td>Total Amount: </td><td><b>₱' + total1 + '</b></td></tr>'
		    $('#tb_annual tbody').append(additional);
		});

		function getChartJs(type) {

			var config = null;
			var st = '';
			var en = '';

		    if (type === 'pie') {
		    	var a = 0;
				var labels = [],data=[];

		    	@foreach($overall as $o)
		    		labels[a] = "{{ $o->Company }}"
			    	data[a] = "{{ $o->Amount }}"
			    	a += 1;
		    	@endforeach

		        config = {
		            type: 'pie',
		            data: {
		                datasets: [{
		                    data: data,
		                    backgroundColor: [
		                        "rgb(233, 30, 99)",
		                        "rgb(255, 193, 7)",
		                        "rgb(0, 188, 212)",
		                        "rgb(139, 195, 74)"
		                    ],
		                }],
		                labels: labels
		            },
		            options: {
		                responsive: true,
		                legend: false
		            }
		        }
	    	}

	    	if (type === 'line') {
	    		var a = 0;
			    var i = 0;
			   	st = $('#daily_start').val();
			    en = $('#daily_end').val();
			    cm = $('#daily_comp').val();
			    var labels = [],data=[];
			    @foreach($day as $list1)
			    	if('{{$list1->Day}}' >= st && '{{$list1->Day}}' <= en && '{{ $list1->Company }}' == cm)
			    	{
				    	labels[a] = "{{ $list1->Day }}"
				    	data[a] = "{{ $list1->Amount }}"
				    	a += 1;
				    	
			    	}
			    @endforeach

		        config = {
		            type: 'line',
		            data: {
		                labels: labels,
		                datasets: [{
		                    label: "Amount",
		                    data: data,
		                    borderColor: 'rgba(13, 71, 161, 0.75)',
		                    backgroundColor: 'rgba(68, 138, 255, 0.3)',
		                    pointBorderColor: 'rgba(13, 71, 161, 0)',
		                    pointBackgroundColor: 'rgba(13, 71, 161, 0.9)',
		                    pointBorderWidth: 2
		                }],
		            },
		            options: {
		                responsive: true,
		                legend: false
		            }
		        }
		    }

		    if (type === 'line1') {
		        var a = 0;
			    var i = 0;
			    cm = $('#weekly_comp').val();
			    var labels = [],data=[];
			    @foreach($week as $list1)
			    	if('{{ $list1->Company }}' == cm)
			    	{
				    	labels[a] = "{{ $list1->Week }}"
				    	data[a] = "{{ $list1->Amount }}"
				    	a += 1;
				    	
			    	}
			    @endforeach

		        config = {
		            type: 'line',
		            data: {
		                labels: labels,
		                datasets: [{
		                    label: "Amount",
		                    data: data,
		                    borderColor: 'rgba(13, 71, 161, 0.75)',
		                    backgroundColor: 'rgba(68, 138, 255, 0.3)',
		                    pointBorderColor: 'rgba(13, 71, 161, 0)',
		                    pointBackgroundColor: 'rgba(13, 71, 161, 0.9)',
		                    pointBorderWidth: 2
		                }],
		            },
		            options: {
		                responsive: true,
		                legend: false
		            }
		        }
		    }

		    if (type === 'line2') {
		        var a = 0;
			    var i = 0;
			    cm = $('#monthly_comp').val();
			    var labels = [],data=[];
			    @foreach($month as $list1)
			    	if('{{ $list1->Company }}' == cm)
			    	{
				    	labels[a] = "{{ $list1->Month }}"
				    	data[a] = "{{ $list1->Amount }}"
				    	a += 1;
				    	
			    	}
			    @endforeach

		        config = {
		            type: 'line',
		            data: {
		                labels: labels,
		                datasets: [{
		                    label: "Amount",
		                    data: data,
		                    borderColor: 'rgba(13, 71, 161, 0.75)',
		                    backgroundColor: 'rgba(68, 138, 255, 0.3)',
		                    pointBorderColor: 'rgba(13, 71, 161, 0)',
		                    pointBackgroundColor: 'rgba(13, 71, 161, 0.9)',
		                    pointBorderWidth: 2
		                }],
		            },
		            options: {
		                responsive: true,
		                legend: false
		            }
		        }
		    }

		    if (type === 'line3') {
		        var a = 0;
			    var i = 0;
			    cm = $('#quarterly_comp').val();
			    var labels = [],data=[];
			    @foreach($quar as $list1)
			    	if('{{ $list1->Company }}' == cm)
			    	{
				    	labels[a] = "{{ $list1->Quarter }}"
				    	data[a] = "{{ $list1->Amount }}"
				    	a += 1;
				    	
			    	}
			    @endforeach

		        config = {
		            type: 'line',
		            data: {
		                labels: labels,
		                datasets: [{
		                    label: "Amount",
		                    data: data,
		                    borderColor: 'rgba(13, 71, 161, 0.75)',
		                    backgroundColor: 'rgba(68, 138, 255, 0.3)',
		                    pointBorderColor: 'rgba(13, 71, 161, 0)',
		                    pointBackgroundColor: 'rgba(13, 71, 161, 0.9)',
		                    pointBorderWidth: 2
		                }],
		            },
		            options: {
		                responsive: true,
		                legend: false
		            }
		        }
		    }

		    if (type === 'line4') {
		        var a = 0;
			    var i = 0;
			    cm = $('#anually_comp').val();
			    var labels = [],data=[];
			    @foreach($year as $list1)
			    	if('{{ $list1->Company }}' == cm)
			    	{
				    	labels[a] = "{{ $list1->Year }}"
				    	data[a] = "{{ $list1->Amount }}"
				    	a += 1;
				    	
			    	}
			    @endforeach

		        config = {
		            type: 'line',
		            data: {
		                labels: labels,
		                datasets: [{
		                    label: "Amount",
		                    data: data,
		                    borderColor: 'rgba(13, 71, 161, 0.75)',
		                    backgroundColor: 'rgba(68, 138, 255, 0.3)',
		                    pointBorderColor: 'rgba(13, 71, 161, 0)',
		                    pointBackgroundColor: 'rgba(13, 71, 161, 0.9)',
		                    pointBorderWidth: 2
		                }],
		            },
		            options: {
		                responsive: true,
		                legend: false
		            }
		        }
		    }
    	return config;
		}
    </script>
@endsection
