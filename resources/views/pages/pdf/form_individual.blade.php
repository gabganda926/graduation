<!DOCTYPE html>
<html>
	<head>
		<title>
      @foreach($inscomp as $comp)
             @if($comp->comp_ID == $insaccount->insurance_company)
              {{$comp->comp_name}}
             @endif
            @endforeach      
        </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		
	</head>
	<style type="text/css">

			table{
				border-collapse: collapse;
				margin-left: 20px;
				margin-right:20px;
				margin-top:2%;
				font-size: 15px;
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
        <div class="col s12"><div class="divider" style="height:3px; background-color:teal"></div></div><br/>
        <p style="color:black; text-align: center; font-size:20px;"><b><label class="inscomp">
            @foreach($inscomp as $comp)
             @if($comp->comp_ID == $insaccount->insurance_company)
              {{$comp->comp_name}}
             @endif
            @endforeach</label></b></p><br/><br/>


        <div class="row">
    		<table width="100%" id="particulars" class="solidd">
    			<tbody>
    				<tr>
    					<td colspan="3" class="left1 solidd" style="color: white; background-color: black;"><b>Basic Details</b></td>
    				</tr>
    				<tr>
    					<td class="left1">Issue Date: <?php $today = date("D - M j, Y"); echo $today; ?></td>
    					<td class="left1"></td>
    					<td class="left1">Motor Policy No.
    				</tr>
    				<tr>
    					<td class="left1">Period of Insurance:</td>
    					<td></td>
    					<td style="text-align: center;"><b>{{ $insaccount->policy_number }}</b></td>
    				</tr>
    				<tr>
    					<td class="left1"><?php $date = new DateTime($insaccount->inception_date); echo $date->format("M j, Y"); ?> &nbsp;&nbsp;&nbsp;&nbsp; to &nbsp;&nbsp;&nbsp;&nbsp; <?php $date=date('M j, Y', strtotime('+1 year', strtotime($insaccount->inception_date)) ); echo $date ?></td>
    					<td class="left1"></td>
    					<td></td>
    				</tr>
    			</tbody>
    		</table>

    		<table width="100%" id="particulars" class="solidd">
    			<tbody>
    				<tr>
    					<td colspan="2" class="left1 solidd" style="color: white; background-color: black;"><b>Personal Information</b></td>
    				</tr>
    				<tr>
    					<td class="left1 client_name"><b>
                            @foreach($pInfo as $info)
                             @if($info->pinfo_ID == $client->personal_info_ID)
                             {{ $info->pinfo_last_name}}, {{$info->pinfo_first_name}} {{$info->pinfo_middle_name }}
                             @endif
                            @endforeach               
                        </b></td>
    					<td></td>
    				</tr>
    				<tr>
    					<td class="left1"><b>
                            @foreach($add as $address)
                             @if($address->add_ID == $client->client_add_ID)
                                {{$address->add_blcknum}} {{$address->add_street}} {{$address->add_subdivision}} {{$address->add_brngy}} {{$address->add_district}} {{$address->add_city}} {{$address->add_province}} {{'Region '.$address->add_region}} {{$address->add_zipcode}}
                             @endif
                            @endforeach               
                        </b></td>
    					<td class="left1">
    						<ul><b>
                                 @foreach($pInfo as $info)
                                    @if($info->pinfo_ID == $client->personal_info_ID)
                                        @if($info->pinfo_cpnum_1 != null)
                                         <li>{{ $info->pinfo_cpnum_1 }}</li>
                                        @endif
                                        @if($info->pinfo_cpnum_2 != null)
                                         <li>{{ $info->pinfo_cpnum_2 }}</li>
                                        @endif
                                        @if($info->pinfo_tpnum != null)
                                         <li>{{ $info->pinfo_tpnum }}</li>
                                        @endif
                                        @if($info->pinfo_mail != null)
                                         <li>{{ $info->pinfo_mail }}</li>
                                        @endif
                                    @endif
                                @endforeach 
    						</b></ul>
    					</td>
    				</tr>
    			</tbody>
    		</table>

    		<table width="100%" id="particulars" class="solidd">
    			<tbody>
    				<tr>
    					<td colspan="3" class="left1 solidd" style="color: white; background-color: black;"><b>Vehicle Details </b></td>
    				</tr>
    				<tr>
    					<td class="left1">Vehicle Type</td>
    					<td class="left1">Vehicle Make</td>
    					<td class="left1">Vehicle Model</td>
    				</tr>
    				<tr>
    					<td class="center"><b>{{$insaccount->vehicle_type_name}}</b></td>
    					<td class="center"><b>{{$insaccount->vehicle_make_name}}</b></td>
    					<td class="center"><b>{{$insaccount->vehicle_year}} {{$insaccount->vehicle_model_name}}</b></td>
    				</tr>
    				<tr>
    					<td class="left1">Plate No.</td>
    					<td class="left1">Serial Chassis No.</td>
    					<td class="left1">Motor Engine No.</td>
    				</tr>
    				<tr>
    					<td class="center"><b>{{$insaccount->plate_number}}</b></td>
    					<td class="center"><b>{{$insaccount->serial_chassis}}</b></td>
    					<td class="center"><b>{{$insaccount->motor_engine}}</b></td>
    				</tr>
    				<tr>
    					<td class="left1">Seating Capacity</td>
    					<td class="left1">Color</td>
    					<td class="left1"></td>
    				</tr>
    				<tr>
    					<td class="center"><b>{{$insaccount->seat_capacity}}</b></td>
    					<td class="center"><b>{{$insaccount->color}}</b></td>
    					<td class="center"></td>
    				</tr>
    			</tbody>
    		</table>

    		<table width="100%" id="particulars" class="solidd">
    			<tbody>
    				<tr>
    					<td colspan="3" class="left1 solidd" style="color: white; background-color: black;"><b>Coverage/s </b></td>
    				</tr>
    				<tr>
    					<td class="center"><b>BENEFIT</b></td>
    					<td class="center"><b>COVERAGE</b></td>
    					<td class="center"><b>PREMIUM</b></td>
    				</tr>
    				<tr>
    					<td class="center">OWN DAMAGE/THEFT</td>
    					<td class="center od_cover">
                           ₱<?php $number = round($paydetails->odt_cover,2); echo number_format($number, 2, '.', ','); ?>              
                        </td>
    					<td class="center od_premium">
             ₱<?php $number = round($paydetails->odt_premium,2); echo number_format($number, 2, '.', ','); ?>               
                        </td>
    				</tr>
    				<tr>
    					<td class="center">PERSONAL ACCIDENT</td>
    					<td class="center pa_cover">
             ₱<?php $number = round($paydetails->pa_cover,2); echo number_format($number, 2, '.', ','); ?>               
                        </td>
    					<td class="center pa_premium">
             ₱<?php $number = round($paydetails->pa_premium,2); echo number_format($number, 2, '.', ','); ?>                 
                        </td>
    				</tr>
    				<tr>
    					<td class="center">EXCESS BODILY INJURY</td>
    					<td class="center ebi_cover">
             ₱<?php $number = round($paydetails->bi_cover,2); echo number_format($number, 2, '.', ','); ?>                 
                        </td>
    					<td class="center ebi_premium">
             ₱<?php $number = round($paydetails->bi_premium,2); echo number_format($number, 2, '.', ','); ?>                
                        </td>
    				</tr>
    				<tr>
    					<td class="center">ACTS OF NATURE</td>
    					<td class="center a_cover">
             ₱<?php $number = round($paydetails->aon_cover,2); echo number_format($number, 2, '.', ','); ?>                 
                        </td>
    					<td class="center a_premium">
              ₱<?php $number = round($paydetails->aon_premium,2); echo number_format($number, 2, '.', ','); ?>               
                        </td>
    				</tr>
    			</tbody>
    		</table>

    		<table width="100%" id="particulars" class="solidd">
    			<tbody>
    				<tr>
    					<td colspan="4" class="left1 solidd" style="color: white; background-color: black;"><b>Summary of Premium and Other Charges </b></td>
    				</tr>
    				<tr>
    					<td class="left1">PREMIUM</td>
    					<td class="left1 bpremium">
                        ₱<?php $number = round($paydetails->basicpremium,2); echo number_format($number, 2, '.', ','); ?>               
                        </td>
    					<td class="left1">Deductible</td>
    					<td class="left1 deduc">
             ₱<?php $number = round($paydetails->deductible,2); echo number_format($number, 2, '.', ','); ?>               
                        </td>
    				</tr>
    				<tr>
    					<td class="left1">Value Added Tax</td>
    					<td class="left1 vat">
             ₱<?php $number = round($paydetails->vat,2); echo number_format($number, 2, '.', ','); ?>               
                        </td>
    					<td class="left1">Authorized Repair Limit</td>
    					<td class="left1 a_rl">
             ₱<?php $number = round($paydetails->arl,2); echo number_format($number, 2, '.', ','); ?>               
                        </td>
    				</tr>
    				<tr>
    					<td class="left1">Documentary Stamp Tax</td>
    					<td class="left1 dst">
             ₱<?php $number = round($paydetails->dst,2); echo number_format($number, 2, '.', ','); ?>               
                        </td>
    					<td class="left1">Towing</td>
    					<td class="left1 tow_ing">
                        ₱<?php $number = round($paydetails->towing,2); echo number_format($number, 2, '.', ','); ?>
                        </td>
    				</tr>
    				<tr>
    					<td class="left1">Local Government Tax</td>
    					<td class="left1 lgt">
                            ₱<?php $number = round($paydetails->lgt,2); echo number_format($number, 2, '.', ','); ?>               
                        </td>
    					<td class="left1"></td>
    					<td class="left1"></td>
    				</tr>
    				<tr>
    					<td class="left1"><b>TOTAL AMOUNT DUE: </b></td>
    					<td class="left1 totnet"><b>
                            ₱<?php $number = round($paydetails->total,2); echo number_format($number, 2, '.', ','); ?>
                        </b></td>
    					<td class="left1"></td>
    					<td class="left1"></td>
    				</tr>
    			</tbody>
    		</table>
        </div>

        <div style="position: absolute; bottom: 0px;">
        <p><STRONG>{{Session::get('fname')}} {{Session::get('mname')}} {{Session::get('lname')}}</STRONG></p>
        <p>{{Session::get('role') }}</p>
        </div>
	</body>
</html>

