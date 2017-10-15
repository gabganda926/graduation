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

use Session;

class trans_transmittalRequestController extends Controller
{
    public function index()
    {
    	return view('pages.admin.transaction.transmittal-request')
    	->with('request', transmittalRequestConnection::all())
    	->with('details', transmittalDetailsConnection::all())
    	->with('documents', transmittalDocumentsConnection::all());
    }

    public function view(Request $req)
    {
    	$id = transmittalDetailsConnection::where('req_ID','=',str_pad($req->ID,11, "0", STR_PAD_LEFT))->first();
    	$inscomp = inscompanyConnection::where('comp_ID','=', $id->insurance_company)->first();
    	return view('pages.admin.transaction.transmittal-info-request')
    	->with('request', transmittalRequestConnection::where('req_ID','=',str_pad($req->ID,11, "0", STR_PAD_LEFT))->first())
    	->with('details', transmittalDetailsConnection::where('req_ID','=',str_pad($req->ID,11, "0", STR_PAD_LEFT))->first())
    	->with('documents', transmittalDocumentsConnection::where('req_ID','=',str_pad($req->ID,11, "0", STR_PAD_LEFT))->get())
    	->with('inscomp', $inscomp);
    }

    public function approve(Request $req)
    {
      $data = transmittalRequestConnection::where('req_ID', '=', str_pad($req->ID,11, "0", STR_PAD_LEFT))->first();
      $data->status = 6;
      $data->employee_info_ID = Session::get('id');
      $data->save();
    }

    public function disapprove(Request $req)
    {
    	$data = transmittalRequestConnection::where('req_ID', '=', str_pad($req->ID,11, "0", STR_PAD_LEFT))->first();
    	$data->status = 2;
      $data->employee_info_ID = Session::get('id');
    	$data->save();
    }

    public function transmit(Request $req)
    {
   		return view('pages.admin.transaction.transmittal-documents')
   		->with('courier', courierConnection::all())
   		->with('info', personalInfoConnection::all())
   		->with('inscomp', inscompanyConnection::all())
   		->with('records',transmittalRecordConnection::all())
   		->with('request', transmittalRequestConnection::all())
   		->with('details', transmittalDetailsConnection::all())
   		->with('documents', transmittalDocumentsConnection::all())
      	->with('id', $req->ID);
    }
}
