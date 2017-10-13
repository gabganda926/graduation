<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\utilitiesComputationConnection;

use Alert;

use Redirect;

class z_Utilities_ComputationSettingsController extends Controller
{
    public function index()
    {
      return view('/pages/admin/utilities/computation')
      ->with('compu', utilitiesComputationConnection::all());
    }

    public function update_value(Request $req)
    {
    	$util = utilitiesComputationConnection::where('comp_ID', "=", $req->compid)->first();
    	if($util->comp_ID == 1)
    	{
    		$util->deductible = $req->fpg_ded;
    		$util->towing = $req->fpg_tow;
    		$util->aon = $req->aon;
    	}
    	if($util->comp_ID == 2)
    	{
    		$util->deductible = $req->comm_ded;
    		$util->towing = $req->comm_tow;
    		$util->aon = $req->aon;
    	}
    	if($util->comp_ID == 3)
    	{
    		$util->deductible = $req->std_ded;
    		$util->towing = $req->std_tow;
    		$util->aon = $req->aon;
    	}
    	if($util->comp_ID == 4)
    	{
    		$util->deductible = $req->pgi_ded;
    		$util->towing = $req->pgi_tow;
    		$util->aon = $req->aon;
    	}

    	$util->save();
		alert()
	      ->success('Record Saved', "Success")
	      ->persistent("Close");

	    return Redirect::back();
    }
}
