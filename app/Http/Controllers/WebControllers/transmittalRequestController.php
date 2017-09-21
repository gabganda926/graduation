<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\inscompanyConnection;

use App\transmittalRecordConnection;

use App\transmittalDetailsConnection;

use App\transmittalDocumentsConnection;

use App\transmittalRequestConnection;

use Alert;

use Redirect;

use Session;

class transmittalRequestController extends Controller
{
	public function __construct(transmittalRequestConnection $request, transmittalDetailsConnection $details)
	{
		$this->request = $request;
		$this->details = $details;
	}

    public function index()
    {
    	 return view('pages.webpage.sign-in.transmittal-signin')
    	 ->with("comp", inscompanyConnection::all())
    	 ->with("trec", transmittalRecordConnection::all());
    }

    public function send_request(Request $req)
    {
      date_default_timezone_set('Asia/Manila');
      $id = str_pad(rand(0,'9'.round(microtime(true))),11, "0", STR_PAD_LEFT);
    	$this->request->req_ID = $id;
      $this->request->account_ID = Session::get('accountID') ;
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
        $this->details->insurance_company = $req->insurance;
        $this->details->policy_number = $req->policy_number;
      	$this->details->name = $req->name;
      	$this->details->cp_1 = $req->cp1;
      	$this->details->cp_2 = $req->cp2;
      	$this->details->tp_num = $req->tpnum;
      	$this->details->email = $req->email;
      	$this->details->address = $req->address;

        try
        {
          $this->details->save();
          return $this->save_documents($req, $id);
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

    public function save_documents($req, $id)
    {
      foreach($req->document as $ID)
      {
        $documents = transmittalRecordConnection::where("transRec_ID", "=", $ID)->first();
        $docs = new transmittalDocumentsConnection;
        $docs->req_ID = $id;
        $docs->document = $documents->transRec;
        $docs->document_desc = $documents->transRec_desc;

        try
        {
          $docs->save();
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

      alert()
      ->success('Record Saved', 'Success')
      ->persistent("Close");

      return Redirect::back();
    }
}
