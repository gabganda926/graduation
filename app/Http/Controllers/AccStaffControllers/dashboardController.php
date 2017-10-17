<?php

namespace App\Http\Controllers\AccStaffControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\personalInfoConnection;

use App\contactPersonConnection;

use App\clientConnection;

use App\inscompanyConnection;

use App\addressConnection;

use App\salesAgentConnection;

use App\paymentDetailConnection;

use App\clientAccountsConnection;

use App\clientListConnection;

use App\paymentsConnection;

use App\checkVoucherConnection;

use App\quotationListConnection;

use App\quotationIndividualConnection;
use App\quotationCompanyConnection;
use App\paymentListConnection;


class dashboardController extends Controller
{
    public function index()
    {
    	return view('pages.accounting-staff.cimis-accounting-staff')
    	->with('paydetails', paymentDetailConnection::all())
	    ->with('payments',paymentsConnection::orderBy('due_date')->get())
	    ->with('voucher',   checkVoucherConnection::all())
	    ->with('clist', clientListConnection::all())
	    ->with('client',clientConnection::all())
	    ->with('sales',salesAgentConnection::all())
	    ->with('pInfo',personalInfoConnection::all())
	    ->with('insaccount', clientAccountsConnection::all())
	    ->with('inscomp', inscompanyConnection::all())
	    ->with('add',addressConnection::all())
	    ->with('contact', contactPersonConnection::all())
	    ->with('qlist', quotationListConnection::all())
		->with('qindi', quotationIndividualConnection::all())
		->with('qcomp', quotationCompanyConnection::all())
		->with('plist', paymentListConnection::orderBy('paid_date', 'DESC')->get());
    }

    public function view_profile()
    {
    	return view('pages.accounting-staff.profile');
    }
}
