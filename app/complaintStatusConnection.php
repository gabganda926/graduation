<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class complaintStatusConnection extends Model
{
    protected $table = "tb_complaint_status";
    protected $primaryKey = "complaintStatus_ID";
    public $timestamps = false;
}
