<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\installmentConnection;

use Alert;

use Redirect;

class maint_installmentTypeController extends Controller
{
    public function __construct(installmentConnection $inst)
    {
        $this->instal = $inst;
    }

    public function index()
    {
      return view('/pages/admin/maintenance/installment')
      ->with('ins',installmentConnection::all());
    }

    public function add_installment(Request $req)
    {
    	$this->instal->installment_type = $req->installment_type;
    	$this->instal->installment_desc = $req->installment_desc;
      $mytime = $req->time;
      $this->instal->created_at = $mytime;
      $this->instal->updated_at = $mytime;
      $this->instal->del_flag = 0;
      try
      {
        $this->instal->save();
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

    public function update_installment(Request $req)
    {
       $instal = installmentConnection::where('installment_ID', '=', $req->instid)->first();
       $instal->installment_type = $req->ainstallment_type;
     	 $instal->installment_desc = $req->ainstallment_desc;
       $mytime = $req->atime;
       $instal->updated_at = $mytime;
       try
      {
        $instal->save();
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

    public function delete_installment(Request $req)
    {
       $instal = installmentConnection::where('installment_ID', '=', $req->instid)->first();
       $instal->del_flag = 1;
       $mytime = $req->atime;
       $instal->updated_at = $mytime;
       try
       {
         $instal->save();
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

    public function ardelete_installment(Request $req)
    {
      foreach($req->asd as $ID)
      {
         $instal = installmentConnection::where('installment_ID', '=', $ID)->first();
         $instal->del_flag = 1;
         $mytime = $req->time;
         $instal->updated_at = $mytime;

         $instal->save();
      }
    }
}
