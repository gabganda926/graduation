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

use App\clientAccountsConnection;

use App\quotationListConnection;

use App\quotationIndividualConnection;

use App\quotationCompanyConnection;

use Redirect;

use Alert;

class trans_quoteWalkinController extends Controller
{
  public function __construct(quotationListConnection $list,quotationIndividualConnection $indi,quotationCompanyConnection $comp)
  {
     $this->quote = $list;
     $this->quote_indi = $indi;
     $this->quote_comp = $comp;
  }

	public function index()
	{
    	return view('pages/accounting-staff/transaction/quotation-walkin')
      ->with('address',addressConnection::all())
      ->with('pInfo',personalInfoConnection::all())
    	->with('cperson',contactPersonConnection::all())
     	->with('company',inscompanyConnection::all())
    	->with('sales',salesAgentConnection::all())
     	->with('client',clientConnection::all())
   	  ->with('policy',policynoConnection::all())
   	 	->with('vModel',vModelConnection::all())
    	->with('vMake',vMakeConnection::all())
   		->with('vType',vTypeConnection::all())
     	->with('ppa',premiumPAConnection::orderBy('insuranceLimit')->get())
    	->with('pdg',premiumDGConnection::orderBy('insuranceLimit')->get());
	}

  public function add_quote_indi(Request $req)
  {
    $this->quote->quote_status = 0;
    $this->quote->del_flag = 0;

    try
    {
      $this->quote->save();
      return $this->add_quote_indi_temp($req);
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

  public function add_quote_indi_temp($req)
  {
    \Log::info(preg_replace("/[^0-9.]/", "", $req->vehicle_market_value));
    $quoteID = quotationListConnection::orderBy('quote_ID', 'desc')->first();
    $this->quote_indi->quote_indi_ID = $quoteID->quote_ID;
    $this->quote_indi->sales_agent = $req->indi_agent;
    $this->quote_indi->insurance_company = $req->insurance_comp;
    $this->quote_indi->pinfo_first_name = $req->indi_first_name;
    $this->quote_indi->pinfo_middle_name = $req->indi_middle_name;
    $this->quote_indi->pinfo_last_name = $req->indi_last_name;
    $this->quote_indi->pinfo_gender = $req->indi_gender;
    $this->quote_indi->pinfo_cpnum_1 = $req->indi_cpnum;
    $this->quote_indi->pinfo_cpnum_2 = $req->indi_cpnum_2;
    $this->quote_indi->pinfo_tpnum = $req->indi_tpnum;
    $this->quote_indi->pinfo_mail = $req->indi_email;
    $this->quote_indi->pinfo_age = $req->indi_bday;
    $this->quote_indi->add_blcknum = $req->indi_blcknum;
    $this->quote_indi->add_street = $req->indi_street;
    $this->quote_indi->add_subdivision = $req->indi_subidivision;
    $this->quote_indi->add_brngy = $req->indi_barangay;
    $this->quote_indi->add_district = $req->indi_district;
    $this->quote_indi->add_city = $req->indi_city;
    $this->quote_indi->add_province = $req->indi_province;
    $this->quote_indi->add_region = $req->indi_region;
    $this->quote_indi->add_zipcode = $req->indi_zipcode;
    $this->quote_indi->vehicle_type_ID = $req->vehicle_type;
    $this->quote_indi->vehicle_make_ID = $req->vehicle_make;
    $this->quote_indi->vehicle_model_ID = $req->vehicle_model;
    $this->quote_indi->specify_type = $req->specify_vehicle_type;
    $this->quote_indi->specify_make = $req->specify_vehicle_make;
    $this->quote_indi->specify_model = $req->specify_vehicle_model;
    $this->quote_indi->vehicle_year_model = $req->year_model;
    $this->quote_indi->vehicle_value = preg_replace("/[^0-9.]/", "", $req->vehicle_market_value);
    $this->quote_indi->plate_number = $req->plate_number;
    $this->quote_indi->serial_chassis = $req->chassis_number;
    $this->quote_indi->motor_engine = $req->engine_number;
    $this->quote_indi->mv_file_number = $req->mvfile_number;
    $this->quote_indi->seat_capacity = $req->seat_capacity;
    $this->quote_indi->color = $req->color;
    $this->quote_indi->personal_accident_ID = $req->pa_ID;
    $this->quote_indi->bodily_injury_ID = $req->tpbi_ID;
    $this->quote_indi->property_damage_ID = $req->tppd_ID;
    $this->quote_indi->vehicle_class = $req->vehicle_class;

    try
    {
      $this->quote_indi->save();
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

  public function add_quote_comp(Request $req)
  {
    $this->quote->quote_status = 0;
    $this->quote->del_flag = 0;

    try
    {
      $this->quote->save();
      return $this->add_quote_comp_temp($req);
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

  public function add_quote_comp_temp($req)
  {
    \Log::info(preg_replace("/[^0-9.]/", "", $req->vehicle_market_value));
    $quoteID = quotationListConnection::orderBy('quote_ID', 'desc')->first();
    $this->quote_comp->quote_comp_ID = $quoteID->quote_ID;
    $this->quote_comp->sales_agent = $req->comp_agent;
    $this->quote_comp->insurance_company = $req->insurance_comp;
    $this->quote_comp->comp_name = $req->comp_name;
    $this->quote_comp->comp_telnum = $req->comp_tpnum;
    $this->quote_comp->comp_faxnum = $req->comp_faxnum;
    $this->quote_comp->comp_email = $req->comp_email;
    $this->quote_comp->pinfo_first_name = $req->cont_first_name;
    $this->quote_comp->pinfo_middle_name = $req->cont_middle_name;
    $this->quote_comp->pinfo_last_name = $req->cont_last_name;
    $this->quote_comp->pinfo_gender = $req->cont_gender;
    $this->quote_comp->pinfo_cpnum_1 = $req->cont_cpnum;
    $this->quote_comp->pinfo_cpnum_2 = $req->cont_cpnum_2;
    $this->quote_comp->pinfo_tpnum = $req->cont_tpnum;
    $this->quote_comp->pinfo_mail = $req->cont_email;
    $this->quote_comp->pinfo_age = $req->cont_bday;
    $this->quote_comp->add_blcknum = $req->comp_blcknum;
    $this->quote_comp->add_street = $req->comp_street;
    $this->quote_comp->add_subdivision = $req->comp_subidivision;
    $this->quote_comp->add_brngy = $req->comp_barangay;
    $this->quote_comp->add_district = $req->comp_district;
    $this->quote_comp->add_city = $req->comp_city;
    $this->quote_comp->add_province = $req->comp_province;
    $this->quote_comp->add_region = $req->comp_region;
    $this->quote_comp->add_zipcode = $req->comp_zipcode;
    $this->quote_comp->vehicle_type_ID = $req->vehicle_type;
    $this->quote_comp->vehicle_make_ID = $req->vehicle_make;
    $this->quote_comp->vehicle_model_ID = $req->vehicle_model;
    $this->quote_comp->specify_type = $req->specify_vehicle_type;
    $this->quote_comp->specify_make = $req->specify_vehicle_make;
    $this->quote_comp->specify_model = $req->specify_vehicle_model;
    $this->quote_comp->vehicle_year_model = $req->year_model;
    $this->quote_comp->vehicle_value = preg_replace("/[^0-9.]/", "", $req->vehicle_market_value);
    $this->quote_comp->plate_number = $req->plate_number;
    $this->quote_comp->serial_chassis = $req->chassis_number;
    $this->quote_comp->motor_engine = $req->engine_number;
    $this->quote_comp->mv_file_number = $req->mvfile_number;
    $this->quote_comp->seat_capacity = $req->seat_capacity;
    $this->quote_comp->color = $req->color;
    $this->quote_comp->personal_accident_ID = $req->pa_ID;
    $this->quote_comp->bodily_injury_ID = $req->tpbi_ID;
    $this->quote_comp->property_damage_ID = $req->tppd_ID;
    $this->quote_comp->vehicle_class = $req->vehicle_class;

    try
    {
      $this->quote_comp->save();
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