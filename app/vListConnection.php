<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vListConnection extends Model
{
    protected $table = 'tbl_vehicle_list';
    protected $primaryKey = 'vehicle_list_ID';
    public $timestamps = false;
}