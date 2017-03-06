<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\vTypeConnection;

class vTypeController extends Controller
{
  public function __construct(vTypeConnection $type)
  {
      $this->typ = $type;
  }

  public function index()
  {
    return view('/pages/maintenance/vehicle type')
    ->with('typ',vTypeConnection::all());
  }

  public function add_vType(Request $req)
  {
    $this->typ->vehicle_type_name = $req->vehicle_type_name;
    $this->typ->del_flag = 0;
    $mytime = $req->time;
    $this->typ->created_at = $mytime;
    $this->typ->updated_at = $mytime;
    $this->typ->save();
    return redirect('/admin/maintenance/vehicle/types');
  }

  public function update_vType(Request $req)
  {
     $typ = vTypeConnection::where('vehicle_type_ID', '=', $req->id)->first();
     $typ->vehicle_type_name = $req->avehicle_type_name;
     $mytime = $req->atime;
     $typ->updated_at = $mytime;
     $typ->save();
     return redirect('/admin/maintenance/vehicle/types');
  }

  public function delete_vType(Request $req)
  {
     $typ = vTypeConnection::where('vehicle_type_ID', '=', $req->id)->first();
     $typ->del_flag = 1;

     $typ->save();
     return redirect('/admin/maintenance/vehicle/types');
  }
}
