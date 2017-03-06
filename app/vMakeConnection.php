<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vMakeConnection extends Model
{
    protected $table = 'tb_vehicle_manufacturer';
    protected $primaryKey = 'vehicle_make_ID';
    public $timestamps = false;
}
