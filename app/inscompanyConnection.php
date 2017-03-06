<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inscompanyConnection extends Model
{
    protected $table = 'tb_company_info';
    protected $primaryKey = 'comp_ID';
    public $timestamps = false;
}
