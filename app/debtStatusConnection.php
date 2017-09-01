<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class debtStatusConnection extends Model
{
    protected $table = "tbl_debt_status";
    protected $primaryKey = "debtStatus_ID";
    public $timestamps = false;
}
