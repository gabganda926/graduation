<?php

namespace App\Http\Controllers\AdminControllers;

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

class trans_claimsController extends Controller
{
  public function __construct(claimRequestConnection $claims, claimNotifiedByRepConnection $repre)
  {
    $this->claimreq = $claims;
    $this->rep = $repre;
  }

  public function index()
  {
    return view('/pages/admin/transaction/claim-create-request-walkin')
    	 ->with('pno',policynoConnection::all())
        ->with('ctype', claimsTypeConnection::all())
        ->with('creq', claimsRequirementConnection::all())
      	->with('comp',inscompanyConnection::all())
      	->with('clist', clientListConnection::all())
      	->with('cliacc', clientAccountsConnection::all())
      	->with('cli', clientConnection::all())
      	->with('pinfo', personalInfoConnection::all())
      	->with('addr', addressConnection::all())
        ->with('payments',paymentsConnection::orderBy('due_date')->get())
        ->with('voucher',   checkVoucherConnection::all())
        ->with('ptail',paymentDetailConnection::all());
  }

  public function new_claim(Request $req)
  {
    // if($req->rep_name != null)
    // {
    //   $this->$rep->notifier_Name = $req->rep_name;
    // }
  }

}
