<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class claimNotifiedByRepConnection extends Model
{
    protected $table = 'tbl_claimNotifiedByRepresentative';
    protected $primaryKey = 'notifer_ID';
    public $timestamps = false;
}
