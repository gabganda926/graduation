<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymentsConnection extends Model
{
    protected $table = 'tbl_payments';
    protected $primaryKey = 'payment_ID';
    public $timestamps = false;
}
