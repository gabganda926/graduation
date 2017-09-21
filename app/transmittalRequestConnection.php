<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transmittalRequestConnection extends Model
{
    protected $table = 'tbl_transmittal_request';
    protected $primaryKey = 'req_ID';
    public $timestamps = false;
}
