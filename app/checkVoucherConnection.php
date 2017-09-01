<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkVoucherConnection extends Model
{
    protected $table = 'tbl_check_voucher';
    protected $primaryKey = 'cv_ID';
    public $timestamps = false;
}
