<?php

namespace App\Http\Controllers\AccStaffControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\personalInfoConnection;

use App\contactPersonConnection;

use App\inscompanyConnection;

use App\addressConnection;

use App\installmentConnection;

use App\salesAgentConnection;

use App\bankConnection;

use App\clientConnection;

use App\policynoConnection;

use App\vModelConnection;

use App\vMakeConnection;

use App\vTypeConnection;

use App\premiumDGConnection;

use App\premiumPAConnection;

use App\paymentDetailConnection;

use App\paymentsConnection;

use App\clientAccountsConnection;

use App\checkVoucherConnection;

use App\quotationListConnection;

use App\clientSystemAccountConnection;

use App\accListQuoteConnection;

use App\accListInsuranceConnection;

use Redirect;

use Alert;

use Session;

class trans_quoteInsureController extends Controller
{public function __construct(policynoConnection $policy, clientAccountsConnection $clientAccount, paymentDetailConnection $paymentDetail, paymentsConnection $payments,checkVoucherConnection $cvoucher, accListInsuranceConnection $inslist)   
    {
        $this->pnum = $policy;
        $this->cacc = $clientAccount;
        $this->ptail = $paymentDetail;
        $this->pay = $payments;
        $this->check = $cvoucher;
        $this->ilist = $inslist;
    }

    public function send_data_individual(Request $req)
    {
      $type = $req->client_type1;
      $type = $req->client_type2;

      if($type == 0)
      {
        return view('pages.accounting-staff.transaction.quote-payment-details')
        ->with('quote_ID', $req->indi_quote_id)
        ->with('client_ID', $req->client_individual)
        ->with('insurance_company', $req->indi_insurance_company)
        ->with('policy_number', $req->indi_policy_number)
        ->with('vehicle_type', $req->indi_vtype)
        ->with('vehicle_make', $req->indi_vmake)
        ->with('vehicle_model', $req->indi_vmodel)
        ->with('plate_number', $req->indi_plate_number)
        ->with('serial_chassis', $req->indi_schassis)
        ->with('motor_engine', $req->indi_mengine)
        ->with('mv_file_number', $req->indi_mfilenum)
        ->with('seat_capacity', $req->indi_seat_cap)
        ->with('color', $req->indi_color)
        ->with('personal_accident_ID', $req->indi_pa)
        ->with('bodily_injury_ID', $req->indi_bi)
        ->with('bodily_injury_class', $req->indi_bi_vclass)
        ->with('property_damage_ID', $req->indi_pd)
        ->with('property_damage_class', $req->indi_pd_vclass)
        ->with('created_at', $req->indi_date_issued)
        ->with('form_picture', $req->indi_picture)
        ->with('type', $req->client_type1)
        ->with('details', $req)
        ->with('address',addressConnection::all())
        ->with('banko',bankConnection::all())
        ->with('pInfo',personalInfoConnection::all())
        ->with('cperson',contactPersonConnection::all())
        ->with('instype',installmentConnection::all())
        ->with('company',inscompanyConnection::all())
        ->with('salesA',salesAgentConnection::all())
        ->with('client',clientConnection::all())
        ->with('policy',policynoConnection::all())
        ->with('vModel',vModelConnection::all())
        ->with('vMake',vMakeConnection::all())
        ->with('vType',vTypeConnection::all())
        ->with('ppa',premiumPAConnection::where('premiumPA_ID', $req->indi_pa)->first())
        ->with('pbi',premiumDGConnection::where('premiumDG_ID', $req->indi_bi)->first())
        ->with('pdg',premiumDGConnection::where('premiumDG_ID', $req->indi_pd)->first());
      }
      if($type == 1)
      {
        return view('pages.accounting-staff.transaction.quote-payment-details')
        ->with('quote_ID', $req->comp_quote_id)
        ->with('client_ID', $req->client_company)
        ->with('insurance_company', $req->comp_insurance_company)
        ->with('policy_number', $req->comp_policy_number)
        ->with('vehicle_type', $req->comp_vtype)
        ->with('vehicle_make', $req->comp_vmake)
        ->with('vehicle_model', $req->comp_vmodel)
        ->with('plate_number', $req->comp_plate_number)
        ->with('serial_chassis', $req->comp_schassis)
        ->with('motor_engine', $req->comp_mengine)
        ->with('mv_file_number', $req->comp_mfilenum)
        ->with('seat_capacity', $req->comp_seat_cap)
        ->with('color', $req->comp_color)
        ->with('personal_accident_ID', $req->comp_pa)
        ->with('bodily_injury_ID', $req->comp_bi)
        ->with('bodily_injury_class', $req->comp_bi_vclass)
        ->with('property_damage_ID', $req->comp_pd)
        ->with('property_damage_class', $req->comp_pd_vclass)
        ->with('created_at', $req->comp_date_issued)
        ->with('form_picture', $req->comp_picture)
        ->with('type', $req->client_type2)
        ->with('details', $req)
        ->with('address',addressConnection::all())
        ->with('banko',bankConnection::all())
        ->with('pInfo',personalInfoConnection::all())
        ->with('cperson',contactPersonConnection::all())
        ->with('instype',installmentConnection::all())
        ->with('company',inscompanyConnection::all())
        ->with('salesA',salesAgentConnection::all())
        ->with('client',clientConnection::all())
        ->with('policy',policynoConnection::all())
        ->with('vModel',vModelConnection::all())
        ->with('vMake',vMakeConnection::all())
        ->with('vType',vTypeConnection::all())
        ->with('ppa',premiumPAConnection::where('premiumPA_ID', $req->comp_pa)->first())
        ->with('pbi',premiumDGConnection::where('premiumDG_ID', $req->comp_bi)->first())
        ->with('pdg',premiumDGConnection::where('premiumDG_ID', $req->comp_pd)->first());
      }
    }

