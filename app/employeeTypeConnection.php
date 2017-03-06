<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeeTypeConnection extends Model
{
    protected $table = "tb_employee_type";
    protected $primaryKey = "emptype_ID";
    public $timestamps = false;
}
