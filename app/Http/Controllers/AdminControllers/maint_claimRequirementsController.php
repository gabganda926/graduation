<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\claimsTypeConnection;

use App\claimsRequirementConnection;

use Redirect;

use Alert;

class maint_claimRequirementsController extends Controller
{

	public function __construct(claimsRequirementConnection $claimreq)
	{
		$this->creq = $claimreq;
	}
    public function index()
    {
    	return view('pages.admin.maintenance.claim-requirement')
      ->with('claimType', claimsTypeConnection::all())
      ->with('claimreq', claimsRequirementConnection::all());
    }

    public function add_claim_requirements(Request $req)
    {
    	$this->creq->claimReq_Type = $req->claimReq_Type;
    	$this->creq->claimRequirement = $req->claimRequirement;
    	$this->creq->del_flag = 0;
    	$this->creq->created_at = $req->time;
    	$this->creq->updated_at = $req->time;

    	try
    	{
    		$this->creq->save();
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

    public function update_claim_requirements(Request $req)
    {
    	$creq = claimsRequirementConnection::where('claimReq_ID','=', $req->id)->first();
    	$creq->claimReq_Type = $req->aclaimReq_Type;
    	$creq->claimRequirements = $req->aclaimRequirement;
    	$creq->updated_at = $req->atime;

    	try
    	{
    		$creq->save();

    		alert()
    		->success('Record Updated', 'Success')
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

    public function delete_claim_requirements(Request $req)
    {
    	$creq = claimsRequirementConnection::where('claimReq_ID', '=', $req->id)->first();
    	$creq->del_flag = 1;
    	$creq->updated_at = $req->atime;

    	try
    	{
    		$creq->save();

    		alert()
    		->success('Record Updated', 'Success')
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

    public function ardelete_claim_requirements(Request $req)
    {
      foreach($req->asd as $ID)
      {
        $role = claimsRequirementConnection::where('claimReq_ID','=',$ID)->first();
        $role->del_flag = 1;
        $mytime = $req->time;
        $role->updated_at = $mytime;
        $role->save();
      }
    }
}
