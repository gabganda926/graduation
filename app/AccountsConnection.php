<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountsConnection extends Model
{
    protected $table = 'tbl_user_accounts';
    protected $primaryKey = 'user_ID';
    public $timestamps = false;

    public function users()
    {
    	return $this->hasOne('App\employeeConnection', 'emp_ID', 'user_ID');
    }
}
