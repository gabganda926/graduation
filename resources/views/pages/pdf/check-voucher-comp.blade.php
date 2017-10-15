<!DOCTYPE html>
<html>
	<head>
		<title>Check Voucher</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		
	</head>
	<style type="text/css">

			table{
				border-collapse: collapse;
				margin-left: 20px;
				margin-right:20px;
				margin-top:2%;
			}

			.solidd{
				border: 1px solid;
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
		<div style="display: none"> 
		{{ $ins = 0 }}
		@foreach($inscomp as $comp)
			@if($pno->insurance_company == $comp->comp_ID)
				{{ $ins = $comp->comp_name }}
			@endif
		@endforeach
		</div>

        <div class="col s12"><div class="divider" style="height:3px; background-color:teal"></div></div><br/><br/>
        <p style="color:black; text-align: center; font-size:15px;"><b>CHECK VOUCHER</b></p><br/><br/>
        <p><strong><input type="text" style="border: none; font-size: 15px; width: 550px;"></strong>
        <b><input type="text" style="border: none; font-size: 15px; width: 400px;" value="CV No:  
        												@if($cv->cv_ID >= 10)
			                                                CV00{{ $cv->cv_ID }}
			                                            @endif
			                                            @if($cv->cv_ID < 10)
			                                                CV000{{ $cv->cv_ID }}
			                                            @endif
			                                            @if($cv->cv_ID >= 100)
			                                                CV0{{ $cv->cv_ID }}
			                                            @endif
			                                            @if($cv->cv_ID >= 1000)
			                                                CV{{ $cv->cv_ID }}
			                                            @endif"></b></p>

        <p><strong><input type="text" style="border: none; font-size: 15px; width: 500px;"></strong>
        	<b> Date: <script>
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

        today = mm+'/'+dd+'/'+yyyy+</script><?php 
	    $today = date("D - M j, Y");  

	    echo $today; 
	    ?></b></p><br/>

      	<p style="font-size: 15px;">Payee: <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $ins }}  &nbsp;&nbsp;&nbsp;/ CARS DIRECT c/o. Mr. Allan</b></p>

      	<p style="font-size: 15px;">Net. Rem. <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $inf->comp_name }}  &nbsp;/ &nbsp; {{ $pno->policy_number}}  &nbsp;&nbsp;&nbsp;&nbsp;</b></p>

        <table width="100%" id="particulars" class="solidd">
        	<thead>
				<tr>
					<th data-field="checkno" class="center solidd" colspan="3">Particulars</th>
					<th data-field="amount" class="center solidd">Amount</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td class="right"></td>
					<td class="right"></td>
					<td class="right"></td>
				</tr>
				@foreach($list as $payments)
					@if($payments->check_voucher === $cv->cv_ID)
				<tr>
					<td class="center solidd">{{ $payments->or_number }}</td>
					<td class="left1 solidd">
						@foreach($payDet as $paydet)
							@if($paydet->payment_ID == $cv->pay_ID)
								@foreach($bank as $bnk)
									@if($paydet->bank_ID == $bnk->bank_ID)
										@foreach($address as $add)
											@if($bnk->bank_add_ID == $add->add_ID)
												{{ $bnk->bank_name_alt }} {{ $add->add_city }}
											@endif
										@endforeach
									@endif
								@endforeach
							@endif
						@endforeach
					</td>
					<td class="left1 solidd">{{ \Carbon\Carbon::parse($payments->due_date)->format('M d, Y')}}</td>
					<td class="right solidd">₱ <?php $number = $payments->amount; echo number_format($number, 2, '.', ','); ?></td>
				</tr>
					@endif
				@endforeach
				<div style = "display:none;">
	                {{$total = 0}}
	                @foreach($list as $payz)
	                 @if($payz->check_voucher == $cv->cv_ID)
	                  {{$total = $total + $payz->amount}}
	                 @endif
	                @endforeach
	              </div>
				<tr>
					<td class="left1 solidd"></td>
					<td class="right solidd"></td>
					<td class="right solidd"></td>
					<td class="center solidd">TOTAL: <strong>₱ <?php echo number_format($total, 2, '.', ','); ?></strong></td>
				</tr>
				<tr>
					<td></td>
					<td class="right"></td>
					<td class="right"></td>
					<td class="right"></td>
				</tr>
			</tbody>
        </table><br/>

        <p style="text-align: center;">PESOS:  &nbsp;&nbsp;&nbsp; <?php $f = new NumberFormatter("en", NumberFormatter::SPELLOUT); echo $f->format($total); ?>&nbsp; pesos only &nbsp;&nbsp;</p><br/><br/><br/>


        <div style="position: absolute; bottom: 0px;">
        <table width="100%">
        	<thead>
        		<tr>
        			<th class="left1">Prepared by: </th>
        			<th class="left1">Certified correct by:</th>
        			<th class="left1">Approved by:</th>
        		</tr>
        	</thead>

        	<tbody>
        		<tr>
        			<td height="50" valign="bottom">_______________________________</td>
        			<td height="50" valign="bottom">_______________________________</td>
        			<td height="50" valign="bottom">_______________________________</td>
        		</tr>
        		<tr>
        			<td><b>{{Session::get('fname')}} {{Session::get('mname')}} {{Session::get('lname')}}</b></td>
        			<td></td>
        			<td></td>
        		</tr>

        		<tr>
        			<td>{{Session::get('role') }}</td>
        			<td></td>
        			<td></td>
        		</tr>
        	</tbody>
        </table>
    	</div>
	</body>

</html>

