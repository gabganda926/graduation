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

use App\paymentDetailConnection;

use App\paymentsConnection;

use App\checkVoucherConnection;

use App\salesAgentConnection;

use App\contactPersonConnection;

use Alert;

use Redirect;

class walkin_claimApprovalController extends Controller
{
  public function claims_list()
  {
    return view('/pages/manager/transaction/claims')
       ->with('pno',policynoConnection::all())
       ->with('creq',claimRequestConnection::all())
       ->with('cnotif',claimNotifiedByRepConnection::all())
        ->with('comp',inscompanyConnection::all())
        ->with('clist', clientListConnection::all())
        ->with('cliacc', clientAccountsConnection::all())
        ->with('cli', clientConnection::all())
        ->with('pinfo', personalInfoConnection::all())
        ->with('addr', addressConnection::all());
  }

  public function view_claim_details(Request $req)
  {
    return view('/pages/manager/transaction/claim-details')
       ->with('pno',policynoConnection::all())
       ->with('ctype', claimsTypeConnection::all())
       ->with('creq',claimRequestConnection::where('claim_ID', "=", $req->claim_id)->first())
       ->with('cnotif',claimNotifiedByRepConnection::all())
        ->with('comp',inscompanyConnection::all())
        ->with('clist', clientListConnection::all())
        ->with('cliacc', clientAccountsConnection::all())
        ->with('cli', clientConnection::all())
        ->with('pinfo', personalInfoConnection::all())
        ->with('addr', addressConnection::all())
        ->with('cont', contactPersonConnection::all());
  }
}
