<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\userTypesConnection;

class usertypeController extends Controller
{
    public function __construct(userTypesConnection $type)
    {
        $this->ustype = $type;
    }

    public function index()
    {
      return view('/pages/maintenance/usertypes')
      ->with('typ',userTypesConnection::all());
    }

    public function add_usertypes(Request $req)
    {
    	$this->ustype->user_type_name = $req->user_type_name;
    	$this->ustype->user_type_desc = $req->user_type_desc;

      $this->ustype->del_flag = 0;

    	$this->ustype->save();

    	return redirect('/admin/maintenance/user/type');
    }

    public function update_usertypes(Request $req)
    {
       $ustype = userTypesConnection::where('user_type_ID', '=', $req->id)->first();
       $ustype->user_type_name = $req->auser_type_name;
       $ustype->user_type_desc = $req->auser_type_desc;

       $ustype->save();
       return redirect('/admin/maintenance/user/type');
    }

    public function delete_usertypes(Request $req)
    {
       $ustype = userTypesConnection::where('user_type_ID', '=', $req->id)->first();
       $ustype->del_flag = 1;

       $ustype->save();
       return redirect('/admin/maintenance/user/type');
     }
}
