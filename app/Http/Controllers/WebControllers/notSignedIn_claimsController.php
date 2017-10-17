<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\inscompanyConnection;

use App\claimsTypeConnection;

use App\web_claimNotifiedByConnection;

use App\web_claimRequestConnection;

use Alert;

use Redirect;

use DateTime;

class notSignedIn_claimsController extends Controller
{
	public function __construct(web_claimRequestConnection $claims, web_claimNotifiedByConnection $repre)
	  {
	    $this->claimreq = $claims;
	    $this->rep = $repre;
	  }
    public function index()
    {
    	return view('pages.webpage.not-signed-in.claims')
    	->with('inscomp', inscompanyConnection::where('comp_ID', "<", 5)->get())
    	->with('comp', claimsTypeConnection::where('del_flag', "=", 0)->get());
    }

   public function new_claim(Request $req)
  {

    \Log::info($req);
    if($req->notifby_check == 2)
    {
      if($req->new_repName != null)
      {
        $this->rep->web_notifier_Name = $req->new_repName;
      }
      if($req->new_repRel != null)
      {
        $this->rep->web_notifier_Relation = $req->new_repRel;
      }
      if($req->new_repCpnum != null)
      {
        $this->rep->web_notifier_cell_1 = $req->new_repCpnum;
      }
      if($req->new_repCpnum2 != null)
      {
        $this->rep->web_notifier_cell_2 = $req->new_repCpnum;
      }
      if($req->new_repEmail != null)
      {
        $this->rep->web_notifier_email = $req->new_repEmail;
      }
      if($req->new_repEmail != null)
      {
        $this->rep->web_notifier_telnum = $req->new_repTel;
      }
      try
        {
          $this->rep->save();
          return $this->add_request($req);
      }
      catch(Exception $e)
      {
        $message = $e->getCode();
        if($message == 23000)
        {
          alert()
          ->error('ERROR', $e->getMessage())
          ->persistent("Close");

          return Redirect::back();
        }
        else if($message == 22001)
        {
          alert()
          ->error('ERROR', $e->getMessage())
          ->persistent("Close");

          return Redirect::back();
        }
        else
        {
          alert()
          ->error('ERROR', $e->getMessage())
          ->persistent("Close");

          return Redirect::back();
        }
      }  
    }
    else{
      try
        {
          return $this->add_request($req);
      }
      catch(Exception $f)
      {
        $message = $f->getCode();
        if($message == 23000)
        {
          alert()
          ->error('ERROR', $f->getMessage())
          ->persistent("Close");

          return Redirect::back();
        }
        else if($message == 22001)
        {
          alert()
          ->error('ERROR', $f->getMessage())
          ->persistent("Close");

          return Redirect::back();
        }
        else
        {
          alert()
          ->error('ERROR', $f->getMessage())
          ->persistent("Close");

          return Redirect::back();
        }
      }  
    } 
  }

  public function add_request($req)
  {
    if($req->notifby_check == 1)
    {
      $inscompid = inscompanyConnection::where('comp_ID', "=", $req->new_inscomp)->first();
      $claims = claimsTypeConnection::where('claimType_ID', "=", $req->new_claimType)->first();
      $mytime = $req->time;
      $this->claimreq->web_claimType_ID = $claims->claimType_ID;
      $date = $req->new_lossDate . ' ' .$req->new_lossTime;
      $newdate = date("Y-m-d H:i:s",strtotime($date));
      $this->claimreq->web_lossDate = $newdate;
      $this->claimreq->web_policyno = $req->new_policyno;
      $this->claimreq->web_inscompany = $inscompid->comp_ID;
      $this->claimreq->web_placeOfLoss = $req->new_lossPlace;
      $this->claimreq->web_description = $req->new_descrip;
      $this->claimreq->web_notifiedByType = 1;
      $this->claimreq->web_status = 0;
      $this->claimreq->web_del_flag = 0;
      $this->claimreq->web_created_at = $mytime;
      $this->claimreq->web_updated_at = $mytime;

    }
    if($req->notifby_check == 2)
    {
      $notifierid = web_claimNotifiedByConnection::orderBy('web_notifier_ID', 'desc')->first();
      $inscompid = inscompanyConnection::where('comp_ID', "=", $req->new_inscomp)->first();
      $claims = claimsTypeConnection::where('claimType_ID', "=", $req->new_claimType)->first();
      $mytime = $req->time;
      $this->claimreq->web_claimType_ID = $claims->claimType_ID;
      $date = $req->new_lossDate . ' ' .$req->new_lossTime;
      $newdate = date("Y-m-d H:i:s",strtotime($date));
      $this->claimreq->web_lossDate = $newdate;
      $this->claimreq->web_policyno = $req->new_policyno;
      $this->claimreq->web_inscompany = $inscompid->comp_ID;
      $this->claimreq->web_placeOfLoss = $req->new_lossPlace;
      $this->claimreq->web_description = $req->new_descrip;
      $this->claimreq->web_notifiedByType = 2;
      $this->claimreq->web_status = 0;
      $this->claimreq->web_del_flag = 0;
      $this->claimreq->web_created_at = $mytime;
      $this->claimreq->web_updated_at = $mytime;
      $this->claimreq->web_notifier_ID = (int)$notifierid->web_notifier_ID;
    }
    try
        {
          $this->claimreq->save();

          alert()
          ->success('Record Saved', "Success")
    	  ->persistent("Close");
          return Redirect::back();
      }
      catch(Exception $e)
      {
        $message = $e->getCode();
        if($message == 23000)
        {
          alert()
          ->error('ERROR', $e->getMessage())
          ->persistent("Close");

          return Redirect::back();
        }
        else if($message == 22001)
        {
          alert()
          ->error('ERROR', $e->getMessage())
          ->persistent("Close");

          return Redirect::back();
        }
        else
        {
          alert()
          ->error('ERROR', $e->getMessage())
          ->persistent("Close");

          return Redirect::back();
        }
      }
  }
}