    public function save_insurance_account(Request $req)
    {
        $type = vTypeConnection::where('vehicle_type_ID', '=', $req->data_vehicle_type)->first();
        $make = vMakeConnection::where('vehicle_make_ID', '=', $req->data_vehicle_make)->first();
        $model = vModelConnection::where('vehicle_model_ID', '=', $req->data_vehicle_model)->first();
        $this->cacc->client_ID = $req->data_client_ID;
        $this->cacc->insurance_company = $req->data_insurance_company;
        $this->cacc->policy_number = $req->policy_number;
        $this->cacc->vehicle_make_name = $make->vehicle_make_name;
        $this->cacc->vehicle_type_name = $type->vehicle_type_name;
        $this->cacc->vehicle_model_name = $model->vehicle_model_name;
        $this->cacc->vehicle_year = $model->vehicle_year;
        $this->cacc->vehicle_value = $model->vehicle_value;
        $this->cacc->plate_number = $req->data_plate_number;
        $this->cacc->serial_chassis = $req->data_serial_chassis;
        $this->cacc->motor_engine = $req->data_motor_engine;
        $this->cacc->mv_file_number = $req->data_mv_file_number;
        $this->cacc->seat_capacity = $req->data_seat_capacity;
        $this->cacc->color = $req->data_color;
        $this->cacc->inception_date = $req->data_inception_date;
        $this->cacc->del_flag = 0;
        $this->cacc->created_at = $req->data_created_at;
        $this->cacc->updated_at = $req->data_created_at;

        try
        {
          $this->cacc->save();
          return $this->update_policy_number($req);
        }
        catch(\Exception $e)
        {
          $message = $e->getMessage();
          if($message == 23000)
          {
              alert()
              ->error('ERROR', 'Data already exist!')
              ->persistent("Close");

              return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
          }
          else if($message == 22001)
          {
            alert()
            ->error('ERROR', 'Exceed Max limit of column!')
            ->persistent("Close");

              return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
          }
          else
          {
            alert()
            ->error('ERROR', $e->getMessage())
            ->persistent("Close");

              return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
          }
        }
    }

