<?php

namespace App\Http\Controllers\AccStaffControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

use App\quotationListConnection;

use App\quotationIndividualConnection;

use App\clientConnection;

use App\quotationCompanyConnection;

use App\contactPersonConnection;

use App\salesAgentConnection;

use App\personalInfoConnection;

use App\inscompanyConnection;

use App\vMakeConnection;

use App\vModelConnection;

use App\vTypeConnection;

use App\premiumDGConnection;

use App\premiumPAConnection;

use App\clientSystemAccountConnection;

use App\accListQuoteConnection;

use App\clientNotificationConnection;

use App\addressConnection;

use App\clientListConnection;

use App\policynoConnection;

use Redirect;

use Alert;

use Mail;

class trans_quotationListController extends Controller
{
	public function __construct(clientSystemAccountConnection $csa, accListQuoteConnection $acq, clientNotificationConnection $notif, vMakeConnection $make, vModelConnection $model, vTypeConnection $type, addressConnection $add, personalInfoConnection $info, clientListConnection $lists, clientConnection $cli, inscompanyConnection $comp)
	{
        $this->company = $comp;
        $this->client = $cli;
        $this->list = $lists;
		$this->account = $csa;
		$this->qlist = $acq;
		$this->notif = $notif;
        $this->make = $make;
        $this->model = $model;
        $this->type = $type;
        $this->address = $add;  
        $this->pinfo = $info;
	}
    public function index()
    {
    	return view('pages.accounting-staff.transaction.quotation-list')
		->with('qlist', quotationListConnection::all())
		->with('qindi', quotationIndividualConnection::all())
		->with('qcomp', quotationCompanyConnection::all())
		->with('agent', salesAgentConnection::all())
		->with('pinfo', personalInfoConnection::all())
		->with('insco', inscompanyConnection::all())
		->with('make' , vMakeConnection::all())
		->with('model', vModelConnection::all())
		->with('type' , vTypeConnection::all())
		->with('pdg'  , premiumDGConnection::all())
		->with('ppa'  , premiumPAConnection::all())
		->with('cprns', contactPersonConnection::all());
    }

    public function forward_manager(Request $req)
    {
    	$quote = quotationListConnection::where('quote_ID', "=", $req->ID)->first();
    	$quote->quote_status = 5;

    	$quote->save();
    }

    public function forward_client(Request $req)
    {
		$id = quotationCompanyConnection::where("quote_comp_ID", "=", $req->ID)->first();
		if($id)
		{
			$this->account->username = $id->comp_name."".$req->ID;
			$email = $id->comp_email;
			$name = $id->comp_name;
		}
		else
		{
    		$id = quotationIndividualConnection::where("quote_indi_ID", "=", $req->ID)->first();
			$this->account->username = $id->pinfo_last_name."".$req->ID;
			$email = $id->pinfo_mail;
			$name = $id->pinfo_first_name." ".$id->pinfo_last_name;
		}
		$password = str_pad(rand(0,'9'.round(microtime(true))),11, "0", STR_PAD_LEFT);
		$this->account->password = bcrypt($password);
		$this->account->status = 0;
		$data = array('username'=>$this->account->username, 'password'=>$password,'email'=>$email,'name'=>$name);
		
		$this->account->save();
    	Mail::send('pages.others.forward-manager', ['username'=>$this->account->username, 'password'=>$password], function ($message) use ($data){
    		$message->from('MySender41N@gmail.com', 'i-Insure');
    		$message->to($data['email'], $data['name'])->subject('Welcome to Compreline Insurance Services');
    	});
    	return $this->add_quote_list($req);
    }

    public function add_quote_list($req)
    {
    	$id = clientSystemAccountConnection::orderBy('account_ID','desc')->first();
    	$this->qlist->account_ID = $id->account_ID;
    	$this->qlist->quote_ID = $req->ID;

    	$this->qlist->save();
    	return $this->update_quote_status($req);
    }

    public function update_quote_status($req)
    {
    	$quote = quotationListConnection::where('quote_ID', "=", $req->ID)->first();
    	$quote->quote_status = 6;

    	$quote->save();	
    	return $this->notify($req);
    }

