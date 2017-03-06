<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\policynoConnection;

use App\inscompanyConnection;

use App\policyStatusConnection;

class pnumberController extends Controller
{
    public function __construct(inscompanyConnection $inscomp, policynoConnection $pnumber)
    {
        $this->icomp = $inscomp;
        $this->pnum = $pnumber;
    }

    public function index()
    {
      return view('/pages/maintenance/policy numbers')
      ->with('pnm',policynoConnection::all())
      ->with('stat',policyStatusConnection::all())
      ->with('com',inscompanyConnection::all());
    }

    public function add_policy(Request $req)
    {
       $this->pnum->policy_number = $req->pnumbah;
       $this->pnum->insurance_compID = $req->compdrop;
       $this->pnum->policyStatus_ID = $req->statdrop;
       $mytime = $req->time;
       $this->pnum->created_at = $mytime;
       $this->pnum->updated_at = $mytime;
       $this->pnum->del_flag = 0;

       $this->pnum->save();

       return redirect('admin/maintenance/policyno');
    }

    public function update_policy(Request $req)
    {
       $pnum = policynoConnection::where('policy_number', '=', $req->pnid)->first();
       $pnum->policy_number = $req->apnumbah;
       $pnum->insurance_compID = $req->acompdrop;
       $pnum->policyStatus_ID = $req->astatdrop;
       $mytime = $req->atime;
       $pnum->updated_at = $mytime;

       $pnum->save();
       return redirect('admin/maintenance/policyno');
    }

    public function delete_policy(Request $req)
    {
       $pnum = policynoConnection::where('policy_number', '=', $req->pnid)->first();
       $pnum->del_flag = 1;

       $pnum->save();
       return redirect('admin/maintenance/policyno');
    }


}
