<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\checkStatusConnection;

class checkStatusController extends Controller
{
    public function __construct(checkStatusConnection $invstat)
    {
        $this->check = $invstat;
    }

    public function index()
    {
        return view('/pages/maintenance/checkStatus')
        ->with('checkstat',checkStatusConnection::all());
    }

    public function add_check(Request $req)
    {
        $this->check->checkStatus_name =  $req->checkStatus_name;
        $this->check->checkStatus_desc =  $req->checkStatus_desc;
        $mytime = $req->time;
        $this->check->created_at = $mytime;
        $this->check->updated_at = $mytime;
        $this->check->del_flag = 0;
        $this->check->save();

        return redirect('/admin/maintenance/check/status');
    }

    public function update_check(Request $req)
    {
        $check = checkStatusConnection::where('checkStatus_ID','=',$req->id)->first();

        $check->checkStatus_name =  $req->acheckStatus_name;
        $check->checkStatus_desc =  $req->acheckStatus_desc;
        $mytime = $req->atime;
        $check->updated_at = $mytime;
        $check->save();

        return redirect('/admin/maintenance/check/status');
    }

    public function delete_check(Request $req)
    {
        $check = checkStatusConnection::where('checkStatus_ID','=',$req->id)->first();

        $check->del_flag = 1;

        $check->save();

        return redirect('/admin/maintenance/check/status');
    }
}