    public function notify($req)
    {
    	date_default_timezone_set('Asia/Manila');
    	$id = clientSystemAccountConnection::orderBy('account_ID','desc')->first();
    	$this->notif->account_ID = $id->account_ID;
    	$this->notif->status = 0;
    	$this->notif->subject = 'Quotation Approval';
    	$this->notif->content = "
    	Dear Valued Customer,<br/>
    	Our management have approved of your proposed quotation<br/><br/>
    	You can now Accept or Reject the proposed quotation<br/>
    	Please be informed that we will be sending attachment through your email.<br/>
        Upon Accepting please send us your payment details.<br/><br/>
    	After 30 days, this message will be considered void, and we will disregard your quotation.<br/><br/>
    	Thank you and God Bless!<br/><br/>
    	Compreline Insurance Services<br/><br/><br/><br/>
    	<button style='float: center' type='button' data-id = '".$req->ID."' class='btn btn-success'>Accept</button>
    	<button type='button' style='float:center' data-id = '".$req->ID."' class='btn btn-danger'>Reject</button><br/><br/>
        ";

    	$this->notif->date_sent = date("Y-m-d H:i:s");
		
		$this->notif->save();	
    }

    public function insure_client(Request $req)
    {
        if($req->code == 1 || $req->code == 3)
        {
            $type;
            date_default_timezone_set('Asia/Manila');
            $id = quotationCompanyConnection::where("quote_comp_ID", "=", $req->ID)->first();
            if($id)
            {
                if($id->specify_type)
                {
                    $this->type->vehicle_type_name = $id->specify_type;
                    $this->type->del_flag = 0;
                    $this->type->created_at = date("Y-m-d H:i:s");
                    $this->type->updated_at = date("Y-m-d H:i:s");

                    $this->type->save();
                    $type = vTypeConnection::orderBy('vehicle_type_ID','desc')->first();   
                }
                else
                {
                    return $this->check_exist_make($req, null);
                }
            }
            else
            {
                $id = quotationIndividualConnection::where("quote_indi_ID", "=", $req->ID)->first();
                if($id->specify_type)
                {
                    $this->type->vehicle_type_name = $id->specify_type;
                    $this->type->del_flag = 0;
                    $this->type->created_at = date("Y-m-d H:i:s");
                    $this->type->updated_at = date("Y-m-d H:i:s");

                    $this->type->save();
                    $type = vTypeConnection::orderBy('vehicle_type_ID','desc')->first();   
                }
                else
                {
                    return $this->check_exist_make($req, null);
                }
            }
        }
     

        return $this->check_exist_make($req, $type->vehicle_type_ID);
    }

    public function check_exist_make($req, $type)
    {
        if($req->code == 1 || $req->code == 3)
        {
            $make;
            date_default_timezone_set('Asia/Manila');
            $id = quotationCompanyConnection::where("quote_comp_ID", "=", $req->ID)->first();
            if($id)
            {
                if($id->specify_type)
                {
                    $this->make->vehicle_make_name = $id->specify_make;
                    $this->make->vehicle_make_desc = '';
                    $this->make->del_flag = 0;
                    $this->make->created_at = date("Y-m-d H:i:s");
                    $this->make->updated_at = date("Y-m-d H:i:s");

                    $this->make->save();
                    $make = vMakeConnection::orderBy('vehicle_make_ID','desc')->first();  
                }
                else
                    return $this->check_exist_model($req, $type, null);
            }
            else
            {
                $id = quotationIndividualConnection::where("quote_indi_ID", "=", $req->ID)->first();
                if($id->specify_type)
                {
                    $this->make->vehicle_make_name = $id->specify_make;
                    $this->make->vehicle_make_desc = '';
                    $this->make->del_flag = 0;
                    $this->make->created_at = date("Y-m-d H:i:s");
                    $this->make->updated_at = date("Y-m-d H:i:s");

                    $this->make->save();
                    $make = vMakeConnection::orderBy('vehicle_make_ID','desc')->first();  
                }
                else
                    return $this->check_exist_model($req, $type, null);
            }
        }

        return $this->check_exist_model($req, $type, $make->vehicle_make_ID);
    }

