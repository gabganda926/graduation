<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymentOnlineConnection extends Model
{
    protected $table = "tbl_online_payments";
    protected $primaryKey = "payment_ID";
    public $timestamps = false;

    public function payment_details()
    {
    	return $this->belongsTo('App\paymentConnection','payment_ID','pay_ID');
    }
}
