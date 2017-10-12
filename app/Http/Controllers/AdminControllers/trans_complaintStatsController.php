<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\sendComplaintConnection;

use App\actionComplaintConnection;

class trans_complaintStatsController extends Controller
{
    public function index()
    {
    	return view('pages.admin.transaction.complaint-online')
    	 ->with('prio', actionComplaintConnection::all())
    	 ->with('list', sendComplaintConnection::all());
    }
}
