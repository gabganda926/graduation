<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\debtStatusConnection;

class debtStatusController extends Controller
{
    public function __construct(debtStatusConnection $debtstatus)
    {
      $this->debt = $debtstatus;
    }

    public function index()
    {
      return view('/pages/maintenance/debtStatus')
      ->with('debtstat', debtStatusConnection::all());
    }

    public function add_debt(Request $req)
    {
        $this->debt->debtStatus_name =  $req->debtStatus_name;
        $this->debt->debtStatus_desc =  $req->debtStatus_desc;
        $this->debt->del_flag = 0;

        $this->debt->save();

        return redirect('/admin/maintenance/debt/status');
    }

    public function update_debt(Request $req)
    {
        $debt = debtStatusConnection::where('debtStatus_ID','=',$req->id)->first();

        $debt->debtStatus_name =  $req->adebtStatus_name;
        $debt->debtStatus_desc =  $req->adebtStatus_desc;

        $debt->save();

        return redirect('/admin/maintenance/debt/status');
    }

    public function delete_debt(Request $req)
    {
        $debt = debtStatusConnection::where('debtStatus_ID','=',$req->id)->first();

        $debt->del_flag = 1;

        $debt->save();

        return redirect('/admin/maintenance/debt/status');
    }
}
