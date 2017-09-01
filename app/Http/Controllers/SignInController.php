<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AccountsConnection;

use Alert;

use Redirect;

class SignInController extends Controller
{
  public function index()
  {
    return view('/pages/main/sign-in');
  }


  public function Signin(Request $req)
  {
     $result = AccountsConnection::where('user_name', '=', $req->username)->get();

     if($result->isEmpty())
     {
         alert()
         ->error('Authentication Failed', 'Account doesnt exist!')
         ->persistent("Close");

         return Redirect::back();
     }

     foreach($result as $res)
     {
       if($res->user_password == $req->password)
       {
          if($res->user_type == 1)
          {
            return redirect('admin/dashboard');
          }
       }
       else
       {
           alert()
           ->error('Authentication Failed', 'Inavlid Password!')
           ->persistent("Close");

           return Redirect::back();
       }
     }


  }
}
