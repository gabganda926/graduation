<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\inscompanyConnection;

use App\complaintTypeConnection;

use App\sendComplaintConnection;

use Alert;

use Redirect;

use Session;

class sendComplaintsController extends Controller
{

	public function __construct(sendComplaintConnection $sendcomp)
	{
		$this->scomp = $sendcomp;
	}

    public function index()
    {
    	return view('pages.webpage.sign-in.complaint-signin')
    	 ->with('comp', inscompanyConnection::all())
    	 ->with('ctype', complaintTypeConnection::all());
    }

    public function send(Request $req)
    {
      	date_default_timezone_set('Asia/Manila');
    	$comp_type = complaintTypeConnection::where('complaintType_ID', '=', $req->comp_type)->first();	
    	$this->scomp->insurance_company = $req->insurance_company;
    	$this->scomp->policy_number = $req->policy_number;
    	$this->scomp->account_ID = Session::get('accountID');
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
    	$this->scomp->complaint = $req->complaint;
    	$this->scomp->status = 0;
    	$this->scomp->date_sent = date("Y-m-d H:i:s");
    	
    	try
		{
			$this->scomp->save();
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
