<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymentListConnection extends Model
{
    protected $table = 'tbl_payments';
    protected $primaryKey = 'payment_ID';
}
