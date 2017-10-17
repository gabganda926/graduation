<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\claimsTypeConnection;

use App\claimRequestConnection;


class z_Queries_claimTypeController extends Controller
{
    public function index()
    {
      return view('/pages/admin/queries/claim-type')
      ->with('ctype', claimsTypeConnection::all())
      ->with('creq', claimRequestConnection::all());
    }
}
