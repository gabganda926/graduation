<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeeRoleConnection extends Model
{
    protected $table = 'tbl_employee_role';
    public $timestamps = false;
    protected $primaryKey = 'emp_role_ID';

    public function employees()
    {
    	return $this->belongsToMany('App\employeeConnection','emp_role_ID','emp_role_ID');
    }
}
