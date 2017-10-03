<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\inscompanyConnection;

use App\employeeConnection;

use App\sendComplaintConnection;

use App\personalInfoConnection;

use App\salesAgentConnection;

use App\actionComplaintConnection;

use Alert;

use Redirect;

class trans_complaintEndController extends Controller
{
    public function index()
    {
    	return view('pages.admin.transaction.complaint-ended')
    	->with('complaints', sendComplaintConnection::all());
    }
}
