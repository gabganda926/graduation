<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class z_Queries_complaintInsuranceController extends Controller
{
    public function index()
    {
      return view('/pages/admin/queries/complaintInsurance');
    }
}
