<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class premiumPAConnection extends Model
{
    protected $table = 'tbl_premium_pa';
    protected $primaryKey = 'premiumPA_ID';
    public $timestamps = false;
}
