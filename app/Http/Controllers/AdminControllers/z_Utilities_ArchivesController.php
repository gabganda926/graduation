<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\personalInfoConnection;

use App\contactPersonConnection;

use App\inscompanyConnection;

use App\addressConnection;

use App\salesAgentConnection;

use App\employeeConnection;

use App\BankConnection;

use App\clientConnection;

use App\complaintTypeConnection;

use App\courierConnection;

use App\employeeRoleConnection;

use App\installmentConnection;

use App\policynoConnection;

use App\vModelConnection;

use App\vMakeConnection;

use App\vTypeConnection;

use App\premiumDGConnection;

use App\premiumPAConnection;

use Alert;

use Redirect;

class z_Utilities_ArchivesController extends Controller
{
    public function index()
    {
      return view('/pages/admin/utilities/archives')
      ->with('ppa',premiumPAConnection::all())
      ->with('pdg',premiumDGConnection::all())
      ->with('address',addressConnection::all())
      ->with('pinfo',personalInfoConnection::all())
      ->with('cperson',contactPersonConnection::all())
      ->with('company',inscompanyConnection::all())
      ->with('salesA',salesAgentConnection::all())
      ->with('employee',employeeConnection::all())
      ->with('bank',BankConnection::all())
      ->with('client',clientConnection::all())
      ->with('ctype',complaintTypeConnection::all())
      ->with('courier',courierConnection::all())
      ->with('emprole',employeeRoleConnection::all())
      ->with('installment',installmentConnection::all())
      ->with('policy',policynoConnection::all())
      ->with('vModel',vModelConnection::all())
      ->with('vMake',vMakeConnection::all())
      ->with('vType',vTypeConnection::all());
    }

    public function reactivate_client(Request $req)
    {
          $employee = clientConnection::where('client_ID', '=', $req->id)->first();
          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;
          $employee->save();
    }

    public function arreactivate_client(Request $req)
    {
        foreach($req->ID as $ID)
        {
          $employee = clientConnection::where('comp_ID', '=', $ID)->first();

          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;

          $employee->save();
        }
    }

    public function reactivate_client_company(Request $req)
    {
          $employee = inscompanyConnection::where('comp_ID', '=', $req->id)->first();
          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;
          $employee->save();
    }

    public function arreactivate_client_company(Request $req)
    {
        foreach($req->ID as $ID)
        {
          $employee = inscompanyConnection::where('comp_ID', '=', $ID)->first();

          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;

          $employee->save();
        }
    }
    
    public function reactivate_employee_role(Request $req)
    {
          $employee = employeeRoleConnection::where('emp_role_ID', '=', $req->id)->first();
          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;
          $employee->save();
    }

    public function arreactivate_employee_role(Request $req)
    {
        foreach($req->ID as $ID)
        {
          $employee = employeeRoleConnection::where('emp_role_ID', '=', $ID)->first();

          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;

          $employee->save();
        }
    }
    
    public function reactivate_employee(Request $req)
    {
          $employee = employeeConnection::where('emp_ID', '=', $req->id)->first();
          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;
          $employee->save();
    }

    public function arreactivate_employee(Request $req)
    {
        foreach($req->ID as $ID)
        {
          $employee = employeeConnection::where('emp_ID', '=', $ID)->first();

          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;

          $employee->save();
        }
    }
    
    public function reactivate_agent(Request $req)
    {
          $employee = salesAgentConnection::where('agent_ID', '=', $req->id)->first();
          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;
          $employee->save();
    }

    public function arreactivate_agent(Request $req)
    {
        foreach($req->ID as $ID)
        {
          $employee = salesAgentConnection::where('agent_ID', '=', $ID)->first();

          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;

          $employee->save();
        }
    }
    
    public function reactivate_courier(Request $req)
    {
          $employee = courierConnection::where('courier_ID', '=', $req->id)->first();
          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;
          $employee->save();
    }

    public function arreactivate_courier(Request $req)
    {
        foreach($req->ID as $ID)
        {
          $employee = courierConnection::where('courier_ID', '=', $ID)->first();

          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;

          $employee->save();
        }
    }
    
