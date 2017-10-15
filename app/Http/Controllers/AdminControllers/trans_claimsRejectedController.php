<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\web_claimNotifiedByConnection;

use App\inscompanyConnection;

use App\claimsTypeConnection;

use App\web_claimRequestConnection;

use App\clientListConnection;

use App\policynoConnection;
use App\clientAccountsConnection;

use App\clientConnection;

use App\personalInfoConnection;

use App\addressConnection;
use App\claimsRequirementConnection;
use App\claimRequestConnection;

use App\claimReqFilesConnection;

use App\claimNotifiedByRepConnection;
use App\paymentDetailConnection;

use App\paymentsConnection;

use App\checkVoucherConnection;

use App\salesAgentConnection;

use App\contactPersonConnection;

class trans_claimsRejectedController extends Controller
{
    public function index()
    {
    	return view('pages.admin.transaction.claims-rejected')
    	->with('request', web_claimRequestConnection::where('web_status', "=", 2)->get())
    	->with('webcnotif', web_claimNotifiedByConnection::all())
    	->with('pno',policynoConnection::all())
       ->with('ctype', claimsTypeConnection::all())
       ->with('creq1',claimRequestConnection::where('status', "=", 3)->get())
       ->with('cnotif',claimNotifiedByRepConnection::all())
       ->with('cfile', claimReqFilesConnection::all())
        ->with('comp',inscompanyConnection::all())
        ->with('clist', clientListConnection::all())
        ->with('cliacc', clientAccountsConnection::all())
        ->with('cli', clientConnection::all())
        ->with('pinfo', personalInfoConnection::all())
        ->with('addr', addressConnection::all());
    }
}
