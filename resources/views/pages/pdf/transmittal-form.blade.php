<!DOCTYPE html>
<html>
	<head>
		<title>Transmittal Form</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		
	</head>
	<style type="text/css">

			table{
				border-collapse: collapse;
				margin-left: 20px;
				margin-right:20px;
				margin-top:2%;
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
        <p style="color:black; text-align: center; font-size:15px;"><b>TRANSMITTAL FORM</b></p><br/><br/>

        <table>
                <tbody>
                        <tr>
                                <td><b>Insurance Company: </b>
                                        @foreach($comp as $co)
                                                @if($co->comp_ID == $trans->inscomp_ID)
                                                        {{ $co->comp_name }}
                                                @endif
                                        @endforeach 
                                </td>
                        </tr>
                </tbody>
        </table>
        <table>
        	<tbody>
        		<tr>
        			<td><b>Address: </b>
                                        @foreach($comp as $co)
                                                @if($co->comp_ID == $trans->inscomp_ID)
                                                        @foreach($addr as $add)
                                                                @if($add->add_ID == $co->comp_add_ID)
                                                                        {{ $add->add_blcknum }} {{ $add->add_street }} {{ $add->add_subdivision }} {{ $add->add_brngy }} {{ $add->add_district }} {{ $add->add_city }} {{ $add->add_province }} {{ $add->add_region }} {{ $add->add_zipcode }}
                                                                @endif
                                                        @endforeach
                                                @endif
                                        @endforeach 
                                </td>
        		</tr>
        	</tbody>
        </table>
        <table>
        	<tbody>
        		<tr>
        			<td><b>Documents: </b> 
                                        <ul style="padding-left: 10em; width: 400px;">
        					@foreach($creq as $cr)
                                                        @if($trans->claim_ID == $cr->claim_ID)
                                                                @foreach($cfile as $cf)
                                                                        @if($cf->claim_ID == $cr->claim_ID)
                                                                                @foreach($crequire as $re)
                                                                                        @if($re->claimReq_ID == $cf->claimReq_ID)
                                                                                                <li>{{ $re->claimRequirement }}</li>
                                                                                        @endif
                                                                                @endforeach
                                                                        @endif
                                                                @endforeach
                                                        @endif
                                                @endforeach
        				</ul></td>
        		</tr>
        	</tbody>
        </table>
        <table>
        	<tbody>
        		<tr>
        			<td><b>Delivered by: </b></td>
                                <td> @foreach($courier as $cor)
                                                @if($cor->courier_ID == $trans->courier_ID)
                                                        @foreach($pinfo as $Info)
                                                                @if($cor->personal_info_ID == $Info->pinfo_ID)
                                                                        {{$Info->pinfo_last_name}}, {{$Info->pinfo_first_name}} {{$Info->pinfo_middle_name}}
                                                                @endif
                                                        @endforeach
                                                @endif
                                        @endforeach</td>
        		</tr>
        	</tbody>
        </table>
        <table>
                <tbody>
                        <tr>
                                <td><b>Date Received: </b></td>
                                <td>________________________________________________________________________</td>
                        </tr>
                </tbody>
        </table>
         <table>
                <tbody>
                        <tr>
                                <td><b>Time Received: </b></td>
                                <td>________________________________________________________________________</td>
                        </tr>
                </tbody>
        </table>
        <table>
        	<tbody>
        		<tr>
        			<td><b>Received by: </b></td>
        			<td>________________________________________________________________________________</td>
        		</tr>
        	</tbody>
        </table>

        <div style="position: absolute; bottom: 0px;">
        <table width="100%">
            <thead>
                <tr>
                    <th class="left1">Prepared by: </th>
                    <th class="left1">Courier's Signature:</th>
                    <th class="left1">Recipient's Signature:</th>
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

