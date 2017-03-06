<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courierConnection extends Model
{
    protected $table = "tb_courier";
    protected $primaryKey = "courier_ID";
    public $timestamps = false;
}
