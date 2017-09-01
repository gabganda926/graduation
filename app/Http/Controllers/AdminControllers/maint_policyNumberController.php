<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Requests;

use App\clientListConnection;

use App\policynoConnection;

use App\inscompanyConnection;

use Alert;

use Redirect;

class maint_policyNumberController extends Controller
{
    public function __construct(inscompanyConnection $inscomp, policynoConnection $pnumber)
    {
        $this->icomp = $inscomp;
        $this->pnum = $pnumber;
    }

    public function index()
    {
      return view('/pages/admin/maintenance/policy numbers')
      ->with('pnm',policynoConnection::all())
      ->with('com',inscompanyConnection::all())
      ->with('clist', clientListConnection::all());
    }

    public function add_policy(Request $req)
    {
       $this->pnum->policy_number = $req->pnumbah;
       $this->pnum->insurance_compID = $req->compdrop;
       $this->pnum->policyStatus_ID = $req->statdrop;
       $mytime = $req->time;
       $this->pnum->created_at = $mytime;
       $this->pnum->updated_at = $mytime;
       $this->pnum->del_flag = 0;

      try
      {
        $this->pnum->save();
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

    public function update_policy(Request $req)
    {
       $pnum = policynoConnection::where('policy_number', '=', $req->pnid)->first();
       $pnum->policy_number = $req->apnumbah;
       $pnum->insurance_compID = $req->acompdrop;
       $pnum->policyStatus_ID = $req->astatdrop;
       $mytime = $req->atime;
       $pnum->updated_at = $mytime;

       try
        {
          $pnum->save();
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

    public function delete_policy(Request $req)
    {
       $pnum = policynoConnection::where('policy_number', '=', $req->pnid)->first();
       $pnum->del_flag = 1;
       $mytime = $req->atime;
       $pnum->updated_at = $mytime;

       try
        {
          $pnum->save();
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

    public function ardelete_policy(Request $req)
    {
      foreach($req->asd as $ID)
      {
       $pnum = policynoConnection::where('policy_number', '=', $ID)->first();
       $pnum->del_flag = 1;
       $mytime = $req->time;
       $pnum->updated_at = $mytime;

       $pnum->save();
     }
    }
}
