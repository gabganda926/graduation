<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class claimsRequirementConnection extends Model
{
    protected $table = 'tbl_claim_requirements';
    protected $primaryKey = 'claimReq_ID';
    public $timestamps = false;
}
