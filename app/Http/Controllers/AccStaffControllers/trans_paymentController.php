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

use App\paymentCheckConnection;

use Redirect;

use Alert;

use Session;

class trans_paymentController extends Controller
{
	public function __construct(paymentsConnection $payments,paymentCheckConnection $cheque)
	{
		$this->pay = $payments;
		$this->check = $cheque;
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

	public function payment2(Request $req)
	{
		$remittance = $req->remittance_date_check;
		$pay = paymentsConnection::where('payment_ID', '=', $req->BOP_check)->first();
		if(strtotime($pay->due_date) >= strtotime($remittance))
		{
			$pay->status = 0; // paid
		}
		if(strtotime($pay->due_date) < strtotime($remittance))
		{
			$pay->status = 3; // late
		}
		if(strtotime("+7 days", strtotime($pay->due_date)) < strtotime($remittance))
		{
			$pay->status = 4; //lapse
		}
		$pay->amount_paid = $req->amount_check;
		$pay->paid_date = $req->remittance_date_check;
        $pay->employee_info_ID = Session::get('id');

	    try
	    {
	      $pay->save();

	      return $this->check($req);
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

	public function check($req) 
	{
		$this->check->bank_ID = $req->bank_check;
		$this->check->check_number = $req->check_num;
		$this->check->payment_ID = $req->BOP_check;

		try
	    {
	      $this->check->save();
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

	public function payment(Request $req)
	{
		$remittance = $req->remittance_date;
		$pay = paymentsConnection::where('payment_ID', '=', $req->checknum)->first();
		if(strtotime($pay->due_date) >= strtotime($remittance))
		{
			$pay->status = 0; // paid
		}
		if(strtotime($pay->due_date) < strtotime($remittance))
		{
			$pay->status = 3; // late
		}
		if(strtotime("+7 days", strtotime($pay->due_date)) < strtotime($remittance))
		{
			$pay->status = 4; //lapse
		}
		$pay->amount_paid = $req->amount_paid;
		$pay->paid_date = $req->remittance_date;
        $pay->employee_info_ID = Session::get('id');

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
