<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\complaintTypeConnection;

use Alert;

use Redirect;

class maint_complaintTypeController extends Controller
{
  public function __construct(complaintTypeConnection $compType)
  {
    $this->comp = $compType;
  }

  public function index()
  {
      return view('/pages/admin/maintenance/complaintType')
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

    try
    {
      $this->comp->save();
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
        ->error('ERROR', $e->getCode())
        ->persistent("Close");

        return Redirect::back();
      }
    }
  }

  public function update_ctype(Request $req)
  {
    $comp = complaintTypeConnection::where('complaintType_ID','=', $req->id)->first();

    $comp->complaintType_name = $req->aclientType_type;
    $comp->complaintType_desc = $req->aclientType_desc;
    $mytime = $req->atime;
    $comp->updated_at = $mytime;
    try
    {
      $comp->save();
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
        ->error('ERROR', $e->getCode())
        ->persistent("Close");

        return Redirect::back();
      }
    }
  }

  public function delete_ctype(Request $req)
  {
    $comp = complaintTypeConnection::where('complaintType_ID','=', $req->id)->first();

    $comp->del_flag = 1;
    $mytime = $req->atime;
    $comp->updated_at = $mytime;
    try
    {
      $comp->save();
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
        ->error('ERROR', $e->getCode())
        ->persistent("Close");

        return Redirect::back();
      }
    }
  }

    public function ardelete_ctype(Request $req)
  {
      foreach($req->asd as $ID)
      {
        $comp = complaintTypeConnection::where('complaintType_ID','=', $ID)->first();

        $comp->del_flag = 1;
        $mytime = $req->time;
        $comp->updated_at = $mytime;

        $comp->save();
      }
  }

}
