<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeeConnection extends Model
{
    protected $table = 'tbl_employee';
    protected $primaryKey = "emp_ID";
    public $timestamps = false;
}
