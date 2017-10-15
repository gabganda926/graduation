<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\web_claimNotifiedByConnection;

use App\inscompanyConnection;

use App\claimsTypeConnection;

use App\web_claimRequestConnection;

use App\clientListConnection;

use App\policynoConnection;
use App\clientAccountsConnection;

use App\clientConnection;

use App\personalInfoConnection;

use App\addressConnection;
use App\claimsRequirementConnection;
use App\claimRequestConnection;

use App\claimReqFilesConnection;

use App\claimNotifiedByRepConnection;
use App\paymentDetailConnection;

use App\paymentsConnection;

use App\checkVoucherConnection;

use App\salesAgentConnection;

use App\contactPersonConnection;

use Carbon;

use Alert;

use Redirect;

use Session;

class trans_claimsOnlineController extends Controller
{
    public function __construct(claimRequestConnection $claims, claimNotifiedByRepConnection $repre, claimReqFilesConnection $files)
    {
      $this->claimreq = $claims;
      $this->rep = $repre;
      $this->fi = $files;
    }

    public function index()
    {
    	return view ('pages.admin.transaction.claim-request-online')
    	->with('request', web_claimRequestConnection::where('web_del_flag', "=", 0)->get())
    	->with('cnotif', web_claimNotifiedByConnection::all())
    	->with('inscomp', inscompanyConnection::all())
    	->with('claimType', claimsTypeConnection::all());
    }

    public function view_claim_details(Request $req)
  	{
    	return view('/pages/admin/transaction/claim-details-online')
       ->with('pno',policynoConnection::all())
       ->with('ctype', claimsTypeConnection::all())
       ->with('creq',web_claimRequestConnection::where('web_claim_ID', "=", $req->claim_id)->first())
       ->with('cnotif',web_claimNotifiedByConnection::all())
        ->with('comp',inscompanyConnection::all())
        ->with('clist', clientListConnection::all())
        ->with('cliacc', clientAccountsConnection::all())
        ->with('cli', clientConnection::all())
        ->with('cfile', claimReqFilesConnection::all())
        ->with('crequire', claimsRequirementConnection::all())
        ->with('pinfo', personalInfoConnection::all())
        ->with('addr', addressConnection::all())
        ->with('sales', salesAgentConnection::all())
        ->with('cont', contactPersonConnection::all())
        ->with('payments',paymentsConnection::orderBy('due_date')->get())
        ->with('voucher',   checkVoucherConnection::all())
        ->with('ptail',paymentDetailConnection::all());
  	}

