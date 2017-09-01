<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transmittalStatusConnection extends Model
{
    protected $table = 'tbl_transmittal_status';
    protected $primaryKey = 'transmittalStatus_ID';
    public $timestamps = false;
}
