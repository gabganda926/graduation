<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\claimStatusConnection;

class claimStatusController extends Controller
{
    public function __construct(claimStatusConnection $claimStat)
    {
        $this->claim = $claimStat;
    }

    public function index()
    {
        return view('/pages/maintenance/claimStatus')
        ->with('claimstatus', claimStatusConnection::all());
    }

    public function add_claim(Request $req)
    {
    	$this->claim->claimStatus_name = $req->claimStatus_name;
    	$this->claim->claimStatus_desc = $req->claimStatus_desc;

    	$this->claim->del_flag = 0;

    	$this->claim->save();

    	return redirect('admin/maintenance/claim/status');
    }

    public function update_claim(Request $req)
    {
    	$claim = claimStatusConnection::where('claimStatus_ID','=', $req->id)->first();

    	$claim->claimStatus_name = $req->aclaimStatus_name;
    	$claim->claimStatus_desc = $req->aclaimStatus_desc;

    	$claim->save();

    	return redirect('admin/maintenance/claim/status');
    }

    public function delete_claim(Request $req)
    {
    	$claim = claimStatusConnection::where('claimStatus_ID','=', $req->id)->first();

    	$claim->del_flag = 1;

    	$claim->save();

    	return redirect('admin/maintenance/claim/status');
    }
}
