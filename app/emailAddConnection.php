<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emailAddConnection extends Model
{
    protected $table = "tb_compre_email";
    protected $primaryKey = "compreEmail_ID";
    public $timestamps = false;
}
