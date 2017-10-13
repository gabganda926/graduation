<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymentsConnection extends Model
{
    protected $table = 'tbl_payments';
    protected $primaryKey = 'payment_ID';
    public $timestamps = false;

    public function check_voucher()
    {
    	return $this->belongsTo('App\checkVoucherConnection', 'cv_ID', 'check_voucher');
    }
}
