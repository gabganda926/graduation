<?php

namespace App\Http\Middleware;

use App\clientAccountsConnection;

use App\paymentDetailConnection;

use App\paymentConnection;

use App\checkVoucherConnection;

use Closure;

class paymentAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $details = paymentDetailConnection::all();
        date_default_timezone_set('Asia/Manila');

        $count = 0;

        $lapse = 0;

        $date = '';

        $now = strtotime(date("Y-m-d H:i:s"));

        if($details)
        {
            foreach($details as $detail)
            {
                $voucher = checkVoucherConnection::where('pay_ID', '=', $detail->payment_ID)->first();
                $pays = paymentConnection::where('check_voucher', '=', $voucher->cv_ID)->orderBy('due_date', 'asc')->get();
                foreach($pays as $pay)
                {
                    $date = $pay->due_date;
                    if($pay->paid_date == "" && $pay->amount_paid == "")
                    {
                        $count = $count + 1;
                    }
                    if(strtotime("+7 day", strtotime($pay->due_date)) < $now)
                    {
                        $lapse = $lapse + 1;
                        if($pay->status != 0 || $pay->status != 3)
                        {
                            $pay->status = 4;
                            $pay->save();
                        }       
                    }
                }
                if($count == 0)
                {
                    if(strtotime($date) == $now)
                    {
                        $detail->payment_status = 1; //active
                        $detail->save();   
                    }
                }
                if($lapse == 0)
                {
                    $detail->payment_status = 3; // lapse
                    $detail->save();
                }
                $acc = clientAccountsConnection::where('account_ID', '=', $detail->account_ID)->first();
                if(strtotime("-7 days", strtotime($acc->inception_date)) > $now && strtotime($acc->inception_date) < $now)
                {
                    $detail->payment_status = 5; // expiring
                }
                if(strtotime($acc->inception_date) > $now)
                {
                    $detail->payment_status = 6; //expired
                }
            }   
        }

        return $next($request);
    }
}