    public function update_policy_number($req)
    {
        $pnumber = policynoConnection::where('policy_number','=',$req->policy_number)->first();
        $pnumber->policyStatus_ID = 2;
        $pnumber->updated_at = $req->data_created_at;

        try
        {
          $pnumber->save();
          return $this->save_payment_details($req);
        }
        catch(\Exception $e)
        {
          $message = $e->getMessage();
          if($message == 23000)
          {
              alert()
              ->error('ERROR', 'Data already exist!')
              ->persistent("Close");

              return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
          }
          else if($message == 22001)
          {
            alert()
            ->error('ERROR', 'Exceed Max limit of column!')
            ->persistent("Close");

              return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
          }
          else
          {
            alert()
            ->error('ERROR', $e->getMessage())
            ->persistent("Close");

              return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
          }
        }
    }

    public function save_payment_details($req)
    {
        $pa = premiumPAConnection::where('premiumPA_ID', '=', $req->data_personal_accident_ID)->first();
        $pd = premiumDGConnection::where('premiumDG_ID', '=', $req->data_property_damage_ID)->first();
        $bi = premiumDGConnection::where('premiumDG_ID', '=', $req->data_bodily_injury_ID)->first();
        $it = installmentConnection::where('installment_ID','=', $req->data_installment_ID)->first();
        $id = clientAccountsConnection::where('client_ID', '=', $req->data_client_ID)->orderBy('account_ID','desc')->first();
        $this->ptail->vehicle_class = $req->data_bodily_injury_class;

        $this->ptail->account_ID = $id->account_ID;
        $this->ptail->deductible = $req->deductible;
        $this->ptail->towing = $req->towing;
        $this->ptail->arl = $req->arl;
        $this->ptail->coverage = $req->coverage;
        $this->ptail->aon_cover = $req->aon;
        $this->ptail->aon_premium = $req->aon_premium;
        $this->ptail->odt_cover = $req->odt;
        $this->ptail->odt_premium = $req->odt_premium;
        $this->ptail->pa_cover = $pa->insuranceLimit;
        $this->ptail->pa_premium = $pa->insuranceCover+$pa->passengerCover+$pa->mrCover;
        $this->ptail->bi_cover = $bi->insuranceLimit;

        if($req->data_bodily_injury_class == 1)
        $this->ptail->bi_premium = $bi->privateCar;
        if($req->data_bodily_injury_class == 2)
        $this->ptail->bi_premium = $bi->cv_Light;
        if($req->data_bodily_injury_class == 3)
        $this->ptail->bi_premium = $bi->cv_Heavy;

        $this->ptail->pd_cover = $pd->insuranceLimit;
        
        if($req->data_bodily_injury_class == 1)
        $this->ptail->pd_premium = $pd->privateCar;
        if($req->data_bodily_injury_class == 2)
        $this->ptail->pd_premium = $pd->cv_Light;
        if($req->data_bodily_injury_class == 3)
        $this->ptail->pd_premium = $pd->cv_Heavy;

        $this->ptail->basicpremium = $req->basic;
        $this->ptail->vat = $req->vat;
        $this->ptail->dst = $req->stamp;
        $this->ptail->lgt = $req->lgt;
        $this->ptail->total = $req->total;
        $this->ptail->vehicle_class = $req->data_property_damage_class;
        $this->ptail->payment_type = $req->payment_type;

        if($req->payment_type == 1)
        {
          $this->ptail->payment_status = 1;
          try
          {
            $this->ptail->save();
            alert()
            ->success('Success', 'Record Saved!')
            ->persistent("Close");

            return $this->cash_create_voucher($req);
          }
          catch(\Exception $e)
          {
            $message = $e->getMessage();
            if($message == 23000)
            {
                alert()
                ->error('ERROR', 'Data already exist!')
                ->persistent("Close");

                return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
            }
            else if($message == 22001)
            {
              alert()
              ->error('ERROR', 'Exceed Max limit of column!')
              ->persistent("Close");

                return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
            }
            else
            {
              alert()
              ->error('ERROR', $e->getMessage())
              ->persistent("Close");

                return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
            }
          }
        }
        if($req->payment_type == 2)
        {
          $this->ptail->payment_status = 0;
          $this->ptail->bank_ID = $req->data_bank_ID;
          $this->ptail->installment_type = $it->installment_desc;
          try
          {
            $this->ptail->save();
            return $this->create_voucher($req);
          }
          catch(\Exception $e)
          {
            $message = $e->getMessage();
            if($message == 23000)
            {
                alert()
                ->error('ERROR', 'Data already exist!')
                ->persistent("Close");

                return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
            }
            else if($message == 22001)
            {
              alert()
              ->error('ERROR', 'Exceed Max limit of column!')
              ->persistent("Close");

                return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
            }
            else
            {
              alert()
              ->error('ERROR', $e->getMessage())
              ->persistent("Close");

                return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
            }
          }
        }
    }

