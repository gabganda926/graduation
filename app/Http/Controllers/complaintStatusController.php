<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\complaintStatusConnection;

class complaintStatusController extends Controller
{
  public function __construct(complaintStatusConnection $compStatus)
  {
    $this->comp = $compStatus;
  }

  public function index()
  {
      return view('/pages/maintenance/complaintStatus')
      ->with('complaintstatus', complaintStatusConnection::all());
  }

  public function add_cStatus(Request $req)
    {
    	$this->comp->complaintStatus_name = $req->complaintStatus_name;
    	$this->comp->complaintStatus_desc = $req->complaintStatus_desc;
      $mytime = $req->time;
      $this->comp->created_at = $mytime;
      $this->comp->updated_at = $mytime;
    	$this->comp->del_flag = 0;

    	$this->comp->save();

    	return redirect('/admin/maintenance/complaint/status');
    }

    public function update_cStatus(Request $req)
    {
    	$comp = complaintStatusConnection::where('complaintStatus_ID','=', $req->id)->first();

    	$comp->complaintStatus_name = $req->acomplaintStatus_name;
    	$comp->complaintStatus_desc = $req->acomplaintStatus_desc;
      $mytime = $req->atime;
      $comp->updated_at = $mytime;
    	$comp->save();

    	return redirect('/admin/maintenance/complaint/status');
    }

    public function delete_cStatus(Request $req)
    {
    	$comp = complaintStatusConnection::where('complaintStatus_ID','=', $req->id)->first();

    	$comp->del_flag = 1;

    	return redirect('/admin/maintenance/complaint/status');
    }
}
