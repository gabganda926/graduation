<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\userAccountsConnection;

use App\employeeConnection;

use App\userTypesConnection;

//all()->where('del_flag', 0)

class accountsController extends Controller
{

    public function __construct(userAccountsConnection $accounts)
    {
        $this->uacc = $accounts;
    }

    public function index()
    {
      return view('/pages/maintenance/useraccounts')
      ->with('acc',userAccountsConnection::all())
      ->with('emp',employeeConnection::all())
      ->with('typ',userTypesConnection::all());
    }

    public function add_useracc(Request $req)
    {
      $this->uacc->user_ID = $req->emp_ID;
    	$this->uacc->user_name = $req->user_name;
    	$this->uacc->user_password = $req->user_password;
      $this->uacc->user_access = $req->user_access;
      $this->uacc->del_flag = 0;

      $this->uacc->save();

    	return redirect('/admin/maintenance/user/account');
    }

    public function update_useracc(Request $req)
    {
      $uacc = userAccountsConnection::where('user_ID', '=', $req->id)->first();

      $uacc->user_ID = $req->aemp_ID;
      $uacc->user_name = $req->auser_name;
      $uacc->user_password = $req->auser_password;
      $uacc->user_access = $req->auser_access;

      $uacc->save();

      return redirect('/admin/maintenance/user/account');
    }

    public function delete_useracc(Request $req)
    {
      $uacc = userAccountsConnection::where('user_ID', '=', $req->id)->first();

      $uacc->del_flag = 1;

      $uacc->save();

      return redirect('/admin/maintenance/user/account');
    }

}
