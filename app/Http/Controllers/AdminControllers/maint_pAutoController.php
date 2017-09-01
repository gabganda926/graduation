<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\clientListConnection;

use App\premiumPAConnection;

use App\inscompanyConnection;

use Alert;

use Redirect;

class maint_pAutoController extends Controller
{
	public function __construct(premiumPAConnection $pa)
    {
        $this->premPA= $pa;
    }

    public function index()
    {
      return view('/pages/admin/maintenance/premium-auto-pa')
      ->with('ppa',premiumPAConnection::all())
      ->with('com',inscompanyConnection::all())
      ->with('clist', clientListConnection::all());
    }

    public function add_premiumPA(Request $req)
    {
       $this->premPA->premiumPA_ID = $req->compdrop."".$req->ins_limit."".$req->pass_no;
       $this->premPA->insurance_compID = $req->compdrop;
       $this->premPA->insuranceLimit = $req->ins_limit;
       $this->premPA->passengerNum = $req->pass_no;
       $this->premPA->insuranceCover = $req->ins_cover;
       $this->premPA->passengerCover = $req->pass_cover;
       $this->premPA->mrCover = $req->mr;
       $mytime = $req->time;
       $this->premPA->created_at = $mytime;
       $this->premPA->updated_at = $mytime;
       $this->premPA->del_flag = 0;

      try
      {
        $this->premPA->save();
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

    public function update_premiumPA(Request $req)
    {
       $premPA = premiumPAConnection::where('premiumPA_ID', '=', $req->id)->first();
       $premPA->insurance_compID = $req->acompdrop;
       $premPA->insuranceLimit = $req->ains_limit;
       $premPA->passengerNum = $req->apass_no;
       $premPA->insuranceCover = $req->ains_cover;
       $premPA->passengerCover = $req->apass_cover;
       $premPA->mrCover = $req->amr;
       $mytime = $req->atime;
       $premPA->updated_at = $mytime;

       try
        {
          $premPA->save();
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

    public function delete_premiumPA(Request $req)
    {
       $premPA = premiumPAConnection::where('premiumPA_ID', '=', $req->id)->first();
       $premPA->del_flag = 1;
       $mytime = $req->atime;
       $premPA->updated_at = $mytime;

       try
        {
          $premPA->save();
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

    public function ardelete_premiumPA(Request $req)
    {
      foreach($req->asd as $ID)
      {
       $premPA = premiumPAConnection::where('premiumPA_ID', '=', $ID)->first();
       $premPA->del_flag = 1;
       $mytime = $req->time;
       $premPA->updated_at = $mytime;

       $premPA->save();
     }
    }
}
