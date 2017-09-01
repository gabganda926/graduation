<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vMakeConnection extends Model
{
    protected $table = 'tbl_vehicle_make';
    protected $primaryKey = 'vehicle_make_ID';
    public $timestamps = false;
}
