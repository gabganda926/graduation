<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class premiumDGConnection extends Model
{
    protected $table = 'tbl_premium_damage';
    protected $primaryKey = 'premiumDG_ID';
    public $timestamps = false;
}
