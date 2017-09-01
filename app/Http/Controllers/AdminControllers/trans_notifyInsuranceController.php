<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class trans_notifyInsuranceController extends Controller
{
  public function index()
  {
    return view('/pages/admin/transaction/notify-client');
  }
}
