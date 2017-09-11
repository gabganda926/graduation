<?php

namespace App\Http\Controllers\AccStaffControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use DB;

use App\paymentListConnection;

use App\checkVoucherConnection;

use App\paymentDetailConnection;

use App\clientAccountsConnection;

use App\inscompanyConnection;

use App\clientListConnection;

use App\clientConnection;

use App\personalInfoConnection;

use App\bankConnection;

use App\addressConnection;

use Redirect;

use Alert;

class trans_paymentListController extends Controller
{
    public function index()
    {
    	return view('pages.accounting-staff.transaction.payment-list')
		->with('plist', paymentListConnection::orderBy('paid_date', 'DESC')->get())
		->with('cvouch', checkVoucherConnection::all())
		->with('pdet', paymentDetailConnection::all())
		->with('cliacc', clientAccountsConnection::all())
		->with('clist', clientListConnection::all())
		->with('cli', clientConnection::all())
		->with('pinfo', personalInfoConnection::all())
		->with('company', insCompanyConnection::all())
		->with('bank', bankConnection::all())
		->with('addr', addressConnection::all());
    }
    
	public function generatePDF(Request $request, $or_number, $pinfo_ID, $account_ID) 
    {
    	$or = paymentListConnection::where('or_number',$or_number)->first();
    	$pno = clientAccountsConnection::where('account_ID',$account_ID)->first();
    	$inf = personalInfoConnection::where('pinfo_ID',$pinfo_ID)->first();

    	$pdf = PDF::loadView('pages.pdf.payment-receipt',
    			compact('or', 'pno', 'inf'))
            ->setPaper(array(0, 0, 595, 500), 'portrait');

        return $pdf->stream();
    }//generates the pdf

    public function generatePDFcomp(Request $request, $or_number, $comp_ID, $account_ID) 
    {
    	$or = paymentListConnection::where('or_number',$or_number)->first();
    	$pno = clientAccountsConnection::where('account_ID',$account_ID)->first();
    	$inf = inscompanyConnection::where('comp_ID',$comp_ID)->first();

    	$pdf = PDF::loadView('pages.pdf.payment-receipt-comp',
    			compact('or', 'pno', 'inf'))
            ->setPaper(array(0, 0, 595, 500), 'portrait');

        return $pdf->stream();
    }//generates the pdf
}
