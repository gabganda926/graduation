<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkStatusConnection extends Model
{
    protected $table = "tb_check_status";
    protected $primaryKey = "checkStatus_ID";
    public $timestamps = false;
}
