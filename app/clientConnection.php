<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientConnection extends Model
{
    protected $table = 'tb_client';
    protected $primaryKey = "client_ID";
    public $timestamps = false;
}
