<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class web_claimRequestConnection extends Model
{
    protected $table = 'tbl_web_claimRequest';
    protected $primaryKey = 'web_claim_ID';
    public $timestamps = false;
}
