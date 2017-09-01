<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\claimsTypeConnection;

use Redirect;

use Alert;

class maint_claimTypeController extends Controller
{
	public function __construct(claimsTypeConnection $claimtype)
	{
		$this->ctype = $claimtype;
	}

    public function index()
    {
    	return view('pages.admin.maintenance.claim-type')
    	->with('claimType', claimsTypeConnection::all());
    }

    public function add_claim_type(Request $req)
    {
    	$this->ctype->claimType = $req->claimType;
    	$this->ctype->claimType_desc = $req->claimType_desc;
    	$this->ctype->del_flag = 0;
    	$this->ctype->created_at = $req->time;
    	$this->ctype->updated_at = $req->time;

    	try
    	{
    		$this->ctype->save();
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

    public function update_claim_type(Request $req)
    {
    	$ctype = claimsTypeConnection::where('claimType_ID', '=', $req->id)->first();
    	$ctype->claimType = $req->aclaimType;
    	$ctype->claimType_desc = $req->aclaimType_desc;
    	$ctype->updated_at = $req->atime;

    	try
    	{
    		$ctype->save();
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


    public function delete_claim_type(Request $req)
    {
    	$ctype = claimsTypeConnection::where('claimType_ID', '=', $req->id)->first();
    	$ctype->del_flag = 1;
    	$ctype->updated_at = $req->atime;

    	try
    	{
    		$ctype->save();
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

    public function ardelete_claim_type(Request $req)
    {
      foreach($req->asd as $ID)
      {
        $role = claimsTypeConnection::where('claimType_ID','=',$ID)->first();
        $role->del_flag = 1;
        $mytime = $req->time;
        $role->updated_at = $mytime;

        $role->save();
      }
    }
}
