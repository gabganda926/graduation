<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\quotationListConnection;

use App\clientNotificationConnection;

class clientNotificationController extends Controller
{
	public function index()
	{
    	return view('pages.webpage.sign-in.inbox')
    	->with('notification', clientNotificationConnection::all());	
	}

	public function approve_client(Request $req)
	{
    	$quote = quotationListConnection::where('quote_ID', "=", $req->ID)->first();
    	$quote->quote_status = 1;

    	$quote->save();
	}

	public function disapprove_client(Request $req)
	{
    	$quote = quotationListConnection::where('quote_ID', "=", $req->ID)->first();
    	$quote->quote_status = 7;

    	$quote->save();
	}
}
