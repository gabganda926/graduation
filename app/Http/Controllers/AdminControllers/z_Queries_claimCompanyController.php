<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\claimRequestConnection;

use App\inscompanyConnection;

use App\clientAccountsConnection;

class z_Queries_claimCompanyController extends Controller
{
    public function index()
    {
      return view('/pages/admin/queries/claim-company')
      ->with('cliacc', clientAccountsConnection::all())
      ->with('creq', claimRequestConnection::all())
      ->with('ins', inscompanyConnection::all());
    }
}
