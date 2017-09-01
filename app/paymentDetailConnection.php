<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymentDetailConnection extends Model
{
    protected $table = 'tbl_payment_details';
    protected $primaryKey = 'payment_ID';
}
