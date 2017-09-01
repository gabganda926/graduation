<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class policynoConnection extends Model
{
    protected $table = 'tbl_policynumber';
    public $incrementing = false;
    protected $primaryKey = 'policy_number';
    public $timestamps = false;
}
