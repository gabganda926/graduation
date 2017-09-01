<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payTypeConnection extends Model
{
    protected $table = "tbl_payment_type";
    protected $primaryKey = "paymentType_ID";
    public $timestamps = false;
}
