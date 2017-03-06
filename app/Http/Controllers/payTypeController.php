<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\payTypeConnection;

class payTypeController extends Controller
{
    public function __contruct(payTypeConnection $paytype)
    {
       $this->pay = $paytype;
    }

    public function index()
    {
      return view('/pages/maintenance/paymentType')
      ->with('payType', payTypeConnection::all());
    }

    public function add_pay(Request $req)
    {
        $this->pay->payment_type = $req->payment_type ;
        $this->pay->paymentType_desc = $req->paymentType_desc;
        $this->pay->del_flag = 0;

        $this->pay->save();

        return redirect('/admin/maintenance/pay/Type');
    }

    public function update_pay(Request $req)
    {
        $pay = payTypeConnection::where('paymentType_ID','=',$req->id)->first();

        $pay->payment_type =  $req->apayment_type ;
        $pay->paymentType_desc =  $req->apaymentType_desc;

        $pay->save();

        return redirect('/admin/maintenance/pay/Type');
    }

    public function delete_pay(Request $req)
    {
        $pay = payTypeConnection::where('paymentType_ID','=',$req->id)->first();

        $pay->del_flag = 1;

        $pay->save();

        return redirect('/admin/maintenance/pay/Type');
    }
}
