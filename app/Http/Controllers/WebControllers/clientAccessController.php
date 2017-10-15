<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\clientSystemAccountConnection;

use App\AccountsConnection;

use App\employeeConnection;

use App\salesAgentConnection;

use App\addressConnection;

use App\personalInfoConnection;
  
use App\employeeRoleConnection;

use App\userAccountsConnection;

use App\clientNotificationConnection;

use Auth;

use Redirect;

use Hash;

use Session;

class clientAccessController extends Controller
{
    public function __construct(AccountsConnection $acc, salesAgentConnection $agnt, userAccountsConnection $useracc, employeeConnection $emp, addressConnection $add, personalInfoConnection $personalinfo,employeeRoleConnection $role)
    { 
        $this->role = $role;
        $this->agent = $agnt;
        $this->employee = $emp;
        $this->address = $add;
        $this->pinfo = $personalinfo;
        $this->user = $useracc;
        $this->acc = $acc;
    }

    public function index() 
    {
        $account = AccountsConnection::where('user_name','=','admin')->first();
        if($account == null)
        {
            $this->add_employee();
        }
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
                $emp = salesAgentConnection::where('agent_ID', "=", $employee->user_ID)->first();
                $pinfo = personalInfoConnection::where('pinfo_ID', "=", $emp->personal_info_ID)->first();
                $empl = employeeConnection::where('emp_ID', "=", $emp->agent_ID)->first();
                $empRole = employeeRoleConnection::where('emp_role_ID', "=", $empl->emp_role_ID)->first();
                session()->put('username', $req['username']);
                session()->put('password', $req['password']);
                Session::put('fname', $pinfo->pinfo_first_name);
                Session::put('mname', $pinfo->pinfo_middle_name);
                Session::put('lname', $pinfo->pinfo_last_name);
                Session::put('pic', $pinfo->pinfo_picture);
                Session::put('id', $pinfo->pinfo_ID);
                Session::put('role', $empRole->emp_role_Name);
                $login_redirect = employeeConnection::where('emp_ID', "=",$employee->user_ID)->first();
                if($login_redirect->emp_role_ID == 3)
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

    public function add_employee()
    {
        $this->address->add_city = 'default';
        $this->address->add_region = 'NCR';
        \Log::info(1);
        try
        {
          $this->address->save();
          return $this->add_emp_info();
        }
        catch(\Exception $e)
        {
          $message = $e->getCode();
          if($message == 23000)
          {
              alert()
              ->error('ERROR', 'Data already exist!')
              ->persistent("Close");

              return Redirect::back();
          }
          else if($message == 22001)
          {
            alert()
            ->error('ERROR', 'Exceed Max limit of column!')
            ->persistent("Close");

            return Redirect::back();
          }
          else
          {
            alert()
            ->error('ERROR', $e->getMessage())
            ->persistent("Close");

            return Redirect::back();
          }
        }
    }

    public function add_emp_info()
    {
        $this->pinfo->pinfo_first_name = 'admin';
        $this->pinfo->pinfo_last_name = 'admin';
        $this->pinfo->pinfo_cpnum_1 = '09000000000';
        $this->pinfo->pinfo_age = '01/01/1900';
        $this->pinfo->pinfo_gender = '0';
        $this->pinfo->pinfo_mail = 'admin@yahoo.com'; 
        \Log::info(2);

        try
        {
          $this->pinfo->save();
          return $this->add_agent();
        }
        catch(\Exception $e)
        {
          $message = $e->getCode();
          if($message == 23000)
          {
              alert()
              ->error('ERROR', 'Data already exist!')
              ->persistent("Close");

              return Redirect::back();
          }
          else if($message == 22001)
          {
            alert()
            ->error('ERROR', 'Exceed Max limit of column!')
            ->persistent("Close");

            return Redirect::back();
          }
          else
          {
            alert()
            ->error('ERROR', $e->getMessage())
            ->persistent("Close");

            return Redirect::back();
          }
        }
    }

    public function add_agent()
    {
        date_default_timezone_set('Asia/Manila');
        $latestid = addressConnection::orderBy('add_ID', 'desc')->first();
        $latestidpinfo = personalInfoConnection::orderBy('pinfo_ID', 'desc')->first();
        $this->agent->agent_add_ID = (int)$latestid->add_ID;
        $this->agent->personal_info_ID = (int)$latestidpinfo->pinfo_ID;
        $this->agent->sales_agent_flag = 0;
        $this->agent->del_flag  = 0;
        $this->agent->created_at = date("Y-m-d H:i:s");
        $this->agent->updated_at = date("Y-m-d H:i:s");
        \Log::info(3);

        try
        {
          $this->agent->save();
          return $this->add_emp();
        }
        catch(\Exception $e)
        {
          $message = $e->getCode();
          if($message == 23000)
          {
              alert()
              ->error('ERROR', $e->getMessage())
              ->persistent("Close");

              return Redirect::back();
          }
          else if($message == 22001)
          {
            alert()
            ->error('ERROR', 'Exceed Max limit of column!')
            ->persistent("Close");

            return Redirect::back();
          }
          else
          {
            alert()
            ->error('ERROR', $e->getMessage())
            ->persistent("Close");

            return Redirect::back();
          }
        }
    }

    public function add_emp()
    {
        $latestid = salesAgentConnection::orderBy('agent_ID', 'desc')->first();
        $this->employee->emp_ID = (int)$latestid->agent_ID;
        $this->employee->emp_role_ID = 1;
        \Log::info(4);
        try
        {
          $this->employee->save();
          return $this->add_account();
        }
        catch(\Exception $e)
        {
          $message = $e->getCode();
          if($message == 23000)
          {
              alert()
              ->error('ERROR', 'Data already exist!')
              ->persistent("Close");

              return Redirect::back();
          }
          else if($message == 22001)
          {
            alert()
            ->error('ERROR', 'Exceed Max limit of column!')
            ->persistent("Close");

            return Redirect::back();
          }
          else
          {
            alert()
            ->error('ERROR', $e->getMessage())
            ->persistent("Close");

            return Redirect::back();
          }
        }
    }

    public function add_account()
    {
        date_default_timezone_set('Asia/Manila');
        $latestid = employeeConnection::orderBy('emp_ID', 'desc')->first();
        $this->user->user_ID = $latestid->emp_ID;
        $this->user->user_name = 'admin';
        $this->user->user_password = bcrypt('admin123');
        $this->user->del_flag = 0;
        $this->user->created_at = date("Y-m-d H:i:s");
        $this->user->updated_at = date("Y-m-d H:i:s");
        \Log::info(5);

        try
        {
          $this->user->save();
          alert()
          ->success('Admin Account Created', 'Success')
          ->persistent("Close");

          return true;
        }
        catch(\Exception $e)
        {
          $message = $e->getCode();
          if($message == 23000)
          {
              alert()
              ->error('ERROR', 'Data already exist!')
              ->persistent("Close");

              return Redirect::back();
          }
          else if($message == 22001)
          {
            alert()
            ->error('ERROR', 'Exceed Max limit of column!')
            ->persistent("Close");

            return Redirect::back();
          }
          else
          {
            alert()
            ->error('ERROR', $e->getMessage())
            ->persistent("Close");

            return Redirect::back();
          }
        }
    }
}
