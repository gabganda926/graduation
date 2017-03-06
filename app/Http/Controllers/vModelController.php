<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\vModelConnection;

use App\vMakeConnection;

class vModelController extends Controller
{
  public function __construct(vModelConnection $model)
  {
      $this->mod = $model;
  }

  public function index()
  {
    return view('/pages/maintenance/vehicle model')
    ->with('make',vMakeConnection::all())
    ->with('model',vModelConnection::all());
  }

  public function add_vModel(Request $req)
  {
    $this->mod->vehicle_model_name = $req->vehicle_model_name;
    $this->mod->vehicle_make_ID = $req->make_name;
    $mytime = $req->time;
    $this->mod->created_at = $mytime;
    $this->mod->updated_at = $mytime;
    $this->mod->del_flag = 0;
    $this->mod->save();

    return redirect('/admin/maintenance/vehicle/model');
  }

  public function update_vModel(Request $req)
  {
     $mod = vModelConnection::where('vehicle_model_ID', '=', $req->id)->first();
     $mod->vehicle_model_name = $req->avehicle_model_name;
     $mod->vehicle_make_ID = $req->amake_name;
     $mytime = $req->atime;
     $mod->updated_at = $mytime;
     $mod->save();
     return redirect('/admin/maintenance/vehicle/model');
  }

  public function delete_vModel(Request $req)
  {
     $mod = vModelConnection::where('vehicle_model_ID', '=', $req->id)->first();
     $mod->del_flag = 1;

     $mod->save();
     return redirect('/admin/maintenance/vehicle/model');
  }
}
