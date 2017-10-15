<?php

namespace App\Http\Controllers\ManagerControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\clientListConnection;

use App\policynoConnection;

use App\inscompanyConnection;

use App\clientAccountsConnection;

use App\clientConnection;

use App\personalInfoConnection;

use App\addressConnection;

use App\claimsTypeConnection;

use App\claimsRequirementConnection;

use App\claimRequestConnection;

use App\claimNotifiedByRepConnection;

use App\claimReqFilesConnection;

use App\paymentDetailConnection;

use App\paymentsConnection;

use App\checkVoucherConnection;

use App\salesAgentConnection;

use App\contactPersonConnection;

use App\courierConnection;

use App\claimTransmitConnection;

use Alert;

use Redirect;

use PDF;

class transmittalListController extends Controller
{
    public function index(){
    	return view('pages.manager.transaction.transmittal-list')
	        ->with('ctype', claimsTypeConnection::all())
	        ->with('creq',claimRequestConnection::all())
	        ->with('cnotif',claimNotifiedByRepConnection::all())
	        ->with('comp',inscompanyConnection::all())
	        ->with('clist', clientListConnection::all())
	        ->with('cliacc', clientAccountsConnection::all())
	        ->with('cli', clientConnection::all())
	        ->with('cfile', claimReqFilesConnection::all())
	        ->with('crequire', claimsRequirementConnection::all())
	        ->with('pinfo', personalInfoConnection::all())
	        ->with('addr', addressConnection::all())
	        ->with('sales', salesAgentConnection::all())
	        ->with('cont', contactPersonConnection::all())
	        ->with('courier', courierConnection::all())
	        ->with('trans', claimTransmitConnection::all());
    }

    public function view_details(Request $req){
    	return view('pages.manager.transaction.transmittal-list-details')
	        ->with('ctype', claimsTypeConnection::all())
	        ->with('creq',claimRequestConnection::where('claim_ID', "=", $req->claim_ID)->first())
	        ->with('cnotif',claimNotifiedByRepConnection::all())
	        ->with('comp',inscompanyConnection::all())
	        ->with('clist', clientListConnection::all())
	        ->with('cliacc', clientAccountsConnection::all())
	        ->with('cli', clientConnection::all())
	        ->with('cfile', claimReqFilesConnection::all())
	        ->with('crequire', claimsRequirementConnection::all())
	        ->with('pinfo', personalInfoConnection::all())
	        ->with('addr', addressConnection::all())
	        ->with('sales', salesAgentConnection::all())
	        ->with('cont', contactPersonConnection::all())
	        ->with('courier', courierConnection::all())
	        ->with('trans', claimTransmitConnection::where('transmitClaim_ID', "=", $req->transclaim_id)->first());
    }

    public function generateForm(Request $request, $transmitClaim_ID) 
    {
        $trans = claimTransmitConnection::where('transmitClaim_ID',$transmitClaim_ID)->first();
        $creq = claimRequestConnection::all();
        $comp = inscompanyConnection::all();
        $insacc = clientAccountsConnection::all();
        $cfile = claimReqFilesConnection::all();
        $crequire = claimsRequirementConnection::all();
        $pinfo = personalInfoConnection::all();
        $addr = addressConnection::all();
        $courier = courierConnection::all();
        

        $pdf = PDF::loadView('pages.pdf.transmittal-form',
                compact('trans', 'creq', 'comp', 'insacc', 'cfile', 'crequire', 'pinfo', 'addr', 'courier'))
            ->setPaper(array(0, 0, 595, 600), 'portrait');

        return $pdf->stream();
    }//generates the pdf

    public function update_status(Request $req)
    {
    	$tcid = claimTransmitConnection::where('transmitClaim_ID', "=", $req->claimid)->first();

    	$tcid->status = $req->up_status;
    	$tcid->updated_at = $req->time;

      $tcid->save();
      alert()
      ->success('Record Updated', "Success")
      ->persistent("Close");
      return Redirect::back();
    }
}
