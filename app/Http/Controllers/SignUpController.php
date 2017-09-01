<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AccountsConnection;

use Alert;

use Redirect;

class SignUpController extends Controller
{
  public function __construct(AccountsConnection $accounts)
  {
      $this->acc = $accounts;
  }

  public function index()
  {
    return view('/pages/main/sign-up');
  }

  public function create_account(Request $req)
  {
      $this->acc->user_name = $req->namesurname;
      $this->acc->user_password = $req->password;
      $this->acc->user_type = $req->type;
      $mytime = $req->time;
      $this->acc->created_at = $mytime;
      $this->acc->updated_at = $mytime;
      $this->acc->del_flag = 0;
      try
      {
        $this->acc->save();
        alert()
        ->success('Record Saved', 'Success')
        ->persistent("Close");

        return Redirect::back();
      }
      catch(\Exception $e)
      {
        $message = $e->getCode();
          alert()
          ->error('ERROR', $e->getCode()." ".$e->getMessage())
          ->persistent("Close");

          return Redirect::back();

      }
  }
}
