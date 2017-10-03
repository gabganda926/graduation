<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sendComplaintConnection extends Model
{
    protected $table = "tbl_complaint_sents";
    protected $primaryKey = "complaint_ID";
    public $timestamps = false;
}
