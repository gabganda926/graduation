<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\quoteConnection;

class quoteController extends Controller
{
    public function __construct(quoteConnection $quote)
    {
      $this->quote = $quote;
    }

    public function index()
    {
      return view('/pages/maintenance/quoteStatus')
      ->with('qot',quoteConnection::all());
    }

    public function add_quote(Request $req)
    {
      $this->quote->quoteStatus_name = $req->qstat_name;
      $this->quote->quoteStatus_desc = $req->qstat_desc;
      $mytime = $req->time;
      $this->quote->created_at = $mytime;
      $this->quote->updated_at = $mytime;
      $this->quote->del_flag = 0;

      $this->quote->save();

      return redirect('/admin/maintenance/quote/status');
    }

    public function update_quote(Request $req)
    {
      $quote = quoteConnection::where('quoteStatus_ID','=',$req->id)->first();

      $quote->quoteStatus_name = $req->aqstat_name;
      $quote->quoteStatus_desc = $req->aqstat_desc;
      $mytime = $req->atime;
      $quote->updated_at = $mytime;
      $quote->save();

      return redirect('/admin/maintenance/quote/status');
    }

    public function delete_quote(Request $req)
    {
      $quote = quoteConnection::where('quoteStatus_ID','=',$req->id)->first();

      $quote->del_flag = 1;

      $quote->save();

      return redirect('/admin/maintenance/quote/status');
    }
}
