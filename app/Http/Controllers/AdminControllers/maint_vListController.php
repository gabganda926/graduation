<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\vListConnection;

use App\vModelConnection;

use App\vMakeConnection;

use App\vTypeConnection;

use Alert;

use Redirect;

class maint_vListController extends Controller
{
    public function index()
    {
      return view('/pages/admin/maintenance/vehicle list')
      ->with('type',vTypeConnection::all())
      ->with('list',vMakeConnection::all())
      ->with('make',vMakeConnection::all())
      ->with('model',vModelConnection::all());
    }
}
