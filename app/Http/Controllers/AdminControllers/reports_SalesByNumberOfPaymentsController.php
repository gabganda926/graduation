<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

USE DB;
use PDF;

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

class reports_SalesByNumberOfPaymentsController extends Controller
{
    public function index()
    {
    	$pay = DB::table('tbl_payments')
    			->select(DB::raw("'Week ' + cast(datepart(wk, paid_date) as varchar(2)) Week,
							    COUNT(*) Count"))
    			->where("tbl_payments.status", "!=", "1")
    			->where("tbl_payments.status", "!=", "4")
    			->groupBy(DB::raw("datepart(wk, paid_date), year(paid_date)"))
    			->get()
    			->toArray();
    	$month = DB::table('tbl_payments')
    			->select(DB::raw("DateName( month , DateAdd( month , datepart(mm, paid_date), -1 )) Month,
							    COUNT(*) Count"))
    			->where("tbl_payments.status", "!=", "1")
    			->where("tbl_payments.status", "!=", "4")
    			->groupBy(DB::raw("datepart(mm, paid_date), year(paid_date)"))
    			->get()
    			->toArray();
    	$quar = DB::table('tbl_payments')
    			->select(DB::raw("'Quarter ' + cast(datepart(qq, paid_date) as varchar(4)) Quarter,
							    COUNT(*) Count"))
    			->where("tbl_payments.status", "!=", "1")
    			->where("tbl_payments.status", "!=", "4")
    			->groupBy(DB::raw("datepart(qq, paid_date), year(paid_date)"))
    			->get()
    			->toArray();
    	$year = DB::table('tbl_payments')
    			->select(DB::raw("cast(datepart(yy, paid_date) as varchar(4)) Year,
							    COUNT(*) Count"))
    			->where("tbl_payments.status", "!=", "1")
    			->where("tbl_payments.status", "!=", "4")
    			->groupBy(DB::raw("datepart(yy, paid_date), year(paid_date)"))
    			->get()
    			->toArray();
    	$day = DB::table('tbl_payments')
    			->select(DB::raw("cast(paid_date AS DATE) Day, COUNT(*) Count"))
    			->where("tbl_payments.status", "!=", "1")
    			->where("tbl_payments.status", "!=", "4")
    			->groupBy(DB::raw("cast(paid_date AS DATE)"))
    			->get()
    			->toArray();
    	return view('pages.admin.reports.sales-count', ['pay' => $pay, 'month' => $month, 'year' => $year, 'quar' => $quar, 'day' => $day])
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

    	$day = DB::table('tbl_payments')
    			->select(DB::raw("cast(paid_date AS DATE) Day, COUNT(*) Count"))
    			->where("tbl_payments.status", "!=", "1")
    			->where("tbl_payments.status", "!=", "4")
    			->groupBy(DB::raw("cast(paid_date AS DATE)"))
    			->get()
    			->toArray();
    	$date_start = $req->date_start;
    	$date_end = $req->date_end;

        $pdf = PDF::loadView('pages.pdf.reports-sales-by-count',
        		compact('day', 'date_start', 'date_end'))
            ->setPaper(array(0, 0, 695, 500), 'portrait');

        return $pdf->stream();
    }//generates the pdf
}
