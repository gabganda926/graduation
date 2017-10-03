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

class trans_transmittalEndController extends Controller
{
    public function index()
    {
    	return view('pages.admin.transaction.transmittal-ended')
    	->with('request', transmittalRequestConnection::all())
    	->with('details', transmittalDetailsConnection::all())
    	->with('documents', transmittalDocumentsConnection::all())
    	->with('process', transmittalProccessConnection::all())
    	->with('courier', courierConnection::all())
    	->with('pinfo', personalInfoConnection::all());
    }
}
