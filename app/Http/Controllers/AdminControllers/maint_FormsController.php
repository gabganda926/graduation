<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Alert;

use Redirect;

class maint_FormsController  extends Controller
{
	public function __construct()
	{

	}

	public function index()
	{
	  return view('/pages/maintenance/iforms');
	}   
	
}
