<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class accListInsuranceConnection extends Model
{
    protected $table = 'tbl_list_insurance';
    protected $primaryKey = 'client_insure_ID';
    public $timestamps = false;
}
