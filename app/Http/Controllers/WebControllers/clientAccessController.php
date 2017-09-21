<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\clientSystemAccountConnection;

use App\AccountsConnection;

use App\employeeConnection;

use App\clientNotificationConnection;

use Auth;

use Redirect;

use Hash;

class clientAccessController extends Controller
{
    public function index() 
    {
    	return view('pages.main.sign-in');
	}

	public function login(Request $req)
	{
        $account = clientSystemAccountConnection::where(['username'=>$req['username']])->first();
        $employee = AccountsConnection::where(['user_name'=>$req['username']])->first();

        if($employee)
        {
            if(Hash::check($req['password'],$employee->user_password))
            {
                session()->put('username', $req['username']);
                session()->put('password', $req['password']);
                $login_redirect = employeeConnection::where('emp_ID', "=",$employee->user_ID)->first();
                if($login_redirect->emp_role_ID == 0)
                {
                    return redirect('/manager/dashboard');
                }
                if($login_redirect->emp_role_ID == 1)
                {
                    return redirect('/admin/dashboard');   
                }
                if($login_redirect->emp_role_ID == 2)
                {
                    return redirect('/accounting-staff/dashboard');
                }
            }
            else
            {
                alert()
                ->error('ERROR', 'Invalid Username or Password')
                ->persistent("Close");

                return redirect('/sign-in');
            }
        }
        elseif($account)
        {
            if(Hash::check($req['password'],$account->password))
            {
                $count = clientNotificationConnection::where(['account_ID'=>$account->account_ID])->count();
                \Log::info($count);
                session()->put('accountID', $account->account_ID);
                session()->put('username', $req['username']);
                session()->put('password', $req['password']);
                session()->put('notif', $count);
                return redirect('/user/home');
            }
            else
            {
                alert()
                ->error('ERROR', 'Invalid Username or Password')
                ->persistent("Close");

                return redirect('/sign-in');
            }
        }
        else
        {
            alert()
            ->error('ERROR', 'Invalid Credentials')
            ->persistent("Close");

            return redirect('/sign-in');
        }
	}

    public function logout(Request $req)
    {
        session()->flush();

        return redirect('/sign-in');
    }
}