    public function create_voucher($req)
    {
      $id = paymentDetailConnection::orderBy('payment_ID','desc')->first();
      $this->check->pay_ID = $id->payment_ID;
      try
      {
        $this->check->save();
        return $this->save_payments($req);
      }
      catch(\Exception $e)
      {
        $message = $e->getMessage();
        if($message == 23000)
        {
            alert()
            ->error('ERROR', 'Data already exist!')
            ->persistent("Close");

            return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
        }
        else if($message == 22001)
        {
          alert()
          ->error('ERROR', 'Exceed Max limit of column!')
          ->persistent("Close");

            return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
        }
        else
        {
          alert()
          ->error('ERROR', $e->getMessage())
          ->persistent("Close");

            return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
        }
      }
    }

    public function save_payments($req)
    {
      $id = checkVoucherConnection::orderBy('cv_ID','desc')->first();
      $installment = installmentConnection::where('installment_ID','=', $req->data_installment_ID)->first();
      $total = 0;
      $date = $req->data_inception_date;
      for ($x = 0; $x != $installment->installment_desc; $x++)
      {
        $pay = new paymentsConnection;
        $pay->check_voucher = $id->cv_ID;
        $pay->or_number = str_pad(rand(0,'9'.round(microtime(true))),11, "0", STR_PAD_LEFT);
        $total += $req->data_amount;
        if($x == ($installment->installment_desc - 1))
        {
          if($total < $req->total)
          {
            $pay->amount = $req->data_amount + ($req->total - $total);
          }
          else
            $pay->amount = $req->data_amount;
        }
        else
          $pay->amount = $req->data_amount;

        $pay->due_date = $date." 23:59:59";
        $pay->employee_info_ID = Session::get('id');
        $pay->status = 1;
        $tdate = strtotime( '-1 month' , strtotime ($date));
        $date = date('Y-m-d', $tdate);

        try
        {
          $pay->save();
        }
        catch(\Exception $e)
        {
          $message = $e->getMessage();
          if($message == 23000)
          {
              alert()
              ->error('ERROR', 'Data already exist!')
              ->persistent("Close");

              return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
          }
          else if($message == 22001)
          {
            alert()
            ->error('ERROR', 'Exceed Max limit of column!')
            ->persistent("Close");

              return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
          }
          else
          {
            alert()
            ->error('ERROR', $e->getMessage())
            ->persistent("Close");

              return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
          }
        }
      }
        return $this->finalize_quote($req);
    }

