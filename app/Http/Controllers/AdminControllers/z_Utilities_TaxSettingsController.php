<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\utilitiesTaxConnection;

use Alert;

use Redirect;

class z_Utilities_TaxSettingsController extends Controller
{
    public function index()
    {
      return view('/pages/admin/utilities/tax')
      ->with('tax', utilitiesTaxConnection::all());
    }

    public function update_value(Request $req)
    {
    	$util = utilitiesTaxConnection::where('tax_ID', "=", $req->taxid)->first();
    	\Log::info($req);
    	$util->percentage = $req->perc;

    	$util->save();
		alert()
	      ->success('Record Saved', "Success")
	      ->persistent("Close");

	    return Redirect::back();
    }
}
