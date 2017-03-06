<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vAccesoriesConnection extends Model
{
    protected $table = 'tb_vehicle_acce';
    protected $primaryKey = 'vehicle_acce_ID';
    public $timestamps = false;
}
