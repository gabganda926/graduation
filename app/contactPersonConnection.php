<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactPersonConnection extends Model
{
    protected $table = "tbl_contact_person";
    protected $primaryKey = "cPerson_ID";
    public $timestamps = false;

    public function company()
    {
    	return $this->belongsTo('App\inscompanyConnection', 'comp_cperson_ID', 'cPerson_ID');
    }

    public function bank()
    {
    	return $this->belongsTo('App\bankConnection', 'bank_cperson_ID', 'cPerson_ID');
    }
}
