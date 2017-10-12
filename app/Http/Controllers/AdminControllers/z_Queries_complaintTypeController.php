<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\sendComplaintConnection;


class z_Queries_complaintTypeController extends Controller
{
    public function index()
    {
      return view('/pages/admin/queries/complaintType')
      ->with('complaints', sendComplaintConnection::all());
    }
}
