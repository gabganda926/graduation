<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transmittalRecordConnection extends Model
{
    protected $table = 'tbl_transmittal_record';
    protected $primaryKey = 'transRec_ID';
    public $timestamps = false;
}
