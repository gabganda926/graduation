<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\transmittalRecordConnection;

use Alert;

use Redirect;

class maint_transmittalController extends Controller
{
	public function __construct(transmittalRecordConnection $transrec)
	{
		$this->trec = $transrec;
	}

    public function index()
    {
    	return view('pages.admin.maintenance.transmittal')
    	->with('transrecord', transmittalRecordConnection::all());
    }

    public function add_transmittal_record(Request $req)
    {
    	$this->trec->transRec = $req->transRec;
    	$this->trec->transRec_desc = $req->transRec_desc;
    	$this->trec->del_flag = 0;
    	$this->trec->created_at = $req->time;
    	$this->trec->updated_at = $req->time;

    	try
    	{
    		$this->trec->save();
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

    public function update_transmittal_record(Request $req)
    {
    	$trec = transmittalRecordConnection::where('transRec_ID', '=', $req->id)->first();
    	$trec->transRec = $req->atransRec;
    	$trec->transRec_desc = $req->atransRec_desc;
    	$trec->del_flag = 0;
    	$trec->updated_at = $req->atime;

    	try
    	{
    		$trec->save();
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

    public function delete_transmittal_record(Request $req)
    {
    	$trec = transmittalRecordConnection::where('transRec_ID', '=', $req->id)->first();
    	$trec->del_flag = 1;
    	$trec->updated_at = $req->atime;

    	try
    	{
    		$trec->save();
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

    public function ardelete_transmittal_record(Request $req)
    {
      foreach($req->asd as $ID)
      {
        $role = transmittalRecordConnection::where('transRec_ID','=',$ID)->first();
        $role->del_flag = 1;
        $mytime = $req->time;
        $role->updated_at = $mytime;

        $role->save();
      }
    }
}
