<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\clientListConnection;

use App\policynoConnection;

use App\inscompanyConnection;

use App\clientAccountsConnection;

use App\clientConnection;

use App\personalInfoConnection;

use App\addressConnection;

class trans_claimsController extends Controller
{
  public function index()
  {
    return view('/pages/admin/transaction/claim-request-walkin')
    	->with('pno',policynoConnection::all())
      	->with('comp',inscompanyConnection::all())
      	->with('clist', clientListConnection::all())
      	->with('cliacc', clientAccountsConnection::all())
      	->with('cli', clientConnection::all())
      	->with('pinfo', personalInfoConnection::all())
      	->with('addr', addressConnection::all());
  }
}
