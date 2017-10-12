<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymentCheckConnection extends Model
{
    protected $table = "tbl_payment_check";
    protected $primaryKey = "check_ID";
    public $timestamps = false;

    public function payment()
    {
    	return $this->belongsTo('App\paymentConnection', 'payment_ID', 'payment_ID');
    }
}
