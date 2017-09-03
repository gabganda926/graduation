<!DOCTYPE html>
<html>
	<head>
		<title>Payment Receipt</title>
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

		<p style="color:black; text-align: center; font-size:20px;"><b>OFFICIAL RECEIPT</b></p><br/>
		<p style="color:black; text-align: right; font-size:15px;">OR NO:<b> {{ $or->or_number }}</b></p>
		<p style="color:black; text-align: right; font-size:15px;">Date: <b><script>
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
    ?></b></p><br/><br/> <!-- DATE KUNG KAILAN INISSUE TONG OR -->

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Received from: <b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $inf->pinfo_last_name }}, {{ $inf->pinfo_first_name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></p><br/>

        <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; with &nbsp;&nbsp;  Policy Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> {{ $pno->policy_number}} </b>&nbsp;&nbsp;&nbsp; the sum of &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> &nbsp;&nbsp;&nbsp;₱&nbsp;&nbsp;&nbsp;<b> {{ round($or->amount_paid,2) }}</b> &nbsp;&nbsp; </b> &nbsp;&nbsp;&nbsp;&nbsp;</p><br/>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; in full/partial payment for BOP No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> BOP000{{ $or->payment_ID }} </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; from Bill No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> BILL000{{ $or->check_voucher }}. </b>  </p><br/><br/>


        <p style="color:black; text-align: right; font-size:12px;">Remittance Date:<b> {{ $or->paid_date }}</b></p><br/>
        <p style="color:black; text-align: right; font-size:12px;">Due Date:<b> {{ $or->due_date}}</b></p>
        <p style="color:black; text-align: right; font-size:12px;">Amount Due:<b> ₱{{ round($or->amount,2) }}</b></p>
        <p style="color:black; text-align: right; font-size:12px;">Amount Paid:<b> ₱{{ round($or->amount_paid,2) }}</b></p>
        <p style="color:black; text-align: right; font-size:12px;">Change:<b> ₱{{ round($or->amount_paid,2) - round($or->amount,2) }} </b></p><br/>

        <p style="color:black; text-align: left; font-size:15px;"><b>Maria Gabriella Tan Rola</b></p>
        <p style="color:black; text-align: left; font-size:12px;"><b>Accounting Staff</b></p>

	</body>

</html>
