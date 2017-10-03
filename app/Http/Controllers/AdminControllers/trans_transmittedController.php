<?php

namespace App\Http\Controllers\AdminControllers;

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

use Alert;

use Redirect;

class trans_transmittedController extends Controller
{
    public function index()
    {
    	return view('pages.admin.transaction.transmittal')
    	->with('request', transmittalRequestConnection::all())
    	->with('details', transmittalDetailsConnection::all())
    	->with('documents', transmittalDocumentsConnection::all())
        ->with('process', transmittalProccessConnection::all())
        ->with('courier', courierConnection::all())
        ->with('pinfo', personalInfoConnection::all());
    }

    public function view(Request $req)
    {
        $id = transmittalDetailsConnection::where('req_ID','=',str_pad($req->ID,11, "0", STR_PAD_LEFT))->first();
        $inscomp = inscompanyConnection::where('comp_ID','=', $id->insurance_company)->first();
        $proc = transmittalProccessConnection::where('request_ID','=',str_pad($req->ID,11, "0", STR_PAD_LEFT))->first();
        $cour = courierConnection::where('courier_ID', '=', $proc->courier_ID)->first();
        $details = personalInfoConnection::where('pinfo_ID','=',$cour->personal_info_ID)->first();
        return view('pages.admin.transaction.transmittal-info-approved')
        ->with('request', transmittalRequestConnection::where('req_ID','=',str_pad($req->ID,11, "0", STR_PAD_LEFT))->first())
        ->with('details', transmittalDetailsConnection::where('req_ID','=',str_pad($req->ID,11, "0", STR_PAD_LEFT))->first())
        ->with('documents', transmittalDocumentsConnection::where('req_ID','=',str_pad($req->ID,11, "0", STR_PAD_LEFT))->get())
        ->with('inscomp', $inscomp)
        ->with('courier', $details);
    }

    public function update(Request $req)
    {
    	$data = transmittalRequestConnection::where('req_ID','=',str_pad($req->ID,11, "0", STR_PAD_LEFT))->first();
    	$data->status = $req->stat;

    	$data->save();
    }
}
