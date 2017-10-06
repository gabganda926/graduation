<?php

namespace App\Http\Controllers\AccStaffControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\policynoConnection;

use App\personalInfoConnection;

use App\paymentDetailConnection;

use App\paymentsConnection;

use App\clientAccountsConnection;

use App\bankConnection;

use App\inscompanyConnection;

use App\clientConnection;

use App\addressConnection;

use App\checkVoucherConnection;

use Redirect;

use Alert;

class trans_paymentController extends Controller
{
	public function __construct(paymentsConnection $payments)
	{
		$this->pay = $payments;
	}

	public function index()
	{
		return view('pages.accounting-staff.transaction.payment-new')
		->with('payments',paymentsConnection::orderBy('due_date')->get())
		->with('voucher',   checkVoucherConnection::all())
		->with('policyno',policynoConnection::all())
		->with('insacc',clientAccountsConnection::all())
		->with('ptail',paymentDetailConnection::all())
		->with('bank', bankConnection::all())
		->with('individual',clientConnection::all())
		->with('company',inscompanyConnection::all())
		->with('address',addressConnection::all())
		->with('pinfo', personalInfoConnection::all());
	}

	public function payment(Request $req)
	{
		$pay = paymentsConnection::where('payment_ID', '=', $req->checknum)->first();
		if(strtotime($pay->due_date) <= strtotime($req->remittance_date))
		{
			$pay->status = 0; // paid
		}
		elseif(strtotime("+7 days", strtotime($pay->due_date)) < strtotime($req->remittance_date))
		{
			$pay->status = 4; //lapse
		}
		else 
		{
			$pay->status = 3; // late
		}
		$pay->amount_paid = $req->amount_paid;
		$pay->paid_date = $req->remittance_date;

	    try
	    {
	      $pay->save();
	      alert()
	      ->success('Record Saved', "Success")
	      ->persistent("Close");

	      return Redirect::back();
	    }
	    catch(Exception $e)
	    {
	      $message = $e->getCode();
	      if($message == 23000)
	      {
	          alert()
	          ->error('ERROR', $e->getMessage())
	          ->persistent("Close");

	          return Redirect::back();
	      }
	      else if($message == 22001)
	      {
	        alert()
	        ->error('ERROR', $e->getMessage())
	        ->persistent("Close");

	        return Redirect::back();
	      }
	      else
	      {
	        alert()
	        ->error('ERROR', $e->getMessage())
	        ->persistent("Close");

	        return Redirect::back();
	      }
	    }
	}
}
