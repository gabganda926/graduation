<?php

namespace App\Http\Controllers\AccStaffControllers;

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

use App\claimReqFilesConnection;

use App\claimNotifiedByRepConnection;

use App\paymentDetailConnection;

use App\paymentsConnection;

use App\checkVoucherConnection;

use App\salesAgentConnection;

use App\contactPersonConnection;

use App\LedgerConnection;

use App\bankConnection;

use Alert;

use Redirect;

class trans_ledgerController extends Controller
{
	public function __construct(LedgerConnection $ledger)
	  {
	    $this->le = $ledger;
	  }

    public function index()
    {
    	return view('pages.accounting-staff.transaction.ledger')
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
	        ->with('ptail',paymentDetailConnection::all())
	        ->with('sales', salesAgentConnection::all())
	        ->with('cont', contactPersonConnection::all())
	        ->with('ledger', LedgerConnection::all())
	        ->with('bank', bankConnection::all());
    }

    public function index1()
    {
    	return view('pages.accounting-staff.transaction.ledger-new-entry')
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
	        ->with('ptail',paymentDetailConnection::all())
	        ->with('sales', salesAgentConnection::all())
	        ->with('cont', contactPersonConnection::all())
	        ->with('ledger', LedgerConnection::all())
	        ->with('bank', bankConnection::all());
    }

    public function new_entry(Request $req)
  	{
   		$insId = clientAccountsConnection::where('account_ID', "=", $req->insid)->first();
   		$pId = paymentDetailConnection::where('payment_ID', "=", $req->pid)->first();
     	$mytime = $req->time;
   		$this->le->account_ID = (int)$insId->account_ID;
   		$this->le->payment_ID = (int)$pId->payment_ID;
   		$this->le->remarks = $req->remarks;
   		$this->le->income = $req->inc;
   		$this->le->commission = $req->comm;
   		$this->le->created_at = $mytime;

   		try
    	{
    		$this->le->save();
    		alert()
    		->success('Record Added', 'Success')
    		->persistent('Close');

    		return Redirect::back();
    	}
    	catch(\Exception $e)
    	{
    		$code = $e->getCode();
    		if($code == 23000)
    		{
              alert()
              ->error('ERROR', 'Data already exist!')
              ->persistent("Close");

              return Redirect::back();
    		}
    		else if($code == 22001)
    		{
              alert()
              ->error('ERROR', 'Exceeded Max Limit of column!')
              ->persistent("Close");

              return Redirect::back();
    		}
    		else
    		{
              alert()
              ->error('ERROR', 'Error: '.$e->getMessage())
              ->persistent("Close");

              return Redirect::back();
    		}
    	}
    } 
}
