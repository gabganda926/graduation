<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\transmittalStatusConnection;

class transmittalStatusController extends Controller
{
    public function __construct(transmittalStatusConnection $transStat)
    {
        $this->trans = $transStat;
    }

    public function index()
    {
        return view('/pages/maintenance/transStatus')
        ->with('transtat', transmittalStatusConnection::all());
    }

    public function add_trans(Request $req)
    {

    	$this->trans->transmittalStatus_name = $req->transmittalStatus_name;
    	$this->trans->transmittalStatus_desc = $req->transmittalStatus_desc;
      $mytime = $req->time;
      $this->trans->created_at = $mytime;
      $this->trans->updated_at = $mytime;
    	$this->trans->del_flag = 0;

    	$this->trans->save();

      return redirect('/admin/maintenance/transmittal/status');
    }

    public function update_trans(Request $req)
    {
    	$trans = transmittalStatusConnection::where('transmittalStatus_ID','=', $req->id)->first();

    	$trans->transmittalStatus_name = $req->atransmittalStatus_name;
    	$trans->transmittalStatus_desc = $req->atransmittalStatus_desc;
      $mytime = $req->atime;
      $trans->updated_at = $mytime;
    	$trans->save();

      return redirect('/admin/maintenance/transmittal/status');
    }

    public function delete_trans(Request $req)
    {
    	$trans = transmittalStatusConnection::where('transmittalStatus_ID','=', $req->id)->first();

    	$trans->del_flag = 1;

    	$trans->save();

      return redirect('/admin/maintenance/transmittal/status');
    }
}
