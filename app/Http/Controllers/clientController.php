<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\addressConnection;

use App\clientConnection;

use App\personalInfoConnection;

use App\salesAgentConnection;

use App\policynoConnection;

use App\clientTypeConnection;

class clientController extends Controller
{
  public function __construct(clientConnection $cli, addressConnection $add, personalInfoConnection $personalinfo)
  {
      $this->client = $cli;
      $this->address = $add;
      $this->pinfo = $personalinfo;
  }

  public function index()
  {
    return view('/pages/maintenance/client')
    ->with('cli',clientConnection::all())
    ->with('sales',salesAgentConnection::all())
    ->with('pnum',policynoConnection::all())
    ->with('ctype',clientTypeConnection::all())
    ->with('pnf',personalInfoConnection::all())
    ->with('add',addressConnection::all());
  }

  public function add_client(Request $req)
  {
      if($req->add_blcknum != null)
      {
        $this->address->add_blcknum = $req->add_blcknum;
      }
      if($req->add_street != null)
      {
        $this->address->add_street = $req->add_street;
      }
      if($req->add_subdivision != null)
      {
        $this->address->add_subdivision = $req->add_subdivision;
      }
      if($req->add_brngy != null)
      {
        $this->address->add_brngy = $req->add_brngy;
      }
      if($req->add_district != null)
      {
        $this->address->add_district = $req->add_district;
      }
      if($req->add_city != null)
      {
        $this->address->add_city = $req->add_city;
      }
      if($req->add_province != null)
      {
        $this->address->add_province = $req->add_province;
      }
      if($req->add_region != null)
      {
        $this->address->add_region = $req->add_region;
      }
      if($req->add_zipcode != null)
      {
        $this->address->add_zipcode = $req->add_zipcode;
      }
        $this->address->del_flag  = 0;
      if($this->address->save())
      {
        return $this->add_cli_info($req);
      }
  }

  public function add_cli_info($req)
  {
      if ($req->cli_middle_name == null)
      {
        $this->pinfo->pinfo_first_name = $req->cli_first_name;
        $this->pinfo->pinfo_last_name = $req->cli_last_name;
      }
      else
      {
        $this->pinfo->pinfo_first_name = $req->cli_first_name;
        $this->pinfo->pinfo_middle_name = $req->cli_middle_name;
        $this->pinfo->pinfo_last_name = $req->cli_last_name;
      }
      $this->pinfo->pinfo_contact = $req->cli_contact;
      $this->pinfo->pinfo_mail = $req->cli_mail;
      $this->pinfo->del_flag  = 0;
      if($this->pinfo->save())
      {
        return $this->add_cPerson($req);
      }
  }

  public function add_cPerson($req)
  {
      $latestidpinfo = personalInfoConnection::orderBy('pinfo_ID', 'desc')->first();
      $this->cPerson->personal_info_ID = (int)$latestidpinfo->pinfo_ID;
      $this->cPerson->del_flag = 0;
      if($this->cPerson->save())
      {
        return $this->add_emp($req);
      }
  }

  public function add_emp($req)
  {
      $latestid = addressConnection::orderBy('add_ID', 'desc')->first();
      $latestidpinfo = personalInfoConnection::orderBy('pinfo_ID', 'desc')->first();
      $this->client->cli_add_ID = (int)$latestid->add_ID;
      $this->client->personal_info_ID = (int)$latestidpinfo->pinfo_ID;
      $mytime = $req->time;
      $this->client->created_at = $mytime;
      $this->client->updated_at = $mytime;
      $this->client->del_flag  = 0;
      $this->client->save();

      return redirect('admin/maintenance/client');
  }

  public function update_client(Request $req,addressConnection $add,  clientConnection $emp)
  {
      $address = $add::where('add_ID', '=', $req->aadd_id)->first();

      if($req->aadd_blcknum != null)
      {
        $address->add_blcknum = $req->aadd_blcknum;
      }
      if($req->add_street != null)
      {
        $address->add_street = $req->aadd_street;
      }
      if($req->aadd_subdivision != null)
      {
        $address->add_subdivision = $req->aadd_subdivision;
      }
      if($req->aadd_brngy != null)
      {
        $address->add_brngy = $req->aadd_brngy;
      }
      if($req->aadd_district != null)
      {
        $address->add_district = $req->aadd_district;
      }
      if($req->aadd_city != null)
      {
        $address->add_city = $req->aadd_city;
      }
      if($req->aadd_province != null)
      {
        $address->add_province = $req->aadd_province;
      }
      if($req->aadd_region != null)
      {
        $address->add_region = $req->aadd_region;
      }
      if($req->aadd_zipcode != null)
      {
        $address->add_zipcode = $req->aadd_zipcode;
      }

      if($address->save())
      {
        return $this->update_cli_info($req);
      }

  }

  public function update_cli_info($req)
  {
      $pinfo = personalInfoConnection::where('pinfo_ID', '=', $req->pInfo_ID)->first();

      $pinfo->pinfo_first_name = $req->acli_first_name;
      $pinfo->pinfo_middle_name = $req->acli_middle_name;
      $pinfo->pinfo_last_name = $req->acli_last_name;
      $pinfo->pinfo_contact = $req->cli_contact;
      $pinfo->pinfo_mail = $req->cli_mail;
      $pinfo->del_flag  = 0;
      if($this->pinfo->save())
      {
        return $this->update_emp($req);
      }
  }


  public function update_data($req)
  {
      $client = clientConnection::where('client_ID', '=', $req->acli_id)->first();

      $client->cli_type = $req->cli_type;

      $mytime = $req->atime;
      $this->banko->updated_at = $mytime;

      $client->save();

      return redirect('admin/maintenance/client');
  }

  public function delete_data($req)
  {
      $client = clientConnection::where('client_ID', '=', $req->acli_id)->first();

      $client->del_flag = 1;

      $client->save();

      return redirect('admin/maintenance/client');
  }


    public function delete_client(Request $req)
  {
      $address = addressConnection::where('add_ID', '=', $req->aadd_id)->first();

      $address->del_flag = 1;

      if($address->save())
      {
        return $this->delete_data($req);
      }

  }
}
