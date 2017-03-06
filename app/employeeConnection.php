<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeeConnection extends Model
{
    protected $table = 'tb_employee';
    protected $primaryKey = "emp_ID";
    public $timestamps = false;

    // Address relationship
    public function address()
    {
        return $this->hasOne('App\address');
    }
}
