<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transmittalProccessConnection extends Model
{
    protected $table = 'tbl_transmittal_process';
    protected $primaryKey = 'process_ID';
    public $timestamps = false;
}
