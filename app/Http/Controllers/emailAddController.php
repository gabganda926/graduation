<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\emailAddConnection;

class emailAddController extends Controller
{
    public function __construct(emailAddConnection $emailAdd)
    {
        $this->email = $emailAdd;
    }

    public function index()
    {
        return view('/pages/maintenance/emailAdd')
        ->with('emailadd', emailAddConnection::all());
    }

     public function add_mail(Request $req)
    {
        $this->email->compreEmail_name =  $req->compreEmail_name;
        $this->email->compreEmail_desc =  $req->compreEmail_desc;
        $this->email->del_flag = 0;

        $this->email->save();

        return redirect('/admin/maintenance/company/email/status');
    }

    public function update_mail(Request $req)
    {
        $email = emailStatusConnection::where('compreEmail_ID','=',$req->id)->first();

        $email->compreEmail_name =  $req->acompreEmail_name;
        $email->compreEmail_desc =  $req->acompreEmail_desc;

        $email->save();

        return redirect('/admin/maintenance/email/status');
    }

    public function delete_mail(Request $req)
    {
        $email = emailStatusConnection::where('compreEmail_ID','=',$req->id)->first();

        $email->del_flag = 1;

        $email->save();

        return redirect('/admin/maintenance/company/email/status');
    }
}
