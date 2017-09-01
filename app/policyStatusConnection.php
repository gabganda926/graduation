<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class policyStatusConnection extends Model
{
    protected $table = "tbl_policy_status";
    protected $primaryKey = "policyStatus_ID";
    public $timestamps = false;
}
