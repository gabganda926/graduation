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

use App\accListInsuranceConnection;

use Alert;

use Redirect;

class trans_transmitDocumentController extends Controller
{
	public function __construct(transmittalProccessConnection $proc)
	{
		$this->process = $proc;
	}

	public function index()
  {
   		return view('pages.admin.transaction.transmittal-documents-walk-in')
      ->with('data', accListInsuranceConnection::all())
   		->with('courier', courierConnection::all())
   		->with('info', personalInfoConnection::all())
   		->with('inscomp', inscompanyConnection::all())
   		->with('records',transmittalRecordConnection::all())
   		->with('request', transmittalRequestConnection::all())
   		->with('details', transmittalDetailsConnection::all())
   		->with('documents', transmittalDocumentsConnection::all());
	}

	public function transmit(Request $req){
      	date_default_timezone_set('Asia/Manila');
      	$reqID = str_pad($req->clients,11, "0", STR_PAD_LEFT);
    		$this->process->request_ID = $reqID;
    		$this->process->courier_ID = $req->courier;
    		$this->process->last_update = date("Y-m-d H:i:s");

		try
    	{
    		$this->process->save();
          	return $this->transmit_docu($req);
    	}
    	catch(\Exception $e)
    	{
    		$code = $e->getCode();
    		if($code == 23000)
    		{
              alert()
              ->error('ERROR', $e->getMessage())
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

	public function transmit_docu($req){
    	$id = transmittalProccessConnection::orderBy('process_ID','desc')->first();

		foreach($req->record as $rec)
		{
	        $documents = transmittalRecordConnection::where("transRec_ID", "=", $rec)->first();
	        $docs = new transmitDocumentsConnection;
	        $docs->process_ID = $id->process_ID;
	        $docs->document = $documents->transRec;
	        $docs->document_desc = $documents->transRec_desc;

	        $docs->save();
		}

        return $this->update_request($req);
	}

	public function update_request($req){
      	date_default_timezone_set('Asia/Manila');
      	$reqID = str_pad($req->clients,11, "0", STR_PAD_LEFT);
		$record = transmittalRequestConnection::where('req_ID','=', $reqID)->first();

		$record->status = 3;
		$record->date_update = date("Y-m-d H:i:s");
		try
    	{
    		$record->save();
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
              ->error('ERROR', $e->getMessage())
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
}
