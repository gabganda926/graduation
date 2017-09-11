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

use PDF;

class trans_listBreakdownController extends Controller
{
    public function index()
  {
    return view('pages/accounting-staff/transaction/payment')
    ->with('plist', paymentListConnection::all())
    ->with('payments', paymentConnection::all())
    ->with('cvouch', checkVoucherConnection::orderBy('cv_ID', 'DESC')->get())
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

  public function generateBOP(Request $request, $cv_ID, $pinfo_ID, $account_ID) 
    {
        $cv = checkVoucherConnection::where('cv_ID',$cv_ID)->first();
        $pno = clientAccountsConnection::where('account_ID',$account_ID)->first();
        $inf = personalInfoConnection::where('pinfo_ID',$pinfo_ID)->first();
        $list = paymentConnection::all();
        $payDet = paymentDetailConnection::all();
        $bank = bankConnection::all();
        $address = addressConnection::all();
        $inscomp = insCompanyConnection::all();
        

        $pdf = PDF::loadView('pages.pdf.breakdown-payment',
                compact('cv', 'pno', 'inf', 'list', 'payDet', 'bank', 'address', 'inscomp'))
            ->setPaper('Letter');

        return $pdf->stream();
    }//generates the pdf

    public function generateBOPcomp(Request $request, $cv_ID, $comp_ID, $account_ID) 
    {
        $cv = checkVoucherConnection::where('cv_ID',$cv_ID)->first();
        $pno = clientAccountsConnection::where('account_ID',$account_ID)->first();
        $inf = inscompanyConnection::where('comp_ID',$comp_ID)->first();
        $list = paymentConnection::all();
        $payDet = paymentDetailConnection::all();
        $bank = bankConnection::all();
        $address = addressConnection::all();
        $inscomp = insCompanyConnection::all();

        $pdf = PDF::loadView('pages.pdf.breakdown-payment-comp',
                compact('cv', 'pno', 'inf', 'list', 'payDet', 'bank', 'address', 'inscomp'))
            ->setPaper('Letter');

        return $pdf->stream();
    }//generates the pdf
}