    public function forward_claim(Request $req)
    {
      $creq = web_claimRequestConnection::where('web_claim_ID', "=", $req->ID)->first();  
      $insid = clientAccountsConnection::where('policy_number', "=", $creq->web_policyno)->first();

      if($insid)
      {
        if($creq->web_notifiedByType == 2)
        {   
          $notif = web_claimNotifiedByConnection::where('web_notifier_ID', "=", $creq->web_notifier_ID)->first();
          if($notif->web_notifier_Name != null)
          {
            $this->rep->notifier_Name = $notif->web_notifier_Name;
          }
          if($notif->web_notifier_Relation != null)
          {
            $this->rep->notifier_Relation = $notif->web_notifier_Relation;
          }
          if($notif->web_notifier_cell_1 != null)
          {
            $this->rep->notifier_cell_1 = $notif->web_notifier_cell_1;
          }
          if($notif->web_notifier_cell_2 != null)
          {
            $this->rep->notifier_cell_2 = $notif->web_notifier_cell_2;
          }
          if($notif->web_notifier_email != null)
          {
            $this->rep->notifier_email = $notif->web_notifier_email;
          }
          if($notif->web_notifier_telnum != null)
          {
            $this->rep->notifier_telnum = $notif->web_notifier_telnum;
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
      }
      else
      {
        try
          {
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
    }

  public function add_request($req)
  {
    $creq = web_claimRequestConnection::where('web_claim_ID', "=", $req->ID)->first();
    $insid = clientAccountsConnection::where('policy_number', "=", $creq->web_policyno)->first();
    $ctypes = claimsTypeConnection::where('claimType_ID', "=", $creq->web_claimType_ID)->first();
    \Log::info($creq);
    if($creq->web_notifiedByType == 1)
    {
      $mytime = Carbon\Carbon::today()->format('Y-m-d');
      $this->claimreq->claimType_ID = $ctypes->claimType_ID;
      $this->claimreq->account_ID = $insid->account_ID;
      $this->claimreq->lossDate = $creq->web_lossDate;
      $this->claimreq->placeOfLoss = $creq->web_placeOfLoss;
      $this->claimreq->description = $creq->web_description;
      $this->claimreq->notifiedByType = 1;
      $this->claimreq->status = 0;
      $this->claimreq->del_flag = 0;
      $this->claimreq->created_at = $mytime;
      $this->claimreq->updated_at = $mytime;
      $this->claimreq->employee_info_ID = Session::get('id');

    }
    if($creq->web_notifiedByType == 2)
    {
      $notifierid = web_claimNotifiedByConnection::where('web_notifier_ID', "=", $creq->web_notifier_ID)->first();
      $mytime = Carbon\Carbon::today()->format('Y-m-d');
      $this->claimreq->claimType_ID = $ctypes->claimType_ID;
      $this->claimreq->account_ID = $insid->account_ID;
      $this->claimreq->lossDate = $creq->web_lossDate;
      $this->claimreq->placeOfLoss = $creq->web_placeOfLoss;
      $this->claimreq->description = $creq->web_description;
      $this->claimreq->notifiedByType = 2;
      $this->claimreq->status = 0;
      $this->claimreq->notifier_ID = (int)$notifierid->web_notifier_ID;
      $this->claimreq->del_flag = 0;
      $this->claimreq->created_at = $mytime;
      $this->claimreq->updated_at = $mytime;
      $this->claimreq->employee_info_ID = Session::get('id');
    }
    try
        {
          $this->claimreq->save();
          return $this->add_file($req);
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

  public function add_file($req)
  {
    $creq = web_claimRequestConnection::where('web_claim_ID', "=", $req->ID)->first();
    $ctypes = claimsTypeConnection::where('claimType_ID', "=", $creq->web_claimType_ID)->first();
    $reqs = claimsRequirementConnection::all();

      foreach ($reqs as $filez) { 
        if($ctypes->claimType_ID == $filez->claimReq_Type)
        {
          if($filez->del_flag == 0)
          {
            $fi = new claimReqFilesConnection;
            $cid = claimRequestConnection::orderBy('claim_ID', 'desc')->first();
            $mytime = Carbon\Carbon::today()->format('Y-m-d');
            $fi->claim_ID = (int)$cid->claim_ID;
            $fi->claimReq_ID = (int)$filez->claimReq_ID;
            $fi->created_at = $mytime;
            $fi->updated_at = $mytime;
            $pic1 = $fi->claimReq_ID . '_1';
            $pic2 = $fi->claimReq_ID . '_2';
            $pic3 = $fi->claimReq_ID . '_3';
            $pic4 = $fi->claimReq_ID . '_4';
            $pic5 = $fi->claimReq_ID . '_5';

            if($req->hasFile($pic1))
            {
              \Log::info($req);
              $file = $req->file($pic1);

              $extension = \File::extension($file->getClientOriginalName());
              try
              {
                $name = ($cid->claim_ID) . "_" . ($fi->claimReq_ID) . "_" . ($filez->claimReqFile_ID + 1) . "." . $extension;
              }
              catch(\Exception $e)
              {
                $name = ($cid->claim_ID) . "_" . ($fi->claimReq_ID) . "_" .  ($filez->claimReqFile_ID + 1) . "." . $extension;
              }

              $fi->claimReq_picture = $name;

              $file->move(public_path().'/image/claim_files/', $name);
             }

             if($req->hasFile($pic2))
              {
                \Log::info($req);
                $file = $req->file($pic2);

                $extension = \File::extension($file->getClientOriginalName());
                try
                {
                  $name = ($cid->claim_ID) . "_" . ($fi->claimReq_ID) . "_" .  ($filez->claimReqFile_ID + 2) . "." . $extension;
                }
                catch(\Exception $e)
                {
                  $name = ($cid->claim_ID) . "_" . ($fi->claimReq_ID) . "_" .  ($filez->claimReqFile_ID + 2) . "." . $extension;
                }

                $fi->claimReq_picture2 = $name;

                $file->move(public_path().'/image/claim_files/', $name);
               }

            if($req->hasFile($pic3))
              {
                \Log::info($req);
                $file = $req->file($pic3);

                $extension = \File::extension($file->getClientOriginalName());
                try
                {
                  $name = ($cid->claim_ID) . "_" . ($fi->claimReq_ID) . "_" .  ($filez->claimReqFile_ID + 3) . "." . $extension;
                }
                catch(\Exception $e)
                {
                  $name = ($cid->claim_ID) . "_" . ($fi->claimReq_ID) . "_" .  ($filez->claimReqFile_ID + 3) . "." . $extension;
                }

                $fi->claimReq_picture3 = $name;

                $file->move(public_path().'/image/claim_files/', $name);
               }

            if($req->hasFile($pic4))
              {
                \Log::info($req);
                $file = $req->file($pic4);

                $extension = \File::extension($file->getClientOriginalName());
                try
                {
                  $name = ($cid->claim_ID) . "_" . ($fi->claimReq_ID) . "_" .  ($filez->claimReqFile_ID + 4) . "." . $extension;
                }
                catch(\Exception $e)
                {
                  $name = ($cid->claim_ID) . "_" . ($fi->claimReq_ID) . "_" .  ($filez->claimReqFile_ID + 4) . "." . $extension;
                }

                $fi->claimReq_picture4 = $name;

                $file->move(public_path().'/image/claim_files/', $name);
               }

            if($req->hasFile($pic5))
              {
                \Log::info($req);
                $file = $req->file($pic5);

                $extension = \File::extension($file->getClientOriginalName());
                try
                {
                  $name = ($cid->claim_ID) . "_" . ($fi->claimReq_ID) . "_" .  ($filez->claimReqFile_ID + 5) . "." . $extension;
                }
                catch(\Exception $e)
                {
                  $name = ($cid->claim_ID) . "_" . ($fi->claimReq_ID) . "_" .  ($filez->claimReqFile_ID + 5) . "." . $extension;
                }

                $fi->claimReq_picture5 = $name;

                $file->move(public_path().'/image/claim_files/', $name);
               }
            
            try
            {
              $fi->save();
              return $this->final_save($req);
            }
            catch(Exception $e)
            {
              $message = $e->getCode();
              if($message == 23000)
              {
                  alert()
                  ->error('ERROR', $e->getMessage())
                  ->persistent("Close");
              }
              else if($message == 22001)
              {
                alert()
                ->error('ERROR', $e->getMessage())
                ->persistent("Close");
              }
              else
              {
                alert()
                ->error('ERROR', $e->getMessage())
                ->persistent("Close");
              }
            }
          }
        }
      }
  }

  public function final_save($req)
  {
    $creq = web_claimRequestConnection::where('web_claim_ID', "=", $req->ID)->first();
    $creq->web_status = 1;
    $creq->save();

    alert()
    ->success('Record Saved', "Success")
    ->persistent("Close");
    return redirect('/admin/transaction/claim-request-walkin');
  }

  public function reject_request(Request $req)
    {
      $claim = web_claimRequestConnection::where('web_claim_ID', "=", $req->ID)->first();
      $claim->web_status = 2;
      $claim->save();
    }
}
