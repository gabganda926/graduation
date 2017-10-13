<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\accListInsuranceConnection;

use App\clientAccountsConnection;

use App\paymentConnection;

use App\paymentOnlineConnection;

use Redirect;

class onlinePaymentController extends Controller
{
	public function __construct(paymentOnlineConnection $on)
	{
		$this->online = $on;
	}

    public function index()
    {
   		return view('pages.webpage.sign-in.payment')
   		->with('alist', accListInsuranceConnection::all());
	}

	public function pay(Request $req)
	{	
   		return view('pages.webpage.sign-in.payment-new')
   		->with('remitted', paymentOnlineConnection::all())
   		->with('account', clientAccountsConnection::where('policy_number','=',$req->policy_number)->first());	
	}

	public function send_payment(Request $req)
	{
		if($req->hasFile('file'))
        {
          $file = $req->file('file');

          $extension = \File::extension($file->getClientOriginalName());

          $name = "deposit_slip_".$req->check_number.".".$extension;

          $this->online->deposit_file = $name;

          $file->move(public_path().'/image/depositslip/', $name);
        }

        if($req->deposit_time)
        	$this->online->deposit_date = $req->deposit_date." 23:59:59.000";
        else
        	$this->online->deposit_date = $req->deposit_date." ".$req->deposit_time;

        $this->online->pay_ID = $req->check_number;
        $this->online->amount_paid = $req->amount_paid;
        $this->online->remittance_date = $req->remittance_date." ".$req->remittance_time;

        try
        {
          $this->online->save();
          alert()
          ->success('Record Saved', 'Success')
          ->persistent("Close");

          return Redirect::to('/user/payment');
        }
        catch(\Exception $e)
        {
          $message = $e->getMessage();
          if($message == 23000)
          {
              alert()
              ->error('ERROR', 'Data already exist!')
              ->persistent("Close");

              return Redirect::back();
          }
          else if($message == 22001)
          {
            alert()
            ->error('ERROR', 'Exceed Max limit of column!')
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
