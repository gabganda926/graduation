<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bankConnection extends Model
{
    protected $table = 'tbl_bank_info';
    protected $primaryKey = "bank_ID";
    public $timestamps = false;

    public function contact()
    {
    	return $this->hasOne('App\contactPersonConnection', 'cPerson_ID', 'bank_cperson_ID');
    }

    public function address()
    {
    	return $this->hasOne('App\addressConnection', 'add_ID', 'bank_add_ID');
    }
}
