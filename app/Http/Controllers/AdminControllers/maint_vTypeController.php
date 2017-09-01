<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\vTypeConnection;

use Alert;

use Redirect;

class maint_vTypeController extends Controller
{
  public function __construct(vTypeConnection $type)
  {
      $this->typ = $type;
  }

  public function index()
  {
    return view('/pages/admin/maintenance/vehicle type')
    ->with('typ',vTypeConnection::all());
  }

  public function add_vType(Request $req)
  {
    $this->typ->vehicle_type_name = $req->vehicle_type_name;
    $this->typ->vehicle_type_desc = $req->vehicle_type_desc;
    $this->typ->del_flag = 0;
    $mytime = $req->time;
    $this->typ->created_at = $mytime;
    $this->typ->updated_at = $mytime;

    try
    {
      $this->typ->save();
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

  public function update_vType(Request $req)
  {
     $typ = vTypeConnection::where('vehicle_type_ID', '=', $req->id)->first();
     $typ->vehicle_type_name = $req->avehicle_type_name;
     $typ->vehicle_type_desc = $req->avehicle_type_desc;
     $mytime = $req->atime;
     $typ->updated_at = $mytime;

     try
      {
        $typ->save();
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

  public function delete_vType(Request $req)
  {
     $typ = vTypeConnection::where('vehicle_type_ID', '=', $req->id)->first();
     $typ->del_flag = 1;
     $mytime = $req->atime;
     $typ->updated_at = $mytime;

     try
     {
       $typ->save();
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

  public function ardelete_vType(Request $req)
  {
    foreach($req->asd as $ID)
    {
     $typ = vTypeConnection::where('vehicle_type_ID', '=', $ID)->first();
     $typ->del_flag = 1;
     $mytime = $req->time;
     $typ->updated_at = $mytime;

     $typ->save();
    }
  }
}
