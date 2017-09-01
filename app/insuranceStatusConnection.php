<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class insuranceStatusConnection extends Model
{
    protected $table = "tbl_insurance_status";
    protected $primaryKey = "insuranceStatus_ID";
    public $timestamps = false;
}
