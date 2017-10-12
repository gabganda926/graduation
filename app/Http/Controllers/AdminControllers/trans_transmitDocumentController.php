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
	public function __construct(transmittalProccessConnection $proc,transmittalRequestConnection $request, transmittalDetailsConnection $details)
	{
		$this->process = $proc;
    $this->request = $request;
    $this->details = $details;
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

    public function direct_transmit(Request $req)
    {
      date_default_timezone_set('Asia/Manila');
      $id = str_pad(rand(0,'9'.round(microtime(true))),11, "0", STR_PAD_LEFT);
      $this->request->req_ID = $id;
      $this->request->account_ID = $req->acc_ID;
      $this->request->date_recieved = date("Y-m-d H:i:s");
      $this->request->status = 0;
      
      try
      {
        $this->request->save();
        return $this->save_details($req, $id);
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

    public function save_details($req, $id)
    {
        $this->details->req_ID = $id;
        $this->details->insurance_company = $req->insurance_ID;
        $this->details->policy_number = $req->det_policyno;
        $this->details->name = $req->det_clients;
        $this->details->cp_1 = $req->det_cpnum_1;
        $this->details->cp_2 = $req->det_cpnum_2;
        $this->details->tp_num = $req->det_tpnum;
        $this->details->email = $req->det_email;
        $this->details->address = $req->det_address;

        try
        {
          $this->details->save();
          return $this->direct_process($req, $id);
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

  public function direct_process($req, $id){

      date_default_timezone_set('Asia/Manila');
      $this->process->request_ID = $id;
      $this->process->courier_ID = $req->courier;
      $this->process->last_update = date("Y-m-d H:i:s");

      try
      {
        $this->process->save();
        return $this->direct_transmit_docu($req, $id);
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

  public function direct_transmit_docu($req, $id){

    $eyedee = transmittalProccessConnection::orderBy('process_ID','desc')->first();


    foreach($req->record as $rec)
    {
          $documents = transmittalRecordConnection::where("transRec_ID", "=", $rec)->first();
          $docs = new transmitDocumentsConnection;
          $docs->process_ID = $eyedee->process_ID;
          $docs->document = $documents->transRec;
          $docs->document_desc = $documents->transRec_desc;

          $docs->save();
    }

    return $this->direct_update_request($req, $id);
  }

  public function direct_update_request($req, $id){
    date_default_timezone_set('Asia/Manila');
    $record = transmittalRequestConnection::where('req_ID','=', $id)->first();
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
            ->error('ERROR1', $e->getMessage())
            ->persistent("Close");

              return Redirect::back();
          }
      }
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

			return redirect('/admin/transaction/transmittal-request');
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
