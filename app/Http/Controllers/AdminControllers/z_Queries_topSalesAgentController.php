<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\salesAgentConnection;

use App\addressConnection;

use App\employeeConnection;

use App\personalInfoConnection;

use App\inscompanyConnection;

use App\clientConnection;

class z_Queries_topSalesAgentController extends Controller
{
    public function index()
    {
      return view('/pages/admin/queries/topSalesAgent')
      ->with('agent',salesAgentConnection::all())
    ->with('emp',employeeConnection::all())
    ->with('pnf',personalInfoConnection::all())
    ->with('comp',inscompanyConnection::all())
    ->with('client',clientConnection::all())
    ->with('add',addressConnection::all());
    }
}
