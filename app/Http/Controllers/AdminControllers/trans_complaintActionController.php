<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\employeeConnection;

use App\sendComplaintConnection;

use App\personalInfoConnection;

use App\salesAgentConnection;

use App\actionComplaintConnection;

use App\inscompanyConnection;

use App\clientAccountsConnection;

use App\clientConnection;

use App\addressConnection;

use App\complaintTypeConnection;

use App\accListInsuranceConnection;

use Alert;

use Redirect;

class trans_complaintActionController extends Controller
{
	public function __construct(actionComplaintConnection $acomp, sendComplaintConnection $scomp)
	{
		$this->scomp = $scomp;	
		$this->acomp = $acomp;
	}

	public function view_complaint_new()
	{
		return view('pages.admin.transaction.complaint-walk-in')
    	->with('ctype', complaintTypeConnection::all())
		->with('address', addressConnection::all())
		->with('pInfo', personalInfoConnection::all())
		->with('client', clientConnection::all())
		->with('policy_num', clientAccountsConnection::all())
		->with('company', inscompanyConnection::all())
		->with('complaints', sendComplaintConnection::all())
		->with('employees',employeeConnection::all())
		->with('pinfo', personalInfoConnection::all())
		->with('details', salesAgentConnection::all());
	}   

    public function send(Request $req)
    {
      	date_default_timezone_set('Asia/Manila');
    	$comp_type = complaintTypeConnection::where('complaintType_ID', '=', $req->comp_type)->first();
    	$account = clientAccountsConnection::where('policy_number', '=', $req->policy_number)->first();
    	$id = accListInsuranceConnection::where('insure_ID', '=', $account->account_ID)->first();
    	$this->scomp->insurance_company = $req->insurance_company;
    	$this->scomp->policy_number = $req->policy_number;
    	$this->scomp->account_ID = $id->insure_ID;
    	$this->scomp->name = $req->name;
    	$this->scomp->cp_1 = $req->cp1;
    	$this->scomp->cp_2 = $req->cp2;
    	$this->scomp->tp_num = $req->tpnum;
    	$this->scomp->email = $req->email;
    	$this->scomp->address = $req->address;
    	if($req->comp_type == 0)
    	{
	    	$this->scomp->complaintType_name = $req->specify;
	    	$this->scomp->complaintType_desc = '';
    	}
    	else
    	{
	    	$this->scomp->complaintType_name = $comp_type->complaintType_name;
	    	$this->scomp->complaintType_desc = $comp_type->complaintType_desc;	
    	}
    	$this->scomp->complaint = $req->comp_details;
    	$this->scomp->status = 0;
    	$this->scomp->date_sent = date("Y-m-d H:i:s");
    	
    	try
		{
			$this->scomp->save();

			return $this->act_complaint($req);
		}
		catch(\Exception $e)
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

	public function act_complaint(Request $req)
	{
		$id = sendComplaintConnection::orderBy('complaint_ID', 'desc')->first();
		$this->acomp->complaint_ID = $id->complaint_ID;
		$this->acomp->emp_ID = $req->employee;
		$this->acomp->status = $req->priority;

    	try
		{
			$this->acomp->save();

			return $this->update_complaint($req);
		}
		catch(\Exception $e)
		{
			$message = $e->getCode();
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

	public function update_complaint($req)
	{
      	date_default_timezone_set('Asia/Manila');
		$comp = sendComplaintConnection::orderBy('complaint_ID', 'desc')->first();
		$comp->date_updated = date("Y-m-d H:i:s");
		$comp->status = 1;

    	try
		{
			$comp->save();
			alert()
			->success('Record Saved', 'Success')
			->persistent("Close");

			return Redirect::back();
		}
		catch(\Exception $e)
		{
			$message = $e->getCode();
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
