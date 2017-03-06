<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\bankConnection;

use App\addressConnection;

use App\contactPersonConnection;

use App\personalInfoConnection;

class bankController extends Controller
{
    public function __construct(contactPersonConnection $contactPerson,bankConnection $bnk, addressConnection $add, personalInfoConnection $personalinfo)
    {
        $this->banko = $bnk;
        $this->address = $add;
        $this->cPerson = $contactPerson;
        $this->pinfo = $personalinfo;
    }

    public function index()
    {
      return view('/pages/maintenance/bank')
      ->with('bank',bankConnection::all())
      ->with('cpr',contactPersonConnection::all())
      ->with('pInfo',personalInfoConnection::all())
      ->with('add',addressConnection::all());
    }

    public function add_bank(Request $req)
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
        $this->address->del_flag = 0;

        if($this->address->save())
        {
          return $this->add_cpersoninfo($req);
        }
    }

    public function add_cpersoninfo($req)
    {
        if ($req->cPerson_middle_name == null)
        {
        $this->pinfo->pinfo_first_name = $req->cPerson_first_name;
        $this->pinfo->pinfo_middle_name = $req->cPerson_middle_name;
        }
        else
        {
          $this->pinfo->pinfo_first_name = $req->cPerson_first_name;
          $this->pinfo->pinfo_middle_name = $req->cPerson_middle_name;
          $this->pinfo->pinfo_last_name = $req->cPerson_last_name;
        }
        $this->pinfo->pinfo_contact = $req->cPerson_contact;
        $this->pinfo->pinfo_mail = $req->cPerson_email;
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
          return $this->add_data($req);
        }
    }

    public function add_data($req)
    {
        $latestid = addressConnection::orderBy('add_ID', 'desc')->first();
        $cpersonid = contactPersonConnection::orderBy('cPerson_ID', 'desc')->first();
        $this->banko->bank_name = $req->bank_name;
        $this->banko->bank_code = $req->bank_code;
        $this->banko->bank_add_ID = (int)$latestid->add_ID;
        $this->banko->bank_cperson_ID = (int)$cpersonid->cPerson_ID;
        $mytime = $req->time;
        $this->banko->created_at = $mytime;
        $this->banko->updated_at = $mytime;
        $this->banko->del_flag = 0;
        $this->banko->save();

        return redirect('admin/maintenance/bank');
    }

    public function update_bank(Request $req)
    {
        $addres = addressConnection::where('add_ID', '=', $req->aaddid)->first();

        if($req->aadd_blcknum != null)
        {
          $addres->add_blcknum = $req->aadd_blcknum;
        }
        if($req->aadd_street != null)
        {
          $addres->add_street = $req->aadd_street;
        }
        if($req->aadd_subdivision != null)
        {
          $addres->aadd_subdivision = $req->aadd_subdivision;
        }
        if($req->aadd_brngy != null)
        {
          $addres->add_brngy = $req->aadd_brngy;
        }
        if($req->aadd_district != null)
        {
          $addres->add_district = $req->aadd_district;
        }
        if($req->aadd_city != null)
        {
          $addres->add_city = $req->aadd_city;
        }
        if($req->aadd_province != null)
        {
          $addres->add_province = $req->aadd_province;
        }
        if($req->aadd_region != null)
        {
          $addres->add_region = $req->aadd_region;
        }
        if($req->aadd_zipcode != null)
        {
          $addres->add_zipcode = $req->aadd_zipcode;
        }

        if($addres->save())
        {
          return $this->update_cPerson_info($req);
        }
    }

    public function update_cperson_info($req)
    {
        $pinfo = personalInfoConnection::where('pinfo_ID','=',$req->pinfo_ID)->first();
        $pinfo->pinfo_first_name = $req->acPerson_first_name;
        $pinfo->pinfo_middle_name = $req->acPerson_middle_name;
        $pinfo->pinfo_last_name = $req->acPerson_last_name;
        $pinfo->pinfo_contact = $req->acPerson_contact;
        $pinfo->pinfo_mail = $req->acPerson_email;
        $pinfo->del_flag  = 0;
        if($pinfo->save())
        {
          return $this->update_data($req);
        }
    }

    public function update_data($req)
    {
        $bank = bankConnection::where('bank_ID', '=', $req->abnkid)->first();

        $bank->bank_name = $req->abank_name;
        $bank->bank_code = $req->abank_code;
        $mytime = $req->atime;
        $bank->updated_at = $mytime;
        $bank->save();

        return redirect('admin/maintenance/bank');
    }

    public function delete_cPerson($req)
    {
        $cPerson = contactPersonConnection::where('cPerson_ID','=',$req->cpersonID)->first();

        $cPerson->del_flag = 1;

        if($cPerson->save())
        {
          return $this->delete_data($req);
        }
    }

    public function delete_bank(Request $req)
    {
      $address = addressConnection::where('add_ID', '=', $req->aaddid)->first();

      $address->del_flag = 1;

      if($address->save())
      {
        return $this->delete_cPerson($req);
      }

    }

    public function delete_data($req)
    {
        $banko = bankConnection::where('bank_ID', '=', $req->abnkid)->first();

        $banko->del_flag = 1;

        $banko->save();

        return redirect('admin/maintenance/bank');
    }
}
