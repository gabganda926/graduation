<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\insuranceStatusConnection;

class insuranceStatusController extends Controller
{
    public function __construct(insuranceStatusConnection $insuranceStatus)
    {
      $this->ins = $insuranceStatus;
    }

    public function index()
    {
      return view('/pages/maintenance/insuranceStatus')
      ->with('instat',insuranceStatusConnection::all());
    }

	 public function add_inst(Request $req)
    {
      $this->ins->insuranceStatus_type = $req->insuranceStatus_type;
      $this->ins->insuranceStatus_desc = $req->insuranceStatus_desc;
      $this->ins->del_flag = 0;

      $this->ins->save();

      return redirect('/admin/maintenance/insurance/status');
    }

    public function update_ins(Request $req)
    {
      $ins = insuranceStatusConnection::where('insuranceStatus_ID','=',$req->id)->first();

      $ins->insuranceStatus_type = $req->ainsuranceStatus_type;
      $ins->insuranceStatus_desc = $req->ainsuranceStatus_desc;

      $ins->save();

      return redirect('/admin/maintenance/insurance/status');
    }

    public function delete_ins(Request $req)
    {
      $ins = insuranceStatusConnection::where('insuranceStatus_ID','=',$req->id)->first();
      $ins->del_flag = 1;

      $ins->save();

      return redirect('/admin/maintenance/insurance/status');
    }    
}
