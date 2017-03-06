<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class installmentConnection extends Model
{
    protected $table = 'tb_installment_type';
    protected $primaryKey = 'installment_ID';
    public $timestamps = false;
}