    public function check_exist_model($req, $type, $make)
    {
        if($req->code == 1 || $req->code == 3)
        {
            $model;
            date_default_timezone_set('Asia/Manila');
            $id = quotationCompanyConnection::where("quote_comp_ID", "=", $req->ID)->first();
            if($id)
            {
                if($id->specify_model)
                {
                    $this->model->vehicle_model_name = $id->specify_model;
                    $this->model->vehicle_value = $id->vehicle_value;
                    \Log::info($id->vehicle_value);
                    $this->model->vehicle_year = $id->vehicle_year_model; 
                    if($id->specify_type)
                    {
                        $this->model->vehicle_type = $type;
                    }
                    else
                    {
                        $this->model->vehicle_type = $id->vehicle_type_ID;
                    }
                    if($id->specify_make)
                    {
                        $this->model->vehicle_make_ID = $make;
                    }
                    else
                    {
                        $this->model->vehicle_make_ID = $id->vehicle_type_ID;
                    }
                    $this->model->del_flag = 0;
                    $this->model->created_at = date("Y-m-d H:i:s");
                    $this->model->updated_at = date("Y-m-d H:i:s");

                    $this->model->save();
                    $model = vModelConnection::orderBy('vehicle_model_ID','desc')->first();  
                }
                else
                    return $this->update_quote($req, $type, $make, null);
            }
            else
            {
                $id = quotationIndividualConnection::where("quote_indi_ID", "=", $req->ID)->first();
                if($id->specify_model)
                {
                    $this->model->vehicle_model_name = $id->specify_model;
                    $this->model->vehicle_value = $id->vehicle_value;
                    \Log::info($id->vehicle_value);
                    $this->model->vehicle_year = $id->vehicle_year_model; 
                    if($id->specify_type)
                    {
                        $this->model->vehicle_type = $type;
                    }
                    else
                    {
                        $this->model->vehicle_type = $id->vehicle_type_ID;
                    }
                    if($id->specify_make)
                    {
                        $this->model->vehicle_make_ID = $make;
                    }
                    else
                    {
                        $this->model->vehicle_make_ID = $id->vehicle_type_ID;
                    }
                    $this->model->del_flag = 0;
                    $this->model->created_at = date("Y-m-d H:i:s");
                    $this->model->updated_at = date("Y-m-d H:i:s");

                    $this->model->save();
                    $model = vModelConnection::orderBy('vehicle_model_ID','desc')->first();  
                }
                else
                    return $this->update_quote($req, $type, $make, null);
            }
        }

        return $this->update_quote($req, $type, $make, $model->vehicle_model_ID);
    }

    public function update_quote($req, $type, $make, $model)
    {
        $eyedee;
        if($req->code == 1 || $req->code == 3)
        {
            $update = 0;
            date_default_timezone_set('Asia/Manila');
            $id = quotationCompanyConnection::where("quote_comp_ID", "=", $req->ID)->first();
            if($id)
            {
                $eyedee = $id->quote_comp_ID;
                if($id->specify_type)
                {
                    $id->vehicle_type_ID = $type;
                    $id->specify_type = null;
                    $update = $update + 1;
                }
                if($id->specify_make)
                {
                    $id->vehicle_make_ID = $make;
                    $id->specify_make = null;
                    $update = $update + 1;
                }
                if($id->specify_model)
                {
                    $id->vehicle_model_ID = $model; 
                    $id->specify_model = null;
                    $update = $update + 1;
                }
                if($update != 0)
                {
                    $id->save();
                }
            }
            else
            {
                $id = quotationIndividualConnection::where("quote_indi_ID", "=", $req->ID)->first();
                $eyedee = $id->quote_indi_ID;
                if($id->specify_type)
                {
                    if($id->specify_type)
                    {
                        $id->vehicle_type_ID = $type;
                        $id->specify_type = null;
                        $update = $update + 1;
                    }
                    if($id->specify_make)
                    {
                        $id->vehicle_make_ID = $make;
                        $id->specify_make = null;
                        $update = $update + 1;
                    }
                    if($id->specify_model)
                    {
                        $id->vehicle_model_ID = $model; 
                        $id->specify_model = null;
                        $update = $update + 1;
                    }
                    if($update != 0)
                    {
                        $id->save();
                    }
                }
            }
        }

        return $this->save_client_details($req,$eyedee);
    }

