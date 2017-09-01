<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class installmentConnection extends Model
{
    protected $table = 'tbl_installment_type';
    protected $primaryKey = 'installment_ID';
    public $timestamps = false;
}
