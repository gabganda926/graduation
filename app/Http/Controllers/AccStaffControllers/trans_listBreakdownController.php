<?php

namespace App\Http\Controllers\AccStaffControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\paymentConnection;

use App\checkVoucherConnection;

use App\paymentDetailConnection;

use App\clientAccountsConnection;

use App\clientListConnection;

use App\clientConnection;

use App\personalInfoConnection;

use App\insCompanyConnection;

use App\bankConnection;

use App\addressConnection;

use App\premiumDGConnection;

use App\premiumPAConnection;

use App\paymentListConnection;

use Redirect;

use Alert;

class trans_listBreakdownController extends Controller
{
    public function index()
  {
    return view('pages/accounting-staff/transaction/payment')
    ->with('plist', paymentListConnection::all())
    ->with('payments', paymentConnection::all())
    ->with('cvouch', checkVoucherConnection::all())
    ->with('payDet', paymentDetailConnection::all())
    ->with('cliacc', clientAccountsConnection::all())
    ->with('clilist', clientListConnection::all())
    ->with('client', clientConnection::all())
    ->with('pInfo', personalInfoConnection::all())
    ->with('company', insCompanyConnection::all())
    ->with('bank', bankConnection::all())
    ->with('pdg'  , premiumDGConnection::all())
    ->with('ppa'  , premiumPAConnection::all())
    ->with('address', addressConnection::all());
  }
}
