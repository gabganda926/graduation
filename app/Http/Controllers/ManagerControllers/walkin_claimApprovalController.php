<?php

namespace App\Http\Controllers\ManagerControllers;

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

use App\claimReqFilesConnection;

use App\paymentDetailConnection;

use App\paymentsConnection;

use App\checkVoucherConnection;

use App\salesAgentConnection;

use App\contactPersonConnection;

use App\courierConnection;

use App\claimTransmitConnection;

use Alert;

use Redirect;

use Mail;

class walkin_claimApprovalController extends Controller
{

  public function __construct(claimTransmitConnection $ctrans, claimRequestConnection $crequest)
    {
        $this->ct = $ctrans;
        $this->cr = $crequest;
    }

  public function claims_list()
  {
    return view('/pages/manager/transaction/claims')
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
    return view('/pages/manager/transaction/claim-details')
       ->with('pno',policynoConnection::all())
       ->with('ctype', claimsTypeConnection::all())
       ->with('creq',claimRequestConnection::where('claim_ID', "=", $req->claim_id)->first())
       ->with('cnotif',claimNotifiedByRepConnection::all())
        ->with('comp',inscompanyConnection::all())
        ->with('clist', clientListConnection::all())
        ->with('cliacc', clientAccountsConnection::all())
        ->with('cli', clientConnection::all())
        ->with('cfile', claimReqFilesConnection::all())
        ->with('crequire', claimsRequirementConnection::all())
        ->with('pinfo', personalInfoConnection::all())
        ->with('addr', addressConnection::all())
        ->with('sales', salesAgentConnection::all())
        ->with('cont', contactPersonConnection::all());
  }

  public function forward_insurance(Request $req)
    {   
        $connected = @fsockopen("www.example.com", 80); 
                                        
        if ($connected)
        {
            fclose($connected);   
            $id = claimRequestConnection::where("claim_ID", "=", $req->ID)->first();
            $insid = clientAccountsConnection::all();
            $compid = inscompanyConnection::all();
            $creq = claimReqFilesConnection::all();

            foreach($insid as $ins)
            {
              if($ins->account_ID == $id->account_ID)
              {
                foreach($compid as $comp)
                {
                  if($comp->comp_ID == $ins->insurance_company)
                  {
                    $email = $comp->comp_email;
                    $name = $comp->comp_name;
                    $username = $comp->comp_email;
                    $password = $comp->comp_name;
                  }
                }
              }
            }

            $data = array('username'=>-$username, 'password'=>$password,'email'=>$email,'name'=>$name);

            Mail::send('pages.others.forward-claims-insurance-company', ['username'=>$username, 'password'=>$password], function ($message) use ($data){
                $message->from('MySender41N@gmail.com', 'i-Insure');
                $message->to($data['email'], $data['name'])->subject('Welcome to Compreline Insurance Services');
            });
            return Redirect::back();
        }
        else
        {
          alert()
          ->error('ERROR', 'No Internet Connection')
          ->persistent("Close");

          return Redirect::back();
        }
    }

    public function transmit_docu(Request $req)
    {
      return view('/pages/manager/transaction/claim-transmit')
       ->with('pno',policynoConnection::all())
       ->with('ctype', claimsTypeConnection::all())
       ->with('creq',claimRequestConnection::where('claim_ID', "=", $req->claimid)->first())
       ->with('cnotif',claimNotifiedByRepConnection::all())
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
        ->with('courier', courierConnection::all());
    }

    public function transmit_docu_save(Request $req)
    {
      $cid = claimRequestConnection::where('claim_ID', "=", $req->claimid)->first();
      $com = inscompanyConnection::where('comp_ID', "=", $req->compid)->first();
      $cou = courierConnection::where('courier_ID', "=", $req->courid)->first();

      $this->ct->claim_ID = (int)$cid->claim_ID;
      $this->ct->inscomp_ID = (int)$com->comp_ID;
      $this->ct->courier_ID = (int)$cou->courier_ID;
      $this->ct->status = 0;
      $this->ct->created_at = $req->time;
      $this->ct->updated_at = $req->time;

      try
      {
        $this->ct->save();
        return $this->update_claim_status($req);

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

    public function update_claim_status(Request $req)
    {
      $cid = claimRequestConnection::where('claim_ID', "=", $req->claimid)->first();

      $cid->status = 2;
      try
      {
        $cid->save();
        alert()
        ->success('The record is processed successfully.', 'Success')
        ->persistent("Close");

        return redirect('/manager/transaction/transmittal/list');
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
}
