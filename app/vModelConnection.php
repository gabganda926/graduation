<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vModelConnection extends Model
{
    protected $table = 'tbl_vehicle_model';
    protected $primaryKey = 'vehicle_model_ID';
    public $timestamps = false;
}
