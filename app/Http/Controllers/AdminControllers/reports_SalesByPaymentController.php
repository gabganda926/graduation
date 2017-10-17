<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use DB;

use App\paymentListConnection;

use App\checkVoucherConnection;

use App\paymentDetailConnection;

use App\clientAccountsConnection;

use App\inscompanyConnection;

use App\clientListConnection;

use App\clientConnection;

use App\personalInfoConnection;

use App\bankConnection;

use App\addressConnection;

use Redirect;

use Alert;

class reports_SalesByPaymentController extends Controller
{
    public function index()
    {
    	$pay = DB::table('tbl_payments')
    			->select(DB::raw("'Week ' + cast(datepart(wk, paid_date) as varchar(2)) Week,
							    SUM(amount) Amount"))
    			->where("tbl_payments.status", "!=", "1")
    			->where("tbl_payments.status", "!=", "4")
    			->groupBy(DB::raw("datepart(wk, paid_date), year(paid_date)"))
    			->get()
    			->toArray();
    	$month = DB::table('tbl_payments')
    			->select(DB::raw("DateName( month , DateAdd( month , datepart(mm, paid_date), -1 )) Month,
							    SUM(amount) Amount"))
    			->where("tbl_payments.status", "!=", "1")
    			->where("tbl_payments.status", "!=", "4")
    			->groupBy(DB::raw("datepart(mm, paid_date), year(paid_date)"))
    			->get()
    			->toArray();
    	$quar = DB::table('tbl_payments')
    			->select(DB::raw("'Quarter ' + cast(datepart(qq, paid_date) as varchar(4)) Quarter,
							    SUM(amount) Amount"))
    			->where("tbl_payments.status", "!=", "1")
    			->where("tbl_payments.status", "!=", "4")
    			->groupBy(DB::raw("datepart(qq, paid_date), year(paid_date)"))
    			->get()
    			->toArray();
    	$year = DB::table('tbl_payments')
    			->select(DB::raw("cast(datepart(yy, paid_date) as varchar(4)) Year,
							    SUM(amount) Amount"))
    			->where("tbl_payments.status", "!=", "1")
    			->where("tbl_payments.status", "!=", "4")
    			->groupBy(DB::raw("datepart(yy, paid_date), year(paid_date)"))
    			->get()
    			->toArray();
    	$day = DB::table('tbl_payments')
    			->select(DB::raw("DATENAME(dw, CAST(DATEPART(m, GETDATE()) AS VARCHAR) + '/' + CAST(DATEPART(d, paid_date) AS VARCHAR) + '/' + CAST(DATEPART(yy, getdate()) AS VARCHAR)) Day, SUM(amount) Amount"))
    			->where("tbl_payments.status", "!=", "1")
    			->where("tbl_payments.status", "!=", "4")
    			->groupBy(DB::raw("datepart(d, paid_date)"))
    			->get()
    			->toArray();
    	return view('pages.admin.reports.sales-overall', ['pay' => $pay, 'month' => $month, 'year' => $year, 'quar' => $quar, 'day' => $day])
		->with('plist', paymentListConnection::orderBy('paid_date', 'DESC')->get())
		->with('cvouch', checkVoucherConnection::all())
		->with('pdet', paymentDetailConnection::all())
		->with('cliacc', clientAccountsConnection::all())
		->with('clist', clientListConnection::all())
		->with('cli', clientConnection::all())
		->with('pinfo', personalInfoConnection::all())
		->with('company', insCompanyConnection::all())
		->with('bank', bankConnection::all())
		->with('addr', addressConnection::all());
    }

    public function generateForm(Request $req) 
    {

    	$plist = paymentListConnection::all();
    	$cliacc = clientAccountsConnection::all();
    	$clist = clientListConnection::all();
    	$cli = clientConnection::all();
    	$pinfo = personalInfoConnection::all();
    	$company = inscompanyConnection::all();
    	$pdet = paymentDetailConnection::all();
    	$cvouch = checkVoucherConnection::all();
    	$icomp = inscompanyConnection::where('comp_ID', "=", $req->inscomp)->first();
        $date_start = $req->date_start;

        $date_e = $req->date_end . ' 23:59:59.000';
        $newdate_e = date("Y-m-d H:i:s",strtotime($date_e));
        $date_end = $newdate_e;

        $pdf = PDF::loadView('pages.pdf.reports-sales-by-payment',
        		compact('plist', 'cliacc', 'clist', 'cli', 'pinfo', 'company', 'pdet', 'date_start', 'date_end', 'cvouch'))
            ->setPaper(array(0, 0, 695, 700), 'portrait');

        return $pdf->stream();
    }//generates the pdf
}
