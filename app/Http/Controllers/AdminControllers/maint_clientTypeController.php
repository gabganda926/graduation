<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\clientTypeConnection;

use Alert;

use Redirect;

class maint_clientTypeController extends Controller
{
    public function __construct(clientTypeConnection $clientype)
    {
        $this->ctype = $clientype;
    }

    public function index()
    {
        return view('/pages/admin/maintenance/clientType')
        ->with('clienttype',clientTypeConnection::all());
    }

    public function add_ctype(Request $req)
    {
      $this->ctype->clientType_type = $req->clientType_type;
      $this->ctype->clientType_desc = $req->clientType_desc;
      $mytime = $req->time;
      $this->ctype->created_at = $mytime;
      $this->ctype->updated_at = $mytime;
      $this->ctype->del_flag = 0;
      try
      {
        $this->ctype->save();
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
      $ctype = clientTypeConnection::where('clientType_ID','=',$req->id)->first();

      $ctype->clientType_type = $req->aclientType_type;
      $ctype->clientType_desc = $req->aclientType_desc;
      $mytime = $req->atime;
      $ctype->updated_at = $mytime;
      try
      {
        $ctype->save();
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
      $ctype = clientTypeConnection::where('clientType_ID','=',$req->id)->first();
      $ctype->del_flag = 1;
      $mytime = $req->atime;
      $ctype->updated_at = $mytime;

    try
    {
      $ctype->save();
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
          $ctype = clientTypeConnection::where('clientType_ID','=',$ID)->first();
          $ctype->del_flag = 1;
          $mytime = $req->time;
          $ctype->updated_at = $mytime;
          $ctype->save();
        }
    }
}
