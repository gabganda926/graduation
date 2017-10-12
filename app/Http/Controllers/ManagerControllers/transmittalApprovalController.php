<?php

namespace App\Http\Controllers\ManagerControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\inscompanyConnection;

use App\courierConnection;

use App\personalInfoConnection;

use App\transmittalRecordConnection;

use App\transmittalDetailsConnection;

use App\transmittalDocumentsConnection;

use App\transmittalRequestConnection;

use App\transmittalProccessConnection;

use App\transmitDocumentsConnection;

class transmittalApprovalController extends Controller
{
	public function index()
	{
    	return view('pages.manager.transaction.transmittal')
    	->with('request', transmittalRequestConnection::all())
    	->with('details', transmittalDetailsConnection::all())
    	->with('documents', transmittalDocumentsConnection::all());
    }

    public function view(Request $req)
    {
    	$id = transmittalDetailsConnection::where('req_ID','=',str_pad($req->ID,11, "0", STR_PAD_LEFT))->first();
    	$inscomp = inscompanyConnection::where('comp_ID','=', $id->insurance_company)->first();
    	return view('pages.manager.transaction.transmittal-details')
    	->with('request', transmittalRequestConnection::where('req_ID','=',str_pad($req->ID,11, "0", STR_PAD_LEFT))->first())
    	->with('details', transmittalDetailsConnection::where('req_ID','=',str_pad($req->ID,11, "0", STR_PAD_LEFT))->first())
    	->with('documents', transmittalDocumentsConnection::where('req_ID','=',str_pad($req->ID,11, "0", STR_PAD_LEFT))->get())
    	->with('inscomp', $inscomp);
    }

    public function approve(Request $req)
    {
    	$data = transmittalRequestConnection::where('req_ID', '=', str_pad($req->ID,11, "0", STR_PAD_LEFT))->first();
    	$data->status = 1;

    	$data->save();
    }

    public function disapprove(Request $req)
    {
    	$data = transmittalRequestConnection::where('req_ID', '=', str_pad($req->ID,11, "0", STR_PAD_LEFT))->first();
    	$data->status = 2;

    	$data->save();
    }
}
