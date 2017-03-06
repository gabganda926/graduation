<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class complaintTypeConnection extends Model
{
    protected $table = "tb_complaint_type";
    protected $primaryKey = "complaintType_ID";
    public $timestamps = false;
}
