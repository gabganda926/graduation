<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class claimRequestConnection extends Model
{
    protected $table = 'tbl_claimRequest';
    protected $primaryKey = 'claim_ID';
    public $timestamps = false;
}
