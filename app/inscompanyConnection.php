<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inscompanyConnection extends Model
{
    protected $table = 'tbl_company_info';
    protected $primaryKey = 'comp_ID';
    public $timestamps = false;
}
