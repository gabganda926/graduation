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
	        		<th class="center">Remittance Date</th>
	        		<th class="center">Number of Received Payments</th>
	        	</tr>
        	</thead>

        	<tbody>
        		@foreach($day as $list)
        		@if($list->Day >= $date_start)
        		@if($list->Day <= $date_end)
	        		<tr>
		        		<td class="center">
		        			{{ $list->Day }}
		        		</td>
		        		<td class="center">
		        			{{ $list->Count }}
		        		</td>
		        	</tr>
		        @endif
		        @endif
	        	@endforeach
        	</tbody>
        </table>

	</body>

</html>

