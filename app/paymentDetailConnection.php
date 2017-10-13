<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymentDetailConnection extends Model
{
    protected $table = 'tbl_payment_details';
    protected $primaryKey = 'payment_ID';

    public function insurance()
    {
    	return $this->belongsTo('App\clientAccountsConnection', 'account_ID');
    }

    public function check_voucher()
    {
    	return $this->hasOne('App\checkVoucherConnection', 'pay_ID', 'payment_ID');
    }

    public function bank()
    {
        return $this->hasOne('App\bankConnection','bank_ID','bank_ID');
    }
}
