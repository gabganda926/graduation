<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\inscompanyConnection;

use App\clientAccountsConnection;

use App\clientListConnection;


class z_Queries_topInsuranceCompanyController extends Controller
{
    public function index()
    {
      return view('/pages/admin/queries/topInsuranceCompany')
      ->with('ins', inscompanyConnection::all())
      ->with('cliacc', clientAccountsConnection::all())
      ->with('clientlist', clientListConnection::all());
    }
}
