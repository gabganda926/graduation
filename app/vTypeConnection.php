<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vTypeConnection extends Model
{
    protected $table = 'tb_vehicle_type';
    protected $primaryKey = 'vehicle_type_ID';
    public $timestamps = false;
}
