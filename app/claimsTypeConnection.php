<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class claimsTypeConnection extends Model
{
    protected $table = 'tbl_claim_types';
    protected $primaryKey = 'claimType_ID';
    public $timestamp = false;
}
