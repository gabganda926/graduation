<!DOCTYPE html>
<html>
	<head>
		<title>Breakdown of Payment</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		
	</head>
	<style type="text/css">

			table{
				border-collapse: collapse;
				margin-left: 20px;
				margin-right:20px;
				margin-top:2%;
			}

			table, th, td{
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
        <div class="col s12"><div class="divider" style="height:3px; background-color:teal"></div></div><br/>
        <p style="color:black; text-align: center; font-size:15px;"><b>BREAKDOWN OF PAYMENT</b></p><br/><br/>
        <p><strong><input type="text" style="border: none; font-size: 15px; width: 400px;" value="Client:  {{ $inf->comp_name }}"></strong><b><input type="text" style="border: none; font-size: 15px; width: 400px;" value="Bill Number:  BILL000{{ $cv->cv_ID }}"></b></p>
        <p><strong><input type="text" style="border: none; font-size: 15px; width: 400px;" value="Policy Number:  {{ $pno->policy_number}}"> </strong><b><input type="text" style="border: none; font-size: 15px; width: 400px;" value="Insurance Company:   FPG Insurance"></b></label></p>
        <p>Date: <b><script>
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
    $today = date("D M j Y");  

    echo $today; 
    ?></b></p><br/><br/>

        <table width="100%" id="particulars">
        	<thead>
				<tr>
					<th data-field="checkno" class="center">BOP Number</th>
					<th data-field="bank" class="center">Bank</th>
					<th data-field="due date" class="center">Due Date</th>
					<th data-field="amount" class="center">Amount</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td class="right"></td>
					<td class="right"></td>
					<td class="right"></td>
				</tr>
				<tr>
					<td class="center">012345</td>
					<td class="left1">BDO Antipolo</td>
					<td class="left1">August 11, 2017</td>
					<td class="right">Php 5,000</td>
				</tr>
				<tr>
					<td class="center">012345</td>
					<td class="left1">BDO Antipolo</td>
					<td class="left1">September 11, 2017</td>
					<td class="right">Php 5,000</td>
				</tr>
				<tr>
					<td class="center">012345</td>
					<td class="left1">BDO Antipolo</td>
					<td class="left1">October 11, 2017</td>
					<td class="right">Php 5,000</td>
				</tr>
				<tr>
					<td class="center">012345</td>
					<td class="left1">BDO Antipolo</td>
					<td class="left1">November 11, 2017</td>
					<td class="right">Php 5,000</td>
				</tr>
				<tr>
					<td class="center">012345</td>
					<td class="left1">BDO Antipolo</td>
					<td class="left1">December 11, 2017</td>
					<td class="right">Php 5,000</td>
				</tr>
				<tr>
					<td class="left1"></td>
					<td class="right"></td>
					<td class="right"></td>
					<td class="left1">TOTAL: <strong>Php 25, 000.00</strong></td>
				</tr>
				<tr>
					<td></td>
					<td class="right"></td>
					<td class="right"></td>
					<td class="right"></td>
				</tr>
			</tbody>
        </table><br/><br/>


        <p><STRONG>Ma. Gabriella Tan Rola</STRONG></p><br/>
        <p>Accounting Staff</p>
	</body>

</html>

