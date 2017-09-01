<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientListConnection extends Model
{
    protected $table = 'tbl_client_list';
    protected $primaryKey = 'client_ID';
    public $timestamps = false;
}
