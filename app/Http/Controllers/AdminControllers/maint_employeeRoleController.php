<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\employeeConnection;

use App\employeeRoleConnection;

use App\personalInfoConnection;

use Alert;

use Redirect;

class maint_employeeRoleController extends Controller
{
	public function __construct(employeeRoleConnection $emprole)
	{
	  $this->role = $emprole;
	}

	public function index()
	{
	  return view('/pages/admin/maintenance/employeeRole')
    ->with('empd',employeeConnection::all())
    ->with('pnf',personalInfoConnection::all())
	  ->with('role',employeeRoleConnection::all());
	}   

	public function add_emp_role(Request $req)
  {
    $this->role->emp_role_Name = $req->emp_role_Name;
    $this->role->emp_role_desc = $req->emp_role_desc;
    $mytime = $req->time;
    $this->role->created_at = $mytime;
    $this->role->updated_at = $mytime;
    $this->role->del_flag = 0;

    try
    {
      $this->role->save();
      alert()
      ->success('Record Saved', 'Success')
      ->persistent("Close");

      return Redirect::back();
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

  public function update_emp_role(Request $req)
  {
    $role = employeeRoleConnection::where('emp_role_ID','=',$req->id)->first();

    $role->emp_role_Name = $req->aemp_role_Name;
    $role->emp_role_desc = $req->aemp_role_desc;
    $mytime = $req->atime;
    $role->updated_at = $mytime;

    try
    {
      $role->save();
      alert()
      ->success('Record Updated', 'Success')
      ->persistent("Close");

      return Redirect::back();
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

  public function delete_emp_role(Request $req)
  {
    $role = employeeRoleConnection::where('emp_role_ID','=',$req->id)->first();
    $role->del_flag = 1;
    $mytime = $req->atime;
    $role->updated_at = $mytime;
    try
    {
      $role->save();
      alert()
      ->success('Record Deleted', 'Success')
      ->persistent("Close");

      return Redirect::back();
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

  public function ardelete_emp_role(Request $req)
  {
    foreach($req->asd as $ID)
    {
      $role = employeeRoleConnection::where('emp_role_ID','=',$ID)->first();
      $role->del_flag = 1;
      $mytime = $req->time;
      $role->updated_at = $mytime;

      $role->save();
    }
  }

}
