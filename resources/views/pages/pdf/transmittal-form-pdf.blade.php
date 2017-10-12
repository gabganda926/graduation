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
                                <td><b>Client: </b>
                                        {{ $id->name }}
                                </td>
                        </tr>
                </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <td><b>Address: </b> {{ $id->address }} </td>
                </tr>
            </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <td><b>Documents: </b> 
                        <ul style="padding-left: 10em; width: 400px;">
                            @foreach($documents as $docu)
                                <li> {{ $docu->document }} </li>
                            @endforeach 
                        </ul></td>
                </tr>
            </tbody>
        </table>
        <table>
                <tbody>
                        <tr>
                                <td><b>Insurance Company: </b>
                                        {{ $inscomp->comp_name }}
                                </td>
                        </tr>
                </tbody>
        </table>
        <table>
                <tbody>
                        <tr>
                                <td><b>Policy Number: </b></td>
                                <td>{{ $id->policy_number }}</td>
                        </tr>
                </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <td><b>Delivered by: </b></td>
                                <td>{{ $inf->pinfo_last_name }}, {{ $inf->pinfo_first_name }} {{ $inf->pinfo_middle_name }}</td>
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
    </body>

</html>