    public function reactivate_bank(Request $req)
    {
          $employee = BankConnection::where('bank_ID', '=', $req->id)->first();
          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;
          $employee->save();
    }

    public function arreactivate_bank(Request $req)
    {
        foreach($req->ID as $ID)
        {
          $employee = BankConnection::where('bank_ID', '=', $ID)->first();

          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;

          $employee->save();
        }
    }
    
    public function reactivate_vehicle_type(Request $req)
    {
          $employee = vTypeConnection::where('vehicle_type_ID', '=', $req->id)->first();
          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;
          $employee->save();
    }

    public function arreactivate_vehicle_type(Request $req)
    {
        foreach($req->ID as $ID)
        {
          $employee = vTypeConnection::where('vehicle_type_ID', '=', $ID)->first();

          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;

          $employee->save();
        }
    }
    
    public function reactivate_vehicle_make(Request $req)
    {
          $employee = vMakeConnection::where('vehicle_make_ID', '=', $req->id)->first();
          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;
          $employee->save();
    }

    public function arreactivate_vehicle_make(Request $req)
    {
        foreach($req->ID as $ID)
        {
          $employee = vMakeConnection::where('vehicle_make_ID', '=', $ID)->first();

          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;

          $employee->save();
        }
    }
    
    public function reactivate_vehicle_model(Request $req)
    {
          $employee = vModelConnection::where('vehicle_model_ID', '=', $req->id)->first();
          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;
          $employee->save();
    }

    public function arreactivate_vehicle_model(Request $req)
    {
        foreach($req->ID as $ID)
        {
          $employee = vModelConnection::where('vehicle_model_ID', '=', $ID)->first();

          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;

          $employee->save();
        }
    }
    
    public function reactivate_policynumber(Request $req)
    {
          $employee = policynoConnection::where('policy_number', '=', $req->id)->first();
          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;
          $employee->save();
    }

    public function arreactivate_policynumber(Request $req)
    {
        foreach($req->ID as $ID)
        {
          $employee = policynoConnection::where('policy_number', '=', $ID)->first();

          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;

          $employee->save();
        }
    }
    
    public function reactivate_installment(Request $req)
    {
          $employee = installmentConnection::where('installment_ID', '=', $req->id)->first();
          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;
          $employee->save();
    }

    public function arreactivate_installment(Request $req)
    {
        foreach($req->ID as $ID)
        {
          $employee = installmentConnection::where('installment_ID', '=', $ID)->first();

          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;

          $employee->save();
        }
    }
    
    public function reactivate_complaint_type(Request $req)
    {
          $employee = complaintTypeConnection::where('complaintType_ID', '=', $req->id)->first();
          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;
          $employee->save();
    }

    public function arreactivate_complaint_type(Request $req)
    {
        foreach($req->ID as $data_ID)
        {
          $employee = complaintTypeConnection::where('complaintType_ID', '=', $data_ID)->first();

          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;

          $employee->save();
        }
    }
    
    public function reactivate_personal_accident(Request $req)
    {
          $employee = premiumPAConnection::where('premiumPA_ID', '=', $req->id)->first();
          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;
          $employee->save();
    }

    public function arreactivate_personal_accident(Request $req)
    {
        foreach($req->ID as $data_ID)
        {
          $employee = premiumPAConnection::where('premiumPA_ID', '=', $data_ID)->first();

          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;

          $employee->save();
        }
    }
    
    public function reactivate_premium_damage(Request $req)
    {
          $employee = premiumDGConnection::where('premiumDG_ID', '=', $req->id)->first();
          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;
          $employee->save();
    }

    public function arreactivate_premium_damage(Request $req)
    {
        foreach($req->ID as $data_ID)
        {
          $employee = premiumDGConnection::where('premiumDG_ID', '=', $data_ID)->first();

          $employee->del_flag = 0;
          $mytime = $req->time;
          $employee->updated_at = $mytime;

          $employee->save();
        }
    }



                  // \Log::info($e->getMessage());
}
