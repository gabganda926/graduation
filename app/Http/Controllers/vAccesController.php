<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\vAccesoriesConnection;

class vAccesController extends Controller
{
  public function __construct(vAccesoriesConnection $acce)
  {
      $this->acc = $acce;
  }

  public function index()
  {
    return view('/pages/maintenance/vehicle accessories')
    ->with('acce',vAccesoriesConnection::all());
  }

  public function add_vAcce(Request $req)
  {
    $this->acc->vehicle_acce_name = $req->vehicle_acce_name;
    $mytime = $req->time;
    $this->acc->created_at = $mytime;
    $this->acc->updated_at = $mytime;
    $this->acc->del_flag = 0;
    $this->acc->save();
    return redirect('/admin/maintenance/vehicle/accessories');
  }

  public function update_vAcce(Request $req)
  {
     $acc = vAccesoriesConnection::where('vehicle_acce_ID', '=', $req->id)->first();
     $acc->vehicle_acce_name = $req->avehicle_acce_name;
     $mytime = $req->atime;
     $acc->updated_at = $mytime;
     $acc->save();
     return redirect('/admin/maintenance/vehicle/accessories');
  }

  public function delete_vAcce(Request $req)
  {
     $acc = vAccesoriesConnection::where('vehicle_acce_ID', '=', $req->id)->first();
     $acc->del_flag = 1;

     $acc->save();
     return redirect('/admin/maintenance/vehicle/accessories');
  }

}
