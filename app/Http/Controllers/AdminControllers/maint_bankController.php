<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\BankConnection;

use App\addressConnection;

use App\contactPersonConnection;

use App\personalInfoConnection;

use Alert;

use Redirect;

class maint_bankController extends Controller
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
      return view('/pages/admin/maintenance/bank')//page link from local drive
      ->with('bank',bankConnection::all())//data from database
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

      try
      {
        $this->address->save();
        return $this->add_cpersoninfo($req);
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
          ->error('ERROR', $e->getmessage())
          ->persistent("Close");

          return Redirect::back();
        }
      }
    }

    public function add_cpersoninfo($req)
    {
        if ($req->cPerson_middle_name == null)
        {
        $this->pinfo->pinfo_first_name = $req->cPerson_first_name;
        $this->pinfo->pinfo_last_name = $req->cPerson_last_name;
        }
        else
        {
          $this->pinfo->pinfo_first_name = $req->cPerson_first_name;
          $this->pinfo->pinfo_middle_name = $req->cPerson_middle_name;
          $this->pinfo->pinfo_last_name = $req->cPerson_last_name;
        }
        $this->pinfo->pinfo_cpnum_1 = $req->pinfo_cpnum_1;
        $this->pinfo->pinfo_cpnum_2 = $req->pinfo_cpnum_2;
        $this->pinfo->pinfo_tpnum = $req->pinfo_tpnum;
        $this->pinfo->pinfo_age = $req->pinfo_bday;
        $this->pinfo->pinfo_gender = $req->pinfo_gender;
        $this->pinfo->pinfo_mail = $req->pinfo_mail;

        if($req->hasFile('picture'))
        {
          $file = $req->file('picture');

          $extension = \File::extension($file->getClientOriginalName());
          try
          {
            $id = personalInfoConnection::orderBy('pinfo_ID', 'desc')->first();
            $name = $req->cPerson_first_name . "_" . $req->cPerson_last_name  . "_" . ($id->pinfo_ID + 1) . "." . $extension;
          }
          catch(\Exception $e)
          {
            $name = $req->cPerson_first_name . "_" . $req->cPerson_last_name  . "_" . 1 . "." . $extension;
          }

          $this->pinfo->pinfo_picture = $name;

          $file->move(public_path().'/image/contact_person/', $name);
        }

        try
        {
          $this->pinfo->save();
          return $this->add_cPerson($req);
        }
        catch(\Exception $e)
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

    public function add_cPerson($req)
    {
        $latestidpinfo = personalInfoConnection::orderBy('pinfo_ID', 'desc')->first();
        $this->cPerson->personal_info_ID = (int)$latestidpinfo->pinfo_ID;
        try
        {
          $this->cPerson->save();
          return $this->add_data($req);
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
            ->error('ERROR', $e->getmessage())
            ->persistent("Close");

            return Redirect::back();
          }
        }
    }

    public function add_data($req)
    {
        $latestid = addressConnection::orderBy('add_ID', 'desc')->first();
        $cpersonid = contactPersonConnection::orderBy('cPerson_ID', 'desc')->first();
        $this->banko->bank_name = $req->bank_name;
        $this->banko->bank_name_alt = $req->bank_name_alt;
        $this->banko->bank_mail = $req->bank_mail;
        $this->banko->bank_faxnum = $req->bank_faxnum;
        $this->banko->bank_telnum = $req->bank_telnum;
        $this->banko->bank_add_ID = (int)$latestid->add_ID;
        $this->banko->bank_cperson_ID = (int)$cpersonid->cPerson_ID;
        $mytime = $req->time;
        $this->banko->created_at = $mytime;
        $this->banko->updated_at = $mytime;
        $this->banko->del_flag = 0;
        try
        {
          $this->banko->save();
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
            ->error('ERROR', $e->getmessage())
            ->persistent("Close");

            return Redirect::back();
          }
        }
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
          $addres->add_subdivision = $req->aadd_subdivision;
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

        try
        {
          $addres->save();
          return $this->update_cperson_info($req);
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
            ->error('ERROR', $e->getmessage())
            ->persistent("Close");

            return Redirect::back();
          }
        }
    }

    public function update_cperson_info($req)
    {
        $pinfo = personalInfoConnection::where('pinfo_ID','=',$req->pinfo_ID)->first();

        if($req->hasFile('apicture'))
        {
          $file = $req->file('apicture');

          $extension = \File::extension($file->getClientOriginalName());

          if($req->has('acPerson_first_name') && $req->has('acPerson_last_name'))
            $name = $req->acPerson_first_name . "_" . $req->acPerson_last_name  . "_" . $pinfo->pinfo_ID . "." . $extension;
          else if ($req->has('acPerson_first_name'))
            $name = $req->acPerson_first_name . "_" . $pinfo->pinfo_last_name  . "_" . $pinfo->pinfo_ID . "." . $extension;
          else if ($req->has('acPerson_last_name'))
            $name = $pinfo->pinfo_first_name . "_" . $req->acPerson_last_name  . "_" . $pinfo->pinfo_ID . "." . $extension;
          else
            if(empty($pinfo->pinfo_picture))
              $name = $pinfo->pinfo_first_name . "_" . $pinfo->pinfo_last_name  . "_" . $pinfo->pinfo_ID . "." . $extension;
            else
              $name = $pinfo->pinfo_picture;

          \File::delete(public_path().'/image/contact_person/'.$pinfo->pinfo_picture);

          $pinfo->pinfo_picture = $name;
          
          $file->move(public_path().'/image/contact_person/', $name);
        }
          
        $pinfo->pinfo_first_name = $req->acPerson_first_name;
        $pinfo->pinfo_middle_name = $req->acPerson_middle_name;
        $pinfo->pinfo_last_name = $req->acPerson_last_name;
        $pinfo->pinfo_cpnum_1 = $req->apinfo_cpnum_1;
        $pinfo->pinfo_cpnum_2 = $req->apinfo_cpnum_2;
        $pinfo->pinfo_tpnum = $req->apinfo_tpnum;
        $pinfo->pinfo_age = $req->apinfo_bday;
        $pinfo->pinfo_gender = $req->apinfo_gender;
        $pinfo->pinfo_mail = $req->apinfo_mail;

      try
      {
        $pinfo->save();
        return $this->update_data($req);
      }
      catch(\Exception $e)
      {
        $message = $e->getCode();
        if($message == 23000)
        {
            alert()
            ->error('ERROR', $e->getmessage())
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
          ->error('ERROR', $e->getmessage())
          ->persistent("Close");

          return Redirect::back();
        }
      }
    }

    public function update_data(Request $req)
    {
        $bank = bankConnection::where('bank_ID', '=', $req->abnkid)->first();

        $bank->bank_name = $req->abank_name;
        $bank->bank_name_alt = $req->abank_name_alt;
        $bank->bank_mail = $req->abank_mail;
        $bank->bank_faxnum = $req->abank_faxnum;
        $bank->bank_telnum = $req->abank_telnum;
        $mytime = $req->atime;
        $bank->updated_at = $mytime;
        try
        {
          $bank->save();
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
            ->error('ERROR', $e->getmessage())
            ->persistent("Close");

            return Redirect::back();
          }
        }
    }

    public function delete_bank(Request $req)
    {
        $banko = bankConnection::where('bank_ID', '=', $req->abnkid)->first();

        $banko->del_flag = 1;
        $banko->updated_at = $req->atime;

        try
        {
          $banko->save();
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
            ->error('ERROR', $e->getmessage())
            ->persistent("Close");

            return Redirect::back();
          }
        }
    }

    public function ardelete_bank(Request $req)
    {
        foreach($req->asd as $ID)
        {
            $banko = bankConnection::where('bank_ID', '=', $ID)->first();

            $banko->del_flag = 1;
            $banko->updated_at = $req->time;

            $banko->save();
        }
    }
}
