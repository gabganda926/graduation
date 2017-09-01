<?php

namespace App\Http\Controllers\ManagerControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\quotationListConnection;

use App\quotationCompanyConnection;

use App\quoteNoteConnection;

use App\salesAgentConnection;

use App\personalInfoConnection;

use App\inscompanyConnection;

use App\vMakeConnection;

use App\vModelConnection;

use App\vTypeConnection;

use App\premiumDGConnection;

use App\premiumPAConnection;

use Redirect;

use Alert;


class comp_quotationApprovalController extends Controller
{
	public function __construct(quoteNoteConnection $quoteNote)
	{
		$this->note = $quoteNote;
	}

	public function index()
	{
		return view('pages.manager.transaction.quotation-company')
		->with('qlist', quotationListConnection::all())
		->with('qcomp', quotationCompanyConnection::all())
		->with('agent', salesAgentConnection::all())
		->with('pinfo', personalInfoConnection::all())
		->with('insco', inscompanyConnection::all())
		->with('make' , vMakeConnection::all())
		->with('model', vModelConnection::all())
		->with('type' , vTypeConnection::all())
		->with('pdg'  , premiumDGConnection::all())
		->with('ppa'  , premiumPAConnection::all());
	}

    public function approve_quote(Request $req)
    {
    	$quote = quotationListConnection::where('quote_ID', "=", $req->ID)->first();
    	$quote->quote_status = 2;

    	$quote->save();
    }

    public function disapprove_quote(Request $req)
    {
    	$quote = quotationListConnection::where('quote_ID', "=", $req->id)->first();
    	$quote->quote_status = 3;

    	try
    	{
    		$quote->save();
        	return $this->create_note($req);
	    }
	    catch(Exception $e)
	    {
	      $message = $e->getCode();
	      if($message == 23000)
	      {
	          alert()
	          ->error('ERROR', $e->getMessage())
	          ->persistent("Close");

	          return Redirect::back();
	      }
	      else if($message == 22001)
	      {
	        alert()
	        ->error('ERROR', $e->getMessage())
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

    public function create_note($req)
    {
    	$this->note->quote_ID = $req->id;
    	$this->note->note = $req->note;
    	try
    	{
    		$this->note->save();
		    return Redirect::back();
	    }
	    catch(Exception $e)
	    {
	      $message = $e->getCode();
	      if($message == 23000)
	      {
	          alert()
	          ->error('ERROR', $e->getMessage())
	          ->persistent("Close");

	          return Redirect::back();
	      }
	      else if($message == 22001)
	      {
	        alert()
	        ->error('ERROR', $e->getMessage())
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
}
