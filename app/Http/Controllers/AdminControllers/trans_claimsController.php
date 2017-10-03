<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\clientListConnection;

use App\policynoConnection;

use App\inscompanyConnection;

use App\clientAccountsConnection;

use App\clientConnection;

use App\personalInfoConnection;

use App\addressConnection;

use App\claimsTypeConnection;

use App\claimsRequirementConnection;

use App\claimRequestConnection;

use App\claimNotifiedByRepConnection;

use App\paymentDetailConnection;

use App\paymentsConnection;

use App\checkVoucherConnection;

use App\salesAgentConnection;

use App\contactPersonConnection;

use Alert;

use Redirect;

class trans_claimsController extends Controller
{
  public function __construct(claimRequestConnection $claims, claimNotifiedByRepConnection $repre)
  {
    $this->claimreq = $claims;
    $this->rep = $repre;
  }

  public function index()
  {
    return view('/pages/admin/transaction/claim-create-request-walkin')
    	 ->with('pno',policynoConnection::all())
        ->with('ctype', claimsTypeConnection::all())
        ->with('creq', claimsRequirementConnection::all())
      	->with('comp',inscompanyConnection::all())
      	->with('clist', clientListConnection::all())
      	->with('cliacc', clientAccountsConnection::all())
      	->with('cli', clientConnection::all())
      	->with('pinfo', personalInfoConnection::all())
      	->with('addr', addressConnection::all())
        ->with('payments',paymentsConnection::orderBy('due_date')->get())
        ->with('voucher',   checkVoucherConnection::all())
        ->with('ptail',paymentDetailConnection::all())
        ->with('sales', salesAgentConnection::all())
        ->with('cont', contactPersonConnection::all());
  }

  public function claims_list()
  {
    return view('/pages/admin/transaction/claim-request-walkin')
       ->with('pno',policynoConnection::all())
       ->with('creq',claimRequestConnection::all())
       ->with('cnotif',claimNotifiedByRepConnection::all())
        ->with('comp',inscompanyConnection::all())
        ->with('clist', clientListConnection::all())
        ->with('cliacc', clientAccountsConnection::all())
        ->with('cli', clientConnection::all())
        ->with('pinfo', personalInfoConnection::all())
        ->with('addr', addressConnection::all());
  }

  public function view_claim_details(Request $req)
  {
    return view('/pages/admin/transaction/claim-details-walkin')
       ->with('pno',policynoConnection::all())
       ->with('ctype', claimsTypeConnection::all())
       ->with('creq',claimRequestConnection::where('claim_ID', "=", $req->claim_id)->first())
       ->with('cnotif',claimNotifiedByRepConnection::all())
        ->with('comp',inscompanyConnection::all())
        ->with('clist', clientListConnection::all())
        ->with('cliacc', clientAccountsConnection::all())
        ->with('cli', clientConnection::all())
        ->with('pinfo', personalInfoConnection::all())
        ->with('addr', addressConnection::all())
        ->with('sales', salesAgentConnection::all())
        ->with('cont', contactPersonConnection::all());
  }

  public function new_claim(Request $req)
  {
    if($req->notifby_check == 2)
    {
      if($req->rep_name != null)
      {
        $this->rep->notifier_Name = $req->rep_name;
      }
      if($req->rep_rel != null)
      {
        $this->rep->notifier_Relation = $req->rep_rel;
      }
      if($req->rep_cpno != null)
      {
        $this->rep->notifier_cell_1 = $req->rep_cpno;
      }
      if($req->rep_cpno_1 != null)
      {
        $this->rep->notifier_cell_2 = $req->rep_cpno_1;
      }
      if($req->rep_email != null)
      {
        $this->rep->notifier_email = $req->rep_email;
      }
      if($req->rep_telno != null)
      {
        $this->rep->notifier_telnum = $req->rep_telno;
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
      $mytime = $req->time;
      $cid = $req->claimid;
      $iid = $req->insid;
      $this->claimreq->claimType_ID = $cid;
      $this->claimreq->account_ID = $iid;
      $this->claimreq->lossDate = $req->date_incident;
      $this->claimreq->placeOfLoss = $req->place_incident;
      $this->claimreq->description = $req->desc_incident;
      $this->claimreq->notifiedByType = 1;
      $this->claimreq->status = 0;
      $this->claimreq->del_flag = 0;
      $this->claimreq->created_at = $mytime;
      $this->claimreq->updated_at = $mytime;
    }
    if($req->notifby_check == 2)
    {
      $notifierid = claimNotifiedByRepConnection::orderBy('notifier_ID', 'desc')->first();
      $mytime = $req->time;
      $cid = $req->claimid;
      $iid = $req->insid;
      $this->claimreq->claimType_ID = $cid;
      $this->claimreq->account_ID = $iid;
      $this->claimreq->lossDate = $req->date_incident;
      $this->claimreq->placeOfLoss = $req->place_incident;
      $this->claimreq->description = $req->desc_incident;
      $this->claimreq->notifiedByType = 2;
      $this->claimreq->status = 0;
      $this->claimreq->notifier_ID = (int)$notifierid->notifier_ID;;
      $this->claimreq->del_flag = 0;
      $this->claimreq->created_at = $mytime;
      $this->claimreq->updated_at = $mytime;
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

  public function forward_manager(Request $req)
    {
      $claim = claimRequestConnection::where('claim_ID', "=", $req->ID)->first();
      $claim->status = 1;

      $claim->save();
    }

}
