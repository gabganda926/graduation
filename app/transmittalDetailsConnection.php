<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transmittalDetailsConnection extends Model
{
    protected $table = 'tbl_transmittal_details';
    protected $primaryKey = 'req_ID';
    public $timestamps = false;
}
