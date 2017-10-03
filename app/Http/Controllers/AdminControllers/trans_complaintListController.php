<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\inscompanyConnection;

use App\employeeConnection;

use App\sendComplaintConnection;

use App\personalInfoConnection;

use App\salesAgentConnection;

use App\actionComplaintConnection;

use Alert;

use Redirect;

class trans_complaintListController extends Controller
{

    public function index()
    {
    	return view('pages.admin.transaction.complaint-list')
    	->with('action', actionComplaintConnection::all())
    	->with('complaints', sendComplaintConnection::all())
		->with('employees',employeeConnection::all())
		->with('pinfo', personalInfoConnection::all())
		->with('details', salesAgentConnection::all());
    }

    public function view(Request $req)
    {
    	$id = sendComplaintConnection::where('complaint_ID', '=', $req->ID)->first();
    	$inscomp = inscompanyConnection::where('comp_ID','=', $id->insurance_company)->first();
    	return view('pages.admin.transaction.complaint-details')
    	->with('complaint', sendComplaintConnection::where('complaint_ID','=',$req->ID)->first())
    	->with('inscomp', $inscomp->comp_name);
    }

	public function update_complaint(Request $req)
	{
      	date_default_timezone_set('Asia/Manila');
		$comp = sendComplaintConnection::where('complaint_ID', '=', $req->ID)->first();
		$comp->date_updated = date("Y-m-d H:i:s");
		$comp->status = $req->stat;

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
