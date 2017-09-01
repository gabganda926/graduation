<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\clientListConnection;

use App\inscompanyConnection;

use App\addressConnection;

use App\personalInfoConnection;

use App\contactPersonConnection;

use App\salesAgentConnection;

use App\employeeConnection;

use Alert;

use Redirect;

class maint_ClientCompanyController extends Controller
{
	public function __construct(contactPersonConnection $contactPerson,inscompanyConnection $comp, addressConnection $add, personalInfoConnection $personalinfo, salesAgentConnection $salesA, clientListConnection $clist)
    {
        $this->list = $clist;
        $this->company = $comp;
        $this->address = $add;
        $this->cPerson = $contactPerson;
        $this->pinfo = $personalinfo;
        $this->sales = $salesA;
    }

    public function index()
    {
      return view('/pages/admin/maintenance/clientCompany')
      ->with('company',inscompanyConnection::all())
      ->with('cpr',contactPersonConnection::all())
      ->with('pInfo',personalInfoConnection::all())
      ->with('sales',salesAgentConnection::all())
      ->with('add',addressConnection::all())
      ->with('emp',employeeConnection::all());
    }

    public function add_client_comp(Request $req)
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
	        return $this->add_cperson_info($req);
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

	public function add_cperson_info($req)
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

  	public function add_cPerson($req)
  	{
      	$latestidpinfo = personalInfoConnection::orderBy('pinfo_ID', 'desc')->first();
      	$this->cPerson->personal_info_ID = (int)$latestidpinfo->pinfo_ID;
      	try
    	{
      	$this->cPerson->save();
      	return $this->add_client_list($req);
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

    public function add_client_list($req)
    {
      $this->list->client_type = 2;
      $this->list->client_flag = 1;
      $mytime = $req->time;
      $this->list->created_at = $mytime;
      $this->list->updated_at = $mytime;
      $this->list->del_flag  = 0;
      try
      {
        $this->list->save();
        return $this->add_data($req);
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

    public function add_data($req)
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
	    $this->company->comp_sales_agent = $req->comp_sales_agent;

      try
      {
        $this->company->save();
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

	public function update_client_comp(Request $req)
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
            ->error('ERROR', $e->getMessage())
            ->persistent("Close");

            return Redirect::back();
          }
        }
    }

    public function update_cperson_info($req)
    {
        $pinfo = personalInfoConnection::where('pinfo_ID','=',$req->apinfo_ID)->first();
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
        return $this->update_client_list($req);
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

    public function update_client_list($req)
    {
      $list = clientListConnection::where('client_ID', '=', $req->bnkid)->first();
      $list->updated_at = $req->atime;

      try
      {
        $list->save();
        return $this->update_data($req);
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

    public function update_data(Request $req)
    {
      $comp = inscompanyConnection::where('comp_ID', '=', $req->bnkid)->first();

      $comp->comp_name = $req->acomp_name;
	    $comp->comp_faxnum = $req->acomp_faxnum;
	    $comp->comp_telnum = $req->acomp_telnum;
	    $comp->comp_email = $req->acomp_email;
	    $comp->comp_type = 1;
	    $comp->comp_sales_agent = $req->acomp_sales_agent;
      try
      {
        $comp->save();
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

    public function delete_client_comp(Request $req)
    {
        $comp = clientListConnection::where('client_ID', '=', $req->bnkid)->first();

        $comp->del_flag = 1;
        $comp->updated_at = $req->atime;

        try
        {
          $comp->save();
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

    public function ardelete_client_comp(Request $req)
    {
        foreach($req->asd as $ID)
        {
            $comp = clientListConnection::where('client_ID', '=', $ID)->first();

            $comp->del_flag = 1;
            $comp->updated_at = $req->time;

            $comp->save();
        }
    }
}