    public function cash_create_voucher($req)
    {
      $id = paymentDetailConnection::orderBy('payment_ID','desc')->first();
      $this->check->pay_ID = $id->payment_ID;
      try
      {
        $this->check->save();
        return $this->cash_save_payments($req);
      }
      catch(\Exception $e)
      {
        $message = $e->getMessage();
        if($message == 23000)
        {
            alert()
            ->error('ERROR', 'Data already exist!')
            ->persistent("Close");

            return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
        }
        else if($message == 22001)
        {
          alert()
          ->error('ERROR', 'Exceed Max limit of column!')
          ->persistent("Close");

            return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
        }
        else
        {
          alert()
          ->error('ERROR', $e->getMessage())
          ->persistent("Close");

            return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
        }
      }
    }

    public function cash_save_payments($req)
    {
      $id = checkVoucherConnection::orderBy('cv_ID','desc')->first();
      $pay = new paymentsConnection;
      $date = $req->data_inception_date;
      $tdate = strtotime( '+7 days' , strtotime ($date));
      $date = date('Y-m-d', $tdate);

      $pay->check_voucher = $id->cv_ID;
      $pay->or_number = str_pad(rand(0,'9'.round(microtime(true))),11, "0", STR_PAD_LEFT);
      $pay->amount = $req->total;
      $pay->employee_info_ID = Session::get('id');
      $pay->due_date = $date." 23:59:59";
      $pay->status = 0;

      try
      {
        $pay->save();
      }
      catch(\Exception $e)
      {
        $message = $e->getMessage();
        if($message == 23000)
        {
            alert()
            ->error('ERROR', 'Data already exist!')
            ->persistent("Close");

            return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
        }
        else if($message == 22001)
        {
          alert()
          ->error('ERROR', 'Exceed Max limit of column!')
          ->persistent("Close");

            return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
        }
        else
        {
          alert()
          ->error('ERROR', $e->getMessage())
          ->persistent("Close");

            return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
        }
      }
    
      return $this->finalize_quote($req);
    }


    public function finalize_quote($req)
    {
    	$quote = quotationListConnection::where('quote_ID', "=", $req->quote_ID)->first();
    	$quote->quote_status = 8;
      $quote->employee_info_ID = Session::get('id');

      try
      {
        $quote->save();
        return $this->connect_insurance($req);
      }
      catch(\Exception $e)
      {
        $message = $e->getMessage();
        if($message == 23000)
        {
            alert()
            ->error('ERROR', 'Data already exist!')
            ->persistent("Close");

            return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
        }
        else if($message == 22001)
        {
          alert()
          ->error('ERROR', 'Exceed Max limit of column!')
          ->persistent("Close");

            return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
        }
        else
        {
          alert()
          ->error('ERROR', $e->getMessage())
          ->persistent("Close");

            return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
        }
      }

    }

    public function connect_insurance($req)
    {
    	$quote = accListQuoteConnection::where('quote_ID', "=", $req->quote_ID)->first();
      $id = clientAccountsConnection::where('client_ID', '=', $req->data_client_ID)->orderBy('account_ID','desc')->first();
    	
    	$this->ilist->account_ID = $quote->account_ID;
    	$this->ilist->insure_ID = $id->account_ID;

      try
      {
      	$this->ilist->save();
        alert()
        ->success('Success', 'Record Saved!')
        ->persistent("Close");

        return Redirect::to('/accounting-staff/transaction/quotation-list');
      }
      catch(\Exception $e)
      {
        $message = $e->getMessage();
        if($message == 23000)
        {
            alert()
            ->error('ERROR', 'Data already exist!')
            ->persistent("Close");

            return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
        }
        else if($message == 22001)
        {
          alert()
          ->error('ERROR', 'Exceed Max limit of column!')
          ->persistent("Close");

            return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
        }
        else
        {
          alert()
          ->error('ERROR', $e->getMessage())
          ->persistent("Close");

            return Redirect::to('/accounting-staff/transaction/insure-client')->withInput();
        }
      }
    }
}
