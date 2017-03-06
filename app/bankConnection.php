<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bankConnection extends Model
{
    protected $table = 'tb_bank_info';
    protected $primaryKey = "bank_ID";
    public $timestamps = false;
}
