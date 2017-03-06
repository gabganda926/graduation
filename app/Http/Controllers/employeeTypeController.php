<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\employeeTypeConnection;

use App\employeeConnection;

use App\personalInfoConnection;

class employeeTypeController extends Controller
{
  public function __construct(employeeTypeConnection $employeetype)
  {
      $this->emptype = $employeetype;
  }

  public function index()
  {
      return view('/pages/maintenance/employeeType')
      ->with('empd',employeeConnection::all())
      ->with('pnf',personalInfoConnection::all())
      ->with('emptype',employeeTypeConnection::all());
  }

  public function add_emptype(Request $req)
  {
    $this->emptype->emptype_Name = $req->Employee_type;
    $this->emptype->emptype_Desc = $req->EmployeeType_desc;
    $mytime = $req->time;
    $this->emptype->created_at = $mytime;
    $this->emptype->updated_at = $mytime;
    $this->emptype->del_flag = 0;

    $this->emptype->save();

    return redirect('/admin/maintenance/employee/type');
  }

  public function update_emptype(Request $req)
  {
    $emptype = employeeTypeConnection::where('employeeType_ID','=',$req->id)->first();

    $emptype->emptype_Name = $req->aEmployee_type;
    $emptype->emptype_Desc = $req->aEmployeeType_desc;
    $mytime = $req->atime;
    $emptype->updated_at = $mytime;
    $emptype->save();

    return redirect('/admin/maintenance/employee/type');
  }

  public function delete_emptype(Request $req)
  {
    $emptype = employeeTypeConnection::where('employeeType_ID','=',$req->id)->first();
    $emptype->del_flag = 1;

    $emptype->save();

    return redirect('/admin/maintenance/employee/type');
  }
}
