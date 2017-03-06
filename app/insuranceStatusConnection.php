<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class insuranceStatusConnection extends Model
{
    protected $table = "tb_insurance_status";
    protected $primaryKey = "insuranceStatus_ID";
    public $timestamps = false;
}
