@extends('pages.admin.master')

@section('title', 'Sales Report - Transaction | i-Insure')

@section('reports','active')

@section('reportSales','active')

@section('salesCount','active')

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
                    <h4 style="text-align: center;">- By Number of Collected Payments -</h3>
                </div>
                <div class="body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                        <li role="presentation" class="col-md-4"><a href="#tabular" data-toggle="tab" style="text-align: center; font-size: 20px">TABULAR</a></li>
                        <li role="presentation" class="col-md-4 active"><a href="#graphical" data-toggle="tab" style="text-align: center; font-size: 20px">GRAPHICAL</a></li>
                        <li role="presentation" class="col-md-4"><a href="#pdf" data-toggle="tab" style="text-align: center; font-size: 20px">GENERATE PDF</a></li>
                    </ul>

                    <form id = "gen_pdf" action = "/pdf/reports/sales/by/count" method = "GET" style = "display: none;">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="col-md-4" style = "display: none;">
                             <input id = "date_end" name = "date_end" type="text" class="form-control">
                         </div>
                          <div class="col-md-4" style = "display: none;">
                             <input id = "date_start" name = "date_start" type="text" class="form-control">
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
		                                    $('#ch_annually').hide(800);"/>
		                                    <label for="radio_daily">Daily</label>

		                                    <input name="group" type="radio" id="radio_weekly" onclick="
		                                    $('#ch_daily').hide(800);
		                                    $('#ch_weekly').show(800);
		                                    $('#ch_monthly').hide(800);
		                                    $('#ch_quarterly').hide(800);
		                                    $('#ch_annually').hide(800);" />
		                                    <label for="radio_weekly">Weekly</label>

		                                    <input name="group" type="radio" id="radio_monthly" onclick="
		                                    $('#ch_daily').hide(800);
		                                    $('#ch_weekly').hide(800);
		                                    $('#ch_monthly').show(800);
		                                    $('#ch_quarterly').hide(800);
		                                    $('#ch_annually').hide(800);" />
		                                    <label for="radio_monthly">Monthly</label>

		                                    <input name="group" type="radio" id="radio_quarterly" onclick="
		                                    $('#ch_daily').hide(800);
		                                    $('#ch_weekly').hide(800);
		                                    $('#ch_monthly').hide(800);
		                                    $('#ch_quarterly').show(800);
		                                    $('#ch_annually').hide(800);"  />
		                                    <label for="radio_quarterly">Quarterly</label>

		                                    <input name="group" type="radio" id="radio_annually" onclick="
		                                    $('#ch_daily').hide(800);
		                                    $('#ch_weekly').hide(800);
		                                    $('#ch_monthly').hide(800);
		                                    $('#ch_quarterly').hide(800);
		                                    $('#ch_annually').show(800);"  />
		                                    <label for="radio_annually">Annually</label>
		                                </div>
                                    </div>
                                </div>

                                <div class="body">
                                	<div id="ch_daily">
                                		<div class="row clearfix" style="text-align: center;">
	                                		<div class="col-md-2"></div>
	                                		<div class="col-md-3">
			                                    <div class="form-group form-float">
		                                            <div class="form-line">
		                                                <input id = "ch_d_startdate" name = "ch_d_startdate" type="date" class="form-control">
		                                            </div>
		                                        </div>
	                            			</div>
	                            			<div class="col-md-1"><b>to</b></div>
	                            			<div class="col-md-3">
	                            				<div class="form-group form-float">
		                                            <div class="form-line">
		                                                <input id = "ch_d_enddate" name = "ch_d_enddate" type="date" class="form-control">
		                                            </div>
		                                        </div>
	                            			</div>
	                            			<div class="col-md-2"></div>
	                                	</div>
                                		<div class="body table-responsive">
				                            <table id="tb_daily" class="table table-bordered table-striped table-hover js-basic-example dataTable">
				                                <thead>
				                                    <tr class="bg-teal">
				                                        <th>Day</th>
				                                        <th>Number of Received Payment</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                             	</tbody>
				                            </table>
				                        </div>
                                	</div>

                                	<div id="ch_weekly">
                                		<div class="body table-responsive">
				                            <table id="ex" class="table table-bordered table-striped table-hover js-basic-example dataTable">
				                                <thead>
				                                    <tr class="bg-teal">
				                                        <th>Week</th>
				                                        <th>Number of Received Payment</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                                	@foreach($pay as $list)
				                                	<tr>
				                                		<td>{{ $list->Week }}</td>
				                                		<td><b>
				                                			<script>
				                                            	var data = numberWithCommas({{ $list->Count }}); document.write(data);
				                                            </script>
				                                        </b></td>
				                                	</tr>
												    @endforeach
				                             	</tbody>
				                            </table>
				                            <br/>
					                            <div style = "display:none;">
									                {{$total = 0}}
					                                @foreach($pay as $list)
											          	{{$total = $total + $list->Count}}
					                                @endforeach
					                            </div>
			                                	<h3 style="text-align: center;"><b>Total Number: <?php echo $total; ?></b></h3>
				                        </div>
                                	</div>

                                	<div id="ch_monthly">
                                		<div class="body table-responsive">
				                            <table id="ex" class="table table-bordered table-striped table-hover js-basic-example dataTable">
				                                <thead>
				                                    <tr class="bg-teal">
				                                        <th>Month</th>
				                                        <th>Number of Received Payment</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                                	@foreach($month as $list)
				                                	<tr>
				                                		<td>{{ $list->Month }}</td>
				                                		<td><b>
				                                			<script>
				                                            	var data = numberWithCommas({{ $list->Count }}); document.write(data);
				                                            </script>
				                                        </b></td>
				                                	</tr>
												    @endforeach
				                             	</tbody>
				                            </table>
				                            <br/>
					                            <div style = "display:none;">
									                {{$total = 0}}
					                                @foreach($month as $list)
											                  {{$total = $total + $list->Count}}
					                                @endforeach
					                            </div>
			                                	<h3 style="text-align: center;"><b>Total Number: <?php echo $total; ?></b></h3>
				                        </div>
                                	</div>

                                	<div id="ch_quarterly">
                                		<div class="body table-responsive">
				                            <table id="ex" class="table table-bordered table-striped table-hover js-basic-example dataTable">
				                                <thead>
				                                    <tr class="bg-teal">
				                                        <th>Quarter</th>
				                                        <th>Number of Received Payment</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                                	@foreach($quar as $list)
				                                	<tr>
				                                		<td>{{ $list->Quarter }}</td>
					                                	<td><b>
					                                		<script>
				                                            	var data = numberWithCommas({{ $list->Count }}); document.write(data);
				                                            </script>
					                                	</b></td>
				                                	</tr>
				                                	@endforeach
				                             	</tbody>
				                            </table><br/>
					                            <div style = "display:none;">
									                {{$total = 0}}
					                                @foreach($quar as $list)
											                  {{$total = $total + $list->Count}}
					                                @endforeach
					                            </div>
			                                	<h3 style="text-align: center;"><b>Total Number: <?php echo $total; ?></b></h3>
				                        </div>
                                	</div>

                                	<div id="ch_annually">
                                		<div class="body">
                                			<div class="body table-responsive">
					                            <table id="ex" class="table table-bordered table-striped table-hover js-basic-example dataTable">
					                                <thead>
					                                    <tr class="bg-teal">
					                                        <th>Year</th>
					                                        <th>Number of Received Payment</th>
					                                    </tr>
					                                </thead>
					                                <tbody>
					                                	@foreach($year as $list)
					                                	<tr>
					                                		<td>{{ $list->Year }}</td>
					                                		<td><b>
					                                			<script>
					                                            	var data = numberWithCommas({{ $list->Count }}); document.write(data);
					                                            </script>
					                                		</b></td>
					                                	</tr>
					                                	@endforeach
					                             	</tbody>
					                            </table><br/>
					                            <div style = "display:none;">
									                {{$total = 0}}
					                                @foreach($year as $list)
											            {{$total = $total + $list->Count}}
					                                @endforeach
					                            </div>
			                                	<h3 style="text-align: center;"><b>Total Number: <?php echo $total; ?></b></h3>
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
                                			<div class="col-md-2"></div>
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
                                			<div class="col-md-2"></div>
                                		</div>
                                		<canvas id="line_chart" height="150"></canvas>
                                	</div>
                                	<div id="ch_weekly1">
                                		<canvas id="line_chart1" height="150"></canvas>
                                	</div>
                                	<div id="ch_monthly1">
                                		<canvas id="line_chart2" height="150"></canvas>
                                	</div>
                                	<div id="ch_quarterly1">
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

                                	<div class="row clearfix" style="text-align: center;">
                                		<div class="col-md-2"></div>
                                		<div class="col-md-8">
		                                    <button form="gen_pdf" type="submit" id="gen" name="gen"  class="btn btn-block bg-orange waves-effect"  onclick="$('#date_start').val($('#startdate').val()); $('#date_end').val($('#enddate').val());">GENERATE PDF</button>
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

    		document.getElementById('ch_daily').style.display = 'none';
    		document.getElementById('ch_weekly').style.display = 'none';
    		document.getElementById('ch_monthly').style.display = 'none';
    		document.getElementById('ch_quarterly').style.display = 'none';
    		document.getElementById('ch_annually').style.display = 'none';
    	};
    </script>

    <script>
    	$(function () {
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

		$('#ch_d_startdate').on('change', function(){
			$("#tb_daily td").parent().remove();
			var st = '';
			var en = '';
			st = $('#ch_d_startdate').val();
			en = $('#ch_d_enddate').val();
			var total = 0;
			var additional = '';
			var data = 0;
			@foreach($day as $list)
		    	if('{{$list->Day}}' >= st && '{{$list->Day}}' <= en)
		    	{
			    	var option = '<tr><td>{{ \Carbon\Carbon::parse($list->Day)->format("M-d-Y") }}</td><td><b>{{ $list->Count }}</b></td></tr>'
			    	$('#tb_daily tbody').append(option);

			    	total += 1;
		    	}
		    @endforeach
		    var additional = '<tr><td>Total Number: </td><td><b>₱' + total + '</b></td></tr>'
		    $('#tb_daily tbody').append(additional);
		});

		$('#ch_d_enddate').on('change', function(){
			$("#tb_daily td").parent().remove();
			var st = '';
			var en = '';
			st = $('#ch_d_startdate').val();
			en = $('#ch_d_enddate').val();
			var total = 0;
			var additional = '';
			var data = 0;
			@foreach($day as $list)
		    	if('{{$list->Day}}' >= st && '{{$list->Day}}' <= en)
		    	{
			    	var option = '<tr><td>{{ \Carbon\Carbon::parse($list->Day)->format("M-d-Y") }}</td><td><b>{{ $list->Count }}</b></td></tr>'
			    	$('#tb_daily tbody').append(option);

			    	total += 1;
		    	}
		    @endforeach
		    var additional = '<tr><td>Total Number: </td><td><b>' + total + '</b></td></tr>'
		    $('#tb_daily tbody').append(additional);
		});

		function getChartJs(type) {

			var config = null;
			var st = '';
			var en = '';

		    if (type === 'line') {
		    	var a = 0;
			    var i = 0;
			   	st = $('#daily_start').val();
			    en = $('#daily_end').val();
			    var labels = [],data=[];
			    @foreach($day as $list1)
			    	if('{{$list1->Day}}' >= st && '{{$list1->Day}}' <= en)
			    	{
				    	labels[a] = "{{ $list1->Day }}"
				    	data[a] = "{{ $list1->Count }}"
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
		                }]
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
			    var labels = [],data=[];
			    @foreach($pay as $list2)
			    	labels[a] = "{{ $list2->Week }}"
			    	data[a] = "{{ $list2->Count }}"
			    	a += 1;
			    @endforeach

		        config = {
		            type: 'line',
		            data: {
		                labels: labels,
		                datasets: [{
		                    label: "Total Number",
	                        data: data,
	                        borderColor: 'rgba(239, 83, 80, 0.75)',
	                        backgroundColor: 'rgba(255, 138, 128, 0.3)',
	                        pointBorderColor: 'rgba(239, 83, 80, 0)',
	                        pointBackgroundColor: 'rgba(239, 83, 80, 0.9)',
	                        pointBorderWidth: 2
		                }]
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
			    var labels = [],data=[];
			    @foreach($month as $list3)
			    	labels[a] = "{{ $list3->Month }}"
			    	data[a] = "{{ $list3->Count }}"
			    	a += 1;
			    @endforeach
		        config = {
		            type: 'line',
		            data: {
		                labels: labels,
		                datasets: [{
		                    label: "Total Number",
		                    data: data,
		                    borderColor: 'rgba(13, 71, 161, 0.75)',
		                    backgroundColor: 'rgba(68, 138, 255, 0.3)',
		                    pointBorderColor: 'rgba(13, 71, 161, 0)',
		                    pointBackgroundColor: 'rgba(13, 71, 161, 0.9)',
		                    pointBorderWidth: 2
		                }]
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
			    var labels = [],data=[];
			    @foreach($quar as $list4)
			    	labels[a] = "{{ $list4->Quarter }}"
			    	data[a] = "{{ $list4->Count }}"
			    	a += 1;
			    @endforeach
		        config = {
		            type: 'line',
		            data: {
		                labels: labels,
		                datasets: [{
		                    label: "Total Number",
		                    data: data,
		                    borderColor: 'rgba(239, 83, 80, 0.75)',
	                        backgroundColor: 'rgba(255, 138, 128, 0.3)',
	                        pointBorderColor: 'rgba(239, 83, 80, 0)',
	                        pointBackgroundColor: 'rgba(239, 83, 80, 0.9)',
		                    pointBorderWidth: 2
		                }]
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
			    var labels = [],data=[];
			    @foreach($year as $list5)
			    	labels[a] = "{{ $list5->Year }}"
			    	data[a] = "{{ $list5->Count }}"
			    	a += 1;
			    @endforeach
		        config = {
		            type: 'line',
		            data: {
		                labels: labels,
		                datasets: [{
		                    label: "Total Number",
		                    data: data,
		                    borderColor: 'rgba(13, 71, 161, 0.75)',
		                    backgroundColor: 'rgba(68, 138, 255, 0.3)',
		                    pointBorderColor: 'rgba(13, 71, 161, 0)',
		                    pointBackgroundColor: 'rgba(13, 71, 161, 0.9)',
		                    pointBorderWidth: 2
		                }]
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
