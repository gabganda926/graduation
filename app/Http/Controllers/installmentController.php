<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\installmentConnection;

class installmentController extends Controller
{
    public function __construct(installmentConnection $inst)
    {
        $this->instal = $inst;
    }

    public function index()
    {
      return view('/pages/maintenance/installment')
      ->with('ins',installmentConnection::all());
    }

    public function add_installment(Request $req)
    {
    	$this->instal->installment_type = $req->installment_type;
    	$this->instal->installment_desc = $req->installment_desc;
      $mytime = $req->time;
      $this->instal->created_at = $mytime;
      $this->instal->updated_at = $mytime;
      $this->instal->del_flag = 0;
    	$this->instal->save();
    	return redirect('/admin/maintenance/installment/type');
    }

    public function update_installment(Request $req)
    {
       $instal = installmentConnection::where('installment_ID', '=', $req->instid)->first();
       $instal->installment_type = $req->ainstallment_type;
     	 $instal->installment_desc = $req->ainstallment_desc;
       $mytime = $req->atime;
       $instal->updated_at = $mytime;
       $instal->save();
       return redirect('/admin/maintenance/installment/type');
    }

    public function delete_installment(Request $req)
    {
       $instal = installmentConnection::where('installment_ID', '=', $req->instid)->first();
       $instal->del_flag = 1;

       $instal->save();
       return redirect('/admin/maintenance/installment/type');
    }
}
