<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\complaintTypeConnection;

class complaintTypeController extends Controller
{
  public function __construct(complaintTypeConnection $compType)
  {
    $this->comp = $compType;
  }

  public function index()
  {
      return view('/pages/maintenance/complaintType')
      ->with('complainttype', complaintTypeConnection::all());
  }

  public function add_ctype(Request $req)
  {
    $this->comp->complaintType_name = $req->clientType_type;
    $this->comp->complaintType_desc = $req->clientType_desc;
    $mytime = $req->time;
    $this->comp->created_at = $mytime;
    $this->comp->updated_at = $mytime;
    $this->comp->del_flag = 0;

    $this->comp->save();

    return redirect('/admin/maintenance/complaint/type');
  }

  public function update_ctype(Request $req)
  {
    $comp = complaintTypeConnection::where('complaintType_ID','=', $req->id)->first();

    $comp->complaintType_name = $req->aclientType_type;
    $comp->complaintType_desc = $req->aclientType_desc;
    $mytime = $req->atime;
    $comp->updated_at = $mytime;
    $comp->save();

    return redirect('/admin/maintenance/complaint/type');
  }

  public function delete_ctype(Request $req)
  {
    $comp = complaintTypeConnection::where('complaintType_ID','=', $req->id)->first();

    $comp->del_flag = 1;

    $comp->save();

    return redirect('/admin/maintenance/complaint/type');
  }
}
