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

class reports_SalesByInsuranceCompanyController extends Controller
{
    public function index()
    {
    	$week = DB::table('tbl_company_info as a')
    			->join("tbl_insurance_account as e", "e.insurance_company", "=", "a.comp_ID")
    			->join("tbl_payment_details as d", "d.account_ID", "=", "e.account_ID")
    			->join("tbl_check_voucher as c", "c.pay_ID", "=", "d.payment_ID")
    			->join("tbl_payments as b", "b.check_voucher", "=", "c.cv_ID")
    			->select(DB::raw("a.comp_name Company, 'Week ' + cast(datepart(wk, b.paid_date) as varchar(2)) Week, SUM(b.amount) Amount"))
    			->where("b.paid_date", "!=", "")
    			->groupBy("a.comp_name")
    			->groupBy(DB::raw("datepart(wk, b.paid_date)"))
    			->get()
    			->toArray();
    	$month = DB::table('tbl_company_info as a')
    			->join("tbl_insurance_account as e", "e.insurance_company", "=", "a.comp_ID")
    			->join("tbl_payment_details as d", "d.account_ID", "=", "e.account_ID")
    			->join("tbl_check_voucher as c", "c.pay_ID", "=", "d.payment_ID")
    			->join("tbl_payments as b", "b.check_voucher", "=", "c.cv_ID")
    			->select(DB::raw("a.comp_name Company, DateName( month , DateAdd( month , datepart(mm, b.paid_date), -1 )) Month, SUM(b.amount) Amount"))
    			->where("b.paid_date", "!=", "")
    			->groupBy("a.comp_name")
    			->groupBy(DB::raw("datepart(mm, b.paid_date)"))
    			->get()
    			->toArray();
    	$quar = DB::table('tbl_company_info as a')
    			->join("tbl_insurance_account as e", "e.insurance_company", "=", "a.comp_ID")
    			->join("tbl_payment_details as d", "d.account_ID", "=", "e.account_ID")
    			->join("tbl_check_voucher as c", "c.pay_ID", "=", "d.payment_ID")
    			->join("tbl_payments as b", "b.check_voucher", "=", "c.cv_ID")
    			->select(DB::raw("a.comp_name Company, 'Quarter ' + cast(datepart(qq, b.paid_date) as varchar(4)) Quarter, SUM(b.amount) Amount"))
    			->where("b.paid_date", "!=", "")
    			->groupBy("a.comp_name")
    			->groupBy(DB::raw("datepart(qq, b.paid_date)"))
    			->get()
    			->toArray();
    	$year = DB::table('tbl_company_info as a')
    			->join("tbl_insurance_account as e", "e.insurance_company", "=", "a.comp_ID")
    			->join("tbl_payment_details as d", "d.account_ID", "=", "e.account_ID")
    			->join("tbl_check_voucher as c", "c.pay_ID", "=", "d.payment_ID")
    			->join("tbl_payments as b", "b.check_voucher", "=", "c.cv_ID")
    			->select(DB::raw("a.comp_name Company, cast(datepart(yy, paid_date) as varchar(4)) Year, SUM(b.amount) Amount"))
    			->where("b.paid_date", "!=", "")
    			->groupBy("a.comp_name")
    			->groupBy(DB::raw("datepart(yy, b.paid_date)"))
    			->get()
    			->toArray();
    	$overall = DB::table('tbl_company_info as a')
    			->join("tbl_insurance_account as e", "e.insurance_company", "=", "a.comp_ID")
    			->join("tbl_payment_details as d", "d.account_ID", "=", "e.account_ID")
    			->join("tbl_check_voucher as c", "c.pay_ID", "=", "d.payment_ID")
    			->join("tbl_payments as b", "b.check_voucher", "=", "c.cv_ID")
    			->select(DB::raw("a.comp_name Company, SUM(b.amount) Amount"))
    			->where("b.paid_date", "!=", "")
    			->groupBy("a.comp_name")
    			->get()
    			->toArray();
    	$day = DB::table('tbl_company_info as a')
    			->join("tbl_insurance_account as e", "e.insurance_company", "=", "a.comp_ID")
    			->join("tbl_payment_details as d", "d.account_ID", "=", "e.account_ID")
    			->join("tbl_check_voucher as c", "c.pay_ID", "=", "d.payment_ID")
    			->join("tbl_payments as b", "b.check_voucher", "=", "c.cv_ID")
    			->select(DB::raw("a.comp_name Company, b.paid_date Day, SUM(b.amount) Amount"))
    			->where("b.paid_date", "!=", "")
    			->groupBy("a.comp_name")
    			->groupBy("b.paid_date")
    			->get()
    			->toArray();

    	return view('pages.admin.reports.sales-inscompany', ['week' => $week, 'month' => $month, 'year' => $year, 'quar' => $quar, 'day' => $day, 'overall' => $overall])
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

    	$day = DB::table('tbl_company_info as a')
    			->join("tbl_insurance_account as e", "e.insurance_company", "=", "a.comp_ID")
    			->join("tbl_payment_details as d", "d.account_ID", "=", "e.account_ID")
    			->join("tbl_check_voucher as c", "c.pay_ID", "=", "d.payment_ID")
    			->join("tbl_payments as b", "b.check_voucher", "=", "c.cv_ID")
    			->select(DB::raw("a.comp_ID Company, b.paid_date Day, SUM(b.amount) Amount"))
    			->where("b.paid_date", "!=", "")
    			->groupBy("a.comp_ID")
    			->groupBy("b.paid_date")
    			->get()
    			->toArray();
    	$icomp = inscompanyConnection::where('comp_ID', "=", $req->inscomp)->first();
    	$date_start = $req->date_start;

        $date_e = $req->date_end . ' 23:59:59.000';
        $newdate_e = date("Y-m-d H:i:s",strtotime($date_e));
    	$date_end = $newdate_e;

        $pdf = PDF::loadView('pages.pdf.reports-sales-by-company',
        		compact('day', 'date_start', 'date_end', 'icomp'))
            ->setPaper(array(0, 0, 695, 700), 'portrait');

        return $pdf->stream();
    }//generates the pdf
}
