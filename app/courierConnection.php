<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courierConnection extends Model
{
    protected $table = "tbl_courier";
    protected $primaryKey = "courier_ID";
    public $timestamps = false;
}
