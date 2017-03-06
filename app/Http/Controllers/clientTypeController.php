<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\clientTypeConnection;

class clientTypeController extends Controller
{
    public function __construct(clientTypeConnection $clientype)
    {
        $this->ctype = $clientype;
    }

    public function index()
    {
        return view('/pages/maintenance/clientType')
        ->with('clienttype',clientTypeConnection::all());
    }

    public function add_ctype(Request $req)
    {
      $this->ctype->clientType_type = $req->clientType_type;
      $this->ctype->clientType_desc = $req->clientType_desc;
      $mytime = $req->time;
      $this->ctype->created_at = $mytime;
      $this->ctype->updated_at = $mytime;
      $this->ctype->del_flag = 0;

      $this->ctype->save();

      return redirect('/admin/maintenance/client/type');
    }

    public function update_ctype(Request $req)
    {
      $ctype = clientTypeConnection::where('clientType_ID','=',$req->id)->first();

      $ctype->clientType_type = $req->aclientType_type;
      $ctype->clientType_desc = $req->aclientType_desc;
      $mytime = $req->atime;
      $ctype->updated_at = $mytime;
      $ctype->save();

      return redirect('/admin/maintenance/client/type');
    }

    public function delete_ctype(Request $req)
    {
      $ctype = clientTypeConnection::where('clientType_ID','=',$req->id)->first();
      $ctype->del_flag = 1;

      $ctype->save();

      return redirect('/admin/maintenance/client/type');
    }
}