    public function save_client_details($req,$id)
    {
        if($req->code == 1 || $req->code == 2)
        {
            $id = quotationCompanyConnection::where("quote_comp_ID", "=", $req->ID)->first();
            if($id)
            {
                if($id->add_blcknum != null)
                {
                  $this->address->add_blcknum = $id->add_blcknum;
                }
                if($id->add_street != null)
                {
                  $this->address->add_street = $id->add_street;
                }
                if($id->add_subdivision != null)
                {
                  $this->address->add_subdivision = $id->add_subdivision;
                }
                if($id->add_brngy != null)
                {
                  $this->address->add_brngy = $id->add_brngy;
                }
                if($id->add_district != null)
                {
                  $this->address->add_district = $id->add_district;
                }
                if($id->add_city != null)
                {
                  $this->address->add_city = $id->add_city;
                }
                if($id->add_province != null)
                {
                  $this->address->add_province = $id->add_province;
                }
                if($id->add_region != null)
                {
                  $this->address->add_region = $id->add_region;
                }
                if($id->add_zipcode != null)
                {
                  $this->address->add_zipcode = $id->add_zipcode;
                }

                $this->address->save();
                return $this->comp_add_cperson_info($id);
            
            }
            else
            {
                $id = quotationIndividualConnection::where("quote_indi_ID", "=", $req->ID)->first();

                if($id->add_blcknum != null)
                {
                  $this->address->add_blcknum = $id->add_blcknum;
                }
                if($id->add_street != null)
                {
                  $this->address->add_street = $id->add_street;
                }
                if($id->add_subdivision != null)
                {
                  $this->address->add_subdivision = $id->add_subdivision;
                }
                if($id->add_brngy != null)
                {
                  $this->address->add_brngy = $id->add_brngy;
                }
                if($id->add_district != null)
                {
                  $this->address->add_district = $id->add_district;
                }
                if($id->add_city != null)
                {
                  $this->address->add_city = $id->add_city;
                }
                if($id->add_province != null)
                {
                  $this->address->add_province = $id->add_province;
                }
                if($id->add_region != null)
                {
                  $this->address->add_region = $id->add_region;
                }
                if($id->add_zipcode != null)
                {
                  $this->address->add_zipcode = $id->add_zipcode;
                }

                $this->address->save();
                return $this->indi_add_client_info($id);
            }
        }
        return $this->details_only_sent($req);
    }

    public function comp_add_cperson_info($req)
    {
        if ($req->pinfo_middle_name == null)
        {
        $this->pinfo->pinfo_first_name = $req->pinfo_first_name;
        $this->pinfo->pinfo_last_name = $req->pinfo_last_name;
        }
        else
        {
          $this->pinfo->pinfo_first_name = $req->pinfo_first_name;
          $this->pinfo->pinfo_middle_name = $req->pinfo_middle_name;
          $this->pinfo->pinfo_last_name = $req->pinfo_last_name;
        }
        $this->pinfo->pinfo_cpnum_1 = $req->pinfo_cpnum_1;
        $this->pinfo->pinfo_cpnum_2 = $req->pinfo_cpnum_2;
        $this->pinfo->pinfo_tpnum = $req->pinfo_tpnum;
        $this->pinfo->pinfo_age = $req->pinfo_age;
        $this->pinfo->pinfo_gender = $req->pinfo_gender;
        $this->pinfo->pinfo_mail = $req->pinfo_mail; 

        $this->pinfo->save();
        return $this->comp_add_cPerson($req);
        
      }

    public function comp_add_cPerson($req)
    {
        $latestidpinfo = personalInfoConnection::orderBy('pinfo_ID', 'desc')->first();
        $this->cPerson->personal_info_ID = (int)$latestidpinfo->pinfo_ID;

        $this->cPerson->save();
        return $this->comp_add_client_list($req);
    }

    public function comp_add_client_list($req)
    {
      $this->list->client_type = 2;
      $this->list->client_flag = 1;
      $mytime = $req->time;
      $this->list->created_at = $mytime;
      $this->list->updated_at = $mytime;
      $this->list->del_flag  = 0;

        $this->list->save();
        return $this->comp_add_data($req);
    }

    public function comp_add_data($req)
    {
        $clist = clientListConnection::orderBy('client_ID', 'desc')->first();
        $latestid = addressConnection::orderBy('add_ID', 'desc')->first();
        $cpersonid = contactPersonConnection::orderBy('cPerson_ID', 'desc')->first();
        $this->company->comp_ID = (int)$clist->client_ID;
        $this->company->comp_name = $req->comp_name;
        $this->company->comp_add_ID = (int)$latestid->add_ID;
        $this->company->comp_cperson_ID = (int)$cpersonid->cPerson_ID;
        $this->company->comp_faxnum = $req->comp_faxnum;
        $this->company->comp_telnum = $req->comp_telnum;
        $this->company->comp_email = $req->comp_email;
        $this->company->comp_type = 1;
        $this->company->comp_sales_agent = $req->sales_agent;

        $this->company->save();
        return $this->sent_to_insure($req, (int)$clistid->client_ID, 1);
    }

    public function indi_add_client_info($req)
    {
        $this->pinfo->pinfo_first_name = $req->pinfo_first_name;
        $this->pinfo->pinfo_middle_name = $req->pinfo_middle_name;
        $this->pinfo->pinfo_last_name = $req->pinfo_last_name;
        $this->pinfo->pinfo_cpnum_1 = $req->pinfo_cpnum_1;
        $this->pinfo->pinfo_cpnum_2 = $req->pinfo_cpnum_2;
        $this->pinfo->pinfo_tpnum = $req->pinfo_tpnum;
        $this->pinfo->pinfo_age = $req->pinfo_age;
        $this->pinfo->pinfo_gender = $req->pinfo_gender;
        $this->pinfo->pinfo_mail = $req->pinfo_mail; 

        $this->pinfo->save();
        return $this->indi_add_client_list($req);
    }

