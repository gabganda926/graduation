<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\courierConnection;

use App\addressConnection;

use App\personalInfoConnection;

use Alert;

use Redirect;

class maint_courierController extends Controller
{
  public function __construct(courierConnection $cor, addressConnection $add, personalInfoConnection $personalinfo)
  {
      $this->courier = $cor;
      $this->address = $add;
      $this->pinfo = $personalinfo;
  }

  public function index()
  {
    return view('/pages/admin/maintenance/courier')
    ->with('cor',courierConnection::all())
    ->with('pnf',personalInfoConnection::all())
    ->with('address',addressConnection::all());
  }

   public function add_courier(Request $req)
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
        return $this->add_courier_info($req);
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

  public function add_courier_info(Request $req)
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

        $file->move(public_path().'/image/courier/', $name);
      }
      try
      {
        $this->pinfo->save();
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
          ->error('ERROR', $e->getMessage())
          ->persistent("Close");

          return Redirect::back();
        }
      }
  }

  public function add_data($req)
  {
      $latestid = addressConnection::orderBy('add_ID', 'desc')->first();
      $latestidpinfo = personalInfoConnection::orderBy('pinfo_ID', 'desc')->first();
      $this->courier->personal_info_ID = (int)$latestidpinfo->pinfo_ID;
      $this->courier->courier_add_ID = (int)$latestid->add_ID;
      $mytime = $req->time;
      $this->courier->created_at = $mytime;
      $this->courier->updated_at = $mytime;
      $this->courier->del_flag  = 0;
      try
      {
        $this->courier->save();
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
          ->error('ERROR', $e->getMessage())
          ->persistent("Close");

          return Redirect::back();
        }
      }
  }

  public function update_courier(Request $req)
      {
          $address = addressConnection::where('add_ID', '=', $req->aaddid)->first();

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

          try
          {
            $address->save();
            return $this->update_courier_info($req);
          }
          catch(\Exception $e)
          {
            $message = $e->getMessage();
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
              ->error('ERROR', $e->getMessage())
              ->persistent("Close");

              return Redirect::back();
            }
          }
      }

  public function update_courier_info(Request $req)
  {
      $pinfo = personalInfoConnection::where('pinfo_ID', '=', $req->apInfo_ID)->first();

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

        \File::delete(public_path().'/image/courier/'.$pinfo->pinfo_picture);

        $pinfo->pinfo_picture = $name;
        
        $file->move(public_path().'/image/courier/', $name);
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
          ->error('ERROR', $e->getMessage())
          ->persistent("Close");

          return Redirect::back();
        }
      }
  }

  public function update_data($req)
  {
      $courier = courierConnection::where('courier_ID', '=', $req->aemp_id)->first();

      $mytime = $req->atime;
      $courier->updated_at = $mytime;

      try
      {
        $courier->save();
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
          ->error('ERROR', $e->getMessage())
          ->persistent("Close");

          return Redirect::back();
        }
      }

  }

  public function delete_courier(Request $req)
  {
      $courier = courierConnection::where('courier_ID', '=', $req->aemp_id)->first();

      $courier->del_flag = 1;
      $mytime = $req->atime;
      $courier->updated_at = $mytime;

      try
      {
        $courier->save();
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
          ->error('ERROR', $e->getMessage())
          ->persistent("Close");

          return Redirect::back();
        }
      }
  }

  public function ardelete_courier(Request $req)
  {
      foreach($req->asd as $ID)
      {
        $courier = courierConnection::where('courier_ID', '=', $ID)->first();

        $courier->del_flag = 1;
        $mytime = $req->time;
        $courier->updated_at = $mytime;

        $courier->save();
      }
  }
}
