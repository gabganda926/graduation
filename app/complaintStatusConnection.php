<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class complaintStatusConnection extends Model
{
    protected $table = "tbl_complaint_status";
    protected $primaryKey = "complaintStatus_ID";
    public $timestamps = false;
}
