<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\courierConnection;
use App\transmittalProccessConnection;
use App\claimTransmitConnection;
use App\personalInfoConnection;

class z_Queries_topTransmittalCourierController extends Controller
{
    public function index()
    {
      return view('/pages/admin/queries/transmittal')
      ->with('cour', courierConnection::all())
      ->with('proc', transmittalProccessConnection::all())
      ->with('claim', claimTransmitConnection::all())
      ->with('pinfo', personalInfoConnection::all());
    }
}
