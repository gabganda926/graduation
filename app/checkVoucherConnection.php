<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkVoucherConnection extends Model
{
    protected $table = 'tbl_check_voucher';
    protected $primaryKey = 'cv_ID';
    public $timestamps = false;

    public function payments()
    {
    	return $this->hasMany('App\paymentConnection', 'check_voucher', 'cv_ID')->orderBy('due_date','asc');
    }

    public function payment_details()
    {
    	return $this->belongsTo('App\paymentDetailConnection', 'payment_ID', 'pay_ID');
    }
}
