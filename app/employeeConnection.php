<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeeConnection extends Model
{
    protected $table = 'tbl_employee';
    protected $primaryKey = "emp_ID";
    public $timestamps = false;

    public function details()
    {
    	return $this->belongsTo('App\salesAgentConnection','agent_ID','emp_ID');
    }

    public function role()
    {
    	return $this->hasOne('App\employeeRoleConnection','emp_role_ID','emp_role_ID');
    }
}
