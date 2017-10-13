<!DOCTYPE html>
<html>
	<head>
		<title>Sales Report</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		
	</head>
	<style type="text/css">

			table{
				border-collapse: collapse;
				margin-left: 20px;
				margin-right:20px;
				margin-top:2%;
			}

			table, td{
				border: 1px solid;
				font-size: 12px;
			}

			th{
				border: 1px solid;
				background-color: teal;
				color: white;
			}
			
			.page-break {
			    page-break-after: always;
			}

			.center{
				text-align: center;
			}

			.right{
				text-align: right;
				padding-right: 1em;
			}

			td.left1{
				padding-left: 2em;
				padding-top: 5px;
				padding-bottom: 3px;
			}

			body { font-family: DejaVu Sans;
					font-size: 13px; }

		</style>
	<body>
		<div>
			<left>
				<h1>
					<img src="{{ URL::asset('image/insurance-company-logos/pdflogo.png') }}" class="left1 circle responsive-img valign profile-image center" style="width:30%; float: left;">
					<p style="color:gray; font-size:-0.5px;"></p>
					<p style="color:gray">2/F, No. 1 Phase 1 Sta. Maria Compound, Marcos Hwy, Santolan, Pasig, 1610 Metro Manila</p>
					<p style="color:gray">Contact: (02) 576 3781</p>
					<p style="color:gray">Visit: www.comprelineinsurance.com</p><br/>
				</h1>
			</left>
			<right>
				
			</right>
		</div>
        <div class="col s12"><div class="divider" style="height:3px; background-color:teal"></div></div><br/>

        <p style="color:black; text-align: center; font-size:20px;"><strong>Sales Report</strong></p>
       	<p style="text-align: center;">{{ \Carbon\Carbon::parse($date_start)->format("M-d-Y") }} to {{ \Carbon\Carbon::parse($date_end)->format("M-d-Y") }}</p>

        <table width="100%" id="particulars">
        	<thead>
        		<tr>
	        		<th class="center">BOP Number</th>
	        		<th class="center">Policy Number</th>
	        		<th class="center">Client Name</th>
	        		<th class="center">Amount</th>
	        		<th class="center">Remittance Date</th>
	        	</tr>
        	</thead>

        	<tbody>
        		@foreach($plist as $list)
        		@foreach($cvouch as $vouch)
                    @if($list->check_voucher == $vouch->cv_ID)
	        		@if($list->status != 1)
	        		@if($list->status != 4)
	        		@if($list->paid_date >= $date_start)
	        		@if($list->paid_date <= $date_end)
	        		<tr>
		        		<td class="center">
		        			@if($list->payment_ID >= 10)
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
	                        @endif
		        		</td>
		        		<td class="center">
		        			@foreach($pdet as $paydet)
	                            @if($vouch->pay_ID == $paydet->payment_ID)
	                                @foreach($cliacc as $insacc)
	                                    @if($insacc->account_ID == $paydet->account_ID)
	                                        {{ $insacc->policy_number }}
	                                        <script> var ins_id = "ins = " +{{ $insacc->account_ID }}; console.log(ins_id); </script>
	                                    @endif
	                                @endforeach
		        		</td>
		        		<td class="center">
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
		                                                    <script> var pi_id = "pi = " + {{ $comp->comp_ID }}; console.log(pi_id); </script>
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
		        		<td class="center">
		        			₱ <?php $number = round($list->amount,2); echo number_format($number, 2, '.', ','); ?>
		        		</td>
		        		<td class="center">
		        			{{ \Carbon\Carbon::parse($list->paid_date)->format("M-d-Y") }} {{ "(".\Carbon\Carbon::parse($list->paid_date)->format("l, h:i:s A").")" }}
		        		</td>
		        	</tr>
		        	@endif
		        	@endif
		        	@endif
		        	@endif
		        	@endif
		       	@endforeach
	        	@endforeach
        	</tbody>
        </table>

	</body>

</html>