    public function indi_add_client_list($req)
    {
        $this->list->client_type = 1;
        $this->list->client_flag = 1;
        $this->list->created_at = date("Y-m-d H:i:s");
        $this->list->updated_at = date("Y-m-d H:i:s");
        $this->list->del_flag  = 0;

        $this->list->save();
        return $this->indi_add_client_final($req);
    }

    public function indi_add_client_final($req)
    {
        $clistid = clientListConnection::orderBy('client_ID', 'desc')->first();
        $latestid = addressConnection::orderBy('add_ID', 'desc')->first();
        $latestidpinfo = personalInfoConnection::orderBy('pinfo_ID', 'desc')->first();
        $this->client->client_ID = (int)$clistid->client_ID;
        $this->client->personal_info_ID = (int)$latestidpinfo->pinfo_ID;
        $this->client->client_add_ID = (int)$latestid->add_ID;
        $this->client->client_sales_ID = $req->sales_agent;

        $this->client->save();
        return $this->sent_to_insure($req, (int)$clistid->client_ID, 0);
    }

    public function sent_to_insure($req,$id, $type)
    {
        return view('pages.accounting-staff.transaction.insure-quote')
        ->with('id',$id)
        ->with('details',$req)
        ->with('type', $type)
        ->with('address',addressConnection::all())
        ->with('pInfo',personalInfoConnection::all())
        ->with('cperson',contactPersonConnection::all())
        ->with('company',inscompanyConnection::all())
        ->with('salesA',salesAgentConnection::all())
        ->with('client',clientConnection::all())
        ->with('policy',policynoConnection::all())
        ->with('vModel',vModelConnection::all())
        ->with('vMake',vMakeConnection::all())
        ->with('vType',vTypeConnection::all())
        ->with('ppa',premiumPAConnection::orderBy('insuranceLimit')->get())
        ->with('pdg',premiumDGConnection::orderBy('insuranceLimit')->get())->render();
    }

    public function details_only_sent($req)
    {
        return view('pages.accounting-staff.transaction.insure-quote')
        ->with('id', -1)
        ->with('details',$req)
        ->with('type', -1)
        ->with('address',addressConnection::all())
        ->with('pInfo',personalInfoConnection::all())
        ->with('cperson',contactPersonConnection::all())
        ->with('company',inscompanyConnection::all())
        ->with('salesA',salesAgentConnection::all())
        ->with('client',clientConnection::all())
        ->with('policy',policynoConnection::all())
        ->with('vModel',vModelConnection::all())
        ->with('vMake',vMakeConnection::all())
        ->with('vType',vTypeConnection::all())
        ->with('ppa',premiumPAConnection::orderBy('insuranceLimit')->get())
        ->with('pdg',premiumDGConnection::orderBy('insuranceLimit')->get())->render();
    }

    public function view_indi_details(Request $req)
    {
    	return view('pages.accounting-staff.transaction.quotation-individual-details')
		->with('list', quotationListConnection::where('quote_ID', "=", $req->indi_id)->first())
		->with('indi', quotationIndividualConnection::where('quote_indi_ID', "=", $req->indi_id)->first())
		->with('agent', salesAgentConnection::all())
		->with('pinfo', personalInfoConnection::all())
		->with('insco', inscompanyConnection::all())
		->with('make' , vMakeConnection::all())
		->with('model', vModelConnection::all())
		->with('type' , vTypeConnection::all())
		->with('pdg'  , premiumDGConnection::all())
		->with('ppa'  , premiumPAConnection::all())
		->with('cprns', contactPersonConnection::all());
    }

    public function view_comp_details(Request $req)
    {
    	return view('pages.accounting-staff.transaction.quotation-company-details')
		->with('list', quotationListConnection::where('quote_ID', "=", $req->comp_id)->first())
		->with('comp', quotationCompanyConnection::where('quote_comp_ID', "=", $req->comp_id)->first())
		->with('agent', salesAgentConnection::all())
		->with('pinfo', personalInfoConnection::all())
		->with('insco', inscompanyConnection::all())
		->with('make' , vMakeConnection::all())
		->with('model', vModelConnection::all())
		->with('type' , vTypeConnection::all())
		->with('pdg'  , premiumDGConnection::all())
		->with('ppa'  , premiumPAConnection::all())
		->with('cprns', contactPersonConnection::all());
    }
}
