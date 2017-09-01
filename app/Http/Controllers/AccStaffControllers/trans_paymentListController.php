<?php

namespace App\Http\Controllers\AccStaffControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\paymentListConnection;

use App\checkVoucherConnection;

use App\paymentDetailConnection;

use App\clientAccountsConnection;

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
		->with('plist', paymentListConnection::all())
		->with('cvouch', checkVoucherConnection::all())
		->with('pdet', paymentDetailConnection::all())
		->with('cliacc', clientAccountsConnection::all())
		->with('clist', clientListConnection::all())
		->with('cli', clientConnection::all())
		->with('pinfo', personalInfoConnection::all())
		->with('bank', bankConnection::all())
		->with('addr', addressConnection::all());
    }
    
	public function generatePDF(Request $request) 
    {
    	$pdf = PDF::loadView('pages.pdf.payment-receipt')
            ->setPaper(array(0, 0, 595, 500), 'portrait');

        return $pdf->stream();
    }//generates the pdf
}
