<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientTypeConnection extends Model
{
    protected $table = "tbl_client_type";
    protected $primaryKey = "clientType_ID";
    public $timestamps = false;
}
