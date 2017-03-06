<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\vModelConnection;

use App\vMakeConnection;

class vMakeController extends Controller
{
  public function __construct(vMakeConnection $make)
  {
      $this->mke = $make;
  }

  public function index()
  {
    return view('/pages/maintenance/vehicle make')
    ->with('make',vMakeConnection::all())
    ->with('model',vModelConnection::all());
  }

  public function add_vMake(Request $req)
  {
    $this->mke->vehicle_make_name = $req->vehicle_make_name;
    $this->mke->del_flag = 0;
    $mytime = $req->time;
    $this->mke->created_at = $mytime;
    $this->mke->updated_at = $mytime;
    $this->mke->save();
    return redirect('/admin/maintenance/vehicle/make');
  }

  public function update_vMake(Request $req)
  {
     $mke = vMakeConnection::where('vehicle_make_ID', '=', $req->id)->first();
     $mke->vehicle_make_name = $req->avehicle_make_name;
     $mytime = $req->atime;
     $mke->updated_at = $mytime;
     $mke->save();
     return redirect('/admin/maintenance/vehicle/make');
  }

  public function delete_vMake(Request $req)
  {
     $mke = vMakeConnection::where('vehicle_make_ID', '=', $req->id)->first();
     $mke->del_flag = 1;

     $mke->save();
     return redirect('/admin/maintenance/vehicle/make');
  }
}
