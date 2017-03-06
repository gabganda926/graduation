<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\policyStatusConnection;

class policyStatusController extends Controller
{

	public function __construct(policyStatusConnection $polystat)
	{
		$this->pstat = $polystat;
	}

    public function index()
    {
        return view('/pages/maintenance/pnStatus')
        ->with('policystat',policyStatusConnection::all());
    }

    public function add_pstat(Request $req)
    {
    	$this->pstat->policyStatus_name = $req->policyStatus_name;
    	$this->pstat->policyStatus_desc = $req->policyStatus_desc;
			$mytime = $req->time;
			$this->pstat->created_at = $mytime;
			$this->pstat->updated_at = $mytime;
    	$this->pstat->del_flag = 0;

    	$this->pstat->save();

    	return redirect('/admin/maintenance/policyno/status');
    }

    public function update_pstat(Request $req)
    {
    	$pstat = policyStatusConnection::where('policyStatus_ID','=',$req->id)->first();

    	$pstat->policyStatus_name = $req->apolicyStatus_name;
    	$pstat->policyStatus_desc = $req->apolicyStatus_desc;
			$mytime = $req->atime;
			$pstat->updated_at = $mytime;
    	$pstat->save();

    	return redirect('/admin/maintenance/policyno/status');
    }

    public function delete_pstat(Request $req)
    {
    	$pstat = policyStatusConnection::where('policyStatus_ID','=',$req->id)->first();

    	$pstat->del_flag = 1;

    	$pstat->save();

    	return redirect('/admin/maintenance/policyno/status');
    }
}
