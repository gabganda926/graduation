<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymentConnection extends Model
{
    protected $table = "tbl_payments";
    protected $primaryKey = "check_voucher";
    public $timestamps = false;
}
