<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\personalInfoConnection;

use App\contactPersonConnection;

use App\inscompanyConnection;

use App\addressConnection;

use App\installmentConnection;

use App\salesAgentConnection;

use App\bankConnection;

use App\policynoConnection;

use App\vModelConnection;

use App\vMakeConnection;

use App\vTypeConnection;

use App\premiumDGConnection;

use App\premiumPAConnection;

use App\paymentDetailConnection;

use App\clientAccountsConnection;

use App\clientListConnection;

use App\paymentConnection;

use Redirect;

use Alert;

class trans_insCompanyController extends Controller
{
  public function index()
  {
    return view('pages/accounting-staff/transaction/insurance-company')
    ->with('paydetails', paymentDetailConnection::all())
    ->with('contact', contactPersonConnection::all())
    ->with('clist', clientListConnection::all())
    ->with('sales',salesAgentConnection::all())
    ->with('pInfo',personalInfoConnection::all())
    ->with('insaccount', clientAccountsConnection::all())
    ->with('inscomp', inscompanyConnection::all())
    ->with('add',addressConnection::all());
  }

  public function display_info(Request $req)
  {
    return view('pages/accounting-staff/transaction/insurance-details-company')
    ->with('client', inscompanyConnection::where('comp_ID', $req->id)->first())
    ->with('contact', contactPersonConnection::all())
    ->with('payments', paymentConnection::all())
    ->with('paydetails', paymentDetailConnection::where('payment_ID', $req->pay_id)->first())
    ->with('clist', clientListConnection::all())
    ->with('sales',salesAgentConnection::all())
    ->with('pInfo',personalInfoConnection::all())
    ->with('insaccount', clientAccountsConnection::where('account_ID',$req->acc_id)->first())
    ->with('inscomp', inscompanyConnection::all())
    ->with('sales',salesAgentConnection::all())
    ->with('vmod',vModelConnection::all())
    ->with('vmake',vMakeConnection::all())
    ->with('vtype',vTypeConnection::all())
    ->with('ppa',premiumPAConnection::all())
    ->with('pdg',premiumDGConnection::all())
    ->with('pInfo',personalInfoConnection::all())
    ->with('add',addressConnection::all());
  }
}
