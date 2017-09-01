<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactPersonConnection extends Model
{
    protected $table = "tbl_contact_person";
    protected $primaryKey = "cPerson_ID";
    public $timestamps = false;
}
