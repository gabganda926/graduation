<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\senderConnection;

use App\personalInfoConnection;

class senderController extends Controller
{
  public function __construct(senderConnection $cor, personalInfoConnection $personalinfo)
  {
      $this->sender = $cor;
      $this->pinfo = $personalinfo;
  }

  public function index()
  {
    return view('/pages/maintenance/sender')
    ->with('snd',senderConnection::all())
    ->with('pnf',personalInfoConnection::all());
  }

  public function add_sender(Request $req)
  {
      if ($req->emp_middle_name == null)
      {
        $this->pinfo->pinfo_first_name = $req->emp_first_name;
        $this->pinfo->pinfo_last_name = $req->emp_last_name;
      }
      else
      {
        $this->pinfo->pinfo_first_name = $req->emp_first_name;
        $this->pinfo->pinfo_middle_name = $req->emp_middle_name;
        $this->pinfo->pinfo_last_name = $req->emp_last_name;
      }
      $this->pinfo->pinfo_contact = $req->emp_contact;
      $this->pinfo->pinfo_mail = $req->emp_mail;
      $this->pinfo->del_flag  = 0;
      if($this->pinfo->save())
      {
        return $this->add_data($req);
      }
  }

  public function add_data($req)
  {
      $latestidpinfo = personalInfoConnection::orderBy('pinfo_ID', 'desc')->first();
      $this->sender->personal_info_ID = (int)$latestidpinfo->pinfo_ID;
      $mytime = $req->time;
      $this->sender->created_at = $mytime;
      $this->sender->updated_at = $mytime;
      $this->sender->del_flag  = 0;
      $this->sender->save();

      return redirect('admin/maintenance/sender');
  }

  public function update_sender(Request $req)
  {
      $pinfo = personalInfoConnection::where('pinfo_ID', '=', $req->pInfo_ID)->first();
      $pinfo->pinfo_first_name = $req->aemp_first_name;
      $pinfo->pinfo_middle_name = $req->aemp_middle_name;
      $pinfo->pinfo_last_name = $req->aemp_last_name;
      $pinfo->pinfo_contact = $req->aemp_contact;
      $pinfo->pinfo_mail = $req->aemp_email;
      $pinfo->del_flag  = 0;
      if($pinfo->save())
      {
        return $this->update_data($req);
      }
  }

  public function update_data($req)
  {
      $sender = senderConnection::where('sender_ID', '=', $req->aemp_id)->first();

      $mytime = $req->atime;
      $sender->updated_at = $mytime;

      $sender->save();

      return redirect('admin/maintenance/sender');
  }

  public function delete_sender(Request $req)
  {
      $sender = senderConnection::where('emp_ID', '=', $req->aemp_id)->first();

      $sender->del_flag = 1;

      $sender->save();

      return redirect('admin/maintenance/sender');
  }
}
