<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class complaintTypeConnection extends Model
{
    protected $table = "tbl_complaint_type";
    protected $primaryKey = "complaintType_ID";
    public $timestamps = false;
}
