<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\transmittalRequestConnection;

class trans_transmittalHomeController extends Controller
{
	public function index()
	{
    	return view('pages.admin.transaction.transmittal-home')
    	->with('request', transmittalRequestConnection::all());
    }
}
