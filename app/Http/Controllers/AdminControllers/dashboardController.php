<?php

namespace App\Http\Controllers\AdminControllers;

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

use App\transmittalRequestConnection;

use App\web_claimRequestConnection;

use App\sendComplaintConnection;

class dashboardController extends Controller
{
    public function index()
    {
    	return view('pages.admin.dashboard')
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
	    ->with('request', transmittalRequestConnection::all())
    	->with('crequest', web_claimRequestConnection::where('web_del_flag', "=", 0)->get())
    	->with('complaints', sendComplaintConnection::all());
    }

    public function view_profile()
    {
    	return view('pages.admin.profile');
    }
}
