<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personalInfoConnection extends Model
{
    protected $table = 'tb_personal_info';
    protected $primaryKey = 'pinfo_ID';
    public $timestamps = false;
}
