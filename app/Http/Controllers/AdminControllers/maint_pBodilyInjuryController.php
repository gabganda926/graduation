<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\premiumDGConnection;

use App\inscompanyConnection;

use Alert;

use Redirect;

class maint_pBodilyInjuryController extends Controller
{
	public function __construct(premiumDGConnection $dg)
    {
        $this->premDG= $dg;
    }

    public function index()
    {
      return view('/pages/admin/maintenance/premium-bodily-injury')
      ->with('pdg',premiumDGConnection::all())
      ->with('com',inscompanyConnection::all());
    }

    public function add_premiumDG(Request $req)
    {
       $this->premDG->damage_type = 0;
       $this->premDG->insurance_compID = $req->insurance_compID;
       $this->premDG->insuranceLimit = $req->insuranceLimit;
       $this->premDG->privateCar = $req->privateCar;
       $this->premDG->cv_Light = $req->cv_Light;
       $this->premDG->cv_Heavy = $req->cv_Heavy;
       $mytime = $req->time;
       $this->premDG->created_at = $mytime;
       $this->premDG->updated_at = $mytime;
       $this->premDG->del_flag = 0;

      try
      {
        $this->premDG->save();
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

    public function update_premiumDG(Request $req)
    {
       $premDG = premiumDGConnection::where('premiumDG_ID', '=', $req->id)->first();
       $premDG->insurance_compID = $req->ainsurance_compID;
       $premDG->insuranceLimit = $req->ainsuranceLimit;
       $premDG->privateCar = $req->aprivateCar;
       $premDG->cv_Light = $req->acv_Light;
       $premDG->cv_Heavy = $req->acv_Heavy;
       $mytime = $req->atime;
       $premDG->updated_at = $mytime;

       try
        {
          $premDG->save();
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

    public function delete_premiumDG(Request $req)
    {
       $premDG = premiumDGConnection::where('premiumDG_ID', '=', $req->id)->first();
       $premDG->del_flag = 1;
       $mytime = $req->atime;
       $premDG->updated_at = $mytime;

       try
        {
          $premDG->save();
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

    public function ardelete_premiumDG(Request $req)
    {
      foreach($req->asd as $ID)
      {
       $premDG = premiumDGConnection::where('premiumDG_ID', '=', $ID)->first();
       $premDG->del_flag = 1;
       $mytime = $req->time;
       $premDG->updated_at = $mytime;

       $premDG->save();
     }
    }
}
